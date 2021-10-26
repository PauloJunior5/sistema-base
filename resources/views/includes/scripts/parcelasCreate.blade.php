@if(!empty(Session::get('error_code')) && Session::get('error_code') == 9)
    <script>
        $(function() {
            $('#formaPagamentoModal').modal('show');
        });
    </script>
@endif

<script>
    function  changeBtnToEdit() {
        document.getElementById("btnSalvar").innerHTML = "Salvar";
    }

    function changeBtnToCreate() {
        x = document.getElementById("btnSalvar").innerText;
        if (x == 'SALVAR') {
            document.getElementById("btnSalvar").innerHTML = "<i class='material-icons'>add</i>";
        };
    }
</script>

<script>

    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idForma_pagamento').click(function() {
        var id_forma_pagamento = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/formaPagamento/show',
            data: { id_forma_pagamento : id_forma_pagamento },
            dataType: "JSON",
            success: function(response){
                $('#id-forma_pagamento-input').val(response.id);
                $('#forma_pagamento-input').val(response.forma_pagamento);
                $('#formaPagamentoModal').modal('hide')
            }
        });
    });

$(function(){
    localStorage.clear();
    var operacao = "A"; //"A"=Adição; "E"=Edição
    var indice_selecionado = -1; //Índice do item selecionado na lista
    var parcelas = localStorage.getItem("parcelas");// Recupera os dados armazenados
    parcelas = JSON.parse(parcelas); // Converte string para objeto
    if(parcelas == null) // Caso não haja conteúdo, iniciamos um vetor vazio
    parcelas = [];
    var porcentual = 0;
    var porcentualReserva = 0;
    var contador = Object.keys(parcelas).length;

    $("#btnSalvar").on("click",function(){
        if(operacao == "A")
            return Adicionar();
        else
            return Editar();
    });

    function Adicionar(){

        contador++;

        var parcela = JSON.stringify({
            parcela: contador,
            dias: $("#id_dias").val(),
            porcentual: $("#id_porcentual").val(),
            forma_pagamento: $("#id-forma_pagamento-input").val(),
        });

        var objParcela = JSON.parse(parcela);

        if ((objParcela.dias === "") || (objParcela.porcentual === "") || (objParcela.forma_pagamento === "")) {
            swal({
                title:"Preencha todos os campos!",
                text:"{{Session::get('success')}}",
                timer:5000,
                type:"info"
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);
            return true;
        };

        var objParcelaPorcentual = parseFloat(objParcela.porcentual);
        if ((parseFloat(porcentual) + objParcelaPorcentual ) <= 100) {
            porcentual += objParcelaPorcentual;
            parcelas.push(objParcela);
            localStorage.setItem("parcelas", parcelas);
            $('#input-parcelas').val(JSON.stringify(parcelas));
            swal({
                title:"Registro inserido!",
                text:"{{Session::get('success')}}",
                timer:5000,
                type:"success"
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);
            document.getElementById("id_dias").value = '';
            document.getElementById("id_porcentual").value = '';
            document.getElementById("id-forma_pagamento-input").value = '';
            document.getElementById("forma_pagamento-input").value = '';

            $("#qtd_parcelas").val(contador);
            Listar();
            return true;
        } else {
            swal({
                title:"Parcela inserida ultrapassa os 100%!",
                text:"{{Session::get('success')}}",
                timer:5000,
                type:"warning"
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);
            Listar();
            return true;
        };
    };

    $("#condicao-table").on("click", ".btnEditar", function(){
        operacao = "E";
        indice_selecionado = parseInt($(this).attr("alt"));
        var cli = parcelas[indice_selecionado];
        $("#id_dias").val(cli.dias);
        $("#id_porcentual").val(cli.porcentual);
        $("#id-forma_pagamento-input").val(cli.forma_pagamento);
        porcentualReserva = porcentual;

        var id_forma_pagamento = cli.forma_pagamento;
        $.ajax({
            method: "GET",
            url: url_atual + '/formaPagamento/show',
            data: { id_forma_pagamento : id_forma_pagamento },
            dataType: "JSON",
            success: function(response){
                $('#id-forma_pagamento-input').val(response.id);
                $('#forma_pagamento-input').val(response.forma_pagamento);
                $('#forma_pagamentoModal').modal('hide')
            }
        });
        $("#id_dias").focus();
    });

    function Editar(){

        if ( (!$("#id_dias").val()) || (!$("#id_porcentual").val()) || (!$("#id-forma_pagamento-input").val()) ) {
            swal({
                title:"Preencha todos os campos!",
                text:"{{Session::get('success')}}",
                timer:5000,
                type:"info"
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);
            return;
        };

        var parcelaPorcentual = parseFloat($("#id_porcentual").val());
        var somaPorcentual = (porcentual + parcelaPorcentual) - porcentualReserva;

        if (somaPorcentual <= 100) {

            parcelas[indice_selecionado].dias = $("#id_dias").val();
            parcelas[indice_selecionado].porcentual = $("#id_porcentual").val();
            parcelas[indice_selecionado].forma_pagamento = $("#id-forma_pagamento-input").val();

            porcentual += parseFloat(parcelas[indice_selecionado].porcentual);
            localStorage.setItem("parcelas", parcelas);
            $('#input-parcelas').val(JSON.stringify(parcelas));

            swal({
                title:"Registro editado!",
                text:"{{Session::get('success')}}",
                timer:5000,
                type:"success"
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);

            porcentual = somaPorcentual;
            porcentualReserva = 0;

            $("#id_dias").val('');
            $("#id_porcentual").val('');
            $("#id-forma_pagamento-input").val('');
            $("#forma_pagamento-input").val('');

            operacao = "A"; //Volta ao padrão
            Listar();
            return true;

        } else {
            porcentual = porcentualReserva;
            porcentualReserva = 0;

            swal({
                title:"Parcela inserida ultrapassa os 100%!",
                text:"{{Session::get('success')}}",
                timer:5000,
                type:"warning"
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);

            Listar();
            return true;
        };
    };

    $("#condicao-table").on("click", ".btnExcluir",function(){
        indice_selecionado = parseInt($(this).attr("alt"));
        var cli = parcelas[indice_selecionado];
        $("#id_dias").val(cli.dias);
        $("#id_porcentual").val(cli.porcentual);
        $("#id-forma_pagamento-input").val(cli.forma_pagamento);
        porcentual -= cli.porcentual;
        Excluir();
        Listar();
    });

    function Excluir(){
        parcelas.splice(indice_selecionado, 1);
        localStorage.setItem("parcelas", JSON.stringify(parcelas));
        $('#input-parcelas').val(JSON.stringify(parcelas));
        swal({
            title:"Registro excluído!",
            text:"{{Session::get('success')}}",
            timer:5000,
            type:"success"
        }).then((value) => {
            //location.reload();
        }).catch(swal.noop);
        $("#qtd_parcelas").val(contador);
    };

    function Listar(){

        var forma_pagamento;
        var n = 0;

        $("#condicao-table").html("");
        $("#condicao-table").html(
            "<thead>"+
            "    <tr>"+
            "    <th scope='col'>Parcela</th>"+
            "    <th scope='col'>Número de Dias</th>"+
            "    <th scope='col'>Percentual (%)</th>"+
            "    <th scope='col'>Forma de Pagamento</th>"+
            "    <th scope='col'>Ações</th>"+
            "   </tr>"+
            "</thead>"+
            "<tbody>"+
            "</tbody>"
        );

        for(var i in parcelas){

            var cli = parcelas[i];
            n++;

            var id_forma_pagamento = cli.forma_pagamento;
            $.ajax({
                method: "GET",
                url: url_atual + '/formaPagamento/show',
                data: { id_forma_pagamento : id_forma_pagamento },
                dataType: "JSON",
                async: false,
                success: function(response){
                    forma_pagamento = response;
                }
            });

            $("#condicao-table tbody").append("<tr>");
            $("#condicao-table tbody").append("<td>"+n+"</td>");
            $("#condicao-table tbody").append("<td>"+cli.dias+"</td>");
            $("#condicao-table tbody").append("<td>"+cli.porcentual+"</td>");
            $("#condicao-table tbody").append("<td>"+forma_pagamento.forma_pagamento+"</td>");
            $("#condicao-table tbody").append("<td><a class='btn btn-sm btn-warning btnEditar' alt='"+i+"' onclick='changeBtnToEdit()'>Editar</a><a class='btn btn-sm btn-danger btnExcluir' alt='"+i+"'>Excluir</a></td>");
            $("#condicao-table tbody").append("</tr>");
        }
    };

    $(function() {

        $("#qtd_parcelas").val(contador);

        var forma_pagamento;
        var n = 0;

        $("#condicao-table").html("");
        $("#condicao-table").html(
            "<thead>"+
            "   <tr>"+
            "    <th scope='col'>Parcela</th>"+
            "    <th scope='col'>Número de Dias</th>"+
            "    <th scope='col'>Percentual (%)</th>"+
            "    <th scope='col'>Forma de Pagamento</th>"+
            "    <th scope='col'>Ações</th>"+
            "   </tr>"+
            "</thead>"+
            "<tbody>"+
            "</tbody>"
        );

        for(var i in parcelas){

            var cli = parcelas[i];
            n++;

            var id_forma_pagamento = cli.forma_pagamento;
            $.ajax({
                method: "GET",
                url: url_atual + '/formaPagamento/show',
                data: { id_forma_pagamento : id_forma_pagamento },
                dataType: "JSON",
                async: false,
                success: function(response){
                    forma_pagamento = response;
                }
            });

            $("#condicao-table tbody").append("<tr>");
            $("#condicao-table tbody").append("<td>"+n+"</td>");
            $("#condicao-table tbody").append("<td>"+cli.dias+"</td>");
            $("#condicao-table tbody").append("<td>"+cli.porcentual+"</td>");
            $("#condicao-table tbody").append("<td>"+forma_pagamento.forma_pagamento+"</td>");
            $("#condicao-table tbody").append("<td><a class='btn btn-sm btn-warning btnEditar' alt='"+i+"' onclick='changeBtnToEdit()'>Editar</a><a class='btn btn-sm btn-danger btnExcluir' alt='"+i+"'>Excluir</a></td>");
            $("#condicao-table tbody").append("</tr>");
        };
    });

    $("#condicaoPagamentoForm").submit(function() {
        if(parseFloat(porcentual).toFixed(2) < 100){
            swal({
                title:"Erro! Parcelas não atingem os 100%",
                text:"{{Session::get('fail')}}",
                type:"error",
                timer:5000
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);
            return false;
        }
    });
});

</script>