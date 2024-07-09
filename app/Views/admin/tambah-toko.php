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
                <div id="alertErr" class="bg-red-500 text-white px-5 py-3 rounded-lg mb-4" role="alert">
                    <div class="flex items-center">
                  <span><i class="fas fa-triangle-exclamation"></i> <?= session()->get('eror') ?></span>
                  </div>
              </div>
              <script>
                const alert = document.getElementById('alertErr')
                setTimeout(() => {
                  alert.classList.add('hidden')
                }, 10000);
              </script>
              <?php } ?>

                <div class="flex justify-center items-center text-center">
                    <form action="<?= base_url() ?>data-toko/add" method="post" class="w-full" enctype="multipart/form-data">
                      <?= csrf_field() ?>
                      <div class="relative w-2/3 mx-auto my-4">
                            <input required value="<?= set_value('nama_toko') ?>" id="nama_toko" name="nama_toko" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="nama_toko"/>
                            <label for="nama_toko" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Nama Toko</label>
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
                      <div class="relative w-2/3 mx-auto my-4">
                            <input required value="<?= set_value('desa') ?>" id="desa" name="desa" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="desa"/>
                            <label for="desa" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Desa</label>
                      </div>
                      <div class="relative w-2/3 mx-auto my-4">
                            <input required value="<?= set_value('kecamatan') ?>" id="kecamatan" name="kecamatan" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="kecamatan"/>
                            <label for="kecamatan" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Kecamatan</label>
                      </div>
                      <div class="relative w-2/3 mx-auto my-4">
                            <input required value="<?= set_value('kota') ?>" id="kota" name="kota" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="kota"/>
                            <label for="kota" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Kota</label>
                      </div>
                      <div class="relative w-2/3 mx-auto my-4">
                            <input required value="<?= set_value('provinsi') ?>" id="provinsi" name="provinsi" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="provinsi"/>
                            <label for="provinsi" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Provinsi</label>
                      </div>
                      <div class="relative w-2/3 mx-auto my-4">
                            <input required value="<?= set_value('alamat_lengkap') ?>" id="alamat_lengkap" name="alamat_lengkap" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="alamat_lengkap"/>
                            <label for="alamat_lengkap" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Alamat Lengkap</label>
                      </div>
                      <div class="relative w-2/3 mx-auto my-4">
                            <input value="<?= set_value('fb') ?>" id="fb" name="fb" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="fb"/>
                            <label for="fb" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Link URL Akun Facebook</label>
                      </div>
                      <div class="relative w-2/3 mx-auto my-4">
                            <input value="<?= set_value('ig') ?>" id="ig" name="ig" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="ig"/>
                            <label for="ig" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Link URL Akun Instagram</label>
                      </div>
                      <div class="relative w-2/3 mx-auto my-4">
                            <input value="<?= set_value('tiktok') ?>" id="tiktok" name="tiktok" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="tiktok"/>
                            <label for="tiktok" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Link URL Akun TikTok</label>
                      </div>
                      <div class="relative w-2/3 mx-auto my-4">
                            <input value="<?= set_value('telepon') ?>" id="telepon" name="telepon" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="WhatsApp (62)"/>
                            <label for="telepon" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">No Whatsapp (62)</label>
                      </div>
                        <button type="submit" class="text-white bg-cyan-700 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-cyan-600 "><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
            <div class="group px-3 mr-0 py-3 m-3">
                
            </div>
        </div>
    </div>


<?php $this->endSection() ?>
