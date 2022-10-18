<script src="{{ asset('jquery/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('niceadmin/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('niceadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('niceadmin/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('niceadmin/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('niceadmin/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('niceadmin/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('niceadmin/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('niceadmin/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('niceadmin/js/main.js') }}"></script>

<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/messages_id.min.js') }}"></script>

<script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script>





<script>
    if (window.self == window.top) {
        window.dataLayer = window.dataLayer || [];
    }

    // if (!(typeof io === "undefined")) {
    const socket = io('wss://socket.kemenagpessel.com/', {
        foceNew: true,
        transports: ["polling"]
    });
    // }

    // if (!(typeof socket === "undefined")) {
    socket.on('connection');

    socket.on('sendSummaryToClient', (data) => {
        console.log(data);
        $.each(data, function(i, item) {
            var status = item.status_pelayanan;
            $('.total-' + status).html(item.total);
        });
    });


    socket.on('sendNotifToClient', (data) => {
        console.log('data nya apa:');
        console.log(data);
        let recipient = data[0];
        console.log('recipient');
        console.log(recipient);

        let disposisi = data[1];
        console.log('disposisi');
        console.log(disposisi);
        var authUsername = '{!! Auth::user()->username !!}';

        console.log('authUsername');
        console.log(authUsername);

        console.log('recipient.username');
        console.log(recipient.username);

        console.log('recipient.username == authUsername');
        console.log(recipient.username == authUsername);

        if (recipient.username == parseInt(authUsername)) {
            let penampung_audio = document.createElement('div');
            penampung_audio.setAttribute('id', 'penampung_audio-' + authUsername);
            let audio = document.createElement('audio');
            penampung_audio.appendChild(audio);
            audio.setAttribute('muted', "muted");
            // audio.setAttribute('src', "{{ url('notification-sound.ogg') }}");
            audio.setAttribute('src', "{{ url('ada-notifikasi-baru.mpeg') }}");
            audio.play();
            fetchNotif();
        }

        let pelayanan = data[1].pelayanan;
        let noRegis = pelayanan.no_registrasi;
        console.log('noRegis')
        console.log(noRegis)
        let front = noRegis.substr(0, 2);
        console.log('front')
        console.log(front)
        if (front == '01' && authUsername == 'mardiyana') {
            let penampung_audio2 = document.createElement('div');
            penampung_audio2.setAttribute('id', 'penampung-operator-' + authUsername + front);
            let audio2 = document.createElement('audio');
            penampung_audio2.appendChild(audio2);
            audio2.setAttribute('muted', "muted");
            // audio2.setAttribute('src', "{{ url('notification-sound.ogg') }}");
            audio2.setAttribute('src', "{{ url('ada-notifikasi-baru.mpeg') }}");
            audio2.play();
            fetchNotif();
        }

    });
    // }

    fetchNotif();


    function fetchNotif() {
        $.ajax({
            url: "/notifications/fetch",
            type: 'GET',
            success: function(res) {
                console.log(res);
                $('.notifications').empty();
                $(res.html).appendTo('.notifications')

                $('.total-notifikasi').html(res.total_notifikasi)
            }
        });
    }
</script>
