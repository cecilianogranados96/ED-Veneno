#ifndef BARAJA_H
#define BARAJA_H
#include "Naipe.h"
#include "ArrayList.h"
#include "Controladora.h"
#include <iostream>

class ArrayList;
class Controladora;
using namespace std;

class Baraja
{
    public:
        Baraja(char tipo, int max);
        virtual ~Baraja();
        char getTipo();
        ArrayList* getBaraja();
        void setTipo(char tipo);
        void setBaraja(ArrayList* baraja);
        bool removeNaipe(int pos);
        void insertNaipe(Naipe* naipe);
        float totalBaraja();

    protected:

    private:
        char tipo;
        ArrayList* baraja;
};

#endif // BARAJA_H