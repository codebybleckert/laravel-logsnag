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

    public function identify(array $properties = []): void
    {
        $user = auth()->user();

        if ($user === null) {
            return;
        }

        $id = $user->{config('logsnag.user_id_field')};

        $this->post('identify', [
            'user_id' => (string) $id,
            'properties' => $properties,
        ]);
    }
}
