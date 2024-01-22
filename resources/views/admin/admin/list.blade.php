@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست ادمین ها</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: left">
                        <a href="{{ url('admin/admin/add') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> ایجاد
                            ادمین جدید</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title card-primary">جستجوی ادمین</h3>
                            </div>
                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="name">نام</label>
                                            <input type="text" name="name" value="{{ Request::get('name') }}" id="name" class="form-control"
                                                placeholder="نام را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="email">ایمیل</label>
                                            <input type="email" name="email" value="{{ Request::get('email') }}" id="email" class="form-control"
                                                placeholder="ایمیل را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-info" style="margin-top: 33px">جستجو</button>
                                            <a href="{{ url('admin/admin/list') }}" class="btn btn-danger" style="margin-top: 33px">پاک کردن</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        @include('_message')

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">مجموعا {{ $getRecord->total() }} ادمین</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم</th>
                                            <th>ایمیل</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>دستکاری</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->created_at ? date('Y/m/d', strtotime($value->created_at)) : ''}}</td>
                                                {{-- <td>{{ $value->created_at ? Illuminate\Support\Facades\Date::parse($value->created_at)->diffForHumans() : '' }}</td> --}}
                                                <td>
                                                    <a href="{{ url('admin/admin/edit/' . $value->id) }}"
                                                        class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ url('admin/admin/delete/' . $value->id) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px">
                                    {{ $getRecord->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
