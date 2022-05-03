
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Danh mục bài viết') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($posts as $post)
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <form action="">
                                        @csrf
                                        <p>
                                            <h2>{{$post->name_post}}</h2>
                                        </p>
                                        <p>
                                            <h2>{{$post->category->cate_name}}</h2>
                                        </p>
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