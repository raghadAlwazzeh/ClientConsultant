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
                        <li class="active"><a href="/contactperson/show" class="nav-link">Standorte</a></li>
                        <li class="dropdown"><a href="/networkpartner/show" class="nav-link">Netzwekpartner</a></li>
                        <li class="dropdown"><a href="/cooporation/show" class="nav-link">Kooperationen</a></li>
                        <!--li class="dropdown"><a href="/services"  class="nav-link">ddd</a></li>
                        <li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>

<div class="whole-container" style="width: 100%;">
    
    <form action="{{route('networkpartner.store')}}"method="POST">
        @csrf
        
        
        <div class="whole-container" style="width: 100%;">
            <div class="form-container">
            <label for="form" class="form-label">Ansprechpartner</label>      
                <div class="responsive-form">
                    <div class="form-row">
                        <label for="name">Name<span class="req">*</span></label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-row">
                        <label for="type">Typ<span class="req">*</span></label>
                            <input type="text" id="type" name="type" required>
                    </div>
                    <div class="form-row">
                        <label for="field">Bereich </label>
                            <input type="text" id="field" name="field">
                    </div>
                    <div class="form-row">
                        <label for="zip_code">PLZ <span class="req">*</span></label>
                            <input type="number" id="zip_code" name="zip_code" required>
                    </div>
                    <div class="form-row">
                        <label for="location">Ort <span class="req">*</span></label>
                            <input type="text" id="location" name="location" required>
                    </div>
                    <div class="form-row">
                        <label for="phone">Telefon <span class="req">*</span></label>
                        <input type="number" id="phone" name="phone" required>
                    </div>
                    <div class="form-row">
                        <label for="email">Email <span class="req">*</span></label>
                            <input type="text" id="email" name="email" required>
                    </div>
                    <div class="form-row">
                    <label>freie Stellen</label>
                    <div class="choice-group">
                        <label class="choice-label">
                            <input type="radio" name="vacancies" value="yes"> Ja
                        </label>
                        <label class="choice-label">
                            <input type="radio" name="vacancies" value="no"> Nein
                        </label>
                    </div>
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

