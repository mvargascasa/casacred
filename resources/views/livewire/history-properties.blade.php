<div>
    <p class="text-sm mt-5">Seleccione un rango de fechas para realizar la búsqueda</p>
    <div class="mt-5">
        <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" wire:model="product_code" placeholder="Código">
        <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" wire:model="user_id" placeholder="Usuario">
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
                      <td class="whitespace-nowrap px-6 py-4">{{ $updated_listing->value_change}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{ $updated_listing->user_id}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{ $updated_listing->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      {{ $updated_listings->links() }}
</div>
