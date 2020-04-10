@extends('layouts.app', ['activePage' => 'cidade-management', 'titlePage' => __('Cidade Management')])

@section('content')
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
                  <div class="col-md-12 text-right">
                      <a href="{{ route('cidade.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Id') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" id="input-id" type="text" placeholder="{{ __('Id') }}" value="{{ old('id', $cidade->id) }}" required="true" aria-required="true" readonly=“true”/>
                      @if ($errors->has('name'))
                        <span id="id-error" class="error text-danger" for="input-id">{{ $errors->first('id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Codigo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" id="input-codigo" type="text" placeholder="{{ __('Codigo') }}" value="{{ old('codigo', $cidade->codigo) }}" required="true" aria-required="true"/>
                      @if ($errors->has('codigo'))
                        <span id="codigo-error" class="error text-danger" for="input-codigo">{{ $errors->first('codigo') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" id="input-nome" type="nome" placeholder="{{ __('Nome') }}" value="{{ old('nome', $cidade->nome) }}" required />
                      @if ($errors->has('nome'))
                        <span id="nome-error" class="error text-danger" for="input-nome">{{ $errors->first('nome') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('País') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('pais') ? ' has-danger' : '' }}">
                      <?php $pais = App\Pais::findOrFail($cidade->pais); ?>
                      <select class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" name="pais" id="input-pais" type="text" placeholder="{{ __('País') }}" value="{{ old('pais', $cidade->pais) }}" required />
                        <option value="{{$pais->id}}"> {{$pais->nome}} </option>
                        <?php foreach ($paises as $key => $value) { ?>
                          @if ($value->id != $pais->id)
                            <option value="{{$value->id}}" >{{$value->nome}}</option>
                          @endif
                            
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Estado') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                      <?php $estado = App\Estado::findOrFail($cidade->estado); ?>
                      <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" id="input-estado" type="text" placeholder="{{ __('Estado') }}" value="{{ old('estado', $cidade->estado) }}" required />
                        <option value="{{$estado->id}}"> {{$estado->nome}} </option>
                        <?php foreach ($estados as $key => $value) { ?>
                          @if ($value->id != $estado->id)
                            <option value="{{$value->id}}" >{{$value->nome}}</option>
                          @endif
                            
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
               
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>

      $(document).ready(function(){

          var url_atual = '<?php echo URL::to('/'); ?>';

          $('#input-pais').change(function(){

              var id_pais = $(this).val();

              $.post( url_atual + '/cidade/getEstados', {
                  id_pais : id_pais }, function(data){
                      $('#input-estado').html(data);
                      $('#input-estado').removeAttr('disabled');
              });
              
          });

      });

  </script>
  
@endsection