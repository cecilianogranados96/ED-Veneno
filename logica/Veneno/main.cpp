#include <iostream>
#include "Controladora.h"

class Controladora;
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

    int opcion = 0;
    while(opcion != 8)
    {
        cout<<"Menu\n1.Jugar\n2.Ver Jugador\n3.Ver el primer caldero\n4.Ver el segundo caldero\n5.Ver tercer caldero\n6.Ver resultados\n8.Salir\n\nDigite su eleccion: ";
        cin>>opcion;

        switch(opcion){
            case 1:

                 {
                    controladora->setJugadoresActual(controladora->getJugadores());
                       while(controladora->getNumJugadoresActual()>1)
                       {
                           controladora->crearRondas();
                           controladora->getRondas()->goToEnd();
                           while(controladora->getRondas()->getCurrValue()->getState() == true){
                                if(controladora->getRondas()->getCurrValue()->totalNaipes() == 0){
                                    if(controladora->getRondas()->getCurrValue()->getBEnJuego()->getSize() >= (controladora->getRondas()->getCurrValue()->getCantidad() * controladora->getRondas()->getCurrValue()->getJugadores()->getSize())){
                                        controladora->getRondas()->getCurrValue()->barajar();
                                    }
                                    else{
                                        controladora->getRondas()->getCurrValue()->setState(false);
                                        break;
                                    }
                                }
                                for(int  i=0; i<controladora->getRondas()->getCurrValue()->getJugadores()->getSize(); i++){
                                    controladora->getRondas()->getCurrValue()->getJugadores()->goToPos(i);
                                    if(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getSize() == 0){
                                        cout<<"\nPasa turno\n";
                                    }
                                    else{
                                        controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->print();
                                        int p, q;
                                        cout<<"\nElija la posicion de su carta: ";
                                        cin>>p; //tiene que estar entre cero y la cantidad de cartas en mano
                                        cout<<"\nElija el caldero para ponerla: ";
                                        cin>>q;

                                        controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->goToPos(p);
                                        switch(q){
                                            case 1:
                                                controladora->getRondas()->getCurrValue()->addCaldero1(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue());
                                                controladora->getRondas()->getCurrValue()->getCaldero1()->getBaraja()->print();
                                                break;
                                            case 2:
                                                controladora->getRondas()->getCurrValue()->addCaldero2(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue());
                                                controladora->getRondas()->getCurrValue()->getCaldero2()->getBaraja()->print();
                                                break;
                                            case 3:
                                                controladora->getRondas()->getCurrValue()->addCaldero3(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue());
                                                controladora->getRondas()->getCurrValue()->getCaldero3()->getBaraja()->print();
                                                break;
                                        }
                                        controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->goToPos(p);
                                    }
                                }
                           }
                       }
                }
                break;

            case 2:
                controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->print();
                break;
            case 3:
                controladora->getRondas()->getCurrValue()->getCaldero1()->getBaraja()->print();
                break;
            case 4:
                controladora->getRondas()->getCurrValue()->getCaldero2()->getBaraja()->print();
                break;
            case 5:
                controladora->getRondas()->getCurrValue()->getCaldero3()->getBaraja()->print();
                break;

        }

    }
    /*


       controladora->setJugadoresActual(controladora->getJugadores());
       while(controladora->getNumJugadoresActual()>1)
       {
           controladora->crearRondas();
           controladora->getRondas()->goToEnd();
           while(controladora->getRondas()->getCurrValue()->getState() == true){
                if(controladora->getRondas()->getCurrValue()->totalNaipes() == 0){
                    if(controladora->getRondas()->getCurrValue()->getBEnJuego()->getSize() >= (controladora->getRondas()->getCurrValue()->getCantidad() * controladora->getRondas()->getCurrValue()->getJugadores()->getSize())){
                        controladora->getRondas()->getCurrValue()->barajar();
                    }
                    else{
                        controladora->getRondas()->getCurrValue()->setState(false);
                        break;
                    }
                }
                for(int  i=0; i<controladora->getRondas()->getCurrValue()->getJugadores()->getSize(); i++){
                    controladora->getRondas()->getCurrValue()->getJugadores()->goToPos(i);
                    if(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getSize() == 0){
                        cout<<"\nPasa turno\n";
                    }
                    else{
                        controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->print();
                        int p, q;
                        cout<<"\nElija la posicion de su carta: ";
                        cin>>p; //tiene que estar entre cero y la cantidad de cartas en mano
                        cout<<"\nElija el caldero para ponerla: ";
                        cin>>q;

                        controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->goToPos(p);
                        switch(q){
                            case 1:
                                controladora->getRondas()->getCurrValue()->addCaldero1(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue());
                                controladora->getRondas()->getCurrValue()->getCaldero1()->getBaraja()->print();
                                break;
                            case 2:
                                controladora->getRondas()->getCurrValue()->addCaldero2(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue());
                                controladora->getRondas()->getCurrValue()->getCaldero2()->getBaraja()->print();
                                break;
                            case 3:
                                controladora->getRondas()->getCurrValue()->addCaldero3(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue());
                                controladora->getRondas()->getCurrValue()->getCaldero3()->getBaraja()->print();
                                break;
                        }
                        controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->goToPos(p);
                    }
                }
           }
       }*/
}
