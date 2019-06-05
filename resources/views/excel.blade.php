<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel import</title>
</head>
<body>
    <form method="post" action="{{route('excel.import')}}" enctype="multipart/form-data">
    @csrf

    <input type="file" name="file" id="">
    <br><br>
    <input type="submit" value="Send">
    
    </form>
</body>
</html>