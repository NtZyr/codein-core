jQuery( document ).ready( function( $ ) {
    $( 'button[name="add_metabox"]' ).click( function() {
        if( $( '.metabox' ).length ) {
            var count = $( '.metabox' ).length;
        } else {
            var count = 0;
        }

        console.log( count );
        var data = {
            action: 'cc_add_metabox',
            count: count
        };
        $.post( ajaxurl, data, function( response ) {
            $( '.metaboxes_box' ).prepend( response );
        } );
    } );

    $( '.metabox_title' ).live( 'blur', function() {
        if( $( this ).val() ) {
            $( this ).parent().parent().parent().parent().find( 'h4' ).text( $( this ).val() ); 
        } else {
            $( this ).parent().parent().parent().parent().find( 'h4' ).text( metabox_header ); 
        }
    } );
} );
