<section class="hero-novedades">
    <div class="hero-container">
        <div class="hero-content">
            <!-- Título principal -->
            <div class="hero-title">
                <h1>
                    <span class="main-title">Novedades</span>
                    <br>
                    <span class="sub-title">inmobiliarias</span>
                </h1>
            </div>

            <!-- Botón de solicitar información -->
            <button class="hero-button" data-bs-toggle="modal" data-bs-target="#modalAboutContact">
                <span>Solicitar información</span>
                <img width="35px" src="{{ asset('img/flecha-derecha-boton-vender-propiedad-banner.webp') }}" alt="Icono de flecha a la derecha">
            </button>
        </div>
    </div>
</section>

<style>
.hero-novedades {
    position: relative;
    height: 70vh;
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url("{{ asset('img/banner-noticias-inmobiliaria.webp') }}");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero-container {
    width: 100%;
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 20px;
}

.hero-content {
    width: 100%;
    max-width: 85vw;
}

.hero-button {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 16px 32px;
    background: transparent;
    border: 2px solid white;
    border-radius: 15px;
    color: white;
    font-weight: 500;
    font-size: 1.125rem;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.hero-button:hover {
    background-color: white;
    color: #1f2937;
    text-decoration: none;
}

.hero-button:hover .hero-arrow {
    color: #f59e0b;
}

.hero-title {
    text-align: start;
    color: white;
    margin-bottom: 60px;
}

.hero-title .main-title {
    font-size: 4.5rem;
    font-weight: 700;
    margin: 0px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
    line-height: 1.1;
}

.hero-title .sub-title {
    font-size: 3.5rem;
    font-weight: 300;
    margin: 0px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
    line-height: 1.1;
}

.cta-wrapper {
    max-width: 85vw;
}


/* Responsive */
@media (max-width: 768px) {
    .hero-novedades {
        padding-top: 100px;
    }

    .hero-novedades{
        height: 100vh;
    }

    .hero-container {
        padding: 0 15px;
        max-width: 95vw;
    }

    .hero-content {
        max-width: 95vw;
    }

    .hero-title {
        margin-bottom: 40px;
    }

    .hero-title .main-title {
        font-size: 2.5rem;
    }
    
    .hero-title .sub-title {
        font-size: 2rem;
    }

    .cta-wrapper {
        max-width: 95vw;
    }

    .hero-button{
        font-size: 1rem;
    }

}

@media (max-width: 480px) {
    .hero-title .main-title {
        font-size: 2rem;
    }
    
    .hero-title .sub-title {
        font-size: 1.5rem;
    }
}
</style>
