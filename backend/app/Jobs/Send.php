<?php

namespace App\Jobs;

use App\Services\HttpService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Send implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;
    protected $data;

    /**
     * Create a new job instance.
     */
    public function __construct(string $url, array $data)
    {
        $this->url = $url;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @param HttpService $httpService
     * @return array | null
     */
    public function handle(HttpService $httpService)
    {
        // Envía la solicitud HTTP utilizando el servicio HttpService
        return $httpService->postRequest($this->url, $this->data);
    }
}
