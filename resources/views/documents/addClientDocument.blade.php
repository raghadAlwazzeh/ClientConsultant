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
    <form action="{{ route('document.upload') }}"enctype="multipart/form-data" method="POST">
        @csrf
        
        
        <div class="whole-container" style="width: 100%;">
            <div class="form-container">
            <label for="form" class="form-label">Dokumentdaten</label>      
                <div class="responsive-form">
                    <div class="form-row">
                        <label for="client">Ratsuchende</label>
                        <select id="client" name="client" required>
                            <option value="{{ $client->id }}">{{ $client->last_name }}, {{ $client->first_name }}</option>
                        </select>
                    </div>
                    <div class="form-row" hidden>
                        
                    </div>
                    <div class="form-row">
                        <label for="title">Title<span class="req">*</span></label>
                        <input type="text" id="title" name="title" require>
                    </div> 
                    <div class="form-row" hidden>
                        
                    </div>
                    <div class="form-row">
                        <label for="category">Kategorie<span class="req">*</span></label>
                        <select id="category" name="category" required>
                            <option value="">----</option>
                            <option value="Zeugnisse">Zeugnisse</option>
                            <option value="Bescheide">Bescheide</option>
                        </select>
                    </div>
                    <div class="form-row" hidden>
                        
                    </div>
                    <div class="form-row">
                        <label for="file">Datei <span class="req">*</span></label>
                        <input type="file" name="file" require>
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

