<?php

namespace App\Services\URL;

use App\Services\URL\URLSaverInterface;
use Illuminate\Database\Eloquent\Model;

class URLDBSaverService implements URLSaverInterface
{
    private object $URLModel;

    public function __construct(Model $model)
    {
        $this->URLModel = $model;
    }

    public function insert(string $url, string $shortUrl): bool
    {
        return $this->URLModel::insert([
          'url' => $url,
          'short' => $shortUrl
        ]);
    }
    
    public function get(string $shortUrl): string | null
    {
        return $this->URLModel::where('short', $shortUrl)->first();
    }

    public function getAll(): array
    {
        return $this->URLModel::all()->toArray();
    }
}
