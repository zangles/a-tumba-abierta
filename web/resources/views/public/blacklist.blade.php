<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A tumba abierta black list</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header text-center">
            <h1>Lista negra del clan A tumba abierta</h1>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Cuenta</th>
            </tr>
            </thead>
            <tbody>
                @foreach($players as $p)
                    <tr>
                        <td style="width:150px">{{ $p->account }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>