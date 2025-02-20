<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PurchasesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $now = Carbon::now()->locale('lv_LV')->setTimezone('Europe/Riga');
            $purchase = new Purchases();

            $purchase->book_id = $request->book_id;
            $purchase->created_at = $now;
            $purchase->updated_at = $now;

            try {
                $purchase->save();
            } catch (\Throwable $th) {
                report($th);
            }
        return back();
    }

}
