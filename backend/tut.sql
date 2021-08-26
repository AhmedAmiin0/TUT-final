-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 09:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tut`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(1, 'Historical', 'religious, historical, pharaonic and therapeutic place'),
(3, 'Beaches in Egypt', 'Egypt offers beachgoers much more than sunshiney, lazy days on the sand. Many of the resort beach towns strung out across the long swath of Egypt\'s Red Sea coastline are within day-tripping distance of the temples and tombs of Luxor, making them the perfe'),
(4, 'Cruising the Nile in Egypt', 'Cruising the Nile is one of Egypt\'s iconic experiences. Without the Nile, Egypt\'s grand Pharaonic civilization would never have survived and thrived across the centuries, dominating so much of what we know about the eastern Mediterranean\'s ancient world.\r\n\r\nToday the Nile still controls modern Egypt, with around 95 percent of the population living along its banks and in the river\'s delta region before it spills into the Mediterranean.\r\n\r\nA cruise along this river is a journey into Egypt\'s epic human history; the river banks scattered with Egypt\'s most famous vast temples and painted tomb sites.\r\n\r\nIt\'s also a taste of Egypt at its most lush and tranquil, and an up-close experience of the country\'s rural riverine scenery.'),
(5, 'Famous mosques in Egypt', 'Egypt is famous for its historical and famous Mosques mainly in Cairo as its known with the name of the 1000 Minarets which refers to the huge number of mosques in Egypt\'s Capital, Cairo.'),
(6, 'Leisure tourism places', 'Tourism in Cairo or the city of Cairo is a wonderful place where many recreational, cultural and historical tourist places meet. It is considered one of the most important tourism cities in Egypt. It is famous for its popular atmosphere and nightlife, where cafes and the Corniche are teeming with visitors coming to enjoy watching the Nile in the evening ');

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `expire` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `email`, `expire`, `code`) VALUES
(16, 'holdmycup0000@gmail.com', 1629655998, '48771');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `feedback_title` varchar(255) NOT NULL,
  `feedback_content` varchar(255) NOT NULL,
  `stars` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `feedback_title`, `feedback_content`, `stars`, `user_id`, `item_id`) VALUES
(1, 'good', 'The view from top is amazing entrance fees 50 egp and for viewfinder 10 egp, but the restaurant is expensive for one person minimum charge 250 Egyptian pound ', 8, 67, 117),
(2, 'good', 'معلم رائع يستحق الزيارة\r\nاتمنى منع المسوقين وعرض الخدمات بإلحاح في أعلى قمة البرج !!!\r\nهم مصدر ازعاج للزائر', 6, 72, 117),
(3, 'good', 'المكان رائع وجميل ، وهناك تنظيم في الصعود للبرج بأخذ تذكرة من شباك التذاكر وانتظار رقم التذكرة ، لكن وقت الانتظار طويل جدا', 8, 73, 117),
(4, 'good', 'المكان يتحدث عن نفسه،  سوف تشعر بمدى صغر البشر حجما وزمنا،  حفريات الحيتان من ملايين السنين و تمشى على سطح صلب بين صخور مشكلة لاعماق بحر ف منتهى القدم.. إحساس متناقض ولكنه رائع..', 10, 43, 105),
(5, 'good', 'You and your family can wander around the village, which is simple, and you can take souvenir photos of the designs of its houses and distinctive architectural buildings.\r\n\r\nYou can also enjoy spending some time on a family picnic within the green spaces ', 10, 47, 120),
(6, 'good', 'رائعة وجو ريفي جميل', 8, 48, 120),
(7, 'good', 'المكان رائع ولكن وجود السيارات والدراجات النارية في الممرات الضيقة والمزدحمة بالمارة شيء مزعج..\r\n', 6, 78, 6),
(8, 'good', 'مكان جميل جدا لمحبي الاثار والتاريخ وايضا مناسب لمحبي التصوير والتقاط صور انستقراميه رائعه\r\n', 8, 43, 9),
(9, 'good', 'The place has awe, fascination, and amazement, replete with the history of this land, which was first, and then was history from afar.\r\nA mixture of civilizations is evident in this place. I definitely recommend visiting it, so that the visitor stands ama', 8, 69, 14),
(10, 'good', 'من اهم معالم سيوة السياحية', 10, 47, 15),
(11, 'good', 'معبد فيلة من أروع المعابد في مصر يعتبر من المعابد الكاملة جميل جدا', 8, 78, 15),
(12, 'good', 'It has a beautiful nature and I advise everyone to go to it and enjoy its wonderful views', 8, 66, 15),
(13, 'good', 'A very beautiful temple full of history from a big and wide hill, full of different historical places inside\r\nThe place is very very big. It is for the elderly, and those who are tired of walking will be very tired\r\nIt is better to keep drinks and juices ', 10, 49, 21),
(14, 'good', 'جميل ، ولو كانت الزيارة في ايام الصيف ليلاً لكان اجمل ( يغلق الساعة 4:00 ) ولو سمح لزيارة حتى 6:30 مساء لكان افضل', 10, 72, 15),
(15, 'good', 'One of the most beautiful places in the city of Dahab in South Sinai, which is characterized by its calm, beauty and unique nature, whether above the water or under the water.', 8, 76, 24),
(16, 'good', 'A tourist place suitable for visiting all religions, with many pictures, archaeological sites and wonderful tourist attractions.. It is preferable to visit in the winter months more than in the summer because of the high temperature.. The area has many Co', 10, 73, 36),
(17, 'good', 'Of course, it is more than wonderful for the first time I go to the Alexandria Library, but it was a very pleasant experience.', 10, 67, 107),
(18, 'good', 'Two statues of Memnon express the beautiful civilization and the pharaonic story that even thousands of years ago', 10, 72, 108),
(20, 'good', 'One of the seven wonders of the world and shows the greatness of ancient Egypt and the Egyptian genius who built those miracles\r\nI highly recommend visiting this place', 10, 74, 105),
(21, 'good', 'A mosque on a very large area and a distinctive Islamic architectural form', 10, 68, 75),
(23, 'good', 'One of the best archaeological places I have visited and I hope to go to it again and the view of the sea is very wonderful from the roof of the castle', 10, 70, 106),
(24, 'good', 'Great place\r\nAmazing view of Cairo from the top\r\nThe mosque is a master piece\r\nNice military collection', 10, 73, 100),
(25, 'good', 'Beautiful mosque with great history attached to it, especially when discussing the river levels of the Nile next to the Luxor Temple.', 10, 71, 71),
(26, 'good', 'An amazing cultural place that has great heritage and really great place to attend concerts', 8, 48, 101),
(27, 'good', 'Amazing private resort area located on a bay on the red sea', 10, 71, 113),
(28, 'good', 'One of the most beautiful places in the Red Sea, it is a must visit place.', 8, 72, 113),
(29, 'good', 'Beautiful mosque and houses the graves of the royal family from Khedive Ismaiel and onwards\r\n', 10, 65, 116),
(30, 'good', 'Interesting history and great views of the city if you climb one of the two minarets. Check out the tentmakers market across the street when you\'re done', 8, 74, 118),
(31, 'good', 'I came to Egypt for that trip of a lifetime in one week.  I was lucky to find Nile Cruisers to help me arrange my trip- including personal tours in Cairo as well as a cruise from Luxor to Aswan.', 10, 76, 43),
(32, 'wonderful ', 'the pyramids ara wondaful place to visit ', 10, 43, 105);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_desc` text CHARACTER SET utf8 NOT NULL,
  `item_image` text CHARACTER SET utf8 NOT NULL,
  `location` text NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `cat_id`, `item_name`, `item_desc`, `item_image`, `location`, `star`) VALUES
