@extends('admin.admin-master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">About Page</h4>
                        <form action="{{route('about.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Ttile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="title" value="{{$data->title}}" type="text"  id="title">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short Ttile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="short_title" value="{{$data->short_title}}" type="text"  id="short_title">
                                </div>
                            </div>
                            <!-- end row -->
                        
                            <div class="row mb-3">
                                <label for="short_disc" class="col-sm-2 col-form-label">Short Discription</label>
                                <div class="col-sm-10">
                                    <textarea required="" id="short_disc" name="short_disc" class="form-control" rows="5">{{$data->short_disc}}</textarea>                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="long_disc" class="col-sm-2 col-form-label">Long Discription</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_disc">{{$data->long_disc}}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="image" id="image" type="file">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{(!empty($data->image))? url($data->image):url('upload/no_image.jpeg')}}" id="showImage" class="rounded avatar-lg">
                                </div>
                            </div>
                            <!-- end row -->

                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Update About</button>
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