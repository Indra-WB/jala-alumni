<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="space-y-8">
    
    <!-- 4 Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 flex items-center justify-between">
            <div>
                <div class="text-xs font-bold text-slate-400 uppercase">Total Alumni</div>
                <div class="text-3xl font-black text-slate-900 mt-1"><?= number_format($stats['total_alumni']) ?></div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-brand-600 flex items-center justify-center">
                <i data-lucide="users" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 flex items-center justify-between">
            <div>
                <div class="text-xs font-bold text-slate-400 uppercase">Sudah Bekerja</div>
                <div class="text-3xl font-black text-slate-900 mt-1"><?= number_format($stats['total_bekerja']) ?></div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <i data-lucide="briefcase" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 flex items-center justify-between">
            <div>
                <div class="text-xs font-bold text-slate-400 uppercase">Berwirausaha</div>
                <div class="text-3xl font-black text-slate-900 mt-1"><?= number_format($stats['total_wirausaha']) ?></div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <i data-lucide="store" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 flex items-center justify-between">
            <div>
                <div class="text-xs font-bold text-slate-400 uppercase">Mitra Industri</div>
                <div class="text-3xl font-black text-slate-900 mt-1"><?= number_format($stats['total_mitra']) ?></div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                <i data-lucide="building-2" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

    <!-- Recent Audit Logs Table -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 space-y-4">
        <div class="flex items-center justify-between">
            <h3 class="font-extrabold text-slate-900 text-lg">Aktivitas Terkini (Audit Log)</h3>
            <a href="<?= base_url('admin/auditlog') ?>" class="text-xs font-bold text-brand-600 hover:underline">Lihat Semua →</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase font-bold border-y border-slate-100">
                    <tr>
                        <th class="py-3 px-4">Waktu</th>
                        <th class="py-3 px-4">User</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4">Aksi</th>
                        <th class="py-3 px-4">IP Address</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php if (!empty($recentLogs)): foreach ($recentLogs as $log): ?>
                        <tr>
                            <td class="py-3 px-4 text-slate-400 font-mono"><?= esc($log['created_at']) ?></td>
                            <td class="py-3 px-4 font-bold text-slate-900"><?= esc($log['username'] ?? 'System') ?></td>
                            <td class="py-3 px-4 uppercase font-semibold text-brand-600"><?= esc($log['role'] ?? '-') ?></td>
                            <td class="py-3 px-4 font-medium"><?= esc($log['action']) ?></td>
                            <td class="py-3 px-4 font-mono text-slate-400"><?= esc($log['ip_address']) ?></td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="5" class="py-4 text-center text-slate-400">Belum ada aktivitas tercatat.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
