<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShortenerControllerTest extends TestCase
{
    /** @test
     *
     * Insert an domain for short.
     *
     * @return void
     */
    public function an_url_can_be_shortened()
    {
        $response = $this->post('/api/urls', [
          'url' => 'https://www.google.com'
        ]);

        $response->assertStatus(201);
    }

    /** @test
     *
     * Get all domains shortened.
     *
     * @return void
     */
    public function urls_can_be_fetched()
    {
        $response = $this->get('/api/urls');

        $response->assertStatus(200);
    }
}
