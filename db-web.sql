-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 12:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'Blerim', 'filanfisteku@asd.com', '123123', 'Kam nje problem me llogarin time', 'Kam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin time'),
(2, 'Blerim', 'blerim@asd.com', '12312312123', 'Kam nje problem me llogarin time', 'Kam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin timeKam nje problem me llogarin time.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `created_at`) VALUES
(73, 51, 65, 'Kina më parë preferon mbylljen e TikTok-ut për SHBA-në se sa t\'ia shes një kompanie amerikane.', '1599860445_tiktook.jpg', 'Pekini kundërshton një shitje të detyruar të operacioneve të TikTokut në SHBA nga pronari i saj kinez, ByteDance dhe do të preferonte ta shihte aplikacionin e shkurtër për video të mbyllur në Shtetet e Bashkuara.ByteDance ka qenë në bisedime për t’ia shitur biznesin blerësve të mundshëm duke përfshirë Microsoft MSFT.O dhe Oracle ORCL.N që kur Presidenti i SHBA-së, Donald Trump kërcënoi muajin e kaluar për të ndaluar shërbimin nëse nuk shitej, raporton reuters.ByteDance njoftoi përmes një deklarate për reuters se qeveria kineze nuk i kishte sugjeruar kurrë që ajo të mbyllte TikTokun në Shtetet e Bashkuara ose në ndonjë treg tjetër.Dy burime thanë se Kina ishte e gatshme të përdorte ndryshimet që bëri në një listë të eksporteve të teknologjisë më 28 gusht për të vonuar çdo marrëveshje të arritur nga ByteDance, nëse do të duhej.', '2021-09-11 23:08:16'),
(74, 51, 65, 'Hakerët Rusë nga grupi Strondium, Kinës dhe Iranit sulmojnë zgjedhjet presidenciale në SHBA.', '1599858624_hackers.jpg', 'Hakerët Rusë, Kinezë dhe Iranianë po përpiqen të përgjojnë njerëz dhe grupe të përfshira në zgjedhjet presidenciale Amerikane që do të zhvillohen në Nëntor bëri të ditur Microsoft.Hakerët Rusë të cilët ndërhynë në fushatën e Partisë Demokratike në 2016-ën janë përfshirë gjithashtu tha Microsoft.Fushatat e të dy kandidatëve Donald Trump dhe Jo Biden janë në kërcënim sipas kompanisë.Hakerët Rusë nga grupi Strondium kanë vënë në shënjestër mëse 200 organizata të cilat janë të lidhura me partitë politike në SHBA, Republikanë e Demokratë.Strontium njohur ndryshe edhe si Fancy Bear besohet se është një njësi kibernetike e inteligjencës së ushtrisë Ruse GRU.Por edhe hakerët Kinezë janë hedhur në sulm duke vënë në shënjestër indidivë të lidhur me fushatën e Biden. Ndërsa hakerët Iranianë kanë shënjestër të tyre fushatën e Trump.Shumica e sulmeve kanë qenë të pasuksesshme sipas Microsoft. Në 2016-ën inteligjenca Amerikane arriti në përfundimin se Rusia ishte pas sulmeve kibernetike të cilat goditën fushatën presidenciale të Hillary Klinton.', '2021-02-11 23:10:24'),
(75, 51, 66, 'Chrome i jep zgjidhje një prej shqetësimeve më të mëdha të përdoruesveqë që të jetë më i shpejtë.', '1599858766_chrome.jpg', 'Përgjatë viteve Chrome ka krijuar një reputacion të keq të një shfletuesi të uritur për bateri dhe memorie.Google ka implementuar një sërë masash për të përmirësuar situatën por nuk është gjithnjë Chrome shkaktari i këtyre problemeve.Tashmë Google ka nisur një përditësim të ri në Chrome që do të parandalojnë ngadalësimin e shkaktuar prej reklamave.Jo vetëm që do të bllokojë reklamat që reduktojnë performancën e shfletuesit, por Chrome do të ndërhyjë edhe kundër atyre reklamave të cilat shkarkojnë baterinë ose përdorin internet në sasi të lartë.Ndryshimet janë lajm i mirë për përdoruesit në desktop, laptop dhe mobile. Kushdo që përdor Chrome duhet të vërë re ndryshimet se reklamat nuk ngadalësojnë më eksperiencën e tyre online.Google synon të inkurajojë reklamuesit të krijojnë reklama që nuk përdorin imazhet të kompresuara keq, që dërgojmë kriptomonedha apo shfrytëzojnë procesorin.Reklamat të cilat përdorin bandwidth më shumë sesa 4MB ose përdorin procesorin për më shumë se 15 sekonda në një afat 30 sekondësh.', '2021-09-11 23:12:46'),
(76, 51, 65, 'Operatorët Gjermanië dhanë 6.5 miliardë euro për frekuencat 5G në një betejë të egër mes Deutsche Telekom dhe Vodafone', '1599860315_germa.jpg', 'Tenderi i frekuencave 5G në Gjermani u mbyll ditën e Mërkure pasi grumbulloi plot 6.6 miliardë euro në një betejë të egër mes Deutsche Telekom dhe Vodafone që zgjati për 52 ditë.Shuma ishte shumë më e lartë sesa kishin pritur analistët prej 3 deri në 5 miliardë euro.Katër kompanitë që fituan të drejtat e ofrimit të shërbimeve 5G ishin Deutsche Telekom me 2.2 miliardë euro, Vodafone me 1.9 miliardë euro, Telefonica me 1.4 miliardë euro dhe Drillisch me 1.1 miliardë euro.Deutsche Telekom kritikoi çmimin e lartë të frekuencave 5G. Kompania tha se kjo do të bëhet pengesë për zgjerimin e rrjetit 5G brenda afateve të parashikuara.Shefi i operacioneve Gjermane të Vodafone gjithashtu mbështeti qëndrimin e Deutsche Telekom duke thënë se tenderi ka qenë një fatkeqësi për Gjermaninë.Por për ministrin Gjermane të financave Olaf Scholz, ankandi i frekuencave 5G ka qenë një sukses dhe vendi synon ti përdorë për të financuar zhvillimin e infrastrukturave dixhitale në vend.Gjenerata më e fundit e teknologjisë celulare shihet si jetike për kompanitë industriale në Gjermani të cilat duan ta përdornin 5G për të avancuar operacionet e tyre kryesisht në makinat autonome dhe internetin e gjërave.Ankandi i fundi i frekuencave celulare u mbajt në 2015-ën ku u ngritën 5.09 miliardë euro.', '2020-09-11 23:16:18'),
(77, 51, 65, 'Databaza me 236 milionë llogari të Instagram, TikTok dhe YouTube ekspozohen për të aksesuar.', '1599860192_data.jpg', 'Ekipi hulumtues pranë Comparitech zbuloi sesi një databazë me 235 milionë llogari Instagram, TikTok dhe YouTube ishte ekspozuar online.Kohët e fundit ka pasur raportime për shfaqjen e llogarive në tregjet e zeza. Një audit i bërë së fundi thotë se 15 miiliardë kredenciale nga 100,000 thyerje sigurie qarkullojnë nëpër forumet e tregjeve të zeza.Databazat e pasiguruara po shndërrohen në problem. Databaza me 235 milionë llogari Instagram, TikTok dhe YouTube u la e zbuluar për të aksesuar nga kushdo dhe u zbulua më 1 Gusht.Të dhënat janë ndarë në disa sete ndërsa më të rëndësishmet ishin dy prej tyre me afro 100 milionë llogari secila nga Instagram. Seti i tretë i përkiste TikTok me 42 milionë llogari dhe së fundi YouTube me 4 milionë llogari.Sipas Comparitech seti i të dhënave përmban:Emra profiliEmra realëFoto profiliPërshkrimi llogarieNumra ndjekësishNivel angazhimiNivel rritjejeGjinia audienceVendndodhje audiencePëlqimeMoshaGjiniOraret e postimevePor nga erdhën këto të dhëna? Hulumtuesit sugjerojnë se janë nga një kompani të quajtur Deep Social i përjashtuar nga Facebook dhe Instagram për vjedhje informacionesh të përdoruesve. Kompania u shua pak kohë më pas.Sapo hulumtuesit gjetën setin e të dhënave kontaktuan me administratorët e Deep Social të cilët përmes firmës së marketingut Social Data e rrëzuan databazën.Social Data mohoi çdo lidhje me Deep Social duke thënë se ata janë thjeshtë një kompani e cila grumbullon informacione vetëm për konsumatorë të besueshëm dhe përdoren për qëllimi të kufizuara.', '2021-02-11 23:19:17'),
(78, 51, 66, 'Kompania Zoom lançoi verifikimin me dy faktorë (2FA) për të gjithë llogaritë pas sulmeve zoomboming.', '1599859424_zoom.jpg', 'Zoom lançoi verifikimin me dy faktorë (2FA) për të gjithë llogaritë duke e bërë më të lehtë parandalimin e fenomenit “zoomboming” dhe thyerje të tjera të sigurisë.Sapo aktivizohet sistemi do tu kërkojë përdoruesve të vendosin kode një njëpërdorimshme nga aplikacionet e autentikimit, përmes SMS ose një telefonate.Kështu tentativat e sulmuesve për të vjedhur llogaritë do të bllokohen sepse duhet të kenë akses fizikisht në pajisjen tuaj.2FA është i disponueshëm për Zoom në ueb, desktop, aplikacionet mobile dhe Zoom Room. Bazohet në protokollin TOPT që do të thotë se funksionon me aplikacionet Google Authenticator, Microsoft Authenticator dhe FreeOTP.Kompania mbështet edhe metoda të tjera si SAML, Oauth dhe verifikim me fjalëkalim. Në fillim të vitit Zoom përfundoi në telashe sepse pretendonte që ofrojë video thirrje të enkriptuara por që nuk ishte ashtu.Kur vendosi ta sillte këtë nivel sigurie tha se do të ofrohet vetëm për përdoruesit me pagesë e përsëri u kritikua ndërsa vendosi ta ofrojë për të gjithë.Në rastin e 2FA, niveli i sigurisë vlen për të gjithë përdoruesit me pagesë dhe falas.', '2021-02-11 23:23:44'),
(79, 51, 66, 'Sanksionet kundër kompanisë Huawei japin goditjet e para ndaj gjigandëve Amerikan të teknologjisë.', '1599859526_huawei.jpg', 'Aksionet e Brodacom ranë me 8.6% duke fshirë mese 9 miliardë dollarë në vlerë tregu prej kompanisë e cila në të kaluarën kishte zyrat qendrore në Azi po tashmë në Amerikë.Broadcom dërgoi një valë goditëse në industrinë e prodhimit të çipeve ditën e Premte ku paralajmëroi se lufta tregtare SHBA-Kinë dhe ndalimi i të bërit biznes me Huawei do ti shkaktojë kompanisë një humbje prej 2 miliardë dollarë.Paralajmërimi i Broadcom është prova më e qartë e dëmit që po shkakton lufta tregtare e Trump me Pekinin.Aksionet e Brodacom ranë me 8.6% duke fshirë mese 9 miliardë dollarë në vlerë tregu prej kompanisë e cila në të kaluarën kishte zyrat qendrore në Azi po tashmë në Amerikë.Prodhuesi e çipeve si Qualcomm, Applied Materials, Intel, AMD dhe Xilinx gjithashtu panë aksionet të binë mes 1.5% deri në 3%.Aksionet e pothuajse të gjithë furnizuesve të Huawei ranë.Huawei përbënte 900 milionë dollarë shitje të Broadcom, ose 4% të tij. Industria e semikonduktorëve është ballafaquar me kërkesë të ulët që prej mesit të 2018-ës dhe lufta e fundit gjeopolitike së bashku me sanksionet ndaj Huawei janë një shok më tepër.Broadcom i cili njihet për çipet e Wi-Fi, Bluetooth dhe GPS tek smartfonët, gjithashtu është një furnizues i madh i Apple.Edhe CEO i një tjetër gjiganti Amerikan të prodhimit të çipeve Micron Technology tha se sanksionet ndaj Huawei sjellin paqartësi dhe shqetësime në industrinë e semikonduktorëve.', '2021-02-11 23:25:26'),
(81, 51, 66, 'Galaxy S10, 5G, ekrane me palosje: Ja sesi Samsung do të rikthejë besimin tek smartfonët e saj.', '1599859710_galaxy.jpg', 'Të duket sikur telefoni yt Samsung është bërë i mërzitshëm? Kjo do të ndryshojë së shpejti. Linja e telefonëve të gjigandit Korean këtë vit do të bëjë një hap të rëndësishëm përpara. Në mesin e avancimeve janë: skanerët e shenjave të gishtërinjve, 5G-ja dhe telefonët me palosje që shndërrohen edhe në tablet.Ditën e Mërkure kur Samsung të prezantojë Galaxy S10 do të kemi një paraqitje sesi këto risi do të marrin formë edhe tek modelet e tjera gjatë vitit. Gjigandi Korean i elektronikës do të përdorë aktivitetin “Unpacked” për të prezantuar Galaxy S10. Gjithashtu në fokus do të jenë edhe veshjet elektronike përveç 5G-së dhe telefonëve me palosje.Aktiviteti do të zbulojë disa prej ndryshimeve më të mëdha ndër vite me telefonët Samsung. Megjithatë duket sikur është vonuar e gjitha kjo. Le ta pranojmë, telefonët nuk janë më ato produktet emocionuese që blinim. Është bërë edhe me e vështirë për prodhuesit të aplikojnë inovacione të reja edhe pse çmimet janë rritur. Samsung, Apple dhe të gjithë të tjerët duhet të punojnë më shumë nëse duan të na habitin. Përballë kësaj dremitje të inovacionit, shumë prej nesh kanë ngelur me telefonë të vjetër si asnjëherë më parë.Shitjet e telefonëve ranë me 5% në 376 milion njësi tre mujorin e fundit të vitit të kaluar. Kjo është hera e parë që shitjet e telefonëve bien gjatë një viti të plotë shprehej Strategy Anayltics. Muajin e kaluar Samsung raportoi rënie të të ardhurave. Shumica e bizneseve nga çipet tek ekranet kishin pasur kërkesë më të ulët se asnjëherë më parë. Të ardhurat nga smartfonët ranë, ashtu edhe çipet e memories.', '2021-02-21 23:28:30'),
(82, 51, 66, 'Microsoft sjellë Windows 10 do të ketë një tastierë të re virtuale me imazhe GIF të integruara n', '1599859875_win.jpg', 'Microsoft ka planifikuar përditësime të mëdha të tastierës me versionin e ri të Windows 10-ës.Dizajni i ri i tastierës me prekje është inspiruar nga Windows 10X dhe sjell animacione e tinguj të rinj si dhe opsionin për të kërkuar dhe dërguar imazhe të animuara GIF.Microsoft e quante WonderBar në Windows 10X. Dizajni i ri ka organizim më të mirë i optimizuar për të shkruar apo për të lëvizur kursorin duke prekur mbi butonin e madh space bar.Kjo e fundit është një mënyrë e ngjashme sesi Apple operon tastierën virtuale në iOS. Duke vendosur gishtin mbi space bar dhe tërhequr majtas, djathtas, lart e poshtë për të naviguar.Microsoft ka përditësuar dhe emoji në Windows 10. Përveç tastierës dhe emoji, Microsoft prezantoi “Voice Typing” e ri. Vjen me një dizajn më modern, me shenja pikësimi automatike dhe Microsoft thotë se ka punuar në sfond për ta bërë shkrimin me zë më stabil dhe të qëndrueshëm.Të gjitha këto po testohen në programin Windows Insider. Ato janë pjesë e një përditësimi të madh që Microsoft ka planifikuar për gjysmën e parë të 2021 në Windows 10.', '2021-02-11 23:31:15'),
(83, 51, 66, 'OnePlus 7T: Nëse po kërkoni ekselencë por pa shpenzuar shumë ky është telefoni për tu blerë.', '1600347729_one.png', 'OnePlus është padyshim mbreti i smartfonëve me vlerën më të lartë për koston që kanë dhe kompania tashmë është rikthyer me një tjetër hit: OnePlus 7T.Ky telefon merr shumë prej tipareve që përdoruesit kanë dashuruar aq shumë në OnePlus 7 Pro dhe i vendos në një pajisje me kosto të përballueshme edhe më e fuqishme sesa vetë telefoni.Por thellimi atë çfarë OnePlus 7T është shumë i rëndësishëm për të qartësuar linjën konfuze të produkteve të OnePlus.Teknikisht OnePlus 7T është pasardhësi i OnePlus 7 dhe jo OnePlus 7 Pro.OnePlus 7T ndan nota të shumta dizajni me gjeneratën e kaluar të OnePlus por me disa ndryshime madhore. Forma është e gjatë. Ngjan me një version të zgjatuar të OnePlus me ekranin 6.55-inç krahasuar me atë 6.41-inç të OnePlus 7.Ekrani ka një “notch” edhe më të vogël sesa OnePlus 7. Diferenca më e madhe me gjeneratën e kaluar është paneli rrethor i kamerës në pjesën e pasme të telefonit.Ekrani është i mrekullueshëm por jo pa të meta. Është vetëm 1080p, që do të thotë se ka rezolucion më të vogël sesa OnePlus 7 Pro. Do të kishim dëshiruar të shikonim ekranin 1440p.Megjithatë ashtu si OnePlus 7 Pro, OnePlus 7T ka ekran me frekuencë 90Hz duke ofruar një eksperiencë grafike më të lëmuar. Animacionet dhe lëvizje janë më të lëmuara se në ekranet 60Hz. Ekrani gjithashtu ka një shkëlqim tejet të lartë deri në 1,000 nits. Dhe më e rëndësishmja është ekran AMOLED me ngjyra të forta, të qarta dhe nivele të thella të ngjyrës së zezë.', '2020-09-17 15:02:09'),
(84, 69, 68, 'Përveç kësaj, ajo ka instaluar një ndriçim të veçantë RGB që ndryshon përshtypjen vizuale.  Ky është një shembull unik, por vietnamezi njoftoi se ai mund të fillonte prodhimin masiv nëse Sony e lejon atë. Në atë rast, natyrisht, do të kushtojë shumë më te', '1615764087_wer.jpg', 'një tastierë e rregullt PlayStation 5.një tastierë e rregullt PlayStation 5.një tastierë e rregullt PlayStation 5.një tastierë e rregullt PlayStation 5.një tastierë e rregullt PlayStation 5.një tastierë e rregullt PlayStation 5.një tastierë e rregullt PlayStation 5.një tastierë e rregullt PlayStation 5.një tastierë e rregullt PlayStation 5.', '2021-03-15 00:21:27'),
(85, 70, 68, 'Drejtori i Real Madridit, Butragueno refuzon të flas për kthimin e Cristiano Ronaldos', '1615927501_cristiano.png', 'Drejtori i Real Madridit, Emilio Butragueno ka refuzuar të përgjigjet në pyetjet për rikthimit e Cristiano Ronaldos. Ai u pyet para ndeshjes që Real Madridi e luan në shtëpi ndaj Atalantas pas fitores në ndeshjen e parë me rezultat 1-0. Në një intervistë për Sky Sport Italia para ndeshjes Butragueno ka thënë se janë të fokusuar në ndeshjen e sotme, duke refuzuar të flas për Ronaldon. “Atalanta është një ekip i rrezikshëm që sulmon me shumë lojtarë dhe ka shumë mundësi për të shënuar. Do të jetë një ndeshje e hapur me dy skuadra të shkëlqyera dhe rezultati mund të jetë shumë i hapur, kështu që ne do të shohim se çfarë do të ndodhë”, ka thënë ai për ndeshjen.“Ronaldo? E gjithë energjia jonë duhet të jetë në këtë ndeshje dhe të rezervojmë vendin tonë në shortin e çerekfinales”, nënvizoi ai duke refuzuar të flas për portugezin.', '2021-03-16 21:45:01'),
(86, 70, 68, 'Inter Miami dhe Beckham kanë gjetur mbrojtësin e majtë, dëshirojnë të nënshkruajë me Marcelon', '1615929425_beckham.png', 'David Beckham po kërkon të sjellë Marcelo në MLS te skuadra Inter Miami.Pronari i Miamit tashmë ka siguruar shërbimet e ish sulmuesit të Real Madrid dhe Juventusit, Gonzalo Higuain.Sipas France Football, Beckham është i interesuar të nënshkruajë me ish-shokun e tij të skuadrës te Los Blancos, Marcelon.Dyshja kanë krijuar një miqësi të mirë gjatë viteve sa ishin bashkë, e cila mund të jetë e dobishme që mbrojtësi i majtë të marr kontratën që dëshiron para pensionit.Braziliani nuk është më zgjedhja e parë në Real Madrid, pasi ka humbur vendin e tij nga Ferland Mendy gjatë dy sezoneve të fundit.Kontrata e 32-vjeçarit me klubin nga “Santiago Bernabeu” skadon në fund të edicionit 2021/22.', '2021-03-16 22:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(65, 'Teknologji', ''),
(66, 'Biznes', ''),
(67, 'Bota', ''),
(68, 'Sport', ''),
(69, 'Ekonomi', ''),
(74, 'Auto', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(126) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`) VALUES
(51, 'blerim', 'blerim@asd.com', '$2y$10$zFffHL/vCW6hkoiqb04yU.I3NhuHPI9kZDRaGMXjPuk.LPnFRi0Z.', 1),
(56, 'adriatik', 'adriatik@asd.com', '$2y$10$PHh92vZ0RTbVN/4Az0Yyr.fHBMCyXg9iWYaDQTFYXATmzb549r9S2', 1),
(57, 'filanfisteku', 'filanfisteku', '$2y$10$CfJpr90a/eVi4QngXuLXeeaEZHmpGIqw9gizPqjW9LnNE7jQrVMDa', 1),
(70, 'filan123', 'filan123@asd.com', '$2y$10$yA/UNU0rR/3RgwwqPUDCdeHGz0OswDLDCOBDqOBLb57sT1qb1aRY2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
