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
                        @foreach ($posts as $post)
                            <div class="single-products">
                                <div class="productinfo m-3">
                                    <form action="{{ route('show.show', $post) }}">
                                        @csrf
                                        <h4>{{ $post->category->cate_name }}</h4>
                                        <h2>{{ $post->name_post }}</h2>
                                        {{$post->title_post}}
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    p a {
        float: right;
        margin-right: 20px;
    }
</style>


