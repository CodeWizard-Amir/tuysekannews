@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title', 'ادمین پنل | پشتیبانی')
@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">ایمیل های خبرنامه</h2>
        <div class="flex space-x-5 space-x-reverse my-5">
            <div class="!cursor-pointer"><label class="mx-2 !cursor-pointer" for="visited">نمایش دیده شده ها</label><input
                    checked class="!cursor-pointer" type="checkbox" id="visited"></div>
            <div class="!cursor-pointer"><label class="mx-2 !cursor-pointer" for="invisited">نمایش دیده نشده ها</label><input
                    checked class="!cursor-pointer" type="checkbox" id="invisited"></div>
        </div>
        <div id="invisited-supoport-messages" class="my-5 w-full border-t-2 border-green-500 bg-white p-10">
            <table class="w-full border-2 border-gray-200">
                <thead class="border-2 p-4 border-gray-200">
                    <th class="border-2 p-4 border-gray-200">نام و نام خانوادگی</th>
                    <th class="border-2 p-4 border-gray-200">شماره تماس</th>
                    <th class="border-2 p-4 border-gray-200">ایمیل</th>
                    <th class="border-2 p-4 border-gray-200">پیام</th>
                    <th class="border-2 w-[150px] p-4 border-gray-200">عملیات</th>
                </thead>
                <tbody>
                    @foreach ($support as $item)
                        <tr class="odd:bg-gray-100 border-2 border-gray-200">
                            <td class="border-2 text-center p-1 border-gray-200">{{ $item->name }}</td>
                            <td class="border-2 text-center p-1 border-gray-200">{{ $item->phone }}</td>
                            <td class="border-2 text-center p-1 border-gray-200">{{ $item->email }}</td>
                            <td class="border-2 text-center p-1 border-gray-200">
                                <button user-name="{{ $item->name }}" text-content="{{ $item->description }}"
                                    class="bg-pink-500 show-text-message duration-500 text-white hover:bg-pink-800 rounded-sm px-3 py-2">
                                    نمایش
                                </button>
                            </td>
                            <td class=" text-center flex justify-center items-center p-2 !h-full">
                                <form class="hidden deleteBanerForm" method="Post"
                                    action="{{ route('delete.antiquitise', ['id' => $item->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <form class="hidden deleteNewsletterForm" method="Post"
                                    action="{{ route('delete.support', ['id' => $item->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <button
                                    class="p-2 mx-1 deleteFormBtn flex text-white rounded-md border-2 border-red-300 justify-center items-center bg-red-500">
                                    <i class="fa fa-trash"></i>
                                </button>
                                @if ($item->visited == 0)
                                    <form class="deleteNewsletterForm" method="Post"
                                        action="{{ route('update.support', ['id' => $item->id]) }}">
                                        @method('PATCH')
                                        @csrf
                                        <button
                                            class="p-2 mx-1 flex text-white rounded-md border-2 border-sky-300 justify-center items-center bg-sky-500"
                                            href=""> <i class="fa fa-eye"></i>
                                        </button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div id="visited-supoport-messages" class="my-5 w-full border-t-2 border-sky-500 bg-white p-10">
            <table class="w-full border-2 border-gray-200">
                <thead class="border-2 p-4 border-gray-200">
                    <th class="border-2 p-4 border-gray-200">نام و نام خانوادگی</th>
                    <th class="border-2 p-4 border-gray-200">شماره تماس</th>
                    <th class="border-2 p-4 border-gray-200">ایمیل</th>
                    <th class="border-2 p-4 border-gray-200">پیام</th>
                    <th class="border-2 w-[150px] p-4 border-gray-200">عملیات</th>
                </thead>
                <tbody>
                    @foreach ($support_visited as $item)
                        <tr class="odd:bg-gray-100 border-2 border-gray-200">
                            <td class="border-2 text-center p-1 border-gray-200">{{ $item->name }}</td>
                            <td class="border-2 text-center p-1 border-gray-200">{{ $item->phone }}</td>
                            <td class="border-2 text-center p-1 border-gray-200">{{ $item->email }}</td>
                            <td class="border-2 text-center p-1 border-gray-200">
                                <button user-name="{{ $item->name }}" text-content="{{ $item->description }}"
                                    class="bg-pink-500 show-text-message duration-500 text-white hover:bg-pink-800 rounded-sm px-3 py-2">
                                    نمایش
                                </button>
                            </td>
                            <td class=" text-center flex justify-center items-center p-2 !h-full">
                                <form class="hidden deleteBanerForm" method="Post"
                                    action="{{ route('delete.antiquitise', ['id' => $item->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <form class="hidden deleteNewsletterForm" method="Post"
                                    action="{{ route('delete.support', ['id' => $item->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <button
                                    class="p-2 mx-1 deleteFormBtn flex text-white rounded-md border-2 border-red-300 justify-center items-center bg-red-500">
                                    <i class="fa fa-trash"></i>
                                </button>
                                @if ($item->visited == 0)
                                    <form class="deleteNewsletterForm" method="Post"
                                        action="{{ route('update.support', ['id' => $item->id]) }}">
                                        @method('PATCH')
                                        @csrf
                                        <button
                                            class="p-2 mx-1 flex text-white rounded-md border-2 border-sky-300 justify-center items-center bg-sky-500"
                                            href=""> <i class="fa fa-eye"></i>
                                        </button>
                                    </form>
                                @endif

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
        $("#invisited").change(function() {
            if ($(this).prop('checked') == false) {
                $("#invisited-supoport-messages").addClass("!hidden")
            } else {
                $("#invisited-supoport-messages").removeClass("!hidden")

            }
        })
        $("#visited").change(function() {
            if ($(this).prop('checked') == false) {
                $("#visited-supoport-messages").addClass("!hidden")
            } else {
                $("#visited-supoport-messages").removeClass("!hidden")

            }
        })
    </script>
    <script>
        $(".deleteFormBtn").click(function() {
            let DElFrom = $(this).siblings(".deleteNewsletterForm");
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
        $(".show-text-message").click(function() {
            let userName = $(this).attr('user-name')
            let textContent = $(this).attr('text-content')
            Swal.fire({
                title: userName,
                icon: "info",
                text: textContent,
                draggable: true
            });
        })
    </script>
    <script>
        @if (session('deleted_success'))
            Swal.fire({
                icon: 'success',
                title: 'موفقیت‌آمیز!',
                text: 'رکورد با موفقیت حذف شد!',
            });
        @endif
    </script>
@endsection
