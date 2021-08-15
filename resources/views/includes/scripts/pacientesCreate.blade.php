<script>

    //Função que mostra o nome e apelido conforme o id do paciente inserido
    function myFunction(e) {
        $.ajax({
            method: "GET",
            url: url_atual + "/paciente/show",
            data: { id_paciente : e },
            dataType: "JSON",
            async: false,
            success: function(response){
                paciente = response;
            }
        });

        if (!e || Object.keys(paciente).length === 0) {
            document.getElementById("input-paciente").value = "";
        } else {
            document.getElementById("input-paciente").value = paciente.paciente + " " + paciente.apelido;
        }
    }

</script>

<script>

    $(function()
    {
        //"A"=Adição; "E"=Edição
        var operacao = "A";

        //Índice do item selecionado na lista
        var indice_selecionado = -1;
        
        //Iniciamos um vetor vazio
        var pacientes = [];

        $("#btnSalvarPaciente").on("click",function(){
            if(operacao == "A"){
                return Adicionar();
            } else {
                return Editar();
            }
        });

        function Adicionar()
        {
            var paciente = JSON.stringify({
                id : $("#input-id-paciente").val(),
                paciente : $("#input-paciente").val()
            });

            var paciente = JSON.parse(paciente);

            if (paciente.id === "") {
                alert("Selecione um paciente existente no sistema.");
                return;
            };

            if (pacientes.includes(paciente.id)) {
                swal({
                    title:'Erro! Paciente já existe.',
                    text:"{{Session::get('fail')}}",
                    type:'error',
                    timer:5000
                }).then((value) => {
                //location.reload();
                }).catch(swal.noop);
            } else {
                pacientes.push(paciente.id);
                $('#input-pacientes').val(pacientes);

                swal({
                title:'Sucesso!',
                text:"{{Session::get('success')}}",
                timer:5000,
                type:'success'
                }).then((value) => {
                //location.reload();
                }).catch(swal.noop);
            }

            document.getElementById("input-paciente").value = '';
            document.getElementById("input-id-paciente").value = '';
            Listar();
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

            var paciente;
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
                var id = pacientes[i];
                n++;

                var id_paciente = id;
                $.ajax({
                    method: "GET",
                    url: url_atual + '/paciente/show',
                    data: { id_paciente : id_paciente },
                    dataType: "JSON",
                    async: false,
                    success: function(response){
                        paciente = response;
                    }
                });

                $("#contrato-pacientes-table tbody").append("<tr>");
                $("#contrato-pacientes-table tbody").append("<td>" + n + "</td>");
                $("#contrato-pacientes-table tbody").append("<td>" + paciente.paciente + " " + paciente.apelido + "</td>");
                $("#contrato-pacientes-table tbody").append("<td>" + paciente.cpf + "</td>");
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