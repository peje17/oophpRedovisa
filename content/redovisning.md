---
...
Redovisning
=========================

Reflektera över svårigheter, problem, lösningar, erfarenheter, lärdomar, resultatet, etc

Kmom01
-------------------------
##### Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?
Jag jobbar ju dagligen i C# som ju från grunden bygger på oop, så tankesättet var inget främmande. Tycker man tydligt känner av att oop konceptet är en senare konstruktion i PHP-språket – det är inte alls lika naturligt integrerat som det är i C#.

##### Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?
Att bygga lösningar för GET och POST var hyfsat enkelt (jag hade ju Mikaels genomgång som utgångspunkt). Det var lite mer strul med SESSION versionen. Av någon anledning har jag svårt att få in SESSION konceptet, och jag har alltid problem när jag ska använda detta koncept. Sedan blev jag lite osäker på vilka delar ni ville ha som sessionsvariabler – för viss information måste väl skickas med formuläret?
Att bygga klassen som hantera spelet var ju ganska enkelt, och det är lite synd att 80% av fokus i denna uppgift ligger på att förstå session lösningen, när ämnet ju egentligen är PHP klasser.

##### Har du några inledande reflektioner kring me-sidan och dess struktur?
Jag är ju i grunden inte riktig kompis med vara sig ANAX eller WordPress cms’et. Tycker det är svårt att få in hur allt hänger ihop och vad som styr vilka delar i systemen. Det har egentligen inte ändrat sig från när vi hade design kursen. Det var bra att Mikael gick igenom folders i ramverket, och jag ser gärna att det läggs ännu mer tid på detta, så man ännu bättra får in hur allt hänger ihop

##### Vilken är din TIL för detta kmom?
Att byta PC skapar problem!




Kmom02
-------------------------

##### Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?
Det gick egentligen bra. Inga större problem, och det kändes logisk att placera ut de olika filer i tillsvarande folders i ramverket.

##### Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
Att göra denna uppgift tog mycket lång tid. Att börja rita i något okänt rit-verktyg kändes inget bra, så från början tänkte jag endast ut vilka klassar som behövdes. Game och player kändes naturligt tillsammans med hand och tärning som vi hade skapat sedan tidigare. Sedan var jag osäker på om man borde ha en rond och även en autoplayer. Autoplayer skapade jag så småningom men inte ronden… det var nog ett misstag.
Jag jobbar ju dagligen i Visual Studio och C#, och att skapa klassar etc. känns naturligt. Hur man placera logik i route och view är kanske lite mer okänd mark, men jag följde de exempel som fanns sedan tidigare.

##### Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?
Jag använde draw.io, som var helt nytt för mig, men som jag tycker fungera utmärkt. Jag gillar att rita lösningar, men tycker att MySql Workbench är snäppet bättra en de verktyg som presenterades i detta kursmoment.
Make doc är egentligen otrolig häftig – att med ett knapptryck skapa vettig dokumentation för ett helt projekt är ju faktisk mycket tilltalande. Det jag dock i efterhand konstaterar är att det är otroligt viktigt att man skriver vettiga kommentarer i programmet, annars blir dokumentationen bara en fancy presentation av något oanvändbart.

##### Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?
Jag har ju insett vitsen med att ha ett CMS ramverk, men som jag har skrivit tidigare är jag inte riktig kompis med dessa ramverk. Jag har svårt att få in sammanhangen mellan alla filer och saknar någon mer övergripande beskrivning av tankarna bakom dessa ramverk… och det gör jag fortfarande.

##### Vilken är din TIL för detta kmom?
Att BTH inte har koll på en rimlig storlek på en veckouppgift i en 7,5 poängs kurs… de agera fortfarande som det var en 15 poängs kurs.




Kmom03
-------------------------

##### Har du tidigare erfarenheter av att skriva kod som testar annan kod?
Jag har tidigare gått ett unit-test kursmoment i en c# kurs. Då var detta med unit-test helt nytt för mig, och jag blev positivt överraskat att det går att automatisk testa sin kod (det finns vist inte på stordatorn).

