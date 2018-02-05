/* Create Database and Table */
create database formsurat;

use formsurat;

CREATE TABLE `surat` (
  `id` int(11) NOT NULL auto_increment,
  `nomor` varchar(30),
  `tanggal` date(20),
  `penerima` text(30),
  `perihal` text(30),
  `alamat` text(30),
  `isi` text(100),
  `tembusan` varchar(15),
  PRIMARY KEY  (`id`)
);
