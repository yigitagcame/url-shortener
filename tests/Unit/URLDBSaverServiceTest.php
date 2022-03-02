<?php

namespace Tests\Unit;

use App\Models\URLModel;
use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\URL\URLSaverInterface;
use App\Services\URL\URLDBSaverService;

class URLDBSaverServiceTest extends TestCase
{
    use RefreshDatabase;
    private URLSaverInterface $saver;

    /** @test
     *
     * An url can successfully saved
     *
     * @return void
     */
    public function an_url_can_be_saved_successfully()
    {
        $this->saver = new URLDBSaverService(new URLModel());
        
        $url = 'http://google.com';
        $short = rand(10000000000, 99999999999);
        $urlSet = $this->saver->insert($url, $short);
        $this->assertTrue($urlSet);
        $this->assertNotNull($this->saver->get($short));
    }

    /** @test
     *
     * Urls can be retrived
     *
     * @return void
     */
    public function urls_can_be_retrived_successfully()
    {
        $this->saver = new URLDBSaverService(new URLModel());
        
        $url = 'http://google.com';
        $short = rand(10000000000, 99999999999);
        $urlSet = $this->saver->insert($url, $short);
        $this->assertTrue($urlSet);
        $this->assertNotNull($this->saver->get($short));

        $this->assertNotEmpty($this->saver->getAll());
    }
}
