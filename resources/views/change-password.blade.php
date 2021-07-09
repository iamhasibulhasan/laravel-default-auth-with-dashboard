@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="msg"></div>
                    <form action="" class="" id="change-pass" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" id="pass" name="password" class="form-control">
                            <input type="hidden" id="id" name="id" class="form-control" value="{{ Auth::user()->id }}">
                        </div>

                        <div class="form-group">
                            <label for="new_pass">New Password</label>
                            <input type="password" id="new_pass" name="new_pass" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="con_pass">Confirm Password</label>
                            <input type="password" id="con_pass" name="con_pass" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Change Password">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
