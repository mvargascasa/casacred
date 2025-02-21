<div>
    <p class="text-sm mt-5">Seleccione un rango de fechas para realizar la búsqueda</p>
    <div class="mt-5">
        <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" wire:model="product_code" placeholder="Código">
        <select wire:model="user_id" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          <option value="">Seleccione</option>
          @foreach ($users as $user)
              <option value="{{ $user->id}}">{{ $user->name }}</option>
          @endforeach
        </select>
        <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" wire:model="from_date">
        <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" wire:model="to_date">
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th scope="col" class="px-6 py-4">Codigo</th>
                    <th scope="col" class="px-6 py-4">Campos Actualizados</th>
                    <th scope="col" class="px-6 py-4">User</th>
                    <th scope="col" class="px-6 py-4">Fecha</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($updated_listings as $updated_listing)
                    <tr class="border-b dark:border-neutral-500">
                      <td class="whitespace-nowrap px-6 py-4">{{ $updated_listing->property_code}}</td>
                      <td class="whitespace-nowrap px-6 py-4">
                        {{-- {{ $updated_listing->value_change}} --}}
                        @php
                            $valueChange = $updated_listing->value_change;
                            $decodedValue = json_decode($valueChange, true);

                            if (json_last_error() === JSON_ERROR_NONE && is_array($decodedValue)) {
                                echo implode(', ', $decodedValue);
                            } else {
                                echo e($valueChange);
                            }
                        @endphp
                      </td>
                      <td class="whitespace-nowrap px-6 py-4">
                        @foreach ($users as $user)
                          @if($user->id == $updated_listing->user_id)
                            {{ $user->name }}
                          @endif
                        @endforeach
                      </td>
                      <td class="whitespace-nowrap px-6 py-4">{{ $updated_listing->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
          @if(count($updated_listings) == 0)
          <div class="text-center text-sm text-red-700 mt-5 font-semibold">
            <p>No hemos encontrado resultados. Verifique que los campos esten completos correctamente</p>
          </div>
          @endif
        </div>
      </div>
      {{ $updated_listings->links() }}
</div>
