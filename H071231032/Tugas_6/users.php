<?php
    $users = [
        [
            'email' => 'admin@gmail.com',
            'username' => 'adminxxx',
            'name' => 'Admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'admin'
        ],
        [
            'email' => 'nanda@gmail.com',
            'username' => 'nanda_aja',
            'nim' => 'H071211001',
            'name' => 'Wd. Ananda Lesmono',
            'password' => password_hash('nanda123', PASSWORD_DEFAULT),
            'role' => 'user',
            'gender' => 'Female',
            'faculty' => 'MIPA',
            'batch' => '2021',
        ],
        [
            'email' => 'arif@gmail.com',
            'username' => 'arif_nich',
            'nim' => 'H071211002',
            'name' => 'Muhammad Arief',
            'password' => password_hash('arief123', PASSWORD_DEFAULT),
            'role' => 'user',
            'gender' => 'Male',
            'faculty' => 'Hukum',
            'batch' => '2021',
        ],
        [
            'email' => 'eka@gmail.com',
            'username' => 'eka59',
            'nim' => 'H071211003',
            'name' => 'Eka Hanny',
            'password' => password_hash('eka123', PASSWORD_DEFAULT),
            'role' => 'user',
            'gender' => 'Female',
            'faculty' => 'Keperawatan',
            'batch' => '2021',
        ],
        [
        'email' => 'adnan@gmail.com',
        'username' => 'adnan72',
        'nim' => 'H071201001',
        'name' => 'Adnan',
        'password' => password_hash('adnan123', PASSWORD_DEFAULT),
        'role'=> 'user',
        'gender' => 'Male',
        'faculty' => 'Teknik',
        'batch' => '2020',
        ]
    ];
?>