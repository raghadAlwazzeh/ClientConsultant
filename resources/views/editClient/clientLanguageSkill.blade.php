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
                        <li><a href="{{ route('clients.showinformation', $language->client->id) }}" class="nav-link">persönliche Daten</a></li>
                        <li><a href="{{ route('clients.showqualification', $language->client->id) }}" class="nav-link">Qualificationen</a></li>
                        <li><a href="{{ route('conversationprotocol.showall', $language->client->id) }}"  class="nav-link">Gesprächsprotokolle</a></li>
                        <li><a href="{{ route('task.show', $language->client->id) }}"  class="nav-link">Aufgaben</a></li>
                        <li><a href="{{ url('calendar/'. $language->client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $language->client->id) }}"  class="nav-link">Dokument</a></li>
                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>


<form action="{{ route('languageskill.update', $language->id) }}" method="POST">
    @csrf
    @method("PATCH") 
    <div class="whole-container" style="width: 100%;">
    <h3> {{$language->client->last_name}}, {{$language->client->first_name}}</h3>
        <div class="form-container">
            <label for="form" class="form-label">SprachKenntnisse</label>
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

