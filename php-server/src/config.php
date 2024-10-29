<?php
// config.php

function redirect($url) {
    header("Location: $url");
    exit(); // Always exit after a redirect
}
?>
