@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')


<header class="secondary-header py-2" style="
    position: fixed; 
    top: 50px; /* Adjust based on primary header height */
    width: 100%;
    margin: bottom 20px; 
    z-index: 999;
    text-align: center;">
     <nav class="navbar2 navbar-expand-lg">
    
    <div class="">
                    <ul class="nav2 navbar-nav2 navbar-left2">
                        <li ><a href="{{ route('clients.showinformation', $client->id) }}" class="nav-link">persönliche Daten</a></li>
                        <li><a href="{{ route('clients.showqualification', $client->id) }}" class="nav-link">Qualificationen</a></li>
                        <li><a href="{{ route('conversationprotocol.showall', $client->id) }}"  class="nav-link">Gesprächsprotokolle</a></li>
                        <li><a href="{{ route('task.show', $client->id) }}"  class="nav-link">Aufgaben</a></li>
                        <li><a href="{{ route('calendar', $client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $client->id) }}"  class="nav-link">Dokument</a></li>

                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>

<div class="whole-container" style="width: 100%;">
    <h3> {{$client->last_name }}, {{$client->first_name }}    </h3>    
    <div class="table-container table-responsive">
        <h4>Gesprächsprotokolle</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Datum</th>
                <th>Betreff</th>
                <th>Kontaktart</th>
                <th>wer wurde beraten</th>
                <th>Bearbeiter</th>
                <th></th>
                </tr>
            </thead>
            <tbody id="clientTable"> 
            @if($client->sessionProtocol->isNotEmpty())  
            @foreach($client->sessionProtocol as $session)   
                <tr class="clickable-row" data-href="{{url('showconversationprotocol/'.$session->id)}}">
                <td>{{ $session->subject }}</td>
                <td>{{ $session->consultation_date }}</td>
                <td>{{ $session->contact_type }}</td>
                <td>{{ $session->advice_seeker }}</td>
                <td>{{ $session->consultant->name }}</td>
                <td style="width: 10%;"><a href><button class="btn-table">bearbeiten</button></a></td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center">Keine Anträge vorhanden</td>
            </tr>
        @endif
        <tr class="clickable-row" data-href="{{route('conversationprotocol.new', $client->id)}}">
            <td colspan="6" class="text-center"><b>Neues Gesprächsprotokoll aufnehmen</b></td>
        </tr>
            </tbody>
        </table>
    </div>


</div>       


        

        
   




    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

@stop

