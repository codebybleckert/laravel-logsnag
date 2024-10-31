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

        if ($tags !== null && count($tags) > 0) {
            $data['tags'] = $tags;
        }

        if (auth()->user()) {
            $data['user_id'] = auth()->user()->{config('logsnag.user_id_field')};
        }

        $this->post('log', $data);
    }
}
