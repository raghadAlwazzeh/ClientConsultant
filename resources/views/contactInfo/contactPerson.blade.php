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
                        <!--li class="dropdown"><a href="/services"  class="nav-link">ddd</a></li>
                        <li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>









<div class="table-container table-responsive">
    <h2>Ansprechpartner</h2>

   
    <form method="GET" action="">
        <input type="text" id="searchBox" name="search" placeholder="Search clients..." value="">
        <button type="submit">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name, vorname</th>
                <th>Funktion</th>
                <th>Telefon</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="clientTable">
        @foreach ($users as $user)
            <tr class="clickable-row" data-href="">
                <td>{{ $user->name }}, {{ $user->first_name }}</td>
                <td>{{ $user->position }}</td>
                <td>{{ $user->phone}}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="pagination">
        {{ $users->links() }}
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
