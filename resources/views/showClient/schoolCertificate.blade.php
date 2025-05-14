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
                        <li><a href="{{ route('clients.showinformation', $education->client->id) }}" class="nav-link">persönliche Daten</a></li>
                        <li><a href="{{ route('clients.showqualification', $education->client->id) }}" class="nav-link">Qualificationen</a></li>
                        <li><a href="{{ route('conversationprotocol.showall', $education->client->id) }}"  class="nav-link">Gesprächsprotokolle</a></li>
                        <li><a href="{{ url('calendar/'. $education->client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $education->client->id) }}"  class="nav-link">Dokument</a></li>
                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>


    
    <div class="whole-container" style="width: 100%;">
        <h3> {{$education->client->last_name}}, {{$education->client->first_name}}</h3>
        <div class="info-container">
            <label for="form" class="form-label">Schulicherabschluss </label>
            <div class="responsive-info">
                <div class="info-row">
                    <label class="information-label">Erwerbsland</label> <span>{{ $education->school_country  }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Dauer Schulbildung (Jahr)</label> <span>{{ $education->school_study_duration  }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Abschlussjahr</label> <span>{{ $education->school_graduation_year  }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">vergleichbares Abschluss-Niveau </label> <span>{{ $education->qualification_level  }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Ausbildungsinstitution</label> <span>{{$education->school_institution}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Ausbildungsort</label> <span>{{$education->school_location}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Originaltitel des Abschlusses</label> <span>{{$education->school_study_titel  }}</span>
                </div>
                    <div class="info-row">
                    <label class="information-label">Deutsche Übersetzung des Abschlusstitels</label> <span>{{ $education->school_german_translate  }}</span>
                </div>

                <div class="info-row">
                    <label class="information-label">Nachweise Vorhanden </label> <span>{{ $education->school_available_certificate  }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Übersetzung Vorhanden</label> <span>{{ $education->school_available_translation  }}</span>
                </div>
                <a href="{{ route('schooleducation.edit', $education->id) }}"><button class="btn-primary">bearbeiten</button></a>
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

