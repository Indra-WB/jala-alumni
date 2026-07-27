<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-brand-700 to-blue-600 rounded-3xl p-8 sm:p-10 text-white shadow-xl">
            <span class="text-xs font-bold uppercase tracking-wider text-brand-200">Tracer Study & Analytics</span>
            <h1 class="text-3xl sm:text-4xl font-black tracking-tight mt-1">Data Penempatan Alumni</h1>
            <p class="text-brand-100 text-sm mt-2 max-w-2xl leading-relaxed">
                Visualisasi komprehensif penempatan kerja dan tingkat serapan lulusan UPT BLK Pasuruan di dunia industri dan wirausaha.
            </p>
        </div>

        <!-- 4 Metric Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-5">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-brand-600 flex items-center justify-center shrink-0">
                    <i data-lucide="users" class="w-7 h-7"></i>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900"><?= number_format($stats['total_alumni']) ?></div>
                    <div class="text-sm font-semibold text-slate-500">Total Alumni</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-5">
                <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                    <i data-lucide="briefcase" class="w-7 h-7"></i>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900"><?= number_format($stats['total_bekerja']) ?></div>
                    <div class="text-sm font-semibold text-slate-500">Bekerja (<?= $stats['persen_bekerja'] ?>%)</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-5">
                <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                    <i data-lucide="store" class="w-7 h-7"></i>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900"><?= number_format($stats['total_wirausaha']) ?></div>
                    <div class="text-sm font-semibold text-slate-500">Wirausaha (<?= $stats['persen_wirausaha'] ?>%)</div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-5">
                <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                    <i data-lucide="building" class="w-7 h-7"></i>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900"><?= number_format($stats['total_mitra']) ?></div>
                    <div class="text-sm font-semibold text-slate-500">Mitra Industri</div>
                </div>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Donut Chart -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <h3 class="text-lg font-bold text-slate-800 mb-6">Persentase Kebekerjaan Alumni</h3>
                <div id="statPageDonutChart"></div>
            </div>

            <!-- Bar Chart -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <h3 class="text-lg font-bold text-slate-800 mb-6">Penempatan Per Kejuruan</h3>
                <div id="statPageBarChart"></div>
            </div>
        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var donutOpts = {
            series: [<?= $stats['persen_bekerja'] ?>, <?= $stats['persen_wirausaha'] ?>, <?= $stats['persen_belum'] ?>],
            chart: { type: 'donut', height: 320 },
            labels: ['Bekerja', 'Wirausaha', 'Belum Bekerja'],
            colors: ['#2563eb', '#22c55e', '#f59e0b'],
            legend: { position: 'bottom' }
        };
        new ApexCharts(document.querySelector("#statPageDonutChart"), donutOpts).render();

        var barOpts = {
            series: [{ name: 'Penempatan', data: [<?= implode(',', array_column($kejuruanStats, 'total')) ?>] }],
            chart: { type: 'bar', height: 320, toolbar: { show: false } },
            plotOptions: { bar: { horizontal: true, borderRadius: 6 } },
            colors: ['#2563eb'],
            xaxis: { categories: [<?= "'" . implode("','", array_column($kejuruanStats, 'nama_kejuruan')) . "'" ?>] }
        };
        new ApexCharts(document.querySelector("#statPageBarChart"), barOpts).render();
    });
</script>
<?= $this->endSection() ?>
