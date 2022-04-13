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
    <p>
      Referintele acestui proiect sunt:
    </p>

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
      TO DO: de adaugat si un grafic simplu cu componentele majore ale sistemului
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
          pagina de gestiune a datelor. 
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

  <!-- 

  <section id="Root">

    <h3><span>3.1 </span>The root and <code>head</code></h3>
    <p>
      The document must be encoded in UTF-8 and transmitted with a media type of
      <code>text/html</code>.
    </p>
    <p>
      The <code>head</code> must contain <code>&lt;meta charset="utf-8"&gt;</code> element and a
      <code>title</code> element.
    </p>
  </section>
  <section id="article">

    <h3><span>3.2 </span>The <code>article</code></h3>
    <p>
      The first child of <code>article</code> must be <code>header</code>. The header should
      contain an <code>h1</code> with the title of the document. The following element must be a
      <code>div</code> with the role of <code>contentinfo</code> containing author and
      affiliation information. See <a href="#contentinfo-semantics">The
        <code>contentinfo</code>
        Region Semantics</a> for information about the semantic decoration of this element.
    </p>
    <p>
      Any number of <code>section</code> elements may be listed within the article at arbitrary
      depths, but each <code>section</code> must begin with an <code>hx</code> element,
      indicating a numbered section in the article. If the sections require headings that exceed
      <code>h6</code>, <code>aria-level</code> must be included to indicate depth.
    </p>
    <figure typeof="schema:SoftwareSourceCode" role="doc-example" id="arialevelexample">
      <pre><code>
    &lt;section&gt;      
      &lt;h6&gt;Granular Details about Zoology&lt;/h6&gt;
        &lt;p&gt;…&lt;/p&gt;
      &lt;section&gt;    
        &lt;h6 aria-level="7"&gt;Even More Information!&lt;/h6&gt;
          </code></pre>
      <figcaption>Example of a level 7 heading, using <code>aria-level</code></figcaption>
    </figure>
    <p>
      Each section may contain zero or more <a href="#hunk">Hunk Elements</a> and
      <code>section</code> elements.
    </p>
  </section>
  <section id="hunk">
    <h3><span>3.3 </span>Hunk Elements</h3>
    <p>
      Hunk elements are the meaningful blocks from which sections are built. They contain text
      and <a href="#inline">inline elements</a>. There are several types of hunk
      elements. All
      content, ranging from long paragraphs to note references and footnotes can be captured
      using this specified set of elements. The method for distinguishing one from another in a
      machine-readable manner is specified in <a href="#semantics">Semantics
        Overlay</a>.
    </p>
    <p>
      The most common hunk element is
      <a href="https://www.w3.org/TR/html51/semantics.html#the-p-element"><code>p</code></a>.
    </p>
    <p>
      The
      <a href="https://www.w3.org/TR/html51/semantics.html#the-blockquote-element"><code>blockquote</code></a>,
      <a href="https://www.w3.org/TR/html51/semantics.html#the-ul-element"><code>ul</code></a>,
      <a href="https://www.w3.org/TR/html51/semantics.html#the-ol-element" <code="">ol</a>,
      and
      <a href="https://www.w3.org/TR/html51/semantics.html#the-dl-element"><code>dl</code></a>
      elements can be used as they typically would and require no special treatment.
    </p>
    <p>
      The
      <a href="https://www.w3.org/TR/html51/semantics.html#the-dl-element" <code="">aside</a>
      hunk element is used to capture portions of content that stand apart from the main flow of
      content. These can be separated from the article without having impact on the reader’s
      understanding of the article. A common use is text boxes in print. If the
      <code>aside</code> contains an <code>header</code> heading element, that heading must be
      the first element child and its numeric part must reflect its depth, making use of
      <code>aria-level</code> according to the same rules that apply for <code>section</code>.
      The other children of asid<code>aside</code>e must all be hunk elements. For example, if
      an <code>aside</code> follows a <code>section</code> with a level 3 heading, the top-level
      heading in the <code>aside</code> should be <code>h4</code>.
    </p>
    <section id="figures">
      <h4><span>3.3.1 </span>Figures</h4>
      <p>
        The
        <a href="https://www.w3.org/TR/html51/semantics.html#the-figure-element"><code>figure</code></a>
        element is a general container for self-contained content units that are embedded inside
        the main body of the text. It can come in several flavors that are dictated by its
        <code>typeof</code> attribute. Common uses for <code>figure</code> are as a container
        for images, tables, equations, and computer code.
      </p>
      <p>
        If <code>figure</code> is <code>typeof="sa:image"</code>, it is an image container. It
        must contain an <code>img</code> child element and should contain a <code>figcaption</code>
        labeling that image.
      </p>
      <p>
        If <code>figure</code> is a <code>typeof="sa:table"</code>table, it is a table
        container. It must contain a <code>table</code> element. If there is a table caption, it
        should be included using the <code>caption</code> child element of the table, and not
        the <code>figcaption</code> child of the <code>figure</code>. Table notes may also be
        included as <code>ol</code> with <code>li</code> elements with the role of
        <code>doc-footnote</code>.
      </p>
      <p>
        If <code>figure</code> is a <code>typeof="sa:formula"</code>, it is a formula container.
        It must contain a <code>math</code> element and, optionally, a <code>figcaption</code>
        describing the formula. The <code>math</code> element must be valid MathML 3.
        Additionally, given the dismal state of support for MathML in Web browsers the math
        element must contain an annotation descendant with the TeX equivalent of the formula.
      </p>
      <p>
        If <code>figure</code> is a <code>typeof="schema:SoftwareSourceCode"</code>, it is a
        code container. It must contain a <code>pre</code> element and, optionally, a
        <code>figcaption</code>. The <code>pre</code> element must contain a <code>code</code>
        element as its only child.
      </p>
    </section>
  </section>
  <section id="inline">

    <h3><span>3.4 </span>Inline Elements</h3>
    <p>
      <a href="https://www.w3.org/TR/html51/semantics.html#text-level-semantics">Inline
        elements</a> decorate, describe, and enrich text. Inline elements can be used inside of
      hunk elements, heading elements, and captioning elements. Where applicable, they can nest
      within one another. Inline images and inline math can be inlcuded as well. This can be
      accomplished using <code>img</code> for images or <code>math</code> for formulas.
      Equations can be displayed inline or as blocks within a paragaph.
    </p>
    <figure typeof="schema:SoftwareSourceCode" resource="#mathblock-example" id="mathblock-example" role="doc-example">
      <pre><code>
