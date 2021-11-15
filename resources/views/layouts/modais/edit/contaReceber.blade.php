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
                <form method="post" action="{{ route('pais.createPais') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Atualizar Conta a Receber') }}</h4>
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
                                        <input class="form-control" name="condicao_pagamento" id="input-condicao-pagamento" type="text" value="{{old('condicao_pagamento')}}" required />
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label class="col-form-label">Multa (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="multa" id="input-multa" type="number" value="{{old('multa')}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Juros (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="juro" id="input-juro" type="number" value="{{old('juro')}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Desconto (%)</label>
                                    <div class="form-group">
                                        <input class="form-control" name="desconto" id="input-desconto" type="number" value="{{old('desconto')}}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        {{-- <input id="id-status" value=0 name="status" type="checkbox" checked data-toggle="toggle" data-on="" data-off="Not Ready" data-onstyle="success" data-offstyle="danger"> --}}
                                        {{-- <input id="id-status" value=0 name="status" type="checkbox" checked data-toggle="toggle" data-width="100" data-on="" data-off="" data-onstyle="success" data-offstyle="danger"> --}}
                                        <input id="id-status" value=0 name="status" data-width="150" data-height="40" type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Data de Criação</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-form-label">Data de Alteração</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
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

    $("#id-status").on("change", function () {
        if ($(this).is(":checked")) {
            $('#id-status').val(1);
        } else {
            $('#id-status').val(0);
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
</style>