<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="py-16 bg-slate-50 min-h-[75vh] flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4">
        
        <div class="bg-white rounded-3xl p-8 shadow-xl border border-slate-100 space-y-6">
            
            <div class="text-center space-y-2">
                <div class="w-12 h-12 rounded-2xl bg-brand-600 text-white flex items-center justify-center mx-auto font-bold shadow-lg shadow-brand-600/30">
                    <i data-lucide="lock" class="w-6 h-6"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-slate-900">Masuk Akun JALA</h2>
                <p class="text-xs text-slate-500">Masukan NIK atau Email terdaftar untuk mengelola profil dan status alumni.</p>
            </div>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold flex items-center gap-2">
                    <i data-lucide="alert-circle" class="w-4 h-4 shrink-0"></i>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">NIK / Email</label>
                    <div class="relative">
                        <i data-lucide="user" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                        <input type="text" name="nik_or_email" required value="<?= old('nik_or_email') ?>" placeholder="Masukkan 16 digit NIK / Email" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Password</label>
                    <div class="relative">
                        <i data-lucide="key" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                        <input type="password" name="password" required placeholder="Masukkan password" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <button type="submit" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-brand-600/30 transition-all flex items-center justify-center gap-2">
                    <span>Login</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </button>
            </form>

            <div class="border-t border-slate-100 pt-4 text-center text-xs text-slate-500">
                Belum punya akun terdaftar? 
                <a href="<?= base_url('register') ?>" class="text-brand-600 font-bold hover:underline">Registrasi Akun Alumni dengan NIK</a>
            </div>

            <!-- Demo Credentials Hint Box -->
            <div class="bg-blue-50/70 border border-blue-200 rounded-xl p-3 text-[11px] text-blue-900 space-y-1">
                <div class="font-bold flex items-center gap-1"><i data-lucide="info" class="w-3.5 h-3.5"></i> Kredensial Demo Pengelola:</div>
                <div>Super Admin: NIK <code>1234567890123456</code> / Pass: <code>admin123</code></div>
                <div>Admin BLK: NIK <code>6543210987654321</code> / Pass: <code>admin123</code></div>
            </div>

        </div>

    </div>
</section>
<?= $this->endSection() ?>