&lt;p&gt;
  If we should weep when clowns put on their show,
  if we should stumble when musicians play,
  &lt;math display="block"&gt;
    &lt;semantics&gt;
      &lt;mrow&gt;
        &lt;mi&gt;Δ&lt;/mi&gt;&lt;msup&gt;&lt;mi&gt;E&lt;/mi&gt;&lt;mn&gt;2&lt;/mn&gt;&lt;/msup&gt;
        &lt;mspace width="0.222em"&gt;&lt;/mspace&gt;
        &lt;mo&gt;=&lt;/mo&gt;
        &lt;mspace width="0.222em"&gt;&lt;/mspace&gt;
        &lt;msub&gt;&lt;mi&gt;q&lt;/mi&gt;&lt;mi&gt;i&lt;/mi&gt;&lt;/msub&gt;
        &lt;mspace width="0.222em"&gt;&lt;/mspace&gt;
        &lt;mo&gt;×&lt;/mo&gt;
        &lt;mspace width="0.222em"&gt;&lt;/mspace&gt;
        &lt;mo stretchy="false" form="prefix"&gt;(&lt;/mo&gt;
        &lt;msub&gt;
          &lt;msup&gt;&lt;mi&gt;F&lt;/mi&gt;&lt;mn&gt;2&lt;/mn&gt;&lt;/msup&gt;
          &lt;mrow&gt;
            &lt;mo stretchy="false" form="prefix"&gt;(&lt;/mo&gt;
            &lt;mi&gt;i&lt;/mi&gt;&lt;mo&gt;,&lt;/mo&gt;
            &lt;mspace width="0.222em"&gt;&lt;/mspace&gt;
            &lt;mi&gt;j&lt;/mi&gt;
            &lt;mo stretchy="false" form="postfix"&gt;)&lt;/mo&gt;
          &lt;/mrow&gt;
        &lt;/msub&gt;
        &lt;mspace width="0.222em"&gt;&lt;/mspace&gt;
        &lt;mo&gt;/&lt;/mo&gt;
        &lt;mspace width="0.222em"&gt;&lt;/mspace&gt;
        &lt;msub&gt;&lt;mi&gt;ε&lt;/mi&gt;&lt;mi&gt;j&lt;/mi&gt;&lt;/msub&gt;
        &lt;mspace width="0.222em"&gt;&lt;/mspace&gt;&lt;mspace width="0.222em"&gt;&lt;/mspace&gt;
        &lt;msub&gt;&lt;mi&gt;ε&lt;/mi&gt;&lt;mi&gt;i&lt;/mi&gt;&lt;/msub&gt;
        &lt;mo stretchy="false" form="postfix"&gt;)&lt;/mo&gt;
      &lt;/mrow&gt;
    &lt;/semantics&gt;
  &lt;/math&gt;
  time can say nothing but I told you so.
&lt;/p&gt;
          </code></pre>
      <figcaption></figcaption>
    </figure>
  </section>
  <section id="references">

    <h3><span>3.5 </span>References</h3>
    <p>
      The References section requires specific <a href="#citations">semantic
        overlays</a>
      (reference) as well as strict content structure. Apart from a (required) <code>hx</code>
      element, it must contain only one <code>ol</code> or <code>dl</code> element.
    </p>
    <p>
      If using a <code>dl</code> element, the contents must be alternating <code>dt</code> and
      <code>dd</code> elements. The <code>dd</code> must contain the citation.
    </p>

    <p>
      If using <code>ol</code>, the only contents are <code>li</code> that include citations.
    </p>
  </section>

  <section id="interactive">

    <h3><span>3.6 </span>Interactive Elements</h3>
    <p>
      information about iframes to come
    </p>
    <p class="issue">
      Let’s discuss details of iframes with the CG
    </p>
  </section>
  <section id="HTMLRoles">

    <h3><span>3.7 </span>HTML Roles</h3>
    <p>
      It is possible to provide information about an HTML element by decorating it with the
      <a href="https://www.w3.org/TR/html51/dom.html#aria-role-attribute">role</a> attribute. The
      <a href="https://www.w3.org/TR/wai-aria-1.1/">ARIA</a> vocabulary and its extensions provide
      convenient terms that are relevant to document structure. The following roles from ARIA and
      <a href="https://www.w3.org/TR/dpub-aria-1.0/">DPUB-ARIA</a> should be applied where
      appropriate:
    </p>
    <ul>
      <li>
        <a href="https://www.w3.org/TR/wai-aria-1.1/#contentinfo">contentinfo</a> to apply to the
        <code>div</code> containing author and affiliation information
      </li>
      <li>
        <a href="https://www.w3.org/TR/wai-aria-1.1/#definition">definition</a> for defining a
        term, such as a keyword or a glossary term
      </li>
      <li>
        <a href="https://www.w3.org/TR/wai-aria-1.1/#term">term</a> for a term corresponding to a
        definition
      </li>
      <li>
        <a href="https://www.w3.org/TR/wai-aria-1.1/#presentation">presentation</a> to indicate
        that an image is purely decorative
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-abstract">doc-abstract</a> on the
        <code>section</code> that contains the abstract
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-acknowledgments">doc-acknowledgments</a>
        on the <code>section</code> that contains acknowledgements (note that this is not the same
        as funding information).
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-appendix">doc-appendix</a> on the
        <code>section</code> that contains the appendix
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-biblioentry">doc-biblioentry</a> on the
        list item that includes a citation
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-bibliography">doc-bibliography</a> on
        the <code>section</code> or list that contains the references or works cited
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-conclusion">doc-conclusion</a> on the
        <code>section</code> that explicity concludes the article
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-dedication">doc-dedication</a> on the
        dedication element of the article (allowed on any hunk element)
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-endnote">doc-endnote</a> on an
        individual note item in a collection of notes
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-dedication">doc-endnotes</a> on the
        <code>section</code> containing a group of notes
      </li>
      <li class="issue">
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-errata">doc-errata</a> on a ???
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-example">doc-example</a> on a hunk
        element containing an illustrative concept, such as a code sample.
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-footnote">doc-footnote</a> on a hunk
        element containing an individual note, such as an informative note about the author or
        table footnote
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-introduction">doc-introduction</a> on
        the <code>section</code> introducing the article, if relevant
      </li>
      <li>
        <a href="https://www.w3.org/TR/dpub-aria-1.0/#doc-subtitle">doc-subtitle</a> to indicate
        that a portion of a heading is a secondary or alternate title of the work
      </li>
    </ul>
    <p class="issue">
      Should we require ARIA’s table, grid, rowheader, and rowgroup?
    </p>
    <p class="issue">
      I did not include doc-credit bc of extensive citation markup in JSON-LD
    </p>
    <p class="issue">
      doc-endnote, doc-endnotes are not in the current published draft of DPUB-ARIA. See
      <a href="http://rawgit.com/w3c/aria/master/aria/dpub.html">March DPUB-ARIA draft</a>
    </p>
  </section>
  <section id="validate">

    <h3><span>3.8 </span>Validation</h3>
    <p>
      The only validation requirement for Scholarly HTML at this point is that the HTML is valid.
      We are considering building a a validation tool in RelaxNG or JavaScript to check compliance
      with this set of rules.
    </p>
    <p>
      Articles should be in the following basic structure:
    </p>
    <ul>
      <li>heading with article title</li>
      <li>0+ hunks</li>
      <li>
        0+ sections
        <ul>
          <li>0+ headings</li>
          <li>0+ hunks</li>
          <li>0+ sections</li>
        </ul>
      </li>
    </ul>
    <p>
      It must feature a <code>DOCTYPE</code> as its preamble.
    </p>
  </section>
  </section>
  <section id="semantics">

    <h2><span>4. </span>Semantics Overlay</h2>
    <p>
      HTML provides an excellent backbone with which to capture the
      <a href="#structure">structure</a> of a given text but is evidently limited
      when it comes to
      capturing more domain-specific concepts such as people, spaceships,
      <a href="http://existentialcomics.com/comic/122">Humean causation</a>, or
      <a href="http://journals.plos.org/plosone/article?id=10.1371/journal.pone.0109888">sthenurines</a>.
      That is where semantic overlays with the ability to refine the meaning and relations of
      HTML elements come into play. Scholarly HTML makes use of two standard mechanisms that
      overlay additional semantics atop the HTML DOM: role-based semantics as defined by
      <a role="doc-biblioref" href="#ref-WAI-ARIA">WAI-ARIA</a> and <a role="doc-biblioref"
        href="#ref-DPUB-ARIA">DPUB-ARIA</a>, and
      semantics rooted in structured data as captured by <a role="doc-biblioref" href="#ref-RDFa">RDFa</a>.
    </p>
    <p>
      Using technologies related to the semantic web can at times feel daunting and unrelated to
      everyday web development. In order to suppress this disconnect, Scholarly HTML follows a
      few simple guiding principles:
    </p>
    <ul>
      <li>
        The number of prefixes used for semantic properties is kept as small as possible;
      </li>
      <li>
        There is no such thing as a URI (or URN, IRI, XRI, or whatever else confusing
        contraption), everything is a URL;
      </li>
      <li>
        Where somewhat more complex modeling is required, it is put together using a small set of
        common patterns that might require some initial learning but can be applied regularly
        with relative ease (notably <a href="#roles">roles</a> and actions).
      </li>
    </ul>
    <p>
      The properties that Scholarly HTML uses are naturally document-related (authorship,
      keywords, license, citations, as well as specific structure types such as acknowledgements,
      introduction, or funding), which additionally requires the ability to describe people and
      organizations. There are numerous vocabularies that address this domain and which could be
      used with <a role="doc-biblioref" href="#ref-RDFa">RDFa</a>; however, for
      reasons detailed in
      <a href="https://research.science.ai/article/web-first-data-citations#choice-of-ontology">Web-First
        Data Citations</a> Scholarly HTML relies almost exclusively on
      <a role="doc-biblioref" href="#ref-schema.org">schema.org</a>, complemented
      by a small number of additions from
      the <a href="#scholarly-article">Scholarly Article Vocabulary</a>.
    </p>
    <section id="person-org">

      <h3><span>4.1 </span>Persons &amp; Organizations</h3>
      <p>
        Marking up persons and organizations can make use of any applicable properties in
        <a href="http://schema.org/Person" class="onto">schema:Person</a> and <a href="http://schema.org/Organization"
          class="onto">schema:Organization</a>, respectively, but it is worth
        pointing out some good practices with how these are to be used in practice.
      </p>
      <p>
        If the entity in question has a URL then it is best to use that as its identifier (using
        the <code>resource</code> attribute) and additionally to provide it as a link using the
        <code>a</code> element (see the <a href="#person-example">person
          example</a> for an
        instance of this).
      </p>
      <p>
        If you happen to have information providing both the
        <a href="http://schema.org/givenName" class="onto">schema:givenName</a>/<a href="http://schema.org/familyName"
          class="onto">schema:familyName</a><a href="http://schema.org/additionalName"
          class="onto">schema:additionalName</a> triple and
        the <a href="http://schema.org/name" class="onto">schema:name</a> (which can be considered to contain the name
        as the person wishes
        it to be displayed) for a person then it is (perhaps counterintuitively) best to
        include <em>all</em> of them and then use CSS (typically sibling selectors) to hide the
        extraneous ones (alternatively, they can be captured using the <code>meta</code> element).
        The reason for this is that it exposes more information to machine consumers without
        having a negative impact on human readers.
      </p>
      <figure typeof="schema:SoftwareSourceCode" resource="#person-example" id="person-example">
        <pre><code>
