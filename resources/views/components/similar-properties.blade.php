<section class="featured-properties">
    <div class="featured-container">
        <!-- Header -->
        <div class="section-header">
            <div class="section-title-featured">
                <h2>Propiedades <span class="highlight">similares</span></h2>
            </div>
        </div>

        <!-- Properties Grid -->
        <div class="properties-grid">
            @foreach($similarProperties as $property)
                <div class="property-card">
                    <!-- Property Image -->
                    <a href="/propiedad/{{$property->slug}}">
                        <div class="property-image">
                            <img src="{{ asset('uploads/listing/600/'.strtok($property->images, '|')) }}" alt="{{ $property->listing_title }}">
                            <div class="property-code"> <span>COD:</span> {{ $property->product_code }}</div>
                        </div>
                    </a>

                    <a href="/propiedad/{{$property->slug}}">
                        <!-- Property Content -->
                        <div class="property-content">
                            <!-- Title -->
                            <h3 class="property-title">{{ $property->listing_title }}</h3>
    
                            <!-- Location -->
                            <div class="property-location">
                                <div class="location-icon">
                                    <img loading="lazy" width="25px" src="{{ asset('img/ubicacion-icon.webp') }}" alt="Icono de Ubicacion" title="Icono de Ubicacion">
                                </div>
                                <span>{{ $property->address }}</span>
                            </div>
    
                            <!-- Property Features -->
                            <div class="property-features">
                                @if($property->bedroom > 0)
                                    <div class="feature">
                                        <div class="feature-icon">
                                            <img loading="lazy" width="25px" src="{{ asset('img/habitaciones-icon.webp') }}" alt="Icono de Habitaciones" title="Icono de Habitaciones">
                                        </div>
                                        <div>{{ $property->bedroom }} Hab.</div>
                                    </div>
                                
                                    <div class="feature-divider"></div>
                                @endif
    
                                @if($property->bathroom > 0)
                                <div class="feature">
                                    <div class="feature-icon">
                                        <img width="25px" src="{{ asset('img/baños-icon.webp') }}" alt="Icono de Baños" title="Icono de Baños">
                                    </div>
                                    <span>{{ $property->bathroom }} Baños</span>
                                </div>
    
                                <div class="feature-divider"></div>
    
                                @endif
    
                                @if($property->garage > 0)
                                
                                <div class="feature">
                                    <div class="feature-icon">
                                        <img width="25px" src="{{ asset('img/garage-icon.webp') }}" alt="Icono de Garaje" title="Icono de Garajes">
                                    </div>
                                    <span>{{ $property->garage }} Garajes</span>
                                </div>
    
                                @endif
                            </div>
    
                            <!-- Property Footer -->
                            <div class="property-footer">
                                <div class="property-price">
                                    @if($property->property_price > 0)
                                        $ {{ number_format($property->property_price, 0, ',', '.') }}
                                    @else
                                        {{ $property->customized_price }}
                                    @endif
                                </div>
                                <div class="property-action">
                                    <span class="view-property-btn">
                                        Ver Propiedad
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.featured-properties {
    background-color: #ffffff;
    padding: 80px 0;
    position: relative;
}

.featured-container {
    width: 100%;
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 20px;
}

/* Header Styles */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.section-title-featured h2 {
    font-size: 2.5rem;
    font-weight: 300;
    color: #64748b;
    line-height: 1.2;
}

.section-title-featured .highlight {
    color: #1e293b;
    font-weight: 700;
}

.view-all-btn {
    background-color: #142743;
    color: #ffffff;
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    transition: all 0.3s ease;
    display: inline-block;
}

.view-all-btn:hover {
    background-color: #334155;
    transform: translateY(-2px);
    color: #ffffff;
}

/* Properties Grid */
.properties-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin: 0 auto;
}

/* Property Card */
.property-card {
    background: rgb(234, 234, 234);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
}

.property-card:hover {
    
    
}

/* Property Image */
.property-image {
    position: relative;
    height: 340px;
    overflow: hidden;
    border-radius: 25px;
}

.property-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.property-card:hover .property-image img {
    transform: scale(1.05);
}

.property-code {
    position: absolute;
    top: 15px;
    left: 15px;
    background-color: #ffffff;
    color: #1e293b;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
}

