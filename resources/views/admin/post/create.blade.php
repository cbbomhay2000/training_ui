<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Viết bài</title>
    <link rel="stylesheet" type="text/css" id="style-ref"
        href="https://hashnode.com/static/css/app.min.css?v=1625504643155">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
@include('layouts.app')

<body class="leading-normal bg-bluish-gray dark:bg-brand-dark-grey-700">
    <div class="flex flex-row items-start flex-grow-0 w-full max-w-full">
        <div class="flex-1 w-full max-w-full lg:w-auto lg:pl-5">
            <div class="flex flex-col flex-grow-0 w-full pb-24">
                <div class="overflow-hidden border rounded-t-lg dark:border-brand-grey-800">
                    <div
                        class="bg-white w-full dark:bg-brand-dark-grey-800 dark:border-brand-grey-800 border-b py-5 px-4 md:px-5">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Viết Bài!</h1>
                            </div>
                            <form class="user" action="{{ route('post.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @include('layouts.notice')
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder=" đề bài viết" name="name_post"
                                        value="{{ old('name_post') }}" @error('name_post') is-invalid @enderror
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder="Mô tả bài viết" name="desc"
                                        value="{{ old('desc') }}" @error('desc') is-invalid @enderror required>
                                </div>
                                <div class="form-group">
                                    <select name="cate_id" class="form-control custom-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->cate_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="title_post" id="summernote"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Đăng Bài
                                </button>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            placeholder: "Chi tiết bài viết của bạn",
            minHeight: null,
            maxHeight: null,
            focus: true
        })
    });
</script>

</html>
