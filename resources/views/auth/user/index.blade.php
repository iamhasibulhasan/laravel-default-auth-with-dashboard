@extends('layouts.app')

@section('content')

    <!-- Main Wrapper -->
    <div class="main-wrapper">

    @include('layouts.header')
    @include('layouts.menu')

    <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome {{ Auth::user()->role }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->



                <div class="row">
                    <div class="col-lg-12">
                        <a href="#" class="btn btn-primary mb-3" id="add_user_btn">Add new user</a>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Role id</th>
                                                <th>Email</th>
                                                <th>Cell</th>
                                                <th>Username</th>
                                                <th>Gender</th>
                                                <th>Education</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="allUserTable">




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>


        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    {{--Add new user modal--}}

    <div class="modal fade" id="add_user_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit user</h4>
                    <button class="close" data-dismiss="modal"> &times; </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="add_user_form">
                        @csrf
                        <div class="form-group">
                            <label for="">Full name</label>
                            <input type="text" class="form-control" name="fname">
                        </div>

                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="role_id" id="" class="form-control">
                                <option value="">-select-</option>

                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Cell</label>
                            <input type="text" class="form-control" name="cell">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="uname">
                        </div>
                        <div class="form-group">
                            <label for="" class="d-block">Gender</label>
                            <input type="radio" class="" name="gender" id="Male" value="Male"> <label for="Male">Male</label>
                            <input type="radio" class="" name="gender" id="Female" value="Female"> <label for="Female">Female</label>
                        </div>
                        <div class="form-group">
                            <label for="">Education</label>
                            <select name="edu" id="" class="form-control">
                                <option value="">-select-</option>
                                <option value="JSC">JSC</option>
                                <option value="SSC">SSC</option>
                                <option value="HSC">HSC</option>
                                <option value="BSC">BSC</option>
                            </select>
                        </div>
                        <input class="btn btn-primary btn-block" type="submit" value="Update user">
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Edit new user modal--}}

    <div class="modal fade" id="user_edit_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add new user</h4>
                    <button class="close" data-dismiss="modal"> &times; </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="edit_user_form">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="">Full name</label>
                            <input type="text" class="form-control" name="fname">
                            <input type="hidden" class="form-control" name="id">
                        </div>

                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="role_id" id="" class="form-control">
                                <option value="">-select-</option>

                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Cell</label>
                            <input type="text" class="form-control" name="cell">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="uname">
                        </div>
                        <div class="form-group">
                            <label for="" class="d-block user_gender">Gender</label>

                        </div>
                        <div class="form-group">
                            <label for="">Education</label>
                            <select name="edu" id="user_edu" class="form-control">

                            </select>
                        </div>
                        <input class="btn btn-primary btn-block" type="submit" value="Update user">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
