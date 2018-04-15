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
        <div class="col-md-12">
            <!-- Modal -->
            <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-left" id="myModalLabel">
                                Add new book
                            </h4>
                            <button type="button" class="close"
                                    data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label  class="col-sm-12 control-label"
                                            for="bookName">Podaj tytuł książki</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                               id="bookName" placeholder="wpisz tytuł"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 control-label"
                                           for="bookAuthor">Podaj autora książki</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                               id="bookAuthor" placeholder="wpisz autora"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 control-label"
                                           for="bookRelease">Podaj datę wydania</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control"
                                               id="bookRelease" placeholder="data wydania"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 control-label"
                                           for="bookPagesNumber">Podaj liczbę stron</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control"
                                               id="bookPagesNumber" placeholder="liczba stron"  min="0"/>
                                    </div>
                                </div>
                                <div class="category-list">
                                    @foreach($category as $categoryItem)
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="{{$categoryItem->id}}">{{$categoryItem->category_name}}</label>
                                        </div>
                                    @endforeach
                                </div>

                            </form>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
