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
              <div class="flex justify-between mx-auto">
                <h1 class="md:text-2xl font-bold text-gray-800 text-base">Setting Konversi <span class="text-orange-500"> Kriteria</span></h1>
                <div class="inline my-auto">

                  <a href="<?= base_url() ?>refresh-konversi" onclick="spin('konversi')" class="text-white bg-cyan-800 px-1 text-sm md:text-base py-2 md:px-5 md:py-2 rounded-full hover:bg-cyan-700 mr-1">
                    <i id="konversi" class="fas fa-arrows-rotate mx-2 md:mx-0"></i> <span class="hidden md:inline">Konversi Data</span>
                  </a>
                  <a href="<?= base_url() ?>refresh-normalisasi" onclick="spin('normalisasi')" class="text-white bg-cyan-800 px-1 text-sm md:text-base py-2 md:px-5 md:py-2 rounded-full hover:bg-cyan-700">
                    <i id="normalisasi" class="fas fa-arrows-rotate mx-2 md:mx-0"></i> <span class="hidden md:inline">Normalisasi Data</span>
                  </a>
            </div>
            </div>
            <script>
              function spin(id){
                const ikon =document.getElementById(id)
                ikon.classList.add('animate-spin');
                setTimeout(() => {
                  ikon.classList.remove('animate-spin');
                }, 5000);
              }
            </script>

              <div class="border border-gray-200 m-2 mb-5"></div>
              <?php if (session()->getFlashdata('success')) { ?>
                <div id="alert" class="bg-green-500 text-white px-5 py-3 rounded-lg mb-4" role="alert">
                    <div class="flex items-center">
                      <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4"></path>
                      </svg>
                  <span><?= session()->get('success') ?></span>
                  </div>
              </div>
              <script>
                const notif =document.getElementById('alert')
                setTimeout(() => {
                  notif.classList.add('hidden')
                }, 3000);
              </script>
              <?php } ?>
              <?php if (session()->getFlashdata('eror')) { ?>
                <div id="alert" class="bg-red-500 text-white px-5 py-3 rounded-lg mb-4" role="alert">
                    <div class="flex items-center">
                  <span><i class="fas fa-triangle-exclamation"></i> <?= session()->get('eror') ?></span>
                  </div>
              </div>
              <script>
                const alert = document.getElementById('alert')
                setTimeout(() => {
                  alert.classList.add('hidden')
                }, 3000);
              </script>
              <?php } ?>
              <div class="md:w-7/12 md:px-24 mx-1 md:mx-auto text-sm md:text-base text-gray-700">

                <div class="flex justify-between items-center mb-5">
                  <p class="md:font-bold">Konversi Body</p>
                  <a href="<?= base_url() ?>atur-konversi/body" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear ml-2 md:ml-0"></i><span class="hidden md:inline"> Setting</span> 
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
                  <a href="<?= base_url() ?>atur-konversi/lcd" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear ml-2 md:ml-0"></i><span class="hidden md:inline"> Setting</span>
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
                  <a href="<?= base_url() ?>atur-konversi/sistem" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear ml-2 md:ml-0"></i><span class="hidden md:inline"> Setting</span>
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
                  <a href="<?= base_url() ?>atur-konversi/memori" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear ml-2 md:ml-0"></i><span class="hidden md:inline"> Setting</span>
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
                  <a href="<?= base_url() ?>atur-konversi/main_camera" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear ml-2 md:ml-0"></i><span class="hidden md:inline"> Setting</span>
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
                  <a href="<?= base_url() ?>atur-konversi/front_camera" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear ml-2 md:ml-0"></i><span class="hidden md:inline"> Setting</span>
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
                  <a href="<?= base_url() ?>atur-konversi/battery" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear ml-2 md:ml-0"></i><span class="hidden md:inline"> Setting</span>
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
                  <a href="<?= base_url() ?>atur-konversi/harga" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-gear ml-2 md:ml-0"></i><span class="hidden md:inline"> Setting</span>
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
