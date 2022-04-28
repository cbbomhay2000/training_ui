@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Danh mục bài viết</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('category.store') }}">
                            @csrf
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }};
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề danh mục</label>
                                <input type="text" class="form-control" name="cate_name" placeholder="Tiêu đề...."
                                    @error('confirm_password') is-invalid @enderror required>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
