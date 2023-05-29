<form action="{{route('mayor-search')}}" method="post">
    @csrf
    <div class="grid grid-cols-4 gap-4">
        <div class="relative mb-4" data-te-input-wrapper-init>
            <label>Выберите район</label>
            <select name="area_id" class="w-full" data-te-select-init>
                <option value="0" selected>Все</option>
                @foreach($areas as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        </div>

        <div class="relative mb-4" data-te-input-wrapper-init>
            <label>Выберите категорию насаждений</label>
            <select name="category_id" class="w-full" data-te-select-init>
                <option value="0" selected>Все</option>
                @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        </div>

        <div class="relative mb-4" data-te-input-wrapper-init>
            <label>Выберите вид насаждения</label>
            <select name="type_id" class="w-full" data-te-select-init>
                <option value="0" selected>Все</option>
                @foreach($types as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        </div>

        <div class="relative mb-4" data-te-input-wrapper-init>
            <label>Выберите породу</label>
            <select name="breed_id" class="w-full" data-te-select-init>
                <option value="0" selected>Все</option>
                @foreach($breeds as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        </div>

        <div class="relative mb-4" data-te-input-wrapper-init>
            <label>Выберите состояние</label>
            <select name="sanitary_id" class="w-full" data-te-select-init>
                <option value="0" selected>Все</option>
                @foreach($sanitaries as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        </div>

        <div class="relative mb-4" data-te-input-wrapper-init>
            <label>Выберите статус</label>
            <select name="status_id" class="w-full" data-te-select-init>
                <option value="0" selected>Все</option>
                @foreach($statuses as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        </div>

        <div class="relative mb-4 flex items-end">
            <button
                type="submit"
                class="inline-block rounded bg-primary px-6 py-3 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                Найти
            </button>
        </div>
    </div>
</form>
