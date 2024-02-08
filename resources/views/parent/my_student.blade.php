@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست دانش آموزان من</h1>
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
                                {{-- <h3 class="card-title">تعداد شاگردان: {{ $getRecord->total() }}</h3> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عکس والد</th>
                                            <th>اسم دانش آموز</th>
                                            <th>ایمیل</th>
                                            <th>اسم والدین</th>
                                            <th>تنظیمات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            @if (!empty($value->getProfile()))
                                                <td><img src="{{ $value->getProfile() }}"
                                                        style="width: 50px; height: 50px; border-radius: 50%;"
                                                        alt="no image"></td>
                                            @else
                                                <td><img style="width: 50px; height: 50px; border-radius: 50%;"
                                                        alt="no image"></td>
                                            @endif
                                            <td>{{ $value->name }} {{ $value->last_name }}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->parent_name}}</td>
                                            <td>
                                                <a href="{{ url('parent/my_student/subject/'.$value->id) }}" class="btn btn-primary">مضمون</a>
                                            </td>
                                            
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
