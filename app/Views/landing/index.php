<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<!-- HERO SECTION -->
<section class="relative pt-12 pb-20 overflow-hidden bg-slate-50 hero-gradient">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Column Text -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Badge Pill -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-700 text-xs font-bold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-brand-600 animate-pulse"></span>
                    JEJARING ALUMNI UPT BLK PASURUAN
                </div>

                <!-- Main Title -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Terhubung, Bertumbuh, <br class="hidden sm:inline"/>dan <span class="text-brand-600">Melangkah Bersama</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-lg text-slate-600 leading-relaxed max-w-2xl">
                    JALA ALUMNI menghubungkan lulusan pelatihan dengan peluang kerja, usaha, dan jejaring industri secara terintegrasi dan berkelanjutan.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="<?= base_url('statistik') ?>" class="inline-flex items-center gap-2.5 bg-brand-600 hover:bg-brand-700 text-white font-bold px-6 py-3.5 rounded-xl shadow-lg shadow-brand-600/30 hover:shadow-brand-600/50 transition-all transform hover:-translate-y-0.5">
                        <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                        <span>Lihat Data Penempatan</span>
                    </a>
                    <a href="<?= base_url('login') ?>" class="inline-flex items-center gap-2.5 bg-white hover:bg-slate-50 text-slate-700 font-bold px-6 py-3.5 rounded-xl border border-slate-200 shadow-sm transition-all transform hover:-translate-y-0.5">
                        <i data-lucide="edit-3" class="w-5 h-5 text-brand-600"></i>
                        <span>Isi Data Kebekerjaan</span>
                    </a>
                </div>
            </div>

            <!-- Right Column Illustration Graphics -->
            <div class="lg:col-span-5 relative flex justify-center">
                <div class="relative w-full max-w-lg aspect-square rounded-3xl bg-gradient-to-tr from-brand-100 via-white to-blue-50 p-6 shadow-2xl border border-brand-100 flex items-center justify-center overflow-hidden">
                    
                    <!-- BLK Pasuruan Isometric Building graphic -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-90">
                        <svg class="w-full h-full text-brand-600/10" viewBox="0 0 500 500" fill="currentColor">
                            <polygon points="250,50 450,150 250,250 50,150" />
                            <polygon points="50,150 250,250 250,450 50,350" />
                            <polygon points="450,150 250,250 250,450 450,350" opacity="0.8" />
                        </svg>
                    </div>

                    <!-- Floating Worker Cards -->
                    <div class="relative z-10 space-y-4 w-full">
                        <!-- Card 1: Teknis/Industri -->
                        <div class="glass-card p-4 rounded-2xl shadow-lg flex items-center gap-4 transform hover:scale-105 transition-transform">
                            <div class="w-12 h-12 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold shrink-0">
                                <i data-lucide="wrench" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <div class="font-bold text-slate-800 text-sm">Teknik & Manufaktur</div>
                                <div class="text-xs text-slate-500">Bekerja di Industri Mitra</div>
                            </div>
                            <span class="ml-auto bg-emerald-100 text-emerald-700 text-xs px-2.5 py-1 rounded-full font-bold">583 Orang</span>
                        </div>

                        <!-- Card 2: BLK Central Building -->
                        <div class="glass-card p-4 rounded-2xl shadow-lg border border-brand-300 flex items-center justify-between bg-brand-600 text-white">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                                    <i data-lucide="building-2" class="w-5 h-5 text-white"></i>
                                </div>
                                <div>
                                    <div class="font-extrabold text-sm">UPT BLK PASURUAN</div>
                                    <div class="text-xs text-brand-100">Pusat Pelatihan & Tracer Study</div>
                                </div>
                            </div>
                            <i data-lucide="check-circle-2" class="w-6 h-6 text-brand-200"></i>
                        </div>

                        <!-- Card 3: Entrepreneur Shop -->
                        <div class="glass-card p-4 rounded-2xl shadow-lg flex items-center gap-4 transform hover:scale-105 transition-transform">
                            <div class="w-12 h-12 rounded-xl bg-amber-500 flex items-center justify-center text-white font-bold shrink-0">
                                <i data-lucide="store" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <div class="font-bold text-slate-800 text-sm">Wirausaha Mandiri</div>
                                <div class="text-xs text-slate-500">Membuka Lapangan Kerja</div>
                            </div>
                            <span class="ml-auto bg-amber-100 text-amber-700 text-xs px-2.5 py-1 rounded-full font-bold">96 Usaha</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- 4 METRICS CARDS SECTION -->
