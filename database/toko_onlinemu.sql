-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 01:31 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_onlinemu`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(5) NOT NULL,
  `jdl_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `album_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `hits_album` int(5) NOT NULL DEFAULT 1,
  `tgl_posting` date NOT NULL,
  `jam` time NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `keterangan`, `gbr_album`, `aktif`, `hits_album`, `tgl_posting`, `jam`, `hari`, `username`) VALUES
(30, 'Konser Kantata Barock 2011', 'konser-kantata-barock-2011', 'Para macan tua yang digawangi Iwan Fals, Setiawan Djody dan Sawung Jabo di Stadion Gelora Bung Karno, Jakarta,\r\nJumat (30/12) malam. Kantata kembali membawakan lagu-lagu legendarisnya\r\nsetelah 21 tahun vakum dari dunia musik.\r\n<div style=\"overflow: hidden; color: #000000; background-color: #ffffff; text-align: left; text-decoration: none; border: medium none\">\r\n<br />\r\n</div>\r\n', '4520kantata_barock.jpg', 'Y', 34, '2012-08-20', '09:12:06', 'Senin', 'admin'),
(31, 'Festival Terbesar di Dunia', 'festival-seni-terbesar-di-dunia', '', '13festival_seni.jpg', 'Y', 45, '2012-08-20', '09:40:01', 'Senin', 'admin'),
(28, 'Murah Meriah di Asemka', 'murah-meriah-di-pasar-asemka', 'Pasar Asemka, Jakarta, merupakan pasar grosir yang banyak menyediakan berbagai aksesoris seperti kalung, cincin, Souvenir pernakahan, dan lainnya. Di Pasara Asemka anda akan dimanjakan dengan beragam barang yang dibandrol dengan harga murah meriah dan biasanya dijual grosiran. \r\n', '18asemka.jpg', 'Y', 191, '2012-08-18', '23:14:05', 'Sabtu', 'admin'),
(29, 'Karpet Raksasa dari Bunga', 'karpet-raksasa-dari-bunga', 'Belgia sedang memperingati peristiwa tahunan &quot;La Fete De La Fleur&quot; atau pesta bunga di bulan Agustus. Ahli bunga merancang karpet raksasa dari bunga di depan Grand Place di Brussel. Karpet ini dibuat menggunakan 700 ribu bunga.\r\n', '92bungaraksasa2.jpg', 'Y', 101, '2012-08-19', '03:02:27', 'Minggu', 'admin'),
(47, 'asdadasd', 'asdadasd', '<p>asdasdas</p>\r\n', 'eecace2909030bce46bae8627b7c0ee6.png', 'Y', 0, '2019-07-26', '09:33:59', 'Jumat', 'admin'),
(48, 'asdadasd', 'asdadasd', '<p>asdasdas</p>\r\n', '1564108505hukum-meninggalkan-sholat.png', 'Y', 0, '2019-07-26', '09:35:05', 'Jumat', 'admin'),
(49, 'asdadasd', 'asdadasd', '<p>asdasdas</p>\r\n', 'phpmu_hukum-meninggalkan-sholat.png', 'Y', 0, '2019-07-26', '09:35:20', 'Jumat', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sub_judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `youtube` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `utama` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `isi_berita` longtext CHARACTER SET latin1 NOT NULL,
  `keterangan_gambar` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT 1,
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`) VALUES
(4, 55, 'admin', 'Hijab Tutorial Segitiga Instan Sasya Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-segitiga-instan-sasya-original-by-hijab-wanita-cantik', 'N', 'N', 'Y', '<p>Tulisan ini khususkan&nbsp;untuk siapa saja yang ingin atau sedang mengerjakan Bisnis MLM, terlebih bagi yang ingin&nbsp;untuk meraih sukses di Bisnis MLM.&nbsp;Apakah anda adalah orang yang dimaksud ? Ataukah anda sedang mempelajari bisnis MLM ? Apa pendapat Anda tentang bisnis MLM ? Banyak paradigma negative yang berkembangdi masyarakat, sehingga mereka memberikan penilaian buruk mengenai bisnis MLM.&nbsp;<br />\r\n<br />\r\nBahkan banyak orang awam mengatakan bisnis MLM adalah bisnis menjual Mimpi, bisnis yang tidak masuk akal. Sebelum anda membaca lebih jauh, mari kita singkirkan dulu paradigma negative mengenai bisnis MLM. Terimakasih Anda masih terus membaca, tulisan ini saya buat bukan karena saya sekolah khusus di bidang marketing atau telah mencapai tingkat kesuksesan yang gemilang di bisnis MLM, tetapi pengalamanlah yang membuat saya mampu menuliskannya. Semoga yang sedikit ini dapat bermanfaat bagi anda.&nbsp;<br />\r\n<br />\r\nSaya pertama kali mengenal bisnis MLM pada usia yang masih dini untuk berbisnis, yaitu 15 tahun saat itu saya masih di bangku SMA bergabung di salah satu perusahaan besar milik Amerika. Pada usia tersebut pemahaman saya masih sangat bersih terhadap bisnis MLM, sehingga apapun ilmu yang di berikan dapat saya terima dengan baik. Dua tahun kemudian saya tertarik bergabung di sebuah perusahaan Direct Selling Kosmetika terbesar di Indonesia milik Amerika saat itu tahun 1994 sampai tahun 2006 hingga akhirnya perusahaan tersebut menutup bisnisnya di Indonesia.<br />\r\n<br />\r\nSejak tahun 2006 hingga tahun 2009 saya banyak keluar masuk dibeberapa MLM dan Direct selling Indonesia, dan saat ini saya serius menekuni satu perusahaan direct Delling MLM milik perusahaan Swedia. Ini adalah perusahaan terakhir saya untuk coba sana sini yang ujungnya tidak jelas.&nbsp;<br />\r\n<br />\r\nSaya sangat beruntung dapat bertemu dan bergabung di perusahaan tersebut, karena saya sangat meyakini suatu hari yang sudah saya tentukan nanti saya akan dapat meraih apa yang saya inginkan setelah lebih dari 15 tahun melakukan pencarian. Anda jangan seperti saya, semoga apa yang menjadi pengalaman saya dapat menjadi bahan perbandingan bagi anda dalam menentukan pilihan perusahaan yang terbaik dan cocok buat anda, sehingga tidak buang waktu bertahun tahun untuk menemukan perusahaan mana yang tepat.</p>\r\n', 'Sukses Di Bisnis Multi Level Marketing', 'Minggu', '2018-02-18', '10:53:48', 'RV71_5_Cold_Ocean_grande.jpg', 0, 'pesiar,travel,marketing,system,bonus,wisata', 'Y'),
(5, 55, 'admin', 'Hijab Tutorial Instan Tanika Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-instan-tanika-original-by-hijab-wanita-cantik', 'N', 'N', 'Y', '<p>Baiklah sekarang kita akan membahas tentang bisnis luar biasa MLM, mengapa kita katakan luar biasa ? Karena bisnis ini mampu mengubah kehidupan banyak orang bukan hanya secara Materi tetapi juga kepribadian. Banyak orang bisa menjadi kaya dan kaya raya dengan mengerjakan bisnis MLM, kehidupan finansial mereka berubah sejalan dengan bertumbuhnya penghasilan. Orang orang yang sukses di bisnis MLM apapun, mereka adalah orang orang yang memiliki kepribadian yang mulia dan baik.&nbsp;Kesuksesan di bisnis ini ini sangat didukung oleh Sikap Mental, pola pikir dan kepribadian yang baik. Sukses bukan karena latar belakang pendidikan ataupun modal.<br />\r\n<br />\r\nJadi singkatnya bisnis MLM adalah Bisnis Manusiawi, kita akan bekerja sama dengan banyak orang, membimbing, membantu, menolong, dan lain lain yang sifatnya memberi.&nbsp;Sebagai leader, tentunya anda lebih banyak memberi kepada team anda bukan menerima, feed back dari memberi adalah menerima. Sesuatu yang akan anda terima kemudian hari adalah kesuksesan, hubungan baik, persahabatan, kekeluargaan dan mungkin Tuhan akan memberikan penilaian sebagai Ibadah karena anda telah membantu banyak orang.&nbsp;<br />\r\n<br />\r\nSikap gemar menolong memang tidak membuahkan hasil saat itu juga, anda jangan pernah berfikir kapan yang anda berikan akan menghasilkan, karena Tuhan Maha Kaya, Ia akan memberikan lebih dari apa yang sudah kita tanam.&nbsp;</p>\r\n', 'Sukses sejati datang didari dalam diri.', 'Minggu', '2018-02-18', '10:53:29', 'KYB4_14_Soft_Lavender_1024x1024_f993283a-dae0-4a05-b163-9f6b44465732_grande.jpg', 0, 'pesiar,umrah,marketing,system,bonus', 'Y'),
(6, 55, 'admin', 'Hijab Tutorial Instan Jenna Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-instan-jenna-original-by-hijab-wanita-cantik', 'N', 'N', 'Y', '<p>Untuk membangun jaringan yang besar dan kuat , seorang distributor MLM perlu kerja keras, semangat , kesabaran dan ketekunan. Selain kerja keras , anda juga perlu melakukan kerja cerdas. Berikut ada 6 strategi yang bisa anda lakukan untuk membangun secara cerdas jaringan bisnis MLM anda.</p>\r\n\r\n<p><strong>1. Membangun Impian Bersama</strong></p>\r\n\r\n<p>Membangun impian adalah pertama yang selalu dianjurkan ketika mulai menjalankan bisnis MLM , tetapi hal yang tidak kalah pentingnya adalah membangun impian bersama. Pertemukan bersama impian anggota jaringan anda. Satukan langkah dan coba semakan visi dan presepsi dulu , baru kemudian bangun jaringan bisnis MLM anda.</p>\r\n\r\n<p><strong>2. Lakukan Duplikasi</strong></p>\r\n\r\n<p>Ingin jaringan bisnis anda berkembang baik ? Lakukan duplikasi dengan benar dan bertahap. Di network marketing , tanpa ada duplikasi , bisnis MLM anda akan berjalan lambat dan kurang gairah. Anda harus meniru langkah orang yang sudah sukses di bisnis MLM anda , dan kembangkan keahlian itu dalam diri anda. Sesudah menguasai hal itu ajarkan kepada downline anda dengan sabar dan tekun tahap demi tahap sesuai dengan kemampuan dari downline anda. Anda harus siap membayar harganya jika ingin mencapai sukses , dengan bekerja keras dan menyediakan waktu untuk bisa membentuk jaringan yang besar.</p>\r\n\r\n<p><strong>3. Terus Belajar dan Inovatif</strong></p>\r\n\r\n<p>Banyak leader &ndash; leader MLM yang sukses dan cepat meraih keberhasilan karena banyak belajar. Tentunya anda harus belajar dari upline atau leader anda , lakukan sharing , Tanya jawab dan solusi pemecahan masalah. Belajar juga bisa dilakukan dengan menghadiri acara presentasi bisnis. Dengarkan dan catat semua tips dan kiat &ndash; kiat sukses dari para leader untuk membangun semangat anda. Yang juga penting adalah membaca buku , mendengarkan kaset dan vcd yang bermanfaat buat pengembangan diri dan pengembangan bisnis MLM anda. Jika anda punya akses internet , anda juga bisa belajar website motivasi dan website belajar online.</p>\r\n', 'Membangun impian adalah pertama yang selalu dianjurkan', 'Minggu', '2018-02-18', '10:53:12', 'AR91_95_Sheva_Maroon_1_grande.png', 1, 'pesiar,umrah,travel,marketing,system,bonus', 'Y'),
(1, 39, 'admin', 'Hijab Tutorial Instan Keylin Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-instan-keylin-original-by-hijab-wanita-cantik', 'N', 'N', 'Y', '<p>Menurut saya negara ini sangat mengagumkan dalam hal pengelolaan pertaniannya. Dengan luas wilayah yang relatif kecil bila dibandingkan Indonesia, pada tahun 2011 Belanda mampu menjadi negara peringkat 2 untuk negara pengekspor produk pertanian terbesar didunia dengan nilai ekspor mencapai 72,8 miliar Euro.</p>\r\n\r\n<p>Produk andalannya adalah benih dan bunga. Sektor pertanian merupakan pendorong utama ekonomi di Belanda dengan menyumbang 20% pendapatan nasionalnya.&nbsp;Kunci dari majunya pertanian di Belanda adalah Riset. Kebijakan-kebijakan dan teknologi di adopsi dari riset-riset yang dilakukan para ahli. Salah satu pusat riset pertanian yang terkenal disana adalah universitas Wageningen.</p>\r\n\r\n<p>Seperti yang telah di kutip pada sebuah situs bahwa negara Belanda dengan luas hanya&nbsp;41.526km persegi mampu menjadi yang lebih unggul bila dibandingkan dengan negara kita yang luasnya 1.919.440km persegi. dan perlu kita garis bawahi bahwa nyaris seluruh wilayah di Belanda ada di bawah permukaan laut.</p>\r\n\r\n<p>Kedua hal tersebut yang membawa negara Belanda selalu menjadi yang terbaik. Kemajuan sektor pertanian Belanda tidak hanya berfokus pada optimalisasi keuntungan namun juga sangat memperhatikan keberlanjutan dan keramahan lingkungan.</p>\r\n\r\n<p>Pemerintah Belanda membentuk Mentri Ekonomi, Pertanian dan Inovasi yang difungsikan untuk membawa Belanda menjadi negara yang memadukan inovasi di dalam pertanian untuk mencapai ekonomi negara yang kuat dengan mengutamakan keberlanjutan lingkungan hidup.</p>\r\n', 'Penyiraman air atau pestisida pada lahan pertanian', 'Minggu', '2018-02-18', '10:54:53', 'MK97_7_Mocca_grande.jpg', 0, 'pupuk-organik,pestisida-nabati,peternakan,pertanian', 'Y'),
(2, 39, 'admin', 'Hijab Tutorial Instan Latisha Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-instan-latisha-original-by-hijab-wanita-cantik', 'N', 'N', 'Y', '<p>Salah satu negara yang mengedepankan pertanian adalah Indonesia, negara kita ini memang dikenal sangat cocok dengan sektor pertaniannya. Dengan iklim tropis serta dikaruniai tanah subuh membuat Indonesia menjadi tempat yang sangat cocok untuk bertani. Hampir semua tumbuhan bisa tumbuh di tanah Indonesia.</p>\r\n\r\n<p>Namun ironisnya sistem pertanian serta perhatian khusus kepada para petani di Indonesia sangatlah kurang. Bahkan pertanian di Indonesia ini kalah dengan sistem pertanian negara yang tidak memiliki tanah subur seperti Indonesia. Sehingga sektor pertanian Indonesia pun tak pernah mengalami kemajuan.</p>\r\n', 'Indonesia memperoleh julukan negara agraris.', 'Minggu', '2018-02-18', '10:54:18', 'RYB6_1_Grey_grande.jpg', 0, 'pupuk-organik,pestisida-nabati,peternakan,system,teknologi', 'Y'),
(3, 39, 'admin', 'Hijab Tutorial Pashmina Instan Rafella Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-pashmina-instan-rafella-original-by-hijab-wanita-cantik', 'N', 'N', 'Y', '<p>Indonesia dinilai perlu belajar dari Brasil dalam pengembangan&nbsp;sektor pertanian. Sebagai negara agraris, perekonomian Brasil saat ini banyak ditopang dari sektor tersebut.</p>\r\n\r\n<p>Menteri Desa, Pembangunan Daerah Tertinggal dan Transmigrasi Eko Putro Sandjojo &lrm;menjelaskan, sebagai negara dengan sumber daya alam (SDA) yang melimpah, Indonesia punya potensi besar untuk menjadi negara agraris terbesar di dunia.&nbsp;&quot;Untuk membicarakan kemandirian pangan Indonesia. Apakah Indonesia bisa menjadi penghasil pangan dunia? Iya. Karena kita dengan lahan terbesar di dunia kedua setelah Brasil,&quot; &lrm;ujar dia di Kantor Kementerian Pertanian.</p>\r\n\r\n<p>Dia menjelaskan, dengan potensi yang besar ini, Indonesia harusnya bisa seperti Brasil yang mampu menjadi negara ekonomi terbesar ke-5 dunia berkat sokongan sektor pertanian.</p>\r\n\r\n<p>&quot;Brazil bisa menjadi negara yang perekonomian&nbsp;kuat nomor 5 di dunia karena bisa memanfaatkan lahan pertanian. Brasil kalau dulu ada inflasi 1.000 persen sekarang maju karena pertanian. Hal ini juga perlu ditiru,&quot; kata dia.&nbsp;Menurut Eko, potensi Indonesia ini juga semakin besar jika bisa memanfaatkan&nbsp;sektor perikanan. Karena sebagaimana diketahui, Indonesia merupakan negara dengan garis pantai&nbsp;</p>\r\n', 'Petani indonesia harus belajar lebih banyak', 'Minggu', '2018-02-18', '10:54:03', 'RV71_27_Jeans_grande.jpg', 0, 'umrah,pupuk-organik,pestisida-nabati,marketing,teknologi', 'Y'),
(7, 39, 'admin', 'Hijab Tutorial Instan Kaviya Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-instan-kaviya-original-by-hijab-wanita-cantik', 'N', 'N', 'N', '<p>Terdapat dua hal utama yang bisa mendorong terciptanya&nbsp;negara maju. Indonesia akan serius menerapkan dua hal tersebut sehingga ke depan bisa masuk ke dalam kategori negara maju.&nbsp;Menteri Kordinator Bidang Kemaritiman Rizal Ramli ungkap,&nbsp;hal yang pertama yang bisa mendorong sebuah negara masuk kategori maju adalah tingkatan&nbsp;kualitas Sumber Daya Manusia&lrm;&nbsp;(SDM). Selama ini banyak negara maju yang tidak memiliki sumber daya alam, namun karena sumber daya manusia berkualitas maka negara tersebut bisa berkembang.<br />\r\n<br />\r\n&quot;Satu SDM. Negara yang maju tidak punya sumber daya alam, jadi fokus dalam pengembangan SDM. Akhirnya manusia yang terdidik ini, yang&nbsp;<em>educated&nbsp;</em>ini akhirnya mengubah bangsanya,&quot; kataRizal, dalamPressConfrence&nbsp;Rakor Migas, di Kantor Kementerian Kordinator Bidang Kemaritiman,Jakarta, Rabu (11/5/2016).</p>\r\n\r\n<p>Rizal mengakui, Indonesia agak ketinggalan dalam meningkatkan kualitas SDM, karena itu pemerintah akan melakukan transformasi peningkatan kualitas SDM dengan memberikan pendidikan yang lebih spesifik sehingga SDM Indonesia memiliki kemampuan&nbsp;yang sama dengan negara maju.<br />\r\n<br />\r\n&quot;Zaman sekarang zaman Google. Pengetahuan umum bisa didapat dari mana saja, yang penting kemampuan analisa, kemampuan sintesa, kemampuan inovasi dan modifikasi,&quot; ungkap Rizal.</p>\r\n', 'Rizal Ramli kini menjabat sebagai Menteri Koordinator Bidang Kemaritiman', 'Minggu', '2018-02-18', '10:50:24', 'AR96_13_Tartan_Grey_grande.jpg', 0, 'pupuk-organik,marketing,system,bonus,teknologi,nasional', 'Y'),
(8, 19, 'admin', 'Hijab Tutorial Instan Claire & Clarina Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-instan-claire--clarina-original-by-hijab-wanita-cantik', 'N', 'N', 'N', '<p>Perusahaan BUMN yang bergerak pada sektor peternakan, PT Berdikari (Persero) meresmikan usaha baru yang masih bergerak pada ritel produk daging dan produk olahan daging sapi yaitu Meat Gallery.<br />\r\n<br />\r\nPeluncuran Meat Gallery merupakan salah satu dari rangkaian persiapan Berdikari dalam menciptakan value chain yang terintegrasi yang sebelumnya perusahaan plat merah tersebut telah merevitalisasi<em>&nbsp;ranch breeding</em>&nbsp;di Sulawesi Selatan dan Sulawesi Tenggara, industri penggemukan sapi, rumah potong hewan serta industri daging olahan.<br />\r\n<br />\r\n&quot;Tekad kami untuk memasok kebutuhan daging sapi nasional yang merupakan salah satu sumber protein dengan harga terjangkau,&quot; ujar Direktur Utama PT Berdikari Liberto El Arief di Jakarta, Senin (20/1/2014).&nbsp;Dia mengatakan pada tahun ini, akan dibuka sebanyak 12 cabang Meat Gallery, sedangkan pada tahun depan akan mulai dibuka untuk&nbsp;<em>franchise</em>.<br />\r\n<br />\r\n&nbsp;&quot;Pertama buka di BSD (Bumi Serpong Damai), kemudian disini (kantor pusat) menyusul diseluruh diwilayah&nbsp; Jabodetabek, seperti di Jakarta Timur&nbsp; sedang tahap persiapan, dari situ di awal tahun ini kami membulatkan tekad menjadi BUMN peternakan,&quot; lanjutnya.&nbsp;Menurut Arief, keunggulan Meat Gallery ini karena produk daging maupun produk daging olahan yang dijual berasal dari sapi yang dipelihara sendiri dan dipotong di dalam rumah potong hewan (RPH) yang dikelola sendiri.<br />\r\n<br />\r\n&quot;Sehingga kami menggunakan standar internsional, higienis, proses pendinginan sesuai ketentuan, pembekuannya juga dalam waktu cepat, kualitas kita jamin. Pernah kita tawarkan daging ini ke restoran mereka langsung suka karena beda denga daging impor,&quot; katanya.</p>\r\n', 'Bisnis Ritel untuk Produk Daging', 'Minggu', '2018-02-18', '10:50:12', 'AR91_87_Molly_Grey_grande.jpg', 0, 'peternakan,marketing,system,teknologi,nasional', 'Y'),
(9, 19, 'admin', 'Hijab Tutorial Pashmina Instan Alifa Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-pashmina-instan-alifa-original-by-hijab-wanita-cantik', 'N', 'N', 'N', '<p>Lahirnya Peraturan Menteri Keuangan (PMK) Nomor 267 Tahun 2015 untuk mengenakan Pajak Pertambahan Nilai (PPN) 10 persen bagi ternak dan pakan ternak impor maupun di dalam negeri menuai banjir protes keras dari kalangan pelaku usaha dan peternak. Dalam beleid ini, hanya sapi indukan yang terbebas dari pungutan pajak.&nbsp; &nbsp;</p>\r\n\r\n<p>Wakil Ketua Kadin Indonesia Bidang Industri Pengolahan Makanan dan Peternakan, Juan Permata Adoe mengungkapkan, bahasa atau substansi dari PMK 267 Tahun 2015, yang menyebutkan PPN 10 persen yang dipungut tidak boleh dikreditkan.</p>\r\n\r\n<p>Itu artinya jika proses dari sapi menjadi daging, dan diproduksi lagi menjadi bakso, maka perusahaan pengolahan daging otomatis dikenakan&nbsp;<em>dobel</em>&nbsp;PPN.</p>\r\n\r\n<p>&quot;Ini yang jadi persoalan, karena dalam menetapkan PMK, pengusaha tidak diajak berdiskusi. PPN bukan menambah daya saing, tapi justru melemahkan daya saing,&quot; ujar dia.</p>\r\n\r\n<p>Juan menuturkan, Kementerian Pertanian sebenarnya meminta kepada Kementerian Keuangan untuk membebaskan bea masuk sapi indukan atau sapi betina produktif, bukan PPN. Tujuannya apabila Bea Masuk dinolkan, maka penjualan sapi jenis ini akan meningkat.</p>\r\n\r\n<p>&quot;Kementan itu inginnya dibebaskan Bea Masuk untuk sapi betina produktif. Tapi dengan alasan tertentu kenapa larinya ke (bebas) PPN, jadi&nbsp;<em>miss interpretasi</em>&nbsp;antara keinginan dan eksekusinya. Untuk ternak lainnya kena PPN 10 persen, otomatis turunannya juga kena,&quot; ujar dia.</p>\r\n', 'Pengusaha Daging sepi Pembeli', 'Minggu', '2018-02-18', '10:50:00', 'AR91_45_Afia_Black_grande.jpg', 0, 'peternakan,marketing,system,nasional', 'Y'),
(10, 19, 'admin', 'Hijab Tutorial Pashmina Instan Kiyora Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-pashmina-instan-kiyora-original-by-hijab-wanita-cantik', 'N', 'N', 'N', '<p>Pengusaha yang tergabung di Kamar Dagang dan Industri (Kadin) Indonesia meminta pemerintah merevisi aturan mengenai pemberlakuan Pajak Pertambahan Nilai (PPN) 10 persen untuk seluruh ternak, kecuali sapi indukan.</p>\r\n\r\n<p>Lantaran pungutan pajak tersebut akan berdampak besar terhadap produsen, konsumen hingga melemahkan daya saing industri peternakan nasional.</p>\r\n\r\n<p>Wakil Ketua Kadin Indonesia Bidang Industri Pengolahan Makanan dan Peternakan, Juan Permata Adoe mengungkapkan, pemerintah dan pengusaha menggelar rapat koordinasi PMK 267 Tahun 2015 tentang Kriteria Dan/Atau Rincian Ternak, Bahan Pakan Untuk Pembuatan Pakan Ternak dan Pakan Ikan Yang Atas Impor Dan/Atau Penyerahannya Dibebaskan Dari Pengenaan PPN.</p>\r\n\r\n<p>Aturan tersebut merupakan turunan dari Peraturan Pemerintah (PP) Nomor 81 Tahun 2015 tentang Impor dan atau Penyerahan Barang Kena Pajak Tertentu Yang Bersifat Strategis Yang Dibebaskan Dari Pengenaan PPN.&nbsp;Rapat koordinasi ini dihadiri pihak Kementerian Koordinator Bidang Perekonomian, Kementerian Perdagangan, Kementerian Pertanian, Badan Kebijakan Fiskal Kementerian Keuangan, pengusaha termasuk importir dan peternak lokal. Rapat berlangsung di kantor Kemenko Bidang Perekonomian untuk dibawa dalam rakor pangan tingkat Menteri yang dipimpin Menko Perekonomian Darmin Nasution pada pukul 14.00 WIB ini. &nbsp;</p>\r\n', 'Pengusaha Daging Sapi Menjerit', 'Minggu', '2018-02-18', '10:49:49', 'AF_23_6_Best_Of_Black_1024x1024_6e855c30-c2e4-4423-88ac-0f8e9dfeedc4_grande.jpg', 2, 'peternakan,marketing,teknologi,nasional', 'Y'),
(11, 19, 'admin', 'Hijab Tutorial Instan Rachelia Original by Hijab Wanita Cantik', '', '', 'hijab-tutorial-instan-rachelia-original-by-hijab-wanita-cantik', 'N', 'N', 'N', '<p>Sebagai upaya serius untuk fokus pada bisnis peternakan dan pengolahan daging, PT Berdikari (Persero) akan melakukan importasi sapi betina produktif atau sapi indukan pada tahun ini.&nbsp;Direktur Utama PT Berdikari, Librato El Arief mengatakan, BUMN tersebut akan mulai melakukan impor sapi tersebut pada kuartal II 2014.&nbsp;<br />\r\n<br />\r\n&quot;Tahun ini akan masuk sapi indukan sebanyak&nbsp; 5 ribu ekor, sekitar bulan Mei-Juni, itu akan dikelola di&nbsp;<em>ranch</em>&nbsp;kami di Sulawesi Selatan dan Sulawesi Tenggara,&quot; ujarnya di Kantor Pusat Berdikari, Jakarta Pusat, Senin (20/1/2014).&nbsp;Selain itu, perusahaan plat merah ini juga akan melakukan impor sapi bakalan sebanyak 2 ribu ekor pada kuartal I tahun ini.&nbsp; &quot;Untuk sapi bakalan pada kuartal I ada 2 ribu ekor, kalau tahun lalu 3.500 ekor,&quot; lanjutnya.<br />\r\n<br />\r\nSapi-sapi ini diharapkan akan mampu menambah populasi milik perusahaan tersebut yang mencapai 12 ribu tersebar di wilayah Sulawesi dan Jawa.&nbsp;&quot;Olahan di RPH (rumah potong hewan) miliki kita kapasitasnya 100 ekor per hari, utilisasinya sampai saat ini baru 30%,&quot; katanya.<br />\r\n<br />\r\nSaat ini, PT Berdikari telah memiliki beberapa kandang penggemukan sapi yang tersebar di beberapa wilayah seperti 2 kandang di Jawa Tengah, 2 kandang di Jawa Barat, 1 kandang di Banten dan ada juga beberapa yang sedang dalam tahap perbaikan sebanyak 8 kandang diharapkan mulai beroperasi di pada bulan Mei tahun ini.</p>\r\n', 'Berdikari akan Impor Sapi Indukan', 'Minggu', '2018-02-18', '10:49:44', 'AD_19_20_Misty_Grey_grande.jpg', 13, 'peternakan,marketing,system,nasional', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id_download` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` text COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(33, 'Rekayasa Teknologi Biota Plus (Hasil Uji Lapangan Sukamandi)', 'Laporan_Penggunaan_Biota_sukamandi.pdf', '2016-05-19', 32),
(38, 'Marketing Plane System', 'TUNAS_HARMONI_ABADI.pptx', '2016-06-28', 15),
(35, 'Formulir Pendaftaran Members', 'formulir_pendaftaran.doc', '2016-06-28', 20),
(36, 'Formulir Pendaftaran Agen', 'formulir_pendaftaran_agen.doc', '2016-06-28', 8),
(37, 'Formulir Pendaftaran Cabang', 'formulir_pendaftaran_CABANG.doc', '2016-06-28', 10),
(41, 'Petunjuk cara membayar tabungan ibada', 'NEW_BOOKLET_TUNAS.pptx', '2016-06-29', 9),
(42, 'Perbandingan pemakaian pupuk biota plus dgn pupuk kimia', 'PERBANDINGAN_PEMUPUKAN-1.doc', '2016-06-29', 7),
(43, 'Cara pemakaian pupuk biota plus untuk tanaman padi', 'APLIKASI_TEKNOLOGI_BIOTA_PD_TANAMAN_PADI_BALAI_BENIH-1.doc', '2016-06-29', 4),
(44, 'Promo Alhir Tahun Bali - Lombok', 'img014.jpg', '2016-06-29', 13);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(5) NOT NULL,
  `id_album` int(5) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jdl_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gallery_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `username`, `jdl_gallery`, `gallery_seo`, `keterangan`, `gbr_gallery`) VALUES
