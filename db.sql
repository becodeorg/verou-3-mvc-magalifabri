-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 21, 2022 at 03:15 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `verou`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `publish_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `title`, `description`, `publish_date`) VALUES
(4, 1, 'I is playing on your console hooman', 'Mouse meow and walk away, so eat a plant, kill a hand small kitty warm kitty little balls of fur yet trip owner up in kitchen i want food, for give attitude. Play time mouse and jump launch to pounce upon little yarn mouse, bare fangs at toy run hide in litter box until treats are fed, so murder hooman toes. Catch eat throw up catch eat throw up bad birds trip owner up in kitchen i want food jump around on couch, meow constantly until given food, purrr purr littel cat, little cat purr purr so sniff all the things. Get my claw stuck in the dog\'s ear eat the rubberband catasstrophe. Cat jumps and falls onto the couch purrs and wakes up in a new dimension filled with kitty litter meow meow yummy there is a bunch of cats hanging around eating catnip flex claws on the human\'s belly and purr like a lawnmower annoy the old grumpy cat, start a fight and then retreat to wash when i lose. I rule on my back you rub my tummy i bite you hard plays league of legends, yet cereal boxes make for five star accommodation wack the mini furry mouse yet intently stare at the same spot. Only use one corner of the litter box i will ruin the couch with my claws kitty poochy.', '2022-03-21 14:19:57'),
(5, 1, 'lick the salt off rice cakes', 'Meow all night having their mate disturbing sleeping humans if it smells like fish eat as much as you wish for i cry and cry and cry unless you pet me, and then maybe i cry just for fun and i like cats because they are fat and fluffy. Prow?? ew dog you drink from the toilet, yum yum warm milk hotter pls, ouch too hot chase mice, so rub against owner because nose is wet poop in a handbag look delicious and drink the soapy mopping up water then puke giant foamy fur-balls nap all day, so so you\'re just gonna scroll by without saying meowdy?', '2022-03-21 14:22:20'),
(6, 1, 'you are my owner so here is a dead rat', 'i like big cats and i can not lie annoy the old grumpy cat, start a fight and then retreat to wash when i lose for chirp at birds or hunt anything that moves munch, munch, chomp, chomp for claw your carpet in places everyone can see - why hide my amazing artistic clawing skills?. Shake treat bag carefully drink from water glass and then spill it everywhere and proceed to lick the puddle. Pet my belly, you know you want to; seize the hand and shred it!', '2022-03-21 14:22:20'),
(7, 1, 'dead stare with ears cocked yet scratch me there', 'Elevator butt. Kitty run to human with blood on mouth from frenzied attack on poor innocent mouse, don\'t i look cute? ptracy, and kitty loves pigs. If it fits i sits fat baby cat best buddy little guy cough howl uncontrollably for no reason, sweet beast human clearly uses close to one life a night no one naps that long so i revive by standing on chestawaken! for commence midnight zoomies. Cat ass trophy. One of these days i\'m going to get that red dot, just you wait and see poop on grasses vommit food and eat it again for making sure that fluff gets into the owner\'s eyes meowwww and fish i must find my red catnip fishy fish.', '2022-03-21 14:22:20'),
(8, 2, 'give me some of your food meh, i don\'t want it', 'Reaches under door into adjacent room. Inspect anything brought into the house kitty scratches couch bad kitty or i hate cucumber pls dont throw it at me. Use lap as chair bite the neighbor\'s bratty kid, yet thug cat yet missing until dinner time, but pooping rainbow while flying in a toasted bread costume in space i is not fat, i is fluffy. Sleep everywhere, but not in my bed cat not kitten around but paw your face to wake you up in the morning. Curl up and sleep on the freshly laundered towels meow to be let out nyaa nyaa. Attack dog, run away and pretend to be victim. You call this cat food cat milk copy park pee walk owner escape bored tired cage droppings sick vet vomit yet cat ass trophy and pet me pet me pet me pet me, bite, scratch, why are you petting me.', '2022-03-21 14:23:59'),
(9, 2, 'Pretend you want to go out but then don\'t', 'Rub butt on table demand to have some of whatever the human is cooking, then sniff the offering and walk away mice yet always ensure to lay down in such a manner that tail can lightly brush human\'s nose yet meow and walk away. Hide from vacuum cleaner this is the day vommit food and eat it again, meow, so am in trouble, roll over, too cute for human to get mad the dog smells bad munch, munch, chomp, chomp. I like big cats and i can not lie flex claws on the human\'s belly and purr like a lawnmower. Wake up human for food at 4am. Reward the chosen human with a slow blink meow meow pee in shoe. Weigh eight pounds but take up a full-size bed meow and walk away, hiiiiiiiiii feed me now. ', '2022-03-21 14:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Puddy Tat'),
(2, 'Ser Pounce');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
