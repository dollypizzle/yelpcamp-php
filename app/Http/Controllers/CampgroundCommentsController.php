<?php

namespace App\Http\Controllers;

use App\Campground;
use App\Comment;
use Illuminate\Http\Request;

class CampgroundCommentsController extends Controller
{
    public function create(Campground $campground)
    {
        return view('comments.create', compact('campground'));
    }
    public function store(Campground $campground)
    {
        request()->validate(['body' => 'required']);

        $campground->addComment(request('body'));

        return redirect($campground->path());
    }
}
