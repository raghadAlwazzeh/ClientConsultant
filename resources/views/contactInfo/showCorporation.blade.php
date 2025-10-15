@extends('app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop
@section('main')


<!-- Secondary Header -->
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
                    </ul>   
    </div>
     </nav>
</header>









<div class="table-container table-responsive">
    <h2>Liste der Kooperation</h2>

   
    <form method="GET" action="{{ route('cooporation.show') }}">
        <input type="text" id="searchBox" name="search" placeholder="Search Cooporations..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Datum der Veranstaltung</th>
                <th>Veranstaltungsart</th>
                <th>zuletzt bearbeitet</th>
                <th>von</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="clientTable">
            @if($corporations->isNotEmpty())
        @foreach ($corporations->items() as $corporation)
            <tr class="clickable-row" data-href="">
                <td>{{ $corporation->short_title }}</td>
                <td>{{ $corporation->event_date }}</td>
                <td>{{ $corporation->event_type }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        @else
        <tr>
                <td colspan="6" class="text-center">Keine Anträge vorhanden</td>
        </tr>
        @endif
       

            <tr class="clickable-row" data-href="{{url('/cooporation/add')}}">
                <td colspan="6" class="text-center"><b>Neue Kooperation eintragen</b></td>
            </tr>
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="pagination">
        {{ $corporations->links() }}
    </div>
</div>

<script>
    document.getElementById("searchBox").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#clientTable tr");

        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>





    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

@stop
