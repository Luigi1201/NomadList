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

    <x-slot name="numeroLike">
        @php
            $contatore=0;
        @endphp
        @if (isset($likes[0]))
            @foreach ($likes as $like)
                @if ($like['citta_id'] == $Info_citta[0]['id'])
                    @php
                        $contatore++
                    @endphp
                @endif    
            @endforeach
        @endif  
        {{$contatore}}  
    </x-slot>
    
    <x-slot name="datiGenerali">
        <div class="row" style="width: 100%">
            <div class="col" style="margin-top:1rem">🚩Coordinate: </div>
            <div class="col" style="margin-top:1rem">{{ $Info_generali[0]['coordinate'] }}</div>
            <div class="w-100"></div>
            <div class="col" style="margin-top:1rem">👨‍👩‍👧‍👦Numero di abitanti: </div>
            <div class="col" style="margin-top:1rem">{{ $Info_generali[0]['abitanti'] }}</div>
            <div class="w-100"></div>
            <div class="col" style="margin-top:1rem">📡Velocità della connessione: </div>
            <div class="col" style="margin-top:1rem">{{ $Info_generali[0]['connessione'] }}Mbps (media) </div>
            <div class="w-100"></div>
            <div class="col" style="margin-top:1rem">💵Costo della vita (mensile): </div>
            <div class="col" style="margin-top:1rem"> {{ $Info_generali[0]['costo_vita'] }} €/mese</div>
        </div>
    </x-slot>
    
    <x-slot name="datiMeteo">
        <div class="row">
            <div class="col">🌡️Temperatura: </div>
            <div class="col">{{ $Info_meteo[0]['temperatura'] }} °C</div>
            <div class="w-100"></div>
            <div class="col" style="margin-top:1rem">💦Umidità: </div>
            <div class="col" style="margin-top:1rem">{{ $Info_meteo[0]['umidità'] }}%</div>
            <div class="w-100"></div>
            <div class="col" style="margin-top:1rem">💨Velocità del vento: </div>
            <div class="col" style="margin-top:1rem">{{ $Info_meteo[0]['vento'] }} m/s</div>
            <div class="w-100"></div>
            <div class="col" style="margin-top:1rem">☁️Nuvolosità: </div>
            <div class="col" style="margin-top:1rem">{{ $Info_meteo[0]['nuvolosità']}}%</div>
            <div class="w-100"></div>
            <div class="col" style="margin-top:1rem">📏Pressione atmosferica: </div>
            <div class="col" style="margin-top:1rem">{{ $Info_meteo[0]['pressione_atmosferica']}} hPa</div>
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
            @foreach ( $likes as $like )
                @if ($like['citta_id']==$idCitta && $like['user_id']==$idUtente )
                    @php
                        $idCittaUtil=$like['citta_id'];
                    @endphp
                @endif
            @endforeach
            @if ($idCittaUtil>0)
                Rimuovi
            @else Aggiungi
            @endif
        @else
            Aggiungi
        @endif
    </x-slot>

    <x-slot name="cittaId">
        {{ $Info_citta[0]['id'] }}
    </x-slot>

    <x-slot name="RecensioniUtenti">
    @if (isset($Recensioni[0]))
        @foreach ($Recensioni as $Recensione)
            @if ( $Recensione['citta_id'] == $Info_citta[0]['id'] )
            <div class="col-3"></div>
            <div class="col-6" style="border: 1px solid #ced4da; border-radius: .25rem; margin-top:2rem; box-shadow:  3px  3px 1.5px #fff5ee, -3px -3px 1.5px #fff5ee, 3px -3px 1.5px #fff5ee, -3px  3px 1.5px #fff5ee">
                <div class="row">
                    <div class="col"><span style="padding:3%; float:left">
                        @foreach ($Utenti as $Utente)
                            @if ($Utente['id'] == $Recensione['user_id'])
                                <u>{{$Utente['name']}}</u>
                            @endif
                        @endforeach
                    </span></div>
                </div>
                <p style="padding:3%">
                    {{$Recensione['commento']}}
                </p> 
                <div class="row">
                    <div class="col">
                        @if ($Recensione['user_id'] == session('LoggedUser'))
                            <div class="row">
                                <div class="col">
                                    @if ($Recensione['user_id'] == session('LoggedUser'))
                                        <span style="padding:3%; float:left">
                                            <form action="{{ route('modifyComment') }}" method="POST" id="formCommento">
                                                @csrf
                                                <input type="hidden" name="CittaId" value="{{ $Info_citta[0]['id'] }}">
                                                <input type="hidden" name="commentModified" id="qui" >
                                                <button type="submit" style="cursor:pointer">🖋️</button>
                                            </form>                    
                                        </span>  
                                    @endif
                                </div>
                                <div class="col">
                                    @if ($Recensione['user_id'] == session('LoggedUser'))
                                        <span style="padding:3%; float:left">
                                            <form action="{{ route('dropComment') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="CittaId" value="{{ $Info_citta[0]['id'] }}">
                                                <button type="submit" style="cursor:pointer">🗑️</button>
                                            </form>                    
                                        </span>  
                                    @endif
                                </div>
                                <div class="col-6"></div>
                            </div>
                        @endif
                    </div>
                    <div class="col">
                        @php
                        $data=($Recensione['updated_at'])->format('Y-m-d')
                        @endphp
                        <span style="padding:3%; float:right">
                            {{$data}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
            @endif 
        @endforeach
    @endif    
    </x-slot>

</x-layout>
