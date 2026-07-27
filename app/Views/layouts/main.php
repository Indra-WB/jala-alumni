<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'JALA ALUMNI - UPT BLK Pasuruan') ?></title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Lucide Icons & FontAwesome Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <!-- LeafletJS Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #1e293b; }
        .glass-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(226, 232, 240, 0.8); }
        .hero-gradient { background: radial-gradient(circle at 80% 20%, rgba(37, 99, 235, 0.08) 0%, rgba(255, 255, 255, 0) 60%); }
    </style>
</head>
<body class="min-h-screen flex flex-col antialiased selection:bg-brand-500 selection:text-white">

    <!-- NAVBAR -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="<?= base_url('/') ?>" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-brand-600 flex items-center justify-center text-white font-bold shadow-md shadow-brand-500/20 group-hover:scale-105 transition-transform">
                    <i data-lucide="network" class="w-6 h-6"></i>
                </div>
                <div>
                    <span class="font-extrabold text-xl tracking-tight text-slate-900 block leading-none">JALA ALUMNI</span>
                    <span class="text-[10px] font-semibold text-brand-600 tracking-wider uppercase">UPT BLK PASURUAN</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                <a href="<?= base_url('/') ?>" class="hover:text-brand-600 transition-colors <?= current_url(true)->getPath() == '/' ? 'text-brand-600 font-bold border-b-2 border-brand-600 py-1' : '' ?>">Beranda</a>
                <a href="<?= base_url('statistik') ?>" class="hover:text-brand-600 transition-colors <?= current_url(true)->getPath() == '/statistik' ? 'text-brand-600 font-bold border-b-2 border-brand-600 py-1' : '' ?>">Data Penempatan</a>
                <a href="<?= base_url('direktori') ?>" class="hover:text-brand-600 transition-colors <?= current_url(true)->getPath() == '/direktori' ? 'text-brand-600 font-bold border-b-2 border-brand-600 py-1' : '' ?>">Direktori Alumni</a>
                <a href="<?= base_url('mitra') ?>" class="hover:text-brand-600 transition-colors <?= current_url(true)->getPath() == '/mitra' ? 'text-brand-600 font-bold border-b-2 border-brand-600 py-1' : '' ?>">Mitra Industri</a>
                <a href="<?= base_url('cerita') ?>" class="hover:text-brand-600 transition-colors <?= current_url(true)->getPath() == '/cerita' ? 'text-brand-600 font-bold border-b-2 border-brand-600 py-1' : '' ?>">Cerita Alumni</a>
            </nav>

            <!-- Right CTA & Auth -->
            <div class="flex items-center gap-3">
                <?php if (session()->get('is_logged_in')): ?>
                    <a href="<?= base_url(session()->get('role') . '/dashboard') ?>" class="inline-flex items-center gap-2 bg-brand-50 hover:bg-brand-100 text-brand-700 font-semibold text-sm px-4 py-2.5 rounded-xl border border-brand-200 transition-all">
                        <i data-lucide="user" class="w-4 h-4"></i>
                        <span><?= esc(session()->get('nama_lengkap')) ?></span>
                    </a>
                    <a href="<?= base_url('logout') ?>" onclick="return confirm('Apakah Anda yakin ingin keluar/logout?')" title="Logout" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200 transition-all">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white font-semibold text-sm px-5 py-2.5 rounded-xl shadow-lg shadow-brand-600/30 hover:shadow-brand-600/50 transition-all transform hover:-translate-y-0.5">
                        <i data-lucide="user-check" class="w-4 h-4"></i>
                        <span>Perbarui Status Alumni</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- CONTENT -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-white border-t border-slate-800 pt-16 pb-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                <!-- Brand Description -->
                <div class="space-y-4 md:col-span-1">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-brand-600 flex items-center justify-center text-white font-bold">
                            <i data-lucide="network" class="w-6 h-6"></i>
                        </div>
                        <span class="font-extrabold text-xl tracking-tight text-white">JALA ALUMNI</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Platform resmi UPT BLK Pasuruan untuk menghubungkan alumni dengan peluang kerja, usaha, dan jejaring industri secara terintegrasi.
                    </p>
                    <ul class="flex flex-wrap items-center gap-2.5 pt-2">
                        <li><a href="https://wa.me/+6285806785550" target="_blank" rel="noopener" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-emerald-600 transition-colors" title="WhatsApp"><i class="fa fa-whatsapp text-sm"></i></a></li>
                        <li><a href="mailto:uptblk.pasuruan@gmail.com" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-brand-600 transition-colors" title="Email"><i class="fa fa-envelope text-sm"></i></a></li>
                        <li><a href="https://uptblkpasuruan.com" target="_blank" rel="noopener" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-brand-600 transition-colors" title="Website"><i class="fa fa-dribbble text-sm"></i></a></li>
                        <li><a href="https://www.instagram.com/uptblkpasuruan" target="_blank" rel="noopener" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-pink-600 transition-colors" title="Instagram"><i class="fa fa-instagram text-sm"></i></a></li>
                        <li><a href="https://www.facebook.com/uptblkpasuruan" target="_blank" rel="noopener" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 transition-colors" title="Facebook"><i class="fa fa-facebook text-sm"></i></a></li>
                        <li><a href="https://www.youtube.com/@uptbalailatihankerjapasuru8458" target="_blank" rel="noopener" class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-red-600 transition-colors" title="YouTube"><i class="fa fa-youtube text-sm"></i></a></li>
                    </ul>
                </div>

                <!-- Tautan Cepat -->
                <div>
                    <h4 class="text-sm font-bold text-white tracking-wider uppercase mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="<?= base_url('/') ?>" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="<?= base_url('statistik') ?>" class="hover:text-white transition-colors">Data Penempatan</a></li>
                        <li><a href="<?= base_url('cerita') ?>" class="hover:text-white transition-colors">Cerita Alumni</a></li>
                        <li><a href="<?= base_url('mitra') ?>" class="hover:text-white transition-colors">Mitra Industri</a></li>
                        <li><a href="<?= base_url('direktori') ?>" class="hover:text-white transition-colors">Direktori Alumni</a></li>
                    </ul>
                </div>

                <!-- Layanan -->
                <div>
                    <h4 class="text-sm font-bold text-white tracking-wider uppercase mb-4">Layanan</h4>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="<?= base_url('login') ?>" class="hover:text-white transition-colors">Perbarui Status Alumni</a></li>
                        <li><a href="<?= base_url('register') ?>" class="hover:text-white transition-colors">Registrasi NIK</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Panduan Pengisian</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                    </ul>
                </div>

                <!-- Hubungi Kami -->
                <div>
                    <h4 class="text-sm font-bold text-white tracking-wider uppercase mb-4">Hubungi Kami</h4>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li class="flex items-start gap-3">
                            <i data-lucide="map-pin" class="w-5 h-5 text-brand-500 shrink-0 mt-0.5"></i>
                            <span>Jl. Pahlawan Sunaryo No.96-S, Kebon Waris, Kec. Pandaan, Kab. Pasuruan.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i data-lucide="phone" class="w-4 h-4 text-brand-500 shrink-0"></i>
                            <span>Tlp: (0343) 631696</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i data-lucide="printer" class="w-4 h-4 text-brand-500 shrink-0"></i>
                            <span>Fax: (0343) 630014</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i data-lucide="message-circle" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                            <span>WA: 085806785550</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Credits -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p>© 2026 UPT BLK Pasuruan. Semua hak dilindungi.</p>
                <div class="flex items-center gap-2">
                    <i data-lucide="shield-check" class="w-4 h-4 text-brand-500"></i>
                    <span>Dikelola oleh UPT BLK Pasuruan</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
