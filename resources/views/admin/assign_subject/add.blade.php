@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 539px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>افزودن رشته اختصاصی جدید</h1>
                    </div>
                    <div class="col-sm-6">
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
                                <h3 class="card-title">ایجاد رشته اختصاصی</h3>
                            </div>
                            <form role="form" action="{{ url('admin/assign_subject/add') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>اسم</label>
                                        <input type="name" name="name" value="{{ old('name') }}"
                                            class="form-control" placeholder="اسم را وارد کنید" required>
                                    </div>

                                    <div class="form-group">
                                        <label>نوعیت</label>
                                        <select class="form-control" name="type" required>
                                            <option value="">انتخاب نوعیت</option>
                                            <option value="تیوری">تیوری</option>
                                            <option value="پراکتیک">پراکتیک</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>حالت</label>
                                        <select class="form-control" name="status">
                                            <option value="1">فعال</option>
                                            <option value="0">غیر فعال</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
