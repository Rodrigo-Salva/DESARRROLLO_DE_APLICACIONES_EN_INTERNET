<?php
function cargarPlantilla($nombre) {
    include 'templates/' . $nombre . '.php';
}

function mostrarMensaje($mensaje) {
    echo "<div class='mensaje'>$mensaje</div>";
}
?>