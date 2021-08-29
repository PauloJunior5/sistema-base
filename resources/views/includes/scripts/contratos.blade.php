{{-- URL ATUAL --}}
<script>
        var url_atual = '<?php echo URL::to(''); ?>';
</script>

{{-- CLIENTES FISICOS --}}

<script>
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

{{-- PACIENTES --}}

<script>
    $('.idPaciente').click(function() {
        var id_paciente = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/paciente/show',
            data: { id : id_paciente },
            dataType: "JSON",
            success: function(response){
                $('#input-id-paciente').val(response.id);
                $('#input-paciente').val(response.paciente + ' ' + response.apelido);
                $('#pacienteModal').modal('hide')
            }
        });
    });
</script>