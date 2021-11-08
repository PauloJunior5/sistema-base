@extends('layouts.app', ['activePage' => 'contasReceber-management', 'titlePage' => __('Contas à Receber Management')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Contas à Receber') }}</h4>
                        <p class="card-category"> {{ __('Aqui você pode gerenciar contas à receber') }}</p>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
