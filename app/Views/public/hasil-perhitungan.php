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
            <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Hasil <span class="text-orange-500"> Rekomendasi</span></h1>

              <div class="mr-4 mt-4">
              <a href="<?= base_url() ?>rekomendasi" class="text-white bg-orange-500 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-orange-400"><i class="fas fa-refresh"></i><span class="hidden md:inline">Atur Ulang</span></a>
              <a href="<?= base_url() ?>perhitungan-smart" class="text-white bg-cyan-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-cyan-700"><i class="fas fa-calculator"></i> <span class="hidden md:inline">Algoritma</span></a>
            </div>
        </div>
    <div class="border border-gray-200 m-4 mb-2"></div>
        <p class="ml-5 text-gray-700 text-sm italic">Catatan : Harga sewaktu-waktu dapat berubah</p>
        <div class="flex flex-wrap mx-3">
            <!-- Tampilan Pagination -->
            <?php 
            // Ambil tiga elemen pertama dari array $smartphone
            $smartphone_subset = array_slice($smartphone, 0, 3);
            $no = 1;

            foreach ($smartphone_subset as $data) : 
            ?>
                <div class="w-full md:w-1/3 p-1 mb-3 md:mb-1 hover:-translate-y-1 duration-500">
                    <div class="md:p-1">
                        <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                            <div class="px-4 py-3">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg"><?= $no . '. '. $data['sMerek'] ?></h1>
                                <?php $no++ ?>
                                <div class="border border-gray-200 m-2"></div>
                                <div class="flex justify-center items-center mx-auto">
                                    <img loading="lazy" src="<?= base_url() ?>img/smartphone/<?= $data['sGambar'] ?>" class="h-24 w-86 md:h-40 rounded-tr-[20px] rounded-bl-[20px] object-cover" alt="<?= $data['sBrand'] . " " . $data['sMerek'] ?>">
                                </div>
                                <div class="mt-2 text-gray-800">
                                    <p><span class="font-bold text-sm md:text-base"> Merek : </span> <?= $data['sMerek'] ?></p>
                                    <p><span class="font-bold text-sm md:text-base"> RAM/ROM : </span> <?= $data['sRam'] ?>/<?= $data['sRom'] ?> GB</p>
                                    <p><span class="font-bold text-sm md:text-base">Harga : </span>Rp. <?= number_format($data['sHarga'], 0, ',', '.'); ?></p>
                                    <p>Kecocokan Bobot : <span class="text-gray-700 text-sm"><?= round(($data['total']/$max)*100, 2) ?>%</span></p>
                                </div>
                            </div>
                            <div class="px-4 pb-3">
                                <a href="<?= base_url() ?>detail-smarthpone/<?= $data['sSlug'] ?>" class="text-white bg-gray-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-gray-700">
                                    <i class="fas fa-info mr-2"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>


            <div class="bg-white shadow-lg rounded-lg mt-3 mx-6 pb-5 overflow-hidden">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Daftar <span class="text-orange-500"> Rekomendasi</span></h1>
                </div>

            <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!-- end datatables -->    
            
    <!-- table -->

    <div class="border border-gray-200 m-4 mb-2"></div>
        <p class="ml-5 text-gray-700 text-sm italic">Catatan : Harga sewaktu-waktu dapat berubah</p>
        <div class="flex flex-wrap mx-3">
    <div class="w-full mt-3">

        <table id="myTable" class="display w-full" style="width:100%">
            <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white">
                <tr>
                    <th>Rank</th>
                    <th>Merek</th>
                    <th>RAM / ROM</th>
                    <th>Harga</th>
                    <th>Nilai</th>
                    <th>Detail</th>
                </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $i = 1;
                            foreach ($smartphone as $data) : ?>
                    <tr class="text-sm">
                        <td><?= $i++ ?></td>
                        <td><?= $data['sMerek'] ?> <span class="md:hidden block">(<?= $data['sRam'] ?>/<?= $data['sRom'] ?>GB)</span></td>
                        <td><?= $data['sRam'] ?>/<?= $data['sRom'] ?> GB</td>
                        <td><?= $data['sHarga'] ?></td>
                        <td><?= round(($data['total']/$max)*100, 2) ?>%</td>
                        <td><a href="<?= base_url() ?>detail-smarthpone/<?= $data['sSlug'] ?>" class="text-white bg-gray-800 px-3 text-sm md:text-base py-2 md:px-0 md:py-2 rounded-full hover:bg-gray-700 flex justify-center items-center">
                                    <i class="fas fa-info mr-2 hidden md:flex"></i> Detail
                                </a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
                </div>
            </div>
        </div>
    <!-- end table -->

    <!-- js table  -->
    <script>
                $(document).ready(function() {
                    // Inisialisasi DataTables
                    var table = $('#myTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'csv',
                                className: 'btn-login bg-teal-600 hover:bg-teal-500 text-white',
                                text: 'CSV'
                            },
                            {
                                extend: 'excel',
                                className: 'btn-login bg-teal-600 hover:bg-teal-500 text-white',
                                text: 'Excel'
                            },
                            {
                                extend: 'pdf',
                                className: 'btn-login bg-teal-600 hover:bg-teal-500 text-white',
                                text: 'PDF'
                            },
                            {
                                extend: 'print',
                                className: 'btn-login bg-teal-600 hover:bg-teal-500 text-white',
                                text: 'Print'
                            }
                        ]
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







<?php $this->endSection(); ?>