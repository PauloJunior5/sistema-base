<?php

namespace App\Listeners;

use App\Events\EventCreatedContasReceber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ListenerUpdateContasReceber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventCreatedContasReceber  $event
     * @return void
     */
    public function handle(EventCreatedContasReceber $contrato)
    {
        Log::info(json_encode($contrato));
    }
}
