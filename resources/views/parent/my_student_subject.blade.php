@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست مضمون ها  </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        @include('_message')

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> ({{ $getUser->name }})</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>اسم</th>
                                            <th>نوعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->subject_name }}</td>
                                                <td>{{ $value->subject_type }}</td>
                                                <td><a href="{{ url('parent/my_subject/subject/class_timetable/' 
                                                    . $value->class_id . '/' . $value->subject_id . '/' . $getUser->id) }}"
                                                            class="btn btn-primary">تقسیم اوقات صنوف من</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
