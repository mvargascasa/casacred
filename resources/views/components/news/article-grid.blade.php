<div class="articles-section">
    <div class="articles-container">
        <!-- Grid container for article cards -->
        <div class="articles-grid">
            @forelse($posts as $post)
                <x-news.article-card :post="$post" />
            @empty
                <div class="no-articles">
                    <p>No hay artículos disponibles en este momento.</p>
                </div>
            @endforelse
        </div>

        <!-- Custom pagination -->
        @if($posts->hasPages())
            <div class="pagination">
                <nav>
                    {{-- Previous Page Link --}}
                    @if ($posts->onFirstPage())
                        <span class="disabled">Anterior</span>
                    @else
                        <a href="{{ $posts->previousPageUrl() }}">Anterior</a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                        @if ($page == $posts->currentPage())
                            <span class="active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($posts->hasMorePages())
                        <a href="{{ $posts->nextPageUrl() }}">Siguiente</a>
                    @else
                        <span class="disabled">Siguiente</span>
                    @endif
                </nav>
            </div>
        @endif
    </div>
</div>

<style>
    /* Sección principal */
.articles-section {
    width: 100%;
    padding: 4rem 0;
    background: #f9fafb;
}

/* Contenedor */
.articles-container {
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 1rem;
}

/* Grid de artículos */
.articles-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    margin-bottom: 3rem;
}

@media (min-width: 768px) {
    .articles-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .articles-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .articles-container {
        padding: 0 0;
    }
}

/* Mensaje cuando no hay artículos */
.no-articles {
    grid-column: 1 / -1;
    text-align: center;
    padding: 3rem 0;
    font-size: 1.1rem;
    color: #6b7280;
}

/* PAGINACIÓN */
.pagination {
    display: flex;
    justify-content: center;
}

.pagination nav {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.pagination a,
.pagination span {
    padding: 0.6rem 1.2rem;
    border-radius: 8px;
    font-size: 0.9rem;
    text-decoration: none;
    border: 1px solid #d1d5db;
    transition: all 0.2s ease;
}

.pagination a {
    background: #fff;
    color: #374151;
}

.pagination a:hover {
    background: #f3f4f6;
}

.pagination .active {
    background: #2563eb;
    color: #fff;
    font-weight: 600;
    border-color: #2563eb;
}

.pagination .disabled {
    background: #e5e7eb;
    color: #9ca3af;
    cursor: not-allowed;
}

</style>