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
          <ol role="directory">
            <li><a href="#system-features1"><span>4.1 </span>System Feature 1</a></li>
            <li><a href="#system-features2"><span>4.2 </span>System Feature 2</a></li>
          </ol>
      </li>
      <li><a href="#other-nonfunctional-requirements"><span>5. </span>Other Nonfunctional Requirements</a>
        <ol role="directory">
          <li><a href="#performance-requirements"><span>5.1 </span>Performance Requirements</a></li>
          <li><a href="#safety-requirements"><span>5.2 </span>Safety Requirements</a></li>
          <li><a href="#security-requirements"><span>5.3 </span>Security Requirements</a></li>
          <li><a href="#quality-attributes"><span>5.4 </span>Software Quality Attributes</a></li>
          <li><a href="#business-rules"><span>5.4 </span>Business Rules</a></li>
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
        "Creați un sistem online de management al programărilor și stocurilor unui operatii de service de motociclete,
        biciclete, trotinete (electrice sau nu). Fiecare client va consulta calendarul service-ului,
        iar apoi va completa un formular cu data și ora dorită, plus detalii despre problemă,
        putând adăuga inclusiv fișiere multimedia (imagini și filme).
      </p>
      <p>
        Administratorul afacerii va putea respinge programarea adăugând un mesaj explicativ:
        "Ne pare rău, dar nu avem în stoc piesele necesare pentru reparație, reveniți în S săptămâni"
        sau o va putea aproba, oferind și un preț estimativ, plus alte detalii de interes.
        De asemenea, aplicația îi va permite acestuia să țină evidența stocurilor existente,
        cât și a comenzilor date către furnizori. Sistemul va putea importa date în format CSV și JSON.
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
          conform celor precizate în macheta <a
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
    </dl>
  </section>

  <section id="overall-description" role="Overall Description">
    <h2><span>2. </span>Introduction</h2>
  </section>

  <section id="perspective" role="perspective">
    <h3><span>2.1 </span>Product Perspective</h3>
    <p>
      Acest sitem este o aplicatie web noua de gestiune al programărilor și stocurilor unui operatii de service de
      motociclete
      <img src="./images/overview.png">
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
      Ne propunem sa folosim un model MVC si anticipam sa folosim umatoare clasele:
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
      Pentru partea de backend ne propunem sa folosim PHP ce va fi procesat in xamp intr-un server de Apache.
      De asemenea pentru stocarea datelor aplicatiei vom folosi MySql de asemenea procesat in xamp.
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
      Describe the logical characteristics of each interface between the software product and the users. This may
      include sample screen images, any GUI standards or product family style guides that are to be followed, screen
      layout constraints, standard buttons and functions (e.g., help) that will appear on every screen, keyboard
      shortcuts, error message display standards, and so on. Define the software components for which a user interface
      is needed. Details of the user interface design should be documented in a separate user interface specification.
    </p>
  </section>
  <section id="hardware-interfaces" role="hardware-interfaces">
    <h3><span>3.2 </span>Hardware Interfaces</h3>
    <p>
      Describe the logical and physical characteristics of each interface between the software product and the hardware
      components of the system. This may include the supported device types, the nature of the data and control
      interactions between the software and the hardware, and communication protocols to be used.
    </p>
  </section>

  <section id="software-interfaces" role="software-interfaces">
    <h3><span>3.3 </span>Software Interfaces</h3>
    <p>
      Describe the connections between this product and other specific software components (name and version), including
      databases, operating systems, tools, libraries, and integrated commercial components. Identify the data items or
      messages coming into the system and going out and describe the purpose of each. Describe the services needed and
      the nature of communications. Refer to documents that describe detailed application programming interface
      protocols. Identify data that will be shared across software components. If the data sharing mechanism must be
      implemented in a specific way (for example, use of a global data area in a multitasking operating system), specify
      this as an implementation constraint.
    </p>
  </section>

  <section id="communications-interfaces" role="communications-interfaces">
    <h3><span>3.4 </span>Communications Interfaces</h3>
    <p>
      Describe the requirements associated with any communications functions required by this product, including e-mail,
      web browser, network server communications protocols, electronic forms, and so on. Define any pertinent message
      formatting. Identify any communication standards that will be used, such as FTP or HTTP. Specify any communication
      security or encryption issues, data transfer rates, and synchronization mechanisms.
    </p>
  </section>

  <section id="system-features" role="System Features">
    <h2><span>4. </span>System Features</h2>
    <p>
      This template illustrates organizing the functional requirements for the product by system features, the major
      services provided by the product. You may prefer to organize this section by use case, mode of operation, user
      class, object class, functional hierarchy, or combinations of these, whatever makes the most logical sense for
      your product.
    </p>
  </section>
  <section id="system-features1" role="system-features1">
    <h3><span>4.1 </span>System Feature 1</h3>
    <p>
      Don’t really say “System Feature 1.” State the feature name in just a few words. 4.1.1 Description and Priority
      Provide a short description of the feature and indicate whether it is of High, Medium, or Low priority. You could
      also include specific priority component ratings, such as benefit, penalty, cost, and risk (each rated on a
      relative scale from a low of 1 to a high of 9). 4.1.2 Stimulus/Response Sequences List the sequences of user
      actions and system responses that stimulate the behavior defined for this feature. These will correspond to the
      dialog elements associated with use cases. 4.1.3 Functional Requirements Itemize the detailed functional
      requirements associated with this feature. These are the software capabilities that must be present in order for
      the user to carry out the services provided by the feature, or to execute the use case. Include how the product
      should respond to anticipated error conditions or invalid inputs. Requirements should be concise, complete,
      unambiguous, verifiable, and necessary. Use “TBD” as a placeholder to indicate when necessary information is not
      yet available.

      Each requirement should be uniquely identified with a sequence number or a meaningful tag of some kind.
    </p>
  </section>
  <section id="system-features2" role="system-features2">
    <h3><span>4.2 </span>System Feature 2</h3>
    <p>
      so on
    </p>
  </section>

  <section id="other-nonfunctional-requirements" role="Other Nonfunctional Requirements">
    <h2><span>5. </span>Other Nonfunctional Requirements</h2>
  </section>

  <section id="performance-requirements" role="performance-requirements">
    <h3><span>5.1 </span>Performance Requirements</h3>
    <p>
      If there are performance requirements for the product under various circumstances, state them here and explain
      their rationale, to help the developers understand the intent and make suitable design choices. Specify the timing
      relationships for real time systems. Make such requirements as specific as possible. You may need to state
      performance requirements for individual functional requirements or features.
    </p>
  </section>
  <section id="safety-requirements" role="safety-requirements">
    <h3><span>5.2 </span>Safety Requirements</h3>
    <p>
      Specify those requirements that are concerned with possible loss, damage, or harm that could result from the use
      of the product. Define any safeguards or actions that must be taken, as well as actions that must be prevented.
      Refer to any external policies or regulations that state safety issues that affect the product’s design or use.
      Define any safety certifications that must be satisfied.
    </p>
  </section>
  <section id="security-requirements" role="quality-attributes">
    <h3><span>5.3 </span>Software Quality Attributes</h3>
    <p>
      Specify any requirements regarding security or privacy issues surrounding use of the product or protection of the
      data used or created by the product. Define any user identity authentication requirements. Refer to any external
      policies or regulations containing security issues that affect the product. Define any security or privacy
      certifications that must be satisfied.
    </p>
  </section>
  <section id="quality-attributes" role="hardware-interfaces">
    <h3><span>5.4 </span>Hardware Interfaces</h3>
    <p>
      Specify any additional quality characteristics for the product that will be important to either the customers or
      the developers. Some to consider are: adaptability, availability, correctness, flexibility, interoperability,
      maintainability, portability, reliability, reusability, robustness, testability, and usability. Write these to be
      specific, quantitative, and verifiable when possible. At the least, clarify the relative preferences for various
      attributes, such as ease of use over ease of learning.
    </p>
  </section>
  <section id="business-rules" role="business-rules">
    <h3><span>5.5 </span>Business Rules</h3>
    <p>
      List any operating principles about the product, such as which individuals or roles can perform which functions
      under specific circumstances. These are not functional requirements in themselves, but they may imply certain
      functional requirements to enforce the rules.
    </p>
  </section>

  <section id="other-requirements" role="Other Nonfunctional Requirements">
    <h2>Other Requirements</h2>
    <p>
      Define any other requirements not covered elsewhere in the SRS. This might include database requirements,
      internationalization requirements, legal requirements, reuse objectives for the project, and so on. Add any new
      sections that are pertinent to the project.
    </p>
  </section>
  <section id="glossary" role="Other Nonfunctional Requirements">
    <h2><span>Appendix A: Glossary</h2>
    <p>
      Define all the terms necessary to properly interpret the SRS, including acronyms and abbreviations. You may wish
      to build a separate glossary that spans multiple projects or the entire organization, and just include terms
      specific to a single project in each SRS.
    </p>
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
