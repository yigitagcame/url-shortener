<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShortenerControllerTest extends TestCase
{
    use RefreshDatabase;
    
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

    /** @test
     *
     * Non legit url shortining request can not pass.
     *
     * @return void
     */
    public function an_request_with_no_url_parameter_can_not_pass_shortening_api_validation()
    {
        $response = $this->post('/api/urls');

        $response->assertStatus(400);
    }

    /** @test
     *
     * Non legit url shortining request can not pass.
     *
     * @return void
     */
    public function an_request_with_no_active_url_parameter_can_not_pass_shortening_api_validation()
    {
        $response = $this->post('/api/urls', [
          'url' => 'https://www.google'
        ]);

        $response->assertStatus(400);
    }
}
