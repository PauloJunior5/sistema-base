{{-- CLIENTES FISICOS --}}
<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idClienteFisico').click(function() {
        var id_cliente = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/cliente/show',
            data: { id_cliente : id_cliente },
            dataType: "JSON",
            success: function(response){
                $('#input-id-responsavel').val(response.id);
                $('#input-responsavel').val(response.cliente + ' ' + response.apelido);
                $('#clienteFisicoModal').modal('hide')
            }
        });
    });
</script>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 1)
    <script>
        $(function() {
            $('#clienteFisicoModal').modal('show');
        });
    </script>
@endif

{{-- CLIENTES JURIDICOS --}}

<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idClienteJuridico').click(function() {
        var id_cliente = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/cliente/show',
            data: { id_cliente : id_cliente },
            dataType: "JSON",
            success: function(response){
                $('#input-id-cliente').val(response.id);
                $('#input-cliente').val(response.cliente + ' ' + response.apelido);
                $('#clienteJuridicoModal').modal('hide')
            }
        });
    });
</script>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 2)
    <script>
        $(function() {
            $('#clienteJuridicoModal').modal('show');
        });
    </script>
@endif