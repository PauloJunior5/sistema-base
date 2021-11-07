<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idExame').click(function() {
        $.ajax({
            method: "GET",
            url: url_atual + '/exame/' + $(this).val(),
            dataType: "JSON",
            async: false,
            success: function(response){
                $('#input-id-exame').val(response.id);
                $('#exame-input').val(response.exame);
                $('#exameModal').modal('hide')
            }
        });
    });
</script>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 11)
    <script>
        $(function() {
            $('#exameModal').modal('show');
        });
    </script>
@endif

<script>
    $('.idCategoria').click(function() {
        var id_categoria = $(this).val();
        $.ajax({
            method: "GET",
            url: url_atual + '/categoria/' + id_categoria,
            dataType: "JSON",
            async: false,
            success: function(response){
                $('#input-categoria').val(response.categoria);
                $('#input-id-categoria').val(response.id);
                $('#categoriaModal').modal('hide')
            }
        });
    });
</script>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 10)
    <script>
        $(function() {
            $('#exameModal').modal('show');
        });
        $(function() {
            $('#exameCreateModal').modal('show');
        });
        $(function() {
            $('#categoriaModal').modal('show');
        });
    </script>
@endif

