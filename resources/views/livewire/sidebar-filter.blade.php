<div>
    <div class="accordion" id="myCollapseMenu">
        <div class="accordion-item">
            <h2 class="accordion-header" id="areaheadingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#areaCollapse" aria-expanded="true" aria-controls="areaCollapse">
                    Районы
                </button>
            </h2>
            <div id="areaCollapse" class=" show" aria-labelledby="areaheadingOne" data-bs-parent="#myCollapseMenu">
                <div class="accordion-body">
                    @foreach($areas as $areaItem)
                    <div class="form-check">
                        <input wire:click="$emit('areaChanged',{{$areaItem->id}})" class="form-check-input" type="checkbox" id="{{$areaItem->title_ru}}">
                        <label class="form-check-label" for="{{$areaItem->title_ru}}">
                            {{$areaItem->title_ru}}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="placeheadingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#placeCollapse" aria-expanded="true" aria-controls="placeCollapse">
                    Места
                </button>
            </h2>
            <div id="placeCollapse" aria-labelledby="placeheadingOne" data-bs-parent="#myCollapseMenu">
                <div class="accordion-body">
                    @foreach($places as $placeItem)
                        <div class="form-check">
                            <input  class="form-check-input" type="checkbox" id="{{$placeItem->title_ru}}">
                            <label class="form-check-label" for="{{$placeItem->title_ru}}">
                                {{$placeItem->title_ru}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')

    <script type="module">
        Livewire.on('areaChanged',function () {
            let activeAreaGeo = {{Js::from($this->selectedAreas)}};
            console.log(activeAreaGeo);

        })
    </script>
@endpush
