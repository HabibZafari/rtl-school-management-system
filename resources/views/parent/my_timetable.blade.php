@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تقسیم اوقات صنوف من</h1>
                    </div>
                    {{-- <div class="col-sm-6" style="text-align: left">
                        <a href="{{ url('admin/class_timetable/add') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> ایجاد
                            تقسیم اوقات جدید</a>
                    </div> --}}
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{$getClass->name}} - {{$getSubject->name}} - <span style="color:yellow">{{$getStudent->name}}</span>
                                    </h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>هفته</th>
                                                <th>تایم شروع</th>
                                                <th>تایم پایان</th>
                                                <th>نمبر اتاق</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord as $valueW)
                                                <tr>
                                                    <td>{{$valueW['week_name']}}</td>
                                                    <td>{{!empty($valueW['start_time']) ? date('h:i A', strtotime($valueW['start_time'])) : ''}}</td>
                                                    <td>{{!empty($valueW['end_time']) ? date('h:i A', strtotime($valueW['end_time']))  : ''}}</td>
                                                    <td>{{$valueW['room_number']}}</td>
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

