<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Widgets Start -->
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-6 col-sm-8">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Hallo !!</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">Selamat Datang</h2>
                        <p class="text-white mb-0">Di Website Kami</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-8">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Kelompok 1</h3>
                    <div class="d-inline-block">
                        <h3 class="text-white">Web Programming Advance</h3>
                        <p class="text-white mb-0">QJ Store</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Tentang Kami</h3>
                    <p>Selamat datang di QJ Store, tempat terbaik untuk menemukan koleksi buku berkualitas! Kami adalah
                        toko pengelola buku yang berdedikasi untuk menyediakan berbagai jenis buku yang dapat memenuhi
                        kebutuhan bacaan Anda, mulai dari literatur klasik hingga terbitan terbaru.</p>
                    <p>Di QJ Store, kami percaya bahwa membaca adalah jendela dunia. Oleh karena itu, kami selalu
                        berusaha untuk menyediakan koleksi buku yang beragam dan berkualitas tinggi. Setiap buku yang
                        kami tawarkan dipilih dengan cermat untuk memastikan Anda mendapatkan pengalaman membaca yang
                        terbaik..</p>
                    <p>Kami juga berkomitmen untuk memberikan pelayanan yang ramah dan profesional. Tim kami selalu siap
                        membantu Anda menemukan buku yang Anda cari dan memberikan rekomendasi sesuai dengan minat dan
                        kebutuhan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>
<!-- Widgets End -->