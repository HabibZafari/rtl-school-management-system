@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست کلاس و مضمون های من</h1>
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
                                <h3 class="card-title">تعداد کلاس های و مضمون ها: </h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>اسم کلاس</th>
                                            <th>اسم مضمون</th>
                                            <th>نوع مضمون</th>
                                            <th>تقسیم اوقات صنف</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->class_name }}</td>
                                                <td>{{ $value->subject_name }}</td>
                                                <td>{{ $value->subject_type }}</td>

                                                <td>
                                                    @php
                                                        $ClassSubject = $value->getMyTimeTable($value->class_id, $value->subject_id);
                                                    @endphp
                                                    @if ($ClassSubject)
                                                        {{ date('d-m-Y H:i A', strtotime($ClassSubject->start_time)) }} 
                                                        to 
                                                        {{ date('d-m-Y H:i A', strtotime($ClassSubject->end_time)) }}
                                                        <br />
                                                        Room Number : {{ $ClassSubject->room_number }}
                                                    @else
                                                        No timetable available
                                                    @endif
                                                </td>
                                                <td>{{ $value->created_at ? date('Y/m/d', strtotime($value->created_at)) : '' }}
                                                </td>
                                                <td><a href="{{ url('teacher/my_class_subject/class_timetable/' 
                                                . $value->class_id . '/' . $value->subject_id) }}"
                                                        class="btn btn-primary">تقسیم اوقات صنوف من</a></td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
