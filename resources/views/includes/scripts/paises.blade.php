<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idPais').click(function() {
        var id_pais = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/pais/show',
            data: { id_pais : id_pais },
            dataType: "JSON",
            success: function(response){
                $('#input-sigla-pais').val(response.sigla);
                $('#input-pais-pais').val(response.pais);
                $('#input-id-pais').val(response.id);
                $('#paisModal').modal('hide')
            }
        });
    });
</script>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 4)
    <script>
        $(function() {
            $('#paisModal').modal('show');
        });
    </script>
@endif