@php
    $data = App\Models\Blog::latest()->limit(3)->get();
@endphp

<div class="container">
    <div class="row gx-0 justify-content-center">
        @foreach ($data as $item)
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="{{asset($item->image)}}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">{{$item->category->name}}</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">{{$item->created_at->diffForHumans()}}</span>
                        <h3 class="title"><a href="{{route('blog.details',$item->id)}}">{{$item->title}}</a></h3>
                        <a href="{{route('blog.details',$item->id)}}" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>
        @endforeach      
    </div>
    <div class="blog__button text-center">
        <a href="{{route('blog.all')}}" class="btn">more blog</a>
    </div>
</div>