##### Hur ser du på begreppen enhetstestning och att skriva testbar kod?
Jag är mycket positiv till detta. Inser ju att detta kan ha stor betydelse för de lösningar man skapar och hur förvaltningsbare de blir långsiktigt. Ingen tvekan att din lösning blir båda billigare och bättra i längden, om du implementerar en genomtänkt automatisk test.
På jobbet diskutera man mycket contingues delivery, och en förutsättning för detta är förstås automatisk testande. I dag där vi skickar ut releaser kanske var annan månad, är det enormt påfrestande vid varje release, och det sker ju tyvärr lite för ofta att något blir fel. Jag tror definitivt att CI skulle vara ett stort steg framåt för bättra applikationer - och i detta koncept ingår som sagt test som ett nyckelmoment.

##### Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.
Blackbox testning är när du tester utan att egentligen känna till den exakta kod som exekverar – du tester en vis funktion för korrekt resultat. En utifrån och in metod där man tar utgångspunkt i användaren och den önskade funktionalitet.
Whitebox testning tar utgångspunkt i att man ser koden, och medvetet bestämmer vilka path i koden man tester (förhoppningsvis alla). Ett typisk inifrån och ut testande där utgångspunkten är själva koden.
Greybox testning är en typ av blackbox testning, där man som tester har kunskap om delar av testenheten (t.ex. datastrukturer och algoritmer). Man använder sin kunskap vid planeringen och utförande av testerna.
Positive tester är när man tester att en enhet fungera korrekt med korrekt input. I Negative tester försöker man att föda enheten med felaktig input och testa att den även hantera detta på ett korrekt sätt.

##### Hur gick det att genomföra uppgifterna med enhetstester, använde du egna klasser som bas för din testning?
Det gick bra att göra uppgifterna inga större problem. Jag använda mig av de klasser som var med i exempel koden.

##### Vilken är din TIL för detta kmom?
Testning och speciellt automattestning fungerar även i PHP


Kmom04
-------------------------

##### Vilka är dina tankar och funderingar kring trait och interface?
Interface är jag van med från c#, och det är ju till stor nytta i många projekt. Jag gillar tanken med interface, för att kunna skapa funktionalitet som kan användas utan beroende. När jag lästa om trait förste gången jämförde jag det med en statisk klass – men så är det ju inte helt. Jag tror det är en praktisk konstruktion för att dela gemensam kod, men den känns lite som en efterkonstruktion i språket.

##### Hur gick det att skapa intelligensen och taktiken till tärningsspelet, hur gjorde du?
Från början var jag inne på att man med historik skulle kunna bestämma en sannolikhet för framtida kast, men kom fram till samma konklusion som du: matematisk håller det inte.
Efter att ha spelat spelet många gångar är min erfarenhet att man oftast kaster en gång för mycket. Därför är min utgångspunkt att antal kast styrs av antal tärningar. Sedan la jag på lite logik om spelaren var nära computerens score, för att trots allt skapa lite spänning.

##### Några reflektioner från att integrera hårdare in i ramverkets klasser och struktur?
Egentligen inte – när man jobbar i ett ramverk är det förstås logisk att använda ramverkets funktionalitet och då är det helt logisk att använda ramverksfunktionerna. Men när resultatet ändå är att det finns en sessions-variabel ser jag kanske inte den faktiska vinst.

##### Berätta hur väl du lyckades med make test inuti ramverket och hur väl du lyckades att testa din kod med enhetstester och vilken kodtäckning du fick.
Make test var missnöjd med ganska mycket, men vad jag kan läsa mig till är det mesta en del av ramverket.
När man väl har gjort test för ett par klassar, blir det närmast tråkigt att skapa test för övriga klassar – tror min konklusion är att man bör skriva testerna samtidigt som man skapar klassarna. Sedan noterade jag att procenten inte helt följer det antal tester man har skapat (coverage blev faktisk grön ett par gångar mitt i testskapandet men gul till slut igen!).

##### Vilken är din TIL för detta kmom?
Att implementera en lösning in i ett ramverk är ganska svårt.




Kmom05
-------------------------

Här är redovisningstexten



Kmom06
-------------------------

Här är redovisningstexten



Kmom07-10
-------------------------

Här är redovisningstexten
