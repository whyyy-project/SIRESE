<?php $this->extend('public/template') ?>
<?php $this->section('content') ?>

<div class="main-content flex-1 bg-gray-300 mt-16 md:mt-2">
    <div class=" bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-2xl text-white"> 
            <h3 class="font-bold pl-2 text-xs md:text-2xl"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>

    <div class="p-3 md:px-5 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Detail <span class="text-orange-500"><?= $toko['nama_toko'] ?></span></h1>
                <div class="border border-gray-200 m-2"></div>
                <!-- content -->
                <div class="mt-4 p-3">
                    <img src="<?= base_url() ?>img/toko/<?= $toko['foto'] ?>" alt="<?= $toko['nama_toko']  . " " .$toko['kecamatan']  . " " .$toko['kota'] ?>" class="w-40 h-1/3 md:w-1/3 mx-auto rounded-br-lg rounded-tl-lg block">
                    <table class="mx-auto font-bold mt-3">
                        <tr class="h-12">
                          <td>Nama Toko</td>
                          <td class="w-5">:</td>
                          <td><?= $toko['nama_toko'] ?></td>
                        </tr>
                        <tr class="h-12">
                          <td>Desa</td>
                          <td>:</td>
                          <td><?= $toko['desa'] ?></td>
                        </tr>
                        <tr class="h-12">
                          <td>Kecamatan</td>
                          <td>:</td>
                          <td><?= $toko['kecamatan'] ?></td>
                        </tr>
                        <tr class="h-12">
                          <td>Kabupaten/Kota</td>
                          <td>:</td>
                          <td><?= $toko['kota'] ?></td>
                        </tr>
                        <tr class="h-12">
                          <td>Provinsi</td>
                          <td>:</td>
                          <td><?= $toko['provinsi'] ?></td>
                        </tr>
                        <tr class="h-12">
                          <td>Alamat Lengkap</td>
                          <td>:</td>
                          <td><?= $toko['alamat_lengkap'] ?></td>
                        </tr>
                        <tr class="h-12">
                          <td>Whatsapp</td>
                          <td>:</td>
                          <td>
                            <?php if($toko['telepon']){ ?>
                              <a href="https://wa.me/<?= $toko['telepon'] ?>" class="ml-2 text-white bg-green-700 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-green-600">
                                    <i class="fas fa-whatsapp mr-2"></i>Hubungi Kami
                                </a>
                                <?php }
                                else{
                              echo "Data Kosong";
                                } ?>
                              </td>
                        </tr>
                        <tr class="h-12">
                          <td>Facebook</td>
                          <td>:</td>
                          <td>
                            <?php if($toko['fb']){ ?>
                              <a href="<?= $toko['fb'] ?>" class="ml-2 text-white bg-blue-700 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-blue-600">
                                    <i class="fas fa-facebook mr-2"></i>Hubungi Kami
                                </a>
                                <?php }
                                else{
                              echo "Data Kosong";
                                } ?>
                        </td>
                        </tr>
                        <tr  class="h-12">
                          <td>Instagram</td>
                          <td>:</td>
                          <td>
                            <?php if($toko['ig']){ ?>
                              <a href="<?= $toko['ig'] ?>" class="ml-2 text-white bg-purple-700 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-purple-600">
                                    <i class="fas fa-instagram mr-2"></i>Hubungi Kami
                                </a>
                                <?php }
                                else{
                              echo "Data Kosong";
                                } ?>
                        </td>
                        </tr>
                        <tr  class="h-12">
                          <td>TikTok</td>
                          <td>:</td>
                          <td>
                            <?php if($toko['tiktok']){ ?>
                              <a href="<?= $toko['tiktok'] ?>" class="ml-2 text-white bg-gray-700 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-gray-600">
                                    <i class="fas fa-tiktok mr-2"></i>Hubungi Kami
                                </a>
                                <?php }
                                else{
                              echo "Data Kosong";
                                } ?>
                        </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
            <div class="group px-3 mr-0 py-3 m-3 mb-0 block text-center">
                <a href="<?= base_url() ?>toko" class="text-white bg-gray-800 px-4 py-2 rounded-full hover:bg-gray-700">
                    Lihat Toko Lain
                </a>
            </div>
        </div>
<?php $this->endSection() ?>