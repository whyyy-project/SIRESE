<?php $this->extend('admin/template') ?>
<?php $this->section('content') ?>

<div class="main-content flex-1 bg-gray-300 mt-16 md:mt-2">
    <div class="bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-xl text-white"> 
            <h3 class="font-bold pl-2"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
    </div>
    
    <div class="bg-white shadow-lg rounded-lg mt-3 mx-6 pb-5 overflow-hidden">
      <div class="flex justify-between">
        <h1 class="text-2xl font-bold text-gray-800 ml-4 mt-3 text-base md:text-lg">Data Toko Afiliasi <span class="text-orange-500"> SIRESE</span></h1>
        <a href="<?= base_url() ?>data-toko/add" class="text-white bg-cyan-700 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-cyan-600 mt-2 mr-3">
          <i class="fas fa-plus"></i><span class="hidden md:inline ml-2">Tambah Toko</span>
        </a>
      </div>
        <div class="border border-gray-200 m-4 mb-2"></div>

        
              <?php if (session()->getFlashdata('success')) { ?>
                <div id="alert" class="bg-green-500 text-white px-5 py-3 rounded-lg mb-4 mx-3" role="alert">
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
              <?php if (session()->getFlashdata('error')) { ?>
                <div id="alertErr" class="bg-red-500 text-white px-5 py-3 rounded-lg mb-4 mx-3" role="alert">
                    <div class="flex items-center">
                  <span><i class="fas fa-triangle-exclamation"></i> <?= session()->get('error') ?></span>
                  </div>
              </div>
              <script>
                const alert = document.getElementById('alertErr')
                setTimeout(() => {
                  alert.classList.add('hidden')
                }, 10000);
              </script>
              <?php } ?>

        <div class="flex flex-wrap mx-3">
        <?php foreach ($toko as $data) : ?>

                <div class="w-full md:w-1/3 p-1 mb-3 md:mb-1 hover:-translate-y-1 duration-500">
                    <div class="md:p-1">
                        <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden">
                            <div class="px-4 py-3">
                                <h1 class="text-2xl font-bold text-gray-800 text-base md:text-lg text-center"><?= $data['nama_toko'] ?></h1>
                                <div class="border border-gray-200 m-3 mb-2"></div>
                                <div class="flex justify-center items-center mx-auto">
                                    <img loading="lazy" src="<?= base_url() ?>img/toko/<?= $data['foto'] ?>" class="h-40 w-full rounded-tr-[20px] rounded-bl-[20px] object-cover" alt="Gambar Toko">
                                </div>
                                <div class="mt-2 text-gray-800 text-center">
                                    <p><?= $data['kecamatan'] ?>, <?= $data['kota'] ?></p>
                                </div>
                                <div class="border border-gray-200 m-3 mb-0"></div>
                            </div>
                            <div class="px-4 pb-3 flex justify-center align-center">
                                <a href="<?= base_url() ?>data-toko/update/<?= str_replace(' ', '+', $data['nama_toko'])."-".str_replace(' ', '+', $data['desa'])."-".str_replace(' ', '+', $data['kecamatan'])."-" . str_replace(' ', '+', $data['kota'])  ?>" class="text-white bg-gray-800 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-gray-700">
                                    <i class="fas fa-pen mr-2"></i>Edit Toko
                                </a>
                                <?php $url = base_url() ."data-toko/delete/" . str_replace(' ', '+', $data['nama_toko'])."-".str_replace(' ', '+', $data['desa'])."-".str_replace(' ', '+', $data['kecamatan'])."-" . str_replace(' ', '+', $data['kota']) ; ?>
                                <span onclick="hapusModal('<?= $url ?>', '<?= $data['nama_toko'] ?>')" class="text-white bg-red-700 px-3 text-sm md:text-base py-2 md:px-4 md:py-2 rounded-full hover:bg-red-600 ml-3 cursor-pointer">
                                    <i class="fas fa-trash mr-2"></i>Hapus Toko
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

<!-- pagination -->
<div class="flex justify-between items-center mx-3 mt-4">
            <?php if ($currentPage > 1) : ?>
                <a href="<?= base_url('toko?page=' . ($currentPage - 1)) ?>" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
                    <i class="fas fa-arrow-left"></i> Sebelumnya
                </a>
            <?php endif; ?>

            <div class="flex mx-auto">

                <?php
                $numPagesToShow = 5; // Jumlah halaman yang akan ditampilkan
                $halfNumPages = floor($numPagesToShow / 2);
                $startPage = max(1, $currentPage - $halfNumPages);
                $endPage = min($totalPages, $currentPage + $halfNumPages);

                $numPagesDiff = $numPagesToShow - ($endPage - $startPage + 1);

                if ($numPagesDiff > 0) {
                    $startPage = max(1, $startPage - $numPagesDiff);
                }

                if ($startPage > 1) {
                    echo '<a href="' . base_url('toko?page=1') . '" class="text-gray-600 text-sm md:text-base py-2 px-3">1</a>';
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                }

                for ($i = $startPage; $i <= $endPage; $i++) {
                    $isActive = $currentPage == $i ? 'bg-gray-300' : '';
                    echo '<a href="' . base_url('toko?page=' . $i) . '" class="text-gray-600 text-sm md:text-base py-2 px-3 ' . $isActive . '">' . $i . '</a>';
                }

                if ($endPage < $totalPages) {
                    echo '<span class="text-gray-600 text-sm md:text-base py-2 px-3">...</span>';
                    echo '<a href="' . base_url('toko?page=' . $totalPages) . '" class="text-gray-600 text-sm md:text-base py-2 px-3">' . $totalPages . '</a>';
                }
                ?>
            </div>

            <?php if ($currentPage < $totalPages) : ?>
                <a href="<?= base_url('toko?page=' . ($currentPage + 1)) ?>" class="text-gray-600 text-sm md:text-base py-2 px-3 hidden md:block">
                    Berikutnya <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>


    <!-- modal -->
    <div id="hapus" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
              <p class="text-xl text-gray-800">Anda yakin akan menghapus toko</p>
              <div class="modal-close cursor-pointer z-50">
                <i onclick="closeModalHapus()" class="fas fa-times text-gray-500 hover:text-gray-700"></i>
              </div>
            </div>
            
            <!--Body-->
            <div class="flex justify-center my-2 text-center">
              <p id="namaToko" class="text-gray-800 text-2xl font-bold"></p>
                </div>
                
                <!--Footer-->
                <div class="flex justify-between py-3 mx-12">
                  <a id="link" href="#" class="text-white bg-red-700 px-5 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-red-600 flex justify-center items-center cursor-pointer"><i class="fas fa-trash mr-2"></i> Hapus</a>
                  <button onclick="closeModalHapus()" class="ml-2 text-white bg-cyan-950 px-7 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-cyan-900 flex justify-center items-center"><i class="fas fa-xmark mr-2"></i> Batal</button>
                </div>
        </div>
    </div>
</div>





<script>
   function hapusModal(url, nama) {
    var modalHapus = document.getElementById('hapus');
    modalHapus.classList.remove('hidden');
    const link = document.getElementById('link');
    const spanNama = document.getElementById('namaToko');
    if (link) {
        link.href = url;
    }
        if (spanNama) {
        spanNama.textContent = nama;
    }

}
function closeModalHapus() {
    var closeModalProfil = document.getElementById('hapus');
    closeModalProfil.classList.add('hidden');
}
</script>

<?php $this->endSection(); ?>