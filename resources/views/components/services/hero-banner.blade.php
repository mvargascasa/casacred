<section class="hero-section">
    <div class="hero-container">
        <!-- Content overlay -->
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="hero-title-line">Conoce todos</span>
                    <span class="hero-title-two_line">nuestros servicios</span>
                </h1>
                
                <div class="hero-cta">
                    <button class="cta-button" data-bs-toggle="modal" data-bs-target="#modalAboutContact">
                        <span>Solicitar información</span>
                        <img width="30" src="{{ asset('img/flecha-derecha-boton-vender-propiedad-banner.webp') }}" alt="Imagen de Icono de Flecha a la derecha">
                    </button>
                </div>
            </div>
            
            <!-- Play video button -->
            {{-- <div class="play-video-container">
                <button class="play-video-btn">
                    <div class="play-video-circle">
                        <span class="play-video-text">PLAY VIDEO</span>
                        <div class="play-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                </button>
            </div> --}}
        </div>
    </div>
</section>

<style>
.hero-section {
    position: relative;
    height: 650px;
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), 
                url("{{ asset('img/imagen-fondo-servicios.webp') }}") center/cover;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero-container {
    width: 100%;
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 2rem;
}

.hero-content {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.hero-text {
    flex: 1;
}

.hero-title {
    font-size: 4rem;
    font-weight: 700;
    color: white;
    line-height: 1.1;
    margin: 0 0 2rem 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-title-line {
    display: block;
}

.hero-title-two_line{
    font-weight: 100;
}

.hero-cta {
    margin-top: 2rem;
}

.cta-button {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 2rem;
    background: transparent;
    border: 2px solid white;
    border-radius: 10px;
    color: white;
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.cta-button:hover {
    background: white;
    color: #333;
    transform: translateY(-2px);
}

.cta-arrow {
    width: 20px;
    height: 20px;
    color: #f59e0b;
    transition: transform 0.3s ease;
}

.cta-button:hover .cta-arrow {
    transform: translateX(4px);
    color: #f59e0b;
}

.play-video-container {
    flex-shrink: 0;
    margin-left: 2rem;
}

.play-video-btn {
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
}

.play-video-circle {
    position: relative;
    width: 120px;
    height: 120px;
    border: 2px solid white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.play-video-circle:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: scale(1.05);
}

.play-video-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-align: center;
    line-height: 1;
    margin-top: -8px;
}

.play-icon {
    position: absolute;
    bottom: 25px;
    left: 50%;
    transform: translateX(-50%);
    width: 24px;
    height: 24px;
    color: white;
}

.play-icon svg {
    width: 100%;
    height: 100%;
}

/* Responsive design */
@media (max-width: 768px) {
    .hero-section {
        height: 100vh;
    }
    
    .hero-content {
        flex-direction: column;
        text-align: center;
        gap: 2rem;
    }
    
    .hero-title {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    
    .play-video-container {
        margin-left: 0;
    }
    
    .play-video-circle {
        width: 100px;
        height: 100px;
    }
    
    .play-video-text {
        font-size: 0.65rem;
    }
    
    .play-icon {
        width: 20px;
        height: 20px;
        bottom: 20px;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-container {
        padding: 0 1rem;
    }
    
    .cta-button {
        padding: 0.875rem 1.5rem;
        font-size: 0.9rem;
    }
}
</style>
