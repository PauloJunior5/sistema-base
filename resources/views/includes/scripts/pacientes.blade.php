
<script>
    $( document ).ready(function() {
        $(".campoPessoaJuridica").hide();
        $('.inputPessoaJuridica').prop('required',false);
    });
    $("input:radio[name=tipo]").on("change", function () {
        if($(this).val() == "pessoaFisica") {
            $(".campoPessoaFisica").show();
            $(".campoPessoaJuridica").hide();
            $('.inputPessoaJuridica').prop('required',false);
            $('.inputPessoaFisica').prop('required',true);
        }
        else if($(this).val() == "pessoaJuridica") {
            $(".campoPessoaFisica").hide();
            $(".campoPessoaJuridica").show();
            $('.inputPessoaFisica').prop('required',false);
            $('.inputPessoaJuridica').prop('required',true);
        }
    });
</script>
<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idMedico').click(function() {
        var id_medico = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/medico/show',
            data: { id_medico : id_medico },
            dataType: "JSON",
            success: function(response){
                $('#crm-medico-input').val(response.crm);
                $('#medico-input').val(response.medico);
                $('#id-medico-input').val(response.id);
                $('#medicoModal').modal('hide')
            }
        });
    });
    $('.idCidade').click(function() {
        var id_cidade = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/show',
            data: { id_cidade : id_cidade },
            dataType: "JSON",
            success: function(response){
                alert(response);
                $('#ddd-cidade-input-paciente').val(response.cidade.ddd);
                $('#cidade-input-paciente').val(response.cidade.cidade);
                $('#uf-cidade-input-paciente').val(response.estado.uf);
                $('#id-cidade-input-paciente').val(response.cidade.id);
                $('#cidadeModal').modal('hide')
            }
        });
    });
    $('.idEstado').click(function() {
        var id_estado = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/getEstado',
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
            method: "POST",
            url: url_atual + '/estado/getPais',
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

    $('.idCidade-medico').click(function() {
        var id_cidade = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/show',
            data: { id_cidade : id_cidade },
            dataType: "JSON",
            success: function(response){
                $('#ddd-cidade-input-medico').val(response.cidade.ddd);
                $('#cidade-input-medico').val(response.cidade.cidade);
                $('#uf-cidade-input-medico').val(response.estado.uf);
                $('#id-cidade-input-medico').val(response.cidade.id);
                $('#medico-cidadeModal').modal('hide')
            }
        });
    });
    $('.idEstado-medico').click(function() {
        var id_estado = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/getEstado',
            data: { id_estado : id_estado },
            dataType: "JSON",
            success: function(response){
                $('#uf-estado-input-medico').val(response.estado.uf);
                $('#estado-input-medico').val(response.estado.estado);
                $('#id-estado-input-medico').val(response.estado.id);
                $('#pais-input-medico').val(response.pais.pais);
                $('#medico-estadoModal').modal('hide')
            }
        });
    });
    $('.idPais-medico').click(function() {
        var id_pais = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/estado/getPais',
            data: { id_pais : id_pais },
            dataType: "JSON",
            success: function(response){
                $('#input-sigla-pais-medico').val(response.sigla);
                $('#input-pais-medico').val(response.pais);
                $('#input-id-pais-medico').val(response.id);
                $('#medico-paisModal').modal('hide')
            }
        });
    });
</script>
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 7)
    <script>
        $(function() {
            $('#medicoModal').modal('show');
        });
    </script>
@endif
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 8)
    <script>
        $(function() {
            $('#medicoModal').modal('show');
        });
        $(function() {
            $('#medicoCreateModal').modal('show');
        });
        $(function() {
            $('#medico-cidadeModal').modal('show');
        });
    </script>
@endif
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 6)
    <script>
        $(function() {
            $('#cidadeModal').modal('show');
        });
    </script>
@endif
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script>
        $(function() {
            $('#cidadeModal').modal('show');
        });
        $(function() {
            $('#cidadeCreateModal').modal('show');
        });
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