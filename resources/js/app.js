import './bootstrap';
// Impor ini jika Anda menggunakan komponen JS Flowbite lain
import 'flowbite';

// Logika untuk Theme Toggle
const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
const themeToggleBtn = document.getElementById('theme-toggle');

// Fungsi untuk mengatur ikon berdasarkan tema saat ini
function setToggleIcon() {
    // Cek tema dari localStorage atau preferensi sistem
    if (localStorage.getItem('color-theme') === 'dark' || 
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
        themeToggleDarkIcon.classList.add('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
        themeToggleLightIcon.classList.add('hidden');
    }
}

// Panggil fungsi saat halaman pertama kali dimuat
document.addEventListener('DOMContentLoaded', setToggleIcon);

// Tambahkan event listener untuk tombol toggle
themeToggleBtn.addEventListener('click', function() {
    // Toggle ikon
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // Cek apakah tema sudah ada di localStorage
    if (localStorage.getItem('color-theme')) {
        // Jika tema 'light', ubah ke 'dark' dan simpan di localStorage
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            // Jika tema 'dark', ubah ke 'light' dan simpan di localStorage
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }
    // Jika tema belum ada di localStorage
    } else {
        // Cek apakah class 'dark' ada di <html>
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
});
