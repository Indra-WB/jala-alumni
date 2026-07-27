<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="py-10 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-brand-700 via-brand-600 to-blue-600 rounded-3xl p-8 text-white shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="space-y-2">
                <span class="bg-white/20 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Dashboard Alumni</span>
                <h1 class="text-3xl font-black">Selamat Datang, <?= esc($alumniData['profile']['nama_lengkap'] ?? session()->get('nama_lengkap')) ?>!</h1>
                <p class="text-brand-100 text-sm">NIK: <?= esc(session()->get('nik')) ?> • Status Akun: <span class="font-bold text-emerald-300">Aktif</span></p>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <a href="<?= base_url('alumni/status') ?>" class="inline-flex items-center gap-2 bg-white text-brand-700 hover:bg-slate-50 font-bold px-6 py-3.5 rounded-xl shadow-lg transition-transform hover:scale-105">
                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                    <span>Update Status Kebekerjaan</span>
                </a>
                <a href="<?= base_url('logout') ?>" onclick="return confirm('Apakah Anda yakin ingin keluar/logout?')" class="inline-flex items-center gap-2 bg-rose-500/20 hover:bg-rose-500 text-white font-bold px-5 py-3.5 rounded-xl border border-white/30 transition-all hover:scale-105">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold flex items-center gap-2">
                <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                <span><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>

        <!-- Grid Widgets -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Widget 1: Profile Summary Card -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 space-y-6">
                <div class="flex items-center gap-4 border-b border-slate-100 pb-4">
                    <div class="w-16 h-16 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center font-bold text-xl overflow-hidden border-2 border-white shadow">
                        <?php if (!empty($alumniData['profile']['foto'])): ?>
                            <img src="<?= base_url('uploads/profile/' . $alumniData['profile']['foto']) ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <i data-lucide="user" class="w-8 h-8"></i>
                        <?php endif; ?>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-slate-900 text-base"><?= esc($alumniData['profile']['nama_lengkap'] ?? '-') ?></h3>
                        <p class="text-xs text-slate-500"><?= esc($alumniData['user']['email'] ?? '-') ?></p>
                    </div>
                </div>

                <div class="space-y-3 text-xs text-slate-600">
                    <div class="flex justify-between py-1 border-b border-slate-100">
                        <span>No. HP / WhatsApp:</span>
                        <strong class="text-slate-900"><?= esc($alumniData['profile']['hp'] ?? '-') ?></strong>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-100">
                        <span>Alamat:</span>
                        <strong class="text-slate-900"><?= esc($alumniData['profile']['alamat'] ?? '-') ?></strong>
                    </div>
                </div>

                <div class="space-y-2">
                    <a href="<?= base_url('alumni/profil') ?>" class="block text-center bg-slate-50 hover:bg-slate-100 text-slate-700 font-bold py-2.5 rounded-xl border border-slate-200 text-xs transition-colors">
                        Edit Profil Saya
                    </a>
                    <a href="<?= base_url('logout') ?>" onclick="return confirm('Apakah Anda yakin ingin keluar/logout?')" class="flex items-center justify-center gap-2 text-center bg-rose-50 hover:bg-rose-100 text-rose-700 font-bold py-2.5 rounded-xl border border-rose-200 text-xs transition-colors">
                        <i data-lucide="log-out" class="w-3.5 h-3.5"></i>
                        <span>Keluar / Logout</span>
                    </a>
                </div>
            </div>

            <!-- Widget 2: Status Pekerjaan Saat Ini -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 space-y-4 lg:col-span-2">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 class="font-extrabold text-slate-900 text-lg flex items-center gap-2">
                        <i data-lucide="briefcase" class="w-5 h-5 text-brand-600"></i>
                        <span>Status Kebekerjaan Saat Ini</span>
                    </h3>
                    <a href="<?= base_url('alumni/status') ?>" class="text-xs font-bold text-brand-600 hover:underline">Perbarui Status →</a>
                </div>

                <?php if (!empty($alumniData['penempatan'])): $p = $alumniData['penempatan']; ?>
                    <div class="bg-brand-50/50 border border-brand-100 rounded-2xl p-6 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 rounded-full text-xs font-extrabold uppercase <?= $p['status'] == 'wirausaha' ? 'bg-amber-100 text-amber-800' : 'bg-blue-100 text-blue-800' ?>">
                                <?= esc(strtoupper($p['status'])) ?>
                            </span>
                            <span class="text-xs text-slate-400">Mulai: <?= esc($p['awal_bekerja'] ?? '-') ?></span>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900"><?= esc($p['nama_perusahaan'] ?? 'Nama Usaha / Perusahaan') ?></h4>
                        <p class="text-sm text-slate-600 font-medium">Jabatan / Posisi: <strong class="text-slate-800"><?= esc($p['jabatan'] ?? '-') ?></strong></p>
                        <p class="text-xs text-slate-500">Alamat Perusahaan: <?= esc($p['alamat_perusahaan'] ?? '-') ?></p>
                    </div>
                <?php else: ?>
                    <div class="bg-slate-50 rounded-2xl p-8 text-center space-y-3 border border-slate-200">
                        <i data-lucide="info" class="w-10 h-10 text-slate-400 mx-auto"></i>
                        <h4 class="font-bold text-slate-700">Belum Mengisi Status Pekerjaan</h4>
                        <p class="text-xs text-slate-500 max-w-md mx-auto">Bantu BLK Pasuruan melakukan tracer study dengan mengisi status kebekerjaan Anda saat ini (Bekerja, Wirausaha, atau Belum Bekerja).</p>
                        <a href="<?= base_url('alumni/status') ?>" class="inline-block bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs px-5 py-2.5 rounded-xl shadow-md">
                            Isi Form Status Pekerjaan
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>
</section>
<?= $this->endSection() ?>
