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
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th scope="col">ISBN</th>
                    <th scope="col">Book name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Number pages</th>
                    <th scope="col">Release date</th>
                    <th scope="col">Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $books as $book)
                <tr>
                    <th scope="row">{{ $book->ISBN }}</th>
                    <td>{{ $book->book_name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->number_pages }}</td>
                    <td>{{ $book->release_date }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
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
<script type="text/javascript">
     const route = '{{ route('book.store') }}',
           form = $('form.form-horizontal');

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     function myFunction(){
         console.log('elo');
         return false;
     }

         form.submit(function(e){
             const isbnNumber = $('#isbnNumber').val(),
                   bookName = $('#bookName').val();
             console.log(isbnNumber);

             $.post(
                 route,
                 { isbn: isbnNumber, book_name: bookName },
                 function (msg) {
                         $('.modal').attr('aria-hidden', false).css('display', 'none');
                         $('.modal-backdrop').css('display', 'none');
                         alert(msg);

                }
             )

        });
     // }

</script>
@endsection

