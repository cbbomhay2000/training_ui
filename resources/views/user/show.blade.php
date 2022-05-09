@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>{{ $posts->category->cate_name }}</h4>
                        <h2>{{ $posts->name_post }}</h2>
                        {!! $posts->title_post !!}
                    </div>
                </div>
            </div>
            @include('user.commentsDisplay', [
                'comments' => $posts->comments,
                'post_id' => $posts->id,
            ])
            <hr />
            <h4>Add comment</h4>
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name=body></textarea>
                    <input type=hidden name=post_id value="{{ $posts->id }}" />
                </div>
                <div class="form-group">
                    <input type=submit class="btn btn-success" value="Add Comment" />
                </div>
            </form>
        </div>
    </div>
@endsection
<style>
    p a {
        float: right;
        margin-right: 20px;
    }
</style>
