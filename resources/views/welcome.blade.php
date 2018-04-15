@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="text-center col-md-12">
            Biblioteka
        </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="search-form">
                <form method="get">

                    <div class="input-group">
                        <input type="text" placeholder="search" class="input_search ">
                        <button name="search" id="search">
                            <img src="https://maxcdn.icons8.com/iOS7/PNG/25/Very_Basic/search_filled-25.png"
                                 alt="szukaj">
                        </button>
                    </div>

                </form>
            </div>
            <div class="search_result">
                <span class="waring-title hidden">za mało znaków</span>
                <span class="no-result-title hidden">brak szukanej frazy</span>
                <ul class="list">
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModalHorizontal">
                Add
            </button>
        </div>
        @extends('partials/add-book')
    </div>

</div>
@endsection
