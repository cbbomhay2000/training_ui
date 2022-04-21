@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liệt kê bài viết') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên bài viết</th>
                                    <th scope="col">Danh muc</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $key => $value)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $value->name_post }}</td>
                                        {{-- <td>{{ $value->category->cate_name }}</td> --}}
                                        <td>
                                            <form action="{{ route('post.destroy', [$value->post_id]) }}" method="POST">
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
