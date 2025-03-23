@extends('app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')



<form action="{{ route('clientinfo.update', $client->id) }}" method="POST">
    @csrf
    @method('PATCH') 
    
    <div class="whole-container" style="width: 100%;">
        <div class="form-container">
            <label class="form-label">Zuordnung Beratungsstandort</label>
            <div class="responsive-form">
                <div class="form-row">
                    <label for="ort">Standort <span class="req">*</span></label>
                    <select id="ort" name="ort" required>
                        <option value="">-- Standort --</option>
                        <option value="usa" {{ $client->ort == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->ort == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->ort == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->ort == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->ort == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-container">
            <label for="form" class="form-label">Zuordnung Ratsuchende/r </label>
            <div class="responsive-form" >
                <div class="form-row">
                <label for="landkreis">Landkreis <span class="req">*</span></label>
                    <select id="landkreis" name="landkreis" required>
                        <option value="">-- Landkreis --</option>
                        <option value="usa" {{ $client->landkreis == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->landkreis == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->landkreis == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->landkreis == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->landkreis == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                    
                
            </div>
        </div>

        <div class="form-container">
            <label class="form-label">Persönliche Daten</label>
            <div class="responsive-form">
                <div class="form-row">
                    <label>Datenschutyeinwillgung erteilt <span class="req">*</span></label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="data_protection" value="yes" {{ $client->data_protection == 'yes' ? 'checked' : '' }} required> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="data_protection" value="no" {{ $client->data_protection == 'no' ? 'checked' : '' }}> Nein
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="data_protection" value="offen" {{ $client->data_protection == 'offen' ? 'checked' : '' }}> Offen
                        </label>
                    </div>
                </div>

                <div class="form-row" hidden></div>

                <div class="form-row">
                    <label for="education">Höchster formaler Bildungsabschluss <span class="req">*</span></label>
                    <select id="education" name="education" required>
                        <option value="">-- Bildungsabschluss --</option>
                        <option value="usa" {{ $client->education == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->education == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->education == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->education == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->education == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="anknown">Anonyme Beratung</label>
                    <select id="unknown" name="unknown_advice">
                        <option value="">-- Anonyme Beratung --</option>
                        <option value="usa" {{ $client->unknown_advice == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->unknown_advice == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->unknown_advice == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->unknown_advice == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->unknown_advice == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>

                
                <div class="form-row">
                    <label for="advisor">Anfrage durch</label>
                    <select id="advisor" name="advisor">
                        <option value="">-- Anfrage durch --</option>
                        <option value="usa" {{ $client->advisor == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->advisor == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->advisor == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->advisor == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->advisor == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>



                <div class="form-row">
                    <label for="another-advisor">Falls Sonstiges</label>
                    <input type="text" id="another-advisor" name="another_advisor" value="{{$client->another_advisor}}">
                </div>


                <div class="form-row">
                    <label for="recognition">durch wen von Anerkennungsberatung erfahren?</label>
                    <select id="recognition" name="recognition_person">
                        <option value=""></option>
                        <option value="usa" {{ $client->recognition_person == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->recognition_person == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->recognition_person == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->recognition_person == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->recognition_person == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>



                <div class="form-row">
                    <label for="another-recognition">Falls Sonstiges</label>
                    <input type="text" id="another-recognition" name="another_recognition_person" value="{{$client->another_recognition_person}}">
                </div>

                <div class="form-row">
                    <label for="first-name">Vorname <span class="req">*</span></label>
                    <input type="text" id="first-name" name="first_name" value="{{ $client->first_name }}" required>
                </div>

                <div class="form-row">
                    <label for="last-name">Nachname <span class="req">*</span></label>
                    <input type="text" id="last-name" name="last_name" value="{{ $client->last_name }}" required>
                </div>

                <div class="form-row">
                    <label for="street">Straße. Nr <span class="req">*</span></label>
                    <input type="text" id="street" name="street" value="{{ $client->street }}" required>
                </div>

                <div class="form-row">
                    <label for="address">Adresszusatz </label>
                    <textarea id="address" name="address">{{$client->address}}</textarea>
                </div>

                <div class="form-row">
                    <label for="zip">PLZ <span class="req">*</span></label>
                    <input type="number" id="zip" name="zip_code" value="{{ $client->zip_code }}" required>
                </div>

                <div class="form-row">
                    <label for="city">Ort <span class="req">*</span></label>
                    <input type="text" id="city" name="city" value="{{ $client->city }}" required>
                </div>

                <div class="form-row">
                    <label for="phone">Telefon <span class="req">*</span></label>
                    <input type="number" id="phone" name="phone" value="{{ $client->phone }}" required>
                </div>

                <div class="form-row">
                    <label for="email">Email <span class="req">*</span></label>
                    <input type="email" id="email" name="email" value="{{ $client->email }}" required>
                </div>

                <div class="form-row">
                    <label for="germany-residence">Wohnsitz in Deutschland</label>
                    <select id="germany-residence" name="germany_residence">
                        <option value=""></option>
                        <option value="usa" {{ $client->germany_residence == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->germany_residence == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->germany_residence== 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->germany_residence == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->germany_residence == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>

                <div class="form-row" hidden>
                
                </div>


                <div class="form-row">
                    <label for="state">Bundesland</label>
                    <select id="state" name="state">
                        <option value=""></option>
                        <option value="usa" {{ $client->state == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->state == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->state == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->state == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->state == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="residence">Wohnsitz</label>
                    <select id="residence" name="residence">
                        <option value=""></option>
                        <option value="usa" {{ $client->residence == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->residence == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->residence == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->residence == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->residence == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>

                <div class="form-row">
                    <label>Geschlecht <span class="req">*</span></label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="gender" value="male" {{ $client->gender == 'male' ? 'checked' : '' }} required> männlich
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="gender" value="female" {{ $client->gender == 'female' ? 'checked' : '' }}> weiblich
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="gender" value="other" {{ $client->gender == 'other' ? 'checked' : '' }}> divers
                        </label>
                    </div>
                </div>

                <div class="form-row" hidden>
                
                </div>


                <div class="form-row">
                    <label for="country">Geburtsland <span class="req">*</span></label>
                    <select id="country" name="country" required>
                        <option value=""></option>
                        <option value="usa" {{ $client->country == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->country == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->country == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->country == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->country == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>

                <div class="form-row" hidden>
                
                </div>

                <div class="form-row">
                    <label for="birth-date">Geburtsjahr <span class="req">*</span></label>
                    <input type="number" id="birth-date" name="birth_date" value="{{ $client->birth_date }}" required>
                </div>


                <div class="form-row" hidden>
                
                </div>


                <div class="form-row">
                    <label for="first-nationality">Erste Staatsangehörgkeit</label>
                    <select id="first-nationality" name="first_nationality">
                        <option value=""></option>
                        <option value="usa" {{ $client->first_nationality == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->first_nationality == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->first_nationality == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->first_nationality == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->first_nationality == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="second-nationality">Ggf. Zweite Staatsangehörgkeit</label>
                    <select id="second-nationality" name="second_nationality">
                        <option value=""></option>
                        <option value="usa" {{ $client->second_nationality == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->second_nationality == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->second_nationality == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->second_nationality == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->second_nationality == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="reise-date">Einreisejahr </label>
                    <input type="number" id="reise-date" name="reise_date" value="{{ $client->reise_date }}" required>

                </div>


            </div>
        </div>

        <div class="form-container">
            <label class="form-label">Früher Anträge</label>
            <div class="responsive-form">
            <div class="form-row">
                <label for="job">Zu welchem Referenzberuf</label>
                    <select id="job" name="job">
                        <option value=""></option>
                        <option value="usa" {{ $client->job == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->job == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->job == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->job == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->job == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row" hidden>
                
                </div>
                <div class="form-row">
                    <label>Wurde früher ein Antrag gestellt <span class="req">*</span></label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="has_previous_application" value="yes" {{ $client->has_previous_application == 'yes' ? 'checked' : '' }} required> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="has_previous_application" value="no" {{ $client->has_previous_application == 'no' ? 'checked' : '' }}> Nein
                        </label>
                    </div>
                </div>

                <div class="form-row">
                    <label for="institution">bei welcher Institution</label>
                    <input type="text" id="institution" name="previous_institution" value="{{ $client->previous_institution }}">
                </div>

                <div class="form-row">
                    <label for="result"> Ergebnis Gleichwertigkeitsprüfung </label>
                    <input type="text" id="result" name="result" value="{{$client->result}}">
                </div>


                <div class="form-row">
                    <label for="rating"> Ergebnis Zeugnisbewertung</label>
                    <input type="text" id="rating" name="rating" value="{{$client->rating}}">
                </div> 
                <button class="btn-primary btn-form" type="submit" >Speichern</button>
            </div>
        </div>

        
    </div>
</form>

@stop
