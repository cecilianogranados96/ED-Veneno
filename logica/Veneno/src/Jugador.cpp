#include "Jugador.h"

//Constructor de la clase
Jugador::Jugador(string nombre, int id)
{
   this->nombre = nombre;
   this->id = id;
   bVenenos = new ArrayList(52);
   bActual = new ArrayList(52);
   bComidas = new ArrayList(52);
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

void Jugador::setBVenenos(ArrayList* bVenenos)
{
    this->bVenenos = bVenenos;
}

void Jugador::setBComidas(ArrayList* bComidas)
{
    this->bComidas = bComidas;
}

void Jugador::setBActual(ArrayList* bActual)
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

ArrayList* Jugador::getBVenenos()
{
    return bVenenos;
}

ArrayList* Jugador::getBComidas()
{
    return bComidas;
}

ArrayList* Jugador::getBActual()
{
    return bActual;
}

string Jugador::toString()
{
    return getNombre();
}
