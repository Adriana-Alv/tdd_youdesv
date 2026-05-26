<?php

namespace Tests\Feature;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateEventTest extends TestCase
{
    use RefreshDatabase;

    protected Event $event;

    protected function setUp(): void
    {
        parent::setUp();

        $this->event = Event::create([
            'name' => 'Evento a ser actualizado',
            'featured' => 'meme.png',
            'date' => Carbon::now()->toDateString(),
            'time' => '12:00:00',
            'location' => 'El Santiago Bernabeu',
        ]);
    }

    public function test_an_event_can_be_updated(): void
    {
        // Arrange
        $updatedData = [
            'name' => 'Evento actualizado',
        ];

        // Act
        $response = $this->put('/events/' . $this->event->id, $updatedData);

        // Assert
        $response->assertStatus(200);

        $this->assertDatabaseHas('events', $updatedData); //[
            //'id' => $this->event->id,
            //'name' => 'Evento actualizado',
        //]);
    }
}
