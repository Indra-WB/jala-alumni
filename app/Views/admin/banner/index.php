<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200">
        <div>
            <h3 class="text-xl font-extrabold text-slate-900">Kelola Banner Hero</h3>
            <p class="text-xs text-slate-500">Pengaturan banner slide/hero pada landing page publik.</p>
        </div>

        <button onclick="openBannerModal()" class="bg-brand-600 hover:bg-brand-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs flex items-center gap-2">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Tambah Banner</span>
        </button>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase font-bold border-y border-slate-100">
                    <tr>
                        <th class="py-3 px-4">Urutan</th>
                        <th class="py-3 px-4">Judul Banner</th>
                        <th class="py-3 px-4">Subjudul</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php if (!empty($banners)): foreach ($banners as $b): ?>
                        <tr>
                            <td class="py-3 px-4 font-bold text-slate-900"><?= esc($b['urutan']) ?></td>
                            <td class="py-3 px-4 font-bold text-slate-800"><?= esc($b['judul']) ?></td>
                            <td class="py-3 px-4 text-slate-600"><?= esc($b['subjudul']) ?></td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase <?= $b['status'] == 'aktif' ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-600' ?>">
                                    <?= esc($b['status']) ?>
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="<?= base_url('admin/banner/delete/' . $b['id']) ?>" onclick="return confirm('Hapus banner ini?')" class="text-rose-600 font-bold hover:underline">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="5" class="py-8 text-center text-slate-400">Belum ada banner hero.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal Form Banner -->
<div id="bannerModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl p-6 max-w-md w-full shadow-2xl space-y-4">
        <h3 class="font-extrabold text-slate-900 text-base">Form Banner Hero</h3>
        
        <form action="<?= base_url('admin/banner/save') ?>" method="POST" class="space-y-3 text-xs">
            <?= csrf_field() ?>

            <div>
                <label class="block font-bold text-slate-700 mb-1">Judul Hero</label>
                <input type="text" name="judul" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-medium text-slate-900">
            </div>

            <div>
                <label class="block font-bold text-slate-700 mb-1">Subjudul</label>
                <textarea name="subjudul" rows="2" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-medium text-slate-900"></textarea>
            </div>

            <div>
                <label class="block font-bold text-slate-700 mb-1">Urutan Tampil</label>
                <input type="number" name="urutan" value="1" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-medium text-slate-900">
            </div>

            <div class="flex items-center gap-3 pt-3">
                <button type="button" onclick="closeBannerModal()" class="w-1/2 bg-slate-100 text-slate-700 font-bold py-2.5 rounded-xl">Batal</button>
                <button type="submit" class="w-1/2 bg-brand-600 text-white font-bold py-2.5 rounded-xl">Simpan Banner</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openBannerModal() {
        document.getElementById('bannerModal').classList.remove('hidden');
    }
    function closeBannerModal() {
        document.getElementById('bannerModal').classList.add('hidden');
    }
</script>
<?= $this->endSection() ?>
