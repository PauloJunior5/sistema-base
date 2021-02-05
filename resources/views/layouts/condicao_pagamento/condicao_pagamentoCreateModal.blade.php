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
                <form method="post" action="{{ route('condicaoPagamento.store') }}" autocomplete="off" class="form-horizontal" id="condicaoPagamentoForm">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Nova Condição de Pagamento') }}</h4>
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
                                    <label class="col-form-label">Juro (%)</label>
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
                                <input type="hidden" id="input-parcelas" name="parcelas" value="">
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

                            <div class="card">
                                <div style="text-align: center"><h3>PARCELAS</h3></div>
                                <hr>
                                <div class="card-body">
                                    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                                        <form id="frmCadastro" class="form-horizontal">
                                            <div class="col-sm-2">
                                                <label class="col-form-label">Numero de Dias:</label>
                                                <div class="form-group">
                                                    <input type="numeric" id="id_dias" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="col-form-label">Porcentual:</label>
                                                <div class="form-group">
                                                    <input type="numeric" id="id_porcentual" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-form-label">Código</label>
                                                <div class="form-group">
                                                    <input class="form-control" id="id-forma_pagamento-input" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Forma de Pagamento</label>
                                                <div class="form-group">
                                                    <input class="form-control" id="forma_pagamento-input" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#forma_pagamentoModal"><i class="material-icons">search</i></button>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary" type="button" value="Salvar" id="btnSalvar">Salvar</button>
                                            </div>
                                        </form>

                                        <table class="table table-bordered table-hover" id="condicao-table"></table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a onclick="$('#condicao_pagamentoCreateModal').modal('hide')" class="btn btn-secondary">{{ __('Voltar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>