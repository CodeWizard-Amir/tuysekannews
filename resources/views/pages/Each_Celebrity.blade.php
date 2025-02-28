@extends('layout.mainlayout')
@section('styles')
    {!! SEO::generate() !!}
@endsection

@section('body')
    @include('components.mobile-menu')

    @include('layout.header')
    @include('components.website-path', [
        'breadcrumbs_name' => 'celebrity',
        'heading_content' => $celebrity->name,
        'extra_routeData' => $celebrity,
    ])
    <section class=" w-full 3xl:w-3/4 flex flex-col xl:flex-row justify-between  my-5 mx-auto lg:px-10 px-3">
        <div class=" w-full xl:w-[70%] shadow-sm border border-gray-100 p-5">
            <img class="w-full h-[300px] xl:h-[500px] rounded-md" src="{{ url('/') }}/{{ $celebrity?->picture }}"
                alt="{{ $celebrity?->picture }}">
            <h2 class="text-xl m-4">{{ $celebrity?->name }}</h2>
            <p class="m-4">{{ $celebrity?->job }}</p>
            <div class="[&_>p]:leading-8 [&_>p]:text-justify">
                {!! $celebrity?->description !!}
            </div>
        </div>
        <div
            class="w-full xl:w-[28%] mt-5 xl:mt-0 xl:justify-start justify-between flex flex-col md:flex-row xl:flex-col h-fit !sticky !top-2 !right-0">
            <div class="w-full md:w-[48%] xl:w-full  mb-5 !h-fit shadow-sm border border-gray-100">
                <h2 class="p-5 bg-gray-50 border-b-2 border-gray-100">برخی اخبار</h2>
                <ul class="p-5">
                    @foreach ($news as $item)
                        <li class="my-2 flex justify-between items-center py-3">
                            <a class="text-sm hover:text-orange-800 flex justify-center items-center"
                                href="{{ route('websitepages.EachNews', ['newsID' => $item?->newsID, 'title' => str_replace(' ', '-', $item->title)]) }}">
                                <i class="mx-2 text-xs text-orange-800	fas fa-caret-left"></i>
                                {{ mb_substr($item?->title, 0, 35) }}
                            </a>
                            <div class="flex justify-between text-[8px] items-center">
                                <div class="">
                                    <p>{{ verta($item->created_at)->format('d') }}
                                        {{ verta($item->created_at)->format('%B') }}
                                        , {{ verta($item->created_at)->format('Y') }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="w-full md:w-[48%] xl:w-full mb-5 !h-fit shadow-sm border border-gray-100">
                <h2 class="p-5 bg-gray-50 border-b-2 border-gray-100">برخی از مشاهیر</h2>
                <ul class="p-5">
                    @foreach ($celebritise as $item)
                        <li class="my-2 flex justify-between items-center py-3">
                            <a class="text-sm hover:text-orange-800 flex justify-center items-center"
                                href="/Celebrity/{{ $item->celebrityID }}/{{ str_replace(' ', '-', $item->name) }}">
                                <i class="mx-2 text-xs text-orange-800	fas fa-user-tie	"></i>
                                {{ $item->name }}
                            </a>
                            <p class="text-gray-800 text-[10px]">{{ $item->job }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @include('layout.footer')
@endsection
