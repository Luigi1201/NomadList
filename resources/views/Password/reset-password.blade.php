<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset password</title>
</head>
<body>
    <form action='/reset-password'>
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Inserire email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Inserire la password">
        </div>
        <div class="form-group">
            <label for="">Conferma password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Reinserire la password">
        </div>
        <div class="form-group">
            <input type="hidden" name="token" value="{{$token}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-danger btn-lg">Modifica</button>
        </div>
    </form>
</body>
</html>