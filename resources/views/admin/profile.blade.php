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
        <div class="row" style="margin-top: 5rem">
            <div class="col-3"></div>
            <div class="col-6">
                <h5>Le tue città preferite: </h5>
                <hr>
                @php
                    $idCities=array();
                @endphp
                @if (isset($likes[0]))
                    @foreach ($likes as $like)
                        @if ($like['user_id'] == session('LoggedUser') )
                            @php
                                array_push($idCities,$like['citta_id']);
                            @endphp
                        @endif    
                    @endforeach
                    @foreach ($idCities as $idCity)
                        @for ($i=0;$i<count($cities);$i++)
                            @if ($cities[$i]['id'] == $idCity)
                                <div class="row">
                                    <div class="col"> {{$cities[$i]['nome']}} </div>
                                    <div class="col"><a href="/{{$cities[$i]['nome']}}"><u>visualizza ora</u></a></div>
                                </div>
                            @endif 
                        @endfor
                    @endforeach
                @else <p>Non hai ancora città preferite, aggiungile tramite il tasto mi piace!</p>    
                @endif
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>
</html>