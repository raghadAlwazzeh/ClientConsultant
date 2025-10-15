@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')



<form action="{{ url('/newclient/training') . (isset($id) ? '/' . $id : '')}}" method="POST">
    @csrf
    
    
    <div class="whole-container" style="width: 100%;">
        <div class="form-container">
            <label for="form" class="form-label">Ausbildungsabschluss </label>
            <div class="responsive-form">
                <div class="form-row">
                <label for="training_country">Erwerbsland <span class="req">*</span></label>
                    <select id="training_country" name="training_country" required>
                        <option value="">-- Erwerbsland --</option>
                        @foreach(config('appdata.countries') as $code => $name)
                            <option value="{{ $code }}"> {{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <label for="training_duration">Dauer Berufsausbildung (Jahre)</label>
                    <input type="text" id="training_duration" name="training_duration" >
                </div>
                <div class="form-row">
                    <label for="training_completion_year">Abschlussjahr<span class="req">*</span></label>
                    <select id="training_completion_year" name="training_completion_year"  required>
                        <option value="">-- Select Year --</option>
                        
                    </select>
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label for="training_institution">Ausbildungsinstitution</label>
                    <input type="text" id="training_institution" name="training_institution" >
                </div>
                <div class="form-row">
                    <label for="training_location">Ausbildungsort</label>
                    <input type="text" id="training_location" name="training_location" >
                </div>
                <div class="form-row">
                    <label for="training_titel">Originaltitel des Abschlusses</label>
                    <input type="text" id="training_titel" name="training_titel" >
                </div>
                <div class="form-row">
                    <label for="training_german_translate">Deutsche Übersetzung des Abschlusstitels</label>
                    <input type="text" id="training_german_translate" name="training_german_translate" >
                </div>

                <!--div class="form-row">
                <label for="reference_job">Möglicher Referenzberuf <span class="req">*</span></label>
                    <select id="refernce_job" name="refernce_job" required>
                        <option value="">-- Erwerbsland --</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label for="reference_job">Möglicher Referenzberuf <span class="req">*</span></label>
                    <input type="text" id="refernce_job" name="refernce_job" required>
                </div>

                <div class="form-row">
                    <label for="another_refernce_job">Falls Sonstiges</label>
                    <input type="text" id="another_refernce_job" name="another_refernce_job" >
                </div>
                <div class="form-row">
                    <label for="regulated">Reglementiert</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="regulated" value="yes" > Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="regulated" value="no"> Nein
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="regulated" value="kein"> Keine Zuordnung möglich
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <label for="country_regulated">Falls nicht reglementiert Länderberuf</label>
                    <input type="text" id="country_regulated" name="country_regulated" >
                </div>

                
                <!--div class="form-row">
                <label for="same_country_job">Einschlägige Berufserfahrung für diesen Beruf im Ausland </label>
                    <select id="same_country_job" name="same_country_job">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label>Einschlägige Berufserfahrung für diesen Beruf im Ausland </label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="same_country_job" value="yes"> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="same_country_job" value="no"> Nein
                        </label>
                    </div>
                </div>
            
                <div class="form-row">
                    <label for="country_job_duration">Zeitraum</label>
                    <input type="text" id="country_job_duration" name="country_job_duration" >
                </div>
                <!--div class="form-row">
                <label for="same_germany_job">Einschlägige Berufserfahrung für diesen Beruf in Deutschland </label>
                    <select id="same_germany_job" name="same_germany_job">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label>Einschlägige Berufserfahrung für diesen Beruf in Deutschland</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="same_germany_job" value="yes"> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="same_germany_job" value="no"> Nein
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <label for="germany_job_duration">Zeitraum</label>
                    <input type="text" id="germany_job_duration" name="germany_job_duration" >
                </div>
                <!--div class="form-row">
                <label for="available_certificate">Nachweise Vorhanden </label>
                    <select id="available_certificate" name="available_certificate">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label>Nachweise Vorhanden</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="available_certificate" value="yes"> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="available_certificate" value="no"> Nein
                        </label>
                    </div>
                </div>
                <!--div class="form-row">
                <label for="available_translation">Übersetzung Vorhanden</label>
                    <select id="available_translation" name="available_translation">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label>Übersetzung Vorhanden</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="available_translation" value="yes"> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="available_translation" value="no"> Nein
                        </label>
                    </div>
                </div>
            </div>
        </div>

        


        <div class="form-container">
            <label for="form" class="form-label">Antrag auf Anerkennung </label>
            <div class="responsive-form">
                <div class="form-row">
                    <label>Wurde im Rahmen des Beratungsprozesses ein Antrag gestellt? </label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="applied_application" value="yes"> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="applied_application" value="no"> Nein
                        </label>
                    </div>
                </div>
                <div class="form-row" hidden>
                
                </div>

                <!--div class="form-row">
                <label for="equivalence_assessment">Ergebnis Gleichwertigkeitsprüfung</label>
                    <select id="equivalence_assessment" name="equivalence_assessment" >
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label for="equivalence_assessment">Ergebnis Gleichwertigkeitsprüfung</label>
                    <input type="text" id="equivalence_assessment" name="equivalence_assessment" >
                </div>
                <div class="form-row">
                    <label for="equivalence_assessment_date">Datum der Antragsstellung Gleichwertigkeitsprüfung</label>
                    <input type="date" id="equivalence_assessment_date" name="equivalence_assessment_date" >
                </div>
                <!--div class="form-row">
                    <label for="evaluation_result">Ergebnis Zeugnisbewertung</label>
                    <select id="evaluation_result" name="evaluation_result">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label for="evaluation_result">Ergebnis Zeugnisbewertung</label>
                    <input type="text" id="evaluation_result" name="evaluation_result">
                </div>
                <div class="form-row">
                    <label for="evaluation_date">Datum der Antragsstellung ZAB</label>
                    <input type="date" id="evaluation_date" name="evaluation_date" >
                </div>
                <button class="btn-primary btn-form" type="submit" >Speichern</button>
                @if($id==null)
                    <a href="/newclient/universitydegree">skip</a>
                @endif
            <div>
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

