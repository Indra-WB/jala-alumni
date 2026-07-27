<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="py-16 bg-slate-50 min-h-[75vh] flex items-center justify-center">
    <div class="max-w-lg w-full mx-auto px-4">
        
        <div class="bg-white rounded-3xl p-8 shadow-xl border border-slate-100 space-y-6">
            
            <div class="text-center space-y-2">
                <div class="w-12 h-12 rounded-2xl bg-brand-600 text-white flex items-center justify-center mx-auto font-bold shadow-lg shadow-brand-600/30">
                    <i data-lucide="user-plus" class="w-6 h-6"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-slate-900">Registrasi Akun Alumni</h2>
                <p class="text-xs text-slate-500">Verifikasi NIK KTP Anda yang terdaftar pada sistem pelatihan UPT BLK Pasuruan.</p>
            </div>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold flex items-center gap-2">
                    <i data-lucide="alert-circle" class="w-4 h-4 shrink-0"></i>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>

            <!-- STEP 1: NIK VERIFICATION FORM -->
            <div id="nikVerifySection" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nomor Induk Kependudukan (NIK)</label>
                    <div class="relative">
                        <i data-lucide="credit-card" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                        <input type="text" id="inputNik" maxlength="16" placeholder="Masukkan 16 digit NIK KTP" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    </div>
                </div>

                <div id="verifyAlert" class="hidden p-3 rounded-xl text-xs font-semibold"></div>

                <button type="button" id="btnVerifyNik" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-brand-600/30 transition-all flex items-center justify-center gap-2">
                    <i data-lucide="search" class="w-4 h-4"></i>
                    <span>Cek Data NIK Alumni</span>
                </button>
            </div>

            <!-- STEP 2: PASSWORD CREATION FORM (HIDDEN UNTIL VERIFIED) -->
            <form id="registerForm" action="<?= base_url('register/process') ?>" method="POST" class="hidden space-y-4 pt-4 border-t border-slate-100">
                <?= csrf_field() ?>
                <input type="hidden" name="nik" id="hiddenNik">

                <!-- Verified Data Display -->
                <div class="bg-brand-50/70 border border-brand-200 rounded-2xl p-4 space-y-2 text-xs">
                    <div class="flex items-center gap-2 text-brand-800 font-extrabold text-sm">
                        <i data-lucide="check-circle" class="w-4 h-4 text-brand-600"></i>
                        <span>Data Alumni Ditemukan!</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-slate-700 pt-1">
                        <div>Nama: <strong id="dispNama" class="text-slate-900"></strong></div>
                        <div>Kejuruan: <strong id="dispJurusan" class="text-slate-900"></strong></div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Email Aktif</label>
                    <input type="email" name="email" id="inputEmail" placeholder="nama@email.com" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Buat Password Akun</label>
                    <input type="password" name="password" required minlength="6" placeholder="Minimal 6 karakter" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-emerald-600/30 transition-all flex items-center justify-center gap-2">
                    <i data-lucide="user-check" class="w-4 h-4"></i>
                    <span>Selesaikan Registrasi</span>
                </button>
            </form>

            <div class="border-t border-slate-100 pt-4 text-center text-xs text-slate-500">
                Sudah memiliki akun? 
                <a href="<?= base_url('login') ?>" class="text-brand-600 font-bold hover:underline">Masuk disini</a>
            </div>

        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnVerify = document.getElementById("btnVerifyNik");
        const inputNik = document.getElementById("inputNik");
        const alertBox = document.getElementById("verifyAlert");
        const registerForm = document.getElementById("registerForm");
        const hiddenNik = document.getElementById("hiddenNik");
        const dispNama = document.getElementById("dispNama");
        const dispJurusan = document.getElementById("dispJurusan");
        const inputEmail = document.getElementById("inputEmail");

        btnVerify.addEventListener("click", function() {
            const nikVal = inputNik.value.trim();
            if (nikVal.length < 10) {
                showAlert("Masukkan NIK KTP yang valid.", "bg-rose-50 text-rose-700 border border-rose-200");
                return;
            }

            btnVerify.disabled = true;
            btnVerify.innerHTML = `<span>Memeriksa NIK...</span>`;

            fetch("<?= base_url('register/check-nik') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: "nik=" + encodeURIComponent(nikVal) + "&<?= csrf_token() ?>=<?= csrf_hash() ?>"
            })
            .then(res => res.json())
            .then(res => {
                btnVerify.disabled = false;
                btnVerify.innerHTML = `<i data-lucide="search" class="w-4 h-4"></i><span>Cek Data NIK Alumni</span>`;
                lucide.createIcons();

                if (res.status) {
                    alertBox.classList.add("hidden");
                    hiddenNik.value = res.data.nik;
                    dispNama.innerText = res.data.nama || 'Alumni BLK';
                    dispJurusan.innerText = res.data.jurusan || 'Pelatihan BLK';
                    if (res.data.email) inputEmail.value = res.data.email;

                    registerForm.classList.remove("hidden");
                } else {
                    showAlert(res.message, "bg-rose-50 text-rose-700 border border-rose-200");
                    registerForm.classList.add("hidden");
                }
            })
            .catch(err => {
                btnVerify.disabled = false;
                btnVerify.innerHTML = `<span>Cek Data NIK Alumni</span>`;
                showAlert("Terjadi kesalahan koneksi.", "bg-rose-50 text-rose-700 border border-rose-200");
            });
        });

        function showAlert(msg, classes) {
            alertBox.className = "p-3 rounded-xl text-xs font-semibold " + classes;
            alertBox.innerText = msg;
            alertBox.classList.remove("hidden");
        }
    });
</script>
<?= $this->endSection() ?>
