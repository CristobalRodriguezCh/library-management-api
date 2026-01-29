<?php

namespace App\Listeners;

use App\Events\BookCreated;
use App\Jobs\UpdateAuthorBooksCount;
use Illuminate\Support\Facades\Bus;

class UpdateAuthorBooksCountListener
{
    public function __construct()
    {
        //
    }

    public function handle(BookCreated $event)
    {
        try {
            Bus::dispatch(
                new UpdateAuthorBooksCount($event->book->author_id)
            );
        } catch (\Exception $e) {
            dd('Error en dispatch: ' . $e->getMessage());
        }
    }
}