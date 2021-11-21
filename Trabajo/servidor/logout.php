<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();
//eliminar todas las valiables de sesion asignandole a sesion global un array vacio
$_SESSION = array();
// If it's desired to kill the session, also delete the session cookie.
//para borrar una cookie no tenemos un destroy o unset sino que creamos una cookie
//pero con tiempo de vida negativo
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

?>

<a href="../index.php">Sesión cerrada correctamente.</a>