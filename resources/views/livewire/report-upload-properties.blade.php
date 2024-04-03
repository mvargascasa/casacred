<div class="border mt-5 ml-5 w-5/12">
    <section class="p-5">
        <h2 class="text-lg font-semibold">Propiedades subidas por día de cada asesor</h2>
        <p class="mt-1">Filtrar por fecha:</p>  
        <div class="flex items-center gap-2 mt-2">
            <div>
                <label for="dateFilterTo" class="text-xs">Desde</label><br>
                <input type="date" wire:model="dateFilterTo"  id="dateFilter" class="bg-gray-100 px-5 py-2 shadow-md">
            </div>
            <div>
                <label for="dateFilterFrom" class="text-xs">Hasta</label><br>
                <input type="date" wire:model="dateFilterFrom" class="bg-gray-100 px-5 py-2 shadow-md">
            </div>
        </div>
        {{-- @foreach ($users as $user)
            <p>El usuario {{ $user->name}}-{{ $user->id }} tiene {{ $properties[$user->id]}} propiedades creadas durante la fecha {{ $now->format('Y-m-d') }}</p>
        @endforeach --}}

        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Usuario</th>
                    <th class="px-4 py-2">Cantidad</th>
                    <th class="px-4 py-2">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $propertie)
                    <tr>
                        <td class="border px-4 py-2">{{ $propertie[0] }}</td>
                        <td class="border px-4 py-2">{{ $propertie[1] }}</td>
                        <td class="border px-4 py-2">{{ $now->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
