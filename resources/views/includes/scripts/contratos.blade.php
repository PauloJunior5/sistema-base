<script>
        var url_atual = '<?php echo URL::to(''); ?>';
</script>

<script>
    //Função que mostra o responsavel conforme é inserido
    function myFunctionResponsavel(id_responsavel) {
        $.ajax({
            method: "GET",
            url: url_atual + "/cliente/fisico/" + id_responsavel,
            dataType: "JSON",
            async: false,
            success: function(response){
                responsavel = response;
            }
        });

        if (!id_responsavel || jQuery.isEmptyObject(responsavel)) {
            document.getElementById("input-responsavel").value = "";
        } else {
            document.getElementById("input-responsavel").value = responsavel.cliente + " " + responsavel.apelido;
        }
    }

    //Função que mostra o cliente conforme é inserido
    function myFunctionCliente(id_cliente) {
    $.ajax({
        method: "GET",
        url: url_atual + "/cliente/juridico/" + id_cliente,
        dataType: "JSON",
        async: false,
        success: function(response){
            cliente = response;
        }
    });

    if (!id_cliente || jQuery.isEmptyObject(cliente)) {
        document.getElementById("input-cliente").value = "";
    } else {
        document.getElementById("input-cliente").value = cliente.cliente + " " + cliente.apelido;
    }
    }
</script>

{{-- CLIENTES FISICOS --}}

<script>
    $('.idClienteFisico').click(function() {
        var id_responsavel = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/cliente/fisico/' + id_responsavel,
            dataType: "JSON",
            async: false,
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
            url: url_atual + '/cliente/juridico/' + id_cliente,
            dataType: "JSON",
            async: false,
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