<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now()->locale('lv_LV')->setTimezone('Europe/Riga');
        $last_two_hours = Carbon::now()->subHours(2)->locale('lv_LV')->setTimezone('Europe/Riga');

        $books = Books::withCount('purchases')->orderBy('purchases_count', 'desc')->get();
        foreach ($books as $book) {
           $book->recently_purchased = $book->purchases->where('created_at', '>', $last_two_hours)->count();
           $book->all_purchase_count = $book->purchases->count();
        }


       return view('welcome', compact('books'));
    }
}
