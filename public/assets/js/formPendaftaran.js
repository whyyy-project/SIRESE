        // untuk membuka step by step form dan validasi
        // Ambil elemen-elemen yang diperlukan
        const stepForm = document.getElementById("step-form");
        const step1 = document.getElementById("step-1");
        const step2 = document.getElementById("step-2");
        const step = document.getElementById("step");
        const prevStepButton = document.getElementById("prev-step");
        const nextStepButton = document.getElementById("next-step");
        const submitButton = document.getElementById("submitBtn");


        // nik lama
    const nikLama = document.getElementById('input-nik-lama');
    const checkboxNikLama = document.getElementById('perpanjang-checkbox');
    const formNikLama = document.getElementById('form-nik-lama');
    const showSuratKuasa = document.getElementById('surat-kuasa');
    
   // deklarasi untuk buat scan nik lama
    const formScanNikLama = document.getElementById('form-scan-nik-lama');
    const divInputScan = document.getElementById('formInputScan');
    const namaFileScan = document.getElementById('nama-file-scan-nik-lama');
    // checkbox etnik lama
    checkboxNikLama.addEventListener("click", function(){
        
        if(checkboxNikLama.checked){
            formNikLama.classList.remove('hidden');
            showSuratKuasa.classList.remove('hidden');
            nikLama.value = '';
            // membuat input file scan nik lama
            if (!document.getElementById('input-scan-etnik-lama')) {
                formScanNikLama.classList.remove('hidden');
                // membuat form
                const newScanNikLama = document.createElement('input');
                newScanNikLama.setAttribute('class', 'hidden');
                newScanNikLama.setAttribute('id', 'input-scan-etnik-lama');
                newScanNikLama.setAttribute('type', 'file');
                newScanNikLama.setAttribute('name', 'input-scan-etnik-lama');
                newScanNikLama.setAttribute('accept', '.jpg,.jpeg,.png');
                divInputScan.appendChild(newScanNikLama);
    
                // Tambahkan event listener ke input file KTP Kuasa
                newScanNikLama.addEventListener("change", function() {
                    const fileName = this.value.split('\\').pop();
                    namaFileScan.textContent = fileName;
                });
            }
    
        }else{
            formNikLama.classList.add('hidden');
            showSuratKuasa.classList.add('hidden');
            nikLama.value = 'none';

            formScanNikLama.classList.add('hidden');
            const form = document.getElementById('input-scan-etnik-lama');
            divInputScan.removeChild(form);

            form.remove;

        namaFileInput.textContent = '';
        }
    });

// Checkbox surat kuasa
const checkboxSuratKuasa = document.getElementById('surat-kuasa-checkbox');
const formSuratKuasa = document.getElementById('form-surat-kuasa');
const namaFileKtpKuasa = document.getElementById('nama-file-surat-kuasa-ktp');
const namaFileSuratKuasa = document.getElementById('nama-file-surat-kuasa-surat');
const inputKtpKuasa = document.getElementById('formInputKtp');
const inputSuratKuasa = document.getElementById('formInputSurat');

// Tambahkan event listener ke checkbox
checkboxSuratKuasa.addEventListener("click", function() {
    if (checkboxSuratKuasa.checked) {

        if (!document.getElementById('input-ktp-kuasa')) {
            formSuratKuasa.classList.remove('hidden');
            formSuratKuasa.classList.remove('md:hidden');
            const newInputKtpKuasa = document.createElement('input');
            newInputKtpKuasa.setAttribute('class', 'hidden');
            newInputKtpKuasa.setAttribute('id', 'input-ktp-kuasa');
            newInputKtpKuasa.setAttribute('type', 'file');
            newInputKtpKuasa.setAttribute('name', 'input-ktp-kuasa');
            newInputKtpKuasa.setAttribute('accept', '.jpg,.jpeg,.png');
            inputKtpKuasa.appendChild(newInputKtpKuasa);

            // Tambahkan event listener ke input file KTP Kuasa
            newInputKtpKuasa.addEventListener("change", function() {
                const fileName = this.value.split('\\').pop();
                namaFileKtpKuasa.textContent = fileName;
            });
        }

        if (!document.getElementById('input-surat-kuasa')) {
            const newInputSuratKuasa = document.createElement('input');
            newInputSuratKuasa.setAttribute('class', 'hidden');
            newInputSuratKuasa.setAttribute('id', 'input-surat-kuasa');
            newInputSuratKuasa.setAttribute('type', 'file');
            newInputSuratKuasa.setAttribute('name', 'input-surat-kuasa');
            newInputSuratKuasa.setAttribute('accept', '.pdf');
            inputSuratKuasa.appendChild(newInputSuratKuasa);

            // Tambahkan event listener ke input file Surat Kuasa
            newInputSuratKuasa.addEventListener("change", function() {
                const fileName = this.value.split('\\').pop();
                namaFileSuratKuasa.textContent = fileName;
            });
        }
    }
    else {

        // Checkbox tidak dicentang, sembunyikan form dan hapus elemen inputKtpKuasa dan inputSuratKuasa jika ada
        formSuratKuasa.classList.add('hidden');
        formSuratKuasa.classList.add('md:hidden');
        // mengenalkan input
            const formKtpKuasa = document.getElementById('input-ktp-kuasa');
            const formSurat = document.getElementById('input-surat-kuasa');
//  remove isi div
            inputKtpKuasa.removeChild(formKtpKuasa);
            inputSuratKuasa.removeChild(formSurat);
        formKtpKuasa.remove;
        formSurat.remove;
        

        namaFileKtpKuasa.textContent = '';
        namaFileSuratKuasa.textContent = '';
    }
});


