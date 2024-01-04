@php
    $data = App\Models\About::findOrFail(1);

    $multiImages = App\Models\MultiImage::all();
@endphp


<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <ul class="about__icons__wrap">
                @foreach ($multiImages as $item)
                    <li>
                        <img class="light" src="{{asset($item->multi_image)}}" alt="XD">
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-6">
            <div class="about__content">
                <div class="section__title">
                    <span class="sub-title">01 - About me</span>
                    <h2 class="title">{{$data->title}}</h2>
                </div>
                <div class="about__exp">
                    <div class="about__exp__icon">
                        <img src="{{asset('frontend/assets/img/icons/about_icon.png')}}" alt="">
                    </div>
                    <div class="about__exp__content">
                        <p>{{$data->short_title}}</p>
                    </div>
                </div>
                <p class="desc">{{$data->short_disc}}</p>
                <a href="{{route('about.index')}}" class="btn">More About Me</a>
            </div>
        </div>
    </div>
</div>