&lt;span typeof="schema:Person" resource="http://orcid.org/0000-0003-1279-3709"&gt;
  &lt;meta property="schema:givenName" content="Bruce"&gt;
  &lt;meta property="schema:familyName" content="Banner"&gt;
  &lt;a href="http://orcid.org/0000-0003-1279-3709"&gt;
    &lt;span property="schema:name"&gt;Dr. Bruce Banner&lt;/span&gt;
  &lt;/a&gt;
&lt;/span&gt;
          </code></pre>
        <figcaption>
          <span property="schema:name"></span>
          <span property="schema:description">
            Example of a Person. This demonstrates the use of extraneous name information using
            <code>meta</code> elements. The container is a <code>span</code> but it could be any
            other container element. This also shows how <a href="http://schema.org/name" class="onto">schema:name</a>
            can be used for the
            person’s preferred display name, as distinct from the more specific structured name
            information.
          </span>
        </figcaption>
      </figure>
      <p>
        Here is also an organization:
      </p>
      <figure typeof="schema:SoftwareSourceCode" resource="#org-example" id="org-example">
        <pre><code>
&lt;span typeof="schema:Organization" resource="https://www.w3.org/"&gt;
  &lt;a href="https://www.w3.org/"&gt;
    &lt;span property="schema:name"&gt;W3C&lt;/span&gt;
  &lt;/a&gt;
  (&lt;span property="schema:location" typeof="schema:Place"&gt;
    &lt;span property="schema:address" typeof="schema:PostalAddress"&gt;
      &lt;span property="schema:addressLocality"&gt;Cambridge&lt;/span&gt;,
      &lt;span property="schema:addressRegion"&gt;MA&lt;/span&gt;,
      &lt;span property="schema:addressCountry"&gt;USA&lt;/span&gt;
    &lt;/span&gt;
  &lt;/span&gt;)
&lt;/span&gt;
          </code></pre>
        <figcaption>
          <span property="schema:name"></span>
          <span property="schema:description">
            Example of an Organization. This also features the organization’s address.
          </span>
        </figcaption>
      </figure>
      <p class="issue">
        How should we represent name transliterations? Are there language tags for transliterated
        text? Or should ruby+rdf:HTML be suggested instead? If the latter we can no longer use
        <code>meta</code> (which is acceptable).
      </p>
    </section>
    <section id="typing-sections">

      <h3><span>4.2 </span>Typing Sections</h3>
      <p>
        XXX
      </p>
    </section>
    <section id="roles">

      <h3><span>4.3 </span>Schema Roles</h3>

      <p>
        It is worth taking a step back to understand the importance of the <em>role</em>
        modeling. Its application is clearly exemplified in the <a href="#authors">Authors &amp;
          Contributors</a> section wherein a <a href="http://ns.science.ai/#ContributorRole"
          class="onto">sa:ContributorRole</a> type is used as a wrapper
        and not <a href="http://schema.org/Person" class="onto">schema:Person</a> or <a
          href="http://schema.org/Organization" class="onto">schema:Organization</a> directly.
      </p>
      <p>
        Roles are an indirection that provides additional information about a property or
        relationship. A simple overview is provided in the schema.org blog post
        <a href="http://blog.schema.org/2014/06/introducing-role.html">Introducing ’Role’</a>.
      </p>
      <p>
        Let’s look at the example of authorship information. Some properties of the agent who
        authored the document (person or organization), such as their name, are considered to be
        true outside the limited context of the document. These properties will be set directly on
        the agent.
      </p>
      <p>
        On the other hand, other properties are considered to be specific to the agent
        <em>in their role as author of the document</em>. To give an example, were I to be
        writing the document you are currently reading as a freelancer for the Illuminati, my
        affiliation to them would be solely in my role as author and I should not be considered
        eternally indentured to them.
      </p>
      <p>
        When a role is used to enrich a property, the convention is to have it as the value of
        that property, and then to repeat the property on the role to point to the object. At
        first glance it sounds contrived, but it is a simple and powerful construct. To stay with
        the authoring example, the indirection would look like:
      </p>
      <p>
        <a href="http://schema.org/ScholarlyArticle" class="onto">schema:ScholarlyArticle</a> ⟼
        <em><a href="http://schema.org/author" class="onto">schema:author</a></em> ⟼
        <a href="http://ns.science.ai/#ContributorRole" class="onto">sa:ContributorRole</a> ⟼
        <em><a href="http://schema.org/author" class="onto">schema:author</a></em> ⟼
        <a href="http://schema.org/Person" class="onto">schema:Person</a>
      </p>
      <p>
        To demonstrate how properties can attach differently to the role and to the agent, we can
        unfold the authorship example further:
      </p>
      <figure typeof="schema:SoftwareSourceCode" resource="#role-example" id="role-example">
        <pre><a href="http://schema.org/ScholarlyArticle" class="onto">schema:ScholarlyArticle</a>
