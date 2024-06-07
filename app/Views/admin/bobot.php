<?php $this->extend('admin/template') ?>
<?php $this->section('content')  ?>


<!-- content  -->
<!-- body, footer -->
<div class="main-content flex-1 bg-gray-300 mt-1 md:mt-2">
    <div class=" bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-2xl text-white"> 
            <h3 class="font-bold pl-2 text-xs md:text-2xl"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>

 <!-- content here -->
    <div class="p-3 md:px-4 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
              <h1 class="md:text-2xl font-bold text-gray-800 text-base">Setting Konversi <span class="text-orange-500"> Kriteria</span></h1>
              <div class="border border-gray-200 m-2 mb-5"></div>
              <div class="md:w-7/12 md:px-24 mx-1 md:mx-auto text-sm md:text-base text-gray-700">

                <div class="flex justify-between items-center mb-5">
                  <p class="md:font-bold">Konversi Body</p>
                  <a href="<?= base_url() ?>atur-konversi/body" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear mr-2"></i>Setting 
                    <?php if (session()->getFlashdata('body')) { ?>    
                        <div class="h-2 w-2 relative inline-block -translate-y-1">
                                <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                        </div>
                        <?php } ?>
                  </a>
                </div>
                <div class="flex justify-between items-center mb-5">
                  <p class="md:font-bold">Konversi LCD</p>
                  <a href="#" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear mr-2"></i>Setting
                    <?php if (session()->getFlashdata('lcd')) { ?>    
                        <div class="h-2 w-2 relative inline-block -translate-y-1">
                                <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                        </div>
                        <?php } ?>
                  </a>
                </div>
                <div class="flex justify-between items-center mb-5">
                  <p class="md:font-bold">Konversi Sistem</p>
                  <a href="#" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear mr-2"></i>Setting
                    <?php if (session()->getFlashdata('sistem')) { ?>    
                        <div class="h-2 w-2 relative inline-block -translate-y-1">
                                <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                        </div>
                        <?php } ?>
                  </a>
                </div>
                <div class="flex justify-between items-center mb-5">
                  <p class="md:font-bold">Konversi Memori</p>
                  <a href="#" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear mr-2"></i>Setting
                    <?php if (session()->getFlashdata('memori')) { ?>    
                        <div class="h-2 w-2 relative inline-block -translate-y-1">
                                <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                        </div>
                        <?php } ?>
                  </a>
                </div>
                <div class="flex justify-between items-center mb-5">
                  <p class="md:font-bold">Konversi Kamera Utama</p>
                  <a href="#" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear mr-2"></i>Setting
                    <?php if (session()->getFlashdata('main_camera')) { ?>    
                        <div class="h-2 w-2 relative inline-block -translate-y-1">
                                <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                        </div>
                        <?php } ?>
                  </a>
                </div>
                <div class="flex justify-between items-center mb-5">
                  <p class="md:font-bold">Konversi Kamera Depan</p>
                  <a href="#" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear mr-2"></i>Setting
                    <?php if (session()->getFlashdata('front_camera')) { ?>    
                        <div class="h-2 w-2 relative inline-block -translate-y-1">
                                <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                        </div>
                        <?php } ?>
                  </a>
                </div>
                <div class="flex justify-between items-center mb-5">
                  <p class="md:font-bold">Konversi Baterai</p>
                  <a href="#" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear mr-2"></i>Setting
                    <?php if (session()->getFlashdata('battery')) { ?>    
                        <div class="h-2 w-2 relative inline-block -translate-y-1">
                                <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                        </div>
                        <?php } ?>
                  </a>
                </div>
                <div class="flex justify-between items-center mb-5">
                  <p class="md:font-bold">Konversi Harga</p>
                  <a href="#" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear mr-2"></i>Setting
                    <?php if (session()->getFlashdata('harga')) { ?>    
                        <div class="h-2 w-2 relative inline-block -translate-y-1">
                                <div class="bg-red-600 rounded-full h-full w-full animate-ping"></div>
                                <div class="absolute top-0 left-0 bg-red-600 rounded-full h-full w-full"></div>
                        </div>
                        <?php } ?>
                  </a>
                </div>
            </div>
              </div>

            <div class="group px-3 mr-0 py-3 m-3">
                
            </div>
        </div>
    </div>

<?php $this->endSection() ?>
