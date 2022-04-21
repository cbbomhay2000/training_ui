@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Danh mục bài viết') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        {{-- <th scope="row">{{ $key }}</th> --}}
                                        <td>{{ $category->cate_name }}
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route('category.edit',  [$category->cate_id]   ) }}">Edit</a>
                                            <form action="{{ route('category.destroy', [$category->cate_id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input class="btn btn-danger" type="submit" value="Delete" />
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
