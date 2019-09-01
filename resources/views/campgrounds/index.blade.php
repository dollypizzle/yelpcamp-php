@extends ('layouts.header')

@section('content')

<div class="container">
    <header class="jumbotron">
        <div class="container">
            <h1>Welcome To YelpCamp</h1>
            <p>View our handpicked Campground</p>
            <p>
                <a class="btn btn-primary btn-lg" href="/campgrounds/create">Add new campground</a>
            </p>
        </div>
    </header>

    <div class="row text-center">
        @foreach ($campgrounds as $campground)
        <div class="col-md-3 col-sm-6">
            <div class="thumbnail">
                <img src="{{ $campground->picture }}">
                <div>
                    <h4>{{ $campground->name }}</h4>
                </div>
                <p>
                    <a href="{{ $campground->path() }}" class="btn btn-primary">More Info</a>
                </p>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection