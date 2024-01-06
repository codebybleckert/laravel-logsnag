<?php

namespace Bleckert\LaravelLogsnag;

class Logsnag extends HttpClient
{
    public function channel(string $channel): Channel
    {
        return new Channel($channel);
    }

    public function insight(
        string $title,
        string|int $value,
        ?string $icon = null,
    ): void {
        $this->post('insight', [
            'title' => $title,
            'value' => $value,
            'icon' => $icon,
        ]);
    }
}
