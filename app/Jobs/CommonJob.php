<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;

abstract class CommonJob
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
