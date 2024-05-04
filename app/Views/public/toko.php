<?php $this->extend('public/template') ?>
<?php $this->section('content') ?>

<div class="main-content flex-1 bg-gray-300 mt-16 md:mt-2">
    <div class="bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-xl text-white"> 
            <h3 class="font-bold pl-2"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>
    
    <div class="bg-white shadow-lg rounded-lg mt-3 mx-6 pb-5 overflow-hidden">
        <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Toko yang direkomendasikan<span class="text-orange-500"> SIRESE</span></h1>
        <div class="border border-gray-200 m-4 mb-2"></div>
        <div class="flex flex-wrap mx-3">

                <div class="w-full md:w-1/3 p-1 mb-3 md:mb-1 hover:-translate-y-1 duration-500">
                    <div class="md:p-1">
                        <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                            <div class="px-4 py-3">
                                <div class="flex justify-center items-center mx-auto">
                                    <img loading="lazy" src="img/logo.png" class="h-24 md:h-40 rounded-tr-[20px] rounded-bl-[20px] object-cover" alt="Gambar Toko">
                                </div>
                                <div class="border border-gray-200 m-3 mb-0"></div>
                            </div>
                            <div class="px-4 pb-3 flex justify-center align-center">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg mr-4 mt-2">Toko A</h1>
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
                                <div class="flex justify-center items-center mx-auto">
                                    <img loading="lazy" src="img/logo.png" class="h-24 md:h-40 rounded-tr-[20px] rounded-bl-[20px] object-cover" alt="Gambar Toko">
                                </div>
                                <div class="border border-gray-200 m-3 mb-0"></div>
                            </div>
                            <div class="px-4 pb-3 flex justify-center align-center">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg mr-4 mt-2">Toko B</h1>
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
                                <div class="flex justify-center items-center mx-auto">
                                    <img loading="lazy" src="img/logo.png" class="h-24 md:h-40 rounded-tr-[20px] rounded-bl-[20px] object-cover" alt="Gambar Toko">
                                </div>
                                <div class="border border-gray-200 m-3 mb-0"></div>
                            </div>
                            <div class="px-4 pb-3 flex justify-center align-center">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg mr-4 mt-2">Toko C</h1>
                                <a href="#" class="text-white bg-gray-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-gray-700">
                                    <i class="fas fa-info mr-2"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>

<div class="mb-24"></div>

<?php $this->endSection(); ?>