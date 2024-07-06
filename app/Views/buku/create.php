<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
    <div class="container mt-5">
        <h1>Tambah Buku</h1>
        <form action="/buku/store" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" value="<?= old('judul') ?>">
            </div>
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" value="<?= old('pengarang') ?>">
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" value="<?= old('penerbit') ?>">
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control" value="<?= old('tahun_terbit') ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/buku" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <?= $this->endSection('content'); ?>
