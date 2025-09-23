<section class="hero-real-estate">

    <video class="hero-video" autoplay muted loop playsinline preload="none">
        <source src="{{ asset('img/grupo-housing-inmobiliaria-en-cuenca-banner-mobile.webm') }}" type="video/webm">
        {{-- <source src="{{ asset('img/banner-home.mp4') }}" type="video/mp4"> --}}
        Tu navegador no soporta videos en HTML5.
    </video>

    <!-- Overlay oscuro -->
    <div class="overlay"></div>

    <div class="hero-container">
        <!-- Texto principal -->
        <div class="hero-title">
            <p id="hero-text">
                <span class="one-title">Tu futuro hogar</span>
                <br>
                <span class="two-title">te está esperando</span>
            </p>
        </div>

        <!-- Texto con efecto typewriter -->
        <div id="hero-services" class="hero-services">
            <p><span id="typewriter"></span></p>
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
                            <option data-ids="[26,10]" value="15">Terrenos</option>
                            <option data-ids="[25,5]" value="3">Casas Comerciales</option> 
                            <option data-ids="[32,6]" value="4">Locales Comerciales</option> 
                            <option data-ids="[36,8]" value="11">Suites</option> 
                            <option data-ids="[37]" value="5">Edificios</option> 
                            <option data-ids="[39]" value="6">Hoteles</option> 
                            <option data-ids="[41]" value="7">Fabricas</option> 
                            <option data-ids="[42]" value="8">Parqueaderos</option> 
                            <option data-ids="[43]" value="9">Bodegas</option> 
                            <option data-ids="[35,7]" value="10">Oficinas</option> 
                            <option data-ids="[29,9]" value="12">Quintas</option> 
                            <option data-ids="[30,30]" value="13">Haciendas</option> 
                            <option data-ids="[45]" value="14">Naves Industriales</option> 
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

.hero-services {
    color: white;
    font-size: 2rem;
    font-weight: bold;
    z-index: 1;
    text-align: center;
    margin: 40px 0 100px 0; /* Espaciado vertical entre título y filtros */
    line-height: 1.3;
    height: 20px;
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
    background: rgba(0, 0, 0, 0.211);
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
    margin-top: 200px;
    margin-bottom: 100px; /* reducido para dar espacio al nuevo texto */
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

.selBanner{
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;

    background-image: url("data:image/svg+xml;utf8,<svg fill='white' height='32' viewBox='0 0 24 24' width='32' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 28px;
}

.inpBanner:focus, .selBanner:focus{
    outline: none;
    box-shadow: none;
    border-color: inherit;
}

.inpBanner::placeholder {
    color: rgb(255, 255, 255);
}

.selBanner option {
    color: black;
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

    .hero-services {
        font-size: 1.5rem;
        margin: 30px 0;
    }
    .scroll-arrow{
        display: none;
    }
}

@media (max-width: 480px) {
    .hero-title .one-title {
        font-size: 1.8rem;
    }
    .hero-title .two-title {
        font-size: 1.4rem;
    }
    .hero-services {
        font-size: 1.1rem;
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

#hero-text{
    line-height: 1.2;
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
        // Scroll suave
        const scrollButton = document.getElementById('scroll-button');
        const targetSection = document.getElementById('section-property-categories');

        scrollButton.addEventListener('click', function() {
            if (targetSection) {
                const sectionPosition = targetSection.getBoundingClientRect().top;
                const offset = -20;
                const finalPosition = sectionPosition + window.scrollY + offset;
                window.scrollTo({
                    top: finalPosition,
                    behavior: 'smooth'
                });
            }
        });

        // Textos dinámicos del título
        const texts = [
            { one: "Tu nuevo hogar", two: "te está esperando" },
            { one: "Encuentra tu casa", two: "ideal en pocos pasos" },
            { one: "Haz realidad tus", two: "sueños inmobiliarios" },
            { one: "Vive la experiencia", two: "de un nuevo comienzo" }
        ];

        let index = 0;
        const heroText = document.getElementById("hero-text");
        const oneSpan = heroText.querySelector(".one-title");
        const twoSpan = heroText.querySelector(".two-title");

        function changeText() {
            heroText.classList.remove("show");

            setTimeout(() => {
                index = (index + 1) % texts.length;
                oneSpan.textContent = texts[index].one;
                twoSpan.textContent = texts[index].two;
                heroText.classList.add("show");
            }, 1000);
        }

        heroText.classList.add("show");
        setInterval(changeText, 4000);

        // Formulario búsqueda
        const searchForm = document.getElementById('searchForm');
        if (searchForm) {
            searchForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const typeSelect = document.getElementById('ftop_ptype');
                const searchInput = document.getElementById('searchtxt');
                const operationType = document.getElementById('ftop_category');
                let category = "general";
                if(operationType.value != ""){
                    category = operationType.value;
                }
                let typeName = typeSelect.options[typeSelect.selectedIndex].text.toLowerCase().replace(
                    /\s+/g, '-');
                if (!typeSelect.value || typeName === 'tipo-de-propiedad') {
                    typeName = 'propiedades';
                }
                const searchTerm = searchInput.value.trim();
                let queryParams = '';
                if (searchTerm) {
                    queryParams = `?searchTerm=${encodeURIComponent(searchTerm)}`;
                }
                let finalUrl = `/${typeName}-en-${category}${queryParams}`;
                window.location.href = finalUrl;
            });
        }

        // Typewriter effect corregido
        const words = ["Vende tu propiedad", "Compra tu vivienda", "Avalúo de tu propiedad"];
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        const typewriterElement = document.getElementById("typewriter");

        function typeEffect() {
            const currentWord = words[wordIndex];

            if (!isDeleting) {
                typewriterElement.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
            } else {
                typewriterElement.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--;
            }

            let typingSpeed = isDeleting ? 70 : 120; // más rápido

            if (!isDeleting && charIndex === currentWord.length) {
                typingSpeed = 2000; // pausa al terminar palabra completa
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                wordIndex = (wordIndex + 1) % words.length;
                typingSpeed = 300;
            }

            setTimeout(typeEffect, typingSpeed);
        }

        if (typewriterElement) {
            typeEffect();
        }
    });
</script>
