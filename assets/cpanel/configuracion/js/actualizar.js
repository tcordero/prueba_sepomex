/**
 * 
 */
    $(document).ready(function () {
        $("#guardar").click(function () {
            alert("Cargando data");
            $.post(
                '<?php echo $action ?>',
                {file: $("#file").val(), separador: $("#separador").val(), linea: $("#linea").val()},
                function (data) {
                    alert("El archivo se cargÃ³ correctament");
                }
            );
        });
    });