<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Subscriber 
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-3 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{route('subscribers.store')}}">
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
                                <x-text-input value="{{old('phone_number')}}" class="w-full" name="phone_number"></x-text-input>
                                @error('phone_number')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                              <div class="w-full">
                                <x-input-label>Subscribtion Fee</x-input-label>
                                <x-text-input value="{{old('subscribtion_fee')}}" class="w-full" name="subscribtion_fee"></x-text-input>
                                @error('subscribtion_fee')
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
