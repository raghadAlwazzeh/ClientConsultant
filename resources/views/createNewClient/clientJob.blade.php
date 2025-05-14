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
                <div class="form-row">
                <label for="employment_status">Erwerbsstatus </label>
                    <select id="employment_status" name="employment_status" >
                        <option value="">-- Erwerbsstatus --</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                <label for="employment_type">Art der Erwerbstätigkeit<span class="req">*</span></label>
                    <select id="employment_type" name="employment_type" r>
                        <option value="">-- Erwerbstätigkeit --</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row">
                <label for="funding_source">Leistungsbezug<span class="req">*</span></label>
                    <select id="funding_source" name="funding_source" required>
                        <option value="">-- Leistungsbezug --</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row" hidden>
                    
                </div>
                <div class="form-row">
                <label for="residence_status">Aufenthaltstatus</label>
                    <select id="residence_status" name="residence_status">
                        <option value="">-- Aufenthaltstatus --</option>
                        <option value="usa">United States</option>
                        <option value="canada">Canada</option>
                        <option value="uk">United Kingdom</option>
                        <option value="india">India</option>
                        <option value="australia">Australia</option>
                    </select>
                </div>
                <div class="form-row" hidden>
                    
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

@stop

