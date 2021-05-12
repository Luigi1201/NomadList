<x-layout>

    <x-slot name="title">
        {{
            $Info_citta[0]['nome']
        }}
    </x-slot>

    <x-slot name="immagineSfondo">
        @php ($nomeImmagine = "/media/ImgCitta/".$Info_citta[0]['nome'].".jpg")
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
    
</x-layout>
