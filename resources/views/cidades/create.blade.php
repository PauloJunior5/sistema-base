@extends('layouts.app', ['activePage' => 'cidade-management', 'titlePage' => __('Cidade Management')])
@section('content')
<!-- Start Modal -->
<div class="modal fade" id="estadoModal" tabindex="-1" role="dialog" aria-labelledby="estadoModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.estadoModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<!-- Start Modal -->
<div class="modal fade" id="estadoCreateModal" tabindex="-1" role="dialog" aria-labelledby="estadoCreateModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.estadoCreateModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
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
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
<script>
$(function() {
    $('#estadoModal').modal('show');
});
</script>
@endif
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
                <form method="post" action="{{ route('cidade.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Cidade')}}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código de Referência</label>
                                    <div class="form-group">
                                        <input class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código</label>
                                    <div class="form-group">
                                        <input class="form-control" name="codigo" type="text" placeholder="Código da Cidade" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Cidade</label>
                                    <div class="form-group">
                                        <input class="form-control" name="cidade" type="text" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">Código do Estado</label>
                                    <div class="form-group">
                                        <input class="form-control" id="codigo-estado-input" type="text" value="" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Estado</label>
                                    <div class="form-group">
                                        <input class="form-control" id="estado-input" value="" readonly />
                                        <input type="hidden" id="id-estado-input" name="id_estado" value="">
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
                                        <input class="form-control" id="pais-input" value="" readonly />
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
<script>
    var url_atual = '<?php echo URL::to(''); ?>';
    $('.idEstado').click(function() {
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

    $('.idPais').click(function() {
        var id_pais = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/estado/getPais',
            data: { id_pais : id_pais },
            dataType: "JSON",
            success: function(response){
                alert(response.codigo);
                $('#input-codigo-pais').val(response.codigo);
                $('#input-pais').val(response.pais);
                $('#input-id-pais').val(response.id);
                $('#paisModal').modal('hide')
            }
        });
    });
</script>
@endsection
