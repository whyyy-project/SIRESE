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
                <h1 class="md:text-xl font-bold text-gray-800 text-base">Bantu kami memberikan rating <span class="text-orange-500">System</span></h1>
                <div class="border border-gray-200 m-2 mb-5"></div>
        <form action="rating" class="text-white text-sm md:text-lg" method="get">
                <div class="mt-2 mb-4 w-3/4 m-auto rounded-lg shadow-lg bg-gradient-to-r from-cyan-500 to-cyan-950 px-8">
                    <label for="desain" class="font-semibold">Rating Desain <span class="hidden md:inline">System</span>:</label>
                    <input type="range" id="desain" name="desain" min="0" max="100" required
                        class="w-full appearance-none bg-gray-300 h-2 rounded-full outline-none mb-1 cursor-pointer"
                        oninput="updateDesain(this.value)">
                    <div id="value-desain" class="font-bold md:text-base text-center">Nilai: 50/100</div>
                </div>

                <div class="mt-2 mb-4 w-3/4 m-auto rounded-lg shadow-lg bg-gradient-to-r from-cyan-500 to-cyan-950 px-8">
                    <label for="kemudahan" class="font-semibold">Rating kemudahan <span class="hidden md:inline">System</span> :</label>
                    <input type="range" id="kemudahan" name="kemudahan" min="0" max="100"
                        class="w-full appearance-none bg-gray-300 h-2 rounded-full outline-none mb-1 cursor-pointer"
                        oninput="updateKemudahan(this.value)">
                    <div id="value-kemudahan" class="font-bold md:text-base text-center">Nilai: 50/100</div>
                </div>
                

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
    function updateDesain(value) {
        document.getElementById('value-desain').innerText = 'Nilai: ' + value + '/100';
    }
    function updateKemudahan(value) {
        document.getElementById('value-kemudahan').innerText = 'Nilai: ' + value + '/100';
    }

</script>

<?php $this->endSection() ?>
