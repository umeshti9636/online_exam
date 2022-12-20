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
                            +Q&A
                        </button>



                        <!-- Button trigger modal -->



                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Q&A</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <div class="card">

                                                <div class="card-body">
                                                 

                                                    <form action="{{ url('/Addquestion') }}" method="POST">
                                                        @csrf

                                                        <div class="col-md-12">
                                                            <label for="staticEmail2" class="">Question</label>
                                                            <input type="text" class="form-control" name="question" rows="10" placeholder="Enter Question">
                                                            <span class="text-danger text-center">
                                                                @error('question')
                                                                {{$message}}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="staticEmail2" class="">Answers</label>
                                                            <div class="field_wrapper">
                                                                <div>
                                                                    <input type="text" class="form-control" name="ans[]" value="" />
                                                                    <a href="javascript:void(0);" class="add_button" title="Add field"><img src="{{asset('images/add-icon.png')}}" /></a>
                                                                </div>

                                                            </div>


                                                        </div>
                                                        <br>

                                                        <button type="submit" name="submit" class="btn btn-primary">Add Question</button>
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
                                        <th scope="col">id</th>
                                        <th scope="col">Question</th>

                                        <th scope="col">Correct Answer</th>
                                        <th scope="col">Action</th>




                                    </tr>
                                </thead>

                                </tbody>
                                <tfoot>
                                    @foreach($Question as $que)


                                    <tbody class="thead-dark">

                                        <tr>
                                            <td> {{ $que->id }}</td>
                                            <td style="font-weight:bold">{{ $que->question }}</td>
                                            <td> {{ $que->is_correct }}</td>
                                            <td><a href="{{ url('AnswerUpdate',['id' => $que->id]) }}" class="btn btn-primary">Correct Ans</a></td>


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