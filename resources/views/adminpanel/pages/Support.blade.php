@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title','ادمین پنل | پشتیبانی')
@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">ایمیل های خبرنامه</h2>
        <div class="my-5 w-full border-t-2 border-green-500 bg-white p-10">
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
                                <button user-name="{{$item->name}}" text-content="{{ $item->description }}"
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
                                <button
                                    class="p-2 mx-1 deleteFormBtn flex text-white rounded-md border-2 border-red-300 justify-center items-center bg-red-500">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a class="p-2 mx-1 flex text-white rounded-md border-2 border-sky-300 justify-center items-center bg-sky-500"
                                    href=""> <i class="fa fa-eye"></i>
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
@endsection
