@extends('layouts.app', ['activePage' => 'contas-receber-management', 'titlePage' => __('Contas a Receber Management')])
@section('content')
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
                <form method="post" action="{{ route('contaReceber.update', $contaReceber->getId()) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Atualizar Conta a Receber') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código da Parcela</label>
                                    <div class="form-group">
                                        <input class="form-control" value="{{ $contaReceber->getParcela() }}" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Multa (R$)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="multa" value="{{ number_format($contaReceber->getMulta(), 2, '.', '') }}" id="input-multa" type="number" required readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Juros (R$)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="juro" value="{{ number_format($contaReceber->getJuro(), 2, '.', '') }}" id="input-juro" type="number" required readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Desconto (R$)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="desconto" value="{{ number_format($contaReceber->getDesconto(), 2, '.', '') }}" id="input-desconto" type="number" required readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Valor Atualizado(R$)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="valor" value="{{ number_format($contaReceber->getValor(), 2, '.', '') }}" id="input-valor" type="number" required readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Dias</label>
                                    <div class="form-group">
                                        <input class="form-control" value="{{ $contaReceber->getDias() }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Status</label>
                                    <div class="form-group">
                                        <input id="id-status-value" type="hidden" value="{{ $contaReceber->getStatus() }}" name="status">
                                        <input id="id-status" data-width="150" data-height="40" type="checkbox" data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Responsavel</label>
                                    <div class="form-group">
                                        <input class="form-control" value="{{ $contaReceber->getCliente()->getCliente() . " " . $contaReceber->getCliente()->getApelido() }}" id="input-cliente" type="text" required readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Cliente</label>
                                    <div class="form-group">
                                        <input class="form-control" value="{{ $contaReceber->getCliente()->getCliente() . " - " . $contaReceber->getCliente()->getNomeFantasia() }}" id="input-cliente" type="text" required readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Data de Emissão</label>
                                    <div class="form-group">
                                        <input type="datetime" value="{{ $contaReceber->getDataEmissao() }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-form-label">Data de Vencimento</label>
                                    <div class="form-group">
                                        <input type="datetime" value="{{ $contaReceber->getDataVencimento() }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <div class="form-group">
                                        <input type="datetime" class="form-control" value="{{$contaReceber->getUpdated_at()}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <button class="btn btn-secondary float-right" data-dismiss="modal">Voltar</button>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('id-status').dataset.on = 'Pago';
    document.getElementById('id-status').dataset.off = 'Pendente';

    if ($('#id-status-value').val() == 0) {
        $('#id-status').removeAttr("checked");
    } else {
        $('#id-status').attr("checked", "checked");
        $("#id-status").attr("disabled", true);
    }

    $("#id-status").on("change", function () {
        if ($(this).is(":checked")) {
            $('#id-status-value').val(1);
        } else {
            $('#id-status-value').val(0);
        }
    });
</script>

<style>
    .toggle-on{
        right: 60%;
    }

    .toggle-off {
        left: 60%;
    }

    html body.modal-open div.wrapper div.main-panel div#contaReceberEditModal.modal.fade.show div.modal-dialog.modal-xl div.modal-content div.modal-body div.content div.container-fluid div.row div.col-md-12 form.form-horizontal div.card div.card-body div.row div.col-sm-2 div.form-group div.toggle.btn.btn-light.off div.toggle-group span.toggle-handle.btn.btn-light {
        background-color: #fff;
    }

    html body.modal-open div.wrapper div.main-panel div#contaReceberEditModal.modal.fade.show div.modal-dialog.modal-xl div.modal-content div.modal-body div.content div.container-fluid div.row div.col-md-12 form.form-horizontal div.card div.card-body div.row div.col-sm-2 div.form-group div.toggle.btn.btn-success div.toggle-group span.toggle-handle.btn.btn-light {
        background-color: #fff;
    }
</style>

@endsection