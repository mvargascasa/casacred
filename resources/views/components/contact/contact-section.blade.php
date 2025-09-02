{{-- resources/views/components/contact-section.blade.php --}}
<div class="contact-section">
    <div class="contact-cards-container">
        
        {{-- Tarjeta de Ubicación --}}
        <div class="contact-card location-card">
            <div class="card-content">
                <div class="icon-container">
                    <div class="icon location-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                        </svg>
                    </div>
                </div>
                <h3>Ubicación</h3>
                <p class="contact-detail">{{ $ubicacion }}</p>
                <a href="#containerMap" class="action-button secondary-button">Ver mapa</a>
            </div>
        </div>

        {{-- Tarjeta de Teléfono --}}
        <div class="contact-card phone-card">
            <div class="card-content">
                <div class="icon-container">
                    <div class="icon phone-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M3 4h18v16H3z" stroke="currentColor" stroke-width="2" fill="none" rx="2"/>
                            <path d="M7 8h10M7 12h10M7 16h6" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <h3>Teléfono</h3>
                <p class="contact-detail">{{ $telefono }}</p>
                <a href="tel:+593967867998" class="action-button secondary-button">Contactar</a>
            </div>
        </div>

        {{-- Tarjeta de E-mail --}}
        <div class="contact-card email-card">
            <div class="card-content">
                <div class="icon-container">
                    <div class="icon email-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="2" y="4" width="20" height="16" rx="2" stroke="currentColor" stroke-width="2" fill="none"/>
                            <path d="M2 6l10 7L22 6" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <h3>E-mail</h3>
                <p class="contact-detail">{{ $email }}</p>
                <a href="mailto:info@grupohousing.com" class="action-button secondary-button">Enviar correo</a>
            </div>
        </div>
        
    </div>
</div>

<style>
.contact-section {
    padding: 60px 20px;
    background: linear-gradient(135deg, #142743 0%, #142743 100%);
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    max-width: 1200px;
    width: 100%;
}

.contact-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 40px 30px;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    cursor: pointer;
}

.contact-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 40%, rgba(255, 255, 255, 0.02) 50%, transparent 60%);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

.contact-card:hover::before {
    transform: translateX(100%);
}

.contact-card:hover {
    transform: translateY(-10px);
    border-color: rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.08);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.contact-card:hover {
    border-color: #ffa726;
}
.phone-card, .email-card {
    border-color: rgba(255, 255, 255, 0.2);
}

.card-content {
    position: relative;
    z-index: 2;
}

.icon-container {
    margin-bottom: 25px;
}

.icon {
    width: 70px;
    height: 70px;
    margin: 0 auto;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    position: relative;
}

.contact-card:hover .icon{
    background: linear-gradient(135deg, #ff9800 0%, #ffa726 100%);
    color: #ffffff;
}

.phone-icon, .email-icon, .location-icon {
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.contact-card:hover .icon {
    transform: scale(1.1) rotate(5deg);
}

.contact-card:hover .location-icon,
.contact-card:hover .phone-icon,
.contact-card:hover .email-icon
{
    background: linear-gradient(135deg, #ffa726 0%, #ffb74d 100%);
    box-shadow: 0 10px 30px rgba(255, 152, 0, 0.4);
}

h3 {
    color: #ffffff;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
    letter-spacing: -0.5px;
}

.contact-detail {
    color: rgba(255, 255, 255, 0.8);
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 30px;
    font-weight: 400;
}

.action-button {
    padding: 12px 32px;
    border-radius: 25px;
    border: none;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    text-transform: none;
}

.contact-card:hover .action-button {
    background: linear-gradient(135deg, #ff9800 0%, #ffa726 100%);
    color: #ffffff;
}

.primary-button:hover {
    background: linear-gradient(135deg, #ffa726 0%, #ffb74d 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 152, 0, 0.4);
}

.secondary-button {
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.secondary-button:hover {
    background: rgba(100, 181, 246, 0.2);
    border-color: #64b5f6;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(100, 181, 246, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-section {
        padding: 40px 15px;
    }
    
    .contact-cards-container {
        padding: 30px 20px;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .contact-card {
        padding: 30px 20px;
    }
    
    h3 {
        font-size: 20px;
    }
    
    .contact-detail {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .contact-card {
        padding: 25px 15px;
    }
    
    .icon {
        width: 60px;
        height: 60px;
    }
    
    .icon svg {
        width: 20px;
        height: 20px;
    }
}
</style>