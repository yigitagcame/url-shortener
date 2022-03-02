<?php

namespace App\Services\URL;

use App\Services\URL\URLShortenerTypeInterface;

class SHA1ShortenerService implements URLShortenerTypeInterface
{
    protected int $maxCharAllowed = 11;

    protected string|null $url = null;
    protected string|null $urlShort = null;

    public function setUrl(string $url): bool
    {
        $this->url = $url;
        return true;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getShort(): string | null
    {
        return $this->urlShort;
    }

    public function doShort() : string | bool
    {
        if (empty($this->url)) {
            return false;
        }

        $hashedUrl = sha1($this->url);
        $this->urlShort = str_split($hashedUrl . rand(100000, 9999999), $this->maxCharAllowed)[0];
        
        return $this->getShort();
    }
}
