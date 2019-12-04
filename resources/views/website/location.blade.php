<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <p></p>
    
    <script type="text/javascript" src="{{asset('hotmagazine/js/jquery.min.js')}}"></script>
    <script>
        $(function(){
            navigator.geolocation.getCurrentPosition(function(position) {
                console.log(position);
                $('p').html(position);
            });
            
        })
    </script>
</body>
</html>