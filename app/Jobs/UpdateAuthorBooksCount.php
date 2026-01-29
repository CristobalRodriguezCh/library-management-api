<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Services\AuthorService;

class UpdateAuthorBooksCount extends Job implements SelfHandling
{
    use SerializesModels;

    protected $authorId;

    public function __construct($authorId)
    {
        $this->authorId = $authorId;
    }

    public function handle(AuthorService $authorService)
    {
        $authorService->updateBooksCount($this->authorId);
    }
}