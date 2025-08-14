<section class="sell-rent-cta">
    <div class="sell-rent-cta-container">
        <div class="cta-banner">
            <div class="cta-content">
                <div class="cta-text">
                    <h2 class="cta-title">
                        <span>Vende o renta </span> con nosotros
                        <br>
                        tu propiedad
                    </h2>
                </div>
                
                <div class="cta-action">
                    <a href="{{ $buttonLink }}" class="cta-button">
                        {{ $buttonText }}
                    </a>
                </div>
            </div>
            
            <div class="cta-image">
                <div class="image-container">
                    <img src="/img/sell-rent-cta-image.webp" alt="Vende tu propiedad con nosotros" class="hand-house-image">
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.sell-rent-cta {
    padding: 60px 0;
    background-color: #f8fafc;
}

.sell-rent-cta-container {
    width: 100%;
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 20px;
}

.cta-banner {
    background: #1e293b;
    border-radius: 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 50px 60px;
    position: relative;
    overflow: hidden;
    min-height: 280px;
    box-shadow: 0 20px 60px rgba(30, 58, 95, 0.3);
}

.cta-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 35px;
    position: relative;
    z-index: 2;
}



.cta-title {
    font-size: 3rem;
    font-weight: 300;
    line-height: 1.2;
    margin: 0;
    color: white;
    gap: 5px;
}

.cta-title span{
    font-weight: 700;
}

.cta-action {
    display: flex;
    align-items: center;
}

.cta-button {
    background: transparent;
    border: 2px solid #fbbf24;
    color: #ffffff;
    padding: 18px 40px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    display: inline-block;
}

.cta-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(251, 191, 36, 0.2), transparent);
    transition: left 0.6s ease;
}

.cta-button:hover::before {
    left: 100%;
}

.cta-button:hover {
    background-color: #fbbf24;
    color: #1e3a5f;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(251, 191, 36, 0.4);
}

.cta-button:active {
    transform: translateY(-1px);
}

.cta-image {
    flex-shrink: 0;
    position: relative;
    z-index: 2;
}

.image-container {
    width: 400px;
    height: 280px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hand-house-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.3));
    transition: transform 0.3s ease;
}

.cta-banner:hover .hand-house-image {
    transform: scale(1.05) translateY(-5px);
}

/* Efectos adicionales */
.cta-banner::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(251, 191, 36, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    pointer-events: none;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .cta-banner {
        padding: 40px 50px;
    }
    
    .cta-title {
        font-size: 2.5rem;
    }
    
    .image-container {
        width: 350px;
        height: 250px;
    }
}

@media (max-width: 992px) {
    .cta-banner {
        flex-direction: column;
        text-align: center;
        padding: 50px 40px;
        gap: 40px;
    }
    
    .cta-content {
        align-items: center;
        gap: 30px;
    }
    
    .cta-text {
        max-width: none;
    }
    
    .cta-title {
        text-align: center;
    }
    
    .image-container {
        width: 300px;
        height: 200px;
    }
}

@media (max-width: 768px) {
    .sell-rent-cta {
        padding: 40px 0;
    }
    
    .sell-rent-cta-container {
        padding: 0;
    }
    
    .cta-banner {
        border-radius: 20px;
        padding: 40px 30px;
        min-height: auto;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .cta-button {
        padding: 15px 35px;
        font-size: 1rem;
    }
    
    .image-container {
        width: 250px;
        height: 180px;
    }
}

@media (max-width: 480px) {
    .cta-banner {
        padding: 30px 20px;
        border-radius: 15px;
    }
    
    .cta-title {
        font-size: 1.6rem;
    }
    
    .cta-button {
        padding: 12px 30px;
        font-size: 0.9rem;
        width: 100%;
        text-align: center;
    }
    
    .image-container {
        width: 200px;
        height: 150px;
    }
}

/* Animaciones de entrada */
@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
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

.cta-text {
    animation: slideInLeft 0.8s ease forwards;
}

.cta-action {
    animation: fadeInUp 0.8s ease forwards 0.2s;
    opacity: 0;
}

.cta-image {
    animation: slideInRight 0.8s ease forwards 0.4s;
    opacity: 0;
}

/* Mejoras de accesibilidad */
.cta-button:focus {
    outline: 3px solid rgba(251, 191, 36, 0.5);
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .cta-button,
    .hand-house-image,
    .cta-text,
    .cta-action,
    .cta-image {
        animation: none;
        transition: none;
    }
    
    .cta-text,
    .cta-action,
    .cta-image {
        opacity: 1;
    }
}

/* Hover effects mejorados */
.cta-banner:hover::after {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 0.1;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.2;
    }
    100% {
        transform: scale(1);
        opacity: 0.1;
    }
}
</style>