@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center; font-size: 30px;">Profile</div>

                <div class="panel-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('error_image_type'))
                        <div class="alert alert-danger">
                            {{ session('error_image_type') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <img src="image/user/{{ $user->image }}" class="img-circle" width="200" height="200"><br><br>
                                <input type="file" name="image">
                            </div>
                            <div class="col-md-8">
                                <p style="font-size: 25px;">Email: <strong>{{ $user->email }}</strong></p>
                                <div class="form-group">
                                    <label>Tên hiển thị:</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên hiển thị" value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu</label>
                                    <input type="text" class="form-control" name="about" placeholder="Nhập nội dung giới thiệu" value="{{ $user->about }}" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary pull-right">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <button type="button" class="btn btn-danger pull-right" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Đổi mật khẩu</button>
                    <br>
                    <div class="collapse" id="collapseExample">
                        <hr>
                        <form action="{{ route('change-password') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Mật khẩu mới:</label>
                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới" required>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu mới:</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
