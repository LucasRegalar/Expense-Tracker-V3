# Laravel Project - Expense & Income Tracker

This Project shall serve both as a real life working simulation and an IHK-like exam-project to kinda "finish" my training.
I will simulate the real life working environment with my friend Sebestion (Rose), an experienced Laravel developer, as my Project Manager.
We will have weekly meeting in which I will present him my new code and we can talk my progress. He will review my code, mark problematic sections, help me with problems and confront me with challenges I could face in a real job as well. I this READ ME I will try to document the important parts of our Meetings and general information.  

## Preliminary Considerations and Notes for me

Git
- Main for Production (Laravel)
- Development Branch
- Feature Branch (theoretisch für jedes Feature, wir nehmen nur einen)

Git commit messages
- Bug-Fix: 'fix(dashboard): "(This commit will...) fix the table view for..."'
- Feature: 'feat(dashboard): "(This commit will...) add the table view for..."'
- TO DO nie committen!

Quelltext Dokumentation -> Comments for all methods etc.

Facharbeit
- Was bedeutet es?
- Welches Problem?
- Warum codest du es selbst? -> creativ sein weil es natürlich eigentlich schon genug expense Tracker gibt
- Tech-Stack
- UML-Klassen-Diagramm
- Datenbank Struktur mit Draw SQL.APP
- Budget -> wie lange in Stunden? Wie viel bei 24,5€?

Pflichtenheft
- kommt von Kunden und beinhaltet was er will

Lasenheft
- verfasse ich auf Grundlage des Pflichtenhefts und schicke dem Kunden darin was ich machen kann/will. Kunde unterzeichnet das Lastenheft.

Notiz: App 'offen' bauen!!! Rose kommt am Ende noch mit extra features.

## Lastenheft

- Authentication and Authorization
- 2x Usertypen -> Premiumuser
- Graphische Anzeige (Eingabe, Ausgabe, Balance)
- Software soll Einkommen und Ausgaben tracken
- Daueraufträge
- Gesamtbalance, monatliche Balance -> evtl. flexible Auswahl
- Kategorien (sellbst löschen hinzufügen) -> Premium eigene Icons hochladen?
- Tabellarische Übersicht letzten 5 
- Tabellarische Übersicht mit Filtern
- Profilfoto
- Dark-Bright-Modus
- Responsive

## 1. Protokoll 18. Mai 2024

Anfangsaufgaben:
- TechStack -> erklären warum
- Budget berechnen -> in pt(8std.) ich brauche für die 8 pt so und so lange, weil ich nur so und so viel arbeite
- UML-Klassen-Diagramm -> wird sich wahrscheinlich von der späteren App unterscheiden
- Datenbank-Struktur -> wird aktuell gehalten
- Interface
- Abgabe Termin überlegen (1. Juli?)

## Tech-Stalk

- Laravel
    - starkes Framework mit guter Dokumentation
    - deckt das Front- und das Backend ab
    - viele Laravel Features nehmen Arbeit ab (bspw. Validation)
- TablePlus (SQLite)
    - It's free
    - SQLite, weil es für unsere Datenbank schon ausreicht
- TailwindCSS
    - starkes Framework mit guter Dokumentation
    - Zeitersparnis beim coden
- ChartJS
    - einfache implementierung verschiedenster Graphen
- Font-Awesome Icons
    - schöne free & comercial use icons

## Budget (1pt = 8 Arbeitsstunden)

- Interface inkls. Design -> 3 pt
- Datenbankstruktur + Eloquent Relations -> 0.5 pt
- Tabellarische Übersicht mit Filtern -> 0.5 pt
- Restliche grundliegende Logik -> 0.5 pt
- Add Transaction -> 0.5 pt
- Daueraufträge -> 1 pt
- Kategorien hinzufügen -> 0.5 pt
- Premium: Eigene Icons -> 0.5 pt
- Profilfoto hinzufügen -> 0.25 pt
- graphische Anzeige -> 0.5 pt

Insgesamt: 7.75 + 25% (Puffer + weil ich das erste mal mit Laravel & Tailwind arbeite) ca. 10 pt.
Bei 20 Arbeitsstunden die Woche ca. 4 Wochen. -> Ungefähre Abgabe 27.06.24

## Datenbank-Struktur

https://drawsql.app/teams/lucas-team-47/diagrams/expensetracker

## UML-Klassen-Diagramm
https://lucid.app/lucidchart/e04d31ae-82bf-4945-a196-01f75c85c3b0/edit?invitationId=inv_8033e0b3-05ff-479d-a1ed-bf59b846f631&page=0_0#

Teilbarer-Link
https://lucid.app/lucidchart/e04d31ae-82bf-4945-a196-01f75c85c3b0/edit?viewport_loc=509%2C-685%2C2813%2C1230%2C0_0&invitationId=inv_8033e0b3-05ff-479d-a1ed-bf59b846f631


## 2. Protokoll 26. Mai 2024

Inhalt:
- Besprechung Datenbank-Struktur -> ein paar Änderungen
- Besprechen UML-Klassen-Diagram -> Erweiterung um Controller, aber keine Models 
- Feature: Jeder Transaktion können bis zu drei Kategorien zugeordnet werden. Davon ist eine die Hauptkategorie

Aufgaben:
- UML-Klassen-Diagramm überarbeiten
- Datenbank-Struktur überarbeiten


### Notizen ###

- Modals % Migrations etc. first
- Transactions-Form -> Autotoggle bei - oder +. Was bei 0?
- Daueraufträge mit einem scheduled command


### Fragen Rose ###

- Dark Mode in RegisteredUserController oder extra Profilcontroller (PrefrencesController)?
- Dark Mode in Datenbank speichern und dann mit in profil-settings changen?
- wo bzw. was für controller,migrations,models,factories, seeders, policies, requests?
- kann ich eine Transaction->catepries() Eloquent Relation aufbauen ? (pivot Table)
- Kann ich auf Datenbank Ebene categories für Transactions als pflichtfeld einbauen? (Pivot Table)
- Kann ich in meiner transaction factory direkt eine Categorie hinzufügen? (Pivot Table)
- SQLite always have to run PRAGMA foreign_keys = ON; after I migrate:fresh?
- wie und wann git commiten?

## TO-DO am Ende ##

- responsive design für sehr kleine width