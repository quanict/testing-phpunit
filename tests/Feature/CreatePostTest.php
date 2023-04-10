<?php

namespace BsdTraning\UnitTest\Tests;

use App\Models\User;
use BsdTraning\UnitTest\Listeners\UpdatePostTitle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use BsdTraning\UnitTest\Events\PostWasCreated;
use BsdTraning\UnitTest\Models\Post;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    // other tests

    /** @test */
    function an_event_is_emitted_when_a_new_post_is_created()
    {
        Event::fake();

        $author = User::factory()->create();

        $this->actingAs($author)->post(route('posts.store'), [
            'title' => 'A valid title',
            'body' => 'A valid body',
        ]);

        $post = Post::first();

        Event::assertDispatched(PostWasCreated::class, function ($event) use ($post) {
            return $event->post->id === $post->id;
        });
    }

    /** @test */
    function a_newly_created_posts_title_will_be_changed()
    {
        $post = Post::factory()->create([
            'title' => 'Initial title',
        ]);

        $this->assertEquals('Initial title', $post->title);

        (new UpdatePostTitle())->handle(
            new PostWasCreated($post)
        );

        $this->assertEquals('New: ' . 'Initial title', $post->fresh()->title);
    }
}