<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('creating_package') }}" method="POST">
        @csrf
        <input type="text" name="package" placeholder="Enter Package name">
        <input type="text" name="value" placeholder="Package value/Amount">
        <input type="text" name="ref_bonus" placeholder="Ref Bonus">
        <input type="text" name="spons_bonus" placeholder="Sponsord Post Bonus">
        <input type="text" name="min_withdraw" placeholder="minimim withdraw">
        <button type="submit">Submit</button>
    </form>
</body>
</html>