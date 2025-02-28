@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title', 'ادمین پنل | اضافه کردن مشاهیر')

@section('head')
    <style>
        .ck-placeholder {
            height: 400px !important;
        }
    </style>
@endsection
@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">اضافه کردن مشاهیر</h2>
        <div class="my-5 w-full border-t-2 border-red-500 bg-white p-10">
            <form id="celebrity-form-update" class="w-full space-y-5 flex flex-wrap justify-between px-10"
                action="{{ route('update.celebrity', ['id' => $celebrity->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="w-[48%]">
                    <input name="name" value="{{ $celebrity->name }}"
                        class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                        placeholder="نام و نام خانوادگی فرد ">
                </div>
                <div class="w-[48%]">
                    <input name="job" value="{{ $celebrity->job }}"
                        class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                        placeholder="عنوان شغلی یا اجتماعی(مثلا نویسنده)">
                </div>

                <div class="w-full">
                    <textarea class="w-full mt-10  shadow-sm rounded-sm px-5 py-3 h-96 border border-gray-200" name="description"
                        id="editor" placeholder="درباره شخصیت">{!! $celebrity->description !!}</textarea>
                </div>
                <br>
                <br>
                <div class="w-full">
                    <span class="mx-1">تصویر شخصیت برجسته</span>
                    <div
                        class="!flex imgperveiw relative justify-center [&_>svg]:hover:text-purple-800 items-center w-52 h-72 border border-gray-200 shadow-md cursor-pointer rounded-md">
                        <img class="w-full h-full rounded-md" id="preview-img"
                            src="{{ url('/') }}/{{ $celebrity->picture }}" alt="">
                        <button type="button" id="deletePictureBtn" class="text-red-500 absolute top-0 right-[88%]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                        </button>
                    </div>
                    <label
                        class="lableInput !hidden flex  relative justify-center [&_>svg]:hover:text-purple-800 items-center w-52 h-72 border border-gray-200 shadow-md cursor-pointer rounded-md"
                        for="picture">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                    </label>
                    <input class="w-0 h-0 opacity-0 file-input" type="file" name="picture" id="picture">
                </div>

                <button class="mx-1 bg-sky-600 text-white px-3 py-1 rounded-md">بروزرسانی</button>
            </form>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $("#celebrity-form-update").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 255,
                },
                job: {
                    required: true,
                    maxlength: 255,
                },
            },
            messages: {
                name: {
                    required: "نام شخص برجسته الزامی است",
                    maxlength: "حداکثر 255 کاراکتر",
                },
                job: {
                    required: "عنوان شغلی الزامی است",
                    maxlength: "حداکثر 255 کاراکتر",
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                language: 'fa' // تنظیم زبان به فارسی  
            })
    </script>
    <script>
        $('.file-input').change(function(e) {
            var file = e.target.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview-img').attr('src', e.target.result);
                    $('#image-preview').show();
                    $(".lableInput").addClass("!hidden")
                    $(".imgperveiw").removeClass("!hidden")
                }
                reader.readAsDataURL(file);
            } else {
                $(".lableInput").removeClass("!hidden")
                $(".imgperveiw").addClass("!hidden")
            }
            $('#deletePictureBtn').click(function() {
                $('.file-input').val('');
                $(".lableInput").removeClass("!hidden")
                $(".imgperveiw").addClass("!hidden")
            });
        });
        $('#deletePictureBtn').click(function() {
            $('.file-input').val('');
            $(".lableInput").removeClass("!hidden")
            $(".imgperveiw").addClass("!hidden")
        });
    </script>
    <script>

    </script>
@endsection
