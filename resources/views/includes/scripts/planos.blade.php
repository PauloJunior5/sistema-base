<script>
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