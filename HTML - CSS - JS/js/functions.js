// A $( document ).ready() block.
$( document ).ready(function() {
    $('#menu_on').click(function(){
    	$('body').toggleClass('visible_menu');
    })
});

// CONVERTIR LAS FILAS EN LINKS
function CrearEnlace(url) {
    location.href=url;
}