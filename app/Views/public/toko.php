<?php $this->extend('public/template') ?>

<?php $this->section('content') ?>

<div class="main-content flex-1 bg-gray-300 mt-16 md:mt-2">
    <div class="bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-xl text-white"> 
            <h3 class="font-bold pl-2"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>
    
    <div class="p-2 md:p-3 mx-3">
        <div class="bg-white shadow-lg rounded-lg pb-3 overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="md:text-xl font-bold text-gray-800 text-base">Toko kerjasama dengan <span class="text-orange-500">SIRESE</span></h1>
                <div class="border border-gray-200 m-2 mb-5"></div>
                <div class="flex">
                    <div class="w-full md:w-1/3 p-1 mb-3 md:mb-1 hover:-translate-y-1 duration-500">
                        <div class="md:p-1">
                            <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-3">
                                    <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Lorem</h1>
                                    <div class="border border-gray-200 m-2"></div>
                                    <div class="flex justify-center items-center mx-auto">
                                        <img loading="lazy" src="img/logo2.png" class=" h-24 md:h-40 rounded-tr-[20px] rounded-bl-[20px] object-cover" alt="Gambar toko">
                                    </div>
                                </div>
                                <div class="border-2 border-gray-300 m-3"></div>
                                    <div class="px-4 pb-3 flex justify-center items-center">
                                    <p><span class="font-bold mr-8 mt-8"> Toko A</p>
                                    <a href="#" class="text-white bg-gray-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-gray-700">
                                        <i class="fas fa-info mr-2"></i>Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 p-1 mb-3 md:mb-1 hover:-translate-y-1 duration-500">
                        <div class="md:p-1">
                            <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                                <div class="px-4 py-3">
                                    <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Lorem</h1>
                                    <div class="border border-gray-200 m-2"></div>
                                    <div class="flex justify-center items-center mx-auto">
                                        <img loading="lazy" src="img/logo.png" class=" h-24 md:h-40 rounded-tr-[20px] rounded-bl-[20px] object-cover" alt="Gambar toko">
                                    </div>
                                </div>
                                <div class="border-2 border-gray-300 m-3"></div>
                                    <div class="px-4 pb-3 flex justify-center items-center">
                                    <p><span class="font-bold mr-8 mt-8"> Toko B</p>
                                    <a href="#" class="text-white bg-gray-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-gray-700">
                                        <i class="fas fa-info mr-2"></i>Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->


<?php $this->endSection() ?>
