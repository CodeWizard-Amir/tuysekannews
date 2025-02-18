@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title','ادمین پنل | اضافه کردن بنر')

@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">اضافه کردن ادمین</h2>
        <div class="my-5 w-full border-t-2 border-red-500 bg-white p-10">
            <form class="w-full space-y-5 px-10" action="{{ route('create.baner') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input name="name" class="w-[48%]  shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                    placeholder="توضیحاتی کوتاه درباره تصویر (حداکثر 255کاراکتر)">
                <input title="لینکی که وارد میکنید میشود ادرس این تصویر تا زمان کلیک بر روی ان به ان ادرس برود"
                    name="link" class="w-[48%] shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                    placeholder="لینک تصویر (در صورت وجود)">
                <br>
                <br>
                <span class="mx-1">تصویر بنر </span>

                <div
                    class="flex !hidden imgperveiw relative justify-center [&_>svg]:hover:text-purple-800 items-center w-full h-96 border border-gray-200 shadow-md cursor-pointer rounded-md">
                    <img class="w-full h-full rounded-md" id="preview-img" src="" alt="">
                    <button type="button" id="deletePictureBtn" class="text-red-500 absolute top-0 right-[98%]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                    </button>
                </div>
                <label
                    class="lableInput flex  relative justify-center [&_>svg]:hover:text-purple-800 items-center w-full h-96 border border-gray-200 shadow-md cursor-pointer rounded-md"
                    for="picture">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </label>
                <input class="hidden file-input" type="file" name="picture" id="picture">
                <button class="mx-1 bg-sky-600 text-white px-3 py-1 rounded-md">ذخیره</button>
            </form>
        </div>
        <div class="my-5 w-full border-t-2 border-green-500 bg-white p-10">
            <table class="w-full border-2 border-gray-300">
                <thead class="border-2 p-4 border-gray-300">
                    <th class="border-2 p-4 border-gray-300">درباره تصویر</th>
                    <th class="border-2 p-4 border-gray-300">تصویر بنر</th>
                    <th class="border-2 p-4 border-gray-300">لینک تصویر</th>
                    <th class="border-2 p-4 border-gray-300">عملیات</th>
                </thead>
                <tbody>
                    @foreach ($baners as $baner)
                        <tr class="odd:bg-gray-100 border-2 border-gray-300">
                            <td class="border-2 text-center p-2 border-gray-300">{{ $baner->name }}</td>
                            <td class=" flex justify-center items-center text-center p-2"><img class="w-24 h-12"
                                    src="{{ $baner->picture }}" alt=""></td>
                            <td class="border-2 text-center p-2 border-gray-300"><a class="text-blue-500"
                                    href="{{ $baner->link != 'nothing' ? $baner->link : '#' }}">لینک</a></td>
                            <td class=" text-center flex !justify-center !items-center p-2">
                                <form class="hidden deleteBanerForm" method="Post"
                                    action="{{ route('delete.baner', ['id' => $baner->id]) }}">
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