(238, 30, 'admin', 'Lautan Penonton', 'lautan-penonton', 'Lebih kurang dari 50.000 penonton yang memadati Stadion Gelora Bung Karno menyaksikan aksi Kantata Barock.\r\n', '7kantata3.jpg'),
(237, 30, 'admin', 'Mengenang WS. Rendra', 'mengenang-ws-rendra', 'Konser didedikasikan buat salah satu anggota Kantata Takwa, WS. Rendra. Suasana kemeriahan para artis pendukung.\r\n', '44kantata4.jpg'),
(240, 43, 'admin', 'Doa Bersamaaaaa', 'doa-bersamaaaaa', '<p>Mengingat agresi yang militer yang dilancarkan Israel merupakan pelanggaran hukum humaniter internasional. Menyusul banyak warga sipil yang telah menjadi korban akibat pertempuran yang dilakukan Israel dan Hamas. Sebelumnya, Sekretaris Jendral Perserikatan Bangsa - Bangsa (PBB) Ban Ki-moon dan Menteri Luar Negeri Amerika Serikat (AS) John Kerry melakukan pertemuan di Kairo, Mesir. Pertemuan di bertujuan untuk mendesak agar konflik yang terjadi di Gaza segera dihentikan.</p>\r\n', '38kantata1.jpg'),
(239, 30, 'admin', 'Semangat Kantata', 'semangat-kantata', 'Semangat para macan-macan tua Kantata, seolah mmemberi penyadaran baru dan bagai api yang tak pernah padam.\r\n', '7kantata2.jpg'),
(236, 30, 'admin', 'Iwan Fals', 'iwan-fals', 'Iwan Fals yang tergabung dalam Kantata Barock bersama Setiawan Djodi dan Sawong Jabo menghibur penggemarnya di GBK.\r\n', '85kantata5.jpg'),
(235, 30, 'admin', 'Iwan dan Oemar Bakrie', 'iwan-dan-oemar-bakrie', 'Aksi penonton yang mirip dengan Iwan Fals dan sang guru Oemar Bakrie\r\n', '95kantata6.jpg'),
(234, 30, 'admin', 'Bento...Bento..!!', 'bentobento', 'Bento...Bento...Bentok...!! ....Asyikkk... begitu teriak Setiawan Djody dan Sawung Jabo yang ikuti ribuan penonton.\r\n', '32kantata7.jpg'),
(232, 29, 'admin', 'Karpet Raksasa dari Bunga 008', 'karpet-raksasa-dari-bunga-008', '', '45bungaraksasa8.jpg'),
(233, 30, 'admin', 'Sujud Syukur', 'sujud-syukur', 'Seluruh awak Kantata Barock melakukan sujud syukur di penghujung acara.<br />\r\n', '32kantata8.jpg'),
(231, 29, 'admin', 'Karpet Raksasa dari Bunga 007', 'karpet-raksasa-dari-bunga-007', '', '89bungaraksasa7.jpg'),
(230, 29, 'admin', 'Karpet Raksasa dari Bunga 006', 'karpet-raksasa-dari-bunga-006', '', '17bungaraksasa6.JPG'),
(229, 29, 'admin', 'Karpet Raksasa dari Bunga 005', 'karpet-raksasa-dari-bunga-005', '', '74bungaraksasa5.JPG'),
(228, 29, 'admin', 'Karpet Raksasa dari Bunga 004', 'karpet-raksasa-dari-bunga-004', '', '22bungaraksasa4.JPG'),
(227, 29, 'admin', 'Karpet Raksasa dari Bunga 003', 'karpet-raksasa-dari-bunga-003', '', '78bungaraksasa3.JPG'),
(225, 29, 'admin', 'Karpet Raksasa dari Bunga 001', 'karpet-raksasa-dari-bunga-001', '', '17bungaraksasa1.JPG'),
(226, 29, 'admin', 'Karpet Raksasa dari Bunga 002', 'karpet-raksasa-dari-bunga-002', '', '22bungaraksasa2.JPG'),
(224, 28, 'admin', 'Favorit', 'favorit', 'Mainan adalah barang favorit yang senantiasa diburu para pembeli. Selain murah, pilihannya pun berbagai jenis.\r\n', '34asemka10.jpg'),
(223, 28, 'admin', 'Suasana Pasar Asemka', 'suasana-pasar-asemka', 'Pasar Asemka, Jakarta, merupakan pasar grosir yang banyak menyediakan berbagai aksesoris seperti kalung, cincin, Souvenir pernakahan, dan lainnya. Di Pasara Asemka anda akan dimanjakan dengan beragam barang yang dibandrol dengan harga murah meriah dan biasanya dijual grosiran.<br />\r\n', '6asemka9.jpg'),
(222, 28, 'admin', 'Petasan', 'petasan', 'Petasan aneka jenis juga dijajakan di Pasar Asemka, Jakarta.\r\n', '2asemka8.jpg'),
(221, 28, 'admin', 'Merah Marun', 'merah-marun', 'Salah satu suvenir pernikahan nan cantik yang dijual di Pasar Asemka, Jakarta.\r\n', '82asemka4.jpg'),
(220, 28, 'admin', 'Menata Cincin', 'menata-cincin', 'Seorang pedagang cincin aksesoris sedang merapihkan letak cincin agar lebih menarik di Pasar Asemka, Jakarta.\r\n', '21asemka7.jpeg'),
(219, 28, 'admin', 'Suvenir', 'suvenir', 'Aneka Souvenir Pernikahan yang dijual di Pasar Asemka, Jakarta.\r\n', '41asemka1.jpg'),
(218, 28, 'admin', 'Seorang Wanita Pedagang', 'seorang-wanita-pedagang', 'Seorang wanita sedang menunggu kios aksesorisnya.\r\n', '7asemka6.jpeg'),
(217, 28, 'admin', 'Suasana Pasar', 'suasana-pasar', 'Suasana di Pasar Asemka yang senantiasa ramai. Dan pengunjung bebas memilih berbagai jenis aksesoris.\r\n', '22asemka5.jpeg'),
(216, 28, 'admin', 'Pedagang', 'pedagang', 'Seorang pedagang sedang membungkus souvenir penikahan yang akan dijual ataupun pesanan dari pelanggangnnya.\r\n', '84asemka2.jpg'),
(254, 1, 'admin', 'Screenshot 1 ', 'screenshot-1-', 'Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 ', '911.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE `halamanstatis` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT 1,
  `jam` time NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`) VALUES
(49, 'Tentang Kami', 'tentang-kami', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2018-02-18', 'hijab1.jpg', 'admin', 22, '13:44:49', ''),
(50, 'Cara Belanja', 'cara-belanja', '<p>Selamat datang di Toko Online Hijab Wanita Jawan Now. Demi kenyamanan anda berbelanja, berikut ini kami jelaskan tata cara berbelanja di Toko Online Hijab jaman Now.</p>\r\n\r\n<p><strong>1. Memilih Produk</strong></p>\r\n\r\n<p>Silahkan melihat produk-produk yang tersedia di Hijab Wanita Jawan Now melalui menu&nbsp;<strong>Categories</strong>. Pada produk yang diinginkan, klik tombol &lsquo;<strong>Add to Cart</strong>&rsquo; untuk memasukkannya ke dalam belanjaan anda. Perhatikan jumlah stok yang tersedia untuk produk tersebut.&nbsp;Tambahkan produk lain sesuai keperluan.</p>\r\n\r\n<p><strong>2.Melihat Belanjaan Anda</strong></p>\r\n\r\n<p>Dibagian kanan&nbsp;atas&nbsp;terlihat jumlah item dalam belanjaan dan&nbsp;total nilai pesanan anda. Bila ingin melihat daftar belanjaan lebih detil, arahkan kursor ke gambar keranjang belanja, kemudian klik tombol&nbsp;&#39;<strong>View Cart</strong>&#39;.</p>\r\n\r\n<p><strong>3. Checkout</strong></p>\r\n\r\n<p>Bila produk yang dipilih sudah lengkap dan sesuai, untuk checkout klik tombol &lsquo;<strong>Checkout</strong>&rsquo;.</p>\r\n\r\n<p><strong>4. Checkout Options</strong></p>\r\n\r\n<p>Anda akan diarahkan pada bagian &lsquo;<strong>Checkout Options</strong>&rsquo;. Bila anda sudah terdaftar (<strong>Returning Customer</strong>), silahkan gunakan email dan password anda untuk login. Bila anda belum terdaftar (<strong>New Customer</strong>), silahkan lakukan pendaftaran terlebih dahulu dengan meng-klik tombol &lsquo;<strong>Continue</strong>&rsquo;.</p>\r\n\r\n<p><strong>5. Membuat Account</strong></p>\r\n\r\n<p>Bagi anda pelanggan baru, silahkan lengkapi beberapa data berikut. Yang perlu diperhatikan adalah pada saat menuliskan nama&nbsp;<strong>Kecamatan</strong>&nbsp;pada field &#39;<strong>Kecamatan (City)</strong>&#39;. Ketikkan beberapa huruf pertama nama kecamatan, kemudian sistem akan menampilkan pilihan nama kecamatan. Pilih yang paling sesuai. Lengkapi data alamat anda. Klik persetujuan&nbsp;<strong>Privacy Policy</strong>. Klik tombol &lsquo;<strong>Continue</strong>&rsquo;.</p>\r\n\r\n<p><strong>6. Cara&nbsp;Pengiriman</strong></p>\r\n\r\n<p>Pada bagian&nbsp;ini anda dapat memilih tarif pengiriman melalui jasa kurir JNE yang sesuai. Jumlah nominal ongkos kirim akan otomatis dihitung sesuai dengan pilihan Kecamatan anda dan juga berat dari pesanan. Tuliskan&nbsp;catatan untuk pesanan anda pada bagian&nbsp;<strong>Comment</strong>, bila&nbsp;ada.&nbsp;Kemudian klik tombol &lsquo;<strong>Continue</strong>&rsquo;.</p>\r\n\r\n<p><strong>7. Cara Pembayaran</strong></p>\r\n\r\n<p>Pada bagian&nbsp;ini anda dapat memilih cara pembayaran yang sesuai. Kami saat ini hanya menerima pembayaran melalui<strong>Bank Transfer</strong>.&nbsp;Klik persetujuan&nbsp;<strong>Terms &amp; Conditions</strong>. Klik tombol &lsquo;<strong>Continue</strong>&rsquo;.</p>\r\n\r\n<p><strong>8. Konfirmasi Pemesanan</strong></p>\r\n\r\n<p>Pada bagian&nbsp;konfirmasi pemesanan&nbsp;ini anda dapat melihat sekali lagi rincian pesanan anda.&nbsp;Bila sudah tidak ada perubahan, klik tombol &lsquo;<strong>Confirm Order</strong>&rsquo;. Akan ada pesan bahwa pesanan anda sudah diproses dan bersamaan dengan itu kami mengirimkan email berisi&nbsp;rincian&nbsp;pesanan anda.</p>\r\n\r\n<p><strong>9. Pembayaran dan Konfirmasi Pembayaran</strong></p>\r\n\r\n<p>Silahkan lakukan pembayaran pada nomor rekening yang tercantum pada email yang kami kirimkan. Kemudian lakukan konfirmasi pembayaran agar kami dapat segera memproses pengiriman pesanan anda.</p>\r\n\r\n<p>Agar pesanan dapat diproses untuk pengiriman di hari yang sama, konfirmasi pembayaran ditunggu paling lambat jam 15.00 WIB (atau jam 12.00 WIB untuk hari Sabtu). Lewat dari itu diproses untuk pengiriman di hari/kesempatan berikutnya. Hari Minggu/Tanggal Merah, kantor libur dan tidak ada pengiriman.</p>\r\n\r\n<p><strong>10. Pengiriman dan Tracking Pengiriman</strong></p>\r\n\r\n<p>Apabila kami pengiriman telah kami lakukan, status pesanan anda akan diupdate dan kami akan sampaikan juga nomor tracking dari jasa kurir JNE melalui email.</p>\r\n', '2018-02-18', '', 'admin', 23, '13:41:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `dibaca` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`, `jam`, `dibaca`) VALUES
(34, 'Landung Trilaksono', 'landungtrilaksono@gmail.com', 'Nomer kontak jurusan akuntansi', 'Maaf saya mau hubungi jurusan akuntansi di nomer berapa ya? Terima kasih', '2013-10-16', '00:00:00', 'Y'),
(35, 'yusri renor', 'aciafifah@gmail.com', 'pertanyaan', 'bagaimana cara mengunduh nomor ujian fak. pertanian', '2014-01-19', '00:00:00', 'Y'),
(38, 'Udin Sedunia', 'udin.sedunia@gmail.com', 'Ip Pengirim : 120.177.28.244', 'Silahkan menghubungi kami melalui private message melalui form yang berada pada bagian kanan halaman ini. Kritik dan saran Anda sangat penting bagi kami untuk terus meningkatkan kualitas produk dan layanan yang kami berikan kepada Anda.', '2015-06-02', '00:00:00', 'Y'),
(39, 'Robby Prihandaya', 'robby.prihandaya@gmail.com', 'Mau tanya Sesuatu', 'November ini,  Indonesia akan disuguhkan salah satu konser megah dari legenda musik dunia yaitu Elton John', '2016-05-12', '19:33:58', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `facebook` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `no_telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kota_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `maps` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `rekening`, `no_telp`, `kota_id`, `alamat`, `meta_deskripsi`, `meta_keyword`, `favicon`, `maps`) VALUES
(1, 'Hijab Wanita Jaman Now', 'phpmu@gmail.com', 'http://localhost/reseller', '', '#', 'Telp. 081267771344 - Fax. 0411 431111', 17, 'Jl. Angkasa Puri, Perundam 4, Tunggul Hitam, Koto Tangah , Kota padang', 'Menyajikan produk terbaik, tekini, tercepat, dan terpercaya.', 'Ada banyak produk di phpmu.com yang bisa memberikan komisi kepada Anda setiap terjadi penjualan. Dan produk ini akan terus bertambah dari waktu ke waktu. Jadi, sekali Anda bergabung di phpmu.com, Anda punya kesempatan berbisnis tanpa modal, juga peng', 'logo.png', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.3358607198243!2d100.35483479999999!3d-0.8910373999999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b8aa1a4e0441%3A0x3f81ebb48d31a38b!2sTunggul+Hitam%2C+Padang+Utara%2C+Kota+Padang%2C+Sumatera+Barat+25173!5e0!3m2!1sid!2sid!4v1408275531365');

-- --------------------------------------------------------

--
-- Table structure for table `iklantengah`
--

CREATE TABLE `iklantengah` (
  `id_iklantengah` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `sidebar` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `username`, `kategori_seo`, `aktif`, `sidebar`) VALUES
(55, 'mlm', 'admin', 'mlm', 'Y', 0),
(39, 'Pertanian', '', 'pertanian', 'Y', 1),
(23, 'Perikanan', '', 'perikanan', 'Y', 3),
(2, 'Wisata', '', 'wisata', 'Y', 4),
(19, 'Peternakan', '', 'peternakan', 'Y', 2);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(5) NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `gambar`) VALUES
(15, 'logo1.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL DEFAULT 0,
  `nama_menu` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `position` enum('Top','Bottom') DEFAULT 'Bottom',
  `urutan` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`) VALUES
