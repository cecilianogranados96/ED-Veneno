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

//Baraja el mazo con la cantidad de cartas indicadas
void Baraja::barajar(int cantidad, int numJugadores, Controladora* controladora)
{
    int max = cantidad * numJugadores;
    ArrayListN* posiciones = new ArrayListN(max);

    srand(time(NULL));

    //Crea posiciones aleatorias y verifica que no existan en el arreglo
    for (int i=0;i<max;i++)
    {
        bool check;
        int n;
        do
        {
            n = rand()%(controladora->getBEnJuego()->getSize()-1);
            check = true;

            for (int j=0;j<i;j++){
                posiciones->goToPos(j);
                if (n == posiciones->getValue())
                {
                    check = false;
                    break;
                }
            }
        } while (!check);
        posiciones->append(n);
    }
    posiciones->print();

    int sumCantidad = cantidad;
    int sumInicio = 0;

    //Asigna al jugador el mazo actual, tomando las posiciones aleatorias en el arrayList
    for(int i=0;i<numJugadores;i++){
        Baraja* temp = new Baraja('A');
        controladora->getJugadores()->goToPos(i);
        for(int j=sumInicio;j<sumCantidad;j++){
            posiciones->goToPos(j);
            controladora->getBEnJuego()->goToPos(posiciones->getValue());
            temp->getBaraja()->append(controladora->getBEnJuego()->getValue());
        }
        sumCantidad = sumCantidad + cantidad;
        sumInicio = sumInicio + cantidad;
        controladora->getJugadores()->getCurrValue()->setBActual(temp);
        //delete temp;
    }

    for(int i=0;i<max;i++){
        posiciones->goToPos(i);
        controladora->getBEnJuego()->goToPos(posiciones->getValue());
        controladora->getBEnJuego()->remove();
    }


}
