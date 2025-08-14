<section class="faq-section">
    <div class="faq-container">
        <!-- Header -->
        <div class="faq-header">
            <h3 class="section-subtitle">Preguntas</h3>
            <h2 class="section-title-faq">Frecuentes</h2>
        </div>

        <!-- FAQ Grid -->
        <div class="faq-grid">
            @foreach($faqs as $faq)
                <div class="faq-item" data-faq-id="{{ $faq['id'] }}">
                    <!-- Question -->
                    <div class="faq-question" role="button" tabindex="0" aria-expanded="{{ $faq['isOpen'] ? 'true' : 'false' }}">
                        <span class="question-text">{{ $faq['question'] }}</span>
                        <button class="toggle-btn" aria-label="Toggle answer">
                            <span class="toggle-icon {{ $faq['isOpen'] ? 'open' : '' }}">
                                <svg class="plus-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <svg class="minus-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                        </button>
                    </div>

                    <!-- Answer -->
                    <div class="faq-answer {{ $faq['isOpen'] ? 'open' : '' }}">
                        <div class="answer-content">
                            <p>{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const toggleIcon = item.querySelector('.toggle-icon');

        question.addEventListener('click', () => {
            const isOpen = answer.classList.contains('open');

            faqItems.forEach(i => {
                i.querySelector('.faq-answer').classList.remove('open');
                i.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
                i.querySelector('.toggle-icon').classList.remove('open');
            });

            if (!isOpen) {
                answer.classList.add('open');
                question.setAttribute('aria-expanded', 'true');
                toggleIcon.classList.add('open');
            }
        });
    });
});
</script>

<style>
.faq-section {
    background-color: #ffffff;
    padding: 100px 0;
}

.faq-container {
    width: 100%;
    max-width: 85vw;
    margin: 0 auto;
    padding: 0 20px;
}

.faq-header {
    margin-bottom: 40px;
}

.section-subtitle {
    font-size: 1.7rem;
    color: #cbd5e1;
    margin: 0;
}

.section-title-faq {
    font-size: 2.7rem;
    font-weight: bold;
    color: #0f172a;
    margin-top: 5px;
}

.faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.faq-item {
    border-bottom: 1px solid #e2e8f0;
    padding-bottom: 20px;
}

.faq-question {
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    padding: 15px 0;
    font-size: 1rem;
    color: #0f172a;
}

.question-text {
    flex: 1;
    margin-right: 10px;
    font-size: 18px;
}

.toggle-btn {
    width: 32px;
    height: 32px;
    background-color: #cbd5e1;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    cursor: pointer;
    transition: background 0.3s;
}

.toggle-icon {
    position: relative;
    width: 18px;
    height: 18px;
}

.toggle-icon svg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transition: all 0.3s;
    color: #0f172a;
}

.plus-icon {
    opacity: 1;
}

.minus-icon {
    opacity: 0;
}

.toggle-icon.open .plus-icon {
    opacity: 0;
}

.toggle-icon.open .minus-icon {
    opacity: 1;
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    opacity: 0;
    transition: all 0.3s ease;
}

.faq-answer.open {
    max-height: 500px;
    opacity: 1;
    margin-top: 10px;
}

.answer-content {
    background-color: #e2e8f0;
    padding: 20px;
    border-radius: 12px;
    color: #334155;
    font-size: 17px;
}

@media (max-width: 768px) {
    .faq-grid {
        grid-template-columns: 1fr;
    }
    .faq-section{
        padding: 0 0 20px 0;
    }
    .faq-container{
        padding: 0;
    }
}
</style>