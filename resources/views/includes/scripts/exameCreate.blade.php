<script>

    //Função que mostra o nome e apelido conforme o id do paciente inserido
    function myFunction(id_exame) {
        $.ajax({
            method: "GET",
            url: url_atual + "/exame/" + id_exame,
            dataType: "JSON",
            async: false,
            success: function(response){
                exame = response;
                console.log(exame);
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

    // $(function()
    // {
    //     localStorage.clear();
    //     var operacao = "";

    //     //Índice do item selecionado na lista
    //     var indice_selecionado = -1;

    //     var pacientes = $('#pacientes').val();
    //     localStorage.setItem("pacientes", pacientes);

    //     var pacientes = localStorage.getItem("pacientes");// Recupera os dados armazenados

    //     if(pacientes == null || pacientes.length === 0){ // Caso não haja conteúdo, iniciamos um vetor vazio
    //         pacientes = [];
    //     } else {
    //         pacientes = JSON.parse(pacientes);
    //     }

    //     $("#btnSalvarPaciente").on("click",function(){
    //         return Adicionar();
    //     });

    //     Listar();

    //     function Adicionar()
    //     {
    //         var paciente = JSON.stringify({
    //             id : $("#input-id-paciente").val(),
    //             paciente : $("#input-paciente").val()
    //         });

    //         var paciente = JSON.parse(paciente);

    //         $.ajax({
    //             method: "GET",
    //             url: url_atual + "/paciente/" + paciente.id,
    //             dataType: "JSON",
    //             async: false,
    //             success: function(response){
    //                 paciente = response;
    //             }
    //         });

    //         if (paciente.id === "" || paciente.paciente === "") {
    //             swal({
    //                 title:"Erro! Preencha todos os campos",
    //                 text:"{{Session::get('fail')}}",
    //                 type:"error",
    //                 timer:5000
    //             }).then((value) => {
    //                 //location.reload();
    //             }).catch(swal.noop);

    //             return;
    //         };

    //         if (Object.keys(paciente).length === 0) {
    //             swal({
    //                 title:"Erro! Selecione um paciente existente no sistema.",
    //                 text:"{{Session::get('fail')}}",
    //                 type:"error",
    //                 timer:5000
    //             }).then((value) => {
    //                 //location.reload();
    //             }).catch(swal.noop);

    //             document.getElementById("input-paciente").value = "";
    //             document.getElementById("input-id-paciente").value = "";
    //             Listar();
    //             return;
    //         }

    //         var existePaciente = pacientes.filter(key => (key.id === paciente.id));

    //         if (Object.keys(existePaciente).length != 0) {
    //             swal({
    //                 title:"Erro! Paciente já se econtra incluído no contrato.",
    //                 text:"{{Session::get('fail')}}",
    //                 type:"error",
    //                 timer:5000
    //             }).then((value) => {
    //                 //location.reload();
    //             }).catch(swal.noop);

    //             document.getElementById("input-paciente").value = "";
    //             document.getElementById("input-id-paciente").value = "";
    //             Listar();
    //             return;
    //         }

    //         pacientes.push(paciente);
    //         localStorage.setItem("pacientes", JSON.stringify(pacientes));
    //         $("#pacientes").val(JSON.stringify(pacientes));

    //         swal({
    //                 title:"Incluído com sucesso!",
    //                 text:"{{Session::get('success')}}",
    //                 timer:5000,
    //                 type:"success"
    //             }).then((value) => {
    //                 //location.reload();
    //             }).catch(swal.noop);

    //         document.getElementById("input-paciente").value = "";
    //         document.getElementById("input-id-paciente").value = "";
    //         Listar();
    //         return;
    //     };
    // });
</script>