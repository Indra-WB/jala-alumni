<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200">
        <div>
            <h3 class="text-xl font-extrabold text-slate-900">Manajemen User & Hak Akses</h3>
            <p class="text-xs text-slate-500">Kelola akun administrator, super admin, dan alumni dalam sistem JALA Alumni.</p>
        </div>

        <button onclick="openUserModal()" class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-4 py-2.5 rounded-xl text-xs flex items-center gap-2">
            <i data-lucide="user-plus" class="w-4 h-4"></i>
            <span>Tambah Pengelola Baru</span>
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
                        <th class="py-3 px-4">NIK</th>
                        <th class="py-3 px-4">Nama Lengkap</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php if (!empty($users)): foreach ($users as $u): ?>
                        <tr>
                            <td class="py-3 px-4 font-mono font-bold text-slate-900"><?= esc($u['nik']) ?></td>
                            <td class="py-3 px-4 font-bold text-slate-800"><?= esc($u['nama_lengkap'] ?? '-') ?></td>
                            <td class="py-3 px-4 text-slate-600"><?= esc($u['email'] ?? '-') ?></td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase <?= $u['role'] == 'superadmin' ? 'bg-purple-100 text-purple-800' : ($u['role'] == 'admin' ? 'bg-blue-100 text-blue-800' : 'bg-slate-100 text-slate-700') ?>">
                                    <?= esc($u['role']) ?>
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase <?= $u['status'] == 'aktif' ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' ?>">
                                    <?= esc($u['status']) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="5" class="py-8 text-center text-slate-400">Belum ada akun pengelola.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal Create User -->
<div id="userModal" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl p-6 max-w-md w-full shadow-2xl space-y-4">
        <h3 class="font-extrabold text-slate-900 text-base">Form Tambah Admin / Pengelola</h3>
        
        <form action="<?= base_url('superadmin/users/create') ?>" method="POST" class="space-y-3 text-xs">
            <?= csrf_field() ?>

            <div>
                <label class="block font-bold text-slate-700 mb-1">NIK (16 Digit)</label>
                <input type="text" name="nik" required maxlength="16" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-medium text-slate-900">
            </div>

            <div>
                <label class="block font-bold text-slate-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-medium text-slate-900">
            </div>

            <div>
                <label class="block font-bold text-slate-700 mb-1">Email</label>
                <input type="email" name="email" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-medium text-slate-900">
            </div>

            <div>
                <label class="block font-bold text-slate-700 mb-1">Role Akses</label>
                <select name="role" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-medium text-slate-900">
                    <option value="admin">Admin BLK</option>
                    <option value="superadmin">Super Admin</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-slate-700 mb-1">Password Initial</label>
                <input type="password" name="password" required minlength="6" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-medium text-slate-900">
            </div>

            <div class="flex items-center gap-3 pt-3">
                <button type="button" onclick="closeUserModal()" class="w-1/2 bg-slate-100 text-slate-700 font-bold py-2.5 rounded-xl">Batal</button>
                <button type="submit" class="w-1/2 bg-purple-600 text-white font-bold py-2.5 rounded-xl">Buat Akun</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openUserModal() {
        document.getElementById('userModal').classList.remove('hidden');
    }
    function closeUserModal() {
        document.getElementById('userModal').classList.add('hidden');
    }
</script>
<?= $this->endSection() ?>
