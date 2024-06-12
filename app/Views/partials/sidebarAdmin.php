<!-- sidebar -->

<?php empty($page) ? $page = 'dashboard' : $page ?>

<div class="flex flex-col md:flex-row">
    <div class="bg-cyan-950 shadow-xl shadow-none h-16 fixed bottom-0 mt-12 md:relative md:h-full z-10 w-full md:w-48">
        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset text-cyan-100 flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1" id="option" title="Halaman Beranda">
                    <a href="<?= base_url() ?>" id="<?= $page == "dashboard" ? "active" : "" ?>" class="block py-1 md:py-3 pl-1 align-middle no-underline border-b-2 border-cyan-950">
                        <i class="fas fa-home pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Beranda</span>
                    </a>
                </li>
                <li class="mr-3 flex-1" id="option" title="Master Data Smartphone">
                    <a href="<?= base_url() ?>master-data" id="<?= $page == "master" ? "active" : "" ?>" class="block py-1 md:py-3 pl-1 align-middle no-underline border-b-2 border-cyan-950">
                        <i class="fa-solid fa-database pr-0 md:pr-3"></i>
                        <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Master Data
                        <?php if (session()->getFlashdata('normalisasi')) { ?>    
                        <div class="h-2 w-2 relative inline-block -translate-y-10 md:-translate-y-2 translate-x-4 md:-translate-x-0">
                                <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                        </div>
                        <?php } ?>
                        </span>
                      </a>
                </li> 
                <li class="mr-3 flex-1" id="option" title="Data Bobot Konversi">
                    <a href="<?= base_url() ?>atur-konversi" id="<?= $page == "bobot" ? "active" : "" ?>" class="block py-1 md:py-3 pl-1 align-middle no-underline border-b-2 border-cyan-950">
                        <i class="fa-solid fa-scale-balanced pr-0 md:pr-3"></i>
                        <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Atur Konversi
                        <?php if (session()->getFlashdata('bobot')) { ?>    
                        <div class="h-2 w-2 relative inline-block -translate-y-10 md:-translate-y-2 translate-x-4 md:-translate-x-0">
                                <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                        </div>
                        <?php } ?>
                        </span>
                    </a>
                </li>
                <li class="mr-3 flex-1" id="option" title="Data Toko kerjasama">
                    <a href="<?= base_url() ?>data-toko" id="<?= $page == "toko" ? "active" : "" ?>" class="block py-1 md:py-3 pl-1 align-middle no-underline border-b-2 border-cyan-950">
                        <i class="fa-solid fa-shop pr-0 md:pr-3"></i>
                        <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Data Toko 
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
   
<!-- end sidebar  -->