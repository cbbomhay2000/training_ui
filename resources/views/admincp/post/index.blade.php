@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liệt kê bài viết') }}</div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }};
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên bài viết</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Danh Muc</th>
                                    <th scope="col">Thao Tac</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key => $post)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $post->name_post }}</td>
                                        <td>{{ $post->desc }}</td>
                                        <td>{{ $post->category->cate_name }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-5"><a class="btn btn-success"
                                                        href="{{ route('post.edit', $post) }}">Edit</a></div>
                                                <div class="col-md-5">
                                                    <form action="{{ route('post.destroy', $post) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input class="btn btn-danger" type="submit" value="Delete" />
                                                    </form>
                                                </div>
                                            </div>
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
