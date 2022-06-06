<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampgroundTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $campground = factory('App\Campground')->create();

        $this->assertEquals('/campgrounds/' . $campground->id, $campground->path());
    }

    /** @test */
    public function it_belongs_to_an_owner()
    {
        $campground = factory('App\Campground')->create();

        $this->assertInstanceOf('App\User', $campground->owner);
    }

    /** @test */
    public function it_can_add_a_comment()
    {
        $campground = factory('App\Campground')->create();

        $comment = $campground->addComment('Test comment');

        $this->assertCount(1, $campground->comments);

        $this->assertTrue($campground->comments->contains($comment));
    }
}
