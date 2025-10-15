@extends('app') 
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')
<header class="secondary-header py-2" style="position: fixed; top: 50px; width: 100%; z-index: 999; text-align: center;">
    <nav class="navbar2 navbar-expand-lg">
        <div class="">
            <ul class="nav2 navbar-nav2 navbar-left2">
                <li class="active"><a href="/networkpartner/show" class="nav-link">Standorte</a></li>
                <li class="dropdown"><a href="/networkpartner/show" class="nav-link">Netzwekpartner</a></li>
                <li class="dropdown"><a href="/coorporation/show" class="nav-link">Kooperationen</a></li>
            </ul>   
        </div>
    </nav>
</header>

<div class="whole-container" style="width: 100%;">
    <form action="{{route('cooporation.store')}}" method="POST">
        @csrf
        <div class="form-container">
            <label for="form" class="form-label">Kooperation erfassen</label>
            <div class="responsive-form">

                <div class="form-row">
                    <label for="event_date">Datum der Veranstaltung<span class="req">*</span></label>
                    <input type="date" id="event_date" name="event_date" required>
                </div>

                <div class="form-row">
                    <label for="district">Landkreis<span class="req">*</span></label>
                    <input type="text" id="district" name="district" required>
                </div>

                <div class="form-row">
                    <label for="event_type">Veranstaltungsart<span class="req">*</span></label>
                    <input type="text" id="event_type" name="event_type" required>
                </div>

                <div class="form-row">
                    <label for="event_other">Veranstaltung Sonstiges</label>
                    <input type="text" id="event_other" name="event_other">
                </div>

                <div class="form-row">
                    <label for="activity_type">Art der Aktivität<span class="req">*</span></label>
                    <input type="text" id="activity_type" name="activity_type" required>
                </div>

                <div class="form-row">
                    <label for="aqb_actors">Anzahl der Akteure AQB<span class="req">*</span></label>
                    <input type="number" id="aqb_actors" name="aqb_actors" required>
                </div>

                <div class="form-row">
                    <label for="external_actors">Anzahl der Akteure Extern<span class="req">*</span></label>
                    <input type="number" id="external_actors" name="external_actors" required>
                </div>

                <div class="form-row">
                    <label for="actor_type">Akteurstyp<span class="req">*</span></label>
                    <input type="text" id="actor_type" name="actor_type" required>
                </div>

                <div class="form-row">
                    <label for="actor_type_other">Akteurstyp Sonstiges</label>
                    <input type="text" id="actor_type_other" name="actor_type_other">
                </div>

                <div class="form-row">
                    <label for="short_title">Kurzbezeichnung/Titel</label>
                    <input type="text" id="short_title" name="short_title">
                </div>

                <div class="form-row">
                    <label for="location">Standort</label>
                    <input type="text" id="location" name="location">
                </div>

                <div class="form-row">
                    <label for="notes">Bemerkungen</label>
                    <textarea id="notes" name="notes" rows="4"></textarea>
                </div>

                <button class="btn-primary btn-form" type="submit">Speichern</button>
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
