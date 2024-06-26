<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User Informations
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--       @if ($errors->any())
                               <div class="text-red-700">
                                   <ul>
                                       @foreach ($errors->all() as $error)
                                           <li class="font-bold text-lg">- {{ $error }}</li>
                                       @endforeach
                                   </ul>
                               </div>
                           @endif--}}
                    <form method="post" action="{{route('users.update',$users->id)}}">
                        @method('PATCH')
                        {{--                        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div class="w-full">
                                <x-input-label>Name</x-input-label>
                                <x-text-input value="{{old('user_name' , $users->user_name)}}" class="w-full" name="user_name"></x-text-input>
                                @error('user_name')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                              <div class="w-full">
                                <x-input-label>Email</x-input-label>
                                <x-text-input value="{{old('user_email' , $users->user_email)}}" class="w-full" name="user_email"></x-text-input>
                                @error('user_email')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                              <div class="w-full">
                                <x-input-label>Phone</x-input-label>
                                <x-text-input value="{{old('user_phone' , $users->user_phone)}}" class="w-full" name="user_phone"></x-text-input>
                                @error('user_phone')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                              <div class="w-full">
                                <x-input-label>Score</x-input-label>
                                <x-text-input value="{{old('user_score' , $users->user_score)}}" class="w-full" name="user_score"></x-text-input>
                                @error('user_score')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-5 w-full flex justify-center">
                                <x-primary-button class="bg-fuchsia-900" type="submit">Save</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
