#ifndef CONTROLADORA_H
#define CONTROLADORA_H
#include "Baraja.h"
#include "DCircleList.h"

class Controladora
{
    public:
        Controladora(int numJugadores);
        virtual ~Controladora();

    protected:

    private:
        static int numJugadores;
        static DCircleList Jugadores;
        static Baraja mazoOriginal;
};

#endif // CONTROLADORA_H
