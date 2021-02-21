<!-- Start Modal -->
<div class="modal fade" id="paisModal" tabindex="-1" role="dialog" aria-labelledby="paisModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.index.pais')
            </div>
            <div class="container" style="margin: 7px">
                <button class="btn btn-primary float-right" data-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<!-- Start Modal -->
<div class="modal fade" id="paisCreateModal" tabindex="-1" role="dialog" aria-labelledby="paisCreateModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.create.pais')
            </div>
            <div class="container" style="margin: 7px">
                <button class="btn btn-primary float-right" data-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}