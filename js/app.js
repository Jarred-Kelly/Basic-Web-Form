document.getElementById('submitBtn').addEventListener('click', function() {
    const form = document.getElementById('reservationForm');
    const beefPlates = document.getElementById('beef-plates');
    const chickenPlates = document.getElementById('chicken-plates');

    // Default to 0 if fields are empty
    if (!beefPlates.value) beefPlates.value = 0;
    if (!chickenPlates.value) chickenPlates.value = 0;

    // Validation
    let isValid = true;
    form.querySelectorAll('input, select').forEach((input) => {
        if (!input.value) {
            isValid = false;
            input.classList.add('is-invalid');
        } else {
            input.classList.remove('is-invalid');
        }
    });

    if (isValid) {
        const formData = new FormData(form);
        const confirmationDetails = `
            <strong>Congregation:</strong> ${formData.get('congregation')}<br>
            <strong>Office:</strong> ${formData.get('office')}<br>
            <strong>Name:</strong> ${formData.get('first_name')}<br>
            <strong>Surname:</strong> ${formData.get('last_name')}<br>
            <strong>Beef Plates:</strong> ${formData.get('beef_plates')}<br>
            <strong>Chicken Plates:</strong> ${formData.get('chicken_plates')}<br>
            <strong>Total Cost:</strong> R${(formData.get('beef_plates') * 100) + (formData.get('chicken_plates') * 100)}
        `;
        document.getElementById('confirmationDetails').innerHTML = confirmationDetails;
        new bootstrap.Modal(document.getElementById('confirmationModal')).show();
    }
});

document.getElementById('confirmBtn').addEventListener('click', function() {
    document.getElementById('reservationForm').submit();
});

// Countdown logic
const countDownDate = new Date("Jul 25, 2024 00:00:00").getTime();

const x = setInterval(function () {
    const now = new Date().getTime();
    const distance = countDownDate - now;

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerText = days;
    document.getElementById("hours").innerText = hours;
    document.getElementById("minutes").innerText = minutes;
    document.getElementById("seconds").innerText = seconds;

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "EXPIRED";
    }
}, 1000);
