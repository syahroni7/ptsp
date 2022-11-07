<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function setPhoneNumber()
    {
        $user = Auth::user();

        return view('auth.phonenumber', [
            'title' => 'Set Nomor HP',
            'user' => $user
        ]);
    }

    public function storePhoneNumber(Request $request)
    {
        $data = $request->input();

        $validator = Validator::make($request->all(), [
            'no_hp' => 'required|numeric|min:10',
        ], [
            'no_hp.required' => 'No HP diperlukan untuk diisi',
            'no_hp.numeric' => 'No HP harus nomor saja',
            'no_hp.min' => 'No HP harus lebih dari 10 digit',
        ]);

        if ($validator->fails()) {
            //Not okay
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
                
        } else {

            $user = Auth::user();
            $user->no_hp = $data['no_hp'];
            $user->save();

            return redirect()->route('home');
        }
    }

    public function sendMessage($to, $text)
    {
        $key = '2d6e70264e5039366475c6b6b7b86393f4182b1166940df0';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->withOptions(([
            'debug' => false,
            'connect_timeout' => false,
            'timeout' => false,
            'verify' => false
        ]))->post('http://116.203.191.58/api/send_message', [
            'phone_no' => $to,
            'message' => $text,
            'key' => $key,
            'skip_link' => true,
        ]);

        if ($response->successful()) {
            return response()->json([
                'code' => 200,
                'status' => 'OK',
                'message' => 'Sent Successfully'
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => 'Warning',
                'message' => 'There is a problem with the server'
            ]);
        }
    }
}
