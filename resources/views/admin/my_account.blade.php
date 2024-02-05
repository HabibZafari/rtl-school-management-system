@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 539px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش اطلاعات ادمین</h1>
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
                                <h3 class="card-title">ویرایش اطلاعات ادمین</h3>
                            </div>
                            <form role="form" action="" method="POST">
                                {{-- <form role="form" action="{{ url('admin/admin/edit/' . $getRecord->id) }}" method="POST"> --}}
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>اسم</label>
                                        <input type="text" name="name"
                                            class="form-control" value="{{ $getRecord->name }}" placeholder="اسم را وارد کنید">
                                    </div>
                                    <div class="form-group">
                                        <label>آدرس ایمیل</label>
                                        <input type="email" name="email" 
                                            class="form-control" value="{{ $getRecord->email }}" placeholder="ایمیل را وارد کنید">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
