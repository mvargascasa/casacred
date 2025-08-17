<section class="commitment-section">
    <div class="commitment-container">
        <div class="commitment-content">
            <div class="commitment-image">
                <img src="{{ asset('img/banner-sobre-nosotros.webp') }}" alt="Imagen del equipo" class="team-image">
            </div>
            <div class="commitment-text">
                <h2 class="commitment-title">
                    <span class="title-primary">Tu Inversión,</span><br>
                    <span class="title-secondary">Nuestro Compromiso</span>
                </h2>
                
                <div class="mission-vision">
                    <div class="section-block">
                        <h3 class="section-title">MISIÓN</h3>
                        <p class="section-description">
                            Asesorar a nuestros clientes en inversiones inmobiliarias con transparencia, compromiso 
                            e integridad, protegiendo siempre sus intereses y facilitando el acceso a vivienda propia.
                        </p>
                    </div>
                    
                    <div class="section-block">
                        <h3 class="section-title">VISIÓN</h3>
                        <p class="section-description">
                            Ser una empresa líder en el sector inmobiliario en Latinoamérica y Estados Unidos, 
                            fortaleciendo alianzas estratégicas que impulsen soluciones de financiamiento y 
                            promuevan el desarrollo de la comunidad latina.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.commitment-section {
    padding: 80px 0;
    background-color: #ffffff;
}

.commitment-container {
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 24px;
}

.commitment-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.commitment-image {
    display: flex;
    justify-content: center;
    align-items: center;
    order: 1;
}

.team-image {
    width: 100%;
    height: auto;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    object-fit: cover;
}

.commitment-text {
    max-width: 500px;
    order: 2;
}

.commitment-title {
    font-size: 2.5rem;
    line-height: 1.2;
    margin-bottom: 2.5rem;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.title-primary {
    color: #142743;
    font-weight: 400;
}

.title-secondary {
    color: #142743;
    font-weight: 800;
}

.mission-vision {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.section-block {
    margin-bottom: 1rem;
}

.section-title {
    font-size: 1.1rem;
    font-weight: 800;
    color: #1f2937;
    letter-spacing: 0.1em;
    margin-bottom: 0.75rem;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.section-description {
    font-size: 1rem;
    line-height: 1.6;
    color: #4b5563;
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

@media (max-width: 768px) {
    .commitment-content {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }
    
    .commitment-title {
        font-size: 2rem;
    }
    
    .commitment-text {
        max-width: 100%;
        order: 1;
    }

    .commitment-image{
        order: 2;
    }
    
    .commitment-section {
        padding: 0 0;
    }
    
    .commitment-container {
        padding: 0 16px;
    }
    
    .mission-vision {
        text-align: left;
    }

    .title-secondary{
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .commitment-title {
        font-size: 1.75rem;
    }
    
    .section-description {
        font-size: 0.95rem;
    }
}
</style>