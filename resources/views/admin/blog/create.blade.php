@extends('admin.admin-master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Blog</h4>
                        <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Ttile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="title"  type="text"  id="title">
                                    @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="category_id" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach ($data as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                                                            
                                    @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="tags" value="home,tech" type="text"  data-role="tagsinput">
                                </div>
                            </div>
                            <!-- end row -->
                           
                        
                            <div class="row mb-3">
                                <label for="disc" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="disc"></textarea> 
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
                                    <img src="{{url('upload/no_image.jpeg')}}" id="showImage" class="rounded avatar-lg">
                                </div>
                            </div>
                            <!-- end row -->

                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Add Blog</button>
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