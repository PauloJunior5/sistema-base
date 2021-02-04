<script>
    var tableId = '{{ $tableId }}';
    $(document).ready(function() {
        $(tableId).DataTable({
            "language": {
                "url": '{{ $dataTableLanguage }}'
            },            
        });
    });
</script>