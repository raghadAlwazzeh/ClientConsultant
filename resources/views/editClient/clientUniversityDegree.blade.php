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


<form action="{{ route('universitydegree.update', $education->id) }}" method="POST">
    @csrf
    @method('PATCH')
    
    <div class="whole-container" style="width: 100%;">
    <h3> {{$education->client->last_name}}, {{$education->client->first_name}}</h3>
        <div class="form-container">
            <label for="form" class="form-label">Hochschulabschluss </label>
            <div class="responsive-form">
                <div class="form-row">
                <label for="country">Erwerbsland <span class="req">*</span></label>
                <select id="country" name="country" required>
                    <option value="">-- Erwerbsland --</option>
                    <option value="usa" {{ $education->country == 'usa' ? 'selected' : '' }}>United States</option>
                    <option value="canada" {{ $education->country == 'canada' ? 'selected' : '' }}>Canada</option>
                    <option value="uk" {{ $education->country == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="india" {{ $education->country == 'india' ? 'selected' : '' }}>India</option>
                    <option value="australia" {{ $education->country == 'australia' ? 'selected' : '' }}>Australia</option>
                </select>
                </div>
                <div class="form-row">
                    <label for="study_duration">Dauer des Studium</label>
                    <input type="text" id="study_duration" name="study_duration" value="{{$education->study_duration}}">
                </div>
                <div class="form-row">
                    <label for="graduation_year">Jahr des Hochschulabschluss<span class="req">*</span></label>
                    <select id="graduation_year" name="graduation_year"  required>
                        <option value="">-- Select Year --</option>
                        <option value="{{$education->graduation_year}}" selected>{{$education->graduation_year}}</option>
                        
                    </select>
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label for="study_institution">Ausbildungsinstitution</label>
                    <input type="text" id="study_institution" name="study_institution" value="{{$education->study_institution}}">
                </div>
                <div class="form-row">
                    <label for="study_location">Ausbildungsort</label>
                    <input type="text" id="study_location" name="study_location" value="{{$education->study_location}}">
                </div>
                <div class="form-row">
                    <label for="study_titel">Originaltitel des Abschlusses</label>
                    <input type="text" id="study_titel" name="study_titel" value="{{$education->study_titel}}">
                </div>
                <div class="form-row">
                    <label for="study_german_translate">Deutsche Übersetzung des Abschlusstitels</label>
                    <input type="text" id="study_german_translate" name="study_german_translate" value="{{$education->study_german_translate}}">
                </div>

                <div class="form-row">
                <label for="reference_job">Möglicher Referenzberuf <span class="req">*</span></label>
                    <select id="refernce_job" name="refernce_job" required>
                        <option value="">-- Referenzberuf --</option>
                        <option value="usa" {{ $education->refernce_job == 'usa' ? 'selected' : '' }}>United States</option>
                    <option value="canada" {{ $education->refernce_job == 'canada' ? 'selected' : '' }}>Canada</option>
                    <option value="uk" {{ $education->refernce_job == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="india" {{ $education->refernce_job == 'india' ? 'selected' : '' }}>India</option>
                    <option value="australia" {{ $education->refernce_job == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="another_refernce_job">Falls Sonstiges</label>
                    <input type="text" id="another_refernce_job" name="another_refernce_job" value="{{$education->another_refernce_job}}">
                </div>
                <div class="form-row">
                    <label for="regulated">Reglementiert</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="regulated" value="yes" {{ $education->regulated == 'yes' ? 'checked' : '' }}> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="regulated" value="no" {{ $education->regulated == 'no' ? 'checked' : '' }}> Nein
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="regulated" value="kein" {{ $education->regulated == 'kein' ? 'checked' : '' }}> Keine Zuordnung möglich
                        </label>
                    </div>
                                    </div>
                <div class="form-row">
                    <label for="country_regulated">Falls nicht reglementiert Länderberuf</label>
                    <input type="text" id="country_regulated" name="country_regulated" value="{{$education->country_regulated}}">
                </div>

                
                <div class="form-row">
                <label for="same_country_job">Einschlägige Berufserfahrung für diesen Beruf im Ausland </label>
                    <select id="same_country_job" name="same_country_job">
                        <option value="">----</option>
                        <option value="usa" {{ $education->same_country_job == 'usa' ? 'selected' : '' }}>United States</option>
                    <option value="canada" {{ $education->same_country_job == 'canada' ? 'selected' : '' }}>Canada</option>
                    <option value="uk" {{ $education->same_country_job == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="india" {{ $education->same_country_job == 'india' ? 'selected' : '' }}>India</option>
                    <option value="australia" {{ $education->same_country_job == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="country_job_duration">Zeitraum</label>
                    <input type="text" id="country_job_duration" name="country_job_duration" value="{{$education->country_job_duration}}">
                </div>
                <div class="form-row">
                <label for="same_germany_job">Einschlägige Berufserfahrung für diesen Beruf in Deutschland </label>
                    <select id="same_germany_job" name="same_germany_job">
                        <option value="">----</option>
                        <option value="usa" {{ $education->same_germany_job == 'usa' ? 'selected' : '' }}>United States</option>
                    <option value="canada" {{ $education->same_germany_job == 'canada' ? 'selected' : '' }}>Canada</option>
                    <option value="uk" {{ $education->same_germany_job == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="india" {{ $education->same_germany_job == 'india' ? 'selected' : '' }}>India</option>
                    <option value="australia" {{ $education->same_germany_job == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="germany_job_duration">Zeitraum</label>
                    <input type="text" id="germany_job_duration" name="germany_job_duration" value="{{$education->germany_job_duration}}">
                </div>
                <div class="form-row">
                <label for="available_certificate">Nachweise Vorhanden </label>
                    <select id="available_certificate" name="available_certificate">
                        <option value="">----</option>
                        <option value="usa" {{ $education->available_certificate == 'usa' ? 'selected' : '' }}>United States</option>
                    <option value="canada" {{ $education->available_certificate == 'canada' ? 'selected' : '' }}>Canada</option>
                    <option value="uk" {{ $education->available_certificate == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="india" {{ $education->available_certificate == 'india' ? 'selected' : '' }}>India</option>
                    <option value="australia" {{ $education->available_certificate == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row">
                <label for="available_translation">Übersetzung Vorhanden</label>
                    <select id="available_translation" name="available_translation">
                        <option value="">----</option>
                        <option value="usa" {{ $education->available_translation == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $education->available_translation == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $education->available_translation == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $education->available_translation == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $education->available_translation == 'australia' ? 'selected' : '' }}>Australia</option>
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
                            <input type="radio" name="applied_application" value="yes" {{ $education->applied_application == 'yes' ? 'checked' : '' }} required> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="applied_application" value="no" {{ $education->applied_application == 'no' ? 'checked' : '' }}> Nein
                        </label>
                    </div>

                </div>
                <div class="form-row" hidden>
                
                </div>

                <div class="form-row">
                <label for="equivalence_assessment">Ergebnis Gleichwertigkeitsprüfung</label>
                    <select id="equivalence_assessment" name="equivalence_assessment" >
                        <option value="">----</option>
                        <option value="usa" {{ $education->equivalence_assessment == 'usa' ? 'selected' : '' }}>United States</option>
                    <option value="canada" {{ $education->equivalence_assessment == 'canada' ? 'selected' : '' }}>Canada</option>
                    <option value="uk" {{ $education->equivalence_assessment == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="india" {{ $education->equivalence_assessment == 'india' ? 'selected' : '' }}>India</option>
                    <option value="australia" {{ $education->equivalence_assessment == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="equivalence_assessment_date">Datum der Antragsstellung Gleichwertigkeitsprüfung</label>
                    <input type="date" id="equivalence_assessment_date" name="equivalence_assessment_date" value="{{$education->equivalence_assessment_date}}">
                </div>
                <div class="form-row">
                    <label for="evaluation_result">Ergebnis Zeugnisbewertung</label>
                    <select id="evaluation_result" name="evaluation_result">
                        <option value="">----</option>
                        <option value="usa" {{ $education->evaluation_result == 'usa' ? 'selected' : '' }}>United States</option>
                    <option value="canada" {{ $education->evaluation_result == 'canada' ? 'selected' : '' }}>Canada</option>
                    <option value="uk" {{ $education->evaluation_result == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="india" {{ $education->evaluation_result == 'india' ? 'selected' : '' }}>India</option>
                    <option value="australia" {{ $education->evaluation_result == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="evaluation_date">Datum der Antragsstellung ZAB</label>
                    <input type="date" id="evaluation_date" name="evaluation_date" value="{{$education->evaluation_date}}">
                </div>
                <button class="btn-primary btn-form" type="submit" >Speichern</button>
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

