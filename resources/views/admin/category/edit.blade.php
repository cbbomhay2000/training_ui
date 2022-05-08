@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhập Danh mục bài viết</div>
                    <div class="card-body">
                        <form autocapitalize="off" method="POST" action="{{ route('category.update', $category) }}">
                            @method('PUT')
                            @csrf
                            @include('layouts.notice')
                            <div class="form-group">
                                <label for="exampleInputEmail1"> đề danh mục</label>
                                <input type="text" class="form-control" name="cate_name"
                                    value="{{ $category->cate_name }}" required>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Cập nhập danh mục</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
