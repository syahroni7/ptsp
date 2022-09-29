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


    const socket = io('wss://socket.kemenagpessel.com/', {
        foceNew: true,
        transports: ["polling"]
    });

    socket.on('connection');

    socket.on('sendSummaryToClient', (data) => {
        console.log(data);
        $.each(data, function(i, item) {
            var status = item.status_pelayanan;
            $('.total-' + status).html(item.total);
        });
    });


    socket.on('sendNotifToClient', (data) => {
        let recipient = data[0];
        console.log('recipient');
        console.log(recipient);

        let disposisi = data[1];
        console.log('disposisi');
        console.log(disposisi);
        var authUsername = {!! Auth::user()->username !!};
        console.log('authUsername');
        console.log(authUsername);

        console.log('recipient.username');
        console.log(recipient.username);

        console.log('recipient.username == authUsername');
        console.log(recipient.username == authUsername);

        if (recipient.username == authUsername) {
            fetchNotif();
        }

    });

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
