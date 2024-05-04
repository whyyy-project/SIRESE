

    <!-- footer -->
    <div class="mt-3 md:mt-12 p-6 mb-16 md:mb-0 bg-gray-200 text-center">
        <p class="text-gray-800 text-sm"><span class="hover:bg-gray-500 hover:text-gray-100 duration-500 cursor-pointer">About</span> | <span class="hover:bg-gray-500 hover:text-gray-100 duration-500 cursor-pointer">Contact</span> | <span class="hover:bg-gray-500 hover:text-gray-100 duration-500 cursor-pointer">Terms Service</span> | <span class="hover:bg-gray-500 hover:text-gray-100 duration-500 cursor-pointer">Contributor</span></p>
    <p class="px-6 font-bold text-gray-600 text-xs md:text-base">
        Copyright &copy 2024 <span class="text-orange-500">SIRESE</span>. By
        <a href="https://github.com/whyyy-project/" target="_blank" class="text-orange-500">Whyyy-Project</a>
    </p>
</div>
<!-- end footer -->
</div>
</div>

<!-- sroll top btn -->
<span id="topButton" onclick="scrollToTop()" class="top-btn bg-cyan-400"><i class="fas fa-arrow-up text-grey-200 icon-btn"></i></span>

<?php if(isset($_SESSION['login'])){ ?>
<!-- Modal Konfirmasi Logout -->
<div id="logoutModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-end items-center pb-3">
                <div class="modal-close cursor-pointer z-50">
                    <i onclick="closeModal()" class="fas fa-times text-gray-500 hover:text-gray-700"></i>
                </div>
            </div>
            
            <!--Body-->
            <div class="flex justify-center my-2">
    <i class="fa fa-info text-6xl text-center"></i>
</div>
                <p class="text-2xl font-bold my-1">Anda yakin ingin logout?</p>

            <!--Footer-->
            <div class="flex justify-end py-3">
                <a href="logout" class=" bg-red-500 py-2 px-6 rounded-lg text-white hover:bg-red-600">Logout</a>
                <button onclick="closeModal()" class="ml-2 bg-gray-500 py-2 px-6 rounded-lg text-white hover:bg-gray-600">Batal</button>
            </div>
        </div>
    </div>
</div>
<?php }; ?>
<script src="<?= base_url() ?>assets/js/customJs.js"></script>
<script src="<?= base_url() ?>assets/js/loader.js"></script>

</body>
</html>
