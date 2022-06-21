<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <p>Oi</p>
    </div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://js.pusher.com/7.1/pusher.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        Pusher.logToConsole = true;

        let pusher = new Pusher('997f545405c9a18ef10b', {
            cluster: 'mt1'
        });

        let channel = pusher.subscribe('data');
        channel.bind('data.create', function(response) {
            $.ajax({
                url: '/save',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(response),
                success: (data) => {
                    alert("Hash: " + data.hash + " salva com Sucesso!")
                },
                error: (error) => {
                    console.log(error)
                }
            });
        });
    });
</script>
