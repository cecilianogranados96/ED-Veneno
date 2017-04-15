#include <iostream>
#include "Controladora.h"
#include "Server.h"
#define REQ_WINSOCK_VER 2
#include <sstream>
#include <string>
#include <cstdlib>

class Controladora;
using namespace std;
int toint(string val){
    stringstream geek(val);
    int x = 0;
    geek >> x;
    return x;
}
int main(void)
{
    Controladora* controladora = new Controladora();
    WSockServer MyServer(REQ_WINSOCK_VER);
    MyServer.RunServer(1500,"Respuesta Inical a fuerta tiene que ir");

    int opcion = 0;
    while(true)
    {
        WSockServer MyServer(REQ_WINSOCK_VER);
        cout<<"\n\nMenu\n0. Asignar cantidad jugadores\n1. Crear jugador(n)\n2. Ver jugador(cartas en mano)\n3. Ver nombre Jugador\n4. Ver caldero (s)\n5. Jugar (recibe jugador y carta, caldero a mover)\n6. Salir\n\nDigite su eleccion: ";

        opcion = toint(MyServer.RunServer(1500,"Opcion OK"));

        switch(opcion){
            case 0:
                int numJugadores;
                cout<<"Digite la cantidad de jugadores [2-6]: ";
                //cin>>numJugadores;
                //WSockServer MyServer(REQ_WINSOCK_VER);
                numJugadores = toint(MyServer.RunServer(1500,"Opcion OK"));

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
