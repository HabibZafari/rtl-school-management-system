@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 539px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تغییر رمز کاربری</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" style="margin: 0 auto;">
                        @include('_message')
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">تغییر رمز کاربری</h3>
                            </div>
                            <form role="form" action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>پسورد قبلی</label>
                                        <input type="password" name="old_password" class="form-control"
                                            placeholder="پسورد قبلی را وارد کنید" required>
                                    </div>
                                    <div class="form-group">
                                        <label>پسورد جدید</label>
                                        <input type="password" name="new_password" class="form-control"
                                            placeholder="پسورد جدید را وارد کنید" required>
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
