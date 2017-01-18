# PHP rühmatöö projekt
**Rühmatööde demo päev** on valitud eksamipäev jaanuaris, kuhu tullakse terve rühmaga koos!

## Tööjuhend
1. Üks rühma liikmetest _fork_'ib endale käesoleva repositooriumi ning annab teistele kirjutamisõiguse/ligipääsu (_Settings > Collaborators_)
1. Üks rühma liikmetest teeb esimesel võimaluse _Pull request_'i (midagi peab olema repositooriumis muudetud)
1. Muuda repositooriumi README.md faili vastavalt nõutele
1. Tee valmis korralik veebirakendus

### Nõuded

1. **README.md sisaldab:**
    * Veebirakenduse nimi - NORM BEMM
    * suurelt projekti veebirakenduse pilt;
    * Johan Reili, Kristjan Känd, Jan Treiberg
    * Püüdsime lahendada BMW ossidele probleemi, kus kohas hinnata teiste osside bemme
    * kirjeldus (BMW omanikud, eripära võrreldes teiste samalaadsete rakendustega - sobib ainult BMW omanikele – kirjeldada vähemalt 2-3 sarnast rakendust mida eeskujuks võtta);
   
    * andmebaasi skeem loetava pildina + tabelite loomise SQL laused (kui keegi teine tahab seda tööle panna);
	Skeem: ![alt tag](https://i.imgsafe.org/f156d3f148.png)
	SQL laused: 
	CREATE TABLE cars (
	id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT,
	series VARCHAR(10),
	year INT,
	color VARCHAR(7),
	power INT,
	gearbox VARCHAR(10),
	deleted DATE,
	imagename VARCHAR(50)
	);
	CREATE INDEX user_id
	ON cars (user_id);

	CREATE TABLE like(
	id INT AUTO_INCREMENT PRIMARY KEY,
	status_id INT(10),
	meeldib INT(10),
	ei_meeldi INT(10)
	);
	
	CREATE TABLE signup(
	id INT AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(225),
	password VARCHAR(225),
	created TIMESTAMP,
	UNIQUE (email)
	);
	
    * **kokkuvõte:** mida õppisid juurde? mis ebaõnnestus? mis oli keeruline? (kirjutab iga tiimi liige).
	Kristjan:

-- Mida õppisin juurde?

Õppisin juurde palju üldteadmisi PHP-st ja sain kindlasti rohkem aimu, kuidas lehekülgede valmistamine käib. Olen õnnelik,
et aine oli õppekavas, sest usun, et veebiprogrammeerimise teadmised tulevad kindlasti hiljem kasuks.

-- Mis ebaõnnestus?

Ebaõnnestus hindamissüsteemi ülesseadmine.

-- Mis oli keeruline?

Kõige keerulisem oli tegeleda hindamissüsteemiga, sest seda polnud me tunnis õppinud
ning pidime õpetusi otsima internetist. Leitud õpetustes oli tarvis ka muid programmeerimiskeeli,
mida varem õppinud pole.

Johan:

-- Mida õppisin juurde?

Õppisin tundma PHP-d ja HTML-i. Õppisin, kuidas luua veebilehekülge ja palju muud, mis käib veebilehekülje loomise
ja ülalpidamise juurde. Olen väga rahul, et aine oli õppekavas, kuna tean, et seal õpitud teadmised tulevad tulevikus
kindlasti kasuks.

-- Mis ebaõnnestus?

Enda veebbilehekülje loomisel ebaõnnestus luua töötavat hindamissüsteemi veebilehe funktsionaalsuse täitmiseks.

-- Mis oli keeruline?

Kõige keerulisemaks osutus iseseisvalt veebilehe loomine. See oli mahukas ülesanne ja minu jaoks kohati
keeruline, kuna enne kursust olid mu oskused nullilähedased ja meie projektis esines ülesandeid, mille lahendamine oli 
minu jaoks raske. Nt. piltide andmebaasi salvestamine ja veebilehel kuvamine.

Jan:

-- Mida õppisin juurde?

Õppisin üleüldse tundma PHP ja HTML-i kõige algelisemaid asju. Kuna varem mul ei olnud kokkupuudet sellega olnud, siis kõik oli minu jaoks
uus.

-- Mis ebaõnnestus?

Konkreetiselt ebaõnnestus hindamislehe tegemine

-- Mis oli keeruline?

Kõige keerulisemaks osutus iseseisvalt veebilehe loomine. See oli mahukas ülesanne ja minu jaoks kohati
keeruline, kuna enne kursust olid mu oskused nullilähedased ja meie projektis esines ülesandeid, mille lahendamine oli 
minu jaoks raske. Nt. piltide andmebaasi salvestamine ja veebilehel kuvamine.

2. **Veebirakenduse nõuded:**
    * rakendus on terviklik (täidab mingit funktsiooni ja sellega saab midagi teha);
    * terve arenduse ajal on kasutatud _git_'i ja _commit_'ide sõnumid annavad edasi tehtud muudatuste sisu; 
    * kasutusel on vähemalt 6 tabelit;
    * kood on jaotatud klassidesse;
    * koodis kasutatud muutujad/tabelid on inglise keeles;
    * rakendus on piisava funktsionaalsusega ja turvaline;
    * kõik tiimi liikmed on panustanud rakenduse arendusprotsessi.

## Abiks
* **Testserver:** greeny.cs.tlu.ee, [tunneli loomise juhend](http://minitorn.tlu.ee/~jaagup/kool/java/kursused/09/veebipr/naited/greenytunnel/greenytunnel.pdf)
* **Abiks tunninäited (rühmade lõikes):** [I rühm](https://github.com/veebiprogrammeerimine-2016s?utf8=%E2%9C%93&query=-I-ruhm), [II rühm](https://github.com/veebiprogrammeerimine-2016s?utf8=%E2%9C%93&query=-II-ruhm), [III rühm](https://github.com/veebiprogrammeerimine-2016s?utf8=%E2%9C%93&query=-III-ruhm)
* **Stiilijuhend:** [Coding Style Guide](http://www.php-fig.org/psr/psr-2/)
* **GIT õpetus:** [Become a git guru.](https://www.atlassian.com/git/tutorials/)
* **Abimaterjale:** [Veebirakenduste loomine PHP ja MySQLi abil](http://minitorn.tlu.ee/~jaagup/kool/java/loeng/veebipr/veebipr1.pdf), [PHP with MySQL Essential Training] (http://www.lynda.com/MySQL-tutorials/PHP-MySQL-Essential-Training/119003-2.html)
