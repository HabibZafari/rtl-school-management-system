@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تقسیم اوقات درسی</h1>
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

                        @include('_message')


                        {{-- <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title card-primary">جستجوی رشته اختصاصی</h3>
                            </div>
                            <form action="" method="get" id="searchForm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="class_name">اسم کلاس</label>
                                            <select class="form-control getClass" name="class_id" required>
                                                <option value="">Select</option>
                                                @foreach ($getClass as $class)
                                                    <option {{ Request::get('class_id') == $class->id ? 'selected' : '' }}
                                                        value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="subject_name">اسم مضمون</label>
                                            <select class="form-control getSubject" name="subject_id" required>
                                                <option value="">Select</option>
                                                @if (!empty($getSubject))
                                                    @foreach ($getSubject as $subject)
                                                        <option
                                                            {{ Request::get('subject_id') == $subject->subject_id ? 'selected' : '' }}
                                                            value="{{ $subject->subject_id }}">{{ $subject->subject_name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-info"
                                                style="margin-top: 33px">جستجو</button>
                                            <a href="{{ url('admin/assign_subject/list') }}" class="btn btn-danger"
                                                style="margin-top: 33px">پاک کردن</a>
                                        </div>
                                    </div>
                            </form>
                        </div> --}}




                        @foreach ($getRecord as $value)
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{$value['name']}}</h3>
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
                                            @foreach ($value['week'] as $valueW)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('.getClass').change(function() {
            var class_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ url('admin/class_timetable/get_subject') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    class_id: class_id,
                },
                dataType: "json",
                success: function(response) {
                    $('.getSubject').html(response.html);
                },
            })
        });
    </script>
@endsection
