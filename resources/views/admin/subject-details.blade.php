@extends('layout/admin-layout')

@section('admin-work')

@extends('layout/admin-nab-bar')
@section('nav-bar')
@endsection

<div class="container-fluid">
    <div class="row" style="margin-top: 25px;;">



        <div class="col-md-6 offset-md-3">
            <div class="card" style="width: 40rem;">

                <div class="card-body">
                    <h5 class="card-title">Subject Information</h5>
                    @if(Session::has('success'))
                    <div style="color:green" class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <form action="{{ url('/Addsubject') }}" id="Addsubject" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="staticEmail2" class="">Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                            <span class="text-danger  text-center">
                                @error('subject')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Add Subject</button>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-12" style="margin-top: 20px;;">
            <table class="table">
                <thead class="thead-dark">
                    <tr>

                        <th scope="col">Subject</th>
                        <th scope="col">Create date</th>
                        <th scope="col">Update date</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>

                @foreach($subject as $sub)


                <tbody class="thead-dark">

                    <tr>

                        <td> {{ $sub->subject }}</td>
                        <td> {{ $sub->created_at }}</td>
                        <td> {{ $sub->updated_at }}</td>
                        <td><a href="" class="btn-info"><i class="menu-icon mdi mdi-tooltip-edit"></i></a>&nbsp;<a href="" class="btn-danger"><i class="menu-icon mdi mdi-delete "></i></a></td>

                    </tr>


                </tbody>
                @endforeach
            </table>
        </div>
    </div>

  

    @endsection