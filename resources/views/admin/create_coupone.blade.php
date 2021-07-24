<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('create_coup')}}" method="POST">
        @csrf
        <button type="submit">Create Coupon</button>
        @if(Session::get('created'))
            <div>{{Session::get('created')}}</div>
        @endif
    </form>
</body>
</html>