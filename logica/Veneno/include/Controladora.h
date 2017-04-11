#ifndef CONTROLADORA_H
#define CONTROLADORA_H
#include "Baraja.h"
#include <Jugador.h>
#include "DLinkedListJ.h"

class DLinkedListJ;
class Jugador;

class Controladora
{
    public:
        Controladora(int numJugadores);
        ~Controladora();
        void setJugadores(DLinkedListJ* jugadores);
        void setBEnJuego(ArrayList* bEnJuego);
        void setNumJugadores(int numJugadores);
        DLinkedListJ* getJugadores();
        int getNumJugadores();
        ArrayList* getBOrdenada();
        ArrayList* getBEnJuego();
        Baraja* getBarajaOriginal();
        Baraja* getCaldero1();
        Baraja* getCaldero2();
        Baraja* getCaldero3();
        bool addCaldero1(Naipe* naipe, Jugador* jugador);
        bool addCaldero2(Naipe* naipe, Jugador* jugador);
        bool addCaldero3(Naipe* naipe, Jugador* jugador);
        void crearJugadores(string nombre);
        void repartirCartas();
        void barajar(int cantidad);

    protected:

    private:
        int numJugadores;
        DLinkedListJ* jugadores;
        ArrayList* bOrdenada;       //baraja con todos los naipes ordenados
        ArrayList* bEnJuego;        //baraja de cartas en uso
        Baraja* bCaldero1;
        Baraja* bCaldero2;
        Baraja* bCaldero3;
        Baraja* barajaOriginal;
        void crearBOriginal();
        bool validarTotal(Baraja* bCaldero, Jugador* jugador);
};

#endif // CONTROLADORA_H
