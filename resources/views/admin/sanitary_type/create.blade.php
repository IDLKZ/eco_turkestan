<x-app-layout>
    <div class="container mx-auto py-5">
        <h1 class="mb-4 rounded-lg bg-secondary-100 px-6 py-5 text-base text-secondary-800">Создать иконку насаждения</h1>
        <form action="{{route('sanitary_type.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative mb-4">
                <select
                    id="sanitary_ids"
                    class="form-select w-full mb-4 @error('sanitary_id') border-red-600 @enderror"
                    name="sanitary_id">
                    <option value="">Не выбрано</option>
                    @foreach($sanitaries as $sanitaryItem)
                        <option value="{{$sanitaryItem->id}}">{{$sanitaryItem->title_ru}}</option>
                    @endforeach
                </select>
                @error('sanitary_id')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="relative mb-4">
                <select
                    id="types_ids"
                    class="form-select w-full mb-4 @error('type_id') border-red-600 @enderror"
                    name="type_id">
                    <option value="">Не выбрано</option>
                    @foreach($types as $typeItem)
                        <option value="{{$typeItem->id}}">{{$typeItem->title_ru}}</option>
                    @endforeach
                </select>
                @error('type_id')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="relative mb-4">
                <input
                    type="file"
                    class="@error('image_url') border-red-600 @enderror peer block min-h-[auto] w-full rounded border-1"
                    name="image_url"
                    value="{{old('image_url')}}"
                    accept="image/png, image/jpeg"
                    placeholder="Изображение" />
                @error('image_url')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <button
                type="submit"
                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                Сохранить
            </button>
        </form>

    </div>
</x-app-layout>

