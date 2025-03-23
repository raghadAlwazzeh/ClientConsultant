@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')



<form action="{{ route('languageskill.update', $language->id) }}" method="POST">
    @csrf
    @method("PATCH") 
    <div class="whole-container" style="width: 100%;">
        <div class="form-container">
            <label for="form" class="form-label">SparchKenntnisse</label>
            <div class="responsive-form">
                <div class="form-row">
                <label for="german_skills">DeutchKenntnisse der/des Ratsuchenden</label>
                    <select id="german_skills" name="german_skills" >
                        <option value="">----</option>
                        <option value="usa" {{ $language->german_skill == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $language->german_skill == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $language->german_skill == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $language->german_skill == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $language->german_skill == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row" hidden>
                    
                </div>
                <div class="form-row">
                    <label for="german_certificate">Wenn als Fremdsprache Zertifikat vorhanden?</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="german_certificate" value="yes" {{ $language->german_certificate == 'yes' ? 'checked' : '' }} > Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="german_certificate" value="no" {{ $language->german_certificate == 'no' ? 'checked' : '' }}> Nein
                        </label>
                    </div>
                </div>
                <div class="form-row">
                <label for="german_level">Wenn Zertifikatvorhanden, auf welchem Niveau?</label>
                    <select id="german_level" name="german_level">
                        <option value="">-- Erwerbsland --</option>
                        <option value="A1" {{ $language->german_level == 'A1' ? 'selected' : '' }}>A1</option>
                        <option value="A2" {{ $language->german_level == 'A2' ? 'selected' : '' }}>A2</option>
                        <option value="B1" {{ $language->german_level == 'B1' ? 'selected' : '' }}>B1</option>
                        <option value="B2" {{ $language->german_level == 'B2' ? 'selected' : '' }}>B2</option>
                        <option value="C1" {{ $language->german_level == 'C1' ? 'selected' : '' }}>C1</option>
                        <option value="C2" {{ $language->german_level == 'C2' ? 'selected' : '' }}>C2</option>
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

