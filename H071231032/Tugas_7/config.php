<?php 
    function loadEnv($path)
    {
        if (!file_exists($path)) {
            throw new Exception("File .env tidak ditemukan.");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            if (!getenv($name)) {
                putenv("$name=$value");
            }
        }
    }

    function getConnection() {
        loadEnv('/Applications/MAMP/htdocs/pert-7/.env');
    
        $host = getenv('DB_HOST');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');
        $database = 'pertemuan_7';
    
        $conn = new mysqli($host, $username, $password, $database);

        return $conn;
    }
?>