<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class SubscriptionController extends Controller
{
    public function getSubscriptions()
    {
        $rows = Sheets::spreadsheet(env('TEST_SPREADSHEET_ID'))
            ->sheet('Subscriptions')
            ->get();

        $rows->pull(0);
        $header = ['text', 'link'];
        $values = Sheets::collection($header, $rows);
        return $values->values();
    }
}