(9, 1, 'Roman Amphitheatera', 'Roman Amphitheatre or Roman Theatre is located in the central region of Alexandria city at Kom el-Dikka. Bordered by the Horrya Street in the north, Nabi Daniel Street in west, Abdel Moneim Street in south and Saphia Zaghloul Street from the eastern side, Roman Theatre is one of the symbols of Alexandria city. \r\n\r\nBasically Amphitheatre means double theatre and were grand and impressive in structure. Usually built in semi-circular shape, Amphitheatre was an open-air theatre with no curtains on the stage.\r\n\r\nThe Roman Theatre of Egypt is modest in size and most of the part of the structure is in ruined condition but still it is an excellent ancient structure of Roman period of Egypt. The theatre also consists of numerous galleries erected crudely.\r\n\r\nThese galleries contain rooms for more spectators along with arrangement of 700-800 marble seats around the stage.', '696985454405908120_35164526023516228_Salah Al Din Al Ayoubi Castle1.jpg,22396606000008228_36739651228543327_taba1.jpg', '<iframesrc=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3412.941131072062!2d29.90621378490254!3d31.194645581478525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5c3eb59fbc5c3%3A0xf53cf227d8ca06e4!2z2KfZhNmF2LPYsditINin2YTYsdmI2YXYp9mG2YogLSDYp9mE2KXYs9mD2YbYr9ix2YrYqQ!5e0!3m2!1sar!2seg!4v1628958322698!5m2!1sar!2seg\"width=\"600\"height=\"450\"style=\"border:0;\"allowfullscreen=\"\"></iframe>', 0),
(15, 1, 'Faila Island and Temple.', 'This beautiful temple complex is one of the most picturesque in all of Egypt. It sits on Aglika Island just south of the old Aswan Dam and you must ride a water taxi to the island to get to theruins. The temple was moved to its current location following the construction of the High Dam, which threatened to submerge it permanently.\r\n\r\nThe careful reconstruction at the current site carefully completed, painstakingly preserving the original appearance and layout of the complex and even landscaping the island to match its former location.', '495367565913410757_Philae1.jpg,615852286630724420_Philae3.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14578.003885087779!2d32.88534122032843!3d24.01339295136454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x143662bfbe299cbf%3A0xd571ef8bf3780147!2z2YHZitmE2Kk!5e0!3m2!1sar!2seg!4v1628959234539!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(21, 1, 'temple of karnak', 'The Karnak Temple Complex, commonly known as Karnak (/ˈkɑːr.næk/, which was originally derived from Arabic: خورنق‎ Khurnaq \"fortified village\"), comprises a vast mix of decayed temples, chapels, pylons, and other buildings near Luxor, Egypt. Construction at the complex began during the reign of Senusret I in the Middle Kingdom (around 2000–1700 BCE) and continued into the Ptolemaic Kingdom (305–30 BCE), although most of the extant buildings date from the New Kingdom. The area around Karnak was the ancient Egyptian Ipet-isut (\"The Most Selected of Places\") and the main place of worship of the 18th Dynastic Theban Triad, with the god Amun as its head. It is part of the monumental city of Thebes. The Karnak complex gives its name to the nearby, and partly surrounded, modern village of El-Karnak, 2.5 kilometres (1.6 miles) north of Luxor.', '989350011447109355_temple of karnak2.jpg,485946176001195320_temple of karnak4.jpg,124696697827266134_temple of karnak5.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.5646457285197!2d32.65945898502743!3d25.71883458365629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1449159228fec0cd%3A0xc71ae8c008c259d8!2z2KfZhNmD2LHZhtmD!5e0!3m2!1sar!2seg!4v1629052579405!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(24, 3, 'Dahab Lagoon', 'First things first. Despite being perched along South Sinai is shoreline, central Dahab does not have much of a beach. The coastal strip here is mostly rock rather than sand. For an actual beach, head just to the south of the center to the sheltered bay known as Dahab Lagoon. This curved strip of golden sand edges the bay, backed by the craggy red-hued Sinai Mountain Range.\r\n\r\nWhile Dahab remains best known for its scuba diving opportunities (it is Egypt is top destination for learning to dive) and its backpacker-friendly choice of accommodation, the Lagoon area concentrates more on travelers who simply want to sloth out on the sand. It is home to Dahab is most luxurious places to stay, including the contemporary-styled Le Meridien Dahab Resort.\r\n\r\n', '943626736125571676_dahab1.jpg,121722433419351714_dhab3.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28057.08007117699!2d34.517383560449204!3d28.475480500000018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1454b4a853e2da0d%3A0x7920d026e09204d8!2sDahab%20Lagoon!5e0!3m2!1sar!2seg!4v1628961546943!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(25, 3, 'El Gouna', 'The purpose-built beach town of El Gouna, 27 kilometers north of Hurghada, was made for easygoing, family-friendly sun-and-sand vacations. El Gouna is dedicated to resort-style holidays that offer plenty of diversions off the beach for those who want to do more than soak up the sun, with stand up paddleboarding, kayaking, horse riding, and desert ATV tours all available, along with an 18-hole golf course.\r\n', '73678579011056431_gouna1.jpg,692276110230782626_gouna3.jpg,499693651572107271_gouna6.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56677.76038393751!2d33.68597084512188!3d27.395695427886167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1452667b76243569%3A0xcd29553adebe01a3!2z2KfZhNis2YjZhtip2Iwg2KfZhNi62LHYr9mC2KnYjCDYp9mE2KjYrdixINin2YTYo9it2YXYsQ!5e0!3m2!1sar!2seg!4v1628961608707!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(36, 1, 'The Hanging Church', 'It is one of the most famous tourist attractions in Cairo, but rather tourism in Egypt, and the most attractive one for visits by local residents who are interested in the historical aspects of their country, before tourists from all over the world visit Egypt.\r\n\r\nAnd the oldest church of its kind in Cairo, which is also called the Church of the Virgin Mary, is not restricted to visiting Christians only, but visitors from different religions and nationalities come to it to be fascinated by its distinctive and unique building. The Holy and the Holy Family Journey.\r\n\r\nThe Amr Ibn Al-Aas Mosque, the Hanging Church, and the Ibn Ezra Synagogue meet in one complex known as the Complex of Religions, where each of them is separated by small distances from the other. ', '255922092914591872_The Hanging Church4.jpg,18776017862549947_The Hanging Church5.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.1006473089315!2d31.232371284931457!3d30.00526628189667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458471046a8759f%3A0xd4e2e0e982021bba!2z2KfZhNmD2YbZitiz2Kkg2KfZhNmF2LnZhNmC2Kk!5e0!3m2!1sar!2seg!4v1629052351818!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(38, 3, 'Taba', 'The most northern of South Sinai is beach resort towns, Taba sits adjacent to Egypt is border crossing with Israel and so has been used for years by overland travelers. Taba itself, though, is worth a stop for its beach life.\r\n\r\nLesser known than Sharm el-Sheikh, 215 kilometers to the south, the central Taba area has just one resort hotel plus the self-contained Taba Heights complex just to the south of Taba town. At Taba Heights, a handful of family-friendly all-inclusive resorts front swaths of white-sand beach looking out onto the calm waters of the Gulf of Aqaba.\r\n\r\nDiving is available, though it is better for beginners rather than experienced divers, and most people head here for relaxed sun-and-sand holidays rather than activities.', '531363055861775377_taba1.jpg,352224971245409849_taba3.jpg,252238632699534943_Taba4.jpg,885132774796248785_Taba6.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6945.570789641106!2d34.900250174662666!3d29.493458278344182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1500749b30665a07%3A0x1c94353b9ed186c!2z2LfYp9io2KfYjCDZgtiz2YUg2YbZiNmK2KjYudiMINis2YbZiNioINiz2YrZhtin2KE!5e0!3m2!1sar!2seg!4v1628963105714!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(39, 3, 'Sahl Hasheesh', 'The sweeping bay of Sahl Hasheesh, 30 kilometers south of Hurghada, is a stunner, so it is no surprise that it battles it out with Soma Bay for number one place in Egypt for upscale beach vacation living. The wide stretch of soft white-sand beach, speckled with date palms, trails for the entire length of bay, backed by a handful of luxurious resorts and a purpose-built \"Old Town\" center providing shopping and eating options outside the resort gates.\r\n\r\nFacilities are top-notch, catering both to couples looking for a romantic getaway and families seeking a beach break. Diving, horse riding, and boat trips are the most popular things to do if you can manage to drag yourself off your patch of sand, and if you want to mix some history into your vacation, Luxor day trips are easily arranged.', '588159659424632379_Sahl Hasheesh1.jpg,494568772766028540_Sahl Hasheesh2.jpg,136748956951141172_Sahl Hasheesh3.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56864.12016436854!2d33.90792059720578!3d27.029928617631377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144d7e92735e4d49%3A0xd050ef198ba82166!2z2LPZh9mEINit2LTZiti02Iwg2KfZhNi62LHYr9mC2KnYjCDYp9mE2KjYrdixINin2YTYo9it2YXYsQ!5e0!3m2!1sar!2seg!4v1628963224824!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(40, 3, 'Makadi Bay', 'Just 39 kilometers south of Hurghada, Makadi Bay is all about family-friendly beach vacations, with a bundle of large resort hotels, often offering good-value package deals and plentiful facilities (multiple swimming pools, nighttime entertainment, kids clubs, and water parks) to attract families.\r\n\r\nThe hotels here hug the bay and are each fronted by a strip of golden sand. The family theme continues onto the beach, where beach volleyball and beach football are offered, along with snorkeling and dive trips to see the Red Sea is famed reefs, while many staying here also choose to add some off-the-sand sightseeing into their beach time and head inland to Luxor is Pharaonic temples and tombs on day trips.\r\n\r\nAs this is one of the Hurghada area is most well set up beach destinations, the beach can get crowded in the winter high season, with sun-loungers packed quite close together on the sand.', '931279246395834754_Makadi Bay2.jpg,842749586688131491_Makadi Bay3.jpg,688158172518869789_Makadi Bay4.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28444.246645030573!2d33.89963571698716!3d26.981753018249222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144d795ece54e42d%3A0x3452f607db5f794b!2zTWFrYWRpIEJheSwg2KfZhNi62LHYr9mC2KnYjCDYp9mE2KjYrdixINin2YTYo9it2YXYsQ!5e0!3m2!1sar!2seg!4v1628966741113!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(42, 6, 'Baron Palace', 'Baron Empain Palace is one of the tourist areas in Cairo and is a unique architectural masterpiece in the city of Cairo, built by the Belgian millionaire Baron Edouard, who came to Egypt from India at the end of the nineteenth century shortly after the opening of the Suez Canal, the palace is located in the heart of the Heliopolis in Cairo, specifically on Orouba Street on the main road leading to Cairo International Airport', '273193194544484985_baron.jpg,406891799496763914_baron1.jpg,666805404559005955_baron3.jpg,72780735705268058_baron4.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.2233191987825!2d31.32912997431845!3d30.087789974301653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e2199d7704d%3A0x1cad8411a4bb2d94!2sBaron%20Palace!5e0!3m2!1sar!2seg!4v1629049994224!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(43, 4, 'Nile Cruisers', 'The most popular way to take a Nile cruise is on one of the big Nile cruiser boats.\r\n\r\nThink of a Nile cruiser as a floating hotel. Normal onboard amenities include a sundeck (or sundecks) complete with a pool and restaurant.\r\n\r\nJust like with hotels there is a huge amount of Nile cruiser choice, and boats differ hugely in price and the range of facilities.\r\n\r\nSome of the top deluxe boats (often run by, or in conjunction with, five-star international hotel brands) dish up a luxury cruise experience, complete with onboard spa facilities, opulently styled cabins, and gourmet food.\r\n\r\nOn mid-range boats, you can still expect excellent staff service, but décor will be much less grand (and cabin space will usually be much smaller), and there will not be as many onboard facilities.\r\n\r\nSome of the very cheapest Nile cruisers can be rather run down and are best avoided if you want a comfortable cruise experience.\r\n\r\nOne Nile Cruiser, the M-S Sudan, offers a special heritage cruise stay and the unique chance of cruising onboard one of the original Nile tourist steamships, now refitted for modern comforts but still brimming with 19th-century character.\r\n\r\nIn general, Nile cruisers carry between around 50 and 100 passengers. Note that this means you will always be visiting the tourist attractions on your included excursions in a large group. If large group tours really are not for you, think carefully before signing up for a Nile cruise.\r\n\r\nThe most typical Nile cruiser route is between Luxor and Aswan, with cruises starting from either end.', '860320139915760209_Nile Cruisers.jpg,769089675298051168_Nile Cruisers1.jpg,954435852040520825_Nile-Cruises.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27629.17782434828!2d31.260320560449212!3d30.046976999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583f0937f63019%3A0x6884d55e29083e8c!2sNile%20Cruisers!5e0!3m2!1sar!2seg!4v1628971762776!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(45, 4, 'Feluccas', 'Feluccas are the traditional single lateen-sail boats of the Nile. This is a Nile cruise for the more adventurous. What you lose in facilities, you gain in scenery, tranquil star-filled nights, more time spent on the river, and a close-up experience of river life.\r\n\r\nFeluccas generally take up to eight passengers and have a two- to three-person crew that do the sailing and cooking during the trip.\r\n\r\nThere are generally no bathroom facilities onboard. Passengers do not expect to shower until they have disembarked, and the felucca anchors at a Nile island or bank when passengers ask for a toilet break.\r\n\r\nPassengers sleep on the cushioned deck at night. It is a good idea to bring a sleeping bag although feluccas usually provide plenty of blankets if needed.\r\n\r\nMeals are simple but tasty Egyptian home-style cooking, often kept vegetarian due to the only refrigeration being the onboard icebox.\r\n\r\nTime spent on a felucca is life reduced to the basics, so do not expect Wi-Fi onboard or electricity. At night, the felucca is lit by candle lanterns, while daytime cruising activity is basically lazing about on deck admiring the scenery, or reading, with plenty of time for swim stops as well.\r\n\r\nGuided tours and monument fees are not included in a felucca cruise price. Felucca cruises are priced in the budget price-point, and the cost usually covers the felucca transport, meals, and copious cups of tea.', '809577504986960270_Feluccas.jpg,473655028486404037_Feluccas3.jpg,880845707032077940_Feluccas6.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110592.38120503913!2d31.302350170877887!3d29.979087641311395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145841f825188a4d%3A0x740b4371e93d60b4!2sFelucca%20ride!5e0!3m2!1sar!2seg!4v1628978781628!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(67, 5, 'Mosque of Muhammad Ali', 'In Egypt, the other name the Mosque of Muhammad Ali is famous as is the Alabaster Mosque. This is one of the leading beautiful mosques of Egypt. As a tourist destination, this place stands apart in the country. You should never miss visiting this mosque when you are in Egypt. Moreover, to experience the wonders of this mosque, you need to be fit. This mosque is located at the top of the Saladin Citadel. The massive minarets of the mosque are 270 ft. You can meet the utmost pleasure to get a glimpse of the total city of Cairo.\r\n\r\nVisit this mosque to have an entire view of the Giza plateau. The construction of this mosque began in 1830 and continued up to 1857. Yusuf Bushnaq, a prominent designer of that time constructed it. Muhammad Ali Pasha the ruler of Egypt founded this mosque.', '763964315052650714_Mosque of Muhammad Ali.jpg,17722890693717348_Mosque of Muhammad Ali1.jpg,363365335458385432_Mosque of Muhammad Ali2.jpg,809207029047739329_Mosque of Muhammad Ali3.jpg,513586516743112207_Mosque of Muhammad Ali4.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.2842678789316!2d31.262099284930915!3d30.028701481888053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840aa80f7569f%3A0xd0d4def35935c86e!2z2KzYp9mF2Lkg2YXYrdmF2K8g2LnZhNmK!5e0!3m2!1sar!2seg!4v1628984646562!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(71, 5, 'Abu Haggag Mosque', 'The Abu Haggag Mosque is one of the best mosques of Egypt which stands apart from all other mosques because of its ancient beauty. The city of Luxor is one of the most ancient cities of Egypt. You should visit this city to get the real flavor of the suburban and mostly rural Egypt.\r\n\r\nThe mosque stands on the ancient columns themselves. That part of the Luxor Temple was converted to a church by the Copts in 395 AD, and then to a mosque in 640, more than 3400 years of continuous religious worship.[1] Hence, the Luxor Temple is the oldest building in the world at least partially active for other than archeological or tourist purposes.\r\n\r\n', '155744108736291962_Abu Haggag Mosque.jpg,513719332324894011_Abu Haggag Mosque1.jpg,681885161310107514_Abu Haggag Mosque2.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3595.1375581003076!2d32.641963185027805!3d25.699869183664863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144915d20755d635%3A0x3946ca93a2c07781!2z2YXYs9is2K8g2LPZitiv2Yog2KfYqNmIINin2YTYrdis2KfYrCDYp9mE2KPZgti12LHZig!5e0!3m2!1sar!2seg!4v1628984935836!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(72, 5, 'Al-Hakim Bi-Amr Allah Mosque', 'If you are a design freak and want to see some of the most outstanding Islamic design comprising of the minarets, you should head to this mosque. It is the leading Fatimid mosques in Egypt. Caliph Aziz built this mosque during the years of 990 AD and 1012. His son Al-Hakim Bi Amr Allah completed the work of building this mosque. If you are religious, then this mosque is where you should sit for a while and connect with the divine. You can find a lot of influence of the Ibn Tulun Mosque of Cairo.', '887037908684068268_Al-Hakim Bi-Amr Allah Mosque.jpg,670084739992627984_Al-Hakim Bi-Amr Allah Mosque1.jpg,403782000248291871_Al-Hakim Bi-Amr Allah Mosque2.jpg,656529909771494426_Al-Hakim Bi-Amr Allah Mosquee.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.3832994194468!2d31.265697784930296!3d30.054545681878675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583f628ea96b59%3A0x2ba4fe3a4705f5fc!2z2YXYs9is2K8g2KfZhNit2KfZg9mFINio2KPZhdixINin2YTZhNmH!5e0!3m2!1sar!2seg!4v1628985046477!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(75, 5, 'Sultan Hassan Mosque', 'Although it stands in the shadow of the Citadel, Sultan Hassan’s Madrassa-Mosque still manages to make a strong impression. The building is a massive example of Mamluk architecture, constructed during the 14th century reign of a sultan who was famous for his extravagant spending. The massive size of the building made it a spectacle in its day, but even modern visitors are certain to be impressed by its beautiful and imposing architecture.\r\n \r\nSultan Hassan whose name was set of his famous mosque in old cairo asked prince Muhammad Ibn Babylik Al-Muhassani to supervise the construction of his Mosque and Madrasa in 1361 AD, the constructions continued for 4 years when the work was almost done before sultan Hassan disappeared, it’s said that he was killed. The work was finished by one of his assistants, Bashir Al Gamdar. The mosque site was knowen as souk Al Khayl or Horses Market. The Mosque was built of stones with some parts of bricks faced with stones.', '874452273318723647_Sultan Hassan Mosque.jpg,489381620154602545_Sultan Hassan Mosque1.jpg,491759844665474587_Sultan Hassan Mosque3.jpg,389271853212013807_Sultan Hassan Mosque4.jpg,978472584892399733_Sultan Hassan Mosque5.jpg,935244211642678515_Sultan Hassan Mosque6.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.1595891614493!2d31.2583590849308!3d30.032279081886735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840ac0ae91775%3A0x74c6b9904c0f8ce4!2z2YXYs9is2K8g2YjZhdiv2LHYs9ipINin2YTYs9mE2LfYp9mGINit2LPZhg!5e0!3m2!1sar!2seg!4v1628986167858!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(98, 6, 'International Garden', 'The international garden is one of the most famous gardens and parks in Cairo and is considered one of the most beautiful tourist places in Cairo. It is located on Abbas Al-Akkad Street in Nasr City, Cairo. The garden includes many sections containing trees, animals and plants that are famous for many countries around the world. You can find a special section for the United Arab Emirates And another section for Bahrain and Saudi Arabia and another for Japan and other countries. Do not miss visiting this park, as it is one of the best tourist places in Cairo.', '261640858090883989_international-garden1.jpg,761700215894695250_international-garden2.jpg,854722355752692284_international-garden3.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.5574213116984!2d31.338698984930364!3d30.049552581880416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e6ed5b0c95b%3A0xed62509dc02730f!2z2KfZhNit2K_ZitmC2Kkg2KfZhNiv2YjZhNmK2Kkg2KjYp9mE2YLYp9mH2LHYqQ!5e0!3m2!1sar!2seg!4v1629051294152!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(99, 6, 'Aquarium', 'The Aquarium, located in the Zamalek area in the city of Cairo, is considered one of the best gardens in Cairo, which was established in the era of the Khedive.\r\n\r\nThe park consists of 49 aquariums for various and rare fish. The park is distinguished by the fact that if you look at the ceiling of one of the corridors, you will find it as if it is one among other cavities made by the waves, which are designs that play melodies when the air passes through them, and it is considered one of the best places of tourism in Cairo.', '515969065401552989_Aquarium.JPG,774626871788968149_Aquarium1.jpg,615813806622651451_Aquarium2.jpg,153264547182055943_Aquarium3.jpg,194471215765700935_Aquarium6.jpg,388455248796722636_Aquarium7.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.31270302856!2d31.220802684930245!3d30.05656988187794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840df0a890a03%3A0x28c901d489cc851b!2z2K3Yr9mK2YLYqSDYp9mE2KPYs9mF2KfZgw!5e0!3m2!1sar!2seg!4v1629051716717!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(100, 6, 'Salah Al Din Al Ayoubi Castle', 'One of the most luxurious war castles in the Middle Ages, Salah El Din Al Ayoubi Citadel is located in one of the most important tourist areas in Cairo, in the Citadel neighborhood on the outskirts of the city. This castle is surrounded by many ancient mosques dating back to the era of the Fatimid state, such as Ibn Tulun Mosque and Sultan Hassan Mosque, which are considered among the most famous Islamic monuments in the city, in addition to Al-Rifai Mosque.', '580773468959865448_Salah Al Din Al Ayoubi Castle.jpg,36922709118067198_Salah Al Din Al Ayoubi Castle1.jpg,384588493809968167_Salah Al Din Al Ayoubi Castle2.jpg,271533394122453363_Salah Al Din Al Ayoubi Castle3.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.266188626994!2d31.261806884930767!3d30.02922028188783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840ac90c2ed63%3A0x2fdb96e4e9f72e6f!2z2YLZhNi52Kkg2LXZhNin2K0g2KfZhNiv2YrZhiDYp9mE2KPZitmI2KjZig!5e0!3m2!1sar!2seg!4v1629051762060!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(101, 6, 'Egyptian Opera House', 'The Cairo Opera House (Arabic: دار الأوبرا المصرية‎, Dār el-Opera el-Masreyya; literally \"Egyptian Opera House\"), part of Cairo is National Cultural Centre, is the main performing arts venue in the Egyptian capital. Home to most of Egypt is finest musical groups, it is located on the southern portion of Gezira Island in the Nile River, in the Zamalek district near downtown Cairo.\r\n\r\nThe opera house was inaugurated on 10 October 1988. The funds for the complex were a gift from the nation of Japan to Egypt as a result of President Hosni Mubarak is visit to Japan in April 1983. Construction began in May 1985 and lasted for three years.\r\n\r\nIn October 1988, President Mubarak and Prince Tomohito of Mikasa, the younger brother of the Japanese Emperor, inaugurated the National Cultural Centre Cairo Opera House. It was the first time for Japan to stage a Kabuki show, a traditional popular drama with singing and dancing, in Africa or the Arab World.\r\n\r\nIn recognition of the Cairo Opera House, the London Royal Philharmonic Orchestra chose it as a venue for their first performance in the Middle East and Africa in January 2007. The Arabic Oud House was created in its premises before moving to a building in the old town.\r\n\r\n', '881327658763420578_Egyptian Opera House1.jpg,314001815367788710_Egyptian Opera House2.jpg,602113986068213144_Egyptian Opera House3.jpg,336909758087662153_Egyptian Opera House4.jpg,75223808143042216_Egyptian Opera House5.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.808153849003!2d31.22585688493056!3d30.04236128188309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458411b18beb2fb%3A0x4bb773a7745b4aba!2sCairo%20Opera%20House!5e0!3m2!1sar!2seg!4v1629051812726!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(103, 6, 'Siwa Oasis', 'Siwa is the stuff of desert daydreams. Just 50km from the Libyan border this fertile basin, sitting about 25m below sea level and brimming with olive trees and palms, epitomises slow-paced oasis life. Set between the shady groves, squat, slouching mud-brick hamlets are connected by winding dirt lanes where trundling donkey carts are still as much a part of the street action as puttering motorbikes and 4WDs. Scattered throughout the oasis are crystal-clear springs, which are a heavenly respite from the harsh heat. At the edge of the oasis, the swells of the Great Sand Sea roll to the horizon, providing irresistible fodder for desert exploration.', '406671342866769493_Siwa Oasis1.jpg,165797772155731997_Siwa Oasis2.jpg,752244391047954673_Siwa Oasis3.jpg,865000989667381979_Siwa Oasis4.jpg,710031260420087257_Siwa Oasis6.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13932.258882852759!2d25.536254768545366!3d29.192221415203583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x147aaef8c649a39d%3A0x43c597bf7bfa09b7!2sWahat%20Siwah!5e0!3m2!1sar!2seg!4v1629052516317!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(105, 1, 'Egyptian pyramids', 'The Egyptian pyramids are ancient masonry structures located in Egypt. Sources cite at least 118 identified Egyptian pyramids. Most were built as tombs for the country is pharaohs and their consorts during the Old and Middle Kingdom periods.\r\n\r\nThe earliest known Egyptian pyramids are found at Saqqara, northwest of Memphis, although at least one step-pyramid-like structure has been found at Saqqara, dating to the First Dynasty: Mastaba 3808, which has been attributed to the reign of Pharaoh Anedjib, with inscriptions, and other archaeological remains of the period, suggesting there may have been others. The otherwise earliest among these is the Pyramid of Djoser built c. 2630–2610 BCE during the Third Dynasty. This pyramid and its surrounding complex are generally considered to be the world is oldest monumental structures constructed of dressed masonry.\r\n\r\nThe most famous Egyptian pyramids are those found at Giza, on the outskirts of Cairo. Several of the Giza pyramids are counted among the largest structures ever built. The Pyramid of Khufu is the largest Egyptian pyramid. It is the only one of the Seven Wonders of the Ancient World still in existence; this is despite being the oldest wonder by about 2,000 years.', '133660676414143113_pyramids.jpg,317030786360581998_pyramids1.jpg,898433171431878910_pyramids3.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13824.296981831714!2d31.141250230224607!3d29.97729620000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14584f7de239bbcd%3A0xca7474355a6e368b!2z2KPZh9ix2KfZhdin2Kog2KfZhNis2YrYstip!5e0!3m2!1sar!2seg!4v1629232186386!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(106, 1, 'Qaitbay Citadel ', 'Sultan Qaitbey built this picturesque fortress during the 14th century to defend Alexandria from the advances of the Ottoman Empire. His efforts were in vain since the Ottomans took control of Egypt in 1512, but the fortress has remained, strategically located on a thin arm of land that extends out into Alexandria’s harbor from the corniche.\r\n\r\nThe fortress, current form is not the original. It was heavily damaged during the British bombardment of Alexandria during a nationalist uprising against British hegemony in 1882 and rebuilt around the turn of the 20th century.\r\n\r\nAs with most things in Alexandria, the building itself is not what is most significant about this location. Qaitbey built the fortress here to take advantage of an exist foundation on the site—that of the legendary Pharos Lighthouse, which by the 14th century had fallen into ruins due to repeated damage by earthquakes.', '432491238338130024_Bey Citadel.jpg,600559002124444997_Bey Citadel2.jpg,556136481482743936_Bey Citadel3.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3412.242474853442!2d29.883449614890687!3d31.214010981471972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5c3ff1b30e255%3A0xc201e7869ae9971f!2sCitadel%20of%20Qaitbay!5e0!3m2!1sen!2seg!4v1629249807827!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(108, 1, 'Colossi of Memnon', 'he twin statues depict Amenhotep III (fl. 14th century BCE) in a seated position, his hands resting on his knees and his gaze facing eastwards (actually ESE in modern bearings) towards the river. Two shorter figures are carved into the front throne alongside his legs: these are his wife Tiye and mother Mutemwiya. The side panels depict the Nile god Hapi.\r\nThe statues are made from blocks of quartzite sandstone which was quarried at el-Gabal el-Ahmar (near modern-day Cairo) and transported 675 km (420 mi) overland to Thebes (Luxor). The stones are believed to be too heavy to have been transported upstream on the Nile. The blocks used by later Roman engineers to reconstruct the northern colossus may have come from Edfu (north of Aswan). Including the stone platforms on which they stand – themselves about 4 m (13 ft) – the colossi reach a towering 18 m (60 ft) in height and weigh an estimated 720 tons each. The two figures are about 15 m (50 ft) apart.\r\n\r\nBoth statues are quite damaged, with the features above the waist virtually unrecognizable. The southern statue comprises a single piece of stone, but the northern figure has a large extensive crack in the lower half and above the waist consists of 5 tiers of stone. These upper levels consist of a different type of sandstone, and are the result of a later reconstruction attempt, which William de Wiveleslie Abney attributed to Septimus Severus. It is believed that originally the two statues were identical to each other, although inscriptions and minor art may have varied.\r\n\r\nThe original function of the Colossi was to stand guard at the entrance to Amenhotep is memorial temple (or mortuary temple): a massive construct built during the pharaoh is lifetime, where he was worshipped as a god-on-earth both before and after his departure from this world. In its day, this temple complex was the largest and most opulent in Ancient Egypt. Covering a total of 35 hectares (86 acres), even later rivals such as Ramesses II is Ramesseum or Ramesses III is Medinet Habu were unable to match it in area; even the Temple of Karnak, as it stood in Amenhotep is time, was smaller.', '340720800411562469_Colossi of Memnon1.jpg,798756607557044979_Colossi of Memnon3.jpg,764908564158564628_Colossi of Memnon4.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.5113715206394!2d32.61264428502753!3d25.72059748365543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1449166b7c9f0809%3A0x75789827d3bea3b!2sColossi%20of%20Memnon!5e0!3m2!1sar!2seg!4v1628958939850!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(109, 1, 'Hatshepsut Temple', 'The Temple of Hatshepsut is a mortuary temple built during the reign of Queen Hatshepsut of the Eighteenth Dynasty. It is considered to be a masterpiece of ancient architecture. Its three massive terraces rise above the desert floor and into the cliffs of Deir el-Bahari. The temple is twin functions are identified by its axes: on its main east-west axis, the temple served to receive the barque of Amun-Re at the climax of the (Beautiful Festival of the Valley), while on its north-south axis it represented the life cycle of the pharaoh from coronation to rebirth. At the edge of the desert, 1 km (0.62 mi) east, connected by a causeway lies the accompanying valley temple. Across the river Nile, the whole structure points towards the monumental Eighth Pylon, Hatshepsut is most recognizable addition to the Temple of Karnak.\r\n\r\nConstruction of the terraced temple took place between Hatshepsut is seventh and twentieth regnal year, during which building plans were repeatedly modified. In its design it was heavily influenced by the Temple of Mentuhotep II of the Eleventh Dynasty built six centuries earlier. In the arrangement of its chambers and sanctuaries, though, the temple is wholly unique. The main axis, normally reserved for the mortuary complex, is occupied instead by the sanctuary of the barque of Amun-Re, with the mortuary cult being displaced south to form the auxiliary axis with the solar cult complex to the north. Separated from the main sanctuary are shrines to Hathor and Anubis which lie on the middle terrace. The porticoes that front the terrace here host the most notable reliefs of the temple. Those of the expedition to the Land of Punt and of the divine birth of Hatshepsut, the backbone of her case to rightfully occupy the throne as a member of the royal family and as godly progeny. Below, the lowest terrace leads to the causeway and out to the valley temple.', '949968436114404049_Hatshepsut Temple.jpg,101645687934768758_Hatshepsut Temple1.jpg,149573699315866675_Hatshepsut Temple2.jpg,559006520727933567_Hatshepsut Temple3.jpg,978519918843566865_Hatshepsut Temple4.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1796.99304477873!2d32.60851129189577!3d25.737973595911903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14491618c7bfa7dd%3A0x31fe17a1563b5d3!2z2YXYudio2K8g2K3Yqti02KjYs9mI2Ko!5e0!3m2!1sar!2seg!4v1628959348498!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(110, 1, 'Abu Simbel Temple', 'Abu Simbel is two massive rock-cut temples in the village of Abu Simbel (Arabic: أبو سمبل‎), Aswan Governorate, Upper Egypt, near the border with Sudan. They are situated on the western bank of Lake Nasser, about 230 km (140 mi) southwest of Aswan (about 300 km (190 mi) by road). The complex is part of the UNESCO World Heritage Site known as the \"Nubian Monuments\", which run from Abu Simbel downriver to Philae (near Aswan). The twin temples were originally carved out of the mountainside in the 13th century BC, during the 19th Dynasty reign of the Pharaoh Ramesses II. They serve as a lasting monument to the king Ramesses II. His wife Nefertari and children can be seen in smaller figures by his feet, considered to be of lesser importance and were not given the same position of scale. This commemorates his victory at the Battle of Kadesh. Their huge external rock relief figures have become iconic.\r\n\r\nThe complex was relocated in its entirety in 1968 under the supervision of a Polish archaeologist, Kazimierz Michałowski, from the Polish Centre of Mediterranean Archaeology University of Warsaw, on an artificial hill made from a domed structure, high above the Aswan High Dam reservoir. The relocation of the temples was necessary or they would have been submerged during the creation of Lake Nasser, the massive artificial water reservoir formed after the building of the Aswan High Dam on the River Nile. The project was carried out as part of the UNESCO Nubian Salvage Campaign.', '412219799009194725_Abu Simbel Temple.jpg,307113603573146136_Abu Simbel Temple3.jpg,415380557695823233_Abu Simbel Temple4.jpg,141983808125233314_Abu Simbel Temple5.jpg,368545151988997023_Abu Simbel Temple6.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.434104576611!2d31.627987685093498!3d22.337231885304433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x143aa988b126055b%3A0xa7d3cc6618f898d2!2z2YXYudin2KjYryDYo9io2Ygg2LPZhdio2YQ!5e0!3m2!1sar!2seg!4v1628959643061!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(111, 3, 'Naama Bay', 'One of Egypt is most famous sandy strips, Naama Bay is scoop of white-sand beach sits at the epicenter of Egypt is prime beach resort, Sharm el-Sheikh, on the Sinai Peninsula.\r\n\r\nSun seekers from across Northern and Eastern Europe decamp here during the winter months to loll on sand lapped by the calm, aqua-blue waters of the Gulf of Aqaba and gaze out at the dusky jagged silhouette of Saudi Arabia is mountainous coastline in the distance.\r\n\r\nBefore the beachgoers beelined here in vast numbers, Sharm el-Sheikh was already known for its scuba diving, with a multitude of coral reefs, including the world-class dive sites of Ras Mohammed National Park, within easy reach. Today, this makes it Egypt is top choice for a beach break with added underwater action. Both complete beginners and more experienced divers will find plenty of dive trips that cater to their level.\r\n\r\nYou can snorkel just off Naama Bay itself, though more colorful reefs need to be accessed by boat. Behind the beach is Sharm el-Sheikh is lively, main resort area, with plenty of restaurants and cafés, as well as accommodation ranging from large resorts like the Movenpick Sharm El Sheikh, which sits on the northern clifftop overlooking the bay, to cozy midrange hotels such as Oonas Dive Club, with its friendly, family-run feel.\r\n\r\nThe Naama Bay shoreline is split into separate private sections, owned by the resorts that line the shore. All of them offer full facilities for easygoing beach days, including restaurants, water sports operators, sun-loungers, and umbrellas.', '396448941350689658_Naama Ba.jpg,106899042814935869_Naama Bay.jpg,640131490481364626_Naama Bay2.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7051.456057016192!2d34.33758912480857!3d27.9103182808331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145337874a9d678b%3A0x5196877e0aa024d0!2z2K7ZhNmK2Kwg2YbYudmF2Kk!5e0!3m2!1sar!2seg!4v1628960993314!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(112, 3, 'Ras Um Sid Beach', 'Because the renowned Ras Um Sid reef, with its gorgonian forests, is just offshore, this is one of the best strips of sand in the Sharm el-Sheikh area for beach days that combine sun-soaked lounging with snorkeling.\r\n\r\nSure, you would need to head out on a dive trip to access the spectacular lower depths of the Ras Um Sid reef, but even snorkelers are able to see a myriad of soft corals and spot rainbow-hued, flitting reef fish close to the surface. It is no wonder then that this golden-sand beach, backed by a cliff, is a highly popular outing for visitors staying in the more central Naama Bay area.\r\n\r\nWhile here, do not miss hanging out for a while in the cliff-top Farsha Café, where the rambling terraces enjoy panoramic views. This is one of Sharm el-Sheikh is most beautiful spots to watch the sun set and the moon rise across the Gulf of Aqaba and Saudi Arabia beyond.', '281907242670594807_Ras Um Sid Beach2.jpg,372477214216034723_Ras Um Sid Beach3.jpg,169439240644136164_Ras Um Sid Beach4.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3527.727503135018!2d34.31333378498149!3d27.848914282733606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14533a6a8d0dbb51%3A0x72e99d764daa520e!2sRas%20Um%20El%20Sid!5e0!3m2!1sar!2seg!4v1628961671710!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(113, 3, 'Soma Bay', 'One of the most exclusive beaches in Egypt, the wide stretch of Soma Bay is white sand is backed by just five resort hotels dedicated to an all-inclusive, luxurious beach holiday experience, far away from any town bustle. The beach is only steps away from whichever resort you choose to stay at, meaning vacations here are all about serious relaxation and sandy bliss.\r\n\r\nWith Hurghada 61 kilometers to the north, this is not the place to come if you like to pop into town, but beachgoers here still have plenty of options if they do feel like spending some time off the sand.\r\n\r\nTraveling families are well catered for, with plenty of regular entertainment events focused on kids, and the resorts have a full array of facilities, including water sports offices, which offer kitesurfing lessons, stand up paddleboarding, and diving and snorkeling boat trips.', '972529035481814285_Soma Bay.jpg,677013705201316174_Soma Bay1.jpg,968438809590220964_Soma Bay2.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3527.727503135018!2d34.31333378498149!3d27.848914282733606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14533a6a8d0dbb51%3A0x72e99d764daa520e!2sRas%20Um%20El%20Sid!5e0!3m2!1sar!2seg!4v1628963009346!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(114, 3, 'Marsa Alam', 'Marsa Alam, in the far south of Egypt is rambling Red Sea coastline (289 kilometers south of Hurghada), was the beach destination divers whispered about for years. While Hurghada, to the north, and Sharm el-Sheikh, on the Sinai Peninsula, became booming diving hot spots, regularly featuring on top ten lists for diving worldwide, Marsa Alam remained an obscure destination little known outside the diving community.\r\n\r\nThe secret, though, is now firmly out, and the resorts have moved in to develop this long strip of coastline. For experienced divers, Marsa Alam is the best base to access the astonishing kaleidoscope-colored reefs of the Red Sea is far south, but the hotels now hugging the shore have snapped up the strips of white sand, meaning a vacation in Marsa Alam can now combine sun-lounging in resort comfort as well as diving.', '758860246708224941_Marsa Alam.jpg,496709930638216795_Marsa Alam1.jpg,800883202216591997_Marsa Alam2.jpg,740507855509207962_Marsa Alam3.jpg,228955562241411477_Marsa Alam4.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1857756.343505538!2d36.013049971696425!3d24.57433975311126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144ad2642f4763fb%3A0x2b00b8a89a973b3a!2z2YLYs9mFINmF2LHYs9mJINi52YTZhdiMINin2YTYqNit2LEg2KfZhNij2K3Zhdix!5e0!3m2!1sar!2seg!4v1628963055017!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(115, 5, 'Abu Al-Abbas Al-Mursi Mosque', 'If you are in the city of Alexandria in Egypt, the Abu Al-Abbas Al-Mursi Mosque is a must visit. It is a 13th-century mosque and it is the grandest of all other mosques in Alexandria. The mosque is built in the influence of the buildings of the medieval Cairo. It contains the tomb of the Sufi-saint Murcian Andalusi. The mosque is located in the heart of the city and it is well accessible from anywhere in Alexandria.\r\n\r\nTwo designers named Eugenio Valzania and Mario Rossi rebuilt the mosque in today’s form between the years of 1929 to 1945. The Mosque is made of marble and the domes on top are quite a beauty.', '38165379820800733_Abu Al-Abbas Al-Mursi Mosque1.jpg,878219930600076893_Abu Al-Abbas Al-Mursi Mosque2.jpg,648123713985383039_Abu Al-Abbas Al-Mursi Mosque3.jpg,730921684123721034_Abu Al-Abbas Al-Mursi Mosque5.jpg,663722617289021776_Abu Al-Abbas Al-Mursi Mosque6.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3412.5497917770663!2d29.88443088490224!3d31.205494081474907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5c3fd4c327767%3A0x589204b519956a33!2z2YXYs9is2K8g2KfZhNmF2LHYs9mKINij2KjZiCDYp9mE2LnYqNin2LM!5e0!3m2!1sar!2seg!4v1628984712475!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(116, 5, 'Al Rifai Mosque', 'Al Rifai Mosque situated in the city of Cairo is one of the leading mosques in the city and took about 40 years to build. Its construction began in the year 1869 and was completed in 1912. The mosque consists of Al Rifai. You can even find the graves of the royal family members here. The unique feature about the mosque is that the prayer takes place inside of the mosque, which is not something you will see in other mosques.\r\n\r\nThe marble designs here are breathtaking. Spending time here will make you will feel like you are roaming in an Islamic Durbar. It carries the traditional touch of Egyptian culture.', '511369614709421752_Al Rifai Mosque1.jpg,703197698138220166_Al Rifai Mosque2.jpg,885891379567351284_Al Rifai Mosque3.jpg,255628224582494818_Al Rifai Mosque4.jpg,766976672361339648_Al Rifai Mosque5.jpg,154212775943427781_Al Rifai Mosque6.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.1446028320547!2d31.2591915849308!3d30.032709081886626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840abff063c43%3A0xeccb641bda8ce51d!2z2YXYs9is2K8g2KfZhNix2YHYp9i52Yo!5e0!3m2!1sar!2seg!4v1628985089131!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0);
INSERT INTO `item` (`item_id`, `cat_id`, `item_name`, `item_desc`, `item_image`, `location`, `star`) VALUES
(117, 6, 'Cairo Tower', 'The Cairo Tower or ElGezira tower or ( Brag El qahari) in Arabic language is consider one of the most prominent features of the Egyptian capital .Its partially open lattice-work design is intended to evoke a lotus plant. Cairo tower was built from 1956 to 1961 during the presidency of Gamal Abdel Nasser with Soviet assistance. The Cairo Tower Height is 187m high, it is higher than the great pyramid of Giza by 50 meters and it is Standing on the base of the Aswan granite stones that had the ancient Egyptians used to build their monasteries and temples of the pharaohs It contains 16 floors, the trip inside the elevator tower to reach the end of 45 seconds to see when standing on the top of the tower a full panorama of Cairo, the pyramids, building the television, the Sphinx, the Nile, Castle SalahElDin, Azhar.it is the wonderful and spectacular view to cairo There is a telescope to visit Egypt in a single moment ,a cafeteria in the floor 15 and rotating restaurant in the floor 14 and 160 meter high the waiters in this restaurant are dressed like ancient Egyptians Cairo tower is consider an architectural masterpiece to attract the tourist to Egypt.', '322222746792068842_Cairo Tower.jpg,91247513387920490_Cairo Tower1.jpg,566099396955896455_Cairo Tower2.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.684257012874!2d31.226478484930478!3d30.045914981881797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458409aa81d58a5%3A0x6ce6bf7cd258d6fe!2z2KjYsdisINin2YTZgtin2YfYsdip!5e0!3m2!1sar!2seg!4v1629049907668!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(118, 6, 'Bab zuweila', 'Built in the 11th century, beautiful Bab Zuweila was an execution site during Mamluk times, and today is the only remaining southern gate of the medieval city of Al Qahira. There are interesting exhibits about the gate is history, all with thorough explanations in English, inside the gate, while up on the roof you get panoramic vistas that stretch out to the citadel. Those with a head for heights can also wind their way up to the top of the two minarets.\r\n\r\nThe spirit of a healing saint was (and still is) said to reside behind one towering wooden door, which supplicants have studded with nails and teeth as offerings over the centuries.', '801135069247145860_Bab zuweila.jpg,538775938021429737_Bab zuweila2.jpg,154757619690302339_Bab zuweila3.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.7759162206617!2d31.255330414859483!3d30.043285981882715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840a6b3cef437%3A0xda51b0f3e21cddfa!2sZuwayla%20Gate!5e0!3m2!1sen!2seg!4v1629253832794!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(119, 6, 'Farafra', 'The Farafra depression (Arabic: واحة الفرافرة‎‎, pronounced [elfɑˈɾɑfɾɑ]) is a 980 km2 (380 sq mi) geological depression, the second biggest by size in Western Egypt and the smallest by population, near latitude 27.06° north and longitude 27.97° east. It is in the large Western Desert of Egypt, approximately midway between Dakhla and Bahariya oases.\r\n\r\nFarafra has an estimated 5,000 inhabitants (2002) mainly living in the town of Farafra and is mostly inhabited by the local Bedouins. Parts of the town have complete quarters of traditional architecture, simple, smooth, unadorned, all in mud colour — local culture and traditional methods of building and carrying out repairs have been supported by its tourism. Often grouped within Farafra are the hot springs at Bir Sitta (the sixth well) and the El-Mufid lake.', '278180195547924821_Farafra.jpg,759270108962378002_Farafra1.jpg,792010376362544451_Farafra2.jpg,63481541697625056_Farafra3.jpg,835930245928889782_Farafra4.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7106.415202654773!2d27.965782524251768!3d27.055194282265752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x146a2c8acb9e9c5d%3A0xa80ba3f8267db433!2sFarafra%2C%20Al%20Farafra%2C%20New%20Valley%20Governorate!5e0!3m2!1sen!2seg!4v1629253919887!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(120, 6, 'Tunis Village', 'The small village of Tunis (‘izbat Tunis) is located in the oasis of Fayoum , on the way to Wadi Rayan. Located on a hill facing a large salt water lake, the village overlooks a stunning view of the edge of the desert on the other side of the lake. It is one of the most beautiful places in Egypt.\r\nUntil recently, the village of Tunis was an unknown fishing community on the southern shore of Lake Qaroun. Though it looked like thousands of average Egyptian Villages, Tunis has its own charm; very small, extremely beautiful and surprisingly peaceful.', '55728819589268354_Tunis Village1.jpg,151986773891940160_Tunis Village2.jpg,990006992185263542_Tunis Village3.jpg,158715477724254291_Tunis Village4.jpg,832585114422167331_Tunis Village5.jpg,351590339966703390_Tunis Village6.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6951.817408893946!2d30.481913374483312!3d29.402226678481853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14595dcfd694f1e1%3A0x32c03a30b7f6f530!2sTunis%2C%20Qaroun%2C%20Ibsheway%2C%20Faiyum%20Governorate!5e0!3m2!1sen!2seg!4v1629254078211!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0),
(121, 6, 'Wadi El Hitan', 'Wadi Al-Hitan (Arabic: وادي الحيتان‎, \"Valley of the Whales\") is a paleontological site in the Faiyum Governorate of Egypt, some 150 kilometres (93 mi) south-west of Cairo. It was designated a UNESCO World Heritage Site in July 2005[3] for its hundreds of fossils of some of the earliest forms of whale, the archaeoceti (a now extinct sub-order of whales). The site reveals evidence for the explanation of one of the greatest mysteries of the evolution of whales: the emergence of the whale as an ocean-going mammal from a previous life as a land-based animal. No other place in the world yields the number, concentration and quality of such fossils, as is their accessibility and setting in an attractive and protected landscape. This is why it was added by the UNESCO to the list of protected World Heritage Sites.', '344273757302199790_Wadi El Hitan.jpg,248004199493428832_Wadi El Hitan1.jpg,70280891044869491_Wadi El Hitan2.jpg,33537061545750310_Wadi El Hitan3.jpg,60614579960469150_Wadi El Hitan4.jpg,686356100507443704_Wadi El Hitan5.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d222866.7701176641!2d30.282414516406234!3d29.214926700000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145bff0cee3050a1%3A0x6f2df839af980e66!2sWadi%20El%20Hitan!5e0!3m2!1sen!2seg!4v1629256317755!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `admins` int(11) NOT NULL,
  `reg_date` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `phone`, `admins`, `reg_date`, `img`) VALUES
(43, 'fady', 'dady@yahoo.com', '$2y$10$tNoDy1hDsrR90gssb2n8zu5mCTIoR/dlaEy4V3Ni.AtN9shsGlqji', 165651, 1, '2021-07-31 11:29:57', '9113362_camel-ride.jpg'),
(47, 'ahmedAmin', 'ahmed@gmail.com', '$2y$10$wmd0trdzzO9fR0eIy3lcROoNNiOy/HWqAGtgKACu8J68ebICOWeki', 56465153, 1, '2021-07-31 13:15:47', 'user.png'),
(48, 'alya', 'alya@gmail.com', '1', 12, 0, 'current_timestamp()', '7192251_Citadel_of_Saladin_2.jpg'),
(49, 'mena', 'mena@gmail', '$2y$10$GjjUY7qiIMmQCOi49JAfbe1WmmZA3b491oyp4pXvz9MJJWd7xgGLm', 1111, 3, '2021-08-13 22:06:26', '9843992_CIB_Logo.png'),
(65, 'mariemMohamed', 'mariem@gmail.com', '123456', 987456765, 0, 'current_timestamp()', 'user.png'),
(66, 'marco gerges', 'marco.7@gmail.com', '98767as', 76541098, 0, 'current_timestamp()', ''),
(67, 'burak', 'burak.2@gmail.com', '987654', 108765765, 1, 'current_timestamp()', ''),
(68, 'asmaa', 'asmaa@gmail.com', '76543456', 987182865, 2, 'current_timestamp()', ''),
(69, 'amin', 'amin@gmail.com', '23456765', 987656788, 2, 'current_timestamp()', ''),
(70, 'nour', 'nour@gmail.com', '9876rty', 76545672, 3, 'current_timestamp()', ''),
(71, 'pola salem', 'pola@gmail.com', 'kjh9876', 76545676, 3, 'current_timestamp()', ''),
(72, 'Orhan', 'orhan7@gmail.com', 'hgf67876', 987654342, 2, 'current_timestamp()', ''),
(73, 'yossef', 'yossef@gmail.com', '98765234', 123654544, 2, 'current_timestamp()', ''),
(74, 'bora', 'bora@gmail.com', '1234poiu', 123455556, 1, 'current_timestamp()', ''),
(75, 'amira59', 'amira597@gmail.com', '09876543', 9876549, 2, 'current_timestamp()', ''),
(76, 'lili', 'lili@gmail.com', '9876545678', 1356787, 2, 'current_timestamp()', ''),
(77, 'nada ahmed', 'nada99@gmail.com', '234567', 1587654, 1, 'current_timestamp()', ''),
(78, 'laylaHazem', 'layla25@gmail.com', '987654567', 9766789, 2, 'current_timestamp()', '954451_girl.jpg'),
(80, 'aaaa', 'holdmycup0000@gmail.com', '$2y$10$HfM4JMYlHmHcZwE7pNt6HOxiQVLRtP.pr6FpUI5hpqc/6fC1IoFaS', 123456, 1, '2021-08-22 20:09:59', 'user.png'),
(81, 'good', 'good@gmail.com', '$2y$10$2.7pGjmAsyxJOZg9mrbvMujaIbPrWLWp6O46IQxVs.dg4jWT5tlTS', 0, 3, '2021-08-22 21:54:27', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_ibfk_1` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `feedback_ibfk_1` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_ibfk_1` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `wishlist_ibfk_1` (`u_id`),
  ADD KEY `wishlist_ibfk_2` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `code`
--
ALTER TABLE `code`
  ADD CONSTRAINT `code_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
