<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('index.php'); ?>">Home</a></li>
            </ol>
        </div>
    </div> 
    <div class="card">
        <div class="card-header">
            <h3>Data Pegawai</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <form action="" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukan keyword pencarian"
                                name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if (!empty(session()->getFlashdata('message'))): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <a href="<?= base_url('/pegawai/create'); ?>" class="btn btn-primary">Tambah</a>

            <a href="<?php echo site_url('/export/pdf') ?>" class="btn btn-warning" target="_BLANK">Export PDF</a>

            <!-- Link untuk mengunduh Excel -->
            <a href="<?= base_url('/export/excel'); ?>" class="btn btn-success">Export ke Excel</a>

            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telp</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1 + (5 * ($currentPage - 1));
                foreach ($pegawai as $row) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->jenis_kelamin; ?></td>
                        <td><?= $row->no_telp; ?></td>
                        <td><?= $row->email; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td>
                            <a title="Edit" href="<?= base_url("pegawai/edit/$row->id_pegawai"); ?>"
                                class="btn btn-info">Edit</a>
                            <a title="Delete" href="<?= base_url("pegawai/delete/$row->id_pegawai") ?>"
                                class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?= $pager->links('pegawai', 'pegawai_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>