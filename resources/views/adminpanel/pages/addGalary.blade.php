@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title', 'ادمین پنل | گالری تصاویر')

@section('head')
    <style>
        .ck-placeholder {
            height: 400px !important;
        }
    </style>
@endsection
@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">اضافه کردن گالری تصاویر</h2>
        <div class="my-5 w-full border-t-2 border-red-500 bg-white p-10">
            <form id="galary-form" class="w-full space-y-5 px-10" action="{{ route('create.galary') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input id="count" type="hidden" value="1" name="count" class="hidden">
                <div id="fieldBox" class="flex  justify-between items-center flex-wrap w-full">
                    <div class="flex flex-col justify-between w-[30%] items-center">
                        <div class="w-full">
                            <input name="name1"
                                class="w-full my-2 text-xs shadow-sm rounded-sm px-5 py-3 border border-gray-200"
                                type="text" placeholder="توضیحاتی کوتاه درباره تصویر (حداکثر 255کاراکتر)">
                        </div>
                        <div class="w-full">
                            <div
                                class="flex !hidden imgperveiw relative justify-center [&_>svg]:hover:text-purple-800 items-center w-full h-52 border border-gray-200 shadow-md cursor-pointer rounded-md">
                                <img class="w-full h-full rounded-md" id="preview-img" src="" alt="">
                                <button type="button" class="text-red-500 deletePictureBtn absolute top-0 right-[93%]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </button>
                            </div>
                            <label
                                class="lableInput flex  relative justify-center [&_>svg]:hover:text-purple-800 items-center w-full h-52  border border-gray-200 shadow-md cursor-pointer rounded-md"
                                for="picture1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </label>
                            <input class="w-0 h-0 opacity-0  file-input" type="file" name="picture1" id="picture1">
                        </div>
                    </div>

                </div>


                <button type="button" id="increseField" class="mx-1 bg-yellow-500 text-white px-3 py-1 rounded-md">اضافه
                    کردن فیلد</button>
                <button class="mx-1 bg-sky-600 text-white px-3 py-1 rounded-md">ذخیره</button>
            </form>
        </div>
        <div class="my-5 w-full border-t-2 border-green-500 bg-white p-10">
            <table class="w-full border-2 border-gray-300">
                <thead class="border-2 p-4 border-gray-300">
                    <th class="border-2 !w-fit  p-4 border-gray-300">تصویر</th>
                    <th class="border-2 !w-fit  p-4 border-gray-300">توضیحات تصویر</th>
                    <th class="border-2  !w-fit p-4 border-gray-300">عملیات</th>
                </thead>
                <tbody>
                    @foreach ($galary as $item)
                        <tr class="odd:bg-gray-100 border-2 border-gray-200">
                            <td class="border-2 text-center  p-2 border-gray-300"><img
                                    class="h-14 !mx-auto w-14 rounded-full" src="{{ url('/') }}/{{ $item->picture }}">
                            </td>
                            <td class="border-2 text-center p-2 border-gray-300">{{ mb_substr($item->name, 0, 70) }}</td>
                            <td class=" text-center flex justify-center items-center p-5">
                                <form class="hidden deleteBanerForm" method="Post"
                                    action="{{ route('delete.galary', ['id' => $item->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <button
                                    class="p-3 mx-1 deleteFormBtn flex text-white rounded-md border-2 border-red-300 justify-center items-center bg-red-500">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(".deleteFormBtn").click(function() {
            let DElFrom = $(this).siblings(".deleteBanerForm");
            Swal.fire({
                title: "آیا از حذف اطمینان دارید؟",
                text: "این عمل قابل بازگشت نخواهد بود",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "لغو",
                confirmButtonText: "بله ، حذفش کن"
            }).then((result) => {
                if (result.isConfirmed) {
                    DElFrom.submit();
                }
            });
        })
    </script>
    <script>
        let count = Number($("#count").val())

        $("#increseField").click(() => {
            count++
            $("#count").val(count)
            var newFieldElement = `
                    <div class="flex flex-col justify-between w-[30%] items-center">
                        <div class="w-full">
                    <input name="name${count}"
                        class="w-full name${count} my-2 text-xs shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                        placeholder="توضیحاتی کوتاه درباره تصویر (حداکثر 255کاراکتر)">
                        </div>
                    <div class="w-full">
                        <div
                            class="flex !hidden imgperveiw relative justify-center [&_>svg]:hover:text-purple-800 items-center w-full h-52 border border-gray-200 shadow-md cursor-pointer rounded-md">
                            <img class="w-full h-full rounded-md" id="preview-img" src="" alt="">
                            <button type="button"
                                class="text-red-500 deletePictureBtn absolute top-0 right-[93%]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </button>
                        </div>
                        <label
                            class="lableInput flex  relative justify-center [&_>svg]:hover:text-purple-800 items-center w-full h-52  border border-gray-200 shadow-md cursor-pointer rounded-md"
                            for="picture${count}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                        </label>
                        <input class="w-0 picture${count} h-0 opacity-0 file-input"  type="file" name="picture${count}" id="picture${count}">
                    </div>
                </div>`
            $("#fieldBox").append(newFieldElement)
            // ----------------------------------------------
            $(`.name${count}`).rules("add", {
                required: true,
                maxlength: 255,

                messages: {
                    required: "لطفا یک اسم انتخاب کنید",
                    maxlength: "حداکثر 255 کاراکتر",
                }
            });
            $(`.picture${count}`).rules("add", {
                required: true,
                extension: "jpg|jpeg|png",
                maxsize: 1024 * 1024 * 5,
                messages: {
                    required: "تصویر خبر الزامی است",
                    extension: "فرمت های قابل قبول jpg|jpeg|png",
                    maxsize: "حداکثر سایز تصویر 5 مگابایت",
                }
            });
            // ----------------------------------------------------------
            $('.file-input').change(function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();

                    let imgprp = $(this).siblings(".imgperveiw").children("#preview-img")
                    let imgperbox = $(this).siblings(".imgperveiw")
                    let lableInput = $(this).siblings(".lableInput")
                    reader.onload = function(e) {
                        console.log(imgprp)
                        imgprp.attr('src', e.target.result);
                        lableInput.addClass("!hidden")
                        imgperbox.removeClass("!hidden")
                    }
                    reader.readAsDataURL(file);
                } else {
                    lableInput.removeClass("!hidden")
                    imgperbox.addClass("!hidden")
                }
                $('.deletePictureBtn').click(function(e) {

                    $(this).parents(".imgperveiw").siblings(".file-input").val('');
                    $(this).parents(".imgperveiw").siblings(".lableInput").removeClass("!hidden")
                    $(this).parents(".imgperveiw").addClass("!hidden")
                });
            });


        })
    </script>
    <script>
        $('.file-input').change(function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();

                let imgprp = $(this).siblings(".imgperveiw").children("#preview-img")
                let imgperbox = $(this).siblings(".imgperveiw")
                let lableInput = $(this).siblings(".lableInput")
                reader.onload = function(e) {
                    imgprp.attr('src', e.target.result);
                    lableInput.addClass("!hidden")
                    imgperbox.removeClass("!hidden")
                }
                reader.readAsDataURL(file);
            } else {
                lableInput.removeClass("!hidden")
                imgperbox.addClass("!hidden")
            }
            $('.deletePictureBtn').click(function(e) {
                $(this).parents(".imgperveiw").siblings(".file-input").val('');
                $(this).parents(".imgperveiw").siblings(".lableInput").removeClass("!hidden")
                $(this).parents(".imgperveiw").addClass("!hidden")
            });
        });
    </script>
    <script>
        @if (session('added_success'))
            Swal.fire({
                icon: 'success',
                title: 'موفقیت‌آمیز!',
                text: 'رکورد با موفقیت ایجاد شد!',
            });
        @endif
        @if (session('deleted_success'))
            Swal.fire({
                icon: 'success',
                title: 'موفقیت‌آمیز!',
                text: 'رکورد با موفقیت حذف شد!',
            });
        @endif
    </script>
@endsection
