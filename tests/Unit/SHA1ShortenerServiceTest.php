<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\URL\SHA1ShortenerService;
use App\Services\URL\URLShortenerTypeInterface;

class SHA1ShortenerServiceTest extends TestCase
{
    private URLShortenerTypeInterface $shortener;

    /** @test
     *
     * Get short form of URL
     *
     * @return void
     */
    public function an_url_can_be_shortened_successfully()
    {
        $this->shortener = new SHA1ShortenerService();
        
        $url = 'http://google.com';
        $urlSet = $this->shortener->setUrl($url);
        $this->assertTrue($urlSet);
        $this->assertSame($url, $this->shortener->getUrl());

        $urlShort = $this->shortener->doShort();
        $this->assertIsString($urlShort);
    }
}
