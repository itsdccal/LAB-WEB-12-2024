<?php
    function safeOutput($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    function checkLogin() {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php');
            exit();
        }
    }
?>