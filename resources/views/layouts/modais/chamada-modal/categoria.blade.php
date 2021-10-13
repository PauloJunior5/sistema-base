<!-- Start Modal -->
<div class="modal fade" id="categoriaModal" tabindex="-1" role="dialog" aria-labelledby="categoriaModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.index.categoria')
            </div>
            <div class="container" style="margin: 7px">
                <button class="btn btn-secondary float-right" data-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<!-- Start Modal -->
<div class="modal fade" id="categoriaCreateModal" tabindex="-1" role="dialog" aria-labelledby="categoriaCreateModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.create.categoria')
            </div>
            <div class="container" style="margin: 7px">
                <button class="btn btn-secondary float-right" data-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}