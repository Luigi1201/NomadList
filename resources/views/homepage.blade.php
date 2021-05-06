<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/homepage.css')}}" type="text/css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>HOMEPAGE NOMADLIST</title>
</head>
<body>
    <div class="continer-fluid" id="videoContainer">
        <div class="row">
            <video autoplay muted loop id="video">
                <source src="media/HeaderVideo.mp4" type="video/mp4">
            </video>  
        </div>
        <svg viewBox="0 0 1440 120" class="wave">
            <path d="M1440,21.2101911 L1440,120 L0,120 L0,21.2101911 C120,35.0700637 240,42 360,42 C480,42 600,35.0700637 720,21.2101911 C808.32779,12.416393 874.573633,6.87702029 918.737528,4.59207306 C972.491685,1.8109458 1026.24584,0.420382166 1080,0.420382166 C1200,0.420382166 1320,7.35031847 1440,21.2101911 Z">
            </path>
        </svg> 
        <div class="row" id="onVideoContents">
            <div class="col-12 col-md-7">
                <div class="GoNomad" onclick="location.href='/register'">
                    <h1 style="color: white">
                        Go nomad
                    </h1>
                </div>
            </div>
            <div class="col-0 col-md-5">
                <div class="ButtonLogin"> Pulsante </div>     
            </div> 
        </div>  
    </div>
    
</body>
</html>