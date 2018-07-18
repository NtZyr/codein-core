jQuery( document ).ready( function( $ ) {
    $( '.dropped-body' ).hide();
    $( '.dropped_toggle' ).live( 'click', function() {
        $(this).parent().parent().parent().find( '.dropped-body' ).toggle();
    } );
    
    $( '.dropped_remove' ).live( 'click', function() {
        $(this).parent().parent().parent().remove();
    } );
} );