└─<a href="http://schema.org/author" class="onto">schema:author</a>
  └─<a href="http://ns.science.ai/#ContributorRole" class="onto">sa:ContributorRole</a>
    ├─<a href="http://schema.org/author" class="onto">schema:author</a>
    │ └─<a href="http://schema.org/Person" class="onto">schema:Person</a>
    │   ├─<a href="http://schema.org/name" class="onto">schema:name</a> = Bruce Banner
    │   └─<a href="http://schema.org/url" class="onto">schema:url</a> = http://berjon.com/
    └─<a href="http://ns.science.ai/#roleAffiliation" class="onto">sa:roleAffiliation</a>
      └─<a href="http://schema.org/Organization" class="onto">schema:Organization</a>
        ├─<a href="http://schema.org/name" class="onto">schema:name</a> = Illuminati
        └─<a href="http://schema.org/address" class="onto">schema:address</a> = Bavaria
          </pre>
        <figcaption>
          <span property="schema:name"></span>
          <span property="schema:description">
            Example of a role being used to model authorship. This effectively states that my
            affiliation <em>as a contributor</em> is to the Illuminati and that my name
            <em>as a person</em> is Bruce Banner.
          </span>
        </figcaption>
      </figure>
    </section>
    <section id="actions">

      <h3><span>4.4 </span>Actions</h3>
      <p>
        Actions are a global <a role="doc-biblioref" href="#ref-schema.org">schema.org</a> mechanism to convey facts
        about things that can be or have been <em>done</em>. There is an
        <a href="http://schema.org/docs/actions.html">overview document for actions</a> but it
        dives deep very fast and may be more confusing than helpful. This sections intends to
        convey all that one needs to know about actions in order to understand their usage in
        Scholarly HTML (keeping in mind that they can do much more).
      </p>
      <p>
        Note that actions can do much more than what Scholarly HTML uses them for. For instance,
        if you use an email client that supports actions (such as GMail) you may have noticed that
        some emails allow for direct interactions: those are implemented using actions, and
        without scripting.
      </p>
      <p>
        Actions have a type (e.g. <code>ReadAction</code>, <code>DrinkAction</code>), a status
        (completed, in progress…), an agent being whoever carries it out, and an object which is
        what they are being done to. They can also have start and end times (as well as several
        other properties which we won’t go into here). Scholarly articles typically feature
        indications about things that people have done, which is a good fit for modeling with
        actions. A few examples should help clarify the notion.
      </p>
      <p>
        When referencing an online work, it is customary to indicate the access date for it (since
        it may have changed in the meantime). This can be modeled as a <a href="http://schema.org/ReadAction"
          class="onto">schema:ReadAction</a>,
        with its <a href="http://schema.org/actionStatus" class="onto">schema:actionStatus</a> set to
        <code>CompletedActionStatus</code>, and a
        <a href="http://schema.org/endTime" class="onto">schema:endTime</a> being the access date. In JSON-LD it would
        look like this:
      </p>
      <figure typeof="schema:SoftwareSourceCode" resource="#read-action-example" id="read-action-example">
        <pre><code>
{
  "@type":        "ReadAction",
  "actionStatus": "CompletedActionStatus",
  "endTime":      "1977-03-15"
}
          </code></pre>
        <figcaption>
          <span property="schema:name"></span>
          <span property="schema:description">
            Example of a <a href="http://schema.org/ReadAction" class="onto">schema:ReadAction</a> used to model the
            access date of an online
            citation. Both the object and the agent are implicit in the context in which it is
            used.
          </span>
        </figcaption>
      </figure>
      <p>
        Authors often acknowledge the contributions of others or have to disclose potential
        conflicts of interest that may stem from their interactions outside of the article.
        The former can be conveyed as an <a href="http://ns.science.ai/#AcknowledgeAction"
          class="onto">sa:AcknowledgeAction</a> in which the
        <a href="http://schema.org/name" class="onto">schema:name</a> of the action is the verb part of the
        acknowledgement and the
        <a href="http://schema.org/recipient" class="onto">schema:recipient</a> is the person (or entity of any kind)
        being acknowledged. The
        agent is typically implicitly specified as the object to which the action is attached.
      </p>
      <figure typeof="schema:SoftwareSourceCode" resource="#read-action-example" id="read-action-example">
        <pre><code>
{
  "@type": "AcknowledgeAction",
  "actionStatus": "CompletedActionStatus",
  "name": "is thankful for the pioneering contribution of",
  "recipient": {
    "@type": "Person",
    "name": "Vannevar Bush",
  }
}
            </code></pre>
        <figcaption>
          <span property="schema:name"></span>
          <span property="schema:description">
            Example of an <a href="http://ns.science.ai/#AcknowledgeAction" class="onto">sa:AcknowledgeAction</a> in
            which the author (not shown) acknowledges
            contributions from Vannevar Bush.
          </span>
        </figcaption>
      </figure>
    </section>
    <section id="article-title-semantics">

      <h3><span>4.5 </span>Article and Title Semantics</h3>
      <p>
        The <code>article</code> element that roots the content of the Scholarly HTML document
        needs further refinement to capture the specific type of article that it encodes. The
        <code>typeof</code> attribute should always contain <a href="http://schema.org/ScholarlyArticle"
          class="onto">schema:ScholarlyArticle</a> as its
        first item, but it can be further refined with additional article types.
      </p>
      <p class="issue">
        Should we recommend a specific taxonomy for article (sub)typing? There are so many:
        Fabio, MeSH, NPG…
      </p>
      <p>
        In order for arbitrary parts of the document to be able to attach metadata to the
        <code>article</code>, it also needs to have its <code>resource</code> attribute set to a
        URL that can be referenced (it is typically sufficient to just use <code>#</code> for that
        purpose).
      </p>
      <p>
        While the <code>h1</code> in the document’s <code>header</code> is sufficient to convey
        the fact that it is the document’s title, some services use extraneous information in
        order to assign an unambiguous title to the document. As such, it needs to have its
        <code>property</code> attribute set to <a href="http://schema.org/name" class="onto">schema:name</a>. Similary,
        if a subtitle is
        present in the <code>header</code> it needs to be decorated with both a <code>role</code>
        of <code>doc-subtitle</code> (to expose its <a role="doc-biblioref" href="#ref-DPUB-ARIA">DPUB-ARIA</a>
        semantics) and a <code>property</code> of <a href="http://schema.org/alternateName"
          class="onto">schema:alternateName</a>.
      </p>
      <p>
        If appropriate, the beginning of the <code>article</code> is also a good place in which to
        capture the accessibility properties of the document, using the relevant parts of
        <a role="doc-biblioref" href="#ref-schema.org">schema.org</a> (<a href="http://schema.org/accessibilityFeature"
          class="onto">schema:accessibilityFeature</a>,
        <a href="http://schema.org/accessibilityHazard" class="onto">schema:accessibilityHazard</a>, <a
          href="http://schema.org/accessibilityAPI" class="onto">schema:accessibilityAPI</a>, and
        <a href="http://schema.org/accessibilityControl" class="onto">schema:accessibilityControl</a>, as detailed in
        <a href="https://www.w3.org/wiki/WebSchemas/Accessibility">the WebSchemas Accessibility
          wiki page</a>).
      </p>
      <figure typeof="schema:SoftwareSourceCode" resource="#article-example" id="article-example">
        <pre><code>