(143, 0, 'Konfirmasi Pembayaran', 'konfirmasi', 'Ya', 'Bottom', 24),
(113, 146, 'Tentang Kami', 'page/detail/tentang-kami', 'Ya', 'Bottom', 1),
(7, 0, 'Home Page', '', 'Ya', 'Bottom', 1),
(8, 146, 'Hijab Tutorial', 'berita', 'Ya', 'Bottom', 3),
(136, 0, 'Login', 'auth/login', 'Ya', 'Top', 15),
(137, 0, 'Register', 'auth/register', 'Ya', 'Top', 16),
(138, 0, 'Hubungi Kami', 'contact', 'Ya', 'Top', 17),
(139, 0, 'Download', 'download', 'Tidak', 'Bottom', 18),
(140, 0, 'Video', 'video', 'Tidak', 'Bottom', 19),
(141, 0, 'Gallery', 'gallery', 'Tidak', 'Bottom', 20),
(142, 0, 'Testimoni', 'testimoni', 'Ya', 'Bottom', 22),
(144, 0, 'Semua Koleksi', 'produk', 'Ya', 'Bottom', 3),
(145, 146, 'Cara Belanja', 'page/detail/cara-belanja', 'Ya', 'Bottom', 2),
(146, 0, 'Informasi', '#', 'Ya', 'Bottom', 2),
(147, 0, 'Tracking Order', 'konfirmasi/tracking', 'Ya', 'Bottom', 23);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', 'admin', 'manajemenuser', '', '', 'Y', 'user', 'Y', 0, ''),
(18, 'Berita', 'admin', 'listberita', '', '', 'Y', 'user', 'Y', 0, ''),
(71, 'Image Slider', 'admin', 'imagesslider', '', '', 'N', 'admin', 'N', 0, ''),
(10, 'Manajemen Modul', 'admin', 'manajemenmodul', '', '', 'Y', 'user', 'Y', 0, ''),
(31, 'Kategori Berita ', 'admin', 'kategoriberita', '', '', 'Y', 'user', 'Y', 0, ''),
(33, 'Testimoni', 'admin', 'testimoni', '', '', 'Y', 'user', 'Y', 0, ''),
(34, 'Tag Berita', 'admin', 'tagberita', '', '', 'Y', 'user', 'Y', 0, ''),
(43, 'Berita Foto', 'admin', 'album', '', '', 'Y', 'user', 'Y', 0, ''),
(44, 'Galeri Berita Foto', 'admin', 'gallery', '', '', 'Y', 'user', 'Y', 0, ''),
(46, 'Konsumen', 'admin', 'konsumen', '', '', 'Y', 'user', 'Y', 0, ''),
(61, 'Identitas Website', 'admin', 'identitaswebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(57, 'Menu Website', 'admin', 'menuwebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(59, 'Halaman Baru', 'admin', 'halamanbaru', '', '', 'Y', 'user', 'Y', 0, ''),
(66, 'Logo Website', 'admin', 'logowebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(67, 'Iklan Sidebar', 'admin', 'iklansidebar', '', '', 'N', 'admin', 'N', 0, ''),
(68, 'Iklan Home', 'admin', 'iklanhome', '', '', 'N', 'admin', 'N', 0, ''),
(70, 'Pesan Masuk', 'admin', 'pesanmasuk', '', '', 'Y', 'user', 'Y', 0, ''),
(72, 'No Rekening Perusahaan', 'admin', 'rekening', '', '', 'N', 'admin', 'N', 0, ''),
(74, 'Download Area', 'admin', 'download', '', '', 'Y', 'admin', 'Y', 0, ''),
(75, 'Alamat Kontak', 'admin', 'alamat', '', '', 'Y', 'admin', 'Y', 0, ''),
(78, 'Info/Keterangan', 'admin', 'keterangan', '', '', 'Y', 'user', 'Y', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pasangiklan`
--

CREATE TABLE `pasangiklan` (
  `id_pasangiklan` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pasangiklan`
--

INSERT INTO `pasangiklan` (`id_pasangiklan`, `judul`, `username`, `url`, `gambar`, `tgl_posting`) VALUES
(32, 'Temukan juga kami di Tokopedia', 'admin', 'https://www.tokopedia.com', 'tokopedia1.png', '2018-03-04'),
(33, 'Temukan juga kami di Bukalapak', 'admin', 'https://www.bukalapak.com', 'download.png', '2018-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `rb_kategori_produk`
--

CREATE TABLE `rb_kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `kategori_seo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_kategori_produk`
--

INSERT INTO `rb_kategori_produk` (`id_kategori_produk`, `nama_kategori`, `kategori_seo`) VALUES
(1, 'Hijab Instan Annisa', 'hijab-instan-annisa'),
(2, 'Hijab Instan Kiyora', 'hijab-instan-kiyora'),
(4, 'Hijab Instan Ladiza', 'hijab-instan-ladiza'),
(5, 'Hijab Instan Kezya', 'hijab-instan-kezya'),
(6, 'Hijab Instan Tanika', 'hijab-instan-tanika'),
(7, 'Segitiga Instan Lolina', 'segitiga-instan-lolina'),
(8, 'Segitiga Instan Sasya', 'segitiga-instan-sasya'),
(9, 'Pashmina Instan Raisa Lava', 'pashmina-instan-raisa-lava'),
(10, 'Pashmina Instan Tafea', 'pashmina-instan-tafea');

-- --------------------------------------------------------

--
-- Table structure for table `rb_keterangan`
--

CREATE TABLE `rb_keterangan` (
  `id_keterangan` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_keterangan`
--

INSERT INTO `rb_keterangan` (`id_keterangan`, `keterangan`, `tanggal_posting`) VALUES
(1, '<p><strong>Informasi Order :</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis.&nbsp;</p>\r\n\r\n<p>Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n', '2018-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `rb_konfirmasi`
--

CREATE TABLE `rb_konfirmasi` (
  `id_konfirmasi_pembayaran` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `total_transfer` varchar(20) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `waktu_konfirmasi` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_konfirmasi`
--

INSERT INTO `rb_konfirmasi` (`id_konfirmasi_pembayaran`, `id_penjualan`, `total_transfer`, `id_rekening`, `nama_pengirim`, `tanggal_transfer`, `bukti_transfer`, `waktu_konfirmasi`) VALUES
(2, 19, 'Rp 1,278,000', 1, 'Robby Prihandaya', '2017-06-02', '00011.jpg', '2017-06-02 15:19:40'),
(3, 43, 'Rp 4,799,000', 0, 'Dewiit Safitri ', '2017-06-04', '0755.png', '2017-06-04 11:27:01'),
(5, 47, 'Rp 728,000', 1, 'Agus Raharjo', '2017-06-07', '1.png', '2017-06-07 21:06:06'),
(6, 2, 'Rp 417,000', 0, 'Robby Prihandaya', '2018-03-03', 'agenda.jpg', '2018-03-03 14:34:31'),
(7, 3, 'Rp 355,980', 2, 'Robby Prihandaya', '2018-03-03', 'windows_xp_bliss-wide.jpg', '2018-03-03 15:14:30'),
(8, 2, 'Rp 417,000', 2, 'Robby Prihandaya', '2018-03-03', 'avatar.png', '2018-03-03 16:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `rb_konsumen`
--

CREATE TABLE `rb_konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL DEFAULT current_timestamp(),
  `tempat_lahir` varchar(100) NOT NULL DEFAULT '-',
  `alamat_lengkap` text NOT NULL,
  `kota_id` int(11) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_konsumen`
--

INSERT INTO `rb_konsumen` (`id_konsumen`, `username`, `password`, `nama_lengkap`, `email`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `alamat_lengkap`, `kota_id`, `no_hp`, `foto`, `tanggal_daftar`) VALUES
(1, 'robby', '882c306525a9f885466520ba2aa6b10377b029cb569311fc17161d40df6e1bab7eb6103fcf567ce3a1375e77cc7db1928efec90cd0a379303fc2adb159bb1d14', 'Robby Prihandaya', 'robby.prihandaya@gmail.com', 'Laki-laki', '1988-08-07', 'Padang', 'Jl. Angkasa Pura Jaya Merdeka', 372, '081267771341', 'robby1.jpg', '2017-04-05'),
(2, 'arsenio', 'ddd1e1ecf9826e4ae7aba6ebd09589d65880638f984357aa688cf265fbc8b3e8781ca573d27c13cafc99e4db9d5c38801bd270df6f0bf6d18cd877fefb159f6f', 'Muhammad Arsenio', 'muhammad.arsenio@gmail.com', 'Laki-laki', '1988-09-27', 'Padang', 'jl. Siti Nurbayani Sogi roh', 0, '081267889912', '', '2017-04-07'),
(3, 'dewiit', 'af9f95fb734ca6abb2d02a6a169eca2bbf33feb3c25ed266e4129cbed937150699954d72dcb44fee7c9e9acebaf4e7283aabc64a6e56f1b8e6a5a0e8e0551324', 'Dewiit Safitri', 'dewiitt.safitri@gmail.com', 'Perempuan', '1989-06-16', 'Padang', 'Jl. Linggar Jati Lamo', 372, '098912334456', '', '2017-04-08'),
(4, 'cristine', '284e703a4d52451e1266b16660e50545e58bc0d4796587cb457e49cccd10af4d4ef6cf36d076a91002d806f443e0fb22b9391d81092d06a90252ec80b93a1269', 'Cristine Hakim', 'cristine.hakim@gmail.com', 'Perempuan', '1970-06-16', 'Padang', 'jl. Pondok Raya Begalung', 0, '097712445600', '', '2017-04-09'),
(5, 'tommy', 'e3bb0d1fb8d4d0aa070f22a9f73c975222449bb5466dc89033f66a8be07d6e8345308aa298e78066871c6844964e6b63f7be4327525c5025001c76b94310e2f2', 'Tommu Utama', 'tommy.utama@gmail.com', 'Laki-laki', '1985-08-18', 'Padang', 'Jl Cendrawasih Mujukirte', 0, '081267881233', '', '2017-04-10'),
(6, 'willy', '181676ffcb279fc91cfb9cb5f07be65b23224b05059f9f2ff0158aa520693a805496be090242c3cdf56c0463f278aba4b01c7115ea356eda346ef8270e402696', 'Willy Fernando', 'willy.fernando@gmail.com', 'Laki-laki', '1969-08-14', 'Padang', 'Jl. Angkasa Puri, Perundam 4', 0, '087811235433', '', '2017-04-11'),
(7, 'rosanna', '108b1016c8dfa4c6892fd745c09adc4859cd2e21ca3d55a30322ef667011aa3c379c02a45437fd6482555c17aab7f607e13b8431e19678a00a51edec958a9569', 'Rosanna Alexandro', 'rosanna.alexandro@gmail.com', 'Perempuan', '1967-04-17', 'Padang', 'Jl. Mantaliano Tubelegio', 0, '081242342341', '', '2017-04-10'),
(18, 'laura', 'ca946a52760d2c5e2670aa899019f09638e72462d8a9ff272dffb16d14e3873457ce6be0a3ecf205fdb0c8141bbe560b01240f1f1307e31b231cb18428ec5974', 'Laura Izzatin Nissa', 'laura.izzatin@gmail.com', 'Perempuan', '1998-02-12', 'Padang Panjang', 'Tunggul Hitam, Padang', 0, '082175123545', '', '2017-05-29'),
(24, 'rahmi', 'a6023aa2be2f8d9bb61edd627f957882c7a28abbbc1ed61b9cd93c36c06e52270396fcaa6303b341f52937432faa91ecbaea99534a1f55866ba3163389fcbfbf', 'Rahmi Saputra', 'rahmi.saputra@gmail.com', 'Laki-laki', '1989-12-12', 'Payakumbuh', 'Jl. Kijoko Bodoh', 370, '081978541155', '', '2017-06-07'),
(23, 'agusr', 'b87fb1f4862c52a175281636b0c270276e50e33e3aec4929c31da5199ca83ff25c0d045f9eb03b2e6dca41a390164a8c95c29bd28139cef18499c0d2ae59e098', 'Agus Raharjo', 'agus.raharjo@gmail.com', 'Laki-laki', '2018-03-20', 'Padang', 'Jl. Sutimah warohmah Jaya', 371, '081267991244', '', '2017-06-07'),
(27, 'tommy', 'e3bb0d1fb8d4d0aa070f22a9f73c975222449bb5466dc89033f66a8be07d6e8345308aa298e78066871c6844964e6b63f7be4327525c5025001c76b94310e2f2', 'Tommy Utama', 'tommy.utama@gmail.com', 'Laki-laki', '0000-00-00', '', 'Jl. Singgasana, Buleleng', 6, '081267771388', '', '2018-03-05'),
(25, 'dewiit', 'af9f95fb734ca6abb2d02a6a169eca2bbf33feb3c25ed266e4129cbed937150699954d72dcb44fee7c9e9acebaf4e7283aabc64a6e56f1b8e6a5a0e8e0551324', 'Dewiit Safitri', 'dewiit.safitri@gmail.com', 'Laki-laki', '2018-03-17', 'Padang', 'Jl. Linggar Jati, No 16 C', 5, '082173054501', '', '2018-03-03'),
(26, 'arsenio', 'ddd1e1ecf9826e4ae7aba6ebd09589d65880638f984357aa688cf265fbc8b3e8781ca573d27c13cafc99e4db9d5c38801bd270df6f0bf6d18cd877fefb159f6f', 'Muhammad Arsenio', 'muhammad.arsenio@gmail.com', 'Laki-laki', '2016-12-15', 'Padang', 'Jl. Linggar Jati, No 18 C', 9, '082156458899', '', '2018-03-03'),
(28, 'sdfsdf', '8fdc5505d48f88bed9da7b8b146bbffd1bee25cdb940876a50642459fe336170636fcaec4d7c0e30b0388888628853457479fcdf08b5ea331f78a3886ed7a3ed', 'asdasdasdasd', 'todaynews.co.id@gmail.com', 'Laki-laki', '0000-00-00', '', 'sfsdfsdfdsfsd', 15, '3452342234', '', '2018-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `rb_kota`
--

CREATE TABLE `rb_kota` (
  `kota_id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_kota`
--

INSERT INTO `rb_kota` (`kota_id`, `provinsi_id`, `nama_kota`) VALUES
(17, 1, 'Badung'),
(32, 1, 'Bangli'),
(94, 1, 'Buleleng'),
(114, 1, 'Denpasar'),
(128, 1, 'Gianyar'),
(161, 1, 'Jembrana'),
(170, 1, 'Karangasem'),
(197, 1, 'Klungkung'),
(447, 1, 'Tabanan'),
(27, 2, 'Bangka'),
(28, 2, 'Bangka Barat'),
(29, 2, 'Bangka Selatan'),
(30, 2, 'Bangka Tengah'),
(56, 2, 'Belitung'),
(57, 2, 'Belitung Timur'),
(334, 2, 'Pangkal Pinang'),
(106, 3, 'Cilegon'),
(232, 3, 'Lebak'),
(331, 3, 'Pandeglang'),
(402, 3, 'Serang'),
(403, 3, 'Serang'),
(455, 3, 'Tangerang'),
(456, 3, 'Tangerang'),
(457, 3, 'Tangerang Selatan'),
(62, 4, 'Bengkulu'),
(63, 4, 'Bengkulu Selatan'),
(64, 4, 'Bengkulu Tengah'),
(65, 4, 'Bengkulu Utara'),
(175, 4, 'Kaur'),
(183, 4, 'Kepahiang'),
(233, 4, 'Lebong'),
(294, 4, 'Muko Muko'),
(379, 4, 'Rejang Lebong'),
(397, 4, 'Seluma'),
(39, 5, 'Bantul'),
(135, 5, 'Gunung Kidul'),
(210, 5, 'Kulon Progo'),
(419, 5, 'Sleman'),
(501, 5, 'Yogyakarta'),
(151, 6, 'Jakarta Barat'),
(152, 6, 'Jakarta Pusat'),
(153, 6, 'Jakarta Selatan'),
(154, 6, 'Jakarta Timur'),
(155, 6, 'Jakarta Utara'),
(189, 6, 'Kepulauan Seribu'),
(77, 7, 'Boalemo'),
(88, 7, 'Bone Bolango'),
(129, 7, 'Gorontalo'),
(130, 7, 'Gorontalo'),
(131, 7, 'Gorontalo Utara'),
(361, 7, 'Pohuwato'),
(50, 8, 'Batang Hari'),
(97, 8, 'Bungo'),
(156, 8, 'Jambi'),
(194, 8, 'Kerinci'),
(280, 8, 'Merangin'),
(293, 8, 'Muaro Jambi'),
(393, 8, 'Sarolangun'),
(442, 8, 'Sungaipenuh'),
(460, 8, 'Tanjung Jabung Barat'),
(461, 8, 'Tanjung Jabung Timur'),
(471, 8, 'Tebo'),
(22, 9, 'Bandung'),
(23, 9, 'Bandung'),
(24, 9, 'Bandung Barat'),
(34, 9, 'Banjar'),
(54, 9, 'Bekasi'),
(55, 9, 'Bekasi'),
(78, 9, 'Bogor'),
(79, 9, 'Bogor'),
(103, 9, 'Ciamis'),
(104, 9, 'Cianjur'),
(107, 9, 'Cimahi'),
(108, 9, 'Cirebon'),
(109, 9, 'Cirebon'),
(115, 9, 'Depok'),
(126, 9, 'Garut'),
(149, 9, 'Indramayu'),
(171, 9, 'Karawang'),
(211, 9, 'Kuningan'),
(252, 9, 'Majalengka'),
(332, 9, 'Pangandaran'),
(376, 9, 'Purwakarta'),
(428, 9, 'Subang'),
(430, 9, 'Sukabumi'),
(431, 9, 'Sukabumi'),
(440, 9, 'Sumedang'),
(468, 9, 'Tasikmalaya'),
(469, 9, 'Tasikmalaya'),
(37, 10, 'Banjarnegara'),
(41, 10, 'Banyumas'),
(49, 10, 'Batang'),
(76, 10, 'Blora'),
(91, 10, 'Boyolali'),
(92, 10, 'Brebes'),
(105, 10, 'Cilacap'),
(113, 10, 'Demak'),
(134, 10, 'Grobogan'),
(163, 10, 'Jepara'),
(169, 10, 'Karanganyar'),
(177, 10, 'Kebumen'),
(181, 10, 'Kendal'),
(196, 10, 'Klaten'),
(209, 10, 'Kudus'),
(249, 10, 'Magelang'),
(250, 10, 'Magelang'),
(344, 10, 'Pati'),
(348, 10, 'Pekalongan'),
(349, 10, 'Pekalongan'),
(352, 10, 'Pemalang'),
(375, 10, 'Purbalingga'),
(377, 10, 'Purworejo'),
(380, 10, 'Rembang'),
(386, 10, 'Salatiga'),
(398, 10, 'Semarang'),
(399, 10, 'Semarang'),
(427, 10, 'Sragen'),
(433, 10, 'Sukoharjo'),
(445, 10, 'Surakarta (Solo)'),
(472, 10, 'Tegal'),
(473, 10, 'Tegal'),
(476, 10, 'Temanggung'),
(497, 10, 'Wonogiri'),
(498, 10, 'Wonosobo'),
(31, 11, 'Bangkalan'),
(42, 11, 'Banyuwangi'),
(51, 11, 'Batu'),
(74, 11, 'Blitar'),
(75, 11, 'Blitar'),
(80, 11, 'Bojonegoro'),
(86, 11, 'Bondowoso'),
(133, 11, 'Gresik'),
(160, 11, 'Jember'),
(164, 11, 'Jombang'),
(178, 11, 'Kediri'),
(179, 11, 'Kediri'),
(222, 11, 'Lamongan'),
(243, 11, 'Lumajang'),
(247, 11, 'Madiun'),
(248, 11, 'Madiun'),
(251, 11, 'Magetan'),
(256, 11, 'Malang'),
(255, 11, 'Malang'),
(289, 11, 'Mojokerto'),
(290, 11, 'Mojokerto'),
(305, 11, 'Nganjuk'),
(306, 11, 'Ngawi'),
(317, 11, 'Pacitan'),
(330, 11, 'Pamekasan'),
(342, 11, 'Pasuruan'),
(343, 11, 'Pasuruan'),
(363, 11, 'Ponorogo'),
(369, 11, 'Probolinggo'),
(370, 11, 'Probolinggo'),
(390, 11, 'Sampang'),
(409, 11, 'Sidoarjo'),
(418, 11, 'Situbondo'),
(441, 11, 'Sumenep'),
(444, 11, 'Surabaya'),
(487, 11, 'Trenggalek'),
(489, 11, 'Tuban'),
(492, 11, 'Tulungagung'),
(61, 12, 'Bengkayang'),
(168, 12, 'Kapuas Hulu'),
(176, 12, 'Kayong Utara'),
(195, 12, 'Ketapang'),
(208, 12, 'Kubu Raya'),
(228, 12, 'Landak'),
(279, 12, 'Melawi'),
(364, 12, 'Pontianak'),
(365, 12, 'Pontianak'),
(388, 12, 'Sambas'),
(391, 12, 'Sanggau'),
(395, 12, 'Sekadau'),
(415, 12, 'Singkawang'),
(417, 12, 'Sintang'),
(18, 13, 'Balangan'),
(33, 13, 'Banjar'),
(35, 13, 'Banjarbaru'),
(36, 13, 'Banjarmasin'),
(43, 13, 'Barito Kuala'),
(143, 13, 'Hulu Sungai Selatan'),
(144, 13, 'Hulu Sungai Tengah'),
(145, 13, 'Hulu Sungai Utara'),
(203, 13, 'Kotabaru'),
(446, 13, 'Tabalong'),
(452, 13, 'Tanah Bumbu'),
(454, 13, 'Tanah Laut'),
(466, 13, 'Tapin'),
(44, 14, 'Barito Selatan'),
(45, 14, 'Barito Timur'),
(46, 14, 'Barito Utara'),
(136, 14, 'Gunung Mas'),
(167, 14, 'Kapuas'),
(174, 14, 'Katingan'),
(205, 14, 'Kotawaringin Barat'),
(206, 14, 'Kotawaringin Timur'),
(221, 14, 'Lamandau'),
(296, 14, 'Murung Raya'),
(326, 14, 'Palangka Raya'),
(371, 14, 'Pulang Pisau'),
(405, 14, 'Seruyan'),
(432, 14, 'Sukamara'),
(19, 15, 'Balikpapan'),
(66, 15, 'Berau'),
(89, 15, 'Bontang'),
(214, 15, 'Kutai Barat'),
(215, 15, 'Kutai Kartanegara'),
(216, 15, 'Kutai Timur'),
(341, 15, 'Paser'),
(354, 15, 'Penajam Paser Utara'),
(387, 15, 'Samarinda'),
(96, 16, 'Bulungan (Bulongan)'),
(257, 16, 'Malinau'),
(311, 16, 'Nunukan'),
(450, 16, 'Tana Tidung'),
(467, 16, 'Tarakan'),
(48, 17, 'Batam'),
(71, 17, 'Bintan'),
(172, 17, 'Karimun'),
(184, 17, 'Kepulauan Anambas'),
(237, 17, 'Lingga'),
(302, 17, 'Natuna'),
(462, 17, 'Tanjung Pinang'),
(21, 18, 'Bandar Lampung'),
(223, 18, 'Lampung Barat'),
(224, 18, 'Lampung Selatan'),
(225, 18, 'Lampung Tengah'),
(226, 18, 'Lampung Timur'),
(227, 18, 'Lampung Utara'),
(282, 18, 'Mesuji'),
(283, 18, 'Metro'),
(355, 18, 'Pesawaran'),
(356, 18, 'Pesisir Barat'),
(368, 18, 'Pringsewu'),
(458, 18, 'Tanggamus'),
(490, 18, 'Tulang Bawang'),
(491, 18, 'Tulang Bawang Barat'),
(496, 18, 'Way Kanan'),
(14, 19, 'Ambon'),
(99, 19, 'Buru'),
(100, 19, 'Buru Selatan'),
(185, 19, 'Kepulauan Aru'),
(258, 19, 'Maluku Barat Daya'),
(259, 19, 'Maluku Tengah'),
(260, 19, 'Maluku Tenggara'),
(261, 19, 'Maluku Tenggara Barat'),
(400, 19, 'Seram Bagian Barat'),
(401, 19, 'Seram Bagian Timur'),
(488, 19, 'Tual'),
(138, 20, 'Halmahera Barat'),
(139, 20, 'Halmahera Selatan'),
(140, 20, 'Halmahera Tengah'),
(141, 20, 'Halmahera Timur'),
(142, 20, 'Halmahera Utara'),
(191, 20, 'Kepulauan Sula'),
(372, 20, 'Pulau Morotai'),
(477, 20, 'Ternate'),
(478, 20, 'Tidore Kepulauan'),
(1, 21, 'Aceh Barat'),
(2, 21, 'Aceh Barat Daya'),
(3, 21, 'Aceh Besar'),
(4, 21, 'Aceh Jaya'),
(5, 21, 'Aceh Selatan'),
(6, 21, 'Aceh Singkil'),
(7, 21, 'Aceh Tamiang'),
(8, 21, 'Aceh Tengah'),
(9, 21, 'Aceh Tenggara'),
(10, 21, 'Aceh Timur'),
(11, 21, 'Aceh Utara'),
(20, 21, 'Banda Aceh'),
(59, 21, 'Bener Meriah'),
(72, 21, 'Bireuen'),
(127, 21, 'Gayo Lues'),
(230, 21, 'Langsa'),
(235, 21, 'Lhokseumawe'),
(300, 21, 'Nagan Raya'),
(358, 21, 'Pidie'),
(359, 21, 'Pidie Jaya'),
(384, 21, 'Sabang'),
(414, 21, 'Simeulue'),
(429, 21, 'Subulussalam'),
(68, 22, 'Bima'),
(69, 22, 'Bima'),
(118, 22, 'Dompu'),
(238, 22, 'Lombok Barat'),
(239, 22, 'Lombok Tengah'),
(240, 22, 'Lombok Timur'),
(241, 22, 'Lombok Utara'),
(276, 22, 'Mataram'),
(438, 22, 'Sumbawa'),
(439, 22, 'Sumbawa Barat'),
(13, 23, 'Alor'),
(58, 23, 'Belu'),
(122, 23, 'Ende'),
(125, 23, 'Flores Timur'),
(212, 23, 'Kupang'),
(213, 23, 'Kupang'),
(234, 23, 'Lembata'),
(269, 23, 'Manggarai'),
(270, 23, 'Manggarai Barat'),
(271, 23, 'Manggarai Timur'),
(301, 23, 'Nagekeo'),
(304, 23, 'Ngada'),
(383, 23, 'Rote Ndao'),
(385, 23, 'Sabu Raijua'),
(412, 23, 'Sikka'),
(434, 23, 'Sumba Barat'),
(435, 23, 'Sumba Barat Daya'),
(436, 23, 'Sumba Tengah'),
(437, 23, 'Sumba Timur'),
(479, 23, 'Timor Tengah Selatan'),
(480, 23, 'Timor Tengah Utara'),
(16, 24, 'Asmat'),
(67, 24, 'Biak Numfor'),
(90, 24, 'Boven Digoel'),
(111, 24, 'Deiyai (Deliyai)'),
(117, 24, 'Dogiyai'),
(150, 24, 'Intan Jaya'),
(157, 24, 'Jayapura'),
(158, 24, 'Jayapura'),
(159, 24, 'Jayawijaya'),
(180, 24, 'Keerom'),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)'),
(231, 24, 'Lanny Jaya'),
(263, 24, 'Mamberamo Raya'),
(264, 24, 'Mamberamo Tengah'),
(274, 24, 'Mappi'),
(281, 24, 'Merauke'),
(284, 24, 'Mimika'),
(299, 24, 'Nabire'),
(303, 24, 'Nduga'),
(335, 24, 'Paniai'),
(347, 24, 'Pegunungan Bintang'),
(373, 24, 'Puncak'),
(374, 24, 'Puncak Jaya'),
(392, 24, 'Sarmi'),
(443, 24, 'Supiori'),
(484, 24, 'Tolikara'),
(495, 24, 'Waropen'),
(499, 24, 'Yahukimo'),
(500, 24, 'Yalimo'),
(124, 25, 'Fakfak'),
(165, 25, 'Kaimana'),
(272, 25, 'Manokwari'),
(273, 25, 'Manokwari Selatan'),
(277, 25, 'Maybrat'),
(346, 25, 'Pegunungan Arfak'),
(378, 25, 'Raja Ampat'),
(424, 25, 'Sorong'),
(425, 25, 'Sorong'),
(426, 25, 'Sorong Selatan'),
(449, 25, 'Tambrauw'),
(474, 25, 'Teluk Bintuni'),
(475, 25, 'Teluk Wondama'),
(60, 26, 'Bengkalis'),
(120, 26, 'Dumai'),
(147, 26, 'Indragiri Hilir'),
(148, 26, 'Indragiri Hulu'),
(166, 26, 'Kampar'),
(187, 26, 'Kepulauan Meranti'),
(207, 26, 'Kuantan Singingi'),
(350, 26, 'Pekanbaru'),
(351, 26, 'Pelalawan'),
(381, 26, 'Rokan Hilir'),
(382, 26, 'Rokan Hulu'),
(406, 26, 'Siak'),
(253, 27, 'Majene'),
(262, 27, 'Mamasa'),
(265, 27, 'Mamuju'),
(266, 27, 'Mamuju Utara'),
(362, 27, 'Polewali Mandar'),
(38, 28, 'Bantaeng'),
(47, 28, 'Barru'),
(87, 28, 'Bone'),
(95, 28, 'Bulukumba'),
(123, 28, 'Enrekang'),
(132, 28, 'Gowa'),
(162, 28, 'Jeneponto'),
(244, 28, 'Luwu'),
(245, 28, 'Luwu Timur'),
(246, 28, 'Luwu Utara'),
(254, 28, 'Makassar'),
(275, 28, 'Maros'),
(328, 28, 'Palopo'),
(333, 28, 'Pangkajene Kepulauan'),
(336, 28, 'Parepare'),
(360, 28, 'Pinrang'),
(396, 28, 'Selayar (Kepulauan Selayar)'),
(408, 28, 'Sidenreng Rappang/Rapang'),
(416, 28, 'Sinjai'),
(423, 28, 'Soppeng'),
(448, 28, 'Takalar'),
(451, 28, 'Tana Toraja'),
(486, 28, 'Toraja Utara'),
(493, 28, 'Wajo'),
(25, 29, 'Banggai'),
(26, 29, 'Banggai Kepulauan'),
(98, 29, 'Buol'),
(119, 29, 'Donggala'),
(291, 29, 'Morowali'),
(329, 29, 'Palu'),
(338, 29, 'Parigi Moutong'),
(366, 29, 'Poso'),
(410, 29, 'Sigi'),
(482, 29, 'Tojo Una-Una'),
(483, 29, 'Toli-Toli'),
(53, 30, 'Bau-Bau'),
(85, 30, 'Bombana'),
(101, 30, 'Buton'),
(102, 30, 'Buton Utara'),
(182, 30, 'Kendari'),
(198, 30, 'Kolaka'),
(199, 30, 'Kolaka Utara'),
(200, 30, 'Konawe'),
(201, 30, 'Konawe Selatan'),
(202, 30, 'Konawe Utara'),
(295, 30, 'Muna'),
(494, 30, 'Wakatobi'),
(73, 31, 'Bitung'),
(81, 31, 'Bolaang Mongondow (Bolmong)'),
(82, 31, 'Bolaang Mongondow Selatan'),
(83, 31, 'Bolaang Mongondow Timur'),
(84, 31, 'Bolaang Mongondow Utara'),
(188, 31, 'Kepulauan Sangihe'),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(192, 31, 'Kepulauan Talaud'),
(204, 31, 'Kotamobagu'),
(267, 31, 'Manado'),
(285, 31, 'Minahasa'),
(286, 31, 'Minahasa Selatan'),
(287, 31, 'Minahasa Tenggara'),
(288, 31, 'Minahasa Utara'),
(485, 31, 'Tomohon'),
(12, 32, 'Agam'),
(93, 32, 'Bukittinggi'),
(116, 32, 'Dharmasraya'),
(186, 32, 'Kepulauan Mentawai'),
(236, 32, 'Lima Puluh Koto/Kota'),
(318, 32, 'Padang'),
(321, 32, 'Padang Panjang'),
(322, 32, 'Padang Pariaman'),
(337, 32, 'Pariaman'),
(339, 32, 'Pasaman'),
(340, 32, 'Pasaman Barat'),
(345, 32, 'Payakumbuh'),
(357, 32, 'Pesisir Selatan'),
(394, 32, 'Sawah Lunto'),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)'),
(420, 32, 'Solok'),
(421, 32, 'Solok'),
(422, 32, 'Solok Selatan'),
(453, 32, 'Tanah Datar'),
(40, 33, 'Banyuasin'),
(121, 33, 'Empat Lawang'),
(220, 33, 'Lahat'),
(242, 33, 'Lubuk Linggau'),
(292, 33, 'Muara Enim'),
(297, 33, 'Musi Banyuasin'),
(298, 33, 'Musi Rawas'),
(312, 33, 'Ogan Ilir'),
(313, 33, 'Ogan Komering Ilir'),
(314, 33, 'Ogan Komering Ulu'),
(315, 33, 'Ogan Komering Ulu Selatan'),
(316, 33, 'Ogan Komering Ulu Timur'),
(324, 33, 'Pagar Alam'),
(327, 33, 'Palembang'),
(367, 33, 'Prabumulih'),
(15, 34, 'Asahan'),
(52, 34, 'Batu Bara'),
(70, 34, 'Binjai'),
(110, 34, 'Dairi'),
(112, 34, 'Deli Serdang'),
(137, 34, 'Gunungsitoli'),
(146, 34, 'Humbang Hasundutan'),
(173, 34, 'Karo'),
(217, 34, 'Labuhan Batu'),
(218, 34, 'Labuhan Batu Selatan'),
(219, 34, 'Labuhan Batu Utara'),
(229, 34, 'Langkat'),
(268, 34, 'Mandailing Natal'),
(278, 34, 'Medan'),
(307, 34, 'Nias'),
(308, 34, 'Nias Barat'),
(309, 34, 'Nias Selatan'),
(310, 34, 'Nias Utara'),
(319, 34, 'Padang Lawas'),
(320, 34, 'Padang Lawas Utara'),
(323, 34, 'Padang Sidempuan'),
(325, 34, 'Pakpak Bharat'),
(353, 34, 'Pematang Siantar'),
(389, 34, 'Samosir'),
(404, 34, 'Serdang Bedagai'),
(407, 34, 'Sibolga'),
(413, 34, 'Simalungun'),
(459, 34, 'Tanjung Balai'),
(463, 34, 'Tapanuli Selatan'),
(464, 34, 'Tapanuli Tengah'),
(465, 34, 'Tapanuli Utara'),
(470, 34, 'Tebing Tinggi'),
(481, 34, 'Toba Samosir');

-- --------------------------------------------------------

--
-- Table structure for table `rb_pembelian`
--

CREATE TABLE `rb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(50) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `waktu_beli` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_pembelian`
--

INSERT INTO `rb_pembelian` (`id_pembelian`, `kode_pembelian`, `id_supplier`, `waktu_beli`) VALUES
(1, 'PO-0001', 1, '2017-05-23 10:13:05'),
(2, 'PO-0002', 2, '2017-05-24 07:05:11'),
(3, 'PO-0003', 1, '2017-05-27 14:58:50'),
(5, 'PO-0004', 1, '2017-05-30 09:30:02'),
(6, 'PO-0005', 1, '2017-06-01 10:29:39'),
(7, 'PO-00011', 1, '2018-03-03 17:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `rb_pembelian_detail`
--

CREATE TABLE `rb_pembelian_detail` (
  `id_pembelian_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_pesan` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_pembelian_detail`
--

INSERT INTO `rb_pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `id_produk`, `harga_pesan`, `jumlah_pesan`, `satuan`) VALUES
(1, 1, 1, 260000, 100, 'pcs'),
(2, 1, 2, 455000, 150, 'pcs'),
(3, 2, 1, 255000, 235, 'pcs'),
(5, 2, 2, 3000000, 58, 'pcs'),
(9, 3, 1, 600000, 3, 'pcs'),
(7, 3, 2, 3000000, 43, 'pcs'),
(12, 5, 6, 320000, 25, 'unit'),
(13, 5, 5, 6990000, 10, 'unit'),
(14, 5, 4, 1000000, 45, 'unit'),
(16, 6, 13, 45900, 16, 'pcs'),
(17, 6, 12, 490000, 12, 'unit'),
(18, 6, 11, 8299000, 10, 'pcs'),
(19, 6, 9, 584000, 15, 'unit'),
(20, 6, 8, 275000, 6, 'unit'),
(21, 6, 7, 879000, 11, 'unit'),
(22, 6, 3, 14998000, 1, 'unit'),
(23, 7, 1, 60000, 2, 'pcs'),
(24, 7, 2, 340000, 4, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `rb_penjualan`
--

CREATE TABLE `rb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `kurir` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `resi` varchar(255) DEFAULT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `proses` enum('0','1','2','3') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_penjualan`
--

INSERT INTO `rb_penjualan` (`id_penjualan`, `kode_transaksi`, `id_pembeli`, `diskon`, `kurir`, `service`, `ongkir`, `resi`, `waktu_transaksi`, `proses`) VALUES
(1, 'TRX-20180303140923', 1, 0, 'pos', 'Paket Kilat Khusus', 69000, NULL, '2018-03-03 14:10:31', '3'),
(2, 'TRX-20180303141906', 1, 40000, 'pos', 'Paket Kilat Khusus', 153000, NULL, '2018-03-03 14:19:39', '2'),
(3, 'TRX-20180303151108', 1, 20000, 'jne', 'OKE', 141000, NULL, '2018-03-03 15:11:31', '1'),
(4, 'TRX-20180303165756', 1, 0, 'pos', 'Paket Kilat Khusus', 69000, NULL, '2018-03-03 16:58:20', '0'),
(5, 'TRX-20180303171340', 26, 20000, 'pos', 'Paket Kilat Khusus', 47500, NULL, '2018-03-03 17:15:52', '0'),
(6, 'TRX-20180304111742', 1, 0, 'jne', 'OKE', 141000, NULL, '2018-03-04 11:19:32', '0'),
(7, 'TRX-20180305130337', 3, 20000, 'jne', 'OKE', 141000, NULL, '2018-03-05 13:23:56', '0'),
(8, 'TRX-20180307062229', 1, 0, 'jne', 'REG', 86000, NULL, '2018-03-07 06:22:36', '0'),
(9, 'TRX-20191120063645', 1, 0, 'jne', 'REG', 90000, NULL, '2019-11-20 06:39:19', '0'),
(10, 'TRX-20191120064207', 1, 20000, 'cod', 'Cash on delivery', 1, NULL, '2019-11-20 06:47:48', '0'),
(11, 'TRX-20191120064832', 1, 0, 'cod', 'Cash on delivery', 1, NULL, '2019-11-20 06:49:49', '0'),
(12, 'TRX-20191120065135', 1, 0, 'cod', 'Cash on delivery', 1, NULL, '2019-11-20 06:51:57', '0'),
(13, 'TRX-20191120065235', 1, 0, 'cod', 'Cash on delivery', 1, NULL, '2019-11-20 06:52:58', '0'),
(14, 'TRX-20191120065322', 1, 0, 'cod', 'Cash on delivery', 1, NULL, '2019-11-20 06:53:32', '0'),
(15, 'TRX-20191120070207', 1, 0, 'pos', 'Paket Kilat Khusus', 76500, 'RESI-432312AD12', '2019-11-20 07:02:21', '0'),
(16, 'TRX-20191120072356', 1, 0, 'cod', 'Cash on delivery', 1, NULL, '2019-11-20 07:28:30', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rb_penjualan_detail`
--

CREATE TABLE `rb_penjualan_detail` (
  `id_penjualan_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `keterangan_order` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_penjualan_detail`
--

INSERT INTO `rb_penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_produk`, `jumlah`, `harga_jual`, `satuan`, `keterangan_order`) VALUES
(1, 1, 4, 1, 129900, 'unit', NULL),
(2, 1, 13, 1, 65000, 'pcs', NULL),
(3, 2, 6, 1, 75000, 'unit', NULL),
(4, 2, 7, 1, 99000, 'unit', NULL),
(5, 2, 12, 2, 65000, 'unit', NULL),
(6, 3, 3, 1, 169980, 'unit', NULL),
(7, 3, 12, 1, 65000, 'unit', NULL),
(8, 4, 13, 1, 65000, 'pcs', NULL),
(9, 5, 12, 1, 65000, 'unit', NULL),
(10, 5, 4, 1, 129900, 'unit', NULL),
(11, 6, 6, 1, 75000, 'unit', NULL),
(12, 6, 2, 1, 350000, 'pcs', NULL),
(13, 7, 12, 1, 65000, 'unit', NULL),
(14, 7, 11, 1, 89000, 'pcs', NULL),
(15, 8, 13, 1, 65000, 'pcs', NULL),
(16, 9, 13, 1, 65000, 'pcs', NULL),
(17, 10, 12, 1, 65000, 'unit', NULL),
(18, 11, 13, 1, 65000, 'pcs', NULL),
(19, 12, 13, 1, 65000, 'pcs', NULL),
(20, 13, 8, 1, 34500, 'unit', NULL),
(21, 14, 13, 1, 65000, 'pcs', NULL),
(22, 15, 13, 1, 65000, 'pcs', NULL),
(23, 16, 13, 1, 65000, 'pcs', 'XL, Merah');

-- --------------------------------------------------------

--
-- Table structure for table `rb_penjualan_temp`
--

CREATE TABLE `rb_penjualan_temp` (
  `id_penjualan_detail` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `keterangan_order` text DEFAULT NULL,
  `waktu_order` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rb_produk`
--

CREATE TABLE `rb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `produk_seo` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_reseller` int(11) NOT NULL,
  `harga_konsumen` int(11) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `diskon` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_produk`
--

INSERT INTO `rb_produk` (`id_produk`, `id_kategori_produk`, `nama_produk`, `produk_seo`, `satuan`, `harga_beli`, `harga_reseller`, `harga_konsumen`, `berat`, `diskon`, `gambar`, `keterangan`, `username`, `waktu_input`) VALUES
(1, 1, 'Segitiga Instan Aira- AA94.9 Tropical Blue', 'segitiga-instan-aira-aa94-9-tropical-blue', 'pcs', 60000, 65000, 70000, '300', 0, 'RYB6_1_Grey_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\n\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\n', 'admin', '2017-05-23 17:04:25'),
(2, 1, 'Segitiga Instan Aira- AA94.8 Minty Green', 'segitiga-instan-aira-aa94-8-minty-green', 'pcs', 340000, 345000, 350000, '500', 0, 'RV71_27_Jeans_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-23 17:10:17'),
(3, 2, 'Segitiga Instan KEINA - KN54.38 Delfine Lilac', 'segitiga-instan-keina-kn54-38-delfine-lilac', 'unit', 159980, 164980, 169980, '300', 0, 'RV71_5_Cold_Ocean_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 06:47:14'),
(4, 1, 'Segitiga Instan Madeira - MDB5.3 Sunset', 'segitiga-instan-madeira-mdb5-3-sunset', 'unit', 119900, 124900, 129900, '100', 0, 'MK97_7_Mocca_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 06:53:10'),
(5, 1, 'Segitiga Instan Madeira - MDB5.2 Ocean', 'segitiga-instan-madeira-mdb5-2-ocean', 'unit', 745000, 750000, 755000, '150', 0, 'KYB4_14_Soft_Lavender_1024x1024_f993283a-dae0-4a05-b163-9f6b44465732_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 06:56:24'),
(6, 1, 'Pashmina Instan Rafella - RLN1.2 Gold Maroon', 'pashmina-instan-rafella-rln1-2-gold-maroon', 'unit', 65000, 70000, 75000, '130', 0, 'Emily_Grey_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 06:57:11'),
(7, 6, 'Pashmina Instan Rafella - RLN1.1 Sweet Grey', 'pashmina-instan-rafella-rln1-1-sweet-grey', 'unit', 89000, 94000, 99000, '600', 0, 'AYD5_3_Mayra_Pink_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 09:52:58'),
(8, 6, 'Pashmina Instan Rafella - RLN1.3 Lilac', 'pashmina-instan-rafella-rln1-3-lilac', 'unit', 24500, 29500, 34500, '220', 0, 'AR96_13_Tartan_Grey_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 09:55:04'),
(9, 6, 'Pashmina Instan Diva Lava - DL85.5 Misty Sky', 'pashmina-instan-diva-lava-dl85-5-misty-sky', 'unit', 58500, 63500, 68500, '250', 0, 'AR91_95_Sheva_Maroon_1_grande.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 09:58:43'),
(10, 2, 'Pashmina Instan Diva Lava - DL85.1 Green Sea', 'pashmina-instan-diva-lava-dl85-1-green-sea', 'pcs', 49900, 54900, 59900, '320', 0, 'AR91_87_Molly_Grey_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 10:02:14'),
(11, 2, 'Pashmina Instan Famora - OR82.16 Plum', 'pashmina-instan-famora-or82-16-plum', 'pcs', 79000, 84000, 89000, '250', 0, 'AR91_45_Afia_Black_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 10:03:47'),
(12, 2, 'Pashmina Instan Famora - OR82.1 Black sweet', 'pashmina-instan-famora-or82-1-black-sweet', 'unit', 55000, 60000, 65000, '360', 20000, 'AF_23_6_Best_Of_Black_1024x1024_6e855c30-c2e4-4423-88ac-0f8e9dfeedc4_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 10:06:33'),
(13, 2, 'Segiempat Rebya  - RYB6.7 Pink Clover', 'segiempat-rebya-ryb6-7-pink-clover', 'pcs', 55000, 60000, 65000, '300', 0, 'AD_19_20_Misty_Grey_grande.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur. Aenean vestibulum felis sed mollis faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis est sit amet eleifend vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id nunc eu odio ultrices pulvinar non feugiat felis. Duis consequat urna sapien, porta gravida diam venenatis at. Duis at ornare enim, ac accumsan eros. Sed in finibus metus. Etiam blandit tristique orci, sit amet congue dui facilisis id. Donec fermentum diam at orci viverra placerat. Sed nunc lorem, cursus nec vestibulum hendrerit, tempus et libero.</p>\r\n\r\n<p>Donec consequat lacinia fringilla. Proin dapibus justo at elit iaculis, eu rutrum velit dapibus. Phasellus nec augue vel nisl sagittis malesuada vel vel orci. In in euismod massa. Praesent vel blandit arcu. Maecenas eleifend dui in est rhoncus, mattis sollicitudin augue semper. Donec a lectus rhoncus, ornare nunc rutrum, egestas arcu. Aenean dapibus urna non nisl dignissim volutpat.</p>\r\n', 'admin', '2017-05-30 10:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `rb_provinsi`
--

CREATE TABLE `rb_provinsi` (
  `provinsi_id` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_provinsi`
--

INSERT INTO `rb_provinsi` (`provinsi_id`, `nama_provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `rb_rekening`
--

CREATE TABLE `rb_rekening` (
  `id_rekening` int(5) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `pemilik_rekening` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_rekening`
--

INSERT INTO `rb_rekening` (`id_rekening`, `nama_bank`, `no_rekening`, `pemilik_rekening`) VALUES
(1, 'BRI', '547601016142539', 'ROBBY PRIHANDAYA'),
(2, 'BCA', '0320943647', 'ROBBY PRIHANDAYA');

-- --------------------------------------------------------

--
-- Table structure for table `rb_supplier`
--

CREATE TABLE `rb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `kontak_person` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat_email` varchar(100) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `katerangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_supplier`
--

INSERT INTO `rb_supplier` (`id_supplier`, `nama_supplier`, `kontak_person`, `alamat_lengkap`, `no_hp`, `alamat_email`, `kode_pos`, `no_telpon`, `fax`, `katerangan`) VALUES
(1, 'PT. Elektronik Jaya Abadi', 'Muhammad Arsen', 'Jl. Siti Nurbayara, No 23 D, Tunggul Hitam, Padang', '082173054522', 'jaya.abadi@gmail.com', 56123, '0751461692', '0751461691', 'Tidak ada keterangan,..'),
(2, 'PT. Muda Hardware Sejahtera', 'Saiful Tanjung', 'Jl. Persada Ramayana, Ulak Karang, Padang', '098912334566', 'hardware.sejahtera@gmail.com', 87632, '075165321', '075165312', 'Tidak ada keterangan,..'),
(3, 'PT. Kereta Kencana', 'Arsenio Orlando', 'Jl. Linggar Jati, No 345, Koto Tangah, padang', '82173054486', 'kereta.kencana@gmail.com', 34587, '0751461692', '0751461693', 'Tidak ada keterangan,..');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `keterangan`, `gambar`, `waktu`) VALUES
(1, 'Hijab makes a woman as beautiful as an angel', 'hijab3.jpg', '2016-05-13 08:09:18'),
(2, 'Beautiful Indonesian Women with Beautiful Eyes hijab niqab', 'hijab2.jpg', '2016-05-13 08:10:18'),
(4, 'Hijabers - Be inspiring woman with hijab', 'hijab1.jpg', '2018-02-18 00:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT 1,
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('223.255.231.148', '2014-05-06', 1, '1399357334'),
('223.255.231.147', '2014-05-15', 3, '1400119147'),
('223.255.224.73', '2014-05-15', 12, '1400123797'),
('223.255.224.69', '2014-05-16', 2, '1400215103'),
('118.96.51.231', '2014-05-16', 19, '1400233044'),
('223.255.231.146', '2014-05-16', 2, '1400228049'),
('::1', '2014-06-20', 2, '1403230579'),
('::1', '2014-06-22', 8, '1403436591'),
('223.255.231.154', '2014-06-26', 1, '1403739948'),
('223.255.231.148', '2014-06-26', 6, '1403745715'),
('223.255.224.74', '2014-06-26', 1, '1403748060'),
('223.255.224.69', '2014-06-26', 1, '1403753239'),
('223.255.224.77', '2014-06-29', 1, '1404039342'),
('::1', '2014-07-02', 6, '1404277263'),
('127.0.0.1', '2014-07-17', 2, '1405582494'),
('127.0.0.1', '2014-07-21', 1, '1405929828'),
('36.76.60.43', '2014-07-21', 1, '1405951864'),
('223.255.231.154', '2014-07-21', 2, '1405957200'),
('223.255.227.21', '2014-07-22', 1, '1405995171'),
('223.255.231.146', '2014-07-22', 1, '1405997152'),
('223.255.227.21', '2014-07-23', 1, '1406100212'),
('223.255.227.17', '2014-07-23', 1, '1406104552'),
('223.255.227.23', '2014-07-24', 1, '1406168095'),
('223.255.231.153', '2014-07-24', 1, '1406204439'),
('223.255.231.146', '2014-07-25', 1, '1406268985'),
('180.76.5.193', '2014-08-06', 1, '1407302738'),
('180.76.5.23', '2014-08-06', 1, '1407304739'),
('202.67.36.241', '2014-08-06', 1, '1407305643'),
('198.148.27.22', '2014-08-06', 1, '1407306703'),
('180.251.170.42', '2014-08-06', 7, '1407310167'),
('128.199.171.191', '2014-08-06', 3, '1407323435'),
('223.255.231.149', '2014-08-06', 2, '1407309879'),
('223.255.227.28', '2014-08-06', 8, '1407311801'),
('103.24.49.242', '2014-08-06', 1, '1407312326'),
('223.255.231.146', '2014-08-06', 1, '1407313297'),
('180.214.233.34', '2014-08-06', 1, '1407321063'),
('66.249.77.87', '2014-08-06', 1, '1407323509'),
('223.255.227.30', '2014-08-06', 1, '1407325862'),
('180.254.207.13', '2014-08-06', 5, '1407330687'),
('114.79.13.199', '2014-08-06', 1, '1407336900'),
('202.152.199.34', '2014-08-06', 7, '1407337100'),
('180.76.6.21', '2014-08-07', 1, '1407347753'),
('114.79.13.55', '2014-08-07', 3, '1407354277'),
('114.125.41.136', '2014-08-07', 1, '1407352625'),
('180.76.6.147', '2014-08-07', 1, '1407355344'),
('180.76.6.64', '2014-08-07', 1, '1407367237'),
('69.171.247.116', '2014-08-07', 1, '1407379834'),
('69.171.247.119', '2014-08-07', 1, '1407379834'),
('69.171.247.114', '2014-08-07', 1, '1407379834'),
('69.171.247.115', '2014-08-07', 1, '1407379834'),
('202.67.34.29', '2014-08-07', 2, '1407380415'),
('36.76.52.112', '2014-08-07', 1, '1407380496'),
('223.255.231.145', '2014-08-07', 5, '1407387045'),
('223.255.231.153', '2014-08-07', 2, '1407388883'),
('223.255.227.27', '2014-08-07', 1, '1407393087'),
('180.76.5.25', '2014-08-07', 1, '1407394749'),
('223.255.231.146', '2014-08-07', 1, '1407397183'),
('157.55.39.248', '2014-08-07', 1, '1407397231'),
('180.254.200.55', '2014-08-07', 2, '1407399466'),
('110.139.67.15', '2014-08-07', 8, '1407399221'),
('180.242.17.64', '2014-08-07', 11, '1407414373'),
('141.0.8.59', '2014-08-07', 1, '1407412384'),
('110.76.149.91', '2014-08-07', 1, '1407422367'),
('223.255.231.151', '2014-08-07', 3, '1407426943'),
('82.145.209.206', '2014-08-07', 1, '1407430369'),
('223.255.227.28', '2014-08-08', 3, '1407469589'),
('66.93.156.50', '2014-08-08', 1, '1407472340'),
('202.62.17.47', '2014-08-08', 1, '1407484393'),
('36.70.135.163', '2014-08-08', 6, '1407485987'),
('173.252.74.115', '2014-08-08', 1, '1407485153'),
('118.96.58.136', '2014-08-08', 2, '1407486347'),
('114.79.29.68', '2014-08-08', 1, '1407502537'),
('66.220.156.113', '2014-08-08', 1, '1407503375'),
('112.215.66.79', '2014-08-08', 1, '1407503381'),
('125.163.113.156', '2014-08-08', 9, '1407508824'),
('180.76.5.94', '2014-08-08', 1, '1407508624'),
('120.172.9.192', '2014-08-08', 1, '1407515634'),
('202.67.41.51', '2014-08-08', 1, '1407515702'),
('180.253.243.222', '2014-08-09', 1, '1407542724'),
('36.75.224.20', '2014-08-09', 1, '1407548005'),
('180.76.5.65', '2014-08-09', 1, '1407548865'),
('66.249.77.77', '2014-08-09', 2, '1407582711'),
('180.76.6.137', '2014-08-09', 1, '1407553037'),
('66.249.77.87', '2014-08-09', 1, '1407554836'),
('66.249.77.97', '2014-08-09', 2, '1407562640'),
('120.177.44.126', '2014-08-09', 2, '1407558625'),
('223.255.231.145', '2014-08-09', 3, '1407558663'),
('36.73.64.113', '2014-08-09', 1, '1407558640'),
('36.72.187.12', '2014-08-09', 1, '1407560351'),
('202.67.41.51', '2014-08-09', 1, '1407561096'),
('114.125.60.68', '2014-08-09', 4, '1407561514'),
('202.67.40.50', '2014-08-09', 1, '1407562007'),
('180.76.6.136', '2014-08-09', 1, '1407562581'),
('110.232.81.2', '2014-08-09', 5, '1407563275'),
('146.185.28.59', '2014-08-09', 1, '1407564768'),
('120.174.157.139', '2014-08-09', 1, '1407568139'),
('223.255.227.23', '2014-08-09', 2, '1407570163'),
('193.105.210.119', '2014-08-09', 1, '1407577518'),
('125.162.57.66', '2014-08-09', 2, '1407579822'),
('180.241.163.1', '2014-08-09', 8, '1407580493'),
('36.76.44.163', '2014-08-09', 6, '1407603574'),
('180.76.5.144', '2014-08-09', 1, '1407582757'),
('107.167.103.40', '2014-08-09', 1, '1407586189'),
('36.68.48.23', '2014-08-09', 1, '1407586974'),
('192.99.218.151', '2014-08-09', 4, '1407587574'),
('36.74.55.24', '2014-08-09', 3, '1407589161'),
('118.97.212.184', '2014-08-09', 8, '1407595169'),
('36.72.114.118', '2014-08-09', 2, '1407597684'),
('180.76.5.153', '2014-08-09', 1, '1407602870'),
('180.76.5.59', '2014-08-09', 1, '1407603153'),
('180.76.5.18', '2014-08-10', 1, '1407606581'),
('180.254.155.156', '2014-08-10', 2, '1407607003'),
('180.76.6.42', '2014-08-10', 1, '1407608363'),
('36.68.242.217', '2014-08-10', 5, '1407627100'),
('66.249.77.77', '2014-08-10', 2, '1407633623'),
('202.67.44.64', '2014-08-10', 1, '1407629598'),
('180.76.6.43', '2014-08-10', 1, '1407631270'),
('118.97.212.182', '2014-08-10', 4, '1407632228'),
('139.0.102.140', '2014-08-10', 1, '1407633944'),
('66.249.77.87', '2014-08-10', 1, '1407636902'),
('66.249.77.97', '2014-08-10', 1, '1407639983'),
('180.76.6.159', '2014-08-10', 1, '1407640798'),
('118.97.212.181', '2014-08-10', 3, '1407642556'),
('36.68.46.37', '2014-08-10', 2, '1407642940'),
('180.76.5.69', '2014-08-10', 1, '1407645158'),
('180.76.5.80', '2014-08-10', 1, '1407648268'),
('180.76.5.143', '2014-08-10', 1, '1407650068'),
('223.255.231.145', '2014-08-10', 1, '1407650216'),
('180.76.6.149', '2014-08-10', 1, '1407657020'),
('36.77.183.218', '2014-08-10', 2, '1407657119'),
('127.0.0.1', '2014-08-10', 2, '1407660057'),
('127.0.0.1', '2014-08-11', 2, '1407725194'),
('127.0.0.1', '2014-08-12', 1, '1407862185'),
('127.0.0.1', '2014-08-13', 1, '1407899819'),
('127.0.0.1', '2014-08-17', 44, '1408287630'),
('127.0.0.1', '2014-08-18', 253, '1408372590'),
('127.0.0.1', '2014-08-19', 4, '1408413702'),
('::1', '2014-08-19', 90, '1408433250'),
('::1', '2014-08-31', 1, '1409487043'),
('::1', '2015-03-11', 11, '1426061663'),
('::1', '2015-03-12', 1, '1426114982'),
('::1', '2015-03-15', 32, '1426430637'),
('::1', '2015-03-18', 137, '1426666506'),
('::1', '2015-03-19', 143, '1426751746'),
('::1', '2015-03-21', 198, '1426912294'),
('::1', '2015-03-22', 554, '1427039069'),
('127.0.0.1', '2015-03-22', 1, '1427030317'),
('::1', '2015-03-23', 275, '1427093113'),
('::1', '2015-03-24', 42, '1427179474'),
('::1', '2015-03-25', 45, '1427251499'),
('39.225.164.2', '2015-05-14', 7, '1431584409'),
('119.110.72.130', '2015-05-14', 30, '1431595368'),
('89.145.95.2', '2015-05-14', 1, '1431582645'),
('66.220.158.118', '2015-05-14', 1, '1431582842'),
('66.220.158.115', '2015-05-14', 1, '1431582852'),
('66.220.158.112', '2015-05-14', 3, '1431595371'),
('66.220.158.119', '2015-05-14', 1, '1431582942'),
('114.125.43.185', '2015-05-14', 5, '1431602132'),
('119.110.72.130', '2015-05-15', 1, '1431673658'),
('114.125.45.206', '2015-05-16', 18, '1431741581'),
('66.220.158.116', '2015-05-16', 1, '1431741049'),
('66.220.158.118', '2015-05-16', 1, '1431741224'),
('66.220.158.114', '2015-05-16', 1, '1431741233'),
('39.229.6.148', '2015-05-16', 11, '1431791037'),
('39.225.236.155', '2015-05-17', 8, '1431862096'),
('119.110.72.130', '2015-05-19', 6, '1432006569'),
('89.145.95.42', '2015-05-19', 2, '1432006661'),
('114.121.133.117', '2015-05-19', 3, '1432046663'),
('124.195.114.65', '2015-05-28', 16, '1432832381'),
('66.220.158.119', '2015-05-28', 1, '1432831000'),
('66.220.158.115', '2015-05-28', 1, '1432831013'),
('66.220.158.116', '2015-05-28', 1, '1432832385'),
('124.195.114.65', '2015-05-29', 77, '1432836214'),
('66.220.158.113', '2015-05-29', 1, '1432835961'),
('66.249.84.178', '2015-05-29', 1, '1432836220'),
('103.246.200.14', '2015-05-29', 1, '1432851867'),
('103.246.200.59', '2015-05-29', 1, '1432851916'),
('114.124.5.250', '2015-05-29', 6, '1432852876'),
('173.252.105.114', '2015-05-29', 1, '1432852770'),
('120.180.175.150', '2015-05-29', 36, '1432864082'),
('103.246.200.50', '2015-05-29', 1, '1432863615'),
('103.246.200.1', '2015-05-29', 1, '1432863650'),
('103.246.200.33', '2015-05-29', 1, '1432863711'),
('103.246.200.44', '2015-05-29', 1, '1432863795'),
('120.174.144.115', '2015-05-29', 1, '1432908445'),
('119.110.72.130', '2015-05-29', 27, '1432912022'),
('173.252.90.117', '2015-05-29', 1, '1432910852'),
('173.252.90.116', '2015-05-29', 1, '1432910873'),
('173.252.90.118', '2015-05-29', 1, '1432911344'),
('173.252.90.122', '2015-05-29', 1, '1432911470'),
('66.249.84.190', '2015-05-30', 1, '1432945579'),
('39.254.117.222', '2015-05-30', 1, '1432991226'),
('66.249.84.178', '2015-05-31', 1, '1433037242'),
('120.176.92.190', '2015-06-01', 3, '1433128955'),
('66.102.6.210', '2015-06-01', 1, '1433134430'),
('120.164.44.28', '2015-06-01', 13, '1433149419'),
('124.195.118.227', '2015-06-01', 1, '1433170960'),
('120.177.28.244', '2015-06-02', 8, '1433220043'),
('66.249.84.190', '2015-06-02', 1, '1433247837'),
('120.190.75.179', '2015-06-03', 7, '1433302768'),
('119.110.72.130', '2015-06-03', 4, '1433302761'),
('89.145.95.2', '2015-06-03', 1, '1433302690'),
('66.249.71.147', '2015-06-07', 46, '1433696370'),
('66.249.71.130', '2015-06-07', 30, '1433696150'),
('66.249.71.164', '2015-06-07', 37, '1433696154'),
('173.252.74.113', '2015-06-07', 8, '1433694061'),
('173.252.74.117', '2015-06-07', 3, '1433676319'),
('66.249.64.57', '2015-06-07', 1, '1433674283'),
('173.252.88.89', '2015-06-07', 5, '1433677999'),
('173.252.88.86', '2015-06-07', 2, '1433677597'),
('173.252.74.119', '2015-06-07', 7, '1433694862'),
('66.249.79.117', '2015-06-07', 1, '1433674983'),
('173.252.88.84', '2015-06-07', 2, '1433676738'),
('173.252.74.115', '2015-06-07', 3, '1433676460'),
('173.252.74.114', '2015-06-07', 2, '1433694204'),
('173.252.74.118', '2015-06-07', 3, '1433676180'),
('173.252.74.112', '2015-06-07', 5, '1433695314'),
('173.252.88.85', '2015-06-07', 2, '1433677804'),
('173.252.88.90', '2015-06-07', 1, '1433676251'),
('173.252.74.116', '2015-06-07', 5, '1433695249'),
('173.252.88.87', '2015-06-07', 2, '1433677488'),
('173.252.88.88', '2015-06-07', 1, '1433677370'),
('66.249.79.130', '2015-06-07', 1, '1433694848'),
('66.220.156.116', '2015-06-07', 2, '1433696197'),
('66.249.67.104', '2015-06-07', 1, '1433696147'),
('66.220.156.112', '2015-06-07', 2, '1433696173'),
('66.220.146.22', '2015-06-07', 1, '1433696162'),
('66.249.67.117', '2015-06-07', 1, '1433696288'),
('66.220.156.114', '2015-06-07', 1, '1433696309'),
('66.220.156.117', '2015-06-08', 3, '1433711204'),
('66.249.71.164', '2015-06-08', 32, '1433779112'),
('66.220.146.25', '2015-06-08', 2, '1433736854'),
('66.220.156.116', '2015-06-08', 2, '1433709422'),
('66.249.71.147', '2015-06-08', 29, '1433748751'),
('66.220.156.112', '2015-06-08', 4, '1433715007'),
('66.220.146.20', '2015-06-08', 1, '1433696744'),
('66.249.71.130', '2015-06-08', 38, '1433777391'),
('66.220.156.118', '2015-06-08', 2, '1433712628'),
('66.220.146.27', '2015-06-08', 1, '1433712556'),
('66.220.146.26', '2015-06-08', 1, '1433712746'),
('66.249.67.104', '2015-06-08', 4, '1433746797'),
('66.220.146.22', '2015-06-08', 1, '1433714244'),
('66.220.156.115', '2015-06-08', 2, '1433714821'),
('66.249.67.117', '2015-06-08', 2, '1433780504'),
('120.176.251.49', '2015-06-08', 2, '1433737104'),
('66.220.156.119', '2015-06-08', 1, '1433737457'),
('66.249.71.147', '2015-06-09', 3, '1433836081'),
('66.249.71.130', '2015-06-09', 4, '1433835126'),
('66.249.67.104', '2015-06-09', 1, '1433788622'),
('66.249.71.164', '2015-06-09', 1, '1433823064'),
('66.249.71.130', '2015-06-10', 5, '1433953790'),
('66.249.67.117', '2015-06-10', 1, '1433911605'),
('66.249.71.164', '2015-06-10', 3, '1433954890'),
('66.249.71.147', '2015-06-10', 2, '1433953573'),
('66.249.71.147', '2015-06-11', 1, '1433957808'),
('66.249.71.164', '2015-06-11', 2, '1433990805'),
('68.180.228.104', '2015-06-11', 1, '1433975257'),
('66.249.71.130', '2015-06-11', 1, '1433991891'),
('36.68.28.19', '2015-06-14', 5, '1434224041'),
('120.164.46.127', '2015-06-14', 2, '1434239557'),
('66.249.67.248', '2015-06-15', 1, '1434362861'),
('104.193.10.50', '2015-06-15', 3, '1434372762'),
('104.193.10.50', '2015-06-16', 2, '1434454308'),
('36.80.234.114', '2015-06-16', 4, '1434443273'),
('173.252.74.115', '2015-06-16', 1, '1434443264'),
('173.252.74.114', '2015-06-16', 1, '1434443279'),
('119.110.72.130', '2015-06-16', 1, '1434467216'),
('124.195.116.71', '2015-06-17', 3, '1434551738'),
('120.184.130.21', '2015-06-27', 1, '1435386862'),
('66.249.84.246', '2015-06-27', 1, '1435387150'),
('120.176.176.106', '2015-06-28', 7, '1435461088'),
('66.220.158.114', '2015-06-28', 1, '1435461007'),
('66.249.84.129', '2015-06-28', 1, '1435466083'),
('66.249.84.246', '2015-06-29', 2, '1435563211'),
('66.249.84.252', '2015-06-29', 1, '1435563206'),
('66.249.84.246', '2015-06-30', 3, '1435677685'),
('66.249.84.252', '2015-06-30', 1, '1435645799'),
('66.249.84.252', '2015-07-01', 1, '1435710707'),
('66.249.84.129', '2015-07-01', 1, '1435711780'),
('120.177.18.200', '2015-07-02', 1, '1435824891'),
('::1', '2015-11-25', 15, '1448407930'),
('::1', '2015-12-01', 12, '1448944568'),
('::1', '2015-12-03', 9, '1449138520'),
('::1', '2015-12-05', 26, '1449279360'),
('::1', '2015-12-07', 4, '1449442678'),
('::1', '2015-12-08', 8, '1449532582'),
('::1', '2015-12-13', 31, '1449974628'),
('::1', '2015-12-18', 9, '1450418535'),
('::1', '2015-12-21', 10, '1450654644'),
('::1', '2015-12-24', 3, '1450917714'),
('::1', '2015-12-25', 4, '1451037761'),
('::1', '2015-12-26', 5, '1451086546'),
('::1', '2016-01-01', 5, '1451626224'),
('::1', '2016-01-12', 6, '1452564572'),
('::1', '2016-01-16', 7, '1452913899'),
('::1', '2016-05-16', 37, '1463417273'),
('::1', '2016-04-27', 6, '1461765262'),
('::1', '2016-05-15', 7, '1463323116'),
('::1', '2016-05-03', 6, '1462232162'),
('::1', '2016-05-08', 7, '1462664246'),
('::1', '2016-05-11', 6, '1462969419'),
('::1', '2016-05-12', 6, '1463014545'),
('127.0.0.1', '2016-05-15', 3, '1463269324'),
('::1', '2016-05-17', 45, '1463492558'),
('::1', '2016-05-18', 106, '1463590677'),
('::1', '2016-05-19', 214, '1463630630'),
('::1', '2016-05-20', 487, '1463763520'),
('::1', '2016-05-21', 514, '1463847119'),
('::1', '2016-05-22', 1, '1463879088'),
('::1', '2016-05-23', 47, '1463994067'),
('::1', '2016-05-24', 326, '1464107038'),
('::1', '2016-05-25', 57, '1464193724'),
('::1', '2016-05-26', 344, '1464252857'),
('::1', '2016-05-27', 1, '1464344174'),
('::1', '2016-05-28', 663, '1464452162'),
('::1', '2016-05-29', 103, '1464517478'),
('::1', '2016-05-30', 2, '1464563692'),
('::1', '2016-06-01', 423, '1464756008'),
('::1', '2016-06-02', 516, '1464857838'),
('::1', '2016-06-03', 217, '1464939517'),
('::1', '2016-06-04', 146, '1465037330'),
('::1', '2016-06-05', 311, '1465140182'),
('::1', '2016-06-06', 63, '1465185192'),
('::1', '2016-06-07', 383, '1465278209'),
('::1', '2016-06-08', 392, '1465387331'),
('::1', '2016-06-09', 563, '1465453570'),
('::1', '2016-06-10', 23, '1465531632'),
('::1', '2016-06-13', 29, '1465793213'),
('::1', '2016-06-15', 373, '1466003972'),
('::1', '2016-06-16', 209, '1466046365'),
('120.164.43.190', '2016-06-16', 2, '1466047900'),
('180.254.135.210', '2016-06-16', 20, '1466048994'),
('36.66.250.50', '2016-06-16', 18, '1466051721'),
('178.162.216.38', '2016-06-16', 17, '1466048866'),
('178.162.216.32', '2016-06-16', 10, '1466049449'),
('91.109.30.77', '2016-06-16', 16, '1466073338'),
('91.109.30.71', '2016-06-16', 6, '1466052501'),
('178.162.216.35', '2016-06-16', 28, '1466053109'),
('91.109.30.83', '2016-06-16', 37, '1466054045'),
('91.109.30.107', '2016-06-16', 5, '1466054192'),
('178.162.216.36', '2016-06-16', 2, '1466054528'),
('36.84.224.103', '2016-06-16', 60, '1466062507'),
('36.84.1.46', '2016-06-16', 218, '1466073219'),
('69.61.12.70', '2016-06-16', 2, '1466083459'),
('180.254.134.13', '2016-06-16', 119, '1466072215'),
('66.249.65.96', '2016-06-16', 2, '1466087700'),
('66.249.66.172', '2016-06-16', 1, '1466070655'),
('158.69.228.18', '2016-06-16', 1, '1466072162'),
('91.109.30.101', '2016-06-16', 1, '1466073283'),
('91.121.83.118', '2016-06-16', 1, '1466075092'),
('161.69.163.20', '2016-06-16', 6, '1466076267'),
('36.75.253.198', '2016-06-16', 116, '1466095060'),
('66.249.93.191', '2016-06-16', 2, '1466079959'),
('36.84.1.54', '2016-06-16', 240, '1466093472'),
('66.249.65.90', '2016-06-16', 4, '1466089247'),
('66.249.65.96', '2016-06-17', 2, '1466181286'),
('66.249.93.189', '2016-06-17', 2, '1466097996'),
('5.189.159.157', '2016-06-17', 2, '1466098003'),
('69.61.12.70', '2016-06-17', 4, '1466169759'),
('66.249.65.93', '2016-06-17', 6, '1466181939'),
('208.80.194.125', '2016-06-17', 1, '1466117907'),
('108.61.157.59', '2016-06-17', 1, '1466120162'),
('208.80.194.27', '2016-06-17', 1, '1466124054'),
('180.254.142.113', '2016-06-17', 12, '1466155649'),
('114.121.239.181', '2016-06-17', 17, '1466133261'),
('114.125.188.40', '2016-06-17', 1, '1466135081'),
('180.76.15.5', '2016-06-17', 1, '1466136691'),
('36.84.1.66', '2016-06-17', 273, '1466160632'),
('198.27.69.229', '2016-06-17', 2, '1466146078'),
('161.69.163.20', '2016-06-17', 6, '1466146883'),
('91.219.237.229', '2016-06-17', 1, '1466150581'),
('110.53.183.50', '2016-06-17', 1, '1466151176'),
('66.249.65.90', '2016-06-17', 1, '1466154519'),
('202.67.36.245', '2016-06-17', 23, '1466172043'),
('207.102.138.158', '2016-06-17', 1, '1466182322'),
('91.121.83.118', '2016-06-17', 1, '1466182757'),
('66.249.65.93', '2016-06-18', 3, '1466188462'),
('69.61.12.70', '2016-06-18', 4, '1466256380'),
('202.67.37.46', '2016-06-18', 5, '1466200881'),
('180.249.17.243', '2016-06-18', 34, '1466263192'),
('125.162.241.179', '2016-06-18', 26, '1466263175'),
('180.249.226.71', '2016-06-18', 22, '1466263189'),
('208.80.194.125', '2016-06-18', 1, '1466203681'),
('36.75.253.198', '2016-06-18', 52, '1466215361'),
('208.80.194.27', '2016-06-18', 1, '1466209791'),
('110.136.242.160', '2016-06-18', 651, '1466260901'),
('167.114.228.206', '2016-06-18', 2, '1466229027'),
('66.249.65.96', '2016-06-18', 1, '1466231372'),
('202.67.37.37', '2016-06-18', 75, '1466238258'),
('146.20.65.193', '2016-06-18', 1, '1466237523'),
('202.67.37.41', '2016-06-18', 14, '1466243372'),
('36.83.123.122', '2016-06-18', 70, '1466257837'),
('162.251.167.90', '2016-06-18', 1, '1466244633'),
('84.177.14.46', '2016-06-18', 2, '1466248480'),
('46.165.230.5', '2016-06-18', 1, '1466244668'),
('37.146.189.147', '2016-06-18', 2, '1466248442'),
('69.195.159.138', '2016-06-18', 4, '1466248482'),
('185.86.78.204', '2016-06-18', 1, '1466244683'),
('65.19.167.131', '2016-06-18', 1, '1466244692'),
('162.247.73.74', '2016-06-18', 1, '1466244698'),
('146.0.43.126', '2016-06-18', 1, '1466244703'),
('147.175.187.143', '2016-06-18', 1, '1466244717'),
('73.219.221.183', '2016-06-18', 2, '1466248491'),
('62.210.37.82', '2016-06-18', 1, '1466244739'),
('149.202.98.160', '2016-06-18', 1, '1466248415'),
('163.172.152.231', '2016-06-18', 1, '1466248422'),
('171.25.193.131', '2016-06-18', 1, '1466248429'),
('178.62.71.57', '2016-06-18', 1, '1466248438'),
('71.19.157.127', '2016-06-18', 1, '1466248503'),
('161.69.163.20', '2016-06-18', 6, '1466250529'),
('91.121.83.118', '2016-06-18', 1, '1466250665'),
('45.55.229.210', '2016-06-18', 16, '1466252992'),
('180.254.142.113', '2016-06-18', 1, '1466253613'),
('45.33.15.94', '2016-06-18', 2, '1466253942'),
('114.125.177.53', '2016-06-18', 22, '1466256313'),
('23.92.215.2', '2016-06-18', 1, '1466255241'),
('202.67.37.40', '2016-06-18', 27, '1466267825'),
('78.47.67.232', '2016-06-18', 1, '1466264171'),
('69.61.12.70', '2016-06-19', 4, '1466340028'),
('141.8.143.187', '2016-06-19', 1, '1466277860'),
('66.249.65.90', '2016-06-19', 15, '1466354190'),
('66.249.66.165', '2016-06-19', 1, '1466280888'),
('66.249.65.96', '2016-06-19', 6, '1466308275'),
('66.249.65.93', '2016-06-19', 7, '1466321238'),
('36.83.123.122', '2016-06-19', 67, '1466348740'),
('73.78.200.51', '2016-06-19', 1, '1466292747'),
('208.80.192.33', '2016-06-19', 1, '1466293843'),
('208.80.194.120', '2016-06-19', 1, '1466296208'),
('180.249.0.227', '2016-06-19', 471, '1466322380'),
('36.75.253.198', '2016-06-19', 19, '1466306056'),
('66.249.85.219', '2016-06-19', 1, '1466305155'),
('66.102.6.245', '2016-06-19', 1, '1466305339'),
('66.249.66.172', '2016-06-19', 1, '1466310970'),
('66.102.6.237', '2016-06-19', 1, '1466310997'),
('161.69.163.20', '2016-06-19', 6, '1466311149'),
('141.8.143.221', '2016-06-19', 1, '1466317007'),
('66.102.6.241', '2016-06-19', 1, '1466323149'),
('66.249.85.222', '2016-06-19', 1, '1466323150'),
('193.90.12.90', '2016-06-19', 1, '1466323308'),
('91.121.83.118', '2016-06-19', 1, '1466324349'),
('202.67.37.35', '2016-06-19', 11, '1466324835'),
('73.219.221.183', '2016-06-19', 1, '1466329261'),
('84.177.12.15', '2016-06-19', 1, '1466329302'),
('46.166.186.225', '2016-06-19', 1, '1466329324'),
('85.159.237.210', '2016-06-19', 1, '1466329333'),
('69.195.159.138', '2016-06-19', 3, '1466329402'),
('199.127.226.150', '2016-06-19', 1, '1466329344'),
('37.146.82.214', '2016-06-19', 1, '1466329351'),
('158.130.0.242', '2016-06-19', 1, '1466329395'),
('114.125.191.58', '2016-06-19', 1, '1466330035'),
('46.229.167.149', '2016-06-19', 3, '1466334280'),
('120.169.255.153', '2016-06-19', 1, '1466335160'),
('180.249.226.71', '2016-06-19', 11, '1466342829'),
('125.162.241.179', '2016-06-19', 9, '1466342839'),
('180.249.17.243', '2016-06-19', 9, '1466342812'),
('114.125.179.243', '2016-06-19', 1, '1466344269'),
('36.75.249.65', '2016-06-19', 1, '1466344423'),
('180.76.15.13', '2016-06-19', 1, '1466346082'),
('185.51.65.87', '2016-06-19', 1, '1466347711'),
('106.186.122.169', '2016-06-19', 3, '1466351774'),
('66.249.65.90', '2016-06-20', 11, '1466440106'),
('69.61.12.70', '2016-06-20', 4, '1466427353'),
('163.172.38.173', '2016-06-20', 1, '1466361641'),
('66.249.65.93', '2016-06-20', 4, '1466408523'),
('36.83.123.122', '2016-06-20', 39, '1466415711'),
('185.51.65.87', '2016-06-20', 2, '1466409313'),
('208.80.194.27', '2016-06-20', 1, '1466377312'),
('208.80.194.120', '2016-06-20', 1, '1466379004'),
('66.249.65.96', '2016-06-20', 3, '1466440090'),
('36.66.250.50', '2016-06-20', 71, '1466407313'),
('180.254.134.109', '2016-06-20', 65, '1466397885'),
('161.69.163.20', '2016-06-20', 6, '1466388447'),
('36.83.79.26', '2016-06-20', 19, '1466392307'),
('163.172.38.175', '2016-06-20', 1, '1466391671'),
('114.125.173.85', '2016-06-20', 5, '1466392282'),
('66.249.84.167', '2016-06-20', 1, '1466393457'),
('66.102.6.245', '2016-06-20', 1, '1466393801'),
('54.198.96.122', '2016-06-20', 1, '1466398071'),
('36.83.82.69', '2016-06-20', 83, '1466418751'),
('128.199.99.114', '2016-06-20', 1, '1466401862'),
('65.19.167.132', '2016-06-20', 1, '1466407965'),
('85.25.103.119', '2016-06-20', 1, '1466409700'),
('91.121.83.118', '2016-06-20', 1, '1466414581'),
('162.251.167.74', '2016-06-20', 5, '1466419588'),
('84.177.20.13', '2016-06-20', 1, '1466415697'),
('73.219.221.183', '2016-06-20', 2, '1466419705'),
('148.251.255.92', '2016-06-20', 1, '1466415709'),
('35.0.127.52', '2016-06-20', 1, '1466415721'),
('46.165.251.153', '2016-06-20', 1, '1466415725'),
('65.19.167.131', '2016-06-20', 1, '1466415729'),
('37.146.64.203', '2016-06-20', 2, '1466419635'),
('46.28.110.136', '2016-06-20', 1, '1466415888'),
('158.69.228.18', '2016-06-20', 1, '1466415978'),
('95.175.97.229', '2016-06-20', 1, '1466417094'),
('104.200.24.65', '2016-06-20', 1, '1466419622'),
('97.74.237.196', '2016-06-20', 1, '1466419628'),
('185.100.85.132', '2016-06-20', 1, '1466419632'),
('179.43.143.162', '2016-06-20', 1, '1466419657'),
('84.177.28.32', '2016-06-20', 1, '1466419685'),
('84.177.17.180', '2016-06-20', 1, '1466419699'),
('120.161.1.135', '2016-06-20', 19, '1466421167'),
('114.125.172.5', '2016-06-20', 4, '1466422835'),
('120.169.254.244', '2016-06-20', 1, '1466424587'),
('185.100.86.167', '2016-06-20', 1, '1466426488'),
('36.75.253.198', '2016-06-20', 49, '1466432356'),
('104.236.142.110', '2016-06-20', 1, '1466431059'),
('176.10.104.240', '2016-06-20', 1, '1466431652'),
('129.10.115.51', '2016-06-20', 3, '1466436524'),
('129.10.115.241', '2016-06-20', 1, '1466436524'),
('69.61.12.70', '2016-06-21', 4, '1466514812'),
('114.125.179.192', '2016-06-21', 5, '1466458664'),
('202.67.37.43', '2016-06-21', 1, '1466462030'),
('129.10.115.241', '2016-06-21', 3, '1466462228'),
('129.10.115.51', '2016-06-21', 5, '1466492679'),
('208.80.194.123', '2016-06-21', 1, '1466463534'),
('36.83.123.122', '2016-06-21', 51, '1466515966'),
('66.249.65.93', '2016-06-21', 2, '1466524602'),
('208.80.194.121', '2016-06-21', 1, '1466465521'),
('66.249.84.165', '2016-06-21', 1, '1466469733'),
('66.102.6.237', '2016-06-21', 1, '1466469734'),
('114.125.179.246', '2016-06-21', 2, '1466475599'),
('162.243.233.58', '2016-06-21', 1, '1466475467'),
('36.75.241.70', '2016-06-21', 106, '1466495031'),
('180.76.15.156', '2016-06-21', 1, '1466483240'),
('162.223.88.37', '2016-06-21', 1, '1466487391'),
('66.249.65.90', '2016-06-21', 2, '1466510541'),
('114.125.171.104', '2016-06-21', 31, '1466499991'),
('121.40.64.73', '2016-06-21', 1, '1466498875'),
('120.26.72.221', '2016-06-21', 1, '1466499112'),
('121.40.141.31', '2016-06-21', 1, '1466499206'),
('202.67.36.253', '2016-06-21', 22, '1466506591'),
('91.121.83.118', '2016-06-21', 1, '1466504188'),
('5.255.250.50', '2016-06-21', 1, '1466512113'),
('178.32.53.131', '2016-06-21', 1, '1466515741'),
('167.114.103.181', '2016-06-21', 3, '1466516868'),
('66.249.66.169', '2016-06-21', 1, '1466520846'),
('66.249.65.90', '2016-06-22', 2, '1466533453'),
('8.37.230.21', '2016-06-22', 1, '1466532002'),
('36.83.74.181', '2016-06-22', 1, '1466532004'),
('66.249.65.96', '2016-06-22', 1, '1466533442'),
('69.61.12.70', '2016-06-22', 4, '1466601348'),
('161.69.163.20', '2016-06-22', 12, '1466593466'),
('202.67.36.245', '2016-06-22', 8, '1466541542'),
('212.117.180.21', '2016-06-22', 1, '1466542975'),
('114.125.186.35', '2016-06-22', 11, '1466544454'),
('180.241.178.201', '2016-06-22', 26, '1466567569'),
('208.80.192.33', '2016-06-22', 1, '1466551718'),
('208.80.194.27', '2016-06-22', 1, '1466553074'),
('129.10.115.241', '2016-06-22', 2, '1466554276'),
('129.10.115.51', '2016-06-22', 2, '1466554286'),
('36.75.253.198', '2016-06-22', 2, '1466556036'),
('8.37.230.141', '2016-06-22', 4, '1466557643'),
('114.125.171.23', '2016-06-22', 10, '1466559072'),
('66.249.65.93', '2016-06-22', 1, '1466558626'),
('114.125.175.227', '2016-06-22', 4, '1466559990'),
('66.249.84.166', '2016-06-22', 1, '1466562769'),
('36.83.66.159', '2016-06-22', 5, '1466583301'),
('8.37.232.111', '2016-06-22', 6, '1466604596'),
('120.169.255.122', '2016-06-22', 10, '1466577235'),
('36.75.144.179', '2016-06-22', 213, '1466611920'),
('36.83.123.122', '2016-06-22', 5, '1466581052'),
('178.162.216.30', '2016-06-22', 12, '1466580626'),
('91.109.30.68', '2016-06-22', 21, '1466581630'),
('91.109.30.86', '2016-06-22', 8, '1466582485'),
('195.154.165.246', '2016-06-22', 1, '1466582822'),
('91.121.83.118', '2016-06-22', 1, '1466583092'),
('42.62.176.10', '2016-06-22', 150, '1466598767'),
('91.109.30.110', '2016-06-22', 6, '1466583259'),
('114.125.170.127', '2016-06-22', 40, '1466593317'),
('114.125.169.45', '2016-06-22', 1, '1466587266'),
('114.125.179.202', '2016-06-22', 7, '1466589208'),
('114.125.176.4', '2016-06-22', 2, '1466589534'),
('114.125.177.250', '2016-06-22', 8, '1466591428'),
('114.125.179.126', '2016-06-22', 1, '1466592557'),
('114.125.191.247', '2016-06-22', 1, '1466593105'),
('114.125.179.243', '2016-06-22', 12, '1466597787'),
('36.75.145.205', '2016-06-22', 27, '1466602657'),
('202.67.37.38', '2016-06-22', 7, '1466600419'),
('120.169.255.213', '2016-06-22', 20, '1466605261'),
('114.125.178.147', '2016-06-22', 13, '1466605374'),
('138.201.58.84', '2016-06-22', 2, '1466612168'),
('180.254.203.64', '2016-06-23', 16, '1466621983'),
('69.61.12.70', '2016-06-23', 4, '1466687787'),
('54.158.107.22', '2016-06-23', 1, '1466628653'),
('208.80.194.120', '2016-06-23', 1, '1466638127'),
('208.80.194.27', '2016-06-23', 1, '1466638324'),
('114.125.173.254', '2016-06-23', 6, '1466638979'),
('128.199.100.9', '2016-06-23', 1, '1466648148'),
('202.67.37.45', '2016-06-23', 15, '1466648862'),
('36.83.80.96', '2016-06-23', 140, '1466668112'),
('101.255.82.139', '2016-06-23', 6, '1466650586'),
('178.162.216.35', '2016-06-23', 80, '1466674698'),
('178.162.216.32', '2016-06-23', 37, '1466672163'),
('178.162.216.38', '2016-06-23', 14, '1466668402'),
('66.249.66.165', '2016-06-23', 2, '1466683141'),
('178.162.216.30', '2016-06-23', 1, '1466657233'),
('91.109.30.72', '2016-06-23', 38, '1466660691'),
('8.37.232.111', '2016-06-23', 1, '1466659122'),
('120.164.46.64', '2016-06-23', 8, '1466659457'),
('91.109.30.96', '2016-06-23', 1, '1466660852'),
('178.162.216.36', '2016-06-23', 5, '1466662025'),
('178.162.216.34', '2016-06-23', 9, '1466661298'),
('66.249.85.222', '2016-06-23', 1, '1466661241'),
('66.249.65.93', '2016-06-23', 3, '1466687864'),
('91.109.30.90', '2016-06-23', 4, '1466664704'),
('161.69.163.20', '2016-06-23', 6, '1466665244'),
('115.178.254.83', '2016-06-23', 22, '1466668187'),
('36.75.141.232', '2016-06-23', 88, '1466693377'),
('36.83.111.227', '2016-06-23', 108, '1466674396'),
('148.251.255.92', '2016-06-23', 1, '1466669109'),
('142.4.218.156', '2016-06-23', 4, '1466669353'),
('91.109.30.117', '2016-06-23', 14, '1466670958'),
('8.37.233.242', '2016-06-23', 5, '1466679780'),
('120.164.45.74', '2016-06-23', 32, '1466682854'),
('91.121.83.118', '2016-06-23', 1, '1466678436'),
('114.125.176.139', '2016-06-23', 1, '1466681755'),
('66.249.65.90', '2016-06-23', 2, '1466687850'),
('180.249.17.35', '2016-06-23', 19, '1466683091'),
('157.55.39.91', '2016-06-23', 1, '1466685026'),
('66.249.84.166', '2016-06-23', 1, '1466688243'),
('202.67.37.35', '2016-06-23', 1, '1466689565'),
('202.67.37.33', '2016-06-23', 13, '1466691253'),
('107.170.130.29', '2016-06-23', 1, '1466697552'),
('173.252.88.93', '2016-06-24', 1, '1466702526'),
('36.69.25.93', '2016-06-24', 1, '1466702530'),
('66.249.65.90', '2016-06-24', 2, '1466787531'),
('141.8.143.221', '2016-06-24', 1, '1466705865'),
('66.249.65.93', '2016-06-24', 2, '1466712708'),
('69.61.12.70', '2016-06-24', 4, '1466773382'),
('104.131.147.112', '2016-06-24', 1, '1466709578'),
('66.249.65.96', '2016-06-24', 2, '1466744732'),
('202.67.37.44', '2016-06-24', 24, '1466715004'),
('115.178.251.10', '2016-06-24', 13, '1466721783'),
('8.37.232.111', '2016-06-24', 1, '1466722448'),
('120.164.45.74', '2016-06-24', 15, '1466724855'),
('208.80.194.27', '2016-06-24', 1, '1466723398'),
('208.80.194.124', '2016-06-24', 1, '1466723821'),
('54.90.213.208', '2016-06-24', 1, '1466728051'),
('180.249.17.35', '2016-06-24', 24, '1466738071'),
('180.251.170.96', '2016-06-24', 163, '1466759960'),
('36.83.129.40', '2016-06-24', 2, '1466741044'),
('115.178.235.203', '2016-06-24', 14, '1466750009'),
('104.236.182.170', '2016-06-24', 1, '1466754056'),
('36.66.250.52', '2016-06-24', 70, '1466759360'),
('146.20.65.193', '2016-06-24', 1, '1466756213'),
('206.253.224.14', '2016-06-24', 1, '1466758353'),
('161.69.163.20', '2016-06-24', 6, '1466763621'),
('158.69.228.18', '2016-06-24', 1, '1466764062'),
('91.121.83.118', '2016-06-24', 1, '1466766759'),
('36.83.140.156', '2016-06-24', 45, '1466771961'),
('202.67.36.252', '2016-06-24', 31, '1466768628'),
('115.178.252.98', '2016-06-24', 11, '1466771537'),
('198.27.69.229', '2016-06-24', 2, '1466771928'),
('8.37.233.242', '2016-06-24', 1, '1466778787'),
('120.169.255.92', '2016-06-24', 3, '1466778941'),
('60.250.188.6', '2016-06-24', 1, '1466779542'),
('202.67.37.35', '2016-06-24', 32, '1466785037'),
('36.75.240.59', '2016-06-24', 55, '1466785527'),
('66.249.65.90', '2016-06-25', 2, '1466853981'),
('66.249.65.93', '2016-06-25', 1, '1466792134'),
('69.61.12.70', '2016-06-25', 2, '1466861581'),
('104.236.200.76', '2016-06-25', 1, '1466795914'),
('8.37.232.111', '2016-06-25', 2, '1466860577'),
('120.169.255.92', '2016-06-25', 6, '1466798512'),
('208.80.194.27', '2016-06-25', 1, '1466810958'),
('208.80.194.121', '2016-06-25', 1, '1466812405'),
('91.109.30.91', '2016-06-25', 4, '1466812532'),
('91.109.30.79', '2016-06-25', 3, '1466812606'),
('202.67.37.46', '2016-06-25', 15, '1466813198'),
('8.37.234.170', '2016-06-25', 1, '1466853972'),
('114.125.14.229', '2016-06-25', 3, '1466854239'),
('91.109.30.80', '2016-06-25', 1, '1466854756'),
('36.75.240.59', '2016-06-25', 55, '1466865485'),
('120.164.43.84', '2016-06-25', 9, '1466861510'),
('202.67.36.241', '2016-06-25', 60, '1466861855'),
('66.249.84.165', '2016-06-25', 1, '1466863311'),
('180.249.230.111', '2016-06-25', 6, '1466865087'),
('180.249.228.105', '2016-06-25', 6, '1466865202'),
('36.83.138.142', '2016-06-25', 7, '1466865066'),
('36.75.141.10', '2016-06-25', 35, '1466865831'),
('69.171.230.99', '2016-06-25', 2, '1466867322'),
('69.171.230.109', '2016-06-25', 1, '1466865568'),
('69.171.230.114', '2016-06-25', 3, '1466867328'),
('69.171.230.106', '2016-06-25', 1, '1466865575'),
('69.171.230.107', '2016-06-25', 2, '1466867317'),
('69.171.230.101', '2016-06-25', 1, '1466865592'),
('69.171.230.100', '2016-06-25', 1, '1466865634'),
('78.47.67.232', '2016-06-25', 1, '1466865697'),
('69.171.230.113', '2016-06-25', 1, '1466865698'),
('69.171.230.102', '2016-06-25', 2, '1466867323'),
('69.171.230.119', '2016-06-25', 2, '1466865713'),
('69.171.230.112', '2016-06-25', 1, '1466867083'),
('69.171.230.116', '2016-06-25', 1, '1466867301'),
('69.171.230.121', '2016-06-25', 1, '1466867325'),
('69.171.230.120', '2016-06-25', 1, '1466867327'),
('69.171.230.103', '2016-06-25', 1, '1466867329'),
('45.79.203.152', '2016-06-25', 3, '1466872650'),
('69.61.12.70', '2016-06-26', 4, '1466948453'),
('114.125.171.245', '2016-06-26', 7, '1466887247'),
('202.67.37.35', '2016-06-26', 36, '1466900762'),
('208.80.192.33', '2016-06-26', 2, '1466898078'),
('69.171.230.99', '2016-06-26', 1, '1466903991'),
('36.75.240.59', '2016-06-26', 238, '1466959009'),
('66.249.65.90', '2016-06-26', 3, '1466905594'),
('66.249.65.93', '2016-06-26', 2, '1466905534'),
('66.249.65.96', '2016-06-26', 3, '1466938080'),
('36.75.141.10', '2016-06-26', 1, '1466905823'),
('202.67.37.37', '2016-06-26', 91, '1466920278'),
('180.249.17.92', '2016-06-26', 94, '1466940004'),
('91.109.30.90', '2016-06-26', 11, '1466909733'),
('178.162.216.34', '2016-06-26', 14, '1466912375'),
('120.164.44.245', '2016-06-26', 18, '1466912900'),
('161.69.163.20', '2016-06-26', 6, '1466914512'),
('8.37.232.111', '2016-06-26', 1, '1466915348'),
('120.164.43.33', '2016-06-26', 6, '1466915829'),
('36.84.1.15', '2016-06-26', 82, '1466922517'),
('202.67.37.41', '2016-06-26', 69, '1466952781'),
('180.249.230.33', '2016-06-26', 6, '1466934070'),
('202.67.37.47', '2016-06-26', 8, '1466940695'),
('65.19.167.132', '2016-06-26', 1, '1466938624'),
('66.249.84.166', '2016-06-26', 1, '1466940483'),
('114.125.187.31', '2016-06-26', 15, '1466941588'),
('208.87.237.201', '2016-06-26', 1, '1466946903'),
('72.182.40.181', '2016-06-26', 1, '1466946907'),
('162.243.233.58', '2016-06-26', 1, '1466946940'),
('202.67.37.42', '2016-06-26', 5, '1466949901'),
('91.121.83.118', '2016-06-26', 1, '1466948822'),
('38.99.62.91', '2016-06-26', 1, '1466949580'),
('146.20.65.193', '2016-06-26', 1, '1466952033'),
('104.236.122.179', '2016-06-26', 1, '1466958040'),
('45.33.15.94', '2016-06-27', 4, '1467042570'),
('69.61.12.70', '2016-06-27', 4, '1467034514'),
('36.75.240.59', '2016-06-27', 3, '1466972426'),
('202.67.36.250', '2016-06-27', 1, '1466973468'),
('208.80.194.125', '2016-06-27', 1, '1466982106'),
('208.80.194.126', '2016-06-27', 1, '1466983045'),
('66.249.65.90', '2016-06-27', 3, '1467010916'),
('36.66.250.52', '2016-06-27', 45, '1467000388'),
('66.249.65.96', '2016-06-27', 2, '1467038255'),
('161.69.163.20', '2016-06-27', 6, '1466989512'),
('66.249.84.166', '2016-06-27', 1, '1466989772'),
('180.251.145.230', '2016-06-27', 16, '1466990832'),
('114.125.178.24', '2016-06-27', 4, '1466993110'),
('202.67.37.36', '2016-06-27', 15, '1466994171'),
('178.162.216.34', '2016-06-27', 8, '1466998580'),
('180.251.171.189', '2016-06-27', 126, '1467016661'),
('91.109.30.122', '2016-06-27', 34, '1467015261'),
('114.125.176.167', '2016-06-27', 9, '1467000646'),
('91.109.30.110', '2016-06-27', 9, '1467000842'),
('91.109.30.68', '2016-06-27', 26, '1467003528'),
('178.162.216.38', '2016-06-27', 15, '1467004032'),
('66.102.6.241', '2016-06-27', 1, '1467007610'),
('104.236.121.91', '2016-06-27', 11, '1467012091'),
('91.109.30.116', '2016-06-27', 3, '1467012994'),
('158.69.25.178', '2016-06-27', 3, '1467022299'),
('202.67.37.47', '2016-06-27', 65, '1467034755'),
('69.171.230.108', '2016-06-27', 1, '1467028398'),
('180.249.10.63', '2016-06-27', 4, '1467028698'),
('180.249.13.5', '2016-06-27', 2, '1467028695'),
('180.254.194.156', '2016-06-27', 2, '1467028721'),
('66.249.65.93', '2016-06-27', 1, '1467028693'),
('146.20.65.193', '2016-06-27', 2, '1467041859'),
('114.125.176.188', '2016-06-27', 3, '1467031521'),
('141.8.143.224', '2016-06-27', 1, '1467034085'),
('148.251.255.92', '2016-06-27', 1, '1467040123'),
('114.125.191.91', '2016-06-27', 6, '1467041826'),
('54.225.50.187', '2016-06-27', 1, '1467041765'),
('91.121.83.118', '2016-06-27', 1, '1467043956'),
('114.125.191.219', '2016-06-28', 1, '1467047560'),
('66.249.65.90', '2016-06-28', 6, '1467122070'),
('161.69.163.20', '2016-06-28', 12, '1467079449'),
('69.61.12.70', '2016-06-28', 4, '1467121298'),
('120.26.63.86', '2016-06-28', 1, '1467059921'),
('120.26.53.92', '2016-06-28', 1, '1467059943'),
('120.26.72.221', '2016-06-28', 1, '1467059978'),
('121.43.226.181', '2016-06-28', 1, '1467060024'),
('121.40.160.128', '2016-06-28', 1, '1467060077'),
('202.67.37.36', '2016-06-28', 7, '1467062714'),
('46.229.167.149', '2016-06-28', 3, '1467063360'),
('114.125.191.191', '2016-06-28', 48, '1467068307'),
('66.249.65.96', '2016-06-28', 3, '1467131347'),
('208.80.194.124', '2016-06-28', 1, '1467069983'),
('208.80.192.33', '2016-06-28', 1, '1467072097'),
('36.83.104.153', '2016-06-28', 18, '1467095647'),
('168.235.207.205', '2016-06-28', 3, '1467082001'),
('114.125.178.33', '2016-06-28', 45, '1467084591'),
('69.171.230.121', '2016-06-28', 1, '1467086290'),
('69.171.230.122', '2016-06-28', 1, '1467086371'),
('180.251.153.221', '2016-06-28', 41, '1467114873'),
('114.125.175.102', '2016-06-28', 29, '1467093105'),
('114.125.170.92', '2016-06-28', 5, '1467092634'),
('64.74.215.113', '2016-06-28', 1, '1467098506'),
('129.10.232.9', '2016-06-28', 2, '1467103037'),
('129.10.232.5', '2016-06-28', 2, '1467103038'),
('114.125.169.3', '2016-06-28', 33, '1467107314'),
('202.67.37.34', '2016-06-28', 123, '1467123818'),
('114.125.190.245', '2016-06-28', 68, '1467114758'),
('180.251.145.230', '2016-06-28', 54, '1467109908'),
('114.125.175.113', '2016-06-28', 7, '1467117474'),
('36.83.127.172', '2016-06-28', 15, '1467121173'),
('114.125.173.77', '2016-06-28', 1, '1467117572'),
('66.249.84.166', '2016-06-28', 1, '1467117632'),
('114.125.185.64', '2016-06-28', 8, '1467118317'),
('8.37.233.242', '2016-06-28', 1, '1467121024'),
('69.171.230.107', '2016-06-28', 1, '1467121061'),
('120.169.254.84', '2016-06-28', 2, '1467121239'),
('66.249.93.187', '2016-06-28', 1, '1467121476'),
('139.195.48.133', '2016-06-28', 1, '1467121479'),
('139.255.134.233', '2016-06-28', 3, '1467121598'),
('202.67.39.24', '2016-06-28', 1, '1467121703'),
('114.121.153.172', '2016-06-28', 1, '1467121870'),
('114.125.27.64', '2016-06-28', 1, '1467122151'),
('79.35.127.67', '2016-06-28', 1, '1467122847'),
('122.100.184.165', '2016-06-28', 1, '1467123020'),
('99.62.92.27', '2016-06-28', 1, '1467123813'),
('86.126.86.140', '2016-06-28', 1, '1467124018'),
('114.120.237.160', '2016-06-28', 1, '1467124261'),
('120.169.254.240', '2016-06-28', 1, '1467124350'),
('36.75.240.59', '2016-06-28', 26, '1467126389'),
('1.187.14.36', '2016-06-28', 1, '1467126394'),
('223.196.83.254', '2016-06-28', 2, '1467127724'),
('192.99.46.89', '2016-06-28', 4, '1467128240'),
('45.33.15.94', '2016-06-28', 2, '1467128802'),
('180.251.148.14', '2016-06-28', 8, '1467133141'),
('36.83.129.6', '2016-06-28', 8, '1467132902'),
('36.75.148.121', '2016-06-28', 8, '1467133063'),
('120.169.254.32', '2016-06-28', 1, '1467132840'),
('129.10.232.9', '2016-06-29', 4, '1467168653'),
('129.10.232.5', '2016-06-29', 3, '1467170464'),
('120.164.41.208', '2016-06-29', 1, '1467138274'),
('69.61.12.70', '2016-06-29', 4, '1467207524'),
('69.171.230.102', '2016-06-29', 4, '1467203929'),
('91.121.83.118', '2016-06-29', 1, '1467145518'),
('202.67.37.45', '2016-06-29', 1, '1467146083'),
('180.254.194.156', '2016-06-29', 3, '1467148431'),
('180.249.13.5', '2016-06-29', 6, '1467148539'),
('180.249.10.63', '2016-06-29', 4, '1467148525'),
('202.67.37.38', '2016-06-29', 9, '1467157705'),
('115.178.235.102', '2016-06-29', 1, '1467155743'),
('208.80.192.33', '2016-06-29', 1, '1467156411'),
('208.80.194.123', '2016-06-29', 1, '1467158911'),
('24.240.81.186', '2016-06-29', 1, '1467159418'),
('36.73.120.151', '2016-06-29', 1, '1467160026'),
('69.171.230.96', '2016-06-29', 3, '1467203631'),
('69.171.230.105', '2016-06-29', 2, '1467202553'),
('180.242.23.192', '2016-06-29', 1, '1467170731'),
('36.66.250.52', '2016-06-29', 7, '1467172574'),
('114.125.184.63', '2016-06-29', 4, '1467175106'),
('91.109.30.66', '2016-06-29', 29, '1467177498'),
('91.109.30.84', '2016-06-29', 5, '1467178139'),
('178.162.216.36', '2016-06-29', 9, '1467178727'),
('178.162.216.35', '2016-06-29', 23, '1467179611'),
('114.121.153.240', '2016-06-29', 1, '1467180629'),
('110.136.245.53', '2016-06-29', 17, '1467191863'),
('208.91.66.226', '2016-06-29', 1, '1467186721'),
('188.40.45.81', '2016-06-29', 1, '1467188148'),
('161.69.163.20', '2016-06-29', 6, '1467189990'),
('158.69.229.134', '2016-06-29', 1, '1467190512'),
('66.249.65.93', '2016-06-29', 1, '1467196899'),
('66.249.65.90', '2016-06-29', 3, '1467216598'),
('66.249.65.96', '2016-06-29', 3, '1467214822'),
('91.219.237.229', '2016-06-29', 1, '1467200029'),
('69.171.230.121', '2016-06-29', 3, '1467203468'),
('69.171.230.119', '2016-06-29', 4, '1467203861'),
('69.171.230.103', '2016-06-29', 6, '1467203730'),
('69.171.230.120', '2016-06-29', 4, '1467203619'),
('69.171.230.101', '2016-06-29', 3, '1467203862'),
('69.171.230.97', '2016-06-29', 3, '1467203408'),
('69.171.230.98', '2016-06-29', 1, '1467202243'),
('69.171.230.106', '2016-06-29', 3, '1467203861'),
('69.171.230.108', '2016-06-29', 2, '1467203410'),
('69.171.230.112', '2016-06-29', 3, '1467203662'),
('69.171.230.117', '2016-06-29', 3, '1467203426'),
('69.171.230.104', '2016-06-29', 3, '1467203465'),
('69.171.230.123', '2016-06-29', 1, '1467203025'),
('69.171.230.116', '2016-06-29', 1, '1467203047'),
('69.171.230.115', '2016-06-29', 1, '1467203072'),
('69.171.230.109', '2016-06-29', 1, '1467203421'),
('69.171.230.113', '2016-06-29', 1, '1467203425'),
('69.171.230.107', '2016-06-29', 1, '1467203439'),
('69.171.230.118', '2016-06-29', 1, '1467203476'),
('69.171.230.122', '2016-06-29', 1, '1467203891'),
('36.75.240.59', '2016-06-29', 60, '1467217211'),
('114.125.169.208', '2016-06-29', 46, '1467215118'),
('36.75.240.59', '2016-06-30', 38, '1467302857'),
('69.171.230.101', '2016-06-30', 1, '1467225298'),
('69.171.230.103', '2016-06-30', 1, '1467225343'),
('69.171.230.100', '2016-06-30', 1, '1467225345'),
('69.171.230.108', '2016-06-30', 1, '1467225348'),
('114.125.169.130', '2016-06-30', 5, '1467225815'),
('54.234.231.219', '2016-06-30', 1, '1467226396'),
('69.61.12.70', '2016-06-30', 3, '1467272208'),
('91.121.83.118', '2016-06-30', 1, '1467233165'),
('202.67.37.33', '2016-06-30', 9, '1467233597'),
('208.80.194.124', '2016-06-30', 1, '1467240538'),
('114.125.169.129', '2016-06-30', 1, '1467242975'),
('69.171.230.115', '2016-06-30', 1, '1467243249'),
('69.171.230.116', '2016-06-30', 1, '1467245032'),
('208.80.194.120', '2016-06-30', 1, '1467245113'),
('69.171.230.99', '2016-06-30', 1, '1467245349'),
('69.171.230.97', '2016-06-30', 1, '1467245350'),
('69.171.230.123', '2016-06-30', 1, '1467245352'),
('69.171.230.109', '2016-06-30', 1, '1467245353'),
('180.254.181.202', '2016-06-30', 18, '1467267348'),
('91.109.30.98', '2016-06-30', 5, '1467267335'),
('91.109.30.122', '2016-06-30', 31, '1467268722'),
('178.162.216.32', '2016-06-30', 10, '1467268984'),
('178.162.216.35', '2016-06-30', 1, '1467270566'),
('114.125.178.67', '2016-06-30', 52, '1467279954'),
('202.67.36.248', '2016-06-30', 6, '1467296098'),
('66.249.65.96', '2016-06-30', 2, '1467290477'),
('158.69.228.18', '2016-06-30', 1, '1467282990'),
('114.125.178.83', '2016-06-30', 2, '1467287864'),
('66.249.84.243', '2016-06-30', 1, '1467289883'),
('54.201.12.207', '2016-06-30', 1, '1467291984'),
('180.249.12.168', '2016-06-30', 19, '1467294753'),
('50.116.16.218', '2016-06-30', 2, '1467303842'),
('167.114.209.192', '2016-07-01', 1, '1467306863'),
('180.249.2.112', '2016-07-01', 68, '1467378119'),
('66.249.65.90', '2016-07-01', 2, '1467322828'),
('148.251.84.9', '2016-07-01', 2, '1467312137'),
('114.125.173.150', '2016-07-01', 8, '1467316382'),
('202.67.37.39', '2016-07-01', 3, '1467316863'),
('69.171.230.100', '2016-07-01', 1, '1467318453'),
('69.171.230.115', '2016-07-01', 1, '1467318458'),
('91.121.83.118', '2016-07-01', 1, '1467318611'),
('69.171.230.116', '2016-07-01', 1, '1467318651'),
('107.207.156.29', '2016-07-01', 2, '1467356489'),
('129.10.232.9', '2016-07-01', 3, '1467327789'),
('129.10.232.5', '2016-07-01', 1, '1467326287'),
('::1', '2016-07-01', 7, '1467331185'),
('180.254.132.216', '2016-07-01', 13, '1467348950'),
('36.66.250.52', '2016-07-01', 57, '1467357030'),
('64.246.165.10', '2016-07-01', 1, '1467340460'),
('202.80.215.198', '2016-07-01', 8, '1467376425'),
('36.85.178.207', '2016-07-01', 12, '1467361182'),
('69.171.230.105', '2016-07-01', 1, '1467347735'),
('114.125.191.4', '2016-07-01', 3, '1467348714'),
('114.125.185.135', '2016-07-01', 7, '1467349440'),
('198.27.69.229', '2016-07-01', 2, '1467352565'),
('202.67.36.246', '2016-07-01', 76, '1467372889'),
('133.1.236.59', '2016-07-01', 1, '1467362656'),
('54.163.79.44', '2016-07-01', 1, '1467363507'),
('114.125.170.46', '2016-07-01', 56, '1467371204'),
('114.125.187.196', '2016-07-01', 90, '1467370008'),
('66.249.84.237', '2016-07-01', 1, '1467370455'),
('192.160.102.164', '2016-07-01', 1, '1467372128'),
('202.67.36.247', '2016-07-01', 16, '1467389006'),
('36.83.117.195', '2016-07-01', 5, '1467386057'),
('180.254.205.229', '2016-07-01', 1, '1467385912'),
('36.75.145.5', '2016-07-01', 4, '1467386272'),
('125.162.240.175', '2016-07-02', 6, '1467395375'),
('125.162.240.87', '2016-07-02', 5, '1467395392'),
('180.251.145.196', '2016-07-02', 5, '1467395393'),
('208.80.194.123', '2016-07-02', 1, '1467396297'),
('66.249.65.93', '2016-07-02', 1, '1467401578'),
('66.249.65.90', '2016-07-02', 3, '1467406200'),
('180.249.2.112', '2016-07-02', 213, '1467455746'),
('107.207.156.29', '2016-07-02', 3, '1467462933'),
('207.182.140.210', '2016-07-02', 1, '1467413300'),
('114.125.170.222', '2016-07-02', 23, '1467444747'),
('36.68.56.140', '2016-07-02', 3, '1467421384'),
('202.80.215.198', '2016-07-02', 2, '1467437733'),
('8.37.233.242', '2016-07-02', 1, '1467426811'),
('202.67.36.254', '2016-07-02', 27, '1467434226'),
('120.169.254.12', '2016-07-02', 1, '1467427203'),
('67.198.140.203', '2016-07-02', 1, '1467430871'),
('66.249.85.219', '2016-07-02', 1, '1467432896'),
('69.171.230.110', '2016-07-02', 1, '1467437851'),
('112.215.153.1', '2016-07-02', 4, '1467443333'),
('110.136.240.193', '2016-07-02', 49, '1467450561'),
('114.125.174.223', '2016-07-02', 23, '1467445680'),
('202.67.37.41', '2016-07-02', 8, '1467458763'),
('180.251.158.52', '2016-07-02', 14, '1467459481'),
('114.125.169.203', '2016-07-02', 14, '1467459243'),
('114.125.187.17', '2016-07-03', 15, '1467483399'),
('202.67.37.36', '2016-07-03', 1, '1467492897'),
('66.249.65.93', '2016-07-03', 2, '1467526445'),
('67.198.140.203', '2016-07-03', 1, '1467506870'),
('66.249.65.90', '2016-07-03', 1, '1467510001'),
('107.207.156.29', '2016-07-03', 1, '1467510327'),
('8.37.233.242', '2016-07-03', 2, '1467526326'),
('120.169.255.163', '2016-07-03', 10, '1467526874'),
('66.249.65.96', '2016-07-03', 1, '1467514042'),
('208.80.194.30', '2016-07-03', 1, '1467518863'),
('114.125.175.204', '2016-07-03', 2, '1467525182'),
('202.67.37.39', '2016-07-03', 4, '1467528854'),
('202.67.37.44', '2016-07-03', 19, '1467545774'),
('62.210.37.82', '2016-07-03', 1, '1467544581'),
('146.20.65.193', '2016-07-03', 1, '1467549222'),
('180.249.2.112', '2016-07-03', 4, '1467551457'),
('66.249.66.165', '2016-07-03', 1, '1467555965'),
('69.171.230.99', '2016-07-03', 1, '1467556613'),
('69.171.230.108', '2016-07-03', 1, '1467556621'),
('69.171.230.123', '2016-07-03', 1, '1467556633'),
('91.121.83.118', '2016-07-03', 1, '1467557793'),
('107.207.156.29', '2016-07-04', 1, '1467565993'),
('66.249.65.90', '2016-07-04', 7, '1467618324'),
('114.125.177.250', '2016-07-04', 7, '1467579114'),
('66.249.66.169', '2016-07-04', 2, '1467597405'),
('66.249.65.93', '2016-07-04', 3, '1467650395'),
('161.69.163.20', '2016-07-04', 6, '1467594037'),
('36.75.143.151', '2016-07-04', 48, '1467603297'),
('8.37.233.242', '2016-07-04', 2, '1467603525'),
('120.169.255.187', '2016-07-04', 6, '1467603907'),
('202.67.37.43', '2016-07-04', 32, '1467603367'),
('180.249.2.112', '2016-07-04', 87, '1467650464'),
('69.61.12.70', '2016-07-04', 2, '1467638329'),
('113.35.251.98', '2016-07-04', 1, '1467625899'),
('129.10.232.9', '2016-07-04', 3, '1467632050'),
('129.10.232.5', '2016-07-04', 1, '1467632051'),
('114.125.174.142', '2016-07-04', 3, '1467632650'),
('192.160.102.164', '2016-07-04', 1, '1467643424'),
('133.1.236.59', '2016-07-04', 1, '1467649658'),
('120.26.72.221', '2016-07-04', 1, '1467649795'),
('121.40.160.128', '2016-07-04', 1, '1467649813'),
('121.40.64.73', '2016-07-04', 1, '1467649834'),
('120.26.102.108', '2016-07-04', 1, '1467649876'),
('121.40.106.14', '2016-07-04', 1, '1467649937'),
('91.121.83.118', '2016-07-05', 1, '1467652490'),
('120.169.255.12', '2016-07-05', 13, '1467658137'),
('104.236.68.137', '2016-07-05', 10, '1467658452'),
('129.10.232.5', '2016-07-05', 1, '1467658815'),
('129.10.232.9', '2016-07-05', 3, '1467658816'),
('69.61.12.70', '2016-07-05', 4, '1467724592'),
('114.125.179.118', '2016-07-05', 1, '1467668472'),
('45.33.15.94', '2016-07-05', 2, '1467668780'),
('107.207.156.29', '2016-07-05', 1, '1467668781'),
('208.80.192.33', '2016-07-05', 1, '1467674590'),
('208.80.194.27', '2016-07-05', 1, '1467676832'),
('161.69.163.20', '2016-07-05', 6, '1467680743'),
('69.171.230.108', '2016-07-05', 1, '1467682995'),
('66.249.65.90', '2016-07-05', 1, '1467686250'),
('69.171.230.109', '2016-07-05', 1, '1467691654'),
('158.69.229.134', '2016-07-05', 3, '1467719736'),
('180.254.204.95', '2016-07-05', 1, '1467721252'),
('167.114.103.181', '2016-07-05', 4, '1467726947'),
('69.171.230.117', '2016-07-05', 1, '1467728589'),
('69.171.230.97', '2016-07-05', 1, '1467728593'),
('69.171.230.107', '2016-07-05', 1, '1467728593'),
('69.171.230.121', '2016-07-05', 1, '1467728595'),
('158.69.229.134', '2016-07-06', 3, '1467814598'),
('69.61.12.70', '2016-07-06', 4, '1467811253'),
('208.80.194.124', '2016-07-06', 1, '1467761110'),
('208.80.192.33', '2016-07-06', 1, '1467763439');
INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('120.164.42.249', '2016-07-06', 2, '1467768641'),
('107.207.156.29', '2016-07-06', 2, '1467788764'),
('129.10.232.5', '2016-07-06', 7, '1467784978'),
('129.10.232.9', '2016-07-06', 1, '1467771218'),
('180.251.152.149', '2016-07-06', 18, '1467776449'),
('161.69.163.20', '2016-07-06', 6, '1467777782'),
('67.198.140.203', '2016-07-06', 1, '1467781177'),
('66.249.65.90', '2016-07-06', 2, '1467795526'),
('114.125.173.62', '2016-07-06', 4, '1467800601'),
('69.171.230.114', '2016-07-06', 1, '1467805815'),
('36.68.10.197', '2016-07-06', 1, '1467809831'),
('101.255.45.46', '2016-07-06', 4, '1467818074'),
('54.198.171.152', '2016-07-07', 1, '1467831045'),
('66.249.65.93', '2016-07-07', 2, '1467895168'),
('69.61.12.70', '2016-07-07', 3, '1467875940'),
('46.229.167.149', '2016-07-07', 3, '1467835927'),
('208.80.194.123', '2016-07-07', 1, '1467846559'),
('180.251.152.149', '2016-07-07', 2, '1467847750'),
('208.80.194.27', '2016-07-07', 1, '1467848353'),
('107.207.156.29', '2016-07-07', 1, '1467853889'),
('158.69.229.134', '2016-07-07', 2, '1467895955'),
('36.83.140.225', '2016-07-07', 12, '1467868242'),
('66.249.84.237', '2016-07-07', 1, '1467861855'),
('66.102.6.177', '2016-07-07', 1, '1467867375'),
('125.167.114.46', '2016-07-07', 1, '1467869320'),
('66.249.65.96', '2016-07-07', 1, '1467869844'),
('66.249.65.90', '2016-07-07', 4, '1467895543'),
('66.249.84.243', '2016-07-07', 1, '1467893730'),
('45.33.40.107', '2016-07-07', 1, '1467899250'),
('114.125.176.3', '2016-07-07', 2, '1467908730'),
('45.33.15.94', '2016-07-08', 2, '1467918040'),
('77.247.181.163', '2016-07-08', 1, '1467919404'),
('114.125.168.238', '2016-07-08', 8, '1467925015'),
('158.69.25.178', '2016-07-08', 3, '1467924631'),
('66.249.65.93', '2016-07-08', 1, '1467941866'),
('91.121.83.118', '2016-07-08', 1, '1467955149'),
('198.27.69.229', '2016-07-08', 2, '1467955183'),
('66.249.65.90', '2016-07-08', 3, '1467985287'),
('213.239.205.118', '2016-07-08', 1, '1467975077'),
('114.125.186.63', '2016-07-08', 11, '1467978154'),
('80.87.193.80', '2016-07-08', 1, '1467982322'),
('66.249.84.243', '2016-07-08', 1, '1467983533'),
('114.125.174.64', '2016-07-08', 3, '1467989959'),
('66.249.65.93', '2016-07-09', 2, '1468016627'),
('66.249.65.51', '2016-07-09', 5, '1468052735'),
('66.249.65.52', '2016-07-09', 1, '1468024994'),
('163.172.137.135', '2016-07-09', 2, '1468038347'),
('114.125.173.74', '2016-07-09', 13, '1468069308'),
('114.125.190.79', '2016-07-09', 20, '1468049906'),
('114.125.172.30', '2016-07-09', 5, '1468048690'),
('114.125.184.64', '2016-07-09', 18, '1468051539'),
('162.243.233.58', '2016-07-09', 1, '1468053230'),
('66.249.65.53', '2016-07-09', 1, '1468061060'),
('36.83.140.225', '2016-07-09', 1, '1468061273'),
('66.249.84.240', '2016-07-09', 1, '1468061359'),
('36.75.242.1', '2016-07-09', 7, '1468066013'),
('66.102.6.180', '2016-07-09', 1, '1468066668'),
('114.125.176.148', '2016-07-09', 2, '1468067014'),
('114.125.177.224', '2016-07-09', 1, '1468075617'),
('114.125.170.79', '2016-07-09', 15, '1468078027'),
('114.125.173.230', '2016-07-10', 10, '1468113827'),
('8.37.232.111', '2016-07-10', 3, '1468108444'),
('120.169.254.122', '2016-07-10', 29, '1468111777'),
('168.235.206.148', '2016-07-10', 1, '1468108367'),
('120.164.43.63', '2016-07-10', 1, '1468108386'),
('120.161.1.130', '2016-07-10', 8, '1468109280'),
('8.37.233.238', '2016-07-10', 1, '1468108741'),
('168.235.206.61', '2016-07-10', 2, '1468111609'),
('114.125.170.2', '2016-07-10', 25, '1468114167'),
('66.249.79.210', '2016-07-10', 2, '1468116888'),
('66.249.79.231', '2016-07-10', 2, '1468128335'),
('194.153.113.35', '2016-07-10', 1, '1468126227'),
('66.249.79.224', '2016-07-10', 2, '1468155906'),
('199.193.119.77', '2016-07-10', 1, '1468135244'),
('66.102.8.161', '2016-07-10', 1, '1468135250'),
('36.75.242.1', '2016-07-10', 6, '1468138711'),
('114.125.185.94', '2016-07-10', 28, '1468144422'),
('114.125.177.8', '2016-07-10', 4, '1468144314'),
('69.171.230.113', '2016-07-10', 1, '1468145174'),
('64.74.215.113', '2016-07-10', 1, '1468152897'),
('114.125.179.190', '2016-07-10', 4, '1468153607'),
('114.125.189.230', '2016-07-10', 17, '1468159187'),
('66.249.79.224', '2016-07-11', 7, '1468242373'),
('104.131.113.190', '2016-07-11', 1, '1468180404'),
('114.125.178.141', '2016-07-11', 4, '1468181079'),
('167.114.157.46', '2016-07-11', 3, '1468184804'),
('141.8.143.133', '2016-07-11', 1, '1468188298'),
('36.68.52.30', '2016-07-11', 29, '1468194828'),
('36.66.250.52', '2016-07-11', 67, '1468227009'),
('52.71.155.178', '2016-07-11', 10, '1468197115'),
('66.249.79.210', '2016-07-11', 7, '1468242278'),
('114.125.178.73', '2016-07-11', 1, '1468199931'),
('36.75.244.34', '2016-07-11', 4, '1468199971'),
('114.125.188.222', '2016-07-11', 2, '1468200540'),
('114.125.174.98', '2016-07-11', 106, '1468239286'),
('157.55.39.17', '2016-07-11', 1, '1468204248'),
('66.102.7.193', '2016-07-11', 1, '1468212535'),
('125.167.114.46', '2016-07-11', 12, '1468213671'),
('114.125.169.79', '2016-07-11', 1, '1468214600'),
('66.102.7.200', '2016-07-11', 1, '1468214797'),
('66.102.6.183', '2016-07-11', 1, '1468215445'),
('114.125.188.34', '2016-07-11', 1, '1468215561'),
('66.102.6.76', '2016-07-11', 1, '1468219754'),
('114.125.190.152', '2016-07-11', 15, '1468220933'),
('69.171.230.105', '2016-07-11', 1, '1468222429'),
('69.171.230.102', '2016-07-11', 1, '1468222648'),
('114.125.184.8', '2016-07-11', 34, '1468230408'),
('115.178.253.154', '2016-07-11', 21, '1468228401'),
('91.200.12.70', '2016-07-11', 4, '1468229686'),
('114.125.170.139', '2016-07-11', 33, '1468239578'),
('114.125.168.9', '2016-07-11', 21, '1468242045'),
('66.249.79.231', '2016-07-11', 1, '1468242362'),
('207.182.140.210', '2016-07-11', 1, '1468253151'),
('114.125.174.98', '2016-07-12', 16, '1468276227'),
('36.66.250.52', '2016-07-12', 79, '1468286170'),
('66.249.65.51', '2016-07-12', 2, '1468285869'),
('114.125.189.145', '2016-07-12', 8, '1468287907'),
('180.254.194.90', '2016-07-12', 3, '1468291271'),
('66.249.85.219', '2016-07-12', 1, '1468293132'),
('66.249.65.52', '2016-07-12', 4, '1468339517'),
('114.125.168.9', '2016-07-12', 18, '1468299960'),
('114.125.169.77', '2016-07-12', 4, '1468302465'),
('114.125.188.134', '2016-07-12', 9, '1468306675'),
('100.43.85.3', '2016-07-12', 1, '1468313812'),
('120.26.107.181', '2016-07-12', 1, '1468315096'),
('121.40.141.31', '2016-07-12', 1, '1468315180'),
('121.40.250.9', '2016-07-12', 1, '1468315241'),
('120.26.72.221', '2016-07-12', 1, '1468315279'),
('121.40.64.118', '2016-07-12', 1, '1468315303'),
('69.171.230.103', '2016-07-12', 1, '1468317947'),
('69.171.230.109', '2016-07-12', 1, '1468317961'),
('66.249.65.53', '2016-07-12', 2, '1468338720'),
('180.254.194.3', '2016-07-12', 3, '1468339854'),
('180.251.157.196', '2016-07-12', 1, '1468339839'),
('69.171.230.108', '2016-07-13', 1, '1468366380'),
('69.171.230.102', '2016-07-13', 1, '1468366392'),
('69.171.230.113', '2016-07-13', 1, '1468366401'),
('125.167.114.46', '2016-07-13', 1, '1468367854'),
('114.125.185.241', '2016-07-13', 1, '1468368861'),
('36.66.250.52', '2016-07-13', 7, '1468372966'),
('36.84.224.14', '2016-07-13', 46, '1468393226'),
('66.249.84.234', '2016-07-13', 1, '1468382555'),
('162.243.233.58', '2016-07-13', 1, '1468386677'),
('114.125.179.46', '2016-07-13', 35, '1468389781'),
('114.125.177.130', '2016-07-13', 6, '1468392374'),
('66.249.65.51', '2016-07-13', 2, '1468417038'),
('69.171.230.107', '2016-07-13', 1, '1468399557'),
('180.76.15.147', '2016-07-13', 1, '1468404885'),
('202.46.55.175', '2016-07-13', 1, '1468406885'),
('104.193.88.243', '2016-07-13', 1, '1468408885'),
('114.125.179.248', '2016-07-13', 9, '1468412450'),
('114.125.172.121', '2016-07-13', 13, '1468422319'),
('114.125.176.10', '2016-07-13', 4, '1468424227'),
('114.125.170.69', '2016-07-13', 3, '1468421879'),
('114.125.176.96', '2016-07-13', 6, '1468424340'),
('136.243.92.152', '2016-07-13', 1, '1468428279'),
('141.8.143.133', '2016-07-13', 1, '1468428423'),
('36.75.243.166', '2016-07-13', 2, '1468429120'),
('36.75.243.166', '2016-07-14', 12, '1468430260'),
('66.249.65.52', '2016-07-14', 5, '1468473050'),
('114.125.172.121', '2016-07-14', 3, '1468459097'),
('69.171.230.98', '2016-07-14', 1, '1468457027'),
('69.171.230.106', '2016-07-14', 1, '1468457027'),
('69.171.230.107', '2016-07-14', 1, '1468457029'),
('69.171.230.122', '2016-07-14', 1, '1468457031'),
('180.249.227.140', '2016-07-14', 11, '1468460372'),
('114.125.175.32', '2016-07-14', 4, '1468460755'),
('114.125.175.209', '2016-07-14', 29, '1468460842'),
('36.83.71.48', '2016-07-14', 62, '1468466610'),
('61.131.59.138', '2016-07-14', 2, '1468466144'),
('114.125.187.53', '2016-07-14', 19, '1468470476'),
('66.249.65.53', '2016-07-14', 1, '1468476639'),
('114.125.189.149', '2016-07-14', 1, '1468479715'),
('114.125.177.238', '2016-07-14', 1, '1468483894'),
('180.251.163.240', '2016-07-14', 37, '1468491803'),
('104.131.127.144', '2016-07-14', 12, '1468490149'),
('180.251.171.121', '2016-07-14', 9, '1468502176'),
('180.254.182.174', '2016-07-14', 2, '1468504820'),
('45.33.15.94', '2016-07-15', 2, '1468521269'),
('54.198.194.71', '2016-07-15', 1, '1468522753'),
('45.55.250.43', '2016-07-15', 1, '1468524818'),
('114.125.168.229', '2016-07-15', 17, '1468534249'),
('114.125.177.2', '2016-07-15', 35, '1468536852'),
('69.171.230.114', '2016-07-15', 1, '1468537039'),
('36.75.249.167', '2016-07-15', 1, '1468537234'),
('114.125.172.250', '2016-07-15', 5, '1468540816'),
('66.249.65.51', '2016-07-15', 3, '1468584888'),
('110.136.246.194', '2016-07-15', 5, '1468555222'),
('66.249.65.53', '2016-07-15', 2, '1468557657'),
('66.249.65.52', '2016-07-15', 1, '1468556196'),
('45.55.241.187', '2016-07-15', 1, '1468557409'),
('36.83.126.13', '2016-07-15', 1, '1468558201'),
('114.125.168.247', '2016-07-15', 3, '1468559388'),
('222.124.103.65', '2016-07-15', 1, '1468560151'),
('114.125.170.126', '2016-07-15', 5, '1468562575'),
('114.125.168.195', '2016-07-15', 1, '1468566670'),
('114.125.200.56', '2016-07-15', 2, '1468567473'),
('114.125.184.62', '2016-07-15', 1, '1468567454'),
('114.125.179.248', '2016-07-15', 1, '1468567627'),
('114.125.178.85', '2016-07-15', 4, '1468567912'),
('114.125.178.138', '2016-07-15', 5, '1468568154'),
('114.125.190.13', '2016-07-15', 5, '1468568762'),
('114.125.204.20', '2016-07-15', 2, '1468569033'),
('114.125.168.255', '2016-07-15', 14, '1468572597'),
('114.125.170.92', '2016-07-15', 1, '1468582097'),
('114.125.209.157', '2016-07-15', 14, '1468583357'),
('157.55.39.76', '2016-07-15', 1, '1468582836'),
('180.251.151.32', '2016-07-15', 1, '1468590242'),
('180.251.156.145', '2016-07-15', 4, '1468590996'),
('125.167.117.52', '2016-07-15', 7, '1468593883'),
('114.125.185.145', '2016-07-15', 10, '1468594300'),
('114.125.190.85', '2016-07-15', 48, '1468599878'),
('114.125.179.0', '2016-07-15', 1, '1468592522'),
('66.249.65.52', '2016-07-16', 2, '1468686668'),
('66.249.65.53', '2016-07-16', 2, '1468614798'),
('114.125.171.159', '2016-07-16', 73, '1468619436'),
('101.226.33.240', '2016-07-16', 1, '1468623411'),
('114.125.176.33', '2016-07-16', 1, '1468629880'),
('45.55.133.236', '2016-07-16', 1, '1468636776'),
('114.125.184.98', '2016-07-16', 2, '1468637955'),
('69.171.230.119', '2016-07-16', 1, '1468641083'),
('69.171.230.101', '2016-07-16', 1, '1468641089'),
('110.136.246.194', '2016-07-16', 39, '1468674559'),
('168.235.206.61', '2016-07-16', 1, '1468647968'),
('120.169.254.186', '2016-07-16', 14, '1468649781'),
('180.254.185.121', '2016-07-16', 12, '1468650160'),
('114.79.28.65', '2016-07-16', 5, '1468649297'),
('115.178.237.166', '2016-07-16', 1, '1468649335'),
('36.68.180.221', '2016-07-16', 17, '1468662988'),
('66.249.84.246', '2016-07-16', 1, '1468670101'),
('66.102.6.75', '2016-07-16', 1, '1468670667'),
('66.249.65.51', '2016-07-16', 1, '1468686694'),
('114.125.191.155', '2016-07-16', 1, '1468687661'),
('66.249.65.51', '2016-07-17', 1, '1468694658'),
('180.76.15.5', '2016-07-17', 1, '1468703684'),
('114.125.178.161', '2016-07-17', 11, '1468705339'),
('66.220.149.32', '2016-07-17', 1, '1468711822'),
('69.171.230.98', '2016-07-17', 2, '1468711875'),
('69.171.230.114', '2016-07-17', 2, '1468711839'),
('69.171.230.120', '2016-07-17', 1, '1468711838'),
('69.171.230.108', '2016-07-17', 1, '1468711905'),
('110.136.246.194', '2016-07-17', 19, '1468720844'),
('162.243.233.58', '2016-07-17', 1, '1468718401'),
('36.68.75.215', '2016-07-17', 12, '1468724935'),
('66.249.65.53', '2016-07-17', 1, '1468721165'),
('202.67.37.46', '2016-07-17', 2, '1468722989'),
('36.84.224.10', '2016-07-17', 3, '1468723068'),
('64.246.165.10', '2016-07-17', 1, '1468725092'),
('::1', '2016-07-17', 96, '1468761387'),
('::1', '2016-07-18', 5, '1468803538'),
('::1', '2016-07-20', 106, '1469026786'),
('36.84.229.21', '2016-07-20', 16, '1469032161'),
('180.76.15.139', '2016-07-21', 1, '1469034080'),
('157.55.39.137', '2016-07-21', 1, '1469035945'),
('202.46.52.100', '2016-07-21', 1, '1469036080'),
('114.125.189.41', '2016-07-21', 57, '1469038796'),
('104.193.88.243', '2016-07-21', 1, '1469038079'),
('8.37.234.45', '2016-07-21', 2, '1469096578'),
('120.169.255.129', '2016-07-21', 15, '1469097195'),
('114.125.169.18', '2016-07-21', 2, '1469052673'),
('115.178.237.185', '2016-07-21', 29, '1469053343'),
('66.249.65.53', '2016-07-21', 2, '1469057469'),
('66.249.65.51', '2016-07-21', 1, '1469057572'),
('114.125.179.99', '2016-07-21', 1, '1469058787'),
('66.249.66.165', '2016-07-21', 1, '1469064404'),
('114.125.172.70', '2016-07-21', 1, '1469064520'),
('114.125.178.162', '2016-07-21', 2, '1469078396'),
('180.251.168.150', '2016-07-21', 68, '1469079578'),
('180.254.179.43', '2016-07-21', 63, '1469091767'),
('114.125.187.92', '2016-07-21', 9, '1469086001'),
('64.74.215.54', '2016-07-21', 12, '1469085953'),
('36.66.250.52', '2016-07-21', 20, '1469094112'),
('66.249.66.26', '2016-07-21', 1, '1469093275'),
('115.178.250.198', '2016-07-21', 20, '1469094451'),
('114.125.175.7', '2016-07-21', 10, '1469094341'),
('125.162.241.135', '2016-07-21', 13, '1469101157'),
('180.249.16.25', '2016-07-21', 16, '1469101541'),
('180.254.193.217', '2016-07-21', 10, '1469101106'),
('36.83.91.208', '2016-07-21', 12, '1469106735'),
('180.76.15.145', '2016-07-22', 1, '1469128803'),
('202.46.58.191', '2016-07-22', 1, '1469130811'),
('104.193.88.244', '2016-07-22', 1, '1469132820'),
('66.249.65.165', '2016-07-22', 3, '1469179273'),
('114.125.174.112', '2016-07-22', 1, '1469145673'),
('114.125.178.117', '2016-07-22', 1, '1469146802'),
('36.66.250.52', '2016-07-22', 17, '1469171917'),
('36.84.224.118', '2016-07-22', 1, '1469149232'),
('114.125.179.246', '2016-07-22', 1, '1469151690'),
('69.171.230.98', '2016-07-22', 1, '1469154362'),
('69.171.230.98', '2016-07-22', 1, '1469154362'),
('36.75.148.76', '2016-07-22', 48, '1469199407'),
('114.125.178.185', '2016-07-22', 26, '1469162099'),
('95.211.162.11', '2016-07-22', 1, '1469165829'),
('115.178.238.95', '2016-07-22', 13, '1469166393'),
('114.125.168.163', '2016-07-22', 76, '1469183443'),
('66.249.66.172', '2016-07-22', 1, '1469185507'),
('69.171.230.105', '2016-07-22', 1, '1469188303'),
('69.171.230.108', '2016-07-22', 1, '1469188334'),
('69.171.230.113', '2016-07-22', 1, '1469188338'),
('180.251.164.24', '2016-07-22', 12, '1469190929'),
('114.125.169.176', '2016-07-22', 12, '1469201175'),
('64.74.215.113', '2016-07-22', 1, '1469198080'),
('180.254.203.55', '2016-07-22', 1, '1469199897'),
('139.162.161.115', '2016-07-23', 1, '1469221379'),
('66.249.65.165', '2016-07-23', 3, '1469248911'),
('114.125.215.169', '2016-07-23', 20, '1469236811'),
('114.125.213.199', '2016-07-23', 13, '1469238837'),
('114.125.215.77', '2016-07-23', 1, '1469239479'),
('180.251.171.141', '2016-07-23', 1, '1469239636'),
('66.249.65.169', '2016-07-23', 2, '1469292538'),
('8.37.234.45', '2016-07-23', 2, '1469252223'),
('120.164.47.180', '2016-07-23', 8, '1469252454'),
('36.75.148.76', '2016-07-23', 2, '1469268637'),
('114.125.174.192', '2016-07-23', 1, '1469252903'),
('114.125.188.85', '2016-07-23', 21, '1469265018'),
('114.125.200.4', '2016-07-23', 21, '1469268365'),
('54.90.41.238', '2016-07-23', 3, '1469268275'),
('103.210.120.1', '2016-07-23', 6, '1469270705'),
('180.251.164.24', '2016-07-23', 11, '1469272096'),
('202.67.37.47', '2016-07-23', 21, '1469274207'),
('69.171.230.102', '2016-07-23', 1, '1469276088'),
('114.125.172.237', '2016-07-23', 4, '1469280111'),
('45.55.229.95', '2016-07-24', 16, '1469298714'),
('114.125.214.66', '2016-07-24', 13, '1469313396'),
('114.125.200.79', '2016-07-24', 39, '1469315006'),
('128.72.234.74', '2016-07-24', 1, '1469316865'),
('46.188.61.8', '2016-07-24', 1, '1469316866'),
('95.28.36.208', '2016-07-24', 1, '1469316870'),
('114.125.173.35', '2016-07-24', 1, '1469317688'),
('176.77.71.6', '2016-07-24', 1, '1469323314'),
('128.68.12.35', '2016-07-24', 1, '1469323316'),
('114.125.200.9', '2016-07-24', 3, '1469323841'),
('66.249.65.172', '2016-07-24', 1, '1469323918'),
('66.249.65.169', '2016-07-24', 3, '1469333543'),
('36.75.148.76', '2016-07-24', 38, '1469343205'),
('36.69.6.57', '2016-07-24', 7, '1469335641'),
('180.251.164.24', '2016-07-24', 1, '1469336525'),
('52.71.155.178', '2016-07-24', 4, '1469338292'),
('66.249.73.232', '2016-07-24', 1, '1469340650'),
('95.24.150.202', '2016-07-24', 1, '1469345231'),
('66.249.65.165', '2016-07-24', 1, '1469351113'),
('8.37.234.12', '2016-07-24', 2, '1469352921'),
('120.164.45.18', '2016-07-24', 1, '1469353590'),
('114.125.189.68', '2016-07-24', 1, '1469364609'),
('173.234.153.122', '2016-07-24', 1, '1469364612'),
('114.125.172.201', '2016-07-24', 16, '1469371589'),
('69.171.230.112', '2016-07-24', 1, '1469370601'),
('206.253.226.22', '2016-07-24', 1, '1469370787'),
('70.42.131.170', '2016-07-24', 1, '1469371935'),
('168.235.206.204', '2016-07-25', 2, '1469402198'),
('120.169.254.182', '2016-07-25', 1, '1469402366'),
('180.254.133.44', '2016-07-25', 19, '1469408555'),
('52.71.155.178', '2016-07-25', 7, '1469406755'),
('114.125.191.215', '2016-07-25', 12, '1469407806'),
('36.66.250.52', '2016-07-25', 21, '1469430304'),
('114.125.185.214', '2016-07-25', 13, '1469422117'),
('70.42.131.170', '2016-07-25', 1, '1469410246'),
('114.125.179.130', '2016-07-25', 14, '1469420399'),
('114.125.186.91', '2016-07-25', 19, '1469420348'),
('114.125.177.76', '2016-07-25', 1, '1469421156'),
('66.249.65.165', '2016-07-25', 1, '1469423491'),
('66.249.66.165', '2016-07-25', 1, '1469433578'),
('36.84.224.66', '2016-07-25', 45, '1469436395'),
('69.171.230.120', '2016-07-25', 1, '1469435225'),
('69.171.230.113', '2016-07-25', 2, '1469455029'),
('69.171.230.112', '2016-07-25', 1, '1469435228'),
('36.75.148.76', '2016-07-25', 62, '1469450424'),
('114.125.186.161', '2016-07-25', 1, '1469444259'),
('114.125.178.101', '2016-07-25', 2, '1469449078'),
('114.125.178.251', '2016-07-25', 1, '1469454723'),
('69.171.230.116', '2016-07-25', 1, '1469455020'),
('114.125.178.237', '2016-07-25', 3, '1469456079'),
('69.171.230.109', '2016-07-25', 1, '1469457284'),
('163.172.34.17', '2016-07-26', 4, '1469525473'),
('168.235.206.204', '2016-07-26', 1, '1469484749'),
('120.164.44.169', '2016-07-26', 13, '1469485707'),
('114.125.190.5', '2016-07-26', 1, '1469486122'),
('36.75.148.76', '2016-07-26', 29, '1469492052'),
('66.249.75.111', '2016-07-26', 1, '1469491292'),
('114.125.190.91', '2016-07-26', 1, '1469493501'),
('66.249.75.97', '2016-07-26', 1, '1469497246'),
('69.171.230.102', '2016-07-26', 1, '1469497434'),
('69.171.230.119', '2016-07-26', 2, '1469514327'),
('36.83.71.124', '2016-07-26', 32, '1469500145'),
('69.171.230.116', '2016-07-26', 2, '1469514329'),
('69.171.230.117', '2016-07-26', 1, '1469497646'),
('36.84.1.114', '2016-07-26', 13, '1469509541'),
('66.249.75.241', '2016-07-26', 1, '1469503750'),
('69.171.230.118', '2016-07-26', 1, '1469514328'),
('69.171.230.112', '2016-07-26', 2, '1469518114'),
('69.171.230.114', '2016-07-26', 1, '1469514340'),
('69.171.230.106', '2016-07-26', 1, '1469514340'),
('69.171.230.103', '2016-07-26', 1, '1469514354'),
('180.249.7.246', '2016-07-26', 32, '1469522064'),
('114.125.189.218', '2016-07-26', 36, '1469519548'),
('69.171.230.101', '2016-07-26', 1, '1469518118'),
('69.171.230.108', '2016-07-26', 1, '1469518125'),
('69.171.230.96', '2016-07-26', 1, '1469518127'),
('69.171.230.99', '2016-07-26', 1, '1469518158'),
('66.220.149.32', '2016-07-26', 1, '1469518167'),
('180.76.15.161', '2016-07-26', 1, '1469522685'),
('151.80.97.149', '2016-07-26', 2, '1469522760'),
('66.249.69.138', '2016-07-26', 2, '1469523298'),
('114.125.191.226', '2016-07-26', 1, '1469524103'),
('66.249.75.104', '2016-07-26', 1, '1469524523'),
('202.46.57.23', '2016-07-26', 1, '1469524694'),
('104.193.88.243', '2016-07-26', 1, '1469526703'),
('176.9.10.227', '2016-07-26', 1, '1469531459'),
('66.249.75.233', '2016-07-27', 1, '1469561612'),
('114.125.186.46', '2016-07-27', 1, '1469568545'),
('168.235.206.204', '2016-07-27', 1, '1469574172'),
('120.169.254.194', '2016-07-27', 3, '1469574672'),
('114.125.212.162', '2016-07-27', 1, '1469581609'),
('114.125.212.0', '2016-07-27', 1, '1469582436'),
('180.249.9.135', '2016-07-27', 9, '1469588353'),
('125.167.117.168', '2016-07-27', 5, '1469588292'),
('36.75.149.17', '2016-07-27', 6, '1469588334'),
('69.171.230.103', '2016-07-27', 1, '1469596844'),
('36.75.243.209', '2016-07-27', 45, '1469609344'),
('66.249.79.172', '2016-07-27', 1, '1469607020'),
('66.249.79.178', '2016-07-27', 1, '1469627445'),
('168.235.206.113', '2016-07-27', 1, '1469629509'),
('114.125.176.153', '2016-07-28', 13, '1469645821'),
('36.75.247.81', '2016-07-28', 19, '1469668370'),
('114.125.175.52', '2016-07-28', 14, '1469673339'),
('54.244.48.9', '2016-07-28', 1, '1469666587'),
('114.125.168.26', '2016-07-28', 16, '1469671275'),
('168.235.206.113', '2016-07-28', 1, '1469675362'),
('120.164.41.175', '2016-07-28', 4, '1469675717'),
('114.125.191.102', '2016-07-28', 1, '1469676328'),
('114.125.174.141', '2016-07-28', 39, '1469703660'),
('180.254.198.175', '2016-07-28', 2, '1469682558'),
('114.125.170.22', '2016-07-28', 2, '1469692815'),
('114.125.187.42', '2016-07-28', 1, '1469693573'),
('114.125.177.48', '2016-07-28', 13, '1469705793'),
('62.210.148.246', '2016-07-28', 1, '1469722474'),
('36.83.92.214', '2016-07-29', 119, '1469781273'),
('114.125.176.95', '2016-07-29', 1, '1469760741'),
('114.125.185.13', '2016-07-29', 11, '1469780094'),
('180.254.198.178', '2016-07-29', 30, '1469789308'),
('36.66.250.52', '2016-07-29', 18, '1469780878'),
('69.171.230.101', '2016-07-29', 1, '1469780851'),
('54.157.223.193', '2016-07-29', 1, '1469780932'),
('173.252.90.89', '2016-07-29', 1, '1469781210'),
('114.125.190.183', '2016-07-29', 1, '1469783574'),
('100.43.85.22', '2016-07-29', 1, '1469784097'),
('36.83.77.208', '2016-07-29', 49, '1469806346'),
('114.125.168.112', '2016-07-29', 62, '1469789818'),
('114.125.168.90', '2016-07-29', 3, '1469794807'),
('114.125.75.39', '2016-07-29', 1, '1469794883'),
('112.215.124.199', '2016-07-29', 1, '1469794983'),
('114.125.60.104', '2016-07-29', 2, '1469795073'),
('115.178.197.245', '2016-07-29', 1, '1469795210'),
('114.125.83.147', '2016-07-29', 1, '1469795233'),
('66.249.65.169', '2016-07-29', 1, '1469797509'),
('144.76.29.162', '2016-07-29', 1, '1469797542'),
('8.37.234.113', '2016-07-29', 1, '1469801286'),
('112.215.63.35', '2016-07-29', 1, '1469801289'),
('202.67.37.47', '2016-07-29', 16, '1469809127'),
('114.120.234.82', '2016-07-29', 1, '1469806369'),
('46.229.170.193', '2016-07-30', 1, '1469823384'),
('66.249.65.165', '2016-07-30', 4, '1469890035'),
('66.249.65.172', '2016-07-30', 1, '1469828501'),
('66.249.65.169', '2016-07-30', 1, '1469828513'),
('114.125.170.220', '2016-07-30', 9, '1469876172'),
('115.178.252.119', '2016-07-30', 5, '1469844446'),
('114.125.62.89', '2016-07-30', 1, '1469845548'),
('114.4.79.3', '2016-07-30', 1, '1469846221'),
('52.33.65.229', '2016-07-30', 1, '1469846351'),
('114.124.7.92', '2016-07-30', 1, '1469847659'),
('112.215.44.173', '2016-07-30', 1, '1469848713'),
('114.125.190.145', '2016-07-30', 19, '1469858659'),
('114.124.7.167', '2016-07-30', 1, '1469850746'),
('36.83.93.69', '2016-07-30', 26, '1469854260'),
('114.125.168.112', '2016-07-30', 45, '1469857338'),
('114.125.185.4', '2016-07-30', 1, '1469867951'),
('114.125.173.28', '2016-07-30', 1, '1469873762'),
('180.76.15.29', '2016-07-30', 1, '1469873804'),
('202.46.57.198', '2016-07-30', 1, '1469875814'),
('104.193.88.244', '2016-07-30', 1, '1469877823'),
('114.125.170.120', '2016-07-30', 3, '1469885420'),
('66.249.65.172', '2016-07-31', 1, '1469904365'),
('5.255.250.41', '2016-07-31', 1, '1469908344'),
('66.249.65.165', '2016-07-31', 3, '1469967512'),
('168.235.206.113', '2016-07-31', 1, '1469917638'),
('120.169.254.46', '2016-07-31', 3, '1469917803'),
('69.171.230.107', '2016-07-31', 1, '1469919436'),
('114.125.172.89', '2016-07-31', 8, '1469923018'),
('114.125.170.43', '2016-07-31', 17, '1469939609'),
('114.125.173.122', '2016-07-31', 18, '1469945950'),
('112.215.45.110', '2016-07-31', 7, '1469947492'),
('114.125.178.202', '2016-07-31', 1, '1469954767'),
('46.229.167.149', '2016-07-31', 3, '1469956201'),
('69.171.230.98', '2016-07-31', 1, '1469957294'),
('168.235.197.219', '2016-07-31', 1, '1469957295'),
('114.125.45.171', '2016-07-31', 6, '1469970683'),
('202.67.37.34', '2016-07-31', 1, '1469977508'),
('180.249.22.171', '2016-07-31', 25, '1469978171'),
('180.254.174.236', '2016-07-31', 2, '1469978194'),
('51.254.130.61', '2016-07-31', 1, '1469978393'),
('62.210.97.48', '2016-07-31', 1, '1469979551'),
('36.66.250.52', '2016-08-01', 4, '1470013864'),
('114.125.177.194', '2016-08-01', 4, '1470014879'),
('36.85.197.140', '2016-08-01', 1, '1470014340'),
('36.75.221.68', '2016-08-01', 6, '1470019983'),
('128.199.75.236', '2016-08-01', 1, '1470024125'),
('114.125.170.220', '2016-08-01', 8, '1470034404'),
('66.249.84.240', '2016-08-01', 1, '1470034741'),
('114.125.168.175', '2016-08-01', 1, '1470046523'),
('176.9.10.227', '2016-08-01', 1, '1470046934'),
('66.249.65.165', '2016-08-01', 1, '1470049516'),
('45.55.133.226', '2016-08-01', 1, '1470054138'),
('202.67.37.35', '2016-08-01', 1, '1470062024'),
('69.171.230.118', '2016-08-01', 1, '1470068919'),
('69.171.230.97', '2016-08-01', 1, '1470068922'),
('69.171.230.110', '2016-08-01', 1, '1470068926'),
('69.171.230.106', '2016-08-01', 1, '1470068944'),
('69.171.230.101', '2016-08-01', 1, '1470068963'),
('66.249.65.169', '2016-08-02', 2, '1470124217'),
('45.55.229.176', '2016-08-02', 10, '1470087784'),
('157.55.39.126', '2016-08-02', 1, '1470089881'),
('114.125.170.220', '2016-08-02', 14, '1470095806'),
('168.235.206.113', '2016-08-02', 1, '1470095663'),
('120.169.255.48', '2016-08-02', 3, '1470096021'),
('103.19.58.26', '2016-08-02', 17, '1470102988'),
('36.83.96.45', '2016-08-02', 6, '1470102993'),
('114.125.173.121', '2016-08-02', 29, '1470110576'),
('66.249.65.165', '2016-08-02', 1, '1470110032'),
('114.125.171.157', '2016-08-02', 21, '1470128958'),
('36.66.250.52', '2016-08-02', 16, '1470117446'),
('180.254.189.52', '2016-08-02', 1, '1470117012'),
('64.246.165.150', '2016-08-02', 1, '1470119615'),
('36.84.224.49', '2016-08-02', 4, '1470121183'),
('180.251.165.8', '2016-08-02', 16, '1470122573'),
('144.76.61.6', '2016-08-02', 1, '1470125316'),
('114.125.171.246', '2016-08-02', 19, '1470128439'),
('112.215.45.117', '2016-08-02', 1, '1470129369'),
('125.167.113.94', '2016-08-02', 1, '1470140936'),
('66.249.65.172', '2016-08-02', 1, '1470142103'),
('114.125.170.175', '2016-08-02', 1, '1470151144'),
('162.243.233.58', '2016-08-02', 1, '1470153858'),
('36.75.240.15', '2016-08-02', 1, '1470155219'),
('114.125.172.126', '2016-08-03', 1, '1470192508'),
('180.254.110.120', '2016-08-03', 1, '1470192592'),
('36.66.250.52', '2016-08-03', 76, '1470209870'),
('180.251.169.32', '2016-08-03', 138, '1470214446'),
('66.249.65.172', '2016-08-03', 1, '1470198089'),
('168.235.197.36', '2016-08-03', 4, '1470200720'),
('66.249.65.165', '2016-08-03', 1, '1470201220'),
('114.125.184.156', '2016-08-03', 15, '1470206508'),
('178.162.216.36', '2016-08-03', 2, '1470204695'),
('36.84.229.51', '2016-08-03', 1, '1470205233'),
('36.84.229.54', '2016-08-03', 6, '1470215133'),
('178.162.216.30', '2016-08-03', 1, '1470208336'),
('66.249.65.169', '2016-08-03', 2, '1470228846'),
('114.125.179.36', '2016-08-03', 11, '1470217705'),
('52.71.155.178', '2016-08-03', 2, '1470218745'),
('36.83.139.178', '2016-08-03', 8, '1470227434'),
('114.125.170.121', '2016-08-03', 18, '1470229939'),
('114.125.191.213', '2016-08-03', 35, '1470232564'),
('36.75.240.15', '2016-08-03', 47, '1470236451'),
('114.125.189.56', '2016-08-03', 6, '1470235931'),
('114.125.191.213', '2016-08-04', 51, '1470292404'),
('64.74.215.113', '2016-08-04', 1, '1470263254'),
('114.125.178.69', '2016-08-04', 6, '1470264056'),
('36.66.250.52', '2016-08-04', 1, '1470271666'),
('36.83.115.63', '2016-08-04', 4, '1470274099'),
('180.251.161.240', '2016-08-04', 73, '1470294803'),
('114.125.190.85', '2016-08-04', 6, '1470278125'),
('178.162.216.35', '2016-08-04', 1, '1470278150'),
('69.171.230.101', '2016-08-04', 1, '1470281290'),
('114.125.188.43', '2016-08-04', 14, '1470292370'),
('67.198.140.203', '2016-08-04', 2, '1470312738'),
('114.125.175.245', '2016-08-04', 16, '1470317473'),
('114.125.178.205', '2016-08-04', 7, '1470311897'),
('114.125.188.196', '2016-08-04', 1, '1470313287'),
('52.71.155.178', '2016-08-04', 2, '1470320972'),
('114.125.178.125', '2016-08-04', 27, '1470324355'),
('114.125.187.246', '2016-08-04', 1, '1470325006'),
('114.125.60.246', '2016-08-04', 1, '1470327656'),
('36.83.70.223', '2016-08-05', 2, '1470337071'),
('66.249.65.165', '2016-08-05', 3, '1470394323'),
('8.37.235.215', '2016-08-05', 1, '1470350551'),
('120.164.45.121', '2016-08-05', 12, '1470351111'),
('66.249.65.169', '2016-08-05', 1, '1470350866'),
('114.125.177.238', '2016-08-05', 41, '1470352700'),
('36.84.1.49', '2016-08-05', 1, '1470357939'),
('36.85.182.116', '2016-08-05', 32, '1470384244'),
('69.171.230.119', '2016-08-05', 1, '1470370327'),
('114.125.177.18', '2016-08-05', 1, '1470373878'),
('67.198.140.203', '2016-08-05', 1, '1470378865'),
('114.125.173.88', '2016-08-05', 6, '1470386920'),
('114.125.186.60', '2016-08-05', 16, '1470394327'),
('36.83.69.180', '2016-08-05', 12, '1470398226'),
('66.249.65.169', '2016-08-06', 1, '1470417224'),
('66.249.65.181', '2016-08-06', 1, '1470420405'),
('157.55.39.116', '2016-08-06', 1, '1470428417'),
('66.249.65.172', '2016-08-06', 1, '1470434224'),
('36.83.97.40', '2016-08-06', 97, '1470471532'),
('36.75.146.142', '2016-08-06', 80, '1470474590'),
('66.249.65.165', '2016-08-06', 2, '1470475083'),
('114.125.51.176', '2016-08-06', 1, '1470467128'),
('36.75.247.95', '2016-08-06', 20, '1470480998'),
('114.125.189.91', '2016-08-06', 11, '1470476741'),
('69.171.230.109', '2016-08-06', 1, '1470478280'),
('36.83.70.79', '2016-08-06', 44, '1470497189'),
('112.215.153.130', '2016-08-06', 5, '1470487072'),
('66.249.65.169', '2016-08-07', 2, '1470567154'),
('66.249.65.165', '2016-08-07', 1, '1470541254'),
('66.249.65.172', '2016-08-07', 3, '1470567131'),
('36.83.70.79', '2016-08-07', 110, '1470562843'),
('36.75.146.142', '2016-08-07', 53, '1470561507'),
('66.220.149.32', '2016-08-07', 1, '1470577761'),
('194.153.113.35', '2016-08-07', 1, '1470580419'),
('36.83.129.54', '2016-08-07', 1, '1470584045'),
('114.125.186.90', '2016-08-08', 2, '1470621478'),
('180.249.16.136', '2016-08-08', 2, '1470624293'),
('114.125.172.224', '2016-08-08', 1, '1470624001'),
('114.125.179.207', '2016-08-08', 4, '1470624318'),
('125.162.208.96', '2016-08-08', 58, '1470660639'),
('8.37.231.185', '2016-08-08', 1, '1470640198'),
('69.171.230.105', '2016-08-08', 1, '1470640207'),
('114.125.178.137', '2016-08-08', 20, '1470649080'),
('103.3.77.34', '2016-08-08', 6, '1470647274'),
('36.83.115.98', '2016-08-08', 5, '1470647198'),
('66.249.65.169', '2016-08-08', 1, '1470648469'),
('36.83.74.143', '2016-08-08', 6, '1470655729'),
('88.198.22.8', '2016-08-08', 1, '1470658178'),
('144.76.80.151', '2016-08-08', 1, '1470658790'),
('69.171.230.109', '2016-08-08', 1, '1470660555'),
('114.125.185.213', '2016-08-08', 4, '1470665031'),
('66.249.65.165', '2016-08-08', 1, '1470665271'),
('178.140.87.205', '2016-08-08', 1, '1470668274'),
('176.77.30.43', '2016-08-08', 1, '1470672932'),
('114.125.187.179', '2016-08-09', 5, '1470692432'),
('8.37.225.114', '2016-08-09', 5, '1470697084'),
('202.67.37.44', '2016-08-09', 22, '1470697663'),
('114.125.176.231', '2016-08-09', 5, '1470698984'),
('36.66.250.52', '2016-08-09', 70, '1470733050'),
('114.125.172.245', '2016-08-09', 2, '1470702834'),
('114.125.186.84', '2016-08-09', 22, '1470703486'),
('69.171.230.104', '2016-08-09', 1, '1470707340'),
('114.125.170.64', '2016-08-09', 5, '1470709564'),
('66.249.65.172', '2016-08-09', 2, '1470752486'),
('180.249.16.136', '2016-08-09', 15, '1470719281'),
('178.162.216.30', '2016-08-09', 9, '1470718742'),
('36.83.80.229', '2016-08-09', 15, '1470731394'),
('162.243.233.58', '2016-08-09', 1, '1470722473'),
('66.249.88.32', '2016-08-09', 1, '1470738470'),
('144.76.175.75', '2016-08-09', 1, '1470738585'),
('36.83.115.98', '2016-08-09', 1, '1470742039'),
('66.249.65.169', '2016-08-09', 1, '1470742294'),
('114.125.169.251', '2016-08-09', 1, '1470744490'),
('114.125.185.88', '2016-08-09', 9, '1470750931'),
('114.125.185.161', '2016-08-10', 1, '1470762900'),
('66.249.65.165', '2016-08-10', 2, '1470771491'),
('66.249.65.169', '2016-08-10', 2, '1470844889'),
('36.75.148.190', '2016-08-10', 12, '1470802263'),
('91.109.30.113', '2016-08-10', 3, '1470794495'),
('180.249.5.13', '2016-08-10', 56, '1470799874'),
('54.234.95.83', '2016-08-10', 2, '1470796122'),
('114.125.170.51', '2016-08-10', 6, '1470804127'),
('180.251.149.196', '2016-08-10', 2, '1470804448'),
('54.191.244.235', '2016-08-10', 1, '1470804188'),
('36.75.252.122', '2016-08-10', 63, '1470821336'),
('36.66.250.52', '2016-08-10', 21, '1470818084'),
('163.172.137.135', '2016-08-10', 2, '1470819822'),
('66.249.65.172', '2016-08-10', 1, '1470819926'),
('69.171.230.100', '2016-08-10', 2, '1470830760'),
('178.162.216.38', '2016-08-10', 5, '1470826078'),
('69.171.230.97', '2016-08-10', 1, '1470830769'),
('69.171.230.108', '2016-08-10', 1, '1470830824'),
('69.171.230.101', '2016-08-10', 1, '1470830829'),
('69.171.230.103', '2016-08-10', 1, '1470830834'),
('69.171.230.119', '2016-08-10', 1, '1470830834'),
('69.171.230.114', '2016-08-10', 1, '1470830835'),
('69.171.230.107', '2016-08-10', 1, '1470830848'),
('45.55.133.238', '2016-08-10', 1, '1470833601'),
('66.249.65.172', '2016-08-11', 3, '1470926124'),
('104.131.19.146', '2016-08-11', 17, '1470850868'),
('114.125.185.244', '2016-08-11', 8, '1470852205'),
('66.249.65.165', '2016-08-11', 2, '1470873718'),
('114.125.174.95', '2016-08-11', 12, '1470867260'),
('114.125.173.211', '2016-08-11', 3, '1470868657'),
('114.125.189.136', '2016-08-11', 5, '1470868958'),
('114.125.172.243', '2016-08-11', 4, '1470869411'),
('66.249.65.169', '2016-08-11', 1, '1470870178'),
('125.162.211.212', '2016-08-11', 107, '1470903447'),
('46.229.167.149', '2016-08-11', 3, '1470876761'),
('8.37.235.215', '2016-08-11', 1, '1470885185'),
('120.164.41.244', '2016-08-11', 10, '1470886118'),
('180.251.149.196', '2016-08-11', 1, '1470886320'),
('110.136.89.49', '2016-08-11', 2, '1470896816'),
('114.125.173.206', '2016-08-11', 1, '1470896775'),
('36.66.250.52', '2016-08-11', 9, '1470899278'),
('91.109.30.99', '2016-08-11', 5, '1470908679'),
('180.249.15.51', '2016-08-11', 5, '1470912100'),
('69.171.230.122', '2016-08-11', 1, '1470912008'),
('40.77.167.63', '2016-08-11', 1, '1470913382'),
('61.5.105.11', '2016-08-11', 1, '1470913418'),
('125.162.210.95', '2016-08-11', 1, '1470919967'),
('114.125.185.146', '2016-08-12', 3, '1470940566'),
('40.77.167.63', '2016-08-12', 2, '1471003381'),
('66.249.65.165', '2016-08-12', 2, '1471000552'),
('36.83.67.64', '2016-08-12', 13, '1470991966'),
('36.66.250.52', '2016-08-12', 16, '1470965196'),
('66.249.73.232', '2016-08-12', 1, '1470977768'),
('66.249.65.172', '2016-08-12', 1, '1470984082'),
('69.171.230.119', '2016-08-12', 1, '1470986419'),
('69.171.230.99', '2016-08-12', 1, '1470986420'),
('69.171.230.113', '2016-08-12', 1, '1470986424'),
('8.37.235.215', '2016-08-12', 1, '1471003496'),
('120.164.41.244', '2016-08-12', 16, '1471005113'),
('114.121.132.245', '2016-08-12', 3, '1471010015'),
('66.249.65.165', '2016-08-13', 2, '1471035783'),
('180.254.179.80', '2016-08-13', 2, '1471051658'),
('66.249.84.234', '2016-08-13', 1, '1471052790'),
('66.249.65.169', '2016-08-13', 1, '1471053441'),
('::1', '2017-06-04', 451, '1496572066'),
('::1', '2017-06-03', 70, '1496471843'),
('::1', '2017-06-05', 3, '1496612977'),
('::1', '2017-06-07', 300, '1496849875'),
('::1', '2017-06-08', 178, '1496887857'),
('::1', '2018-02-17', 96, '1518886500'),
('::1', '2018-02-18', 702, '1518963063'),
('::1', '2018-02-19', 59, '1519027309'),
('::1', '2018-02-20', 29, '1519086259'),
('::1', '2018-02-21', 1, '1519190509'),
('::1', '2018-03-03', 895, '1520079952'),
('::1', '2018-03-04', 255, '1520143723'),
('::1', '2018-03-05', 35, '1520236218'),
('::1', '2018-03-06', 21, '1520314823'),
('::1', '2018-03-07', 13, '1520379122'),
('::1', '2019-07-13', 10, '1562983985'),
('::1', '2019-07-16', 23, '1563264667'),
('::1', '2019-07-17', 45, '1563361033'),
('::1', '2019-07-18', 3, '1563414921'),
('::1', '2019-07-20', 2, '1563634419'),
('::1', '2019-07-21', 1, '1563663141'),
('::1', '2019-07-24', 4, '1563922861'),
('::1', '2019-07-26', 4, '1564109291'),
('::1', '2019-08-03', 3, '1564788194'),
('::1', '2019-08-19', 26, '1566179915'),
('::1', '2019-11-20', 117, '1574209879');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `username`, `tag_seo`, `count`) VALUES
(41, 'Tambak', '', 'tambak', 20),
(40, 'Perkebunan', '', 'perkebunan', 27),
(38, 'Marketing', '', 'marketing', 13),
(37, 'System', '', 'system', 26),
(36, 'Bonus', '', 'bonus', 17),
(34, 'Wisata', '', 'wisata', 4),
(24, 'Olahraga', '', 'olahraga', 11),
(25, 'Kesehatan', '', 'kesehatan', 16),
(26, 'Nasional', '', 'nasional', 42),
(27, 'Metropolitan', '', 'metropolitan', 32),
(28, 'Teknologi', '', 'teknologi', 12),
(22, 'Hiburan', '', 'hiburan', 18),
(43, 'Pertanian', '', 'pertanian', 9),
(49, 'Peternakan', 'admin', 'peternakan', 6),
(50, 'pestisida nabati', 'admin', 'pestisida-nabati', 3),
(51, 'Pupuk Organik', 'admin', 'pupuk-organik', 4),
(52, 'Travel', 'admin', 'travel', 0),
(53, 'Umrah', 'admin', 'umrah', 1),
(54, 'Pesiar', 'admin', 'pesiar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id_templates` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `username`, `pembuat`, `folder`, `aktif`) VALUES
(17, 'PHP[mu] Template V.3 Full Color', 'admin', 'Robby Prihandaya', 'tha-net', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `isi_testimoni` text NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `waktu_testimoni` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_konsumen`, `isi_testimoni`, `aktif`, `waktu_testimoni`) VALUES
(1, 1, 'Saya berusaha mencoba memaklumi mereka tentang kesan menjadi entrepreneur instan ini dengan menjadi seorang MLM-ers, dengan menanyakan penyebab bisa memunculkan kesan instan tersebut. Mereka memberikan jawaban beragam berkaitan dengan proses instan seorang entrepreneur ini. ', 'Y', '2016-09-11 03:25:21'),
(2, 3, '<p>Menjadi seorang sukses dengan cara instan memang impian banyak orang dan saya yakin anda pun akan menyetujuinya. Namun, kembali lagi kepada diri anda sendiri apakah anda benar-benar memahami makna menjadi seorang entrepreneur sesungguhnya atau hanya memaknai seperti halnya membuat mie instan.</p>\n', 'Y', '2016-09-12 07:09:16'),
(5, 6, 'Saya berusaha mencoba memaklumi mereka tentang kesan menjadi entrepreneur instan ini dengan menjadi seorang MLM-ers, dengan menanyakan penyebab bisa memunculkan kesan instan tersebut. Mereka memberikan jawaban beragam berkaitan dengan proses instan seorang entrepreneur ini.', 'Y', '2016-09-14 14:11:36'),
(7, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque condimentum mattis. Suspendisse potenti. Proin vitae elementum nisi. Aliquam eu pretium risus. Nam varius efficitur consectetur.', 'Y', '2018-03-03 15:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `foto`, `level`, `blokir`, `id_session`) VALUES
(1, 'admin', 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'Robby Prihandaya', 'saya@robbyprihandaya.com', '081267771344', 'robby.jpg', 'admin', 'N', 'q173s8hs1jl04st35169ccl8o7'),
(3, 'robby', '882c306525a9f885466520ba2aa6b10377b029cb569311fc17161d40df6e1bab7eb6103fcf567ce3a1375e77cc7db1928efec90cd0a379303fc2adb159bb1d14', 'Robby Prihandaya', 'robby.prihandaya@gmail.com', '081267771344', '', 'user', 'N', '8d05dd2f03981f86b56c23951f3f34d7-20180307063006');

-- --------------------------------------------------------

--
-- Table structure for table `users_modul`
--

CREATE TABLE `users_modul` (
  `id_umod` int(11) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(1, '8d05dd2f03981f86b56c23951f3f34d7-20170401064451', 79),
(2, '8d05dd2f03981f86b56c23951f3f34d7-20170401064451', 77),
(3, '8d05dd2f03981f86b56c23951f3f34d7-20170401064451', 43),
(4, '8d05dd2f03981f86b56c23951f3f34d7-20170401064451', 35),
(5, '8d05dd2f03981f86b56c23951f3f34d7-20170401064451', 33),
(7, '8d05dd2f03981f86b56c23951f3f34d7-20170401064451', 18),
(8, '8d05dd2f03981f86b56c23951f3f34d7-20180307063006', 59),
(9, '8d05dd2f03981f86b56c23951f3f34d7-20180307063006', 34),
(10, '8d05dd2f03981f86b56c23951f3f34d7-20180307063006', 33),
(11, '8d05dd2f03981f86b56c23951f3f34d7-20180307063006', 31),
(12, '8d05dd2f03981f86b56c23951f3f34d7-20180307063006', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `pasangiklan`
--
ALTER TABLE `pasangiklan`
  ADD PRIMARY KEY (`id_pasangiklan`);

--
-- Indexes for table `rb_kategori_produk`
--
ALTER TABLE `rb_kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `rb_keterangan`
--
ALTER TABLE `rb_keterangan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `rb_konfirmasi`
--
ALTER TABLE `rb_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi_pembayaran`);

--
-- Indexes for table `rb_konsumen`
--
ALTER TABLE `rb_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `rb_kota`
--
ALTER TABLE `rb_kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `rb_pembelian`
--
ALTER TABLE `rb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `rb_pembelian_detail`
--
ALTER TABLE `rb_pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`);

--
-- Indexes for table `rb_penjualan`
--
ALTER TABLE `rb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `rb_penjualan_detail`
--
ALTER TABLE `rb_penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `rb_penjualan_temp`
--
ALTER TABLE `rb_penjualan_temp`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `rb_produk`
--
ALTER TABLE `rb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rb_provinsi`
--
ALTER TABLE `rb_provinsi`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indexes for table `rb_rekening`
--
ALTER TABLE `rb_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `rb_supplier`
--
ALTER TABLE `rb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_templates`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `users_modul`
--
ALTER TABLE `users_modul`
  ADD PRIMARY KEY (`id_umod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  MODIFY `id_halaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `pasangiklan`
--
ALTER TABLE `pasangiklan`
  MODIFY `id_pasangiklan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `rb_kategori_produk`
--
ALTER TABLE `rb_kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rb_keterangan`
--
ALTER TABLE `rb_keterangan`
  MODIFY `id_keterangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rb_konfirmasi`
--
ALTER TABLE `rb_konfirmasi`
  MODIFY `id_konfirmasi_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rb_konsumen`
--
ALTER TABLE `rb_konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rb_kota`
--
ALTER TABLE `rb_kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `rb_pembelian`
--
ALTER TABLE `rb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rb_pembelian_detail`
--
ALTER TABLE `rb_pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rb_penjualan`
--
ALTER TABLE `rb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rb_penjualan_detail`
--
ALTER TABLE `rb_penjualan_detail`
  MODIFY `id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rb_penjualan_temp`
--
ALTER TABLE `rb_penjualan_temp`
  MODIFY `id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rb_produk`
--
ALTER TABLE `rb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rb_provinsi`
--
ALTER TABLE `rb_provinsi`
  MODIFY `provinsi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rb_rekening`
--
ALTER TABLE `rb_rekening`
  MODIFY `id_rekening` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rb_supplier`
--
ALTER TABLE `rb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id_templates` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_modul`
--
ALTER TABLE `users_modul`
  MODIFY `id_umod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
