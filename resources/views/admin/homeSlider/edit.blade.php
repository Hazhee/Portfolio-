@extends('admin.admin-master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Home Slide</h4>
                        <form action="{{route('homeSlide.update')}}" method="POST" enctype="multipart/form-data">
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
                                <label for="short_disc" class="col-sm-2 col-form-label">Short Discription</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="short_disc" value="{{$data->short_disc}}"  id="short_disc">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="video_url" value="{{$data->video_url}}"  id="video_url">
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

                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Update Slide</button>
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