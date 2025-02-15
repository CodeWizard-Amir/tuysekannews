@extends('layout.mainlayout')
@section('title', 'تویسرکان | مشاهیر ')

@section('body')
    @include('components.mobile-menu')

    @include('layout.header')
    @include('components.website-path', [
        'breadcrumbs_name' => 'celebritise',
        'heading_content' => 'مشاهیر',
    ])

    <section class=" w-full xl:w-3/4 mx-auto lg:px-10 px-3">
        <div class="w-full shadow-sm border-2 rounded-md p-2 lg:px-10 px-1 border-gray-100">
            <p class="my-4 text-sm mx-2" for="">نام فرد مورد نظر را وارد کنید</p>
            <div id="CelebritySearchFrom" class="full flex justify-between border-2 my-3 border-gray-100 rounded-sm">
                <input id="search-input" class="px-5 !py-4 outline-none lg:py-2 text-sm w-[90%]" type="text"
                    placeholder="نام فرد برجسته ...">
            </div>
        </div>
        <div id="not-founded-celebrity-alert" class="my-5 hidden w-full mx-auto">
        <p class="bg-yellow-50 border-r-2  border-yellow-500 text-yellow-600 p-3 xl:p-5 w-full">هیچ فردی یافت نشد!</p>
    </div>
        <div class="flex my-5 flex-wrap justify-between">
            @foreach ($celebritise as $item)
                <a celebrity-name="{{ $item->name }}"
                    href="Celebrity/{{ $item->celebrityID }}/{{ str_replace(' ', '-', $item->name) }}"
                    class="w-full eachCelebrity overflow-hidden pb-5 border my-2 rounded-md md:w-[48%] lg:w-[32%] border-gray-200 shadow-sm h-[400px]">
                    <img class="w-full rounded-t-md h-[60%]" src="{{ url('/') }}/{{ $item->picture }}"
                        alt="{{ $item->name }}">
                    <div class="flex justify-between py-4 px-5 items-center">
                        <h2 class="">{{ $item->name }}</h2>
                        <p class="!text-gray-700 text-xs">{{ $item->job }}</p>
                    </div>
                    <div class="px-3 [&_>p]:leading-5 [&_>p]:text-justify !my-3 !text-xs">
                        {!! mb_substr($item->description, 0, 320) !!}
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    @include('layout.footer')
@endsection
@section('scripts')
    <script>
        $("#search-input").on('keyup', function() {
            var searchText = $("#search-input").val().trim()
            let countOfCelebrity = 0
            $(".eachCelebrity").each(function() {

                let celebName = $(this).attr('celebrity-name')
                if (!celebName.includes(searchText)) {
                    $(this).hide()
                } else {
                    countOfCelebrity++
                    $(this).show()
                }
            })
            if(countOfCelebrity > 0)
            {
                $("#not-founded-celebrity-alert").addClass("hidden")
            }
            else
            {
                $("#not-founded-celebrity-alert").removeClass("hidden")

            }
        })
    </script>
@endsection
