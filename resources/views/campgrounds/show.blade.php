@extends ('layouts.header')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p class="lead">YelpCamp</p>
            <div class="list-group">
                <li class="list-group-item active">Info 1</li>
                <li class="list-group-item">Info 2</li>
                <li class="list-group-item">Info 3</li>
            </div>
        </div>
        <div class="col-md-9">
            <div class="thumbnail">
                <img class="img-responsive" src="{{ $campground->picture }}">
                <div class="caption-full">
                    <h4 class="pull-right">${{ $campground->price }}/night</h4>
                    <h4><a>{{ $campground->name }}</a></h4>
                    <p>{{ $campground->description }}</p>

                    @can('update', $campground)
                    <a class="btn btn-xs btn-warning" href="{{ $campground->path().'/edit' }}">Edit</a>
                    @endcan
                    @can('update', $campground)
                    <form class="delete-form" action="{{ $campground->path() }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                    </form>
                    @endcan
                </div>
            </div>


            <div></div>

            <div class="well">
                <div class="text-right">
                    <a class="btn btn-success" href="{{ $campground->path() . '/comments/create' }}">Add New Comment</a>
                </div>
                <hr>
                @foreach ($campground->comments as $comment)
                <div class="row">
                    <div class="col-md-12">
                        <span class="pull-right">10 days ago</span>
                        <p>
                            {{ $comment->body }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>


@endsection