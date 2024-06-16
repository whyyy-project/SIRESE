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
                <h1 class="md:text-2xl font-bold text-gray-800 text-base">Data Konversi <span class="text-orange-500"> <?= ucfirst($text) ?></span></h1>
                <div class="border border-gray-200 m-2"></div>
                <?php if (session()->getFlashdata('bobot')) { ?>
                <div id="alert" class="bg-green-500 text-white px-5 py-3 rounded-lg mb-4" role="alert">
                    <div class="flex items-center">
                      <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4"></path>
                      </svg>
                  <span><?= session()->get('bobot') ?></span>
                  </div>
              </div>
              <script>
                const notif =document.getElementById('alert')
                setTimeout(() => {
                  notif.classList.add('hidden')
                }, 5000);
              </script>
              <?php } ?>
                <?php
                foreach ($kriteria as $b) {
                  ?>
                <div class="flex justify-between mb-2 my-auto px-1 md:mx-32 mt-3 md:mt-8">
                  <p class="text-base font-bold text-gray-800">Konversi <?= ucfirst($b['sub_kriteria']) ?></p>
                </div>
                <div class="md:w-3/4 md:px-24 mx-1 md:mx-auto text-sm md:text-base text-gray-700 mt-2 md:mt-5">

                  <?php 
                  $no = 1;
                  foreach ($build as $sk) : ?>
                  <?php if ($sk['sub_kriteria'] == $b['sub_kriteria']) { ?>
                  <div class="flex justify-between mb-5">
                    <?php
                    if(is_numeric($sk['konversi']) && $sk['sub_kriteria'] != "ram" && $sk['sub_kriteria'] != "rom" && $sk['sub_kriteria'] != 'front_camera' && $sk['sub_kriteria'] != "main_camera"){
                      $akhir = $sk['konversi'];
                      $max = '99';
                      }else{
                      $max = '100';
                      $akhir = null;

                    }
                    ?>
                    <?= $no.".";
                    $no++; ?>
                    <p class="md:font-bold"><?= !is_numeric($sk['konversi']) || $sk['sub_kriteria'] == "ram" || $sk['sub_kriteria'] == "rom" ? 'Konversi' : 'Kurang dari sama dengan' ?> <?= $sk['konversi'] ?></p>
                    <form action="<?= base_url() ?>atur-konversi/<?= strtolower($text) ?>" method="post">
                      <input type="hidden" name="konversi" value="<?= $sk['konversi'] ?>">
                    <input required name="nilai" type="number" max="<?= $max ?>" class="mr-4 w-10 md:w-auto ml-auto bg-gray-200 rounded peer placeholder-transparent h-10 border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" value="<?= $sk['nilai'] == 0 ? '0' : $sk['nilai'] ?>"/>
                    <button type="submit" class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 px-3 md:px-5 rounded-full hover:bg-gray-700">
                      <i class="fas fa-pen"></i><span class="hidden md:inline"> Ubah</span>
                          
                    </button>
                    </form>
                    </div>
                    <?php } ?>
                  <?php endforeach; ?>
                    <?php if(isset($akhir)){
                      ?>
                      <div class="flex justify-between mb-5">
                        <span class=" mr-auto"><?= $no ?>.</span>
                        <p class="md:font-bold">Lebih Dari <?= $akhir ?></p>
                      <input disabled type="text" class="mr-4 w-10 md:w-auto ml-auto bg-gray-200 rounded peer placeholder-transparent h-10 border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700  cursor-not-allowed" value="100"/>
                      <button class="text-white bg-gray-800 px-1 text-sm md:text-base py-2 px-3 md:px-5 rounded-full hover:bg-gray-700 cursor-not-allowed">
                      <i class="fas fa-pen"></i><span class="hidden md:inline"> Ubah</span>
                    </button>
                      </div>
                    <?php
                    } ?>

                </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <?php $this->endSection(); ?>