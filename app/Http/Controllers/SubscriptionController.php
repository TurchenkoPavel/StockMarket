<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Revolution\Google\Sheets\Facades\Sheets;

class SubscriptionController extends Controller
{
    public function getSubscriptions()
    {
        return Cache::remember('subscriptions', $this->cacheTime, function () {
            $rows = Sheets::spreadsheet(env('TEST_SPREADSHEET_ID'))
                ->sheet('Subscriptions')
                ->get();

            $rows->pull(0);
            $header = ['name', 'descriptopn', 'price', 'link'];
            $values = Sheets::collection($header, $rows);
            return $values->values();
        });
    }
}
