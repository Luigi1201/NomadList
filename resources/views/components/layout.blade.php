<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>{{ $title ?? 'Città' }}</title>
</head>
<body>
    <div class="container" style="margin-top: 3rem">
        <div class="row" style="border: 2px solid black; height: 17rem">
            {{$immagineSfondo}}
            <div class="col" style="position:absolute; top:0; left:0">
                <h1 style="text-align: center; margin-top: 5rem;"><strong><font color="white"> {{ $nomeCitta }} </font></strong></h1>
            </div>
            <div class="w-100"></div>
            <div class="col" style="position:absolute; top:0; left:0">
                <h3 style="text-align: center; margin-top: 7.5rem;"><strong><font color="white"> {{ $statoCitta }} </font></strong></h3>
            </div>
            <div class="w-100"></div>
            <div class="col" style="position:absolute; top:0; left:0">
                <p style="text-align: center; margin-top: 10rem;"><strong><font color="white"> {{ $numeroLike }}❤️ </font></strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col" style="border: 2px solid black; ">
                <h5 style="text-align: center; vertical-align: middle">Informazioni generali</h5>
            </div>
            <div class="col" style="border: 2px solid black">
                <h5 style="text-align: center; vertical-align: middle; ">Informazioni meteo</h5>
            </div>
        </div>
        <div class="row">
            <div class="col"  style="margin-top:2rem">
                {{ $datiGenerali}}
            </div>
            <div class="col" style="margin-top:2rem">
                {{ $datiMeteo }}
            </div>
        </div>
    </div> 
    <div class="container" style="margin-top: 7rem">
        @if ($LikeOrNot=="Aggiungi")
        <h5>{{$LikeOrNot}} {{ $nomeCitta }} alla lista delle tue città preferite</h5>
        @else <h5>{{$LikeOrNot}} {{ $nomeCitta }} dalla lista delle tue città preferite</h5>
        @endif
        <hr>
        <div class="row" style="margin-top:2rem">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="{{ route('like') }}" method="POST">
                    @csrf
                    <input type="hidden" name="CittaId" value="{{ $cittaId }}">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">{{$LikeOrNot}}</button>   
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <div class="container" style="margin-top: 3rem">
        <h5>Commenti</h5>
        <hr>
        <div class="row" style="margin-top: 3rem">
            <div class="col-md-6 offset-md-3">    
                @if(Session::get('failInsert'))
                    <div class="alert alert-danger">
                        {{ Session::get('failInsert') }}
                    </div>
                @elseif (Session::get('okInsert'))    
                    <div class="alert alert-success">
                        {{ Session::get('okInsert') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6 offset-md-3">    
                @if(Session::get('failDelete'))
                    <div class="alert alert-danger">
                        {{ Session::get('failDelete') }}
                    </div>
                @elseif (Session::get('successDelete'))    
                    <div class="alert alert-success">
                        {{ Session::get('successDelete') }}
                    </div>
                @endif
                @if (Session::get('successDeleteRisposta'))    
                    <div class="alert alert-success">
                        {{ Session::get('successDeleteRisposta') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6 offset-md-3">
                @if(Session::get('failUpdate'))
                    <div class="alert alert-danger">
                        {{ Session::get('failUpdate') }}
                    </div>
                @elseif (Session::get('successUpdate'))    
                    <div class="alert alert-success">
                        {{ Session::get('successUpdate') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6 offset-md-3">
                @if(Session::get('failRisposta'))
                    <div class="alert alert-danger">
                        {{ Session::get('failRisposta') }}
                    </div>
                @elseif (Session::get('okRisposta'))    
                    <div class="alert alert-success">
                        {{ Session::get('okRisposta') }}
                    </div>
                @endif
            </div>
            @if ($errors->any())
                <div class="col-md-6 offset-md-3">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                {{ $RecensioniUtenti }}
            </div>
        </div>
        <div class="row" style="margin-top: 3rem">
            <div class="col-md-6 offset-md-3">
                <p style="text-align: center">Sei stato in questa città? racconta la tua esperienza!</p>
            </div> 
        </div>   
        <div class="row">
            <div class="col-md-6 offset-md-3">
                    <form action="{{ route('recensione') }}" method="POST">
                        @csrf
                        <input type="hidden" name="CittaId" value="{{ $cittaId }}">
                        <input type="text" name="Recensione" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="...">
                        <div style="margin-top:2rem">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Invio</button>   
                    </form>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:3rem; margin-bottom:3rem">
        <hr>
        <div class="row">
            <div class="col">
                <a href="/">Torna all'homepage</a>  
            </div>
        </div>
    </div>
    <script>
        function modificaRecensione(idRecensione){
            document.getElementById('ModificheRecensione'+idRecensione).innerHTML = 
            '<div class="col"><form action="modifyComment" method="POST">@csrf<input type="hidden" name="OldComment" value='+idRecensione+'><input name="commentModified" type="text" style="width:100%" placeholder="Inserire il nuovo commento"><button type="submit" class="btn btn-dark" style="display: block;margin: 0 auto;">Modifica</button></form></div>'
        }
        function rispostaRecensione(idRecensione){
            document.getElementById('Risposta'+idRecensione).innerHTML = 
            '<div class="col"><form action="newRispostaRecensione" method="POST">@csrf<input type="hidden" name="commentoId" value='+idRecensione+'><input name="risposta" type="text" style="width:100%" placeholder="Inserire una risposta"><button type="submit" class="btn btn-primary" style="display: block;margin: 0 auto;">Invio</button></form></div>'
        }
    </script>
    <!--
    <script>
        const form=document.getElementById("formCommento");
        form.onsubmit=function(event){
            event.preventDefault();
            let commentModified = window.prompt('Inserisci il commento modificato');
            document.getElementById("qui").value=commentModified;
            form.submit();
        }
    </script>
    -->
</body>
</html>