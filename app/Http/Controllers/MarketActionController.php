<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Revolution\Google\Sheets\Facades\Sheets;

class MarketActionController extends Controller
{
    public function getMarketState()
    {
        return Cache::remember('market_state', $this->cacheTime, function () {
            $values = Sheets::spreadsheet(env('TEST_SPREADSHEET_ID'))->sheet('Market state')->range('A1:A2')->all();
            return ['state' => $values[0][0], 'info' => $values[1][0]];
        });
    }

    public function getSymbols()
    {
        return Cache::remember('market_action_symbols', $this->cacheTime, function () {
            $rows = Sheets::spreadsheet(env('TEST_SPREADSHEET_ID'))
                ->sheet('Market action symbols')
                ->get();

            $rows->pull(0);
            $header = ['symbol', 'name'];
            $values = Sheets::collection($header, $rows);
            return $values->values();
        });
    }
}
