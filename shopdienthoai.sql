-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2024 at 06:28 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `sum_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id_cart_detail` int(11) NOT NULL,
  `id_cart` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `name_product` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cate` int(11) NOT NULL,
  `name_cate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cate`, `name_cate`) VALUES
(2, 'Điện thoại mới'),
(3, 'Điện thoại bán chạy');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `content` text,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `content`, `id_user`, `id_product`, `time`, `username`) VALUES
(9, 'Test bl\r\n', 2, 10, '2024-04-03 14:00:11', 'admin'),
(10, 'Test bl\r\n', 2, 10, '2024-04-03 14:00:26', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('test@gmail.com', 'fa24fbd351f6a3b838eba4a2fe11afa7b37a3bd2aa', '2024-04-02 17:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(255) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `id_cate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `price`, `image`, `description`, `id_cate`) VALUES
(9, 'Điện thoại iPhone 11 (64GB) - Chính hãng VN/A', '9690.000', '1_a9732252692249e898ce6bb80eb21651_master.webp', '<p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Thiết Kế Tuyệt Đẹp</strong></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Apple đã ra mắt iPhone 15 Pro và iPhone 15 Pro Max, được thiết kế bằng Titan chuẩn hàng không vũ trụ chắc chắn mà vẫn mỏng nhẹ, mang đến những mẫu Pro có trọng lượng nhẹ nhất của Apple từ trước đến nay. Thiết kế mới với cạnh viền và nút Tác Vụ có thể tuỳ chỉnh, hỗ trợ người dùng cá nhân hoá trải nghiệm với iPhone.</span></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Sở hữu kích thước màn hình 6,1 inch và 6,7 inch,2 iPhone 15 Pro và iPhone 15 Pro Max có thiết kế Titan bền chắc và mỏng nhẹ — lần đầu tiên xuất hiện trên iPhone. Đây là loại hợp kim cao cấp sử dụng cho tàu vũ trụ, đồng thời là một trong những kim loại có tỷ lệ giữa độ bền và trọng lượng cao nhất, tạo nên dòng sản phẩm Pro nhẹ nhất từ trước đến nay của Apple. Cả hai kiểu máy này đều có bề mặt nhám tinh tế, các cạnh được bo tròn và viền máy mỏng nhất từng có trên iPhone. Dòng sản phẩm Pro bền bỉ với thời gian, kết hợp sức mạnh của Titan cùng kính mặt lưng bền chắc nhất trên điện thoại thông minh và mặt kính trước Ceramic Shield hàng đầu trong ngành. Sử dụng quá trình nhiệt cơ lần đầu được ứng dụng trong ngành, lớp vỏ Titan bao lấy kết cấu phụ làm từ 100% nhôm tái chế, liên kết hai kim loại này với nhau nhờ sức mạnh ấn tượng thông qua quá trình khuếch tán ở trạng thái rắn. Khung nhôm giúp tản nhiệt và cho phép thay mặt lưng kính dễ dàng. Thiết kế mới cũng làm nổi bật màn hình Super Retina XDR với công nghệ Luôn bật và ProMotion, mang đến trải nghiệm xem tuyệt đỉnh.</span></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Nút Tác Vụ hoàn toàn mới thay thế nút gạt cũ chỉ có một chức năng chuyển đổi giữa đổ chuông và im lặng, mang đến nhiều tuỳ chọn bổ sung để người dùng lựa chọn giữa việc nhanh chóng bật camera hay đèn pin, kích hoạt ứng dụng Ghi Âm, các chế độ Tập Trung, Dịch Thuật, và các tính năng trợ năng như Kính Lúp, hoặc dùng Phím Tắt để có thêm tuỳ chọn. Thao tác nhấn và giữ với tính năng phản hồi xúc giác được tinh chỉnh cùng các gợi ý trực quan trong Dynamic Island giúp đảm bảo nút mới sẽ khởi chạy tác vụ mong muốn.</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Cấu Hình Mạnh Mẽ</strong></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Mang đến hiệu năng cùng nhiều tính năng chuyên nghiệp, iPhone 15 Pro và iPhone 15 Pro Max được trang bị chip A17 Pro, con chip 3 nanômét đầu tiên trong ngành. Tiếp nối vị thế dẫn đầu của Apple trong ngành công nghệ chip silicon cho điện thoại thông minh, chip A17 Pro mang đến nhiều cải tiến trên toàn bộ con chip, bao gồm thiết kế mới toàn diện nhất trong lịch sử của Apple đối với GPU. CPU mới nhanh hơn đến 10% với nhiều cải tiến trong vi kiến trúc và thiết kế, đồng thời Neural Engine nay cũng nhanh hơn gấp 2 lần, hỗ trợ cho các tính năng như tự động sửa và Giọng Nói Cá Nhân trong iOS 17. GPU đẳng cấp chuyên nghiệp nhanh hơn tới 20%, mở ra nhiều trải nghiệm hoàn toàn mới, sở hữu thiết kế 6 lõi mới giúp tăng hiệu năng tối đa và tiết kiệm năng lượng. Nay nhờ công nghệ dò tia tăng tốc phần cứng, nhanh hơn gấp 4 lần so với công nghệ dò tia dựa trên phần mềm, iPhone 15 Pro mang đến đồ hoạ mượt mà hơn, cũng như trải nghiệm chơi game và ứng dụng AR sống động hơn. iPhone 15 Pro mang trải nghiệm chơi game chân thực đến với người dùng nhờ sở hữu nhiều tựa game sử dụng tay cầm chơi game lần đầu xuất hiện trên điện thoại thông minh như Resident Evil Village, Resident Evil 4, Death Stranding và Assassin’s Creed Mirage.</span></p>', 3),
(10, 'Điện Thoại Apple iPhone 15 Pro', '25480.000', '1_ea87000c5d594acdb71731e5477c19b1_master.webp', '<p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Thiết Kế Tuyệt Đẹp</strong></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Apple đã ra mắt iPhone 15 Pro và iPhone 15 Pro Max, được thiết kế bằng Titan chuẩn hàng không vũ trụ chắc chắn mà vẫn mỏng nhẹ, mang đến những mẫu Pro có trọng lượng nhẹ nhất của Apple từ trước đến nay. Thiết kế mới với cạnh viền và nút Tác Vụ có thể tuỳ chỉnh, hỗ trợ người dùng cá nhân hoá trải nghiệm với iPhone.</span></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Sở hữu kích thước màn hình 6,1 inch và 6,7 inch,2 iPhone 15 Pro và iPhone 15 Pro Max có thiết kế Titan bền chắc và mỏng nhẹ — lần đầu tiên xuất hiện trên iPhone. Đây là loại hợp kim cao cấp sử dụng cho tàu vũ trụ, đồng thời là một trong những kim loại có tỷ lệ giữa độ bền và trọng lượng cao nhất, tạo nên dòng sản phẩm Pro nhẹ nhất từ trước đến nay của Apple. Cả hai kiểu máy này đều có bề mặt nhám tinh tế, các cạnh được bo tròn và viền máy mỏng nhất từng có trên iPhone. Dòng sản phẩm Pro bền bỉ với thời gian, kết hợp sức mạnh của Titan cùng kính mặt lưng bền chắc nhất trên điện thoại thông minh và mặt kính trước Ceramic Shield hàng đầu trong ngành. Sử dụng quá trình nhiệt cơ lần đầu được ứng dụng trong ngành, lớp vỏ Titan bao lấy kết cấu phụ làm từ 100% nhôm tái chế, liên kết hai kim loại này với nhau nhờ sức mạnh ấn tượng thông qua quá trình khuếch tán ở trạng thái rắn. Khung nhôm giúp tản nhiệt và cho phép thay mặt lưng kính dễ dàng. Thiết kế mới cũng làm nổi bật màn hình Super Retina XDR với công nghệ Luôn bật và ProMotion, mang đến trải nghiệm xem tuyệt đỉnh.</span></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Nút Tác Vụ hoàn toàn mới thay thế nút gạt cũ chỉ có một chức năng chuyển đổi giữa đổ chuông và im lặng, mang đến nhiều tuỳ chọn bổ sung để người dùng lựa chọn giữa việc nhanh chóng bật camera hay đèn pin, kích hoạt ứng dụng Ghi Âm, các chế độ Tập Trung, Dịch Thuật, và các tính năng trợ năng như Kính Lúp, hoặc dùng Phím Tắt để có thêm tuỳ chọn. Thao tác nhấn và giữ với tính năng phản hồi xúc giác được tinh chỉnh cùng các gợi ý trực quan trong Dynamic Island giúp đảm bảo nút mới sẽ khởi chạy tác vụ mong muốn.</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Cấu Hình Mạnh Mẽ</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Mang đến hiệu năng cùng nhiều tính năng chuyên nghiệp, iPhone 15 Pro và iPhone 15 Pro Max được trang bị chip A17 Pro, con chip 3 nanômét đầu tiên trong ngành. Tiếp nối vị thế dẫn đầu của Apple trong ngành công nghệ chip silicon cho điện thoại thông minh, chip A17 Pro mang đến nhiều cải tiến trên toàn bộ con chip, bao gồm thiết kế mới toàn diện nhất trong lịch sử của Apple đối với GPU. CPU mới nhanh hơn đến 10% với nhiều cải tiến trong vi kiến trúc và thiết kế, đồng thời Neural Engine nay cũng nhanh hơn gấp 2 lần, hỗ trợ cho các tính năng như tự động sửa và Giọng Nói Cá Nhân trong iOS 17. GPU đẳng cấp chuyên nghiệp nhanh hơn tới 20%, mở ra nhiều trải nghiệm hoàn toàn mới, sở hữu thiết kế 6 lõi mới giúp tăng hiệu năng tối đa và tiết kiệm năng lượng. Nay nhờ công nghệ dò tia tăng tốc phần cứng, nhanh hơn gấp 4 lần so với công nghệ dò tia dựa trên phần mềm, iPhone 15 Pro mang đến đồ hoạ mượt mà hơn, cũng như trải nghiệm chơi game và ứng dụng AR sống động hơn. iPhone 15 Pro mang trải nghiệm chơi game chân thực đến với người dùng nhờ sở hữu nhiều tựa game sử dụng tay cầm chơi game lần đầu xuất hiện trên điện thoại thông minh như Resident Evil Village, Resident Evil 4, Death Stranding và Assassin’s Creed Mirage.</span></p>', 3),
(11, 'Điện Thoại Apple iPhone 15 Plus', '22450.000', '1_5c656300fc7c4ee0b9f1637ce4dde1f6_master.webp', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">“iPhone 15 và iPhone 15 Plus thể hiện một bước nhảy vọt lớn với những cải tiến tuyệt vời về camera mang đến cảm hứng sáng tạo, Dynamic Island trực quan cùng các tính năng như Roadside Assistance thông qua vệ tinh tạo ra sự khác biệt lớn trong cuộc sống của người dùng,” Kaiann Drance, Phó Chủ tịch bộ phận Tiếp thị Sản phẩm iPhone Toàn cầu của Apple chia sẻ. “Trong năm nay, chúng tôi cũng đưa sức mạnh của công nghệ nhiếp ảnh điện toán lên một tầm cao mới với camera Chính 48MP có chế độ mặc định 24MP mới cho ra những tấm ảnh với độ phân giải cực kỳ cao, một tuỳ chọn Telephoto 2x mới, và những chế độ chụp ảnh chân dung thế hệ mới.\"</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Một Thiết Kế Đẹp và Bền Bỉ với Màn Hình Được Nâng Cấp</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Sở hữu kích thước màn hình 6.1-inch và 6.7-inch,iPhone 15 và iPhone 15 Plus được trang bị Dynamic Island, một cách thức sáng tạo nhằm tương tác với các cảnh báo quan trọng và Hoạt Động Trực Tiếp. Trải nghiệm tinh tế sẽ mở rộng và thích ứng một cách linh hoạt để người dùng có thể xem hướng đi tiếp theo trong Bản Đồ, dễ dàng điều khiển âm nhạc, và khi tích hợp với ứng dụng của bên thứ ba, người dùng sẽ nhận được thông tin cập nhật theo thời gian thực về hoạt động giao đồ ăn, chia sẻ chuyến đi, tỷ số thể thao, kế hoạch du lịch, và hơn thế nữa. Màn hình Super Retina XDR rất lý tưởng để xem nội dung, và chơi game. Giờ đây độ sáng HDR cao nhất đã đạt đến 1600 nit, nhờ đó ảnh và video HDR sẽ rõ nét hơn bao giờ hết. Và khi trời nhiều nắng, độ sáng cao nhất ngoài trời sẽ đạt đến 2000 nit — sáng gấp đôi so với thế hệ trước.</span></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Cả hai mẫu máy này đều có thiết kế mới tinh tế và bền bỉ với thời gian. Lần đầu tiên trên điện thoại thông minh, kính mặt lưng được pha màu, tạo nên năm màu sắc tuyệt đẹp. Kính mặt lưng được gia cố độ bền bằng quy trình trao đổi ion kép tối ưu trước khi được đánh bóng bằng các hạt tinh thể nano và được khắc axit để tạo nên lớp kính mờ sang trọng. Thiết kế cạnh viền bo tròn mới trên vỏ máy làm từ nhôm chuẩn hàng không vũ trụ mang lại cảm giác dễ chịu khi cầm trên tay, và mặt kính Ceramic Shield cứng hơn bất kỳ loại kính trên điện thoại thông minh nào khác. Với thiết kế chống nước và chống bụi2 cùng các tính năng về độ bền hàng đầu trong ngành, iPhone vẫn giữ được giá trị lâu dài hơn bất kỳ dòng điện thoại thông minh nào khác. Thêm vào đó, thiết kế bên trong mang lại hiệu năng bền bỉ mạnh mẽ, đồng thời giúp sửa chữa dễ dàng và tiết kiệm chi phí hơn.</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Camera Mạnh Mẽ giúp Ghi Lại Mọi Khoảnh Khắc với Độ Phân Giải Cực Kỳ Cao</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Hệ thống camera tiên tiến trên iPhone 15 và iPhone 15 Plus giúp người dùng ghi lại mọi khoảnh khắc đời thường cùng những kỷ niệm đáng nhớ. Camera Chính 48MP chụp ảnh và quay video sắc nét, đồng thời ghi lại những chi tiết nhỏ bằng cảm biến quad-pixel và Focus Pixels 100% giúp tự động lấy nét nhanh. Sử dụng sức mạnh của công nghệ nhiếp ảnh điện toán, camera Chính mang đến cho người dùng độ phân giải cực kỳ cao 24MP ở chế độ mặc định, tạo ra chất lượng hình ảnh ấn tượng ở kích thước tệp tiện lợi, phù hợp cho việc lưu trữ và chia sẻ. Bằng cách tích hợp phần cứng và phần mềm một cách thông minh, tùy chọn Telephoto 2x bổ sung mang đến cho người dùng ba mức thu phóng với chất lượng quang học — 0,5x, 1x, 2x — lần đầu tiên có trên hệ thống camera kép của iPhone.</span></p><p><br></p>', 2),
(12, 'Điện Thoại Apple iPhone 15', '19480.000', '1_5c656300fc7c4ee0b9f1637ce4dde1f6_master.webp', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">“iPhone 15 và iPhone 15 Plus thể hiện một bước nhảy vọt lớn với những cải tiến tuyệt vời về camera mang đến cảm hứng sáng tạo, Dynamic Island trực quan cùng các tính năng như Roadside Assistance thông qua vệ tinh tạo ra sự khác biệt lớn trong cuộc sống của người dùng,” Kaiann Drance, Phó Chủ tịch bộ phận Tiếp thị Sản phẩm iPhone Toàn cầu của Apple chia sẻ. “Trong năm nay, chúng tôi cũng đưa sức mạnh của công nghệ nhiếp ảnh điện toán lên một tầm cao mới với camera Chính 48MP có chế độ mặc định 24MP mới cho ra những tấm ảnh với độ phân giải cực kỳ cao, một tuỳ chọn Telephoto 2x mới, và những chế độ chụp ảnh chân dung thế hệ mới.\"</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Một Thiết Kế Đẹp và Bền Bỉ với Màn Hình Được Nâng Cấp</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Sở hữu kích thước màn hình 6.1-inch và 6.7-inch,iPhone 15 và iPhone 15 Plus được trang bị Dynamic Island, một cách thức sáng tạo nhằm tương tác với các cảnh báo quan trọng và Hoạt Động Trực Tiếp. Trải nghiệm tinh tế sẽ mở rộng và thích ứng một cách linh hoạt để người dùng có thể xem hướng đi tiếp theo trong Bản Đồ, dễ dàng điều khiển âm nhạc, và khi tích hợp với ứng dụng của bên thứ ba, người dùng sẽ nhận được thông tin cập nhật theo thời gian thực về hoạt động giao đồ ăn, chia sẻ chuyến đi, tỷ số thể thao, kế hoạch du lịch, và hơn thế nữa. Màn hình Super Retina XDR rất lý tưởng để xem nội dung, và chơi game. Giờ đây độ sáng HDR cao nhất đã đạt đến 1600 nit, nhờ đó ảnh và video HDR sẽ rõ nét hơn bao giờ hết. Và khi trời nhiều nắng, độ sáng cao nhất ngoài trời sẽ đạt đến 2000 nit — sáng gấp đôi so với thế hệ trước.</span></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Cả hai mẫu máy này đều có thiết kế mới tinh tế và bền bỉ với thời gian. Lần đầu tiên trên điện thoại thông minh, kính mặt lưng được pha màu, tạo nên năm màu sắc tuyệt đẹp. Kính mặt lưng được gia cố độ bền bằng quy trình trao đổi ion kép tối ưu trước khi được đánh bóng bằng các hạt tinh thể nano và được khắc axit để tạo nên lớp kính mờ sang trọng. Thiết kế cạnh viền bo tròn mới trên vỏ máy làm từ nhôm chuẩn hàng không vũ trụ mang lại cảm giác dễ chịu khi cầm trên tay, và mặt kính Ceramic Shield cứng hơn bất kỳ loại kính trên điện thoại thông minh nào khác. Với thiết kế chống nước và chống bụi2 cùng các tính năng về độ bền hàng đầu trong ngành, iPhone vẫn giữ được giá trị lâu dài hơn bất kỳ dòng điện thoại thông minh nào khác. Thêm vào đó, thiết kế bên trong mang lại hiệu năng bền bỉ mạnh mẽ, đồng thời giúp sửa chữa dễ dàng và tiết kiệm chi phí hơn.</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Camera Mạnh Mẽ giúp Ghi Lại Mọi Khoảnh Khắc với Độ Phân Giải Cực Kỳ Cao</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Hệ thống camera tiên tiến trên iPhone 15 và iPhone 15 Plus giúp người dùng ghi lại mọi khoảnh khắc đời thường cùng những kỷ niệm đáng nhớ. Camera Chính 48MP chụp ảnh và quay video sắc nét, đồng thời ghi lại những chi tiết nhỏ bằng cảm biến quad-pixel và Focus Pixels 100% giúp tự động lấy nét nhanh. Sử dụng sức mạnh của công nghệ nhiếp ảnh điện toán, camera Chính mang đến cho người dùng độ phân giải cực kỳ cao 24MP ở chế độ mặc định, tạo ra chất lượng hình ảnh ấn tượng ở kích thước tệp tiện lợi, phù hợp cho việc lưu trữ và chia sẻ. Bằng cách tích hợp phần cứng và phần mềm một cách thông minh, tùy chọn Telephoto 2x bổ sung mang đến cho người dùng ba mức thu phóng với chất lượng quang học — 0,5x, 1x, 2x — lần đầu tiên có trên hệ thống camera kép của iPhone.</span></p>', 2),
(13, 'Điện thoại Apple iPhone 14 Pro Max chính hãng VN/A', '13500.000', '4_d39790d538174cb69c526ee6e19d3d1c_master.webp', '<p><strong style=\"color: rgb(37, 42, 43); background-color: rgb(255, 255, 255);\"><a href=\"https://itamloan.vn/collections/apple\" rel=\"noopener noreferrer\" target=\"_blank\">Apple&nbsp;</a></strong><span style=\"color: rgb(37, 42, 43); background-color: rgb(255, 255, 255);\">hôm nay đã công bố iPhone 14 Pro và iPhone 14 Pro Max, dòng sản phẩm Pro cao cấp nhất từ ​​trước đến nay, có Dynamic Island - một thiết kế mới giới thiệu một cách trực quan để trải nghiệm</span><strong style=\"color: rgb(37, 42, 43); background-color: transparent;\"><a href=\"https://itamloan.vn/collections/iphone-chinh-hang-can-tho\" rel=\"noopener noreferrer\" target=\"_blank\">&nbsp;iPhone</a></strong><span style=\"color: rgb(37, 42, 43); background-color: rgb(255, 255, 255);\">&nbsp;- và màn hình Always-On. Được cung cấp sức mạnh bởi A16 Bionic, con chip nhanh nhất từng có trên điện thoại thông minh, iPhone 14 Pro giới thiệu một hệ thống camera chuyên nghiệp mới, với Camera chính 48MP đầu tiên trên iPhone có cảm biến 4 pixel và Photonic Engine, một đường ống hình ảnh nâng cao giúp cải thiện đáng kể ảnh chụp thiếu sáng. Những tiến bộ đột phá này khiến iPhone trở nên không thể thiếu trong các công việc hàng ngày, các dự án sáng tạo và thậm chí là các tình huống khẩn cấp với các tính năng như SOS khẩn cấp qua vệ tinh và Phát hiện sự cố.</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Đánh giá</strong><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/dien-thoai-apple-iphone-14-pro-max-chinh-hang-vn-a\" rel=\"noopener noreferrer\" target=\"_blank\">&nbsp;iPhone 14 Pro Max</a></strong><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;- Siêu phẩm khẳng định đẳng cấp</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Những chiếc điện thoại</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/collections/iphone-14-series\" rel=\"noopener noreferrer\" target=\"_blank\">&nbsp;iPhone 14</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;2022 được gọi tên trong hàng ngũ siêu phẩm smartphone thế hệ mới bởi công nghệ hàng đầu, thiết kế hoàn hảo cùng nhiều đột phá đáng kinh ngạc. Độ hoàn hảo của thế hệ Flagship mới nhất của&nbsp;</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/collections/apple\" rel=\"noopener noreferrer\" target=\"_blank\">Apple&nbsp;</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">được tạo thành từ sự thống nhất giữa các yếu tố thiết kế, màn hình, cấu hình, hệ điều hành, camera, pin và các tính năng cải tiến.</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Sự biến mất của màn hình tai thỏ thay thế bằng thiết kế viên thuốc</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Sau nhiều thế hệ liên tiếp giữ thiết kế tai thỏ, cuối cùng&nbsp;</span><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/collections/apple\" rel=\"noopener noreferrer\" target=\"_blank\">Apple&nbsp;</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">đã có đột phá trong thiết kế để chiều lòng người hâm mộ. Theo đó, ở mặt trước của những chiếc&nbsp;</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/dien-thoai-apple-iphone-14-pro-max-chinh-hang-vn-a\" rel=\"noopener noreferrer\" target=\"_blank\">iPhone 14 Pro Max</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;nơi có chiếc tai thỏ quen thuộc này đã được thay thế bằng thiết kế viên thuốc độc đáo. Viên thuốc trên màn hình&nbsp;</span><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/dien-thoai-apple-iphone-14-pro-max-chinh-hang-vn-a\" rel=\"noopener noreferrer\" target=\"_blank\">iPhone 14 Pro Max</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;là nơi chứa camera face ID và camera trước.</span></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Thiết kế màn hình Dynamic Island mới này sẽ đưa các thông báo vào trong thiết kế viên thuốc để các hoạt động trên màn hình diễn ra liền mạch. Cụ thể các thông báo cuộc gọi, nghẹ sẽ được thích hợp vào trong thiết kế mới này và người dùng có thể thực hiện các thao tác chạm vuốt mở rộng, trở về trang chủ khi cần thiết.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Cảm biến tiện cậm được Apple thiết kế lại và di chuyển ra phía sau màn hình nhờ đó mang lại không gian hiển thị rộng hơn. Camera TrueDepth cũng được thiết kế nhỏ hơn tới 31% so với thế hệ tiền nhiệm.</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Màn hình OLED 6,7 inch, hỗ trợ always-on display</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Sự thành công của thiết kế màn hình đến từ những chiếc điện thoại&nbsp;</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/iphone-13-pro\" rel=\"noopener noreferrer\" target=\"_blank\">iPhone 13 pro</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;mã là điểm nhấn khiến sự chú ý dồn vào những chiếc điện thoại thế hệ mới của&nbsp;</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/collections/apple\" rel=\"noopener noreferrer\" target=\"_blank\">Apple</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">. Những “quả táo chín” lần này đến từ công ty công nghệ hàng đầu thế giới có kích thước 6,7 inch và được trang bị tấm nền OLED M12 cực sắc nét. Đặc biệt, Apple còn trang bị cho màn hình&nbsp;</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/dien-thoai-apple-iphone-14-pro-max-chinh-hang-vn-a\" rel=\"noopener noreferrer\" target=\"_blank\">iPhone 14 Pro Max</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;tính năng tự động giảm sáng khi thiết bị được đút trong túi hoặc úp xuống mặt bàn để tiết kiệm pin.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Độ phân giải được ghi nhận của những chiếc điện thoại này đạt mức 2796&nbsp;‑&nbsp;x 1290 pixel sẵn sàng cho ra những khung hình chất lượng đến từng micro micrometer. Tần số quét 120Hz ấn tượng vẫn được giữ nguyên trên tấm màn này cùng mật độ điểm ảnh cao khiến trải nghiệm lướt, quét trên</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/dien-thoai-apple-iphone-14-pro-max-chinh-hang-vn-a\" rel=\"noopener noreferrer\" target=\"_blank\">&nbsp;iPhone 14 Pro Max</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;diễn ra như một giấc mộng tuyệt vời.</span></p><p><br></p>', 2),
(14, 'Điện thoại Apple iPhone 14 Pro chính hãng VN/A', '14000.000', '2_6e728c340ca041d4b27ff7dd0989d0df_master.webp', '<h2><strong style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">Apple ra mắt iPhone 14 Pro và iPhone 14 Pro Max</strong></h2><h2><strong style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">Có màn hình Always-On, camera 48MP đầu tiên trên iPhone, Phát hiện sự cố, SOS khẩn cấp qua vệ tinh và một cách mới sáng tạo để nhận thông báo và hoạt động với Dynamic Island</strong></h2><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;</span></p><p><strong style=\"color: rgb(29, 29, 31); background-color: rgb(255, 255, 255);\">Trải nghiệm người dùng tương tác</strong><strong style=\"color: rgb(37, 42, 43); background-color: rgb(255, 255, 255);\">&nbsp;với Dynamic Island</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Dynamic Island làm mờ ranh giới giữa phần cứng và phần mềm, mở rộng linh hoạt thành các hình dạng khác nhau để truyền tải rõ ràng các hoạt động quan trọng như xác thực Face ID</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Dynamic Island cho phép những cách mới để tương tác với iPhone, có thiết kế kết hợp ranh giới giữa phần cứng và phần mềm, thích ứng trong thời gian thực để hiển thị các cảnh báo, thông báo và hoạt động quan trọng.&nbsp;Với sự ra đời của Dynamic Island, camera TrueDepth đã được thiết kế lại để chiếm ít diện tích hiển thị hơn.&nbsp;Không làm cản trở nội dung trên màn hình, Dynamic Island duy trì trạng thái hoạt động để cho phép người dùng truy cập dễ dàng hơn vào các điều khiển chỉ bằng một thao tác chạm và giữ đơn giản.&nbsp;Các hoạt động nền đang diễn ra như Bản đồ, Âm nhạc hoặc đồng hồ hẹn giờ vẫn hiển thị và tương tác và các ứng dụng của bên thứ ba trong iOS 16 cung cấp thông tin như điểm số thể thao và chia sẻ chuyến đi với Hoạt động trực tiếp có thể tận dụng Dynamic Island.</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Một thiết kế tuyệt đẹp và màn hình tiên tiến nhất trên điện thoại thông minh</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">iPhone 14 Pro và iPhone 14 Pro Max có thiết kế bằng thép không gỉ và kính mờ kết cấu đẹp mắt với bốn màu sắc tuyệt đẹp,&nbsp;kích thước 6,1 inch và 6,7 inch, màn hình Super Retina XDR mới với&nbsp;</span><sup style=\"background-color: rgb(255, 255, 255); color: rgb(29, 29, 31);\">ProMotion&nbsp;</sup><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">, có tính năng hiển thị Always-On lần đầu tiên trên iPhone,&nbsp;kích hoạt bởi&nbsp;1Hz&nbsp;và tiết kiệm nhiều năng lượng.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Màn hình khóa mới thậm chí còn hữu ích hơn, giúp bạn luôn có thể sử dụng iPhone đang ở màn hình khóa, tiện ích và hoạt động trực tiếp.&nbsp;Màn hình tiên tiến cũng mang lại mức độ sáng HDR cao nhất tương tự như Pro Display XDR và ​​độ sáng đỉnh ngoài trời cao nhất trong điện thoại thông minh: lên đến 2000 nits, sáng gấp đôi so với iPhone 13 Pro.</span></p><p><em style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Độ bền hàng đầu trong ngành với mặt trước bằng Ceramic Shield - cứng hơn bất kỳ loại kính điện thoại thông minh nào - và được bảo vệ khỏi các sự cố tràn và tai nạn thông thường với khả năng chống nước và bụi.</em></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Hệ thống camera chuyên nghiệp đẳng cấp mới</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Hệ thống camera chuyên nghiệp trên iPhone 14 Pro và iPhone 14 Pro Max vượt qua ranh giới của những gì có thể có trên một chiếc điện thoại thông minh, giúp mọi người dùng - bình thường hay chuyên nghiệp - đều có thể chụp được những bức ảnh và video tốt nhất.</span></p><p><br></p>', 2),
(15, 'Điện Thoại Apple iPhone 14 Plus Chính Hãng VN/A', '14400.000', '1_0e08c6407d9f4dfc80f436a0563a5542_master.webp', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Apple gọi&nbsp;</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/dien-thoai-apple-iphone-14-plus-chinh-hang-vn-a/\" rel=\"noopener noreferrer\" target=\"_blank\">iPhone 14 Plus</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;là chiếc iPhone có pin tốt nhất từng được sản xuất. Sản phẩm được trang bị chip đời cũ A15 Bionic, với 5 nhân GPU, tăng khả năng xử lý đồ họa.</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Màn hình</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Vẫn giữ nguyên kiểu thiết kế khung kim loại được ép chặt bởi 2 mặt kính mang đến tính thẩm mỹ cao, liền lạc và khả năng nhận diện thương hiệu cực kỳ cao. Còn lại có chi tiết như phím bấm, cách sắp xếp camera hay phần Notch ở mặt trước hầu như không thay đổi. Màn hình của&nbsp;</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/dien-thoai-apple-iphone-14-chinh-hang-vn-a\" rel=\"noopener noreferrer\" target=\"_blank\">iphone 14</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;sử dụng tấm nền OLED với độ sáng 1200 nits (sáng hơn), tỷ lệ tương phản 2,000,000:1, hỗ trợ Dolby Vision cũng như Apple sử dụng kính Ceramic Shield cứng cáp.&nbsp;Chúng ta vẫn sẽ có phần Notch và “tai thỏ” như trên&nbsp;</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/iphone-13\" rel=\"noopener noreferrer\" target=\"_blank\">iPhone 13</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;trước đây.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;</span></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Phần cứng - vẫn là A15 nhưng thêm nhân CPU và GPU</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Apple sử dụng chip A15 Bionic nhưng nâng cấp đến 5 core GPU cho hiệu năng GPU vượt trội hơn, giúp đảm nhiệm đồ hoạ game tốt hơn. CPU của A15 mới thì có 6 nhân. Apple không nói chi tiết về hiệu năng của A15 Bionic như thế nào, có lẽ mình sẽ cập nhật chi tiết một bài viết riêng về A15 Bionic trên&nbsp;</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/dien-thoai-apple-iphone-14-chinh-hang-vn-a\" rel=\"noopener noreferrer\" target=\"_blank\">iPhone 14</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;sau.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Bộ xử lý Neural Engine trên A15 Bionic có 16 nhân và có thể thực hiện 15,8 nghìn tỷ phép tính trên giây.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;</span></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Camera</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Ở mặt sau, Apple đang bổ sung các tính năng camera mới so với ‌</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/iphone-13\" rel=\"noopener noreferrer\" target=\"_blank\">iPhone 13‌</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">.&nbsp;</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/dien-thoai-apple-iphone-14-chinh-hang-vn-a\" rel=\"noopener noreferrer\" target=\"_blank\">iPhone 14‌</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;và ‌</span><strong style=\"background-color: transparent; color: rgb(37, 42, 43);\"><a href=\"https://itamloan.vn/products/dien-thoai-apple-iphone-14-plus-chinh-hang-vn-a/\" rel=\"noopener noreferrer\" target=\"_blank\">iPhone 14‌ Plus</a></strong><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;sở hữu cụm camera kép với độ phân giải 12MP cùng cảm biến và điểm ảnh lớn hơn đạt 1.9 micron.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Cảm biến mới lớn hơn giúp cải thiện 49% khả năng chụp thiếu sáng và giúp phơi sáng ở chế độ ban đêm nhanh gấp đôi so với thế hệ tiền nhiệm. Đồng thời cải thiện khả năng quay video với chế độ ổn định mới.</span></p>', 2),
(16, 'Điện thoại Apple iPhone 14 chính hãng VN/A', '18990.000', '4_9e6a2f0a720d4f298840dd84331b6b8d_master.webp', '<p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Đặc điểm nổi bật của iPhone 14</strong></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">iPhone 14 được nâng cấp vượt trội về thời lượng pin và có một bước nhảy vọt về camera, mang đến những bức ảnh tuyệt đẹp đầy nghệ thuật và các đoạn phim chuẩn điện ảnh.</strong></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Thiết kế và màn hình</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">iPhone 14 có thiết kế tương tự&nbsp;</span><a href=\"https://itamloan.vn/products/iphone-13\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">iPhone 13</a><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">&nbsp;với notch “tai thỏ”. Tuy nhiên, phần “notch” đã được tối ưu mỏng so với tiền nhiệm và tỷ lệ khung hình cao hơn một chút. Điện thoại sử dụng tấm nền OLED với độ sáng 1.200nits và tần số quét 60Hz. Máy được hoàn thiện từ khung nhôm và mặt kính Ceramic Shiled.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">iPhone 14 sở hữu màn hình công nghệ OLED độ phân giải cao và độ chính xác màu sắc tuyệt vời. Màn hình 6.1 inch trên iPhone 14 mang đến trải nghiệm giải trí hấp dẫn ở bất cứ đâu khi công nghệ True Tone sẽ điều chỉnh ánh sáng dựa theo môi trường xung quanh để hình ảnh luôn đẹp nhất.</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">iPhone 14 có hai màu mới là xanh và màu tím, bên cạnh các màu trắng, đen và đỏ.</span></p><p><br></p><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Những bức ảnh nghệ thuật và hơn thế nữa</strong></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">iPhone 14 có camera chính 12MP và camera góc rộng 12MP. Trong đó, camera chính có khẩu độ f/1.5, kích thước điểm ảnh 1.9 micromet và tích hợp chống rung OIS. Theo Apple, điều này cho phép camera cải thiện 49% chất lượng ảnh trong điều kiện thiếu sáng so với bản cũ, giúp ảnh sắc nét và thu sáng nhiều nhất có thể.</span></p><p><br></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(37, 42, 43);\">Đối với camera trước có độ phân giải 12MP, khẩu độ f/1.9 và có tính năng Autofocus (lấy nét tự động), mang tới những tấm ảnh selfie chất lượng cho người dùng.</span></p>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `pass`, `email`, `address`, `role`) VALUES
(1, 'adminngudan', 'test   ', 'demo@gmail.com', 'Cần Thơ', 'user'),
(2, 'admin', 'admin', 'nttan2001042@student.ctuet.edu.vn', 'Cần Thơ', 'admin'),
(9, 'ahihihi', 'ahihihi     ', 'ahihihi@gmail.com', 'Cần Thơ', 'user'),
(10, 'admin22', '222    ', 'test22@gmail.com', 'Cần Thơ', 'user'),
(15, 'ngothanhtan', '12345678', 'ngothanhtan@gmail.com', 'Cần Thơ', 'user'),
(16, 'adminnguvl', 'adminnguvl     ', 'adminnguvl@gmail.com', 'Cần Thơ', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id_cart_detail`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_cate` (`id_cate`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`),
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_cate`) REFERENCES `category` (`id_cate`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
