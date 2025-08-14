<section class="property-categories" id="section-property-categories">
    <div class="categories-container">
        <!-- Título -->
        <div class="section-title-categories">
            <h2>Explora Nuestras <span class="highlight">Propiedades</span></h2>
        </div>

        <!-- Grid de categorías -->
        <div class="categories-grid">
            @foreach($categories as $category)
            <a href="{{ $category['url'] }}">
                <div class="category-card {{ $category['active'] ? 'active' : '' }}" 
                     data-category="{{ $category['id'] }}">
                    
                    <!-- Icono -->
                    <div class="category-icon">
                        @switch($category['icon'])
                            @case('house')
                                <div class="icono icon-casa"></div>
                                @break
                            
                            @case('building')
                                <div class="icono icon-building"></div>
                                @break
                            
                            @case('store')
                                <div class="icono icon-store"></div>
                                @break
                            
                            @case('terrain')
                                <div class="icono icon-terrain"></div>
                                @break
                            
                            @case('cabin')
                                <div class="icono icon-cabin"></div>
                                @break
                        @endswitch
                    </div>

                    <!-- Contenido -->
                    <div class="category-content">
                        <h3 class="category-name">{{ $category['name'] }}</h3>
                        <p class="category-count">{{ $category['count'] }} Propiedades</p>
                    </div>

                    <!-- Efecto hover -->
                    <div class="hover-overlay"></div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<style>
.icono {
  width: 50px;
  height: 50px;
  background-color: white; /* color inicial */
  
  /* Máscara genérica */
  -webkit-mask-repeat: no-repeat;
  -webkit-mask-size: contain;
  -webkit-mask-position: center;
  
  mask-repeat: no-repeat;
  mask-size: contain;
  mask-position: center;
  
  transition: background-color 0.3s ease;
}

.icon-casa { 
  -webkit-mask-image: url('/img/icono-de-casas.webp');
  mask-image: url('/img/icono-de-casas.webp');
}

.icon-building { 
  -webkit-mask-image: url('/img/icono-de-departamentos.webp');
  mask-image: url('/img/icono-de-departamentos.webp');
}

.icon-store { 
  -webkit-mask-image: url('/img/icono-de-casas-comerciales.webp');
  mask-image: url('/img/icono-de-casas-comerciales.webp');
}

.icon-terrain { 
  -webkit-mask-image: url('/img/icono-de-terrenos.webp');
  mask-image: url('/img/icono-de-terrenos.webp');
}

.icon-cabin { 
  -webkit-mask-image: url('/img/icono-de-quintas.webp');
  mask-image: url('/img/icono-de-quintas.webp');
}

.property-categories {
    background: #142743;
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

.property-categories::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.02)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.02)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.01)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    pointer-events: none;
}

.categories-container {
    width: 100%;
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 20px;
}

.section-title-categories {
    text-align: center;
    margin-bottom: 60px;
}

.section-title-categories h2 {
    font-size: 3rem;
    font-weight: 300;
    color: white;
    margin: 0;
}

.section-title-categories .highlight {
    font-weight: 700;
    background: linear-gradient(45deg, #ffffff, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    max-width: 1600px;
    margin: 0 auto;
}

.category-card {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 40px 30px;
    text-align: center;
    position: relative;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
    overflow: hidden;
}

/* .category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
} */

.category-card:hover::before {
    opacity: 1;
}

.category-card:hover {
    transform: translateY(-8px);
    border-color: rgba(255, 255, 255, 0.3);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.category-card:hover {
    border-color: #fbbf24;
    /* background: rgba(251, 191, 36, 0.1); */
    box-shadow: 0 0 30px rgba(251, 191, 36, 0.3);
}

.category-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
    transition: all 0.3s ease;
}

.category-card:hover .category-icon {
    background: rgba(251, 191, 36, 0.2);
    border-color: #fbbf24;
}

.category-icon svg {
    width: 36px;
    height: 36px;
    color: white;
    transition: all 0.3s ease;
}

.category-card:hover .category-icon .icono {
    background-color: #fbbf24;
    transform: scale(1.1);
}

.category-card:hover .category-icon {
    transform: scale(1.05);
    background: rgba(255, 255, 255, 0.15);
}

.category-content {
    position: relative;
    z-index: 2;
}

.category-name {
    font-size: 1.3rem;
    font-weight: 600;
    color: white;
    margin: 0 0 10px 0;
    transition: color 0.3s ease;
}

.category-card:hover .category-name {
    color: #ffffff;
}

.category-count {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.7);
    margin: 0;
    font-weight: 400;
    transition: color 0.3s ease;
}

.category-card:hover .category-count {
    color: #ffffff;
}

.hover-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, rgba(251, 191, 36, 0.1) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.category-card:hover .hover-overlay {
    opacity: 1;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .categories-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }
    
    .section-title-categories h2 {
        font-size: 2.5rem;
    }
}

@media (max-width: 768px) {
    .property-categories {
        padding: 60px 0;
    }
    
    .categories-container {
        padding: 0 15px;
    }
    
    .section-title-categories {
        margin-bottom: 40px;
    }
    
    .section-title-categories h2 {
        font-size: 2rem;
        line-height: 1.2;
    }
    
    .categories-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .category-card {
        padding: 30px 20px;
    }
    
    .category-icon {
        width: 70px;
        height: 70px;
        margin-bottom: 25px;
    }
    
    .category-icon svg {
        width: 32px;
        height: 32px;
    }
    
    .category-name {
        font-size: 1.3rem;
    }
}

@media (max-width: 480px) {
    .property-categories {
        padding: 40px 0;
    }
    
    .section-title h2 {
        font-size: 1.8rem;
    }
    
    .category-card {
        padding: 25px 15px;
    }
    
    .category-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 20px;
    }
    
    .category-icon svg {
        width: 28px;
        height: 28px;
    }
    
    .category-name {
        font-size: 1.2rem;
    }
    
    .category-count {
        font-size: 0.9rem;
    }
}

/* Animaciones adicionales */
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

.category-card {
    animation: fadeInUp 0.6s ease forwards;
}

.category-card:nth-child(1) { animation-delay: 0.1s; }
.category-card:nth-child(2) { animation-delay: 0.2s; }
.category-card:nth-child(3) { animation-delay: 0.3s; }
.category-card:nth-child(4) { animation-delay: 0.4s; }
.category-card:nth-child(5) { animation-delay: 0.5s; }

/* Estados de carga inicial */
.category-card {
    opacity: 0;
    transform: translateY(30px);
}

/* Efectos de interacción mejorados */
.category-card:active {
    transform: translateY(-4px) scale(0.98);
}

/* Mejoras para accesibilidad */
.category-card:focus {
    outline: 2px solid #fbbf24;
    outline-offset: 4px;
}

@media (prefers-reduced-motion: reduce) {
    .category-card,
    .category-icon,
    .category-icon svg,
    .hover-overlay,
    .category-card::before {
        transition: none;
        animation: none;
    }
}
</style>