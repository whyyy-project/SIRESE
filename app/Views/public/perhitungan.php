<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=chrome" />
    <title>SIRESE | Perhitungan</title>
    <meta name="author" content="wahyu nur cahyo" />
    <meta name="description" content="description here" />
    <meta name="keywords" content="keywords,here" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/customStyle.css">
    <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!-- end datatables -->   


</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-4 mx-2">
  
  <div class="fixed bottom-2 left-0 right-0 z-10">
    <div class="flex">
      <a href="<?= base_url() ?>algoritma-rekomendasi" class="text-white bg-cyan-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-cyan-700 mx-auto">
        <i class="fas fa-arrow-left"></i> kembali
      </a>
    </div>
  </div>

    <div class="border border-gray-200 m-4 mb-2"></div>
    <div class="flex flex-wrap mx-3">
      <div class="w-full">
        <p class="text-lg text-gray-700 text-center font-bold">Bobot User</p>
        <table id="myTable1" class="display w-full" style="width:100%">
          <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white">
            <tr>
              <th>No</th>
              <th>Kriteria</th>
              <th>Bobot</th>
              <th>Normalisasi Bobot</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <td>1</td>
              <td>Body</td>
              <td><?= session()->get('bobotAwal')['body'] ?></td>
              <td><?= session()->get('body') ?> (<?= round(session()->get('body')*100, 2) ?>%)</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Display</td>
              <td><?= session()->get('bobotAwal')['layar'] ?></td>
              <td><?= session()->get('display') ?> (<?= round(session()->get('display')*100, 2) ?>%)</td>
            </tr>
            <tr>
              <td>3</td>
              <td>System</td>
              <td><?= session()->get('bobotAwal')['system'] ?></td>
              <td><?= session()->get('system') ?> (<?= round(session()->get('system')*100, 2) ?>%)</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Memory</td>
              <td><?= session()->get('bobotAwal')['memory'] ?></td>
              <td><?= session()->get('memory') ?> (<?= round(session()->get('memory')*100, 2) ?>%)</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Main Camera</td>
              <td><?= session()->get('bobotAwal')['main_camera'] ?></td>
              <td><?= session()->get('mainCamera') ?> (<?= round(session()->get('mainCamera')*100, 2) ?>%)</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Front Camera</td>
              <td><?= session()->get('bobotAwal')['front_camera'] ?></td>
              <td><?= session()->get('frontCamera') ?> (<?= round(session()->get('frontCamera')*100, 2) ?>%)</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Battery</td>
              <td><?= session()->get('bobotAwal')['battery'] ?></td>
              <td><?= session()->get('battery') ?> (<?= round(session()->get('battery')*100, 2) ?>%)</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Price</td>
              <td><?= session()->get('bobotAwal')['harga'] ?></td>
              <td><?= session()->get('price') ?> (<?= round(session()->get('price')*100, 2) ?>%)</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="2">Total</th>
              <?php 
              $total = session()->get('bobotAwal')['body']+session()->get('bobotAwal')['layar']+session()->get('bobotAwal')['system']+session()->get('bobotAwal')['memory']+session()->get('bobotAwal')['main_camera']+session()->get('bobotAwal')['front_camera']+session()->get('bobotAwal')['battery']+session()->get('bobotAwal')['harga'];
              $nTotal = session()->get('body') + session()->get('display') + session()->get('system') + session()->get('memory') + session()->get('mainCamera') + session()->get('frontCamera') + session()->get('battery') + session()->get('price');
              ?>
              <th><?= $total ?></th>
              <th><?= $nTotal ?> (<?= $nTotal*100 ?>%)</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <?php if (session()->get('filter')) { ?>
    <!-- filter harga -->
    <div class="border border-gray-200 m-4 mb-2"></div>
    <div class="flex flex-wrap mx-3">
      <div class="w-full mt-5">
        <p class="text-lg text-gray-700 text-center font-bold">Price Fillter</p>
        <p class="text-lg text-gray-600 text-center ">Minimum Price : Rp. <?= number_format(session()->get('hMin'), 0, ',', '.'); ?></p>
        <p class="text-lg text-gray-600 text-center ">Maximum Price : Rp. <?= number_format(session()->get('hMax'), 0, ',', '.'); ?></p>
      </div>
    </div>
    <?php } ?>

    <!-- table konversi -->
    <div class="border border-gray-200 m-4 mb-2"></div>
    <div class="flex flex-wrap mx-3">
      <div class="w-full mt-5">
        <p class="text-lg text-gray-700 text-center font-bold">Konversi Data</p>
        <div class="overflow-x-auto">
        <table id="myTable" class="display w-full" style="width:100%">
            <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Smartphone</th>
                    <th  colspan="3">Body</th>
                    <th  colspan="3">Display</th>
                    <th  colspan="3">System</th>
                    <th  colspan="2">Memory</th>
                    <th  colspan="3">Main Camera</th>
                    <th  colspan="2">Front Camera</th>
                    <th  colspan="2">Battery</th>
                    <th rowspan="2">Price</th>
                </tr>
                <tr>
                  <th>Dimention</th>
                  <th>Weight</th>
                  <th>Build</th>
                  <th>Type</th>
                  <th>Size</th>
                  <th>Resolution</th>
                  <th>OS</th>
                  <th>Chipset</th>
                  <th>CPU</th>
                  <th>RAM</th>
                  <th>ROM</th>
                  <th>Camera</th>
                  <th>Type</th>
                  <th>Video</th>
                  <th>Camera</th>
                  <th>Video</th>
                  <th>USB</th>
                  <th>Capacity</th>
                </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $i = 1;
                            foreach ($kuanti as $data) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['sMerek'] ?> (<?= $data['sRam'] ?>/<?= $data['sRom'] ?> GB)</td>
                        <td><?= $data['kdimensi'] ?></td>
                        <td><?= $data['kberat'] ?></td>
                        <td><?= $data['kbuild'] ?></td>
                        <td><?= $data['klcd_type'] ?></td>
                        <td><?= $data['klcd_size'] ?></td>
                        <td><?= $data['klcd_resolusi'] ?></td>
                        <td><?= $data['kos'] ?></td>
                        <td><?= $data['kchipset'] ?></td>
                        <td><?= $data['kcpu'] ?></td>
                        <td><?= $data['kram'] ?></td>
                        <td><?= $data['krom'] ?></td>
                        <td><?= $data['kmain_camera'] ?></td>
                        <td><?= $data['kmain_type'] ?></td>
                        <td><?= $data['kmain_video'] ?></td>
                        <td><?= $data['kfront_camera'] ?></td>
                        <td><?= $data['kfront_video'] ?></td>
                        <td><?= $data['kusb'] ?></td>
                        <td><?= $data['kbattery_capacity'] ?></td>
                      <td><?= session()->get('filter') ? $data['harga'] : $data['kharga'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        </div>
      </div>
    <!-- end table konversi -->

    <!-- table Normalisasi -->
    <div class="border border-gray-200 m-4 mb-2"></div>
    <div class="flex flex-wrap mx-3">
      <div class="w-full mt-5">
        <p class="text-lg text-gray-700 text-center font-bold">Normalisasi Data</p>
        <div class="overflow-x-auto">
        <table id="myTable2" class="display w-full" style="width:100%">
            <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Smartphone</th>
                    <th  colspan="3">Body</th>
                    <th  colspan="3">Display</th>
                    <th  colspan="3">System</th>
                    <th  colspan="2">Memory</th>
                    <th  colspan="3">Main Camera</th>
                    <th  colspan="2">Front Camera</th>
                    <th  colspan="2">Battery</th>
                    <th rowspan="2">Price</th>
                </tr>
                <tr>
                  <th>Dimention</th>
                  <th>Weight</th>
                  <th>Build</th>
                  <th>Type</th>
                  <th>Size</th>
                  <th>Resolution</th>
                  <th>OS</th>
                  <th>Chipset</th>
                  <th>CPU</th>
                  <th>RAM</th>
                  <th>ROM</th>
                  <th>Camera</th>
                  <th>Type</th>
                  <th>Video</th>
                  <th>Camera</th>
                  <th>Video</th>
                  <th>USB</th>
                  <th>Capacity</th>
                </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $i = 1;
                            foreach ($normal as $data) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['sMerek'] ?> (<?= $data['sRam'] ?>/<?= $data['sRom'] ?> GB)</td>
                        <td><?= $data['dimensi'] ?></td>
                        <td><?= $data['berat'] ?></td>
                        <td><?= $data['build'] ?></td>
                        <td><?= $data['lcd_type'] ?></td>
                        <td><?= $data['lcd_size'] ?></td>
                        <td><?= $data['lcd_resolusi'] ?></td>
                        <td><?= $data['os'] ?></td>
                        <td><?= $data['chipset'] ?></td>
                        <td><?= $data['cpu'] ?></td>
                        <td><?= $data['ram'] ?></td>
                        <td><?= $data['rom'] ?></td>
                        <td><?= $data['main_camera'] ?></td>
                        <td><?= $data['main_type'] ?></td>
                        <td><?= $data['main_video'] ?></td>
                        <td><?= $data['front_camera'] ?></td>
                        <td><?= $data['front_video'] ?></td>
                        <td><?= $data['usb'] ?></td>
                        <td><?= $data['battery_capacity'] ?></td>
                        <td><?= $data['harga'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        </div>
      </div>
    <!-- end table Normalisasi -->


    <!-- table Normalisasi -->
    <div class="border border-gray-200 m-4 mb-2"></div>
    <div class="flex flex-wrap mx-3">
      <div class="w-full mt-5">
        <p class="text-lg text-gray-700 text-center font-bold">Hasil Akhir</p>
        <div class="overflow-x-auto">
        <table id="myTable4" class="display w-full" style="width:100%">
            <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Smartphone</th>
                    <th  colspan="3">Body</th>
                    <th  colspan="3">Display</th>
                    <th  colspan="3">System</th>
                    <th  colspan="2">Memory</th>
                    <th  colspan="3">Main Camera</th>
                    <th  colspan="2">Front Camera</th>
                    <th  colspan="2">Battery</th>
                    <th rowspan="2">Price</th>
                </tr>
                <tr>
                  <th>Dimention</th>
                  <th>Weight</th>
                  <th>Build</th>
                  <th>Type</th>
                  <th>Size</th>
                  <th>Resolution</th>
                  <th>OS</th>
                  <th>Chipset</th>
                  <th>CPU</th>
                  <th>RAM</th>
                  <th>ROM</th>
                  <th>Camera</th>
                  <th>Type</th>
                  <th>Video</th>
                  <th>Camera</th>
                  <th>Video</th>
                  <th>USB</th>
                  <th>Capacity</th>
                </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $i = 1;
                            foreach ($akhir as $data) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['sMerek'] ?> (<?= $data['sRam'] ?>/<?= $data['sRom'] ?> GB)</td>
                        <td><?= round($data['dimensi'],5) ?></td>
                        <td><?= round($data['berat'],5) ?></td>
                        <td><?= round($data['build'],5) ?></td>
                        <td><?= round($data['lcd_type'],5) ?></td>
                        <td><?= round($data['lcd_size'],5) ?></td>
                        <td><?= round($data['lcd_resolusi'],5) ?></td>
                        <td><?= round($data['os'],5) ?></td>
                        <td><?= round($data['chipset'],5) ?></td>
                        <td><?= round($data['cpu'],5) ?></td>
                        <td><?= round($data['ram'],5) ?></td>
                        <td><?= round($data['rom'],5) ?></td>
                        <td><?= round($data['main_camera'],5) ?></td>
                        <td><?= round($data['main_type'],5) ?></td>
                        <td><?= round($data['main_video'],5) ?></td>
                        <td><?= round($data['front_camera'],5) ?></td>
                        <td><?= round($data['front_video'],5) ?></td>
                        <td><?= round($data['usb'],5) ?></td>
                        <td><?= round($data['battery_capacity'],5) ?></td>
                        <td><?= round($data['harga'],5) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        </div>
      </div>
    <!-- end table Hasil Akhir -->


    <!-- table rank -->
    <div class="border border-gray-200 m-4 mb-2"></div>
    <div class="flex flex-wrap mx-3">
      <div class="w-full mt-5 mb-24 md:mb-12">
        <p class="text-lg text-gray-700 text-center font-bold">Perangkingan</p>
        <div class="overflow-x-auto">
        <table id="myTable3" class="display w-full" style="width:100%">
            <thead class="mt-3 bg-gradient-to-r from-cyan-700 to-gray-800 text-sm shadow text-white">
                <tr>
                  <th>Rank</th>
                  <th>Smartphone</th>
                  <th>Body</th>
                  <th>Display</th>
                  <th>System</th>
                  <th>Memory</th>
                  <th>Main Camera</th>
                  <th>Front Camera</th>
                  <th>Battery</th>
                  <th>Price</th>
                  <th>Total</th>
                  <th>Persentase</th>
                </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $i = 1;
                            foreach ($hasil as $data) : ?>
                    <tr>
                      <?php
                      $hBody = ($data['dimensi'] + $data['berat'] + $data['build'])/3;
                      $hDisplay = ($data['lcd_type'] + $data['lcd_size'] + $data['lcd_resolusi'])/3;
                      $hSystem = ($data['os'] + $data['chipset'] + $data['cpu']) / 3;
                      $hMemory = ($data['ram']+$data['rom'])/2;
                      $hMain = ($data['main_camera'] + $data['main_type'] + $data['main_video'])/3;
                      $hFront = ($data['front_camera']+$data['front_video'])/2;
                      $hBattery = ($data['usb'] + $data['battery_capacity'])/2;
                      $hPrice = $data['harga'];
                      ?>
                        <td><?= $i++ ?></td>
                        <td><?= $data['sMerek'] ?> (<?= $data['sRam'] ?>/<?= $data['sRom'] ?> GB)</td>
                        <td><?= round($hBody,8) ?></td>
                        <td><?= round($hDisplay,8) ?></td>
                        <td><?= round($hSystem,8) ?></td>
                        <td><?= round($hMemory,8) ?></td>
                        <td><?= round($hMain,8) ?></td>
                        <td><?= round($hFront,8) ?></td>
                        <td><?= round($hBattery,8) ?></td>
                        <td><?= round($hPrice,8) ?></td>
                        <td><?= round($data['total'],8) ?></td>
                        <td><?= round(($data['total']/$max)*100, 2) ?>%</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        </div>
      </div>
    <!-- end table rank -->




  


    <!-- js table  -->
    <script>
                $(document).ready(function() {
                    // Inisialisasi DataTables
                    var table = $('#myTable').DataTable({
                        dom: 'Bfrtip',
                    });
                });
                $(document).ready(function() {
                    // Inisialisasi DataTables
                    var table = $('#myTable1').DataTable({
                        dom: 'Bfrtip',
                    });
                });
                $(document).ready(function() {
                    // Inisialisasi DataTables
                    var table = $('#myTable2').DataTable({
                        dom: 'Bfrtip',
                    });
                });
                $(document).ready(function() {
                    // Inisialisasi DataTables
                    var table = $('#myTable3').DataTable({
                        dom: 'Bfrtip',
                    });
                });
                $(document).ready(function() {
                    // Inisialisasi DataTables
                    var table = $('#myTable4').DataTable({
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






</body>
</html>
