document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        const cardTitle = card.querySelector('.card-title').textContent.trim();

        switch (cardTitle) {
            case 'Música y Entretenimiento':
                card.querySelector('.card-image').src = './vista/img/music.jpg';
                card.querySelector('.card-title').style.backgroundColor = '#F7DFF5';
                card.querySelector('.card-title').style.color = '#B22485';
                card.style.border = '2px solid #B22485';
                break;

            case 'Gastronomía y Bebidas':
                card.querySelector('.card-image').src = './vista/img/gastronomia.jpg';
                card.querySelector('.card-title').style.backgroundColor = '#98FB98';
                card.querySelector('.card-title').style.color = '#006400';
                card.style.border = '2px solid #98FB98';
                break;

            case 'Espectáculo y Animación':
                card.querySelector('.card-image').src = './vista/img/animador.jpg';
                card.querySelector('.card-title').style.backgroundColor = '#ADD8E6';
                card.querySelector('.card-title').style.color = '#0000FF';
                card.style.border = '2px solid #ADD8E6';
                break;

            case 'Decoración y Ambientación':
                card.querySelector('.card-image').src = './vista/img/decoracion.jpg';
                card.querySelector('.card-title').style.backgroundColor = '#FFFFE0';
                card.querySelector('.card-title').style.color = '#FFD700';
                card.style.border = '2px solid #FFFFE0';
                break;

            case 'Logística y Mobiliario':
                card.querySelector('.card-image').src = './vista/img/logistica.jpg';
                card.querySelector('.card-title').style.backgroundColor = '#D2B48C';
                card.querySelector('.card-title').style.color = '#8B4513';
                card.style.border = '2px solid #D2B48C';
                break;

            default:
                break;
        }
    });
});