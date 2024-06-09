

    <!-- footer -->
    <div class="mt-3 md:mt-3 p-6 mb-16 md:mb-0 bg-gray-200 text-center">
        <!-- <p class="text-gray-800 text-sm"><span class="hover:bg-gray-500 hover:text-gray-100 duration-500 cursor-pointer">About</span> | <span class="hover:bg-gray-500 hover:text-gray-100 duration-500 cursor-pointer">Contact</span> | <span class="hover:bg-gray-500 hover:text-gray-100 duration-500 cursor-pointer">Terms Service</span> | <span class="hover:bg-gray-500 hover:text-gray-100 duration-500 cursor-pointer">Contributor</span></p> -->
    <p class="px-6 font-bold text-gray-600 text-xs md:text-base">
        Copyright &copy 2024 <span class="text-orange-500">SIRESE</span>. By
        <a href="https://www.instagram.com/cumatukangketik?igsh=ZWM5MnNkaHpkbzRt" target="_blank" class="text-orange-500">Whyyy-Project</a>
    </p>
</div>
<!-- end footer -->
</div>
</div>

<!-- sroll top btn -->
<span id="topButton" onclick="scrollToTop()" class="top-btn bg-cyan-400"><i class="fas fa-arrow-up text-grey-200 icon-btn"></i></span>

<?php if(session()->get('LoggedIn')){ ?>
<!-- Modal Konfirmasi Logout -->
<div id="logoutModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
              <p class="text-xl text-gray-800">Konfirmasi Logout</p>
                <div class="modal-close cursor-pointer z-50">
                    <i onclick="closeModal()" class="fas fa-times text-gray-500 hover:text-gray-700"></i>
                </div>
            </div>
            
            <!--Body-->
            <div class="flex justify-center my-2 text-center">
                <!-- <i class="fa fa-info text-6xl text-center"></i> -->
                <p class="text-2xl font-bold my-1">Anda yakin ingin logout?</p>
            </div>

            <!--Footer-->
            <div class="flex justify-between py-3">
                <a href="logout" class="text-white bg-red-700 px-3 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-red-600 flex justify-center items-center">Logout</a>
                <button onclick="closeModal()" class="ml-2 text-white bg-cyan-950 px-3 text-sm md:text-base py-2 md:px-12 md:py-2 rounded-full hover:bg-cyan-900 flex justify-center items-center">Batal</button>
            </div>
        </div>
    </div>
</div>
<?php }; ?>
<script src="<?= base_url() ?>assets/js/customJs.js"></script>
<script src="<?= base_url() ?>assets/js/loader.js"></script>

</body>
</html>
