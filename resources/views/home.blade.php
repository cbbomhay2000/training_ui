@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <a class="btn btn-primary" href="{{ route('category.create') }}">Thêm danh mục</a>
                     <a class="btn btn-success" href="{{ route('category.index') }}">Danh sách danh mục</a>
                    <a class="btn btn-primary" href="{{ route('post.create') }}">Viết bài</a>
                     <a class="btn btn-primary" href="{{ route('post.index') }}">Liet ke bai viet</a>
                </div>      
            </div>
        </div>
    </div>
</div>
@endsection
