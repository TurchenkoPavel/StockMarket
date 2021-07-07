<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Revolution\Google\Sheets\Facades\Sheets;

class OurUniqueApproachController extends Controller
{
    public function getUniqueApproach()
    {
        return Cache::remember('our_approach', $this->cacheTime, function () {
            $rows = Sheets::spreadsheet(env('TEST_SPREADSHEET_ID'))
                ->sheet('Our approach')
                ->get();

            $rows->pull(0);
            $header = ['question', 'answer'];
            $values = Sheets::collection($header, $rows);
            return $values->values();
        });
    }
}
