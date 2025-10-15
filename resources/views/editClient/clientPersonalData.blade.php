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
                        <option value="Bayern" {{ $client->ort == '"Bayern' ? 'selected' : '' }}>Bayern</option>
                        <option value="Berlin" {{ $client->ort == 'Berlin' ? 'selected' : '' }}>Berlin</option>
                        <option value="Brandenburg" {{ $client->ort == 'Brandenburg' ? 'selected' : '' }}>Brandenburg</option>
                        <option value="Bremen" {{ $client->ort == 'Bremen' ? 'selected' : '' }}>Bremen</option>
                        <option value="Hamburg" {{ $client->ort == 'Hamburg' ? 'selected' : '' }}>Hamburg</option>
                        <option value="Hessen" {{ $client->ort == 'Hessen' ? 'selected' : '' }}>Hessen</option>
                        <option value="Mecklenburg-Vorpommern" {{ $client->ort == 'Mecklenburg-Vorpommern' ? 'selected' : '' }}>Mecklenburg-Vorpommern</option>
                        <option value="Niedersachsen" {{ $client->ort == 'Niedersachsen' ? 'selected' : '' }}>Niedersachsen</option>
                        <option value="Nordrhein-Westfalen" {{ $client->ort == 'Nordrhein-Westfalen' ? 'selected' : '' }}>Nordrhein-Westfalen</option>
                        <option value="Rheinland-Pfalz" {{ $client->ort == 'Rheinland-Pfalz' ? 'selected' : '' }}>Rheinland-Pfalz</option></var>
                        <option value="Saarland" {{ $client->ort == 'Saarland' ? 'selected' : '' }}>Saarland</option>
                        <option value="Sachsen" {{ $client->ort == 'Sachsen' ? 'selected' : '' }}>Sachsen</option>
                        <option value="Sachsen-Anhalt" {{ $client->ort == 'Sachsen-Anhalt' ? 'selected' : '' }}>Sachsen-Anhalt</option>
                        <option value="Schleswig-Holstein" {{ $client->ort == 'Schleswig-Holstein' ? 'selected' : '' }}>Schleswig-Holstein</option>
                        <option value="Thüringen" {{ $client->ort == 'Thüringen' ? 'selected' : '' }}>Thüringen</option>
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
                        <option value="Hochschulausbildung" {{ $client->education == 'Hochschulausbildung' ? 'selected' : '' }}>Hochschulausbildung</option>
                        <option value="Studium" {{ $client->education == 'Studium' ? 'selected' : '' }}>Studium</option>
                        <option value="Ausbildung" {{ $client->education == 'Ausbildung' ? 'selected' : '' }}>Ausbildung</option>
                        <option value="Schulabschluss" {{ $client->education == 'Schulabschluss' ? 'selected' : '' }}>Schulabschluss</option>
                    </select>
                </div>

                <div class="form-row">
                    <label>Anonyme Beratung</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="unknown_advice" value="yes" value="yes" {{ $client->unknown_advice == 'yes' ? 'checked' : '' }} > Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="unknown_advice" value="no" value="no" {{ $client->unknown_advice == 'no' ? 'checked' : '' }}> Nein
                        </label>
                    </div>
                </div>

                
                <div class="form-row">
                    <label for="advisor">Anfrage durch</label>
                    <select id="advisor" name="advisor">
                        <option value="">-- Anfrage durch --</option>
                        <option value="Ratsuchende selbst"  {{ $client->advisor == 'Ratsuchende selbst' ? 'selected' : '' }}>Ratsuchende selbst</option>
                        <option value="keine Angabe"  {{ $client->advisor == 'keine Angabe' ? 'selected' : '' }}>keine Angabe</option>
                        <option value="Jobcenter"  {{ $client->advisor == 'Jobcenter' ? 'selected' : '' }}>Jobcenter</option>
                        <option value="Agentur für Arbeit"  {{ $client->advisor == 'Agentur für Arbeit' ? 'selected' : '' }}>Agentur für Arbeit</option>
                        <option value="andre Beratungsstellen"  {{ $client->advisor == 'andre Beratungsstellen' ? 'selected' : '' }}>andre Beratungsstellen</option>
                        <option value="Migranten Organisationen"  {{ $client->advisor == 'Migranten Organisationen' ? 'selected' : '' }}>Migranten Organisationen</option>
                        <option value="Unternehmen"  {{ $client->advisor == 'Unternehmen' ? 'selected' : '' }}>Unternehmen</option>
                        <option value="Soziales Umfeld"  {{ $client->advisor == 'Soziales Umfeld' ? 'selected' : '' }}>Soziales Umfeld</option>
                    </select>
                </div>



                <div class="form-row">
                    <label for="another-advisor">Falls Sonstiges</label>
                    <input type="text" id="another-advisor" name="another_advisor" value="{{$client->another_advisor}}">
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
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="germany_residence" value="yes" {{ $client->germany_residence == 'yes' ? 'checked' : '' }}> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="germany_residence" value="no"  {{ $client->germany_residence == 'no' ? 'checked' : '' }}> Nein
                        </label>
                    </div> 
                </div>

                <div class="form-row" hidden>
                
                </div>


                <div class="form-row">
                    <label for="state">Bundesland</label>
                    <select id="state" name="state">
                        <option value=""></option>
                        @foreach(config('appdata.german_states') as $code => $name)
                            <option value="{{ $code }}" {{ $client->state == $code ? 'selected' : '' }}> {{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <label for="residence">Wohnsitz </label>
                    <input type="text" id="residence" name="residence" value="{{ $client->residence }}">
                </div>
                <!--div class="form-row">
                    <label for="residence">Wohnsitz</label>
                    <select id="residence" name="residence">
                        <option value=""></option>
                        <option value="usa" {{ $client->residence == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->residence == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->residence == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->residence == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->residence == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div-->

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
                        @foreach(config('appdata.countries') as $code => $name)
                            <option value="{{ $code }}" {{ $client->country == $code ? 'selected' : '' }}> {{ $name }}</option>
                        @endforeach
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
                        @foreach(config('appdata.nationalities') as $code => $nationality)
                            <option value="{{ $code }}" {{ $client->first_nationality == $code ? 'selected' : '' }}>{{ $nationality }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <label for="second-nationality">Ggf. Zweite Staatsangehörgkeit</label>
                    <select id="second-nationality" name="second_nationality">
                        <option value=""></option>
                        @foreach(config('appdata.nationalities') as $code => $nationality)
                            <option value="{{ $code }}" {{ $client->second_nationality == $code ? 'selected' : '' }}>{{ $nationality }}</option>
                        @endforeach
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
                    <label for="residence">Zu welchem Referenzberuf</label>
                    <input type="text" id="job" name="job" value="$client->job">
                </div>
                <!--div class="form-row">
                <label for="job">Zu welchem Referenzberuf</label>
                    <select id="job" name="job">
                        <option value=""></option>
                        <option value="usa" {{ $client->job == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $client->job == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $client->job == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $client->job == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $client->job == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div-->
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
