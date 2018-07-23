jQuery( document ).ready( function( $ ) {
    $( '.ajax-add' ).click( function() {
        if( $( '.ajax-block' ).length ) {
            var count = $( '.ajax-block' ).length;
        } else {
            var count = 0;
        }

        console.log( $(this).attr( 'name' ) );

        console.log( count );
        var data = {
            action: $(this).attr( 'name' ),
            count: count
        };
        $.post( ajaxurl, data, function( response ) {
            $( '.ajax_box' ).prepend( response );
            $( '.ajax-nodata' ).remove();
        } );
    } );

    $( '.ajax-title' ).live( 'blur', function() {
        if( $( this ).val() ) {
            $( this ).parent().parent().parent().parent().find( 'h4' ).text( $( this ).val() ); 
        } else {
            $( this ).parent().parent().parent().parent().find( 'h4' ).text( metabox_header ); 
        }
    } );
} );
