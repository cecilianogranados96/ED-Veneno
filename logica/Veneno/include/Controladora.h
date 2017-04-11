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
        void setBEnJuego(ArrayList* bEnJuego);
        void setNumJugadores(int numJugadores);
        void setNumJugadoresActual(int numJugadoresActual);
        void setRondas(DLinkedListR* rondas);
        DLinkedListJ* getJugadores();
        DLinkedListJ* getJugadoresActual();
        int getNumJugadores();
        int getNumJugadoresActual();
        ArrayList* getBOrdenada();
        ArrayList* getBEnJuego();
        Baraja* getBarajaOriginal();
        Baraja* getCaldero1();
        Baraja* getCaldero2();
        Baraja* getCaldero3();
        DLinkedListR* getRondas();
        bool addCaldero1(Naipe* naipe, Jugador* jugador);
        bool addCaldero2(Naipe* naipe, Jugador* jugador);
        bool addCaldero3(Naipe* naipe, Jugador* jugador);
        void crearRondas();
        void crearJugadores(string nombre);
        void borrarJugadores(Jugador* jugador);
        void unirJugadores();
        void repartirCartas();
        void barajar(int cantidad);

    protected:

    private:
        int numJugadores;
        int numJugadoresActual;
        DLinkedListJ* jugadores;
        DLinkedListJ* jugadoresActual;
        ArrayList* bOrdenada;       //baraja con todos los naipes ordenados
        ArrayList* bEnJuego;        //baraja de cartas en uso
        Baraja* bCaldero1;
        Baraja* bCaldero2;
        Baraja* bCaldero3;
        Baraja* barajaOriginal;
        DLinkedListR* rondas;
        void crearBOriginal();
        bool validarTotal(Baraja* bCaldero, Jugador* jugador);
};

#endif // CONTROLADORA_H
