$(document).ready(function () {
    // Celebrity Form Validator
    $("#celebrity-form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 255,
            },
            job: {
                required: true,
                maxlength: 255,
            },
            picture: {
                required: true,
                extension: "jpg|jpeg|png|gif",
                maxsize: 1024 * 1024 * 5,
            },
        },
        messages: {
            name: {
                required: "نام شخص برجسته الزامی است",
                maxlength: "حداکثر 255 کاراکتر",
            },
            job: {
                required: "عنوان شغلی الزامی است",
                maxlength: "حداکثر 255 کاراکتر",
            },
            picture: {
                required: "تصویر شخص برجسته الزامی است",
                extension: "فقط پسسوند های jpg|jpeg|png|gif قابل قبول است",
                maxsize: "حداکثر سایز فایل 5مگابایت",
            },
        },
        submitHandler: function (form) {
            let text = $(".ck-content p").text()
            if (text != "") {
                form.submit();
            } else {
                alert("لطفا مقدار درباره تویسرکان رو وارد کنید")
            }
        },
    });
    // End Celebrity Form Validator

    // Baner Form Validator
    $("#baner-form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 255,
            },
            picture: {
                required: true,
                extension: "jpg|jpeg|png",
                maxsize: 1024*1024*5,
            },
        },
        messages: {
            name: {
                required: "توضیحات تصویر الزامی است",
                maxlength: "حداکثر 255 کاراکتر",
            },
            picture: {
                required: "تصویر شخص برجسته الزامی است",
                extension: "فقط پسسوند های jpg|jpeg|png قابل قبول است",
                maxsize: "حداکثر سایز فایل 5مگابایت",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
    //End Baner Form Validator

    // Admin Form Validator
    $("#admin-form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 255,
            },
            phone: {
                required: true,
                maxlength: 11,
                minlength: 11,
                digits: true,
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
                equalTo: "#password",
            },
        },
        messages: {
            name: {
                required: "نام ادمین الزامی است",
                maxlength: "نام حداکثر باید 255 کاراکتر باشد",
            },
            phone: {
                required: "شماره تماس الزامی است",
                maxlength: "شماره تماس حداکثر 11 کاراکتر",
                minlength: "شماره تماس حداقل 11 کاراکتر",
                digits: "شماره تماس حتما باید مقدار عددی باشد",
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
                equalTo: "تکرار پسسورد باید با مقدار پسسورد برابر باشد",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
    //End Admin Form Validator

    // Works Form Validator
    $.validator.addMethod(
        "categoryIDOrcategoryName",
        function (value, element) {
            var category = $("#categoryID").val(); // مقدار select
            var newCategory = $("#categoryName").val(); // مقدار input
            return category != null || newCategory !== ""; // حداقل یکی پر شده باشد
        },
        "لطفا یک دسته‌بندی انتخاب کنید یا نام دسته‌بندی جدید را وارد کنید"
    );
    $("#works-form").validate({
        rules: {
            name: {
                required: true,
                maxlength: 255,
            },
            categoryID: {
                categoryIDOrcategoryName: true,
            },
            categoryName: {
                categoryIDOrcategoryName: true,
                maxlength: 255,
            },
            picture: {
                required: true,
                extension: "jpg|jpeg|png",
                maxsize: 1024 * 1024 * 5,
            },
        },
        messages: {
            name: {
                required: "نام اثر الزامی است",
                maxlength: "حداکثر 255 کاراکتر",
            },
            categoryID: {
                categoryIDOrcategoryName: "دسته بندی اثر الزامی است",
            },
            categoryName: {
                categoryIDOrcategoryName: "نام دسته بندی الزامی است",
                maxlength: "حداکثر 255 کاراکتر",
            },
            picture: {
                required: "تصویر اثر الزامی است",
                extension: "فرمت های قابل قبول jpg|jpeg|png",
                maxsize: "حداکثر سایز تصویر 5 مگابایت",
            },
        },
        submitHandler: function (form) {
            let text = $(".ck-content p").text()
            if (text != "") {
                form.submit();
            } else {
                alert("لطفا مقدار درباره تویسرکان رو وارد کنید")
            }

        },
    });
    //End Works Form Validator

    // News Form Validator
    $.validator.addMethod(
        "newsCategoryIDOrnewsCategoryName",
        function (value, element) {
            var category = $("#newsCategoryID").val(); // مقدار select
            var newCategory = $("#newsCategoryName").val(); // مقدار input
            return category != null || newCategory != ""; // حداقل یکی پر شده باشد
        },
        "لطفا یک دسته‌بندی انتخاب کنید یا نام دسته‌بندی جدید را وارد کنید"
    );
    $("#news-form").validate({
        rules: {
            title: {
                required: true,
                maxlength: 255,
            },
            newsCategoryID: {
                newsCategoryIDOrnewsCategoryName: true,
            },
            newsCategoryName: {
                newsCategoryIDOrnewsCategoryName: true,
                maxlength: 255,
            },
            picture: {
                required: true,
                extension: "jpg|jpeg|png",
                maxsize: 1024 * 1024 * 5,
            },
        },
        messages: {
            title: {
                required: " عنوان خبر الزامی است",
                maxlength: "حداکثر 255 کاراکتر",
            },
            categoryID: {
                categoryIDOrcategoryName: "دسته بندی خبر الزامی است",
            },
            categoryName: {
                categoryIDOrcategoryName: "نام دسته بندی خبر الزامی است",
                maxlength: "حداکثر 255 کاراکتر",
            },
            picture: {
                required: "تصویر خبر الزامی است",
                extension: "فرمت های قابل قبول jpg|jpeg|png",
                maxsize: "حداکثر سایز تصویر 5 مگابایت",
            },
        },
        submitHandler: function (form) {
            let text = $(".ck-content p").text()
            if (text != "") {
                form.submit();
            } else {
                alert("لطفا مقدار درباره تویسرکان رو وارد کنید")
            }
        },
    });
    //End News Form Validator
    $("#galary-form").validate({
        rules: {
            name1: {
                required: true,
                maxlength: 255,
            },
            picture1: {
                required: true,
                extension: "jpg|jpeg|png",
                maxsize: 1024 * 1024 * 5,
            },
        },
        messages: {
            name1: {
                required: "توضیحات تصویر الزامی است",
                maxlength: "حداکثر 255 کاراکتر",
            },

            picture1: {
                required: "تصویر خبر الزامی است",
                extension: "فرمت های قابل قبول jpg|jpeg|png",
                maxsize: "حداکثر سایز تصویر 5 مگابایت",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
});
