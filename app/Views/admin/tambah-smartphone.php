<?php $this->extend('admin/template') ?>
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
                <div class="flex justify-center items-center text-center">
                    <form action="master-data/tambah" method="post" class="w-full" enctype="multipart/form-data">
                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required id="brand" name="brand" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="brand" value="<?= session()->getFlashdata('brand') ?>"/>
                            <label for="brand" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Brand</label>
                        </div>
                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required id="merek" name="merek" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="merek" value="<?= session()->getFlashdata('merek') ?>"/>
                            <label for="merek" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Merek</label>
                        </div>
                        <div class="relative w-2/3 mx-auto mb-4">
                            <label id="gambar-label" for="gambar" class="block bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700 cursor-pointer flex items-center justify-center">
                                <i class="fas fa-upload mr-2"></i> Upload Gambar
                            </label>
                            <input required id="gambar" name="gambar" type="file" accept=".png,.jpg,.jpeg" class="hidden" />
                            <script>
                              document.getElementById('gambar').addEventListener('change', function() {
                                  var fileName = this.files[0].name;
                                  var label = document.getElementById('gambar-label');
                                  label.innerHTML = '<i class="fas fa-upload mr-2"></i> ' + fileName;
                              });
                              </script>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required id="dimensi" name="dimensi" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="dimensi" oninput="listInput('dimensi')" onblur="hideDiv('dimensi')" value="<?= session()->getFlashdata('dimensi') ?>"/>
                            <label for="dimensi" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Tipe LCD</label>
                          <div id="opt_dimensi" class="w-full h-12 hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($dimensi as $data): ?>
                                  <p class="list_dimensi cursor-pointer" onclick="insert('<?= $data['dimensi'] ?>', 'dimensi')"><?= $data['dimensi'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>

                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required id="berat" name="berat" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="berat" oninput="listInput('berat')" onblur="hideDiv('berat')" value="<?= session()->getFlashdata('berat') ?>"/>
                            <label for="berat" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Tipe LCD</label>
                          <div id="opt_berat" class="w-full h-12 hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($berat as $data): ?>
                                  <p class="list_berat cursor-pointer" onclick="insert('<?= $data['berat'] ?>', 'berat')"><?= $data['berat'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>
                        
                        <div class="relative w-2/3 mx-auto mb-4">
                            <input required id="lcd_type" name="lcd_type" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="lcd_type" oninput="listInput('lcd_type')" onblur="hideDiv('lcd_type')" value="<?= session()->getFlashdata('lcd_type') ?>"/>
                            <label for="lcd_type" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Tipe LCD</label>
                          <div id="opt_lcd_type" class="w-full h-12 hidden overflow-y-scroll bg-gray-100">
                            <?php foreach($lcd_type as $data): ?>
                                  <p class="list_lcd_type cursor-pointer" onclick="insert('<?= $data['lcd_type'] ?>', 'lcd_type')"><?= $data['lcd_type'] ?></p>
                            <?php endforeach; ?>
                          </div>
                        </div>


                        <button>Simpan</button>
                    </form>
                </div>

            </div>
            <div class="group px-3 mr-0 py-3 m-3">
                
            </div>
        </div>
    </div>

    <script>
      function changeNumber(){
        const harga = document.getElementById('harga').value;
        document.getElementById('harga').value = formatRupiah(harga);
      }
      function formatRupiah(angka) {
      if (angka.replace(/\D/g, '').length < 1) {
          return angka.replace(/\D/g, '');
      }
      return 'Rp. ' + angka.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }
    </script>


<script>
function listInput(inputId) {
  const inputValue = document.getElementById(inputId).value.trim().toLowerCase();
  const items = document.getElementsByClassName('list_' + inputId);

  for (let item of items) {

      const text = item.textContent.trim().toLowerCase();
      if (text.includes(inputValue)) {
          item.classList.add('block');
          item.classList.remove('hidden');
      } else {
          item.classList.remove('block');
          item.classList.add('hidden');
      }
  }

        const optDiv = document.getElementById('opt_' + inputId);
        if (inputValue !== "") {
            optDiv.classList.remove('hidden');
            optDiv.classList.add('block');
        } else {
            optDiv.classList.remove('block');
            optDiv.classList.add('hidden');
        }
}

function hideDiv(divId) {
    const optDiv = document.getElementById('opt_'+divId);
    setTimeout(() => {
      optDiv.classList.remove('block');
      optDiv.classList.add('hidden');
      console.log('yoi')
    }, 200);
}

function insert(value, tag) {
    const inputElement = document.getElementById(tag);
    if (inputElement) {
        inputElement.value = value;
    } else {
        console.error('Input element with ID ' + tag + ' not found.');
    }
}

</script>


<?php $this->endSection() ?>
