#include <iostream>
#include "DCircleList.h"
#include "Jugador.h"

using namespace std;

int main(void)
{
    string nombre;
    int numJugadores, i=0;
    cout<<"Digite la cantidad de jugadores [2-6]: ";
    cin>>numJugadores;
    DCircleList* jugadores = new DCircleList();

    while(i<numJugadores)
    {
        cout<<"\nDigite el nombre del jugador ["<<i<<"]: ";
        cin>>nombre;
        jugadores->append(new Jugador(nombre, jugadores->getSize()));
        i++;
    }

    jugadores->print();

    Baraja* bOriginal = new Baraja('O');
    bOriginal->getBOrdenada()->print();
    cout<<bOriginal->getBOrdenada()->getSize();
}
