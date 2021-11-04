<!-- Start Modal -->
<div class="modal fade" id="exameModal" tabindex="-1" role="dialog" aria-labelledby="exameModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.index.exame')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
<!-- Start Modal -->
<div class="modal fade" id="exameCreateModal" tabindex="-1" role="dialog" aria-labelledby="exameCreateModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.create.exame')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}