<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idCliente').click(function() {
        var id_cliente = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/cliente/show',
            data: { id_cliente : id_cliente },
            dataType: "JSON",
            success: function(response){
                $('#input-id-responsavel').val(response.id);
                $('#input-responsavel').val(response.cliente + ' ' + response.apelido);
                $('#clienteModal').modal('hide')
            }
        });
    });
</script>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 1)
    <script>
        $(function() {
            $('#clienteModal').modal('show');
        });
    </script>
@endif