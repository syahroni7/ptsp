<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | SIPINTU</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link href="{{ asset('niceadmin/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('niceadmin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="{{ asset('niceadmin/css/styleloginbaru.css') }}" rel="stylesheet">

  <style>
    @media (max-width: 768px) {

      .left-box,
      .right-box {
        padding: 2rem 1rem !important;
        text-align: center;
      }

      .left-box img {
        height: 80px !important;
      }

      .box-area {
        margin: 1rem;
      }

      .header-text h2 {
        justify-content: center !important;
      }
    }

    .gradient-btn {
      background: linear-gradient(to right, #103cbe, #00b894);
      border: none;
      opacity: 0.95;
      /* opacity default */
      transition: background 0.3s ease, opacity 0.3s ease;
    }

    .gradient-btn:hover {
      background: linear-gradient(to right, #00b894, #103cbe);
      opacity: 1;
      /* opacity penuh saat hover */
    }
  </style>
</head>

<body>
  <!-- Background Blur Image -->
  <div class="position-fixed top-0 start-0 w-100 h-100"></div>

  <!-- Kontainer Form Login -->
  <div class="container d-flex justify-content-center align-items-center min-vh-100 position-relative px-3">
    <div class="row border rounded-5 p-3 bg-white shadow box-area w-100" style="max-width: 960px;">

      <!-- Left Box -->
      <div class="col-12 col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box py-5"
        style="background: linear-gradient(1755deg, #103cbe, #00b894);">
        <div class="featured-image mb-3">
          <a href="https://ptspkemenaglebak.my.id" target="_blank">
            <img src="{{ asset('niceadmin/img/icon-putih.png') }}" class="img-fluid" style="height: 100px;">
          </a>
        </div>
        <p class="text-white fs-2" style="font-family: 'Poppins'; font-weight: 600; margin-bottom: 4px;">KEMENAG LEBAK</p>
        <small class="text-white text-center d-block px-3" style="margin-bottom: 2px;">Sistem Informasi Pelayanan Terpadu Satu Pintu</small>
      </div>

      <!-- Right Box -->
      <div class="col-12 col-md-6 right-box py-5">
        <div class="row align-items-center">
          <div class="header-text mb-4 text-center text-md-start">
            <h2 class="d-flex gap-2 justify-content-center justify-content-md-start" style="color: #525151ff;">
              <a href="https://ptspkemenaglebak.my.id" target="_blank">
                <img src="{{ asset('niceadmin/img/apple-touch-icon.png') }}" alt="SIPINTU" style="height: 45px;">
              </a>
              SIPINTU
            </h2>
            <p>Masukkan Username & Password untuk Login.</p>
          </div>

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Username Input Field -->
            <div class="input-group mb-3 has-validation">
              <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" placeholder="Username" required>
              @error('username')
              <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
              </div>
              @enderror
            </div>

            <!-- Password Input Field -->
            <div class="input-group mb-3 has-validation">
              <input type="password" id="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">

              @error('password')
              <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
              </div>
              @enderror
            </div>

            <!-- Checkbox "Lihat Kata Sandi" -->
            <div class="input-group mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="showPasswordCheck" onclick="togglePassword()">
                <label for="showPasswordCheck" class="form-check-label text-secondary">
                  <small>Lihat Kata Sandi</small>
                </label>
              </div>
            </div>

            <!-- JavaScript Toggle -->
            <script>
              function togglePassword() {
                const passwordInput = document.getElementById("password");
                passwordInput.type = passwordInput.type === "password" ? "text" : "password";
              }
            </script>

            <!-- Tombol input -->
            <div class="input-group mb-3">
              <button type="submit" class="btn btn-lg w-100 fs-6 text-white gradient-btn">Login</button>
            </div>

            <div class="row">
              <small class="text-center">Lupa Password? <a href="#">Hubungi Administrator</a></small>
            </div>

            <!-- Copyright -->
            <div class="row">
              <small class="text-center text-muted w-100 mt-3 d-block">
                &copy; 2025 Prakom Kemenag Lebak.
              </small>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>

</body>

</html>