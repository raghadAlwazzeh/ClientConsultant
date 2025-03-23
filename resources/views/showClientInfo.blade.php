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
                        <li class="active"><a href="{{ route('clients.showinformation', $client->id) }}" class="nav-link">persönliche Daten</a></li>
                        <li class="dropdown"><a href="{{ route('clients.showqualification', $client->id) }}" class="nav-link">Qualificationen</a></li>
                        <li class="dropdown"><a href="/services"  class="nav-link">Gesprächsprotokolle</a></li>
                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>

<div class="whole-container" style="width: 100%;">
   <h3> {{$client->last_name}}, {{$client->first_name}}</h3>
    <div class="info-container">
        <label  for="form" class="form-label">Zuordnung Beratungsstandort</label>
        <div class="responsive-info">
            <div class="info-row">
                <label class="information-label">Standort: </label> <span>{{ $client->ort }}</span>
            </div>
        </div>
    </div>

    <div class="info-container">
        <label  for="form" class="form-label">Zuordnung Ratsuchende/r</label>
        <div class="responsive-info">
            <div class="info-row">
                <label class="information-label">Landkreis: </label> <span>{{ $client->landkreis }}</span>
            </div>
        </div>
    </div>

    <div class="info-container">
        <label  for="form" class="form-label">Persönliche Daten</label>
        <div class="responsive-info">
            <div class="info-row">
                <label class="information-label">Datenschutyeinwillgung erteilt: </label> <span>{{ $client->data_protection }}</span>
                    
            </div>
            <div class="info-row" hidden>
                
            </div>
            <div class="info-row">
                <label class="information-label">Höchster formaler Bildungsabschluss: </label> <span>{{ $client->education }}</span>    
            </div>

            <div class="info-row">
                <label class="information-label">Anonyme Beratung: </label> <span>{{ $client->unknown_advice }}</span>        
            </div>
    
            <div class="info-row">
                <label class="information-label">Anfrage durch: </label> <span>{{ $client->advisor}}</span>        
            </div>


            <div class="info-row">
                <label class="information-label">Falls Sonstiges: </label> <span>{{ $client->another_advisor }}</span>
            </div>


            <div class="info-row">
                <label class="information-label">durch wen von Anerkennungsberatung erfahren?: </label> <span>{{ $client->recognition_person }}</span>
                    <label for="recognition"></label>
            </div>

            <div class="info-row">
                <label class="information-label">Falls Sonstiges: </label> <span>{{ $client->another_recognition_person}}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Nachname: </label> <span>{{ $client->last_name }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Vorname: </label> <span>{{ $client->first_name }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Straße. Nr: </label> <span>{{ $client->street }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Addresszusatz: </label> <span>{{ $client->address }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">PLZ: </label> <span>{{ $client->zip_code }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Ort: </label> <span>{{ $client->city }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Telefon: </label> <span>{{ $client->phone }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Email: </label> <span>{{ $client->email }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Wohnsitz in Deutschland: </label> <span>{{ $client->germany_residence }}</span>
            </div>
            <div class="info-row" hidden>
                
            </div>
            <div class="info-row">
                <label class="information-label">Bundesland: </label> <span>{{ $client->state }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Wohnsitz: </label> <span>{{ $client->residence }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Geschlecht: </label> <span>{{ $client->gender }}</span>
            </div>
            <div class="info-row" hidden>
            </div>
            <div class="info-row">
                <label class="information-label">Geburtsland: </label> <span>{{ $client->country }}</span>
            </div>
            <div class="info-row" hidden>
            </div>
            <div class="info-row">
                <label class="information-label">Geburtsjahr: </label> <span>{{ $client->birth_date }}</span>
            </div>
            <div class="info-row" hidden>
            </div>
            <div class="info-row">
                <label class="information-label">Erste Staatsangehörigkeit: </label> <span>{{ $client->first_nationality }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Zweite Staatsangehörigkeit: </label> <span>{{ $client->second_nationality }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Einreisejahr: </label> <span>{{ $client->reise_date }}</span>
            </div>
        </div>
    </div>

    <div class="info-container">
        <label for="info" class="info-label">Frühere Anträge</label>
        <div class="responsive-info">
            <div class="info-row">
                <label class="information-label">Zu welchem Referenzberuf: </label> <span>{{ $client->job }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Antrag gestellt: </label> <span>{{ $client->has_previous_application ? 'Ja' : 'Nein' }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Institution: </label> <span>{{ $client->previous_institution }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Ergebnis Gleichwertigkeitsprüfung: </label> <span>{{ $client->result }}</span>
            </div>
            <div class="info-row">
                <label class="information-label">Ergebnis Zeugnisbewertung: </label> <span>{{ $client->rating }}</span>
            </div>
            <div class="info-row" hidden></div>
            <a href="{{ route('clientinfo.edit', $client->id) }}"> <button class="btn-primary btn-form"> bearbeiten </button></a>

        </div>
    </div>
</div>
@stop
