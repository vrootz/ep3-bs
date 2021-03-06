# ep3-bs
Stuff changed for ep3-bs from tkrebs

# kiosk
Story behind:
https://github.com/tkrebs/ep3-bs/issues/378

Its not necessary to install any kind of browser plugin or extansion which offer you an autologin, you can easily do an autologin with a html file and a bash script.

<ul>
  <li><b>kiosk.html</b>: HTML file includes the login form of the ep3-bs software. Its just a copy of the original fine and we want to set our values fixed in it. The key of the autologin is, that we change the action variable and we send this to the full login URL!
    Be aware that the specific user credentials are in plain text and for everyone visible with access on this file.</li><br>
  <li><b>kiosk.sh</b>: The bash script includes three browser commands from Firefox, Chromium and Google Chrome which open the <b>kiosk.html</b> file in kiosk mode and in a new window. Don't forget to mark it as executable under file properties or with <code>chmod +x /var/kiosk.kiosk.sh</code> command.</li><br>
  <li><b>### OPTIONAL ###<br>iptables.txt</b>: The iptables is an optional advantage if you want to restrict the access of the device to the WWW if people have physical access. Just install the <b>iptables-persistent</b> and execute the commands but change the <b>website URL</b> in the script!</li><br>
  <li>I personally recommend to set a sleep timer of 60s before executing the bash script to trigger the autologin. The system maybe need some time to be fully loaded and ready e.g. DHCP of the network connection was it in my case!</li>
</ul><br>

Now you just need to set a cronjob which execute the <b>kiosk.sh</b> after rebooting <code>@reboot sleep 60 && /var/kiosk/kiosk.sh</code> into <code>crontab -e</code>
<br><b>or</b><br>on Ubuntu you can just search for the default application <b>Startup Application</b> and you put the full path to the bash script in it e.g. <code>sleep 60;/var/kiosk/kiosk.sh</code>

Thats pretty much all.

#############################<br>
GERMAN<br>
#############################<br><br>
Geschichte dahinter: tkrebs/ep3-bs#378

Es ist nicht notwendig, irgendeine Art von Browser-Plugin oder Erweiterung zu installieren, die ein Autologin erm??glichen, der Autologin kann einfach mit einer html-Datei und einem Bash-Skript durchgef??hrt werden.

<ul>
  <li><b>kiosk.html</b>: Die HTML-Datei enth??lt das Anmeldeformular der ep3-bs Software. Lediglich das Login Form wird hier verwendetunsere Logindaten statisch festzulegen. Der Schl??ssel des Autologins ist, dass wir die Aktionsvariable ??ndern und diese an die vollst??ndige Login-URL des Platzbuchungssystems senden! Beachte, dass die spezifischen Benutzerdaten im Klartext und f??r jeden sichtbar sind, der Zugriff auf diese Datei hat.</li><br>
  <li><b>kiosk.sh</b>: Das Bash-Skript enth??lt drei Browserbefehle von Firefox, Chromium und Google Chrome, die die Datei <b>kiosk.html</b> im Kioskmodus und in einem neuen Fenster ??ffnen. Nicht vergessen das Script als ausf??hrbar zu markieren, entweder unter den File Optionen oder mit dem <code>chmod +x /var/kiosk.kiosk.sh</code> Befehl.</li><br>
  <li><b>### OPTIONAL ###<br>iptables.txt</b>: Die iptables ist eine kleine Erg??nzung, wenn der Zugang zum Internet eingeschr??nkt werden soll, weil Mitglieder direkten Zugriff auf das Ger??t haben. Installiere einfach die software <b>iptables-persistent</b> und f??hre die Befehle aus, aber ??nder die <b>Website-URL</b> im Skript!</li><br>
  <li>Ich pers??nlich empfehle, einen Sleep-Timer von 60s zu setzen, bevor das Bash-Skript ausgef??hrt wird, um damit den Autologin auszul??sen. Das System braucht vielleicht etwas Zeit um vollst??ndig geladen und bereit zu sein, z.B. DHCP der Netzwerkverbindung war es in meinem Fall um eine Verz??gerung zu erzwingen!
</li>
</ul><br>

Nun muss man nur noch einen Cronjob einrichten, der nach dem Reboot die <b>kiosk.sh</b> ausf??hrt, daf??r einfach folgende Zeile <code>@reboot sleep 60 && /var/kiosk/kiosk.sh</code> in die <code>crontab -e</code> hinzuf??gen<br>
<b>oder</b><br>
unter Ubuntu kann man einfach nach der Standardanwendung <b>Startup Application</b> suchen und dort den vollst??ndigen Pfad zum Bash-Skript eingeben z.B. <code>sleep 60;/var/kiosk/kiosk.sh</code>

