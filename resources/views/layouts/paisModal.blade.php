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
                                            <button rel="tooltip" class="btn btn-success btn-link id" value="{{$pais->id}}" data-original-title="" title="">
                                                <i class="material-icons">check</i>
                                                <div class="ripple-container"></div>
                                            </button>
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
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

</script>
