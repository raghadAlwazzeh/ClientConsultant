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
                        <li class="active"><a href="/newclient" class="nav-link">Neuer Ratsuchende/r</a></li>
                        <li class="dropdown"><a href="/ddd" class="nav-link">Einwilligungserklärung</a></li>
                        <!--li class="dropdown"><a href="/services"  class="nav-link">ddd</a></li>
                        <li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>









<div class="table-container table-responsive">
    <h2>client Information</h2>

   
    <form method="GET" action="{{ route('clients.index') }}">
        <input type="text" id="searchBox" name="search" placeholder="Search clients..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nachname</th>
                <th>Vorname</th>
                <th>Email</th>
                <th>Standort</th>
                <th>landkreis</th>
                <th>Beratungsfachkraft</th>
            </tr>
        </thead>
        <tbody id="clientTable">
        @foreach ($clients->items() as $client)
            <tr class="clickable-row" data-href="{{ route('clients.showinformation', $client->id) }}">
                <td>{{ $client->id }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->ort }}</td>
                <td>{{ $client->landkreis}}</td>
                <td>{{ $client->consultant->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="pagination">
        {{ $clients->links() }}
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
