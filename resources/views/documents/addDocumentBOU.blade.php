@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')

<header class="secondary-header py-2" style="
    position: fixed; 
    top: 50px; /* Adjust based on primary header height */
    width: 100%; 
    z-index: 999;
    text-align: center;">
     <nav class="navbar2 navbar-expand-lg">
    
    <div class="">
                    <ul class="nav2 navbar-nav2 navbar-left2">
                        <li class="active"><a href="/documentbop/show" class="nav-link">Dokumente</a></li>
                        <li class="dropdown"><a href="/documentbou/show" class="nav-link">Linkliste</a></li>
                        <!--li class="dropdown"><a href="/services"  class="nav-link">ddd</a></li>
                        <li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>

<div class="whole-container" style="width: 100%;">
    
    <form action="{{ route('documentbou.upload') }}"method="POST">
        @csrf
        
        
        <div class="whole-container" style="width: 100%;">
            <div class="form-container">
            <label for="form" class="form-label">Dokument Übersicht und Auswahl</label>      
                <div class="responsive-form">
                    <div class="form-row">
                        <label for="indication">Bezeichnung<span class="req">*</span></label>
                        <input type="text" id="indication" name="indication" require>
                    </div>
                    <div class="form-row" hidden>
                        
                    </div>
                    <div class="form-row">
                        <label for="document_url">Link (mit http://) <span class="req">*</span></label>
                            <input type="text" id="document_url" name="document_url" value="http://" require>
                    </div>
                    <div class="form-row" hidden>
                        
                    </div>
                    <div class="form-row">
                        <label for="description">Beschreibung <span class="req">*</span></label>
                            <textarea id="description" name="description" require></textarea>
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

