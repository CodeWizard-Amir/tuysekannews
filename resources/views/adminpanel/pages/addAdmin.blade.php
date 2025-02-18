@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title','ادمین پنل | اضافه کردن ادمین')

@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">اضافه کردن ادمین</h2>
        <div class="my-5 w-full border-t-2 border-red-500 bg-white p-10">
            <form class="w-full space-y-5 px-10" action="{{route("create.user")}}" method="POST">
                @csrf
                <input name="name" class="w-[48%] shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                    placeholder="نام و نام خانوادگی ادمین را وارد کنید">
                <input name="phone" class="w-[48%] shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                    placeholder="شماره تماس ادمین را وارد کنید">
                <input name="email" class="w-[48%] shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                    placeholder="ایمیل ادمین را وارد کنید">
                <input name="password" class="w-[48%] shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                    placeholder="رمزعبور ادمین را وارد کنید">
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
                        <td class="border-2 text-center p-2 border-gray-300">{{$admin->name}}</td>
                        <td class="border-2 text-center p-2 border-gray-300">{{$admin->phone}}</td>
                        <td class="border-2 text-center p-2 border-gray-300">{{$admin->email}}</td>
                        <td class="border-2 text-center p-2 border-gray-300">{{$admin->status == 0 ? 'غیرفعال' : 'فعال'}}</td>
                        <td class="border text-center flex justify-center items-center p-2 border-gray-300">
                            <a class="p-3 mx-1 flex text-white rounded-md border-2 border-red-300 justify-center items-center bg-red-500"
                                href="">
                                <i class="fa fa-trash"></i>

                            </a>
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
