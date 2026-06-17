<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Peserta Didik DAPODIK - SDN Pengasinan VII</title>
    <!-- Tailwind CSS v4 via CDN (Tanpa Build Step) -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* Custom scrollbar biar senada dengan tema dark mode */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #020617;
        }

        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950 min-h-screen font-sans antialiased text-slate-200 py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-5xl mx-auto space-y-10">

        <!-- HEADER UTAMA -->
        <header class="text-center space-y-3 relative py-6 overflow-hidden">
            <div class="absolute -top-12 left-1/2 -translate-x-1/2 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <p class="text-xs font-bold uppercase tracking-widest text-blue-400">Formulir Isian Aplikasi Data Pokok Pendidikan (DAPODIK) Kemendikdasmen</p>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-white uppercase bg-clip-text text-transparent bg-gradient-to-r from-white via-slate-200 to-blue-400">
                Formulir Peserta Didik
            </h1>
            <div class="inline-block px-4 py-1 rounded-md bg-slate-900 border border-slate-800 font-mono text-sm text-slate-400">
                KODE FORM: <span class="text-amber-400 font-bold">F-PD</span>
            </div>
        </header>

        <!-- FORM UTAMA -->
        <form class="space-y-8" onsubmit="alert('Formulir berhasil disubmit! (Simulasi)'); return false;">

            <!-- INFORMASI UMUM & TANGGAL -->
            <div class="bg-slate-900/40 backdrop-blur-md border border-slate-800/80 p-6 rounded-2xl shadow-xl flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm text-slate-400 max-w-md text-center md:text-left">
                    <span class="text-amber-400 font-semibold">Catatan:</span> Mohon isi formulir ini dengan lengkap dan benar, serta melampirkan fotokopi Akta Kelahiran dan Kartu Keluarga.
                </div>
                <div class="w-full md:w-auto">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Tanggal Pengisian</label>
                    <input type="date" value="2026-06-17" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all font-mono">
                </div>
            </div>

            <!-- SECTION 1: DATA PRIBADI -->
            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-900/40 to-transparent px-6 py-4 border-b border-slate-800">
                    <h2 class="text-lg font-bold text-white tracking-wide uppercase flex items-center gap-3">
                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-blue-500/20 text-blue-400 text-xs">01</span>
                        Data Pribadi
                    </h2>
                </div>
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div class="lg:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">1. Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan nama lengkap sesuai akta / kartu keluarga" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">2. Jenis Kelamin</label>
                        <div class="grid grid-cols-2 gap-3 mt-1">
                            <label class="flex items-center justify-center px-4 py-2.5 bg-slate-950/40 border border-slate-800 rounded-xl cursor-pointer hover:bg-slate-800/40 transition-all group">
                                <input type="radio" name="gender" class="accent-blue-500 mr-2">
                                <span class="text-sm text-slate-300">Laki-laki</span>
                            </label>
                            <label class="flex items-center justify-center px-4 py-2.5 bg-slate-950/40 border border-slate-800 rounded-xl cursor-pointer hover:bg-slate-800/40 transition-all group">
                                <input type="radio" name="gender" class="accent-blue-500 mr-2">
                                <span class="text-sm text-slate-300">Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">3. NISN <span class="text-slate-500 text-[10px]">(Jika memiliki)</span></label>
                        <input type="text" maxlength="10" placeholder="10 Digit NISN" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 font-mono placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">4. Kewarganegaraan</label>
                        <select class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                            <option>Indonesia (WNI)</option>
                            <option>Asing (WNA)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Nama Negara <span class="text-slate-500 text-[10px]">(Untuk WNA)</span></label>
                        <input type="text" placeholder="Isi jika WNA" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">5. NIK / No. KITAS <span class="text-slate-500 text-[10px]">(WNA)</span></label>
                        <input type="text" placeholder="16 Digit NIK" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 font-mono placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">6. Nomor KK</label>
                        <input type="text" placeholder="16 Digit No. Kartu Keluarga" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 font-mono placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">7. Tempat Lahir</label>
                        <input type="text" placeholder="Kota/Kabupaten Lahir" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">8. Tanggal Lahir</label>
                        <input type="date" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 font-mono focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">9. No. Registrasi Akta Lahir</label>
                        <input type="text" placeholder="Contoh: 12345/JU/2015 atau No. Reg Umum" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">11. Agama & Kepercayaan</label>
                        <select class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                            <option>Islam</option>
                            <option>Kristen / Protestan</option>
                            <option>Katholik</option>
                            <option>Hindu</option>
                            <option>Budha</option>
                            <option>Khong Hu Chu</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">10. Berkebutuhan Khusus</label>
                        <select class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                            <option>Tidak</option>
                            <option>Netra (A)</option>
                            <option>Rungu (B)</option>
                            <option>Grahita ringan (C)</option>
                            <option>Grahita Sedang (C1)</option>
                            <option>Daksa Ringan (D)</option>
                            <option>Daksa Sedang (D1)</option>
                            <option>Laras (E)</option>
                            <option>Wicara (F)</option>
                            <option>Tuna ganda (G)</option>
                            <option>Hiper aktif (H)</option>
                            <option>Cerdas Istimewa (i)</option>
                            <option>Bakat Istimewa (J)</option>
                            <option>Kesulitan Belajar (K)</option>
                            <option>Narkoba (N)</option>
                            <option>Indigo (O)</option>
                            <option>Down Sindrome (P)</option>
                            <option>Autis (Q)</option>
                        </select>
                    </div>

                </div>
            </section>

            <!-- SECTION 2: DATA ALAMAT & TEMPAT TINGGAL -->
            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-900/40 to-transparent px-6 py-4 border-b border-slate-800">
                    <h2 class="text-lg font-bold text-white tracking-wide uppercase flex items-center gap-3">
                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-blue-500/20 text-blue-400 text-xs">02</span>
                        Alamat & Domisili
                    </h2>
                </div>
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="md:col-span-3">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">12. Alamat Jalan</label>
                        <input type="text" placeholder="Nama Jalan, Gang, atau Blok Rumah" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">13. RT</label>
                        <input type="text" placeholder="000" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 font-mono placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">14. RW</label>
                        <input type="text" placeholder="000" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 font-mono placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">15. Nama Dusun</label>
                        <input type="text" placeholder="Nama Dusun/Kampung" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">17. Nama Kelurahan/Desa</label>
                        <input type="text" placeholder="Kelurahan / Desa" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">16. Kecamatan</label>
                        <input type="text" placeholder="Kecamatan" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">18. Kode Pos</label>
                        <input type="text" maxlength="5" placeholder="5 Digit Kode Pos" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 font-mono placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">19. Tempat Tinggal</label>
                        <select class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                            <option>Bersama orang tua</option>
                            <option>Wali</option>
                            <option>Kos</option>
                            <option>Asrama</option>
                            <option>Panti Asuhan</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">20. Moda Transportasi</label>
                        <select class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                            <option>Jalan kaki</option>
                            <option>Angkutan Umum/Bus/Pete-pete</option>
                            <option>Mobil/Bus antar jemput</option>
                            <option>Kereta Api</option>
                            <option>Ojek</option>
                            <option>Andong/Bendi/Sado/Dokar/Delman/Beca</option>
                            <option>Perahu penyebrangan/Rakit/Getek</option>
                            <option>Kuda</option>
                            <option>Sepeda</option>
                            <option>Sepeda Motor</option>
                            <option>Mobil Pribadi</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">21. Anak Ke-berapa (Sesuai KK)</label>
                        <input type="number" min="1" placeholder="1" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                </div>
            </section>

            <!-- SECTION 3: KESEJAHTERAAN / JAMINAN SOSIAL -->
            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-900/40 to-transparent px-6 py-4 border-b border-slate-800">
                    <h2 class="text-lg font-bold text-white tracking-wide uppercase flex items-center gap-3">
                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-blue-500/20 text-blue-400 text-xs">03</span>
                        Kesejahteraan & Program Bantuan
                    </h2>
                </div>
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">22. Penerima KPS / PKH?</label>
                        <div class="grid grid-cols-2 gap-3 mt-1">
                            <label class="flex items-center justify-center px-4 py-2 bg-slate-950/40 border border-slate-800 rounded-xl cursor-pointer hover:bg-slate-800/40 transition-all"><input type="radio" name="kps" class="accent-blue-500 mr-2"> <span class="text-sm">Ya</span></label>
                            <label class="flex items-center justify-center px-4 py-2 bg-slate-950/40 border border-slate-800 rounded-xl cursor-pointer hover:bg-slate-800/40 transition-all"><input type="radio" name="kps" class="accent-blue-500 mr-2"> <span class="text-sm">Tidak</span></label>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">23. No. KPS / PKH <span class="text-slate-500 text-[10px]">(Apabila menerima)</span></label>
                        <input type="text" placeholder="Masukkan nomor kartu KPS/PKH" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">24. Apakah Punya KIP?</label>
                        <div class="grid grid-cols-2 gap-3 mt-1">
                            <label class="flex items-center justify-center px-4 py-2 bg-slate-950/40 border border-slate-800 rounded-xl cursor-pointer hover:bg-slate-800/40 transition-all"><input type="radio" name="kip" class="accent-blue-500 mr-2"> <span class="text-sm">Ya</span></label>
                            <label class="flex items-center justify-center px-4 py-2 bg-slate-950/40 border border-slate-800 rounded-xl cursor-pointer hover:bg-slate-800/40 transition-all"><input type="radio" name="kip" class="accent-blue-500 mr-2"> <span class="text-sm">Tidak</span></label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">25. Nomor KIP</label>
                        <input type="text" placeholder="6 digit nomor KIP" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">28. Nama Tertera di KIP</label>
                        <input type="text" placeholder="Nama sesuai di kartu KIP" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">26. Apakah Layak Dapat PIP?</label>
                        <div class="grid grid-cols-2 gap-3 mt-1">
                            <label class="flex items-center justify-center px-4 py-2 bg-slate-950/40 border border-slate-800 rounded-xl cursor-pointer hover:bg-slate-800/40 transition-all"><input type="radio" name="layak_pip" class="accent-blue-500 mr-2"> <span class="text-sm">Ya</span></label>
                            <label class="flex items-center justify-center px-4 py-2 bg-slate-950/40 border border-slate-800 rounded-xl cursor-pointer hover:bg-slate-800/40 transition-all"><input type="radio" name="layak_pip" class="accent-blue-500 mr-2"> <span class="text-sm">Tidak</span></label>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">27. Alasan Layak PIP</label>
                        <select class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                            <option>Bukan Penerima / Tidak Ada</option>
                            <option>Pemegang PKH/KPS/KIP</option>
                            <option>Penerima BSM</option>
                            <option>Yatim Piatu/Panti Asuhan/Panti Sosial</option>
                            <option>Dampak Bencana Alam</option>
                            <option>Pernah Drop OUT</option>
                            <option>Siswa Miskin/Rentan Miskin</option>
                            <option>Daerah Konflik</option>
                            <option>Keluarga Terpidana</option>
                            <option>Kelainan Fisik</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">29. Nomor KKS <span class="text-slate-500 text-[10px]">(Kartu Keluarga Sejahtera)</span></label>
                        <input type="text" placeholder="No. KKS" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">30. Bank Negara / Daerah</label>
                        <input type="text" placeholder="Contoh: BRI / BNI / Mandiri" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">32. No. Rekening Bank</label>
                        <input type="text" placeholder="Nomor Rekening Buku Tabungan" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 font-mono placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">33. Rekening Atas Nama</label>
                        <input type="text" placeholder="Nama pemilik rekening sesuai buku tabungan" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>

                </div>
            </section>

            <!-- SECTION 4: DATA ORANG TUA (AYAH & IBU KANDUNG) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- DATA AYAH -->
                <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-900/30 to-transparent px-6 py-4 border-b border-slate-800">
                        <h2 class="text-sm font-bold text-white tracking-wide uppercase flex items-center gap-2">
                            Data Ayah Kandung
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">34. Nama Ayah Kandung</label>
                            <input type="text" placeholder="Nama Lengkap Ayah" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="col-span-2">
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">35. NIK Ayah</label>
                                <input type="text" placeholder="16 Digit NIK" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">36. Tahun Lahir</label>
                                <input type="text" placeholder="Contoh: 1980" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">37. Jenjang Pendidikan</label>
                                <select class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option>Tidak sekolah</option>
                                    <option>Putus SD</option>
                                    <option>SD Sederajat</option>
                                    <option>SMP Sederajat</option>
                                    <option>SMA Sederajat</option>
                                    <option>D1</option>
                                    <option>D2</option>
                                    <option>D3</option>
                                    <option selected>D4/S1</option>
                                    <option>S2</option>
                                    <option>S3</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">38. Pekerjaan Utama</label>
                                <select class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option>Tidak bekerja</option>
                                    <option>Nelayan</option>
                                    <option>Petani</option>
                                    <option>Peternak</option>
                                    <option>PNS/TNI/POLRI</option>
                                    <option selected>Karyawan Swasta</option>
                                    <option>Pedagang Kecil</option>
                                    <option>Pedagang Besar</option>
                                    <option>Wiraswasta</option>
                                    <option>Wirausaha</option>
                                    <option>Buruh</option>
                                    <option>Pensiunan</option>
                                    <option>Lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">39. Penghasilan Bulanan</label>
                                <select class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option>Kurang dari 500.000</option>
                                    <option>500.000 - 999.999</option>
                                    <option>1 juta - 1.999.999</option>
                                    <option selected>2 juta - 4.999.999</option>
                                    <option>5 juta - 20 juta</option>
                                    <option>Lebih dari 20 juta</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">40. Berkebutuhan Khusus</label>
                                <select class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option selected>Tidak</option>
                                    <option>Netra</option>
                                    <option>Rungu</option>
                                    <option>Grahita</option>
                                    <option>Daksa</option>
                                    <option>Autis</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DATA IBU -->
                <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-900/30 to-transparent px-6 py-4 border-b border-slate-800">
                        <h2 class="text-sm font-bold text-white tracking-wide uppercase flex items-center gap-2">
                            Data Ibu Kandung
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">41. Nama Ibu Kandung</label>
                            <input type="text" placeholder="Nama Lengkap Ibu Sesuai KK" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="col-span-2">
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">42. NIK Ibu</label>
                                <input type="text" placeholder="16 Digit NIK" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">43. Tahun Lahir</label>
                                <input type="text" placeholder="Contoh: 1983" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">44. Jenjang Pendidikan</label>
                                <select class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option>Tidak sekolah</option>
                                    <option>Putus SD</option>
                                    <option>SD Sederajat</option>
                                    <option>SMP Sederajat</option>
                                    <option selected>SMA Sederajat</option>
                                    <option>D1</option>
                                    <option>D2</option>
                                    <option>D3</option>
                                    <option>D4/S1</option>
                                    <option>S2</option>
                                    <option>S3</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">45. Pekerjaan Utama</label>
                                <select class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option selected>Tidak bekerja / RT</option>
                                    <option>Nelayan</option>
                                    <option>Petani</option>
                                    <option>PNS/TNI/POLRI</option>
                                    <option>Karyawan Swasta</option>
                                    <option>Pedagang</option>
                                    <option>Buruh</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">46. Penghasilan Bulanan</label>
                                <select class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option selected>Kurang dari 500.000</option>
                                    <option>500.000 - 999.999</option>
                                    <option>1 juta - 1.999.999</option>
                                    <option>2 juta - 4.999.999</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">47. Berkebutuhan Khusus</label>
                                <select class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                    <option selected>Tidak</option>
                                    <option>Netra</option>
                                    <option>Rungu</option>
                                    <option>Grahita</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- SECTION 5: DATA WALI (OPSIONAL) -->
            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-slate-800 to-transparent px-6 py-4 border-b border-slate-800">
                    <h2 class="text-sm font-semibold text-slate-300 tracking-wide uppercase flex items-center gap-2">
                        Data Wali <span class="text-xs text-slate-500 font-normal lowercase">(Isi jika siswa tinggal bersama wali)</span>
                    </h2>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">48. Nama Wali</label>
                        <input type="text" placeholder="Nama Lengkap Wali" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">49. NIK Wali</label>
                        <input type="text" placeholder="16 Digit NIK Wali" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">50. Tahun Lahir</label>
                        <input type="text" placeholder="Tahun Lahir" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none focus:border-blue-500">
                    </div>
                </div>
            </section>

            <!-- SECTION 6: KONTAK & DATA PERIODIK -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- DATA KONTAK -->
                <section class="lg:col-span-1 bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl p-6 space-y-4">
                    <h3 class="text-base font-bold text-white uppercase border-b border-slate-800 pb-2">Kontak</h3>
                    <div>
                        <label class="block text-xs font-semibold tracking-wider text-slate-400 mb-1">54. No. Telepon Rumah</label>
                        <input type="tel" placeholder="021xxxxxxx" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold tracking-wider text-slate-400 mb-1">55. Nomor HP <span class="text-amber-400 font-bold">*</span></label>
                        <input type="tel" required placeholder="08xxxxxxxxxx" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold tracking-wider text-slate-400 mb-1">56. Email Pribadi</label>
                        <input type="email" placeholder="nama@email.com" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 focus:outline-none focus:border-blue-500">
                    </div>
                </section>

                <!-- DATA PERIODIK -->
                <section class="lg:col-span-2 bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl p-6">
                    <h3 class="text-base font-bold text-white uppercase border-b border-slate-800 pb-2 mb-4">Data Rincian & Periodik Peserta Didik</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1">57. Tinggi Badan</label>
                            <div class="relative">
                                <input type="number" placeholder="000" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono pr-12 focus:outline-none focus:border-blue-500">
                                <span class="absolute right-3 top-2 text-xs text-slate-500 font-semibold">cm</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1">58. Berat Badan</label>
                            <div class="relative">
                                <input type="number" placeholder="00" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono pr-12 focus:outline-none focus:border-blue-500">
                                <span class="absolute right-3 top-2 text-xs text-slate-500 font-semibold">Kg</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1">59. Lingkar Kepala</label>
                            <div class="relative">
                                <input type="number" placeholder="00" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono pr-12 focus:outline-none focus:border-blue-500">
                                <span class="absolute right-3 top-2 text-xs text-slate-500 font-semibold">cm</span>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-slate-400 mb-1">60. Jarak Tempat Tinggal ke Sekolah</label>
                            <div class="grid grid-cols-2 gap-2 mt-1">
                                <label class="flex items-center justify-center p-2 bg-slate-950/40 border border-slate-800 rounded-xl cursor-pointer text-xs"><input type="radio" name="jarak" class="mr-2 accent-blue-500"> Kurang dari 1 km</label>
                                <label class="flex items-center justify-center p-2 bg-slate-950/40 border border-slate-800 rounded-xl cursor-pointer text-xs"><input type="radio" name="jarak" class="mr-2 accent-blue-500"> Lebih dari 1 km</label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1">61. Sebutkan Jarak <span class="text-[10px] text-slate-500">(km)</span></label>
                            <input type="number" step="0.1" placeholder="Misal: 2.5" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-slate-400 mb-1">62. Waktu Tempuh Ke Sekolah</label>
                            <div class="flex items-center gap-2">
                                <input type="number" placeholder="0" class="w-20 bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none"> <span class="text-xs text-slate-400">Jam</span>
                                <input type="number" placeholder="00" class="w-24 bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none"> <span class="text-xs text-slate-400">Menit</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1">63. Jumlah Saudara Kandung</label>
                            <input type="number" min="0" placeholder="0" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 font-mono focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                </section>
            </div>

            <!-- SECTION 7: REGISTRASI PESERTA DIDIK -->
            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-amber-950/40 to-transparent px-6 py-4 border-b border-slate-800">
                    <h2 class="text-lg font-bold text-white tracking-wide uppercase flex items-center gap-3">
                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-amber-500/20 text-amber-400 text-xs">04</span>
                        Registrasi Peserta Didik
                    </h2>
                </div>
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">66. Jenis Pendaftaran</label>
                        <select class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-300 focus:outline-none focus:border-blue-500">
                            <option>01) Siswa Baru</option>
                            <option>02) Pindahan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">67. Nomor Induk Siswa (NIS)</label>
                        <input type="text" placeholder="Masukkan NIS Sekolah" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 font-mono focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">68. Tanggal Masuk Sekolah</label>
                        <input type="date" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 font-mono focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="lg:col-span-3">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">69. Sekolah Asal <span class="text-red-400 font-medium text-[10px]">(Wajib untuk TK / Pindahan)</span></label>
                        <input type="text" placeholder="Nama instansi TK atau sekolah asal sebelumnya" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">70. Kecamatan Sekolah Asal</label>
                        <input type="text" placeholder="Kecamatan asal sekolah" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">71. Kab/Kota Sekolah Asal</label>
                        <input type="text" placeholder="Kabupaten/Kota asal sekolah" class="w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">72. Hobby / Kegemaran</label>
                        <select class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-300 focus:outline-none">
                            <option>Olahraga</option>
                            <option>Kesenian</option>
                            <option>Membaca</option>
                            <option>Menulis</option>
                            <option>Traveling</option>
                            <option>Fotografi</option>
                            <option>Fitness</option>
                            <option>Belanja</option>
                            <option>Menggambar</option>
                            <option>Bermain Musik</option>
                            <option>Mendaki</option>
                            <option>Jogging</option>
                            <option>Bulutangkis</option>
                            <option>Tenis</option>
                            <option>Berkemah</option>
                            <option>Memancing</option>
                            <option>Berselancar</option>
                            <option>Menjahit</option>
                            <option>Mewarnai</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">73. Cita-cita</label>
                        <select class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-300 focus:outline-none">
                            <option>PNS</option>
                            <option>TNI/Polri</option>
                            <option>Guru/Dosen</option>
                            <option>Dokter</option>
                            <option>Politikus</option>
                            <option>Wiraswasta</option>
                            <option>Seni Lukis/Artis/Sejenis</option>
                            <option>Penghafal Quran</option>
                            <option>Atlet/e-Sport Profesional</option>
                            <option>Content Creator</option>
                            <option>Koki</option>
                            <option>Pendeta</option>
                            <option>Perawat</option>
                            <option>Pilot</option>
                            <option>Pembalap</option>
                            <option>Pengacara</option>
                            <option>Pendakwah</option>
                            <option>Desainer</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                </div>
            </section>

            <!-- SUBMIT BUTTON & DISCLAIMER -->
            <footer class="bg-slate-900/60 backdrop-blur-md border border-slate-800 p-6 md:p-8 rounded-2xl shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="text-xs text-slate-400 space-y-1.5 max-w-xl text-center md:text-left">
                    <p class="font-semibold text-slate-300">Pernyataan Pertanggungjawaban:</p>
                    <p>Yang bertanda tangan Orang Tua/Wali atau Siswa bertanggung jawab secara hukum terhadap kebenaran data yang tercantum.</p>
                </div>

                <button type="submit" class="w-full md:w-auto px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 hover:shadow-blue-500/30 transform active:scale-95 transition-all text-center cursor-pointer tracking-wider uppercase text-sm">
                    Simpan Formulir Dapodik
                </button>
            </footer>

        </form>
    </div>

</body>

</html>