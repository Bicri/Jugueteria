# Jugueteria
Para correr el programa en un ambiente linux, primeramente debes de instalar **apache** puedes usar 
```
sudo apt install apache2
```

después necesitas instalar **PHP** y el conector de MySQL para que el programa funcione de la menra correcta, para ello puedes usar los siguientes comandos
**NOTA**:_el sistema se desarrollo usando PHP 7.4_ 
```
sudo apt -y install software-properties-common
```
```
sudo add-apt-repository ppa:ondrej/php
```
```
sudo apt-get update
```
```
sudo apt -y install php7.4
```
Ahora solo falta agregar el conector de MySQL, con el siguiente comando:
```
sudo apt-get install -y php7.4-cli php7.4-json php7.4-common php7.4-mysql php7.4-zip php7.4-gd php7.4-mbstring php7.4-curl php7.4-xml php7.4-bcmath
```
Y ahora finalmente puedes clonar el repositorio, recuerda que debe ser sobre la ruta de donde sirve Apache, la ruta default es `/var/www/html/` y tendrías el setup  inicial para trabajar con el sistema.
