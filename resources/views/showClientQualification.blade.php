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
    <div class="table-container table-responsive">
        <h4>Schulicher Abschluss</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Erwerbsland</th>
                    <th>Dauer Schulbildung (Jahre)</th>
                    <th>Abschlussjahr</th>
                    <th>Originaltitel</th>
                    <th>Übersetzung</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="clientTable"> 
            @if($client->schoolEducation->isNotEmpty())  
            @foreach($client->schoolEducation as $education)   
                <tr class="clickable-row" data-href="{{ route('clients.showinformation', $client->id) }}">
                    <td> {{ $education->school_country }}</td>
                    <td>{{ $education->school_study_duration }}</td>
                    <td>{{ $education->school_graduation_year }}</td>
                    <td>{{ $education->school_study_titel }}</td>
                    <td>{{$education->school_german_translate }}</td>
                    <td style="width: 10%;"><a href="{{ route('schooleducation.edit', $education->id) }}"><button class="btn-table">bearbeiten</button></a></td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center">Keine Anträge vorhanden</td>
            </tr>
        @endif
        <tr class="clickable-row" data-href="{{url('/newclient/schooleducation/' .$client->id)}}">
            <td colspan="6" class="text-center"><b>Neuer Schulicher Abschluss</b></td>
        </tr>
            </tbody>
        </table>
    </div>


    <div class="table-container table-responsive">
        <h4>Ausbildungsabschluss</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Erwerbsland</th>
                    <th>Dauer Berufsausbildung (Jahre)</th>
                    <th>Abschlussjahr</th>
                    <th>Originaltitel</th>
                    <th>Übersetzung</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="clientTable"> 
            @if($client->training->isNotEmpty())  
            @foreach($client->training as $training)   
                <tr class="clickable-row" data-href="{{ route('clients.showinformation', $client->id) }}">
                    <td> {{ $training->training_country }}</td>
                    <td>{{ $training->training_study_duration }}</td>
                    <td>{{$training->training_graduation_year }}</td>
                    <td>{{ $training->training_study_titel }}</td>
                    <td>{{$training->training_german_translate }}</td>
                    <td style="width: 10%;"><a href="{{ route('training.edit', $training->id) }}"><button class="btn-table">bearbeiten</button></a></td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">Keine Anträge vorhanden</td>
            </tr>
        @endif
            <tr class="clickable-row" data-href="{{url('/newclient/training/' .$client->id)}}">
                <td colspan="6" class="text-center"><b>Neuer Ausbildungsabschluss</b></td>
            </tr>
            </tbody>
        </table>
    </div>


    <div class="table-container table-responsive">
        <h4>Hochschulabschluss</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Erwerbsland</th>
                    <th>Dauer Studium</th>
                    <th>Abschlussjahr</th>
                    <th>Originaltitel</th>
                    <th>Übersetzung</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="clientTable"> 
            @if($client->universityDegree->isNotEmpty())  
            @foreach($client->universityDegree as $degree)   
                <tr class="clickable-row" data-href="">
                    <td> {{ $degree->country }}</td>
                    <td>{{$degree->study_duration }}</td>
                    <td>{{ $degree->graduation_year }}</td>
                    <td>{{ $degree->study_titel }}</td>
                    <td>{{$degree->german_translate }}</td>
                    <td style="width: 10%;"><a href="{{ route('universitydegree.edit', $degree->id) }}"><button class="btn-table">bearbeiten</button></a></td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">Keine Anträge vorhanden</td>
            </tr>
        @endif
        <tr class="clickable-row" data-href="{{url('/newclient/universitydegree/' .$client->id)}}">
         <td colspan="6" class="text-center"><b>Neuer Hochschulabschluss</b></td>
        </tr>
            </tbody>
        </table>
    </div>

    <div class="table-container table-responsive">
        <h4>Berufliche Situation</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Erwerbsstatus</th>
                    <th>Leistungsbezug</th>
                    <th>Aufenthaltsstatus</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="clientTable"> 
            @if($client->jobSituation->isNotEmpty())  
            @foreach($client->jobSituation as $job)   
                <tr class="clickable-row" data-href="{{ route('clients.showinformation', $client->id) }}">
                    <td> {{ $job->employment_status }}</td>
                    <td>{{ $job->funding_source }}</td>
                    <td>{{ $job->residence_status }}</td>
                    <td style="width: 10%;"><a href="{{ route('job.edit', $job->id) }}"><button class="btn-table">bearbeiten</button></a></td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">Keine Anträge vorhanden</td>
            </tr>
        @endif
        
            </tbody>
        </table>
    </div>


    <div class="table-container table-responsive">
        <h4>Sprachkenntnisse</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>DeutchKenntnisse der/des Ratsuchenden</th>
                    <th>Wenn als Fremdsprache Zertifikat vorhanden?</th>
                    <th>Wenn Zertifikatvorhanden, auf welchem Niveau?</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="clientTable"> 
            @if($client->languageSkill->isNotEmpty())  
            @foreach($client->languageSkill as $language)   
                <tr class="clickable-row" data-href="{{ route('clients.showinformation', $client->id) }}">
                    <td> {{ $language->german_skill }}</td>
                    <td>{{ $language->german_certificate }}</td>
                    <td>{{ $language->german_level }}</td>
                    <td style="width: 10%;"><a href="{{ route('languageskill.edit', $language->id) }}"><button class="btn-table">bearbeiten</button></a></td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">Keine Anträge vorhanden</td>
            </tr>
        @endif
        
            </tbody>
        </table>
    </div>

</div>       


        

        
   




    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

@stop

