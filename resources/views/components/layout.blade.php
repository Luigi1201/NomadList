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
    <div class="container" style="margin-top: 3rem;">
        <div class="row" style="border: 2px solid black; height: 15rem">
            {{$immagineSfondo}}
            <div class="col" style="position:absolute; top:0; left:0">
                <h1 style="text-align: center; margin-top: 4.5rem;"><strong><font color="white"> {{ $nomeCitta }} </font></strong></h1>
            </div>
            <div class="w-100"></div>
            <div class="col" style="position:absolute; top:0; left:0">
                <h3 style="text-align: center; margin-top: 7rem;"><strong><font color="white"> {{ $statoCitta }} </font></strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="border: 2px solid black">
                Informazioni generali 
            </div>
            <div class="col-6" style="border: 2px solid black">
                Informazioni meteo
            </div>
        </div>
        <div class="row" style="border: 2px solid black; height:20rem">
            <div class="col"  style="margin-top:2rem">
                {{ $datiGenerali}}
            </div>
            <div class="col" style="margin-top:2rem">
                {{ $datiMeteo }}
            </div>
        </div>
    </div>
</body>
</html>