&lt;article <strong>resource="#" typeof="schema:ScholarlyArticle"</strong>&gt;
  &lt;header&gt;
    &lt;h1 <strong>property="schema:name"</strong>&gt;Is Cryptopaleozoology Hopeless?&lt;/h1&gt;
    &lt;p <strong>role="doc-subtitle" property="schema:alternateName"</strong>&gt;
      The Future of the Scientific Method
    &lt;/p&gt;
  &lt;/header&gt;
  <strong>&lt;meta property="schema:accessibilityFeature" content="alternativeText"&gt;
  &lt;meta property="schema:accessibilityFeature" content="MathML"&gt;
  &lt;meta property="schema:accessibilityHazard" content="noFlashingHazard"&gt;</strong>
&lt;/article&gt;
          </code></pre>
        <figcaption>
          <span property="schema:name"></span>
          <span property="schema:description">
            Example of <code>article</code> and title markup.
          </span>
        </figcaption>
      </figure>
    </section>
    <section id="contentinfo-semantics">

      <h3><span>4.6 </span>The <code>contentinfo</code> Region Semantics</h3>
      <p>
        As described in the <a href="#structure">Structure section</a>, the
        <code>contentinfo</code>
        region serves as a container for the metadata of the article. It is itself nothing more
        than a <code>div</code> with a <code>role</code> of <code>contentinfo</code>, but its
        content has rich structure.
      </p>
      <p>
        It contains a list of <code>section</code> elements, each of which is identified with a
        specific <code>typeof</code> attribute.
      </p>
      <section id="authors">

        <h4><span>4.6.1 </span>Authors &amp; Contributors</h4>
        <p>
          If the document has authors or contributors, they are listed in a <code>section</code>
          with <code>typeof</code> <a href="http://ns.science.ai/#AuthorsList" class="onto">sa:AuthorsList</a>. The
          content of that <code>section</code>
          is an <code>h2</code> title appropriate for it, followed by either a <code>ul</code> or
          <code>ol</code> (depending on whether the authors are considered ordered, which is
          highly dependent on the discipline’s culture).
        </p>
        <p>
          Each <code>li</code> in that list must feature a <code>typeof</code> of
          <a href="http://ns.science.ai/#ContributorRole" class="onto">sa:ContributorRole</a> and a property of either
          <a href="http://schema.org/author" class="onto">schema:author</a> or
          <a href="http://schema.org/contributor" class="onto">schema:contributor</a> depending on which is applicable.
          Modeling with schema.org
          roles is explained in the <a href="#roles">Roles</a> section.
        </p>
        <p>
          The <a href="http://ns.science.ai/#ContributorRole" class="onto">sa:ContributorRole</a> <code>span</code> is
          structured as follows:
        </p>
        <ul>
          <li>
            Exactly one <code>span</code> with a <code>property</code> of either
            <a href="http://schema.org/author" class="onto">schema:author</a> or <a href="http://schema.org/contributor"
              class="onto">schema:contributor</a> (matching the one that points to the
            role) and <code>typeof</code> either <a href="http://schema.org/Person" class="onto">schema:Person</a> (if
            the author is a sentient
            entity) or <a href="http://schema.org/Organization" class="onto">schema:Organization</a> (if it is a
            collective thereof). How to capture
            persons and organizations is detailed in the creatively-named
            <a href="#person-org">Persons &amp; Organizations</a> section.
          </li>
          <li>
            Zero or more <code>a</code> elements with a <code>property</code> of
            <a href="http://ns.science.ai/#roleAffiliation" class="onto">sa:roleAffiliation</a>, one for each
            affiliation of the author in producing the
            article. Each of those elements needs further to have a <code>resource</code>
            attribute matching the one on the affiliation it is pointing to and an
            <code>href</code> attribute linking to the element on which that affiliation is
            defined. The <code>a</code> element may contain arbitrary text (typically a number,
            letter, or symbol matching that used by the target in its own list). These should not
            occur if the agent is an organization.
          </li>
          <li>
            Zero or more <code>a</code> elements with a <code>property</code> of
            <a href="http://ns.science.ai/#roleAction" class="onto">sa:roleAction</a>, one for each comment describing
            the author’s specific
            contribution to the work (e.g. "Authors contributed equally" or "Designed the study").
            Each of those elements needs further to have a <code>resource</code>
            attribute matching the one on the note it is pointing to and an
            <code>href</code> attribute linking to the element which contains that note. The
            <code>a</code> element may contain arbitrary text (typically a number, letter, or
            symbol matching that used by the target in its own list).
          </li>
          <li>
            Zero or one <code>ul</code> elements. Each of its <code>li</code> children has a
            <code>property</code> of <a href="http://schema.org/roleContactPoint"
              class="onto">schema:roleContactPoint</a> and a <code>typeof</code> set
            to <a href="http://schema.org/ContactPoint" class="onto">schema:ContactPoint</a>. The content of each
            <code>li</code> can be anything
            that describes a manner of contacting the author in question, but it will typically
            involve properties such as <a href="http://schema.org/email" class="onto">schema:email</a>, <a
              href="http://schema.org/telephone" class="onto">schema:telephone</a>,
            <a href="http://schema.org/address" class="onto">schema:address</a>, <a href="http://schema.org/description"
              class="onto">schema:description</a> (for arbitrary descriptions of the
            contact method), or for journals publishing to the Web of the early 1980s
            <a href="http://schema.org/faxNumber" class="onto">schema:faxNumber</a>.
          </li>
        </ul>
        <p>
          Here is an example of a complete kitchen sink authors’ section. Note that in most cases
          the markup will be much simpler — this exercises far more of the features than there
          is information for in a typical case.
        </p>
        <figure typeof="schema:SoftwareSourceCode" resource="#authors-example" id="authors-example">
          <pre><code>
