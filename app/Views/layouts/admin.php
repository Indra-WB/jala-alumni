<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Panel - JALA Alumni') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-100 text-slate-800 font-sans min-h-screen flex">

    <!-- SIDEBAR (Width: 280px) -->
    <aside class="w-70 bg-slate-900 text-white min-h-screen flex flex-col shrink-0 border-r border-slate-800">
        <!-- Logo Header -->
        <div class="h-20 flex items-center gap-3 px-6 border-b border-slate-800">
            <div class="w-9 h-9 rounded-xl bg-brand-600 flex items-center justify-center font-bold text-white">
                <i data-lucide="shield-check" class="w-5 h-5"></i>
            </div>
            <div>
                <span class="font-extrabold text-lg tracking-tight text-white block leading-none">ADMIN JALA</span>
                <span class="text-[10px] font-semibold text-slate-400">UPT BLK PASURUAN</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="p-4 space-y-1 text-sm font-semibold flex-grow">
            <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition-colors <?= current_url(true)->getPath() == '/admin/dashboard' ? 'bg-brand-600 text-white' : 'text-slate-400' ?>">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                <span>Dashboard</span>
            </a>

            <a href="<?= base_url('admin/alumni') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition-colors <?= str_contains(current_url(true)->getPath(), '/admin/alumni') ? 'bg-brand-600 text-white' : 'text-slate-400' ?>">
                <i data-lucide="users" class="w-5 h-5"></i>
                <span>Kelola Alumni</span>
            </a>

            <a href="<?= base_url('admin/mitra') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition-colors <?= current_url(true)->getPath() == '/admin/mitra' ? 'bg-brand-600 text-white' : 'text-slate-400' ?>">
                <i data-lucide="building-2" class="w-5 h-5"></i>
                <span>Mitra Industri</span>
            </a>

            <a href="<?= base_url('admin/cerita') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition-colors <?= current_url(true)->getPath() == '/admin/cerita' ? 'bg-brand-600 text-white' : 'text-slate-400' ?>">
                <i data-lucide="quote" class="w-5 h-5"></i>
                <span>Cerita Alumni</span>
            </a>

            <a href="<?= base_url('admin/banner') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition-colors <?= current_url(true)->getPath() == '/admin/banner' ? 'bg-brand-600 text-white' : 'text-slate-400' ?>">
                <i data-lucide="image" class="w-5 h-5"></i>
                <span>Banner Hero</span>
            </a>

            <a href="<?= base_url('admin/auditlog') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition-colors <?= current_url(true)->getPath() == '/admin/auditlog' ? 'bg-brand-600 text-white' : 'text-slate-400' ?>">
                <i data-lucide="activity" class="w-5 h-5"></i>
                <span>Audit Log</span>
            </a>

            <?php if (session()->get('role') == 'superadmin'): ?>
                <div class="pt-4 pb-1 px-4 text-[11px] font-bold text-slate-500 uppercase tracking-wider">Super Admin</div>
                <a href="<?= base_url('superadmin/users') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition-colors <?= current_url(true)->getPath() == '/superadmin/users' ? 'bg-purple-600 text-white' : 'text-slate-400' ?>">
                    <i data-lucide="user-check" class="w-5 h-5"></i>
                    <span>Manajemen User</span>
                </a>
            <?php endif; ?>
        </nav>

        <!-- Bottom User / Logout -->
        <div class="p-4 border-t border-slate-800 flex items-center justify-between text-xs">
            <div>
                <div class="font-bold text-white"><?= esc(session()->get('nama_lengkap')) ?></div>
                <div class="text-slate-500 uppercase font-semibold"><?= esc(session()->get('role')) ?></div>
            </div>
            <a href="<?= base_url('logout') ?>" class="text-slate-400 hover:text-rose-400 p-2"><i data-lucide="log-out" class="w-5 h-5"></i></a>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <div class="flex-grow flex flex-col">
        <!-- Top Navbar -->
        <header class="h-20 bg-white border-b border-slate-200 px-8 flex items-center justify-between sticky top-0 z-30">
            <h2 class="text-lg font-bold text-slate-900"><?= esc($title ?? 'Dashboard Admin') ?></h2>
            <div class="flex items-center gap-4">
                <a href="<?= base_url('/') ?>" target="_blank" class="text-xs font-bold text-brand-600 hover:underline flex items-center gap-1">
                    <span>Lihat Website</span>
                    <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </header>

        <main class="p-8 flex-grow">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
