<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Admin 
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
                    <form method="POST" action="{{route('admins.store' )}}">
                        {{--                        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div class="w-full">
                                <x-input-label>Name</x-input-label>
                                <x-text-input value="{{old('name')}}" class="w-full" name="name"></x-text-input>
                                @error('name')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                              <div class="w-full">
                                <x-input-label>Email</x-input-label>
                                <x-text-input value="{{old('email')}}" class="w-full" name="email"></x-text-input>
                                @error('email')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                              <div class="w-full">
                                <x-input-label>Phone</x-input-label>
                                <x-text-input value="{{old('phone')}}" class="w-full" name="phone"></x-text-input>
                                @error('phone')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <x-input-label> Password</x-input-label>
                                <x-text-input value="{{old('password')}}" class="w-full" name="password" type="password"></x-text-input>
                                @error('password')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <x-input-label> Role</x-input-label>
                                <select name="role" class="w-full">
                                    <option value="" disabled>Select Role</option>
                                    <option value="user_level">Super Admin</option>
                                    <option value="only_bins_level">Admin</option>
                                </select>
                                @error('role')
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
