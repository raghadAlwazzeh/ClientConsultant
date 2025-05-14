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
                        <li><a href="{{ route('clients.showinformation', $job->client->id) }}" class="nav-link">persönliche Daten</a></li>
                        <li><a href="{{ route('clients.showqualification', $job->client->id) }}" class="nav-link">Qualificationen</a></li>
                        <li><a href="{{ route('conversationprotocol.showall', $job->client->id) }}"  class="nav-link">Gesprächsprotokolle</a></li>
                        <li><a href="{{ url('calendar/'. $job->client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $job->client->id) }}"  class="nav-link">Dokument</a></li>
                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>

<form action="{{ route('job.update', $job->id) }}" method="POST">
    @csrf
    @method('PATCH') 
    
    <div class="whole-container" style="width: 100%;">
    <h3> {{$job->client->last_name}}, {{$job->client->first_name}}</h3>
        <div class="form-container">
            <label for="form" class="form-label">Berufliche Situation</label>
            <div class="responsive-form">
                <div class="form-row">
                <label for="employment_status">Erwerbsstatus </label>
                    <select id="employment_status" name="employment_status" >
                        <option value="">-- Erwerbsstatus --</option>
                        <option value="usa" {{ $job->employment_status == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $job->employment_status == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $job->employment_status == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $job->employment_status == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $job->employment_status == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row">
                <label for="employment_type">Art der Erwerbstätigkeit<span class="req">*</span></label>
                    <select id="employment_type" name="employment_type" >
                        <option value="">-- Erwerbstätigkeit --</option>
                        <option value="usa" {{ $job->employment_type == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $job->employment_type == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $job->employment_type == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $job->employment_type == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $job->employment_type == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row">
                <label for="funding_source">Leistungsbezug<span class="req">*</span></label>
                    <select id="funding_source" name="funding_source" required>
                        <option value="">-- Leistungsbezug --</option>
                        <option value="usa" {{ $job->funding_source == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $job->funding_source == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $job->funding_source == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $job->funding_source == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $job->funding_source == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row" hidden>
                    
                </div>
                <div class="form-row">
                <label for="residence_status">Aufenthaltstatus</label>
                    <select id="residence_status" name="residence_status">
                        <option value="">-- Aufenthaltstatus --</option>
                        <option value="usa" {{ $job->residence_status == 'usa' ? 'selected' : '' }}>United States</option>
                        <option value="canada" {{ $job->residence_status == 'canada' ? 'selected' : '' }}>Canada</option>
                        <option value="uk" {{ $job->residence_status == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="india" {{ $job->residence_status == 'india' ? 'selected' : '' }}>India</option>
                        <option value="australia" {{ $job->residence_status == 'australia' ? 'selected' : '' }}>Australia</option>
                    </select>
                </div>
                <div class="form-row" hidden>
                    
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

