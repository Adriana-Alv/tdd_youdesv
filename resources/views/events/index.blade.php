@foreach ($events as $event)
    <div class="event">
        <h2>{{ $event->name }}</h2>
        <p>Fecha: {{ $event->date }}</p>
        <p>Hora: {{ $event->time }}</p>
        <p>Ubicación: {{ $event->location }}</p>
    </div>
@endforeach