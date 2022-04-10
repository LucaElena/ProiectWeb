# ProiectWeb https://profs.info.uaic.ro/~busaco/teach/courses/web/web-projects.html

**CyMaT (Cycling Maintenance Web Tool)**

**Cerinta :**

Creați un sistem online de management al programărilor și stocurilor unui operatii de service de motociclete, biciclete, trotinete (electrice sau nu). Fiecare client va consulta calendarul service-ului, iar apoi va completa un formular cu data și ora dorită, plus detalii despre problemă, putând adăuga inclusiv fișiere multimedia (imagini și filme). Administratorul afacerii va putea respinge programarea adăugând un mesaj explicativ: "Ne pare rău, dar nu avem în stoc piesele necesare pentru reparație, reveniți în S săptămâni" sau o va putea aproba, oferind și un preț estimativ, plus alte detalii de interes. De asemenea, aplicația îi va permite acestuia să țină evidența stocurilor existente, cât și a comenzilor date către furnizori. Sistemul va putea importa date în format CSV și JSON. Pentru exportul datelor, se va recurge la oricare dintre formatele CSV, JSON, PDF. Bonus: simularea activitatii service-ului pe o perioada de timp: luni/ani.

Trello : https://trello.com/b/1l9q8Kse/project


Culori : https://coolors.co/palette/e63946-f1faee-a8dadc-457b9d-1d3557


Simboluri: https://unicode-table.com/en/ sau https://fontawesome.com/

**Done till now:**

-Pagina calendar generala pentru client si admin cu html/css/javascript complet. Mai trebuie retusata si legata la sfarsit de celelalte pagini. 

-SQL baza de date si populat un pic tabelele pentru partea a doua

-Pagina de formular client(cu mesaj txt/video pentru admin , buton de editare/stergere/trimite) + loc pentru raspuns admin(text cu accept + pret/ fara acept + info ) etc Mai trebuie retusata si legata la sfarsit de celelalte pagini.

-Pagina de formular admin(vede mesaj txt/video de la client) + loc de editare un raspuns, 1-2 selector de adauga/stergere piese necesare reparatie intr-un tabel si mesaj + buton de editare/stergere/trimite raspuns formular) etc. Va bloca piesele ca programate. Mai trebuie retusata si legata la sfarsit de celelalte pagini.

-Pagina admin de terminare a unei reparatii(efectiv tot un view de formular + raspuns si editare piese utilizate) . Va muta piesele programate in utilizate.  Mai trebuie retusata si legata la sfarsit de celelalte pagini.

-Pagina istoric reparatii client(un tabel cu link-uri catre toate formularele clientului curent) 

-Pagina admin export diferite date ca CSV, JSON sau PDF(niste selectori + butoane de export)

-Pagina admin de administrare stoc(un tabel cu toate piesele din stoc pe mai multe pagini(cate 10/25/50 ...) + buton de adauga/sterge un numar de piese curente + selectori de filtrare deasupra tabelului(drop))

-Pagina admin de administrare comenzi(un tabel cu toate comenzile curente + buton de primire comanda + selector de piese pentru a comnda un numar de piese)

**TO DO tasks pentru partea 1:**

**-Pagina acasa client/admin

-Pagina de login/signup/reset pass user(acesleasi pt client/admin)


-Testat paginile daca sunt responsive

-Legat paginile intre ele**

-Testat paginile daca sunt corecte (https://validator.w3.org/ & https://jigsaw.w3.org/css-validator/ & https://stylelint.io/) + filtre min/max ... p buttoane  + add get/post in pagini + chestii de securitate

-Documentatie

**TO DO tasks pentru partea 2:**

-functionalitate in php si javascrip + baza de date terminata in sql.
