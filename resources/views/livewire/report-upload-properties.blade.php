<div>
    <section class="p-5">
        <h2 class="text-xl">Pestaña de Reportes</h2>
        <input type="date" wire:model="dateFilter"  id="dateFilter" class="bg-gray-100 px-5 py-2 shadow-md">
        @foreach ($users as $user)
            <p>El usuario {{ $user->name}} tiene {{ $properties[$user->id]}} propiedades creadas durante la fecha {{ $now }}</p>
        @endforeach
    </section>
</div>
