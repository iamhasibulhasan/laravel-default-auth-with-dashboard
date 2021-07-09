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
                            @include('validate')
                            <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-lg-12">
                        <a href="#" class="btn btn-primary mb-3" id="add_btn_role">Add new role</a>
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
                                            <th>Slug</th>
                                            <th>Permission</th>
                                            <th>Status</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="allroles_body">




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

    {{--Add new role modal--}}
    <div class="modal fade" id="add_modal_role">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add new role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Role Name</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Set Permission</label><br>
                            <input type="checkbox" name="per[]" value="Teacher" class="" id="Teacher"><label for="Teacher">Teacher</label><br>
                            <input type="checkbox" name="per[]" value="Student" class="" id="Student"><label for="Student">Student</label><br>
                            <input type="checkbox" name="per[]" value="Slider" class="" id="Slider"><label for="Slider">Slider</label><br>
                            <input type="checkbox" name="per[]" value="Users" class="" id="Users"><label for="Users">Users</label><br>
                            <input type="checkbox" name="per[]" value="Accounts" class="" id="Accounts"><label for="Accounts">Accounts</label><br>
                            <input type="checkbox" name="per[]" value="Settings" class="" id="Settings"><label for="Settings">Settings</label><br>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{--Edit role modal--}}
    <div class="modal fade" id="edit_modal_role">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add new role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="role_error"></div>
                <div class="modal-body">
                    <form id="role_update_modal" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Role Name</label>
                            <input name="name" type="text" class="form-control">
                            <input name="update_id" type="hidden" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Set Permission</label><br>
                            <div id="box">

                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" value="Update Role">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
