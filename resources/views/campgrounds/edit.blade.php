@extends ('layouts.header')

@section('content')

<div class="container">
    <div class="row">
        <h1 style="text-align: center;">Edit {{ $campground->name }}</h1>
        <div style="width: 30%; margin: 25px auto;">
            <form action="{{ $campground->path() }}" method="POST">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ $campground->name }}">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="picture" value="{{ $campground->picture }}">
                </div>
                <div class="form-group">
                    <input class="form-control" type="number" name="price" value="{{ $campground->price }}" min="0.01" step="0.01">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="description" value="{{ $campground->description }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block">Submit!</button>
                </div>
            </form>
            <a href="/campgrounds">Go Back</a>
        </div>
    </div>
</div>

@endsection