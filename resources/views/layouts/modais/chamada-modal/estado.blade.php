<!-- Start Modal -->
<div class="modal fade" id="estadoModal" tabindex="-1" role="dialog" aria-labelledby="estadoModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.index.estadoModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<!-- Start Modal -->
<div class="modal fade" id="estadoCreateModal" tabindex="-1" role="dialog" aria-labelledby="estadoCreateModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.create.estadoCreateModal')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}