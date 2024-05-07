<?php $this->extend('public/template') ?>
<?php $this->section('content') ?>

<div class="main-content flex-1 bg-gray-300 mt-16 md:mt-2">
    <div class="bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-xl text-white"> 
            <h3 class="font-bold pl-2"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>
    
    <div class="bg-white shadow-lg rounded-lg mt-3 mx-6 pb-5 overflow-hidden">
        <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Toko yang direkomendasikan<span class="text-orange-500"> SIRESE</span></h1>
        <div class="border border-gray-200 m-4 mb-2"></div>
        <div class="flex flex-wrap mx-3">
        <?php foreach ($toko as $data) : ?>

                <div class="w-full md:w-1/3 p-1 mb-3 md:mb-1 hover:-translate-y-1 duration-500">
                    <div class="md:p-1">
                        <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                            <div class="px-4 py-3">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg text-center"><?= $data['nama_toko'] ?></h1>
                                <div class="border border-gray-200 m-3 mb-2"></div>
                                <div class="flex justify-center items-center mx-auto">
                                    <img loading="lazy" src="img/toko/<?= $data['foto'] ?>" class="h-24 md:h-40 rounded-tr-[20px] rounded-bl-[20px] object-cover" alt="Gambar Toko">
                                </div>
                                <div class="mt-2 text-gray-800 text-center">
                                    <p><?= $data['kecamatan'] ?>, <?= $data['kota'] ?></p>
                                </div>
                                <div class="border border-gray-200 m-3 mb-0"></div>
                            </div>
                            <div class="px-4 pb-3 flex justify-center align-center">
                                <a href="#" class="text-white bg-gray-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-gray-700">
                                    <i class="fas fa-info mr-2"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <p class="ml-3">Ingin toko anda ada disini? hubungi kami di <a class="text-blue-600" href="https://wa.me/6281381293323?text=Mohon%20maaf%20mengganggu,%20saya%20ingin%20memasukkan%20nama%20toko%20smartphone%20saya%20di%20dalam%20website%20Anda" target="_blank"> <i class="fa-brands fa-whatsapp"></i>Whatsapp</a>.</p>

<!-- pagination -->
<div class="flex justify-between items-center mx-3 mt-4">
            <?php if ($currentPage > 1) : ?>
                <a href="<?= base_url('toko?page=' . ($currentPage - 1)) ?>" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
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
                    echo '<a href="' . base_url('toko?page=1') . '" class="text-gray-600 text-sm md:text-base py-2 px-3">1</a>';
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                }

                for ($i = $startPage; $i <= $endPage; $i++) {
                    $isActive = $currentPage == $i ? 'bg-gray-300' : '';
                    echo '<a href="' . base_url('toko?page=' . $i) . '" class="text-gray-600 text-sm md:text-base py-2 px-3 ' . $isActive . '">' . $i . '</a>';
                }

                if ($endPage < $totalPages) {
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                    echo '<a href="' . base_url('toko?page=' . $totalPages) . '" class="text-gray-600 text-sm md:text-base py-2 px-3">' . $totalPages . '</a>';
                }
                ?>
            </div>

            <?php if ($currentPage < $totalPages) : ?>
                <a href="<?= base_url('toko?page=' . ($currentPage + 1)) ?>" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
                    Berikutnya <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>

<?php $this->endSection(); ?>