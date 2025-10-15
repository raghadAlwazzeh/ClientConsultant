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
                        <li><a href="{{ route('task.show', $training->client->id) }}"  class="nav-link">Aufgaben</a></li>
                        <li><a href="{{ url('calendar/'. $training->client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $training->client->id) }}"  class="nav-link">Dokument</a></li>
                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>

<form action="{{ route('training.update', $training->id) }}" method="POST">
    @csrf
    @method('PATCH')
    
    <div class="whole-container" style="width: 100%;">
    <h3> {{$training->client->last_name}}, {{$training->client->first_name}}</h3>
        <div class="form-container">
            <label for="form" class="form-label">Ausbildungsabschluss </label>
            <div class="responsive-form">
                <div class="form-row">
                <label for="training_country">Erwerbsland <span class="req">*</span></label>
                    <select id="training_country" name="training_country" required>
                        <option value="">-- Erwerbsland --</option>
                        @foreach(config('appdata.countries') as $code => $name)
                            <option value="{{ $code }}"> {{ $name }} {{ $training->training_country == $code ? 'selected' : '' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <label for="training_duration">Dauer Berufsausbildung (Jahre)</label>
                    <input type="text" id="training_duration" name="training_duration" value="{{$training->training_duration}}">
                </div>
                <div class="form-row">
                    <label for="training_completion_year">Abschlussjahr<span class="req">*</span></label>
                    <input type="text" id="training_completion_year" name="training_completion_year" value="{{$training->training_completion_year}}">
                </div>
                <div class="form-row" hidden>
                </div>
                <div class="form-row">
                    <label for="training_institution">Ausbildungsinstitution</label>
                    <input type="text" id="training_institution" name="training_institution" value="{{$training->training_institution}}">
                </div>
                <div class="form-row">
                    <label for="training_location">Ausbildungsort</label>
                    <input type="text" id="training_location" name="training_location" value="{{$training->training_location}}">
                </div>
                <div class="form-row">
                    <label for="training_titel">Originaltitel des Abschlusses</label>
                    <input type="text" id="training_titel" name="training_titel" value="{{$training->training_titel}}">
                </div>
                <div class="form-row">
                    <label for="training_german_translate">Deutsche Übersetzung des Abschlusstitels</label>
                    <input type="text" id="training_german_translate" name="training_german_translate" value="{{$training->training_german_translate}}">
                </div>

                <!--div class="form-row">
                <label for="reference_job">Möglicher Referenzberuf <span class="req">*</span></label>
                    <select id="refernce_job" name="refernce_job" required>
                        <option value="">-- Erwerbsland --</option>
                        <option value="usa" {{ $training->refernce_job == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $training->refernce_job == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $training->refernce_job == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $training->refernce_job == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $training->refernce_job == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label for="reference_job">Möglicher Referenzberuf <span class="req">*</span></label>
                    <input type="text" id="refernce_job" name="refernce_job" value="$training->refernce_job">
                </div>

                <div class="form-row">
                    <label for="another_refernce_job">Falls Sonstiges</label>
                    <input type="text" id="another_refernce_job" name="another_refernce_job" value="{{$training->another_refernce_job}}">
                </div>
                <div class="form-row">
                    <label for="regulated">Reglementiert</label>
                    <div class="choice-group">
                    <label class="choice-label">
                            <input type="radio" name="regulated" value="yes" {{ $training->regulated == 'yes' ? 'checked' : '' }}> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="regulated" value="no" {{ $training->regulated == 'no' ? 'checked' : '' }}> Nein
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="regulated" value="kein" {{ $training->regulated == 'kein' ? 'checked' : '' }}> Keine Zuordnung möglich
                        </label>
                        
                    </div>
                </div>
                <div class="form-row">
                    <label for="country_regulated">Falls nicht reglementiert Länderberuf</label>
                    <input type="text" id="country_regulated" name="country_regulated" value="{{$training->country_regulated}}">
                </div>

                
                <!--div class="form-row">
                <label for="same_country_job">Einschlägige Berufserfahrung für diesen Beruf im Ausland </label>
                    <select id="same_country_job" name="same_country_job">
                        <option value="">----</option>
                        <option value="usa" {{ $training->same_country_job == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $training->same_country_job == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $training->same_country_job == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $training->same_country_job == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $training->same_country_job == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label>Einschlägige Berufserfahrung für diesen Beruf im Ausland </label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="same_country_job" value="yes" {{ $training->same_country_job == 'yes' ? 'checked' : '' }}> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="same_country_job" value="no" {{ $training->same_country_job == 'no' ? 'checked' : '' }}> Nein
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <label for="country_job_duration">Zeitraum</label>
                    <input type="text" id="country_job_duration" name="country_job_duration" value="{{$training->country_job_duration}}">
                </div>
                <!--div class="form-row">
                <label for="same_germany_job">Einschlägige Berufserfahrung für diesen Beruf in Deutschland </label>
                    <select id="same_germany_job" name="same_germany_job">
                        <option value="">----</option>
                        <option value="usa" {{ $training->same_germany_job == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $training->same_germany_job == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $training->same_germany_job == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $training->same_germany_job == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $training->same_germany_job == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label>Einschlägige Berufserfahrung für diesen Beruf in Deutschland</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="same_germany_job" value="yes" {{ $training->same_germany_job == 'yes' ? 'checked' : '' }}> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="same_germany_job" value="no" {{ $training->same_germany_job == 'no' ? 'checked' : '' }}> Nein
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <label for="germany_job_duration">Zeitraum</label>
                    <input type="text" id="germany_job_duration" name="germany_job_duration" value="{{$training->germany_job_duration}}">
                </div>
                <!--div class="form-row">
                <label for="available_certificate">Nachweise Vorhanden </label>
                    <select id="available_certificate" name="available_certificate">
                        <option value="">----</option>
                        <option value="usa" {{ $training->available_certificate == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $training->available_certificate == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $training->available_certificate == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $training->available_certificate == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $training->available_certificate == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label>Nachweise Vorhanden</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="available_certificate" value="yes" {{ $training->available_certificate == 'yes' ? 'checked' : '' }}> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="available_certificate" value="no" {{ $training->available_certificate == 'no' ? 'checked' : '' }}> Nein
                        </label>
                    </div>
                </div>
                <!--div class="form-row">
                <label for="available_translation">Übersetzung Vorhanden</label>
                    <select id="available_translation" name="available_translation">
                        <option value="">----</option>
                        <option value="usa" {{ $training->available_translation == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $training->available_translation == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $training->available_translation == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $training->available_translation == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $training->available_translation == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label>Übersetzung Vorhanden</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="available_translation" value="yes" {{ $training->available_translation == 'yes' ? 'checked' : '' }}> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="available_translation" value="no" {{ $training->available_translation == 'no' ? 'checked' : '' }}> Nein
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
                            <input type="radio" name="applied_application" value="yes" {{ $training->applied_application == 'yes' ? 'checked' : '' }}> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="applied_application" value="no" {{ $training->applied_application == 'no' ? 'checked' : '' }}> Nein
                        </label>
                    
                    </div>
                </div>
                <div class="form-row" hidden>
                
                </div>

                <!--div class="form-row">
                <label for="equivalence_assessment">Ergebnis Gleichwertigkeitsprüfung</label>
                    <select id="equivalence_assessment" name="equivalence_assessment" >
                        <option value="">----</option>
                        <option value="usa" {{ $training->equivalence_assessment == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $training->equivalence_assessment == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $training->equivalence_assessment == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $training->equivalence_assessment == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $training->equivalence_assessment == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label for="equivalence_assessment">Ergebnis Gleichwertigkeitsprüfung</label>
                    <input type="text" id="equivalence_assessment" name="equivalence_assessment" value="$training->equivalence_assessment">
                </div>
                <div class="form-row">
                    <label for="equivalence_assessment_date">Datum der Antragsstellung Gleichwertigkeitsprüfung</label>
                    <input type="date" id="equivalence_assessment_date" name="equivalence_assessment_date" value="{{$training->equivalence_assessment_date}}">
                </div>
                <!--div class="form-row">
                    <label for="evaluation_result">Ergebnis Zeugnisbewertung</label>
                    <select id="evaluation_result" name="evaluation_result">
                        <option value="">----</option>
                        <option value="usa" {{ $training->evaluation_result == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $training->evaluation_result == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $training->evaluation_result == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $training->evaluation_result == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $training->evaluation_result == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div-->
                <div class="form-row">
                    <label for="evaluation_result">Ergebnis Zeugnisbewertung</label>
                    <input type="text" id="evaluation_result" name="evaluation_result" value="$training->evaluation_result">
                </div>
                <div class="form-row">
                    <label for="evaluation_date">Datum der Antragsstellung ZAB</label>
                    <input type="date" id="evaluation_date" name="evaluation_date" value="{{$training->evaluation_date}}">
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

