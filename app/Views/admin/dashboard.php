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
                <h1 class="md:text-2xl font-bold text-gray-800 text-base">Apa itu <span class="text-orange-500"> SIRESE</span> ?</h1>
                <div class="border border-gray-200 m-2"></div>
                <?php if (session()->getFlashdata('login')) { ?>
                  <div class="bg-gray-200 text-center">
                    <p class="mt-2 text-gray-600 text-lg">
                      Selamat Datang <span class="font-bold"><?= session()->get('nama') ?>.</span>
                    </p>
                  </div>
                  <?php } ?>
                <p class="mt-2 text-gray-600">
                    <span id="typing-text"></span>
                    <span id="cursor"></span>
                </p>
            </div>
            <div class="group px-3 mr-0 py-3 m-3">
            </div>
        </div>
    </div>
    <div class="p-3 md:px-4 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="md:text-2xl font-bold text-gray-800 text-base">Data<span class="text-orange-500"> Smartphone</span></h1>
                <div class="border border-gray-200 m-2"></div>
                <table id="myTable" class="display w-full" style="width:100%">
            <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white">
                <tr>
                    <th>No.</th>
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
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['merek'] ?></td>
                        <td class="hidden md:block"><?= $data['ram'] ?>/<?= $data['rom'] ?> GB</td>
                        <td><?= $data['harga'] ?></td>
                        <td><a href="<?= base_url() ?>detail-smarthpone/<?= $data['slug'] ?>" class="text-white bg-cyan-950 px-3 text-sm md:text-base py-2 md:px-0 md:py-2 rounded-full hover:bg-cyan-900 flex justify-center items-center">
                                    <i class="fas fa-info mr-2 hidden md:flex"></i> Detail
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

    <!-- js for dashboard -->
    <script src="<?= base_url() ?>assets/js/typingText.js"></script>
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
