<section class="hero-real-estate">

    <video class="hero-video" autoplay muted loop playsinline preload="none">
        <source src="{{ asset('img/banner-home.webm') }}" type="video/webm">
        <source src="{{ asset('img/banner-home.mp4') }}" type="video/mp4">
        Tu navegador no soporta videos en HTML5.
    </video>

    <!-- Overlay oscuro -->
    <div class="overlay"></div>

    <div class="hero-container">
        <div class="hero-content">
            <!-- Título principal -->
            <div class="hero-title">
                <h1>
                    <span class="one-title">Tu futuro hogar</span>
                    <br>
                    <span class="two-title">te está esperando</span>
                </h1>
            </div>

            <!-- Formulario de búsqueda -->
            <div class="search-wrapper">
                <!-- Tabs -->
                <div class="tabs-container">
                    
                    <div class="tabs-container">
                        <!-- Radio 1: Venta -->
                        <input type="radio" class="tab-radio" name="category" id="ftop_category_0" value="en-venta" checked>
                        <label for="ftop_category_0" class="tab">Venta</label>
                      
                        <!-- Radio 2: Renta -->
                        <input type="radio" class="tab-radio" name="category" id="ftop_category_1" value="alquilar">
                        <label for="ftop_category_1" class="tab">Renta</label>
                    </div>

                </div>

                <!-- Formulario -->
                <form class="search-form" id="searchForm">
                    <div class="form-grid">
                        <!-- Ubicación -->
                        <div class="form-group">
                            <label class="labelsBanner">Ubicación</label>
                            <input type="text" id="searchtxt" class="inpBanner" placeholder="Sector, Parroquia, Provincia">
                        </div>

                        <!-- Propiedad -->
                        <div class="form-group">
                            <label class="labelsBanner">Propiedad</label>
                            <select id="ftop_ptype" class="selBanner">
                                <option value="">Elija tipo de propiedad</option>
                                <option data-ids="[23,1]" value="1">Casas</option>
                                <option data-ids="[24,3]" value="2">Departamentos</option>
                                <option data-ids="[25,5]" value="3">Casas Comerciales</option>
                                <option data-ids="[32,6]" value="4">Locales Comerciales</option>
                                <option data-ids="[37]" value="5">Edificios</option>
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

                        <!-- Precio -->
                        <div class="form-group">
                            <label class="labelsBanner">Precio</label>
                            <div class="price-inputs">
                                <input type="number" id="min_price" class="inpBanner" placeholder="Mínimo">
                                <input type="number" id="max_price" class="inpBanner" placeholder="Máximo">
                            </div>
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

                <!-- Botón vender propiedad -->
                <div class="sell-property">
                    <a class="sell-btn" href="/servicio/vende-tu-casa">
                        Vender Propiedad
                        <img width="30px" src="{{ asset('img/flecha-derecha-boton-vender-propiedad-banner.webp') }}" alt="Icono de flecha apuntando a la derecha">
                    </a>
                </div>
            </div>
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
    align-items: center;
    overflow: hidden;
}

.hero-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Recorta y ajusta el video */
    z-index: 0; /* detrás del contenido */
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.124); /* mismo efecto que tenías con linear-gradient */
    z-index: 0;
}

.hero-container {
    width: 100%;
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 20px;
    z-index: 1;
}

.hero-content {
    width: 100%;
}

.hero-title {
    text-align: start;
    color: white;
    margin-bottom: 60px;
}

