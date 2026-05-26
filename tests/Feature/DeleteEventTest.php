<?php

namespace Tests\Feature;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_event_can_be_deleted(): void
    {
        // Arrange
        $event = Event::create([
            'name' => 'Evento a eliminar',
            'featured' => 'meme.png',
            'date' => Carbon::now()->toDateString(),
            'time' => '12:00:00',
            'location' => 'El Santiago Bernabeu',
        ]);

        // Act
        $response = $this->delete('/events/' . $event->id);

        // Assert
        $response->assertStatus(204);

        $this->assertDatabaseMissing('events', [
            'id' => $event->id,
        ]);
    }
}
