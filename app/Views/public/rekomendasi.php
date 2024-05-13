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
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Sistem Rekomendasi <span class="text-orange-500">Smartphone</span></h1>
                <div class="border border-gray-200 m-2"></div>
                <!-- content -->
                <div class="pb-3">
                    <p class="text-gray-700">Berikan nilai tingkat prioritasmu dalam memilih Smartphone :</p>
                </div>
                
                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Ukuran, Berat, Bahan Body pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" min="0" max="100" name="body" id="body">
                    </div>
                    <div class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Penting (50/100)
                    </div>
                </div>
                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Tipe(IPS, Oled, Amoled, dll), Ukuran, Resolusi Layar pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" min="0" max="100" name="body" id="body">
                    </div>
                    <div class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Penting (50/100)
                    </div>
                </div>

                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Sistem Operasi, Prosesor, dan CPU pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" min="0" max="100" name="body" id="body">
                    </div>
                    <div class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Penting (50/100)
                    </div>
                </div>
                
                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah RAM dan Memori Internal pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" min="0" max="100" name="body" id="body">
                    </div>
                    <div class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Penting (50/100)
                    </div>
                </div>
                
                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Kamera Utama pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" min="0" max="100" name="body" id="body">
                    </div>
                    <div class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Penting (50/100)
                    </div>
                </div>

                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Kamera Depan pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" min="0" max="100" name="body" id="body">
                    </div>
                    <div class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Penting (50/100)
                    </div>
                </div>

                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Batrai pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" min="0" max="100" name="body" id="body">
                    </div>
                    <div class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Penting (50/100)
                    </div>
                </div>

                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Harga pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" min="0" max="100" name="body" id="body">
                    </div>
                    <div class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Penting (50/100)
                    </div>
                </div>
                <!-- rentang harga -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Apakah kamu ingin menentukan rentang harga sendiri ?
                    </div>
                    <div class="flex justify-center items-center text-gray-700">
                    <input type="text" oninput="verify()" class="bg-gray-100 w-36 md:w-1/3 rounded-lg h-8 border border-transparent focus:outline-none focus:border-cyan-500 mr-1 md:mr-3 text-center placeholder-gray-700" id="min" name="min" placeholder="Minimal"> - 
                    <input type="text" oninput="verify()" class="bg-gray-100 w-36 md:w-1/3 rounded-lg h-8 border border-transparent focus:outline-none focus:border-cyan-500 ml-1 md:ml-3 text-center placeholder-gray-700" id="max" name="max" placeholder="Maksimal">
                    </div>
                    <div id="wrong_price" class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center italic">
                        * Kosongkan jika tidak perlu
                    </div>
                </div>
                <!-- end kriteria -->

                <div class="flex justify-center items-center text-white my-3">
                    <button type="submit" id="recomend" class="btn-login bg-orange-500 text-sm md:text-base hover:bg-orange-400">Rekomendasi</button>
                </div>
            </div>
        </div>

<script>
    function verify() {
        const min = document.getElementById('min').value;
        const max = document.getElementById('max').value;
        const notif = document.getElementById('wrong_price');

        if (min !== '' && max !== '') {
            if (Number(min) > Number(max)) {
                notif.innerText = 'Harap Koreksi Rentang Harga!';
                notif.classList = 'flex justify-center items-center text-red-800 pb-1 mx-auto text-center italic';
            } else {
                notif.innerText = '* Kosongkan jika tidak perlu';
                notif.classList = 'flex justify-center items-center text-gray-800 pb-1 mx-auto text-center italic';
            }
        } else {
            notif.innerText = '* Kosongkan jika tidak perlu';
            notif.classList = 'flex justify-center items-center text-gray-800 pb-1 mx-auto text-center italic';
        }

        document.getElementById('min').value = formatRupiah(min);
        document.getElementById('max').value = formatRupiah(max);
    }

    function formatRupiah(angka) {
    if (angka.replace(/\D/g, '').length < 1) {
        return angka.replace(/\D/g, '');
    }
    return 'Rp. ' + angka.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

</script>



<?php $this->endSection() ?>