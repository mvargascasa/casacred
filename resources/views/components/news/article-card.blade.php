<article class="article-card">
    <!-- Imagen -->
    <div class="article-card-image">
        <img src="{{ asset('uploads/posts/'.$post->first_image) }}" alt="Imagen del artículo">
    </div>

    <!-- Contenido -->
    <div class="article-card-content">
        <!-- Título -->
        <h3>{{ $post->publication_title }}</h3>

        <!-- Texto -->
        <p>
            {{ $post->metadescription }}
        </p>

        <!-- Metadatos -->
        <div class="article-meta">
            <p>⏱ Tiempo de lectura: <b>{{ $post->reading_time }}</b></p>
            <p>📅 Creado el: <b>{{ $post->created_at->format('d M y') }}</b></p>
        </div>

        <!-- Botón -->
        <a href="{{ route('web.show.post', $post->slug) }}" class="btn-read">
            Leer más <span>→</span>
        </a>
    </div>
</article>        


<style>
    .article-card {
    background: #f9fafb;
    border-radius: 16px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    height: 100%;
    overflow: hidden;
    margin: auto;
    transition: box-shadow 0.3s ease;
}

.article-card:hover {
    box-shadow: 0 6px 16px rgba(0,0,0,0.1);
}

/* Imagen */
.article-card-image {
    height: 200px;
    overflow: hidden;
}

.article-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 16px 16px 0 0;
    transition: transform 0.3s ease;
}

.article-card:hover .article-card-image img {
    transform: scale(1.05);
}

/* Contenido */
.article-card-content {
    padding: 20px;
}

.article-card-content h3 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 12px;
}

.article-card-content p {
    font-size: 0.95rem;
    color: #4b5563;
    line-height: 1.5;
    margin-bottom: 18px;
}

/* Metadatos */
.article-meta {
    display: flex;
    gap: 15px;
    font-size: 0.85rem;
    color: #6b7280;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .article-meta {
        display: inline;
    }
}

/* Botón */
.btn-read {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #0f172a;
    color: #fff;
    padding: 10px 22px;
    border-radius: 999px;
    font-size: 0.9rem;
    font-weight: 500;
    text-decoration: none;
    transition: background 0.3s ease, transform 0.2s ease;
}

.btn-read span {
    font-weight: bold;
    color: #fbbf24;
    transition: transform 0.2s ease;
}

.btn-read:hover {
    background: #1e293b;
    transform: translateX(3px);
    color: #ffffff;
}

.btn-read:hover span {
    transform: translateX(3px);
}

</style>