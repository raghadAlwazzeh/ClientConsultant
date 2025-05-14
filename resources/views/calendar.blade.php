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
                        <li ><a href="{{ route('clients.showinformation', $client->id) }}" class="nav-link">persönliche Daten</a></li>
                        <li><a href="{{ route('clients.showqualification', $client->id) }}" class="nav-link">Qualificationen</a></li>
                        <li><a href="{{ route('conversationprotocol.showall', $client->id) }}"  class="nav-link">Gesprächsprotokolle</a></li>
                        <li><a href="{{ route('task.show', $client->id) }}"  class="nav-link">Aufgaben</a></li>
                        <li><a href="{{ route('calendar', $client->id) }}"  class="nav-link">Kalendar</a></li>
                        <li><a href="{{ route('client.document.show', $client->id) }}"  class="nav-link">Dokument</a></li>

                        <!--li class="dropdown"><a href="/career" class="nav-link">mmm</a></li-->
                    </ul>   
    </div>
     </nav>
</header>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


    <div class="mx-auto bg-white p-6 rounded shadow" style=" width: 80%;">
        @php
            $prevMonth = $date->copy()->subMonth();
            $nextMonth = $date->copy()->addMonth();
        @endphp

        <div class="flex justify-between items-center mb-6" >
            <a href="{{ route('calendar', [$client ,'year' => $prevMonth->year, 'month' => $prevMonth->month]) }}"
               class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">
                ← Vorheriger Monat
            </a>

            <h1 class="text-2xl font-bold">{{ $date->locale('de')->translatedFormat('F Y') }}</h1>

            <a href="{{ route('calendar', [$client, 'year' => $nextMonth->year, 'month' => $nextMonth->month]) }}"
               class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">
                Nächster Monat →
            </a>
        </div>

        {{-- Ereignis hinzufügen --}}
        
        <form action="{{ route('calendar.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-2 mb-6 items-center">
            @csrf
            <input type="text" name="title" placeholder="Titel des Ereignisses" required class="border p-2 rounded">
            <input type="date" name="start_time" value="{{ $date->format('Y-m-d') }}" required class="border p-2 rounded">
            <input type="time" name="start_hour" required class="border p-2 rounded">
            <input type="time" name="end_hour" required class="border p-2 rounded">
            <input type="text" name="description" placeholder="Beschreibung" class="border p-2 rounded col-span-2">
            <select name="client_id" required class="border p-2 rounded">
                <option value="{{ $client->id }}">{{$client->first_name}} {{$client->last_name}}</option>
                {{--@foreach(App\Models\Client::all() as $client)
                    <!--option value="{{ $client->id }}">{{ $client->first_name }}</option-->
                @endforeach--}}
            </select>
            <select name="user_id" required class="border p-2 rounded" hidden>
                <option disabled selected>Berater auswählen</option>
                @foreach(App\Models\User::all() as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <div class="col-span-1 md:col-span-4 flex justify-center" >
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded col-span-1 md:col-span-4" style="width: 30%; height: 35px; margin: 10px">
                Ereignis hinzufügen
            </button>
            </div>
        </form>
        
        {{-- Kalender --}}
        @php
            use Carbon\Carbon;

            $startDay = $startOfMonth->copy()->startOfWeek(Carbon::SATURDAY);
            $endDay = $endOfMonth->copy()->endOfWeek(Carbon::FRIDAY);
            $current = $startDay->copy();
        @endphp
    <div style=" width: 80%; margin-left:auto; margin-right:auto; ">
        <div class="grid grid-cols-7 gap-2 font-bold text-center text-gray-700 mb-2">
            <div>Samstag</div><div>Sonntag</div><div>Montag</div><div>Dienstag</div>
            <div>Mittwoch</div><div>Donnerstag</div><div>Freitag</div>
        </div>

        <div class="grid grid-cols-7 gap-2 text-sm" >
            @while($current <= $endDay)
                @php
                    $formatted = $current->format('Y-m-d');
                    $dayEvents = $events[$formatted] ?? collect();
                @endphp

                <div class="border rounded p-1 h-32 overflow-y-auto text-xl
                            {{ $current->month != $date->month ? 'bg-gray-100 text-gray-400' : 'bg-white' }}">
                    <div class="font-bold mb-1">{{ $current->day }}</div>
                    @foreach($dayEvents as $event)
                    <div class="mb-1 text-left border-b border-dashed pb-1 cursor-pointer" 
                        onclick="showModal(this)"
                        data-id="{{ $event->id }}"
                        data-title="{{ $event->title }}"
                        data-client="{{ $event->client->first_name }} {{ $event->client->last_name }}"
                        data-consultant="{{ $event->consultant->name }}"
                        data-time="{{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}"
                        data-description="{{ $event->description }}">
                        <strong>{{ $event->title }}</strong><br>
                        <span class="text-gray-600 text-xl">Kunde: {{ $event->client->first_name }} {{ $event->client->last_name }}</span><br>
                        <span class="text-gray-600 text-xl">Berater: {{ $event->consultant->name }}</span><br>
                        <small class="text-gray-500">
                            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} -
                            {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}
                        </small>
                        <form method="POST" action="{{ route('calendar.destroy', $event->id) }}" onsubmit="return confirm('Bist du sicher, dass du dieses Ereignis löschen möchtest?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-xl strong">Löschen</button>
                        </form>
                    </div>

                    @endforeach
                </div>

                @php $current->addDay(); @endphp
            @endwhile
        </div>
