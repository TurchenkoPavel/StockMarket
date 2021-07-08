<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Revolution\Google\Sheets\Facades\Sheets;

class TradeSetupController extends Controller
{
    public function getSymbolInfo(Request $request)
    {
        $request->validate(['symbol' => 'required']);
        $symbol = $request->input('symbol');

        return Cache::remember('symbol_info_'.$symbol, $this->cacheTime, function () use ($symbol) {
            $yahooProfile = Http::retry(5, 1000)->withHeaders([
                'x-rapidapi-key' => env('X_RAPIDAPI_KEY'),
                'x-rapidapi-host' => env('X_RAPIDAPI_HOST')
            ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/get-profile', ['symbol' => $symbol]);

            $yahooProfile = $yahooProfile->throw()->json();

            return [
                'short_name' => $yahooProfile['price']['shortName'] ?? '',
                'long_name' => $yahooProfile['price']['longName'] ?? '',
                'sector' => $yahooProfile['assetProfile']['sector'] ?? '',
                'industry' => $yahooProfile['assetProfile']['industry'] ?? '',
                'market_cap' => $yahooProfile['price']['marketCap'] ?? ['raw' => null, 'fmt' => '', 'longFmt' => ''],
                'change' => $yahooProfile['price']['regularMarketChange'] ?? ['raw' => null, 'fmt' => ''],
                'change_percent' => $yahooProfile['price']['regularMarketChangePercent'] ?? ['raw' => null, 'fmt' => ''],
                'price' => $yahooProfile['price']['regularMarketPrice'] ?? ['raw' => null, 'fmt' => ''],
                'currency_symbol' => $yahooProfile['price']['currencySymbol'] ?? '',
                'currency' => $yahooProfile['price']['currency'] ?? '',
            ];
        });
    }

    public function getOpenOrders()
    {
        return Cache::remember('open_orders', $this->cacheTime, function () {
            $rows = Sheets::spreadsheet(env('TEST_SPREADSHEET_ID'))
                ->sheet('Open orders')
                ->get();

            $rows->pull(0);
            $header = ['symbol', 'order', 'stop', 'limit', 'trade_setup', 'market'];
            $values = Sheets::collection($header, $rows);
            return $values->values();
        });
    }
}
