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
        var tbClientes = localStorage.getItem("tbClientes");// Recupera os dados armazenados
        tbClientes = JSON.parse(tbClientes); // Converte string para objeto
        if(tbClientes == null) // Caso não haja conteúdo, iniciamos um vetor vazio
        tbClientes = [];
        var porcentual = 0;
        var porcentualReserva = 0;
        var contador = 1;

    $("#btnSalvar").on("click",function(){
        if(operacao == "A")
            return Adicionar();
        else
            return Editar();
    });

    function Adicionar(){
        var cliente = JSON.stringify({
            Parcela : contador++,
            Dias   : $("#id_dias").val(),
            Porcentual     : $("#id_porcentual").val(),
            Pagamento : $("#id-forma_pagamento-input").val(),
        });

        var objCliente = JSON.parse(cliente);

        if ((objCliente.Dias === "") || (objCliente.Porcentual === "") || (objCliente.Pagamento === "")) {
            alert("Preencha todos os campos.");
            return true;
        };

        var objClientePorcentual = parseFloat(objCliente.Porcentual);
        if ((porcentual + objClientePorcentual ) <= 100) {
            porcentual += objClientePorcentual;
            tbClientes.push(cliente);
            localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
            $('#input-parcelas').val(JSON.stringify(tbClientes));
            alert("Registro adicionado.");
            Listar();
            return true;
        } else {
            alert("Parcela inserida ultrapassa os 100%");
            Listar();
            return true;
        }

    }

    $("#condicao-table").on("click", ".btnEditar", function(){

        operacao = "E";
        indice_selecionado = parseInt($(this).attr("alt"));
        var cli = JSON.parse(tbClientes[indice_selecionado]);
        $("#id_dias").val(cli.Dias);
        $("#id_porcentual").val(cli.Porcentual);
        $("#id-forma_pagamento-input").val(cli.Pagamento);
        porcentualReserva = porcentual;
        porcentual -= cli.Porcentual;

        var id_forma_pagamento = cli.Pagamento;
        
        $.ajax({
            method: "POST",
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
        tbClientes[indice_selecionado] = JSON.stringify({
                Dias   : $("#id_dias").val(),
                Porcentual     : $("#id_porcentual").val(),
                Pagamento : $("#id-forma_pagamento-input").val(),
            });//Altera o item selecionado na tabela

        var objCliente = JSON.parse(tbClientes[indice_selecionado]);

        if ((objCliente.Dias === "") || (objCliente.Porcentual === "") || (objCliente.Pagamento === "")) {
            alert("Preencha todos os campos.");
            return true;
        };

        var objClientePorcentual = parseFloat(objCliente.Porcentual);

        if ((porcentual + objClientePorcentual ) <= 100) {
            porcentual += parseFloat(tbClientes[indice_selecionado].Porcentual);
            localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
            $('#input-parcelas').val(JSON.stringify(tbClientes));
            alert("Informações editadas.");
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
        var cli = JSON.parse(tbClientes[indice_selecionado]);
        $("#id_dias").val(cli.Dias);
        $("#id_porcentual").val(cli.Porcentual);
        $("#id-forma_pagamento-input").val(cli.Pagamento);
        porcentual -= cli.Porcentual;
        Excluir();
        Listar();
    });

    function Excluir(){
        tbClientes.splice(indice_selecionado, 1);
        localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
        $('#input-parcelas').val(JSON.stringify(tbClientes));
        $("#id_dias").val('');
        $("#id_porcentual").val('');
        $("#id-forma_pagamento-input").val('');
        $("#forma_pagamento-input").val('');
        alert("Registro excluído.");
        contador--;
        operacao = "A";
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

        for(var i in tbClientes){

            var cli = JSON.parse(tbClientes[i]);
            n++;

            var id_forma_pagamento = cli.Pagamento;
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
            $("#condicao-table tbody").append("<td>"+cli.Dias+"</td>");
            $("#condicao-table tbody").append("<td>"+cli.Porcentual+"</td>");
            $("#condicao-table tbody").append("<td>"+forma_pagamento.forma_pagamento+"</td>");
            $("#condicao-table tbody").append("<td><a class='btn btn-sm btn-warning btnEditar' alt='"+i+"'>Editar</a><a class='btn btn-sm btn-danger btnExcluir' alt='"+i+"'>Excluir</a></td>");
            $("#condicao-table tbody").append("</tr>");

        };

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

        for(var i in tbClientes){

            var cli = JSON.parse(tbClientes[i]);
            n++;

            var id_forma_pagamento = cli.Pagamento;
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
            $("#condicao-table tbody").append("<td>"+cli.Dias+"</td>");
            $("#condicao-table tbody").append("<td>"+cli.Porcentual+"</td>");
            $("#condicao-table tbody").append("<td>"+forma_pagamento.forma_pagamento+"</td>");
            $("#condicao-table tbody").append("<td><a class='btn btn-sm btn-warning btnEditar' alt='"+i+"'>Editar</a><a class='btn btn-sm btn-danger btnExcluir' alt='"+i+"'>Excluir</a></td>");
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