<x-app-layout>

    <div class="row pt-4 mt-2">
        <x-search-inputs/>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">

                        @if($markers)
                            <h1>Количество посаженных деревьев: {{$markers->total()}}</h1>
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
