// A $( document ).ready() block.
$( document ).ready(function() {
    $('#menu_on').click(function(){
    	$('body').toggleClass('visible_menu');
    });

    $('#tablasPHP').DataTable( {
        paging: true,
        searching: true,
    });
});

// CONVERTIR LAS FILAS EN LINKS
function CrearEnlace(url) {
    location.href=url;
}
