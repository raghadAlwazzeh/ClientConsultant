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
                        <li><a href="{{ route('clients.showinformation', $task->client->id) }}" class="nav-link">persönliche Daten</a></li>
                        <li><a href="{{ route('clients.showqualification', $task->client->id) }}" class="nav-link">Qualificationen</a></li>
                        <li><a href="{{ route('conversationprotocol.showall', $task->client->id) }}"  class="nav-link">Gesprächsprotokolle</a></li>
                        <li><a href="{{ url('calendar/'. $task->client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $task->client->id) }}"  class="nav-link">Dokument</a></li>
                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>

<div class="whole-container" style="width: 100%;">
    <h3> {{$task->client->last_name}}, {{$task->client->first_name}}</h3>
    
        
        
        <div class="whole-container" style="width: 100%;">
            <div class="info-container">
            <label for="form" class="form-label">Aufgaben</label>      
                <div class="responsive-info">
                    <div class="info-row">
                        <label for="submission_date">Datum Wiedervorlage</label> <span>{{ $task->submission_date}}</span>
                    </div> 
                    <div class="info-row" hidden>
                        
                    </div>
                    <div class="info-row">
                        <label for="title">Betreff</label><span>{{ $task->title}}</span>
                    </div>
                    <div class="info-row" hidden>
                        
                    </div>
                    <div class="info-row">
                        <label for="description">Aufgabe</label><span>{{ $task->description}}</span>
                    </div>
                    <div class="info-row" hidden>
                        
                    </div>
                    <div class="info-row">
                        <label for="deadline">zu erlidegen bis</label><span>{{ $task->deadline}}</span>
                    </div>
                    <div class="info-row" hidden>
                        
                    </div>
                </div>
            </div>

            


            

            
        
        </div>
    </form>
</div>


    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

@stop

