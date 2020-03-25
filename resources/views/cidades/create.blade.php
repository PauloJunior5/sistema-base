@extends('layouts.app', ['activePage' => 'cidade-management', 'titlePage' => __('Cidade Management')])

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

          <form method="post" action="{{ route('cidade.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Cidade') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('cidade.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <!-- <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Id') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="id" id="input-name" type="text" placeholder="{{ __('Id') }}" value="{{ old('id') }}" required="true" aria-required="true"/>
                      @if ($errors->has('id'))
                        <span id="name-error" class="error text-danger" for="input-id">{{ $errors->first('id') }}</span>
                      @endif
                    </div>
                  </div>
                </div> -->
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Codigo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" id="input-codigo" type="text" placeholder="{{ __('Codigo') }}" value="{{ old('codigo') }}" required="true" aria-required="true"/>
                      @if ($errors->has('codigo'))
                        <span id="codigo-error" class="error text-danger" for="input-codigo">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" id="input-nome" type="text" placeholder="{{ __('Nome') }}" value="{{ old('nome') }}" required="true" />
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
                     
                      <select class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" name="pais" id="input-pais" type="text" placeholder="{{ __('País') }}" value="{{ old('pais') }}" required="true" />
                        <option> Select </option>
                        <?php foreach ($paises as $key => $pais) { ?>
                          <option value="{{$pais->id}}" >{{$pais->nome}}</option>
                        <?php } ?>
                      </select>

                    </div>
                  </div>
                  <div class="col-sm-2"> 
                    <div class="row col-6">
                      <div class="col-12 text-right">
                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#paisModal">Add + </button>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Estado') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('pais') ? ' has-danger' : '' }}">
                     
                      <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" id="input-estado" type="text" placeholder="{{ __('Estado') }}" value="{{ old('estado') }}" required="true" />
                        <option> Select </option>
                        <?php foreach ($estados as $key => $estado) { ?>
                          <option value="{{$estado->id}}" >{{$estado->nome}}</option>
                        <?php } ?>
                      </select>

                    </div>
                  </div>

                  <div class="col-sm-2"> 
                    <div class="row col-6">
                      <div class="col-12 text-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#paisModal">Add + </button>
                      </div>
                    </div>
                  </div>

                </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Cidade') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="paisModal" tabindex="-1" role="dialog" aria-labelledby="paisModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- <form method="post" action="{{ route('pais.store') }}" autocomplete="off" class="form-horizontal"> -->
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Pais') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Codigo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" id="input-name" type="text" placeholder="{{ __('Codigo') }}" value="{{ old('codigo') }}" required="true" aria-required="true"/>
                      @if ($errors->has('codigo'))
                        <span id="name-error" class="error text-danger" for="input-codigo">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" id="input-nome" type="text" placeholder="{{ __('Nome') }}" value="{{ old('nome') }}" required />
                      @if ($errors->has('nome'))
                        <span id="email-error" class="error text-danger" for="input-nome">{{ $errors->first('nome') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Pais') }}</button>
              </div>
            </div>
          <!-- </form> -->
      
      </div>
    </div>
  </div>
</div>  

@endsection



