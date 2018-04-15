
  const url = 'https://wolnelektury.pl/api/genres/';
console.log('test');


    // $.ajax( url, function( data ) {
    //     var items = [];
    //     $.each( data, function( key, val ) {
    //         items.push(  key + ' ' + val );
    //         var test = $.parseJSON(data);
    //         console.log(test);
    //     });
    //
    // });

    $.ajax({
        url: url,
        method: 'get',
        cache: false,
        done: function(response){
            console.log(response);
        }

    });
