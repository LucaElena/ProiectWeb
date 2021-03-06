<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <!-- <title>Documentatie Scholarly HTML Proiect TW : CyMaT (Cycling Maintenance Web Tool)</title> -->
</head>

<body prefix="schema: http://schema.org">
  <header>
    <h1>Documentatie Scholarly HTML Proiect TW : CyMaT (Cycling Maintenance Web Tool)</h1>
  </header>

  <div role="contentinfo">
    <ol role="directory">
      <li><a href="#revision-history"><span>0. </span>Revision History</a></li>
      <li><a href="#introduction"><span>1. </span>Introduction</a>
        <ol role="directory">
          <li><a href="#purpose"><span>1.1 </span>Purpose</a>
          </li>
          <li><a href="#document-conventions"><span>1.2 </span>Document Conventions</a></li>
          <li><a href="#audience"><span>1.3 </span>Intended Audience and Reading Suggestions</a></li>
          <li><a href="#scope"><span>1.4 </span>Product Scope</a></li>
          <li><a href="#references"><span>1.5 </span>References</a></li>
        </ol>
      </li>
      <li><a href="#overall-description"><span>2. </span>Overall Description</a>
        <ol role="directory">
          <li><a href="#perspective"><span>2.1 </span>Product Perspective</a></li>
          <li><a href="#functions"><span>2.2 </span>Product Functions</a></li>
          <li><a href="#characteristics"><span>2.3 </span>User Classes and Characteristics</a></li>
          <li><a href="#environment"><span>2.4 </span>Operating Environment</a></li>
          <li><a href="#constraints"><span>2.5 </span>Design and Implementation Constraints</a></li>
          <li><a href="#user-documentation"><span>2.6 </span>User Documentation</a></li>
          <li><a href="#assumptions-dependencies"><span>2.7 </span>Assumptions and Dependencies</a></li>
        </ol>
      </li>
      <li><a href="#external-interface-requirements"><span>3. </span>External Interface Requirements</a>
        <ol role="directory">
          <li><a href="#user-interfaces"><span>3.1 </span>User Interfaces</a></li>
          <li><a href="#hardware-interfaces"><span>3.2 </span>Hardware Interfaces</a></li>
          <li><a href="#software-interfaces"><span>3.3 </span>Software Interfaces</a></li>
          <li><a href="#communications-interfaces"><span>3.4 </span>Communications Interfaces</a></li>
        </ol>
      </li>
      <li><a href="#system-features"><span>4. </span>System Features/a>
          <!-- <ol role="directory">
            <li><a href="#system-features1"><span>4.1 </span>System Feature 1</a></li>
            <li><a href="#system-features2"><span>4.2 </span>System Feature 2</a></li>
          </ol> -->
      </li>
      <li><a href="#other-nonfunctional-requirements"><span>5. </span>Other Nonfunctional Requirements</a>
        <ol role="directory">
          <li><a href="#performance-requirements"><span>5.1 </span>Performance Requirements</a></li>
          <li><a href="#safety-requirements"><span>5.2 </span>Safety Requirements</a></li>
          <li><a href="#security-requirements"><span>5.3 </span>Security Requirements</a></li>
          <li><a href="#quality-attributes"><span>5.4 </span>Software Quality Attributes</a></li>
          <li><a href="#business-rules"><span>5.5 </span>Business Rules</a></li>
        </ol>
      </li>
      <li><a href="#other-requirements"><span></span>Other Requirements</a></li>
      <li><a href="#glossary"><span></span>Appendix A: Glossary</a></li>
      <li><a href="#analysis-models"><span></span>Appendix B: Analysis Models</a></li>
      <li><a href="#to-be-determined-list"><span></span>Appendix C: To Be Determined List</a></li>
    </ol>
    <dl>
      <dt>Authors</dt>
      <dd>
        Adina Copacianu
        &amp;
        Elena Calmis
        &amp;
        Liliana Gavrilas
      </dd>
      <dt>License</dt>
      <dd>
        <a href="https://github.com/LucaElena/ProiectWeb/blob/main/LICENSE">GNU GENERAL PUBLIC LICENSE</a>
      </dd>
    </dl>
  </div>

  <section typeof="sa:Revision History" id="revision-history" role="revision-history">
    <h2><span>0. </span>Revision History</h2>
    <p>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Date</th>
          <th>Reason For Changes</th>
          <th>Version</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Evaluare partea 1:html/css si documentatie</td>
          <td>12-04-2022</td>
          <td></td>
          <td>Versiunea 1</td>
        </tr>
      </tbody>
    </table>
    </p>
  </section>

  <section id="introduction" role="Introduction">
    <h2><span>1. </span>Introduction</h2>
  </section>

  <section id="purpose" role="purpose">
    <h3><span>1.1 </span>Purpose</h3>
    <p>
      Scopul acestui proiect este rezolvarea acestei cerinte la obiectul Tehnologii Web:
    </p>
    <i>
      <p>
        "Crea??i un sistem online de management al program??rilor ??i stocurilor unui operatii de service de motociclete,
        biciclete, trotinete (electrice sau nu). Fiecare client va consulta calendarul service-ului,
        iar apoi va completa un formular cu data ??i ora dorit??, plus detalii despre problem??,
        put??nd ad??uga inclusiv fi??iere multimedia (imagini ??i filme).
      </p>
      <p>
        Administratorul afacerii va putea respinge programarea ad??ug??nd un mesaj explicativ:
        "Ne pare r??u, dar nu avem ??n stoc piesele necesare pentru repara??ie, reveni??i ??n S s??pt??m??ni"
        sau o va putea aproba, oferind ??i un pre?? estimativ, plus alte detalii de interes.
        De asemenea, aplica??ia ??i va permite acestuia s?? ??in?? eviden??a stocurilor existente,
        c??t ??i a comenzilor date c??tre furnizori. Sistemul va putea importa date ??n format CSV ??i JSON.
        Pentru exportul datelor, se va recurge la oricare dintre formatele CSV, JSON, PDF.
        Bonus: simularea activitatii service-ului pe o perioada de timp: luni/ani."
      </p>
    </i>
    <p>
      De asemena trebuie sa respectam si cerintele de aici :
      <a href="https://profs.info.uaic.ro/~busaco/teach/courses/web/web-projects.html">Pagina Tehnologie Web</a>
    </p>
  </section>

  <section id="document-conventions">
    <h3><span>1.2 </span>Document Conventions</h3>
    <p>
      Am incercat sa folosim urmatoarele conventii in rezolvarea proiectului:
    </p>
    <ul>
      <li>
        <p>
          pentru documentatie am folosit formatul <a href="https://w3c.github.io/scholarly-html/">Scholarly HTML</a>
        </p>
      </li>
      <li>
        <p>
          conform celor precizate ??n macheta <a
            href="https://github.com/rick4470/IEEE-SRS-Tempate#12-document-conventions">IEEE System Requirements
            Specification Template</a>
        </p>
      </li>
      <li>
        <p>
          nume clase HTML/CSS respectand reguli de denumire de la parinte spre copii. Ex: "parinte" ->
          "parinte__copil-1" "parinte__copil-2"
        </p>
      </li>
      <li>
        <p>
          o <a href="https://coolors.co/palette/e63946-f1faee-a8dadc-457b9d-1d3557">tema cromatica</a> similara in toate
          paginile
        </p>
      </li>
      <li>
        <p>
          paginile au icons de pe <a href="https://fontawesome.com/">fontawesome</a> alternat
          cu <a href="https://unicode-table.com/en/ ">tabelul unicode</a>
        </p>
      </li>
      <li>
        <p>
          paginile HTML similare au in general acelasi fisier CSS.
        </p>
      </li>
      <li>
        <p>
          paginile HTML au in general acelasi meniu pentru clienti in diferite pagini. Similar si pentru admin.
        </p>
      </li>
      <li>
        <p>
          paginile HTML au in general aspect asemanator.
        </p>
      </li>
    </ul>
  </section>

  <section id="audience" role="audience">
    <h3><span>1.3 </span>Intended Audience and Reading Suggestions</h3>
    <p>
      Audienta acestui proiect este profesorul evaluator.
      Si recomandam citirea documentatiei incepand cu sectiunea generala de introducere.
    </p>
  </section>

  <section id="scope" role="scope">
    <h3><span>1.4 </span>Product Scope</h3>
    <p>
      Audienta acestui proiect este profesorul evaluator.
      Si recomandam citirea documentatiei incepand cu sectiunea generala de introducere.
    </p>
  </section>

  <section id="references" role="references">
    <h3><span>1.5 </span>References</h3>
    <dl>
      <dt id="ref-TW">Tehnologie Web</dt>
      <dd property="schema:citation" typeof="schema:WebPage"
        resource="https://profs.info.uaic.ro/~busaco/teach/courses/web/web-projects.html">
        <cite property="schema:name"><a
            href="https://profs.info.uaic.ro/~busaco/teach/courses/web/web-projects.html">Pagina obiectului Tehnologie
            Web</a></cite>.
      </dd>
      <dt id="ref-GithubTW">Github Proiect TW</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="https://github.com/LucaElena/ProiectWeb">
        <cite property="schema:name"><a href="https://github.com/LucaElena/ProiectWeb">Pagina github a proiectului la
            TW</a></cite>.
      </dd>
      <dt id="ref-ScholarlyHTML">Scholarly HTML</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="https://w3c.github.io/scholarly-html/">
        <cite property="schema:name"><a href="https://w3c.github.io/scholarly-html/">Scholarly HTML format</a></cite>.
      </dd>
      <dt id="ref-IEEE-SRST">IEEE System Requirements Specification Template</dt>
      <dd property="schema:citation" typeof="schema:WebPage"
        resource="https://github.com/rick4470/IEEE-SRS-Tempate#12-document-conventions">
        <cite property="schema:name"><a href="https://github.com/rick4470/IEEE-SRS-Tempate#12-document-conventions">IEEE
            System Requirements Specification Template</a></cite>.
      </dd>
      <dt id="ref-Palette">Coolors palette</dt>
      <dd property="schema:citation" typeof="schema:WebPage"
        resource="https://coolors.co/palette/e63946-f1faee-a8dadc-457b9d-1d3557">
        <cite property="schema:name"><a href="https://coolors.co/palette/e63946-f1faee-a8dadc-457b9d-1d3557">Coolors
            palette used</a></cite>.
      </dd>
      <dt id="ref-Font-Awesome">Font Awesome</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="https://fontawesome.com/">
        <cite property="schema:name"><a href="https://fontawesome.com/">Pagina cu icons folosita: Font
            Awesome</a></cite>.
      </dd>
      <dt id="ref-Unicode-Table">Unicode table</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="https://unicode-table.com/en/ ">
        <cite property="schema:name"><a href="https://unicode-table.com/en/ ">Pagina cu tabelul unicode folosit ca
            icons</a></cite>.
      </dd>
      <dt id="ref-HTML">HTML</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="http://www.w3.org/TR/html5/">
        <cite property="schema:name"><a href="http://www.w3.org/TR/html5/">One of the HTML Specifications</a></cite>.
      </dd>
      <dt id="ref-ValidatorconsortiuWEB">Validator conform specifica??iilor Consor??iului Web</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="https://validator.w3.org/">
        <cite property="schema:name"><a href="https://validator.w3.org/">Pagina spre validator HTML conform
            specifica??iilor Consor??iului Web</a></cite>.
      </dd>
      <dt id="ref-ValidatorCSS">Validator CSS</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="https://jigsaw.w3.org/css-validator/">
        <cite property="schema:name"><a href="https://jigsaw.w3.org/css-validator/">Pagina spre validator
            CSS</a></cite>.
      </dd>
    </dl>
  </section>

  <section id="overall-description" role="Overall Description">
    <h2><span>2. </span>Introduction</h2>
  </section>

  <section id="perspective" role="perspective">
    <h3><span>2.1 </span>Product Perspective</h3>
    <p>
      Acest sitem este o aplicatie web noua de gestiune al program??rilor ??i stocurilor unui operatii de service de
      motociclete
      <img src="./WebPart/images/overview.png">
    </p>
  </section>

  <section id="functions" role="functions">
    <h3><span>2.2 </span>Product Functions</h3>
    <p>
      Lista de functii ale aplicatiei web:
    </p>
    <ul>
      <li>
        <p>
          gestiune programarilor service-ul de motociclete din punctul de vedere al clientilor si administratorului
        </p>
      </li>
      <ul>
        <li>
          <p>
            calendar pentru alegerea unei date si ore disponibile pentru client
          </p>
        </li>
        <li>
          <p>
            formular pentru client de completarea a unei programari cu descrierea problemei prin text si fisiere
            video/imagini
          </p>
        </li>
        <li>
          <p>
            administratorul poate raspunde unui formular printr-un mesaj text si o propunere de pret cu piese necesare.
          </p>
        </li>
        <li>
          <p>
            administratorul poate respinge un formular cu un mesaj explicativ
          </p>
        </li>
        <li>
          <p>
            apoi clientul poate accepta/respinge oferta de pret a administratorului
          </p>
        </li>
      </ul>
      <li>
        <p>
          clientul isi poate vedea istoricul programarilor
        </p>
      </li>
      <li>
        <p>
          gestiune stocurilor service-ul de motociclete din punctul de vedere al administratorului
        </p>
      </li>
      <ul>
        <li>
          <p>
            pagina ce permite edditare numarului de piese aflate in stoc (totale cat si a celor rezervate pentru
            programari)
          </p>
        </li>
      </ul>
      <li>
        <p>
          gestiune comenzilor service-ul de motociclete din punctul de vedere al administratorului
        </p>
      </li>
      <ul>
        <li>
          <p>
            pagina ce permite trimiterea unei comenzi de piese catre furnizorii
          </p>
        </li>
        <li>
          <p>
            pagina ce permite gestiunea comenzilor date (mutarea din lista de asteptare in stoc)
          </p>
        </li>
      </ul>
      <li>
        <p>
          gestiune datelor pentru administrator
        </p>
      </li>
      <ul>
        <li>
          <p>
            export diferite parti din datele aplicatiei in format CSV/JSON/PDF
          </p>
        </li>
        <li>
          <p>
            import diferite parti din datele aplicatiei in format CSV/JSON
          </p>
        </li>
      </ul>
    </ul>
  </section>

  <section id="characteristics" role="characteristics">
    <h3><span>2.3 </span>User Classes and Characteristics</h3>
    <p>
      Ne propunem sa folosim un model MVC si anticipam sa folosim urmatoare clase:
    </p>
    <ul>
      <li>
        <p>core:</p>
      </li>
      <ul>
        <li>
          <p>App si Controller</p>
        </li>
      </ul>
      <li>controllers:</li>
      <ul>
        <li>
          <p> Api, Programare, Formular, Piesa, Login , Reset, Signup, Comanda, Stoc ...</p>
        </li>
      </ul>
      <li>
        <p>models:</p>
      </li>
      <ul>
        <li>
          <p>User, Formular, Comanda , Piesa, Date ...</p>
        </li>
      </ul>
      <li>
        <p>views:</p>
      </li>
      <ul>
        <li>
          <p>PaginaPrincipala, Formular, Calendar, Istoric, Stoc, Comenzi, Api ...</p>
        </li>
      </ul>
  </section>

  <section id="environment" role="environment">
    <h3><span>2.4 </span>Operating Environment</h3>
    <p>
      Folosim pagini web compatibile HTML5 cu CSS si JavaScript pentru interactiuni locale cu utilizatorul.
      Pentru partea de backend ne propunem sa folosim PHP ce va fi procesat in Xampp intr-un server de Apache.
      De asemenea pentru stocarea datelor aplicatiei vom folosi MySql de asemenea procesat in Xampp.
    </p>
  </section>

  <section id="constraints" role="constraints">
    <h3><span>2.5 </span>Design and Implementation Constraints</h3>
    <p>
      Desing-ul este limitat de timpul scurt de realizare a aplicatie si cunostintele noastre actuale...
    </p>
  </section>

  <section id="user-documentation" role="user-documentation">
    <h3><span>2.6 </span>User Documentation</h3>
    <ul>
      <li>
        <a href="https://developer.mozilla.org/en-US/">MDN</a>
      </li>
      <li>
        <a href="https://www.w3schools.com/">W3SHCOOL</a>
      </li>
      <li>
        <a href="https://profs.info.uaic.ro/~busaco/teach/courses/web/web-projects.html">Pagina obiectului Tehnologie
          Web</a>
      </li>
      <li>
        <a href="https://github.com/rick4470/IEEE-SRS-Tempate#12-document-conventions">IEEE System Requirements
          Specification Template </a>
      </li>
      <li>
        <a href="https://coolors.co/palette/e63946-f1faee-a8dadc-457b9d-1d3557">Coolors palette</a>
      </li>
      <li>
        <a href="https://fontawesome.com">Font Awesome</a>
      </li>
      <li><a href="https://unicode-table.com">Unicode table</a></li>
      <li><a href="https://css-tricks.com/">Css-tricks</a></li>
      <li><a href="https://validator.w3.org/">HTML validator</a></li>
      <li><a href="https://jigsaw.w3.org/css-validator/">Css validator</a></li>
    </ul>


  </section>
  <section id="assumptions-dependencies" role="assumptions-dependencies">
    <h3><span>2.7 </span>Assumptions and Dependencies</h3>
    <p>
      Nu cunoastem dependinte.
    </p>
  </section>

  <section id="external-interface-requirements" role="External Interface Requirements">
    <h2><span>3. </span>External Interface Requirement</h2>
  </section>

  <section id="user-interfaces" role="user-interfaces">
    <h3><span>3.1 </span>User Interfaces</h3>
    <p>
      Logica principalelor interfete pentru utilizatori nostri.
    </p>
    <ul>
      <li>
        <p>
          logica interfata programari clienti/admin:
        </p>
      </li>
      <ul>
        <li>
          <p>
            un grid cu dreptunghiuri cu functionalitate de buton de la 08 la 19, de Luni pana Duminica
          </p>
        </li>
        <li>
          <p>
            butoane de stanga-dreapta pentrua a schimba ziua/saptamana/luna de start a calendarului
          </p>
        </li>
        <li>
          <p>
            butoanele de stanga-dreapta ce schimba saptamana/luna calculeaza prima luni din urmatoarele +/-7 sau +/-31
            zile
          </p>
        </li>
        <li>
          <p>
            butoanele de culoare rosie sunt ocupate de clientul curent si pot fi selectate pentru editare/vizualizare
            formularului respectiv
          </p>
        </li>
        <li>
          <p>
            butoanele de culoare gri sunt ocupate de de alti clienti si nu pot fi selectate de userul curent
          </p>
        </li>
        <li>
          <p>
            butoanele de culoare verde sunt libere si pot fi selectate pentru a incepe un nou formular la acea data si
            ora
          </p>
        </li>
        <li>
          <p>
            butonul de culoare albastru este cel selectat
          </p>
        </li>
        <li>
          <p>
            similar si pentru admin doar ca el are acces la toate pentru a raspunde
          </p>
        </li>
      </ul>
      <li>
        <p>
          logica interfata formular:
        </p>
      </li>
      <ul>
        <li>
          <p>
            client poate incepe direct pe aceasta pagina din meniu caz in care va avea acces si la un input de data ora
            ce ii va permite sa selecteze o ora/data
            sau va veni din calendar caz in care aceasta va fi deja setat
          </p>
        </li>
        <li>
          <p>
            initial formularul se afla in starea "Editare" si clientul poate incarca un mesaj text si 1 sau mai multe
            fisiere video/imagini
          </p>
        </li>
        <li>
          <p>
            apoi clientul poate trimite formularul , caz in care starea acestuia se modifica in "Asteptare"
          </p>
        </li>
        <li>
          <p>
            adminul va putea selecta acest tip de formular si va putea raspunde cu un mesaj text de acept/refuz + un
            tabel cu piesele de care are nevoie pentru a repara motocicleta (starea formularului ajunge in "Refuzat" sau
            "Accept client")
          </p>
        </li>
        <li>
          <p>
            clientul vede in istoric ca formularul are o stare schimbata si poate accepta/refuza oferta de pret (starea
            formular devine "Programat" sau "Refuzat")
          </p>
        </li>
        <li>
          <p>
            piesele se muta din stoc in stoc progrmate in momentul in care adminul raspunde clientului cu un accept
          </p>
        </li>
        <li>
          <p>
            piesele se sterg din stoc-ul de rezervate dupa ce adminul muta formularul in starea de "Terminat"(sterg din
            stoc) sau "Refuzat"(reintorc in stoc)
          </p>
        </li>
      </ul>
      <li>
        <p>
          logica interfata admin stoc:
        </p>
      </li>
      <ul>
        <li>
          <p>
            adminul va avea acces la un tabel de 5/10/15/20 randuri in care sunt toate piesele din stoc pe mai multe
            pagini
          </p>
        </li>
        <li>
          <p>
            adminul are pe aceasta pagina si mai multi selectori de filtrare a tabelului dupa brand/categorie/tip piesa
            cat si buton de cauta si unul de reset al filtrelor
          </p>
        </li>
        <li>
          <p>
            adminul poate modifica numarul de piese aflate in stoc si stoc rezervate
          </p>
        </li>
        <li>
          <p>
            adminul poate parcurge tabelul stanga/dreapta cu un numar X de randuri in functie de selectorul de randuri
          </p>
        </li>
      </ul>
      <li>
        <p>
          logica interfata admin comenzi:
        </p>
      </li>
      <ul>
        <li>
          <p>
            un table filtrabil si similar cu cel de la stoc dar in care avem comenzi
          </p>
        </li>
        <li>
          <p>
            adminul va putea sa marcheze comanda aflate in asteptare ca primite , caz in care piesele sunt mutate in
            stoc
          </p>
        </li>
        <li>
          <p>
            tot prin acest formular putem sa plasam diferite mesaje la sfarsitul diferitelor actiuni
          </p>
        </li>
      </ul>
      <li>
        <p>
          logica interfata admin plasare comenzi:
        </p>
      </li>
      <ul>
        <li>
          <p>
            selectori de piesa/brand/categori si numar de bucati + buton de plasare comanda(ne imaginam ca acesta este
            legat la API-ul unor furnizori)
          </p>
        </li>
        <li>
          <p>
            un tabel cu comenzile deja aflate in astepare
          </p>
        </li>
      </ul>
      <li>
        <p>
          logica interfata admin date:
        </p>
      </li>
      <ul>
        <li>
          <p>
            admin-ul poate sa selecta sa exporte toate/partial datele aplicatiei in format CSV/JSON/PDF
          </p>
        </li>
        <li>
          <p>
            admin-ul poate sa selecta sa importe toate/partial datele aplicatiei in format CSV/JSON
          </p>
        </li>
      </ul>
    </ul>
  </section>
  <section id="hardware-interfaces" role="hardware-interfaces">
    <h3><span>3.2 </span>Hardware Interfaces</h3>
    <p>
      Paginile HTML cu CSS si Javascript sunt generate pentru clienti de catre serverul web Apache prin protocolul HTTP.
      Datele din PHP sunt luate din baza de date Mysql.
      Serverul de Apache si Mysql sunt gestionate cu ajutorul aplicatiei Xamp ce ruleaza pe calculatorul personal.
    </p>

  </section>

  <section id="software-interfaces" role="software-interfaces">
    <h3><span>3.3 </span>Software Interfaces</h3>
    <p>
      Datele din baza de date vor fi transformate in CSV/Json pentru a putea fi livrate prin API-ul aplicatiei
    </p>
  </section>

  <section id="communications-interfaces" role="communications-interfaces">
    <h3><span>3.4 </span>Communications Interfaces</h3>
    <p>Folosim protocolul HTTP pentru comunicarea dintre client si servers</p>
  </section>

  <section id="system-features" role="System Features">
    <h2><span>4. </span>System Features</h2>
    <!-- <p>
      This template illustrates organizing the functional requirements for the product by system features, the major
      services provided by the product. You may prefer to organize this section by use case, mode of operation, user
      class, object class, functional hierarchy, or combinations of these, whatever makes the most logical sense for
      your product.
    </p>
  </section>
  <section id="system-features1" role="system-features1">
    <h3><span>4.1 </span>System Feature 1</h3>
    <p>
      Don???t really say ???System Feature 1.??? State the feature name in just a few words. 4.1.1 Description and Priority
      Provide a short description of the feature and indicate whether it is of High, Medium, or Low priority. You could
      also include specific priority component ratings, such as benefit, penalty, cost, and risk (each rated on a
      relative scale from a low of 1 to a high of 9). 4.1.2 Stimulus/Response Sequences List the sequences of user
      actions and system responses that stimulate the behavior defined for this feature. These will correspond to the
      dialog elements associated with use cases. 4.1.3 Functional Requirements Itemize the detailed functional
      requirements associated with this feature. These are the software capabilities that must be present in order for
      the user to carry out the services provided by the feature, or to execute the use case. Include how the product
      should respond to anticipated error conditions or invalid inputs. Requirements should be concise, complete,
      unambiguous, verifiable, and necessary. Use ???TBD??? as a placeholder to indicate when necessary information is not
      yet available.

      Each requirement should be uniquely identified with a sequence number or a meaningful tag of some kind.
    </p>
  </section>
  <section id="system-features2" role="system-features2">
    <h3><span>4.2 </span>System Feature 2</h3>
    <p>
      so on
    </p> -->
  </section>


  <section id="other-nonfunctional-requirements" role="Other Nonfunctional Requirements">
    <h2><span>5. </span>Other Nonfunctional Requirements</h2>
  </section>

  <section id="performance-requirements" role="performance-requirements">
    <h3><span>5.1 </span>Performance Requirements</h3>
    <p>
      Adoptarea principiilor designului Web responsiv.
    </p>
  </section>
  <section id="safety-requirements" role="safety-requirements">
    <h3><span>5.2 </span>Safety Requirements</h3>
    <p>
      Pentru verificare, se poate recurge la instrumente dedicate precum Stylelint. De asemenea, este obligatorie
      folosirea suitei de tehnologii Ajax.
    </p>
    <p>
      Codul trebuind s?? fie valid conform specifica??iilor Consor??iului Web. Se vor utiliza foi de stiluri CSS valide
    </p>
    <p>
      Respectarea cerin??elor de baz?? ale ingineriei software - e.g., comentarea ??i modularizarea codului-surs??,
      recurgerea la unit????i de testare ??i altele - cu redactarea documenta??iilor aferente - precum manualul
      dezvoltatorului, ??n
      cazul dezvolt??rii unui API ori serviciu Web.
    </p>
    <p>
      ??n procesul de dezvoltare a proiectelor, se va utiliza obligatoriu un sistem de stocare ??i management online al
      codului-surs?? - e.g., utilizarea de solu??ii populare precum Bitbucket, GitLab, GitHub etc.
    </p>
    <p>
      Import/export de date folosind formate deschise ??? minim, CSV.
    </p>
  </section>
  <section id="security-requirements" role="security-requirements">
    <h3><span>5.3 </span>Security Requirements</h3>
    <p>
      Implementarea va recurge la tehnici de prevenire a atacurilor (precum Cross Site Scripting sau SQL injection).
    </p>

  </section>
  <section id="quality-attributes" role="quality-attributes">
    <h3><span>5.4 </span>Software Quality Attributes</h3>
    <p>
      Pentru partea de client, interfa??a aplica??iei/sitului Web va fi marcat?? obligatoriu ??n HTML5
    </p>
    <p>
      Se vor folosi pe c??t posibil machete (template-uri) de prezentare ??i metode de configurare ??i administrare a
      aplica??iei.
    </p>
    <p>
      Proiectele vor putea fi implementate pe partea de server folosind orice tehnologie, platform?? ??i limbaj de
      programare actuale, cu condi??ia ca acestea s?? adopte o licen???? deschis??.
    </p>
    <p>
      Pentru stocarea ??i managementul datelor, se vor putea utiliza servere de baze de date rela??ionale, interogate via
      SQL - minimal, a se considera SQLite. Complementar, se poate recurge la servere de baze de date aliniate
      paradigmei NoSQL.
    </p>
  </section>
  <section id="business-rules" role="business-rules">
    <h3><span>5.5 </span>Business Rules</h3>
    <p>
      Existen??a unui modul propriu de administrare a aplica??iei Web.
    </p>
    <p>
      Nu se permite utilizarea de framework-uri la nivel de client (front-end) ??i/sau server (back-end) Web.
    </p>
    <p>
      Prezentarea arhitecturii de ansamblu (e.g., via diagrame UML sau similare - de studiat Modelul C4), plus etapele
      intermediare ale dezvolt??rii proiectului.
    </p>
    <p>
      Solu??ia complet func??ional?? a proiectului ce va fi evaluat?? conform criteriilor enun??ate anterior. Se vor oferi
      detalii privind structura (modelarea) datelor ??i provenien??a lor ??? de exemplu, recurgerea la anumite servicii Web
      ori API-uri publice.
    </p>

  </section>

  <section id="other-requirements" role="Other Nonfunctional Requirements">
    <h2>Other Requirements</h2>
    <p>
      Un raport ??n formatul Scholarly HTML disponibil public pe situl Web al echipei care descrie detaliile care vizeaz??
      progresul proiectului. Con??inuturile multimedia aferente, dac?? exist??, vor putea fi distribuite pe Web sub form??
      de prezentare ori film. Minimal, vor fi asociate tag-urile project, infoiasi, web. De asemenea, se va detalia
      maniera de folosire a sistemului de management al codului-surs?? ales.
    </p>
    <p>
      Ghidul de utilizare a aplica??iei dezvoltate ??? disponibil ca document HTML5, recurg??nd la formatul Scholarly HTML.
    </p>
    <p>
      Fiecare echip?? va avea alocate maxim 20 de minute pentru sus??inerea oral?? ??n sala de laborator a solu??iei Web
      dezvoltate. To??i membrii echipei trebuie s?? fie prezen??i.
    </p>
  </section>
  <section id="glossary" role="Other Nonfunctional Requirements">
    <h2><span>Appendix A: Glossary</h2>
    <p>API - an application programming interface </p>
    <p>Apache - a free and open-source cross-platform web server software</p>
    <p>CSS - Cascading Style Sheets - is a declarative language that controls how webpages look in the browser.</p>
    <p>CyMaT - Cycling Maintenance Web Tool</p>
    <p>HTTP - HyperText Transfer Protocol</p>
    <p>JSON - JavaScript Object Notation (JSON) - is a data-interchange format.</p>
    <p>MVC - model view controller </p>
    <p>MySql - is an open-source relational database management system </p>
    <p>PDF - Portable Document Format </p>
    <p>PHP - Hypertext Preprocessor - a general-purpose scripting language geared toward web development.</p>
    <p>TW - technology web </p>
    <p>XAMPP - a free and open-source cross-platform web server solution stack </p>
  </section>
  <section id="analysis-models" role="Other Nonfunctional Requirements">
    <h2>Appendix B: Analysis Models</h2>
    <p>
      Optionally, include any pertinent analysis models, such as data flow diagrams, class diagrams, state-transition
      diagrams, or entity-relationship diagrams.
    </p>
  </section>

</body>

</html>
