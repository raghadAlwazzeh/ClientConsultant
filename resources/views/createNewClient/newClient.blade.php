@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')



<form action="{{ url('/newclient') }}" method="POST">
    @csrf
    <div class="whole-container" style="width: 100%;">
        <div class="form-container">
            <label for="form" class="form-label">Zuordnung Beratungsstandort </label>
            <div class="responsive-form">
                <div class="form-row">
                <label for="ort">Standort <span class="req">*</span></label>
                    <select id="ort" name="ort" required>
                        <option value="">-- Standort --</option>
                        <option value="Bayern">Bayern</option>
                        <option value="Berlin">Berlin</option>
                        <option value="Brandenburg">Brandenburg</option>
                        <option value="Bremen">Bremen</option>
                        <option value="Hamburg">Hamburg</option>
                        <option value="Hessen">Hessen</option>
                        <option value="Mecklenburg-Vorpommern">Mecklenburg-Vorpommern</option>
                        <option value="Niedersachsen">Niedersachsen</option>
                        <option value="Nordrhein-Westfalen">Nordrhein-Westfalen</option>
                        <option value="Rheinland-Pfalz">Rheinland-Pfalz</option></var>
                        <option value="Saarland">Saarland</option>
                        <option value="Sachsen">Sachsen</option>
                        <option value="Sachsen-Anhalt">Sachsen-Anhalt</option>
                        <option value="Schleswig-Holstein">Schleswig-Holstein</option>
                        <option value="Thüringen">Thüringen</option>
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
            <label for="form" class="form-label">Persönliche Daten </label>
            <div class="responsive-form">
                <div class="form-row">
                    <label>Datenschutyeinwillgung erteilt <span class="req">*</span></label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="data_protection" value="yes" required> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="data_protection" value="no"> Nein
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="data_protection" value="offen"> Offen
                        </label>
                    </div>
                </div>
                <div class="form-row" hidden>
                
                </div>
                <div class="form-row">

                <label for="education">Höchster formaler Bildungsabschluss <span class="req">*</span></label>
                    <select id="education" name="education" required>
                        <option value="">-- Bildungsabschluss --</option>
                        <option value="Hochschulausbildung">Hochschulausbildung</option>
                        <option value="Studium">Studium</option>
                        <option value="Ausbildung">Ausbildung</option>
                        <option value="Schulabschluss">Schulabschluss</option>
                    </select>
                </div>

                <div class="form-row">
                    <label>Anonyme Beratung</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="unknown_advice" value="yes" > Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="unknown_advice" value="no"> Nein
                        </label>
                    </div>
                </div>


                
                <div class="form-row">
                    <label for="advisor">Anfrage durch</label>
                    <select id="advisor" name="advisor">
                        <option value="">-- Anfrage durch --</option>
                        <option value="Ratsuchende selbst">Ratsuchende selbst</option>
                        <option value="keine Angabe">keine Angabe</option>
                        <option value="Jobcenter">Jobcenter</option>
                        <option value="Agentur für Arbeit">Agentur für Arbeit</option>
                        <option value="andre Beratungsstellen">andre Beratungsstellen</option>
                        <option value="Migranten Organisationen">Migranten Organisationen</option>
                        <option value="Unternehmen">Unternehmen</option>
                        <option value="Soziales Umfeld">Soziales Umfeld</option>
                    </select>
                </div>



                <div class="form-row">
                    <label for="another-advisor">Falls Sonstiges</label>
                    <input type="text" id="another-advisor" name="another_advisor" >
                </div>



                <div class="form-row">
                    <label for="last-name">Nachname <span class="req">*</span></label>
                    <input type="text" id="last-name" name="last_name"  required>
                </div>

                <div class="form-row">
                    <label for="first-name">Vorname <span class="req">*</span></span></label>
                    <input type="text" id="first-name" name="first_name"  required>
                </div>
                

                <div class="form-row">
                    <label for="street">Straße. Nr <span class="req">*</span></label>
                    <input type="text" id="street" name="street"  required>
                </div>


                <div class="form-row">
                    <label for="address">Adresszusatz </label>
                    <textarea id="address" name="address"></textarea>
                </div>



                <div class="form-row">
                    <label for="zip">PLZ <span class="req">*</span></label>
                    <input type="number" id="zip" name="zip_code"  required>
                </div>


                <div class="form-row">
                    <label for="city">Ort <span class="req">*</span></label>
                    <input type="text" id="city" name="city"  required>
                </div>


                <div class="form-row">
                    <label for="phone">Telefon <span class="req">*</span></label>
                    <input type="number" id="phone" name="phone"  required>
                </div>



                <div class="form-row">
                    <label for="email">Email <span class="req">*</span></label>
                    <input type="email" id="email" name="email"  required>
                </div>

                <div class="form-row">
                    <label for="germany-residence">Wohnsitz in Deutschland</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="germany_residence" value="yes"> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="germany_residence" value="no"> Nein
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
                            <option value="{{ $code }}"> {{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <label for="residence">Wohnsitz </label>
                    <input type="text" id="residence" name="residence">
                </div>

                <!--div class="form-row">
                    <label for="residence">Wohnsitz</label>
                    <select id="residence" name="residence">
                        <option value=""></option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div-->

                
                <div class="form-row">
                    <label>Geschlecht <span class="req">*</span></label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="gender" value="male" required> männlich
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="gender" value="female"> weiblich
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="gender" value="other"> divers
                        </label>
                    </div>
                </div>


                <div class="form-row" hidden>
                
                </div>


                <div class="form-row">
                    <label for="country">Geburtsland <span class="req">*</span></label>
                    <select id="country" name="country" required>
                        <option value="">Bitte wählen</option>
                        @foreach(config('appdata.countries') as $code => $name)
                            <option value="{{ $code }}"> {{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row" hidden>
                
                </div>

                <div class="form-row">
                    <label for="birth-date">Geburtsjahr <span class="req">*</span></label>
                    <select id="birth-date" name="birth_date"  required>
                        <option value="">-- Select Year --</option>
                        
                    </select>

                </div>

                <div class="form-row" hidden>
                
                </div>


                <div class="form-row">
                    <label for="first-nationality">Erste Staatsangehörgkeit</label>
                    <select id="first-nationality" name="first_nationality">
                        <option value=""></option>
                        @foreach(config('appdata.nationalities') as $code => $nationality)
                            <option value="{{ $code }}">{{ $nationality }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <label for="second-nationality">Ggf. Zweite Staatsangehörgkeit</label>
                    <select id="second-nationality" name="second_nationality">
                        <option value=""></option>
                        @foreach(config('appdata.nationalities') as $code => $nationality)
                            <option value="{{ $code }}">{{ $nationality }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <label for="reise-date">Einreisejahr </label>
                    <select id="reise-date" name="reise_date" >
                        <option value="">-- Select Year --</option>
                    </select>

                </div>
                
            </div>
        </div>

        <div class="form-container">
            <label for="form" class="form-label">Früher Anträge</label>
            <div class="responsive-form">
                <div class="form-row">
                    <label for="residence">Zu welchem Referenzberuf</label>
                    <input type="text" id="job" name="job">
                </div>
                <!--div class="form-row">
                <label for="job">Zu welchem Referenzberuf</label>
                    <select id="job" name="job">
                        <option value=""></option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div-->
                <div class="form-row" hidden>
                
                </div>

                <div class="form-row">
                    <label>Wurde früher ein Antrag gestellt <span class="req">*</span></label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="has_previous_application" value="yes" required> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="has_previous_application" value="no"> Nein
                        </label>
                    </div>
                </div>


                <div class="form-row">
                    <label for="institution"> bei welcher Institution </label>
                    <input type="text" id="institution" name="previous_institution" >
                </div>

                <div class="form-row">
                    <label for="result"> Ergebnis Gleichwertigkeitsprüfung </label>
                    <input type="text" id="result" name="result" >
                </div>


                <div class="form-row">
                    <label for="rating"> Ergebnis Zeugnisbewertung</label>
                    <input type="text" id="rating" name="rating" >
                </div> 
                <button class="btn-primary btn-form" type="submit" >Speichern</button>
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

