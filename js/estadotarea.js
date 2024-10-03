const realizado =  document.getElementById("estado");
$('#estado').click(function() {
    $.ajax({
        type: "POST",
        url: "./php/cambioestado.php",
        data: {
            estado: estado.value,
        },
        success: function(dato) {
            console.log(dato); 
        }
    });
});