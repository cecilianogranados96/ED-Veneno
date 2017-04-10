#include "Baraja.h"
#include "ArrayListN.h"
#include <string>
#include <sstream>
#include <cstdlib>
#include <time.h>

using namespace std;

//Constructor de la clase
Baraja::Baraja(char tipo)
{
    this->tipo = tipo;
}

//Destructor de la clase
Baraja::~Baraja()
{
    delete baraja;
}

//Getters
char Baraja::getTipo()
{
    return tipo;
}

ArrayList* Baraja::getBaraja()
{
    return baraja;
}

//Setters
void Baraja::setTipo(char tipo)
{
    this->tipo = tipo;
}

void Baraja::setBaraja(ArrayList* baraja)
{
    this->baraja = baraja;
}

//Remueve el naipe en la posición que entra como parámetro
bool Baraja::removeNaipe(int pos)
{
    return false;
}

//Añade un naipe al final de la baraja
void Baraja::insertNaipe(Naipe* naipe)
{
    baraja->append(naipe);
}

