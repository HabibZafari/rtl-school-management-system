@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست رشته اختصاصی ها</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: left">
                        <a href="{{ url('admin/assign_subject/add') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> ایجاد
                            رشته اختصاصی جدید</a>
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
                                <h3 class="card-title card-primary">جستجوی رشته اختصاصی</h3>
                            </div>
                            <form action="" method="get" id="searchForm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="name">نام</label>
                                            <input type="text" name="name" value="{{ Request::get('name') }}"
                                                id="name" class="form-control" placeholder="نام را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>نوعیت</label>
                                            <select class="form-control" name="type">
                                                <option value="">انتخاب نوعیت</option>
                                                <option {{ (Request::get('type') == 'تیوری') ? 'selected' : '' }} value="تیوری">تیوری</option>
                                                <option {{ (Request::get('type') == 'پراکتیک') ? 'selected' : '' }} value="پراکتیک">پراکتیک</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-info"
                                                style="margin-top: 33px">جستجو</button>
                                            <a href="{{ url('admin/subject/list') }}" class="btn btn-danger"
                                                style="margin-top: 33px">پاک کردن</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        @include('_message')

                        <div class="card card-primary">
                            <div class="card-header">
                                {{-- <h3 class="card-title">تعداد رشته اختصاصی ها: {{ $getRecord->total() }}</h3> --}}
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم</th>
                                            <th>نوعیت</th>
                                            <th>حالت</th>
                                            <th>ایجاد کننده</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>تنظیمات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->type }}</td>
                                                <td @if ($value->status == 1) style="color: green" @else style="color: red"  @endif>
                                                    @if ($value->status == 1)
                                                        فعال
                                                    @else
                                                        غیر فعال
                                                    @endif

                                                </td>
                                                <td>{{ $value->created_by_name }}</td>
                                                <td>{{ $value->created_at ? date('Y/m/d', strtotime($value->created_at)) : '' }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/subject/edit/' . $value->id) }}"
                                                        class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ url('admin/subject/delete/' . $value->id) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
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