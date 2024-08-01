
<section class="qr_menu_container">
    <div class="container">
        <div class="title">
            {{setting('section_2_first_title')}}
        </div>
        <div class="subtitle">
            {{setting('section_2_second_title')}}
        </div>
        <div class="qr_menu_container_cards">
            @forelse($features as $feature)
                <a class="qr_menu_card" href="{{route('property.detail', $feature->slug)}}">
                    <div class="icon">
                        <img class="svg-img" src="{{storage($feature->image)}}" style="max-width: 60px;object-fit: cover;border-radius: 15px">
                    </div>
                    <div class="qr_menu_card_title">
                        {{$feature->title}}

                    </div>
                    <div class="qr_menu_card_subtitle">
                        {{\Illuminate\Support\Str::limit(strip_tags($feature->description), 50)}}
                    </div>
                    <div class="qr_menu_card_arrow"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                        </svg> </div>
                </a>
            @empty
            @endforelse
        </div>
    </div>
</section>
