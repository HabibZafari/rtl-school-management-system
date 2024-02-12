@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 539px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>افزودن کلاس برای استاد</h1>
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
                                <h3 class="card-title">ایجاد کلاس برای استاد</h3>
                            </div>
                            <form role="form" action="" method="POST">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>اسم کلاس</label>
                                        <select class="form-control" name="class_id" required>
                                            <option value="">انتخاب کلاس</option>
                                            @foreach ($getClass as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>اسم مضمون</label>
                                        @foreach ($getTeacher as $teacher)
                                            <div>
                                                <label style="font-weight: normal;">
                                                    <input type="checkbox" value="{{ $teacher->id }}"
                                                        name="teacher_id[]">{{ $teacher->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label>حالت</label>
                                        <select class="form-control" name="status">
                                            <option value="0">فعال</option>
                                            <option value="1">غیر فعال</option>
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
