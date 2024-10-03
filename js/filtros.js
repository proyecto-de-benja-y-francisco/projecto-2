$(document).ready(function() {
    $('#filtros').submit(function(e) {
        e.preventDefault(); // Evita el envío tradicional del formulario
        
        const orden = $('#ordenar').val();
        
        $.ajax({
            type: "POST",
            url: "./php/filtros.php",
            data: {
                orden: orden
            },
            success: function(dato) {
                $('#divarchivo').html(dato);
            }
        });
    });
});
