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
                    {{--<form class="form-horizontal" role="form" method="post" href="{{ route('book.store') }}">--}}
                        {{ Form::open(array('route' => 'book.store', 'class'=> "form-horizontal")) }}
                    {{ Form::token()}}
                        <div class="form-group">
                            <label  class="col-sm-12 control-label"
                                    for="IsbnNumber">Podaj nr ISBN</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control"
                                       id="IsbnNumber" placeholder="wpisz nr ISBN" name="isbn-number" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-12 control-label"
                                    for="bookName">Podaj tytuł książki</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"
                                       id="bookName" placeholder="wpisz tytuł" required/>
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

                    {{Form::close()}}
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary js-add-book-btn">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>