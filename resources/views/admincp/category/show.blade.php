@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cập nhập Danh mục bài viết') }}</div>
                    <div class="card-body">
                        <form autocapitalize="off" method="POST"
                            action="{{ route('category.update'), [$category->cate_id] }}">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề danh mục</label>
                                <input type="text" class="form-control" name="cateName" value="{{ $category->cateName }}"
                                    required>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Cập nhập danh mục</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
