<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="mb-2">
            <select wire:model="category_id">
                <option>Выберите категорию</option>
                @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <select wire:model="type_id">
                <option>Выберите вид насаждения</option>
                @foreach($types as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <select wire:model="event_id">
                <option>Выберите хозяйственное мероприятие</option>
                @foreach($events as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <select wire:model="sanitary_id">
                <option>Выберите состояние</option>
                @foreach($sanitaries as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <input wire:model="height" type="text" class="w-full" placeholder="Введите высоту">
        </div>
        <div class="mb-2">
            <input wire:model="diameter" type="text" class="w-full" placeholder="Введите диаметер">
        </div>
        <div class="mb-2">
            <input wire:model="landing_date" type="date" class="w-full" placeholder="Введите дату посадки">
        </div>
        <div class="mb-2">
            <input class="w-full mb-2" type="text" wire:model="search" placeholder="Введите породу дерева...">
            @if(!empty($breeds))
                <select wire:model="breed_id">
                    @foreach($breeds as $item)
                        <option value="{{$item->id}}">{{$item->title_ru}}</option>
                    @endforeach
                </select>
            @endif
        </div>

    </form>
</div>
