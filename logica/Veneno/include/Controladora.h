#ifndef CONTROLADORA_H
#define CONTROLADORA_H
#include "Baraja.h"
#include "DLinkedListJ.h"

class DLinkedListJ;

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
        ArrayList* getCaldero1();
        ArrayList* getCaldero2();
        ArrayList* getCaldero3();
        bool addCaldero1(Naipe* naipe);
        bool addCaldero2(Naipe* naipe);
        bool addCaldero3(Naipe* naipe);
        void crearJugadores(string nombre);
        void repartirCartas();
        void barajar(int cantidad);

    protected:

    private:
        int numJugadores;
        DLinkedListJ* jugadores;
        ArrayList* bOrdenada;       //baraja con todos los naipes ordenados
        ArrayList* bEnJuego;        //baraja de cartas en uso
        ArrayList* bCaldero1;
        ArrayList* bCaldero2;
        ArrayList* bCaldero3;
        Baraja* barajaOriginal;
        void crearBOriginal();
};

#endif // CONTROLADORA_H
