<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bins
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session()->has('message'))
                        {{--                    @if(session('message'))--}}
                        <div
                            class="text-green-100 bg-green-700 border border-green-700 flex justify-left items-center m-1 font-medium py-1 px-2 rounded-md">
                            <div slot="avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                            <div class="text-xl font-normal  max-w-full flex-initial">
                                <div class="py-2">This is a success messsage
                                    <div class="text-sm font-base">{{session('message')}}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="flex justify-center m-3">
                    <x-button-link>
                        Add New Bin
                        <x-slot name="href">{{route('bins.create')}}</x-slot>
                    </x-button-link>
                </div>
                {{-- {{dd($c)}} --}}
                <i class="fa-solid fa-pen-to-square"></i>
                <!-- component -->
                <div class="flex flex-col w-full">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-gray-200 border-b">
                                    <tr class="text-center">
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            #
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Type
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Trash Weight
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Current Weight
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Group 
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Created At
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Actions
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($bins as $key=> $bin)
                                        <tr class="bg-white border-b text-center transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                {{$bins->firstItem() + $key}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                {{$bin->type}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                {{$bin->trash_weight}} KG
                                            </td>
                                            <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                {{$bin->current_trash_weight}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                {{$bin->bin_group_id}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                                {{date_format(date_create($bin->created_at),'Y-m-d h:i:s a')}}
                                            </td>
                                            <td>
                                                <div class="flex justify-evenly">
                                                    <div>
                                                        <a href="{{route('bins.edit',$bin->id)}}"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 50 50">
                                                            <path d="M 43.050781 1.9746094 C 41.800781 1.9746094 40.549609 2.4503906 39.599609 3.4003906 L 38.800781 4.1992188 L 45.699219 11.099609 L 46.5 10.300781 C 48.4 8.4007812 48.4 5.3003906 46.5 3.4003906 C 45.55 2.4503906 44.300781 1.9746094 43.050781 1.9746094 z M 37.482422 6.0898438 A 1.0001 1.0001 0 0 0 36.794922 6.3925781 L 4.2949219 38.791016 A 1.0001 1.0001 0 0 0 4.0332031 39.242188 L 2.0332031 46.742188 A 1.0001 1.0001 0 0 0 3.2578125 47.966797 L 10.757812 45.966797 A 1.0001 1.0001 0 0 0 11.208984 45.705078 L 43.607422 13.205078 A 1.0001 1.0001 0 1 0 42.191406 11.794922 L 9.9921875 44.09375 L 5.90625 40.007812 L 38.205078 7.8085938 A 1.0001 1.0001 0 0 0 37.482422 6.0898438 z"></path>
                                                            </svg></a>
                                                    </div>
                                                    <div>
                                                        <form method="post"
                                                              action="{{route('bins.destroy',$bin->id)}}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" style="color: #DC2626"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30">
                                                                <path d="M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z"></path>
                                                            </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td colspan="4"
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                No Bins Yet
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-2">{{$bins->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
