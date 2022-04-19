from random import randrange

for i in range(100):
    m = randrange(4,7)
    d = randrange(1,30)
    h = randrange(8,19)
    u = randrange(2,5)
    s = "1"
    if(h <10):
        h = "0"+str(h)
    print("("+str(i)+", '2022-0"+str(m)+"-"+str(d)+" "+str(h)+":00:00', 1, "+str(u)+", "+str(i)+"),")