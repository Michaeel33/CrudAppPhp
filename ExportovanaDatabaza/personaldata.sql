

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `eshop`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `personaldata`
--

CREATE TABLE `personaldata` (
  `perId` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `ulica` varchar(100) DEFAULT NULL,
  `mesto` varchar(50) DEFAULT NULL,
  `psc` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `personaldata`
--

INSERT INTO `personaldata` (`perId`, `firstName`, `lastName`, `ulica`, `mesto`, `psc`) VALUES
(1, 'Jozef', 'Novak', 'Hlavná 12', 'Bratislava', '81101'),
(2, 'Anna', 'Kováčová', 'Štúrova 5', 'Košice', '04001'),
(3, 'Peter', 'Horváth', 'Jarná 9', 'Prešov', '08001'),
(4, 'Lucia', 'Marekova', 'Dunajská 25', 'Trnava', '91701'),
(5, 'Jozef', 'Novak', 'Hlavná 12', 'Bratislava', '81101');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `personaldata`
--
ALTER TABLE `personaldata`
  ADD PRIMARY KEY (`perId`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `personaldata`
--
ALTER TABLE `personaldata`
  MODIFY `perId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
