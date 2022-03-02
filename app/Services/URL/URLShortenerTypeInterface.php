<?php

namespace App\Services\URL;

interface URLShortenerTypeInterface
{
    public function setUrl(string $url) : bool;
    public function getUrl() : string;
    public function getShort() : string | null;
}
