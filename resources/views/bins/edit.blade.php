<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Bin
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
                    <form method="post" action="{{route('bins.update',$bins->id)}}">
                        @method('PATCH')
                        {{--                        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div class="w-full">
                                <x-input-label>Type</x-input-label>
                                <select name="type" class="w-full">
                                    <option value="" disabled>Select Type</option>
                                    <option {{$selected = $bins->type == 'plastic' ? 'selected' : ''}} value="plastic">Plastic</option>
                                    <option {{$selected = $bins->type == 'paper' ? 'selected' : ''}} value="paper">Paper</option>
                                    <option {{$selected = $bins->type == 'metal' ? 'selected' : ''}} value="metal">Metal</option>
                                </select>
                                @error('type')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <x-input-label>Trash Weight</x-input-label>
                                <x-text-input value="{{old('trash_weight' , $bins->trash_weight)}}" class="w-full" name="trash_weight"></x-text-input>
                                @error('trash_weight')
                                <p class="text-red-600 font-bold">{{$message}}</p>
                                @enderror
                            </div>
                              <div class="w-full">
                                <x-input-label>Group</x-input-label>
                                <select name="bin_group_id" class="w-full">
                                    <option value="" disabled>Select Group</option>
                                    @foreach($groups as $id)
                                        @php($selected = $id == $bins->bin_group_id ? 'selected' : '')
                                        <option {{$selected}} value="{{$id}}">{{$id}}</option>
                                    @endforeach
                                </select>
                                @error('bin_group_id')
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
