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
                        <li><a href="{{ route('clients.showinformation', $training->client->id) }}" class="nav-link">persönliche Daten</a></li>
                        <li><a href="{{ route('clients.showqualification', $training->client->id) }}" class="nav-link">Qualificationen</a></li>
                        <li><a href="{{ route('conversationprotocol.showall', $training->client->id) }}"  class="nav-link">Gesprächsprotokolle</a></li>
                        <li><a href="{{ url('calendar/'. $training->client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $training->client->id) }}"  class="nav-link">Dokument</a></li>
                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>


    
    <div class="whole-container" style="width: 100%;">
    <h3> {{$training->client->last_name}}, {{$training->client->first_name}}</h3>
        <div class="info-container">
            <label for="form" class="form-label">Ausbildungsabschluss </label>
            <div class="responsive-info">
                <div class="info-row">
                    <label class="information-label">Erwerbsland </label> <span>{{ $training->training_country }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Dauer Berufsausbildung (Jahre)</label> <span>{{ $training->training_duration }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Abschlussjahr</label> <span>{{ $training->training_completion_year }}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                <div class="info-row">
                    <label class="information-label">Ausbildungsinstitution</label> <span>{{ $training->training_institution }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Ausbildungsort</label> <span>{{ $training->training_location}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Originaltitel des Abschlusses</label> <span>{{$training->training_titel}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Deutsche Übersetzung des Abschlusstitels</label> <span>{{ $training->training_german_translate}}</span>
                </div>

                <div class="info-row">
                    <label class="information-label">Möglicher Referenzberuf </label> <span>{{ $training->refernce_job }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Falls Sonstiges</label> <span>{{ $training->another_refernce_job }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Reglementiert</label> <span>{{ $training->regulated }}</span>
                    
                </div>
                <div class="info-row">
                    <label class="information-label">Falls nicht reglementiert Länderberuf</label> <span>{{$training->country_regulated}}</span>
                </div>
                
                <div class="info-row">
                    <label class="information-label">Einschlägige Berufserfahrung für diesen Beruf im Ausland </label> <span>{{ $training->same_country_job }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Zeitraum</label> <span>{{ $training->country_job_duration }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Einschlägige Berufserfahrung für diesen Beruf in Deutschland </label> <span>{{ $training->same_germany_job }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Zeitraum</label> <span>{{ $training->germany_job_duration }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Nachweise Vorhanden </label> <span>{{ $training->available_certificate  }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Übersetzung Vorhanden</label> <span>{{ $training->available_translation }}</span>
                </div>
            </div>
        </div>

        


        <div class="info-container">
            <label for="form" class="form-label">Antrag auf Anerkennung </label>
            <div class="responsive-info">
                <div class="info-row">
                    <label class="information-label">Wurde im Rahmen des Beratungsprozesses ein Antrag gestellt? </label> <span>{{ $training->available_translation }}</span>
                </div>
                <div class="info-row" hidden>
                
                </div>

                <div class="info-row">
                    <label class="information-label">Ergebnis Gleichwertigkeitsprüfung</label> <span>{{ $training->equivalence_assessment}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Datum der Antragsstellung Gleichwertigkeitsprüfung</label> <span>{{ $training->equivalence_assessment_date}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Ergebnis Zeugnisbewertung</label> <span>{{ $training->evaluation_result}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Datum der Antragsstellung ZAB</label> <span>{{ $training->evaluation_date }}</span>
                </div>
                <a href="{{ route('training.edit', $training->id) }}"><button class="btn-primary">bearbeiten</button></a>
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

