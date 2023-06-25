<x-app-layout>

    <div class="row pt-4 mt-2">
        <x-search-inputs/>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">

                        @if($markers)
                            <div class="flex justify-between">
                                <div>Количество посаженных деревьев: {{$markers->total()}}</div>
                                <div>
                                    <form action="{{route('mayor-export')}}" method="POST">
                                        @csrf
                                        @if(count($forExp) > 0)
                                            <input type="hidden" name="area_id" value="{{$forExp['area_id']}}">
                                            <input type="hidden" name="category_id" value="{{$forExp['category_id']}}">
                                            <input type="hidden" name="type_id" value="{{$forExp['type_id']}}">
                                            <input type="hidden" name="breed_id" value="{{$forExp['breed_id']}}">
                                            <input type="hidden" name="sanitary_id" value="{{$forExp['sanitary_id']}}">
                                            <input type="hidden" name="status_id" value="{{$forExp['status_id']}}">
                                        @endif

                                        <button type="submit" class="btn btn-success text-black text-hover-light">Экспорт в Excel</button>
                                    </form>
                                </div>

                            </div>

                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Район</th>
                                    <th scope="col" class="px-6 py-4">Место</th>
                                    <th scope="col" class="px-6 py-4">Порода</th>
                                    <th scope="col" class="px-6 py-4">Состояние</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($markers as $item)
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$loop->iteration}}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$item->area->title_ru}}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$item->place->title_ru}}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$item->breed->title_ru}}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$item->sanitary->title_ru}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="py-4 text-center">
                                {{$markers->links()}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
