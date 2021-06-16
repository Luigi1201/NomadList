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
                <div class="col-md-6 offset-md-3" style="margin-top:1.4rem; border: 1px solid #ced4da; border-radius: .25rem; box-shadow:  3px  3px 1.5px #fff5ee, -3px -3px 1.5px #fff5ee, 3px -3px 1.5px #fff5ee, -3px  3px 1.5px #fff5ee">
                    <div class="row">
                        <div class="col">
                            <span style="padding:3%; float:left">
                                @foreach ($Utenti as $Utente)
                                    @if ($Utente['id'] == $Recensione['user_id'])
                                        <h5 style="color:red" ><strong>{{$Utente['name']}}</u></strong></h5>
                                    @endif
                                @endforeach
                            </span>
                        </div>
                        <div class="col">
                            @php
                            $dataCreazione=($Recensione['created_at']);
                            $dataModifica=($Recensione['updated_at'])
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
                    <p style="padding:3%; word-wrap: break-word;">
                        {{$Recensione['commento']}}
                    </p> 
                    <div class="row">
                        <div class="col">
                            @if ($Recensione['user_id'] == session('LoggedUser'))
                                <div class="row">
                                    <div class="col-12 col-md-9">
                                        <span style="padding-bottom:3%; float:right">
                                            <button type="submit" onclick="modificaRecensione({{$Recensione->id}})" >🖋️</button>           
                                        </span>  
                                    </div>
                                    <div class="col-md-3">
                                        <span style="padding-bottom:3%; float:right">
                                            <form action="{{ route('dropComment') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="Commento" value="{{ $Recensione->id }}">
                                                <button type="submit" style="cursor:pointer">🗑️</button>
                                            </form>                    
                                        </span>  
                                    </div>    
                                </div>
                                <div class="row" id="ModificheRecensione{{$Recensione->id}}"></div>
                            @endif
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="container-fluid">
                        @php
                            $exist=0;
                        @endphp
                        @foreach ($Risposte as $Risposta)
                            @if ($Risposta->recensione_id == $Recensione->id)
                                @php
                                    $exist=1;
                                @endphp
                            @endif
                        @endforeach
                        @if ($exist==1)
                            <hr>
                            <div class="row">
                                <h6 style="padding-left:3%; padding-right:3%; padding-bottom:3%; float:left">Risposte:</h6>
                            </div>
                            @foreach ($Risposte as $Risposta)
                                @if ($Risposta->recensione_id == $Recensione->id)
                                    <div class="row" style=" max-width:90%; border:2px solid #DEDEDE; margin:0 auto; margin-bottom:1%">
                                        <div class="col">
                                            @foreach ($Utenti as $Utente)
                                                @if ($Utente->id == $Risposta->user_id)
                                                    <div class="row">
                                                        <div class="col">
                                                            👤{{$Utente->name}}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="row">
                                                <div class="col">
                                                    <p style="padding:3%; word-wrap: break-word">
                                                        {{$Risposta->rispostaCommento}}
                                                    </p> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <span style="padding-bottom:3%; float:right">
                                                        <form action="dropRisposta" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="RispostaId" value="{{ $Risposta->id }}">
                                                            <button type="submit" style="cursor:pointer">🗑️</button>
                                                        </form>                    
                                                    </span>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                @endif
                            @endforeach
                        @endif
                        <div class="row" style="padding:2%;width:100%">
                            <div class="col" style="margin:0 auto; text-align: center">
                                <button class="btn btn-light" type="submit" onclick="rispostaRecensione({{$Recensione->id}})" style="cursor:pointer">Rispondi</button>
                            </div>
                        </div>
                        <div class="row" style="padding:2%" id="Risposta{{$Recensione->id}}"></div>
                    </div>
                </div>
            @endif 
        @endforeach
    @endif   
    </x-slot>

</x-layout>
