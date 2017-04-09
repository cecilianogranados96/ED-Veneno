#ifndef BARAJA_H
#define BARAJA_H
#include "Naipe.h"
#include "ArrayList.h"
#include <iostream>

class ArrayList;
using namespace std;


class Baraja
{
    public:
        Baraja(char tipo);
        virtual ~Baraja();
        char getTipo();
        ArrayList* getBaraja();
        ArrayList* getBOrdenada();
        void setTipo(char tipo);
        void setBaraja(ArrayList* baraja);
        bool removeNaipe(int pos);
        void insertNaipe(Naipe* naipe);
        void barajar(int cantidad);
        void barajarOrdenada();

    protected:

    private:
        char tipo;
        ArrayList* baraja;
        ArrayList* bOrdenada;
};

#endif // BARAJA_H
