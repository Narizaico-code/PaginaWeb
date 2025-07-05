<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "POST recibido correctamente";
} else {
    echo "Acceso no permitido";
}
?>