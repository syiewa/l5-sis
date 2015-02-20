<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Home', '/', ['icon' => 'clip-home-3']);
});
Breadcrumbs::register('datastatis', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Data Statis', route('admin.datastatis.index'), ['icon' => '']);
});
Breadcrumbs::register('datastatiscreate', function($breadcrumbs) {
    $breadcrumbs->parent('datastatis');
    $breadcrumbs->push('Tambah Data', route('admin.datastatis.create'), ['icon' => '']);
});
Breadcrumbs::register('datastatisedit', function($breadcrumbs) {
    $breadcrumbs->parent('datastatis');
    $breadcrumbs->push('Edit Data', route('admin.datastatis.edit'), ['icon' => '']);
});
Breadcrumbs::register('indexberita', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Index Berita', route('admin.berita.index'), ['icon' => '']);
});
Breadcrumbs::register('indexberitacreate', function($breadcrumbs) {
    $breadcrumbs->parent('indexberita');
    $breadcrumbs->push('Tambah Berita', route('admin.berita.create'), ['icon' => '']);
});
Breadcrumbs::register('indexberitaedit', function($breadcrumbs) {
    $breadcrumbs->parent('indexberita');
    $breadcrumbs->push('Edit Berita', route('admin.berita.edit'), ['icon' => '']);
});
Breadcrumbs::register('pengumuman', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Pengumuman', route('admin.pengumuman.index'), ['icon' => '']);
});
Breadcrumbs::register('pengumumancreate', function($breadcrumbs) {
    $breadcrumbs->parent('pengumuman');
    $breadcrumbs->push('Tambah Pengumuman', route('admin.pengumuman.create'), ['icon' => '']);
});
Breadcrumbs::register('pengumumanedit', function($breadcrumbs) {
    $breadcrumbs->parent('pengumuman');
    $breadcrumbs->push('Edit Pengumuman', route('admin.pengumuman.edit'), ['icon' => '']);
});
Breadcrumbs::register('agenda', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Agenda', route('admin.agenda.index'), ['icon' => '']);
});
Breadcrumbs::register('agendacreate', function($breadcrumbs) {
    $breadcrumbs->parent('agenda');
    $breadcrumbs->push('Tambah Agenda', route('admin.agenda.create'), ['icon' => '']);
});
Breadcrumbs::register('agendaedit', function($breadcrumbs) {
    $breadcrumbs->parent('agenda');
    $breadcrumbs->push('Edit Agenda', route('admin.agenda.edit'), ['icon' => '']);
});
Breadcrumbs::register('kelas', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Kelas', route('admin.kelas.index'), ['icon' => '']);
});
Breadcrumbs::register('kelascreate', function($breadcrumbs) {
    $breadcrumbs->parent('kelas');
    $breadcrumbs->push('Tambah Kelas', route('admin.kelas.create'), ['icon' => '']);
});
Breadcrumbs::register('kelasedit', function($breadcrumbs) {
    $breadcrumbs->parent('kelas');
    $breadcrumbs->push('Edit Kelas', route('admin.kelas.edit'), ['icon' => '']);
});
Breadcrumbs::register('siswa', function($breadcrumbs, $id) {
    $breadcrumbs->parent('kelas');
    $breadcrumbs->push('Siswa', route('admin.kelas.{id}.siswa.index',$id), ['icon' => '']);
});
Breadcrumbs::register('siswacreate', function($breadcrumbs, $id) {
    $breadcrumbs->parent('siswa',$id);
    $breadcrumbs->push('Tambah Siswa', url('admin.kelas.{id}.siswa.create', $id), ['icon' => '']);
});
Breadcrumbs::register('siswaedit', function($breadcrumbs,$id) {
    $breadcrumbs->parent('siswa',$id);
    $breadcrumbs->push('Edit Siswa', route('admin.kelas.{id}.siswa.edit', $id), ['icon' => '']);
});
Breadcrumbs::register('pegawai', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Data Pegawai', route('admin.pegawai.index'), ['icon' => '']);
});
Breadcrumbs::register('pegawaicreate', function($breadcrumbs) {
    $breadcrumbs->parent('pegawai');
    $breadcrumbs->push('Tambah Pegawai', route('admin.pegawai.create'), ['icon' => '']);
});
Breadcrumbs::register('pegawaiedit', function($breadcrumbs) {
    $breadcrumbs->parent('pegawai');
    $breadcrumbs->push('Edit Pegawai', route('admin.pegawai.edit'), ['icon' => '']);
});
Breadcrumbs::register('polling', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Data Polling', route('admin.polling.index'), ['icon' => '']);
});
Breadcrumbs::register('pollingcreate', function($breadcrumbs) {
    $breadcrumbs->parent('polling');
    $breadcrumbs->push('Tambah Polling', route('admin.polling.create'), ['icon' => '']);
});
Breadcrumbs::register('pollingedit', function($breadcrumbs) {
    $breadcrumbs->parent('polling');
    $breadcrumbs->push('Edit Polling', route('admin.polling.edit'), ['icon' => '']);
});
Breadcrumbs::register('jawaban', function($breadcrumbs, $id) {
    $breadcrumbs->parent('polling');
    $breadcrumbs->push('Jawaban', route('admin.polling.{id}.jawaban.index',$id), ['icon' => '']);
});
Breadcrumbs::register('jawabancreate', function($breadcrumbs, $id) {
    $breadcrumbs->parent('jawaban',$id);
    $breadcrumbs->push('Tambah Jawaban', url('admin.polling.{id}.jawaban.create', $id), ['icon' => '']);
});
Breadcrumbs::register('jawabanedit', function($breadcrumbs,$id) {
    $breadcrumbs->parent('jawaban',$id);
    $breadcrumbs->push('Edit Jawaban', route('admin.polling.{id}.jawaban.edit', $id), ['icon' => '']);
});
Breadcrumbs::register('galeri', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Data Galeri', route('admin.galeri.index'), ['icon' => '']);
});
Breadcrumbs::register('galericreate', function($breadcrumbs) {
    $breadcrumbs->parent('galeri');
    $breadcrumbs->push('Tambah Galeri', route('admin.galeri.create'), ['icon' => '']);
});
Breadcrumbs::register('galeriedit', function($breadcrumbs) {
    $breadcrumbs->parent('galeri');
    $breadcrumbs->push('Edit Galeri', route('admin.galeri.edit'), ['icon' => '']);
});
Breadcrumbs::register('foto', function($breadcrumbs, $id) {
    $breadcrumbs->parent('galeri');
    $breadcrumbs->push('Foto', route('admin.galeri.{id}.foto.index',$id), ['icon' => '']);
});
Breadcrumbs::register('fotocreate', function($breadcrumbs, $id) {
    $breadcrumbs->parent('foto',$id);
    $breadcrumbs->push('Tambah Foto', url('admin.galeri.{id}.foto.create', $id), ['icon' => '']);
});
Breadcrumbs::register('fotoedit', function($breadcrumbs,$id) {
    $breadcrumbs->parent('foto',$id);
    $breadcrumbs->push('Edit Foto', route('admin.galeri.{id}.foto.edit', $id), ['icon' => '']);
});
Breadcrumbs::register('absensi', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Data Absensi', route('admin.absensi.index'), ['icon' => '']);
});
Breadcrumbs::register('absensicreate', function($breadcrumbs) {
    $breadcrumbs->parent('absensi');
    $breadcrumbs->push('Tambah Absensi', route('admin.absensi.create'), ['icon' => '']);
});
Breadcrumbs::register('absensiedit', function($breadcrumbs) {
    $breadcrumbs->parent('absensi');
    $breadcrumbs->push('Edit Absensi', route('admin.absensi.edit'), ['icon' => '']);
});