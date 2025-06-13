@if (session('error'))
    <div id="alert-error"
        class="fixed top-4 right-4 z-50 max-w-xs w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 shadow-lg transition-opacity duration-500"
        role="alert">
        <div class="flex items-center">
            <svg class="shrink-0 w-5 h-5 me-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="font-medium">Gagal:</span> {{ session('error') }}
        </div>
    </div>
@endif

@if (session('success'))
    <div id="alert-success"
        class="fixed top-4 right-4 z-50 max-w-xs w-full p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 shadow-lg transition-opacity duration-500"
        role="alert">
        <div class="flex items-center">
            <svg class="shrink-0 w-5 h-5 me-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="font-medium">Berhasil:</span> {{ session('success') }}
        </div>
    </div>
@endif

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const alerts = ['alert-success', 'alert-error'];
        alerts.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                setTimeout(() => {
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 500); // hapus dari DOM setelah fade out
                }, 3000);
            }
        });
    });
</script>
