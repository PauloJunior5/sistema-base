<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idEstado').click(function() {
        var id_estado = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/estado/show',
            data: { id_estado : id_estado },
            dataType: "JSON",
            success: function(response){
                $('#uf-estado-input').val(response.estado.uf);
                $('#estado-input').val(response.estado.estado);
                $('#id-estado-input').val(response.estado.id);
                $('#pais-input').val(response.pais.pais);
                $('#estadoModal').modal('hide')
            }
        });
    });

    $('.idPais').click(function() {
        var id_pais = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/pais/show',
            data: { id_pais : id_pais },
            dataType: "JSON",
            success: function(response){
                $('#input-sigla-pais').val(response.sigla);
                $('#input-pais').val(response.pais);
                $('#input-id-pais').val(response.id);
                $('#paisModal').modal('hide')
            }
        });
    });
</script>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script>
        $(function() {
            $('#estadoModal').modal('show');
        });
    </script>
@endif

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 4)
    <script>
        $(function() {
            $('#estadoModal').modal('show');
        });
        $(function() {
            $('#estadoCreateModal').modal('show');
        });
        $(function() {
            $('#paisModal').modal('show');
        });
    </script>
@endif