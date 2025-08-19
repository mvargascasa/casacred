<section class="services-section">
    <div class="services-container">
        <!-- Converted from Tailwind to pure CSS classes -->
        <!-- Section Title -->
        <div class="section-title">
            <h2 class="title-text">
                Servicios de <span class="title-bold">Inmobiliarios</span>
            </h2>
        </div>

        <!-- Services Grid -->
        <div class="services-grid">

            <!-- Vender Propiedad Card -->
            @foreach ($services as $service)
                <div class="service-card">
                    <div class="card-image">
                        <img src="{{ asset('uploads/services/'.$service->headerimg) }}" alt="Imagen de Servicio {{ $service->title }}">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">{{ $service->title }}</h3>
                        <p class="card-description">
                            {{ $service->page_seocescription }}
                        </p>
                        <a href="{{ route('web.servicio', $service->slug) }}" class="card-button">
                            Más información
                            <img width="30" src="{{ asset('img/flecha-derecha-boton-vender-propiedad-banner.webp') }}" alt="Icono de flecha a la derecha">
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<style>
/* Replaced all Tailwind classes with pure CSS */
.services-section {
    padding: 4rem 0;
    background-color: #f9fafb;
}

.services-container {
    width: 100%;
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 2rem;
}

.section-title {
    text-align: center;
    margin-bottom: 3rem;
}

.title-text {
    font-size: 2.5rem;
    font-weight: 300;
    color: #6b7280;
    margin: 0;
    line-height: 1.2;
}

.title-bold {
    font-weight: 700;
    color: #1f2937;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
    margin: 0 auto;
}

.service-card {
    background: #F2F3F3;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.service-card:hover {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card-image {
    height: 16rem;
    overflow: hidden;
    background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.service-card:hover .card-image img {
    transform: scale(1.05);
}

.card-content {
    padding: 2rem;
}

.card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0 0 1rem 0;
    line-height: 1.3;
}

.card-description {
    color: #6b7280;
    font-size: 0.875rem;
    line-height: 1.6;
    margin: 0 0 1.5rem 0;
}

.card-button {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background-color: #1f2937;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 2rem;
    font-size: 0.875rem;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
}

.card-button:hover {
    background-color: #374151;
    color: #ffffff;
}

.button-arrow {
    width: 1rem;
    height: 1rem;
    color: #fbbf24;
    transition: transform 0.2s ease;
}

.card-button:hover .button-arrow {
    transform: translateX(0.25rem);
}

/* Responsive Design */
@media (max-width: 768px) {

    .services-container{
        padding: 0 0;
    }

    .services-section {
        padding: 2rem 0;
    }
    
    .title-text {
        font-size: 2rem;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .card-content {
        padding: 1.5rem;
    }
}
</style>
