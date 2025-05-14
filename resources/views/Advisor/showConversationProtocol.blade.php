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
                        <li ><a href="{{ route('clients.showinformation', $conversation->client->id) }}" class="nav-link">persönliche Daten</a></li>
                        <li><a href="{{ route('clients.showqualification', $conversation->client->id) }}" class="nav-link">Qualificationen</a></li>
                        <li><a href="{{ route('conversationprotocol.showall', $conversation->client->id) }}"  class="nav-link">Gesprächsprotokolle</a></li>
                        <li><a href="{{ route('task.show', $conversation->client->id) }}"  class="nav-link">Aufgaben</a></li>
                        <li><a href="{{ route('calendar', $conversation->client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $conversation->client->id) }}"  class="nav-link">Dokument</a></li>

                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>


    <div class="whole-container" style="width: 100%;">
    <h3> {{$conversation->client->last_name}}, {{$conversation->client->first_name}}</h3>
        <div class="info-container">
            <label class="information-label" for="form" class="form-label">Allgemeine Angaben </label>
            <div class="responsive-info">
                <div class="info-row">
                    <label class="information-label" for="subject">Betreff</label> <span>{{ $conversation->subject  }}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                <div class="info-row">
                    <label class="information-label">Kontaktart </label> <span>{{ $conversation->contact_type  }}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                <div class="info-row">
                    <label class="information-label" for="consultation_date">Datum</label> <span>{{ $conversation->consultation_date}}</span>
                </div>
                <div class="info-row" hidden>


                </div>
                <div class="info-row">
                <label class="information-label" for="advice_seeker">wer wurde beraten </label> <span>{{ $conversation->advice_seeker}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label" for="another_advisor">wer wurde beraten Sonstiges </label> <span>{{ $conversation->another_advice_seeker}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label" for="consultation_type">Beratungsart </label> <span>{{ $conversation->consultation_type}}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                <div class="info-row">
                    <label class="information-label" for="duration">Dauer </label> <span>{{ $conversation->duration}}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                <div class="info-row">
                    <label class="information-label" for="another_help_system">Anderes Helfersystem/ Verwiesen an</label> <span>{{ $conversation->another_help_system }}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                <div class="info-row">
                    <label class="information-label" for="anerkennend_help">falls Anerkennende Stelle</label> <span>{{ $conversation->anerkennend_help}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label" for="iq_help">falls IQ Projekt</label> <span>{{ $conversation->iq_help}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label" for="another_advisor_help">falls Andere Beratungsstelle</label> <span>{{ $conversation->another_advisor_help}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label" for="other_help">falls Sonstiges</label> <span>{{ $conversation->other_help }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label" for="consultation_language">Sprache des Beratungsgesprächs </label> <span>{{ $conversation->consultation_language}}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Dolmetcher/ in anwesend?</label> <span>{{ $conversation->interpreter}}</span>
                </div>
                <div class="info-row">
                    <label for="data_processing_consent">
                    <input type="checkbox" id="data_processing_consent" name="data_processing_consent" value="1" disabled
{{ $conversation->data_processing_consent ? 'checked' : '' }} >
                    Mündliche Einwilligung zur Datenverarbeitung
                    </label>
                </div>
                <div class="info-row" hidden>
                </div>
                <div class="info-row">
                    <label>
                        <input type="checkbox" id="survey_contact_consent" name="survey_contact_consent" value="1"  disabled
                        {{ $conversation->survey_contact_consent ? 'checked' : '' }}>
                        Kontaktaufnahme für Begragung
                    </label>  
                </div>
            
            </div>
        </div>

        <div class="info-container">
            <label for="form" class="form-label">Anmerkungen zum aktuellen Verfahren/ Vereinbarungen/ Gesprächsverlauf </label>
            <div class="responsive-info" >
                <div class="info-row">
                    <label class="information-label" for="notes_and_agreements">Anmerkungen/ Vereinbarungen</label> <span>{{ $conversation->notes_and_agreements }}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                
            </div>
        </div>


        <div class="info-container">
            <label for="form" class="form-label">Terminierte Aufgaben für die Beratungsfachkraft </label> 
            <div class="responsive-info">
                <div class="info-row">
                    <label class="information-label" for="task_date">Datum</label> <span>{{ $conversation->task_date }}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                <div class="info-row">
                    <label class="information-label" for="task_subject">Betreff</label> <span>{{ $conversation->task_subject}}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                <div class="info-row">
                    <label class="information-label" for="scheduled_task">Terminierte Aufgabe</label> <span>{{ $conversation->scheduled_task}}</span>
                </div>
                <div class="info-row" hidden>
                </div>
                
                
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