Das ist so ziemlich alles.

# uid
Since our association has now introduced new membership numbers, our board wanted these to be entered in the seat booking software for each individual. For this purpose, the so-called <b>UID</b> (User ID) should serve as a membership number. However, since the user IDs cannot be edited easily, this must be adjusted manually in the database. However, key adjustments are always a bit critical and you have to keep a series fooge here. Since the phpmyadmin interface couldn't really help me, I created a quick workaround here.

<b>Currently only the tables <b>bs_bookings, bs_users, bs_users_meta</b> are considered here, nothing else!!!<br>
I ALWAYS recommend creating a backup of the database before manually screwing on the database!!!<br>
Use the script at your own risk!!!</b>

<ul>
  <li><b>searchform.html</b>: The HTML file only contains an input field with which you can read out the information for which the UID is used. Simply enter the current UID and press the Submit button.</li><br>
  <li><b>search.php</b>: The connection data of the database used must be entered in the search.php file before use in order to be able to read the files. If the UID is available, all data records from the tables <b>bs_bookings, bs_users, bs_users_meta</b> will be output.<br>Now you have the option of replacing the current UID with a new UID. Simply enter the new UID in the input field and press Submit.</li><br>
  <li><b>replace.php</b>: The connection data of the database used must also be entered in replace.php before use in order to be able to read and replace the files. In addition, the individual steps including the old extract of the data, the replace query and the extract of the new data. If an excerpt is output with no content, then there are no records.</li><br>
  <li>I do not recommend placing the three files in the <b>/</b> (root) directory but in an area that is protected, for example, by a .htaccess file and protected by a login or only from certain IP addresses can be reached from.</li>
</ul><br>

If everything is done until yet, just open the searchform.html directly with the URL in your browser e.g. https://example.com/directory/searchform.html

#############################<br>
GERMAN<br>
#############################<br><br>

Da unser Verein nun neue Mitgliedsnummern eingef??hrt hat, wollte unser Vorstand, dass diese auch in der Platzbuchungssoftware nun f??r jeden einzelnen eingetragen werden. Hierf??r soll die sogenannte <b>UID</b> (User ID) als Mitgliedsnummer dienen. Da allerdings die User ID's nicht ohne leichteres zu bearbeiten sind, muss dies h??ndig in der Datenbank angepasst werden. Allerdings sind Schl??sselanpassungen immer etwas kritisch und man muss hier eine Reihenfolge einhalten. Da mir die phpmyadmin Oberfl??che da nicht wirklich weiterhelfen konnte, habe ich hier mal einen schnellen Workaround geschaffen.

<b>Momentan werden hier nur die Tabellen <b>bs_bookings, bs_users, bs_users_meta</b> ber??cksichtigt, sonst keine!!!<br>
Ich empfehle IMMER ein Backup der Datenbank zu erstellen, bevor manuell an der Datenbank geschraubt wird!!!<br>
Nutzung des Scripts auf eigene Gefahr!!!</b>
<ul>
  <li><b>searchform.html</b>: Die HTML-Datei enth??lt lediglich ein Eingabefeld mit der man die Informationen auslesen kann, bei denen die UID verwendet wird.  Einfach momentane UID eingeben und den Submit Knopf bet??tigen.</li><br>
  <li><b>search.php</b>: In der search.php Datei muss vor Benutzung die Verbindungsdaten der verwendeten Datenbank eingegeben werden um die Dateien auslesen zu k??nnen. Falls die UID vorhanden ist, werden alle Datens??tze aus den Tabellen <b>bs_bookings, bs_users, bs_users_meta</b> ausgegeben.<br>Nun hat man die M??glichkeit die momentane UID mit einer neuen UID zu ersetzen. Daf??r einfach in das Eingabefeld die neue UID eintippen und auf Submit dr??cken.</li><br>
  <li><b>replace.php</b>: In der replace.php muss auch vor Benutzung die Verbindungsdaten der verwendeten Datenbank eingegeben werden um die Dateien auslesen und ersetzen zu k??nnen. Au??erdem werden die einzelnen Schritte samt den alten Auszug der Daten, dem Replace Query und den Auszug der neuen Daten ausgegeben . Falls ein Auszug ohne Inhalt ist ausgegeben wird, dann sind keine Datens??tze vorhanden.</li><br>
  <li>Ich empfehle die drei Dateien nicht in das <b>/</b> (root-) Verzeichnis zu legen sondern in einen Bereich der bspw. durch eine .htaccess Datei gesch??tzt ist und durch einen Login oder nur von gewissen IP-Adressen aus erreichbar ist.</li>
</ul><br>

Falls das alles soweit getan ist, einfach die searchform.html aufrufen und starten bspw. https://example.com/unterordner/searchform.html