</div>
<div class="whole-container" style="width: 100%; margin: 20px;">   
    <div class="table-container table-responsive">
        <h4>Termine</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Datum</th>
                <th>Uhrzeit</th>
                <th>Betreff</th>
                <th></th>
                </tr>
            </thead>
            <tbody id="clientTable"> 
            @if($client->calendars->isNotEmpty())  
            @foreach($client->calendars as $cal)   
                <tr class="clickable-row" data-href="">
                    <td>{{ \Carbon\Carbon::parse($cal->start_time)->format('d.m.Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($cal->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($cal->end_time)->format('H:i') }}</td>
                    <td>{{ $cal->title }}</td>
                    <td style="width: 10%;"><a href><button class="btn-table">löchen</button></a></td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center">Keine Aufgaben</td>
            </tr>
        @endif
        
            </tbody>
        </table>
    </div>


</div> 
<!-- Modal -->
<div id="eventModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded shadow-md w-96 relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
        <h2 class="text-xl font-bold mb-2" id="modalTitle"></h2>
        <p class="text-gray-700 mb-1"><strong>Kunde:</strong> <span id="modalClient"></span></p>
        <p class="text-gray-700 mb-1"><strong>Berater:</strong> <span id="modalConsultant"></span></p>
        <p class="text-gray-700 mb-1"><strong>Zeit:</strong> <span id="modalTime"></span></p>
        <p class="text-gray-700"><strong>Beschreibung:</strong><br><span id="modalDescription"></span></p>
        <form id="modalDeleteForm" method="POST" action="" onsubmit="return confirm('Bist du sicher, dass du dieses Ereignis löschen möchtest?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline text-xl strong">Löschen</button>
        </form>
    </div>
</div>


    </div>


<!-- Preloader -->
<div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <script>
    function showModal(event) {
        document.getElementById('modalTitle').innerText = event.dataset.title;
        document.getElementById('modalClient').innerText = event.dataset.client;
        document.getElementById('modalConsultant').innerText = event.dataset.consultant;
        document.getElementById('modalTime').innerText = event.dataset.time;
        document.getElementById('modalDescription').innerText = event.dataset.description;

        const deleteForm = document.getElementById('modalDeleteForm');
        const eventId = event.dataset.id;
        
        deleteForm.action = `/calendar/${eventId}`;


        document.getElementById('eventModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('eventModal').classList.add('hidden');
    }
</script>

@stop
