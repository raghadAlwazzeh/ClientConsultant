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
<h3> {{$client->last_name}}, {{$client->first_name}}</h3>
<form action="{{ route('conversationprotocol.new', $client->id) }}" method="POST">
    @csrf
    <div class="whole-container" style="width: 100%;">
        <div class="form-container">
            <label for="form" class="form-label">Allgemeine Angaben </label>
            <div class="responsive-form">
                <div class="form-row">
                    <label for="subject">Betreff</label>
                    <input type="text" id="subject" name="subject" >
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label>Kontaktart <span class="req">*</span></label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="contact_type" value="first_consultation" required> Erstberatung
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="contact_type" value="follow_up_consultation"> Folgebratung
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="contact_type" value="other"> Sonstiger Kontakt
                        </label>
                    </div>
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label for="consultation_date">Datum</label>
                    <input type="date" id="consultation_date" name="consultation_date" >
                </div>
                <div class="form-row" hidden>


                </div>
                <div class="form-row">
                <label for="advice_seeker">wer wurde beraten <span class="req">*</span></label>
                    <select id="advice_seeker" name="advice_seeker" required>
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="another_advisor">wer wurde beraten Sonstiges </label>
                    <input type="text" id="another_advisor" name="another_advisor">
                </div>
                <div class="form-row">
                    <label for="consultation_type">Beratungsart <span class="req">*</span></label>
                    <select id="consultation_type" name="consultation_type" required>
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label for="duration">Dauer <span class="req">*</span></label>
                    <select id="duration" name="duration" required>
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label for="another_help_system">Anderes Helfersystem/ Verwiesen an</label>
                    <select id="another_help_system" name="another_help_system">
                        <option value="">----</option>
                        <option value="Jobcenter">Jobcenter</option>
                        <option value="Agentur für Arbeit">Agentur für Arbeit</option>
                        <option value="MBE/ JMD">MBE/ JMD</option>
                        <option value="Anerkennende Stelle">Anerkennende Stelle</option>
                        <option value="Bildungsträger">Bildungsträger</option>
                        <option value="Sprachkuesträger">Sprachkuesträger</option>
                        <option value="Unternehmen">Unternehmen</option>
                        <option value="IQ Projekt">IQ Projekt</option>
                        <option value="IQ Infostelle (HSP 4) ">IQ Infostelle (HSP 4)</option>
                        <option value="ZAB">ZAB</option>
                    </select>
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label for="anerkennend_help">falls Anerkennende Stelle</label>
                    <input type="text" id="anerkennend_help" name="anerkennend_help" >
                </div>
                <div class="form-row">
                    <label for="iq_help">falls IQ Projekt</label>
                    <input type="text" id="iq_help" name="iq_help" >
                </div>
                <div class="form-row">
                    <label for="another_advisor_help">falls Andere Beratungsstelle</label>
                    <input type="text" id="another_advisor_help" name="another_advisor_help" >
                </div>
                <div class="form-row">
                    <label for="other_help">falls Sonstiges</label>
                    <input type="text" id="other_help" name="other_help" >
                </div>
                <div class="form-row">
                    <label for="consultation_language">Sprache des Beratungsgesprächs <span class="req">*</span></label>
                    <select id="consultation_language" name="consultation_language" required>
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label>Dolmetcher/ in anwesend?</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="interpreter" value="yes"> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="interpreter" value="no"> Nein
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <label for="data_processing_consent">
                    <input type="checkbox" id="data_processing_consent" name="data_processing_consent" value="1">
                    Mündliche Einwilligung zur Datenverarbeitung
                    </label>
</div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label>
                        <input type="checkbox" id="survey_contact_consent" name="survey_contact_consent" value="1">
                        Kontaktaufnahme für Begragung
                    </label>  
                </div>
            
            </div>
        </div>

        <div class="form-container">
            <label for="form" class="form-label">Anmerkungen zum aktuellen Verfahren/ Vereinbarungen/ Gesprächsverlauf </label>
            <div class="responsive-form" >
                <div class="form-row">
                    <label for="notes_and_agreements">Anmerkungen/ Vereinbarungen</label>
                    <textarea id="notes_and_agreements" name="notes_and_agreements"></textarea>
                </div>
                <div class="form-row" hidden>
                </div>
                
            </div>
        </div>


        <div class="form-container">
            <label for="form" class="form-label">Terminierte Aufgaben für die Beratungsfachkraft </label>
            <div class="responsive-form">
                <div class="form-row">
                    <label for="task_date">Datum</label>
                    <input type="date" id="task_date" name="task_date" >
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label for="task_subject">Betreff</label>
                    <input type="text" id="task_subject" name="task_subject" >
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label for="scheduled_task">Terminierte Aufgabe</label>
                    <textarea id="scheduled_task" name="scheduled_task"></textarea>
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <button class="btn-primary btn-form" type="submit" style="width: fit-content;">Datenblock Speichern</button>
                </div>
                
            </div>
        </div>

        
    
    </div>
</form>



    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

@stop

