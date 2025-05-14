@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')



<form action="{{ url('/newclient/languageskills') }}" method="POST">
    @csrf
    
    
    <div class="whole-container" style="width: 100%;">
        <div class="form-container">
            <label for="form" class="form-label">SprachKenntnisse</label>
            <div class="responsive-form">
                <div class="form-row">
                <label for="german_skills">DeutchKenntnisse der/des Ratsuchenden</label>
                    <select id="german_skills" name="german_skills" >
                        <option value="">-- Erwerbsland --</option>
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
                <label for="german_certificate">Wenn als Fremdsprache Zertifikat vorhanden?</label>
                <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="german_certificate" value="yes"> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="german_certificate" value="no"> Nein
                        </label>
                    </div>
                </div>
                <div class="form-row">
                <label for="german_level">Wenn Zertifikatvorhanden, auf welchem Niveau?</label>
                    <select id="german_level" name="german_level">
                        <option value="">-- Erwerbsland --</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                    </select>
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

