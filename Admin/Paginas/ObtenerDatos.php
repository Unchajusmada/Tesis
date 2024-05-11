<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verificar si se recibió el campo 'titulo' en el formulario
  if (isset($_POST["titulo"])) {
    // Obtener el valor del campo 'titulo'
    $titulo = $_POST["titulo"];

    // Aquí puedes realizar cualquier operación que necesites con los datos recibidos,
    // como guardarlos en una base de datos, enviar un correo electrónico, etc.

    // Por ejemplo, imprimir el título recibido
    echo "El título del TEG es: " . $titulo;
  } else {
    // Si no se recibió el campo 'titulo', mostrar un mensaje de error
    echo "Error: No se recibió el título del TEG.";
  }
} else {
  // Si la solicitud no es de tipo POST, mostrar un mensaje de error
  echo "Error: Esta página solo puede ser accedida mediante el método POST.";
}