.hero-title .one-title {
    font-size: 4rem;
    font-weight: bold;
    margin: 0px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.hero-title .two-title {
    font-size: 3rem;
    font-weight: 300;
    margin: 0px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.search-wrapper {
    max-width: 85vw;
    margin: 0 auto;
}

.tabs-container {
    display: flex;
    max-width: 300px;
    gap: 20px;
}

.tab {
    padding: 15px 30px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 10px 10px 0 0;
}

.tab.active {
    background-color: #FFB41F;
    color: #000;
}

.tab:not(.active) {
    background-color: rgba(255,255,255,0.2);
    color: white;
}

.search-form {
    background-color: rgba(0, 0, 0, 0.321);
    backdrop-filter: blur(3px);
    padding: 30px;
    border-radius: 0 15px 15px 15px;
    margin-bottom: 30px;
    max-width: 65vw;
    border: 1px solid #ffffff;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr auto;
    gap: 30px;
    align-items: end;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group .labelsBanner {
    color: white;
    font-weight: 600;
    margin-bottom: 10px;
    font-size: 1rem;
}

.form-group .inpBanner,
.form-group .selBanner {
    background: transparent;
    border: none;
    border-bottom: 2px solid rgba(255,255,255,0.3);
    color: white;
    padding: 10px 0;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.form-group select option{
    color: #000;
}

.form-group .inpBanner:focus,
.form-group .selBanner:focus {
    outline: none;
    border-bottom-color: #FFB41F;
}

.form-group .inpBanner::placeholder {
    color: rgba(255,255,255,0.7);
}

.price-inputs {
    display: flex;
    gap: 15px;
}

.price-inputs input {
    width: 100%;
}

.search-btn {
    background-color: #FFB41F;
    color: #000;
    border: none;
    padding: 15px 25px;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: background-color 0.3s ease;
    white-space: nowrap;
}

.search-btn:hover {
    background-color: #FFB41F;
}

.sell-property {
    text-align: left;
}

.sell-btn {
    background: transparent;
    border: 2px solid white;
    color: white;
    padding: 15px 30px;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
}

.sell-btn:hover {
    background-color: white;
    color: #000;
}

.floating-buttons {
    position: fixed;
    right: 30px;
    bottom: 100px;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.float-btn {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 1.5rem;
    transition: transform 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

.float-btn:hover {
    transform: scale(1.1);
}

.whatsapp {
    background-color: #25d366;
    color: white;
}

.phone {
    background-color: #FFB41F;
    color: #000;
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

/* Responsive */
@media (max-width: 768px) {

    .hero-real-estate{
        padding-top: 100px;
    }

    .hero-container{
        padding: 0;
    }

    .hero-title{
        margin-bottom: 30px;
    }

    .hero-title .one-title {
        font-size: 1.5rem;
    }
    
    .hero-title .two-title {
        font-size: 1.5rem;
    }

    .search-wrapper {
        width: 100vw;
    }

    .search-form{
        max-width: 100%;
        border-radius: 0px 0px 15px 15px;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 0px !important;
    }

    .form-group .labelsBanner{
        margin-bottom: 0px;
    }

    .form-group .inpBanner{
        padding: 0;
    }
    
    .tabs-container {
        max-width: 100%;
    }
    
    .tab {
        flex: 1;
        text-align: center;
        padding: 10px 30px;
    }
    
    .floating-buttons {
        right: 20px;
        bottom: 80px;
    }

    .search-btn{
        padding: 10px 15px;
    }

    .sell-property{
        display: none;
    }
}

/* Nuevo diseño de inputs type radio */

/* Ocultar los input radio */
.tab-radio {
  display: none;
}

.tabs-container {
  display: flex;
  max-width: 300px;
  gap: 20px;
  justify-content: start;
}

.tab {
  padding: 15px 30px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  border-radius: 10px 10px 0 0;
  background-color: rgba(255, 255, 255, 0.2);
  color: white;
  text-align: center;
}

/* Responsive: adaptar el tamaño en móviles */
@media (max-width: 768px) {
  .tabs-container {
    max-width: 100%;
  }

  .tab {
    flex: 1;
    padding: 10px 30px;
  }
}

/* Estilo del tab activo basado en input:checked */
#ftop_category_0:checked + label,
#ftop_category_1:checked + label {
  background-color: #FFB41F;
  color: #000;
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
                const check1 = document.getElementById('ftop_category_0');
                const check2 = document.getElementById('ftop_category_1');
                const minPriceInput = document.getElementById('min_price');
                const maxPriceInput = document.getElementById('max_price');

                // Establecer la categoría basada en qué checkbox está seleccionado.
                let category = "general"; // Valor por defecto.
                if (check1.checked) category = "venta";
                if (check2.checked) category = "renta";

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
                const minPrice = minPriceInput.value.trim();
                const maxPrice = maxPriceInput.value.trim();
                if (minPrice) {
                    detailsParts.push(`desde-${minPrice}`);
                }
                if (maxPrice) {
                    detailsParts.push(`hasta-${maxPrice}`);
                }

                // Construcción final
                let detailsSegment = detailsParts.length ? '-' + detailsParts.join('-') : '';
                let finalUrl = `/${typeName}-en-${category}${detailsSegment}${queryParams}`;

                // Construir la URL final y redireccionar.
                window.location.href = finalUrl;
            });
        }
    });
</script>