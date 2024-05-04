<?php $this->extend('public/template') ?>
<?php $this->section('content')  ?>
<!-- content  -->
<!-- body, footer -->
<div class="main-content flex-1 bg-gray-300 mt-16 md:mt-2">
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

                <p class="mt-2 text-gray-600">
                    <span id="typing-text"></span>
                    <span id="cursor"></span>
                </p>
            </div>
            <div class="group px-3 mr-0 py-3 m-3">
                <a href="daftar" class="text-white bg-gray-800 px-4 py-2 rounded-full hover:bg-gray-700">
                    <i class="fas fa-check"></i> Coba Sekarang.
                </a>
            </div>
        </div>
    </div>
    <div class="p-2 md:p-3 mx-3">
        <div class="bg-white shadow-lg rounded-lg pb-3 overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="md:text-2xl font-bold text-gray-800 text-base">Bagaimana menggunakan <span class="text-orange-500"> SIRESE</span> ?</h1>
                <div class="border border-gray-200 m-2"></div>
                <p class="mt-2 text-gray-600 text-justify">
                    Ingin tau <a href="#" target="_blank" class="text-blue-700 italic">cara menggunakan SIRESE ??? <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> </a>, atau ingin mencoba langsung <a href="#" class="text-blue-700 italic">menggunakan SIRESE <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> </a>. Tutorial penggunaan SIRESE juga tersedia dalam <a href="#" target="_blank" class="text-blue-700 italic">YouTube <i class="fa-brands fa-youtube text-red-700"></i> </a>
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg mx-6 pb-5 overflow-hidden">
        <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Data <span class="text-orange-500"> Smartphone</span></h1>
        <div class="border border-gray-200 m-4"></div>
        <div class="flex flex-wrap mx-3">
            <!-- card smartphone -->
            <?php foreach($data as $sample): ?>
                <div class="w-full md:w-1/3 p-1 mb-3 md:mb-1 hover:-translate-y-1 duration-500">
                    <div class="md:p-1">
                        <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                            <div class="px-4 py-3">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg"><?= $sample->merek ?></h1>
                                <div class="border border-gray-200 m-2"></div>
                                <div class="flex justify-center items-center mx-auto">
                                    <img loading="lazy" src="<?= base_url() ?>img/smartphone/<?= $sample->gambar ?>" class="rounded-tr-[35px] rounded-bl-[35px] h-24 md:h-40" alt="<?= $sample->brand . " ". $sample->merek ?>">
                                </div>
                                <div class="mt-2 text-gray-800">
                                    <p><span class="font-bold">Brand : </span> <?= $sample->brand ?></p>
                                    <p><span class="font-bold">Harga : </span> Rp. <?= number_format($sample->harga, 0, ',', '.'); ?></p>
                                </div>
                            </div>
                            <div class="px-4 pb-3">
                                <a href="#" class="text-white bg-gray-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-gray-700">
                                    <i class="fas fa-info mr-2"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <div class="w-full md:w-1/3 p-0 mb-3 mt-1 md:mb-0 hover:cursor-pointer hover:-translate-y-1 duration-500">
                <a href="<?= base_url() ?>data-smartphone">
                    <div class="md:p-1">
                        <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                            <div class="px-4 py-3">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Lihat Lainnya</h1>
                                <div class="border border-gray-200 m-2"></div>
                                <div class="text-center my-10 md:py-2 mx-auto text-4xl md:text-8xl">
                                    <i class="fas fa-arrow-right p-8 md:p-4"></i>
                                    <p class="text-lg mt-1">Lihat lainnya.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- end card kesenian -->
    <div class="md:w-full md:flex px-3 md:px-5 mt-3">

        <div class="w-full md:w-1/2 hover:-translate-y-1 duration-500">
            <div class="p-3 md:p-1">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-4 py-3">
                        <h1 class="md:text-2xl font-bold text-gray-800 text-base md:text-lg">Panduan menggunakan<span class="text-orange-500"> SIRESE</span></h1>
                        <div class="border border-gray-200 m-2"></div>
                        <div class="m-3">
                            <iframe class="w-full h-full md:h-64" src="https://www.youtube.com/embed/_GaOagIOY50" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 hover:-translate-y-1 duration-500">
            <div class="p-3 md:p-1">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-4 py-3">
                        <h1 class="md:text-2xl font-bold text-gray-800 text-base md:text-lg">Panduan berkontribusi di <span class="text-orange-500"> SIRESE</span></h1>
                        <div class="border border-gray-200 m-2"></div>
                        <div class="m-3">
                        <iframe class="w-full h-full md:h-64" src="https://www.youtube.com/embed/v0J9eQz8-9o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/js/typingText.js"></script>
<!-- end content  -->

<?= $this->endSection() ?>;