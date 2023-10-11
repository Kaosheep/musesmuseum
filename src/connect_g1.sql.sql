
DROP TABLE IF EXISTS `closed`;
CREATE TABLE IF NOT EXISTS `closed` (
  `closed_id` int NOT NULL AUTO_INCREMENT,
  `closed_date` date NOT NULL,
  `closed_rfc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '例行休館',
  PRIMARY KEY (`closed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `closed` (`closed_id`, `closed_date`, `closed_rfc`) VALUES
(1, '2023-01-06', '例行休館'),
(2, '2023-02-03', '例行休館'),
(3, '2023-03-03', '例行休館'),
(4, '2023-03-15', '管線維修'),
(5, '2023-04-07', '例行休館'),
(6, '2023-05-05', '例行休館'),
(7, '2023-06-02', '例行休館'),
(8, '2023-07-07', '例行休館'),
(9, '2023-08-04', '例行休館'),
(10, '2023-08-17', '漏水檢測'),
(11, '2023-09-01', '例行休館'),
(12, '2023-10-06', '例行休館'),
(13, '2023-11-03', '例行休館'),
(14, '2023-12-01', '例行休館');

DROP TABLE IF EXISTS `counties`;
CREATE TABLE IF NOT EXISTS `counties` (
  `county_id` int NOT NULL,
  `county_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`county_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `counties` (`county_id`, `county_name`) VALUES
(1, '基隆市'),
(2, '台北市'),
(3, '新北市'),
(4, '桃園縣'),
(5, '新竹市'),
(6, '新竹縣'),
(7, '苗栗縣'),
(8, '台中市'),
(9, '彰化縣'),
(10, '南投縣'),
(11, '雲林縣'),
(12, '嘉義市'),
(13, '嘉義縣'),
(14, '台南市'),
(15, '高雄市'),
(16, '屏東縣'),
(17, '台東縣'),
(18, '花蓮縣'),
(19, '宜蘭縣'),
(20, '澎湖縣'),
(21, '金門縣'),
(22, '連江縣'),
(23, '南海諸島');

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `district_id` int NOT NULL,
  `district_name` varchar(20) DEFAULT NULL,
  `county_id` int NOT NULL,
  PRIMARY KEY (`district_id`,`county_id`),
  KEY `fk_districts_county_id` (`county_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `districts` (`district_id`, `district_name`, `county_id`) VALUES
(100, '中正區', 2),
(103, '大同區', 2),
(104, '中山區', 2),
(105, '松山區', 2),
(106, '大安區', 2),
(108, '萬華區', 2),
(110, '信義區', 2),
(111, '士林區', 2),
(112, '北投區', 2),
(114, '內湖區', 2),
(115, '南港區', 2),
(116, '文山區', 2),
(200, '仁愛區', 1),
(201, '信義區', 1),
(202, '中正區', 1),
(203, '中山區', 1),
(204, '安樂區', 1),
(205, '暖暖區', 1),
(206, '七堵區', 1),
(207, '萬里區', 3),
(208, '金山區', 3),
(209, '南竿鄉', 22),
(210, '北竿鄉', 22),
(211, '莒光鄉', 22),
(212, '東引鄉', 22),
(220, '板橋區', 3),
(222, '深坑區', 3),
(223, '石碇區', 3),
(226, '平溪區', 3),
(227, '雙溪區', 3),
(228, '貢寮區', 3),
(231, '新店區', 3),
(233, '烏來區', 3),
(235, '中和區', 3),
(237, '三峡區', 3),
(238, '樹林區', 3),
(239, '鶯歌區', 3),
(241, '三重區', 3),
(242, '新莊區', 3),
(243, '泰山區', 3),
(244, '林口區', 3),
(247, '蘆洲區', 3),
(248, '五股區', 3),
(249, '八里區', 3),
(251, '淡水區', 3),
(252, '三芝區', 3),
(253, '石門區', 3),
(260, '宜蘭市', 19),
(261, '頭城鎮', 19),
(262, '礁溪鄉', 19),
(263, '壯圍鄉', 19),
(264, '員山鄉', 19),
(265, '羅東鎮', 19),
(266, '三星鄉', 19),
(267, '大同鄉', 19),
(268, '五結鄉', 19),
(269, '冬山鄉', 19),
(270, '蘇澳鎮', 19),
(272, '南澳鄉', 19),
(290, '釣魚台列嶼', 19),
(302, '竹北市', 6),
(303, '湖口鄉', 6),
(304, '新豐鄉', 6),
(305, '新埔鎮', 6),
(306, '關西鎮', 6),
(307, '芎林鄉', 6),
(308, '寶山鄉', 6),
(310, '竹東鎮', 6),
(311, '五峰鄉', 6),
(312, '橫山鄉', 6),
(313, '尖石鄉', 6),
(314, '北埔鄉', 6),
(315, '峨眉鄉', 6),
(320, '中壢區', 4),
(324, '平鎮區', 4),
(325, '龍潭區', 4),
(326, '楊梅區', 4),
(327, '新屋區', 4),
(328, '觀音區', 4),
(330, '桃園區', 4),
(333, '龜山區', 4),
(334, '八德區', 4),
(335, '大溪區', 4),
(336, '復興區', 4),
(337, '大園區', 4),
(338, '蘆竹區', 4),
(350, '竹南鎮', 7),
(351, '頭份市', 7),
(352, '三灣鄉', 7),
(353, '南庄鄉', 7),
(354, '獅潭鄉', 7),
(356, '後龍鎮', 7),
(357, '通霄鎮', 7),
(358, '苑裡鎮', 7),
(360, '苗栗市', 7),
(361, '造橋鄉', 7),
(362, '頭屋鄉', 7),
(363, '公館鄉', 7),
(364, '大湖鄉', 7),
(365, '泰安鄉', 7),
(366, '銅鑼鄉', 7),
(367, '三義鄉', 7),
(368, '西湖鄉', 7),
(369, '卓蘭鎮', 7),
(400, '中區', 8),
(401, '東區', 8),
(402, '南區', 8),
(403, '西區', 8),
(404, '北區', 8),
(406, '北屯區', 8),
(407, '西屯區', 8),
(408, '南屯區', 8),
(411, '太平區', 8),
(412, '大里區', 8),
(413, '霧峰區', 8),
(414, '烏日區', 8),
(420, '豐原區', 8),
(421, '后里區', 8),
(422, '石岡區', 8),
(423, '東勢區', 8),
(424, '和平區', 8),
(426, '新社區', 8),
(427, '潭子區', 8),
(428, '大雅區', 8),
(429, '神岡區', 8),
(432, '大肚區', 8),
(433, '沙鹿區', 8),
(434, '龍井區', 8),
(435, '梧棲區', 8),
(436, '清水區', 8),
(437, '大甲區', 8),
(438, '外埔區', 8),
(439, '大安區', 8),
(500, '彰化市', 9),
(502, '芬園鄉', 9),
(503, '花壇鄉', 9),
(504, '秀水鄉', 9),
(505, '鹿港鎮', 9),
(506, '福興鄉', 9),
(507, '線西鄉', 9),
(508, '和美鎮', 9),
(509, '伸港鄉', 9),
(510, '員林鎮', 9),
(511, '社頭鄉', 9),
(512, '永靖鄉', 9),
(513, '埔心鄉', 9),
(514, '溪湖鎮', 9),
(515, '大村鄉', 9),
(516, '埔鹽鄉', 9),
(520, '田中鎮', 9),
(521, '北斗鎮', 9),
(522, '田尾鄉', 9),
(523, '埤頭鄉', 9),
(524, '溪州鄉', 9),
(525, '竹塘鄉', 9),
(526, '二林鎮', 9),
(527, '大城鄉', 9),
(528, '芳苑鄉', 9),
(530, '二水鄉', 9),
(540, '南投市', 10),
(541, '中寮鄉', 10),
(542, '草屯鎮', 10),
(544, '國姓鄉', 10),
(545, '埔里鎮', 10),
(546, '仁愛鄉', 10),
(551, '名間鄉', 10),
(552, '集集鎮', 10),
(553, '水里鄉', 10),
(555, '魚池鄉', 10),
(556, '信義鄉', 10),
(557, '竹山鎮', 10),
(558, '鹿谷鄉', 10),
(602, '番路鄉', 13),
(603, '梅山鄉', 13),
(604, '竹崎鄉', 13),
(605, '阿里山鄉', 13),
(606, '中埔鄉', 13),
(607, '大埔鄉', 13),
(608, '水上鄉', 13),
(611, '鹿草鄉', 13),
(612, '太保市', 13),
(613, '朴子市', 13),
(614, '東石鄉', 13),
(615, '六腳鄉', 13),
(616, '新港鄉', 13),
(621, '民雄鄉', 13),
(622, '大林鎮', 13),
(623, '溪口鄉', 13),
(624, '義竹鄉', 13),
(625, '布袋鎮', 13),
(630, '斗南鎮', 11),
(631, '大埤鄉', 11),
(632, '虎尾鎮', 11),
(633, '土庫鎮', 11),
(634, '褒忠鄉', 11),
(635, '東勢鄉', 11),
(636, '臺西鄉', 11),
(637, '崙背鄉', 11),
(638, '麥寮鄉', 11),
(640, '斗六市', 11),
(643, '林內鄉', 11),
(646, '古坑鄉', 11),
(647, '莿桐鄉', 11),
(648, '西螺鎮', 11),
(649, '二崙鄉', 11),
(651, '北港鎮', 11),
(652, '水林鄉', 11),
(653, '口湖鄉', 11),
(654, '四湖鄉', 11),
(655, '元長鄉', 11),
(700, '中西區', 14),
(701, '東區', 14),
(702, '南區', 14),
(704, '北區', 14),
(708, '安平區', 14),
(709, '安南區', 14),
(710, '永康區', 14),
(711, '歸仁區', 14),
(712, '新化區', 14),
(713, '左鎮區', 14),
(714, '玉井區', 14),
(715, '楠西區', 14),
(716, '南化區', 14),
(717, '仁德區', 14),
(718, '關廟區', 14),
(719, '龍崎區', 14),
(720, '官田區', 14),
(721, '麻豆區', 14),
(722, '佳里區', 14),
(723, '西港區', 14),
(724, '七股區', 14),
(725, '將軍區', 14),
(726, '學甲區', 14),
(727, '北門區', 14),
(730, '新營區', 14),
(731, '後壁區', 14),
(732, '白河區', 14),
(733, '東山區', 14),
(734, '六甲區', 14),
(735, '下營區', 14),
(736, '柳營區', 14),
(737, '鹽水區', 14),
(741, '善化區', 14),
(742, '大內區', 14),
(743, '山上區', 14),
(744, '新市區', 14),
(745, '安定區', 14),
(800, '新興區', 15),
(801, '前金區', 15),
(802, '苓雅區', 15),
(803, '鹽埕區', 15),
(804, '鼓山區', 15),
(805, '旗津區', 15),
(806, '前鎮區', 15),
(807, '三民區', 15),
(811, '楠梓區', 15),
(812, '小港區', 15),
(813, '左營區', 15),
(814, '仁武區', 15),
(815, '大社區', 15),
(817, '東沙', 23),
(819, '南沙', 23),
(820, '岡山區', 15),
(821, '路竹區', 15),
(822, '阿蓮區', 15),
(823, '田寮區', 15),
(824, '燕巢區', 15),
(825, '橋頭區', 15),
(826, '梓官區', 15),
(827, '彌陀區', 15),
(828, '永安區', 15),
(829, '湖內區', 15),
(830, '鳳山區', 15),
(831, '大寮區', 15),
(832, '林園區', 15),
(833, '鳥松區', 15),
(840, '大樹區', 15),
(842, '旗山區', 15),
(843, '美濃區', 15),
(844, '六龜區', 15),
(845, '內門區', 15),
(846, '杉林區', 15),
(847, '甲仙區', 15),
(848, '桃源區', 15),
(849, '那瑪夏區', 15),
(851, '茂林區', 15),
(852, '茄萣區', 15),
(880, '馬公市', 20),
(881, '西嶼鄉', 20),
(882, '望安鄉', 20),
(883, '七美鄉', 20),
(884, '白沙鄉', 20),
(885, '湖西鄉', 20),
(890, '金沙鎮', 21),
(891, '金湖鎮', 21),
(892, '金寧鄉', 21),
(893, '金城鎮', 21),
(894, '烈嶼鄉', 21),
(896, '烏坵鄉', 21),
(900, '屏東市', 16),
(901, '三地門鄉', 16),
(902, '霧臺鄉', 16),
(903, '瑪家鄉', 16),
(904, '九如鄉', 16),
(905, '里港鄉', 16),
(906, '高樹鄉', 16),
(907, '盬埔鄉', 16),
(908, '長治鄉', 16),
(909, '麟洛鄉', 16),
(911, '竹田鄉', 16),
(912, '內埔鄉', 16),
(913, '萬丹鄉', 16),
(920, '潮州鎮', 16),
(921, '泰武鄉', 16),
(922, '來義鄉', 16),
(923, '萬巒鄉', 16),
(924, '崁頂鄉', 16),
(925, '新埤鄉', 16),
(926, '南州鄉', 16),
(927, '林邊鄉', 16),
(928, '東港鎮', 16),
(929, '琉球鄉', 16),
(931, '佳冬鄉', 16),
(932, '新園鄉', 16),
(940, '枋寮鄉', 16),
(941, '枋山鄉', 16),
(942, '春日鄉', 16),
(943, '獅子鄉', 16),
(944, '車城鄉', 16),
(945, '牡丹鄉', 16),
(946, '恆春鎮', 16),
(947, '滿州鄉', 16),
(950, '臺東市', 17),
(951, '綠島鄉', 17),
(952, '蘭嶼鄉', 17),
(953, '延平鄉', 17),
(954, '卑南鄉', 17),
(955, '鹿野鄉', 17),
(956, '關山鎮', 17),
(957, '海端鄉', 17),
(958, '池上鄉', 17),
(959, '東河鄉', 17),
(961, '成功鎮', 17),
(962, '長濱鄉', 17),
(963, '太麻里鄉', 17),
(964, '金峰鄉', 17),
(965, '大武鄉', 17),
(966, '達仁鄉', 17),
(970, '花蓮市', 18),
(971, '新城鄉', 18),
(972, '秀林鄉', 18),
(973, '吉安鄉', 18),
(974, '壽豐鄉', 18),
(975, '鳳林鎮', 18),
(976, '光復鄉', 18),
(977, '豐濱鄉', 18),
(978, '瑞穗鄉', 18),
(979, '萬 榮', 18),
(981, '玉里鎮', 18),
(982, '卓溪鄉', 18),
(983, '富里鄉', 18),
(3001, '東區', 5),
(3002, '北區', 5),
(3003, '香山區', 5),
(6001, '東區', 12),
(6002, '西區', 12);

DROP TABLE IF EXISTS `exhibitions`;
CREATE TABLE IF NOT EXISTS `exhibitions` (
  `exh_id` varchar(10) NOT NULL,
  `exh_name` varchar(30) DEFAULT NULL,
  `exh_desc` varchar(250) DEFAULT NULL,
  `exh_img` varchar(25) DEFAULT NULL,
  `exh_startdate` date DEFAULT NULL,
  `exh_enddate` date DEFAULT NULL,
  `exh_loc` varchar(50) DEFAULT NULL,
  `exh_status` tinyint DEFAULT '0' COMMENT '0：未上架, 1：上架',
  PRIMARY KEY (`exh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `exhibitions` (`exh_id`, `exh_name`, `exh_desc`, `exh_img`, `exh_startdate`, `exh_enddate`, `exh_loc`, `exh_status`) VALUES
('EXH001', '獨居沙漠，藝術家喬治亞．歐姬芙', '喬治亞·歐姬芙是20世紀的藝術大師，其作品構圖極簡，卻以十足的色彩和精準的線條，巧妙地平衡了畫面。將沙漠變成美麗疆土，不論是寂靜的荒原抑或白骨殘骸，都變得充滿生氣。', 'spec_ex1.png', '2023-09-01', '2023-11-30', '展區B', 0),
('EXH002', '春之詠歌：多彩藝術的季節', '來自各地藝術家們帶來的多種形式的作品，包括繪畫、雕塑、攝影、錄像藝術、裝置藝術和互動藝術。透過不同的媒介和風格，試圖捕捉春天所帶來的生命力和變化。', 'spec_ex0.jpg', '2023-10-01', '2023-12-30', '展區A', 0),
('EXH003', '派對對物：人要金裝，動物要衣裝', '當代藝術大師摳擬機挖，獨特的展覽呈現一系列令人驚艷的藝術品，以人與動物為靈感，讓觀眾沉浸在視覺和感官的享受中，引發許多社會議題的思考，隱喻環保和動物權益的問題。', 'spec_ex2.jpg', '2023-11-01', '2024-01-30', '展區C', 0),
('EXH004', '線條、形狀、空間：建築美學的探索', '本展將呈現現代建築師如何運用線條、形狀和空間來實現獨樹一格的建築美學，並展示建築如何與環境互動，創造出獨特的視覺和情感體驗。', 'spec_ex3.jpg', '2023-12-01', '2024-03-30', '展區D', 0),
('EXH005', '迷幻的萬花筒：點點的哲學和無邊無際的領悟', '融合了忠於自我的藝術表現和激進大膽的實驗，藝術家不受任何形式的拘束，以圓點與放射條狀圖騰為主題，進行了反覆的探索和呈現，完美地呈現了整個展覽的感官刺激。請隨著點點的引導，沉浸在這個充滿驚喜和探索的藝術之旅中，感受藝術家對視覺的無限詮釋，並讓您的想像力自由飛翔。', 'spec_ex4.jpg', '2024-01-30', '2024-03-30', '展區A', 0);

DROP TRIGGER IF EXISTS `generate_exh_id`;
DELIMITER $$
CREATE TRIGGER `generate_exh_id` BEFORE INSERT ON `exhibitions` FOR EACH ROW BEGIN
	SET NEW.exh_id = CONCAT('EXH', LPAD((SELECT COUNT(*) + 1 FROM exhibitions), 3, '0'));
END
$$
DELIMITER ;


DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `faq_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_ans` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `faq` (`faq_id`, `faq_question`, `faq_ans`) VALUES
('QA001', 'Q：購票及館內消費可否刷卡或使用行動支付?', 'A：館內有設置刷卡機的地點皆可使用信用卡服務。'),
('QA002', 'Q：請問博物館可以退票、或更換票種嗎？有手續費嗎？', 'A：可以，退票或更換票種酌收票面金額10%手續費。'),
('QA003', 'Q：請問有提供行動不便者的相關服務嗎?', 'A：本館服務台提供有輪椅免費借用服務，如有需要者可洽詢服務台。並設有無障礙電梯、無障礙通行之緩坡等措施，以便行動不便者參觀。'),
('QA004', 'Q：請問有嬰幼兒的服務嗎？', 'A：本館服務台提供嬰兒推車借用服務，如有需要可洽詢服務台。並設有哺集乳室，可供嬰幼兒飲食及更換尿布。'),
('QA005', 'Q：請問館內是否有提供館內是否有提供免費的無線網路(WiFi)？', 'A：館內均有提供iTAIWAN無線上網服務，全區皆可使用。 '),
('QA006', 'Q：請問可以攜帶寵物可以入館嗎？', 'A：本館嚴禁攜帶任何寵物入館，包含將寵物放置於寵物推車或寵物包內等任何形式，均不可攜帶入館，另本館恕無法協助代為寄放寵物。受合格訓練的導盲犬則不在此限。'),
('QA007', 'Q：如果有物品在館內遺失該怎麼辦？', 'A：請至服務台詢問，並填寫物品協尋表單，若有尋獲失物，我們將會與您聯繫。'),
('QA008', 'Q：入場後如須臨時離館，可否再次入館？', 'A：入場後如須臨時離館，可在出口處加蓋戳章，當日憑此戳章與票根可免費再次入館。'),
('QA009', 'Q：符合優惠票身分，但未攜帶證件，可否入場？', 'A：符合優惠資格者，參觀當日請備妥有效證件查驗，未攜帶者以普通票計。'),
('QA010', 'Q：請問博物館的開放時間？票價？', 'A：開館時間：週一～週五09:30~17:00，週六，週日及國定假日09:30~18:00。\r\n休館時間：每月第一個星期五，政府公告之天然災害停止上班日，其他必要之休館日將另行公告。'),
('QA011', 'Q：館內禁止飲食，但參觀時間較久時，請問哪裡可以喝水？', 'A：館內設有飲水機，可於飲水機旁飲用，請勿邊走邊喝或在欣賞展覽中飲用。'),
('QA012', 'Q：忘記網路會員帳號或密碼該怎麼辦？', 'A：只要輸入您於會員註冊時填寫的Email信箱，系統會自動將您的帳號與密碼寄至您的Email信箱。'),
('QA013', 'Q：請問博物館是否有提供置物櫃？ ', 'A：有的，館內提供收費置物櫃，提供觀眾置放小型行李。本寄物櫃僅供寄放，不負保管責任，貴重物品請隨身攜帶。'),
('QA014', 'Q：博物館內可以使用閃光燈拍照嗎？', 'A：為顧及避免造成對展品及影響來賓參觀品質，請勿使用閃光燈。');


DROP TRIGGER IF EXISTS `generate_fqa_id`;
DELIMITER $$
CREATE TRIGGER `generate_fqa_id` BEFORE INSERT ON `faq` FOR EACH ROW BEGIN
   SET NEW.faq_id = CONCAT('QA', LPAD((SELECT COUNT(*) + 1 FROM faq), 3, '0'));
END
$$
DELIMITER ;

DROP TABLE IF EXISTS `favoriteslist`;
CREATE TABLE IF NOT EXISTS `favoriteslist` (
  `prod_id` varchar(10) NOT NULL,
  `mbr_id` varchar(10) NOT NULL,
  PRIMARY KEY (`prod_id`,`mbr_id`),
  KEY `fk_favoriteslist_mbr_id` (`mbr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `favoriteslist` (`prod_id`, `mbr_id`) VALUES
('PROD001', 'M0001'),
('PROD002', 'M0001'),
('PROD003', 'M0001'),
('PROD004', 'M0002'),
('PROD005', 'M0002'),
('PROD006', 'M0003'),
('PROD007', 'M0004'),
('PROD008', 'M0004'),
('PROD009', 'M0004'),
('PROD010', 'M0005');

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `ma_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_psw` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_type` tinyint NOT NULL DEFAULT '0' COMMENT '0:部分,1:全權',
  PRIMARY KEY (`ma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `manager` (`ma_id`, `ma_name`, `ma_email`, `ma_psw`, `ma_type`) VALUES
('MA01', '陳小宇', 'money@yahoo.com', '123456', 1),
('MA02', '張玲玲', 'book@gmail.com', '123456', 0),
('MA03', '林阿國', 'airplane@yahoo.com.', '123456', 0),
('MA04', '李雅雅', 'barbecue@outlook.com', '123456', 0),
('MA05', '吳敏敏', 'eye@yahoo.com', '123456', 0);

DROP TRIGGER IF EXISTS `generate_ma_id`;
DELIMITER $$
CREATE TRIGGER `generate_ma_id` BEFORE INSERT ON `manager` FOR EACH ROW BEGIN
   SET NEW.ma_id = CONCAT('MA', LPAD((SELECT COUNT(*) + 1 FROM manager), 2, '0'));
END
$$
DELIMITER ;

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `mbr_id` varchar(10) NOT NULL,
  `mbr_email` varchar(100) DEFAULT NULL,
  `mbr_psw` varchar(30) DEFAULT NULL,
  `mbr_name` varchar(10) DEFAULT NULL,
  `mbr_phone` varchar(15) DEFAULT NULL,
  `mbr_birth` date DEFAULT NULL,
  `mbr_addr` varchar(40) DEFAULT NULL,
  `mbr_district` varchar(10) DEFAULT NULL,
  `mbr_city` varchar(10) DEFAULT NULL,
  `mbr_status` tinyint DEFAULT '0' COMMENT '0：一般會員, 1：凍結會員',
  PRIMARY KEY (`mbr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `members` (`mbr_id`, `mbr_email`, `mbr_psw`, `mbr_name`, `mbr_phone`, `mbr_birth`, `mbr_addr`, `mbr_district`, `mbr_city`, `mbr_status`) VALUES
('M0001', 'apple@gmail.com', 'qw123', '王小明', '0912345678', '1990-10-15', '北安路25巷7號2樓', '中山區', '台北市', 0),
('M0002', 'bicycle@yahoo.com', 'er456', '陳大華', '0923456789', '1985-02-28', '文化路30號', '板橋區', '新北市', 0),
('M0003', 'chocolate@outlook.com', 'ty789', '林小芳', '0934567890', '1998-05-20', '中山路50號', '西區', '台中市', 0),
('M0004', 'diamond@hotmail.com', 'ui012', '張小強', '0945678901', '1987-04-10', '光復路12號', '鳳山區', '高雄市', 0),
('M0005', 'elephant@yahoo.com.tw', 'op345', '李大宇', '0956789012', '1992-09-05', '東大路88號', '東區', '新竹市', 0),
('M0006', 'fountain@gmail.com', 'as678', '吳小美', '0967890123', '1997-12-03', '中山路60號', '北區', '台南市', 0),
('M0007', 'guitar@outlook.com', 'df901', '陳小龍', '0978901234', '1990-04-17', '民生路45號', '西區', '嘉義市', 0),
('M0008', 'honey@yahoo.com', 'gh234', '林大寶', '0989012345', '1993-08-22', '永和路100號', '永和區', '新北市', 0),
('M0009', 'island@gmail.com', 'jk567', '黃小玲', '0990123456', '1996-01-01', '文心路150號', '北屯區', '台中市', 0),
('M0010', 'rainbow@yahoo.com.tw', 'lz890', '陳建華', '0901234567', '1994-11-11', '民族一路200號', '三民區', '高雄市', 0),
('M0011', 'penguin@outlook.com', 'xc123', '王美玲', '0912345678', '1998-08-08', '東大路120號', '東區', '新竹市', 0),
('M0012', 'lemon@gmail.com', 'vb456', '李小新', '0923456789', '1995-02-15', '安和路80號', '安南區', '台南市', 0),
('M0013', 'mountain@gmail.com', 'nm789', '林靜香', '0934567890', '1997-12-31', '中山南路1號', '中正區', '台北市', 0),
('M0014', 'telescope@outlook.com', 'qw012', '吳大維', '0945678901', '1992-10-20', '三峡路50號', '三峡區', '新北市', 0),
('M0015', 'umbrella@yahoo.com', 'er345', '陳思樂', '0956789012', '1993-10-05', '成功二路88號', '前鎮區', '高雄市', 0);


DROP TRIGGER IF EXISTS `generate_mbr_id`;
DELIMITER $$
CREATE TRIGGER `generate_mbr_id` BEFORE INSERT ON `members` FOR EACH ROW BEGIN
	SET NEW.mbr_id = CONCAT('M', LPAD((SELECT COUNT(*) + 1 FROM members), 4, '0'));
END
$$
DELIMITER ;

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_date` date NOT NULL,
  `news_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未上架,1:上架',
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `news` (`news_id`, `news_title`, `news_content`, `news_date`, `news_img`, `news_status`) VALUES
('N202301', '抽象藝術簡談', '本館將舉辦一系列藝術家講座，本次邀請知明藝術家小林堅丙、伍時媛分享他們的創作理念和經驗。為藝術愛好者提供與藝術家近距離互動的機會。', '2023-08-01', 'n0.jpg', 0),
('N202302', '文青集社—意象創作展', '近期熱門的文青集社來了!除了於本館展出最新作品外，經典系列也會收錄在這次創作展中。喜愛文青集社作品的人可別錯過了!', '2023-08-15', 'n1.jpg', 0),
('N202303', '清晨台北', '攝影新星—巫隆迺，用最擅長的黑白鏡頭帶領大家一同深入台灣角落。感受發生於台北之中的各種酸甜苦辣', '2023-09-09', 'n2.jpg', 0),
('N202304', '線上精選商城隆重開幕', '全新的線上商城上線啦!無論您是藝術愛好者、收藏家或是想要擁有獨特的物品的人，我們的精選商城都可以滿足您的需求。', '2023-09-21', 'n3.jpg', 0),
('N202305', 'Trick or Treat不看展就搗蛋', '快帶著孩子打扮打扮，出門看展覽囉，開心過萬聖節！', '2023-09-30', 'n4.jpg', 0),
('N202306', '「舞．藝大豐收」創新突破！藝術X舞蹈跨界啟蒙 ', '看名畫雕塑 玩身體遊戲  超有趣的藝術創作 最好玩的肢體開發', '2023-10-25', 'n5.jpg', 0),
('N202307', '全家一起來！聖誕節音樂會互動展', '讓音樂親近每個家庭，讓孩子沉浸音符世界，讓父母獲得片刻的放鬆', '2023-11-10', 'n6.jpg', 0),
('N202308', '導覽手語特開場，歡迎聽障朋友一起來參加！', '您有「看」過精彩又生動的「聾導覽」嗎？本遊程由聾人導覽員以臺灣手語進行導覽解說，並搭配手語翻譯員的口語翻譯。\r\n邀請聾人朋友及對手語有興趣者報名，一起用心「看見」、感受文學轉譯為手語，動靜交錯間的語言藝術之美。', '2023-11-28', 'n7.jpg', 0),
('N202309', '奶油X砂糖的奇妙旅程', '每個窗裡有著不同的故事任由你自由穿越感受這奇幻的旅程，一步一步帶領你走入繽紛絢爛的下午茶世界！', '2023-12-25', 'n8.jpg', 0),
('N202310', '博物館新視野：台灣博物館40週年國際研討會', '博物館肩負著藝術保存、研究、發展與普及的使命，並以服務社會大眾、強化公共服務為已任。惟近年世界各國，尤其是亞洲國家正面臨著人口高齡化的巨大挑戰，博物館如何回應人口變化的衝擊、了解觀眾，將是永續發展的契機。', '2023-12-30', 'n9.jpg', 0);

DROP TRIGGER IF EXISTS `generate_news_id`;
DELIMITER $$
CREATE TRIGGER `generate_news_id` BEFORE INSERT ON `news` FOR EACH ROW BEGIN
SET NEW.news_id = CONCAT('N', DATE_FORMAT(NOW(), '%Y'), LPAD((SELECT COUNT(*) + 1 FROM news), 2, '0'));
END
$$
DELIMITER ;

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` varchar(10) NOT NULL,
  `prod_name` varchar(25) DEFAULT NULL,
  `prod_desc` varchar(350) DEFAULT NULL,
  `prod_img` varchar(25) DEFAULT NULL,
  `prod_fixedprice` decimal(10,2) DEFAULT NULL,
  `prod_spec` varchar(100) DEFAULT NULL,
  `prod_sellingprice` decimal(10,2) DEFAULT NULL,
  `prod_status` tinyint DEFAULT '0' COMMENT '0：未上架, 1：上架',
  `prod_kind` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_desc`, `prod_img`, `prod_fixedprice`, `prod_spec`, `prod_sellingprice`, `prod_status`, `prod_kind`) VALUES
('PROD001', 'MUSES博物館迷你模型', 'MUSES博物館迷你模型，是一個極具藝術價值的小型複製品，讓您簡易方便有趣的展示欣賞標準的N比例博物館模型，將它擺放在書桌或櫃子上，讓您每天都能感受到藝術和知識的魅力。', 'productimage0.png', '1499.00', '尺寸：長22.1寬7.1高4.3CM；材質：ABS丙烯腈-丁二烯-苯乙烯；備註：網頁商品會因螢幕品牌或解析度不同而有色差，請以實品為主。', '1499.00', 1, '所有商品'),
('PROD002', 'MUSES聯名咖啡杯盤組', 'MUSES杯盤組不僅美觀且實用。不僅重量只有一般陶器的一半，給您帶來極佳的操作體驗。其復古別緻的設計風格能更能為您的用餐場合增添獨特的韻味，而合理的價格則讓它成為日常餐桌的輕鬆選擇。', 'productimage1.png', '699.00', '尺寸：杯：直徑11cm高7.4cm(210cc)；盤：直徑15.6cm高2.2cm；材質：陶瓷；備註：網頁商品會因螢幕品牌或解析度不同而有色差，請以實品為主。', '699.00', 1, '所有商品,聯名系列,生活用品'),
('PROD003', 'MUSES聯名帆布袋', '這款袋子由100%有機棉製成，堅固耐用，能輕鬆應對您的日常物品。寬敞的內部空間可容納各種物品，而設計精良的手柄則確保了舒適的攜帶。不論是購物、上班還是旅行，我們的帆布袋都將成為您的首選，並展現您的個性和風格。', 'productimage2.png', '450.00', '尺寸：長34cm寬2cm高37cm；材質：100%有機棉；備註：網頁商品會因螢幕品牌或解析度不同而有色差，請以實品為主。', '450.00', 1, '所有商品,聯名系列,生活用品'),
('PROD004', '有機橄欖油皂', 'MUSES的有機橄欖油皂是天然護膚的極致之選。這款手工皂不含硫酸鹽類界面活性劑，溫和且對肌膚安全，以高品質的有機橄欖油為基礎，深層滋潤和保濕肌膚，同時尊重環境，是您追求自然美和地球友善生活方式的完美選擇。', 'productimage3.png', '250.00', '成分：特級初榨橄欖油/水/海鹽/天然純精油；重量：150g；不含人工香精/防腐劑/SLS、SLES、EDTA；備註：使用後若有出現不適症狀，請立即停止使用，並請教專業醫師。', '250.00', 1, '所有商品,生活用品'),
('PROD005', '派對動物畫作-長頸鹿款', '可以色彩繽紛，可以氣勢威猛，可以千變萬化，有無限的可能，我的每幅畫都朝著我不斷尋求的和諧邁進了一步。', 'productimage4.png', '2999.00', '長42cm寬59.4cm；備註：作品裱框產品為接單訂製品，請確認您的需求後再下單購買。', '2999.00', 1, '所有商品'),
('PROD006', '手繪紅鶴小廢包', '手繪紅鶴小廢包將藝術與實用完美結合。每個包包都由熟練的藝術家精心繪製，細膩地呈現了一隻紅鶴的美麗。這個小巧又迷人的手提包，可容納各種小物品，從筆記本到化妝品通通沒問題。小而不廢，還能為您的日常帶來一絲藝術氛圍。', 'productimage5.png', '3000.00', '尺寸：寬30cm高25cm底厚8cm；材質：植鞣真牛皮；備註：手繪商品每件有些微差異，這也是手繪的魅力之處，請以實品為主。', '3000.00', 1, '所有商品,熱銷Top5,生活用品'),
('PROD007', '派對動物T-shirt-羚羊款', '四季必備單品，每月熱銷破百件，網友推薦最有特色T-shirt！這款T-shirt以精美的羚羊圖案為特色，帶來一種自然和奔放的感覺。', 'productimage6.png', '400.00', '尺寸：肩寬42cm胸寬53cm袖長22cm衣長71cm；材質：100%有機棉；備註：本尺寸表會因商品素材不同，可能與實際尺寸略有誤差。', '400.00', 1, '所有商品,熱銷Top5,生活用品'),
('PROD008', '睡蓮香水30ml', '無法抗拒的暖陽吻痕香，開啟清新香調感官，以玉米發酵的蒸餾酒精製成，不刺激肌膚，介於淡香精與身體噴霧之間，濃淡適宜給予人最舒服的香氣距離。睡蓮的精緻之美與優雅活潑的橙花美妙共鳴，彷彿沐浴在地中海陽光下的橙色果園。', 'productimage7.png', '1500.00', '初調：橙花純露；中調：睡蓮；後調：雪松、麝香、檀香木；持久度：4-6HR；備註：使用後若有過敏請即刻停止使用，並請教醫生。有傷口濕疹，紅腫等皮膚異常時請勿使用。', '1500.00', 1, '所有商品,熱銷Top5,生活用品'),
('PROD009', '美學聯名-肖楠葉平衡乳液', '肖楠枝葉萃取，提升肌膚的防禦力、角鯊烷幫助肌膚補水、肉桂萃取，調理肌膚油脂。一款由薰衣草和廣藿香精油調和，給予城市人一股自然療癒。', 'productimage8.png', '1000.00', '尺寸：長7cm寬6.6cm高16cm；容量：330ml；備註：如不慎接觸眼睛，以清水沖洗。', '1000.00', 1, '所有商品,熱銷Top5,生活用品'),
('PROD010', '派對動物筆記本-無尾熊款', '電子產品肆意發展的如今，筆記本電腦和手機已經逐漸替代了傳統手寫筆記本，你還記得當初那些開心的不開心的日子，隨手記下的心情嗎？這些流水賬式的敘述，都在提醒你珍惜每個陪在身邊的朋友，那些有關青春的美好記憶。筆記本不僅是優雅實用的傳統文化禮品，也是暫時丟開手機和電腦，感受手寫快樂的方式。', 'productimage9.png', '350.00', '尺寸：10.5cmx14.5cmx0.6cm；材質：PU皮革、紙質；內頁材質：道林紙80g_黑白印刷；備註：商品會因螢幕品牌或解析度不同而有色差，請以實品為主。', '350.00', 1, '所有商品,辦公文具'),
('PROD011', '名作筆記本-草地上的聖母', '電子產品肆意發展的如今，筆記本電腦和手機已經逐漸替代了傳統手寫筆記本，你還記得當初那些開心的不開心的日子，隨手記下的心情嗎？這些流水賬式的敘述，都在提醒你珍惜每個陪在身邊的朋友，那些有關青春的美好記憶。筆記本不僅是優雅實用的傳統文化禮品，也是暫時丟開手機和電腦，感受手寫快樂的方式。', 'productimage10.png', '350.00', '尺寸：10.5cmx14.5cmx0.6cm；材質：PU皮革、紙質；內頁材質：道林紙80g_黑白印刷；備註：商品會因螢幕品牌或解析度不同而有色差，請以實品為主。', '350.00', 1, '所有商品,辦公文具'),
('PROD012', '攝影掛畫-城市的映象', '是一幅獨特的藝術品，將城市的美麗瞬間凝固在畫布上。透過光與影，揮灑出濃淡深淺交錯的灰與黑，把盛夏的陽光掛上牆。', 'productimage11.png', '4500.00', '長42cm寬59.4cm；備註：作品裱框產品為接單訂製品，請確認您的需求後再下單購買。', '4500.00', 1, '所有商品'),
('PROD013', '瓢蟲聯名帆布袋', '這款袋子由100%有機棉製成，堅固耐用，能輕鬆應對您的日常物品。寬敞的內部空間可容納各種物品，讓這些小瓢蟲不論是購物、上班還是旅行都陪伴著您。', 'productimage12.png', '550.00', '尺寸：長34cm寬2cm高37cm；材質：100%有機棉；備註：網頁商品會因螢幕品牌或解析度不同而有色差，請以實品為主。', '550.00', 1, '所有商品,生活用品'),
('PROD014', '皮革筆記本-黑', '電子產品肆意發展的如今，筆記本電腦和手機已經逐漸替代了傳統手寫筆記本，你還記得當初那些開心的不開心的日子，隨手記下的心情嗎？這些流水賬式的敘述，都在提醒你珍惜每個陪在身邊的朋友，那些有關青春的美好記憶。筆記本不僅是優雅實用的傳統文化禮品，也是暫時丟開手機和電腦，感受手寫快樂的方式。', 'productimage13.png', '350.00', '尺寸：10.5cmx14.5cmx0.6cm；材質：PU皮革、紙質；內頁材質：道林紙80g_黑白印刷；備註：商品會因螢幕品牌或解析度不同而有色差，請以實品為主。', '350.00', 1, '所有商品,辦公文具'),
('PROD015', 'MUSES聯名筆記本', '電子產品肆意發展的如今，筆記本電腦和手機已經逐漸替代了傳統手寫筆記本，你還記得當初那些開心的不開心的日子，隨手記下的心情嗎？這些流水賬式的敘述，都在提醒你珍惜每個陪在身邊的朋友，那些有關青春的美好記憶。筆記本不僅是優雅實用的傳統文化禮品，也是暫時丟開手機和電腦，感受手寫快樂的方式。', 'productimage14.png', '350.00', '尺寸：10.5cmx14.5cmx0.6cm；材質：PU皮革、紙質；內頁材質：道林紙80g_黑白印刷；備註：商品會因螢幕品牌或解析度不同而有色差，請以實品為主。', '350.00', 1, '所有商品,辦公文具,聯名系列'),
('PROD016', '維納斯口紅', '薄薄一層就能於雙唇表面鋪出唇奢華濃色亮澤感，雙重精油質地，滑順顯色零唇紋，水滴形狀尖角造型，細長的管身，時尚且具有唇刷的握感。', 'productimage15.png', '2500.00', '尺寸：直徑2cm長7.4cm；淨重：3.6g；保存期效：未開封36個月，開封後6個月', '2500.00', 1, '所有商品,時尚彩妝'),
('PROD017', '路易絲面膜', '以積雪草為主，能夠提升肌膚對環境刺激的抵抗力並維持膚況穩定。溫和配方，一款脆弱肌膚也能嘗試使用的面膜。溫和舒適，能夠明顯感受肌膚穩定，防止肌膚粗糙。', 'productimage16.png', '300.00', '規格：28ml/片、5片/盒；備註：請勿觸碰到眼睛，不慎觸碰到眼睛，請立即用清水沖洗。', '300.00', 1, '所有商品,時尚彩妝'),
('PROD018', 'MUSES聯名T-shirt', '簡約與風格的極致結合。這款T-shirt以優質有機棉製成，提供極致的舒適感，適合各種場合。無論是日常穿搭、運動時尚還是居家休閒，這個T恤都能融入您的生活，並讓您綻放自信。', 'productimage17.png', '400.00', '尺寸：肩寬42cm胸寬53cm袖長22cm衣長71cm；材質：100%有機棉；備註：本尺寸表會因商品素材不同，可能與實際尺寸略有誤差。', '400.00', 1, '所有商品,生活用品'),
('PROD019', '諾貝爾仿徽', '精心設計與製作的諾貝爾仿徽，展現出華麗的花紋和精緻的工藝。', 'productimage18.png', '3500.00', '尺寸：長3cm寬2.5cm；材質:合金、琺瑯；備註：請看清楚商品敘述的尺寸、品況，自行斟酌是否合適，不要看到美美的照片就衝動的下單囉!', '3500.00', 1, '所有商品,翻玩小物');

DROP TRIGGER IF EXISTS `generate_prod_id`;
DELIMITER $$
CREATE TRIGGER `generate_prod_id` BEFORE INSERT ON `products` FOR EACH ROW BEGIN
	SET NEW.prod_id = CONCAT('PROD', LPAD((SELECT COUNT(*) + 1 FROM products), 3, '0'));
END
$$
DELIMITER ;

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details` (
  `prod_dlt_id` varchar(10) NOT NULL,
  `prod_id` varchar(10) NOT NULL,
  `po_id` varchar(10) NOT NULL,
  `prod_dlt_actual_price` decimal(10,2) DEFAULT NULL,
  `prod_dlt_qty` int DEFAULT NULL,
  `prod_dlt_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`prod_id`,`po_id`),
  KEY `fk_product_details_po_id` (`po_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `product_details` (`prod_dlt_id`, `prod_id`, `po_id`, `prod_dlt_actual_price`, `prod_dlt_qty`, `prod_dlt_total`) VALUES
('POD26', 'PROD002', 'PO20230001', '699.00', 1, '699.00'),
('POD26', 'PROD004', 'PO20230002', '250.00', 1, '250.00'),
('POD26', 'PROD006', 'PO20230005', '3000.00', 1, '3000.00'),
('POD26', 'PROD007', 'PO20230002', '400.00', 1, '400.00'),
('POD26', 'PROD009', 'PO20230002', '1000.00', 1, '1000.00'),
('POD26', 'PROD009', 'PO20230005', '1000.00', 1, '1000.00'),
('POD26', 'PROD010', 'PO20230004', '350.00', 3, '1050.00'),
('POD26', 'PROD011', 'PO20230004', '350.00', 2, '700.00'),
('POD26', 'PROD012', 'PO20230003', '4500.00', 1, '4500.00'),
('POD26', 'PROD014', 'PO20230004', '350.00', 1, '350.00'),
('POD26', 'PROD015', 'PO20230004', '350.00', 4, '1400.00'),
('POD26', 'PROD017', 'PO20230005', '300.00', 1, '300.00');

DROP TRIGGER IF EXISTS `generate_prod_dlt_id`;
DELIMITER $$
CREATE TRIGGER `generate_prod_dlt_id` BEFORE INSERT ON `product_details` FOR EACH ROW BEGIN
	SET NEW.prod_dlt_id = CONCAT('POD', LPAD((SELECT COUNT(*) + 1 FROM ticket_details), 2, '0'));
END
$$
DELIMITER ;

DROP TABLE IF EXISTS `product_orders`;
CREATE TABLE IF NOT EXISTS `product_orders` (
  `po_id` varchar(10) NOT NULL,
  `mbr_id` varchar(10) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `po_status` tinyint DEFAULT '0' COMMENT '0：處理中, 1：已確認, 2：已出貨, 3：已完成',
  `po_pay` tinyint DEFAULT '0' COMMENT '0：未付款, 1：已付款',
  `po_sum` decimal(10,2) DEFAULT NULL,
  `po_addr` varchar(40) DEFAULT NULL,
  `po_area` varchar(10) DEFAULT NULL,
  `po_city` varchar(30) DEFAULT NULL,
  `po_phone` varchar(15) DEFAULT NULL,
  `po_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`po_id`),
  KEY `fk_pproduct_orders_mbr_id` (`mbr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `product_orders` (`po_id`, `mbr_id`, `po_date`, `po_status`, `po_pay`, `po_sum`, `po_addr`, `po_area`, `po_city`, `po_phone`, `po_name`) VALUES
('PO20230001', 'M0001', '2023-08-10', 3, 1, '699.00', '北安路25巷7號2樓', '中山區', '台北市', '0912345678', '王小明'),
('PO20230002', 'M0002', '2023-08-30', 3, 1, '1650.00', '文化路30號15-6樓', '板橋區', '新北市', '0923456789', '陳大華'),
('PO20230003', 'M0003', '2023-09-01', 2, 1, '4500.00', '中山路50號', '西區', '台中市', '0934567890', '林小芳'),
('PO20230004', 'M0004', '2023-09-21', 1, 1, '3500.00', '光復路12號4樓', '鳳山區', '高雄市', '0945678901', '張小強'),
('PO20230005', 'M0005', '2023-10-01', 0, 0, '4300.00', '文心路150號2樓', '北屯區', '台中市', '0956789012', '李大宇');

DROP TRIGGER IF EXISTS `generate_po_id`;
DELIMITER $$
CREATE TRIGGER `generate_po_id` BEFORE INSERT ON `product_orders` FOR EACH ROW BEGIN
	SET NEW.po_id = CONCAT('PO', YEAR(CURDATE()), LPAD((SELECT COUNT(*) + 1 FROM product_orders), 4, '0'));
END
$$
DELIMITER ;


DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `tkt_id` varchar(5) NOT NULL,
  `tkt_name` varchar(20) DEFAULT NULL,
  `tkt_price` int DEFAULT NULL,
  `tkt_desc` varchar(45) DEFAULT NULL,
  `tkt_status` tinyint DEFAULT '0' COMMENT '0：未上架, 1：上架',
  PRIMARY KEY (`tkt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `tickets` (`tkt_id`, `tkt_name`, `tkt_price`, `tkt_desc`, `tkt_status`) VALUES
('TKT01', '普通票', 200, '13歲(含)以上之遊客。', 0),
('TKT02', '兒童票', 100, '3歲(含)至12歲之兒童。', 0),
('TKT03', '優待票', 100, '65歲(含)以上之長者。', 0),
('TKT04', '愛心票', 100, '持有主管機關核發之身心障礙證明(手冊)者。', 0);

DROP TRIGGER IF EXISTS `generate_tkt_id`;
DELIMITER $$
CREATE TRIGGER `generate_tkt_id` BEFORE INSERT ON `tickets` FOR EACH ROW BEGIN
	SET NEW.tkt_id = CONCAT('TKT', LPAD((SELECT COUNT(*) + 1 FROM tickets), 2, '0'));
END
$$
DELIMITER ;

DROP TABLE IF EXISTS `ticket_details`;
CREATE TABLE IF NOT EXISTS `ticket_details` (
  `tkt_dlt_id` varchar(10) NOT NULL,
  `to_id` varchar(10) NOT NULL,
  `tkt_id` varchar(5) NOT NULL,
  `tkt_dlt_actual_price` decimal(10,2) DEFAULT NULL,
  `tkt_dlt_qty` int DEFAULT NULL,
  `tkt_dlt_qty_used` int DEFAULT NULL,
  `tkt_dlt_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`to_id`,`tkt_id`),
  KEY `fk_ticket_details_tkt_id` (`tkt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `ticket_details` (`tkt_dlt_id`, `to_id`, `tkt_id`, `tkt_dlt_actual_price`, `tkt_dlt_qty`, `tkt_dlt_qty_used`, `tkt_dlt_total`) VALUES
('TOD01', 'TO20090001', 'TKT01', '200.00', 4, 4, '800.00'),
('TOD02', 'TO20090001', 'TKT02', '100.00', 4, 4, '400.00'),
('TOD03', 'TO20090001', 'TKT03', '100.00', 2, 2, '200.00'),
('TOD04', 'TO20090002', 'TKT01', '200.00', 2, 2, '400.00'),
('TOD05', 'TO20090002', 'TKT02', '100.00', 2, 2, '200.00'),
('TOD06', 'TO20110001', 'TKT01', '200.00', 2, 2, '400.00'),
('TOD07', 'TO20110001', 'TKT02', '100.00', 3, 3, '300.00'),
('TOD08', 'TO20110002', 'TKT01', '200.00', 1, 1, '200.00'),
('TOD09', 'TO20110002', 'TKT02', '100.00', 2, 2, '200.00'),
('TOD10', 'TO20110002', 'TKT03', '100.00', 2, 2, '200.00'),
('TOD11', 'TO20150001', 'TKT01', '200.00', 2, 2, '400.00'),
('TOD12', 'TO20180001', 'TKT01', '200.00', 1, 1, '200.00'),
('TOD13', 'TO20190001', 'TKT01', '200.00', 2, 2, '400.00'),
('TOD14', 'TO20200001', 'TKT01', '200.00', 1, 1, '200.00'),
('TOD15', 'TO20200002', 'TKT02', '100.00', 1, 1, '100.00'),
('TOD16', 'TO20200002', 'TKT03', '100.00', 2, 2, '200.00'),
('TOD17', 'TO20210001', 'TKT01', '200.00', 2, 2, '400.00'),
('TOD18', 'TO20220001', 'TKT01', '200.00', 1, 1, '200.00'),
('TOD19', 'TO20220001', 'TKT03', '100.00', 1, 1, '100.00'),
('TOD20', 'TO20230001', 'TKT01', '200.00', 5, 5, '1000.00'),
('TOD21', 'TO20230001', 'TKT02', '100.00', 3, 3, '300.00'),
('TOD22', 'TO20230001', 'TKT03', '100.00', 2, 2, '200.00'),
('TOD23', 'TO20230002', 'TKT01', '200.00', 2, 2, '400.00'),
('TOD24', 'TO20230003', 'TKT01', '200.00', 5, 0, '1000.00'),
('TOD25', 'TO20230004', 'TKT03', '100.00', 2, 0, '200.00');

DROP TRIGGER IF EXISTS `generate_tkt_dlt_id`;
DELIMITER $$
CREATE TRIGGER `generate_tkt_dlt_id` BEFORE INSERT ON `ticket_details` FOR EACH ROW BEGIN
	SET NEW.tkt_dlt_id = CONCAT('TOD', LPAD((SELECT COUNT(*) + 1 FROM ticket_details), 2, '0'));
END
$$
DELIMITER ;

DROP TABLE IF EXISTS `ticket_orders`;
CREATE TABLE IF NOT EXISTS `ticket_orders` (
  `to_id` varchar(10) NOT NULL,
  `mbr_id` varchar(10) DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `to_sum` decimal(10,2) DEFAULT NULL,
  `to_pay_status` tinyint DEFAULT '0' COMMENT '0：未付款, 1：已付款',
  PRIMARY KEY (`to_id`),
  KEY `fk_ticket_orders_mbr_id` (`mbr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `ticket_orders` (`to_id`, `mbr_id`, `to_date`, `to_sum`, `to_pay_status`) VALUES
('TO20090001', 'M0001', '2009-11-05', '1400.00', 0),
('TO20090002', 'M0005', '2009-12-31', '600.00', 0),
('TO20110001', 'M0004', '2011-01-07', '700.00', 0),
('TO20110002', 'M0014', '2011-10-05', '600.00', 0),
('TO20150001', 'M0007', '2015-02-15', '400.00', 0),
('TO20180001', 'M0001', '2018-08-08', '200.00', 0),
('TO20190001', 'M0011', '2019-01-01', '400.00', 0),
('TO20200001', 'M0015', '2020-02-14', '200.00', 0),
('TO20200002', 'M0002', '2020-07-15', '300.00', 0),
('TO20210001', 'M0009', '2021-03-28', '400.00', 0),
('TO20220001', 'M0010', '2022-04-03', '300.00', 0),
('TO20230001', 'M0002', '2023-01-12', '1500.00', 0),
('TO20230002', 'M0003', '2023-04-22', '400.00', 0),
('TO20230003', 'M0010', '2023-08-17', '1000.00', 0),
('TO20230004', 'M0013', '2023-09-20', '600.00', 0);

DROP TRIGGER IF EXISTS `generate_to_id`;
DELIMITER $$
CREATE TRIGGER `generate_to_id` BEFORE INSERT ON `ticket_orders` FOR EACH ROW BEGIN
	SET NEW.to_id = CONCAT('TO', YEAR(CURDATE()), LPAD((SELECT COUNT(*) + 1 FROM ticket_orders), 4, '0'));
END
$$
DELIMITER ;

ALTER TABLE `districts`
  ADD CONSTRAINT `fk_districts_county_id` FOREIGN KEY (`county_id`) REFERENCES `counties` (`county_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `favoriteslist`
  ADD CONSTRAINT `fk_favoriteslist_mbr_id` FOREIGN KEY (`mbr_id`) REFERENCES `members` (`mbr_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_favoriteslist_prod_id` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `product_details`
  ADD CONSTRAINT `fk_product_details_po_id` FOREIGN KEY (`po_id`) REFERENCES `product_orders` (`po_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_details_prod_id` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `product_orders`
  ADD CONSTRAINT `fk_pproduct_orders_mbr_id` FOREIGN KEY (`mbr_id`) REFERENCES `members` (`mbr_id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `ticket_details`
  ADD CONSTRAINT `fk_ticket_details_tkt_id` FOREIGN KEY (`tkt_id`) REFERENCES `tickets` (`tkt_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ticket_details_to_id` FOREIGN KEY (`to_id`) REFERENCES `ticket_orders` (`to_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `ticket_orders`
  ADD CONSTRAINT `fk_ticket_orders_mbr_id` FOREIGN KEY (`mbr_id`) REFERENCES `members` (`mbr_id`) ON DELETE SET NULL ON UPDATE CASCADE;

