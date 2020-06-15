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
                 @if(Request::segment(1) == 'estado')
                 <form method="post" action="{{ route('pais.store') }}" autocomplete="off" class="form-horizontal">
                     @csrf
                     @method('post')
                     <input type="hidden" id="modalPais" name="modalPais" value="1">
                     @elseif(Request::segment(1) == 'cidade')
                     <form method="post" action="{{ route('pais.store') }}" autocomplete="off" class="form-horizontal">
                         @csrf
                         @method('post')
                         <input type="hidden" id="modalPais" name="modalPais" value="2">
                         @endif
                         <div class="card ">
                             <div class="card-header card-header-primary">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                                 <h4 class="card-title">{{ __('Add Pais') }}</h4>
                                 <p class="card-category"></p>
                             </div>
                             <div class="card-body ">
                                 <div class="row">
                                     <label class="col-sm-3 col-form-label">{{ __('Id') }}</label>
                                     <div class="col-sm-9">
                                         <div class="form-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" readonly />
                                             @if ($errors->has('id'))
                                             <span id="name-error" class="error text-danger" for="input-id">{{ $errors->first('id') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <label class="col-sm-3 col-form-label">{{ __('Codigo') }}</label>
                                     <div class="col-sm-9">
                                         <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" id="input-name" type="text" placeholder="{{ __('Codigo') }}" value="{{ old('codigo') }}" required="true" aria-required="true" />
                                             @if ($errors->has('codigo'))
                                             <span id="name-error" class="error text-danger" for="input-codigo">{{ $errors->first('name') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <label class="col-sm-3 col-form-label">{{ __('Nome') }}</label>
                                     <div class="col-sm-9">
                                         <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                             <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" id="input-nome" type="text" placeholder="{{ __('Nome') }}" value="{{ old('nome') }}" required />
                                             @if ($errors->has('nome'))
                                             <span id="email-error" class="error text-danger" for="input-nome">{{ $errors->first('nome') }}</span>
                                             @endif
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <label class="col-sm-3 col-form-label">Created_at</label>
                                     <div class="col-sm-9">
                                         <div class="form-group">
                                             <input type="date" class="form-control" readonly>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <label class="col-sm-3 col-form-label">Updated_at</label>
                                     <div class="col-sm-9">
                                         <div class="form-group">
                                             <input type="date" class="form-control" readonly>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="card-footer ml-auto pull-right">
                                 <button type="submit" class="btn btn-primary">{{ __('Add Pais') }}</button>
                             </div>
                         </div>
                     </form>
             </div>
         </div>
     </div>
 </div>
