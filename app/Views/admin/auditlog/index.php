<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    
    <div class="bg-white p-6 rounded-3xl border border-slate-200">
        <h3 class="text-xl font-extrabold text-slate-900">Audit Log System</h3>
        <p class="text-xs text-slate-500">Catatan riwayat aktivitas pengguna, perubahan data, IP Address, dan browser agent.</p>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase font-bold border-y border-slate-100">
                    <tr>
                        <th class="py-3 px-4">Waktu</th>
                        <th class="py-3 px-4">Pengguna</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4">Aksi / Event</th>
                        <th class="py-3 px-4">URL</th>
                        <th class="py-3 px-4">IP Address</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <?php if (!empty($logs)): foreach ($logs as $log): ?>
                        <tr>
                            <td class="py-3 px-4 font-mono text-slate-400"><?= esc($log['created_at']) ?></td>
                            <td class="py-3 px-4 font-bold text-slate-900"><?= esc($log['username'] ?? 'System') ?></td>
                            <td class="py-3 px-4 uppercase font-semibold text-brand-600"><?= esc($log['role'] ?? '-') ?></td>
                            <td class="py-3 px-4 font-medium text-slate-800"><?= esc($log['action']) ?></td>
                            <td class="py-3 px-4 font-mono text-slate-500 max-w-[200px] truncate"><?= esc($log['url']) ?></td>
                            <td class="py-3 px-4 font-mono text-slate-400"><?= esc($log['ip_address']) ?></td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="6" class="py-8 text-center text-slate-400">Belum ada catatan log.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
