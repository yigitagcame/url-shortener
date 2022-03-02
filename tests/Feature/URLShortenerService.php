<?php

namespace Tests\Unit;

use Tests\TestCase;

class URLShortenerService extends TestCase
{

    /** @test
     *
     * An url can be shortened successfully via service
     *
     * @return void
     */
    public function an_url_can_be_shortened_successfully_via_service()
    {
        $this->shortener = new URLShortenerService();
        
        $url = 'http://google.com';
        $urlSet = $this->shortener->setUrl($url);
        $this->assertTrue($urlSet);
    }
}
