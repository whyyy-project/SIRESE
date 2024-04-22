<?php $this->extend('public/template') ?>
<?php $this->section('content') ?>

<div class="main-content flex-1 bg-gray-300 mt-16 md:mt-2">
    <div class=" bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-2xl text-white"> 
            <h3 class="font-bold pl-2 text-xs md:text-2xl"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>

    <div class="p-3 md:px-5 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Detail <span class="text-orange-500"><?= $hasil->type ?></span></h1>
                <div class="border border-gray-200 m-2"></div>
                <!-- content -->
                <div class="mt-4 p-3">
                    <img src="<?= base_url() ?>img/smartphone/<?= $hasil->gambar ?>" alt="<?= $hasil->type ?>" class="w-1/2 mx-auto rounded-br-lg rounded-tl-lg block">

                    <h2 class="text-xl font-semibold text-gray-800 mt-4">Nama Brand: <?= $hasil->brand ?> </h2>

                    <p class="text-gray-600 mt-2">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos, non!
                    </p>

                    <p class="text-gray-600">
                        Lorem, ipsum.
                    </p>

                    <p class="text-gray-600">
                        Tahun Berdiri: Lorem, ipsum.
                    </p>

                    <p class="text-gray-800 text-sm mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, natus.
                    </p>
                    </div>
                </div>
            </div>
            <div class="group px-3 mr-0 py-3 m-3 block text-center">
                <a href="<?= base_url() ?>data-smartphone" class="text-white bg-gray-800 px-4 py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-check"></i> Lihat Smartphone Lain
                </a>
            </div>
        </div>
    </div>

<?php $this->endSection() ?>