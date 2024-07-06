<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pegawai extends BaseController
{
    protected $pegawai;

    function __construct()
    {
        $this->pegawai = new PegawaiModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_pegawai') ? $this->request->getVar('page_pegawai') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $pegawai = $this->pegawai->search($keyword);
        } else {
            $pegawai = $this->pegawai;
        }

        $data = [
            'title' => 'Daftar Pegawai',
            'pegawai' => $pegawai->paginate(5, 'pegawai'),
            'pager' => $this->pegawai->pager,
            'currentPage' => $currentPage
        ];
        return view('pegawai/index', $data);
    }

    public function pdf()
    {
        $pegawaiModel = new PegawaiModel();
        $pegawais = $pegawaiModel->findAll();

        $html = '<h1>Daftar Pegawai</h1>';
        $html .= '<table border="1" width="100%" style="border-collapse: collapse;">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>No</th>';
        $html .= '<th>Nama</th>';
        $html .= '<th>Jenis Kelamin</th>';
        $html .= '<th>No Telp</th>';
        $html .= '<th>Email</th>';
        $html .= '<th>Alamat</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        if (empty($pegawais)) {
            echo "Tidak ada data untuk diekspor.";
            return;
        }

        $no = 1;

        foreach ($pegawais as $pegawai) {
            $html .= '<tr>';
            $html .= '<td>' . $no++ . '</td>';
            $html .= '<td>' . $pegawai->nama . '</td>'; 
            $html .= '<td>' . $pegawai->jenis_kelamin . '</td>';
            $html .= '<td>' . $pegawai->no_telp . '</td>';
            $html .= '<td>' . $pegawai->email . '</td>';
            $html .= '<td>' . $pegawai->alamat . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody>';
        $html .= '</table>';

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream("Daftar_Pegawai.pdf", array("Attachment" => false));
    }

    public function excel()
    {
        // Inisialisasi model
        $pegawaiModel = new PegawaiModel();
        $pegawais = $pegawaiModel->findAll();

        if (empty($pegawais)) {
            echo "Tidak ada data untuk diekspor.";
            return;
        }

        // Membuat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menulis header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Jenis Kelamin');
        $sheet->setCellValue('D1', 'No Telp');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Alamat');

         // Menulis data
         $row = 2;
         $no = 1;
         foreach ($pegawais as $pegawai) {
             $sheet->setCellValue('A' . $row, $no++);
             $sheet->setCellValue('B' . $row, $pegawai->nama);
             $sheet->setCellValue('C' . $row, $pegawai->jenis_kelamin);
             $sheet->setCellValue('D' . $row, $pegawai->no_telp);
             $sheet->setCellValue('E' . $row, $pegawai->email);
             $sheet->setCellValue('F' . $row, $pegawai->alamat);
             $row++;
         }
        // Menulis file Excel ke output
        $writer = new Xlsx($spreadsheet);

        // Header HTTP untuk file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Daftar_Pegawai.xlsx"');
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
    }

    public function create()
    {
        return view('pegawai/create');
    }

    public function store()
    {
        if (
            !$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'jenis_kelamin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'no_telp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'valid_email' => 'Email Harus Valid'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],

            ])
        ) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->pegawai->insert([
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_telp' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        session()->setFlashdata('message', 'Tambah Data Pegawai Berhasil');
        return redirect()->to('/pegawai');
    }

    function edit($id)
    {
        $dataPegawai = $this->pegawai->find($id);
        if (empty($dataPegawai)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $data['pegawai'] = $dataPegawai;
        return view('pegawai/edit', $data);
    }

    public function update($id)
    {
        if (
            !$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'jenis_kelamin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'no_telp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'valid_email' => 'Email Harus Valid'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],

            ])
        ) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->pegawai->update($id, [
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_telp' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        session()->setFlashdata('message', 'Update Data Pegawai Berhasil');
        return redirect()->to('/pegawai');
    }

    function delete($id)
    {
        $dataPegawai = $this->pegawai->find($id);
        if (empty($dataPegawai)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $this->pegawai->delete($id);
        session()->setFlashdata('message', 'Delete Data Pegawai Berhasil');
        return redirect()->to('/pegawai');
    }
}