<section class="-mt-8 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1: Alumni Terlatih -->
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-slate-100 flex items-center gap-5 hover:shadow-2xl transition-shadow">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-brand-600 flex items-center justify-center shrink-0">
                    <i data-lucide="users" class="w-7 h-7"></i>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900"><?= number_format($stats['total_alumni']) ?></div>
                    <div class="text-sm font-semibold text-slate-500">Alumni Terlatih</div>
                </div>
            </div>

            <!-- Card 2: Sudah Bekerja -->
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-slate-100 flex items-center gap-5 hover:shadow-2xl transition-shadow">
                <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                    <i data-lucide="briefcase" class="w-7 h-7"></i>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900"><?= number_format($stats['total_bekerja']) ?></div>
                    <div class="text-sm font-semibold text-slate-500">Sudah Bekerja</div>
                </div>
            </div>

            <!-- Card 3: Berwirausaha -->
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-slate-100 flex items-center gap-5 hover:shadow-2xl transition-shadow">
                <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                    <i data-lucide="store" class="w-7 h-7"></i>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900"><?= number_format($stats['total_wirausaha']) ?></div>
                    <div class="text-sm font-semibold text-slate-500">Berwirausaha</div>
                </div>
            </div>

            <!-- Card 4: Mitra Industri -->
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-slate-100 flex items-center gap-5 hover:shadow-2xl transition-shadow">
                <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                    <i data-lucide="building" class="w-7 h-7"></i>
                </div>
                <div>
                    <div class="text-3xl font-black text-slate-900"><?= number_format($stats['total_mitra']) ?></div>
                    <div class="text-sm font-semibold text-slate-500">Mitra Industri</div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- POTRET PENEMPATAN ALUMNI (STATISTICS DASHBOARD) -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Filters -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Potret Penempatan Alumni</h2>
                <p class="text-sm text-slate-500 mt-1">Data statistik tracer study realtime penempatan lulusan pelatihan.</p>
            </div>

            <!-- Filter Controls -->
            <div class="flex flex-wrap items-center gap-3">
                <select class="bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option>Tahun 2026</option>
                    <option>Tahun 2025</option>
                    <option>Tahun 2024</option>
                </select>
                <select class="bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option>APBD & MTU</option>
                    <option>APBD</option>
                    <option>APBN</option>
                </select>
                <select class="bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option>Semua Kejuruan</option>
                    <option>Teknik Manufaktur</option>
                    <option>Teknik Listrik</option>
                    <option>Teknologi Informasi</option>
                </select>
            </div>
        </div>

        <!-- 3 Dashboard Widget Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Card 1: Status Penempatan Donut Chart -->
            <div class="lg:col-span-4 bg-white rounded-3xl p-6 shadow-xl border border-slate-100 flex flex-col justify-between">
                <div>
                    <h3 class="text-base font-bold text-slate-800 mb-4">Status Penempatan</h3>
                    <div id="statusDonutChart" class="flex justify-center my-4"></div>
                </div>
                <div class="border-t border-slate-100 pt-4 flex items-center justify-between text-sm font-bold text-slate-700">
                    <span>Total Alumni Terlatih</span>
                    <span class="text-brand-600 text-lg"><?= number_format($stats['total_alumni']) ?></span>
                </div>
            </div>

            <!-- Card 2: Kejuruan Horizontal Bar Chart -->
            <div class="lg:col-span-4 bg-white rounded-3xl p-6 shadow-xl border border-slate-100">
                <h3 class="text-base font-bold text-slate-800 mb-4">Penempatan Berdasarkan Kejuruan</h3>
                <div id="kejuruanBarChart"></div>
            </div>

            <!-- Card 3: LeafletJS Map & Regional Distribution -->
            <div class="lg:col-span-4 bg-white rounded-3xl p-6 shadow-xl border border-slate-100 flex flex-col">
                <h3 class="text-base font-bold text-slate-800 mb-4">Sebaran Penempatan di Jawa Timur</h3>
                
                <!-- Map Container -->
                <div id="mapEastJava" class="w-full h-48 rounded-2xl mb-4 border border-slate-200 z-10"></div>

                <!-- Locations List -->
                <div class="space-y-2 text-xs font-semibold text-slate-600">
                    <?php foreach ($regionalData as $loc): ?>
                        <div class="flex items-center justify-between py-1 border-b border-slate-100 last:border-0">
                            <span class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-brand-600"></span>
                                <?= esc($loc['kota']) ?>
                            </span>
                            <span class="font-bold text-slate-900"><?= esc($loc['total']) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- TRACK SELECTION SECTION ("Temukan Jejak Alumni") -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-12">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Temukan Jejak Alumni</h2>
            <p class="text-slate-500 text-sm mt-2">Pilih jalur yang ingin Anda lihat lebih lanjut.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Track 1: Bekerja di Industri -->
            <div class="bg-gradient-to-br from-blue-50/50 via-white to-brand-50/30 rounded-3xl p-8 border border-brand-100 shadow-xl flex items-center justify-between group hover:shadow-2xl transition-all">
                <div class="space-y-3">
                    <h3 class="text-2xl font-bold text-slate-900">Bekerja di Industri</h3>
                    <p class="text-slate-600 text-sm max-w-xs leading-relaxed">
                        Jelajahi alumni yang berkarier di berbagai sektor industri dan manufaktur.
                    </p>
                    <div class="pt-2">
                        <span class="text-2xl font-black text-brand-600"><?= number_format($stats['total_bekerja']) ?></span>
                        <span class="text-xs font-bold text-slate-500 ml-1">Alumni</span>
                    </div>
                </div>
                <a href="<?= base_url('direktori?status=bekerja') ?>" class="w-14 h-14 rounded-full bg-brand-600 text-white flex items-center justify-center shadow-lg shadow-brand-600/30 group-hover:scale-110 transition-transform">
                    <i data-lucide="arrow-right" class="w-6 h-6"></i>
                </a>
            </div>

            <!-- Track 2: Membangun Usaha -->
            <div class="bg-gradient-to-br from-emerald-50/50 via-white to-teal-50/30 rounded-3xl p-8 border border-emerald-100 shadow-xl flex items-center justify-between group hover:shadow-2xl transition-all">
                <div class="space-y-3">
                    <h3 class="text-2xl font-bold text-slate-900">Membangun Usaha</h3>
                    <p class="text-slate-600 text-sm max-w-xs leading-relaxed">
                        Temukan alumni yang membangun dan mengembangkan usaha mandiri.
                    </p>
                    <div class="pt-2">
                        <span class="text-2xl font-black text-emerald-600"><?= number_format($stats['total_wirausaha']) ?></span>
                        <span class="text-xs font-bold text-slate-500 ml-1">Alumni</span>
                    </div>
                </div>
                <a href="<?= base_url('direktori?status=wirausaha') ?>" class="w-14 h-14 rounded-full bg-emerald-600 text-white flex items-center justify-center shadow-lg shadow-emerald-600/30 group-hover:scale-110 transition-transform">
                    <i data-lucide="arrow-right" class="w-6 h-6"></i>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ALUMNI DIRECTORY PREVIEW -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Search Bar -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-12">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Jelajahi Direktori Alumni</h2>
                <p class="text-slate-500 text-sm mt-1">Cari dan temukan alumni berdasarkan data terbaru.</p>
            </div>

            <!-- Search Form -->
            <form action="<?= base_url('direktori') ?>" method="GET" class="flex flex-wrap items-center gap-3">
                <select name="status" class="bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="">Status</option>
                    <option value="bekerja">Karyawan</option>
                    <option value="wirausaha">Wirausaha</option>
                </select>
                <select name="kejuruan" class="bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="">Kejuruan</option>
                    <option value="listrik">Teknik Listrik</option>
                    <option value="otomotif">Teknik Otomotif</option>
                    <option value="roti">Pembuatan Roti & Kue</option>
                </select>
                <div class="relative min-w-[280px]">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                    <input type="text" name="q" placeholder="Cari nama, kejuruan, perusahaan..." class="w-full bg-white border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm font-medium text-slate-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
            </form>
        </div>

        <!-- Directory Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <?php foreach ($alumniPreview as $alumni): ?>
                <?php 
                    $isWirausaha = strtolower($alumni['status'] ?? '') == 'wirausaha';
                    $badgeClass = $isWirausaha ? 'bg-amber-50 text-amber-700 border-amber-200' : 'bg-blue-50 text-blue-700 border-blue-200';
                    $badgeIcon = $isWirausaha ? 'store' : 'briefcase';
                    $statusLabel = $isWirausaha ? 'Wirausaha' : 'Karyawan';
                ?>
                <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 hover:shadow-xl transition-all flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full bg-slate-200 overflow-hidden shrink-0 border-2 border-white shadow">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" alt="<?= esc($alumni['nama']) ?>" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 text-base leading-snug"><?= esc($alumni['nama']) ?></h3>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md text-xs font-semibold border <?= $badgeClass ?> mt-1">
                                    <i data-lucide="<?= $badgeIcon ?>" class="w-3 h-3"></i>
                                    <?= $statusLabel ?>
                                </span>
                            </div>
                        </div>

                        <div class="space-y-2 text-xs font-medium text-slate-600 border-t border-slate-100 pt-4">
                            <div class="flex items-center gap-2">
                                <i data-lucide="building-2" class="w-4 h-4 text-slate-400"></i>
                                <span class="truncate font-semibold text-slate-800"><?= esc($alumni['nama_perusahaan'] ?? '-') ?></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="award" class="w-4 h-4 text-slate-400"></i>
                                <span class="truncate"><?= esc($alumni['kejuruan'] ?? 'Pelatihan BLK') ?></span>
                            </div>
                            <div class="flex items-center gap-2 text-slate-400">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                <span>Pelatihan <?= esc($alumni['tahun'] ?? '2023') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Center CTA Button -->
        <div class="text-center">
            <a href="<?= base_url('direktori') ?>" class="inline-flex items-center gap-2 bg-white hover:bg-slate-100 text-brand-600 font-bold px-8 py-3.5 rounded-xl border border-brand-200 shadow-sm transition-all">
                <span>Lihat Direktori Lengkap</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</section>

