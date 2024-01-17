<?php

namespace App\Services\Contentful;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use App\Traits\Contentful\Contentful;

class Config {

    use Contentful;

    protected $space_id;
    
    protected $entry_id;

    protected $access_token;

    protected $base_uri;

    protected PendingRequest $client;

    protected $response;


    public function __construct() {
        $this->setConstant();
        $this->prepareClient();
    }

    protected function setConstant()
    {
        $this->space_id = config('services.contentful.space_id');
        $this->entry_id = config('services.contentful.entry_id');
        $this->access_token = config('services.contentful.access_token');
        $this->base_uri = config('services.contentful.base_uri');
    }

    protected function checkConstant()
    {
        if (empty($this->space_id) || empty($this->entry_id) || empty($this->access_token)) {
            throw new \Exception('Empty Keys');
        }
    }

    protected function prepareClient(): void
    {
        $this->client = Http::baseUrl($this->base_uri)->withToken($this->access_token)
            ->acceptJson();
    }

    protected function get($url, array $query = [], array $headers = []): void
    {
        $this->response = $this->client->withHeaders($headers)->get($url, $query)->json();
    }
}