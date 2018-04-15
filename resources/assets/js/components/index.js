

const formAddBook = $('.form-horizontal'),
    submitAddBook = $('.js-add-book-btn');
console.log('fire');


submitAddBook.on('click', function () {
    formAddBook.submit();
});
