<?php $this->extend('admin/template') ?>
<?php $this->section('content')  ?>


<!-- content  -->
<!-- body, footer -->
<div class="main-content flex-1 bg-gray-300 md:mt-2">
    <div class=" bg-cyan-950 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-cyan-500 to-cyan-950 p-4 shadow text-2xl text-white"> 
            <h3 class="font-bold pl-2 text-xs md:text-2xl"><span class="text-orange-500">SIRESE</span> | <span class="text-orange-500">Si</span>stem <span class="text-orange-500">Re</span>komendasi <span class="text-orange-500">S</span>martphon<span class="text-orange-500">e</span></h3>
        </div>
      </div>
      
          <div class="p-3 md:px-4 pb-0 mx-2 mb:mx-1">
              <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                  <div class="px-4 py-3">
                      <h1 class="md:text-2xl font-bold text-gray-800 text-base">Setting Admin <span class="text-orange-500"> SIRESE</span></h1>
                      <div class="border border-gray-200 m-2"></div>
        
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

                      <div class="md:w-3/4 md:px-24 mx-1 md:mx-auto text-sm md:text-base text-gray-700 mt-12 md:mt-16">
                        <div class="flex justify-between items-center">
                          <p class="font-bold">Nama</p>
                          <p><?= esc(session()->get('nama')) ?></p>
                          <button onclick="ubahModal('nama')" class="text-white bg-green-800 mx-0 text-sm md:text-base py-2 md:px-0 md:py-2 rounded-full hover:bg-green-700 flex justify-center items-center w-24"><i class="fas fa-pen"></i> <span class="ml-1">Ubah</span></button>
                        </div>
                        <div class="flex justify-between items-center mt-5 mb-2">
                          <p class="font-bold">Username</p>
                          <p><?= esc(session()->get('username')) ?></p>
                          <button onclick="ubahModal('username')" class="text-white bg-green-800 mx-0 text-sm md:text-base py-2 md:px-0 md:py-2 rounded-full hover:bg-green-700 flex justify-center items-center w-24"><i class="fas fa-pen"></i> <span class="ml-1">Ubah</span></button>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                          <p class="font-bold">Password</p>
                          <p>*********</p>
                          <button onclick="ubahModal('password')" class="text-white bg-green-800 mx-0 text-sm md:text-base py-2 md:px-0 md:py-2 rounded-full hover:bg-green-700 flex justify-center items-center w-24"><i class="fas fa-pen"></i> <span class="ml-1">Ubah</span></button>
                        </div>
                      </div>
                  <div class="group px-3 mr-0 py-3 m-3 mb-14 md:mb-14">
                    </div>
                    </div>
                </div>
          </div>
    <div class="pb-28"></div>


    <!-- modal -->
    <div id="nama" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
              <p class="text-xl text-gray-800">Ubah Nama</p>
                <div class="modal-close cursor-pointer z-50">
                    <i onclick="closeProfilAdmin('nama')" class="fas fa-times text-gray-500 hover:text-gray-700"></i>
                </div>
            </div>
            
            <!--Body-->
            <form action="<?= base_url() ?>profil/ubah-nama" method="post">
              <div class="relative mx-auto my-5 w-full">
                <input required id="nama" name="nama" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="nama"/>
                <label for="nama" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Nama Baru</label>
                </div>
                
                <!--Footer-->
                <div class="flex justify-between py-3 mx-12">
                  <span onclick="closeProfilAdmin('nama')" class="text-white bg-red-700 px-5 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-red-600 flex justify-center items-center cursor-pointer"><i class="fas fa-xmark mr-2"></i> Batal</span>
                  <button type="submit" class="ml-2 text-white bg-cyan-950 px-3 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-cyan-900 flex justify-center items-center"><i class="fas fa-gear mr-2"></i> Ubah</button>
                </div>
              </form>
        </div>
    </div>
