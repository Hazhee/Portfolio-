@extends('admin.admin-master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Portfolio</h4>
                        <form action="{{route('portfolio.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" id="id" value="{{$data->id}}">
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

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Ttile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{$data->title}}" name="title"  type="text"  id="title">
                                    @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                        
                            <div class="row mb-3">
                                <label for="disc" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="disc">{{$data->disc}}</textarea> 
                                    @error('disc')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror                             
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="image" id="image" type="file">
                                    @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{asset($data->image)}}" id="showImage" class="rounded avatar-lg">
                                </div>
                            </div>
                            <!-- end row -->

                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Update portfolio</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
      
    </div>
</div>


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection