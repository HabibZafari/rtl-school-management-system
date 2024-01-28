@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 539px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>افزودن شاگرد جدید</h1>
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
                                <h3 class="card-title">ایجاد شاگرد</h3>
                            </div>
                            <form role="form" action="{{ url('admin/student/add') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>اسم<span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control" placeholder="اسم را وارد کنید" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>تخلص <span class="text-danger">*</span></label>
                                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                class="form-control" placeholder="تخلص را وارد کنید" required>
                                        </div>

                                        {{-- /////////////////////////////////////////////////// --}}

                                        <div class="form-group col-md-6">
                                            <label>شماره پذیرش<span class="text-danger">*</span></label>
                                            <input type="text" name="admission_number"
                                                value="{{ old('admission_number') }}" class="form-control"
                                                placeholder="شماره پذیرش را وارد کنید" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>شماره ثبت <span class="text-danger">*</span></label>
                                            <input type="text" name="roll_number" value="{{ old('roll_number') }}"
                                                class="form-control" placeholder="شماره ثبت را وارد کنید" required>
                                        </div>

                                        {{-- /////////////////////////////////////////////////// --}}
                                        <div class="form-group col-md-6">
                                            <label>کلاس<span class="text-danger">*</span></label>
                                            <select class="form-control" name="class_id" required>
                                                <option> انتخاب کلاس </option>
                                                @foreach ($getClass as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>جنسیت <span class="text-danger">*</span></label>
                                            <select class="form-control" name="gender" placeholder="جنسیت را وارد کنید" required>
                                                <option value="">جنسیت را انتخاب کنید</option>
                                                <option value="male">مرد</option>
                                                <option value="female">خانم</option>
                                                <option value="other">LGBTQIA2S+</option>
                                            </select>
                                        </div>

                                        {{-- /////////////////////////////////////////////////// --}}

                                        <div class="form-group col-md-6">
                                            <label>تاریخ تولد <span class="text-danger">*</span></label>
                                            <input type="date" name="date_of_birth" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>صنف<span class="text-danger"></span></label>
                                            <input type="text" name="caste" value="{{ old('caste') }}"
                                                class="form-control" placeholder="صنف را وارد کنید">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>دین<span class="text-danger"></span></label>
                                            <input type="text" name="religion" value="{{ old('religion') }}"
                                                class="form-control" placeholder="دین را وارد کنید">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>شماره تماس<span class="text-danger"></span></label>
                                            <input type="text" name="mobile_number" value="{{ old('mobile_number') }}"
                                                class="form-control" placeholder="شماره تماس را وارد کنید">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>تاریخ پذیرش<span class="text-danger">*</span></label>
                                            <input type="date" name="admission_date" required
                                                value="{{ old('admission_date') }}" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>عکس پروفایل<span class="text-danger"></span></label>
                                            <input type="file" name="profile_pic" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>نوع گروپ خون<span class="text-danger"></span></label>
                                            <input type="text" name="blood_group" value="{{ old('blood_group') }}"
                                                class="form-control" placeholder="نوع گروپ خون را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>ارتفاع قد<span class="text-danger"></span></label>
                                            <input type="text" name="height" value="{{ old('height') }}"
                                                class="form-control" placeholder="ارتفاع  قد را وارد کنید">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>وزن<span class="text-danger"></span></label>
                                            <input type="text" name="weight" value="{{ old('weight') }}"
                                                class="form-control" placeholder="وزن را وارد کنید">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>حالت <span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" placeholder="حالت را وارد کنید" required>
                                                <option value="">حالت را انتخاب کنید</option>
                                                <option value="0">فعال</option>
                                                <option value="1">غیر فعال</option>
                                            </select>
                                        </div>


                                    </div>
                                    <hr/>

                                    <div class="form-group">
                                        <label>آدرس ایمیل<span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" placeholder="ایمیل را وارد کنید" required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>پسورد<span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="پسورد را وارد کنید" required>
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
