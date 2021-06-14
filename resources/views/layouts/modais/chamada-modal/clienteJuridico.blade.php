<!-- Start Modal -->
<div class="modal fade" id="clienteJuridicoModal" tabindex="-1" role="dialog" aria-labelledby="clienteJuridicoModal" aria-hidden="true" style="z-index: 99998">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="modal-close-button" aria-hidden="true">&times;</span>
          </button>
          <div class="modal-body">
            @include('layouts.modais.index.clienteJuridico')
          </div>
      </div>
  </div>
</div>
{{-- End Modal --}}
<!-- Start Modal -->
<div class="modal fade" id="clienteJuridicoCreateModal" tabindex="-1" role="dialog" aria-labelledby="clienteJuridicoCreateModal" aria-hidden="true" style="z-index: 99999">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="modal-close-button" aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                @include('layouts.modais.create.clienteJuridico')
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}