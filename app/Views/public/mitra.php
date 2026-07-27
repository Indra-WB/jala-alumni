<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
            <span class="text-xs font-bold text-brand-600 uppercase tracking-wider">Jejaring Industri</span>
            <h1 class="text-3xl font-black text-slate-900 mt-1">Mitra Industri UPT BLK Pasuruan</h1>
            <p class="text-sm text-slate-500 mt-1">Perusahaan dan instansi yang bekerja sama dalam penyerapan tenaga kerja alumni pelatihan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($mitraList as $mitra): ?>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-lg transition-all space-y-3">
                    <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center font-bold text-lg">
                        <i data-lucide="building" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-bold text-slate-900 text-lg"><?= esc($mitra['nama_mitra']) ?></h3>
                    <span class="inline-block px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 text-xs font-semibold">
                        <?= esc($mitra['sektor_industri'] ?? 'Industri & Jasa') ?>
                    </span>
                    <p class="text-xs text-slate-500 leading-relaxed"><?= esc($mitra['deskripsi'] ?? 'Mitra resmi penyerap tenaga kerja terampil BLK Pasuruan.') ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?= $this->endSection() ?>
