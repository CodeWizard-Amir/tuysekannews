@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title', 'ادمین پنل | درباره تویسرکان')
@section('head')
    <style>
        .ck-placeholder {
            height: 400px !important;
        }
    </style>
@endsection
@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">درباره تویسرکان</h2>
        <div class="my-5 w-full border-t-2 border-red-500 bg-white p-10">
            <form id="about-form" class="w-full space-y-5 px-10"
                action="{{ $data_of_about ? route('update.about', ['id' => $data_of_about->id]) : route('create.about') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (!empty($data_of_about))
                    @method('PATCH')
                @endif
                <textarea class="w-full cke mt-10 shadow-sm rounded-sm px-5 py-3 h-96 border border-gray-200" name="about"
                    id="about" placeholder="متن درباره تویسرکان">{{ $data_of_about ? $data_of_about->about : null }}</textarea>
                <button type="button" id="submitBtn"
                    class="mx-1 bg-sky-600 text-white px-3 py-1 rounded-md">{{ $data_of_about ? 'اپدیت کردن' : 'ذخیره' }}</button>
            </form>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('.cke'), {
                language: 'fa' // تنظیم زبان به فارسی  
            })
    </script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'موفقیت‌آمیز!',
                text: '{{ session('success') }}',
            });
        @endif
    </script>

@endsection
