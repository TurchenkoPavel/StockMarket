<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class MarketActionController extends Controller
{
    public function getMarketState()
    {
        $values = Sheets::spreadsheet(env('TEST_SPREADSHEET_ID'))->sheet('Market state')->range('A1:A2')->all();
        return ['state' => $values[0][0], 'info' => $values[1][0]];
    }

    public function getSymbols()
    {
        $rows = Sheets::spreadsheet(env('TEST_SPREADSHEET_ID'))
            ->sheet('Market action symbols')
            ->get();

        $rows->pull(0);
        $header = ['symbol'];
        $values = Sheets::collection($header, $rows);
        return $values->values();
    }
}