// Kemampuan bidang
const checkboxSertif = document.getElementById('kemampuan-checkbox');
const kemampuanBidangDiv = document.getElementById('kemampuan-bidang');
const namaFileInput = document.getElementById('nama-file-sertif-bidang');
const inputKemampuan = document.getElementById('input-kemampuan');

// Tambahkan event listener ke checkbox
checkboxSertif.addEventListener("click", function() {
    if (checkboxSertif.checked) {
        kemampuanBidangDiv.classList.remove('hidden');
        // Checkbox dicentang, buat elemen inputKemampuan jika belum ada
        if (!document.getElementById('sertif-bidang')) {
            const newInputKemampuan = document.createElement('input');
            newInputKemampuan.setAttribute('class', 'hidden');
            newInputKemampuan.setAttribute('id', 'sertif-bidang');
            newInputKemampuan.setAttribute('type', 'file');
            newInputKemampuan.setAttribute('accept', '.pdf');
            newInputKemampuan.setAttribute('name', 'sertif-bidang');
            inputKemampuan.appendChild(newInputKemampuan);

            // Tambahkan event listener ke input file
            newInputKemampuan.addEventListener("change", function() {
                const fileName = this.value.split('\\').pop();
                namaFileInput.textContent = fileName;
            });
        }
        
    } else {
        // Checkbox tidak dicentang, hapus elemen inputKemampuan jika ada
        kemampuanBidangDiv.classList.add('hidden');
        const form = document.getElementById('sertif-bidang');
        inputKemampuan.removeChild(form);

            form.remove;

        namaFileInput.textContent = '';
    }
});





        // Fungsi untuk menampilkan langkah tertentu
        function showStep(step) {
            step1.classList.add("hidden");
            step2.classList.add("hidden");

            step.classList.remove("hidden");
        }

        // Inisialisasi, tampilkan langkah pertama saat halaman dimuat
        showStep(step1);

        // Tambahkan event listener untuk tombol "Next"
        prevStepButton.addEventListener("click", function() {
            prevStepButton.classList.add("hidden");
            step.classList.remove("justify-between");
            step.classList.add("justify-end");
            nextStepButton.classList.remove("hidden");
            submitButton.classList.add("hidden");

        });

        nextStepButton.addEventListener("click", function() {
            const inputsInStep1 = step1.querySelectorAll("input");
            let isStep1Valid = true;
            const errMsg1 = document.getElementById('msgErr1');

            inputsInStep1.forEach((input) => {
                if (input.value.trim() === "") {
                    errMsg1.classList.remove('hidden');
                    isStep1Valid = false;
                }
            });

            if (isStep1Valid) {
                step.classList.remove("justify-end");
                step.classList.add("justify-between");
                nextStepButton.classList.add("hidden");
                prevStepButton.classList.remove("hidden");
                submitButton.classList.remove("hidden");



                showStep(step2);

                // event setelah di klik next
                const step2Inputs = document.querySelectorAll('#step-2 input');
                let isStep2Complete = true; // Ubah ke let agar nilainya dapat diubah
                const errMsg2 = document.getElementById('msgErr2');


                // Loop melalui setiap input pada langkah kedua
                for (const input of step2Inputs) {
                    submitButton.addEventListener("click", function() {
                        isStep2Complete = true; // Setel ke true saat ada perubahan pada input
                        for (const input of step2Inputs) {
                            if (input.value === '') {
                                errMsg2.classList.remove('hidden');
                                isStep2Complete = false;
                                break; // Keluar dari loop jika ada input yang kosong
                            }
                        }
                        
                        if (isStep2Complete) {
                            errMsg2.classList.add('hidden');
                            submitButton.type = "submit";

                        } else {
                            ubahTransformasiAcak(submitButton);

                        }
                    });
                }
            }
            // jika belum di isi semuanya
            else {
                ubahTransformasiAcak(nextStepButton);

            }



        });

        // membuat nilai acak
        function nilaiAcak(min, max) {
            return Math.random() * (max - min) + min;
        }

        // Fungsi untuk mengubah transformasi elemen dengan nilai acak
        function ubahTransformasiAcak(element) {
            const rotasiAcak = nilaiAcak(-50, 50); // Nilai rotasi acak dalam derajat
            const translasiXAcak = nilaiAcak(-100, 50); // Nilai translasi horizontal acak
            const translasiYAcak = nilaiAcak(-40, 40); // Nilai translasi vertikal acak

            // Mengubah transformasi elemen dengan nilai acak
            element.style.transform = `rotate(${rotasiAcak}deg) translate(${translasiXAcak}px, ${translasiYAcak}px)`;
        }

        // Tambahkan event listener untuk tombol "Previous"
        prevStepButton.addEventListener("click", function() {
            // Kembali ke langkah sebelumnya
            submitButton.classList.add("hidden");

            showStep(step1);
        });



 // Daftar elemen input file dan elemen tampilan nama file
const fileInputs = [
    { inputId: "surat-nik", nameElementId: "nama-file-surat-nik" },
    { inputId: "ktp-ketua", nameElementId: "nama-file-ktp" },
    { inputId: "ktp_sekertaris", nameElementId: "nama-file-ktp-sekertaris" },
    { inputId: "pas-foto", nameElementId: "nama-file-pas-foto" },
    { inputId: "foto-kesenian", nameElementId: "nama-file-foto-kesenian" },
];

// Loop melalui daftar elemen input file dan tambahkan event listener
fileInputs.forEach((fileInput) => {
    const inputElement = document.getElementById(fileInput.inputId);
    const nameElement = document.getElementById(fileInput.nameElementId);

    inputElement.addEventListener("change", function() {
        const fileName = this.files[0].name;
        nameElement.textContent = fileName;
    });
});

