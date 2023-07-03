-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 03, 2023 lúc 07:06 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webdienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_user`, `admin_pass`) VALUES
(1, 'abc', 'abcd@gmail.com', 'admin', '123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'Điện thoại'),
(2, 'Tablet'),
(3, 'Khuyến mãi'),
(4, 'Loa'),
(5, 'Bao da ốp lưng'),
(6, 'Sạc dự phòng'),
(7, 'Miếng dán màn hình'),
(8, 'Tai nghe'),
(9, 'Cáp sạc'),
(10, 'Củ sạc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hsx`
--

CREATE TABLE `hsx` (
  `ma_hsx` int(11) NOT NULL,
  `ten_hsx` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hsx`
--

INSERT INTO `hsx` (`ma_hsx`, `ten_hsx`) VALUES
(1, 'APPLE'),
(2, 'SAMSUNG'),
(3, 'OPPO'),
(4, 'Xiaomi'),
(5, 'Vivo'),
(6, 'Asus'),
(7, 'Nokia'),
(8, 'Mastel'),
(9, 'Realme'),
(10, 'Tecno'),
(11, 'lenovo'),
(12, 'Coolpad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `fb_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`fb_id`, `name`, `address`, `phone`, `email`, `content`) VALUES
(1, 'ABC', '17abc', '0123456789', 'abc@gmail.com', 'oke');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_name` varchar(255) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `news_name`, `news_image`, `description`) VALUES
(1, 'Đánh giá OPPO Reno8 T 5g: Điện t...', 'f762b9a924.webp', '	Nhắc lại một chút về năm 2022 của dòng Reno8, OPPO đã ra mắt tổng cộng 4 phiên bản Reno8. Các phiên bản này đều được đón nhận khá tốt, vì mỗi sản phẩm hướng đến từng phân khúc và đáp ứng từng nhu cầu sử dụng người dùng. Năm 2023, OPPO đã tạo sự bất ngờ'),
(2, 'Xiaomi Việt Nam chính thức xác n...', 'ba6228d044.webp', '	Sau thời gian đồn đoán, Xiaomi Việt Nam đã hé lộ thông tin ngày ra mắt của Xiaomi 13 series, dòng flagship này sẽ được giới thiệu tại sự kiện ngày 27/2 tới đây và nhanh chóng đến tay người dùng. Sự kiện ra mắt Xiaomi 13 series sẽ được tổ chức trực tuyến'),
(3, 'Du xuân cùng Samsung Galaxy A14 5G -...', '366000d241.webp', 'Cuối tuần rồi, còn chần chờ gì mà không tranh thủ rủ \"cạ cứng\" dạo phố nhân lúc Sài Gòn đang độ sắc xuân. Sẽ tuyệt vời hơn nữa nếu bạn bỏ túi một chiếc Smartphone chụp ảnh xịn sò như Galaxy A14 5G để tự tin thả dáng quay chụp đấy nhé'),
(4, 'FPT Shop giảm đến 3 triệu đồ...', '0cbe01ca1a.webp', '	Từ 07/10-14/10, khách hàng chọn mở thẻ đồng thương hiệu TPBank EVO by Trusting Social tại FPT shop và đặt cọc mua IPhone 14 Series sẽ được giảm đến 3.000.000 đồng'),
(5, 'Đây là 2 cách kiểm tra thời h�...', 'c7aafedfbf.webp', 'Bên cạnh cách kiểm tra thời hạn bảo hành IPhone thông qua trang Web Check Coverage, Apple còn cung cấp 2 cách kiểm tra thời hạn bảo hành IPhone khác. Bài viết này sẽ hướng dẫn các bạn cách sử dụng 2 cách này'),
(6, 'Tháng của Nàng - FPT Shop tặng t...', '1740dafa7c.webp', '	OPPO Reno8 T 5G là chiếc điện thoại rất \"hot\" trong đầu năm 2023 bởi nhiều tính năng hấp dẫn, giá bán hợp lý và đặc biệt hơn là quà tặng trị giá đến 1.59 triệu đồng. Hiện tại, giờ chỉ còn 2 ngày để bạn có thể đặt trước để nhận quà tặng này. Nếu yêu thích');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(15, 11, 13, 2, 25990000),
(16, 12, 12, 1, 2290000),
(17, 12, 11, 2, 3990000),
(18, 13, 9, 1, 7890000),
(19, 14, 10, 1, 4490000),
(20, 14, 3, 1, 23990000),
(21, 15, 13, 1, 25990000),
(22, 16, 14, 1, 14990000),
(23, 17, 12, 1, 2290000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phukien`
--

