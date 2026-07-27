<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="py-10 bg-slate-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-black text-slate-900">Kelola Profil Alumni</h1>
                <p class="text-xs text-slate-500 mt-1">Perbarui data pribadi dan informasi akun Anda.</p>
            </div>
            <a href="<?= base_url('alumni/dashboard') ?>" class="text-xs font-bold text-slate-600 hover:text-brand-600">← Kembali ke Dashboard</a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold flex items-center gap-2">
                <i data-lucide="check-circle" class="w-4 h-4"></i>
                <span><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold flex items-center gap-2">
                <i data-lucide="alert-circle" class="w-4 h-4"></i>
                <span><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Profile Data Form -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 space-y-4">
                <h3 class="font-bold text-slate-900 text-base border-b border-slate-100 pb-3">Data Pribadi</h3>
                
                <form action="<?= base_url('alumni/profil/update') ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <?= csrf_field() ?>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="<?= esc($alumniData['profile']['nama_lengkap'] ?? '') ?>" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nomor HP / WA</label>
                        <input type="text" name="hp" value="<?= esc($alumniData['profile']['hp'] ?? '') ?>" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:ring-2 focus:ring-brand-500"><?= esc($alumniData['profile']['alamat'] ?? '') ?></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Foto Profil</label>
                        <input type="file" name="foto" accept="image/*" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-xs font-medium text-slate-900">
                    </div>

                    <button type="submit" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3 rounded-xl shadow-md text-xs">
                        Simpan Perubahan Profil
                    </button>
                </form>
            </div>

            <!-- Password Change Form -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 space-y-4">
                <h3 class="font-bold text-slate-900 text-base border-b border-slate-100 pb-3">Ubah Password</h3>
                
                <form action="<?= base_url('alumni/profil/password') ?>" method="POST" class="space-y-4">
                    <?= csrf_field() ?>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Password Saat Ini</label>
                        <input type="password" name="old_password" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:ring-2 focus:ring-brand-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Password Baru</label>
                        <input type="password" name="new_password" required minlength="6" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:ring-2 focus:ring-brand-500">
                    </div>

                    <button type="submit" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-3 rounded-xl shadow-md text-xs">
                        Ubah Password Akun
                    </button>
                </form>
            </div>

        </div>

    </div>
</section>
<?= $this->endSection() ?>
