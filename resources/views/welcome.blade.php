@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop
@section('main')

<!-- الهيدر الإضافي -->
<!-- Secondary Header -->
<header class="secondary-header bg-dark py-2" style="
    position: fixed; 
    top: 40px; /* Adjust based on primary header height */
    width: 100%; 
    z-index: 999;
    text-align: center;">
     <nav class="navbar2 navbar-expand-lg">
    
    <div class="">
                    <ul class="nav2 navbar-nav2 navbar-left2">
                        <li class=""><a href="/"  class="nav-link">lll</a></li>
                        <li class=""><a href="/ddd"  class="nav-link">kkk </a></li>
                        <li class=""><a href="/services"  class="nav-link">ddd</a></li>
                        <li class=""><a href="/career"  class="nav-link">mmm</a></li>
                    </ul>   
    </div>
     </nav>
</header>





    <div style="height: 2000px;">

    </div>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

@stop
