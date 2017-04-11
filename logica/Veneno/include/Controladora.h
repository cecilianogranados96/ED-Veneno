#ifndef CONTROLADORA_H
#define CONTROLADORA_H
#include "Baraja.h"
#include <Jugador.h>
#include "DLinkedListJ.h"
#include "DLinkedListR.h"

class DLinkedListJ;
class Jugador;

class Controladora
{
    public:
        Controladora(int numJugadores);
        ~Controladora();
        void setJugadores(DLinkedListJ* jugadores);
        void setJugadoresActual(DLinkedListJ* jugadoresActual);
        void setNumJugadores(int numJugadores);
        void setNumJugadoresActual(int numJugadoresActual);
        void setRondas(DLinkedListR* rondas);
        DLinkedListJ* getJugadores();
        DLinkedListJ* getJugadoresActual();
        int getNumJugadores();
        int getNumJugadoresActual();
        ArrayList* getBOrdenada();
        Baraja* getBarajaOriginal();
        DLinkedListR* getRondas();
        void crearRondas();
        void crearJugadores(string nombre);
        void unirJugadores();

    protected:

    private:
        int numJugadores;
        int numJugadoresActual;
        DLinkedListJ* jugadores;
        DLinkedListJ* jugadoresActual;
        ArrayList* bOrdenada;       //baraja con todos los naipes ordenados
        Baraja* barajaOriginal;
        DLinkedListR* rondas;
        void crearBOriginal();
        void borrarJugadores(Jugador* jugador);
        void borrarJugadores();
};

#endif // CONTROLADORA_H
