<?php

namespace App\Services\URL;

interface URLSaverInterface
{
    public function insert(string $url, string $shortUrl) : bool;
    public function get(string $shortUrl);
    public function getAll() : array;
}
