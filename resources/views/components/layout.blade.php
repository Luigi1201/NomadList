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
    <div class="container">
        <div class="row" style=" margin-top:45px ">
            <div class="col" style="border: 2px solid black">
                InfoGenerali 
            </div>
            <div class="col" style="border: 2px solid black">
                InfoMeteo 
            </div>
        </div>
        <div class="row">
            <div class="col" style="text-align: center">
                Qui vanno i dati generali -> {{ $datiGenerali ?? 'Dati Generali auto' }}
            </div>
            <div class="col" style="text-align: center">
                Qui vanno i dati meteo -> {{ $datiMeteo ?? 'Dati Meteo auto' }}
            </div>
        </div>
    </div>
</body>
</html>