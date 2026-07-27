<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
            <div>
                <span class="text-xs font-bold text-brand-600 uppercase tracking-wider">Pencarian Terpadu</span>
                <h1 class="text-3xl font-black text-slate-900 mt-1">Direktori Alumni BLK Pasuruan</h1>
                <p class="text-sm text-slate-500 mt-1">Temukan alumni berdasarkan nama, kejuruan, status kebekerjaan, dan perusahaan.</p>
            </div>

            <!-- Search Form -->
            <form action="<?= base_url('direktori') ?>" method="GET" class="flex flex-wrap items-center gap-3">
                <select name="status" class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="">Semua Status</option>
                    <option value="bekerja" <?= $status == 'bekerja' ? 'selected' : '' ?>>Karyawan / Bekerja</option>
                    <option value="wirausaha" <?= $status == 'wirausaha' ? 'selected' : '' ?>>Berwirausaha</option>
                </select>

                <div class="relative min-w-[280px]">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                    <input type="text" name="q" value="<?= esc($search ?? '') ?>" placeholder="Cari nama, kejuruan, atau perusahaan..." class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <button type="submit" class="bg-brand-600 hover:bg-brand-700 text-white font-bold px-6 py-3 rounded-xl shadow-md shadow-brand-600/20">
                    Cari
                </button>
            </form>
        </div>

        <!-- Directory Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (!empty($alumniList)): ?>
                <?php foreach ($alumniList as $alumni): ?>
                    <?php 
                        $isWirausaha = strtolower($alumni['status'] ?? '') == 'wirausaha';
                        $badgeClass = $isWirausaha ? 'bg-amber-50 text-amber-700 border-amber-200' : 'bg-blue-50 text-blue-700 border-blue-200';
                        $statusText = $isWirausaha ? 'Wirausaha' : (!empty($alumni['status']) ? ucfirst($alumni['status']) : 'Terlatih');
                    ?>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl transition-all space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full bg-slate-200 overflow-hidden shrink-0 border-2 border-white shadow">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" alt="<?= esc($alumni['nama']) ?>" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 text-base leading-snug"><?= esc($alumni['nama']) ?></h3>
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-xs font-semibold border <?= $badgeClass ?> mt-1">
                                    <i data-lucide="<?= $isWirausaha ? 'store' : 'briefcase' ?>" class="w-3 h-3"></i>
                                    <?= $statusText ?>
                                </span>
                            </div>
                        </div>

                        <div class="space-y-2 text-xs font-medium text-slate-600 border-t border-slate-100 pt-4">
                            <div class="flex items-center gap-2">
                                <i data-lucide="building-2" class="w-4 h-4 text-slate-400"></i>
                                <span class="truncate font-semibold text-slate-800"><?= esc($alumni['nama_perusahaan'] ?? '-') ?></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="award" class="w-4 h-4 text-slate-400"></i>
                                <span class="truncate"><?= esc($alumni['kejuruan'] ?? 'Pelatihan BLK') ?></span>
                            </div>
                            <div class="flex items-center gap-2 text-slate-400">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                <span>Tahun Pelatihan: <?= esc($alumni['tahun'] ?? '2023') ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full bg-white rounded-3xl p-12 text-center space-y-3 border border-slate-100">
                    <i data-lucide="user-x" class="w-12 h-12 text-slate-300 mx-auto"></i>
                    <h3 class="font-bold text-slate-700 text-lg">Tidak ada data alumni ditemukan</h3>
                    <p class="text-xs text-slate-400">Coba ubah kata kunci pencarian atau reset filter Anda.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>
<?= $this->endSection() ?>
