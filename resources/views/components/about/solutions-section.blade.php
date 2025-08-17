<section class="solutions-section">
    <div class="solutions-container">
        <div class="solutions-content">
            <div class="solutions-text">
                <h2 class="solutions-title">
                    <span class="title-light">Soluciones reales</span><br>
                    <span class="title-bold">para tu inversión</span>
                </h2>
                <p class="solutions-description">
                    Con más de 15 años de experiencia, Grupo Housing Inmobiliaria ha asesorado a miles de 
                    familias ecuatorianas en su camino hacia la vivienda propia. Fundada por Homero 
                    Serrano, la empresa se distingue por su enfoque humano, profesional y creativo, 
                    ofreciendo servicios completos en gestión inmobiliaria, asesoría financiera y asistencia 
                    legal. Nuestro modelo se basa en la calidad, la innovación y la confianza, pilares que nos 
                    posicionan como una opción segura al momento de invertir.
                </p>
            </div>
            <div class="solutions-image">
                <img src="{{ asset('img/imagen-de-oficinas.webp') }}" alt="Imagen de Oficinas" class="office-image">
            </div>
        </div>
    </div>
</section>

<style>
.solutions-section {
    padding: 80px 0;
    background-color: #ffffff;
}

.solutions-container {
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 24px;
}

.solutions-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.solutions-title {
    font-size: 2.5rem;
    line-height: 1.2;
    margin-bottom: 2rem;
}

.title-light {
    color: #142743;
    font-weight: 400;
    font-size: 2rem;
}

.title-bold {
    color: #142743;
    font-weight: 700;
    font-size: 3rem;
}

.solutions-description {
    font-size: 1rem;
    line-height: 1.6;
    color: #142743;
    margin: 0;
}

.solutions-image {
    display: flex;
    justify-content: center;
    align-items: center;
}

.office-image {
    width: 100%;
    height: auto;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    object-fit: cover;
}

@media (max-width: 768px) {
    .solutions-content {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }
    
    .solutions-title {
        font-size: 2rem;
    }
    
    .solutions-text {
        max-width: 100%;
    }
    
    .solutions-section {
        padding: 60px 0;
    }
    
    .solutions-container {
        padding: 0 10px;
    }

    .title-light{
        font-size: 1.5rem;
    }

    .title-bold {
        font-size: 2rem;
    }
}

@media (max-width: 480px) {
    .solutions-title {
        font-size: 1.75rem;
    }
    
    .solutions-description {
        font-size: 0.95rem;
    }
}
</style>