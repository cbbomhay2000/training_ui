@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Danh mục bài viết</h2>
                    </div>
                    <div class="form-group">
                        <div class="header-search ">
                            <form method="GET" id="header-search" action="{{ route('show.index') }}">
                                <input type="text" name="search" class="form-control m-input search-btn"
                                    value="{{ request() ? request()->search : '' }}" placeholder="Enter Country Name" />
                            </form>
                        </div>
                        <div id="search-suggest" class="s-suggest"></div>
                    </div>
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
                                        <h4>{{ $post->name_post }}</h4>
                                        <p>{{ $post->desc }}</p>
                                        <p>
                                            <b> {{ $post->category->cate_name }}</b>
                                            <a class="text-decoration-none m-5" href="{{ route('show.index') }}?search={{ $post->author->name }}">
                                                <b> {{ $post->author->name }}</b>
                                            </a>
                                            <a class="text-decoration-none xem" href="{{ route('show.show', $post) }}">Xem
                                                thêm</a>
                                        </p>
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
    .xem{
        float: right;ss
    }
    .m-5 {
        color: #000;
    }
    
</style>
