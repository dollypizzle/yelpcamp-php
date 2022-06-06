@extends ('layouts.header')

@section('content')

<div class="container">
    <div class="row">
        <h1 style="text-align: center;">Create a new campground</h1>
        <div style="width: 30%; margin: 25px auto;">
            <form action="/campgrounds" method="POST">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="picture" placeholder="image url">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="price" placeholder="price">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="description" placeholder="description">
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block">Submit</button>
                </div>
            </form>
            <a href="/campgrounds">Back to campground</a>
        </div>
    </div>
</div>
@endsection