&lt;section typeof="sa:AuthorsList"&gt;
  &lt;h2&gt;Authors&lt;/h2&gt;
  &lt;ul&gt;
    &lt;li typeof="sa:ContributorRole" property="schema:author"&gt;
      &lt;span typeof="schema:Person"
            resource="https://en.wikipedia.org/wiki/John_Henry_Holland"&gt;
        &lt;meta property="schema:givenName" content="John"&gt;
        &lt;meta property="schema:additionalName" content="Henry"&gt;
        &lt;meta property="schema:familyName" content="Holland"&gt;
        &lt;span property="schema:name"&gt;John H. Holland&lt;/span&gt;
      &lt;/span&gt;
      &lt;a href="#sf" property="sa:roleAffiliation" resource="http://www.santafe.edu/"&gt;a&lt;/a&gt;,
      &lt;a href="#umich" property="sa:roleAffiliation" resource="http://umich.edu/"&gt;b&lt;/a&gt;,
      &lt;a href="#note1" property="sa:roleAction" resource="#note1" rel="footnote"&gt;1&lt;/a&gt;
      &lt;ul&gt;
        &lt;li property="schema:roleContactPoint" typeof="schema:ContactPoint"&gt;
          &lt;a href="mailto:jholland@umich.edu"
             property="schema:email"&gt;jholland@umich.edu&lt;/a&gt;
        &lt;/li&gt;
        &lt;li property="schema:roleContactPoint" typeof="schema:ContactPoint"&gt;
          &lt;a href="fax:+4815162342" property="schema:faxNumber"&gt;+4815162342&lt;/a&gt;
        &lt;/li&gt;
      &lt;/ul&gt;
    &lt;/li&gt;
  &lt;/ul&gt;
&lt;/section&gt;
            </code></pre>
          <figcaption>
            <span property="schema:name"></span>
            <span property="schema:description">
              Example of an author (<code>schema:contributor</code> could also have been used).
              The links to <code>#sf</code>, <code>#umich</code>, and <code>#note1</code> are
              expected to point to items in the <a href="#affiliations">Affiliations</a> section
              for the first two, and in the <a href="#meta-notes">Notes</a> section
              for the
              last one.
            </span>
          </figcaption>
        </figure>
      </section>
      <section id="affiliations">

        <h4><span>4.6.2 </span>Affiliations</h4>
        <p>
          If the authors and contributors of the documents are affiliated with organizations, they
          are listed in a <code>section</code> with <code>typeof</code> <a href="http://ns.science.ai/#Affiliations"
            class="onto">sa:Affiliations</a>.
          The content of that <code>section</code> is an <code>h2</code> title appropriate for it,
          followed by a <code>ul</code> or <code>ol</code> (but the order is less commonly
          relevant than it is for authors).
        </p>
        <p>
          Note that articles that feature an organization as an author should have that
          organization listed in the <a href="#authors">Authors &amp;
            Contributors</a> section,
          and <em>not</em> here.
        </p>
        <p>
          Each <code>li</code> in the list is one affiliation (though multiple people can
          reference it). The <code>li</code> needs to have an <code>id</code> matching that used
          in the reference. Inside the <code>li</code> is a <code>span</code> with
          <code>typeof</code> set to <a href="http://schema.org/Organization" class="onto">schema:Organization</a> and
          its <code>resource</code>
          also matching the one used in the reference. (The belt and suspenders approach is
          unfortunately needed to produce both usable HTML and a viable data model.)
        </p>
        <p>
          The content of the <a href="http://schema.org/Organization" class="onto">schema:Organization</a> can contain
          any applicable property. An
          example of an affiliations section, with some extra structure for the organization is
          given below.
        </p>
        <figure typeof="schema:SoftwareSourceCode" resource="#affiliations-example" id="affiliations-example">
          <pre><code>
&lt;section typeof="sa:Affiliations"&gt;
  &lt;h2&gt;Affiliations&lt;/h2&gt;
  &lt;ul&gt;
    &lt;li id="sa"&gt;
      &lt;span typeof="schema:Organization" resource="https://science.ai/"&gt;
        &lt;span property="schema:name"&gt;science.ai&lt;/span&gt;,
        &lt;span property="schema:parentOrganization"&gt;
          &lt;span typeof="schema:Organization"&gt;
            &lt;span property="schema:name"&gt;Standard Analytics&lt;/span&gt;
            —
            &lt;span property="schema:location" typeof="schema:Place"&gt;
              &lt;span property="schema:address" typeof="schema:PostalAddress"&gt;
                &lt;span property="schema:addressLocality"&gt;NYC&lt;/span&gt;,
                &lt;span property="schema:addressRegion"&gt;NY&lt;/span&gt;,
                &lt;span property="schema:addressCountry"&gt;USA&lt;/span&gt;
              &lt;/span&gt;
            &lt;/span&gt;
          &lt;/span&gt;
        &lt;/span&gt;
      &lt;/span&gt;
    &lt;/li&gt;
  &lt;/ul&gt;
&lt;/section&gt;
            </code></pre>
          <figcaption>
            <span property="schema:name"></span>
            <span property="schema:description">
              Example of an organization section.
            </span>
          </figcaption>
        </figure>
      </section>
      <section id="abstract-etc">

        <h4><span>4.6.3 </span>License, Copyright, Keywords, and Abstract</h4>
        <p>
          The copyright line of the document can be included in any element, but it must list two
          properties. <a href="http://schema.org/copyrightYear" class="onto">schema:copyrightYear</a> has a numeric
          value, and
          <a href="http://schema.org/copyrightHolder" class="onto">schema:copyrightHolder</a> has a value of <a
            href="http://schema.org/Person" class="onto">schema:Person</a> or
          <a href="http://schema.org/Organization" class="onto">schema:Organization</a>.
        </p>
        <p>
          A link to the license for the article should be provided. The link should have the
          property of <a href="http://schema.org/license" class="onto">schema:license</a> and
          <code>typeof="CreativeWork"</code>.
        </p>

        <p>
          Keywords should be listed in a <code>section</code> element with an appropriate
          <code>h2</code>. The list of terms should be a <code>ul</code> with the
          <code>property</code> of <a href="http://schema.org/keywords" class="onto">schema:keywords</a> on every
          <code>li</code>.
        </p>
        <p>
          The abstract should be included in a <code>section</code> element with
          <code>typeof</code> attribute containing <code>sa:Abstract</code>. The abstract should
          have the role of <code>doc-abstract</code>.
        </p>
      </section>
      <section id="meta-notes">

        <h4><span>4.6.4 </span>Notes</h4>
        <p>
          Notes that add information about the <a href="#authors">Authors and
            Contributors</a>
          section should be hunk elements labeled as <code>doc-footnote</code>.
        </p>

      </section>
    </section>
    <section id="flavored-links">

      <h3><span>4.7 </span>Flavored Links</h3>
      <p>
        The <a href="https://www.w3.org/TR/html51/semantics.html#linkTypes"><code>rel</code></a>
        attribute should be applied to apply some spice to your links. The following values of
        <code>rel</code> should be used on the link that refers to these elements:
      </p>
      <ul>
        <li>footnote</li>
        <li>license</li>
        <li>stylesheet</li>
      </ul>
      <p class="issue">
        There are many values for rel, such as glossary and bibliography that look like they are
        useful, but based on the definition, it sounds like they point to the section containing
        the whole biblio. Not so helpful. rel="citation" or "biblioentry" would be more valuable.\
      </p>
    </section>
    <section id="citations">

      <h3><span>4.8 </span>Citations &amp; References</h3>
      <p>
        Citations in scholarly articles provide a way to reference the work of others upon which
        one builds. In the pre-Web era, they essentially served as links by carrying sufficient
        information for one to find the reference in question, in a relatively compact manner.
      </p>
      <p>
        In a Web world, it can seem tempting to simply replace citations with links, but there is
        value in keeping the limited amount of metadata about the cited object that they provide
        inlined in the document. Links rot and disappear; when that happens the rest of the
        information can prove crucial in finding the referenced object at some other location.
        Unique identifiers with indirect resolution, such as DOIs, might seem like a solution to
        this problem but being opaque humans routinely get them wrong. (DOIs additionally suffer
        from a single point of failure for resolution.) All things considered, including a link
        for convenience and human-readable metadata about the referenced object is likely the
        most resilient way to cite another document.
      </p>
      <p>
        In the print universe, reducing the number of pages one needs to use can be a noticeable
        cost-saver. Given that scholarly articles can easily feature dozens if not hundreds of
        cited references, making use of compact reference conventions (as well as smaller font
        sizes) made sense. Over time, however, what was a sensible idea degenerated into a
        territorial maze of gratuitously heterogenous conventions to the point where there now
        exist <a href="http://citationstyles.org/">over 8000 citation styles</a>.
      </p>
      <p>
        There is no value in Scholarly HTML so much as attempting to support all citation styles.
        The Web does not need the compactness. Citations and references should be both data-rich
        and human-accessible, something on which the traditional formats fail, in some cases
        quite spectacularly.
      </p>
      <p>
        For accessibility purposes, Scholarly HTML recommends that references be formatted in such
        a manner that they read naturally in the article’s natural language, with articulations
        between the metadata parts, as below:
      </p>
      <figure typeof="schema:SoftwareSourceCode" resource="#citation-example" id="citation-example">
        <pre><code>
