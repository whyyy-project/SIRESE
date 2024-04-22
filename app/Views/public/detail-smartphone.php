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
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Detail <span class="text-orange-500"><?= $hasil->merek ?></span></h1>
                <div class="border border-gray-200 m-2"></div>
                <!-- content -->
                <div class="mt-4 p-3">
                    <img src="<?= base_url() ?>img/smartphone/<?= $hasil->gambar ?>" alt="<?= $hasil->merek ?>" class="w-40 md:w-1/3 mx-auto rounded-br-lg rounded-tl-lg block">

                    <table class="mx-auto">
                        <tr>
                            <td colspan="3" class="font-bold"><h3>Device</h3></td>
                        </tr>
                        <tr>
                            <td style="width: 150px;">Brand</td>
                            <td style="width: 20px;">:</td>
                            <td><?= $hasil->brand ?> </td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>:</td>
                            <td><?= $hasil->merek ?> </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="font-bold"><h3>Memory</h3></td>
                        </tr>
                        <tr>
                            <td>RAM</td>
                            <td>:</td>
                            <td><?= $hasil->ram ?> GB</td>
                        </tr>
                        <tr>
                            <td>ROM</td>
                            <td>:</td>
                            <td><?= $hasil->rom ?> GB</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="font-bold"><h3>Body</h3></td>
                        </tr>
                        <tr>
                            <td>Dimension</td>
                            <td>:</td>
                            <td><?= $hasil->dimensi ?> mm</td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>:</td>
                            <td><?= $hasil->berat ?> gr</td>
                        </tr>
                        <tr>
                            <td>Build</td>
                            <td>:</td>
                            <td class="uppercase">glass front, <?= $hasil->build ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="font-bold"><h3>Display</h3></td>
                        </tr>
                        <tr>
                            <td>Type LCD</td>
                            <td>:</td>
                            <td><?= $hasil->lcd_type ?></td>
                        </tr>
                        <tr>
                            <td>LCD Size</td>
                            <td>:</td>
                            <td><?= $hasil->lcd_size ?> cm<sup>2</sup></td>
                        </tr>
                        <tr>
                            <td>Resolution</td>
                            <td>:</td>
                            <td><?= $hasil->lcd_resolusi ?> piksel</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="font-bold"><h3>Platform</h3></td>
                        </tr>
                        <tr>
                            <td>Operating System</td>
                            <td>:</td>
                            <td><?= $hasil->os ?></td>
                        </tr>
                        <tr>
                            <td>Chipset</td>
                            <td>:</td>
                            <td><?= $hasil->chipset ?></td>
                        </tr>
                        <tr>
                            <td>CPU</td>
                            <td>:</td>
                            <td class="uppercase"><?= $hasil->cpu ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="font-bold"><h3>Camera</h3></td>
                        </tr>
                        <tr>
                            <td>Main Camera</td>
                            <td>:</td>
                            <td><?= $hasil->main_camera ?> MP</td>
                        </tr>
                        <tr>
                            <td>Type Main Camera</td>
                            <td>:</td>
                            <td><?= $hasil->main_type ?></td>
                        </tr>
                        <tr>
                            <td>Video Main Camera</td>
                            <td>:</td>
                            <td><?= $hasil->main_video ?></td>
                        </tr>
                        <tr>
                            <td>Front Camera</td>
                            <td>:</td>
                            <td><?= $hasil->front_camera ?> MP</td>
                        </tr>
                        <tr>
                            <td>Front Video</td>
                            <td>:</td>
                            <td><?= $hasil->front_video ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="font-bold"><h3>Battery</h3></td>
                        </tr>
                        <tr>
                            <td>Type USB</td>
                            <td>:</td>
                            <td><?= $hasil->usb ?></td>
                        </tr>
                        <tr>
                            <td>Battery Capacity</td>
                            <td>:</td>
                            <td><?= $hasil->battery_capacity ?> mAh</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="font-bold"><h3>Price</h3></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>:</td>
                            <td>Rp. <?= number_format($hasil->harga, 0, ',', '.'); ?>,00,-</td>
                        </tr>
                        <tr>
                            <td colspan="3"><i>*Note : <span class="text-red-500">harga sewaktu-waktu dapat berubah</span></i></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
            <div class="group px-3 mr-0 py-3 m-3 block text-center">
                <a href="<?= base_url() ?>data-smartphone" class="text-white bg-gray-800 px-4 py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-check"></i> Lihat Smartphone Lain
                </a>
            </div>
        </div>
    </div>
    </div>

<?php $this->endSection() ?>