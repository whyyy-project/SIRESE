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
                <h1 class="md:text-xl font-bold text-gray-800 text-base">Bantu kami memberikan rating <span class="text-orange-500">Brand</span></h1>
                <div class="border border-gray-200 m-2"></div>
        <form action="rating" method="post">
                <div class="mt-2 mb-4 w-3/4 m-auto px-8 flex-1">
                    <label for="umur" class="text-lg font-semibold mb-2 text-gray-900">Umur Kamu(Tahun) :</label>
                    <input type="number" id="umur" name="umur" min="10" max="70"
                        class="bg-gray-100 w-full text-center" placeholder="Masukan Umur Kamu">
                </div>
                
                <?php
                foreach ($brands as $brand) :
                ?>
                
                <div class="mt-2 mb-4 w-3/4 m-auto rounded-lg shadow-lg bg-gradient-to-r from-orange-500 to-blue-500 px-8">
                    <label for="<?= $brand['nama_brand'] ?>" class="text-lg font-semibold mb-2">Brand <?= ucfirst($brand['nama_brand']) ?>:</label>
                    <input type="range" id="<?= $brand['nama_brand'] ?>" name="<?= $brand['nama_brand'] ?>" min="0" max="100" value="50"
                        class="w-full appearance-none bg-gray-300 h-2 rounded-full outline-none mb-1 cursor-pointer"
                        oninput="updateRatingValue('<?= $brand['nama_brand'] ?>', this.value)">
                    <div id="rating-value-<?= $brand['nama_brand'] ?>" class="font-bold text-gray-900 text-center">Nilai: 50/100</div>
                </div>
                
                <?php endforeach; ?>

                <div class="no-underline text-center">
                    <button type="submit" class="btn-login text-white hover:text-gray-300 bg-orange-500 hover:bg-orange-400">Kontribusi</button>
                </div>
        </form>
            </div>
        </div>
    </div>
<!-- </div> -->

<script>
    // Fungsi untuk memperbarui nilai saat ini
    function updateRatingValue(brand, value) {
        document.getElementById('rating-value-' + brand).innerText = 'Nilai: ' + value + '/100';
    }
</script>

<?php $this->endSection() ?>
