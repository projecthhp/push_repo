-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2020 lúc 05:25 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookmart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chu_de`
--

CREATE TABLE `chu_de` (
  `MaCD` int(11) NOT NULL COMMENT 'Mã loại chủ đề',
  `Ten_CD` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Tên loại chủ đề',
  `Trang_thai` tinyint(4) DEFAULT 1 COMMENT 'Trạng thái: \r\n1- Đang hiển thị\r\n0- Đang ẩn\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chu_de`
--

INSERT INTO `chu_de` (`MaCD`, `Ten_CD`, `Trang_thai`) VALUES
(1, 'Thiếu nhi', 1),
(12, 'Văn học', 1),
(13, 'Thiếu nhi', 1),
(14, 'Kinh tế', 1),
(15, 'Tiểu sử hồi ký', 1),
(16, 'Sách học ngoại ngữ', 1),
(17, 'Tâm lý kỹ năng sống', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `MaHD` int(11) NOT NULL COMMENT 'Mã hóa đơn',
  `Ngay_HD` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày hóa đơn',
  `Hoten_nguoinhan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Họ tên người nhận hàng',
  `Diachi_nguoinhan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Địa chỉ người nhận hàng',
  `Dienthoai_nguoinhan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Điện thoại người nhận',
  `Tong_tien` int(200) NOT NULL,
  `Ngay_giao_hang` datetime NOT NULL COMMENT 'Ngày giao hàng',
  `Trang_thai` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Trạng thái đơn hàng: \r\n0- Chưa xử lý\r\n1- Đang xử lý\r\n2- Đã xử lý\r\n3- Đã hủy\r\n',
  `MaKH` int(11) DEFAULT NULL COMMENT 'Khóa ngoại, tham chiếu đến KHACH_HANG'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`MaHD`, `Ngay_HD`, `Hoten_nguoinhan`, `Diachi_nguoinhan`, `Dienthoai_nguoinhan`, `Tong_tien`, `Ngay_giao_hang`, `Trang_thai`, `MaKH`) VALUES
(60, '2020-06-27 08:36:47', 'Trần Đức Mạnh', 'Nhà số 65 ngõ 898 đường Láng, Đống Đa, Hà Nội', '0815630776', 77000, '0000-00-00 00:00:00', 0, 6),
(61, '2020-06-27 08:36:47', 'Trần Đức Mạnh', 'Nhà số 65 ngõ 898 đường Láng, Đống Đa, Hà Nội', '0815630776', 77000, '0000-00-00 00:00:00', 0, 6),
(62, '2020-06-27 08:38:53', 'Trần Đức Mạnh', 'nhà 126 ngõ 296 Minh Khai', '-47', 32400, '0000-00-00 00:00:00', 0, 8),
(63, '2020-06-27 08:38:53', 'Trần Đức Mạnh', 'nhà 126 ngõ 296 Minh Khai', '-47', 32400, '0000-00-00 00:00:00', 0, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_ct`
--

CREATE TABLE `hoa_don_ct` (
  `MaHD` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `So_luong_ban` int(11) NOT NULL,
  `Gia_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoa_don_ct`
--

INSERT INTO `hoa_don_ct` (`MaHD`, `MaSP`, `So_luong_ban`, `Gia_ban`) VALUES
(61, 38, 1, 77000),
(63, 48, 1, 32400);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaKH` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `Ho_ten` varchar(100) NOT NULL COMMENT 'Tên khách hàng',
  `Tai_khoan` varchar(50) NOT NULL COMMENT 'Tai_khoan	Varchar(50)	No	Unique	Tài khoản đăng nhập',
  `Mat_khau` varchar(32) NOT NULL COMMENT 'Mật khẩu',
  `Dia_chi` varchar(200) NOT NULL COMMENT 'Địa chỉ',
  `Dien_thoai` varchar(30) NOT NULL COMMENT 'Điện thoại',
  `Email` varchar(50) NOT NULL COMMENT 'Hộp thư điện tử',
  `Ngay_sinh` date NOT NULL COMMENT 'Ngày sinh',
  `Ngay_cap_nhat` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày cập nhật vào hệ thống',
  `Gioi_tinh` tinyint(4) NOT NULL COMMENT 'Giới tính:\r\n1 – Nam\r\n0 – Nữ \r\n',
  `Trang_thai` tinyint(4) DEFAULT 1 COMMENT 'Trạng thái: \r\n1- Đang hoạt động\r\n0- Đang bị khóa\r\n',
  `hinh_anh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`MaKH`, `Ho_ten`, `Tai_khoan`, `Mat_khau`, `Dia_chi`, `Dien_thoai`, `Email`, `Ngay_sinh`, `Ngay_cap_nhat`, `Gioi_tinh`, `Trang_thai`, `hinh_anh`) VALUES
(6, 'Trần Đức Mạnh', 'admin', '12345', 'Nhà số 65 ngõ 898 đường Láng, Đống Đa, Hà Nội', '0815630776', 'manhtran20tr@gmail.com', '2020-06-01', '2020-06-06 00:59:51', 1, 1, 'img4.jpg'),
(7, 'Trần Ngọc Anh', 'demo', '12345', 'Nhà 126 ngõ 296 Minh Khai, HBT, Hà Nội', '0815630776', 'manhtran20tr@gmail.com', '2020-06-01', '2020-06-06 18:33:43', 0, 1, 'img5.jpg'),
(8, 'Trần Đức Mạnh', 'ad', '12345', 'nhà 126 ngõ 296 Minh Khai', '-47', 'manhtran20tr@gmail.com', '2020-06-11', '2020-06-11 11:40:08', 0, 1, 'img6.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nxb`
--

CREATE TABLE `nxb` (
  `MaNXB` int(11) NOT NULL COMMENT 'Mã NXB',
  `Ten_NXB` varchar(50) NOT NULL COMMENT 'Tên NXB',
  `Trang_thai` tinyint(4) DEFAULT 1 COMMENT 'Trạng thái: \r\n1- Đang hiển thị\r\n0- Đang ẩn\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nxb`
--

INSERT INTO `nxb` (`MaNXB`, `Ten_NXB`, `Trang_thai`) VALUES
(1, 'Kim Đồng', 1),
(7, 'NXB Trẻ', 1),
(8, 'Phụ nữ', 1),
(9, 'Phương Đông', 1),
(10, 'Trí Việt', 1),
(11, 'Minh Tâm', 1),
(12, 'Nhân văn', 1),
(13, 'Giáo dục', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_tri`
--

CREATE TABLE `quan_tri` (
  `Tai_khoan` varchar(50) NOT NULL COMMENT 'Tài khoản đăng nhập của quản trị',
  `Mat_khau` varchar(32) NOT NULL COMMENT 'Mật khẩu đăng nhập của quản trị.',
  `Trang_thai` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Trạng thái: \r\n1- Đang hoạt động\r\n0- Đang bị khóa\r\n',
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quan_tri`
--

INSERT INTO `quan_tri` (`Tai_khoan`, `Mat_khau`, `Trang_thai`, `id`) VALUES
('admin', '1', 1, 1),
('qtv1', '12345', 1, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `MaSP` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `Ten_sp` varchar(200) NOT NULL COMMENT 'Tên sản phẩm',
  `Mo_ta` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'Mô tả ngắn gọn',
  `Gia_nhap` float NOT NULL DEFAULT 0 COMMENT 'Giá nhập',
  `Gia` float NOT NULL DEFAULT 10000 COMMENT 'Giá',
  `Luot_xem` int(11) NOT NULL DEFAULT 0 COMMENT 'Lượt xem',
  `Ngay_cap_nhat` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày cập nhật vào hệ thống',
  `So_luong` int(255) NOT NULL DEFAULT 1,
  `MaTG` int(11) DEFAULT NULL,
  `MaCD` int(11) DEFAULT NULL,
  `MaNXB` int(11) DEFAULT NULL,
  `Anh_sp` varchar(200) NOT NULL,
  `Giam_gia` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`MaSP`, `Ten_sp`, `Mo_ta`, `Gia_nhap`, `Gia`, `Luot_xem`, `Ngay_cap_nhat`, `So_luong`, `MaTG`, `MaCD`, `MaNXB`, `Anh_sp`, `Giam_gia`) VALUES
(37, 'Sự giàu và nghèo của các dân tộc ', 'Trên thế giới có khoảng 200 quốc gia và vùng lãnh thổ. Tuy nhiên, chỉ có khoảng chưa đến 20% là các quốc gia phát triển. Theo báo cáo của Oxfam (2018), 26 người giàu nhất thế giới sở hữu khối tài sản bằng với tài sản của 3,8 tỷ người thuộc nhóm nghèo nhất. Người giàu ngày càng giàu lên, trong khi người nghèo lại càng nghèo thêm. Vậy tại sao khoảng cách giàu nghèo lại lớn như vậy? Đây chính là câu hỏi mà David S.Landes tìm cách giải đáp trong cuốn sách Sự Giàu Và Nghèo Của Các Dân Tộc (The Wealth and the poverty of Nations).\r\nLà một công trình đồ sộ, quyển sách chứa đựng những thông tin phong phú với lập luận sắc bén. Landes cho rằng chìa khóa của sự thịnh vượng của các quốc gia trong thời hiện đại chính là Cuộc cách mạng công nghiệp. Nếu muốn trở nên thịnh vượng, các quốc gia phải tiến hành công nghiệp hóa. Đi sâu hơn, ông lý giải nền tảng cho quá trình thực hiện Cách mạng công nghiệp ở các quốc gia. Thách thức những quan điểm cũ, ông cho rằng tài nguyên thiên nhiên (gồm cả cảnh quan, nguồn nước, đất đai, khoáng chất, khí hậu) quan trọng nhưng không đủ, vị trí địa lý cũng không phải là định mệnh. Điều quan trọng nhất để làm nên cuộc Cách mạng công nghiệp ở từng quốc gia luôn phụ thuộc vào nền văn hóa là nền tảng cho xã hội và những giá trị được bảo tồn trong xã hội đó. Sự thịnh vượng mà thiếu đi những đặc điểm văn hóa phù hợp, chưa bao giờ ổn định và bền vững.\r\n\r\nNước Anh, cũng như các quốc gia thực hiện thành công Cách mạng công nghiệp và trở nên thịnh vượng, họ có một xã hội gắn kết, có năng lực cạnh tranh, sự tôn trọng, mong muốn truyền đạt kiến thức thực nghiệm và kỹ thuật, những con người trong xã hội vươn lên nhờ công trạng và năng lực. Họ không những biết làm ra của cải mà còn biết cách sử dụng của cải. Sự trung thực được tôn trọng, các thiết chế được viết ra để đảm bảo an toàn cho tài sản và việc hưởng thụ thành quả lao động. Họ được giáo dục để từ bỏ nhu cầu trước mắt để hướng đến những giá trị lâu dài và bền vững. Những điều này khó có thể tìm thấy ở các xã hội còn lại, những xã hội còn đang chật vật trong quá trình công nghiệp hóa. \r\n\r\n+NHẬN XÉT CHUYÊN GIA:\r\n\r\n“David Landes đã viết nên một công trình khảo sát bậc thầy về những thành công lớn và thất bại lớn trong các nền kinh tế ghi vào lịch sử của thế giới. [...] Bất kỳ ai nghĩ rằng thành công kinh tế của một xã hội tách biệt với những đòi hỏi về đạo đức và văn hóa của xã hội ấy hẳn nhiên sẽ phải suy nghĩ lại.” – Robert Solow\r\n“Công trình nghiên cứu lịch sử mới của David Landes về sự nổi lên của phân chia giàu và nghèo hiện nay giữa các quốc gia trên thế giới là một bức tranh có tầm', 0, 319200, 114, '2020-06-05 21:54:16', 1, 1, 1, 1, 'demo2.png', 0),
(38, 'Rèn con kỹ năng sống - Dành Cho Trẻ 4 Đến 9 Tuổi', 'Chắc chắn trên đời này, không có ông bố bà mẹ nào lại không mong muốn con mình được trưởng thành toàn diện. Nhưng trên thực tế, có rất nhiều học sinh cấp Hai ghét đến trường và không thích học; rất nhiều người lớn chọn cách nghỉ việc mỗi khi bị ai đó nói điều gì khiến họ không thích. Tại sao những người đó lại lớn lên như vậy?\r\n\r\nHoặc giả sử những con người này tốt nghiệp các trường đại học danh tiếng nhưng lại không tự kiếm được việc, không lo được miếng cơm manh áo nuôi sống bản thân mình há chẳng phải là điều đáng lo ngại hay sao? Chúng ta thấy thật khó chấp nhận với những con người chỉ biết sống thu mình trong phòng, không có bạn bè, không có ai yêu thương ngoại trừ những bức ảnh thần tượng mang kè kè theo bên mình. \r\n\r\nTuy nhiên, chúng ta không thể mãi mãi sống trong sự bao bọc của cha mẹ bởi đến lúc nào đó, cha mẹ ta sẽ rời bỏ ta sang thế giới bên kia. Chính vì lẽ đó, các bậc cha mẹ cần phải dạy dỗ làm sao cho trẻ có được những kỹ năng sống, để chúng có thể trưởng thành vững vàng kể cả khi không có cha mẹ ở bên.\r\n\r\nBởi vậy, việc rèn luyện các kỹ năng sống cho trẻ, nuôi dạy trẻ thành những người lớn biết ăn cơm = những người biết tự lập và tự hành động, hình thành nên những người lớn quyến rũ = người lớn có sức thu hút… là điều vô cùng quan trọng.Và từ 4 đến 9 tuổi là giai đoạn hình thành những kỹ năng sinh sống cơ bản đó. \r\n\r\n \r\n\r\nMục lục:\r\n\r\nLời nói đầu\r\n\r\nChương mở đầu: Lời nói dù tích cực ha tiêu cực đều là phương tiện để “truyền tải”t hông điệp và “đọng lại” trong tâm trí người nghe\r\n\r\nChương 1: Thế nào là “những đứa trẻ trưởng thành mà không cần tới sự hiện diện của bố mẹ”?\r\n\r\nChương 2: Những kỹ năng sống cơ bản sẽ được hình thành trong giai đoạn từ 4 đến 9 tuổi\r\n\r\nChương 3: Cách tăng khả năng học tập và trí tuệ cho trẻ có thể áp dụng ngay trong gia đình\r\n\r\nChương 4: Với những tình huống như thế này ta cần phải làm thế nào? Phương án giải quyết?\r\n\r\nCon trẻ luôn luôn yêu quý bạn bè của chúng bất kể khi nào\r\n\r\nLời bạt\r\n\r\nQủa hồng\r\n\r\nTrích đoạn sách:\r\n\r\nSự quan tâm đến người khác và trái tim mạnh mẽ làm nên sự trưởng thành của cậu bé mang chiếc áo in số 1\r\n\r\nDưới đây là những lời tôi vẫn hằng ngày truyền đạt tới học sinh trong lớp cũng như trong các buổi hoạt động ngoài trời:\r\n\r\n• Biết nghĩ đến cảm xúc của người khác.\r\n\r\n• Điều quan trọng không phải kết quả mà chính là ở việc tiếp tục thử thách bản thân.\r\n\r\n• Không đổ lỗi cho người khác, hãy tự thay đổi bản thân (định hướng ý thức và tư duy).\r\n\r\n• Dù tốt hay xấu, lời nói đều là phương tiện để “truyền tải” thông điệp và “đọng lại” trong tâm trí người nghe.\r\n\r\nCó một cậu bé B học lớp tôi suốt từ lớp Một đến khi chuẩn bị tốt nghiệp tiểu học. Trong suốt sáu năm này, tôi cũng luôn nhắc đi nhắc lại bốn điều trên với cậu và các bạn. Đến ngày tốt nghiệp, tôi được mẹ cậu kể cho nghe một câu chuyện.\r\n\r\nCậu bé B chuẩn bị tốt nghiệp tiểu học đã tập bóng chày từ năm lớp Ba. Cậu bé rất yêu thích môn thể thao này và mục tiêu là đạt vị trí Ace pitcher (cầu thủ ném bóng xuất sắc nhất đội, thường là người ném bóng mở màn cho đội đó). Đối thủ nặng ký của B chính là cậu C, con trai của huấn luyện viên. Hai cậu ngang sức ngang tài nhưng xét về môi trường tập luyện thì cậu C có lợi thế hơn. Có lẽ cậu B cũng hiểu điều này nên ngày qua ngày, cậu luyện tập không ngừng nghỉ. Cậu chăm chỉ và hăng hái đến nỗi chẳng ngó ngàng gì đến kỳ thi vào cấp Hai.\r\n\r\nĐến năm lớp Năm, trong một buổi tập cho ngày thi đấu, cậu bé B với rất nhiều nỗ lực đã lần đầu tiên được chọn làm vị trí Ace pitcher. Sau bao ngày ước ao cuối cùng thì con số 10 sau lưng cậu cũng đã được chuyển thành con số 1 - con số của cầu thủ ném bóng thiện nghệ nhất đội. Sự việc xảy ra đúng vào ngày thi đấu. Sau khi tập xong, cậu bé B mặc vào người bộ đồ thi đấu. Nhìn vào tấm gương lớn trong phòng chờ, cậu bé há hốc mồm kinh ngạc khi phát hiện ra con số 1 đầy tự hào sau lưng áo của cậu đã bị khâu ngược. Và B cũng biết rằng, hằng đêm, bà mẹ vụng về chuyện khâu vá của mình đã phải vật lộn như thế nào để khâu được con số 1 lên chiếc áo đó.\r\n\r\nVậy cậu bé B đã làm gì? Cậu có nổi đóa lên rằng “Mẹ ơi mẹ khâu sai áo của con rồi” không? Hay là cậu bé sẽ xấu hổ vì số trên lưng áo bị khâu ngược và không tham gia cuộc thi đấu nữa?\r\n\r\nThưa không. Cậu bé B vẫn tiếp tục mặc chiếc áo đó. Hơn thế nữa, mặc dù thực ra cậu đánh bóng bằng tay phải rất giỏi, nhưng hôm đó, cả ba lượt đánh bóng cậu hoàn toàn sử dụng tay trái. Cậu làm điều này là để mẹ ngồi trên khán đài trái không nhìn thấy được lưng áo của cậu.\r\n\r\nKết quả là ba lần cậu đánh trượt các cú strike. Xét về tổng thể trận đấu, do cậu bé B có những cú ném bóng rất tốt nên đội của cậu vẫn thắng 1-0. Trong buổi rút kinh nghiệm sau trận đấu, mọi người trong đội và đặc biệt là cậu bé C - con của huấn luyện viên, đối thủ cạnh tranh của cậu - đã lớn tiếng chỉ trích về việc cậu bé B đánh bóng bằng tay trái. Toàn đội biết rõ cậu đánh bóng bằng tay phải rất cừ nên nếu không có một sự biện minh phù hợp trong trường hợp này, cậu khó lòng giữ được vị trí Ace pitcher.\r\n\r\n… Cậu bé B đã chọn cách không giải thích lý do và chấp nhận thôi giữ vị trí Ace pitcher. Và B nhanh chóng cởi chiếc áo thi đấu để không ai kịp nhận ra con số bị khâu ngược sau lưng áo cậu.\r\n\r\nBạn có thắc mắc: Tại sao cậu bé B lại làm như thế không? Bạn có nghĩ: Cậu bé B cứ đánh bóng bằng tay phải có phải tốt hơn không hay chỉ cần nói tại mẹ em khâu số sau lưng áo bị ngược nên em rất xấu hổ thì đã sao không?\r\n\r\nKhi tôi nghe câu chuyện này từ mẹ cậu B, tôi đã rất vui mừng vì có lẽ từ khi gặp và biết B, cậu bé vẫn luôn đón nhận tất cả những lời tôi nói với cậu ấy. Cậu bé đã rất hiểu việc mẹ mình vụng khâu vá nên ý tứ không cho ai biết việc số áo thi đấu bị ngược; cậu biết nghĩ cho bạn bè nên đã không hề phân bua một lời mà lẳng lặng từ chối vị trí Ace pitcher. Hơn ai hết, cậu là người hiểu nhất nỗi cay cú của đối thủ cạnh tranh là cậu bé C. Tuy không nổi bật về mặt hình thể trong phòng chờ thi đấu nhưng cậu lại là cậu bé trưởng thành nhờ “quan tâm đến người khác” và có “trái tim mạnh mẽ”.\r\n\r\nSau khi rời khỏi vị trí Ace pitcher, B vẫn lặng lẽ say mê luyện tập. Cậu luyện tập không phải vì cậu bị nhấc khỏi vị trí Ace pitcher mà vì cậu thấy mình cần phải luyện tập để hoàn thiện bản thân – người chưa mang đến kết quả hoàn hảo cho trận đấu do đánh bóng bằng tay trái không thuận.\r\n\r\nThế rồi, trước giải đấu tiếp theo, cậu bé B lại xuất hiện với chiếc áo thêu số 1 – vị trí Ace pitcher.\r\n\r\nKhông những thế, phía trên con số 1 còn có thêm một phù hiệu Đội trưởng nữa.\r\nKể từ đó, câu không phải nhường chiếc áo số 1 của vị trí Ace pitcher cho bất cứ ai đến tận khi ra trường và luôn ghi được thành tích cho đội. Khi học lên trung học phổ thông, và cho đến giờ, cậu bé vẫn luôn mặc chiếc áo thi đấu với con số 1 sau lưng và đang miệt mài luyện tập để vào đội tuyển Koshien.', 0, 77000, 104, '2020-06-05 21:55:19', 1, 1, 1, 1, 'demo3.png', 0),
(39, 'Dự án phượng hoàng', 'Câu chuyện về DevOps và chìa khóa thành công cho mọi doanh nghiệp công nghệ\r\n\r\nBill là một quản lý CNTT tại Parts Unlimited. Đó là sáng thứ Ba và trên đường đến văn phòng, Bill nhận được cuộc gọi từ CEO.\r\nDự án Phượng hoàng, sáng kiến CNTT mới rất quan trọng đối với tương lai của Parts Unlimited, nhưng lại vượt quá ngân sách và triển khai quá chậm. Vị CEO muốn Bill báo cáo trực tiếp với anh ta và sửa chữa mớ hỗn độn trong 90 ngày, nếu không, toàn bộ bộ phận của Bill sẽ được thuê ngoài. Với sự giúp đỡ của một thành viên hội đồng tương lai và triết lý bí ẩn về Ba Phương pháp, Bill bắt đầu thấy công việc CNTT có nhiều điểm tương đồng với công việc của nhà máy sản xuất hơn anh tưởng tượng. Với khoảng thời gian hạn hẹp, Bill phải tổ chức luồng công việc hợp lý và phục vụ hiệu quả các chức năng kinh doanh khác tại công ty. Với tiết tấu nhanh cùng lối kể chuyện thú vị, ba ngôi sao sáng của phong trào DevOps mang đến một câu chuyện mà bất cứ ai làm việc trong lĩnh vực CNTT cũng sẽ nhận ra. Người đọc sẽ không chỉ học cách cải thiện công việc CNTT của tổ chức mà còn có cái nhìn hoàn toàn khác về bộ phận này.\r\n\r\n- Các tác giả đã khéo léo lồng ghép các khái niệm về DevOps vào trong câu chuyện thú vị và gay cấn về Dự án Phượng hoàng, một sản phẩm đến từ bộ phận CNTT của Parts Unlimited. Câu chuyện đưa người đọc qua nhiều cung bậc cảm xúc của những người làm CNTT – một ngành tưởng như khô khan và chỉ liên quan đến các con số. Thông qua hành trình của Bill và Dự án Phượng hoàng, độc giả sẽ có thêm nhiều kiến thức bổ ích về ngành CNTT, đặc biệt là mối quan hệ mật thiết giữa CNTT với sự vận hành và phát triển của bất cứ tổ chức nào trong thời đại ngày nay.\r\n\r\n- Cuốn sách chỉ ra thực trạng khó khăn mà hầu hết các công ty có bộ phận CNTT đều mắc phải, đó là hoạt động CNTT không gắn liền với vận hành và phát triển doanh nghiệp. Câu chuyện của anh chàng Bill và Dự án Phượng hoàng sẽ cho độc giả có cái nhìn toàn diện và sâu xa hơn về vai trò và vị trí của bộ phận CNTT đối với bất kỳ hoạt động nào của doanh nghiệp.\r\n\r\n- Cuốn sách có kết cấu độc đáo, mở đầu bằng một câu chuyện ly kỳ, cuốn hút về công nghệ, kết thúc bằng một cuốn sổ tay cung cấp kiến thức về DevOps.\r\n\r\n- Cuốn sổ tay DevOps được đặt ngay sau phần kể chuyện, giống như một tổng kết kiến thức ngắn gọn được rút ra từ câu chuyện Dự án Phượng hoàng. Các tác giả đã đưa ra nhiều khái niệm hữu ích về quản lý, vận hành hoạt động công nghệ trong các tổ chức hiện đại. Đây là những kiến thức không thể thiếu đối với bất kỳ doanh nghiệp nào muốn bứt phá trong thời đại kỹ thuật số.\r\n\r\n- \"Cuốn sách hấp dẫn này nắm bắt những vấn đề nan giải mà nhiều công ty phụ thuộc vào CNTT phải đối mặt và đưa ra các giải pháp trong thế giới thực. Deming từng nói: \'Bạn không bắt buộc phải thay đổi để sống sót”. Dự án Phượng hoàng sẽ có ảnh hưởng sâu sắc đến CNTT, giống như cuốn sách Mục tiêu của Tiến sĩ Goldratt dành cho sản xuất.\"\r\n\r\n+TÁC GIẢ:\r\n\r\nGene Kim là người sáng lập, Giám đốc Công nghệ của Tripwire suốt 13 năm, nơi ông nghiên cứu về các tổ chức CNTT hiệu suất cao.\r\nKevin Behr là người sáng lập Viện Quy trình Công nghệ Thông tin (ITPI) và chiến lược gia cho Hội đồng Tư vấn Thực hành tại Assemblage Pointe, nơi chuyên tư vấn và huấn luyện các tổ chức CNTT.\r\nGeorge Spafford là Giám đốc nghiên cứu của Gartner, tác giả và diễn giả nổi tiếng, từng tư vấn và đào tạo về chiến lược, quản lý CNTT, bảo mật thông tin và cải thiện dịch vụ tổng thể ở Hoa Kỳ, Canada, Úc, New Zealand và Trung Quốc.\r\n\r\nGỢI Ý CHO BẠN\r\n22%\r\n90% Trẻ Thông Minh Nhờ Cách Trò Chuyện Đúng Đắn Của Cha Mẹ (Tái Bản 2019)\r\n90% Trẻ Thông Minh Nhờ Cách Trò Chuyện Đúng Đắn Của Cha Mẹ (Tái Bản 2019)\r\n30.615đ\r\n\r\n39.000đ\r\n(5)\r\n30%\r\nCách Khen, Cách Mắng, Cách Phạt Con (Tái Bản 2018)\r\nCách Khen, Cách Mắng, Cách Phạt Con (Tái Bản 2018)\r\n41.300đ\r\n\r\n59.000đ\r\n(3)\r\n', 0, 183200, 116, '2020-06-05 21:55:19', 1, 1, 1, 1, 'demo4.png', 0),
(40, 'Biến bất kỳ ai thành khách hàng', 'Nếu mục tiêu của bạn là tăng số lượng khách hàng thì Biến bất kỳ ai thành khách hàng chính là cuốn sách dành cho bạn. Tập trung hướng vào hàng loạt thủ thuật, công cụ và chiến lược dễ sử dụng, phù hợp với mọi hình thức kinh doanh dịch vụ chuyên nghiệp, cuốn sách hữu ích này mang đến cho bạn một chương trình 28 ngày duy nhất đã được kiểm nghiệm để khoanh vùng, định vị, thu hút và giữ chân khách hàng mới với số lượng lớn hơn rất nhiều những gì bạn từng mong ước!\r\n\r\nBạn sẽ biết cách:\r\n\r\n-  Lựa chọn chiến thuật marketing phù hợp với hoàn cảnh và tính cách\r\n- Xác định những sai sót trong hoạt động marketing và cách khắc phục\r\n- Sử dụng các chiến thuật marketing qua Internet - mạng xã hội trực tuyến\r\n- Thay thế những phương pháp marketing rời rạc, thiếu hiệu quả bằng các chiến lược marketing mới thông qua các mối quan hệ mang lại hiệu quả cao.\r\n\r\nTập trung vào những kỹ thuật tuyệt vời giúp bạn vượt qua nỗi sợ hãi, sức ỳ tâm lý, sự trì hoãn đang cản trở bạn hành động hiệu quả, Biến Bất Kỳ Ai Thành Khách Hàng sẽ giúp lượng khách hàng của bạn tăng theo cấp số nhân và lợi nhuận tăng vọt!', 0, 111200, 53, '2020-06-05 21:57:35', 1, 1, 1, 1, 'demo5.png', 0),
(41, 'Quy luật của tấm gương', '“Hiện thực của cuộc đời chúng ta chính là tấm gương phản chiếu tâm hồn ta”.\r\n\r\nQuy luật của tấm gương là một cuốn sách dựa trên một câu chuyện có thật, đầy cảm động của bà mẹ Eiko 41 tuổi đã vượt qua những khó khăn trong mối quan hệ với các thành viên trong gia đình, từ đó mở được nút thắt trong việc bày tỏ lòng tin, sự biết ơn và tình yêu để tìm được hạnh phúc cho bản thân và mọi người.\r\n\r\nTừ câu chuyện của Eiko tác giả muốn gửi gắm tới độc giả một thông điệp rằng “Cuộc đời chính là tấm gương phản chiếu tâm hồn của mỗi người. Hay nói cách khác, mỗi sự việc xảy ra trong cuộc sống của mỗi người đều đồng điệu với suy nghĩ trong tâm hồn họ”. Chính vì cuộc đời phản chiếu suy nghĩ trong tâm hồn, nên mỗi người khi gặp một vấn đề nào đó cần nhìn nhận lại chính bản thân mình, thay đổi bản thân để có thể thay đổi hoàn cảnh.\r\n\r\nCuốn sách còn chỉ ra những sai lầm trong phương pháp nuôi dạy con của các bậc cha mẹ bảo hộ, kiểm soát quá mức, đồng thời gợi ý cách thức vạch ra đường biên giữa cha mẹ và con trẻ.\r\n\r\nQuy luật của tấm gương là một cuốn sổ tay gia đình ấm áp, tràn đầy tình yêu thương. Cuốn sách giống như một lời an ủi động viên, cứu rỗi những tâm hồn bị tổn thương trở nên lạc quan hơn, giúp họ tìm cách giải quyết mọi vấn đề để xây dựng cuộc sống hạnh phúc hơn.\r\n\r\n“Một cuốn sách ngắn nhưng có thể làm thay đổi cuộc đời bạn!”\r\n\r\nGIỚI THIỆU TÁC GIẢ\r\n\r\nYoshinori Noguchi là một tác giả và chuyên gia tư vấn nổi tiếng về hạnh phúc cá nhân và các mối quan hệ gia đình.\r\n\r\nNăm 2003, ông bắt đầu hoạt động với tư cách là một huấn luyện viên chuyên nghiệp, trở thành một huấn luyện viên hàng đầu sử dụng các thủ pháp tâm lý học.\r\n\r\nNhững tác phẩm chính của ông gồm Quy luật của tấm gương, Cách sống để có thể nghĩ từng tận trong tim rằng: Thế này là được, Ba sự thật, Sức mạnh của tâm nhãn, Cuộc đời tỏa sáng bằng phép trừ, Những lời nói của mẹ đã nâng đỡ tôi, Ghi chú EQ để nâng cao hạnh phúc và thành công hằng ngày.', 0, 47200, 46, '2020-06-06 18:24:32', 1, 1, 1, 1, 'demo6.jpg', 0),
(42, 'GASH - Cậu Bé Vàng - Tập 1', 'Vì sở hữu bộ óc quá thông minh, nên cậu học sinh cấp 2 Takamine Kiyomaro không thể hòa nhập với chúng bạn trong lớp. Lâu dần cậu cũng không buồn xuất hiện ở trường.\r\n\r\nChính vào lúc ấy, cha của Kiyomaro đã gửi đến cho cậu một món quà sinh nhật đặc biệt, đó là một “Cuốn sách đỏ” viết đầy những câu thần chú bí ẩn, kèm với nó là một cậu bé cũng bí ẩn không kém: GASH!\r\n\r\nGash đã đặt mục tiêu “liều chết để chỉnh đốn Kiyomaro” và bắt đầu lập kế hoạch thay đổi trái tim của cậu!!\r\n\r\nSau một thời gian đồng hành bên nhau, cả hai dần khám phá ra những bí ẩn xoay quanh Gash - Nhân vật mang đến sự thay đổi khủng khiếp cho cuộc đời Kiyomaro…!!\r\n\r\nSau thời gian dài chuẩn bị, NXB Kim Đồng xin trân trọng gửi đến các bạn độc giả GASH - CẬU BÉ VÀNG!! - Manga đặc sắc đạt giải thưởng Manga Shogakukan lần thứ 48.\r\n\r\nSách được xuất bản trọn bộ 16 tập dưới dạng khổ lớn, dày 388 trang kèm tranh màu chỉ có ở phiên bản Việt.\r\n\r\nMời các bạn cùng tìm đọc và chia sẻ!!', 0, 32400, 56, '2020-06-10 19:58:38', 20, 2, 1, 1, 'gas1.jpg', 0),
(43, 'GASH - Cậu Bé Vàng - Tập 2', 'Vì sở hữu bộ óc quá thông minh, nên cậu học sinh cấp 2 Takamine Kiyomaro không thể hòa nhập với chúng bạn trong lớp. Lâu dần cậu cũng không buồn xuất hiện ở trường.\r\n\r\nChính vào lúc ấy, cha của Kiyomaro đã gửi đến cho cậu một món quà sinh nhật đặc biệt, đó là một “Cuốn sách đỏ” viết đầy những câu thần chú bí ẩn, kèm với nó là một cậu bé cũng bí ẩn không kém: GASH!\r\n\r\nGash đã đặt mục tiêu “liều chết để chỉnh đốn Kiyomaro” và bắt đầu lập kế hoạch thay đổi trái tim của cậu!!\r\n\r\nSau một thời gian đồng hành bên nhau, cả hai dần khám phá ra những bí ẩn xoay quanh Gash - Nhân vật mang đến sự thay đổi khủng khiếp cho cuộc đời Kiyomaro…!!\r\n\r\nSau thời gian dài chuẩn bị, NXB Kim Đồng xin trân trọng gửi đến các bạn độc giả GASH - CẬU BÉ VÀNG!! - Manga đặc sắc đạt giải thưởng Manga Shogakukan lần thứ 48.\r\n\r\nSách được xuất bản trọn bộ 16 tập dưới dạng khổ lớn, dày 388 trang kèm tranh màu chỉ có ở phiên bản Việt.\r\n\r\nMời các bạn cùng tìm đọc và chia sẻ!!', 0, 32400, 41, '2020-06-10 20:01:24', 20, 2, 1, 1, 'gas2.jpg', 0),
(46, 'Gash - Cậu Bé Vàng - Tập 5', 'Trận chiến khốc liệt giữa các quái vật đã đi được phân nửa chặng đường. Trong số 40 quái vật còn sót lại, để tiến về phía trước, Kiyomaro và Gash đã chuẩn bị tinh thần đối đầu với những kẻ địch hùng mạnh hơn! Nghe được tin đồn về họ, quái vật Barry đã cất công đến Nhật Bản. Trước sức mạnh áp đảo của đối thủ, Kiyomaro và Gash bắt buộc phải mạnh lên sau những trận khổ chiến. Để gần hơn với mục tiêu trở thành “Vị vua nhân từ”, cả hai đã hứa với nhau sẽ cùng vượt qua mọi thử thách, thế nhưng…!? “Ý nghĩa chiến đấu” mà mỗi quái vật rút ra trên chặng đường trở thành tân vương là gì!? Chỉ biết rằng, những cuộc đụng độ mới chắc chắn sẽ giúp Gash trưởng thành hơn.\r\n\r\nMAKOTO RAIKU\r\n\r\nQuê ở tỉnh Gifu. Năm 1991 ra mắt tác phẩm đầu tiên mang tên BIRD MAN. Sau đó ghi dấu ấn mạnh mẽ với GASH - CẬU BÉ VÀNG!! Trên tuần san Shonen Sunday (NXB Shogakukan) từ năm 2001, và đây cũng là tác phẩm đạt giải Manga Shogakukan lần thứ 48. Năm 2003, GASH - CẬU BÉ VÀNG!! đã được chuyển thể thành TV Anime. Từ năm 2009 ~ 2013, ông sáng tác series VƯƠNG QUỐC LOÀI VẬT trên một tạp chí Shonen khác. Tác phẩm này cũng được nhận giải thưởng Manga Kodansha.', 0, 32400, 51, '2020-06-10 20:10:53', 20, 2, 1, 1, 'gas5.jpg', 0),
(47, 'Gash - Cậu Bé Vàng - Tập 6', 'Vì mục tiêu “Vị vua nhân từ”, Gash và Kiyomaro đang nỗ lực để ngày một trưởng thành hơn! Tuy nhiên phía sau cuộc chiến đó, có một âm mưu đang dần lộ rõ!\r\n\r\nTrên trái đất tồn tại những phiến đá phong ấn quái vật của trận chiến tranh đoạt ngai vị từ 1000 năm\r\n\r\ntrước. Và kẻ giải trừ phong ấn cho các quái vật đang mắc kẹt ấy là một quái vật bí ẩn có tên Lord. Lord đang thao túng các quái vật từ 1000 năm trước và chủ nhân của chúng với mục đích tiêu diệt toàn bộ đối thủ xung quanh. Kiyomaro và Gash nhất mực chống lại việc đó, thế nhưng…!?\r\n\r\nCả hai đã cùng những người bạn sát cánh bên nhau chống trả từng đợt tấn công dồn dập của chúng!\r\n\r\nHiện trận chiến của Gash và Kiyomaro đã bước lên một tầm cao mới!!\r\n\r\n ---------------------\r\n\r\nMAKOTO RAIKU\r\n\r\nQuê ở tỉnh Gifu.\r\n\r\nNăm 1991 ra mắt tác phẩm đầu tiên mang tên BIRD MAN.\r\n\r\nSau đó ghi dấu ấn mạnh mẽ với GASH - CẬU BÉ VÀNG!! trên tuần san Shonen Sunday (NXB\r\n\r\nShogakukan) từ năm 2001, và đây cũng là tác phẩm đạt giải Manga Shogakukan lần thứ 48.\r\n\r\nNăm 2003, GASH - CẬU BÉ VÀNG!! đã được chuyển thể thành TV Anime.\r\n\r\nTừ năm 2009 ~ 2013, ông sáng tác series VƯƠNG QUỐC LOÀI VẬT trên một tạp chí Shonen khác. Tác phẩm này cũng được nhận giải thưởng Manga Kodansha.', 0, 32400, 54, '2020-06-10 20:25:09', 20, 2, 1, 1, 'gas6.jpg', 0),
(48, 'Gash - Cậu Bé Vàng - Tập 7', 'Nhằm giải thoát cho các quái vật ngàn năm đang bị điều khiển, cả hội đã tiến vào lâu đài của kẻ chủ mưu - Zophise! Trận chiến giữa hội Gash VS. Các quái vật đang lâm vào tình thế vô cùng căng thẳng!! Liên tục phải đối đầu với các quái vật lũ lượt kéo tới, Gash và nhóm bạn đã bắt đầu mệt mỏi. Chính vào lúc đó, cô bé quái vật Laila đã bất ngờ ra tay cứu hội của Gash thoát khỏi nguy hiểm…!?\r\n\r\nChủ ngựa Umagon luôn luôn hừng hực quyết tâm chiến đấu nay đã có thể sánh vai tương trợ các đồng đội! Cùng với đó, Wonlei và Kid cũng đến góp mặt vào cuộc chiến, tất cả tạo nên một bức tranh siêu dữ dội và khốc liệt!!\r\n\r\nMAKOTO RAIKU\r\n\r\nQuê ở tỉnh Gifu.\r\n\r\nNăm 1991 ra mắt tác phẩm đầu tiên mang tên BIRD MAN. Sau đó ghi dấu ấn mạnh mẽ với GASH – CẬU BÉ VÀNG!! trên tuần san Shonen Sunday (NXB Shogakukan) từ năm 2001, và đây cũng là tác phẩm đạt giải Manga Shogakukan lần thứ 48. Năm 2003, GASH – CẬU BÉ VÀNG!! đã được chuyển thể thành TV Anime.\r\n\r\nTừ năm 2009 - 2013, ông sáng tắc series VƯƠNG QUỐC LOÀI VẬT trên một tạp chí Shonen khác. Tác phẩm này cũng được nhận giải thưởng Manga Kodansha.', 0, 32400, 22, '2020-06-10 20:25:09', 1, 2, 1, 1, 'gas7.jpg', 0),
(49, 'Con Chó Nhỏ Mang Giỏ Hoa Hồng (Bìa Mềm)', 'Con Chó Nhỏ Mang Giỏ Hoa Hồng\r\n\r\nTOP 100 BEST SELLER - “Con chó nhỏ mang giỏ hoa hồng” là tác phẩm mới nhất của nhà văn chuyên viết cho thanh thiếu niên Nguyễn Nhật Ánh, nối tiếp sau Bẩy bước tới mùa hè, Tôi thấy hoa vàng trên cỏ xanh… gây sóng gió thị trường sách năm 2015.\r\n\r\n5 chương sách với 86 câu chuyện cực kỳ thú vị và hài hước về 5 con chó 5 loài 5 tính cách trong 1 gia đình có 3 người đều yêu chúng nhưng theo từng cách riêng của mình. Các câu chuyện về tình bạn giữa chúng với nhau, giữa chúng với chị Ni, ba mẹ, khách đến nhà… thực sự mang lại một thế giới trong trẻo, những đoạn đời dễ thương quyến rũ tuổi mới lớn.\r\n\r\nMột quyển sách lôi cuốn viết cho tất cả chúng ta: trẻ con và người lớn. Cuộc đời của 5 con chó nhỏ: Haili, Batô, Suku, Êmê và Pig được tái hiện như đời sống của mỗi con người: tình bạn, tình yêu, đam mê, lòng dũng cảm, sự sợ hãi, và những ước mơ...', 0, 63900, 10, '2020-06-20 08:34:55', 1, 1, 1, 1, 'nhatanh1.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tac_gia`
--

CREATE TABLE `tac_gia` (
  `MaTG` int(11) NOT NULL COMMENT 'Mã tác giả',
  `Ten_tac_gia` varchar(50) NOT NULL COMMENT 'Tên tác giả',
  `Trang_thai` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Trạng thái: \r\n1- Đang hiển thị\r\n0- Đang ẩn\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tac_gia`
--

INSERT INTO `tac_gia` (`MaTG`, `Ten_tac_gia`, `Trang_thai`) VALUES
(1, 'Fujco', 1),
(2, 'Makoto Raiku', 1),
(7, 'Nguyễn Nhật Ánh', 1),
(8, 'Tô Hoài', 1),
(9, 'Hồ Biểu Chánh', 1),
(10, 'Hồ Anh Thái', 1),
(11, 'Vũ Trọng Phụng', 1),
(12, 'Tuệ Văn', 1),
(13, 'Ngô Minh Vân', 1),
(14, 'Ngọc Linh', 1),
(15, 'Ngô Thừa Ân', 1),
(16, 'Nguyễn Kim Dân', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `MaTT` int(11) NOT NULL COMMENT 'Mã tin tức',
  `Tieu_de` varchar(200) NOT NULL COMMENT 'Tiêu đề tin',
  `Mo_ta` varchar(250) NOT NULL COMMENT 'Mô tả ngắn gọn tin',
  `Noi_dung` text NOT NULL COMMENT 'Nội dung tin',
  `Loai_tin` varchar(100) NOT NULL COMMENT 'Loại tin',
  `Ngay_dang_tin` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày đăng',
  `Hinh_anh` varchar(50) NOT NULL COMMENT 'Ảnh qc demo cho chương trình',
  `Trang_thai` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Trạng thái: \r\n1- Đang hiển thị\r\n0- Đang ẩn\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`MaTT`, `Tieu_de`, `Mo_ta`, `Noi_dung`, `Loai_tin`, `Ngay_dang_tin`, `Hinh_anh`, `Trang_thai`) VALUES
(1, 'Nước chảy về nguồn – Tưng bừng khai trương Clickbuy Đồng Văn Hà Nam – Thứ 5 ngày 11/6/2020', 'Nước chảy về nguồn – Lá rơi về cội. Đồng Văn – huyện Duy Tiên – Hà Nam là mảnh đất sinh thành của CEO Clickbuy Trần Mạnh Tuấn. Và như 1 điều tất yếu: Showroom Clickbuy Hà Nam khai trương tại địa chỉ: 107 đường Nguyễn Hữu Tiến – TT Đồng Văn – Duy Tiên', 'Nước chảy về nguồn – Lá rơi về cội. Đồng Văn – huyện Duy Tiên – Hà Nam là mảnh đất sinh thành của CEO Clickbuy Trần Mạnh Tuấn. Và như 1 điều tất yếu: Showroom Clickbuy Hà Nam khai trương tại địa chỉ: 107 đường Nguyễn Hữu Tiến – TT Đồng Văn – Duy Tiên – Hà Nam đánh dấu sự trở về của 1 con người – của 1 thương hiệu luôn nhớ về quê hương. Sự kiện khai trương showroom mới này sẽ bắt đầu từ 8h30 sáng – 21h30 tối thứ 5 ngày 11/6/2020. Xin mời anh chị, các bạn cùng bà con cô bác đến chung vui cùng chúng em trong sự kiện khai trương showroom mới này. Có rất nhiều chương trình khuyến mại GIẢM GIÁ SỐC – NHẬN QUÀ KHỦNG đang chờ đợi mọi người. ĐẶC BIỆT AI ĐẾN CŨNG CÓ QUÀ – CHỈ CẦN THĂM QUAN LÀ CÓ QUÀ MANG VỀ!\r\n\r\n', 'khuyen mai', '2020-06-11 22:52:20', 'tintuc5.jpg', 1),
(2, 'Giảm Android đồng loạt – Tết là Sale hết!', 'Từ ngày 8/1 đến 23/1/2020, Clickbuy triển khai Chương trình khuyến mãi Chào Tết Nguyên Đán 2020 Giảm giá đồng loạt – Tặng quà cực khủng dành cho Quý khách hàng khi mua sắm trực tiếp cũng như online các sản phẩm XIAOMI-REALME-ASUS tại các showroom khu', 'Từ ngày 8/1 đến 23/1/2020, Clickbuy triển khai Chương trình khuyến mãi Chào Tết Nguyên Đán 2020 Giảm giá đồng loạt – Tặng quà cực khủng dành cho Quý khách hàng khi mua sắm trực tiếp cũng như online các sản phẩm XIAOMI-REALME-ASUS tại các showroom khu vực Miền Bắc\r\n\r\n111 Trần Đăng Ninh – Hà Nội (0976.73.2468)\r\n118 Thái Hà – Hà Nội (096.424.2468)\r\n43 Cầu Giấy – Hà Nội (093.543.2468)\r\n446 Xã Đàn – Hà Nội (096.111.2468)\r\n453 Nguyễn Trãi – Hà Nội (094.698.2468)\r\n392 Trần Phú – Ba Đình – TP.Thanh Hóa: (0969.14.2468)\r\nNgã 3 Đông Yên – Yên Phong – Bắc Ninh (Khu công nghiệp Yên Phong) (094.144.2468)\r\n313 Lương Ngọc Quyến – Tp.Thái Nguyên (091154.2468)\r\n418 Lạch Tray, Ngô Quyền, Hải Phòng (0949.16.2468)\r\nNgoài mức giá cam kết rẻ nhất thị trường, Event còn giảm giá thêm cho tất các sản phẩm XIAOMI, REALME, ASUS, ONEPLUS đang bán tại ClickBuy kèm nhiều quà tặng hấp dẫn.\r\n\r\nAsus ROGPHONE 2 8G/128G  giá chỉ còn 11.390.000đ\r\nSiêu phẩm K20 Pro Premium 12G/512Gb giá chỉ còn 9.990.000đ\r\nSiêu phẩm K20 Pro 8G/128Gb giá chỉ còn 7.990.000đ\r\nREDMI NOTE 8 Siêu phẩm với giá bình dân đến từ Xiaomi sẽ được giảm thêm —200.000đ—  chỉ còn 3.390.000đ đối với bản 4G/64G và 3.690.000đ đối với bản 6G/64G\r\nREDMI NOTE 8 PRO bản nâng cấp của REDMI NOTE 8 cũng sẽ được giảm giá —300.000đ—  còn 4.390.000 đối với bản 6G/64G, 4.790.000 đối với bản 6G/128G.\r\nBên cạnh đó các sản phẩm Realme Q phiên bản 4G/64G có giá chỉ từ 3.590.000đ và bản 6G/64G có giá chỉ 3.990.000đ\r\nREDMI 8 4G/64G giảm —200.000đ—  còn 2.890.000đ\r\nREALME X2 6G/64G chỉ còn 4.990.000đ\r\nK30 6g/128G giá chỉ còn 5.890.000đ', 'Khuyen mai', '2020-06-12 01:27:49', 'tintuc4.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chu_de`
--
ALTER TABLE `chu_de`
  ADD PRIMARY KEY (`MaCD`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `hoa_don_ct`
--
ALTER TABLE `hoa_don_ct`
  ADD PRIMARY KEY (`MaHD`,`MaSP`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MaKH`),
  ADD UNIQUE KEY `Tai_khoan` (`Tai_khoan`);

--
-- Chỉ mục cho bảng `nxb`
--
ALTER TABLE `nxb`
  ADD PRIMARY KEY (`MaNXB`);

--
-- Chỉ mục cho bảng `quan_tri`
--
ALTER TABLE `quan_tri`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaCD` (`MaCD`),
  ADD KEY `MaTG` (`MaTG`),
  ADD KEY `MaNXB` (`MaNXB`);

--
-- Chỉ mục cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`MaTG`) USING BTREE;

--
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`MaTT`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chu_de`
--
ALTER TABLE `chu_de`
  MODIFY `MaCD` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại chủ đề', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hóa đơn', AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng', AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `nxb`
--
ALTER TABLE `nxb`
  MODIFY `MaNXB` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã NXB', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `quan_tri`
--
ALTER TABLE `quan_tri`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  MODIFY `MaTG` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã tác giả', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `MaTT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã tin tức', AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khach_hang` (`MaKH`);

--
-- Các ràng buộc cho bảng `hoa_don_ct`
--
ALTER TABLE `hoa_don_ct`
  ADD CONSTRAINT `hoa_don_ct_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoa_don` (`MaHD`),
  ADD CONSTRAINT `hoa_don_ct_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `san_pham` (`MaSP`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`MaTG`) REFERENCES `tac_gia` (`MaTG`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`MaCD`) REFERENCES `chu_de` (`MaCD`),
  ADD CONSTRAINT `san_pham_ibfk_3` FOREIGN KEY (`MaNXB`) REFERENCES `nxb` (`MaNXB`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
