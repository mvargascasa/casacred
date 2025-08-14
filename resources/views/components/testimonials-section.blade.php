<section class="testimonios-seccion">
    <div class="testimonios-contenido">
        {{-- Contenedor de la imagen --}}
        <div class="imagen-contenedor">
            <img src="{{ asset($backgroundImage) }}" alt="Imagen de llaves" class="imagen-redondeada">
        </div>

        {{-- Contenedor de los testimonios --}}
        <div class="reviews-contenedor">
            <div class="reviews-titulo">
                <p>{{ $sectionTitle }}</p>
                <h2>{{ $sectionSubtitle }}</h2>
            </div>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-sm-6">

                      <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="testimonial-avatar"></div>
                            <div class="testimonial-info">
                                <p class="testimonial-name">Paola Cordero</p>
                                <div class="testimonial-stars">
                                    ★★★★★
                                </div>
                            </div>
                            <div class="testimonial-quote">❝</div>
                        </div>
                        <p class="testimonial-text">
                          Trabajé con Grupo Housing para vender mi casa. El proceso fue sorprendentemente rápido y transparente. Consiguieron un excelente precio para la propiedad. Muy agradecido.
                        </p>
                      </div>
                  
                    </div>
                    <div class="col-sm-6">

                      <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="testimonial-avatar"></div>
                            <div class="testimonial-info">
                                <p class="testimonial-name">Andrés Ledesma</p>
                                <div class="testimonial-stars">
                                    ★★★★★
                                </div>
                            </div>
                            <div class="testimonial-quote">❝</div>
                        </div>
                        <p class="testimonial-text">
                          Comprar mi primera casa fue una experiencia mucho más fácil de lo que esperaba. Grupo Housing me guió en cada paso, desde la búsqueda hasta la firma de los documentos. Muy agradecida por su ayuda.
                        </p>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-sm-6">

                      <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="testimonial-avatar"></div>
                            <div class="testimonial-info">
                                <p class="testimonial-name">Fabián Ordóñez</p>
                                <div class="testimonial-stars">
                                    ★★★★★
                                </div>
                            </div>
                            <div class="testimonial-quote">❝</div>
                        </div>
                        <p class="testimonial-text">
                          Solicité un avalúo para una propiedad familiar. El servicio fue rápido, profesional y muy detallado. La valoración fue justa y me sirvió perfectamente para mi trámite.
                        </p>
                      </div>
                  
                    </div>
                    <div class="col-sm-6">

                      <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="testimonial-avatar"></div>
                            <div class="testimonial-info">
                                <p class="testimonial-name">Gabriela Viteri</p>
                                <div class="testimonial-stars">
                                    ★★★★★
                                </div>
                            </div>
                            <div class="testimonial-quote">❝</div>
                        </div>
                        <p class="testimonial-text">
                          Gracias a Grupo Housing, pude vender mi departamento y comprar mi nueva casa al mismo tiempo. Ellos coordinaron todo de manera perfecta, lo que me ahorró mucho estrés y tiempo.
                        </p>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-sm-6">

                      <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="testimonial-avatar"></div>
                            <div class="testimonial-info">
                                <p class="testimonial-name">David Peña</p>
                                <div class="testimonial-stars">
                                    ★★★★★
                                </div>
                            </div>
                            <div class="testimonial-quote">❝</div>
                        </div>
                        <p class="testimonial-text">
                          Tenía un problema con los títulos de mi terreno. La asesoría legal de Grupo Housing fue clave para resolverlo. Su conocimiento del mercado local es impresionante.
                        </p>
                      </div>
                  
                    </div>
                    <div class="col-sm-6">

                      <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="testimonial-avatar"></div>
                            <div class="testimonial-info">
                                <p class="testimonial-name">Daniela León</p>
                                <div class="testimonial-stars">
                                    ★★★★★
                                </div>
                            </div>
                            <div class="testimonial-quote">❝</div>
                        </div>
                        <p class="testimonial-text">
                          Encontré un apartamento perfecto en la zona de El Vergel gracias a Grupo Housing. El proceso de alquiler fue sencillo y rápido. Su equipo es muy amable y profesional.
                        </p>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>

            </div>
            
        </div>
    </div>
</section>

<style>
    /* Sección principal del componente */
.testimonios-seccion {
    padding: 40px 0 40px 0;
    margin: 40px auto;
}

/* Contenedor principal de imagen y reseñas */
.testimonios-contenido {
    display: flex;
    align-items: stretch; /* Asegura que los contenedores tengan la misma altura */
    gap: 40px;
    background-color: #ffffff;
    border-radius: 20px
}

