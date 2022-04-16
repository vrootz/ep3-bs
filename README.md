# ep3-bs
Stuff changed for ep3-bs from tkrebs

# kiosk
Story behind:
https://github.com/tkrebs/ep3-bs/issues/378

Its not necessary to install any kind of browser plugin or extansion which offer you an autologin, you can easily do an autologin with a html file and a bash script.

<ul>
  <li><b>kiosk.html</b>: HTML file includes the login form of the ep3-bs software. Its just a copy of the original fine and we want to set our values fixed in it. The key of the autologin is, that we change the action variable and we send this to the full login URL!
    Be aware that the specific user credentials are in plain text and for everyone visible with access on this file.</li><br>
  <li><b>kiosk.sh</b>: The bash script includes three browser commands from Firefox, Chromium and Google Chrome which open the <b>kiosk.html</b> file in kiosk mode and in a new window.</li><br>
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

Es ist nicht notwendig, irgendeine Art von Browser-Plugin oder Erweiterung zu installieren, die ein Autologin ermöglichen, der Autologin kann einfach mit einer html-Datei und einem Bash-Skript durchgeführt werden.

<ul>
  <li><b>kiosk.html</b>: Die HTML-Datei enthält das Anmeldeformular der ep3-bs Software. Lediglich das Login Form wird hier verwendetunsere Logindaten statisch festzulegen. Der Schlüssel des Autologins ist, dass wir die Aktionsvariable ändern und diese an die vollständige Login-URL des Platzbuchungssystems senden! Beachte, dass die spezifischen Benutzerdaten im Klartext und für jeden sichtbar sind, der Zugriff auf diese Datei hat.</li><br>
  <li><b>kiosk.sh</b>: Das Bash-Skript enthält drei Browserbefehle von Firefox, Chromium und Google Chrome, die die Datei <b>kiosk.html</b> im Kioskmodus und in einem neuen Fenster öffnen.</li><br>
  <li><b>### OPTIONAL ###<br>iptables.txt</b>: Die iptables ist eine kleine Ergänzung, wenn der Zugang zum Internet eingeschränkt werden soll, weil Mitglieder direkten Zugriff auf das Gerät haben. Installiere einfach die software <b>iptables-persistent</b> und führe die Befehle aus, aber änder die <b>Website-URL</b> im Skript!</li><br>
  <li>Ich persönlich empfehle, einen Sleep-Timer von 60s zu setzen, bevor das Bash-Skript ausgeführt wird, um damit den Autologin auszulösen. Das System braucht vielleicht etwas Zeit um vollständig geladen und bereit zu sein, z.B. DHCP der Netzwerkverbindung war es in meinem Fall um eine Verzögerung zu erzwingen!
</li>
</ul><br>

Nun muss man nur noch einen Cronjob einrichten, der nach dem Reboot die <b>kiosk.sh</b> ausführt, dafür einfach folgende Zeile <code>@reboot sleep 60 && /var/kiosk/kiosk.sh</code> in die <code>crontab -e</code> hinzufügen<br>
<b>oder</b><br>
unter Ubuntu kann man einfach nach der Standardanwendung <b>Startup Application</b> suchen und dort den vollständigen Pfad zum Bash-Skript eingeben z.B. <code>sleep 60;/var/kiosk/kiosk.sh</code>

Das ist so ziemlich alles.
