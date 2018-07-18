jQuery( document ).ready( function( $ ) {
    var clone, before, parent;
    $( '.fields' ).each( function() {
        if( $.contains( $(this), '.field' ) ) {
            $( this ).find( 'span' ).remove();
        }
    } );
    $( '.fields' ).sortable({
        receive: function (event, ui) { //only when dropped from one to another!
            var count = $( this ).find( '.field' ).length - 1;
            $( '.field_box' ).prepend( $(ui.item).clone() );
            $( ui.item ).hide();
            var box_num = $( ui.item ).parent().parent().parent().index();
            $( this ).find( 'span' ).remove();
            var label = $.trim( $( ui.item ).text() );
            var type = $( ui.item ).attr( 'data-field' );
            var data = {
                action: 'cc_add_field',
                label: label,
                type: type,
                count: count,
                box_num: box_num
            };
            $.post( ajaxurl, data, function( response ) {
                $( ui.item ).html( response );
                $( ui.item ).show();
            } );
        }
    });
    $( '.fields_box' ).sortable({
        connectWith: ['.fields'],
        helper: "clone",
        remove: function( events, ui ) {
            $( '.fields_box' ).prepend( $(ui.item).clone() );
        }
    }).disableSelection();
} );