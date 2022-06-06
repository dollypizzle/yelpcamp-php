<?php

namespace Tests\Feature;

use App\Campground;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampgroundCommentsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function users_can_add_comments_to_campgrounds()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $campground = factory('App\Campground')->create();

        $this->get($campground->path() . '/comments/create')->assertStatus(200);

        $this->post($campground->path() . '/comments', ['body' => 'Test comment'])
            ->assertRedirect($campground->path());

        $this->assertDatabaseHas('comments', ['body' => 'Test comment']);
    }


    /** @test */
    public function a_project_can_have_comments()
    {
        $this->signIn();

        $campground = factory(Campground::class)->create();

        $this->post($campground->path() . '/comments', ['body' => 'Test comment']);

        $this->get($campground->path())
            ->assertSee('Test comment');
    }
    /** @test */
    public function a_comment_requires_a_body()
    {
        $this->signIn();

        $campground = factory(Campground::class)->create();

        $attributes = factory('App\Comment')->raw(['body' => '']);

        $this->post($campground->path() . '/comments', $attributes)
            ->assertSessionHasErrors('body');
    }
}
