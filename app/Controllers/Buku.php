<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;

class Buku extends BaseController
{
    protected $bukuModel;
    protected $bukuFilteredModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->bukuModel->findAll()
        ];

        return view('buku/index', $data);
    }

    public function create()
    {
        return view('buku/create');
    }

    public function store()
    {
        if (!$this->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->save([
            'judul' => $this->request->getPost('judul'),
            'pengarang' => $this->request->getPost('pengarang'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);

        return redirect()->to('/buku')->with('message', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Buku',
            'buku' => $this->bukuModel->find($id)
        ];

        return view('buku/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'pengarang' => $this->request->getPost('pengarang'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);

        return redirect()->to('/buku')->with('message', 'Buku berhasil diupdate');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        return redirect()->to('/buku')->with('message', 'Buku berhasil dihapus');
    }
}