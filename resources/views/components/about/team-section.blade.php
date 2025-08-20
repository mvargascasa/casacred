<section class="real-estate-team">
    <div class="team-container">
        <!-- Header -->
        <div class="section-header-team">
            <div class="section-title">
                <h2>
                    Asesoría Personalizada
                </h2>
            </div>
        </div>

        <!-- Team Grid -->
        <div class="team-grid">
            @foreach($teamMembers as $member)
                <div class="team-member">
                    <div class="member-image-container">
                        <img src="{{ asset('img/'.$member['image']) }}" alt="{{ $member['name'] }}" class="member-image">
                        
                        <!-- Overlay con información -->
                        <div class="member-overlay">
                            <div class="member-info">
                            
                                <div class="member-info-2">
                                    <div>
                                        <div class="member-name-2">
                                            <p class="m-0">{{ $member['name']}}</p>
                                        </div>
                                        <div class="member-title-2">
                                            <p class="m-0">{{ $member['title']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.real-estate-team {
    background-color: #ffffff;
    padding: 80px 0;
    position: relative;
}

.team-container {
    width: 100%;
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 20px;
}

/* Header Styles */
.section-header-team {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 60px;
    flex-wrap: wrap;
    gap: 20px;
}

.section-title h2 {
    font-size: 2.8rem;
    margin: 0;
    line-height: 1.2;
    display: flex;
    flex-direction: column;
    gap: 5px;
    font-weight: 800;
}

.learn-more-btn {
    background-color: #142743;
    color: white;
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    transition: all 0.3s ease;
    display: inline-block;
}

.learn-more-btn:hover {
    background-color: #334155;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(30, 41, 59, 0.3);
}

/* Team Grid */
.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 40px;
    margin: 0 auto;
}

/* Team Member */
.team-member {
    position: relative;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.team-member:hover {
    transform: translateY(-5px);
}


.member-image-container {
    position: relative;
    width: 100%;
    height: 550px;
    border-radius: 25px;
    overflow: hidden;
}

.member-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.team-member:hover .member-image {
    transform: scale(1.05);
}

/* Member Overlay */
.member-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        to bottom,
        transparent 0%,
        transparent 60%,
        rgba(0, 0, 0, 0.7) 100%
    );
    display: flex;
    align-items: flex-end;
    padding: 30px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.team-member:hover .member-overlay {
    opacity: 1;
}

.member-info {
    width: 100%;
}

.member-name {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0 0 5px 0;
}

.member-title {
    font-size: 1rem;
    margin: 0 0 15px 0;
    opacity: 0.9;
}

.member-contact {
    display: flex;
    gap: 15px;
}

.member-info-2 div{
    height: 40px;
    background-color: #ffffff;
    border-radius: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.member-name-2{
    padding: 0px 20px;
    font-size: 1rem;
}

.member-title-2{
    background-color: #142743 !important;
    color: #ff8800;
    border-radius: 25px;
    padding: 0px 30px;
    font-weight: 600;
}

.contact-link {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.contact-link:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

.contact-link svg {
    width: 18px;
    height: 18px;
}

/* Member Card */
.member-card {
    position: absolute;
    bottom: -25px;
    left: 20px;
    right: 20px;
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    z-index: 10;
}

.member-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.member-name-card {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1e293b;
    margin: 0;
    flex: 1;
}

.advisor-btn {
    background-color: #1e293b;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    font-weight: 500;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.advisor-btn:hover {
    background-color: #334155;
    transform: translateY(-2px);
}

.advisor-btn.featured {
    background-color: #f59e0b;
    color: #1e293b;
}

.advisor-btn.featured:hover {
    background-color: #d97706;
}

/* Efecto de click */
.advisor-btn::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.3s ease, height 0.3s ease;
}

.advisor-btn:active::after {
    width: 100px;
    height: 100px;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .team-grid {
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 35px;
    }
    
    .section-title h2 {
        font-size: 2.2rem;
    }
    
    .member-image-container {
        height: 400px;
    }
}

@media (max-width: 768px) {
    .real-estate-team {
        padding: 60px 0;
    }
    
    .team-container {
        padding: 0;
    }
    
    .section-header-team {
        flex-direction: column;
        align-items: flex-start;
        gap: 25px;
        margin-bottom: 40px;
    }
    
    .section-title h2 {
        font-size: 1.8rem;
    }
    
    .learn-more-btn {
        padding: 12px 25px;
        font-size: 0.9rem;
    }
    
    .team-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .member-image-container {
        height: 450px;
        border-radius: 20px;
    }
    
    .member-card {
        bottom: -20px;
        left: 15px;
        right: 15px;
        padding: 15px;
    }

    .member-overlay{
        opacity: 1;
    }
    
    .member-details {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .advisor-btn {
        width: 100%;
        text-align: center;
    }

    .member-name-2{
        font-size: 0.8rem;
    }
}

@media (max-width: 480px) {
    .real-estate-team {
        padding: 40px 0;
    }
    
    .section-title h2 {
        font-size: 1.6rem;
    }
    
    .team-grid {
        gap: 25px;
    }
    
    .member-image-container {
        height: 360px;
        border-radius: 15px;
    }
    
    .member-overlay {
        padding: 20px;
    }
    
    .member-name {
        font-size: 1.3rem;
    }
    
    .contact-link {
        width: 35px;
        height: 35px;
    }
    
    .contact-link svg {
        width: 16px;
        height: 16px;
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

.team-member {
    animation: fadeInUp 0.6s ease forwards;
}

.team-member:nth-child(1) { animation-delay: 0.1s; }
.team-member:nth-child(2) { animation-delay: 0.2s; }
.team-member:nth-child(3) { animation-delay: 0.3s; }

/* Estado inicial para animación */
.team-member {
    opacity: 0;
    transform: translateY(30px);
}

/* Mejoras de accesibilidad */
.advisor-btn:focus,
.learn-more-btn:focus,
.contact-link:focus {
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .team-member,
    .member-image,
    .advisor-btn,
    .learn-more-btn,
    .contact-link {
        transition: none;
        animation: none;
    }
    
    .team-member {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Efectos adicionales */
.team-member::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6, #f59e0b);
    border-radius: 30px;
    opacity: 0;
    z-index: -1;
    transition: opacity 0.3s ease;
}

.team-member.featured::before {
    opacity: 0.1;
}
</style>