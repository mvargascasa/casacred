<section class="real-estate-services" style="background-image: url('{{ asset($backgroundImage) }}')">
    <div class="services-overlay">
        <div class="services-container">
            <div class="services-content">
                <!-- Left Content -->
                <div class="services-info">
                    <div class="section-title-services">
                        <h2>
                            <span class="title-light-services">{{ $sectionTitle }}</span>
                            <span class="title-bold-services">{{ $sectionSubtitle }}</span>
                        </h2>
                    </div>
                    
                    <div class="section-action-services">
                        <a href="{{ $viewAllLink }}" class="view-all-btn-services">{{ $viewAllText }}</a>
                    </div>
                </div>

                <!-- Services Grid -->
                <div class="services-grid">
                    @foreach($services as $service)
                        <div class="service-card" 
                             data-service="{{ $service['id'] }}"
                             data-bs-toggle="modal" 
                             data-bs-target="{{ $service['action'] }}"
                             >
                            
                            <div class="service-icon">
                                <div class="icono-services"></div>
                            </div>

                            <div class="service-content">
                                <h3 class="service-title">
                                    <span class="service-title-main">{{ $service['title'] }}</span>
                                    <span class="service-title-sub">{{ $service['subtitle'] }}</span>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="section-action-mobile">
                    <a href="{{ $viewAllLink }}" class="view-all-btn-services">{{ $viewAllText }}</a>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
.icono-services {
  width: 50px;
  height: 50px;
  background-color: white; /* color inicial */
  
  /* Máscara genérica */
  -webkit-mask-image: url('/img/icono-de-casas.webp');
  -webkit-mask-repeat: no-repeat;
  -webkit-mask-size: contain;
  -webkit-mask-position: center;
  
  mask-repeat: no-repeat;
  mask-size: contain;
  mask-position: center;
  
  transition: background-color 0.3s ease;
}

.real-estate-services {
    position: relative;
    min-height: 70vh;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.services-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.services-container {
    height: 100%;
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
}

.section-action-mobile{
    display: none;
}

.services-content {
    width: 1300px;
    display: grid;
    grid-template-columns: 1fr 2fr;
    align-items: center;
    background-color: #142743;
    padding: 40px 40px;
    border-radius: 10px;
}

/* Left Content */
.services-info {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.section-title-services h2 {
    font-size: 2.5rem;
    margin: 0;
    line-height: 1.1;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.title-light-services {
    color: #ffffff;
    font-weight: 100;
}

.title-bold-services {
    color: white;
    font-weight: 700;
    background: linear-gradient(45deg, #ffffff 0%, #f1f5f9 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.view-all-btn-services {
    background: transparent;
    border: 2px solid #fbbf24;
    color: #ffffff;
    padding: 18px 35px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: inline-block;
    position: relative;
    overflow: hidden;
    max-width: fit-content;
}

.view-all-btn-services::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(251, 191, 36, 0.2), transparent);
    transition: left 0.6s ease;
}

.view-all-btn-services:hover::before {
    left: 100%;
}

.view-all-btn-services:hover {
    background-color: #fbbf24;
    color: #1e3a5f;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(251, 191, 36, 0.4);
}

/* Services Grid */
.services-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.service-card {
    background: rgba(255, 255, 255, 0.05);
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 40px 30px;
    text-align: center;
    position: relative;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
    overflow: hidden;
    min-height: 280px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.service-card::before {
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
}

.service-card:hover::before {
    opacity: 1;
}

.service-card:hover {
    transform: translateY(-10px);
    border-color: #fbbf24;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.service-card:hover .service-icon{
    border: 2px solid #fbbf24;
}

.service-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 25px;
    transition: all 0.3s ease;
}

.service-icon svg {
    width: 40px;
    height: 40px;
    color: white;
    transition: all 0.3s ease;
}

.service-card:hover .service-icon svg{
    color: #fbbf24;
}

.service-content {
    position: relative;
    z-index: 2;
}

.service-title {
    font-size: 1.4rem;
    font-weight: 600;
    color: white;
    margin: 0;
    line-height: 1.3;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.service-title-main {
    font-weight: 400;
}

.service-title-sub {
    font-weight: 700;
}

.service-description {
    text-align: center;
    color: white;
}

.service-description p {
    font-size: 1rem;
    margin: 0 0 20px 0;
    line-height: 1.5;
}

.service-link {
    color: #fbbf24;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.service-link:hover {
    transform: translateX(5px);
}

.service-link svg {
    width: 16px;
    height: 16px;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .services-content {
        gap: 60px;
    }
    
    .section-title-services h2 {
        font-size: 3.5rem;
    }
    
    .services-grid {
        gap: 25px;
    }
    
    .service-card {
        padding: 35px 25px;
        min-height: 260px;
    }
}

@media (max-width: 992px) {
    .real-estate-services {
        background-attachment: scroll;
    }
    
    .services-content {
        grid-template-columns: 1fr;
        gap: 50px;
        text-align: center;
    }
    
    .section-title-services h2 {
        font-size: 3rem;
    }
    
    .services-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    
    .service-card {
        padding: 30px 20px;
        min-height: 240px;
    }
    
    .service-icon {
        width: 70px;
        height: 70px;
        margin-bottom: 20px;
    }
    
    .service-icon svg {
        width: 35px;
        height: 35px;
    }
    
    .service-title {
        font-size: 1.2rem;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 15px;
    }
    
    .services-content {
        gap: 40px;
        min-height: auto;
        padding: 60px 0;
        width: 100vw;
        justify-content: center;
        border-radius: 0px;
    }
    
    .section-title-services h2 {
        font-size: 2.5rem;
    }
    
    .view-all-btn-services {
        padding: 15px 30px;
        font-size: 1rem;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        padding: 0 20px;
    }
    
    .service-card {
        padding: 35px 25px;
        min-height: 220px;
    }
    .services-overlay{
        position: relative;
    }

    .section-action-services{
        display: none;
    }

    .section-action-mobile{
        display: block;
    }
}

@media (max-width: 480px) {
    .services-content {
        padding: 40px 0;
    }
    
    .section-title-services h2 {
        font-size: 2rem;
    }
    
    .service-card {
        padding: 30px 20px;
        min-height: 200px;
    }
    
    .service-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 15px;
    }
    
    .service-icon svg {
        width: 30px;
        height: 30px;
    }
    
    .service-title {
        font-size: 1.1rem;
    }
}

/* Animaciones de entrada */
@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

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

.services-info {
    animation: fadeInLeft 0.8s ease forwards;
}

.service-card {
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
    transform: translateY(30px);
}

.service-card:nth-child(1) { animation-delay: 0.2s; }
.service-card:nth-child(2) { animation-delay: 0.4s; }
.service-card:nth-child(3) { animation-delay: 0.6s; }

/* Efectos adicionales */
.services-overlay::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(251, 191, 36, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

/* Mejoras de accesibilidad */
.service-card:focus,
.view-all-btn-services:focus,
.service-link:focus {
    outline: 2px solid #fbbf24;
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .service-card,
    .service-icon,
    .view-all-btn-services,
    .service-link,
    .services-info {
        animation: none;
        transition: none;
    }
    
    .service-card {
        opacity: 1;
        transform: translateY(0);
    }
    
    .services-overlay::before {
        animation: none;
    }
}
</style>