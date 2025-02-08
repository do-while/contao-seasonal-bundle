# contao-seasonal-bundle

## Saisonale Aktivierung von Contentelementen

Mit der Erweiterung können einzelne Inhaltselemente saisonmäßig ein- oder ausgeblendet werden. Über Veröffentlichungsprofile können Zeiträume definiert werden, in denen das Inhaltselement angezeigt wird. Es ist auch eine automatische jährliche Wiederholung einstellbar.

Basis für die Entwicklung war die propritäre Erweiterung **publicationprofiles** von Oliver Willmes.


## Installation

Ergänzen Sie in der `composer.json`-Datei als letzten Eintrag im Bereich "require" diese Zeile
```
    "require": {
        "do-while/contao-seasonal-bundle": "^1.0"
    }
```
Dann rufen Sie den Composer mit `composer update` auf oder Sie verwenden den Contao Manager.

Im **Contao-Manager** auf dem PAKETE-Tab unten am grünen Button die Funktion **Alle Pakete aktualisieren** auswählen.


## Backend

Im Backend-Menü im Bereich **System** ist jetzt ein neuer Menüpunkt `Veröffentlichungsprofile` hinzu gekommen.

Hier lassen sich Profile erstellen und darin die Veröffentlichungsperioden definieren. Die Profile erlauben eine bessere Pflege und Sortierung nach Themengebieten, die Perioden aller Profile sind jedoch gleichwertig.

In allen Inhaltselementen gibt es jetzt ganz am Ende die Auswahl des Veröffentlichungsprofils. In der Selectbox finden Sie alle vorhandenen Perioden unter deren Überschrift der Profile.<br>
Wenn Sie keine Periode auswählen `-- immer anzeigen --` dann wird das Inhaltselement ganz normal, wie in Contao üblich, angezeigt.

---
---

## Seasonal activation of content elements

The extension can be used to show or hide individual content elements on a seasonal basis. Publishing profiles can be used to define periods in which the content element is displayed. Automatic annual repetition can also be set.

The basis for the development was the proprietary extension **publicationprofiles** by Oliver Willmes.

## Installation

In the `composer.json` file, add this line as the last entry in the “require” section
```
    "require": {
        "do-while/contao-seasonal-bundle": "^1.0"
    }
```
Then call up the Composer with `composer update` or use the Contao Manager.

In the **Contao Manager** on the PACKAGES tab at the bottom, selct the **Update all packages** function on the green button.


## Backend

A new menu item `Publication profiles` has now been added to the backend menu in the **System** area.

Profiles can be created here and the publication periods defined within them. The profiles allow better maintenance and sorting by subject area, but the periods of all profiles are the same.

In all content elements there is now a selection of the publication profile at the very end. In the select box you will find all existing periods under their profile heading.
If you do not select a period `-- always show --` then the content element is displayed normally, as usual in Contao.


---
---

### Versionen:
* 1.0 stable - 2025-02-08 - Erstversion für Contao 5.3


___
Softleister - 2025-02-08 - info@softleister.de
