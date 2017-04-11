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

    controladora->setJugadoresActual(controladora->getJugadores());
    controladora->repartirCartas();

   while(controladora->getNumJugadoresActual()>1)
   {
       //crea una nueva ronda
       controladora->getRondas()->goToPos(controladora->getRondas()->getSize()-1);
       controladora->getRondas()->goToEnd();
       //while()
   }
}
