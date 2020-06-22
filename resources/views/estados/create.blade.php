@extends('layouts.app', ['activePage' => 'estado-management', 'titlePage' => __('Estado Management')])
@section('content')

<!-- Start Modal -->
<div class="modal fade" id="paisModal" tabindex="-1" role="dialog" aria-labelledby="paisModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.paisModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('estado.store') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            @php
                                // echo "URI PATH - " . Request::path();
                            @endphp
                            <h4 class="card-title">{{ __('Add Estado ') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{{ __('Id') }}</label>
                                    <div class="form-group">
                                        <input class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="col-form-label">{{ __('Codigo') }}</label>
                                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" id="input-codigo" type="text" placeholder="{{ __('Codigo') }}" value="{{ old('codigo') }}" required="true" aria-required="true" />
                                        @if ($errors->has('codigo'))
                                        <span id="codigo-error" class="error text-danger" for="input-codigo">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">{{ __('Estado') }}</label>
                                    <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" id="input-estado" type="text" placeholder="{{ __('Estado') }}" value="" required />
                                        @if ($errors->has('estado'))
                                        <span id="estado-error" class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="col-form-label">{{ __('Codigo') }}</label>
                                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo_pais" id="input-codigo-pais" type="text" placeholder="{{ __('Codigo') }}" value="" required/>
                                        @if ($errors->has('codigo'))
                                        <span id="codigo-error" class="error text-danger" for="input-codigo">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">{{ __('País') }}</label>
                                    <div class="form-group{{ $errors->has('pais') ? ' has-danger' : '' }}">
                                        <input class="form-control" id="input-pais" value="" readonly />
                                        <input type="hidden" id="input-id-pais" name="id_pais" value="">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#paisModal" style="margin-top: 2.7rem;"><i class="material-icons">search</i></button>
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
                            <a href="{{ route('estado.index') }}" class="btn btn-secondary">{{ __('Back to list') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Add Estado') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    var url_atual = '<?php echo URL::to(''); ?>';
    $('.id').click(function() {
        var id_pais = $(this).val();
        $.ajax({
            method: "POST",
            url: url_atual + '/estado/getPais',
            data: { id_pais : id_pais },
            dataType: "JSON",
            success: function(response){
                $('#input-codigo-pais').val(response.codigo);
                $('#input-pais').val(response.pais);
                $('#input-id-pais').val(response.id);
                $('#paisModal').modal('hide')
            }
        });
    });
</script>
@endsection

