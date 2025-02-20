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
            <div class="row p-2 border-bottom">
                <div class="col-3 text-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                      </svg>
                </div>
                <div class="col-3 my-auto">
                    <h1 class="title"> Bookshelf</h1>
                </div>
                <div class="col-2 my-auto">
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
                <div class="col-2 my-auto">

                    <label class="visually-hidden" for="search">Sort</label>
                    <form action="/" method="get" id="sorting_form">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filter-right" viewBox="0 0 16 16">
                                    <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5m0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5m0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5"/>
                                  </svg>
                            </span>
                            <select class="form-select" name="sort" id="sorting_select" aria-label="Default select example">
                                <option value="">------</option>
                                <option value="popularity">Sort By: Popularity (This month)</option>
                                <option value="titleUp">Sort By: Title (A-Z)</option>
                                <option value="titleDown">Sort By: Title (Z-A)</option>
                            </select>
                          </div>

                    </form>
                </div>
            </div>

            <div class="row align-items-center mt-5 px-5">
                @foreach ($books as $book)

                <div class="col-3 mt-3 searchable">
                    <div class="card" style="width: 25rem; height: 40rem;">
                        @if ($book->recently_purchased > 0)
                            <div class="card-header">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="yellow" class="bi bi-star-fill mb-1" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <strong>Recently purchased</strong>
                            </div>
                        @endif
                            <img src="{{asset('images/books/'.$book->image)}}" class="card-img-top" alt="..." height="380px">
                            <div class="card-body position-relative">
                                <h5 class="card-title">{{$book->title}}</h5>
                                <p class="card-text">{{$book->author}}</p>
                                <div class="row position-absolute bottom-0 bottom-info">
                                    <div class="col-6"><p class="price-tag">Price: {{$book->price}} EUR</p></div>
                                    <div class="col-6"><p class="card-text text-end">Sold (<strong>{{$book->all_purchase_count}}</strong>) copies</p></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#" class="btn btn-outline-secondary">Read more</a>
                                    <form class="btn-group" action="/post" method="POST">
                                        @csrf
                                        @method("post")
                                        <input type="hidden" name="book_id" value="{{$book->id}}">
                                        <button type="submit" class="btn btn-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart3 mb-1" viewBox="0 0 16 16">
                                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                            </svg> Buy now
                                        </button>
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
