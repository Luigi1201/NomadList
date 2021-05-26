<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Reset password</title>
</head>
<body>
    <div class="container" style="margin-top: 45px">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 col-md-offset-4">
                <h3>Reset password</h3>
                <hr>
                <form action='/reset-password' method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Inserire email" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">Nuova Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Inserire la password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">Conferma password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Reinserire la password">
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="token" value="{{$token}}">
                        <span class="text-danger">
                            @error('token')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-danger btn-lg">Reset</button>
                    </div>
                </form>
                <br>
                <a href="/login">Login</a>
                <br>
                <a href="/">Homepage</a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>