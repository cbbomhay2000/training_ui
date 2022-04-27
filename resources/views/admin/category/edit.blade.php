@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cập nhập Danh mục bài viết') }}</div>
                    <div class="card-body">
                        <form autocapitalize="off" method="POST" action="{{ route('category.update', $category) }}">
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }};
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif
                            @method('PUT')
                            @csrf
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
