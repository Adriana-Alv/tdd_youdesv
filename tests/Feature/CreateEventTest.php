<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

class CreateEventTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_an_event_can_be_created(): void
    {
        $this->withoutExceptionHandling();
        //Arrange:
        $eventData = [
            'name' => 'Conferencia de YouDevs',
            'featured' => 'meme.png',
            'date' => Carbon::now(),
            'time' => '12:00:00',
            'location' => 'El Santiago de Cusco'

        ];
        //Act
        $response = $this->post('/events', $eventData);
        //Assert
        $response->assertStatus(302);
        $this->assertDatabaseHas('events', $eventData);
    }
}
