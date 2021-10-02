<!-- Start Modal -->
<div class="modal fade" id="clienteFisicoModal" tabindex="-1" role="dialog" aria-labelledby="clienteFisicoModal" aria-hidden="true" style="z-index: 99999">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="modal-close-button" aria-hidden="true">&times;</span>
          </button>
          <div class="modal-body">
            @include('layouts.modais.index.clienteFisico')
          </div>
      </div>
  </div>
</div>
{{-- End Modal --}}
<!-- Start Modal -->
<div class="modal fade" id="clienteFisicoCreateModal" tabindex="-1" role="dialog" aria-labelledby="clienteFisicoCreateModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.create.clienteFisico')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}