/* Contenedor de la imagen */
.imagen-contenedor {
    flex: 0 0 45%;
    overflow: hidden;
    position: relative;
    height: 600px;
}

.imagen-redondeada {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    border-radius: 0px 300px 300px 0;
}

/* Contenedor de las reseñas */
.reviews-contenedor {
    flex: 0 0 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 20px 0;
}

.reviews-titulo {
    margin-bottom: 20px;
}

.reviews-titulo p {
    color: #333;
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 5px;
}

.reviews-titulo h2 {
    font-size: 2.2em;
    font-weight: 700;
    margin-top: 0;
    color: #333;
    line-height: 1.2;
}

/* Media Queries para responsividad */
@media (max-width: 992px) {
    .testimonios-contenido {
        flex-direction: column;
        align-items: center;
    }

    .imagen-contenedor,
    .reviews-contenedor {
        width: 100%;
    }

    .imagen-contenedor {
        height: 200px !important;
    }

    .reviews-contenedor {
        padding: 0 20px;
    }

    .carrusel-nav {
        justify-content: center;
    }

    .testimonial-card{
      margin-bottom: 10px;
      padding: 0 20px;
      height: 250px !important;
    }
    .testimonios-seccion {
      padding: 20px 0 20px 0;
      margin: 40px 40px 0 40px auto;
    }
}

@keyframes tonext {
  75% {
    left: 0;
  }
  95% {
    left: 100%;
  }
  98% {
    left: 100%;
  }
  99% {
    left: 0;
  }
}

@keyframes tostart {
  75% {
    left: 0;
  }
  95% {
    left: -300%;
  }
  98% {
    left: -300%;
  }
  99% {
    left: 0;
  }
}

@keyframes snap {
  96% {
    scroll-snap-align: center;
  }
  97% {
    scroll-snap-align: none;
  }
  99% {
    scroll-snap-align: none;
  }
  100% {
    scroll-snap-align: center;
  }
}

/*CSS PARA ESTILO DE LAS CARD DE REVIEWS*/
.testimonial-card {
    background-color: #8A95BA; /* Color de fondo similar */
    border-radius: 12px;
    padding: 20px;
    width: 100%;
    height: 200px;
    color: white;
    position: relative;
}

.testimonial-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.testimonial-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #10203F; /* Círculo azul oscuro */
}

.testimonial-info {
    flex: 1;
    margin-left: 15px;
}

.testimonial-name {
    font-weight: bold;
    margin: 0;
}

.testimonial-stars {
    color: #FFB400; /* Estrellas amarillas */
    font-size: 18px;
}

.testimonial-quote {
    font-size: 40px;
    color: #10203F; /* Color de las comillas */
    line-height: 0;
}

.testimonial-text {
    margin-top: 15px;
    color: #FFFFFF;
    font-size: 14px;
}

/* CSS para cambiar la posicion de los indicadores del carousel*/
/* Evita que Bootstrap los centre */
.carousel-indicators {
    position: static; /* elimina posicionamiento absoluto */
    margin-top: 20px; /* espacio entre tarjetas y puntos */
    justify-content: flex-start; /* alinea a la izquierda */
    padding-right: 0 !important;
    margin-left: 0 !important;
}

/* Haz los indicadores visibles en fondo claro u oscuro */
.carousel-indicators li {
    background-color: #10203F; /* azul oscuro o el color que prefieras */
    width: 50px;
    height: 5px;
}

.carousel-indicators .active {
    background-color: #FFB400; /* color para el indicador activo */
}

</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const track = document.querySelector('.carrusel-track');
        const puntos = document.querySelectorAll('.carrusel-punto');
        let currentIndex = 0;
        const totalCards = puntos.length;

        puntos.forEach((punto, index) => {
            punto.addEventListener('click', () => {
                currentIndex = index;
                updateCarousel();
            });
        });

        function updateCarousel() {
            const card = document.querySelector('.review-card');
            if (!card) return;

            const cardWidth = card.offsetWidth;
            const cardMarginRight = parseFloat(window.getComputedStyle(card).marginRight);
            const totalShift = currentIndex * (cardWidth + cardMarginRight);

            track.style.transform = `translateX(-${totalShift}px)`;

            puntos.forEach((punto, index) => {
                punto.classList.toggle('active', index === currentIndex);
            });
        }

        // Manejar el redimensionamiento de la ventana
        window.addEventListener('resize', updateCarousel);
    });
</script>