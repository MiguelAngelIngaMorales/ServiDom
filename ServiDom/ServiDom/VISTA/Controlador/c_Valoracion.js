document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.rating span');
    let selectedRating = 0;

    stars.forEach(star => {
        star.addEventListener('click', function () {
            selectedRating = this.getAttribute('data-value');
            updateStars(selectedRating);
        });
    });

    function updateStars(rating) {
        stars.forEach(star => {
            if (star.getAttribute('data-value') <= rating) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }

    document.getElementById('submitRating').addEventListener('click', function () {
        const comment = document.getElementById('comment').value;
        if (selectedRating > 0) {
            fetch('submit_rating.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `rating=${selectedRating}&comment=${encodeURIComponent(comment)}`
            })
            .then(response => response.text())
            .then(data => alert(data))
            .catch(error => console.error('Error:', error));
        } else {
            alert('Por favor, selecciona una calificación');
        }
    });

    document.getElementById('goBack').addEventListener('click', function () {
        window.history.back();
    });
});
