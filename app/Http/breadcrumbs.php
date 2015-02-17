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
