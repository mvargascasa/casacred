<section class="hero-real-estate">

    <video class="hero-video" autoplay muted loop playsinline preload="none">
        <source src="{{ asset('img/banner-home.webm') }}" type="video/webm">
        <source src="{{ asset('img/banner-home.mp4') }}" type="video/mp4">
        Tu navegador no soporta videos en HTML5.
    </video>

    <!-- Overlay oscuro -->
    <div class="overlay"></div>

    <div class="hero-container">
        <!-- Texto principal -->
        <div class="hero-title">
            <h1 id="hero-text">
                <span class="one-title">Tu futuro hogar</span>
                <br>
                <span class="two-title">te está esperando</span>
            </h1>
        </div>

        <!-- Formulario de búsqueda -->
        <div class="search-wrapper">
            <form class="search-form" id="searchForm">
                <div class="form-grid">
                    <!-- Ubicación -->
                    <div class="form-group">
                        <input type="text" id="searchtxt" class="inpBanner" placeholder="Sector, Parroquia, Provincia">
                    </div>

                    <!-- Propiedad -->
                    <div class="form-group">
                        <select id="ftop_ptype" class="selBanner">
                            <option value="">Elija tipo de propiedad</option> 
                            <option data-ids="[23,1]" value="1">Casas</option> 
                            <option data-ids="[24,3]" value="2">Departamentos</option> 
                            <option data-ids="[25,5]" value="3">Casas Comerciales</option> 
                            <option data-ids="[32,6]" value="4">Locales Comerciales</option> <option data-ids="[37]" value="5">Edificios</option> 
                            <option data-ids="[39]" value="6">Hoteles</option> 
                            <option data-ids="[41]" value="7">Fabricas</option> 
                            <option data-ids="[42]" value="8">Parqueaderos</option> 
                            <option data-ids="[43]" value="9">Bodegas</option> 
                            <option data-ids="[35,7]" value="10">Oficinas</option> 
                            <option data-ids="[36,8]" value="11">Suites</option> 
                            <option data-ids="[29,9]" value="12">Quintas</option> 
                            <option data-ids="[30,30]" value="13">Haciendas</option> 
                            <option data-ids="[45]" value="14">Naves Industriales</option> 
                            <option data-ids="[26,10]" value="15">Terrenos</option>
                        </select>
                    </div>

                    <!-- Categoría -->
                    <div class="form-group">
                        <select id="ftop_category" class="selBanner">
                            <option value="venta">Venta</option>
                            <option value="renta">Renta</option>
                        </select>
                    </div>

                    <!-- Botón buscar -->
                    <div class="form-group">
                        <button type="submit" class="search-btn">
                            <img width="20px" src="{{ asset('img/icono-buscar-boton-filtros-banner.webp') }}" alt="Icono de buscar">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Flecha scroll --> 
    <div class="scroll-arrow" id="scroll-button"> 
        <img src="{{ asset('img/flecha-abajo-banner.webp') }}" alt="Icono de flecha apuntando abajo"> 
    </div>

</section>

<style>
.hero-real-estate {
    position: relative;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    text-align: center;
}

.hero-video {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    z-index: 0;
}

.overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: 0;
}

.hero-container {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 1100px;
    padding: 0 20px;
}

.hero-title {
    margin-top: 250px;
    margin-bottom: 200px;
    color: white;
}

.hero-title .one-title {
    font-size: 5rem;
    font-weight: bold;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.5);
}

.hero-title .two-title {
    font-size: 4rem;
    font-weight: 100;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.5);
}

.search-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
}

.search-form {
    width: 100%;
    max-width: 950px;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr auto;
    gap: 20px;
    align-items: center;
}

.inpBanner,
.selBanner {
    background: transparent;
    border: 1px solid white;
    border-radius: 8px;
    padding: 15px;
    font-size: 1rem;
    color: white;
    width: 100%;
}

.inpBanner::placeholder {
    color: rgb(255, 255, 255);
}

.selBanner option {
    color: black; /* para que se lean en el dropdown */
}

.search-btn {
    background: white;
    color: #000;
    border: none;
    border-radius: 8px;
    padding: 15px 30px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
}

.search-btn:hover {
    background: #f1f1f1;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-title .one-title {
        font-size: 2.2rem;
    }
    .hero-title .two-title {
        font-size: 1.7rem;
    }
    .form-grid {
        grid-template-columns: 1fr;
        gap: 0px;
    }

    .hero-title {
        margin-top: 120px;
        margin-bottom: 50px;
    }
}

.scroll-arrow { 
    position: absolute; 
    bottom: 30px; 
    left: 50%; 
    transform: translateX(-50%); 
    color: white; 
    font-size: 2rem; 
    animation: bounce 2s infinite; 
    cursor: pointer; 
    z-index: 2; 
}

@keyframes bounce { 
    0%, 20%, 53%, 80%, 100% { 
        transform: translateX(-50%) translateY(0); 
    } 
    40%, 43% { 
        transform: translateX(-50%) translateY(-15px); 
    } 
    70% { 
        transform: translateX(-50%) translateY(-7px); 
    } 
    90% { 
        transform: translateX(-50%) translateY(-2px); 
    } 
}

