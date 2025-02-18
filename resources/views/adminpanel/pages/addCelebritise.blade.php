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
            <form id="celebrity-form" class="w-full space-y-5 flex flex-wrap justify-between px-10" action="{{ route('create.celebrity') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="w-[48%]">
                    <input name="name" class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                        placeholder="نام و نام خانوادگی فرد ">
                </div>
                <div class="w-[48%]">
                    <input name="job" class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200"
                        type="text" placeholder="عنوان شغلی یا اجتماعی(مثلا نویسنده)">
                </div>

                <div class="w-full">
                    <textarea class="w-full mt-10 shadow-sm rounded-sm px-5 py-3 h-96 border border-gray-200" name="description"
                        id="editor" placeholder="درباره شخصیت"></textarea>
                </div>
                <br>
                <br>
                <div class="w-full">
                    <span class="mx-1">تصویر شخصیت برجسته</span>
                    <div
                        class="flex !hidden imgperveiw relative justify-center [&_>svg]:hover:text-purple-800 items-center w-52 h-72 border border-gray-200 shadow-md cursor-pointer rounded-md">
                        <img class="w-full h-full rounded-md" id="preview-img" src="" alt="">
                        <button type="button" id="deletePictureBtn" class="text-red-500 absolute top-0 right-[88%]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                        </button>
                    </div>
                    <label
                        class="lableInput flex  relative justify-center [&_>svg]:hover:text-purple-800 items-center w-52 h-72 border border-gray-200 shadow-md cursor-pointer rounded-md"
                        for="picture">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                    </label>
                    <input class="w-0 h-0 opacity-0 file-input" type="file" name="picture" id="picture">
                </div>

                <button class="mx-1 bg-sky-600 text-white px-3 py-1 rounded-md">ذخیره</button>
            </form>
        </div>
        <div class="my-5 w-full border-t-2 border-green-500 bg-white p-10">
            <table class="w-full border-collapse border-2 border-gray-300">
                <thead class="border-2 p-4 border-gray-300">
                    <th class="border-2 p-4 border-gray-300">تصویر شخصیت</th>
                    <th class="border-2 p-4 border-gray-300">نام و نام خانوادگی</th>
                    <th class="border-2 p-4 border-gray-300">عنوان شغلی یا اجتماعی</th>
                    <th class="border-2 p-4 border-gray-300">درباره شخصیت</th>
                    <th class="border-2 p-4 border-gray-300">عملیات</th>
                </thead>
                <tbody>
                    @foreach ($celebrities as $celebrity)
                        <tr class="odd:bg-gray-100">
                            <td class="border-2 text-center p-2 border-gray-300">
                                <img class="w-14 h-14 !mx-auto rounded-full" src="{{ $celebrity->picture }}" alt="">
                            </td>
                            <td class="border-2 text-center p-2 border-gray-300">{{ $celebrity->name }}</td>
                            <td class="border-2 text-center p-2 border-gray-300">{{ $celebrity->job }}</td>

                            <td class="border-2 text-center p-2 border-gray-300">{!! mb_substr($celebrity->description, 0, 50) !!}</td>
                            <td class=" text-center flex justify-center items-center p-5">
                                <form class="hidden deleteBanerForm" method="Post"
                                    action="{{ route('delete.celebrity', ['id' => $celebrity->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <button
                                    class="p-3 mx-1 deleteFormBtn flex text-white rounded-md border-2 border-red-300 justify-center items-center bg-red-500">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a class="p-3 mx-1 flex text-white rounded-md border-2 border-purple-300 justify-center items-center bg-purple-500"
                                    href=""> <i class="fa fa-edit"></i>
                                </a>
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
    </script>
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
@endsection
