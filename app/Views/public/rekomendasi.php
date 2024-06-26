<?php $this->extend('public/template') ?>
<?php $this->section('content') ?>

<div class="main-content flex-1 bg-gray-300 mt-16 md:mt-2">
    <div class=" bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-2xl text-white"> 
            <h3 class="font-bold pl-2 text-xs md:text-2xl"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>
<form action="<?= base_url() ?>rekomendasi/" method="post">
    <div class="p-3 md:px-5 pb-0 mx-2 mb:mx-1">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-3">
                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg">Sistem Rekomendasi <span class="text-orange-500">Smartphone</span></h1>
                <div class="border border-gray-200 m-2"></div>

                <div id="alert" class="bg-red-500 text-white px-5 py-3 rounded-lg mb-4 <?= session()->get('eror') ? '': 'hidden' ?>" role="alert">
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
                <!-- content -->
                <div class="pb-3">
                    <p class="text-gray-700 font-bold ml-4">Berikan nilai tingkat prioritasmu dalam memilih Smartphone :</p>
                </div>
                
                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Ukuran, Berat, Bahan Body pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" value="0" min="0" max="100" name="body" id="body" oninput="updateDetail('body', 'defbody')">
                    </div>
                    <div id="defBody" class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Tidak Penting (0/100)
                    </div>
                </div>

                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Tipe(IPS, Oled, Amoled, dll), Ukuran, Resolusi Layar pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" value="0" min="0" max="100" name="display" id="display" oninput="updateDetail('display', 'defDisplay')">
                    </div>
                    <div id="defDisplay" class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Tidak Penting (0/100)
                    </div>
                </div>

                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Sistem Operasi, Prosesor, dan CPU pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" value="0" min="0" max="100" name="system" id="system" oninput="updateDetail('system', 'defSystem')">
                    </div>
                    <div id="defSystem" class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Tidak Penting (0/100)
                    </div>
                </div>
                
                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah RAM dan Memori Internal pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" value="0" min="0" max="100" name="memory" id="memory" oninput="updateDetail('memory', 'defMemory')">
                    </div>
                    <div id="defMemory" class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Tidak Penting (0/100)
                    </div>
                </div>
                
                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Kamera Utama pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" value="0" min="0" max="100" name="mainCamera" id="mainCamera" oninput="updateDetail('mainCamera', 'defMainCamera')">
                    </div>
                    <p id="defMainCamera" class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Tidak Penting (0/100)
                    </p>
                </div>

                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Kamera Depan pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" value="0" min="0" max="100" name="frontCamera" id="frontCamera" oninput="updateDetail('body', 'defBody')">
                    </div>
                    <p id="defFrontCamera" class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Tidak Penting (0/100)
                    </p>
                </div>

                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Batrai pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" value="0" min="0" max="100" name="battery" id="battery" oninput="updateDetail('battery', 'defBattery')">
                    </div>
                    <p id="defBattery" class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Tidak Penting (0/100)
                    </p>
                </div>

                <!-- kriteria -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Seberapa pentingkah Harga pada Smartphone menurutmu ?
                    </div>
                    <div class="flex justify-center items-center text-gray-900">
                        <input class="w-3/4 mx-1 cursor-pointer" type="range" value="0" min="0" max="100" name="price" id="price" oninput="updateDetail('price', 'defPrice')">
                    </div>
                    <p id="defPrice" class="flex justify-center items-center text-gray-800 pb-1 mx-auto text-center">
                        Tidak Penting (0/100)
                  </p>
                </div>
                <!-- rentang harga -->
                <div class="bg-gray-200 h-18 rounded-xl shadow mx-1 md:mx-5 px-3 mb-2 py-1">
                    <div class="flex justify-center items-center text-gray-900 py-1 mx-auto text-center">
                        Apakah kamu ingin menentukan rentang harga sendiri ?
                    </div>
                    <div class="flex justify-center items-center text-gray-700 md:px-9 mt-2">
                        <input type="text" oninput="verify()" class="bg-gray-100 w-1/2 rounded-lg h-8 border border-transparent focus:outline-none focus:border-cyan-500 mr-1 md:mx-3 text-center placeholder-gray-700" id="min" name="min" placeholder="Minimal"> - 
                        <input type="text" oninput="verify()" class="bg-gray-100 w-1/2 rounded-lg h-8 border border-transparent focus:outline-none focus:border-cyan-500 ml-1 md:mx-3 text-center placeholder-gray-700" id="max" name="max" placeholder="Maksimal">
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
</form>
</div> 
<script>

    const inputIds = ['body', 'display', 'system', 'memory', 'mainCamera', 'frontCamera', 'battery', 'price']; // Daftar id elemen input
    const textIds = ['defBody', 'defDisplay', 'defSystem', 'defMemory', 'defMainCamera', 'defFrontCamera', 'defBattery', 'defPrice']; // Daftar id elemen teks

    for (let i = 0; i < inputIds.length; i++) {
        updateDetail(inputIds[i], textIds[i]);
    }
function updateDetail(inputId, textId) {
    const input = document.getElementById(inputId);
    const text = document.getElementById(textId);

    input.addEventListener('input', function() {
        const value = parseInt(this.value);
        let importanceText = '';

        if (value >= 0 && value <= 20) {
            importanceText = 'Tidak Penting';
        } else if (value > 20 && value <= 40) {
            importanceText = 'Kurang Penting';
        } else if (value > 40 && value <= 60) {
            importanceText = 'Cukup Penting';
        } else if (value > 60 && value <= 80) {
            importanceText = 'Penting';
        } else {
            importanceText = 'Sangat Penting';
        }

        text.textContent = `${importanceText} (${value}/100)`;
    });
}

   function verify() {
    const min = document.getElementById('min').value;
    const max = document.getElementById('max').value;
    const notif = document.getElementById('wrong_price');

    if (min !== '' || max !== '') {
        const nMin = min.replace(/\D/g, '')
        const nMax = max.replace(/\D/g, '')
        if (Number(nMin) > Number(nMax)) {
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