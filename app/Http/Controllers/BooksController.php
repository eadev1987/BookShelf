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
        $now = Carbon::now()->locale('lv_LV')->setTimezone('Europe/Riga');
        $last_two_hours = Carbon::now()->subHours(2)->locale('lv_LV')->setTimezone('Europe/Riga');
        $query = Books::withCount('purchases');
        $query->when(!isset($request->sort), function ($q) {
            return $q->orderBy('purchases_count','desc');
        });
        $query->when(isset($request->sort) && $request->sort == 'popularity', function ($q) {
            return $q->orderBy('purchases_count','desc');
        });
        $query->when(isset($request->sort) && $request->sort == 'title', function ($q) {
            return $q->orderBy('title','asc');
        });
        $books = $query->get();
        foreach ($books as $book) {
           $book->recently_purchased = $book->purchases->where('created_at', '>', $last_two_hours)->count();
           $book->all_purchase_count = $book->purchases->count();
        }


       return view('welcome', compact('books'));
    }
}
