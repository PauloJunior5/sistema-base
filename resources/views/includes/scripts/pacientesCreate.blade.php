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

        //Inicia um array vazio
        var pacientes = [];

        $("#btnSalvarPaciente").on("click",function(){
            if(operacao == "A"){
                return Adicionar();
            } else {
                return Editar();
            }
        });

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

        function Adicionar()
        {
            var paciente = JSON.stringify({
                id : $("#input-id-paciente").val(),
                paciente : $("#input-paciente").val()
            });

            var paciente = JSON.parse(paciente);

            if (paciente.id === "" || paciente.paciente === "") {

                swal({
                    title:"Erro! Preencha todos os campos",
                    text:"{{Session::get('fail')}}",
                    type:"error",
                    timer:5000
                }).then((value) => {
                    //location.reload();
                }).catch(swal.noop);

                return;

            };

            $.ajax({
                method: "GET",
                url: url_atual + "/paciente/show",
                data: { id_paciente : paciente.id },
                dataType: "JSON",
                async: false,
                success: function(response){
                    paciente = response;
                },
                error: function() {
                    paciente = {};
                }
            });

            if (Object.keys(paciente).length === 0) {

                swal({
                    title:"Erro! Selecione um paciente existente no sistema.",
                    text:"{{Session::get('fail')}}",
                    type:"error",
                    timer:5000
                }).then((value) => {
                    //location.reload();
                }).catch(swal.noop);

            } else {

                if (pacientes.includes(paciente.id)) {

                    swal({
                        title:"Erro! Paciente já se econtra incluído no contrato.",
                        text:"{{Session::get('fail')}}",
                        type:"error",
                        timer:5000
                    }).then((value) => {
                        //location.reload();
                    }).catch(swal.noop);

                } else {

                    pacientes.push(paciente.id);
                    $("#pacientes").val(JSON.stringify(pacientes));

                    swal({
                            title:"Incluído com sucesso!",
                            text:"{{Session::get('success')}}",
                            timer:5000,
                            type:"success"
                        }).then((value) => {
                            //location.reload();
                        }).catch(swal.noop);

                }

            }

            document.getElementById("input-paciente").value = "";
            document.getElementById("input-id-paciente").value = "";

            Listar();
        };

        $("#contrato-pacientes-table").on("click", ".btnExcluirPaciente",function(){
            indice_selecionado = parseInt($(this).attr("alt"));

            var cli = pacientes[indice_selecionado];

            Excluir();

            Listar();
        });

        function Excluir()
        {
            pacientes.splice(indice_selecionado, 1);

            localStorage.setItem("pacientes", JSON.stringify(pacientes));

            $("#pacientes").val(JSON.stringify(pacientes));

            swal({
                    title:"Excluido com sucesso!",
                    text:"{{Session::get('success')}}",
                    timer:5000,
                    type:"success"
                }).then((value) => {
                    //location.reload();
                }).catch(swal.noop);
        };

        function Listar()
        {
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

                n++;

                $.ajax({
                    method: "GET",
                    url: url_atual + "/paciente/show",
                    data: { id_paciente :  pacientes[i] },
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
    });

</script>