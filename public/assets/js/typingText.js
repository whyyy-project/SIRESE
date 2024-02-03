
// typing dashboard
const texts = [
    "SIRESE merupakan sebuah sistem pendukung keputusan dalam pemilihan smartphone yang telah di program agar dapat memberikan rekomendasi smartphone.",
    "SIRESE mengimplementasikan metode Analytical Hierarchy Process (AHP) untuk membantu mengidentifikasi kriteria-kriteria yang paling relevan dan memberikan bobot pada setiap kriteria berdasarkan prioritas pengguna.",
    "SIRESE memungkinkan pengguna untuk menentukan prioritas mereka terhadap berbagai faktor, seperti brand, batrai, harga, penyimpanan, dll. Dengan memahami kepentingan relatif dari setiap kriteria, pengguna dapat membuat keputusan yang lebih terinformasi.",
    "SIRESE tidak hanya memberikan solusi yang lebih akurat dan terstruktur, tetapi juga meningkatkan pengalaman pengguna dalam proses pengambilan keputusan."
];

let i = 0;
let textIndex = 0;
const typingText = document.getElementById('typing-text');

function typeWriter() {
    const text = texts[textIndex];

    if (i < text.length) {
        typingText.textContent += text.charAt(i);
        i++;
        setTimeout(typeWriter, 40); // Waktu pengetikan per karakter (ms)
    } else {
        // Menghapus teks sebelumnya sebelum melanjutkan ke teks berikutnya
        setTimeout(eraseText, 2000);
    }
}

function eraseText() {
    if (i > 0) {
        typingText.textContent = typingText.textContent.slice(0, -1);
        i--;
        setTimeout(eraseText, 20); // Waktu penghapusan per karakter (ms)
    } else {
        textIndex++;
        if (textIndex === texts.length) {
            textIndex = 0;
        }
        setTimeout(typeWriter, 500);
    }
}

typeWriter();