<div>
    <div class="mb-2">
        <select wire:model="category_id" name="category_id">
            <option value="">Выберите категорию *</option>
            @foreach($categories as $item)
                <option value="{{$item->id}}">{{$item->title_ru}}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-2">
        <select wire:model="type_id" name="type_id">
            <option value="">Выберите вид насаждения *</option>
            @foreach($types as $item)
                <option value="{{$item->id}}">{{$item->title_ru}}</option>
            @endforeach
        </select>
        @error('type_id')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-2">
        <select wire:model="event_id" name="event_id">
            <option value="">Выберите хозяйственное мероприятие *</option>
            @foreach($events as $item)
                <option value="{{$item->id}}">{{$item->title_ru}}</option>
            @endforeach
        </select>
        @error('event_id')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-2">
        <select wire:model="sanitary_id" name="sanitary_id">
            <option value="">Выберите состояние *</option>
            @foreach($sanitaries as $item)
                <option value="{{$item->id}}">{{$item->title_ru}}</option>
            @endforeach
        </select>
        @error('sanitary_id')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-2">
        <select wire:model="status_id" name="status_id">
            <option value="">Выберите статус (необязательно)</option>
            @foreach($statuses as $item)
                <option value="{{$item->id}}">{{$item->title_ru}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <input wire:model="height" name="height" type="text" class="w-full @error('height') border-red-600 @enderror" placeholder="Введите высоту">
        @error('height')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-2">
        <input wire:model="diameter" name="diameter" type="text" class="w-full @error('diameter') border-red-600 @enderror" placeholder="Введите диаметер">
        @error('diameter')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-2">
        <input wire:model="landing_date" name="landing_date" type="date" class="w-full" placeholder="Введите дату посадки">
    </div>
    <div class="mb-2">
        <input class="w-full mb-2" type="text" wire:model="search" placeholder="Введите породу дерева...">
        @if(!empty($breeds))
            <select wire:model="breed_id" name="breed_id">
                <option value="" selected>Выберите породу</option>
                @foreach($breeds as $item)
                    <option value="{{$item->id}}">{{$item->title_ru}}</option>
                @endforeach
            </select>
        @endif
        @error('breed_id')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
</div>