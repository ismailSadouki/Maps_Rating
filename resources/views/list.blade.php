<x-app-layout>
    <x-slot name="header">
        @include('includes/header')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                @forelse ($places as $place)
                    <div class="flex mb-5 bg-white">
                        <div class="flex-none w-48 relative">
                            
                            <a href="{{route('place.show',[$place->id, $place->slug])}}">
                                <img src="{{$place->image}}" class="absolute inset-0 w-full object-cover" alt="">
                            </a>
                        </div>
                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap">
                                <a href="{{route('place.show',[$place->id, $place->slug])}}">
                                    <h1 class="flex-auto text-xl font-semibold">
                                        {{$place->name}}
                                    </h1>
                                </a>
                            </div>

                            <div class="flex space-x-3 mb-4 text-sm font-medium mt-5">
                                <div class="flex-auto flex space-x-3">
                                    {{$place->address}}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-blue-900 px-6 py-4 rounded relative bg-gray-200 max-w-7xl mx-auto">
                        <div class="inline-block align-middle mr-8">
                            لا يوجد مواقع ضمن هذا التصنيف
                        </div>
                    </div>
                @endforelse
            </div>

            <div>

            </div>
        </div>
    </div>
</x-app-layout>