CREATE TABLE `phukien` (
  `pk_id` int(11) NOT NULL,
  `pk_ten` varchar(100) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `pk_gia` text NOT NULL,
  `pk_soluong` int(255) NOT NULL,
  `pk_anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phukien`
--

INSERT INTO `phukien` (`pk_id`, `pk_ten`, `cate_id`, `pk_gia`, `pk_soluong`, `pk_anh`) VALUES
(1, 'Cáp USB-C to Magsafe 3', 9, '1499000', 20, '3eb14b8173.webp'),
(2, 'Tai nghe AirPods Pro 2022 ', 8, '6490000', 30, 'c42c082a0a.webp'),
(3, 'Ốp lưng chống sốc iPhone 14 Pro Max YVS Silicone', 5, '199000', 50, '55c050f064.webp'),
(4, 'Pin sạc dự phòng Aukey Basix Slim PB-N99 10000mAh', 6, '199000', 50, '806058d510.webp'),
(5, 'Miếng dán kính cường lực Samsung S23 6D YVS', 7, '290000', 17, 'a94083fa30.webp'),
(6, 'Củ sạc Apple Power Adapter 67W Type-C', 10, '1999000', 27, '76dcfd87f9.webp'),
(7, 'Bao da iPad 10.2 & Air 3 10.5 inch Apple Smart Cover', 5, '1099000', 40, '33f8d82c06.webp'),
(8, 'Loa Bluetooth Anker SoundCore Mini 2 - A3107', 4, '55000', 50, 'f8a8a0e086.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `ma_hsx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `product_price`, `product_quantity`, `product_image`, `description`, `cate_id`, `ma_hsx`) VALUES
(1, 'iPhone 13 128GB', '19990000', '17990000', 20, '673dfa234a.webp', 'iPhone 13 sở hữu hệ thống camera kép xuất sắc nhất từ trước đến nay, bộ vi xử lý Apple A15 nhanh nhất thế giới smartphone cùng thời lượng pin cực khủng, sẵn sàng đồng hành cùng bạn suốt cả ngày.', 1, 1),
(2, 'Xiaomi Redmi Note 11 4GB - 128GB', '5990000', '4290000', 9, 'a0e6cc6d31.webp', 'Hãy cùng trải nghiệm Xiaomi Redmi Note 11, phiên bản nâng cấp toàn diện của dòng Redmi Note luôn rất được yêu thích từ trước đến nay. Sức mạnh vượt trội, thời lượng pin siêu dài, sạc siêu nhanh và camera chuyên nghiệp của sản phẩm sẽ mang đến những giờ phút giải trí tuyệt vời nhất.', 1, 4),
(3, 'Samsung Galaxy S22 Ultra 5G', '25990000', '23990000', 7, 'd019c997c7.webp', 'Samsung Galaxy S22 Ultra 5G là siêu phẩm kế thừa tinh hoa Galaxy Note cùng đột phá Galaxy S, tạo nên sức mạnh vô song đỉnh cao. Điện thoại đã thiết lập chuẩn mực mới cho dòng smartphone cao cấp từ sức mạnh hàng đầu Snapdragon 8 Gen 1, camera “mắt thần bóng đêm”, khả năng zoom 100x, bút S-Pen tích hợp và thời gian sử dụng cả ngày dài. Đây là siêu phẩm tuyệt vời nhất mà Samsung từng mang đến.', 1, 2),
(4, 'Xiaomi Redmi 10 4GB-128GB 2021', '5990000', '3790000', 15, 'a9b8218e45.webp', 'Dòng điện thoại Redmi yêu thích của bạn đã quay trở lại, Redmi 10 với bộ tứ camera 50MP AI đột phá, màn hình 90Hz siêu mượt và cấu hình “phá đảo” trong tầm giá, chắc chắn sẽ tiếp tục là lựa chọn hàng đầu ở phân khúc smartphone giá rẻ.', 1, 4),
(5, 'iPhone 11 64GB', '13990000', '11499000', 11, '36c76fb5e8.webp', 'iPhone 11 với 6 phiên bản màu sắc, camera có khả năng chụp ảnh vượt trội, thời lượng pin cực dài và bộ vi xử lý mạnh nhất từ trước đến nay sẽ mang đến trải nghiệm tuyệt vời dành cho bạn.', 1, 1),
(6, 'Samsung Galaxy Z Flip4 5G', '19990000', '17990000', 24, '37288022ca.webp', 'Samsung Galaxy Z Flip4 5G Bespoke Edition là bản giới hạn được bán độc quyền tại FPT Shop. Đây là sự kết hợp đặc biệt giữa sắc màu lễ hội và tinh hoa công nghệ của chiếc điện thoại gập yêu thích nhất, mang tới cho người dùng hai phiên bản nổi bật Trắng Tinh Khôi và Đỏ Thịnh Vượng với nhiều thông điệp ý nghĩa.', 1, 2),
(7, 'OPPO A77s 8GB-128GB', '8990000', '6090000', 13, '4b9ea40ba2.webp', 'Cuộc sống trở nên thú vị hơn khi có người bạn đồng hành trẻ trung, năng động – OPPO A77s. Chiếc điện thoại tầm trung với thiết kế hiện đại, tươi trẻ đi cùng những công nghệ ấn tượng như camera kép AI 50MP, sạc nhanh 33W, Snapdragon 680 và hỗ trợ mở rộng RAM.', 1, 3),
(8, 'OPPO A17k 3GB-64GB', '4490000', '3290000', 14, '9c097e9a9d.webp', 'Nổi bật bởi thiết kế hiện đại, tràn đầy năng lượng, OPPO A17k ghi điểm với bạn ngay lần đầu nhìn thấy. Đồng thời, smartphone còn ẩn chứa vô vàn trải nghiệm ấn tượng trong tầm giá với viên pin lớn, RAM mở rộng đa nhiệm mượt mà, cảm biến vân tay cạnh bên hiện đại và chống nước IPX4 bền bỉ.', 1, 3),
(9, 'iPad Gen 9 2021 10.2 inch 64GB', '8990000', '7890000', 16, '579248d1a2.webp', 'Mạnh mẽ, dễ dàng sử dụng, màn hình lớn, đặc biệt được bán ở mức giá rẻ, iPad Gen 9 10.2 2021 là chiếc máy tính bảng tuyệt vời cho mọi nhu cầu cơ bản, từ giải trí, sáng tạo, làm việc, kết nối và hơn thế nữa.', 2, 1),
(10, 'Samsung Galaxy Tab A7 Lite', '6490000', '4490000', 3, '7fe5778660.webp', 'Với thiết kế siêu mỏng, tính năng giải trí hấp dẫn và hiệu năng vượt trội, Samsung Galaxy Tab A7 Lite sẽ là người bạn đồng hành đầy phong cách dành cho cuộc sống của bạn. Tha hồ học hỏi, khám phá, kết nối trong niềm cảm hứng của công nghệ.	', 2, 2),
(11, 'Lenovo Tab M10 64GB (Gen2)', '5990000', '3990000', 18, '9ae1a2bccc.webp', 'Máy tính bảng Lenovo Tab M10 thế hệ hai là sự lựa chọn tuyệt vời nếu bạn muốn sắm cho trẻ một thiết bị vừa hữu ích vừa an toàn, được kiểm duyệt tốt về mặt nội dung và có giá bán rất vừa túi tiền.', 2, 11),
(12, 'Masstel Tab 10 Wifi', '4490000', '2290000', 13, 'a52707c3cc.webp', '	Với hệ điều hành Android 11 Go mượt mà và thân vỏ kim loại sang trọng, cao cấp, Masstel Tab 10 Wi-Fi là sự lựa chọn không nên bỏ qua nếu bạn đang kiếm tìm một chiếc tablet nổi trội trong phân khúc giá hợp lý. Sản phẩm sở hữu màn hình rộng 10.1 inch sắc sảo cùng thời lượng pin có thể sử dụng xuyên suốt ngày dài.', 2, 8),
(13, 'iPhone 14 Pro 128GB', '29990000', '25990000', 5, '669c69ada5.webp', 'iPhone 14 Pro hội tụ những tính năng đẳng cấp nhất với thiết kế mới, bộ vi xử lý Apple A16 Bionic với sức mạnh chưa từng thấy, camera 48MP nâng cấp vượt trội, màn hình Always-On đầy thú vị và hơn thế nữa.', 3, 1),
(14, 'Samsung Galaxy S22 Bora Purple', '16990000', '14990000', 8, '9966e6720c.webp', 'Bật nét kiêu kỳ, sẵn sàng trendy với phiên bản Samsung Galaxy S22 màu tím (Bora Purple), bạn sẽ trở nên thật thời thượng, ấn tượng và cá tính. Đồng hành đó là những công nghệ tốt nhất của Samsung từ hiệu năng Snapdragon 8 Gen 1, màn hình cao cấp cho đến hệ thống camera chuyên nghiệp.', 3, 2),
(15, 'OPPO Reno8 T 5G 128GB', '11990000', '9990000', 5, '99ae262378.webp', '	Trọn vẹn từng trải nghiệm trên OPPO Reno8 T 5G với nâng cấp toàn diện từ thế hệ chân dung 108MP, màn hình cong 120Hz tuyệt đẹp đến sạc nhanh Super VOOCTM 67W. Bạn sẽ bất ngờ với những gì OPPO Reno8 T 5G mang đến – một siêu phẩm trong tầm giá.', 3, 3),
(16, 'iPhone 14 128GB', '21990000', '19990000', 12, 'a00b4fb0b4.webp', 'Khoác lên kiểu dáng đặc trưng của dòng điện thoại iPhone, phiên bản iPhone 14 được cải tiến mạnh ở thời lượng pin và tập trung nâng cấp mạnh về camera nhằm đem đến những thước phim, khuôn hình đầy chất nghệ thuật và đạt chuẩn điện ảnh.	', 3, 1),
(17, 'Samsung Galaxy A73 5G', '12990000', '10990000', 6, '92b11e71b0.webp', 'Trải nghiệm hệ thống camera 108MP đầu tiên trên thế hệ Galaxy A, hiệu năng cực mạnh Snapdragon 778G, màn hình 120Hz mượt mà và kết nối 5G siêu tốc, Samsung Galaxy A73 5G đã sẵn sàng đưa bạn vào thế giới công nghệ đỉnh cao, giúp cuộc sống tiện lợi hơn bao giờ.', 1, 2),
(18, 'Vivo Y35 8GB-128GB', '8490000', '6390000', 30, '7cec5e28ba.webp', '	Là sản phẩm tiếp nối sự thành công của Y-series, vivo Y35 tiếp tục mang đến một ngôn ngữ thiết kế đặc trưng với những đường nét ấn tượng. Điện thoại còn cung cấp một hiệu năng mạnh mẽ cùng khả năng đa nhiệm tuyệt vời. Mọi thứ trên chiếc điện thoại vivo mới nhất hứa hẹn sẽ đáp ứng tốt nhu cầu của người dùng trong phân khúc giá.', 3, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblorder`
--

CREATE TABLE `tblorder` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tblorder`
--

INSERT INTO `tblorder` (`order_id`, `user_id`, `date`, `status`, `name`, `address`, `phone`, `payment_method`, `note`) VALUES
(11, 1, '2023-06-02 11:52:48', 2, 'shishui', '17', 522051444, 0, ''),
(12, 1, '2023-06-02 11:53:14', 2, 'shishui', '17', 522051444, 0, ''),
(13, 1, '2023-06-02 11:53:31', 2, 'shishui', '17', 522051444, 0, ''),
(14, 1, '2023-06-02 11:56:15', 2, 'shishui', '17', 522051444, 0, ''),
(15, 1, '2023-06-10 19:20:57', 3, 'shishui', '17', 522051444, 0, ''),
(16, 1, '2023-07-03 05:54:56', 1, 'shishui', '17', 522051444, 0, ''),
(17, 1, '2023-07-03 06:53:06', 1, 'shishui', '17', 522051444, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `address`, `phone`) VALUES
(1, 'shishui', 'abc@gmail.com', '123456789', '17', '0522051444');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_cart_product` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hsx`
--
ALTER TABLE `hsx`
  ADD PRIMARY KEY (`ma_hsx`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`fb_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`order_id`),
  ADD KEY `fk2` (`product_id`);

--
-- Chỉ mục cho bảng `phukien`
--
ALTER TABLE `phukien`
  ADD PRIMARY KEY (`pk_id`),
  ADD KEY `fk_cate_id` (`cate_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk1_product` (`cate_id`),
  ADD KEY `fk2_product` (`ma_hsx`);

--
-- Chỉ mục cho bảng `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hsx`
--
ALTER TABLE `hsx`
  MODIFY `ma_hsx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `phukien`
--
ALTER TABLE `phukien`
  MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`order_id`) REFERENCES `tblorder` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phukien`
--
ALTER TABLE `phukien`
  ADD CONSTRAINT `fk_cate_id` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk1_product` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_product` FOREIGN KEY (`ma_hsx`) REFERENCES `hsx` (`ma_hsx`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tblorder`
--
ALTER TABLE `tblorder`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
