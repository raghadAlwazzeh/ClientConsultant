@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('main')

<form action="{{ url('/newclient/jobsituation') }}" method="POST">
    @csrf
    
    <div class="whole-container" style="width: 100%;">
        <div class="form-container">
            <label for="form" class="form-label">Berufliche Situation</label>
            <div class="responsive-form">
                
                {{-- Erwerbsstatus --}}
                <div class="form-row">
                    <label for="employment_status">Erwerbsstatus <span class="req">*</span></label>
                    <select id="employment_status" name="employment_status" required>
                        <option value="">-- Erwerbsstatus --</option>
                        <option value="ja">Ja</option>
                        <option value="nein">Nein</option>
                    </select>
                </div>

                {{-- Art der Erwerbstätigkeit (nur wenn Ja) --}}
                <div class="form-row" id="employment_type_row" style="display:none;">
                    <label for="employment_type">Art der Erwerbstätigkeit </label>
                    <select id="employment_type" name="employment_type">
                        <option value="">-- Erwerbstätigkeit --</option>
                        <option value="voll">Vollzeit Beschäftigung</option>
                        <option value="teilzeit">Teilzeit Beschäftigung</option>
                        <option value="selbstaendig">Selbständig</option>
                    </select>
                </div>

                {{-- Leistungsbezug (nur wenn Nein) --}}
                <div class="form-row" id="funding_source_row" style="display:none;">
                    <label for="funding_source">Leistungsbezug <span class="req">*</span></label>
                    <select id="funding_source" name="funding_source">
                        <option value="">-- Leistungsbezug --</option>
                        <option value="jobcenter">Jobcenter</option>
                        <option value="agentur">Agentur für Arbeit</option>
                        <option value="sozialamt">Sozialamt</option>
                        <option value="anderes">Anderes</option>
                    </select>
                </div>

                {{-- Kundennummer (nur wenn Jobcenter oder Agentur) --}}
                <div class="form-row" id="kundennummer_row" style="display:none;">
                    <label for="kundennummer">Kundennummer <span class="req">*</span></label>
                    <input type="text" id="kundennummer" name="kundennummer">
                </div>

                <div class="form-row" hidden id="hidden_row" style="display:none;">
                    
                </div>

                <div class="form-row">
                    <label for="residence_status">Aufenthaltstatus</label>
                    <select id="residence_status" name="residence_status">
                        <option value="">-- Aufenthaltstatus --</option>
                            @foreach(config('appdata.residence_status') as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                            @endforeach
                    </select>
                </div>

                <div class="form-row" hidden id="second_hidden_row" style="display:none;">
                    
                </div>

                <button class="btn-primary btn-form" type="submit">Speichern</button>
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

    employmentStatus.addEventListener('change', function() {
        if (this.value === 'ja') {
            secondHiddenRow.style.display = 'block';
            employmentTypeRow.style.display = 'flex';
            fundingSourceRow.style.display = 'none';
            kundennummerRow.style.display = 'none';
            fundingSource.value = '';
        } else if (this.value === 'nein') {
            secondHiddenRow.style.display = 'block';
            fundingSourceRow.style.display = 'flex';
            employmentTypeRow.style.display = 'none';
        } else {
            employmentTypeRow.style.display = 'none';
            fundingSourceRow.style.display = 'none';
            kundennummerRow.style.display = 'none';
        }
    });

    fundingSource.addEventListener('change', function() {
        if (this.value === 'jobcenter' || this.value === 'agentur') {
            hiddenRow.style.display = 'block';
            kundennummerRow.style.display = 'flex';
        } else {
            kundennummerRow.style.display = 'none';
        }
    });
});
</script>

@stop
