@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')



<form action="{{ url('/newclient/universitydegree' . (isset($id) ? '/' . $id : '')) }}" method="POST">
    @csrf
    
    
    <div class="whole-container" style="width: 100%;">
        <div class="form-container">
            <label for="form" class="form-label">Hochschulabschluss </label>
            <div class="responsive-form">
                <div class="form-row">
                <label for="country">Erwerbsland <span class="req">*</span></label>
                    <select id="country" name="country" required>
                        <option value="">-- Erwerbsland --</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="study_duration">Dauer des Studium</label>
                    <input type="text" id="study_duration" name="study_duration" >
                </div>
                <div class="form-row">
                    <label for="graduation_year">Jahr des Hochschulabschluss<span class="req">*</span></label>
                    <select id="graduation_year" name="graduation_year"  required>
                        <option value="">-- Select Year --</option>
                        
                    </select>
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label for="study_institution">Ausbildungsinstitution</label>
                    <input type="text" id="study_institution" name="study_institution" >
                </div>
                <div class="form-row">
                    <label for="study_location">Ausbildungsort</label>
                    <input type="text" id="study_location" name="study_location" >
                </div>
                <div class="form-row">
                    <label for="study_titel">Originaltitel des Abschlusses</label>
                    <input type="text" id="study_titel" name="study_titel" >
                </div>
                <div class="form-row">
                    <label for="study_german_translate">Deutsche Übersetzung des Abschlusstitels</label>
                    <input type="text" id="study_german_translate" name="study_german_translate" >
                </div>

                <div class="form-row">
                <label for="reference_job">Möglicher Referenzberuf <span class="req">*</span></label>
                    <select id="refernce_job" name="refernce_job" required>
                        <option value="">-- Referenzberuf --</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
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

                
                <div class="form-row">
                <label for="same_country_job">Einschlägige Berufserfahrung für diesen Beruf im Ausland </label>
                    <select id="same_country_job" name="same_country_job">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="country_job_duration">Zeitraum</label>
                    <input type="text" id="country_job_duration" name="country_job_duration" >
                </div>
                <div class="form-row">
                <label for="same_germany_job">Einschlägige Berufserfahrung für diesen Beruf in Deutschland </label>
                    <select id="same_germany_job" name="same_germany_job">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="germany_job_duration">Zeitraum</label>
                    <input type="text" id="germany_job_duration" name="germany_job_duration" >
                </div>
                <div class="form-row">
                <label for="available_certificate">Nachweise Vorhanden </label>
                    <select id="available_certificate" name="available_certificate">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                <label for="available_translation">Übersetzung Vorhanden</label>
                    <select id="available_translation" name="available_translation">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
            </div>
        </div>

        


        <div class="form-container">
            <label for="form" class="form-label">Antrag auf Anerkennung </label>
            <div class="responsive-form">
                <div class="form-row">
                    <label>Wurde im Rahmen des Beratungsprozesses ein Antrag gestellt? <span class="req">*</span></label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="applied_application" value="yes" required> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="applied_application" value="no"> Nein
                        </label>
                    </div>
                </div>
                <div class="form-row" hidden>
                
                </div>

                <div class="form-row">
                <label for="equivalence_assessment">Ergebnis Gleichwertigkeitsprüfung</label>
                    <select id="equivalence_assessment" name="equivalence_assessment" >
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="equivalence_assessment_date">Datum der Antragsstellung Gleichwertigkeitsprüfung</label>
                    <input type="date" id="equivalence_assessment_date" name="equivalence_assessment_date" >
                </div>
                <div class="form-row">
                    <label for="evaluation_result">Ergebnis Zeugnisbewertung</label>
                    <select id="evaluation_result" name="evaluation_result">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="evaluation_date">Datum der Antragsstellung ZAB</label>
                    <input type="date" id="evaluation_date" name="evaluation_date" >
                </div>
                <button class="btn-primary btn-form" type="submit" >Submit</button>
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

