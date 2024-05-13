 <!--Nav-->
 <nav class="bg-cyan-950 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
            <div class="flex flex-wrap items-center">
                <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                    <a href="">
                            <img class="w-8 h-12 md:hidden" src="<?= base_url() ?>img/logo.png" loading="lazy" alt="Logo SIRESE" title="SIRESE Logo">
                            <img class="ml-5 h-14 hidden md:block" src="<?= base_url() ?>img/logo2.png" loading="lazy" alt="Logo SIRESE" title="SIRESE Logo">
                        
                    </a>
                </div>
                <?php 
                        $session = session();
                        // $session->set('nama', 'Wahyu'); // add
                        // $session->set('pass', 'Wahyu');
                        // $session->remove('pass'); //remove
                        $session->destroy();
                        ?>

                <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                    <span class="relative w-full  mt-1 md:mb-1">
                        <?php if(!session('nama')){ ?>
                        <form action="<?= base_url() ?>search#hasil" method="get">
                            <input type="text" id="search" name="search" placeholder="Cari Smartphone.." class="w-full bg-cyan-800 text-white transition border border-transparent focus:outline-none focus:border-cyan-500 rounded py-3 px-2 pl-10 appearance-none leading-normal text-center" value="<?= isset($search) != null ? $search : '' ?>" autocomplete="off" required/>
                            <div class="absolute search-icon" style="top: 1rem; left: 0.8rem">
                                <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                                </svg>
                            </div>
                        </form>
                        <?php } ?>
                    </span>
            </div>
            
                <div class="flex w-full  content-center justify-between md:w-1/3 md:justify-end mt-3 pb-1">
                    <ul class="list-reset flex justify-between flex-1 md:flex-none items-center text-white">
                        <li class="flex-1 md:flex-none md:mr-3">
                            <a class="inline-block no-underline hover:text-gray-300 hover:text-underline text-xs md:text-base py-2 px-4" href="https://github.com/whyyy-project" target="_blank">GitHub 
                                <i class="fa-brands fa-github"></i>
                            </a>
                        </li>
                        <li class="flex-1 md:flex-none md:mr-3">
                            <a class="inline-block no-underline hover:text-gray-300 hover:text-underline text-xs md:text-base py-2 px-4" href="https://www.instagram.com/cumatukangketik/?igsh=ZWM5MnNkaHpkbzRt" target="_blank">
                                Instagram <i class="fa-brands fa-instagram"></i>    
                            </a>
                        </li>

                        <?php if(session('nama')) { ?>
                        <li class="flex-1 md:flex-none md:mr-3 mr-2 text-right relative">
                        <div class="inline-block no-underline hover:text-gray-200 hover:text-underline">
                            <span id="dropdown-toggle" class="btn-login bg-orange-500 text-sm md:text-base hover:bg-orange-400 cursor-pointer">admin <i class="fa fas-caret-down"></i></span>
                        </div>
                        <!-- Dropdown menu -->
                        <ul id="dropdown-menu" class="absolute hidden bg-white rounded-md shadow-md mt-1 right-1 text-center">
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 hover:rounded-md">Profil</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 hover:rounded-md">Logout</a></li>
                        </ul>
                    </li>
                    
                    <script>
                        // Ambil tombol dan menu dropdown
                        const dropdownToggle = document.getElementById('dropdown-toggle');
                        const dropdownMenu = document.getElementById('dropdown-menu');
                    
                        // Tambahkan event listener untuk tombol
                        dropdownToggle.addEventListener('click', function() {
                            // Toggle class 'hidden' pada menu dropdown
                            dropdownMenu.classList.toggle('hidden');
                        });
                    
                        // Sembunyikan menu dropdown saat klik di luar menu
                        document.addEventListener('click', function(event) {
                            if (!dropdownToggle.contains(event.target)) {
                                dropdownMenu.classList.add('hidden');
                            }
                        });
                    </script>
                    <?php }else{ ?>
                        <li class="flex-1 md:flex-none md:mr-3 mr-2 text-right">
                                <div class="inline-block no-underline hover:text-gray-300 hover:text-underline">
                                    <a href="<?= base_url() ?>login" class="btn-login bg-orange-500 text-sm md:text-base hover:bg-orange-400">Login</a>
                                </div>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>