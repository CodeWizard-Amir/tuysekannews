@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title', 'ادمین پنل | اضافه کردن ادمین')

@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">اضافه کردن ادمین</h2>
        <div class="my-5 w-full border-t-2 border-red-500 bg-white p-10">
            <form id="admin-form" class="w-full flex flex-wrap justify-between space-y-5 px-10"
                action="{{ route('create.user') }}" method="POST">
                @csrf
                <div class="w-[48%]">
                    <input name="name" id="name" class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200"
                        type="text" placeholder="نام و نام خانوادگی ادمین را وارد کنید">
                </div>
                <div class="w-[48%] ">
                    <input name="phone" id="phone"
                        class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                        placeholder="شماره تماس ادمین را وارد کنید">
                </div>
                <div class="w-full">
                    <input name="email" id="email"
                        class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                        placeholder="ایمیل ادمین را وارد کنید">
                </div>
                <div class="w-[48%]">
                    <input name="password" id="password"
                        class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                        placeholder="رمزعبور ادمین را وارد کنید">
                </div>
                <div class="w-[48%]">
                    <input name="password_confirm" id="password_confirm"
                        class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                        placeholder="تکرار رمزعبور ادمین را وارد کنید ">
                </div>
                <div class="w-full px-2 flex items-center">
                    <label for="active">فعال بودن ادمین</label>
                    <input name="status" class="mx-1" type="checkbox" checked name="active" id="active">
                </div>
                <button class="mx-1 bg-sky-600 text-white px-3 py-1 rounded-md">ذخیره</button>
            </form>
        </div>
        <div class="my-5 w-full border-t-2 border-green-500 bg-white p-10">
            <table class="w-full border-2 border-gray-300">
                <thead class="border-2 p-4 border-gray-300">
                    <th class="border-2 p-4 border-gray-300">نام و نام خانوادگی</th>
                    <th class="border-2 p-4 border-gray-300">شماره تماس</th>
                    <th class="border-2 p-4 border-gray-300">ایمیل</th>
                    <th class="border-2 p-4 border-gray-300">وضعیت ادمین</th>
                    <th class="border-2 p-4 border-gray-300">عملیات</th>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr class="odd:bg-gray-100">
                            <td class="border-2 text-center p-2 border-gray-300">{{ $admin->name }}</td>
                            <td class="border-2 text-center p-2 border-gray-300">{{ $admin->phone }}</td>
                            <td class="border-2 text-center p-2 border-gray-300">{{ $admin->email }}</td>
                            <td class="border-2 text-center p-2 border-gray-300">
                                {{ $admin->status == 0 ? 'غیرفعال' : 'فعال' }}</td>
                            <td class="border text-center flex justify-center items-center p-2 border-gray-300">
                                <form class="hidden deleteBanerForm" method="Post"
                                    action="{{ route('delete.user', ['id' => $admin->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <button
                                    class="p-2 mx-1 deleteFormBtn flex text-white rounded-md border-2 border-red-300 justify-center items-center bg-red-500">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a class="p-2 mx-1 flex text-white rounded-md border-2 border-purple-300 justify-center items-center bg-purple-500"
                                    href="{{ route('update.show.users', ['id' => $admin->id]) }}"> <i class="fa fa-edit"></i>
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
        @if (session('updated_success'))
            Swal.fire({
                icon: 'success',
                title: 'موفقیت‌آمیز!',
                text: 'بروزرسانی با موفقیت انجام شد',
            });
        @endif
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
