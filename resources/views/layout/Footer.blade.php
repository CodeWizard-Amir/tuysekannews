<footer class="bg-orange-950 !text-white">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1"
            d="M0,96L14.1,96C28.2,96,56,96,85,80C112.9,64,141,32,169,64C197.6,96,226,192,254,218.7C282.4,245,311,203,339,186.7C367.1,171,395,181,424,186.7C451.8,192,480,192,508,192C536.5,192,565,192,593,181.3C621.2,171,649,149,678,144C705.9,139,734,149,762,170.7C790.6,192,819,224,847,213.3C875.3,203,904,149,932,144C960,139,988,181,1016,192C1044.7,203,1073,181,1101,144C1129.4,107,1158,53,1186,64C1214.1,75,1242,149,1271,170.7C1298.8,192,1327,160,1355,149.3C1383.5,139,1412,149,1426,154.7L1440,160L1440,0L1425.9,0C1411.8,0,1384,0,1355,0C1327.1,0,1299,0,1271,0C1242.4,0,1214,0,1186,0C1157.6,0,1129,0,1101,0C1072.9,0,1045,0,1016,0C988.2,0,960,0,932,0C903.5,0,875,0,847,0C818.8,0,791,0,762,0C734.1,0,706,0,678,0C649.4,0,621,0,593,0C564.7,0,536,0,508,0C480,0,452,0,424,0C395.3,0,367,0,339,0C310.6,0,282,0,254,0C225.9,0,198,0,169,0C141.2,0,113,0,85,0C56.5,0,28,0,14,0L0,0Z">
        </path>
    </svg>
    {{-- -------------------------------------------------------------------------- --}}
    <section class="flex flex-col lg:flex-row justify-center">
        <div class="flex flex-col p-5 lg:p-0 mx-0 lg:mx-24">
            <h2 class="text-xl my-4">دسترسی سریع</h2>
            <ul
                class="space-y-3 hover:[&_>li>a]:text-amber-400 [&_>li>a]:duration-200 hover:[&_>li>a]:pr-1  text-[14px]">
                <li><a href="{{route('websitepages.News')}}">اخرین اخبار</a></li>
                <li>
                    <p class="cursor-pointer duration-200 hover:pr-1 hover:text-amber-400" id="Support">پشتیبانی</p>
                </li>
                <li><a href="{{route('websitepages.About')}}">درباره تویسرکان</a></li>
            </ul>
        </div>
        {{-- ---------------------------------- --}}
        <div class="mx-0 flex flex-col justify-center items-center lg:mx-24">
            <h2 class="text-xl my-4">عضویت در خبرنامه</h2>
            <div class="flex w-[400px] justify-center">
                <form class="flex w-[350px] newsletter-form  md:w-[400px]" id="NewsLetterAjaxForm"
                    method="POST" action="{{ route('create.newsletter') }}">
                    @csrf
                    <div class=" w-[88%]">
                        <input class="py-4 w-full outline-none text-black  rounded-r-xl px-5" type="text"
                            name="email" placeholder="ایمیل خود را وارد کنید" id="email">
                    </div>
                    <button
                        class="bg-red-800 w-[10%] !max-h-20 h-14 px-6 hover:bg-red-500 rounded-l-xl text-white font-bold flex justify-center items-center"><i
                            class="fa fa-arrow-left	"></i>
                    </button>
                </form>
            </div>
        </div>
        {{-- ----------------------------------- --}}
        <div class="mx-0 flex flex-col items-center lg:mx-24">
            <h2 class="text-xl my-4">شبکه های اجتماعی</h2>
            <div class="flex justify-between w-fit space-x-1 space-x-reverse">
                <a href="#" class="w-12 h-12 rounded-full flex justify-center items-center">
                    <i class="fab fa-instagram text-3xl hover:text-orange-400 text-orange-500"></i>
                </a>
                <a href="#" class="w-12 h-12 rounded-full flex justify-center items-center">
                    <i class="fab fa-telegram text-3xl hover:text-sky-300 text-sky-500"></i>
                </a>
            </div>
        </div>
    </section>
    <div class="w-full flex border-t-2 mt-10 border-orange-600 p-4  justify-center items-center">
        <button id="programer-bio" class="hover:text-orange-100 duration-500">طراح و برنامه نویس امیرسجاد نوری</button>
        <a class="mt-1 mx-2 text-xl text-orange-500 hover:text-orange-400" href="https://instagram.com/amirsajjad_nouri"><i class="fab fa-instagram"></i></a>
        <a class="mt-1  text-xl text-green-500 hover:text-green-400" href="https://github.com/CodeWizard-Amir"><i class="fab fa-github"></i></a>
    </div>
</footer>
