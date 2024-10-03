$(document).ready(function() {
    $('#busqueda').on('input', function() {
        const busqueda = $(this).val();
        $.ajax({
            type: "POST",
            url: "./php/buscar.php",
            data: {
                busqueda: busqueda,
            },
            success: function(dato) { 
                $('#divarchivo').html(dato);
            }
        });
    });
});