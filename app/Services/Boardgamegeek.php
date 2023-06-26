<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Boardgamegeek {
    public function getInfo(String $url) {

        $xml = simplexml_load_string(Http::get($url));
        $json = json_encode($xml);
        return json_decode($json, true);
    }

    public function gameUrlBuilder(String $game): string
    {
        return config('services.bgg.url').'thing?id='.$game;
    }

    public function getHotItems() {
        return $this->getInfo(config('services.bgg.url') . 'hot?type=boardgame');
    }
}
