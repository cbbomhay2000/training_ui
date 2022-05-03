
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
                                <div class="productinfo">
                                    <form action="">
                                        @csrf
                                        <p>
                                            <h2>{{$post->title_post}}</h2>
                                        </p>
                                        <p>
                                            {{$post->desc}}
                                        </p>
                                        <p>
                                            <h6>{{$post->category->cate_name}}</h6><a href="">xem thêm</a>
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