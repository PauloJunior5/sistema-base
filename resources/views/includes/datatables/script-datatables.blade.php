<script>
    $(document).ready(function() {
        $('{{ $tableId }}').DataTable({
            "language": {
                "url": '{{ $dataTableLanguage }}'
            },
        });
    });
</script>