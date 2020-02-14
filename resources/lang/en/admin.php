<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'transaksi' => [
        'title' => 'Transaksi',

        'actions' => [
            'index' => 'Transaksi',
            'create' => 'New Transaksi',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'kode_transaksi' => 'Kode transaksi',
            'nis' => 'Nis',
            'jenis_tabungan' => 'Jenis tabungan',
            'jenis_transaksi' => 'Jenis transaksi',
            'nominal' => 'Nominal',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];