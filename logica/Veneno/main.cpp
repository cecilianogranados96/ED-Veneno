#include <iostream>
#include "Controladora.h"

class Controladora;
using namespace std;

int main(void)
{
    Controladora* controladora = new Controladora();

    int opcion = 0;
    while(opcion != 6)
    {
        cout<<"\n\nMenu\n0. Asignar cantidad jugadores\n1. Crear jugador(n)\n2. Ver jugador(cartas en mano)\n3. Ver nombre Jugador\n4. Ver caldero (s)\n5. Jugar (recibe jugador y carta, caldero a mover)\n6. Salir\n\nDigite su eleccion: ";
        cin>>opcion;

        switch(opcion){
            case 0:
                int numJugadores;
                cout<<"Digite la cantidad de jugadores [2-6]: ";
                cin>>numJugadores;
                controladora->setNumJugadores(numJugadores);
                controladora->setNumJugadoresActual(numJugadores);
                break;
            case 1:
                {
                    string nombre;
                    cout<<"\nDigite el nombre del jugador: ";
                    cin>>nombre;
                    controladora->crearJugadores(nombre);
                    if(controladora->getNumJugadores() == controladora->getJugadores()->getSize()){
                        cout<<"\n\nSe crearon todos los jugadores\n\n";
                        controladora->setJugadoresActual(controladora->getJugadores());
                        controladora->crearRondas();
                        controladora->getRondas()->goToEnd();
                        controladora->getRondas()->getCurrValue()->barajar();
                    }
                }
                break;
            case 2:
                {
                    int jugador;
                    cout<<"Digite el número de jugador a ver: ";
                    cin>>jugador;
                    controladora->getRondas()->goToEnd();
                    controladora->getRondas()->getCurrValue()->getJugadores()->goToPos(jugador);
                    controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->print();
                }
                break;

            case 3:
                {
                    int jugador;
                    cout<<"Digite el número de jugador a ver: ";
                    cin>>jugador;
                    controladora->getRondas()->goToEnd();
                    controladora->getRondas()->getCurrValue()->getJugadores()->goToPos(jugador);
                    cout<<controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getNombre();
                }
                break;

            case 4:
                {
                    int caldero;
                    cout<<"Digite el número de caldero";
                    cin>>caldero;
                    if(caldero == 1){
                        controladora->getRondas()->goToEnd();
                        controladora->getRondas()->getCurrValue()->getCaldero1()->getBaraja()->print();
                    }
                    if(caldero == 2){
                        controladora->getRondas()->goToEnd();
                        controladora->getRondas()->getCurrValue()->getCaldero2()->getBaraja()->print();
                    }
                    if(caldero == 3){
                        controladora->getRondas()->goToEnd();
                        controladora->getRondas()->getCurrValue()->getCaldero3()->getBaraja()->print();
                    }

                }
                break;

            case 5:
                {
                    controladora->getRondas()->goToEnd();
                    int jugador, caldero, carta;
                    cout<<"Digite el numero de jugador: ";
                    cin>>jugador;
                    cout<<"Digite el caldero: ";
                    cin>>caldero;
                    cout<<"Digite la posicion de la carta: ";
                    cin>>carta;
                    controladora->getRondas()->getCurrValue()->getJugadores()->goToPos(jugador);
                    controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->goToPos(carta);
                    switch(caldero){
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
                break;
            }
        }
    }
}
    /*

                        /*controladora->setJugadoresActual(controladora->getJugadores());
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

