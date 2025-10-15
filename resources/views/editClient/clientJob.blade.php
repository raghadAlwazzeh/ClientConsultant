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

<form action="{{ route('job.update', $job->id) }}" method="POST">
    @csrf
    @method('PATCH') 
    
    <div class="whole-container" style="width: 100%;">
    <h3> {{$job->client->last_name}}, {{$job->client->first_name}}</h3>
        <div class="form-container">
            <label for="form" class="form-label">Berufliche Situation</label>
            <div class="responsive-form">
                <div class="form-row">
                    <label for="employment_status">Erwerbsstatus <span class="req">*</span></label>
                    <select id="employment_status" name="employment_status" required>
                        <option value="">-- Erwerbsstatus --</option>
                        <option value="ja" {{ $job->employment_status == 'ja' ? 'selected' : '' }}>Ja</option>
                        <option value="nein" {{ $job->employment_status == 'nein' ? 'selected' : '' }}>Nein</option>
                    </select>
                </div>
                {{-- Art der Erwerbstätigkeit (nur wenn Ja) --}}
                <div class="form-row" id="employment_type_row" style="display:none;">
                    <label for="employment_type">Art der Erwerbstätigkeit</label>
                    <select id="employment_type" name="employment_type">
                        <option value="">-- Erwerbstätigkeit --</option>
                        <option value="voll" {{ $job->employment_type == 'voll' ? 'selected' : '' }}>Vollzeit Beschäftigung</option>
                        <option value="teilzeit" {{ $job->employment_type == 'teilzeit' ? 'selected' : '' }}>Teilzeit Beschäftigung</option>
                        <option value="selbstaendig" {{ $job->employment_type == 'selbstaendig' ? 'selected' : '' }}>Selbständig</option>
                    </select>
                </div>

                {{-- Leistungsbezug (nur wenn Nein) --}}
                <div class="form-row" id="funding_source_row" style="display:none;">
                    <label for="funding_source">Leistungsbezug <span class="req">*</span></label>
                    <select id="funding_source" name="funding_source">
                        <option value="">-- Leistungsbezug --</option>
                        <option value="jobcenter" {{ $job->funding_source == 'jobcenter' ? 'selected' : '' }}>Jobcenter</option>
                        <option value="agentur" {{ $job->funding_source == 'agentur' ? 'selected' : '' }}>Agentur für Arbeit</option>
                        <option value="sozialamt" {{ $job->funding_source == 'sozialamt' ? 'selected' : '' }}>Sozialamt</option>
                        <option value="anderes" {{ $job->funding_source == 'anderes' ? 'selected' : '' }}>Anderes</option>
                    </select>
                </div>

                {{-- Kundennummer (nur wenn Jobcenter oder Agentur) --}}
                <div class="form-row" id="kundennummer_row" style="display:none;">
                    <label for="kundennummer">Kundennummer <span class="req">*</span></label>
                    <input type="text" id="kundennummer" name="kundennummer" value="{{ $job->kundennummer }}">
                </div>

                <div class="form-row" hidden id="hidden_row" style="display:none;">
                    
                </div>
                {{-- Aufenthaltstatus --}}
                <div class="form-row">
                    <label for="residence_status">Aufenthaltstatus</label>
                    <select id="residence_status" name="residence_status">
                        <option value="">-- Aufenthaltstatus --</option>
                        @foreach(config('appdata.residence_status') as $key => $label)
                            <option value="{{ $key }}" {{ $job->residence_status == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row" hidden id="second_hidden_row" style="display:none;">
                    
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const employmentStatus = document.getElementById('employment_status');
    const employmentTypeRow = document.getElementById('employment_type_row');
    const fundingSourceRow = document.getElementById('funding_source_row');
    const kundennummerRow = document.getElementById('kundennummer_row');
    const fundingSource = document.getElementById('funding_source');
    const hiddenRow = document.getElementById('hidden_row');
    const secondHiddenRow = document.getElementById('second_hidden_row');

    function toggleFields() {
        if (employmentStatus.value === 'ja') {
            secondHiddenRow.style.display = 'block';
            employmentTypeRow.style.display = 'flex';
            fundingSourceRow.style.display = 'none';
            kundennummerRow.style.display = 'none';
            fundingSource.value = '';
        } else if (employmentStatus.value === 'nein') {
            secondHiddenRow.style.display = 'block';
            fundingSourceRow.style.display = 'flex';
            employmentTypeRow.style.display = 'none';

            if (fundingSource.value === 'jobcenter' || fundingSource.value === 'agentur') {
                kundennummerRow.style.display = 'flex';
                hiddenRow.style.display = 'block';
            } else {
                kundennummerRow.style.display = 'none';
            }
        } else {
            employmentTypeRow.style.display = 'none';
            fundingSourceRow.style.display = 'none';
            kundennummerRow.style.display = 'none';
        }
    }

    employmentStatus.addEventListener('change', toggleFields);
    fundingSource.addEventListener('change', toggleFields);

    // أول تحميل للصفحة
    toggleFields();
});
</script>

@stop

