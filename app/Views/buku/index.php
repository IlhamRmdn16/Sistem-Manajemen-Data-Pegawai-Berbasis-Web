<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
    <div class="container mt-5">
        <h1><?= $title ?></h1>
        <a href="/buku/create" class="btn btn-primary mb-3">Tambah Buku</a>
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buku as $b): ?>
                    <tr>
                        <td><?= $b->id_buku ?></td>
                        <td><?= $b->judul ?></td>
                        <td><?= $b->pengarang ?></td>
                        <td><?= $b->penerbit ?></td>
                        <td><?= $b->tahun_terbit ?></td>
                        <td>
                            <a href="/buku/edit/<?= $b->id_buku ?>" class="btn btn-warning">Edit</a>
                            <form action="/buku/delete/<?= $b->id_buku ?>" method="post" class="d-inline">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection('content'); ?>
