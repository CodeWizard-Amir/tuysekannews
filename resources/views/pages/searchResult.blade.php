@extends('layout.mainlayout')
@section('title', 'تویسرکان | آخرین اخبار ')

@section('body')
    @include('components.mobile-menu')

    @include('layout.header')
    @include('components.website-path', [
        'breadcrumbs_name' => 'SearchResult',
        'heading_content' => 'صفحه جستجو',
        'extra_routeData' => $query,
    ])
    <section class="w-full lg:w-3/4 mx-auto my-5 p-5">
        <h3 class="text-xl font-bold">جستجو برای {{ $query }}</h3>
        <div class="w-full flex my-8 flex-col">
            <h3 class="my-4">جستجو برای اخبار</h3>
            @if (!$news_result->count() > 0)
            <p class="my-5 py-3 border-r-2 border-amber-500 bg-amber-50 text-amber-700 px-5">خبری با این عنوان یافت نشد!</p>
        @endif
            @foreach ($news_result as $nr)
                <a href="{{ route('websitepages.EachNews', ['newsID' => $nr?->newsID, 'title' => str_replace(' ', '-', $nr->title)]) }}" class="w-full flex h-[170px] shadow-md border">
                    <img class="w-[20%] h-full" src="{{ url('/') }}/{{ $nr->picture }}" alt="{{ $nr->title }}">
                    <div class="p-5 space-y-4">
                        <h2 class="font-bold">{{ $nr->title }}</h2>
                        <p class="text-sm">دسته بندی خبر : <strong
                                class="mx-2">{{ $nr->N_category()->first()->name }}</strong></p>
                        <div class="text-sm"> تاریخ انتشار:
                            {{ verta($nr->created_at)->format('d') }}
                            {{ verta($nr->created_at)->format('%B') }}
                            , {{ verta($nr->created_at)->format('Y') }}
                        </div>
                        <div class="flex justify-between items-center text-xs w-fit">
                            <p class="flex mx-2 justify-between items-center">
                                <span class="fa fa-eye text-sky-500"></span>
                                <span class="mx-1 text-gray-900">{{ '7855' }}</span>
                            </p>
                            <p class="flex mx-2 justify-between items-center">
                                <span class="fa fa-heart text-red-500"></span>
                                <span class="mx-1 text-gray-900">{{ '1515' }}</span>
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        <div class="w-full flex my-8 flex-col">
            <h3 class="my-4">جستجو برای مشاهیر</h3>
            <div class="w-full flex justify-between flex-wrap my-3">
                @if (!$celebrity_result->count() > 0)
                <p class="my-5 py-3 border-r-2 w-full border-amber-500 bg-amber-50 text-amber-700 px-5">مشاهیری با این عنوان یافت نشد!</p>
            @endif
                @foreach ($celebrity_result as $cr)
                    <a href= "{{ route('websitepages.celebrity', ['celebrityID' => $cr->celebrityID, 'name' => str_replace(' ', '-', $cr->name)]) }}"
                        class="w-full md:w-[49%] lg:w-[30%] xl:w-[24%]  my-3 flex flex-col h-[240px] shadow-md border">
                        <img class="w-full h-[70%]" src="{{ url('/') }}/{{ $cr->picture }}"
                            alt="{{ $cr->name }}">
                        <div class="p-5 space-y-4">
                            <div class="flex justify-between items-center">
                                <h2 class="font-bold"> {{ $cr->name }}</h2>
                                <strong class="text-gray-700 text-sm"> {{ $cr->job }} </strong>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
        <div class="w-full flex my-8 flex-col">
            <h3 class="my-4">جستجو برای آثار</h3>
            <div class="w-full flex justify-between flex-wrap my-3">
                @if (!$work_result->count() > 0)
                <p class="my-5 py-3 border-r-2 border-amber-500 bg-amber-50 text-amber-700 px-5">آثاری با این عنوان یافت نشد !</p>
            @endif
                @foreach ($work_result as $wr)
                <a href= "{{ route('websitepages.Antiquitiy', ['id' => $wr->id, 'name' => str_replace(' ', '-', $wr->name)]) }}"
                    class="w-full md:w-[49%] lg:w-[30%] xl:w-[24%] my-3 flex flex-col h-[240px] shadow-md border">
                    <img class="w-full h-[70%]" src="{{ url('/') }}/{{ $wr->picture }}"
                        alt="{{ $wr->name }}">
                    <div class="p-5 space-y-4">
                        <div class="flex justify-between items-center">
                            <h2 class="font-bold"> {{ $wr->name }}</h2>
                            <strong class="text-gray-700 text-sm"> {{ $wr->W_category()->first()->name }} </strong>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </section>
    @include('layout.footer')
@endsection
