# contao-seasonal-bundle

## Saisonale Aktivierung von Contentelementen

Mit der Erweiterung können einzelne Inhaltselemente saisonmäßig ein- oder ausgeblendet werden. Über Veröffentlichungsprofile können Zeiträume definiert werden, in denen das Inhaltselement angezeigt wird. Es ist auch eine automatische jährliche Wiederholung einstellbar.

Basis für die Entwicklung war die propritäre Erweiterung **publicationprofiles** von Oliver Willmes.

## Installation

Das ZIP wird in der Installation in ein Verzeichnis packages ausgepackt (muss erstellt werden).

Ergänzen Sie als letzten Eintrag im Bereich "require" diese Zeile
```
    "require": {
        "do-while/contao-seasonal-bundle": "^1.0"
    }
```
Dann rufen Sie den Composer mit `composer update` auf oder Sie rufen den Contao Manager auf.



Im **Contao-Manager** und wählt auf dem PAKETE-Tab unten am grünen Button die Funktion **Alle Pakete aktualisieren** aus.

## Backend

Im Backend-Menü im Bereich System ist jetzt ein neuer Menüpunkt `Veröffentlichungsprofile` hinzu gekommen.

Hier lassen sich Kategorien erstellen und darin die Veröffentlichungsprofile definieren. Die Kategorien erlauben eine bessere Pflege und Sortierung nach Themengebieten, die Profile aller Kategorien sind jedoch alle gleichwertig.

In allen Inhaltselementen gibt es jetzt ganz am Ende die Auswahl des Veröffentlichungsprofils. In der Selectbox finden Sie alle vorhandenen Profile untern deren Überschrift der Kategorien.<br>
Wenn Sie kein Profil wählen `-- immer anzeigen --` dann wird das Inhaltselement ganz normal, wie in Contao üblich, angezeigt.



### Versionen:
* 1.0 stable - 2025-02-10 - Erstversion für Contao 5.3


___
Softleister - 2025-02-10 - info@softleister.de
