function desactivarBoton(btn) {
    btn.classList.add('disabled'); // Agrega la clase 'disabled'
    btn.removeAttribute('onclick'); // Elimina el atributo onclick para evitar más clics
}