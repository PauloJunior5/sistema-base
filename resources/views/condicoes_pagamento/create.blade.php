@extends('layouts.app', ['activePage' => 'condicao-pagamento-management', 'titlePage' => __('Condição de Pagamento Management')])
@section('content')
@include('layouts.modais.all-medico')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('condicaoPagamento.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Condição de Pagamento') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Código de Referência</label>
                                    <div class="form-group">
                                        <input class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-form-label">Condição de Pagamento</label>
                                    <div class="form-group">
                                        <input class="form-control" name="condicao-pagamento" id="input-condicao-pagamento" type="text" required />
                                    </div>
                                </div>
                                
                                <div class="col-sm-2">
                                    <label class="col-form-label">Multa (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="multa" id="input-multa" type="number" required />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Juro (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="juro" id="input-juro" type="number" required />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Desconto (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="desconto" id="input-desconto" type="number" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Created_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div style="text-align: center"><h3>PARCELAS</h3></div>
                            <hr>

                            <table class="table table-bordered table-hover" id="condicao-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Número de Dias</th>
                                        <th scope="col">Percentual (%)</th>
                                        <th scope="col">Forma de Pagamento</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <button onclick="AddTableRow()" type="button" class="btn btn-success btn-sm">Adicionar</button>
                            </table>
                            
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('condicaoPagamento.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Add Condição de Pagamento') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idMedico').click(function() {
        var id_medico = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/medico/show',
            data: { id_medico : id_medico },
            dataType: "JSON",
            success: function(response){
                $('#crm-medico-input').val(response.crm);
                $('#medico-input').val(response.medico);
                $('#id-medico-input').val(response.id);
                $('#medicoModal').modal('hide')
            }
        });
    });

    (function($) {
        
        AddTableRow = function() {

            var newRow = $("<tr>"); 
            var cols = "";
            var html = ""

            cols += '<td></td>'; 
            cols += '<td><input class="form-control" type="number" placeholder="Informe o número de dias" required /></td>'; 
            cols += '<td><input class="form-control" type="number" placeholder="Informe o porcentual" required /></td>'; 
            cols += '<td><div class="row"><div class="col-md-1"><label>CRM</label><input class="form-control" id="crm-medico-input" /></div><div class="col-md-4"><label>Médico Responsável</label><input class="form-control" id="medico-input" readonly /><input type="hidden" id="id-medico-input" name="id_medico"></div><div class="col-md-1"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#medicoModal" style="margin-top: 2.2rem;"><i class="material-icons">search</i></button></div></div></td>'; 
            cols += '<td><button onclick="SaveTableRow(this)" type="button" class="btn btn-primary btn-sm">Salvar</button><button onclick="RemoveTableRow(this)" type="button" class="btn btn-danger btn-sm">Cancelar</button></td>';

            newRow.append(cols); 
            $("#condicao-table").append(newRow);

            return false; 
        };

        RemoveTableRow = function(handler) {
            var tr = $(handler).closest('tr');

            tr.fadeOut(400, function(){
            tr.remove();
            });

            return false;
        };

        SaveTableRow = function() {

            var hst = document.getElementById("condicao-table");
            console.log(hst);

        
        };

    })(jQuery);

    

</script>
@endsection
