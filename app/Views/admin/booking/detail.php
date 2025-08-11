<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="pc-container">
    <div class="pc-content">

        <!-- Breadcrumb -->
        <div class="page-header mb-4">
            <div class="page-block">
                <ul class="breadcrumb">
                    <li class=""><a href="<?= base_url('admin/home') ?>">Home</a></li>
                    <i class="fa fa-angle-right mx-1"></i></li>
                    <li class=""><a href="<?= base_url('admin/booking') ?>">Booking</a></li>
                    <i class="fa fa-angle-right mx-1"></i></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ul>
            </div>
        </div>

        <!-- Card -->
        <div class="flex justify-center px-4">
            <div class="card shadow rounded border w-full max-w-3xl">
                <div class="bg-white px-4 py-3 border-b">
                    <h5 class="mb-0 text-lg font-semibold"><?= $title; ?></h5>
                </div>

                <div class="p-4 overflow-hidden">

                    <!-- Pesan error -->
                    <?php if (session()->getFlashdata('pesan')): ?>
                        <ul class="text-red-600 mb-3 pl-4 list-disc">
                            <li><b><?= esc(session()->getFlashdata('pesan')) ?></b></li>
                        </ul>
                    <?php endif; ?>

                    <!-- DATA DIRI -->
                    <div class="mb-6">
                        <h6 class="uppercase text-gray-500 border-b pb-1 mb-3 text-sm">Data Diri</h6>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse">
                                <tbody>
                                    <tr>
                                        <th class="text-left pr-4 w-40 whitespace-nowrap">Nama Customer</th>
                                        <td class="break-words">: <?= esc($booking['nama_customer']) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left pr-4 w-40 whitespace-nowrap">No HP</th>
                                        <td class="break-words">: <?= esc($booking['no_hp']) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- LAYANAN -->
                    <div class="mb-6">
                        <h6 class="uppercase text-gray-500 border-b pb-1 mb-3 text-sm">Layanan</h6>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse">
                                <tbody>
                                    <tr>
                                        <th class="text-left pr-4 w-40 whitespace-nowrap">Nama Layanan</th>
                                        <td class="break-words">: <?= esc($booking['nama_layanan']) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left pr-4 w-40 whitespace-nowrap">Detail Layanan</th>
                                        <td class="break-words">: <?= esc($booking['detail_layanan']) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left pr-4 w-40 whitespace-nowrap">Harga</th>
                                        <td class="break-words">: Rp <?= number_format($booking['harga'], 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left pr-4 w-40 whitespace-nowrap">Foto Layanan</th>
                                        <td>
                                            <img src="<?= base_url('admin/assets/images/uploads/' . $booking['foto_layanan']) ?>"
                                                alt="Foto Layanan"
                                                class="max-h-[150px] max-w-full rounded border" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- JADWAL & CAPSTER -->
                    <div class="mb-6">
                        <h6 class="uppercase text-gray-500 border-b pb-1 mb-3 text-sm">Jadwal & Capster</h6>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse">
                                <tbody>
                                    <tr>
                                        <th class="text-left pr-4 w-40 whitespace-nowrap">Capster</th>
                                        <td class="break-words">: <?= esc($booking['nama']) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left pr-4 w-40 whitespace-nowrap">Foto Capster</th>
                                        <td>
                                            <img src="<?= base_url('admin/assets/images/uploads/' . $booking['foto_capster']) ?>"
                                                alt="Foto Capster"
                                                class="max-h-[150px] max-w-full rounded border" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-left pr-4 w-40 whitespace-nowrap">Jadwal Booking</th>
                                        <td class="break-words">: <?= date('d M Y', strtotime($booking['tanggal'])) ?> - <?= date('H:i', strtotime($booking['jam'])) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left pr-4 w-40 whitespace-nowrap">Catatan</th>
                                        <td class="break-words">: <?= esc($booking['catatan']) ?: '-' ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- CATATAN -->
                    <div class="mb-6">
                        <h6 class="uppercase text-gray-500 border-b pb-1 mb-3 text-sm">Catatan</h6>
                        <p class="text-gray-600 break-words">
                            <?= esc($booking['catatan']) ?: 'Tidak ada catatan.' ?>
                        </p>
                    </div>

                    <!-- DI BUAT CUSTOMER -->
                    <div class="mb-6">
                        <h6 class="uppercase text-gray-500 border-b pb-1 mb-3 text-sm">Di Buat Customer</h6>
                        <p class="text-gray-600 break-words">
                            <?= esc($booking['dibuat_pada']) ?: 'Tidak ada informasi.' ?>
                        </p>
                    </div>

                    <!-- STATUS -->
                    <div class="mb-6">
                        <h6 class="uppercase text-gray-500 border-b pb-1 mb-3 text-sm">Status Booking</h6>
                        <?php if ($booking['status'] === 'booked'): ?>
                            <span class="inline-block bg-yellow-400 text-yellow-900 px-2 py-1 rounded text-xs font-semibold">Booked</span>
                        <?php elseif ($booking['status'] === 'batal'): ?>
                            <span class="inline-block bg-red-600 text-white px-2 py-1 rounded text-xs font-semibold">Batal</span>
                        <?php elseif ($booking['status'] === 'selesai'): ?>
                            <span class="inline-block bg-green-600 text-white px-2 py-1 rounded text-xs font-semibold">Selesai</span>
                        <?php else: ?>
                            <span class="inline-block bg-gray-400 text-white px-2 py-1 rounded text-xs font-semibold">Status tidak diketahui</span>
                        <?php endif; ?>
                    </div>

                </div>

                <!-- Footer -->
                <div class="bg-gray-100 px-4 py-3 flex justify-between items-center rounded-b">
                    <a href="<?= base_url('admin/booking') ?>"
                        class="text-gray-700 hover:text-gray-900 underline">
                        ⬅ Kembali
                    </a>

                    <a href="<?= base_url('admin/booking/delete/' . $booking['id']) ?>"
                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                        Hapus
                    </a>
                </div>
            </div>
        </div>


    </div>
</div>

<?= $this->endSection() ?>