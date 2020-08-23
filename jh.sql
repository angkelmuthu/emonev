SELECT `c`.`id_rincian` AS `id_rincian`,`a`.`id_dak_komponen_sub` AS `id_dak_komponen_sub`,`a`.`id_dak_alokasi` AS `id_dak_alokasi`,`a`.`id_menu_kegiatan` AS `id_menu_kegiatan`,`a`.`nama_menu_kegiatan` AS `nama_menu_kegiatan`,`b`.`id_dak_rincian` AS `id_dak_rincian`,`b`.`nama_dak_rincian` AS `nama_dak_rincian`,`c`.`id_alkes` AS `id_alkes`,`z`.`kode_alkes` AS `kode_alkes`,`z`.`nama_alkes` AS `nama_alkes`,`c`.`volume` AS `volume`,`d`.`satuan` AS `satuan`,`c`.`harga_satuan` AS `harga_satuan`,`c`.`total` AS `total`,`e`.`nama_rs_sarana` AS `nama_rs_sarana`,`f`.`nama_rs_ruangan` AS `nama_rs_ruangan`,`g`.`nama_rs_instalasi` AS `nama_rs_instalasi`
FROM (((((((`t_dak_menu_kegiatan` `a`
LEFT JOIN t_dak_kegiatan aa ON a.id_menu_kegiatan=aa.id_menu_kegiatan
LEFT JOIN `t_dak_rincian` `c` ON(aa.id_kegiatan = c.id_kegiatan))
LEFT JOIN `m_dak_rincian` `b` ON(`c`.`id_dak_rincian` = `b`.`id_dak_rincian`))
LEFT JOIN `m_alkes` `z` ON(`c`.`id_alkes` = `z`.`id_alkes`))
LEFT JOIN `m_satuan` `d` ON(`c`.`satuan` = `d`.`kdsatuan`))
LEFT JOIN `m_rs_sarana` `e` ON(`c`.`sarana` = `e`.`kode_rs_sarana`))
LEFT JOIN `m_rs_ruangan` `f` ON(`e`.`kode_rs_ruangan` = `f`.`kode_rs_ruangan`))
LEFT JOIN `m_rs_instalasi` `g` ON(`f`.`kode_rs_instalasi` = `g`.`kode_rs_instalasi`))