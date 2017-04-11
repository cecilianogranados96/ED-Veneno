#include <iostream>
#include "Controladora.h"

using namespace std;

int main(void)
{
    int numJugadores, i=0;
    cout<<"Digite la cantidad de jugadores [2-6]: ";
    cin>>numJugadores;

    Controladora* controladora = new Controladora(numJugadores);

    string nombre;
    while(i<numJugadores)
    {
        cout<<"\nDigite el nombre del jugador ["<<i<<"]: ";
        cin>>nombre;
        controladora->crearJugadores(nombre);
        i++;
    }
    controladora->repartirCartas();
    controladora->getJugadores()->print();

    controladora->getJugadores()->goToPos(0);

    cout<<"\nCarta a pasar: ";
    controladora->getJugadores()->getCurrValue()->getBActual()->getValue()->print();
    controladora->addCaldero1(controladora->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getJugadores()->getCurrValue());
    cout<<"\nCaldero 1 ";
    controladora->getCaldero1()->getBaraja()->print();
    controladora->getJugadores()->getCurrValue()->getBActual()->previous();

    cout<<"\nCarta a pasar: ";
    controladora->getJugadores()->getCurrValue()->getBActual()->getValue()->print();
    controladora->addCaldero1(controladora->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getJugadores()->getCurrValue());
    cout<<"\nCaldero 1 ";
    controladora->getCaldero1()->getBaraja()->print();
    controladora->getJugadores()->getCurrValue()->getBActual()->previous();

    cout<<"\nCarta a pasar: ";
    controladora->getJugadores()->getCurrValue()->getBActual()->getValue()->print();
    controladora->addCaldero1(controladora->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getJugadores()->getCurrValue());
    cout<<"\nCaldero 1 ";
    controladora->getCaldero1()->getBaraja()->print();
    controladora->getJugadores()->getCurrValue()->print();
}
