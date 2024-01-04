@extends('admin.admin-master')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Blogs</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Data Tables</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Blogs</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Tags</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>

                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->tags}}</td>
                                    <td><img src="{{asset($item->image)}}" width="90px" alt=""></td>
                                    <td>
                                        <a href="{{route('blog.edit',$item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('blog.destroy',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                           
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        
    </div> <!-- container-fluid -->
</div>
@endsection