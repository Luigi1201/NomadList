<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Pagina Profilo</title>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:45px">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-md-offset-3">
                <h3>Il tuo profilo</h3>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <th>Username</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $LoggedUserInfo->name }}</td>
                            <td>{{ $LoggedUserInfo->email }}</td>
                            <td><a href="logout">Logout</a></td>
                            <td><a href="/">Homepage</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>