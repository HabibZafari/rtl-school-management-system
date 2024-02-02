@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست شاگردان</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: left">
                        <a href="{{ url('admin/student/add') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> ایجاد
                            شاگرد جدید</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title card-primary">جستجوی اطلاعات شاگرد</h3>
                            </div>
                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="name">نام</label>
                                            <input type="text" name="name" value="{{ Request::get('name') }}" id="name" class="form-control"
                                                placeholder="نام را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="roll_number">شماره ثبت</label>
                                            <input type="text" name="roll_number" value="{{ Request::get('roll_number') }}" id="roll_number" class="form-control"
                                                placeholder="شماره ثبت را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="admission_number">شماره پذیرش </label>
                                            <input type="text" name="admission_number" value="{{ Request::get('admission_number') }}" id="admission_number" class="form-control"
                                                placeholder="شماره پذیرش را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-2">
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
                                <h3 class="card-title">تعداد شاگردان: {{ $getRecord->total() }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم دانش آموز</th>
                                            <th>اسم والدین</th>
                                            <th>شماره پذیرش</th>
                                            <th>شماره ثبت</th>
                                            <th>کلاس</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عکس شاگرد</th>
                                            <th>تنظیمات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->parent_name }}</td>
                                                <td>{{ $value->admission_number }}</td>
                                                <td>{{ $value->roll_number }}</td>
                                                <td>{{ $value->class_name }}</td>
                                                <td>{{ $value->created_at ? date('Y/m/d', strtotime($value->created_at)) : ''}}</td>
                                                @if (!empty($value->getProfile()))
                                                    <td><img src="{{ $value->getProfile() }}" style="width: 50px; height: 50px; border-radius: 50%;" alt="no image"></td>
                                                @else
                                                    <td><img style="width: 50px; height: 50px; border-radius: 50%;" alt="no image"></td>
                                                @endif
                                                <td>
                                                    <a href="{{ url('admin/student/edit/' . $value->id) }}"
                                                        class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ url('admin/student/delete/' . $value->id) }}"
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
