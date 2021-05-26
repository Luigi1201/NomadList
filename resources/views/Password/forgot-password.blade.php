<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Recupero password</title>
</head>
<body>
    <div class="container" style= "margin-top:45px">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 col-md-offset-4">
                <h3>Recupero password</h3>
                <hr>
                <div class="results">
                    @if(Session::get('status'))
                        <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                </div>
                <form action='forgot-password' method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Inserisci l'indirizzo email dell'account">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-danger btn-lg">Invio</button>
                    </div>
                </form>
                <br>
                <a href="/">Homepage</a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>