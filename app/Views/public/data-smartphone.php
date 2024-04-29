<?php $this->extend('public/template') ?>
<?php $this->section('content') ?>

<div class="main-content flex-1 bg-gray-300 mt-16 md:mt-2">
    <div class="bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-xl text-white"> 
            <h3 class="font-bold pl-2"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>
    
    <div class="bg-white shadow-lg rounded-lg mt-3 mx-6 pb-5 overflow-hidden">
        <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Data <span class="text-orange-500"> Smartphone</span></h1>
        <div class="border border-gray-200 m-4"></div>

        <div class="flex flex-wrap mx-3">
            <!-- Tampilan Pagination -->
            <?php foreach ($smartphone as $data) : ?>
                <div class="w-full md:w-1/3 p-1 mb-3 md:mb-1 hover:-translate-y-1 duration-500">
                    <div class="md:p-1">
                        <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                            <div class="px-4 py-3">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg"><?= $data['merek'] ?></h1>
                                <div class="border border-gray-200 m-2"></div>
                                <div class="flex justify-center items-center mx-auto">
                                    <img loading="lazy" src="img/smartphone/<?= $data['gambar'] ?>" class="rounded-tr-[35px] rounded-bl-[35px] h-24 md:h-40" alt="<?= $data['brand'] . " " . $data['merek'] ?>">
                                </div>
                                <div class="mt-2 text-gray-800">
                                    <p><span class="font-bold"> Merek : </span> <?= $data['merek'] ?></p>
                                    <p><span class="font-bold"> RAM/ROM : </span> <?= $data['ram'] ?>/<?= $data['rom'] ?> GB</p>
                                    <p><span class="font-bold">Harga : Rp. </span><?= number_format($data['harga'], 0, ',', '.'); ?></p>
                                </div>
                            </div>
                            <div class="px-4 pb-3">
                                <a href="<?= base_url() ?>detail-smarthpone/<?= $data['slug'] ?>" class="text-white bg-gray-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-gray-700">
                                    <i class="fas fa-info mr-2"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- pagination -->
        <div class="flex justify-between items-center mx-3 mt-4">
            <?php if ($currentPage > 1) : ?>
                <a href="<?= base_url('data-smartphone?page=' . ($currentPage - 1)) ?>" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
                    <i class="fas fa-arrow-left"></i> Sebelumnya
                </a>
            <?php endif; ?>

            <div class="flex mx-auto">
                <?php
                $numPagesToShow = 5; // Jumlah halaman yang akan ditampilkan
                $halfNumPages = floor($numPagesToShow / 2);
                $startPage = max(1, $currentPage - $halfNumPages);
                $endPage = min($totalPages, $currentPage + $halfNumPages);

                $numPagesDiff = $numPagesToShow - ($endPage - $startPage + 1);

                if ($numPagesDiff > 0) {
                    $startPage = max(1, $startPage - $numPagesDiff);
                }

                if ($startPage > 1) {
                    echo '<a href="' . base_url('data-smartphone?page=1') . '" class="text-gray-600 text-sm md:text-base py-2 px-3">1</a>';
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                }

                for ($i = $startPage; $i <= $endPage; $i++) {
                    $isActive = $currentPage == $i ? 'bg-gray-300' : '';
                    echo '<a href="' . base_url('data-smartphone?page=' . $i) . '" class="text-gray-600 text-sm md:text-base py-2 px-3 ' . $isActive . '">' . $i . '</a>';
                }

                if ($endPage < $totalPages) {
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                    echo '<a href="' . base_url('data-smartphone?page=' . $totalPages) . '" class="text-gray-600 text-sm md:text-base py-2 px-3">' . $totalPages . '</a>';
                }
                ?>
            </div>

            <?php if ($currentPage < $totalPages) : ?>
                <a href="<?= base_url('data-smartphone?page=' . ($currentPage + 1)) ?>" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
                    Berikutnya <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>

        <!-- end pagination -->


<?php $this->endSection(); ?>