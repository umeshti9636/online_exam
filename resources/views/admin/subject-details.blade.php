@extends('layout/admin-layout')

@section('admin-work')

@extends('layout/admin-nab-bar')
@section('nav-bar')
@endsection
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            +Subject
                        </button>



                        <!-- Button trigger modal -->



                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <div class="card">

                                                <div class="card-body">
                                                    <h5 class="card-title">Subject Information</h5>

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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(Session::has('success'))
                            <div style="" class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Create date</th>
                                        <th scope="col">Update date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                </tbody>
                                <tfoot>
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

                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</section>


@endsection