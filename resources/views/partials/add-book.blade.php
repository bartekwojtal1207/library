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
                    {{ Form::open(array( 'class' => "form-horizontal", 'method' => 'post', 'onsubmit' => 'myFunction(this); return false;' ))  }}
                    {{--<form  method="post" class="form-horizontal">--}}
                    {{ Form::token()}}
                        <div class="form-group">
                            {{ Form::label('IsbnNumber', 'Podaj nr ISBN - 13 cyfr', array('class' => 'col-sm-12 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::number('isbn',null, array('class' => 'form-control', 'id' => 'isbnNumber', 'placeholder' => 'wpisz nr ISBN', 'required' => true, 'maxLength' => '13')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('bookName', 'Podaj tytuł książki', array('class' => 'col-sm-12 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('book_name',null, array('class' => 'form-control', 'id' => 'bookName', 'placeholder' => 'wpisz tytuł', 'required' => true, 'maxLength' => '255')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('bookAuthor', 'Podaj autora książki', array('class' => 'col-sm-12 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('book_author',null, array('class' => 'form-control', 'id' => 'bookAuthor', 'placeholder' => 'wpisz autora')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('bookRelease', 'Podaj datę wydania', array('class' => 'col-sm-12 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::date('book_release',null, array('class' => 'form-control', 'id' => 'bookRelease', 'placeholder' => 'data wydania')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('bookPagesNumber', 'Podaj liczbę stron', array('class' => 'col-sm-12 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::number('page_count',null, array('class' => 'form-control', 'id' => 'bookPagesNumber', 'placeholder' => 'liczba stron', 'min' => 0)) }}
                            </div>
                        </div>
                        <div class="category-list">
                            @foreach($category as $categoryItem)
                                <div class="checkbox">
                                    <label>
                                        {{ Form::radio('category', $categoryItem->category_name) }}
                                        {{$categoryItem->category_name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    {{ Form::button('Close', array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) }}
                    {{ Form::button('Save', array('class' => 'btn btn-primary js-add-book-btn')) }}
                    {{--</form>--}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>