@extends('admin.admin-master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="col-sm-6 col-lg-6">
            <div class="row">
                <div class="card">
                    <br>
                    <center><img src="{{(!empty($user->image))? url('upload/admin_images/'.$user->image):url('upload/no_image.jpeg')}}" class="img-thumbnail rounded-circle avatar-xl" alt="..."></center>
                    <div class="card-body">
                        
                        <h5 class="card-title">Name: {{$user->name}}</h5>
                        <hr>
                        <h5 class="card-title">Email: {{$user->email}}</h5>
                        <hr>
                        <a href="{{route('profile.edit')}}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection