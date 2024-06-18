<?php $this->extend('public/template') ?>
<?php $this->section('content') ?>

<div class="main-content flex-1 bg-gray-300 mt-16 md:mt-2">
    <div class="bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-xl text-white"> 
            <h3 class="font-bold pl-2"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>
    
    <div class="bg-white shadow-lg rounded-lg mt-3 mx-6 pb-5 overflow-hidden">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Data <span class="text-orange-500"> Smartphone</span></h1>
        <div class="relative inline-block text-left">
            <div class="mt-2 md:mt-4">
            <button onclick="toggleDropdown()" class="pt-1 pr-3 inline-flex justify-center w-full rounded-lg bg-white text-sm font-medium text-gray-700 outline-none cursor-pointer" id="options-menu" aria-expanded="true" aria-haspopup="true">
            Urutkan
            <i id="caretIcon" class="mx-1 mt-0.5 md:ml-3 fas fa-caret-down"></i>
            </button>
            </div>

            <div id="myDropdown" class="origin-top-right absolute right-2 mt-1 w-36 text-center rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu" hidden>
                <div class="py-1" role="none">
                <a href="<?= base_url() ?>data-smartphone?name=asc" class="<?= isset($sort) && $sort == '&name=asc' ? 'bg-gray-200' : '' ?> block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900" role="menuitem">Nama A-Z</a>
                <a href="<?= base_url() ?>data-smartphone?name=desc" class="<?= isset($sort) && $sort == '&name=desc' ? 'bg-gray-200' : '' ?> block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900" role="menuitem">Nama Z-A</a>
                <a href="<?= base_url() ?>data-smartphone?price=asc" class="<?= isset($sort) && $sort == '&price=asc' ? 'bg-gray-200' : '' ?> block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Harga Terendah</a>
                <a href="<?= base_url() ?>data-smartphone?price=desc" class="<?= isset($sort) && $sort == '&price=desc' ? 'bg-gray-200' : '' ?> block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:text-gray-900" role="menuitem">Harga Tertinggi</a>
                <div class="border border-gray-200 my-1"></div>
                <form action="<?= base_url() ?>data-smartphone" method="get">
                <p class="text-sm text-gray-700">filter harga</p>
                    <input required id="min" type="number" value="<?= isset($_GET['min']) && $_GET['min'] >= 1 ? $_GET['min'] : ''  ?>" name="min" class="bg-gray-200 w-4/5 font-sm text-center text-gray-600 outline-none border-b-2 focus:border-cyan-700 rounded-sm mb-0.5" placeholder="min" oninput="validatePrice()">
                    <input required id="max" type="number" value="<?= isset($_GET['max']) && $_GET['max'] >= 1 ? $_GET['max'] : ''  ?>" name="max" class="bg-gray-200 w-4/5 font-sm text-center text-gray-600 outline-none border-b-2 focus:border-cyan-700 rounded-sm" placeholder="max" oninput="validatePrice()">
                    <p id="notif" class="text-sm text-red-800 mx-0.5 my-1"> </p>
                    <button id="submit" type="submit" class="text-gray-100 hover:text-white bg-orange-500 rounded-full px-3 py-0.5 mt-1 shadow-lg hover:bg-orange-400">Filter</button>
                </form>
                <script>
                    function validatePrice(){
                        const min = Number(document.getElementById('min').value)
                        const max = Number(document.getElementById('max').value)
                        const btn = document.getElementById('submit');
                        const notif = document.getElementById('notif');
                        if(min > max){
                            btn.classList = 'hidden';
                            notif.innerText ='Harga Tidak Valid!';
                        }else{
                            notif.innerText = '';
                            btn.classList = 'text-gray-100 hover:text-white bg-orange-500 rounded-full px-3 py-0.5 mt-1 shadow-lg hover:bg-orange-400';
                        }
                    }
                </script>
                </div>
            </div>
        </div>
        <script>
    function toggleDropdown() {
        var dropdown = document.getElementById("myDropdown");
        var caretIcon = document.getElementById("caretIcon"); // Mendapatkan elemen caretIcon

        dropdown.hidden = !dropdown.hidden; // Toggle the 'hidden' attribute
        
        if (dropdown.hidden) {
            caretIcon.className = "mx-1 mt-0.5 md:ml-3 fas fa-caret-down";
        } else {
            caretIcon.className = "mx-1 mt-0.5 md:ml-3 fas fa-caret-up";
        }
    }
</script>


    </div>
    <div class="border border-gray-200 m-4 mb-2"></div>
        <?php
        if(isset($_GET['min']) && isset($_GET['max']) && $_GET['min'] > 1 && $_GET['max'] > 1){
            echo '<p class="ml-5 text-gray-700 text-base">Filter harga dari Rp. '.number_format($_GET['min'], 0, ',', '.'). ' - Rp. '.number_format($_GET['max'], 0, ',', '.'). '</p>';
        } 
        
        ?>
        <p class="ml-5 text-gray-700 text-sm italic">Catatan : Harga sewaktu-waktu dapat berubah</p>

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
                                    <img loading="lazy" src="img/smartphone/<?= $data['gambar'] ?>" class="h-24 w-86 md:h-40 rounded-tr-[20px] rounded-bl-[20px] object-cover" alt="<?= $data['brand'] . " " . $data['merek'] ?>">
                                </div>
                                <div class="mt-2 text-gray-800">
                                    <p><span class="font-bold text-sm md:text-base"> Merek : </span> <?= $data['merek'] ?></p>
                                    <p><span class="font-bold text-sm md:text-base"> RAM/ROM : </span> <?= $data['ram'] ?>/<?= $data['rom'] ?> GB</p>
                                    <p><span class="font-bold text-sm md:text-base">Harga : Rp. </span><?= number_format($data['harga'], 0, ',', '.'); ?></p>
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
                <a href="<?= base_url('data-smartphone?page=' . ($currentPage - 1)) ?><?= $sort ?>" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
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
                    echo
                    '<a href="' . base_url('data-smartphone?page=1'.$sort.'') .'" class="text-gray-600 text-sm md:text-base py-2 px-3">1</a>';
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                }

                for ($i = $startPage; $i <= $endPage; $i++) {
                    $isActive = $currentPage == $i ? 'bg-gray-300' : '';
                    echo '<a href="' . base_url('data-smartphone?page=' . $i.$sort) . '" class="text-gray-600 text-sm md:text-base py-2 px-3 ' . $isActive . '">' . $i . '</a>';
                }

                if ($endPage < $totalPages) {
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                    echo '<a href="' . base_url('data-smartphone?page=' . $totalPages.$sort) . '" class="text-gray-600 text-sm md:text-base py-2 px-3">' . $totalPages . '</a>';
                }
                ?>
            </div>

            <?php if ($currentPage < $totalPages) : ?>
                <a href="<?= base_url('data-smartphone?page=' . ($currentPage + 1).$sort) ?>" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
                    Berikutnya <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
        <!-- end pagination -->


<?php $this->endSection(); ?>