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
                        <li><a href="{{ route('task.show', $job->client->id) }}"  class="nav-link">Aufgaben</a></li>
                        <li><a href="{{ url('calendar/'. $job->client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $job->client->id) }}"  class="nav-link">Dokument</a></li>
                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>


    
    <div class="whole-container" style="width: 100%;">
        <h3> {{$job->client->last_name}}, {{$job->client->first_name}}</h3>
        <div class="info-container">
            <label for="form" class="form-label">Berufliche Situation</label> 
            <div class="responsive-info">
                <div class="info-row">
                    <label class="information-label">Erwerbsstatus </label> <span>{{ $job->employment_status }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Art der Erwerbstätigkeit</label><span>{{ $job->employment_type }}</span>
                </div>
                <div class="info-row">
                    <label class="information-label">Leistungsbezug</label> <span>{{ $job->funding_source }}</span>
                </div>
                <div class="info-row" hidden>
                    
                </div>
                <div class="info-row">
                    <label class="information-label">Aufenthaltstatus</label> <span>{{ $job->residence_status }}</span>
                </div>
                <div class="info-row" hidden>
                    
                </div>
                <a href="{{ route('job.edit', $job->id) }}"><button class="btn-primary">bearbeiten</button></a>
            </div>
        </div>

        


        

        
    
    </div>




    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

@stop

