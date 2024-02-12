@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 539px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش کلاس اختصاص شده به استاد</h1>
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
                                <h3 class="card-title">ویرایش کلاس اختصاص شده به استاد</h3>
                            </div>
                            <form action="" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>اسم کلاس</label>
                                        <select class="form-control" name="class_id" required>
                                            <option value="">انتخاب کلاس</option>
                                            @foreach ($getClass as $class)
                                                <option {{ $getRecord->class_id == $class->id ? 'selected' : '' }}
                                                    value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>اسم رشته</label>
                                  
                                            @foreach ($getTeacher as $teacher)
                                                @php
                                                    $checked = "";
                                                @endphp
                                                @foreach ($getAssignTeacherID as $TeacherAssign)
                                                    @if ($TeacherAssign->teacher_id == $teacher->id)
                                                        @php
                                                            $checked = 'checked';
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                <div>
                                                    <label style="font-weight: normal;">
                                                        <input type="checkbox" value="{{ $teacher->id }}" {{ $checked }} name="teacher_id[]">{{ $teacher->name }}</label>
                                                </div>
                                            @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>حالت</label>
                                        <select class="form-control" name="status">
                                            <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">فعال
                                            </option>
                                            <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">غیر
                                                فعال</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ویرایش</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
