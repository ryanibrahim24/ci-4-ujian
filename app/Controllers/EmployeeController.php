<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{

    protected $EmployeeModel;

    public function __construct()
    {
        $this->EmployeeModel = new EmployeeModel();
    }

    public function index(): string
    {
        $keyword = $this->request->getVar('kata_kunci');
        $employee = ($keyword) ? $this->EmployeeModel->search($keyword) : $this->EmployeeModel;

        $currentPage = ($this->request->getGet('page')) ? $this->request->getGet('page') : 1;
        $data = [
            'employe' => $employee->paginate(5),
            'pager' => $this->EmployeeModel->pager,
            'currentPage' => $currentPage
        ];
        return view('employees/index', $data);
    }

    public function create()
    {
        return view('employees/create');
    }

    public function save()
    {

        $password = $this->request->getPost('user_password');
        $this->EmployeeModel->save([
            'nama_pegawai' => $this->request->getPost('employee_name'),
            'username' => $this->request->getPost('employee_username'),
            'email' => $this->request->getPost('employee_email'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nohp' => $this->request->getPost('employee_nohp'),
        ]);

        session()->setFlashdata('pesan', 'Employee Berhasil Ditambahkan!');

        return redirect()->to('/employees/create');
    }

    public function edit($id)
    {
        $data = [
            'employee' => $this->EmployeeModel->find($id),
        ];
        return view('employees/edit', $data);
    }

    public function update($id)
    {
        // $employee = $this->EmployeeModel->find($id);
        $this->EmployeeModel->save([
            'id' => $id,
            'nama_pegawai' => $this->request->getPost('employee_name'),
            'username' => $this->request->getPost('employee_username'),
            'email' => $this->request->getPost('employee_email'),
            'nohp' => $this->request->getPost('employee_nohp'),
        ]);

        session()->setFlashdata('pesan', 'Karyawan Berhasil diupdate!');
        return redirect()->to("/employees/edit/$id");
    }

    public function delete($id)
    {

        $this->EmployeeModel->delete($id);

        session()->setFlashdata('pesan', 'Karyawan Berhasil Dihapus!');
        return redirect()->to('/employees');
    }
}
