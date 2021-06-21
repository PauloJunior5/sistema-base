{{-- @if(!empty(Session::get('error_code')) && Session::get('error_code') == 9)
    <script>
        $(function() {
            $('#formaPagamentoModal').modal('show');
        });
    </script>
@endif --}}

<script>
    function  changeBtnToEdit() {
        document.getElementById("btnSalvarPaciente").innerHTML = "Salvar";
    }

    function changeBtnToCreatePaciente() {
        x = document.getElementById("btnSalvarPaciente").innerText;
        if (x == 'SALVAR') {
            document.getElementById("btnSalvarPaciente").innerHTML = "<i class='material-icons'>add</i>";
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
        var pacientes = localStorage.getItem("pacientes");// Recupera os dados armazenados
        pacientes = JSON.parse(pacientes); // Converte string para objeto
        if(pacientes == null) // Caso não haja conteúdo, iniciamos um vetor vazio
        pacientes = [];

        $("#btnSalvarPaciente").on("click",function(){
            if(operacao == "A")
                return Adicionar();
            else
                return Editar();
        });

        function Adicionar(){
            var paciente = JSON.stringify({
                paciente : $("#paciente-input").val(),
            });

            var objPaciente = JSON.parse(paciente);

            if (objPaciente.paciente === "") {
                alert("Preencha todos os campos.");
                return true;
            };

            pacientes.push(objPaciente);
            localStorage.setItem("pacientes", pacientes);
            $('#input-pacientes').val(JSON.stringify(pacientes));
            alert("Registro adicionado.");
            Listar();
            document.getElementById("paciente-input").value = '';
        };

        $("#contrato-pacientes-table").on("click", ".btnExcluirPaciente",function(){
            indice_selecionado = parseInt($(this).attr("alt"));
            var cli = pacientes[indice_selecionado];
            $("#input-pacientes").val(cli.paciente);
            Excluir();
            Listar();
        });

        function Excluir(){
            pacientes.splice(indice_selecionado, 1);
            localStorage.setItem("pacientes", JSON.stringify(pacientes));
            $('#input-pacientes').val(JSON.stringify(pacientes));
            alert("Registro excluído.");
        };

        function Listar(){
            var n = 0;

            $("#contrato-pacientes-table").html("");
            $("#contrato-pacientes-table").html(
                "<thead>"+
                "   <tr>"+
                "    <th scope='col'>#</th>"+
                "    <th scope='col'>Paciente</th>"+
                "    <th scope='col'>CPF</th>"+
                "    <th scope='col'>Ações</th>"+
                "   </tr>"+
                "</thead>"+
                "<tbody>"+"</tbody>"
            );

            for(var i in pacientes){
                var cli = pacientes[i];
                n++;

                $("#contrato-pacientes-table tbody").append("<tr>");
                $("#contrato-pacientes-table tbody").append("<td>"+n+"</td>");
                $("#contrato-pacientes-table tbody").append("<td>"+cli.paciente+"</td>");
                $("#contrato-pacientes-table tbody").append("<td> not ready</td>");
                $("#contrato-pacientes-table tbody").append("<td><a class='btn btn-sm btn-danger btnExcluirPaciente' alt='"+i+"'>Excluir</a></td>");
                $("#contrato-pacientes-table tbody").append("</tr>");
            }
        };

        $(function() {
            var n = 0;

            $("#contrato-pacientes-table").html("");
            $("#contrato-pacientes-table").html(
                "<thead>"+
                "   <tr>"+
                "    <th scope='col'>#</th>"+
                "    <th scope='col'>Paciente</th>"+
                "    <th scope='col'>Apelido</th>"+
                "    <th scope='col'>CPF</th>"+
                "    <th scope='col'>Ações</th>"+
                "   </tr>"+
                "</thead>"+
                "<tbody>"+"</tbody>"
            );

            for(var i in pacientes){

                var cli = pacientes[i];
                n++;

                $("#contrato-pacientes-table tbody").append("<tr>");
                $("#contrato-pacientes-table tbody").append("<td>"+n+"</td>");
                $("#contrato-pacientes-table tbody").append("<td>"+cli.paciente+"</td>");
                $("#contrato-pacientes-table tbody").append("<td> not ready</td>");
                $("#contrato-pacientes-table tbody").append("<td><a class='btn btn-sm btn-danger btnExcluirPaciente' alt='"+i+"'>Excluir</a></td>");
                $("#contrato-pacientes-table tbody").append("</tr>");

            };
        });
    });

</script>