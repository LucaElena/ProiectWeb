from random import randrange
# Online Python compiler (interpreter) to run Python online.
# Write Python 3 code in this online editor and run it.

for i in range(100):
    m = randrange(4,7)
    d = randrange(1,30)
    h = randrange(8,19)
    u = randrange(2,5)
    s = "1"
    if(h <10):
        h = "0"+str(h)
    print("("+str(i)+", '2022-0"+str(m)+"-"+str(d)+" "+str(h)+":00:00', 1, "+str(u)+", "+str(i)+"),")
	
	


ids = [96,95,42,70,63,84,69,81,89,22,47,91,31,29,10,74,36,71,85,60,87,55,76,26,100,82,80,92,19,88,75,34,58,45,12,24,38,83,78,21,54,48,52,64,98,99,32,67,43,3,62,73,90,49,56,44,46,65,39,4,61,79,97,53,51,25,15,93,50,1,2];

mesaj_client = 'Buna ziua,\r\nAm o problema cu motocicleata mea Y.As vrea sa ii schimb piesa X Y Z.\r\nVa multumesc.';
                
mesaj_admin_lista = ["Buna ziua,\r\nV-am facut rezervarea pieselor dorite pentru motocicleta dumneavostra si va asteptam la noi la data programata. Va multumim,\r\nCymat", "Buna ziua,\r\nNu avem piesele dorite si nu va putem rezolva problema momentan dar le comandam astazi iar daca reveneti in 10 zile va putem repara motocicleta\r\nVa mulumim de intelegere,\r\nCymat"];
# {
# "156":"1",
# "157":"1"
# }

for id in ids:
    lista_piese = '{'
    for i in range(randrange(4,7)):
        lista_piese = lista_piese + '"' + str(randrange(1,221)) + '"' + ':"' + str(randrange(1,4)) + '",'
    lista_piese = lista_piese.rstrip(',') + '}' 
    status = 5
    mesaj_admin = mesaj_admin_lista[0]
    if(id%5 == 1):
        status = 4
        mesaj_admin = mesaj_admin_lista[1]
        lista_piese = '{}'
    mesaj = '(\'' + str(id) +'\', \'' + mesaj_client + '\', \'' + mesaj_admin + '\', \'' + lista_piese + '\', \'' + str(status) + '\')'
    print(mesaj + ",")