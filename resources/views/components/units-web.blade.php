<div>
    @foreach ($units as $unit)
        <div class="border rounded w-100 px-3 py-3 mb-2">
            <p class="font-weight-bold">{{ $unit->name }}</p>
            <span>{{ $unit->unit_number}}</span>
            @if($unit->area_m2 > 0)
                <span>{{ $unit->area_m2 }} mt <sup>2</sup></span>
            @endif
        </div>
    @endforeach
</div>