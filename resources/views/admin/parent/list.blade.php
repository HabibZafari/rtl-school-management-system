@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست والدین</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: left">
                        <a href="{{ url('admin/parent/add') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> ایجاد
                            والدین جدید</a>
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
                                <h3 class="card-title card-primary">جستجوی اطلاعات والدین</h3>
                            </div>
                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="name">نام</label>
                                            <input type="text" name="name" value="{{ Request::get('name') }}" id="name" class="form-control"
                                                placeholder="نام را وارد کنید">
                                        </div>
                                        {{-- <div class="form-group col-md-2">
                                            <label for="email">ایمیل</label>
                                            <input type="email" name="email" value="{{ Request::get('email') }}" id="email" class="form-control"
                                                placeholder="ایمیل را وارد کنید">
                                        </div> --}}
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-info" style="margin-top: 33px">جستجو</button>
                                            <a href="{{ url('admin/parent/list') }}" class="btn btn-danger" style="margin-top: 33px">پاک کردن</a>
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
                                            <th>عکس والد</th>
                                            <th>اسم</th>
                                            {{-- <th>ایمیل</th> --}}
                                            <th>جنسیت</th>
                                            <th>شماره تماس</th>
                                            <th>شغل</th>
                                            <th>آدرس</th>
                                            <th>حالت</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>تنظیمات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                @if (!empty($value->getProfile()))
                                                    <td><img src="{{ $value->getProfile() }}" style="width: 50px; height: 50px; border-radius: 50%;" alt="no image"></td>
                                                @else
                                                    <td><img style="width: 50px; height: 50px; border-radius: 50%;" alt="no image"></td>
                                                @endif
                                                <td>{{ $value->name }} {{ $value->last_name }}</td>
                                                {{-- <td>{{$value->email}}</td> --}}
                                                <td>{{$value->gender}}</td>
                                                <td>{{$value->mobile_number}}</td>
                                                <td>{{$value->occupation}}</td>
                                                <td>{{$value->address}}</td>
                                                <td @if ($value->status == 0) style="color: green" @else style="color: red"  @endif>
                                                    @if ($value->status == 0)
                                                        فعال
                                                    @else
                                                        غیر فعال
                                                    @endif

                                                </td>
                                                <td>{{ $value->created_at ? date('Y/m/d', strtotime($value->created_at)) : ''}}</td>
                                                
                                                <td>
                                                    <a href="{{ url('admin/parent/edit/' . $value->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ url('admin/parent/delete/' . $value->id) }}"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    <a href="{{ url('admin/parent/my-student/' . $value->id) }}"
                                                        class="btn btn-danger btn-sm">My Student</a>
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
