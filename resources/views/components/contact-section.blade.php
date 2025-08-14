<section class="contact-section">
    <div class="contact-container">
        <!-- Left Side - Contact Form -->
        <div class="contact-form-wrapper">
            <div class="contact-header">
                <h2 class="contact-title">{{ $title }}</h2>
                <h3 class="contact-subtitle">{{ $subtitle }}</h3>
            </div>

            <form class="contact-form" action="{{ route('send.lead.contact.section') }}" method="POST" id="contactForm">
                @csrf
                
                <!-- Name and Last Name Row -->
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" 
                               name="nombre" 
                               id="nombre" 
                               placeholder="Nombre" 
                               required 
                               class="form-input">
                    </div>
                    <div class="form-group">
                        <input type="text" 
                               name="apellido" 
                               id="apellido" 
                               placeholder="Apellido" 
                               required 
                               class="form-input">
                    </div>
                </div>

                <!-- Phone and Email Row -->
                <div class="form-row">
                    <div class="form-group">
                        <input type="tel" 
                               name="telefono" 
                               id="telefono" 
                               placeholder="Teléfono" 
                               required 
                               class="form-input">
                    </div>
                    <div class="form-group">
                        <input type="email" 
                               name="email" 
                               id="email" 
                               placeholder="E-mail" 
                               required 
                               class="form-input">
                    </div>
                </div>

                <!-- Subject Field (Full Width) -->
                <div class="form-group full-width">
                    <input type="text" 
                           name="asunto" 
                           id="asunto" 
                           placeholder="Asunto" 
                           class="form-input">
                </div>

                <!-- Message Field -->
                <div class="form-group full-width mt-4">
                    <textarea name="mensaje" 
                              id="mensaje" 
                              placeholder="Mensaje" 
                              rows="3" 
                              required 
                              class="form-textarea"></textarea>
                </div>

                <!-- Privacy Checkbox -->
                <div class="form-group checkbox-group">
                    <label class="checkbox-container">
                        <input type="checkbox" name="privacy_accepted" required>
                        <span class="checkmark"></span>
                        <span class="checkbox-text">
                            {{ $privacyText }} 
                            <a href="{{ $termsLink }}" class="terms-link">Términos y Condiciones</a>
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="form-group mt-4">
                    <button type="submit" class="submit-btn">
                        {{ $submitText }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Side - Google Maps -->
        <div class="map-wrapper">
            <div class="map-container" id="googleMap">
                <!-- Google Maps will be loaded here -->
                {{-- <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.6880318120207!2d-79.00731410000002!3d-2.9058856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd19a25164240f%3A0x4f30ec335c0d9314!2sGrupo%20Housing%20%7C%20Inmobiliaria%20en%20Cuenca!5e0!3m2!1ses-419!2sus!4v1755112085193!5m2!1ses-419!2sus"
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe> --}}
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.6880318120207!2d-79.00731410000002!3d-2.9058856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd19a25164240f%3A0x4f30ec335c0d9314!2sGrupo%20Housing%20%7C%20Inmobiliaria%20en%20Cuenca!5e0!3m2!1ses-419!2sus!4v1755112085193!5m2!1ses-419!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<style>
.contact-section {
    display: flex;
    align-items: center;
    background-color: #f8fafc;
    padding: 0;
    height: auto;
}

.contact-container {
    width: 100%;
    max-width: 100vw;
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: #1e3a5f;
    padding: 60px 60px;
}

/* Left Side - Contact Form */
.contact-form-wrapper {
    padding: 0 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.contact-header {
    margin-bottom: 50px;
    position: relative;
    z-index: 2;
}

.contact-title {
    font-size: 2.5rem;
    font-weight: 300;
    color: white;
    margin: 0 0 15px 0;
    letter-spacing: -0.02em;
}

.contact-subtitle {
    font-size: 2.8rem;
    font-weight: 700;
    color: white;
    margin: 0;
    line-height: 1.1;
    background: linear-gradient(45deg, #ffffff 0%, #e2e8f0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.contact-form {
    position: relative;
    z-index: 2;
    max-width: 500px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-input, .form-textarea {
    width: 100%;
    background: transparent;
    border: 2px solid #ffffff;
    border-radius: 8px;
    padding: 18px 20px;
    color: white;
    font-size: 1rem;
    font-family: inherit;
}

.form-input::placeholder,
.form-textarea::placeholder {
    color: rgba(255, 255, 255, 0.7);
    font-weight: 400;
}

.form-input:focus,
.form-textarea:focus {
    outline: none;
    border-color: #fbbf24;
    background: rgba(255, 255, 255, 0.05);
    box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.1);
}

.form-textarea {
    resize: vertical;
    font-family: inherit;
}

/* Checkbox Styling */
.checkbox-group {
    margin: 30px 0;
}

.checkbox-container {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    cursor: pointer;
    line-height: 1.5;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9rem;
}

.checkbox-container input[type="checkbox"] {
    opacity: 0;
    position: absolute;
}

.checkmark {
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 4px;
    position: relative;
    flex-shrink: 0;
    transition: all 0.3s ease;
    margin-top: 2px;
}

.checkbox-container input[type="checkbox"]:checked + .checkmark {
    background-color: #fbbf24;
    border-color: #fbbf24;
}

.checkbox-container input[type="checkbox"]:checked + .checkmark::after {
    content: '';
    position: absolute;
    left: 6px;
    top: 2px;
    width: 6px;
    height: 10px;
    border: solid #1e3a5f;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

.checkbox-text {
    flex: 1;
}

.terms-link {
    color: #fbbf24;
    text-decoration: underline;
    font-weight: 600;
    transition: color 0.3s ease;
}

.terms-link:hover {
    color: #f59e0b;
}

/* Submit Button */
.submit-btn {
    background: linear-gradient(45deg, #fbbf24 0%, #f59e0b 100%);
    color: #1e3a5f;
    border: none;
    padding: 18px 50px;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.submit-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.submit-btn:hover::before {
    left: 100%;
}

.submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(251, 191, 36, 0.4);
    background: linear-gradient(45deg, #f59e0b 0%, #d97706 100%);
}

.submit-btn:active {
    transform: translateY(-1px);
}

/* Right Side - Google Maps */
.map-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.map-container {
    width: 100%;
    height: 90%;
}

.map-container iframe {
    width: 100%;
    height: 90%;
    border: none;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .contact-form-wrapper {
        padding: 60px 40px;
    }
    
    .contact-title {
        font-size: 2.2rem;
    }
    
    .contact-subtitle {
        font-size: 2.4rem;
    }
}

@media (max-width: 992px) {
    .contact-container {
        grid-template-columns: 1fr;
        min-height: auto;
    }
    
    .contact-form-wrapper {
        padding: 60px 40px;
        min-height: auto;
    }
    
    .map-container {
        min-height: 400px;
    }
    
    .contact-title {
        font-size: 2rem;
    }
    
    .contact-subtitle {
        font-size: 2.2rem;
    }
}

@media (max-width: 768px) {
    .contact-form-wrapper {
        padding: 40px 30px;
    }
    
    .contact-header {
        margin-bottom: 40px;
    }
    
    .contact-title {
        font-size: 1.8rem;
    }
    
    .contact-subtitle {
        font-size: 2rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .form-input,
    .form-textarea {
        padding: 15px 18px;
    }
    
    .submit-btn {
        width: 100%;
        padding: 16px 40px;
    }
    
    .map-container {
        min-height: 350px;
    }
    .contact-container{
        padding: 10px 20px;
    }
}

@media (max-width: 480px) {
    .contact-form-wrapper {
        padding: 30px 20px;
    }
    
    .contact-title {
        font-size: 1.6rem;
    }
    
    .contact-subtitle {
        font-size: 1.8rem;
    }
    
    .form-input,
    .form-textarea {
        padding: 14px 16px;
        font-size: 0.95rem;
    }
    
    .checkbox-container {
        font-size: 0.85rem;
    }
    
    .submit-btn {
        padding: 14px 30px;
        font-size: 1rem;
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

.contact-form-wrapper {
    animation: slideInLeft 0.8s ease forwards;
}

.map-wrapper {
    animation: slideInRight 0.8s ease forwards 0.2s;
    opacity: 0;
}

/* Estados de carga */
.contact-form-wrapper,
.map-wrapper {
    opacity: 0;
}

.contact-form-wrapper {
    opacity: 1;
}

/* Mejoras de accesibilidad */
.form-input:focus,
.form-textarea:focus,
.submit-btn:focus{
    outline: 2px solid #fbbf24;
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .contact-form-wrapper,
    .map-wrapper,
    .form-input,
    .form-textarea,
    .submit-btn,
    .checkmark {
        animation: none;
        transition: none;
    }
    
    .contact-form-wrapper,
    .map-wrapper {
        opacity: 1;
    }
}

/* Loading state for form submission */
.submit-btn.loading {
    pointer-events: none;
    opacity: 0.7;
}

.submit-btn.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid transparent;
    border-top: 2px solid #1e3a5f;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>