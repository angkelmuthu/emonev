SELECT `a`.`id_dak_komponen`, `a`.`nama_dak_komponen`, SUM(c.total) AS gtotal
FROM `m_dak_komponen` `a`
LEFT JOIN m_dak_komponen_sub b ON a.id_dak_komponen=b.id_dak_komponen
LEFT JOIN `v_rincian` `c` ON `b`.`id_dak_komponen_sub`=`c`.`id_dak_komponen_sub` AND `c`.`id_dak_alokasi`=1029
GROUP BY `a`.`id_dak_komponen`