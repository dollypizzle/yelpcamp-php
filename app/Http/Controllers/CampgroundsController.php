<?php



namespace App\Http\Controllers;

use App\Campground;
use Illuminate\Http\Request;

class CampgroundsController extends Controller
{
    public function index()
    {
        $campgrounds = Campground::all();

        return view('campgrounds.index', compact('campgrounds'));
    }

    public function show(Campground $campground)
    {
        return view('campgrounds.show', compact('campground'));
    }

    public function create()
    {
        return view('campgrounds.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'picture' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $attributes['owner_id'] = auth()->id();

        Campground::create($attributes);

        return redirect('/campgrounds');
    }

    public function edit(Campground $campground)
    {
        $this->authorize('update', $campground);

        return view('campgrounds.edit', compact('campground'));
    }

    public function update(Campground $campground)
    {
        $this->authorize('update', $campground);

        $attributes = request()->validate([
            'name' => 'required',
            'picture' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $attributes['owner_id'] = auth()->id();

        $campground->update($attributes);

        return redirect($campground->path());
    }

    public function destroy(Campground $campground)
    {
        $campground->delete();

        return redirect('/campgrounds');
    }
}
