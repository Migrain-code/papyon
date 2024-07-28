@extends('front-end.layouts.master')
@section('title', '')
@section('styles')
    <style>
        .blog-card .bottom {
            display: flex;
            flex-direction: column;
            align-items: baseline;
            gap: 10px;
            margin-top: 10px;
            line-height: 0px;
        }
    </style>
@endsection
@section('content')
    <section class="blog_list_page_swiper">
        <div class="container">
            <div class="blog_swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ "/front/assets/images/1718186942_refik1.jpg" }}" style="border-radius: 30px;object-fit: cover" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ "/front/assets/images/1718186942_refik1.jpg" }}" style="border-radius: 30px;object-fit: cover" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ "/front/assets/images/1718186942_refik1.jpg" }}" style="border-radius: 30px;object-fit: cover" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ "/front/assets/images/1718186942_refik1.jpg" }}" style="border-radius: 30px;object-fit: cover" alt="">
                    </div>


                </div>
            </div>
        </div>
    </section>
    <section class="blog_list_page_texts">
        <div class="container">
            <div class="title">{{ __('Blog Yazıları') }}</div>
            <div class="categories">
                <ul>
                    @foreach($categories as $category)
                        <li> <a href="{{route('blog.category', $category->slug)}}" class="@if($category->id == $blogCategory->id) active @else text-gray @endif">{{$category->name}}</a> </li>
                    @endforeach
                </ul>
            </div>
            <div class="blog_content">

                @forelse($blogs as $blog)
                    <a href="{{route('blog.detail', $blog->slug)}}" class="blog-card">
                        <div class="top">
                            <img src="{{storage($blog->image)}}" style="min-height: 250px;min-width: 250px;object-fit: cover" alt="Blog Pic">
                            <span>{{$blog->category->name}} </span>
                        </div>
                        <div class="bottom" style="gap: 0px">
                            <p>{{ $blog->created_at->format('d.m.Y')  }} </p>
                            <h4 style="font-family: euclid-circular-a-semi-bold">{{ $blog->title }}</h4>
                            <div style="font-size: 14px;" class="text-gray mt-2">
                                {!! \Illuminate\Support\Str::limit(strip_tags($blog->description), 20) !!}
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="alert alert-warning w-100 text-center col-11">Bu Kategoride Blog Bulunamadı</div>
                @endforelse


            </div>
            <div class="pagination d-flex justify-content-center gap-2">
                {!! $blogs->links() !!}
            </div>

        </div>
    </section>

@endsection

@section('scripts')
    <script>
        const blogSwiper = new Swiper(".blog_swiper", {
            slidesPerView: 1,
            spaceBetween: 100,
            loop: true,
            autoplay: {
                delay: 2000,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        })
    </script>

@endsection