#hero-text span {
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

#hero-text.show span {
    opacity: 1;
}
</style>


<script>

    document.addEventListener('DOMContentLoaded', function() {
        // 1. Selecciona el botón de scroll por su ID
        const scrollButton = document.getElementById('scroll-button');

        // 2. Selecciona la sección de destino por su ID
        const targetSection = document.getElementById('section-property-categories');

        // 3. Añade un escuchador de eventos de clic al botón
        scrollButton.addEventListener('click', function() {
            if (targetSection) {
                // 4. Obtiene la posición (coordenadas) de la sección de destino
                const sectionPosition = targetSection.getBoundingClientRect().top;
                
                // 5. Define el desplazamiento (-20px)
                const offset = -20;
                
                // 6. Calcula la posición final ajustada
                const finalPosition = sectionPosition + window.scrollY + offset;

                // 7. Realiza el scroll suave a la posición final
                window.scrollTo({
                    top: finalPosition,
                    behavior: 'smooth'
                });
            }
        });

        // Textos en dos líneas
        const texts = [
            { one: "Tu futuro hogar", two: "te está esperando" },
            { one: "Encuentra la propiedad", two: "perfecta para ti" },
            { one: "Haz realidad tus", two: "sueños de vivienda" },
            { one: "Vive donde siempre", two: "lo imaginaste" }
        ];

        let index = 0;
        const heroText = document.getElementById("hero-text");
        const oneSpan = heroText.querySelector(".one-title");
        const twoSpan = heroText.querySelector(".two-title");

        function changeText() {
            // Fade out
            heroText.classList.remove("show");

            setTimeout(() => {
                // Cambiar texto
                index = (index + 1) % texts.length;
                oneSpan.textContent = texts[index].one;
                twoSpan.textContent = texts[index].two;

                // Fade in
                heroText.classList.add("show");
            }, 1000); // 1s = duración de la transición CSS
        }

        // Mostrar primero
        heroText.classList.add("show");

        // Cambiar cada 4 segundos
        setInterval(changeText, 4000);

    });

    let inpSearchTxt = document.getElementById('ftop_txt');
    if (inpSearchTxt) {
        inpSearchTxt.addEventListener("keypress", function(event) {
            if (event.keyCode == 13) {
                search();
            }
        })
    }

    function onSubmit(token) {
        document.getElementById("demo-form").submit();
    }

    function limpiarCampos() {
        document.getElementById('searchtxt').value = "";
        document.getElementById('order').value = "";
        document.getElementById('tipobusqueda').value = "";
        document.getElementById('tipopropiedad').value = "";
        document.getElementById('preciodesde').value = "";
        document.getElementById('preciohasta').value = "";
        document.getElementById('superfdesde').value = "";
        document.getElementById('superfhasta').value = "";
    }

    document.addEventListener('DOMContentLoaded', function() {
        const searchForm = document.getElementById('searchForm');
        if (searchForm) {
            searchForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Evitar el envío del formulario.

                // Capturar los elementos del formulario y sus valores.
                const typeSelect = document.getElementById('ftop_ptype');
                const searchInput = document.getElementById('searchtxt');
                const operationType = document.getElementById('ftop_category');
                // const check1 = document.getElementById('ftop_category_0');
                // const check2 = document.getElementById('ftop_category_1');
                // const minPriceInput = document.getElementById('min_price');
                // const maxPriceInput = document.getElementById('max_price');

                // Establecer la categoría basada en qué checkbox está seleccionado.
                let category = "general"; // Valor por defecto.
                if(operationType.value != ""){
                    category = operationType.value;
                }

                // Obtener el nombre del tipo de propiedad seleccionado o usar 'propiedades' como valor por defecto.
                let typeName = typeSelect.options[typeSelect.selectedIndex].text.toLowerCase().replace(
                    /\s+/g, '-');
                if (!typeSelect.value || typeName === 'tipo-de-propiedad') {
                    typeName = 'propiedades';
                }

                let detailsParts = [];

                const searchTerm = searchInput.value.trim();
                let queryParams = '';
                if (searchTerm) {
                    queryParams = `?searchTerm=${encodeURIComponent(searchTerm)}`;
                }

                // Agregar rangos de precio a la URL amigable
                // const minPrice = minPriceInput.value.trim();
                // const maxPrice = maxPriceInput.value.trim();
                // if (minPrice) {
                //     detailsParts.push(`desde-${minPrice}`);
                // }
                // if (maxPrice) {
                //     detailsParts.push(`hasta-${maxPrice}`);
                // }

                // Construcción final
                //let detailsSegment = detailsParts.length ? '-' + detailsParts.join('-') : '';
                let finalUrl = `/${typeName}-en-${category}${queryParams}`;

                // Construir la URL final y redireccionar.
                window.location.href = finalUrl;
            });
        }
    });
</script>