&lt;li typeof="schema:WebPage" role="doc-biblioentry"
    resource="http://semver.org/"
    property="schema:citation" id="some-id"&gt;
 &lt;cite property="schema:name"&gt;
   &lt;a href="http://semver.org/"&gt;Semantic Versioning 2.0.0&lt;/a&gt;
 &lt;/cite&gt;,
  by &lt;span property="schema:author" typeof="schema:Person"&gt;
   &lt;span property="schema:givenName"&gt;Tom&lt;/span&gt;
   &lt;span property="schema:familyName"&gt;Preston-Werner&lt;/span&gt;
 &lt;/span&gt;; published in
 &lt;time property="schema:datePublished" datatype="xsd:gYear"
       datetime="2014"&gt;2014&lt;/time&gt;
 &lt;span property="schema:potentialAction" typeof="schema:ReadAction"&gt;
   &lt;meta property="schema:actionStatus" content="CompletedActionStatus"&gt;
    (accessed on
   &lt;time property="schema:endTime" datatype="xsd:date"
         datetime="2016-02-01"&gt;01 Feb 2016&lt;/time&gt;)
 &lt;/span&gt;.
&lt;/li&gt;
          </code></pre>
        <p>
          The above code renders as:
        </p>
        <ol>
          <li typeof="schema:WebPage" role="doc-biblioentry" resource="http://semver.org/" property="schema:citation"
            id="some-id">
            <cite property="schema:name">
              <a href="http://semver.org/">Semantic Versioning 2.0.0</a>
            </cite>,
            by <span property="schema:author" typeof="schema:Person">
              <span property="schema:givenName">Tom</span>
              <span property="schema:familyName">Preston-Werner</span>
            </span>; published in
            <time property="schema:datePublished" datatype="xsd:gYear" datetime="2014">2014</time>
            <span property="schema:potentialAction" typeof="schema:ReadAction">
              <meta property="schema:actionStatus" content="CompletedActionStatus">
              (accessed on
              <time property="schema:endTime" datatype="xsd:date" datetime="2016-02-01">01 Feb 2016</time>)
            </span>.
          </li>
        </ol>
        <figcaption>
          <span property="schema:name"></span>
          <span property="schema:description">
            Example of a readable citation.
          </span>
        </figcaption>
      </figure>
      <p>
        The references section is simply a <code>section</code> with an appropriate heading,
        containing an <code>ol</code>. Each <code>li</code> in the list follows a regular
        structure: it has a <code>role</code> of <code>doc-biblioentry</code>, a
        <code>resource</code> being the URL identifying the cited object, a <code>property</code>
        of <a href="http://schema.org/citation" class="onto">schema:citation</a>, and <code>id</code> to make it
        linkable, and a
        <code>typeof</code> capturing the kind of object that is being referenced (typically
        <a href="http://schema.org/ScholarlyArticle" class="onto">schema:ScholarlyArticle</a>, <a
          href="http://schema.org/Book" class="onto">schema:Book</a>, or <a href="http://schema.org/WebPage"
          class="onto">schema:WebPage</a> but there is
        really no limit as to what may be cited).
      </p>
      <p>
        The content of the <code>li</code> can be any <a role="doc-biblioref" href="#ref-RDFa">RDFa</a> that
        matches the <code>typeof</code>, but some good practices should be observed.
      </p>
      <p>
        The title or name of the cited object should be in a <code>cite</code> element. If a link
        is available, then the title should be linked. Date and time values (such as publication
        or access date) should make use of the <code>time</code> element (further noting that
        the <code>datatype</code> attribute can be used to express the granularity of the date as
        in the example above).
      </p>
      <p>
        While arbitrary metadata may be used, it is highly recommended to stick to
        <a role="doc-biblioref" href="#ref-schema.org">schema.org</a> and the
        <a href="#scholarly-article">Scholarly Article</a> vocabularies. The reason
        for that is
        that, should one wish to convert from Scholarly HTML citations into a specific print
        format then it will be desirable to be able to reliably extract information from the
        citations. This could be used for instance to produce <a role="doc-biblioref" href="#ref-CSL">CSL</a>
        variables (as <a href="http://citationstyles.org/developers/">exemplified in the CSL
          documentation</a>) and then use a CSL implementation in order to produce the output.
      </p>
      <p class="issue">
        Should we be more constraining and define more precisely the constructs that are more
        likely to interoperate?
      </p>
      <p class="issue">
        Providing a mapping to CSL would be extremely useful.
      </p>
    </section>
    <section id="footnotes">

      <h3><span>4.9 </span>Footnotes &amp; Endnotes</h3>
      <p>
        If the document has notes, they are listed in a <code>section</code> with the role of
        <code>doc-endnotes</code>. The content of that <code>section</code> is an <code>h2</code>
        title appropriate for it, followed by either a <code>ul</code> or <code>ol</code>. Each
        <code>li</code> should be labeled with the role of <code>doc-endnote</code>.
      </p>
    </section>
    <section id="funding">

      <h3><span>4.10 </span>Funding Information</h3>
      <p>
        Funding informations is provided using a complex triples structure which can be summarized
        as follows:
      </p>
      <ul>
        <li>subject: receiver of funding (example: Author)</li>
        <li>predicate: string or sponsor role (example: wasFundedBy)</li>
        <li>object: funding organization (example: Bill &amp; Melinda Gates Foundation)</li>
      </ul>
      <p>
        This can be enhanced with information such as the award name and Role information. Here is
        a detailed example:
      </p>
      <figure typeof="schema:SoftwareSourceCode" resource="#funding-example" id="funding-example" role="doc-example">
        <pre><code>
