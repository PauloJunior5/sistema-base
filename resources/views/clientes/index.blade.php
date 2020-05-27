@extends('layouts.app', ['activePage' => 'clientes-management', 'titlePage' => __('Cliente Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Clientes') }}</h4>
                        <p class="card-category"> {{ __('Here you can manage clientes') }}</p>
                    </div>
                    <div class="card-body">
                        @if (session('Success'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('Success') }}</span>
                                </div>
                            </div>
                        </div>
                        @elseif (session('Warning'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>{{ session('Warning') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('pais.create') }}" class="btn btn-sm btn-primary">{{ __('Add Pais') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>{{ __('Id') }}</th>
                                    <th>{{ __('Código') }}</th>
                                    <th>{{ __('Nome') }}</th>
                                    <th>{{ __('Creation date') }}</th>
                                    <th>{{ __('Update date') }}</th>
                                    <th class="text-right">{{ __('Actions') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($paises as $pais)
                                    <tr>
                                        <td>{{ $pais->id }}</td>
                                        <td>{{ $pais->codigo }}</td>
                                        <td>{{ $pais->nome }}</td>
                                        <td>{{ $pais->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $pais->updated_at->format('Y-m-d') }}</td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('pais.destroy', $pais->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('pais.edit', $pais) }}" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this país?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection