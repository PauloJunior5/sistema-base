<?php

namespace App\Listeners;

use App\Events\EventCreatedContasReceber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Services\ContaReceberService;

class ListenerUpdateContasReceber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->contaReceberService = new ContaReceberService;
    }

    /**
     * Handle the event.
     *
     * @param  EventCreatedContasReceber  $event
     * @return void
     */
    public function handle(EventCreatedContasReceber $contrato)
    {
        $this->contaReceberService->createByEvent($contrato);
    }
}