<!-- MITRA INDUSTRI SECTION -->
<section class="py-16 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl font-bold text-slate-900 tracking-tight mb-8">Mitra yang Bertumbuh Bersama Kami</h2>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 items-center">
            <?php foreach ($mitraList as $mitra): ?>
                <div class="p-4 rounded-xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:shadow-md transition-all flex items-center justify-center h-20 text-slate-700 font-extrabold text-xs tracking-wider">
                    <span><?= esc($mitra['nama_mitra']) ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-8">
            <a href="<?= base_url('mitra') ?>" class="inline-flex items-center gap-2 text-sm font-bold text-brand-600 hover:text-brand-700">
                <span>Lihat semua mitra industri</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
</section>

<!-- CERITA ALUMNI (TESTIMONIAL) -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-12">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Cerita Mereka, Inspirasi Kita</h2>
        </div>

        <?php if (!empty($ceritaList)): $c = $ceritaList[0]; ?>
        <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-slate-100 relative overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                <!-- Avatar photo -->
                <div class="md:col-span-4 flex justify-center">
                    <div class="w-40 h-40 sm:w-48 sm:h-48 rounded-full overflow-hidden border-4 border-brand-100 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80" alt="<?= esc($c['nama_alumni']) ?>" class="w-full h-full object-cover">
                    </div>
                </div>
                <!-- Quote Content -->
                <div class="md:col-span-8 space-y-4">
                    <i data-lucide="quote" class="w-12 h-12 text-brand-200"></i>
                    <p class="text-lg sm:text-xl font-medium text-slate-800 italic leading-relaxed">
                        "<?= esc($c['isi_cerita']) ?>"
                    </p>
                    <div>
                        <h4 class="font-bold text-slate-900 text-lg"><?= esc($c['nama_alumni']) ?></h4>
                        <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mt-1">
                            <span class="bg-blue-50 text-blue-700 px-2.5 py-0.5 rounded-md font-bold"><?= esc($c['pekerjaan_saat_ini']) ?></span>
                            <span>• <?= esc($c['nama_perusahaan']) ?></span>
                            <span>• <?= esc($c['kejuruan']) ?></span>
                            <span>• Pelatihan <?= esc($c['tahun_pelatihan']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- BLUE GRADIENT CTA BANNER -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-brand-700 via-brand-600 to-blue-600 rounded-3xl p-8 sm:p-12 shadow-2xl text-white relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="space-y-3 max-w-xl z-10">
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight">Sudah Bekerja atau Memulai Usaha?</h2>
                <p class="text-brand-100 text-sm sm:text-base leading-relaxed">
                    Bantu kami memperbarui data penempatan dan membuka lebih banyak peluang bagi alumni lainnya.
                </p>
                <div class="flex flex-wrap items-center gap-4 text-xs font-semibold text-brand-100 pt-2">
                    <span class="flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-300"></i> Proses singkat</span>
                    <span class="flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-300"></i> Data terlindungi</span>
                    <span class="flex items-center gap-1.5"><i data-lucide="clock" class="w-4 h-4 text-emerald-300"></i> ±3 menit</span>
                </div>
            </div>
            <div class="z-10 shrink-0">
                <a href="<?= base_url('login') ?>" class="inline-flex items-center gap-2 bg-white text-brand-700 hover:bg-slate-50 font-extrabold px-8 py-4 rounded-xl shadow-xl transition-transform hover:scale-105">
                    <span>Perbarui Data Saya</span>
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- APEXCHARTS & LEAFLET MAP INITIALIZATION SCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // 1. Status Penempatan Donut Chart
        var statusOptions = {
            series: [<?= $stats['persen_bekerja'] ?>, <?= $stats['persen_wirausaha'] ?>, <?= $stats['persen_belum'] ?>],
            chart: {
                type: 'donut',
                height: 260
            },
            labels: ['Bekerja', 'Wirausaha', 'Belum Bekerja'],
            colors: ['#2563eb', '#22c55e', '#f59e0b'],
            legend: {
                position: 'bottom',
                fontSize: '12px'
            },
            dataLabels: {
                enabled: true,
                formatter: function (val) {
                    return val.toFixed(1) + "%";
                }
            }
        };
        var statusChart = new ApexCharts(document.querySelector("#statusDonutChart"), statusOptions);
        statusChart.render();

        // 2. Kejuruan Horizontal Bar Chart
        var kejuruanOptions = {
            series: [{
                name: 'Penempatan',
                data: [<?= implode(',', array_column($kejuruanStats, 'total')) ?>]
            }],
            chart: {
                type: 'bar',
                height: 260,
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    borderRadius: 6,
                    barHeight: '50%'
                }
            },
            colors: ['#2563eb'],
            xaxis: {
                categories: [<?= "'" . implode("','", array_column($kejuruanStats, 'nama_kejuruan')) . "'" ?>],
                labels: { show: false }
            },
            dataLabels: {
                enabled: true,
                formatter: function (val) { return val + "%"; }
            }
        };
        var kejuruanChart = new ApexCharts(document.querySelector("#kejuruanBarChart"), kejuruanOptions);
        kejuruanChart.render();

        // 3. LeafletJS East Java Map
        var map = L.map('mapEastJava').setView([-7.6469, 112.9065], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var locations = <?= json_encode($regionalData) ?>;
        locations.forEach(function(loc) {
            if (loc.lat && loc.lng) {
                L.marker([loc.lat, loc.lng])
                    .addTo(map)
                    .bindPopup("<b>" + loc.kota + "</b><br>" + loc.total + " Alumni");
            }
        });

    });
</script>
<?= $this->endSection() ?>
