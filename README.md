Alfred Workflow for finding datasheets
=========================

An Alfred workflow to look for datasheets on Farnell and open them in the browser

![Starting point](https://raw.github.com/akupila/Alfred-workflow-datasheet/master/Screenshot%201.png)
![Looking for TPS61200](https://raw.github.com/akupila/Alfred-workflow-datasheet/master/Screenshot%202.png)
![Looking for ATMEGA328P](https://raw.github.com/akupila/Alfred-workflow-datasheet/master/Screenshot%203.png)

Installation
-------------
* Download the workflow and doubleclick datasheet.alfredworkflow to install.
* *Optional: change country code*
  * Open workflow in Alfred preferences
  * Select datasheet
  * Double click Script Filter
  * On the top of the text box you see `$country = "nl";`, change `nl` to something else

Changing the country code is likely not necessary, it doesn't affect the language or anything like that. However products that are not available in the Netherlands might not show up.

Usage
-------------
Type datasheet {part number}

Examples:

* `datasheet MOC3031`
* `datasheet TPS61200`
* `datasheet atmel atmega328p`

Credits
-------------
This workflow was created by Antti Kupila to relieve some annoyance on going through a bunch of sites on Google trying to look for a datasheet :)

The workflow uses the excellent [workflows.php helper class] by [David Ferguson]

The icon is done by [Fasticon] and included in the [Leopard iPhone icon pack]

[David Ferguson]: http://dferg.us/
[workflows.php helper class]: http://dferg.us/workflows-class/
[Fasticon]: http://www.fasticon.com/
[Leopard iPhone icon pack]: http://www.iconspedia.com/pack/leopard-iphone-1878/