<!-- Start Modal -->
<div class="modal fade" id="cidadeModal" tabindex="-1" role="dialog" aria-labelledby="cidadeModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.index.cidade')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<!-- Start Modal -->
<div class="modal fade" id="cidadeCreateModal" tabindex="-1" role="dialog" aria-labelledby="cidadeCreateModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.create.cidade')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}