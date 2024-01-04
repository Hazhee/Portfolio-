@extends('admin.admin-master')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Password</h4> <br><br>

                        @if (count($errors))
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show"> {{$error}} </p>
                            @endforeach
                        @endif

                        <form action="{{route('update.password')}}" method="post">
                            @csrf
                            @method('PUT')
                        
                            <div class="row mb-3">
                                <label for="currentPassword" class="col-sm-2 col-form-label">Current Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="currentPassword" id="currentPassword">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="newPassword" id="newPassword">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword">
                                </div>
                            </div>
                            <!-- end row -->

                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Change Password</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
      
    </div>
</div>

@endsection