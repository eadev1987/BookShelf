<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bookshelf</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src="{{asset('js/script.js')}}"></script>
    </head>
    <body>
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-6 text-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                      </svg>
                </div>
                <div class="col-6 my-auto">
                    <h1 class="title"> Bookshelf</h1>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 offset-md-4">
                    <label class="visually-hidden" for="search">Meklēšana</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </div>
                        <input id="filter" type="search" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-5 px-5">
                @foreach ($books as $book)

                <div class="col-3 mt-3 searchable">
                    <div class="card" style="width: 25rem; height: 45rem;">
                        @if ($book->recently_purchased > 0)
                            <div class="card-header bg-warning">
                                <strong>Recently purchased</strong>
                            </div>
                        @endif
                            <img src="{{asset('images/books/'.$book->image)}}" class="card-img-top" alt="..." height="400px">
                            <div class="card-body position-relative">
                                <h5 class="card-title">{{$book->title}}</h5>
                                <p class="card-text">{{$book->author}}</p>
                                <div class="row position-absolute bottom-0 bottom-info">
                                    <div class="col-6"><p class="card-text">Price: {{$book->price}} EUR</p></div>
                                    <div class="col-6"><p class="card-text">Sold ({{$book->all_purchase_count}}) copies</p></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#" class="btn btn-outline-secondary">Read more</a>
                                    <form action="/post" method="POST">
                                        @csrf
                                        @method("post")
                                        <input type="hidden" name="book_id" value="{{$book->id}}">
                                        <button type="submit" class="btn btn-outline-primary">Buy now</button>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
