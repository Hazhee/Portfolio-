@extends('admin.admin-master')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Category</h4>
                        <form action="{{route('category.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}" id="">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{$data->name}}" name="name" type="text"  id="name">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Update Category</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
      
    </div>
</div>
@endsection