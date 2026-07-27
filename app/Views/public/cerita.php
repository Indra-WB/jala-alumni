<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
            <span class="text-xs font-bold text-brand-600 uppercase tracking-wider">Kisah Sukses</span>
            <h1 class="text-3xl font-black text-slate-900 mt-1">Cerita Alumni BLK Pasuruan</h1>
            <p class="text-sm text-slate-500 mt-1">Inspirasi dan pengalaman nyata lulusan pelatihan dalam membangun karier dan wirausaha.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($ceritaList as $c): ?>
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 hover:shadow-xl transition-all space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-brand-100 shrink-0">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=200&q=80" alt="<?= esc($c['nama_alumni']) ?>" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-lg"><?= esc($c['nama_alumni']) ?></h3>
                            <div class="text-xs font-semibold text-brand-600"><?= esc($c['pekerjaan_saat_ini']) ?> • <?= esc($c['nama_perusahaan']) ?></div>
                            <div class="text-xs text-slate-400 mt-0.5"><?= esc($c['kejuruan']) ?> (Pelatihan <?= esc($c['tahun_pelatihan']) ?>)</div>
                        </div>
                    </div>
                    <h4 class="font-extrabold text-slate-800 text-base">"<?= esc($c['judul']) ?>"</h4>
                    <p class="text-sm text-slate-600 italic leading-relaxed">
                        "<?= esc($c['isi_cerita']) ?>"
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?= $this->endSection() ?>
