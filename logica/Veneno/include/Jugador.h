#ifndef JUGADOR_H
#define JUGADOR_H
#include "Baraja.h"

using namespace std;

class Jugador
{
    public:
        Jugador(string nombre, int id);
        ~Jugador();
        void setNombre(string nombre);
        void setId(int id);
        void setBVenenos(Baraja* bVenenos);
        void setBComidas(Baraja* bComidas);
        void setBActual(Baraja* bActual);
        string getNombre();
        int getId();
        Baraja* getBVenenos();
        Baraja* getBComidas();
        Baraja* getBActual();
        string toString();

    protected:

    private:
        string nombre;
        int id;
        Baraja* bVenenos;
        Baraja* bComidas;
        Baraja* bActual;
};

#endif // JUGADOR_H
