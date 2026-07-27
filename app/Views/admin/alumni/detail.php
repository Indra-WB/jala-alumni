<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between bg-white p-6 rounded-3xl border border-slate-200">
        <div>
            <h3 class="text-xl font-extrabold text-slate-900">Detail Alumni</h3>
            <p class="text-xs text-slate-500">NIK: <?= esc($alumniData['pendaftar']['ktp'] ?? $alumniData['user']['nik'] ?? '-') ?></p>
        </div>
        <a href="<?= base_url('admin/alumni') ?>" class="text-xs font-bold text-slate-600 hover:text-brand-600">← Kembali ke Daftar</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Biodata -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200 space-y-3 text-xs">
            <h4 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-2">Biodata Alumni</h4>
            <div>Nama Lengkap: <strong class="text-slate-900"><?= esc($alumniData['pendaftar']['firstname'] ?? $alumniData['profile']['nama_lengkap'] ?? '-') ?></strong></div>
            <div>No. HP: <strong class="text-slate-900"><?= esc($alumniData['pendaftar']['hp'] ?? $alumniData['profile']['hp'] ?? '-') ?></strong></div>
            <div>Email: <strong class="text-slate-900"><?= esc($alumniData['pendaftar']['email'] ?? $alumniData['user']['email'] ?? '-') ?></strong></div>
            <div>Alamat: <strong class="text-slate-900"><?= esc($alumniData['pendaftar']['alamat'] ?? $alumniData['profile']['alamat'] ?? '-') ?></strong></div>
            <div>Pendidikan: <strong class="text-slate-900"><?= esc($alumniData['pendaftar']['pendidikan'] ?? '-') ?></strong></div>
            <div>Asal Sekolah: <strong class="text-slate-900"><?= esc($alumniData['pendaftar']['asalsekolah'] ?? '-') ?></strong></div>
        </div>

        <!-- Penempatan -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200 space-y-3 text-xs">
            <h4 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-2">Status Penempatan & Kebekerjaan</h4>
            <?php if (!empty($alumniData['penempatan'])): $p = $alumniData['penempatan']; ?>
                <div>Status: <strong class="uppercase text-brand-600"><?= esc($p['status']) ?></strong></div>
                <div>Perusahaan / Usaha: <strong class="text-slate-900"><?= esc($p['nama_perusahaan'] ?? '-') ?></strong></div>
                <div>Jabatan: <strong class="text-slate-900"><?= esc($p['jabatan'] ?? '-') ?></strong></div>
                <div>Alamat Perusahaan: <strong class="text-slate-900"><?= esc($p['alamat_perusahaan'] ?? '-') ?></strong></div>
                <div>Awal Bekerja: <strong class="text-slate-900"><?= esc($p['awal_bekerja'] ?? '-') ?></strong></div>
            <?php else: ?>
                <p class="text-slate-400">Belum ada data penempatan tercatat.</p>
            <?php endif; ?>
        </div>

    </div>

</div>
<?= $this->endSection() ?>
