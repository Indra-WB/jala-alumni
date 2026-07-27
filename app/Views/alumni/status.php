<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="py-10 bg-slate-50 min-h-screen">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
            <h1 class="text-2xl font-black text-slate-900">Update Status Kebekerjaan</h1>
            <p class="text-xs text-slate-500 mt-1">Perbarui data penempatan Anda saat ini ke sistem tracer study UPT BLK Pasuruan.</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold flex items-center gap-2">
                <i data-lucide="alert-circle" class="w-4 h-4"></i>
                <span><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <?php $p = $alumniData['penempatan'] ?? []; ?>

        <div class="bg-white rounded-3xl p-8 shadow-xl border border-slate-100">
            <form action="<?= base_url('alumni/status/update') ?>" method="POST" class="space-y-6">
                <?= csrf_field() ?>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Status Kebekerjaan Saat Ini <span class="text-rose-500">*</span></label>
                    <select name="status" id="selectStatus" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-semibold text-slate-900 focus:ring-2 focus:ring-brand-500">
                        <option value="bekerja" <?= ($p['status'] ?? '') == 'bekerja' ? 'selected' : '' ?>>Bekerja (Karyawan / Pegawai)</option>
                        <option value="wirausaha" <?= ($p['status'] ?? '') == 'wirausaha' ? 'selected' : '' ?>>Wirausaha / Pemilik Usaha</option>
                        <option value="belum_bekerja" <?= ($p['status'] ?? '') == 'belum_bekerja' ? 'selected' : '' ?>>Belum Bekerja / Mencari Kerja</option>
                    </select>
                </div>

                <div id="companySection" class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Perusahaan / Usaha <span class="text-rose-500">*</span></label>
                        <input type="text" name="nama_perusahaan" value="<?= esc($p['nama_perusahaan'] ?? '') ?>" placeholder="Contoh: PT. Sukses Mandiri / Warung Berkah" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Jabatan / Posisi Pekerjaan</label>
                        <input type="text" name="jabatan" value="<?= esc($p['jabatan'] ?? '') ?>" placeholder="Contoh: Operator Produksi / Pemilik Usaha" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Alamat Perusahaan / Usaha</label>
                        <input type="text" name="alamat_perusahaan" value="<?= esc($p['alamat_perusahaan'] ?? '') ?>" placeholder="Kota Pasuruan / Surabaya / dsb" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Tanggal Mulai Bekerja / Usaha</label>
                        <input type="date" name="awal_bekerja" value="<?= esc($p['awal_bekerja'] ?? date('Y-m-d')) ?>" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                    <a href="<?= base_url('alumni/dashboard') ?>" class="w-1/2 text-center bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3.5 rounded-xl text-xs transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="w-1/2 bg-brand-600 hover:bg-brand-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-brand-600/30 text-xs transition-all">
                        Simpan Data Penempatan
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>
<?= $this->endSection() ?>
