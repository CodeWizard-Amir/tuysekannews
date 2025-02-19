@extends('adminpanel.layout.MainAdminPanelLayout')
@section('title', 'ادمین پنل | خبرنامه')

@section('body')
    <section class="p-5">
        <h2 class="rounded-full border-r-2 px-5 py-3 !border-indigo-500">ایمیل های خبرنامه</h2>
        <div class="my-5 w-full border-t-2 border-green-500 bg-white p-10">
            <table class="w-full border-2 border-gray-300">
                <thead class="border-2 p-1 border-gray-300">
                    <th class="border-2 p-1 border-gray-300">ایمیل</th>
                    <th class="border-2 w-[150px] p-4 border-gray-300">عملیات</th>
                </thead>
                <tbody>
                    @foreach ($newsletter as $item)
                        <tr class="odd:bg-gray-100 border-2 border-gray-300">
                            <td class="border-2 text-center p-2 border-gray-300">{{ $item->email }}</td>

                            <td class=" text-center flex justify-center items-center p-2 !h-full">
                                <form class="hidden deleteNewsletterForm" method="Post"
                                    action="{{ route('delete.newsletter', ['id' => $item->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <button
                                    class="p-2 mx-1 deleteFormBtn flex text-white rounded-md border-2 border-red-300 justify-center items-center bg-red-500">
                                    <i class="fa fa-trash"></i>
                                </button>
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
        @if (session('deleted_success'))
            Swal.fire({
                icon: 'success',
                title: 'موفقیت‌آمیز!',
                text: 'رکورد با موفقیت حذف شد!',
            });
        @endif
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
@endsection
