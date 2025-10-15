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
                        <li><a href="{{ route('clients.showinformation', $language->client->id) }}" class="nav-link">persönliche Daten</a></li>
                        <li><a href="{{ route('clients.showqualification', $language->client->id) }}" class="nav-link">Qualificationen</a></li>
                        <li><a href="{{ route('conversationprotocol.showall', $language->client->id) }}"  class="nav-link">Gesprächsprotokolle</a></li>
                        <li><a href="{{ route('task.show', $client->id) }}"  class="nav-link">Aufgaben</a></li>
                        <li><a href="{{ url('calendar/'. $language->client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $language->client->id) }}"  class="nav-link">Dokument</a></li>
                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>


    <div class="whole-container" style="width: 100%;">
        <h3> {{$language->client->last_name}}, {{$language->client->first_name}}</h3>
        <div class="info-container">
            <label for="form" class="form-label">SprachKenntnisse</label>
            <div class="responsive-info">
                <div class="info-row">
                    <label class="information-label">DeutchKenntnisse der/des Ratsuchenden</label> <span>{{$language->german_skill}}</span>
                </div>
                <div class="info-row" hidden>
                    
                </div>
                <div class="info-row">
                    <label class="information-label">Wenn als Fremdsprache Zertifikat vorhanden?</label> <span>{{ $language->german_certificate }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Wenn Zertifikatvorhanden, auf welchem Niveau?</label> <span>{{ $language->german_level }}</span>
                </div>
                <a href="{{ route('languageskill.edit', $language->id) }}"><button class="btn-primary">bearbeiten</button></a>
                
                
                
            </div>
        </div>

        


        

        
    
    </div>




    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

@stop

