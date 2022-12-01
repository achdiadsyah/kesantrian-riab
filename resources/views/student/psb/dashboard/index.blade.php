<div class="col-12">

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Jalur Undangan
            </h4>
        </div>
        <div class="card-body">
            <ol>
                <li>Undangan santri berprestasi yang diterima sejumlah <?= psb_detail("kapasitas_undangan"); ?> santri dari seluruh SMP/ MTs se-Aceh mulai <b><?=date_indo(psb_detail("buka_daftar_undangan"));?> s.d. <?=date_indo(psb_detail("tutup_daftar_undangan"))?></b>.</li>
                <li>Peserta wajib melakukan pendaftaran akun dan upload berkas administrasi melalui menu <b>Daftar</b></li>
                <li><b>Kode Undangan</b> dapat di minta kepada panitia</li>
                <li>Kontak Person : <b><?= psb_detail("contact_person_1"); ?> / <?= psb_detail("contact_person_2"); ?></b></li>
                <li>Pengumuman kelulusan administrasi santri berprestasi <b><?= date_indo(psb_detail("pengumuman_adm_undangan")); ?></b>. Melalui Melalui website <a href="https://<?= sekolah_detail("web_sekolah"); ?>"><b><?= sekolah_detail("nama_sekolah"); ?></b></a> atau Fanspage Facebook <b><?= sekolah_detail("nama_sekolah"); ?></b></li>
                <li>Pelaksanaan test santri jalur undangan yang lulus administrasi <b><?= date_indo(psb_detail("tes_undangan")); ?></b>.</li>
                <li>Pengumuman kelulusan santri jalur undangan pada tanggal <b><?= date_indo(psb_detail("pengumuman_undangan")); ?></b>. Melalui Melalui menu : <a href="<?=base_url('pengumuman/undangan');?>"><b>Pengumuman Kelulusan Jalur Undangan</b></a> atau Fanspage Facebook <b><?= sekolah_detail("nama_sekolah"); ?></b></li>
                <li>Pendaftaran ulang santri jalur undangan tanggal <b><?= date_indo(psb_detail("buka_daftar_ulang_undangan")); ?></b> s.d <b><?= date_indo(psb_detail("tutup_daftar_ulang_undangan")); ?>.</b></li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Jalur Reguler
            </h4>
        </div>
        <div class="card-body">
            <ol>
                <li>Pendaftaran secara online langsung melalui menu <b>Daftar</b></li>
                <li>Pendaftaran secara offline <b>Tidak di Buka</b> mengingat pandemi <b>COVID-19</b> masih berlangsung di Aceh</li>
                <li>Kontak Person : <b><?= psb_detail("contact_person_1"); ?> / <?= psb_detail("contact_person_2"); ?></b></li>
                <li>Pendaftaran reguler mulai tanggal <b><?=date_indo(psb_detail("buka_daftar_reguler"));?> s.d. <?=date_indo(psb_detail("tutup_daftar_reguler"))?></b></li>
                <li>Pelaksanaan Tes reguler pada tanggal <b><?=date_indo(psb_detail("buka_tes_reguler"))?> s.d. <?=date_indo(psb_detail("tutup_tes_reguler"))?></b> di Kampus <b><?= sekolah_detail("nama_sekolah"); ?></b>.</li>
                <li>Datang dan Mengikuti Ujian pada tanggal dan sesi yang telah di tentukan pada Lembar Nomor Ujian. Guna Mengantisipasi keramaian dalam lingkugan Kampus <b><?= sekolah_detail("nama_sekolah"); ?></b></li>
                <li>Jangan Lupa <b>Selalu menggunakan Masker saat ujian berlangsung</b>, dan selama berada di dalam lingkungan Kampus <b><?= sekolah_detail("nama_sekolah"); ?></b></li>
                <li>Pengumuman tes reguler pada tanggal <b><?=date_indo(psb_detail("pengumuman_reguler"))?></b>. Melalui menu: <a href="<?=base_url('pengumuman/reguler');?>"><b>Pengumuman Kelulusan Jalur Reguler</b></a> atau Fanspage Facebook <b><?= sekolah_detail("nama_sekolah"); ?></b>.</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Syarat Pendaftaran ( Jalur Reguler )
            </h4>
        </div>
        <div class="card-body">
            <ol>
                <li>Lulusan SMP/ MTs. Negeri/ Swasta</li>
                <li>Umur Maksimal 16 Tahun</li>
                <li>Biaya Pendaftaran sebesar <?= rupiah(psb_detail('biaya_psb')); ?>. Rekening tujuan trasnfer dapat di lihat pada menu <a href="<?= base_url('home/biaya'); ?>"><b>Biaya Pendaftaran</b></a></li>
                <li>Menyerahkan syarat pendaftaran berikut pada waktu pelaksanaan tes:
                    <ul>
                        <li>Fotokopi rapor MTs/ SMP semester 1,2,3 dan 4 yang telah dilegalisir</li>
                        <li>Surat keterangan peringkat kelas dari sekolah/madrasah (jika ada)</li>
                        <li>Melampirkan fotokopi sertifikat prestasi akademik dan non akademik (jika ada)</li>
                        <li>Pasfoto warna ukuran 3 x 4 sebanyak 2 lembar</li>
                        <li>Melampirkan bukti transfer / pembayaran</li>
                        <li>Tidak memiliki riwayat penyakit kronis</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Ketentuan Lain
            </h4>
        </div>
        <div class="card-body">
            <ol>
                <li>Informasi masuk asrama, pertemuan wali santri akan di beritahukan pada waktu Pendaftaran Ulang</li>
                <li>Pilihan jurusan tertera pada Form Pendaftaran</li>
                <li>Berpakaian Muslim/Muslimah pada saat mengikuti Tes</li>    
                <li>Jangan Lupa <b>Selalu menggunakan Masker saat ujian berlangsung</b>, dan selama berada di dalam lingkungan Kampus <b><?= sekolah_detail("nama_sekolah"); ?></b></li>
            </ol>
        </div>
    </div>

</div>