@extends('layouts.app', ['activePage' => 'cidade-management', 'titlePage' => __('Cidade Management')])
@section('content')
<!-- Start Modal -->
<div class="modal fade" id="estadoModal" tabindex="-1" role="dialog" aria-labelledby="estadoModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.estadoModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('cidade.update', $cidade) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Edit Cidade') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código de Referência</label>
                                    <div class="form-group">
                                        <input class="form-control" name="id" value="{{$cidade->id}}" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código</label>
                                    <div class="form-group">
                                        <input class="form-control" name="codigo" type="text" placeholder="Código da Cidade" value="{{$cidade->codigo}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Cidade</label>
                                    <div class="form-group">
                                        <input class="form-control" name="cidade" type="text" value="{{$cidade->cidade}}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código do Estado</label>
                                    <div class="form-group">
                                        <input class="form-control" id="codigo-estado-input" type="text" value="{{$estado->codigo}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Estado</label>
                                    <div class="form-group">
                                        <input class="form-control" id="estado-input" value="{{$estado->estado}}" readonly />
                                        <input type="hidden" id="id-estado-input" name="id_estado" value="{{$estado->id}}">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#estadoModal" style="margin-top: 2.7rem;"><i class="material-icons">search</i></button>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">País</label>
                                    <div class="form-group">
                                        <input class="form-control" id="pais-input" value="{{$pais->pais}}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Created_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('cidade.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Add Cidade') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.id').click(function() {
        var id_estado = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/cidade/getEstado',
            data: { id_estado : id_estado },
            dataType: "JSON",
            success: function(response){
                $('#codigo-estado-input').val(response.estado.codigo);
                $('#estado-input').val(response.estado.estado);
                $('#id-estado-input').val(response.estado.id);
                $('#pais-input').val(response.pais.pais);
                $('#estadoModal').modal('hide')
            }
        });
    });
</script>
@endsection
