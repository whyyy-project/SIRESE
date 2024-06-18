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

 <!-- content here -->
    <div class="p-3 md:px-4 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
              <h1 class="md:text-2xl font-bold text-gray-800 text-base">Apa itu <span class="text-orange-500"> SIRESE</span> ?</h1>
              <div class="border border-gray-200 m-2"></div>

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
                }, 10000);
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
                }, 10000);
              </script>
              <?php } ?>

                <div class="flex justify-center items-center text-center">
                    <form action="<?= base_url() ?>master-data/tambah" method="post" class="w-full" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                    <div class="relative w-2/3 mx-auto my-4">
                            <input required value="<?= set_value('brand') ?>" id="brand" name="brand" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="brand" oninput="listInput('brand')" onblur="hideDiv('brand')" value="<?= session()->getFlashdata('brand') ?>"/>
                            <label for="brand" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">brand</label>
                          <div id="opt_brand" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($brand as $data): ?>
                                  <p class="list_brand cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['brand'] ?>', 'brand')"><?= $data['brand'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('merek') ?>" id="merek" name="merek" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="merek" oninput="listInput('merek')" onblur="hideDiv('merek')" value="<?= session()->getFlashdata('merek') ?>"/>
                            <label for="merek" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">merek</label>
                          <div id="opt_merek" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($merek as $data): ?>
                                  <p class="list_merek cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['merek'] ?>', 'merek')"><?= $data['merek'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <label id="gambar-label" for="gambar" class="block bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700 cursor-pointer flex items-center justify-center">
                                <i class="fas fa-upload mr-2"></i> Upload Gambar
                            </label>
                            <input id="gambar" name="gambar" type="file" accept=".png,.jpg,.jpeg" class="hidden" />
                            <script>
                              document.getElementById('gambar').addEventListener('change', function() {
                                  var fileName = this.files[0].name;
                                  var label = document.getElementById('gambar-label');
                                  label.innerHTML = '<i class="fas fa-upload mr-2"></i> ' + fileName;
                              });
                              </script>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('dimensi') ?>" id="dimensi" name="dimensi" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="dimensi" oninput="listInput('dimensi')" onblur="hideDiv('dimensi')" value="<?= session()->getFlashdata('dimensi') ?>"/>
                            <label for="dimensi" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Dimensi</label>
                          <div id="opt_dimensi" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($dimensi as $data): ?>
                                  <p class="list_dimensi cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['dimensi'] ?>', 'dimensi')"><?= $data['dimensi'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('berat') ?>" id="berat" name="berat" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="berat" oninput="listInput('berat')" onblur="hideDiv('berat')" value="<?= session()->getFlashdata('berat') ?>"/>
                            <label for="berat" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Berat</label>
                          <div id="opt_berat" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($berat as $data): ?>
                                  <p class="list_berat cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['berat'] ?>', 'berat')"><?= $data['berat'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('build') ?>" id="build" name="build" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="build" oninput="listInput('build')" onblur="hideDiv('build')" value="<?= session()->getFlashdata('build') ?>"/>
                            <label for="build" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Build</label>
                          <div id="opt_build" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($build as $data): ?>
                                  <p class="list_build cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['build'] ?>', 'build')"><?= $data['build'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('lcd_type') ?>" id="lcd_type" name="lcd_type" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="lcd_type" oninput="listInput('lcd_type')" onblur="hideDiv('lcd_type')" value="<?= session()->getFlashdata('lcd_type') ?>"/>
                            <label for="lcd_type" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Tipe LCD</label>
                          <div id="opt_lcd_type" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($lcd_type as $data): ?>
                                  <p class="list_lcd_type cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['lcd_type'] ?>', 'lcd_type')"><?= $data['lcd_type'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('lcd_size') ?>" id="lcd_size" name="lcd_size" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="lcd_size" oninput="listInput('lcd_size')" onblur="hideDiv('lcd_size')" value="<?= session()->getFlashdata('lcd_size') ?>"/>
                            <label for="lcd_size" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Ukuran LCD</label>
                          <div id="opt_lcd_size" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($lcd_size as $data): ?>
                                  <p class="list_lcd_size cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['lcd_size'] ?>', 'lcd_size')"><?= $data['lcd_size'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>
                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('lcd_resolusi') ?>" id="lcd_resolusi" name="lcd_resolusi" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="lcd_resolusi" oninput="listInput('lcd_resolusi')" onblur="hideDiv('lcd_resolusi')" value="<?= session()->getFlashdata('lcd_resolusi') ?>"/>
                            <label for="lcd_resolusi" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Resolusi LCD</label>
                          <div id="opt_lcd_resolusi" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($lcd_resolusi as $data): ?>
                                  <p class="list_lcd_resolusi cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['lcd_resolusi'] ?>', 'lcd_resolusi')"><?= $data['lcd_resolusi'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('os') ?>" id="os" name="os" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="os" oninput="listInput('os')" onblur="hideDiv('os')" value="<?= session()->getFlashdata('os') ?>"/>
                            <label for="os" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Sistem Operasi</label>
                          <div id="opt_os" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($os as $data): ?>
                                  <p class="list_os cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['os'] ?>', 'os')"><?= $data['os'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('chipset') ?>" id="chipset" name="chipset" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="chipset" oninput="listInput('chipset')" onblur="hideDiv('chipset')" value="<?= session()->getFlashdata('chipset') ?>"/>
                            <label for="chipset" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Chipset/Prosessor</label>
                          <div id="opt_chipset" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($chipset as $data): ?>
                                  <p class="list_chipset cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['chipset'] ?>', 'chipset')"><?= $data['chipset'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('cpu') ?>" id="cpu" name="cpu" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="cpu" oninput="listInput('cpu')" onblur="hideDiv('cpu')" value="<?= session()->getFlashdata('cpu') ?>"/>
                            <label for="cpu" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">CPU</label>
                          <div id="opt_cpu" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($cpu as $data): ?>
                                  <p class="list_cpu cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['cpu'] ?>', 'cpu')"><?= $data['cpu'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('ram') ?>" id="ram" name="ram" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="ram" oninput="listInput('ram')" onblur="hideDiv('ram')" value="<?= session()->getFlashdata('ram') ?>"/>
                            <label for="ram" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">RAM</label>
                          <div id="opt_ram" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($ram as $data): ?>
                                  <p class="list_ram cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['ram'] ?>', 'ram')"><?= $data['ram'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('rom') ?>" id="rom" name="rom" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="rom" oninput="listInput('rom')" onblur="hideDiv('rom')" value="<?= session()->getFlashdata('rom') ?>"/>
                            <label for="rom" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Internal/ROM</label>
                          <div id="opt_rom" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($rom as $data): ?>
                                  <p class="list_rom cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['rom'] ?>', 'rom')"><?= $data['rom'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('main_camera') ?>" id="main_camera" name="main_camera" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="main_camera" oninput="listInput('main_camera')" onblur="hideDiv('main_camera')" value="<?= session()->getFlashdata('main_camera') ?>"/>
                            <label for="main_camera" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Kamera Utama</label>
                          <div id="opt_main_camera" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($main_camera as $data): ?>
                                  <p class="list_main_camera cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['main_camera'] ?>', 'main_camera')"><?= $data['main_camera'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('main_type') ?>" id="main_type" name="main_type" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="main_type" oninput="listInput('main_type')" onblur="hideDiv('main_type')" value="<?= session()->getFlashdata('main_type') ?>"/>
                            <label for="main_type" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Tipe Kamera Utama</label>
                          <div id="opt_main_type" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($main_type as $data): ?>
                                  <p class="list_main_type cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['main_type'] ?>', 'main_type')"><?= $data['main_type'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('main_video') ?>" id="main_video" name="main_video" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="main_video" oninput="listInput('main_video')" onblur="hideDiv('main_video')" value="<?= session()->getFlashdata('main_video') ?>"/>
                            <label for="main_video" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Video Kamera Utama</label>
                          <div id="opt_main_video" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($main_video as $data): ?>
                                  <p class="list_main_video cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['main_video'] ?>', 'main_video')"><?= $data['main_video'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('front_camera') ?>" id="front_camera" name="front_camera" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="front_camera" oninput="listInput('front_camera')" onblur="hideDiv('front_camera')" value="<?= session()->getFlashdata('front_camera') ?>"/>
                            <label for="front_camera" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Kamera Depan</label>
                          <div id="opt_front_camera" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($front_camera as $data): ?>
                                  <p class="list_front_camera cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['front_camera'] ?>', 'front_camera')"><?= $data['front_camera'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('front_video') ?>" id="front_video" name="front_video" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="front_video" oninput="listInput('front_video')" onblur="hideDiv('front_video')" value="<?= session()->getFlashdata('front_video') ?>"/>
                            <label for="front_video" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Video Kamera Depan</label>
                          <div id="opt_front_video" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($front_video as $data): ?>
                                  <p class="list_front_video cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['front_video'] ?>', 'front_video')"><?= $data['front_video'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('usb') ?>" id="usb" name="usb" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="usb" oninput="listInput('usb')" onblur="hideDiv('usb')" value="<?= session()->getFlashdata('usb') ?>"/>
                            <label for="usb" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Tipe USB</label>
                          <div id="opt_usb" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($usb as $data): ?>
                                  <p class="list_usb cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['usb'] ?>', 'usb')"><?= $data['usb'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('battery_capacity') ?>" id="battery_capacity" name="battery_capacity" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="battery_capacity" oninput="listInput('battery_capacity')" onblur="hideDiv('battery_capacity')" value="<?= session()->getFlashdata('battery_capacity') ?>"/>
                            <label for="battery_capacity" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Kapasitas Baterai</label>
                          <div id="opt_battery_capacity" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($battery_capacity as $data): ?>
                                  <p class="list_battery_capacity cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['battery_capacity'] ?>', 'battery_capacity')"><?= $data['battery_capacity'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required value="<?= set_value('harga') ?>" id="harga" name="harga" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="harga" oninput="listInput('harga')" onblur="hideDiv('harga')" value="<?= session()->getFlashdata('harga') ?>"/>
                            <label for="harga" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Harga</label>
                          <div id="opt_harga" class="w-full h-16 text-sm hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($harga as $data): ?>
                                  <p class="list_harga cursor-pointer border-b-2 border-gray-300" onclick="insert('<?= $data['harga'] ?>', 'harga')"><?= $data['harga'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>


                        <button type="submit" class="text-white bg-cyan-700 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-cyan-600 "><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>

            </div>
            <div class="group px-3 mr-0 py-3 m-3">
                
            </div>
        </div>
    </div>

    <script>
      function changeNumber(){
        const harga = document.getElementById('harga').value;
        document.getElementById('harga').value = formatRupiah(harga);
      }
      function formatRupiah(angka) {
      if (angka.replace(/\D/g, '').length < 1) {
          return angka.replace(/\D/g, '');
      }
      return 'Rp. ' + angka.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }
    </script>


<script>
function listInput(inputId) {
  const inputValue = document.getElementById(inputId).value.trim().toLowerCase();
  const items = document.getElementsByClassName('list_' + inputId);

  for (let item of items) {

      const text = item.textContent.trim().toLowerCase();
      if (text.includes(inputValue)) {
          item.classList.add('block');
          item.classList.remove('hidden');
      } else {
          item.classList.remove('block');
          item.classList.add('hidden');
      }
  }

        const optDiv = document.getElementById('opt_' + inputId);
        if (inputValue !== "") {
            optDiv.classList.remove('hidden');
            optDiv.classList.add('block');
        } else {
            optDiv.classList.remove('block');
            optDiv.classList.add('hidden');
        }
}

function hideDiv(divId) {
    const optDiv = document.getElementById('opt_'+divId);
    setTimeout(() => {
      optDiv.classList.remove('block');
      optDiv.classList.add('hidden');
      console.log('yoi')
    }, 200);
}

function insert(value, tag) {
    const inputElement = document.getElementById(tag);
    if (inputElement) {
        inputElement.value = value;
    } else {
        console.error('Input element with ID ' + tag + ' not found.');
    }
}

</script>


<?php $this->endSection() ?>
