#include "Jugador.h"

//Constructor de la clase
Jugador::Jugador(string nombre, int id)
{
   this->nombre = nombre;
   this->id = id;
}

//Destructor de la clase
Jugador::~Jugador()
{
   delete bVenenos;
   delete bActual;
   delete bComidas;
}

//Setters
void Jugador::setNombre(string nombre)
{
    this->nombre = nombre;
}

void Jugador::setId(int id)
{
    this->id = id;
}

void Jugador::setBVenenos(Baraja* bVenenos)
{
    this->bVenenos = bVenenos;
}

void Jugador::setBComidas(Baraja* bComidas)
{
    this->bComidas = bComidas;
}

void Jugador::setBActual(Baraja* bActual)
{
    this->bActual = bActual;
}

//Getters
string Jugador::getNombre()
{
    return nombre;
}

int Jugador::getId()
{
    return id;
}

Baraja* Jugador::getBVenenos()
{
    return bVenenos;
}

Baraja* Jugador::getBComidas()
{
    return bComidas;
}

Baraja* Jugador::getBActual()
{
    return bActual;
}

string Jugador::toString()
{
    return getNombre();
}
