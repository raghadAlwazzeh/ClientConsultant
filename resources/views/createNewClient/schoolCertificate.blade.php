@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')



<form action="{{ url('/newclient/schooleducation' . (isset($id) ? '/' . $id : '')) }}" method="POST">
    @csrf
    
    
    <div class="whole-container" style="width: 100%;">
        <div class="form-container">
            <label for="form" class="form-label">Schulicherabschluss </label>
            <div class="responsive-form">
                <div class="form-row">
                <label for="school_country">Erwerbsland <span class="req">*</span></label>
                    <select id="school_country" name="school_country" required>
                        <option value="">-- Erwerbsland --</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="school_study_duration">Dauer Schulbildung (Jahr)</label>
                    <input type="text" id="school_study_duration" name="school_study_duration" >
                </div>
                <div class="form-row">
                    <label for="school_graduation_year">Abschlussjahr<span class="req">*</span></label>
                    <select id="school_graduation_year" name="school_graduation_year"  required>
                        <option value="">-- Select Year --</option>
                        
                    </select>
                </div>
                <div class="form-row">
                <label for="qualification_level">vergleichbares Abschluss-Niveau </label>
                    <select id="qualification_level" name="qualification_level">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="sschool_institution">Ausbildungsinstitution</label>
                    <input type="text" id="school_institution" name="school_institution" >
                </div>
                <div class="form-row">
                    <label for="school_location">Ausbildungsort</label>
                    <input type="text" id="school_location" name="school_location" >
                </div>
                <div class="form-row">
                    <label for="school_study_titel">Originaltitel des Abschlusses</label>
                    <input type="text" id="school_study_titel" name="school_study_titel" >
                </div>
                <div class="form-row">
                    <label for="school_german_translate">Deutsche Übersetzung des Abschlusstitels</label>
                    <input type="text" id="school_german_translate" name="school_german_translate" >
                </div>

                <div class="form-row">
                    <label for="school_available_certificate">Nachweise Vorhanden </label>
                    <select id="school_available_certificate" name="school_available_certificate">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="school_available_translation">Übersetzung Vorhanden</label>
                    <select id="school_available_translation" name="school_available_translation">
                        <option value="">----</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
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

