@if(!empty(Session::get('error_code')) && Session::get('error_code') == 10)
    <script>
        $(function() {
            $('#categoriaModal').modal('show');
        });
    </script>
@endif