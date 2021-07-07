<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class OurUniqueApproachController extends Controller
{
    public function getUniqueApproach()
    {
        $rows = Sheets::spreadsheet(env('TEST_SPREADSHEET_ID'))
            ->sheet('Our approach')
            ->get();

        $rows->pull(0);
        $header = ['text', 'link'];
        $values = Sheets::collection($header, $rows);
        return $values->values();
    }
}
