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
    controladora->getJugadores()->print();
    controladora->getBarajaOriginal()->barajar(7, numJugadores, controladora);

    //Baraja* bOriginal = new Baraja('O');
    //bOriginal->barajar(7, numJugadores);
}
