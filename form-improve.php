<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Peserta Didik DAPODIK - SDN Pengasinan VII</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">

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

        /* Kustomisasi Tambahan Flatpickr agar menyatu dengan palet slate */
        .flatpickr-calendar {
            background: #0f172a !important;
            /* slate-900 */
            border: 1px solid #334155 !important;
            /* slate-700 */
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5) !important;
            border-radius: 16px !important;
            font-family: inherit;
        }

        .flatpickr-day.selected,
        .flatpickr-day.selected:hover {
            background: #3b82f6 !important;
            /* blue-500 */
            border-color: #3b82f6 !important;
            color: white !important;
        }

        .flatpickr-day:hover {
            background: #1e293b !important;
            /* slate-800 */
        }

        .flatpickr-months .flatpickr-month,
        .flatpickr-current-month .flatpickr-monthDropdown-months {
            background: #0f172a !important;
            color: #f8fafc !important;
        }

        .flatpickr-current-month input.numInput.cur-year {
            color: #f8fafc !important;
        }

        .flatpickr-weekday {
            color: #94a3b8 !important;
            /* slate-400 */
        }

        /* Animasi Transisi Sederhana */
        .fade-enter-active,
        .fade-leave-active {
            transition: all 0.3s ease;
        }

        .fade-enter-from,
        .fade-leave-to {
            opacity: 0;
            transform: translateY(-8px);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950 min-h-screen font-sans antialiased text-slate-200 py-12 px-4 sm:px-6 lg:px-8">

    <div id="app" class="max-w-5xl mx-auto space-y-10" v-cloak>

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

        <form @submit.prevent="handleSubmit" class="space-y-8" novalidate>

            <div class="bg-slate-900/40 backdrop-blur-md border border-slate-800/80 p-6 rounded-2xl shadow-xl flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm text-slate-400 max-w-md text-center md:text-left">
                    <span class="text-amber-400 font-semibold">Catatan:</span> Mohon isi formulir ini dengan lengkap dan benar, serta melampirkan fotokopi Akta Kelahiran dan Kartu Keluarga.
                </div>
                <div class="w-full md:w-auto">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Tanggal Pengisian</label>
                    <input type="text" data-field="tanggal_pengisian" v-model="formData.tanggal_pengisian" class="datepicker w-full bg-slate-950/60 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-100 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all font-mono cursor-pointer">
                </div>
            </div>

            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-900/40 to-transparent px-6 py-4 border-b border-slate-800">
                    <h2 class="text-lg font-bold text-white tracking-wide uppercase flex items-center gap-3">
                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-blue-500/20 text-blue-400 text-xs">01</span>
                        Data Pribadi
                    </h2>
                </div>
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div class="lg:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">1. Nama Lengkap <span class="text-red-400">*</span></label>
                        <input type="text" v-model="formData.nama" @blur="touchField('nama')" @input="validateField('nama')" :class="inputClass('nama')" placeholder="Masukkan nama lengkap sesuai akta / kartu keluarga">
                        <p v-if="errors.nama && touched.nama" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.nama }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">2. Jenis Kelamin <span class="text-red-400">*</span></label>
                        <div class="grid grid-cols-2 gap-3">
                            <label :class="radioClass('gender', 'Laki-laki')">
                                <input type="radio" value="Laki-laki" v-model="formData.gender" @change="touchField('gender')" class="accent-blue-500 mr-2">
                                <span class="text-sm">Laki-laki</span>
                            </label>
                            <label :class="radioClass('gender', 'Perempuan')">
                                <input type="radio" value="Perempuan" v-model="formData.gender" @change="touchField('gender')" class="accent-blue-500 mr-2">
                                <span class="text-sm">Perempuan</span>
                            </label>
                        </div>
                        <p v-if="errors.gender && touched.gender" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.gender }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">3. NISN <span class="text-slate-500 text-[10px]">(10 Digit Angka)</span></label>
                        <input type="text" maxlength="10" v-model="formData.nisn" @blur="touchField('nisn')" @input="validateField('nisn')" :class="inputClass('nisn')" placeholder="10 Digit NISN">
                        <p v-if="errors.nisn && touched.nisn" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.nisn }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">4. Kewarganegaraan <span class="text-red-400">*</span></label>
                        <select v-model="formData.kewarganegaraan" :class="selectClass('kewarganegaraan')">
                            <option value="Indonesia (WNI)">Indonesia (WNI)</option>
                            <option value="Asing (WNA)">Asing (WNA)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Nama Negara <span class="text-red-400" v-if="formData.kewarganegaraan === 'Asing (WNA)'">*</span></label>
                        <input type="text" v-model="formData.nama_negara" :disabled="formData.kewarganegaraan !== 'Asing (WNA)'" @blur="touchField('nama_negara')" @input="validateField('nama_negara')" :class="inputClass('nama_negara')" placeholder="Isi jika WNA">
                        <p v-if="errors.nama_negara && touched.nama_negara" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.nama_negara }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">5. NIK / No. KITAS <span class="text-red-400">*</span></label>
                        <input type="text" maxlength="16" v-model="formData.nik" @blur="touchField('nik')" @input="validateField('nik')" :class="inputClass('nik')" placeholder="16 Digit NIK">
                        <p v-if="errors.nik && touched.nik" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.nik }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">6. Nomor KK <span class="text-red-400">*</span></label>
                        <input type="text" maxlength="16" v-model="formData.no_kk" @blur="touchField('no_kk')" @input="validateField('no_kk')" :class="inputClass('no_kk')" placeholder="16 Digit No. Kartu Keluarga">
                        <p v-if="errors.no_kk && touched.no_kk" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.no_kk }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">7. Tempat Lahir <span class="text-red-400">*</span></label>
                        <input type="text" v-model="formData.tempat_lahir" @blur="touchField('tempat_lahir')" @input="validateField('tempat_lahir')" :class="inputClass('tempat_lahir')" placeholder="Kota/Kabupaten Lahir">
                        <p v-if="errors.tempat_lahir && touched.tempat_lahir" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.tempat_lahir }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">8. Tanggal Lahir <span class="text-red-400">*</span></label>
                        <input type="text" data-field="tanggal_lahir" v-model="formData.tanggal_lahir" :class="inputClass('tanggal_lahir')" class="datepicker cursor-pointer" placeholder="Pilih Tanggal Lahir">
                        <p v-if="errors.tanggal_lahir && touched.tanggal_lahir" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.tanggal_lahir }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">9. No. Registrasi Akta Lahir <span class="text-red-400">*</span></label>
                        <input type="text" v-model="formData.no_akta" @blur="touchField('no_akta')" @input="validateField('no_akta')" :class="inputClass('no_akta')" placeholder="Contoh: 12345/JU/2015 atau No. Reg Umum">
                        <p v-if="errors.no_akta && touched.no_akta" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.no_akta }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">11. Agama & Kepercayaan <span class="text-red-400">*</span></label>
                        <select v-model="formData.agama" :class="selectClass('agama')">
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
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">10. Berkebutuhan Khusus <span class="text-red-400">*</span></label>
                        <select v-model="formData.kebutuhan_khusus" :class="selectClass('kebutuhan_khusus')">
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

            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-900/40 to-transparent px-6 py-4 border-b border-slate-800">
                    <h2 class="text-lg font-bold text-white tracking-wide uppercase flex items-center gap-3">
                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-blue-500/20 text-blue-400 text-xs">02</span>
                        Alamat & Domisili
                    </h2>
                </div>
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="md:col-span-3">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">12. Alamat Jalan <span class="text-red-400">*</span></label>
                        <input type="text" v-model="formData.alamat" @blur="touchField('alamat')" @input="validateField('alamat')" :class="inputClass('alamat')" placeholder="Nama Jalan, Gang, atau Blok Rumah">
                        <p v-if="errors.alamat && touched.alamat" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.alamat }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">13. RT <span class="text-red-400">*</span></label>
                        <input type="text" maxlength="3" v-model="formData.rt" @blur="touchField('rt')" @input="validateField('rt')" :class="inputClass('rt')" placeholder="000">
                        <p v-if="errors.rt && touched.rt" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.rt }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">14. RW <span class="text-red-400">*</span></label>
                        <input type="text" maxlength="3" v-model="formData.rw" @blur="touchField('rw')" @input="validateField('rw')" :class="inputClass('rw')" placeholder="000">
                        <p v-if="errors.rw && touched.rw" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.rw }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">15. Nama Dusun</label>
                        <input type="text" v-model="formData.dusun" :class="inputClass('dusun')" placeholder="Nama Dusun/Kampung">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">17. Nama Kelurahan/Desa <span class="text-red-400">*</span></label>
                        <input type="text" v-model="formData.kelurahan" @blur="touchField('kelurahan')" @input="validateField('kelurahan')" :class="inputClass('kelurahan')" placeholder="Kelurahan / Desa">
                        <p v-if="errors.kelurahan && touched.kelurahan" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.kelurahan }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">16. Kecamatan <span class="text-red-400">*</span></label>
                        <input type="text" v-model="formData.kecamatan" @blur="touchField('kecamatan')" @input="validateField('kecamatan')" :class="inputClass('kecamatan')" placeholder="Kecamatan">
                        <p v-if="errors.kecamatan && touched.kecamatan" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.kecamatan }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">18. Kode Pos <span class="text-red-400">*</span></label>
                        <input type="text" maxlength="5" v-model="formData.kode_pos" @blur="touchField('kode_pos')" @input="validateField('kode_pos')" :class="inputClass('kode_pos')" placeholder="5 Digit Kode Pos">
                        <p v-if="errors.kode_pos && touched.kode_pos" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.kode_pos }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">19. Tempat Tinggal <span class="text-red-400">*</span></label>
                        <select v-model="formData.tempat_tinggal" :class="selectClass('tempat_tinggal')">
                            <option>Bersama orang tua</option>
                            <option>Wali</option>
                            <option>Kos</option>
                            <option>Asrama</option>
                            <option>Panti Asuhan</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">20. Moda Transportasi <span class="text-red-400">*</span></label>
                        <select v-model="formData.transportasi" :class="selectClass('transportasi')">
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
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">21. Anak Ke-berapa (Sesuai KK) <span class="text-red-400">*</span></label>
                        <input type="number" min="1" v-model.number="formData.anak_ke" @blur="touchField('anak_ke')" @input="validateField('anak_ke')" :class="inputClass('anak_ke')" placeholder="1">
                        <p v-if="errors.anak_ke && touched.anak_ke" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.anak_ke }}</p>
                    </div>

                </div>
            </section>

            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-900/40 to-transparent px-6 py-4 border-b border-slate-800">
                    <h2 class="text-lg font-bold text-white tracking-wide uppercase flex items-center gap-3">
                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-blue-500/20 text-blue-400 text-xs">03</span>
                        Kesejahteraan & Program Bantuan
                    </h2>
                </div>
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">22. Penerima KPS / PKH? <span class="text-red-400">*</span></label>
                        <div class="grid grid-cols-2 gap-3">
                            <label :class="radioClass('kps', 'Ya')">
                                <input type="radio" value="Ya" v-model="formData.kps" @change="touchField('kps')" class="accent-blue-500 mr-2"> <span class="text-sm">Ya</span>
                            </label>
                            <label :class="radioClass('kps', 'Tidak')">
                                <input type="radio" value="Tidak" v-model="formData.kps" @change="touchField('kps')" class="accent-blue-500 mr-2"> <span class="text-sm">Tidak</span>
                            </label>
                        </div>
                        <p v-if="errors.kps && touched.kps" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.kps }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">23. No. KPS / PKH <span class="text-red-400" v-if="formData.kps === 'Ya'">*</span></label>
                        <input type="text" v-model="formData.no_kps" :disabled="formData.kps !== 'Ya'" @blur="touchField('no_kps')" @input="validateField('no_kps')" :class="inputClass('no_kps')" placeholder="Masukkan nomor kartu KPS/PKH">
                        <p v-if="errors.no_kps && touched.no_kps" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.no_kps }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">24. Apakah Punya KIP? <span class="text-red-400">*</span></label>
                        <div class="grid grid-cols-2 gap-3">
                            <label :class="radioClass('kip', 'Ya')">
                                <input type="radio" value="Ya" v-model="formData.kip" @change="touchField('kip')" class="accent-blue-500 mr-2"> <span class="text-sm">Ya</span>
                            </label>
                            <label :class="radioClass('kip', 'Tidak')">
                                <input type="radio" value="Tidak" v-model="formData.kip" @change="touchField('kip')" class="accent-blue-500 mr-2"> <span class="text-sm">Tidak</span>
                            </label>
                        </div>
                        <p v-if="errors.kip && touched.kip" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.kip }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">25. Nomor KIP <span class="text-red-400" v-if="formData.kip === 'Ya'">*</span></label>
                        <input type="text" v-model="formData.no_kip" :disabled="formData.kip !== 'Ya'" @blur="touchField('no_kip')" @input="validateField('no_kip')" :class="inputClass('no_kip')" placeholder="6 digit nomor KIP">
                        <p v-if="errors.no_kip && touched.no_kip" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.no_kip }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">28. Nama Tertera di KIP <span class="text-red-400" v-if="formData.kip === 'Ya'">*</span></label>
                        <input type="text" v-model="formData.nama_kip" :disabled="formData.kip !== 'Ya'" @blur="touchField('nama_kip')" @input="validateField('nama_kip')" :class="inputClass('nama_kip')" placeholder="Nama sesuai di kartu KIP">
                        <p v-if="errors.nama_kip && touched.nama_kip" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.nama_kip }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">26. Apakah Layak Dapat PIP? <span class="text-red-400">*</span></label>
                        <div class="grid grid-cols-2 gap-3">
                            <label :class="radioClass('layak_pip', 'Ya')">
                                <input type="radio" value="Ya" v-model="formData.layak_pip" @change="touchField('layak_pip')" class="accent-blue-500 mr-2"> <span class="text-sm">Ya</span>
                            </label>
                            <label :class="radioClass('layak_pip', 'Tidak')">
                                <input type="radio" value="Tidak" v-model="formData.layak_pip" @change="touchField('layak_pip')" class="accent-blue-500 mr-2"> <span class="text-sm">Tidak</span>
                            </label>
                        </div>
                        <p v-if="errors.layak_pip && touched.layak_pip" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.layak_pip }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">27. Alasan Layak PIP <span class="text-red-400" v-if="formData.layak_pip === 'Ya'">*</span></label>
                        <select v-model="formData.alasan_pip" :disabled="formData.layak_pip !== 'Ya'" :class="selectClass('alasan_pip')">
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
                        <p v-if="errors.alasan_pip && touched.alasan_pip" class="text-xs text-red-400 mt-1.5 flex items-center gap-1">{{ errors.alasan_pip }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">29. Nomor KKS</label>
                        <input type="text" v-model="formData.no_kks" :class="inputClass('no_kks')" placeholder="No. KKS">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">30. Bank Negara / Daerah</label>
                        <input type="text" v-model="formData.bank" :class="inputClass('bank')" placeholder="Contoh: BRI / BNI / Mandiri">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">32. No. Rekening Bank</label>
                        <input type="text" v-model="formData.no_rekening" :class="inputClass('no_rekening')" placeholder="Nomor Rekening Buku Tabungan">
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">33. Rekening At Name</label>
                        <input type="text" v-model="formData.rekening_an" :class="inputClass('rekening_an')" placeholder="Nama pemilik rekening sesuai buku tabungan">
                    </div>

                </div>
            </section>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-900/30 to-transparent px-6 py-4 border-b border-slate-800">
                        <h2 class="text-sm font-bold text-white tracking-wide uppercase flex items-center gap-2"> Data Ayah Kandung </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">34. Nama Ayah Kandung <span class="text-red-400">*</span></label>
                            <input type="text" v-model="formData.nama_ayah" @blur="touchField('nama_ayah')" @input="validateField('nama_ayah')" :class="inputClass('nama_ayah')" placeholder="Nama Lengkap Ayah">
                            <p v-if="errors.nama_ayah && touched.nama_ayah" class="text-xs text-red-400 mt-1">{{ errors.nama_ayah }}</p>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="col-span-2">
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">35. NIK Ayah <span class="text-red-400">*</span></label>
                                <input type="text" maxlength="16" v-model="formData.nik_ayah" @blur="touchField('nik_ayah')" @input="validateField('nik_ayah')" :class="inputClass('nik_ayah')" placeholder="16 Digit NIK">
                                <p v-if="errors.nik_ayah && touched.nik_ayah" class="text-xs text-red-400 mt-1">{{ errors.nik_ayah }}</p>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">36. Tahun Lahir <span class="text-red-400">*</span></label>
                                <input type="text" maxlength="4" v-model="formData.tahun_lahir_ayah" @blur="touchField('tahun_lahir_ayah')" @input="validateField('tahun_lahir_ayah')" :class="inputClass('tahun_lahir_ayah')" placeholder="1980">
                                <p v-if="errors.tahun_lahir_ayah && touched.tahun_lahir_ayah" class="text-xs text-red-400 mt-1">{{ errors.tahun_lahir_ayah }}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">37. Jenjang Pendidikan</label>
                                <select v-model="formData.pendidikan_ayah" :class="selectClass('pendidikan_ayah')">
                                    <option>Tidak sekolah</option>
                                    <option>Putus SD</option>
                                    <option>SD Sederajat</option>
                                    <option>SMP Sederajat</option>
                                    <option>SMA Sederajat</option>
                                    <option>D1</option>
                                    <option>D2</option>
                                    <option>D3</option>
                                    <option>D4/S1</option>
                                    <option>S2</option>
                                    <option>S3</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">38. Pekerjaan Utama</label>
                                <select v-model="formData.pekerjaan_ayah" :class="selectClass('pekerjaan_ayah')">
                                    <option>Tidak bekerja</option>
                                    <option>Nelayan</option>
                                    <option>Petani</option>
                                    <option>Peternak</option>
                                    <option>PNS/TNI/POLRI</option>
                                    <option>Karyawan Swasta</option>
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
                                <select v-model="formData.penghasilan_ayah" :class="selectClass('penghasilan_ayah')">
                                    <option>Kurang dari 500.000</option>
                                    <option>500.000 - 999.999</option>
                                    <option>1 juta - 1.999.999</option>
                                    <option>2 juta - 4.999.999</option>
                                    <option>5 juta - 20 juta</option>
                                    <option>Lebih dari 20 juta</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">40. Berkebutuhan Khusus</label>
                                <select v-model="formData.kebutuhan_ayah" :class="selectClass('kebutuhan_ayah')">
                                    <option>Tidak</option>
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

                <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-900/30 to-transparent px-6 py-4 border-b border-slate-800">
                        <h2 class="text-sm font-bold text-white tracking-wide uppercase flex items-center gap-2"> Data Ibu Kandung </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">41. Nama Ibu Kandung <span class="text-red-400">*</span></label>
                            <input type="text" v-model="formData.nama_ibu" @blur="touchField('nama_ibu')" @input="validateField('nama_ibu')" :class="inputClass('nama_ibu')" placeholder="Nama Lengkap Ibu Sesuai KK">
                            <p v-if="errors.nama_ibu && touched.nama_ibu" class="text-xs text-red-400 mt-1">{{ errors.nama_ibu }}</p>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="col-span-2">
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">42. NIK Ibu <span class="text-red-400">*</span></label>
                                <input type="text" maxlength="16" v-model="formData.nik_ibu" @blur="touchField('nik_ibu')" @input="validateField('nik_ibu')" :class="inputClass('nik_ibu')" placeholder="16 Digit NIK">
                                <p v-if="errors.nik_ibu && touched.nik_ibu" class="text-xs text-red-400 mt-1">{{ errors.nik_ibu }}</p>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">43. Tahun Lahir <span class="text-red-400">*</span></label>
                                <input type="text" maxlength="4" v-model="formData.tahun_lahir_ibu" @blur="touchField('tahun_lahir_ibu')" @input="validateField('tahun_lahir_ibu')" :class="inputClass('tahun_lahir_ibu')" placeholder="1983">
                                <p v-if="errors.tahun_lahir_ibu && touched.tahun_lahir_ibu" class="text-xs text-red-400 mt-1">{{ errors.tahun_lahir_ibu }}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">44. Jenjang Pendidikan</label>
                                <select v-model="formData.pendidikan_ibu" :class="selectClass('pendidikan_ibu')">
                                    <option>Tidak sekolah</option>
                                    <option>Putus SD</option>
                                    <option>SD Sederajat</option>
                                    <option>SMP Sederajat</option>
                                    <option>SMA Sederajat</option>
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
                                <select v-model="formData.pekerjaan_ibu" :class="selectClass('pekerjaan_ibu')">
                                    <option>Tidak bekerja / RT</option>
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
                                <select v-model="formData.penghasilan_ibu" :class="selectClass('penghasilan_ibu')">
                                    <option>Kurang dari 500.000</option>
                                    <option>500.000 - 999.999</option>
                                    <option>1 juta - 1.999.999</option>
                                    <option>2 juta - 4.999.999</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">47. Berkebutuhan Khusus</label>
                                <select v-model="formData.kebutuhan_ibu" :class="selectClass('kebutuhan_ibu')">
                                    <option>Tidak</option>
                                    <option>Netra</option>
                                    <option>Rungu</option>
                                    <option>Grahita</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-slate-800 to-transparent px-6 py-4 border-b border-slate-800">
                    <h2 class="text-sm font-semibold text-slate-300 tracking-wide uppercase flex items-center gap-2">
                        Data Wali <span class="text-xs text-slate-500 font-normal lowercase">(Wajib jika siswa memilih tinggal bersama Wali)</span>
                    </h2>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">48. Nama Wali <span class="text-red-400" v-if="formData.tempat_tinggal === 'Wali'">*</span></label>
                        <input type="text" v-model="formData.nama_wali" @blur="touchField('nama_wali')" @input="validateField('nama_wali')" :class="inputClass('nama_wali')" placeholder="Nama Lengkap Wali">
                        <p v-if="errors.nama_wali && touched.nama_wali" class="text-xs text-red-400 mt-1">{{ errors.nama_wali }}</p>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">49. NIK Wali <span class="text-red-400" v-if="formData.tempat_tinggal === 'Wali'">*</span></label>
                        <input type="text" maxlength="16" v-model="formData.nik_wali" @blur="touchField('nik_wali')" @input="validateField('nik_wali')" :class="inputClass('nik_wali')" placeholder="16 Digit NIK Wali">
                        <p v-if="errors.nik_wali && touched.nik_wali" class="text-xs text-red-400 mt-1">{{ errors.nik_wali }}</p>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold uppercase tracking-wider text-slate-400 mb-1">50. Tahun Lahir <span class="text-red-400" v-if="formData.tempat_tinggal === 'Wali'">*</span></label>
                        <input type="text" maxlength="4" v-model="formData.tahun_lahir_wali" @blur="touchField('tahun_lahir_wali')" @input="validateField('tahun_lahir_wali')" :class="inputClass('tahun_lahir_wali')" placeholder="Tahun Lahir">
                        <p v-if="errors.tahun_lahir_wali && touched.tahun_lahir_wali" class="text-xs text-red-400 mt-1">{{ errors.tahun_lahir_wali }}</p>
                    </div>
                </div>
            </section>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <section class="lg:col-span-1 bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl p-6 space-y-4">
                    <h3 class="text-base font-bold text-white uppercase border-b border-slate-800 pb-2">Kontak</h3>
                    <div>
                        <label class="block text-xs font-semibold tracking-wider text-slate-400 mb-1">54. No. Telepon Rumah</label>
                        <input type="tel" v-model="formData.telp_rumah" :class="inputClass('telp_rumah')" placeholder="021xxxxxxx">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold tracking-wider text-slate-400 mb-1">55. Nomor HP <span class="text-red-400">*</span></label>
                        <input type="tel" v-model="formData.no_hp" @blur="touchField('no_hp')" @input="validateField('no_hp')" :class="inputClass('no_hp')" placeholder="08xxxxxxxxxx">
                        <p v-if="errors.no_hp && touched.no_hp" class="text-xs text-red-400 mt-1">{{ errors.no_hp }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold tracking-wider text-slate-400 mb-1">56. Email Pribadi</label>
                        <input type="email" v-model="formData.email" @blur="touchField('email')" @input="validateField('email')" :class="inputClass('email')" placeholder="nama@email.com">
                        <p v-if="errors.email && touched.email" class="text-xs text-red-400 mt-1">{{ errors.email }}</p>
                    </div>
                </section>

                <section class="lg:col-span-2 bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl p-6">
                    <h3 class="text-base font-bold text-white uppercase border-b border-slate-800 pb-2 mb-4">Data Rincian & Periodik Peserta Didik</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1">57. Tinggi Badan <span class="text-red-400">*</span></label>
                            <div class="relative">
                                <input type="number" v-model.number="formData.tinggi_badan" @blur="touchField('tinggi_badan')" @input="validateField('tinggi_badan')" :class="inputClass('tinggi_badan')" placeholder="000">
                                <span class="absolute right-3 top-2.5 text-xs text-slate-500 font-semibold">cm</span>
                            </div>
                            <p v-if="errors.tinggi_badan && touched.tinggi_badan" class="text-xs text-red-400 mt-1">{{ errors.tinggi_badan }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1">58. Berat Badan <span class="text-red-400">*</span></label>
                            <div class="relative">
                                <input type="number" v-model.number="formData.berat_badan" @blur="touchField('berat_badan')" @input="validateField('berat_badan')" :class="inputClass('berat_badan')" placeholder="00">
                                <span class="absolute right-3 top-2.5 text-xs text-slate-500 font-semibold">Kg</span>
                            </div>
                            <p v-if="errors.berat_badan && touched.berat_badan" class="text-xs text-red-400 mt-1">{{ errors.berat_badan }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1">59. Lingkar Kepala <span class="text-red-400">*</span></label>
                            <div class="relative">
                                <input type="number" v-model.number="formData.lingkar_kepala" @blur="touchField('lingkar_kepala')" @input="validateField('lingkar_kepala')" :class="inputClass('lingkar_kepala')" placeholder="00">
                                <span class="absolute right-3 top-2.5 text-xs text-slate-500 font-semibold">cm</span>
                            </div>
                            <p v-if="errors.lingkar_kepala && touched.lingkar_kepala" class="text-xs text-red-400 mt-1">{{ errors.lingkar_kepala }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-slate-400 mb-1">60. Jarak Tempat Tinggal ke Sekolah <span class="text-red-400">*</span></label>
                            <div class="grid grid-cols-2 gap-2">
                                <label :class="radioClass('jarak_sekolah', 'Kurang dari 1 km')">
                                    <input type="radio" value="Kurang dari 1 km" v-model="formData.jarak_sekolah" @change="touchField('jarak_sekolah')" class="mr-2 accent-blue-500"> Kurang dari 1 km
                                </label>
                                <label :class="radioClass('jarak_sekolah', 'Lebih dari 1 km')">
                                    <input type="radio" value="Lebih dari 1 km" v-model="formData.jarak_sekolah" @change="touchField('jarak_sekolah')" class="mr-2 accent-blue-500"> Lebih dari 1 km
                                </label>
                            </div>
                            <p v-if="errors.jarak_sekolah && touched.jarak_sekolah" class="text-xs text-red-400 mt-1">{{ errors.jarak_sekolah }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1">61. Sebutkan Jarak <span class="text-red-400" v-if="formData.jarak_sekolah === 'Lebih dari 1 km'">*</span> <span class="text-[10px] text-slate-500">(km)</span></label>
                            <input type="number" step="0.1" v-model.number="formData.sebutkan_jarak" :disabled="formData.jarak_sekolah !== 'Lebih dari 1 km'" @blur="touchField('sebutkan_jarak')" @input="validateField('sebutkan_jarak')" :class="inputClass('sebutkan_jarak')" placeholder="Misal: 2.5">
                            <p v-if="errors.sebutkan_jarak && touched.sebutkan_jarak" class="text-xs text-red-400 mt-1">{{ errors.sebutkan_jarak }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-slate-400 mb-1">62. Waktu Tempuh Ke Sekolah <span class="text-red-400">*</span></label>
                            <div class="flex items-center gap-2">
                                <input type="number" v-model.number="formData.waktu_jam" @blur="touchField('waktu_menit')" @input="validateField('waktu_menit')" class="w-20 bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 focus:outline-none focus:border-blue-500" placeholder="0"> <span class="text-xs text-slate-400">Jam</span>
                                <input type="number" v-model.number="formData.waktu_menit" @blur="touchField('waktu_menit')" @input="validateField('waktu_menit')" class="w-24 bg-slate-950/60 border border-slate-800 rounded-xl px-3 py-2 text-sm text-slate-100 focus:outline-none focus:border-blue-500" placeholder="00"> <span class="text-xs text-slate-400">Menit</span>
                            </div>
                            <p v-if="errors.waktu_menit && touched.waktu_menit" class="text-xs text-red-400 mt-1">{{ errors.waktu_menit }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 mb-1">63. Jumlah Saudara Kandung <span class="text-red-400">*</span></label>
                            <input type="number" min="0" v-model.number="formData.saudara_kandung" @blur="touchField('saudara_kandung')" @input="validateField('saudara_kandung')" :class="inputClass('saudara_kandung')" placeholder="0">
                            <p v-if="errors.saudara_kandung && touched.saudara_kandung" class="text-xs text-red-400 mt-1">{{ errors.saudara_kandung }}</p>
                        </div>
                    </div>
                </section>
            </div>

            <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-amber-950/40 to-transparent px-6 py-4 border-b border-slate-800">
                    <h2 class="text-lg font-bold text-white tracking-wide uppercase flex items-center gap-3">
                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-amber-500/20 text-amber-400 text-xs">04</span>
                        Registrasi Peserta Didik
                    </h2>
                </div>
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">66. Jenis Pendaftaran <span class="text-red-400">*</span></label>
                        <select v-model="formData.jenis_pendaftaran" :class="selectClass('jenis_pendaftaran')">
                            <option>01) Siswa Baru</option>
                            <option>02) Pindahan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">67. Nomor Induk Siswa (NIS) <span class="text-red-400">*</span></label>
                        <input type="text" v-model="formData.nis" @blur="touchField('nis')" @input="validateField('nis')" :class="inputClass('nis')" placeholder="Masukkan NIS Sekolah">
                        <p v-if="errors.nis && touched.nis" class="text-xs text-red-400 mt-1">{{ errors.nis }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">68. Tanggal Masuk Sekolah <span class="text-red-400">*</span></label>
                        <input type="text" data-field="tanggal_masuk" v-model="formData.tanggal_masuk" :class="inputClass('tanggal_masuk')" class="datepicker cursor-pointer" placeholder="Pilih Tanggal Masuk">
                        <p v-if="errors.tanggal_masuk && touched.tanggal_masuk" class="text-xs text-red-400 mt-1">{{ errors.tanggal_masuk }}</p>
                    </div>

                    <div class="lg:col-span-3">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">69. Sekolah Asal <span class="text-red-400">*</span> <span class="text-slate-500 text-[10px]">(Wajib untuk TK / Pindahan)</span></label>
                        <input type="text" v-model="formData.sekolah_asal" @blur="touchField('sekolah_asal')" @input="validateField('sekolah_asal')" :class="inputClass('sekolah_asal')" placeholder="Nama instansi TK atau sekolah asal sebelumnya">
                        <p v-if="errors.sekolah_asal && touched.sekolah_asal" class="text-xs text-red-400 mt-1">{{ errors.sekolah_asal }}</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">70. Kecamatan Sekolah Asal</label>
                        <input type="text" v-model="formData.kecamatan_asal" :class="inputClass('kecamatan_asal')" placeholder="Kecamatan asal sekolah">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">71. Kab/Kota Sekolah Asal</label>
                        <input type="text" v-model="formData.kota_asal" :class="inputClass('kota_asal')" placeholder="Kabupaten/Kota asal sekolah">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">72. Hobby / Kegemaran</label>
                        <select v-model="formData.hobby" :class="selectClass('hobby')">
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
                        <select v-model="formData.cita_cita" :class="selectClass('cita_cita')">
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

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>

    <script>
        const {
            createApp
        } = Vue;

        createApp({
            data() {
                return {
                    formData: {
                        tanggal_pengisian: '2026-06-17',
                        nama: '',
                        gender: '',
                        nisn: '',
                        kewarganegaraan: 'Indonesia (WNI)',
                        nama_negara: '',
                        nik: '',
                        no_kk: '',
                        tempat_lahir: '',
                        tanggal_lahir: '',
                        no_akta: '',
                        agama: 'Islam',
                        kebutuhan_khusus: 'Tidak',
                        alamat: '',
                        rt: '',
                        rw: '',
                        dusun: '',
                        kelurahan: '',
                        kecamatan: '',
                        kode_pos: '',
                        tempat_tinggal: 'Bersama orang tua',
                        transportasi: 'Jalan kaki',
                        anak_ke: '',
                        kps: '',
                        no_kps: '',
                        kip: '',
                        no_kip: '',
                        nama_kip: '',
                        layak_pip: '',
                        alasan_pip: 'Bukan Penerima / Tidak Ada',
                        no_kks: '',
                        bank: '',
                        no_rekening: '',
                        rekening_an: '',
                        nama_ayah: '',
                        nik_ayah: '',
                        tahun_lahir_ayah: '',
                        pendidikan_ayah: 'D4/S1',
                        pekerjaan_ayah: 'Karyawan Swasta',
                        penghasilan_ayah: '2 juta - 4.999.999',
                        kebutuhan_ayah: 'Tidak',
                        nama_ibu: '',
                        nik_ibu: '',
                        tahun_lahir_ibu: '',
                        pendidikan_ibu: 'SMA Sederajat',
                        pekerjaan_ibu: 'Tidak bekerja / RT',
                        penghasilan_ibu: 'Kurang dari 500.000',
                        kebutuhan_ibu: 'Tidak',
                        nama_wali: '',
                        nik_wali: '',
                        tahun_lahir_wali: '',
                        telp_rumah: '',
                        no_hp: '',
                        email: '',
                        tinggi_badan: '',
                        berat_badan: '',
                        lingkar_kepala: '',
                        jarak_sekolah: '',
                        sebutkan_jarak: '',
                        waktu_jam: '',
                        waktu_menit: '',
                        saudara_kandung: '',
                        jenis_pendaftaran: '01) Siswa Baru',
                        nis: '',
                        tanggal_masuk: '',
                        sekolah_asal: '',
                        kecamatan_asal: '',
                        kota_asal: '',
                        hobby: 'Olahraga',
                        cita_cita: 'PNS'
                    },
                    errors: {},
                    touched: {}
                }
            },
            watch: {
                // Bersihkan conditional field jika opsi utamanya berubah
                'formData.kewarganegaraan'(val) {
                    if (val !== 'Asing (WNA)') {
                        this.formData.nama_negara = '';
                        this.errors.nama_negara = '';
                    }
                },
                'formData.kps'(val) {
                    if (val !== 'Ya') {
                        this.formData.no_kps = '';
                        this.errors.no_kps = '';
                    }
                },
                'formData.kip'(val) {
                    if (val !== 'Ya') {
                        this.formData.no_kip = '';
                        this.formData.nama_kip = '';
                        this.errors.no_kip = '';
                        this.errors.nama_kip = '';
                    }
                },
                'formData.layak_pip'(val) {
                    if (val !== 'Ya') {
                        this.formData.alasan_pip = 'Bukan Penerima / Tidak Ada';
                        this.errors.alasan_pip = '';
                    }
                },
                'formData.jarak_sekolah'(val) {
                    if (val !== 'Lebih dari 1 km') {
                        this.formData.sebutkan_jarak = '';
                        this.errors.sebutkan_jarak = '';
                    }
                },
                'formData.tempat_tinggal'(val) {
                    if (val !== 'Wali') {
                        this.formData.nama_wali = '';
                        this.formData.nik_wali = '';
                        this.formData.tahun_lahir_wali = '';
                        this.errors.nama_wali = '';
                        this.errors.nik_wali = '';
                        this.errors.tahun_lahir_wali = '';
                    }
                }
            },
            methods: {
                touchField(field) {
                    this.touched[field] = true;
                    this.validateField(field);
                },
                validateField(field) {
                    const value = this.formData[field];

                    if (field === 'nama') {
                        if (!value) this.errors.nama = 'Nama lengkap wajib diisi.';
                        else if (value.trim().length < 3) this.errors.nama = 'Nama minimal berkisar 3 karakter.';
                        else delete this.errors.nama;
                    }
                    if (field === 'gender') {
                        if (!value) this.errors.gender = 'Silakan pilih jenis kelamin.';
                        else delete this.errors.gender;
                    }
                    if (field === 'nisn' && value) {
                        if (!/^\d{10}$/.test(value)) this.errors.nisn = 'NISN harus berisi tepat 10 digit angka.';
                        else delete this.errors.nisn;
                    }
                    if (field === 'nama_negara' && this.formData.kewarganegaraan === 'Asing (WNA)') {
                        if (!value) this.errors.nama_negara = 'Nama negara asal wajib diisi.';
                        else delete this.errors.nama_negara;
                    }
                    if (field === 'nik') {
                        if (!value) this.errors.nik = 'NIK wajib diisi.';
                        else if (!/^\d{16}$/.test(value)) this.errors.nik = 'NIK harus berisi tepat 16 digit angka.';
                        else delete this.errors.nik;
                    }
                    if (field === 'no_kk') {
                        if (!value) this.errors.no_kk = 'Nomor Kartu Keluarga wajib diisi.';
                        else if (!/^\d{16}$/.test(value)) this.errors.no_kk = 'Nomor KK harus berisi tepat 16 digit angka.';
                        else delete this.errors.no_kk;
                    }
                    if (field === 'tempat_lahir') {
                        if (!value) this.errors.tempat_lahir = 'Tempat lahir wajib diisi.';
                        else delete this.errors.tempat_lahir;
                    }
                    if (field === 'tanggal_lahir') {
                        if (!value) this.errors.tanggal_lahir = 'Tanggal lahir wajib diisi.';
                        else delete this.errors.tanggal_lahir;
                    }
                    if (field === 'no_akta') {
                        if (!value) this.errors.no_akta = 'No registrasi akta lahir wajib diisi.';
                        else delete this.errors.no_akta;
                    }
                    if (field === 'alamat') {
                        if (!value) this.errors.alamat = 'Alamat jalan wajib diisi.';
                        else delete this.errors.alamat;
                    }
                    if (field === 'rt') {
                        if (!value) this.errors.rt = 'RT wajib diisi.';
                        else if (!/^\d+$/.test(value)) this.errors.rt = 'Hanya format angka.';
                        else delete this.errors.rt;
                    }
                    if (field === 'rw') {
                        if (!value) this.errors.rw = 'RW wajib diisi.';
                        else if (!/^\d+$/.test(value)) this.errors.rw = 'Hanya format angka.';
                        else delete this.errors.rw;
                    }
                    if (field === 'kelurahan') {
                        if (!value) this.errors.kelurahan = 'Kelurahan/Desa wajib diisi.';
                        else delete this.errors.kelurahan;
                    }
                    if (field === 'kecamatan') {
                        if (!value) this.errors.kecamatan = 'Kecamatan wajib diisi.';
                        else delete this.errors.kecamatan;
                    }
                    if (field === 'kode_pos') {
                        if (!value) this.errors.kode_pos = 'Kode pos wajib diisi.';
                        else if (!/^\d{5}$/.test(value)) this.errors.kode_pos = 'Harus berisi tepat 5 digit angka.';
                        else delete this.errors.kode_pos;
                    }
                    if (field === 'anak_ke') {
                        if (value === '' || value === null) this.errors.anak_ke = 'Wajib diisi.';
                        else if (value < 1) this.errors.anak_ke = 'Minimal bernilai angka 1.';
                        else delete this.errors.anak_ke;
                    }
                    if (field === 'kps') {
                        if (!value) this.errors.kps = 'Status KPS/PKH wajib dipilih.';
                        else delete this.errors.kps;
                    }
                    if (field === 'no_kps' && this.formData.kps === 'Ya') {
                        if (!value) this.errors.no_kps = 'Nomor KPS/PKH wajib dilampirkan.';
                        else delete this.errors.no_kps;
                    }
                    if (field === 'kip') {
                        if (!value) this.errors.kip = 'Status KIP wajib dipilih.';
                        else delete this.errors.kip;
                    }
                    if (this.formData.kip === 'Ya') {
                        if (field === 'no_kip' && !value) this.errors.no_kip = 'Nomor KIP wajib diisi.';
                        else if (field === 'no_kip') delete this.errors.no_kip;

                        if (field === 'nama_kip' && !value) this.errors.nama_kip = 'Nama di KIP wajib diisi.';
                        else if (field === 'nama_kip') delete this.errors.nama_kip;
                    }
                    if (field === 'layak_pip') {
                        if (!value) this.errors.layak_pip = 'Status kelayakan PIP wajib dipilih.';
                        else delete this.errors.layak_pip;
                    }
                    if (field === 'alasan_pip' && this.formData.layak_pip === 'Ya') {
                        if (value === 'Bukan Penerima / Tidak Ada') this.errors.alasan_pip = 'Silakan pilih alasan kelayakan yang sesuai.';
                        else delete this.errors.alasan_pip;
                    }
                    if (field === 'nama_ayah') {
                        if (!value) this.errors.nama_ayah = 'Nama ayah kandung wajib diisi.';
                        else delete this.errors.nama_ayah;
                    }
                    if (field === 'nik_ayah') {
                        if (!value) this.errors.nik_ayah = 'NIK ayah wajib diisi.';
                        else if (!/^\d{16}$/.test(value)) this.errors.nik_ayah = 'Harus 16 digit angka.';
                        else delete this.errors.nik_ayah;
                    }
                    if (field === 'tahun_lahir_ayah') {
                        if (!value) this.errors.tahun_lahir_ayah = 'Tahun lahir ayah wajib diisi.';
                        else if (!/^\d{4}$/.test(value) || value < 1930 || value > 2026) this.errors.tahun_lahir_ayah = 'Tahun lahir tidak valid.';
                        else delete this.errors.tahun_lahir_ayah;
                    }
                    if (field === 'nama_ibu') {
                        if (!value) this.errors.nama_ibu = 'Nama ibu kandung wajib diisi.';
                        else delete this.errors.nama_ibu;
                    }
                    if (field === 'nik_ibu') {
                        if (!value) this.errors.nik_ibu = 'NIK ibu wajib diisi.';
                        else if (!/^\d{16}$/.test(value)) this.errors.nik_ibu = 'Harus 16 digit angka.';
                        else delete this.errors.nik_ibu;
                    }
                    if (field === 'tahun_lahir_ibu') {
                        if (!value) this.errors.tahun_lahir_ibu = 'Tahun lahir ibu wajib diisi.';
                        else if (!/^\d{4}$/.test(value) || value < 1930 || value > 2026) this.errors.tahun_lahir_ibu = 'Tahun lahir tidak valid.';
                        else delete this.errors.tahun_lahir_ibu;
                    }
                    if (this.formData.tempat_tinggal === 'Wali') {
                        if (field === 'nama_wali' && !value) this.errors.nama_wali = 'Nama wali wajib diisi.';
                        else if (field === 'nama_wali') delete this.errors.nama_wali;

                        if (field === 'nik_wali' && !value) this.errors.nik_wali = 'NIK wali wajib diisi.';
                        else if (field === 'nik_wali' && !/^\d{16}$/.test(value)) this.errors.nik_wali = 'Harus 16 digit angka.';
                        else if (field === 'nik_wali') delete this.errors.nik_wali;

                        if (field === 'tahun_lahir_wali' && !value) this.errors.tahun_lahir_wali = 'Tahun lahir wajib diisi.';
                        else if (field === 'tahun_lahir_wali' && (!/^\d{4}$/.test(value) || value < 1930 || value > 2026)) this.errors.tahun_lahir_wali = 'Tahun tidak valid.';
                        else if (field === 'tahun_lahir_wali') delete this.errors.tahun_lahir_wali;
                    }
                    if (field === 'no_hp') {
                        if (!value) this.errors.no_hp = 'Nomor HP aktif wajib diisi.';
                        else if (!/^08\d{8,12}$/.test(value)) this.errors.no_hp = 'Format salah (Gunakan pola awal 08, panjang 10-14 digit).';
                        else delete this.errors.no_hp;
                    }
                    if (field === 'email' && value) {
                        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) this.errors.email = 'Format email tidak valid.';
                        else delete this.errors.email;
                    }
                    if (field === 'tinggi_badan') {
                        if (!value) this.errors.tinggi_badan = 'Wajib diisi.';
                        else if (value < 30 || value > 250) this.errors.tinggi_badan = 'Isian tinggi badan tidak masuk akal.';
                        else delete this.errors.tinggi_badan;
                    }
                    if (field === 'berat_badan') {
                        if (!value) this.errors.berat_badan = 'Wajib diisi.';
                        else if (value < 5 || value > 150) this.errors.berat_badan = 'Isian berat badan tidak masuk akal.';
                        else delete this.errors.berat_badan;
                    }
                    if (field === 'lingkar_kepala') {
                        if (!value) this.errors.lingkar_kepala = 'Wajib diisi.';
                        else if (value < 20 || value > 80) this.errors.lingkar_kepala = 'Isian tidak valid.';
                        else delete this.errors.lingkar_kepala;
                    }
                    if (field === 'jarak_sekolah') {
                        if (!value) this.errors.jarak_sekolah = 'Wajib diisi.';
                        else delete this.errors.jarak_sekolah;
                    }
                    if (field === 'sebutkan_jarak' && this.formData.jarak_sekolah === 'Lebih dari 1 km') {
                        if (!value) this.errors.sebutkan_jarak = 'Detail jarak wajib dicantumkan.';
                        else delete this.errors.sebutkan_jarak;
                    }
                    if (field === 'waktu_menit') {
                        if (this.formData.waktu_jam === '' && this.formData.waktu_menit === '') this.errors.waktu_menit = 'Waktu tempuh wajib ditentukan.';
                        else delete this.errors.waktu_menit;
                    }
                    if (field === 'saudara_kandung') {
                        if (value === '' || value === null) this.errors.saudara_kandung = 'Wajib diisi.';
                        else delete this.errors.saudara_kandung;
                    }
                    if (field === 'nis') {
                        if (!value) this.errors.nis = 'Nomor Induk Siswa wajib diisi.';
                        else delete this.errors.nis;
                    }
                    if (field === 'tanggal_masuk') {
                        if (!value) this.errors.tanggal_masuk = 'Tanggal masuk sekolah wajib diisi.';
                        else delete this.errors.tanggal_masuk;
                    }
                    if (field === 'sekolah_asal') {
                        if (!value) this.errors.sekolah_asal = 'Nama sekolah asal wajib diisi.';
                        else delete this.errors.sekolah_asal;
                    }
                },
                inputClass(field) {
                    const hasError = this.errors[field] && this.touched[field];
                    return [
                        'w-full bg-slate-950/60 border rounded-xl px-4 py-2.5 text-slate-100 placeholder-slate-600 focus:outline-none focus:ring-1 transition-all font-sans',
                        hasError ?
                        'border-red-500/80 focus:border-red-500 focus:ring-red-500 bg-red-950/10' :
                        'border-slate-800 hover:border-slate-700 focus:border-blue-500 focus:ring-blue-500'
                    ];
                },
                selectClass(field) {
                    const hasError = this.errors[field] && this.touched[field];
                    return [
                        'w-full bg-slate-950/80 border rounded-xl px-4 py-2.5 text-slate-300 focus:outline-none focus:ring-1 transition-all cursor-pointer appearance-none bg-[url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2394a3b8%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E")] bg-[length:10px_10px] bg-[right_16px_center] bg-no-repeat pr-10',
                        hasError ?
                        'border-red-500/80 focus:border-red-500 focus:ring-red-500 bg-red-950/10' :
                        'border-slate-800 hover:border-slate-700 focus:border-blue-500 focus:ring-blue-500'
                    ];
                },
                radioClass(field, value) {
                    const isSelected = this.formData[field] === value;
                    const hasError = this.errors[field] && this.touched[field];
                    return [
                        'flex items-center justify-center px-4 py-2.5 border rounded-xl cursor-pointer transition-all select-none',
                        isSelected ?
                        'border-blue-500 bg-blue-500/10 text-white shadow-lg shadow-blue-500/10' :
                        hasError ?
                        'border-red-500/50 bg-red-950/5 text-slate-400' :
                        'border-slate-800 bg-slate-950/40 text-slate-400 hover:bg-slate-800/40 hover:text-slate-200'
                    ];
                },
                handleSubmit() {
                    // Paksa sentuh semua field agar validasi menyala menyeluruh
                    Object.keys(this.formData).forEach(key => {
                        this.touched[key] = true;
                        this.validateField(key);
                    });

                    const errorCount = Object.keys(this.errors).length;
                    if (errorCount > 0) {
                        alert(`Gagal menyimpan! Masih terdapat ${errorCount} kolom isian yang salah atau kosong.`);

                        // Scroll otomatis ke elemen error pertama
                        this.$nextTick(() => {
                            const firstErrorEl = document.querySelector('.text-red-400');
                            if (firstErrorEl) {
                                firstErrorEl.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center'
                                });
                            }
                        });
                    } else {
                        alert('Formulir berhasil disubmit! Seluruh data tervalidasi dengan benar.');
                    }
                }
            },
            mounted() {
                // Inisialisasi Flatpickr ke semua input bertanda khusus
                flatpickr(".datepicker", {
                    locale: "id",
                    dateFormat: "Y-m-d",
                    disableMobile: true,
                    onChange: (selectedDates, dateStr, instance) => {
                        const boundField = instance.element.getAttribute('data-field');
                        if (boundField) {
                            this.formData[boundField] = dateStr;
                            this.touched[boundField] = true;
                            this.validateField(boundField);
                        }
                    }
                });
            }
        }).mount('#app');
    </script>
</body>

</html>