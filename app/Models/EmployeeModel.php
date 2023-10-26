<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_pegawai', 'username', 'email', 'password', 'nohp'];

    public function search($keyword)
    {
        return $this->table('employee')->like('nama_pegawai', $keyword)->orLike('username', $keyword);
    }
}
