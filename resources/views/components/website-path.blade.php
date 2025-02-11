<div
    class="flex p-5 justify-between lg:w-3/4 w-full items-center mx-auto !lg:text-sm !text-xs lg:px-10 px-5 py-5 my-3 lg:my-10">
    <h1 class="lg:text-lg font-bold">
        @php
            $extra_routeData = $extra_routeData ?? null;
        @endphp
        {{ $heading_content }}
    </h1>
    <div class="flex justify-center items-center">
        {!! Breadcrumbs::render($breadcrumbs_name, $extra_routeData) !!}
    </div>

</div>
