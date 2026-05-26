<?php

namespace Tests\Feature;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_display_list_of_events(): void
    {
        $this->withoutExceptionHandling();

        // Arrange
        Event::create([
            'name' => 'Evento 1',
            'featured' => 'meme.png',
            'date' => Carbon::now()->toDateString(),
            'time' => '12:00:00',
            'location' => 'El Santiago Bernabeu',
        ]);

        Event::create([
            'name' => 'Evento 2',
            'featured' => 'meme.png',
            'date' => Carbon::now()->toDateString(),
            'time' => '12:00:00',
            'location' => 'El Santiago Bernabeu',
        ]);

        // Act
        $response = $this->get('/events');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Evento 1');
        $response->assertSee('Evento 2');
    }
}