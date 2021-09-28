-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 09:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL,
  `titoloevento` varchar(100) NOT NULL,
  `anteprimaevento` tinytext NOT NULL,
  `testoevento` mediumtext NOT NULL,
  `dataevento` varchar(12) NOT NULL,
  `oraevento` varchar(7) NOT NULL,
  `imgevento` varchar(100) NOT NULL,
  `autore` int(11) NOT NULL,
  `prezzo` int(6) NOT NULL,
  `postitotali` int(6) NOT NULL,
  `iscritti` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`idevento`, `titoloevento`, `anteprimaevento`, `testoevento`, `dataevento`, `oraevento`, `imgevento`, `autore`, `prezzo`, `postitotali`, `iscritti`) VALUES
(1, 'Lettura di \'Matilde\' - Roald Dahl', 'Matilde ha imparato a leggere a tre anni, e a quattro ha già divorato tutti i libri della biblioteca pubblica. L\'intelligenza e la cultura, sembra dire l\'autore, sono le uniche armi che un debole può usare contro l\'ottusità e la prepotenza.',
'Matilde Dalverme è una bambina di cinque anni e mezzo, dotata di un\'intelligenza straordinaria: a un anno e mezzo sapeva già parlare correttamente e conosceva la maggior parte delle parole degli adulti, a tre anni ha imparato a leggere da sola grazie alle riviste sparse per casa, a quattro anni sapeva già leggere velocemente e a cinque aveva già letto quasi tutti i libri della biblioteca pubblica. Ha però la sfortuna di essere nata in una famiglia disonesta: la madre è una donna grassa, sciocca e superficiale \'schiava\' del bingo; il padre Enrico è un disonesto rivenditore di automobili usate di dubbia qualità e provenienza; il fratello maggiore Michele è già in procinto di diventare, in tutto e per tutto, uguale ai genitori. Essi odiano Matilde perché non è come loro e non perdono occasione per offenderla e insultarla, prendendo di mira in particolare la sua passione per la lettura. Così la piccola, dopo una discussione sull\'onestà andata a male con il padre, decide di punirlo architettando degli scherzi: una volta cosparge di colla il cappello del padre, un\'altra volta chiede in prestito un pappagallo e lo nasconde nel camino facendo credere ai genitori che la stanza in cui è nascosto sia stregata, un\'altra volta ancora fa una miscela a base della lozione per capelli del padre con acqua ossigenata, facendolo diventare biondo.
Arriva l\'autunno e Matilde inizia la scuola, fatto di cui è molto felice, perché la scuola le permetterà di allontanarsi per un po\' di tempo dalla famiglia con cui non si trova bene. La scuola, però, è il regno della terribile signorina Spezzindue, la preside, una donna dalla forza sovrumana, ex atleta olimpionica, che usa i bambini per allenarsi nel lancio del martello o li rinchiude in un armadio chiamato \'strozzatoio\'. Per fortuna Matilde trova una maestra molto gentile, la dolce e bravissima signorina Betta Dolcemiele, colpita dalle qualità della bambina. Un giorno una delle amiche di Matilde, Violetta, mette un tritone nella caraffa dell\'acqua della Spezzindue. Matilde, che non ama le ingiustizie e la violenza, si sente scoppiare di rabbia, soprattutto quando viene accusata di aver messo il tritone nel bicchiere d\'acqua. Matilde scopre di avere il potere della telecinesi, e con l\'aiuto della signorina Dolcemiele impara a padroneggiarlo, fino a poterlo utilizzare per mettere in fuga la Spezzindue. Fuggono anche i genitori di Matilde, inseguiti dalla polizia, ed accettano ben volentieri di lasciare Matilde con la signorina Dolcemiele, che diventa così la sua madre adottiva, una madre affettuosa e comprensiva.
', '20-06-2020', '15:00', 'matilde.jpg', 1, 5, 100, 0),
(2, 'Incontro con l\'autore \'Fabio Genovesi\'- Chi manda le onde', 'Incontro con l\'autore Fabio Genovesi. Scrittore di un romanzo semplice che racconta il quotidiano rincorrersi dei sentimenti con il candore di uno scrittore che sa guardare negli occhi dei lettori.', 
'Ci sono onde che arrivano e travolgono per sempre la superficie calma della vita. Succede a Luna, bimba albina dagli occhi così chiari che per vedere ha bisogno dell\'immaginazione, eppure ogni giorno sfida il sole della Versilia cercando le mille cose straordinarie che il mare porta a riva per lei. Succede a suo fratello Luca, che solca le onde con il surf rubando il cuore alle ragazze del paese. Succede a Serena, la loro mamma stupenda ma vestita come un soldato, che li ha cresciuti da sola perché la vita le ha insegnato che non è fatta per l\'amore. E quando questo tsunami del destino li manda alla deriva, intorno a loro si raccolgono altri naufraghi, strambi e spersi e insieme pieni di vita: ecco Sandro, che ha quarant\'anni ma vive ancora con i suoi, e insieme a Marino e Rambo vive di espedienti improvvisandosi supplente al liceo, cercando tesori in spiaggia col metal detector, raccogliendo funghi e pinoli da vendere ai ristoranti del centro. E poi c\'è Zot, bimbo misterioso arrivato da Chernobyl con la sua fisarmonica stonata, che parla come un anziano e passa il tempo con Ferro, astioso bagnino in pensione sempre di guardia per respingere l\'attacco dei miliardari russi che vogliono comprarsi la Versilia. Luna, Luca, Serena, Sandro, Ferro e Zot, da un lato il mare a perdita d\'occhio, dall\'altro il profilo aguzzo e boscoso delle Alpi Apuane. Quando il dolore arriva a schiacciarli lì in mezzo, sarà la vita stessa a scuoterli con i suoi prodigi, sarà proprio il mare che misteriosamente comincerà a parlare. E questa armata sbilenca si troverà buttata all\'avventura, a stringersi e resistere in un on the road tra leggende antiche, fantasmi del passato, amori impossibili e fantasie a occhi aperti, diventando così una stranissima, splendida famiglia. Fabio Genovesi ha scritto un romanzo traboccante di personaggi e di storie, sospeso come un sogno, amaro ed esilarante, commovente e scatenato come la vita vera. Un romanzo che parla la lingua calda e diretta dei suoi personaggi, che scava dentro esistenze minime e laterali per trovarci un disegno: spesso lo chiamiamo \'caso\', ma la sua magia è così scintillante che per non vederla bisogna proprio tenere gli occhi stretti.', 
'12-07-2020', '16:00', 'ChiMandaLeOnde.jpg', 2, 20, 200, 0),
(3, 'Lettura di \'Il vento tra i salici\' - Kenneth Grahame', 'Sulle rive di un placido fiume dalle acque color smeraldo, i signori Talpa e Topo d\'acqua trascorrono serenamente le loro giornate. Ma, si sa, il gusto per la scoperta e la voglia di avventura sono difficili da tenere a bada: e allora perché non partire?', 
'Alcuni mesi dopo, Tasso visita Talpa e Ratto per cercare un rimedio alle ossessioni autodistruttive di Rospo. Dopo aver provato a parlargli senza risultati, decidono di mettere sotto controllo la sua casa; ma Rospo fugge e ruba un\'automobile. Viene catturato, trascinato in tribunale e condannato a vent\'anni di carcere. Frattanto, Ratto visita Lontra e scopre che uno dei suoi figli è scomparso. Ratto e Talpa aiutano Lontra a cercarlo. Ricevono aiuto dal dio Pan, che li guida nel luogo ove si trova il cucciolo scomparso. Pan rimuove poi dalla loro memoria il ricordo del loro incontro.
In prigione, Rospo giace in lacrime, guadagnandosi le simpatie della figlia del carceriere, che decide di aiutarlo a scappare. Lo convince a travestirsi da lavandaia. Così camuffato, Rospo fugge dal carcere e si reca alla stazione, dove riesce a prendere un treno che lo riporterà a casa (avendo lasciato i soldi nei suoi vestiti, rimasti in carcere, è costretto a promettere al macchinista di lavargli la biancheria). Mentre è in viaggio, si accorge che il treno è inseguito da una locomotiva colma di poliziotti che intimano al macchinista di fermarsi. Rospo salta dal treno in corsa e si rifugia in un bosco, per ricominciare la fuga a piedi il giorno successivo.
Il mattino seguente, sempre vestito da lavandaia, raggiunge il fiume e si offre di lavare la biancheria alla proprietaria di una barca guidata da un cavallo. Successivamente litiga con la proprietaria, la deruba del cavallo, che poi vende ad uno zingaro. Raggiunta la Strada Maestra, ferma un\'auto, i cui proprietari gli offrono un passaggio. Ma dopo un po\' decide di mettersi al volante provocando un nuovo incidente. Dopo essere fuggito, riesce in qualche modo a raggiungere Villa Rospi.
Qui scopre che gli abitanti del Bosco Selvaggio si sono insediati nella sua dimora, nonostante i tentativi di proteggerla da parte di Talpa e Tasso. Benché afflitto dalla perdita della sua casa, Rospo comprende di avere dei veri amici, e quanto sia stato negativo il suo comportamento. Attraverso un passaggio segreto, Tasso, Talpa, Ratto e Rospo entrano in casa e scacciano gli intrusi. Rospo, riconquistata Villa Rospi, promette di correggere i suoi errori, e di seguire sempre i consigli dei suoi amici. Gli animaletti finalmente possono vivere felicemente insieme.',
'28-06-2020', '15:30','IlVentoNeiSalici.jpg', 1, 5, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `autore`
--

CREATE TABLE `autore` (
  `idautore` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(512) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `attivo` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autore`
--

INSERT INTO `autore` (`idautore`, `email`, `password`, `nome`, `attivo`) VALUES
(1, 'ginopino@blogtw.com', 'pass2019', 'Gino Pino', 1),
(2, 'cippalippa@blogtw.com', 'pass2019', 'Cippa Lippa', 1);


--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(512) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `attivo` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idcliente`, `email`, `password`, `nome`, `attivo`) VALUES
(1, 'michelarossi@gmail.com', 'pass2019', 'Michela Rossi', 1),
(2, 'beatriceveridi@gmail.com', 'pass2019', 'Beatrice Veridi', 1);


--
-- Table structure for table `notifica`
--

CREATE TABLE IF NOT EXISTS `notifica` (
  `id` int(30) NOT NULL,
  `messaggio` varchar(300) NOT NULL,
  `stato` int(1) NOT NULL DEFAULT 0,
  `ruolodestinatario` char(1),
  `destinatario` int(11) NOT NULL,
  `titolo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idevento`),
  ADD KEY `fk_evento_autore_idx` (`autore`);

--
-- Indexes for table `autore`
--
ALTER TABLE `autore`
  ADD PRIMARY KEY (`idautore`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indexes for table `comments`
--
ALTER TABLE `notifica`
 ADD PRIMARY KEY (`id`);
 
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `autore`
--
ALTER TABLE `autore`
  MODIFY `idautore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifica`
--
ALTER TABLE `notifica`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_autore` FOREIGN KEY (`autore`) REFERENCES `autore` (`idautore`) ON DELETE NO ACTION ON UPDATE NO ACTION;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;