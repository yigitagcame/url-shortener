<?php

namespace App\Services\URL;

use App\Models\URLModel;
use App\Services\URL\URLSaverInterface;
use App\Services\URL\URLShortenerTypeInterface;
use App\Services\URL\URLDBSaverService;
use App\Services\URL\SHA1ShortenerService;

class URLShortenerService
{
    private URLShortenerTypeInterface $shortener;
    private URLSaverInterface $saver;
  
    public function __construct()
    {
        $this->shortener = new SHA1ShortenerService();
        $this->saver = new URLDBSaverService(new URLModel());
    }

    public function setUrl(string $url) : bool
    {
        $this->shortener->setUrl($url);
        $this->shortener->doShort();
        $shortUrl = $this->shortener->getShort();

        while ($this->saver->get($shortUrl)) {
            $shortUrl = $this->shortener->getShort();
        }

        return $this->saver->insert($url, $shortUrl);
    }

    public function getAll() : array
    {
        return $this->saver->getAll();
    }
}
