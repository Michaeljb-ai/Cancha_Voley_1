
function reservarCancha(idCancha, nombre, descripcion, capacidad, ubicacion, imagen) {
    // Rellenar los datos del modal
    document.getElementById('canchaNombre').textContent = nombre;
    document.getElementById('canchaDescripcion').textContent = descripcion;
    document.getElementById('canchaCapacidad').textContent = capacidad;
    document.getElementById('canchaUbicacion').textContent = ubicacion;
    document.getElementById('canchaImagen').src = "../img/" + imagen;

    // Guardar el ID de la cancha en un atributo del formulario
    document.getElementById('reservationForm').dataset.idCancha = idCancha;

    // Mostrar el modal
    const modal = new bootstrap.Modal(document.getElementById('confirmReservationModal'));
    modal.show();
}

// Manejar el envío del formulario de reserva
document.getElementById('reservationForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const idCancha = this.dataset.idCancha;
    const fecha = document.getElementById('fechaReserva').value;
    const horaInicio = document.getElementById('horaInicio').value;
    const horaFin = document.getElementById('horaFin').value;

    // Enviar los datos al backend
    const response = await fetch('../reservar.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ idCancha, fecha, horaInicio, horaFin })
    });

    const result = await response.json();
    if (result.success) {
        alert('Reserva realizada con éxito.');
        location.reload(); // Recargar la página
    } else {
        alert('Error: ' + result.message);
    }
});