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
                <form method="post" action="{{ route('estado.createEstado') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Novo Estado</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Código</label>
                                    <div class="form-group">
                                        <input class="form-control" readonly placeholder="#">
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-form-label">UF</label>
                                    <div class="form-group">
                                        <input class="form-control" name="uf" id="input-uf" type="text" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Estado</label>
                                    <div class="form-group">
                                        <input class="form-control" name="estado" id="input-estado" type="text" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="col-form-label">Sigla</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-sigla-pais" type="text" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">País</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-pais-pais" readonly />
                                        <input type="hidden" id="input-id-pais" name="id_pais">
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#paisModal" style="margin-top: 2.7rem;"><i class="material-icons">search</i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-form-label">Data de Criação</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                        <p class="read-only">Campo apenas para consulta.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
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