.property-code span{
    font-weight: 700;
}

/* Property Content */
.property-content {
    padding: 25px;
}

.property-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1e293b;
    margin: 0 0 15px 0;
    line-height: 1.4;
}

/* Location */
.property-location {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    color: #64748b;
    font-size: 1rem;
}

.location-icon {
    width: 25px;
    height: 25px;
    color: #94a3b8;
}

.location-icon svg {
    width: 100%;
    height: 100%;
}

/* Property Features */
.property-features {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 25px;
    padding: 15px 0;
    border-top: 1px solid #e2e8f0;
    border-bottom: 1px solid #e2e8f0;
}

.feature {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
    color: #64748b;
    font-size: 0.9rem;
    font-weight: 300;
}

.feature-icon {
    width: 16px;
    height: 16px;
    color: #94a3b8;
}

.feature-icon svg {
    width: 100%;
    height: 100%;
}

.feature-divider {
    width: 1px;
    height: 30px;
    background-color: #94a3b8;
}

/* Property Footer */
.property-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    background-color: #ffffff;
    border-radius: 25px;
}

.property-price {
    font-size: 1rem;
    font-weight: 400;
    color: #1e293b;
    padding: 0 0 0 25px;
}

.view-property-btn {
    background-color: #142743;
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    display: inline-block;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .properties-grid {
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 25px;
    }
    
    .section-title-featured h2 {
        font-size: 2.2rem;
    }
}

@media (max-width: 768px) {
    .featured-properties {
        padding: 60px 0;
    }
    
    .container {
        padding: 0 15px;
    }
    
    .section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 25px;
        margin-bottom: 40px;
    }
    
    .section-title-featured h2 {
        font-size: 1.8rem;
    }
    
    .view-all-btn {
        padding: 12px 25px;
        font-size: 0.9rem;
    }
    
    .properties-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .property-image {
        height: 250px;
        border-radius: 5px;
    }
    
    .property-content {
        padding: 20px;
    }
    
    .property-title {
        font-size: 1.1rem;
    }
    
    .property-features {
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .feature-divider {
        display: none;
    }
    
    .property-price {
        font-size: 1.3rem;
    }
    
    .view-property-btn {
        width: 100%;
        text-align: center;
        padding: 15px;
    }

    .featured-container {
        padding: 0px;
    }
}

@media (max-width: 480px) {
    .featured-properties {
        padding: 40px 0;
    }
    
    .section-title-featured h2 {
        font-size: 1.6rem;
    }
    
    .properties-grid {
        grid-template-columns: 1fr;
    }
    
    .property-card {
        border-radius: 15px;
    }
    
    .property-image {
        height: 220px;
    }
    
    .property-content {
        padding: 18px;
    }
    
    .property-title {
        font-size: 1rem;
        margin-bottom: 12px;
    }
    
    .property-location {
        font-size: 0.85rem;
        margin-bottom: 15px;
    }
    
    .property-features {
        padding: 12px 0;
        margin-bottom: 20px;
    }
    
    .feature {
        font-size: 0.8rem;
    }
    
    .property-price {
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .view-property-btn {
        font-size: 0.85rem;
        padding: 12px;
    }
}

/* Animaciones de entrada */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.property-card {
    animation: fadeInUp 0.6s ease forwards;
}

.property-card:nth-child(1) { animation-delay: 0.1s; }
.property-card:nth-child(2) { animation-delay: 0.2s; }
.property-card:nth-child(3) { animation-delay: 0.3s; }

/* Estado inicial para animación */
.property-card {
    opacity: 0;
    transform: translateY(30px);
}

/* Mejoras de accesibilidad */
.view-property-btn:focus,
.view-all-btn:focus {
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .property-card,
    .property-image img,
    .view-property-btn,
    .view-all-btn {
        transition: none;
        animation: none;
    }
}

/* Hover effects mejorados */
.property-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
    border-radius: 20px;
}

.property-card:hover::before {
    opacity: 1;
}

.property-card:hover .view-property-btn{
    background-color: #FFB41F;
    color: #1e293b;
}

.property-card:hover .property-code{
    background-color: #142743;
    color: #ffffff;
}
</style>