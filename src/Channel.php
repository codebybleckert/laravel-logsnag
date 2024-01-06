<?php

namespace Bleckert\LaravelLogsnag;

final class Channel extends HttpClient
{
    public function __construct(
        private readonly string $channel,
    ) {
    }

    public function log(
        string $event,
        string $description = '',
        ?string $icon = null,
        bool $notify = false,
        ?array $tags = null,
        string $parser = 'text',
    ): void {
        $data = [
            'channel' => $this->channel,
            'event' => $event,
            'description' => $description,
            'icon' => $icon,
            'notify' => $notify,
            'parser' => $parser,
        ];

        if ($tags && count($tags) > 0) {
            $data['tags'] = $tags;
        }

        $this->post('log', $data);
    }
}