XXX this example has issues
&lt;section id="funding" typeof="sa:Funding"&gt;
  &lt;h2 role="doc-title"&gt;Funding&lt;/h2&gt;
  &lt;ol property="schema:sponsor"&gt;
    &lt;li resource="http://funding.example.org/" typeof="sa:SponsorRole"&gt;
      &lt;span typeof="schema:Person" resource="http://example.name/"&gt;
        &lt;span property="schema:name"&gt;Xiong Ding&lt;/span&gt;
      &lt;/span&gt;
      &lt;span property="schema:name"&gt;acknowledges support from&lt;/span&gt;
      &lt;ul&gt;
        &lt;li&gt;
          &lt;span typeof="schema:Organization" resource="http://www.nuc.edu.cn/"&gt;
            &lt;a href="http://www.nuc.edu.cn/" property="schema:name"&gt;North University of China&lt;/a&gt;
          &lt;/span&gt;
        &lt;/li&gt;
      &lt;/ul&gt;
      &lt;span property="schema:roleOffer" typeof="schema:FundingSource"&gt;
        &lt;span property="schema:name"&gt;The 11th Graduate Science and Technology Projects&lt;/span&gt;
        (&lt;span property="schema:alternateName"&gt;Natural Science Project&lt;/span&gt;)
        &lt;span property="schema:serialNumber"&gt;20141130&lt;/span&gt;
      &lt;/span&gt;
    &lt;/li&gt;
  &lt;/ol&gt;
&lt;/section&gt;
          </code></pre>
        <figcaption></figcaption>
      </figure>
    </section>
    <section id="disclosures">

      <h3><span>4.11 </span>Disclosures</h3>
      <p>
        Disclosure information is a list of disclosure actions described in a simple triples
        structure.
      </p>
      <ul>
        <li>
          The subject is always one of the contributor roles (example: Author)
        </li>
        <li>
          The name of the action (nerd-talk: predicate, human-speak: verb) is a string describing
          the action (example: "received beer from")
        </li>
        <li>
          The recipient, or object, is the direct object of the sentence (example: Guinness)
        </li>
      </ul>
    </section>
    <section id="acknowledgements">

      <h3><span>4.12 </span>Acknowledgements</h3>
      <p>
        XXX
      </p>
    </section>
  </section>
  <section id="scholarly-article">

    <h2><span>5. </span>Scholarly Article Vocabulary</h2>
    <p>
      A limited number of classes and properties are currently not available from
      <a role="doc-biblioref" href="#ref-schema.org">schema.org</a>. In most if not
      all cases it would be desirable to
      make them available there, but while work is progressing it is simpler to define them
      ourselves.
    </p>
    <p class="issue">
      The current URL for the Scholarly Article vocabulary is
      <code>http://ns.science.ai/</code>. It may be desirable (should the vocabulary persist) to
      use a different URL. But this issue might go away if schema.org steps up.
    </p>
    <p>
      You can read the <a href="http://ns.science.ai/">definitions for the SA vocabulary</a>.
    </p>
  </section>
  <section id="hypermedia">

    <h2><span>6. </span>Hypermedia Controls</h2>

  </section>
  <section id="processing-model">

    <h2><span>7. </span>Processing Model</h2>

  </section>
  <section id="acks">

    <h2><span>8. </span>Acknowledgements</h2>
    <p>
      Scholarly HTML would like to thank <a href="http://scholarlyhtml.org/">Scholarly HTML</a>
      (you read that right) for blazing the trail perhaps a few years too soon. Particularly,
      the following people were particularly kind and helpful:
      <a href="https://twitter.com/ptsefton">Peter Sefton</a>,
      <a href="https://twitter.com/blahah404">Richard Smith-Unna</a>, and
      <a href="https://twitter.com/petermurrayrust">Peter Murray-Rust</a>.
    </p>
    <p>
      PLOS has a
      <a href="http://blogs.plos.org/mfenner/2011/03/19/a-very-brief-history-of-scholarly-html/">short
        history of Scholarly HTML</a> that is worth reading (and would be worth updating).
    </p>
    <p>
      Dan Brickley was kind enough to drop by the office to chat about our usage of
      <a href="http://schema.org/">schema.org</a> even though he was tired and hungry. As
      always, examples involving fish tanks are the most helpful. Dave Cramer shared ideas
      that we happily stole.
    </p>
    <p>
      Patrick Johnston’s input has been crucial, notably in modeling authoring. We can only
      hope that getting those details exactly right have not caused him to lose too much
      sleep.
    </p>
    <p>
      We also received very useful feedback and pointers from: Kjetil Kjernsmo (DAHUT!),
      Silvio Peroni, Justin Johansson, Alf Eaton, Raniere Silvia, Kaveh Bazargan and Mike
      Smith. We are very much indebted to the help provided us by Ivan Herman.
    </p>
    <p>
      If we somehow forgot you in this list and you are too gracious to complain, we love you
      all the same.
    </p>
  </section>


  <section id="biblio-references">
    <h2><span>9. </span>References</h2>
    <dl>
      <dt id="ref-NYT">NYT</dt>
      <dd property="schema:citation" typeof="schema:ScholarlyArticle"
        resource="http://www.scribd.com/doc/224608514/The-Full-New-York-Times-Innovation-Report">
        <cite property="schema:name"><a
            href="http://www.scribd.com/doc/224608514/The-Full-New-York-Times-Innovation-Report">The
            Full New York Times Innovation Report</a></cite>,
        by
        <span property="schema:author" typeof="schema:Person">
          <span property="schema:name">New York Times</span>
        </span>;
        <time property="schema:datePublished" datetime="2014-03" datatype="xsd:gYearMonth">2014 Mar</time>.
      </dd>
      <dt id="ref-HTML">HTML</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="http://www.w3.org/TR/html5/">
        <cite property="schema:name"><a href="http://www.w3.org/TR/html5/">One of the HTML
            Specifications</a></cite>.
      </dd>
      <dt id="ref-WAI-ARIA">WAI-ARIA</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="https://www.w3.org/TR/wai-aria/complete">
        <cite property="schema:name"><a href="https://www.w3.org/TR/wai-aria/complete">Accessible Rich
            Internet Applications (WAI-ARIA) 1.0</a></cite>.
      </dd>
      <dt id="ref-DPUB-ARIA">DPUB-ARIA</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="http://w3c.github.io/aria/aria/dpub.html">
        <cite property="schema:name"><a href="http://w3c.github.io/aria/aria/dpub.html">Digital
            Publishing WAI-ARIA Module 1.0</a></cite>.
      </dd>
      <dt id="ref-RDFa">RDFa</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="https://www.w3.org/TR/rdfa-primer/">
        <cite property="schema:name"><a href="https://www.w3.org/TR/rdfa-primer/">RDFa 1.1
            Primer</a></cite>.
      </dd>
      <dt id="ref-schema.org">schema.org</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="http://schema.org/">
        <cite property="schema:name"><a href="http://schema.org/">schema.org</a></cite>.
      </dd>
      <dt id="ref-CSL">CSL</dt>
      <dd property="schema:citation" typeof="schema:WebPage" resource="http://citationstyles.org/">
        <cite property="schema:name"><a href="http://citationstyles.org/">Citation Styles
            Language</a></cite>.
      </dd>
    </dl>
  </section> -->
</body>

</html>
