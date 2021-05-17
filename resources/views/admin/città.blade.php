<x-layout>

    <x-slot name="title">
        {{
            $Info_citta[0]['nome']
        }}
    </x-slot>

    <x-slot name="immagineSfondo">
        @php 
            $nomeImmagine = "/media/ImgCitta/".$Info_citta[0]['nome'].".jpg";
        @endphp
        <img src={{$nomeImmagine}} style="z-index:-100; width: 100%; height: 100%; object-fit:cover" />
    </x-slot>

    <x-slot name="nomeCitta">
        {{
            $Info_citta[0]['nome']
        }}
    </x-slot>

    <x-slot name="statoCitta">
        {{
            $Info_citta[0]['stato']
        }}
    </x-slot>
    
    <x-slot name="datiGenerali">
        <div class="row" style="width: 100%">
            <div class="col"> Coordinate: </div>
            <div class="col">{{ $Info_generali[0]['coordinate'] }}</div>
            <div class="w-100"></div>
            <div class="col"> Numero di abitanti: </div>
            <div class="col">{{ $Info_generali[0]['abitanti'] }}</div>
            <div class="w-100"></div>
            <div class="col"> Velocità della connessione: </div>
            <div class="col"> {{ $Info_generali[0]['connessione'] }}Mbps (media) </div>
            <div class="w-100"></div>
            <div class="col"> Costo della vita (mensile): </div>
            <div class="col"> {{ $Info_generali[0]['costo_vita'] }} €/mese</div>
        </div>
    </x-slot>
    
    <x-slot name="datiMeteo">
        <div class="row">
            <div class="col">Temperatura: </div>
            <div class="col">{{ $Info_meteo[0]['temperatura'] }} °C</div>
            <div class="w-100"></div>
            <div class="col">Umidità: </div>
            <div class="col">{{ $Info_meteo[0]['umidità'] }}%</div>
            <div class="w-100"></div>
            <div class="col">Velocità del vento: </div>
            <div class="col">{{ $Info_meteo[0]['vento'] }} m/s</div>
            <div class="w-100"></div>
            <div class="col">Nuvolosità: </div>
            <div class="col">{{ $Info_meteo[0]['nuvolosità']}}%</div>
            <div class="w-100"></div>
            <div class="col">Pressione atmosferica: </div>
            <div class="col">{{ $Info_meteo[0]['pressione_atmosferica']}} hPa</div>
        </div>
    </x-slot>
    
    <x-slot name="LikeOrNot">
        <!--Se esiste tupla con coppia citta utente allora content = "Non mi piace più" altrimenti "Mi piace" button-->
        @php
            $idCitta = $Info_citta[0]['id'];
            $idUtente = session('LoggedUser');
            $idCittaUtil = 0;
        @endphp
        @if (isset($likes[0]))
            @for ($i = 0; $i < count($likes); $i++)
                @if ($likes[$i]['citta_id']==$idCitta && $likes[$i]['user_id']==$idUtente )
                    @php
                        $idCittaUtil=$likes[$i]['citta_id'];
                    @endphp
                @endif
            @endfor
            @if ($idCittaUtil==$idCitta && $likes[0]['user_id']==$idUtente)
                Rimuovi
            @else
                Aggiungi
            @endif
        @else
            Aggiungi
        @endif
    </x-slot>

    <x-slot name="cittaLike">
        {{ $Info_citta[0]['id'] }}
    </x-slot>

</x-layout>
