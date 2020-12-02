<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Menu extends Model
{
    protected $table = 'tblmenu';
    protected $primaryKey = 'idmenu';
    protected $allowedFields = ['idkategori','menu','gambar','harga'];

    protected $validationRules = [
        'menu' => 'alpha_numeric_space|min_length[3]|is_unique[tblmenu.menu]',
        'harga' => 'numeric'
    ];

    protected $validationMessages = [
        'menu' => [
            'alpha_numeric_space' => 'Tidak boleh menggunakan simbol',
            'min_length' => 'Minimal 3 karakter',
            'is_unique' => 'Menu sudah ada'
        ],
        'harga' => [
            'numeric' => 'Hanya angka yang diperbolehkan'
        ]
    ];
}
