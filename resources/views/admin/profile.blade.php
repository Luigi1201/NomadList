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
                        </tr>
                    </tbody>
                </table>
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
                                    <div class="col"> 🌆{{$cities[$i]['nome']}} </div>
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
        <div class="row" style="margin-top: 5rem;margin-bottom:5rem">
            <div class="col-3"></div>
            <div class="col-md-6 col-md-offset-3">
                <h5>I tuoi commenti - Diario di viaggio ✒️</h5>
                <hr>
                @if (isset($recensioni[0]))
                    @foreach ($recensioni as $recensione)
                        @if ($recensione['user_id'] == session('LoggedUser') )
                            <div class="col" style="border: 1px solid #ced4da; border-radius: .25rem; margin-top:2rem; box-shadow:  3px  3px 1.5px #fff5ee, -3px -3px 1.5px #fff5ee, 3px -3px 1.5px #fff5ee, -3px  3px 1.5px #fff5ee">
                                <p style="padding:3%">
                                    {{$recensione['commento']}}
                                </p> 
                                <div class="row">
                                    <div class="col">
                                        @foreach ($cities as $city)
                                            @if ($city['id'] == $recensione['citta_id'])
                                                <span style="padding:3%; float:left">
                                                    Nella città: {{$city['nome']}}
                                                </span>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col">
                                        @php
                                        $data=($recensione['updated_at'])->format('Y-m-d')
                                        @endphp
                                        <span style="padding:3%; float:right">
                                            {{$data}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif    
                    @endforeach 
                @endif
            </div>
            <div class="col-3"></div>
        </div>
        <!-- DA COMPLETARE
        <div class="row" style="margin-top: 5rem;margin-bottom: 5rem">
            <div class="col-3"></div>
            <div class="col-6">
                <h5>Le città che hai visitato:</h5>
                <hr>
                @foreach ($visite as $visita)
                    @if ($visita->user_id == session('LoggedUser'))
                        @foreach ($cities as $city)
                            @if ($visita->citta_id == $city->id)
                                <div class="row">
                                    <div class="col">
                                        {{$city->nome}}, il giorno {{$visita->data}}
                                    </div>
                                    <div class="col">
                                        <a href="/.{{$city->nome}}"><u>visualizza ora</u></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <br>
                <h6 style="margin-top:2rem">Aggiungi una nuova città alla lista!</h6>
                <div class="aggiunta/rimozione" style="border: 1px solid #ced4da;border-radius:.25rem">
                    <form action="{{ route('visita') }}" method="POST" style="margin:3%">
                        @csrf
                        <div class="results">
                            @if(Session::get('erroreInserimento'))
                                <div class="alert alert-danger">
                                    {{ Session::get('erroreInserimento') }}
                                </div>
                            @endif
                            @if(Session::get('inserted'))
                                <div class="alert alert-success">
                                    {{ Session::get('inserted') }}
                                </div>
                            @endif
                            @if(Session::get('esisteGià'))
                                <div class="alert alert-danger">
                                    {{ Session::get('esisteGià') }}
                                </div>
                            @endif
                            @if(Session::get('dataNonValida'))
                                <div class="alert alert-danger">
                                    {{ Session::get('dataNonValida') }}
                                </div>
                             @endif
                        </div>
                        <label for="data" style="width: 100%">
                            <div class="row">
                                <div class="col">Quando è avvenuta la visita? </div>
                                <div class="col"><input type="date" name="data"></div>
                            </div>                   
                        </label>
                        <span class="text-danger" style="width:100%">
                            @error('data')
                                {{ $message }}
                            @enderror  
                        </span>
                        <label for="citta"  style="width: 100%">
                            <div class="row">
                                <div class="col">In quale città? </div>
                                <div class="col">
                                    <input type="text" name="citta" placeholder="inserire la città">
                                </div>
                            </div> 
                        </label>
                        <span class="text-danger" style="width:100%">
                            @error('citta')
                                {{ $message }}
                            @enderror  
                        </span>
                        <button type="submit" class="btn btn-light" style="width: 100%; text-align:center">Seleziona</button>
                    </form>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    -->
    <hr>
    <section style="margin-bottom: 3rem"><a href="/"> ☚ Torna all'homepage</a></section>
    </div>
</body>
</html>