# test-cu-bile
Test cu bile - un API ce implementeaza un algoritm de grupare
===============================================================

CERINTE:
  * Se dau bile de n culori
  * In total sunt n x n bile (n la patrat).
  * Distributia bilelor pe culori este random.

Exemplu:
Pentru n=3 culori (rosu,galben,albastru) avem 9 bile si o distributie ar putea fi 1 bila rosie, 3 bile galbene, 5 bile albastre.

Scop:
Sa se decida daca este posibil si in caz afirmativ, sa se prezinte algoritmul general prin care bilele sunt repartizate in n
grupe de cate n bile astfel incat in fiecare grupa sa fie bile de maxim 2 culori diferite (sunt permise si grupe cu o singura
culoare) indiferent de distributia initiala.

SOLUTIE:
Aplicatia are ca input numarul de culori, un string cu numarul de bile din fiecare culoare si ilustreaza cum algoritmul gasit
grupeaza bilele conform cerintelor.

Pentru modelarea problemei am imaginat N urne, cate una pentru fiecare culoare, fiecare urna continand un numar necunoscut
de bile de aceeasi culoare. Stim ca numarul total de bile este N la puterea a doua.
Grupele de cate N bile ni le imaginam ca linii pe o grila patrata cu dimensiunea N x N.
Vom umple grila de sus in jos, asezand cate N bile pe fiecare rand dupa urmatorul algoritm:

1. Start.
2. Determinam urna (culoarea) cu cele mai putine bile.
3. Scoatem cel mult N bile din acea urna si le asezam pe primul rand gol.
4. Daca randul e complet, ne intoarcem la pasul 2.
5. Daca nu, calculam cate bile mai trebuie din alta culoare pentru a completa randul.
6. Determinam urna cu cele mai putine bile, dar cu minim numarul necesar pentru completare.
7. Scoatem din acea urna numarul de bile necesar si completam randul.
8. Daca mai exista randuri goale, ne intoarcem la pasul 2.
9. Sfarsit.

Testele empirice au aratat ca algoritmul functioneaza pentru orice dimensiune N <= 10 si grupeaza cu succes bilele indiferent
de distributia initiala. Teoretic ar trebui sa obtina succes in toate cazurile imaginabile, indiferent cat de mare ar fi N.

Aplicatia e bazata pe Symfony 3.4 si salveaza intr-o baza de date gruparea rezultata a bilelor pentru un set de date de input.
Partea de frontend web foloseste jQuery/Bootstrap/Ajax/HTML5/CSS3, iar in backend avem MySQL.

Proiectul contine in directorul radacina un fisier .sql pentru crearea si popularea unei tabele in baza de date.
Tabela se poate importa local de la consola sistemului cu comanda:

  mysql -u username -p -h localhost DATA-BASE-NAME < db.sql