<?php

namespace BsdTraning\UnitTest\Listeners;

use BsdTraning\UnitTest\Events\PostWasCreated;

class UpdatePostTitle
{
    public function handle(PostWasCreated $event)
    {
        $event->post->update([
            'title' => 'New: ' . $event->post->title
        ]);
    }
}