
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 3)
<script>
    $(function() {
        $('#condicaoPagamentoModal').modal('show');
    });
</script>
@endif

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 9)
<script>
    $(function() {
        $('#condicaoPagamentoModal').modal('show');
    });
    $(function() {
        $('#condicao_pagamentoCreateModal').modal('show');
    });
    $(function() {
        $('#formaPagamentoModal').modal('show');
    });
</script>
@endif

<script>

var url_atual = '<?php echo URL::to(''); ?>';
$('.idCondição_pagamento-cliente').click(function() {
    var id_condicao_pagamento = $(this).val();
    $.ajax({
        method: "GET",
        url: url_atual + '/condicaoPagamento/show',
        data: { id_condicao_pagamento : id_condicao_pagamento },
        dataType: "JSON",
        success: function(response){
            console.log(response);
            $('#id-condicao_pagamento-input').val(response.id);
            $('#condicao_pagamento-input').val(response.condicao_pagamento);
            if(window.location.href == url_atual + '{{ "/contrato/create" }}') {
                $('#id-condicao_pagamento-input-juridico').val(response.id);
                $('#condicao_pagamento-input-juridico').val(response.condicao_pagamento);
                $('#id-condicao_pagamento-input-contrato').val(response.id);
                $('#condicao_pagamento-input-contrato').val(response.condicao_pagamento);
            }
            $('#condicaoPagamentoModal').modal('hide')
        }
    });
});

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

</script>