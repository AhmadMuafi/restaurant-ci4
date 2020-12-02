<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Pelanggan extends Model
{
    protected $table = 'tblpelanggan';
    protected $allowedFields = ['pelanggan', 'alamat', 'telp', 'email', 'password', 'aktif'];
    protected $primaryKey = 'idpelanggan';

    protected $validationRules = [
        'pelanggan' => 'alpha_numeric_space|min_length[3]|is_unique[tblpelanggan.pelanggan]',
        'alamat' => 'alpha_numeric_space',
        'telp' => 'numeric',
        'email' => 'valid_email',
        'konfirmasi' => 'matches[password]'
    ];

    protected $validationMessages = [
        'pelanggan' => [
            'alpha_numeric_space' => 'Tidak boleh menggunakan simbol',
            'min_length' => 'Minimal 3 karakter',
            'is_unique' => 'pelanggan sudah ada'
        ],
        'alamat' => [
            'alpha_numeric_space' => 'Tidak boleh menggunakan simbol'
        ],
        'telp' => [
            'numeric' => 'Tidak Boleh menggunakan huruf'
        ],
        'email' => [
            'valid_email' => 'Email Salah'
        ]
    ];
}
