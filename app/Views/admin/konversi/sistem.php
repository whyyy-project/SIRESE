<?php $this->extend('admin/template') ?>
<?php $this->section('content')  ?>


<!-- content  -->
<!-- body, footer -->
<div class="main-content flex-1 bg-gray-300 md:mt-2">
    <div class=" bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-2xl text-white"> 
            <h3 class="font-bold pl-2 text-xs md:text-2xl"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>

    <div class="p-3 md:px-4 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3 mb-3">
                <h1 class="md:text-2xl font-bold text-gray-800 text-base">Data Konversi <span class="text-orange-500"> Body</span></h1>
                <div class="border border-gray-200 m-2"></div>
                <div class="flex justify-between mb-2 my-auto px-1 md:mx-64 mt-3 md:mt-8">
                  <p class="text-base font-bold text-gray-800">Konversi Dimensi</p>
                <a href="<?= base_url() ?>atur-konversi/body" class="text-white bg-cyan-800 px-1 text-sm md:text-base py-2 px-3 md:px-12 rounded-full hover:bg-cyan-700"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <div class="md:w-7/12 md:px-24 mx-1 md:mx-auto text-sm md:text-base text-gray-700 mt-2 md:mt-5">
                  <div class="flex justify-between items-center mb-5 mx-2">
                    <p class="md:font-bold">Konversi Body</p>
                    <p class="md:font-bold">100</p>
                    <a href="<?= base_url() ?>atur-konversi/body" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 px-3 md:px-5 rounded-full hover:bg-gray-700">
                      <i class="fas fa-gear"></i><span class="hidden md:inline"> Edit</span>
                          <div class="h-2 w-2 relative inline-block -translate-y-1 translate-x-1 md:translate-x-0">
                                  <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                  <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                          </div>
                    </a>
                  </div>
                </div>
            </div>
        </div>
    </div>


    <?php $this->endSection(); ?>