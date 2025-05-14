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

<div class="whole-container" style="width: 100%;">
    <h3> {{$client->last_name}}, {{$client->first_name}}</h3>
    <form action="{{route('task.store', $client->id)}}" method="POST">
        @csrf
        
        
        <div class="whole-container" style="width: 100%;">
            <div class="form-container">
            <label for="form" class="form-label">Aufgaben</label>      
                <div class="responsive-form">
                    <div class="form-row">
                        <label for="submission_date">Datum Wiedervorlage</label>
                        <input type="date" id="submission_date" name="submission_date" >
                    </div> 
                    <div class="form-row" hidden>
                        
                    </div>
                    <div class="form-row">
                        <label for="title">Betreff<span class="req">*</span></label>
                        <input type="text" id="title" name="title" require>
                    </div>
                    <div class="form-row" hidden>
                        
                    </div>
                    <div class="form-row">
                        <label for="description">Aufgabe</label>
                        <textarea id="description" name="description"></textarea>
                    </div>
                    <div class="form-row" hidden>
                        
                    </div>
                    <div class="form-row">
                        <label for="deadline">zu erlidegen bis</label>
                        <input type="date" id="deadline" name="deadline" >
                    </div>
                    <div class="form-row" hidden>
                        
                    </div>
                    <button class="btn-primary btn-form" type="submit" >Speichern</button>
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

