@extends('layout/admin-layout')

@section('admin-work')

@extends('layout/admin-nab-bar')
@section('nav-bar')
@endsection

<div class="container-fluid">
    <div class="row" style="margin-top: 25px;;">



        <!-- <div class="col-md-10" style="margin-top: 20px;"></div>
        <div class="col-md-2" style="margin-top: 20px;">
            <a href="{{url('/admin/exam')}}" class="btn btn-primary">Add Exam</a>
        </div> -->

        <div class="col-md-6 offset-md-3">

            <div class="card" style="">
                <div class="card-body">
                    <h5 class="card-title">Question & Answers Update Information</h5>
                    @if(Session::has('success'))
                    <div style="color:green;font-size:bold" class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('error'))
                    <div style="color:red;font-size:bold" class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif
                    <form action="{{ $url }}" method="POST">
                        @csrf

                        <div class="col-md-12">
                            <label for="staticEmail2" class="">Question</label>
                            <input type="text" class="form-control" name="question" rows="10" placeholder="Enter Question" value="{{$que['question']}}">
                          
                        </div>
                        <div class="col-md-12">
                            <label for="staticEmail2" class="">Answers</label>
                            <div class="field_wrapper">
                                <div>
                                    @foreach($Answer as $ans)
                                    <input type="text" class="form-control" readonly value="{{$ans['ans']}}" placeholder="Enter your option..s"><br>
                                    @endforeach

                                </div>

                            </div>
                            <div class="col-md-12">
                                <label for="staticEmail2" class="">Correct Answers</label>
                                <div class="field_wrapper">

                                    <select class="form-control" name="is_correct">
                                        <option value="">--select Correct Answers--</option>
                                        @foreach($Answer as $ans)
                                        <option value="{{$ans['ans']}}" style="font-weight: bold;color:green" required class="form-control">{{$ans['ans']}}</option>
                                        <span class="text-danger text-center">
                                            @error('is_correct')
                                            {{$message}}
                                            @enderror
                                        </span>
                                        @endforeach
                                    </select>

                                </div>

                            </div>
                            <br>


                            <button type="submit" name="submit" class="btn btn-primary">Add Question</button>
                    </form>

                </div>
            </div>
        </div>


    </div>
    <div class="col-md-12" style="margin-top: 20px;">


    </div>
</div>


@endsection