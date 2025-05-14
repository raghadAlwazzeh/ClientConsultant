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
                        <li class="active"><a href="/documentbop/show" class="nav-link">Dokumente</a></li>
                        <li class="dropdown"><a href="/documentbou/show" class="nav-link">Linkliste</a></li>
                        <!--li class="dropdown"><a href="/services"  class="nav-link">ddd</a></li>
                        <li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>









<div class="table-container table-responsive">
    <h2>client Information</h2>

   
    <form method="GET" action="{{ route('documentbou.show') }}">
        <input type="text" id="searchBox" name="search" placeholder="Search clients..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bezeichnung</th>
                <th>Link</th>
                <th>Beschreibung</th>
            </tr>
        </thead>
        <tbody id="clientTable">
        @foreach ($documents->items() as $document)
            <tr class="clickable-row" data-href="">
                <td>{{ $document->indication }}</td>
                <td><a href="{{$document->document_url }}" target="_blank" style="color:blue;">{{$document->document_url }} </a></td>
                <td>{{$document->description}}</td>
            </tr>
        @endforeach
            <tr class="clickable-row" data-href="{{url('/documentbou/add')}}">
                <td colspan="6" class="text-center"><b>Neue Dokumentdaten</b></td>
            </tr>
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="pagination">
        {{ $documents->links() }}
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
