<section class="w-full relative h-[250px] lg:h-[500px] bg-sky-950">
    {{-- -------------------------- --}}
    <div class="swiper baner w-full h-full">
        <div class="swiper-wrapper w-full h-full">
            @foreach ($baners as $baner)
            @if ($baner->link != "nothing")
            <a href="{{$baner->link}}" class="swiper-slide w-full h-full">
                <img alt="{{$baner->name}}" class="w-full h-full" src="{{$baner->picture}}" />
            </a>
            @else
            <div class="swiper-slide w-full h-full">
                <img alt="{{$baner->name}}" class="w-full h-full" src="{{$baner->picture}}" />
            </div>
            @endif

            @endforeach

        </div>

    </div>
    {{-- ----------------------- --}}
    <div
        class="flex flex-wrap absolute !top-[75%]  lg:top-[85%] p-5 w-full lg:w-3/4 right-0 lg:right-[12.5%] h-fit justify-between items-center lg:px-20">

        <div class="swiper celebritise_slider !py-10 w-full">
            <div class="swiper-wrapper">
                @foreach ($celebritise as $item)
                    <a href="Celebrity/{{$item->celebrityID}}/{{str_replace(" ","-",$item->name)}}"
                        class=" swiper-slide !flex !justify-between  p-2 h-36 bg-white shadow-xl hover:shadow-none duration-500 border rounded-xl">
                        <div class="flex flex-col  space-y-2 p-2">
                            <h3>{{ $item->name }}</h3>
                            <p class="text-xs">{{ $item->job }}</p>
                            <div class="!text-xs ![&_>p]:text-justify !mt-5">
                                {!! mb_substr($item->description, 0, 80) !!}...
                            </div>
                        </div>
                        <img class="rounded-l-xl w-1/2 !h-36" src="{{ $item->picture }}" alt="">

                    </a>
                @endforeach
            </div>
        </div>

    </div>
</section>