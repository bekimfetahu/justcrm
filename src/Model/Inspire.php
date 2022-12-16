<?php


namespace Justcrm\Crm\Model;

use Illuminate\Support\Facades\Http;

class Inspire {

    public function justDoIt(): string
    {
        $response = Http::get('https://inspiration.goprogram.ai/');

        return $response['quote'] . ' -' . $response['author'];
    }
}
