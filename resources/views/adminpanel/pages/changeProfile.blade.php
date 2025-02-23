<!DOCTYPE html>
<html lang="fa-ir" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/globalStyles.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>تعغیر پروفایل</title>
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">

    <div class="relative p-10 bg-white rounded-2xl shadow-lg max-w-lg w-full">
        <!-- Decorative Background -->
        <div class="absolute inset-0 -z-10 transform rotate-6 bg-orange-900 rounded-2xl"></div>
        <div class="flex justify-between items-center">

            <h2 class="text-xl font-semibold text-gray-800">
                تعغیر پروفایل
            </h2>
            <a class="text-blue-500 flex hover:text-blue-800 duration-500 justify-center items-center text-xs"
                href="{{ route('show.baner') }}">
                برگشت
                <i class="	fa fa-long-arrow-left mx-1"></i>
            </a>
        </div>

        <form id="admin-form-update" enctype="multipart/form-data" method="POST" action="{{ route('update.own.user') }}"
            class="mt-5 space-y-4">
            @csrf
            @method('PATCH')
            <div>
                <label class="block text-xs m-2 font-medium text-gray-700">نام و نام خانوادگی</label>
                <input type="text" name="name" id="name" value="{{ auth()->user()?->name }}"
                    class="w-full mt-1 p-3 border rounded-md focus:ring-2 focus:ring-orange-900 outline-none">
            </div>

            <div>
                <label class="block text-xs m-2 font-medium text-gray-700">ایمیل</label>
                <input type="email" name="email" id="email" value="{{ auth()->user()?->email }}"
                    class="w-full mt-1 p-3 border rounded-md focus:ring-2 focus:ring-orange-900 outline-none">
            </div>

            <div>
                <label class="block text-xs m-2 font-medium text-gray-700">شماره تماس</label>
                <input type="text" name="phone" id="phone" value="{{ auth()->user()?->phone }}"
                    class="w-full mt-1 p-3 border rounded-md focus:ring-2 focus:ring-orange-900 outline-none">
            </div>
            <div>
                <span class="block text-xs m-2 font-medium text-gray-700">تصویر پروفایل</span>
                <div class="flex justify-between items-center">
                    <div
                        class="flex !hidden imgperveiw relative justify-center [&_>svg]:hover:text-purple-800 items-center w-20 h-20 rounded-full border border-gray-200 shadow-md cursor-pointer">
                        <img class="w-full h-full rounded-full" id="preview-img" src="" alt="">
                        <button type="button" id="deletePictureBtn" class="text-red-500 absolute top-0 right-[88%]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                        </button>
                    </div>
                    <label
                        class="lableInput flex  relative justify-center [&_>svg]:hover:text-purple-800 items-center w-20 h-20 rounded-full border border-gray-200 shadow-md cursor-pointer"
                        for="picture">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </label>
                    <input class="w-0 h-0 opacity-0 file-input" type="file" name="picture" id="picture">
                </div>

            </div>

            <div>
                <label class="block text-xs m-2 font-medium text-gray-700">پسوورد</label>
                <input name="password" id="password"
                    type="text"class="w-full mt-1 p-3 border rounded-md focus:ring-2 focus:ring-orange-900 outline-none">
            </div>
            <div>
                <label class="block text-xs m-2 font-medium text-gray-700">تکرار پسسورد</label>
                <input name="password_confirm" id="password_confirm"
                    type="text"class="w-full mt-1 p-3 border rounded-md focus:ring-2 focus:ring-orange-900 outline-none">
            </div>

            <button type="submit"
                class="w-full py-3 text-white hover:bg-orange-800 bg-orange-900 rounded-md duration-500 transition">
                ذخیره
            </button>
        </form>
    </div>
    <script src="{{ url('/') }}/assets/js/jQuery.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

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
        $(document).ready(function () {
            

        $("#admin-form-update").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 255,
                },
                picture: {
                required: true,
                extension: "jpg|jpeg|png",
                maxsize: 1024*1024*2,
            },
                phone: {
                    required: true,
                    maxlength: 11,
                    minlength: 11,
                    digits: true
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    maxlength: 12,
                },
                password_confirm: {
                    required: true,
                    maxlength: 12,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "نام ادمین الزامی است",
                    maxlength: "نام حداکثر باید 255 کاراکتر باشد",
                },
                picture: {
                required: "تصویر پروفایل الزامی است",
                extension: "فقط پسسوند های jpg|jpeg|png قابل قبول است",
                maxsize: "حداکثر سایز فایل 2 مگابایت",
            },
                phone: {
                    required: "شماره تماس الزامی است",
                    maxlength: "شماره تماس حداکثر 11 کاراکتر",
                    minlength: "شماره تماس حداقل 11 کاراکتر",
                    digits: "شماره تماس حتما باید مقدار عددی باشد"
                },
                email: {
                    required: "ایمیل ادمین الزامی است",
                    email: "لطفا یک ایمیل معتبر وارد کنید!",
                },
                password: {
                    required: "پسسورد ادمین الزامی است !",
                    maxlength: "پسسورد حداکثر 12 کاراکتر",
                },
                password_confirm: {
                    required: "تکرار پسسورد الزامی است",
                    maxlength: "پسسورد حداقل 12 کاراکتر",
                    equalTo: "تکرار پسسورد باید با مقدار پسسورد برابر باشد"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
        </script>
</body>

</html>
