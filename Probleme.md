**--- baza de date ---**

verifica in application/config

--> pentru localhost

$db['default']['hostname'] = 'localhost';<br />
$db['default']['username'] = 'root';<br />
$db['default']['password'] = '';<br />
<b>$db['default']['database'] = 'pc-nou';</b><br />
$db['default']['dbdriver'] = 'mysql';<br />

<br />
**--- problema css ---**
<br />
verifica in index.php

e defapt de la Base Url - trebuie specificat pentru localhost

case 'development':
> error\_reporting(E\_ALL);
<b> define('BASE_URL',   '<a href='http://localhost/site-pc/pc2/'>http://localhost/site-pc/pc2/</a>');</b>

asa gaseste calea de localhost sa gaseasca cssul :)

<br />
**--- problema rute ---**
<br />
rutele pe localhost vor functiona DAR dupa index.php

exemplu:

$route['biblia'] = "frontend/biblia";

va fii accesata de aici http://localhost/site-pc/pc2/index.php/biblia