-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost:3306
-- เวลาในการสร้าง: 11 ต.ค. 2016  11:30น.
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.5.49-cll
-- รุ่นของ PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `nisachon_dormmsu`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_class_dorm`
--

CREATE TABLE IF NOT EXISTS `tbl_class_dorm` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_code` varchar(10) NOT NULL,
  `c_bed` int(1) NOT NULL,
  `d_id` int(11) NOT NULL,
  `d_side` int(2) NOT NULL,
  `bathroom` int(2) NOT NULL,
  `c_status` int(1) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- dump ตาราง `tbl_class_dorm`
--

INSERT INTO `tbl_class_dorm` (`c_id`, `c_code`, `c_bed`, `d_id`, `d_side`, `bathroom`, `c_status`) VALUES
(101, '101', 2, 4, 1, 1, 0),
(102, '102', 2, 4, 1, 1, 0),
(103, '103', 2, 4, 1, 1, 1),
(104, '104', 2, 4, 1, 1, 1),
(105, '101', 2, 1, 1, 1, 0),
(106, '105', 2, 4, 1, 1, 1),
(108, '102', 2, 1, 1, 1, 1),
(109, '106', 2, 4, 1, 1, 1),
(110, '107', 2, 4, 1, 1, 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_data_news`
--

CREATE TABLE IF NOT EXISTS `tbl_data_news` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_news` text NOT NULL,
  `n_date` date NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_dorm`
--

CREATE TABLE IF NOT EXISTS `tbl_dorm` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` text NOT NULL,
  `d_number_bed` int(2) NOT NULL,
  `d_type` varchar(255) NOT NULL,
  `d_price` int(10) NOT NULL,
  `d_location` text NOT NULL,
  `d_position` varchar(255) NOT NULL,
  `d_type_gender` varchar(10) NOT NULL,
  `d_number_dorm` int(3) NOT NULL,
  `d_side` int(2) NOT NULL,
  `d_bathroom` int(2) NOT NULL,
  `url_image_view` text NOT NULL,
  `d_status` int(1) NOT NULL,
  `d_status_meter` varchar(10) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- dump ตาราง `tbl_dorm`
--

INSERT INTO `tbl_dorm` (`d_id`, `d_name`, `d_number_bed`, `d_type`, `d_price`, `d_location`, `d_position`, `d_type_gender`, `d_number_dorm`, `d_side`, `d_bathroom`, `url_image_view`, `d_status`, `d_status_meter`) VALUES
(1, 'หอพักเชียงยืน', 2, 'ปรับอากาศ', 6400, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'male', 30, 2, 3, '', 0, 'false'),
(2, 'หอพักพยัคฆภูมิพิสัย', 3, 'พัดลม', 4000, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'male', 30, 2, 3, '', 0, 'true'),
(3, 'หอพักพยัคฆภูมิพิสัย', 3, 'ปรับอากาศ', 5400, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'male', 30, 2, 3, '', 0, 'false'),
(4, 'หอพักราชพฤกษ์', 2, 'พัดลม', 5500, 'หอพักเขตพื้นที่ ในเมือง', 'ม.เก่า', 'male', 20, 2, 2, 'http://www.hhh.com', 0, 'false'),
(5, 'หอพักสำราญ', 2, 'พัดลม', 2000, 'หอพักเขตพื้นที่ ในเมือง', 'ม.เก่า', 'male', 30, 2, 3, '', 0, 'false'),
(6, 'หอพักเฮือนเฮา', 2, 'พัดลม', 2000, 'หอพักเขตพื้นที่ ในเมือง', 'ม.เก่า', 'male', 30, 2, 3, '', 0, 'false'),
(7, 'หอพักปาริชาติ', 4, 'พัดลม', 4500, 'หอเขตพื้นที่ ในเมือง', 'ม.เก่า', 'male', 30, 2, 3, '', 0, 'false'),
(8, 'หอพักกุดรัง', 2, 'ปรับอากาศ', 9500, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'female', 30, 2, 3, '', 0, 'false'),
(9, 'หอพักกุดรัง', 2, 'พัดลม', 7500, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'female', 30, 2, 5, '', 0, 'false'),
(10, 'หอพักบรบือ', 2, 'พัดลม', 5400, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'female', 30, 2, 3, '', 0, 'false'),
(11, 'หอพักโกสุมพิสัย', 3, 'พัดลม', 4000, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'female', 30, 2, 3, '', 0, 'false'),
(12, 'หอพักโกสุมพิสัย', 3, 'ปรับอากาศ', 5400, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'female', 30, 2, 3, '', 0, 'false'),
(13, 'หอพักยางสีสุราช', 4, 'พัดลม', 4000, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'female', 30, 2, 3, '', 0, 'false'),
(14, 'หอพักกันทรวิชัย', 4, 'พัดลม', 4000, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'female', 30, 2, 3, '', 0, 'false'),
(15, 'หอพักวาปีปทุม', 4, 'พัดลม', 4000, 'หอพักเขตพื้นที่ ขามเรียง', 'ม.ใหม่', 'female', 30, 2, 3, '', 0, 'false'),
(16, 'หอพักชัยพฤกษ์', 2, 'พัดลม', 2000, 'หอพักเขตพื้นที่ ในเมือง', 'ม.เก่า', 'female', 30, 2, 3, '', 0, 'false'),
(17, 'หอพักการเกด', 4, 'พัดลม', 4500, 'หอพักเขตพื้นที่ ในเมือง', 'ม.เก่า', 'female', 30, 2, 1, '', 0, 'false'),
(18, 'หอพักปฐมเวศน์', 2, 'พัดลม', 2000, 'หอพักเขตพื้นที่ ในเมือง', 'ม.เก่า', 'female', 30, 2, 3, '', 0, 'false'),
(19, 'หอพักการเวก', 4, 'ปรับอากาศ', 5400, 'หอพักเขตพื้นที่ ในเมือง', 'ม.เก่า', 'female', 30, 2, 3, '', 0, 'false'),
(20, 'หอพักชวนชม', 4, 'พัดลม', 4500, 'หอพักเขตพื้นที่ ในเมือง', 'ม.เก่า', 'female', 30, 2, 3, '', 0, 'false'),
(21, 'หอพักพุทรักษา', 4, 'พัดลม', 4500, 'หอพักเขตพื้นที่ ในเมือง', 'ม.เก่า', 'female', 30, 2, 3, '', 0, 'false'),
(22, 'หอพักชงโค', 2, 'พัดลม', 6000, 'หอพักเขตพื้นที่ ในเมือง', 'ม.เก่า', 'female', 30, 2, 3, '', 0, 'false');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_facuty`
--

CREATE TABLE IF NOT EXISTS `tbl_facuty` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_name` text NOT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- dump ตาราง `tbl_facuty`
--

INSERT INTO `tbl_facuty` (`fac_id`, `fac_name`) VALUES
(1, 'ครุศาสตร์'),
(2, 'เทคโนโลยีสารสนเทศ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_file_system`
--

CREATE TABLE IF NOT EXISTS `tbl_file_system` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `f_date` date NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- dump ตาราง `tbl_file_system`
--

INSERT INTO `tbl_file_system` (`f_id`, `f_name`, `f_date`) VALUES
(23, 'con1.jpg', '2016-10-11'),
(24, 'ป้ายระบบจอง602.png', '2016-10-11');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_genaral`
--

CREATE TABLE IF NOT EXISTS `tbl_genaral` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_data` text NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- dump ตาราง `tbl_genaral`
--

INSERT INTO `tbl_genaral` (`g_id`, `g_data`) VALUES
(1, '\r\n                                    \r\n                                    <img src="http://nisachonreiki.com/MSU_DORM/file-system/%E0%B8%9B%E0%B9%89%E0%B8%B2%E0%B8%A2%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A%E0%B8%88%E0%B8%AD%E0%B8%87602.png" style="width: 998px;" class="img-responsive">\r\n                                    \r\n                                    \r\n                                                                                                                                                                                                    '),
(2, '\r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    ขั้นตอนการสมัครหอพัก                                                                                                                                                                                                                                                                                                                                                                                                '),
(3, '\r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    ติดต่อเรา                                                                                                                                                                                                                                                                                                                                                                                                '),
(4, '\r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    เกี่ยวกับเรา                                                                                                                                                                                                                                                                                                                                                                                                '),
(5, '\r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    <h4></h4><h3><span style="color: rgb(255, 0, 0);">ข้อความแจ้งเตือนเมื่อมีการจะจองหอพัก</span></h3><div><h4><span style="color: rgb(8, 82, 148);">1. นิสิตจะมีภาระหนี้ค่าบำรุงหอพักทันทีหลังการสมัคร<br>2. นิสิตต้องชำระเงินค่าบำรุงหอพักพร้อมค่าประกันหอพัก 1,000 บาทไม่เกินวันที่ 15 กรกฎาคม 2559<br>3. เมื่อได้รับสิทธิ์เป็นที่เรียบร้อยนิสิตจะต้องเข้าพักในหอพักมหาวิทยาลัยมหาสารคาม<br>เป็นระยะเวลา 1 ปีการศึกษา (2 ภาคเรียน)<br>4. กรณีสมัครหอพักออนไลน์แล้วจะไม่สามารถยกเลิกในภายหลังได้</span></h4></div>                                                                                                                                                                                                                                                                                                                                                                                                '),
(6, '\r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    วิธีการปริ้นใบชำระค่าหอพัก                                                                                                                                                                                                                                                                                                                                                                                                '),
(7, '\r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    นโยบายการโอนย้ายทะเบียนบ้านนิสิต                                                                                                                                                                                                                                                                                                                                                                                                ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_manager`
--

CREATE TABLE IF NOT EXISTS `tbl_manager` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_code` varchar(10) NOT NULL,
  `m_fullname` varchar(255) NOT NULL,
  `m_position` varchar(255) NOT NULL,
  `m_username` varchar(50) NOT NULL,
  `m_password` varchar(50) NOT NULL,
  `m_status_meter` varchar(10) NOT NULL,
  `m_level` int(11) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- dump ตาราง `tbl_manager`
--

INSERT INTO `tbl_manager` (`m_id`, `m_code`, `m_fullname`, `m_position`, `m_username`, `m_password`, `m_status_meter`, `m_level`) VALUES
(1, 'ADMIN01', 'Administrator1', 'เจ้าหน้าที่คอมพิวเตอร์', 'admin_1', 'admin_1', 'false', 0),
(2, 'ADMIN02', 'Administrator2', 'เจ้าหน้าที่ โปรแกรมเมอร์', 'admin_2', 'admin_2', 'false', 0),
(8, 'EM001', 'พีระชาติ ', 'นักวิชาการคอม', '001', '001', 'false', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_menu_user`
--

CREATE TABLE IF NOT EXISTS `tbl_menu_user` (
  `me_id` int(1) NOT NULL AUTO_INCREMENT,
  `home` varchar(50) CHARACTER SET utf8 NOT NULL,
  `register` varchar(50) CHARACTER SET utf8 NOT NULL,
  `check_dorm` varchar(50) CHARACTER SET utf8 NOT NULL,
  `help_regis` varchar(50) CHARACTER SET utf8 NOT NULL,
  `help_print` varchar(255) CHARACTER SET utf8 NOT NULL,
  `help_lop` varchar(255) CHARACTER SET utf8 NOT NULL,
  `about` varchar(50) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`me_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `tbl_menu_user`
--

INSERT INTO `tbl_menu_user` (`me_id`, `home`, `register`, `check_dorm`, `help_regis`, `help_print`, `help_lop`, `about`, `contact`) VALUES
(1, 'หน้าหลัก', 'สมัครหอพักนิสิต', 'ตรวจสอบหอพัก', 'ขั้นตอนการสมัครหอพัก', 'วิธีปริ้นใบชำระค่าหอพัก', 'นโยบายการโอนย้ายทะเบียนบ้าน', 'เกี่ยวกับหอพัก', 'ติดต่อ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_meter`
--

CREATE TABLE IF NOT EXISTS `tbl_meter` (
  `me_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `water_meter_ago` int(8) NOT NULL,
  `water_number_meter` int(8) NOT NULL,
  `water_unit` int(8) NOT NULL,
  `status_water` varchar(20) NOT NULL,
  `elec_meter_ago` int(8) NOT NULL,
  `elec_number_meter` int(8) NOT NULL,
  `elec_unit` int(8) NOT NULL,
  `status_elec` varchar(20) NOT NULL,
  `me_date` date NOT NULL,
  `me_status` varchar(20) NOT NULL,
  PRIMARY KEY (`me_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_onus`
--

CREATE TABLE IF NOT EXISTS `tbl_onus` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_code` varchar(10) NOT NULL,
  `d_id` int(11) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- dump ตาราง `tbl_onus`
--

INSERT INTO `tbl_onus` (`o_id`, `m_code`, `d_id`) VALUES
(106, 'EM001', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_register_dorm`
--

CREATE TABLE IF NOT EXISTS `tbl_register_dorm` (
  `re_id` int(11) NOT NULL AUTO_INCREMENT,
  `re_code` varchar(11) NOT NULL,
  `re_fname` varchar(255) NOT NULL,
  `re_lname` varchar(255) NOT NULL,
  `re_level_class` varchar(50) NOT NULL,
  `re_gender` varchar(50) NOT NULL,
  `fac_id` int(11) NOT NULL,
  `re_subject` varchar(255) NOT NULL,
  `re_tel` varchar(15) NOT NULL,
  `re_email` varchar(255) NOT NULL,
  `d_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `re_date` date NOT NULL,
  `re_date_success` date NOT NULL,
  `re_date_move` date NOT NULL,
  `re_time` time NOT NULL,
  `re_status` int(1) NOT NULL,
  PRIMARY KEY (`re_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- dump ตาราง `tbl_register_dorm`
--

INSERT INTO `tbl_register_dorm` (`re_id`, `re_code`, `re_fname`, `re_lname`, `re_level_class`, `re_gender`, `fac_id`, `re_subject`, `re_tel`, `re_email`, `d_id`, `c_id`, `re_date`, `re_date_success`, `re_date_move`, `re_time`, `re_status`) VALUES
(37, '55337377777', 'สามารถ', 'จระเทศ', '1', 'male', 1, 'คอมพิวเตอร์ศึกษา', '0883383837', 'samart@gmail.com', 4, 101, '2016-10-01', '2016-10-01', '0000-00-00', '05:13:12', 1),
(38, '11111111111', 'เทส', 'เทส', '4', 'male', 1, 'ddd', '0000000000', '', 1, 105, '2016-10-01', '2016-10-03', '0000-00-00', '08:15:54', 1),
(39, '22222222222', 'เทส2', 'เทส2', '1', 'male', 2, 'เทส', '0000000000', 'ดดดดดดดดดดด', 4, 101, '2016-10-03', '2016-10-03', '0000-00-00', '08:45:58', 1),
(40, '44345353453', 'เอกราช', 'ใจดี', '1', 'male', 2, 'IT', '0669969696', 'jj@gmail.com', 4, 102, '2016-10-03', '2016-10-07', '0000-00-00', '09:38:31', 1),
(41, '50011210296', 'สุภสิทธ์', 'พันแน่น', '', 'female', 1, '', '0634945455', '', 8, 0, '2016-10-06', '0000-00-00', '0000-00-00', '13:38:18', 0),
(42, '11111111112', 'เทส22', 'เทส22', '1', 'male', 2, 'ีะัีะัีะั', '0000000000', 'รยีรยีรยรนย', 1, 105, '2016-10-07', '2016-10-07', '0000-00-00', '09:44:22', 1),
(43, '11111111555', 'พพพพพ', 'ีรีรีร', '1', 'male', 2, 'ีรีรีร', '0000000000', 'ีรีรีร', 1, 0, '2016-10-11', '0000-00-00', '0000-00-00', '10:20:51', 0),
(44, '11111111123', 'fffffffff', 'ffffffffffff', '', 'male', 1, 'dsww', '0154694694', 'wdwdw', 1, 0, '2016-10-11', '0000-00-00', '0000-00-00', '10:29:13', 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_status` int(11) NOT NULL,
  `day_start` date NOT NULL,
  `day_stop` date NOT NULL,
  `alert_text` text NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `tbl_setting`
--

INSERT INTO `tbl_setting` (`s_id`, `s_status`, `day_start`, `day_stop`, `alert_text`) VALUES
(1, 1, '2016-09-01', '2016-10-30', '\r\n                                    \r\n                                    \r\n                                    \r\n                                    \r\n                                    <h2 style="text-align: center; ">\r\n                                    \r\n                                    \r\n                                    ปิดระบบชั่วคราว</h2>                                                                                                                                                                ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tbl_unit_meter`
--

CREATE TABLE IF NOT EXISTS `tbl_unit_meter` (
  `u_id` int(1) NOT NULL AUTO_INCREMENT,
  `u_price` int(8) NOT NULL,
  `u_price_all` int(8) NOT NULL,
  `u_status` varchar(10) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- dump ตาราง `tbl_unit_meter`
--

INSERT INTO `tbl_unit_meter` (`u_id`, `u_price`, `u_price_all`, `u_status`) VALUES
(1, 15, 0, 'false'),
(2, 7, 0, 'false');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
