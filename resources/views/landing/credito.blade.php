<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicite su Crédito en Azuay y Cañar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section style="background: rgba(8, 8, 8, 0.319); background-size: cover;background-position: left top; width: 100%; background-repeat: no-repeat;">
        <img width="100%" height="100%" src="{{asset('img/banner-credito.jpg')}}" alt="solicite su credito">
    </section>

    <div class="px-5 bg-gray-100 mt-5 mb-10 pb-10">
        <div class="py-2 md:py-5 text-center">
            <h1 class="text-gray-500 m-5 text-base md:text-3xl font-semibold">SOLICITUD DE CRÉDITO</h1>
        </div>
        <div class="sm:px-0 md:px-16">
            <form action="{{route('web.lead.credito')}}" method="POST">
            @csrf
            <div class="grid sm:grid-cols-1 md:grid-cols-3">
                <div class="mx-5 mb-2">
                    <label for="name" class="font-semibold text-xs md:text-base">Nombres:</label><br>
                    <input type="text" name="name" class="px-3 w-full h-8 bg-gray-50 border border-gray-400 text-gray-900 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded" required>
                </div>
                <div class="mx-5 mb-2">
                    <label for="lastname" class="font-semibold text-xs md:text-base">Apellidos:</label>
                    <input type="text" name="lastname" class="px-3 w-full h-8 bg-gray-50 border border-gray-400 text-gray-900 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded" required>
                </div>
                <div class="mx-5 mb-2">
                    <label for="identification" class="font-semibold text-xs md:text-base">Cédula o Pasaporte:</label>
                    <input type="number" name="identification" class="px-3 w-full h-8 bg-gray-50 border border-gray-400 text-gray-900 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded" required>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 sm:mt-0 md:mt-10">
                <div class="mx-5 mb-2">
                    <label for="state" class="font-semibold text-xs md:text-base">Provincia:</label>
                    <select id="state" name="state" class="w-full h-8 bg-gray-50 border border-gray-400 text-gray-900 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded" required>
                        <option value="">Seleccione</option>
                        @foreach ($states as $state)
                            <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mx-5 mb-2">
                    <label for="city" class="font-semibold text-xs md:text-base">Ciudad:</label>
                    <select id="city" name="city" class="w-full h-8 bg-gray-50 border border-gray-400 text-gray-900 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded" required>
                        <option value="">Seleccione</option>
                    </select>
                </div>
                <div class="mx-5 mb-2">
                    <label for="phone" class="font-semibold text-xs md:text-base">Teléfono:</label>
                    <input type="number" name="phone" class="px-3 w-full h-8 bg-gray-50 border border-gray-400 text-gray-900 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded" required>
                </div>
            </div>
            <div class="grid sm:grid-cols-1 md:grid-cols-3 sm:mt-0 md:mt-10">
                <div class="mx-5 mb-2">
                    <label for="email" class="font-semibold text-xs md:text-base">Email:</label>
                    <input type="email" name="email" class="px-3 w-full h-8 bg-gray-50 border border-gray-400 text-gray-900 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded" required>
                </div>
                <div class="mx-5 mb-2">
                    <label for="monthly_income" class="font-semibold text-xs md:text-base">Ingresos mensuales:</label>
                    <select name="monthly_income" class="w-full h-8 bg-gray-50 border border-gray-400 text-gray-900 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded" required>
                        <option value="">Seleccione</option>
                        <option value="500-1.000">De 500 a 1.000</option>
                        <option value="1000-2.000">De 1.000 a 2.000</option>
                        <option value="2000-3.000">De 2.000 a 3.000</option>
                    </select>
                </div>
                <div class="mx-5 mb-2">
                    <label for="amount" class="font-semibold text-xs md:text-base">Monto a solicitar:</label>
                    <input type="number" name="amount" class="px-3 w-full h-8 bg-gray-50 border border-gray-400 text-gray-900 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded" placeholder="Ej:70.000" required>
                </div>
            </div>
            <div class="grid justify-center mt-10">
                <button type="submit" class="bg-red-600 text-white hover:bg-red-700 w-40 p-2 rounded-lg">ENVIAR SOLICITUD</button>
            </div>
            </form>
            <div class="sm:px-10 md:mx-40 mt-10 sm:text-justify md:text-center font-semibold text-xs md:text-base">
                <p>Autorizo a Casa Crédito para que obtenga de cualquier fuente de información, incluida la central de riesgos, mi referencia e información personal sobre mi comportamiento crediticio, manejo de mis cuentas, tarjetas de crédito, etc.</p>
            </div>
        </div>
    </div>

<script>
    const selState = document.getElementById('state');
    const selCities= document.getElementById('city');

    selState.addEventListener("change", async function() {
        selCities.options.length = 0;
        let id = selState.options[selState.selectedIndex].dataset.id;
        const response = await fetch("{{url('getcities')}}/"+id );
        const cities = await response.json(); 

        let opt = document.createElement('option');
        opt.appendChild( document.createTextNode('Seleccione') );
        opt.value = '';
        selCities.appendChild(opt);
        cities.forEach(city => {
            var opt = document.createElement('option');
            opt.appendChild( document.createTextNode(city.name) );
            opt.value = city.name;
            selCities.appendChild(opt);
        });
    });
</script>
</body>
</html>