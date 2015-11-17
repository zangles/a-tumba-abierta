<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('azs') }}" method="post">
        {{ csrf_field() }}
        <textarea name="html" id="" cols="30" rows="10"></textarea>
        <input type="submit">
    </form>
</body>
</html>