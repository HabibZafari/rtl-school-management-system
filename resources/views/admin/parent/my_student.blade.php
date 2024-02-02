@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست دانش آموزان والدین</h1>
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
                                <h3 class="card-title card-primary">جستجوی اطلاعات والدین ({{$getParent->name}})</h3>
                            </div>
                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="id">آی دی دانش آموز</label>
                                            <input type="text" name="id" value="{{ Request::get('id') }}"
                                                id="id" class="form-control" placeholder="آی دی را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="roll_number">نمبر ثبت دانش آموز</label>
                                            <input type="text" name="roll_number" value="{{ Request::get('roll_number') }}"
                                                id="roll_number" class="form-control" placeholder="نام را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="name">نام</label>
                                            <input type="text" name="name" value="{{ Request::get('name') }}"
                                                id="name" class="form-control" placeholder="نام را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-info"
                                                style="margin-top: 33px">جستجو</button>
                                            <a href="{{ url('admin/parent/my-student/' . $parent_id) }}"
                                                class="btn btn-danger" style="margin-top: 33px">پاک کردن</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        @include('_message')
                        @if (!empty($getSearchStudent))
                            <div class="card card-primary">
                                <div class="card-header">
                                    {{-- <h3 class="card-title">تعداد شاگرد والدین: {{ $getRecord->total() }}</h3> --}}
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>عکس والد</th>
                                                <th>اسم دانش آموز</th>
                                                <th>ایمیل</th>
                                                <th>اسم والدین</th>
                                                {{-- <th>نمبر ثبت</th> --}}
                                                <th>تاریخ ایجاد</th>
                                                <th>تنظیمات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($getSearchStudent as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                @if (!empty($value->getProfile()))
                                                    <td><img src="{{ $value->getProfile() }}"
                                                            style="width: 50px; height: 50px; border-radius: 50%;"
                                                            alt="no image"></td>
                                                @else
                                                    <td><img style="width: 50px; height: 50px; border-radius: 50%;"
                                                            alt="no image"></td>
                                                @endif
                                                <td>{{ $value->name }} {{ $value->last_name }}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->parent_name}}</td>
                                                {{-- <td>{{$value->roll_number}}</td> --}}
                                                <td
                                                    @if ($value->status == 0) style="color: green" @else style="color: red" @endif>
                                                    @if ($value->status == 0)
                                                        فعال
                                                    @else
                                                        غیر فعال
                                                    @endif

                                                </td>
                                                <td>{{ $value->created_at ? date('Y/m/d', strtotime($value->created_at)) : '' }}
                                                </td>

                                                <td>
                                                    <a href="{{ url('admin/parent/assign_student_parent/' . $value->id.'/'.$parent_id) }}"
                                                        class="btn btn-success">اضافه کردن دانش آموز به والدین</a>
                                                    {{-- <a href="{{ url('admin/parent/delete/' . $value->id) }}"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    <div style="padding: 10px">
                                        {{-- {{ $getRecord->links() }} --}}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                {{-- <h3 class="card-title">تعداد شاگردان: {{ $getRecord->total() }}</h3> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عکس والد</th>
                                            <th>اسم دانش آموز</th>
                                            <th>ایمیل</th>
                                            <th>اسم والدین</th>
                                            {{-- <th>نمبر ثبت</th> --}}
                                            <th>تاریخ ایجاد</th>
                                            <th>تنظیمات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            @if (!empty($value->getProfile()))
                                                <td><img src="{{ $value->getProfile() }}"
                                                        style="width: 50px; height: 50px; border-radius: 50%;"
                                                        alt="no image"></td>
                                            @else
                                                <td><img style="width: 50px; height: 50px; border-radius: 50%;"
                                                        alt="no image"></td>
                                            @endif
                                            <td>{{ $value->name }} {{ $value->last_name }}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->parent_name}}</td>
                                            {{-- <td>{{$value->roll_number}}</td> --}}
                                            <td
                                                @if ($value->status == 0) style="color: green" @else style="color: red" @endif>
                                                @if ($value->status == 0)
                                                    فعال
                                                @else
                                                    غیر فعال
                                                @endif

                                            </td>
                                            <td>{{ $value->created_at ? date('Y/m/d', strtotime($value->created_at)) : '' }}
                                            </td>

                                            <td>
                                                <a href="{{ url('admin/parent/assign_student_parent_delete/' . $value->id) }}"
                                                    class="btn btn-danger btn-sm">حذف</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                                <div style="padding: 10px">
                                    {{-- {{ $getRecord->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
