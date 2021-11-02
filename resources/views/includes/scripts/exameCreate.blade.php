<script>

    //Função que mostra o nome e apelido conforme o id do exame inserido
    function myFunction(id_exame) {
        $.ajax({
            method: "GET",
            url: url_atual + "/exame/" + id_exame,
            dataType: "JSON",
            async: false,
            success: function(response){
                exame = response;
            }
        });

        if (!id_exame || Object.keys(exame).length === 0) {
            document.getElementById("exame-input").value = "";
        } else {
            document.getElementById("exame-input").value = exame.exame;
        }
    }

</script>

<script>

    $(function()
    {
        localStorage.clear();
        var operacao = "";

        //Índice do item selecionado na lista
        var indice_selecionado = -1;

        var exames = $('#exames').val();
        localStorage.setItem("exames", exames);

        var exames = localStorage.getItem("exames");// Recupera os dados armazenados

        if(exames == null || exames.length === 0){ // Caso não haja conteúdo, iniciamos um vetor vazio
            exames = [];
        } else {
            exames = JSON.parse(exames);
        }

        $("#btnSalvarExame").on("click",function(){
            return Adicionar();
        });

        Listar();

        function Adicionar()
        {
            var exame = JSON.stringify({
                id : $("#input-id-exame").val(),
                exame : $("#exame-input").val()
            });

            var exame = JSON.parse(exame);

            $.ajax({
                method: "GET",
                url: url_atual + "/exame/" + exame.id,
                dataType: "JSON",
                async: false,
                success: function(response){
                    exame = response;
                }
            });

            if ( $("#input-id-exame").val() === "" || $("#exame-input").val() === "" ) {
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

            if (Object.keys(exame).length === 0) {
                swal({
                    title:"Erro! Selecione um exame existente no sistema.",
                    text:"{{Session::get('fail')}}",
                    type:"error",
                    timer:5000
                }).then((value) => {
                    //location.reload();
                }).catch(swal.noop);

                document.getElementById("exame-input").value = "";
                document.getElementById("input-id-exame").value = "";
                Listar();
                return;
            }

            var existeExame = exames.filter(key => (key.id === exame.id));

            if (Object.keys(existeExame).length != 0) {
                swal({
                    title:"Erro! Exame já se econtra incluído no plano.",
                    text:"{{Session::get('fail')}}",
                    type:"error",
                    timer:5000
                }).then((value) => {
                    //location.reload();
                }).catch(swal.noop);

                document.getElementById("exame-input").value = "";
                document.getElementById("input-id-exame").value = "";
                Listar();
                return;
            }

            exames.push(exame);
            localStorage.setItem("exames", JSON.stringify(exames));
            $("#exames").val(JSON.stringify(exames));

            swal({
                title:"Incluído com sucesso!",
                text:"{{Session::get('success')}}",
                timer:5000,
                type:"success"
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop); 

            document.getElementById("exame-input").value = "";
            document.getElementById("input-id-exame").value = "";
            Listar();
            return;
        };

        $("#planos-exames-table").on("click", ".btnExcluir",function(){
            indice_selecionado = parseInt($(this).attr("alt"));
            Excluir();
            Listar();
        });

        function Excluir(){

            exames.splice(indice_selecionado, 1);

            localStorage.setItem("exames", JSON.stringify(exames));
            $('#exames').val(JSON.stringify(exames));

            swal({
                title:"Registro excluído!",
                text:"{{Session::get('success')}}",
                timer:5000,
                type:"success"
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);
        };

        function Listar(){

            var n = 0;

            $("#planos-exames-table").html("");
            $("#planos-exames-table").html(
                "<thead>"+
                "    <tr>"+
                "    <th scope='col'>#</th>"+
                "    <th scope='col'>Exame</th>"+
                "    <th scope='col'>Ações</th>"+
                "   </tr>"+
                "</thead>"+
                "<tbody>"+
                "</tbody>"
            );

            for(var i in exames){

                var cli = exames[i];
                n++;

                $("#planos-exames-table tbody").append("<tr>");
                $("#planos-exames-table tbody").append("<td>"+n+"</td>");
                $("#planos-exames-table tbody").append("<td>"+cli.exame+"</td>");
                $("#planos-exames-table tbody").append("<td><a class='btn btn-sm btn-danger btnExcluir' alt='"+i+"'>Excluir</a></td>");
                $("#planos-exames-table tbody").append("</tr>");
            }
        };

    });

</script>