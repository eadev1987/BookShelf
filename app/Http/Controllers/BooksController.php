<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $now = Carbon::now()->locale('lv_LV')->setTimezone('Europe/Riga')->toDateTimeString();
        $last_two_hours = Carbon::now()->subHours(2)->locale('lv_LV')->setTimezone('Europe/Riga')->toDateTimeString();
        $query = Books::withCount('purchases');
        $query->when(!isset($request->sort), function ($q) {
            return $q->orderBy('purchases_count','desc');
        });
        $query->when(isset($request->sort) && $request->sort == 'popularity', function ($q) {
            return $q->orderBy('purchases_count','desc');
        });
        $query->when(isset($request->sort) && $request->sort == 'titleUp', function ($q) {
            return $q->orderBy('title','asc');
        });
        $query->when(isset($request->sort) && $request->sort == 'titleDown', function ($q) {
            return $q->orderBy('title','desc');
        });
        $books = $query->get();

        foreach ($books as $book) {
           $book->recently_purchased = $book->purchases->where('created_at', '>', $last_two_hours)->count();
           $book->all_purchase_count = $book->purchases->count();
        }


       return view('welcome', compact('books'));
    }
}
