<head>  <meta name="csrf-token" content="{{ csrf_token() }}"></head>
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
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ISBN</th>
                        <th scope="col">Book name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Number pages</th>
                        <th scope="col">Release date</th>
                        <th scope="col">Category</th>
                        <th scope="col">Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $books as $book)
                    <tr class="text-center" data-id={{ $book->id }}>
                        <td class="isbn">{{ $book->ISBN  }}</td>
                        <td class="name">{{ $book->book_name }}</td>
                        <td class="author">{{ $book->author }}</td>
                        <td class="number">{{ $book->number_pages }}</td>
                        <td class="release">{{ $book->release_date }}</td>
                        <td class="category">{{ $book->category_name }}</td>
                        <td>
                            <button role="button" class="btn btn-primary btn-edit-book">Edit</button>
                            <button role="button"  class="btn btn-danger btn-delete-book" href="{{ route('book.delete') }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary add-book-btn" data-toggle="modal" data-target="#myModalHorizontal">
                Add
            </button>
        </div>
        @extends('partials/add-book')
    </div>

</div>
<script type="text/javascript">

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     function myFunction(){
         return false;
     }

     const form = $('form.form-horizontal');

     form.submit(function(e){

         const routeAddBook = '{{ route('book.store') }}',
               isbnNumber = $('#isbnNumber').val(),
               bookName = $('#bookName').val(),
               author = $('#bookAuthor').val(),
               pageCount = $("#bookPagesNumber").val(),
               bookRelease = $('#bookRelease').val(),
               category = $('input[type="radio"]:checked').val(),
               btnEdit = $('.btn-edit-book').first().clone(),
               deleteBtn = $('.btn-delete-book').first().clone();

             $.post(
                 routeAddBook,
                 { isbn: isbnNumber, book_name: bookName, book_author: author, book_release: bookRelease, page_count: pageCount, category: category },
                 function (msg) {
                    if ( msg === 'success') {
                        alert(msg)
                        $('.modal').attr('aria-hidden', false).css('display', 'none');
                        $('.modal-backdrop').css('display', 'none');

                        var newtR = $('<tr class="text-center new"> ' +
                            '<td>'+isbnNumber+'</td>' +
                            '<td>'+bookName+'</td>' +
                            '<td>'+author+'</td>' +
                            '<td>'+pageCount+'</td>' +
                            '<td>'+bookRelease+'</td>' +
                            '<td>'+category+'</td>' +
                            '</tr>');

                        $('.table tbody tr:last').after(newtR);
                        $('.text-center.new td:last').after(deleteBtn).after(btnEdit);
                        deleteBook();
                    }else {
                        alert (msg);
                    }

                }
             )

        });

        function deleteBook() {
            $('.btn-delete-book').on('click', function(){
                var $this = $(this),
                    r = confirm("Are you sure you want to delete the book ?");
                const routeDelete = '{{ route('book.delete') }}',
                    bookId = $this.parent().parent().data("id"),
                    parentRow = $this.parent().parent();

                if (r == true) {
                    $.post(
                        routeDelete,
                        {bookId : bookId},
                        function(msg) {
                            alert(msg);
                            parentRow.remove();
                        }
                    )
                } else { txt = "You pressed Cancel!"; }

            })
        }
     deleteBook();

</script>
@endsection

