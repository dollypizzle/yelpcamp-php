<?php

namespace Tests\Feature;


use Tests\TestCase;
use Facades\Tests\Setup\CampgroundFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampgroundsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /** @test */
    public function a_campground_needs_an_owner()
    {
        $attributes = factory('App\Campground')->raw();

        $this->post('/campgrounds', $attributes)->assertRedirect('login');
    }
    /** @test */
    public function a_user_can_create_a_campground()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->get('/campgrounds/create')->assertStatus(200);

        $attributes = [
            'name' => $this->faker->sentence,
            'picture' => $this->faker->image,
            'price' => $this->faker->randomDigit,
            'description' => $this->faker->sentence
        ];

        $this->post('/campgrounds', $attributes)->assertRedirect('/campgrounds');

        $this->assertDatabaseHas('campgrounds', $attributes);

        $this->get('/campgrounds')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_can_view_their_campground()
    {
        $this->withoutExceptionHandling();

        $campground = factory('App\Campground')->create();

        $this->get($campground->path())
            ->assertSee($campground->name)
            ->assertSee($campground->picture)
            ->assertSee($campground->price)
            ->assertSee($campground->description);
    }


    // /** @test */
    // public function a_user_can_update_campground()
    // {

    //     $this->withoutExceptionHandling();

    //     $campground = CampgroundFactory::create();

    //     $this->actingAs($campground->owner)
    //         ->patch($campground->path(), $attributes = [
    //             'name' => 'Changed',
    //             'picture' => 'Changed',
    //             'price' => 'Changed',
    //             'description' => 'Changed'
    //         ])->assertRedirect($campground->path());

    //     $this->get($campground->path() . '/edit')->assertOk();

    //     $this->assertDatabaseHas('campgrounds', $attributes);
    // }

    function a_user_can_delete_a_campground()
    {
        $this->withoutExceptionHandling();

        $campground = CampgroundFactory::create();

        $this->actingAs($campground->owner)
            ->delete($campground->path())
            ->assertRedirect('/campgrounds');
        $this->assertDatabaseMissing('campgrounds', $campground->only('id'));
    }

    /** @test */
    public function a_campground_needs_a_name()
    {
        $this->signIn();

        $attributes = factory('App\Campground')->raw(['name' => '']);

        $this->post('/campgrounds', $attributes)->assertSessionHasErrors('name');
    }
    /** @test */
    public function a_campground_needs_an_image()
    {
        $this->signIn();

        $attributes = factory('App\Campground')->raw(['picture' => '']);

        $this->post('/campgrounds', $attributes)->assertSessionHasErrors('picture');
    }
    /** @test */
    public function a_campground_needs_a_description()
    {
        $this->signIn();

        $attributes = factory('App\Campground')->raw(['description' => '']);

        $this->post('/campgrounds', $attributes)->assertSessionHasErrors('description');
    }
    /** @test */
    public function a_campground_needs_a_price()
    {
        $this->signIn();

        $attributes = factory('App\Campground')->raw(['price' => '']);

        $this->post('/campgrounds', $attributes)->assertSessionHasErrors('price');
    }
}
