<?php

namespace App\Listeners;

use App\Events\EventCreatedContasReceber;
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
    public function handle(EventCreatedContasReceber $event)
    {
        $this->contaReceberService->createByEvent($event);
    }
}
