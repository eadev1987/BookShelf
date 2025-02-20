<?php

namespace App\Http\Controllers\Api;

use App\Models\Books;
use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class ApiController extends Controller
{
   public function index()
   {
        $start = Carbon::now()->startOfMonth()->toDateTimeString();
        $top_books = Purchases::select('book_id')->where('created_at', '>', $start)->groupBy('book_id')->take(10)->get();

        $book_names = Books::withCount('purchases')->whereIn('id', $top_books->pluck('book_id'))->orderBy('purchases_count', 'DESC')->get();

        return BookResource::collection($book_names);
   }
}
