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
    <div style="z-index: 2; position: fixed; top: 2rem; right: 2rem; cursor: pointer;">
        <form action="logout">
            <button class="btn btn-block btn-danger btn-lg">Logout</button>  
        </form>
    </div>
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
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $LoggedUserInfo->name }}</td>
                            <td>{{ $LoggedUserInfo->email }}</td>
                        </tr>
                        <tr id="ModificheNomeEmail">
                            <td style="border:none">
                                <button type="button" class="btn btn-dark" onclick="cambiaNome()">Modifica</button>
                            </td>
                            <td style="border:none">
                                <button type="button" class="btn btn-dark" onclick="cambiaEmail()">Modifica</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="container-fluid">
                    <div class="results">
                        @if(Session::get('failUsername'))
                            <div class="alert alert-danger">
                                {{ Session::get('failUsername') }}
                            </div>
                        @endif
                    </div>
                    <div class="results">
                        @if(Session::get('successUsername'))
                            <div class="alert alert-success">
                                {{ Session::get('successUsername') }}
                            </div>
                        @endif
                    </div>
                    <div class="results">
                        @if(Session::get('successEmail'))
                            <div class="alert alert-success">
                                {{ Session::get('successEmail') }}
                            </div>
                        @endif
                    </div>
                    <div class="results">
                        @if(Session::get('failEmail'))
                            <div class="alert alert-danger">
                                {{ Session::get('failEmail') }}
                            </div>
                        @endif
                    </div>
                    <span class="text-danger">
                        <p style="text-align: center"> 
                            @error('email')
                                {{ $message }}
                            @enderror
                        </p>
                    </span>
                    <span class="text-danger">
                        <p style="text-align: center"> 
                            @error('name')
                                {{ $message }}
                            @enderror
                        </p>
                    </span>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row" style="margin-top: 5rem">
            <div class="col-3"></div>
            <div class="col-md-6 col-md-offset-3">
                <h5>Le tue città preferite: </h5>
                <hr>
                @php
                    $idCities=array();
                    $yesOrNot = 0;
                @endphp
                @if (isset($likes[0]))
                    @foreach ($likes as $like)
                        @if ($like['user_id'] == session('LoggedUser') )
                            @php
                                $yesOrNot = 1;
                                array_push($idCities,$like['citta_id']);
                            @endphp
                        @endif    
                    @endforeach
                    @foreach ($idCities as $idCity)
                        @for ($i=0;$i<count($cities);$i++)
                            @if ($cities[$i]['id'] == $idCity)
                                <div class="row">
                                    <div class="col"> 🌆{{$cities[$i]['nome']}} </div>
                                    <div class="col"><a href="/{{$cities[$i]['nome']}}" style="color:black"><u>visualizza ora</u></a></div>
                                </div>
                            @endif 
                        @endfor
                    @endforeach
                @endif
                @if($yesOrNot == 0)
                    <p>Non hai ancora città preferite, aggiungile tramite il tasto mi piace!</p>
                @endif
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row" style="margin-top: 5rem;margin-bottom:5rem">
            <div class="col-3"></div>
            <div class="col-md-6 col-md-offset-3">
                <h5>I tuoi commenti - Diario di viaggio ✒️</h5>
                <hr>
                @php
                    $yesOrNot = 0;
                @endphp
                @if (isset($recensioni[0]))
                    @foreach ($recensioni as $recensione)
                        @if ($recensione['user_id'] == session('LoggedUser') )
                        @php
                            $yesOrNot = 1;
                        @endphp
                            <div class="col" style="border: 1px solid #ced4da; border-radius: .25rem; margin-top:2rem; box-shadow:  3px  3px 1.5px #fff5ee, -3px -3px 1.5px #fff5ee, 3px -3px 1.5px #fff5ee, -3px  3px 1.5px #fff5ee">
                                <div class="row">
                                    <div class="col">
                                        @foreach ($cities as $city)
                                            @if ($city['id'] == $recensione['citta_id'])
                                                <span style="padding:3%; float:left">
                                                    Nella città:<a href="{{$city['nome']}}" style="color:black"><u>{{$city['nome']}} </u> </a>
                                                </span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <p style="padding:3%; word-wrap: break-word">
                                    {{$recensione['commento']}}
                                </p> 
                                <div class="row">
                                    <div class="col">
                                        @php
                                        $dataCreazione=($recensione['created_at']);
                                        $dataModifica=($recensione['updated_at'])
                                        @endphp
                                        <span style="padding:3%; float:right">
                                            @if ($dataCreazione == $dataModifica)
                                                {{$dataCreazione->format('Y-m-d')}}
                                            @elseif ($dataCreazione < $dataModifica)
                                                {{$dataModifica->format('Y-m-d')}}  
                                                <br>
                                                (modificato)
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif    
                    @endforeach 
                @endif
                @if ($yesOrNot==0)
                    <p>Non hai inserito alcun commento - Diario di viaggio vuoto</p>
                @endif 
            </div>
            <div class="col-3"></div>
        </div>
    <hr>
    <section style="margin-bottom: 3rem"><a href="/">Torna all'homepage</a></section>
    </div>
    <script>
        function cambiaNome(){
            document.getElementById('ModificheNomeEmail').innerHTML = 
            '<td colspan="2"><form method="POST" action="modificaDatiProfiloNome">@csrf<input name="name" type="text" style="width:100%" placeholder="Inserire il nuovo username"><button type="submit" class="btn btn-dark" style="display: block;margin: 0 auto;">Modifica</button></form></td>'
        }
        function cambiaEmail(){
            document.getElementById('ModificheNomeEmail').innerHTML = 
            '<td colspan="2"><form method="POST" action="modificaDatiProfiloEmail">@csrf<input name="email" type="text" style="width:100%" placeholder="Inserire il nuovo indirizzo email"><button type="submit" class="btn btn-dark" style="display: block;margin: 0 auto;">Modifica</button></form></td>'
        }
    </script>
</body>
</html>