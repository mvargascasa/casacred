<div>
    @foreach ($units as $unit)
    <div>
        <div class="col mt-3">
          <div class="card border rounded shadow-sm p-2">
              <div class="card-body p-2">
                  <h6 class="card-title mb-1">{{ $unit->name }}</h6>
                  @if($unit->unit_number)
                    <small class="text-muted d-block mb-1">Unidad #{{ $unit->unit_number ?? '-' }}</small>
                  @endif
                  <div class="mb-1">
                      @if($unit->floor)
                        <small><strong>Piso:</strong> {{ $unit->floor ?? '-' }}</small><br>
                      @endif
                      @if($unit->area_m2)
                        <small><strong>Área:</strong> {{ $unit->area_m2 ?? '-' }} m²</small><br>
                      @endif
                      @if($unit->bedrooms)
                        <small><strong>Hab:</strong> {{ $unit->bedrooms ?? '-' }} </small><br>
                      @endif
                      @if($unit->bathrooms)
                        <small><strong>Baños:</strong> {{ $unit->bathrooms ?? '-' }}</small><br>
                      @endif
                      @if($unit->price)
                        <small><strong>Precio:</strong> ${{ number_format($unit->price ?? 0, 2) }}</small>
                      @endif
                      @if($unit->description)
                        <p>{{ $unit->description }}</p>
                      @endif
                  </div>
                  <span class="badge bg-{{ $unit->status === 'available' ? 'success' : 'secondary' }}">
                      {{ ucfirst($unit->status) }}
                  </span>
              </div>
          </div>
        </div>
      </div>
    @endforeach
</div>