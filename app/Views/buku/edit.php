<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
        <h1>Edit Buku</h1>
        <form action="/buku/update/<?= $buku->id_buku ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" value="<?= old('judul', $buku->judul) ?>">
            </div>
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" value="<?= old('pengarang', $buku->pengarang) ?>">
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" value="<?= old('penerbit', $buku->penerbit) ?>">
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control" value="<?= old('tahun_terbit', $buku->tahun_terbit) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/buku" class="btn btn-secondary">Batal</a>
        </form>
    </div>
<?= $this->endSection('content'); ?>  