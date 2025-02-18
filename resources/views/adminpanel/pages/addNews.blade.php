@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title', ' ادمین پنل | اضافه کردن خبر')

@section('head')
    <style>
        .ck-placeholder {
            height: 400px !important;
        }
    </style>
@endsection
@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">اضافه کردن خبر</h2>
        <div class="my-5 w-full border-t-2 border-red-500 bg-white p-10">
            <form id="news-form" class="w-full flex flex-wrap justify-between space-y-5 px-10"
                action="{{ route('create.news') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-full">
                    <input name="title" id="title" class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200"
                        type="text" placeholder="عنوان خبر (حداکثر 255 کاراکتر)">
                </div>
                <div class="w-full">
                    <select name="newsCategoryID" id="categoryIDSelect"
                        class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200">
                        <option value="0" disabled selected>دسته بندی خبر</option>
                        @foreach ($newsCategory as $item)
                            <option value="{{ $item->newsCategoryID }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex w-full py-5 items-center">
                    <div class="flex w-fit px-5  items-center">
                        <label class="cursor-pointer" for="checkCategory">در صورت نبودن دسته بندی در مقادیر کلیک
                            کنید</label>
                        <input class="mx-2 !cursor-pointer" type="checkbox" name="checkCategory" id="checkCategory">
                    </div>
                    <div class="w-3/5 ">
                        <input id="newsCategoryName" name="newsCategoryName"
                            class="w-full mx-2 hidden shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                            placeholder="دسته بندی را وارد کنید">
                    </div>
                </div>
                <div class="w-full">
                    <textarea class="w-full mt-10 shadow-sm rounded-sm px-5 py-3 h-96 border border-gray-200" name="description"
                        id="editor" placeholder="متن خبر"></textarea>
                </div>
                <div class="w-full py-2">
                    <span class="mx-1">تصویر اصلی خبر</span>
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
            <table class="w-full border-2 border-gray-300">
                <thead class="border-2 p-4 border-gray-300">
                    <th class="border-2 p-4 border-gray-300">تصویر</th>
                    <th class="border-2 p-4 border-gray-300">عنوان خبر</th>
                    <th class="border-2 p-4 border-gray-300">متن خبر</th>
                    <th class="border-2 p-4 border-gray-300">دسته بندی خبر</th>
                    <th class="border-2 p-4 border-gray-300">عملیات</th>
                </thead>
                <tbody>
                    @foreach ($newses as $news)
                        <tr class="odd:bg-gray-100">
                            <td class="border-2 text-center p-2 border-gray-300">
                                <img class="w-14 h-14 rounded-full !mx-auto" src="{{ url('/') }}/{{ $news->picture }}"
                                    alt="">
                            </td>
                            <td class="border-2 text-center p-2 border-gray-300">{{ $news->title }}</td>
                            <td class="border-2 text-center p-2 border-gray-300">{!! mb_substr($news->description, 0, 50) !!}</td>

                            <td class="border-2 text-center p-2 border-gray-300">{{ $news->newsCategoryID }}</td>
                            <td class="border text-center flex justify-center items-center p-5 border-gray-300">
                                <form class="hidden deleteBanerForm" method="Post"
                                    action="{{ route('delete.news', ['id' => $news->id]) }}">
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
        $("#checkCategory").change(() => {
            if ($("#checkCategory").prop('checked') == true) {
                $("#newsCategoryName").removeClass("hidden")
                $("#categoryIDSelect").attr("disabled", true)
                $("#categoryIDSelect").addClass("!text-gray-300")
            } else {
                $("#newsCategoryName").addClass("hidden")
                $("#categoryIDSelect").attr("disabled", false)
                $("#categoryIDSelect").removeClass("!text-gray-300")


            }
        })
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                language: 'fa' // تنظیم زبان به فارسی  
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
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
@endsection
