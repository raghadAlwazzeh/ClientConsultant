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
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="anknown">Anonyme Beratung</label>
                    <select id="unknown" name="unknown_advice">
                        <option value="">-- Anonyme Beratung --</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>

                
                <div class="form-row">
                    <label for="advisor">Anfrage durch</label>
                    <select id="advisor" name="advisor">
                        <option value="">-- Anfrage durch --</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>



                <div class="form-row">
                    <label for="another-advisor">Falls Sonstiges</label>
                    <input type="text" id="another-advisor" name="another_advisor" >
                </div>


                <div class="form-row">
                    <label for="recognition">durch wen von Anerkennungsberatung erfahren?</label>
                    <select id="recognition" name="recognition_person">
                        <option value=""></option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>



                <div class="form-row">
                    <label for="another-recognition">Falls Sonstiges</label>
                    <input type="text" id="another-recognition" name="another_recognition_person" >
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
                    <select id="germany-residence" name="germany_residence">
                        <option value=""></option>
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
                    <label for="state">Bundesland</label>
                    <select id="state" name="state">
                        <option value=""></option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="residence">Wohnsitz</label>
                    <select id="residence" name="residence">
                        <option value=""></option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>

                
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
                        <option value=""></option>
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
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="second-nationality">Ggf. Zweite Staatsangehörgkeit</label>
                    <select id="second-nationality" name="second_nationality">
                        <option value=""></option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
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
                <label for="job">Zu welchem Referenzberuf</label>
                    <select id="job" name="job">
                        <option value=""></option>
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
                <button class="btn-primary btn-form" type="submit" >Submit</button>
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

