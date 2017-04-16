/*
#include <iostream>
#include "Controladora.h"
#include "Server.h"
#define REQ_WINSOCK_VER 2
#include <sstream>
#include <string>
#include <cstdlib>

class Controladora;
using namespace std;

int main(void)
{
    Controladora* controladora = new Controladora();
   // WSockServer MyServer(REQ_WINSOCK_VER);
    //MyServer.RunServer(1500,"Respuesta Inical a fuerta tiene que ir");

    int opcion = 0;
    while(true)
    {
       // WSockServer MyServer(REQ_WINSOCK_VER);
        cout<<"\n\nMenu\n\n0. Asignar cantidad jugadores\n1. Crear jugador(n)\n2. Ver jugador(cartas en mano)\n3. Ver nombre Jugador\n4. Ver caldero (s)\n5. Jugar (recibe jugador y carta, caldero a mover)\n6. Verificar ronda\n7. Ver ronda\n8. Ver jugadores actuales\n9. Ver jugadores\n10. Ver resultados\n11. Redo\n12. Undo\n13. Reset\n14. Buscar carta\n15. Ver jugador total\n\nDigite su eleccion: ";
        cin>>opcion;
        //opcion = toint(MyServer.RunServer(1500,"Opcion OK"));

        if(opcion == 0){
            int numJugadores;
            cout<<"Digite la cantidad de jugadores [2-6]: ";
            //WSockServer MyServer(REQ_WINSOCK_VER);
            //numJugadores = toint(MyServer.RunServer(1500,"Opcion OK"));
            cin>>numJugadores;
            controladora->setNumJugadores(numJugadores);
            controladora->setNumJugadoresActual(numJugadores);
        }
        if(opcion == 1)
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
        if(opcion == 2)
        {
            int jugador;
            cout<<"Digite el numero de jugador a ver: ";
            cin>>jugador;
            controladora->getRondas()->goToEnd();
            controladora->getRondas()->getCurrValue()->getJugadores()->goToPos(jugador);
            controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->print();

        }
        if(opcion == 3)
        {
            int jugador;
            cout<<"Digite el numero de jugador a ver: ";
            cin>>jugador;
            controladora->getRondas()->goToEnd();
            controladora->getRondas()->getCurrValue()->getJugadores()->goToPos(jugador);
            cout<<controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getNombre();
        }
        if(opcion == 4)
        {
            int caldero;
            cout<<"Digite el numero de caldero: ";
            cin>>caldero;
            if(caldero == 1){
                controladora->getRondas()->goToEnd();
                controladora->getRondas()->getCurrValue()->getCaldero1()->getBaraja()->print();
                cout<<"\nTipo: "<<controladora->getRondas()->getCurrValue()->getCaldero1()->getTipo();
            }
            if(caldero == 2){
                controladora->getRondas()->goToEnd();
                controladora->getRondas()->getCurrValue()->getCaldero2()->getBaraja()->print();
                cout<<"\nTipo: "<<controladora->getRondas()->getCurrValue()->getCaldero2()->getTipo();
            }
            if(caldero == 3){
                controladora->getRondas()->goToEnd();
                controladora->getRondas()->getCurrValue()->getCaldero3()->getBaraja()->print();
                cout<<"\nTipo: "<<controladora->getRondas()->getCurrValue()->getCaldero3()->getTipo();
            }

        }
        if(opcion == 5)
        {
            controladora->getRondas()->goToEnd();
            if(controladora->getRondas()->getSize() == 1 && controladora->getRondas()->getCurrValue()->getMovimientos()->getSize() == 0)
                controladora->setJugadoresActual(controladora->getJugadores());
            if(controladora->getNumJugadoresActual()>1){
                int jugador, caldero, carta;
                cout<<"Digite el numero de jugador: ";
                cin>>jugador;
                cout<<"Digite el caldero: ";
                cin>>caldero;
                cout<<"Digite la posicion de la carta: ";
                cin>>carta;
                controladora->getRondas()->getCurrValue()->getJugadores()->goToPos(jugador);
                controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->goToPos(carta);
                if(caldero == 1){
                    controladora->getRondas()->getCurrValue()->addCaldero1(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue());
                    controladora->getRondas()->getCurrValue()->getCaldero1()->getBaraja()->print();
                }
                if(caldero == 2){
                    controladora->getRondas()->getCurrValue()->addCaldero2(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue());
                    controladora->getRondas()->getCurrValue()->getCaldero2()->getBaraja()->print();
                }
                if(caldero == 3){
                    controladora->getRondas()->getCurrValue()->addCaldero3(controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->getBActual()->getValue(),controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue());
                    controladora->getRondas()->getCurrValue()->getCaldero3()->getBaraja()->print();
                }
            }
            else{
                cout<<"\n\TERMINA EL JUEGO\n\n";
            }
        }
        if(opcion == 6){
            if(controladora->getRondas()->getCurrValue()->getBEnJuego()->getSize() >= (controladora->getRondas()->getCurrValue()->getCantidad() * controladora->getRondas()->getCurrValue()->getJugadores()->getSize())){
                controladora->getRondas()->getCurrValue()->barajar();
                cout<<"\n\nBARAJA\n\n";
            }
            else{
                controladora->getRondas()->getCurrValue()->setState(false);
                controladora->crearRondas();
                cout<<"\n\NUEVA RONDA\n\n";
            }
        }
        if(opcion == 7){
            controladora->getRondas()->getSize();
            cout<<controladora->getRondas()->getSize();
        }
        if(opcion == 8){
            controladora->getRondas()->getCurrValue()->getJugadores();
            controladora->getRondas()->getCurrValue()->getJugadores()->print();
        }
        if(opcion == 9){
            controladora->getJugadores();
            controladora->getJugadores()->print();
        }
        if(opcion == 10){
            controladora->getJugadores();
        }
        if(opcion == 11){
            controladora->getRondas()->goToEnd();
            controladora->getRondas()->getCurrValue()->redoMovimiento();
        }
        if(opcion == 12){
            controladora->getRondas()->goToEnd();
            controladora->getRondas()->getCurrValue()->undoMovimiento();
        }
        if(opcion == 13){
            controladora->getRondas()->goToEnd();
            controladora->getRondas()->getCurr()->setValue(new Ronda(controladora->getJugadoresActual(), controladora->getBOrdenada()));
        }
        if(opcion == 14){
            //busca la carta
        }
        if(opcion == 15){
            int jugador;
            cout<<"Digite el numero de jugador a ver: ";
            cin>>jugador;
            controladora->getRondas()->goToEnd();
            controladora->getRondas()->getCurrValue()->getJugadores()->goToPos(jugador);
            controladora->getRondas()->getCurrValue()->getJugadores()->getCurrValue()->print();
        }
    }
}
*/




