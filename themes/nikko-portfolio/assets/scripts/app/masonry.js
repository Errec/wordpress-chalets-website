let $ = window.jQuery

$( document ).ready( () => {

    if ( !window.Masonry || !$( 'body' ).hasClass( 'layout--masonry' ) ) {
        return
    }



    const $content = $( '.masonry-posts' )


    $content.addClass( 'is-loading' ).imagesLoaded( () => {

        $content.masonry( {
            itemSelector: '.post',
            columnWidth : '.post',
        } )

        $content.addClass( 'images-loaded' )

    } )


} )
