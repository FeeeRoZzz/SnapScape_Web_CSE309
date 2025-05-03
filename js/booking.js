document.getElementById("bookingForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const eventType = document.getElementById("event-type").value;
    const date = document.getElementById("date").value;
    const paymentMethod = document.querySelector('input[name="payment"]:checked').value;

    // Simulate booking confirmation
    console.log("Booking Details:", { name, email, phone, eventType, date, paymentMethod });
    openModal();
});

function openModal() {
    document.getElementById("confirmationModal").classList.remove("hidden");
}

function closeModal() {
    document.getElementById("confirmationModal").classList.add("hidden");
}