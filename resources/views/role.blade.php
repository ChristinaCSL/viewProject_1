<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
</head>
<body>

    <button type="submit" id="btn" onclick="clickfunction()">Click Me</button>
    <script src="{{asset('js/jquery-3.6.4.js')}}"></script>
</body>
</html>
<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    function clickfunction(){
        var textid = "1";
        var textname = "mg mg";
        var requestdata = {id:textid,name:textname};

        $.ajax({
            type:'POST',
            url:"{{route('ajaxStore')}}",
            data:requestdata,
            success:function(msg){
                console.log(msg);
            }
        });
    }
</script>
