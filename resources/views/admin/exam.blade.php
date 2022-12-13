@extends('layout/admin-layout')

@section('admin-work')



<div class="container-fluid">
    <div class="row" style="margin-top: 25px;;">



        <div class="col-md-6 offset-md-3">
            <div class="card" style="width: 40rem;">

                <div class="card-body">
                    <h5 class="card-title">Exam Information</h5>
                    @if(Session::has('success'))
                    <div style="color:green;font-size:bold" class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <form action="{{ url('/Addexam') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="staticEmail2" class="">Subject</label>
                            <select class="form-control" name="subject_id">
                                <option value="">--Select Subject-</option>
                                @foreach($subject as $sub)
                                <option value="{{$sub->id}}">{{$sub->subject}}</option>
                                @endforeach


                            </select>

                            <span class="text-danger  text-center">
                                @error('subject_id')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="staticEmail2" class="">Exam</label>
                            <input type="text" class="form-control" name="exam_name" placeholder="Enter Subject">
                            <span class="text-danger  text-center">
                                @error('exam_name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="staticEmail2" class="">Exam Date</label>
                            <input type="date" class="form-control" name="exam_date" min="@php echo date('Y-m-d');@endphp">
                            <span class="text-danger  text-center">
                                @error('exam_date')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="staticEmail2" class="">Exam Time</label>
                            <input type="time" class="form-control" name="exam_time" placeholder="Enter Subject">
                            <span class="text-danger  text-center">
                                @error('exam_time')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Add Subject</button>
                </form>

            </div>
        </div>
    </div>




    @endsection