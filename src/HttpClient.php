<?php

namespace Bleckert\LaravelLogsnag;

use Illuminate\Support\Facades\Http;

class HttpClient
{
    public function post(string $path, array $data): void
    {
        dispatch(function () use ($path, $data) {
            $url = config('logsnag.url').'/'.$path;
            $apiKey = config('logsnag.api_key');
            $project = config('logsnag.project');

            Http::send('POST', $url, [
                'body' => json_encode(
                    array_merge(
                        [
                            'project' => $project,
                        ],
                        $data
                    ),
                ),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer '.$apiKey,
                ],
            ]);
        })->onQueue(config('logsnag.queue'));
    }
}
