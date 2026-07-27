<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200">
        <div>
            <h3 class="text-xl font-extrabold text-slate-900">Kelola Data Alumni</h3>
            <p class="text-xs text-slate-500">Daftar alumni terdaftar di sistem pelatihan dan tracer study BLK Pasuruan.</p>
        </div>

        <form action="<?= base_url('admin/alumni') ?>" method="GET" class="flex items-center gap-2">
            <input type="text" name="q" value="<?= esc($search ?? '') ?>" placeholder="Cari NIK / Nama / Kejuruan..." class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs font-medium text-slate-900 focus:ring-2 focus:ring-brand-500">
            <button type="submit" class="bg-brand-600 hover:bg-brand-700 text-white font-bold px-4 py-2 rounded-xl text-xs">Cari</button>
        </form>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase font-bold border-y border-slate-100">
                    <tr>
                        <th class="py-3 px-4">NIK</th>
                        <th class="py-3 px-4">Nama Alumni</th>
                        <th class="py-3 px-4">Kejuruan</th>
                        <th class="py-3 px-4">Status Kebekerjaan</th>
                        <th class="py-3 px-4">Perusahaan / Usaha</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php if (!empty($alumniList)): foreach ($alumniList as $alumni): ?>
                        <tr>
                            <td class="py-3 px-4 font-mono font-bold text-slate-900"><?= esc($alumni['ktp']) ?></td>
                            <td class="py-3 px-4 font-bold text-slate-800"><?= esc($alumni['nama']) ?></td>
                            <td class="py-3 px-4 text-slate-600"><?= esc($alumni['kejuruan'] ?? '-') ?></td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-bold uppercase <?= ($alumni['status'] ?? '') == 'wirausaha' ? 'bg-amber-50 text-amber-700' : 'bg-blue-50 text-blue-700' ?>">
                                    <?= esc($alumni['status'] ?? 'Terlatih') ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 font-semibold text-slate-800"><?= esc($alumni['nama_perusahaan'] ?? '-') ?></td>
                            <td class="py-3 px-4">
                                <a href="<?= base_url('admin/alumni/detail/' . $alumni['ktp']) ?>" class="bg-brand-50 hover:bg-brand-100 text-brand-700 font-bold px-3 py-1.5 rounded-lg border border-brand-200">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="6" class="py-8 text-center text-slate-400">Tidak ada data alumni.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
