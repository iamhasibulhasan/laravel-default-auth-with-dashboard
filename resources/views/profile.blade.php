@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __(Auth::user()->name) }}
                    <a href="" class="btn btn-warning float-right" id="profile-edit-btn">Edit</a>
                </div>

                <div class="card-body">
                    <div class="text-center">
                        <img style="width: 100px; height: 100px; border-radius: 50%;" src="{{ URL::to('') }}/media/users/{{ Auth::user()->photo }}" alt="">
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <td>Name</td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td>Cell</td>
                            <td>{{ Auth::user()->cell }}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>{{ Auth::user()->uname }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ Auth::user()->gender }}</td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
</div>
    {{--Singel User View Modal--}}
    <div class="modal fade" id="single-view">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="user-view">User View</h5>
                </div>
                <div class="modal-body">
                    <table id="single_user" class="table">

                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--Auth Profile Edit Modal--}}
    <div class="modal fade" id="profile-edit-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="user-view">User View</h5>
                </div>
                <div class="modal-body">
                    @if ($errors -> any())
                        <p class="alert alert-danger">{{$errors -> first()}}<button class="close" data-dismiss="alert">&times;</button></p>
                    @endif
                    <form action="" enctype="multipart/form-data" method="POST" id="auth-edit">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" >
                            <input type="hidden" class="form-control" name="id" value="{{ Auth::user()->id }}" >
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" >
                        </div>

                        <div class="form-group">
                            <label for="">Cell</label>
                            <input type="text" class="form-control" name="cell" value="{{ Auth::user()->cell }}" >
                        </div>

                        <div class="form-group">
                            <label for="">Uname</label>
                            <input type="text" class="form-control" name="uname" value="{{ Auth::user()->uname }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Gender</label>
                            <input type="text" class="form-control" name="gender" value="{{ Auth::user()->gender }}" >
                        </div>

                        <div class="form-group">
                            <label for="">Photo</label>
                            <input type="hidden" class="form-control" name="old_photo" value="{{ Auth::user()->photo }}" >
                            <input type="file" class="form-control" name="new_photo" value="" >
                        </div>
{{--                        <a href="" class="btn btn-primary" type="submit">Submit</a>--}}
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
