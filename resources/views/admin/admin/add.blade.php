@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 539px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>افزودن ادمین جدید</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">ایجاد ادمین</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ url('admin/admin/add') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>اسم</label>
                                        <input type="name" name="name" value="{{ old('name') }}" class="form-control"
                                            placeholder="اسم را وارد کنید" required>
                                    </div>
                                    <div class="form-group">
                                        <label>آدرس ایمیل</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                            placeholder="ایمیل را وارد کنید" required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>پسورد</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="پسورد را وارد کنید" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
