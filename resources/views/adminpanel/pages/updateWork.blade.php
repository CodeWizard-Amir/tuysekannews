@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title', 'ادمین پنل | اضافه کردن اثر')

@section('head')
    <style>
        .ck-placeholder {
            height: 400px !important;
        }
    </style>
@endsection
@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">اضافه کردن آثار</h2>
        <div class="my-5 w-full border-t-2 border-red-500 bg-white p-10">
            <form id="works-update-form" class="w-full flex flex-wrap justify-between space-y-5 px-10"
                action="{{ route('update.antiquitise',['id' => $work->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="w-[65%]">
                    <input value="{{ $work->name }}" name="name" id="name"
                        class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                        placeholder="نام اثر">
                </div>
                <div class="w-[34%] ">
                    <select name="categoryID" id="categoryID"
                        class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200">
                        <option value="0">دسته بندی اثر</option>
                        @foreach ($categoryItems as $item)
                            @if ($item->categoryID == $work->categoryID)
                                <option selected value="{{ $item->categoryID }}">{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->categoryID }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="flex w-full  py-5 justify-between items-center">
                    <div class="flex w px-5 w-[30%]  items-center">
                        <label class="cursor-pointer" for="checkCategory">در صورت نبودن دسته بندی در مقادیر کلیک
                            کنید</label>
                        <input class="mx-2 !cursor-pointer" type="checkbox" name="checkCategory" id="checkCategory">
                    </div>
                    <div class="w-[64%]">
                        <input id="categoryName" name="categoryName"
                            class="w-full mx-2 hidden shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                            placeholder="دسته بندی را وارد کنید">
                    </div>
                </div>
                <div class="w-full">
                    <textarea class="!w-full mt-10 shadow-sm rounded-sm px-5 py-3 h-96 border border-gray-200" name="description"
                        id="editor" placeholder="درباره اثر">{{ $work->description }}</textarea>
                </div>
                <div class="w-full my-2">
                    <span class="my-2 mx-1">تصویر اثر</span>
                    <div
                        class="flex  imgperveiw relative justify-center [&_>svg]:hover:text-purple-800 items-center w-52 h-72 border border-gray-200 shadow-md cursor-pointer rounded-md">
                        <img class="w-full h-full rounded-md" id="preview-img"
                            src="{{ url('/') }}/{{ $work->picture }}" alt="">
                        <button type="button" id="deletePictureBtn" class="text-red-500 absolute top-0 right-[88%]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                        </button>
                    </div>
                    <label
                        class="lableInput flex !hidden  relative justify-center [&_>svg]:hover:text-purple-800 items-center w-52 h-72 border border-gray-200 shadow-md cursor-pointer rounded-md"
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
        ClassicEditor
            .create(document.querySelector('#editor'), {
                language: 'fa'
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
        $("#checkCategory").change(() => {
            if ($("#checkCategory").prop('checked') == true) {
                $("#categoryName").removeClass("hidden")
                $("#categoryID").attr("disabled", true)
                $("#categoryID").addClass("!text-gray-300")
            } else {
                $("#categoryName").addClass("hidden")
                $("#categoryID").attr("disabled", false)
                $("#categoryID").removeClass("!text-gray-300")


            }
        })
    </script>
    <script>
        $.validator.addMethod("categoryIDOrcategoryNameUpdate", function(value, element) {
            var category = $("#categoryID").val(); // مقدار select
            var newCategory = $("#categoryName").val(); // مقدار input
            return category != 0 || newCategory !== ""; // حداقل یکی پر شده باشد
        }, "لطفا یک دسته‌بندی انتخاب کنید یا نام دسته‌بندی جدید را وارد کنید");
        $("#works-update-form").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 255,
                },
                categoryID: {
                    categoryIDOrcategoryNameUpdate: true,
                },
                categoryName: {
                    categoryIDOrcategoryNameUpdate: true,
                    maxlength: 255,
                },
            },
            messages: {
                name: {
                    required: "نام اثر الزامی است",
                    maxlength: "حداکثر 255 کاراکتر",
                },
                categoryID: {
                    categoryIDOrcategoryNameUpdate: "دسته بندی اثر الزامی است",
                },
                categoryName: {
                    categoryIDOrcategoryNameUpdate: "نام دسته بندی الزامی است",
                    maxlength: "حداکثر 255 کاراکتر",
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
        });
    </script>
@endsection
