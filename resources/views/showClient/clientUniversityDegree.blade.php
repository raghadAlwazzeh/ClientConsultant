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
                        <li><a href="{{ route('task.show', $education->client->id) }}"  class="nav-link">Aufgaben</a></li>
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
            <label for="form" class="form-label">Hochschulabschluss </label>
            <div class="responsive-form">
                <div class="info-row">
                    <label class="information-label">Erwerbsland </label> <span>{{ $education->country  }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Dauer des Studium</label> <span>{{ $education->study_duration }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Jahr des Hochschulabschluss</label> <span>{{ $education->graduation_year }}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                <div class="info-row">
                    <label class="information-label">Ausbildungsinstitution</label> <span>{{ $education->study_institution }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Ausbildungsort</label> <span>{{ $education->study_location }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Originaltitel des Abschlusses</label> <span>{{ $education->study_titel}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Deutsche Übersetzung des Abschlusstitels</label> <span>{{$education->study_german_translate}}</span>
                </div>

                <div class="info-row">
                    <label class="information-label">Möglicher Referenzberuf</label> <span>{{ $education->refernce_job  }}</span>   
                </div>
                <div class="info-row">
                    <label class="information-label">Falls Sonstiges</label> <span>{{ $education->another_refernce_job}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Reglementiert</label> <span>{{ $education->regulated }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Falls nicht reglementiert Länderberuf</label> <span>{{ $education->country_regulated }}</span>
                </div>

                
                <div class="info-row">
                    <label for="same_country_job">Einschlägige Berufserfahrung für diesen Beruf im Ausland </label> <span>{{ $education->same_country_job }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Zeitraum</label> <span>{{ $education->country_job_duration }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Einschlägige Berufserfahrung für diesen Beruf in Deutschland </label> <span>{{ $education->same_germany_job  }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Zeitraum</label> <span>{{ $education->germany_job_duration }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Nachweise Vorhanden </label> <span>{{ $education->available_certificate }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Übersetzung Vorhanden</label> <span>{{ $education->available_translation }}</span>
                </div>
            </div>
        </div>

        


        <div class="info-container">
            <label for="form" class="form-label">Antrag auf Anerkennung </label> 
            <div class="responsive-form">
                <div class="info-row">
                    <label class="information-label">Wurde im Rahmen des Beratungsprozesses ein Antrag gestellt? </label> <span>{{ $education->applied_application }}</span>
                </div>
                <div class="info-row" hidden>
                
                </div>

                <div class="info-row">
                    <label class="information-label">Ergebnis Gleichwertigkeitsprüfung</label> <span>{{ $education->equivalence_assessment }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Datum der Antragsstellung Gleichwertigkeitsprüfung</label> <span>{{ $education->equivalence_assessment_date}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Ergebnis Zeugnisbewertung</label> <span>{{ $education->evaluation_result }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Datum der Antragsstellung ZAB</label> <span>{{ $education->evaluation_date }}</span>
                </div>
                <a href="{{ route('universitydegree.edit', $education->id) }}"><button class="btn-primary">bearbeiten</button></a>
            <div>
        </div>

        
    
    </div>




    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

@stop

