@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title', 'ادمین پنل | اضافه کردن ادمین')

@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">بروزرسانی  ادمین</h2>
        <div class="my-5 w-full border-t-2 border-red-500 bg-white p-10">
            <form id="admin-form" class="w-full flex flex-wrap justify-between space-y-5 px-10"
                action="{{ route('update.user',['id'=>$user->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="w-[48%]">
                    <input value="{{$user->name}}" name="name" id="name" class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200"
                        type="text" placeholder="نام و نام خانوادگی ادمین را وارد کنید">
                </div>
                <div class="w-[48%] ">
                    <input value="{{$user->phone}}" name="phone" id="phone"
                        class="w-full shadow-sm rounded-sm px-5 py-3 border border-gray-200" type="text"
                        placeholder="شماره تماس ادمین را وارد کنید">
                </div>
                <div class="w-full">
                    <input  value="{{$user->email}}" name="email" id="email"
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
                <button class="mx-1 bg-sky-600 text-white px-3 py-1 rounded-md">بروزرسانی</button>
            </form>
        </div>
    </section>
@endsection
@section('scripts')

@endsection
