@extends('layouts.app', ['activePage' => 'estado-management', 'titlePage' => __('Estado Management')])
@section('content')
<!-- Start Modal -->
<div class="modal fade" id="paisModal" tabindex="-1" role="dialog" aria-labelledby="paisModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.paisModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<!-- Start Modal -->
<div class="modal fade" id="paisCreateModal" tabindex="-1" role="dialog" aria-labelledby="paisCreateModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.paisCreateModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 4)
<script>
$(function() {
    $('#paisModal').modal('show');
});
</script>
@endif
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('estado.update', $estado) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Edit Estado') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código de Referência</label>
                                    <div class="form-group">
                                        <input class="form-control" name="id" value="{{$estado->id}}" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código</label>
                                    <div class="form-group">
                                        <input class="form-control" name="codigo" type="text" placeholder="Código do Estado" value="{{$estado->codigo}}" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Estado</label>
                                    <div class="form-group">
                                        <input class="form-control" name="estado" type="text" value="{{$estado->estado}}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código do País</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-codigo-pais" value="{{$pais->codigo}}" type="text" required/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">País</label>
                                    <div class="form-group">
                                        <input class="form-control" id="input-pais-pais" value="{{$pais->pais}}" readonly />
                                        <input type="hidden" id="input-id-pais" name="id_pais" value="{{$pais->id}}">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#paisModal" style="margin-top: 2.7rem;"><i class="material-icons">search</i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Created_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{ $estado->created_at->format('Y-m-d') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Updated_at</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{ $estado->updated_at->format('Y-m-d') }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto pull-right">
                            <a href="{{ route('estado.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idPais').click(function() {
        var id_pais = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/estado/getPais',
            data: { id_pais : id_pais },
            dataType: "JSON",
            success: function(response){
                $('#input-codigo-pais').val(response.codigo);
                $('#input-pais-pais').val(response.pais);
                $('#input-id-pais').val(response.id);
                $('#paisModal').modal('hide')
            }
        });
    });
</script>
@endsection