</div>


    <div id="username" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
              <p class="text-xl text-gray-800">Ubah Username</p>
                <div class="modal-close cursor-pointer z-50">
                    <i onclick="closeProfilAdmin('username')" class="fas fa-times text-gray-500 hover:text-gray-700"></i>
                </div>
            </div>
            
            <!--Body-->
            <form action="<?= base_url() ?>profil/ubah-username" method="post">
              <div class="relative mx-auto my-5 w-full">
                <input required id="username" name="username" type="text" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="username"/>
                <label for="username" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Username Baru</label>
              </div>
              <div class="relative mx-auto my-5 w-full">
                <input required id="pass" name="password" type="password" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="password"/>
                <label for="pass" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Konfirmasi Password</label>
                <span class="absolute right-2 top-2 cursor-pointer" onclick="showPassword('pass', 'show')">
                  <i id="show" class="fas fa-eye text-gray-700"></i>
                </span>
              </div>
                
                <!--Footer-->
                <div class="flex justify-between py-3 mx-12">
                  <span onclick="closeProfilAdmin('username')" class="text-white bg-red-700 px-5 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-red-600 flex justify-center items-center cursor-pointer"><i class="fas fa-xmark mr-2"></i> Batal</span>
                  <button type="submit" class="ml-2 text-white bg-cyan-950 px-3 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-cyan-900 flex justify-center items-center"><i class="fas fa-gear mr-2"></i> Ubah</button>
                </div>
              </form>
        </div>
    </div>
</div>

    <div id="password" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
              <p class="text-xl text-gray-800">Ubah password</p>
                <div class="modal-close cursor-pointer z-50">
                    <i onclick="closeProfilAdmin('password')" class="fas fa-times text-gray-500 hover:text-gray-700"></i>
                </div>
            </div>
            
            <!--Body-->
            <form action="<?= base_url() ?>profil/ubah-password" method="post">
              <div class="relative mx-auto my-5 w-full">
                <input required id="pw1" name="pwNew1" type="password" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="password"/>
                <label for="pw1" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Password Baru</label>
                <span class="absolute right-2 top-2 cursor-pointer" onclick="showPassword('pw1', 'show1')">
                  <i id="show1" class="fas fa-eye text-gray-700"></i>
                </span>
              </div>
              <div class="relative mx-auto my-5 w-full">
                <input required id="pw2" name="pwNew2" type="password" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="password"/>
                <label for="pw2" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Konfirmasi Password Baru</label>
                <span class="absolute right-2 top-2 cursor-pointer" onclick="showPassword('pw2', 'show2')">
                  <i id="show2" class="fas fa-eye text-gray-700"></i>
                </span>
              </div>
                
              <div class="relative mx-auto my-5 w-full">
                <input required id="pw3" name="confirmPw" type="password" class="bg-gray-200 rounded peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-center text-gray-900 text-sm focus:outline-none focus:border-cyan-700" placeholder="password lama"/>
                <label for="pw3" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm ml-3">Konfirmasi Password Lama</label>
                <span class="absolute right-2 top-2 cursor-pointer" onclick="showPassword('pw3', 'show3')">
                  <i id="show3" class="fas fa-eye text-gray-700"></i>
                </span>
              </div>
                
                <!--Footer-->
                <div class="flex justify-between py-3 mx-12">
                  <span onclick="closeProfilAdmin('password')" class="text-white bg-red-700 px-5 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-red-600 flex justify-center items-center cursor-pointer"><i class="fas fa-xmark mr-2"></i> Batal</span>
                  <button type="submit" class="ml-2 text-white bg-cyan-950 px-3 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-cyan-900 flex justify-center items-center"><i class="fas fa-gear mr-2"></i> Ubah</button>
                </div>
              </form>
        </div>
    </div>
</div>





<script>
   function ubahModal(id) {
    var profil = document.getElementById(id);
    profil.classList.remove('hidden');
}
function closeProfilAdmin(id) {
    var closeModalProfil = document.getElementById(id);
    closeModalProfil.classList.add('hidden');
}
var showed = true
function showPassword(input, icon){
  const inp =document.getElementById(input)
  const ico =document.getElementById(icon)
  if(showed == true){
    inp.type = 'text'
    ico.classList.remove('fa-eye')
    ico.classList.add('fa-eye-slash')
    showed=false
  }else{
    inp.type = 'password'
    ico.classList.add('fa-eye')
    ico.classList.remove('fa-eye-slash')
    showed=true
  }
}
</script>

    <?php $this->endSection(); ?>