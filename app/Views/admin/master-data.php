<?php $this->extend('admin/template') ?>
<?php $this->section('content')  ?>
<!-- css for table -->
            <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!-- end css -->    

<!-- content  -->
<!-- body, footer -->
<div class="main-content flex-1 bg-gray-300 md:mt-2">
    <div class=" bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-2xl text-white"> 
            <h3 class="font-bold pl-2 text-xs md:text-2xl"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>


  <!-- content here -->
    <div class="p-3 md:px-4 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
              <div class="flex justify-between">
                <h1 class="md:text-2xl font-bold text-gray-800 text-base">Data<span class="text-orange-500"> Smartphone</span></h1>
                <a href="<?= base_url() ?>master-data/tambah" class="text-white bg-green-800 mx-0 text-sm md:text-base py-2 md:px-0 md:py-2 rounded-full hover:bg-green-700 flex justify-center items-center w-24" onclick="bukaModal('inputHp')">
                  <i class="fas fa-plus text-sm"></i> <span class="hidden md:flex">Tambah</span>
                </a>
              </div>
                <div class="border border-gray-200 m-2"></div>
                <table id="myTable" class="display w-full" style="width:100%">
            <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white">
                <tr>
                    <th>No.</th>
                    <th>Brand</th>
                    <th>Merek</th>
                    <th class="hidden md:block">RAM / ROM</th>
                    <th>Harga</th>
                    <th>Detail</th>
                </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $i = 1;
                            foreach ($smartphone as $data) : ?>
                    <tr class="text-sm md:text-base">
                        <td><?= $i++ ?></td>
                        <td><?= $data['brand'] ?></td>
                        <td><?= $data['merek'] ?></td>
                        <td class="hidden md:block"><?= $data['ram'] ?>/<?= $data['rom'] ?> GB</td>
                        <td><?= $data['harga'] ?></td>
                        <td><a href="<?= base_url() ?>detail-smarthpone/<?= $data['slug'] ?>" class="text-white bg-cyan-950 px-3 text-sm md:text-base py-2 md:px-0 md:py-2 rounded-full hover:bg-cyan-900 flex justify-center items-center">
                                    <i class="fas fa-pen mr-2 hidden md:flex text-sm"></i> Edit
                                </a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            </div>
            <div class="group px-3 mr-0 py-3 m-3">
            </div>
        </div>
    </div>


      <!-- content here -->
    <div class="p-3 md:px-4 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
              <div class="flex justify-between items-center">
                <h1 class="md:text-2xl font-bold text-gray-800 text-base">Data<span class="text-orange-500"> Konversi</span></h1>
                <div class="inline">

                  <a href="<?= base_url() ?>reset-konversi" onclick="spin('resetKonversi')" class="text-white bg-red-700 px-1 text-sm md:text-base py-2 md:px-5 md:py-2 rounded-full hover:bg-red-600 mr-1">
                    <i class="fas fa-trash mx-2 md:mx-0"></i> <span class="hidden md:inline">Reset</span>
                  </a>
                  <a href="<?= base_url() ?>refresh-konversi" onclick="spin('konversi')" class="text-white bg-cyan-800 px-1 text-sm md:text-base py-2 md:px-5 md:py-2 rounded-full hover:bg-cyan-700">
                    <i id="konversi" class="fas fa-arrows-rotate mx-2 md:mx-0"></i> <span class="hidden md:inline">Konversi</span>
                  </a>
            </div>
              </div>
                <div class="border border-gray-200 m-2"></div>
                <div class="overflow-x-auto">

          <table class="w-full bg-white rounded-lg shadow-md border border-gray-200">
            <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white h-12 border-b border-black">
                  <tr>
                    <th  class="w-12 px-1">Smartphone</th>
                    <th>Dimensi</th>
                    <th>Berat</th>
                    <th>Build</th>
                    <th>Tipe LCD</th>
                    <th>Ukuran LCD</th>
                    <th>Resolusi</th>
                    <th>Sistem Operasi</th>
                    <th>Chipset</th>
                    <th>CPU</th>
                    <th>RAM</th>
                    <th>ROM</th>
                    <th>Main Camera</th>
                    <th>Main Type</th>
                    <th>Main VIdeo</th>
                    <th>Front Camera</th>
                    <th>Front Video</th>
                    <th>USB</th>
                    <th>Battery</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody class="h-12 text-gray-700 text-sm">
                  <?php
                  $no = 1;
                  foreach($konversi as $konv) : ?>
                  <tr class="text-center <?= $no % 2 ? 'bg-gray-100' : '' ?>">
                    <?php $no++ ?>
                    <td class="px-1"><?= $konv['brand'] . " " . $konv['merek'] ."(" . $konv['mRam'] . "/" . $konv['mRom']. " gb)" ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['dimensi']) > 4 ? substr($konv['dimensi'], 0, 4) : $konv['dimensi'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['berat']) > 4 ? substr($konv['berat'], 0, 4) : $konv['berat'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['build']) > 4 ? substr($konv['build'], 0, 4) : $konv['build'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['lcd_type']) > 4 ? substr($konv['lcd_type'], 0, 4) : $konv['lcd_type'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['lcd_size']) > 4 ? substr($konv['lcd_size'], 0, 4) : $konv['lcd_size'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['lcd_resolusi']) > 4 ? substr($konv['lcd_resolusi'], 0, 4) : $konv['lcd_resolusi'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['os']) > 4 ? substr($konv['os'], 0, 4) : $konv['os'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['chipset']) > 4 ? substr($konv['chipset'], 0, 4) : $konv['chipset'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['cpu']) > 4 ? substr($konv['cpu'], 0, 4) : $konv['cpu'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['ram']) > 4 ? substr($konv['ram'], 0, 4) : $konv['ram'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['rom']) > 4 ? substr($konv['rom'], 0, 4) : $konv['rom'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['main_camera']) > 4 ? substr($konv['main_camera'], 0, 4) : $konv['main_camera'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['main_type']) > 4 ? substr($konv['main_type'], 0, 4) : $konv['main_type'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['main_video']) > 4 ? substr($konv['main_video'], 0, 4) : $konv['main_video'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['front_camera']) > 4 ? substr($konv['front_camera'], 0, 4) : $konv['front_camera'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['front_video']) > 4 ? substr($konv['front_video'], 0, 4) : $konv['front_video'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['usb']) > 4 ? substr($konv['usb'], 0, 4) : $konv['usb'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['battery_capacity']) > 4 ? substr($konv['battery_capacity'], 0, 4) : $konv['battery_capacity'] ?></td>
                    <td class="border border-gray-400"><?= strlen($konv['harga']) > 4 ? substr($konv['harga'], 0, 4) : $konv['harga'] ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
                </div>

            </div>
            <div class="group px-3 mr-0 py-3 m-3">
            </div>
        </div>
    </div>

      <!-- content here -->
    <div class="p-3 md:px-4 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
              <div class="flex justify-between items-center">
                <h1 class="md:text-2xl font-bold text-gray-800 text-base">Data<span class="text-orange-500"> Normalisasi</span></h1>
                <div class="inline">

                  <a href="<?= base_url() ?>reset-normalisasi" class="text-white bg-red-700 px-1 text-sm md:text-base py-2 md:px-5 md:py-2 rounded-full hover:bg-red-600 mr-1">
                    <i class="fas fa-trash mx-2 md:mx-0"></i> <span class="hidden md:inline">Reset</span>
                  </a>
                  <a href="<?= base_url() ?>refresh-normalisasi" onclick="spin('normalisasi')" class="text-white bg-cyan-800 px-1 text-sm md:text-base py-2 md:px-5 md:py-2 rounded-full hover:bg-cyan-700">
                    <i id="normalisasi" class="fas fa-arrows-rotate mx-2 md:mx-0"></i> <span class="hidden md:inline">Normalisasi</span>
                  </a>
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
              </div>
                <div class="border border-gray-200 m-2"></div>
                <?php if (session()->getFlashdata('eror')) { ?>
                <div id="alert" class="bg-red-500 text-white px-5 py-3 rounded-lg mb-4" role="alert">
                    <div class="flex items-center">
                  <span><i class="fas fa-triangle-exclamation"></i> <?= session()->get('eror') ?></span>
                  </div>
              </div>
              <?php } ?>
                <?php if (session()->getFlashdata('successKonversi')) { ?>
                <div id="notifikasi" class="bg-green-500 text-white px-5 py-3 rounded-lg mb-4" role="alert">
                    <div class="flex items-center">
                      <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4"></path>
                      </svg>
                  <span><?= session()->get('successKonversi') ?></span>
                </div>
              </div>
              <?php } ?>
              <script>
                const notif = document.getElementById('notifikasi')
                setTimeout(() => {
                  notif.classList.add('hidden')
                }, 3000);
              </script>
                <div class="overflow-x-auto">

          <table class="w-full bg-white rounded-lg shadow-md border border-gray-200">
            <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white h-12 border-b border-black">
                  <tr>
                    <th  class="w-12 px-1">Smartphone</th>
                    <th>Dimensi</th>
                    <th>Berat</th>
                    <th>Build</th>
                    <th>Tipe LCD</th>
                    <th>Ukuran LCD</th>
                    <th>Resolusi</th>
                    <th>Sistem Operasi</th>
                    <th>Chipset</th>
                    <th>CPU</th>
                    <th>RAM</th>
                    <th>ROM</th>
                    <th>Main Camera</th>
                    <th>Main Type</th>
                    <th>Main VIdeo</th>
                    <th>Front Camera</th>
                    <th>Front Video</th>
                    <th>USB</th>
                    <th>Battery</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody class="h-12 text-gray-700 text-sm">
                  <?php
                  $no = 1;
                  foreach($normalisasi as $norm) : ?>
                  <tr class="text-center <?= $no % 2 ? 'bg-gray-100' : '' ?>">
                    <?php $no++ ?>
                    <td class="px-1"><?= $norm['brand'] . " " . $norm['merek'] ."(" . $norm['mRam'] . "/" . $norm['mRom']. " gb)" ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['dimensi']) > 4 ? substr($norm['dimensi'], 0, 4) : $norm['dimensi'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['berat']) > 4 ? substr($norm['berat'], 0, 4) : $norm['berat'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['build']) > 4 ? substr($norm['build'], 0, 4) : $norm['build'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['lcd_type']) > 4 ? substr($norm['lcd_type'], 0, 4) : $norm['lcd_type'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['lcd_size']) > 4 ? substr($norm['lcd_size'], 0, 4) : $norm['lcd_size'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['lcd_resolusi']) > 4 ? substr($norm['lcd_resolusi'], 0, 4) : $norm['lcd_resolusi'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['os']) > 4 ? substr($norm['os'], 0, 4) : $norm['os'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['chipset']) > 4 ? substr($norm['chipset'], 0, 4) : $norm['chipset'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['cpu']) > 4 ? substr($norm['cpu'], 0, 4) : $norm['cpu'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['ram']) > 4 ? substr($norm['ram'], 0, 4) : $norm['ram'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['rom']) > 4 ? substr($norm['rom'], 0, 4) : $norm['rom'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['main_camera']) > 4 ? substr($norm['main_camera'], 0, 4) : $norm['main_camera'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['main_type']) > 4 ? substr($norm['main_type'], 0, 4) : $norm['main_type'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['main_video']) > 4 ? substr($norm['main_video'], 0, 4) : $norm['main_video'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['front_camera']) > 4 ? substr($norm['front_camera'], 0, 4) : $norm['front_camera'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['front_video']) > 4 ? substr($norm['front_video'], 0, 4) : $norm['front_video'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['usb']) > 4 ? substr($norm['usb'], 0, 4) : $norm['usb'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['battery_capacity']) > 4 ? substr($norm['battery_capacity'], 0, 4) : $norm['battery_capacity'] ?></td>
                    <td class="border border-gray-400"><?= strlen($norm['harga']) > 4 ? substr($norm['harga'], 0, 4) : $norm['harga'] ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
                </div>

            </div>
            <div class="group px-3 mr-0 py-3 m-3">
            </div>
        </div>
    </div>

<!-- js for dashboard -->
<!-- js table  -->
    <script>
                $(document).ready(function() {
                    // Inisialisasi DataTables
                    var table = $('#myTable').DataTable({
                        dom: 'Bfrtip',
                    });
                });
            </script>
            <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<!-- end js table -->

<?php $this->endSection() ?>
