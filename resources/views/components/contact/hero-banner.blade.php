<section class="hero-section">
    <div class="hero-background">
        <div class="hero-overlay"></div>
    </div>
    
    <div class="hero-content">
        <div class="hero-container">
            <div class="hero-text">
                <h1>
                    <span class="hero-title">Asesoría inmobiliaria</span>
                    <br>
                    <span class="hero-subtitle">especializada</span>
                </h1>
                <button class="hero-button" data-bs-toggle="modal" data-bs-target="#modalAboutContact">
                    <span>Solicitar información</span>
                    <img width="35px" src="{{ asset('img/flecha-derecha-boton-vender-propiedad-banner.webp') }}" alt="Icono de flecha a la derecha">
                </button>
            </div>
        </div>
    </div>
</section>

<style>
.hero-section {
    position: relative;
    height: 70vh;
    width: 100%;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('{{ asset("/img/banner-sobre-nosotros.webp") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.4);
}

.hero-content {
    position: relative;
    z-index: 10;
    display: flex;
    align-items: center;
    height: 100%;
}

.hero-container {
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
}

.hero-text {
    max-width: 700px;
}

.hero-title {
    font-size: 3.9rem;
    font-weight: bold;
    color: white;
    margin-bottom: 0.5rem;
    line-height: 1.1;
}

.hero-subtitle {
    font-size: 3rem;
    font-weight: 300;
    color: white;
    margin-bottom: 3rem;
    line-height: 1.2;
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
    margin-top: 30px;
}

.hero-button:hover {
    background-color: white;
    color: #1f2937;
    text-decoration: none;
}

.hero-arrow {
    width: 20px;
    height: 20px;
    color: #fbbf24;
    transition: color 0.3s ease;
}

.hero-button:hover .hero-arrow {
    color: #f59e0b;
}

@media (max-width: 768px) {

    .hero-section {
        position: relative;
        height: 100vh;
        width: 100%;
        overflow: hidden;
    }

    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.75rem;
    }
    
    .hero-container {
        padding: 0 0px;
    }

    .hero-button{
        font-size: 1rem;
    }
}
</style>