{{-- Card WhatsApp Simplificada --}}
<div class="whatsapp-card">
    {{-- Elementos flotantes decorativos --}}
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>

    {{-- Contenido principal --}}
    <div class="card-content">
        <h2 class="card-title">
            Únete a nuestro canal de <span class="whatsapp-text">WhatsApp</span> y 
            descubre <strong>propiedades exclusivas</strong>
        </h2>
        
        <div class="card-button">
            <a target="_blank" href="https://whatsapp.com/channel/0029Vb4jJYxChq6UsD0u0y0o" class="btn btn-primary">
                Unirme al canal
            </a>
        </div>
    </div>

    {{-- Imagen debajo --}}
    <div class="card-image">
        <img width="320px" src="{{ asset('img/canal-whatsapp-grupo-housing.webp') }}" alt="Imagen de canal de WhatsApp de Grupo Housing" title="Imagen de canal de WhatsApp de Grupo Housing">
    </div>
</div>

<style>
    .whatsapp-card {
        width: 100%;
        background: white;
        border-radius: 20px;
        padding: 30px 25px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
        text-align: center;
        margin: 0 auto;
        margin-top: 45px;
    }

    .whatsapp-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at 50% 20%, rgba(34, 197, 94, 0.05) 0%, transparent 50%);
        z-index: 0;
    }

    .card-content {
        position: relative;
        z-index: 1;
        margin-bottom: 25px;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 20px;
        color: #1e293b;
    }

    .whatsapp-text {
        color: #22c55e;
        position: relative;
    }

    .whatsapp-text::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #22c55e, #16a34a);
        border-radius: 2px;
    }

    .card-button {
        margin-bottom: 0;
    }

    .btn {
        padding: 14px 28px;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        border: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
        color: white;
        box-shadow: 0 6px 20px rgba(34, 197, 94, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(34, 197, 94, 0.4);
    }

    .card-image {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 200px;
    }

    .floating-elements {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .floating-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(34, 197, 94, 0.08);
        animation: floatCircle 6s ease-in-out infinite;
    }

    .floating-circle:nth-child(1) {
        width: 60px;
        height: 60px;
        top: 15%;
        right: 10%;
        animation-delay: -1s;
    }

    .floating-circle:nth-child(2) {
        width: 40px;
        height: 40px;
        bottom: 20%;
        left: 15%;
        animation-delay: -3s;
    }

    @keyframes floatCircle {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-15px) scale(1.05); }
    }

    /* RESPONSIVE DESIGN */
    @media (max-width: 640px) {
        .whatsapp-card {
            max-width: 350px;
            padding: 25px 20px;
        }

        .card-title {
            font-size: 1.3rem;
            margin-bottom: 18px;
        }

        .btn {
            padding: 12px 24px;
            font-size: 0.95rem;
        }

        .card-image {
            min-height: 180px;
        }

        .card-image img{
            width: 100%;
        }

        .floating-circle:nth-child(1) {
            width: 50px;
            height: 50px;
        }

        .floating-circle:nth-child(2) {
            width: 35px;
            height: 35px;
        }
    }

    @media (max-width: 480px) {
        .whatsapp-card {
            max-width: 320px;
            padding: 20px 15px;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 16px;
            line-height: 1.4;
        }

        .btn {
            padding: 10px 20px;
            font-size: 0.9rem;
            width: 100%;
            justify-content: center;
        }

        .card-image {
            min-height: 160px;
        }
    }

    @media (max-width: 360px) {
        .whatsapp-card {
            max-width: 300px;
            padding: 18px 12px;
        }

        .card-title {
            font-size: 1.1rem;
        }
    }
</style>