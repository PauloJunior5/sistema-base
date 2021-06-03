@if(!empty(Session::get('error_code')) && Session::get('error_code') == 9)
    <script>
        $(function() {
            $('#forma_pagamentoModal').modal('show');
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
    var parcelas = $('#input-parcelas').val();
    localStorage.setItem("parcelas", parcelas);
    var operacao = "A"; //"A"=Adição; "E"=Edição
    var indice_selecionado = -1; //Índice do item selecionado na lista
    var parcelas = localStorage.getItem("parcelas");// Recupera os dados armazenados
    parcelas = JSON.parse(parcelas); // Converte string para objeto
    if(parcelas == null) // Caso não haja conteúdo, iniciamos um vetor vazio
    parcelas = [];
    var porcentual = 100;
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
            parcela : contador,
            dias   : $("#id_dias").val(),
            porcentual     : $("#id_porcentual").val(),
            forma_pagamento : $("#id-forma_pagamento-input").val(),
        });

        var objParcela = JSON.parse(parcela);

        if ((objParcela.dias === "") || (objParcela.porcentual === "") || (objParcela.forma_pagamento === "")) {
            alert("Preencha todos os campos.");
            return true;
        };

        var objParcelaPorcentual = parseFloat(objParcela.porcentual);
        if ((porcentual + objParcelaPorcentual ) <= 100) {
            porcentual += objParcelaPorcentual;
            parcelas.push(objParcela);
            localStorage.setItem("parcelas", parcelas);
            $('#input-parcelas').val(JSON.stringify(parcelas));
            alert("Registro adicionado.");
            Listar();
            document.getElementById("id_dias").value = '';
            document.getElementById("id_porcentual").value = '';
            document.getElementById("id-forma_pagamento-input").value = '';
            document.getElementById("forma_pagamento-input").value = '';
            return true;
        } else {
            alert("Parcela inserida ultrapassa os 100%");
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
        porcentual -= cli.porcentual;

        var id_forma_pagamento = cli.id_forma_pagamento;
        $.ajax({
            method: "GET",
            url: url_atual + '/formaPagamento/show',
            data: { id_forma_pagamento : id_forma_pagamento },
            dataType: "JSON",
            success: function(response){
                console.log(response);
                $('#id-forma_pagamento-input').val(response.id);
                $('#forma_pagamento-input').val(response.forma_pagamento);
                $('#forma_pagamentoModal').modal('hide')
            }
        });

        $("#id_dias").focus();

    });

    function Editar(){
        
        parcelas[indice_selecionado].dias = $("#id_dias").val();
        parcelas[indice_selecionado].porcentual = $("#id_porcentual").val();
        parcelas[indice_selecionado].forma_pagamento = $("#id-forma_pagamento-input").val();

        if ((parcelas[indice_selecionado].dias === "") || (parcelas[indice_selecionado].porcentual === "") || (parcelas[indice_selecionado].forma_pagamento === "")) {
            alert("Preencha todos os campos.");
            return true;
        };

        var parcelaPorcentual = parseInt(parcelas[indice_selecionado].porcentual);
        var somaPorcentual = porcentual + parcelaPorcentual;

        if (somaPorcentual <= 100) {
            porcentual += parseFloat(parcelas[indice_selecionado].porcentual);
            localStorage.setItem("parcelas", parcelas);
            $('#input-parcelas').val(JSON.stringify(parcelas));
            alert("Informações editadas.")
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
            alert("Parcela inserida ultrapassa os 100%");
            Listar();
            return true;
        };

    };

    $("#condicao-table").on("click", ".btnExcluir",function(){
        indice_selecionado = parseInt($(this).attr("alt"));
        var cli = JSON.parse(parcelas[indice_selecionado]);
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
        alert("Registro excluído.");
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

            var id_forma_pagamento = cli.id_forma_pagamento;
            console.log(cli)
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
        if(parseFloat(porcentual) < 100){
            alert("Parcelas não atingem os 100%");
            return false;
        }
    });

});

</script>