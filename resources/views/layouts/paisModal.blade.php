<!-- Start Modal -->
<div class="modal fade" id="createPaisModal" tabindex="-1" role="dialog" aria-labelledby="paisModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @include('layouts.createPaisModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Paises') }}</h4>
                        <p class="card-category"> {{ __('Here you can manage paises') }}</p>
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
                                {{-- <a href="{{ route('pais.create') }}" class="btn btn-sm btn-primary">{{ __('Add Pais') }}</a> --}}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createPaisModal" style="margin-top: 2.7rem;"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#myTable').DataTable();
                            });
                        </script>
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead class=" text-primary">
                                    <th>{{ __('Código') }}</th>
                                    <th>{{ __('Nome') }}</th>
                                    <th>{{ __('Creation date') }}</th>
                                    <th>{{ __('Change date') }}</th>
                                    <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Actions') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($paises as $pais)
                                    <tr>
                                        <td>{{ $pais->codigo }}</td>
                                        <td>{{ $pais->pais }}</td>
                                        <td>{{ $pais->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $pais->updated_at->format('Y-m-d') }}</td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('estado.getPais', $pais) }}" data-original-title="" title="">
                                                <i class="material-icons">check</i>
                                                <div class="ripple-container"></div>
                                            </a>
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
