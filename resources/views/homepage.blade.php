<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/homepage.css')}}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>NomadList — I migliori posti in cui vivere per un nomade digitale</title>
</head>
<body leftmargin="0" topmargin="0">
    <body leftmargin="0" topmargin="0">
    <div class="videoContainer">
        <video autoplay muted loop id="video">
            <source src="media/HeaderVideo.mp4" type="video/mp4">
        </video> 
		<div class="GoNomad" onclick="location.href='/register'">
            <h1><strong><font size="7" color="white"> 🌍 Go nomad  </font></strong></h1>
            <p style="margin-left: 1rem; margin-top:2rem;  color: white">
                <strong><font size="4" color="white"> Per entrare nella nostra community basta un click! </font></strong>
            </p>
        </div>
    </div>      
    <div class="ButtonLogin">
        @if (!session()->has("LoggedUser"))
        <form action="login">
            <button class="btn btn-block btn-danger btn-lg">Login</button>  
        </form>
        @else
        <form action="profile">
            <button class="btn btn-block btn-danger btn-lg">Profilo</button>  
        </form>
        @endif
    </div> 
	<div class="wave">
		<svg viewBox="0 0 1440 120">
			<path d="M1440,21.2101911 L1440,120 L0,120 L0,21.2101911 C120,35.0700637 240,42 360,42 C480,42 600,35.0700637 720,21.2101911 C808.32779,12.416393 874.573633,6.87702029 918.737528,4.59207306 C972.491685,1.8109458 1026.24584,0.420382166 1080,0.420382166 C1200,0.420382166 1320,7.35031847 1440,21.2101911 Z"></path>
		</svg> 
	</div>    
    <div class="container-fluid" style="margin-top:3rem">
        <div class="row">
            @foreach ($cities as $city)
            @php 
                $redirectCity = "/".$city['nome'];
            @endphp
                <div class="col-6 col-md-3" style="margin-bottom: 2rem;" onclick="location.href= '{{$redirectCity}}' ">
                    <div style="margin: 0auto; padding-top: 100%; height: 0; overflow: hidden; position: relative; border-radius: 12px;">
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;cursor: pointer">
                            <div style="margin-top:30%">
                                <h2 style="text-align: center" onclick="location.href= '{{$redirectCity}}' "><strong><font color="white">{{$city['nome']}}</font></strong></h2>
                                <h4 style="text-align: center" onclick="location.href= '{{$redirectCity}}' "><strong><font color="white">{{$city['stato']}}</font></strong></h4>
                            </div>
                            @php 
                                $nomeImmagine = "/media/ImgCitta/".$city['nome'].".jpg";
                            @endphp
                            <div style="position: absolute; top: 0; left: 0;width: 100%; height: 100%; object-fit: cover">
                                <img src={{$nomeImmagine}} style="position: absolute; top: 0; left: 0;width: 100%; height: 100%; object-fit: cover; z-index: -50"/>
                            </div>
                            @php 
                                $IdUser=session('LoggedUser');
                                $idCittaUtil = 0;
                            @endphp
                            <div style="position: absolute; top: 0; left: 0;width: 10%; height: 10%; object-fit: cover; z-index: 10">
                                @if (isset($likes[0]))
                                    @for ($i = 0; $i < count($likes); $i++)
                                        @if ($likes[$i]['citta_id']==$city['id'] && $likes[$i]['user_id']== $IdUser )
                                            @php
                                                $idCittaUtil=$likes[$i]['citta_id'];
                                            @endphp
                                        @endif
                                    @endfor
                                    @if ( ( $city['id']  ==  $idCittaUtil ) && ( $likes[0]['user_id']  ==  $IdUser ) )    
                                        <img src="/media/like.jpg" style="position: absolute; top: 0; left: 0;width: 100%; height: 100%; object-fit: cover"/> <!-- opacity:.5-->
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>    
            @endforeach
        </div>
    </div>
</body>
</body>
</html>