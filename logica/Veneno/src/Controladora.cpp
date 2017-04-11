#include "Controladora.h"
#include "ArrayListN.h"
#include "ArrayList.h"
#include <string>
#include <sstream>
#include <cstdlib>
#include <time.h>
#include <iostream>

using namespace std;

//Constructor de la clase
Controladora::Controladora(int numJugadores)
{
    this->numJugadores = numJugadores;
    barajaOriginal = new Baraja('O', 52);
    jugadores = new DLinkedListJ();
    bOrdenada = new ArrayList(52);
    bCaldero1 = new Baraja('V', 15);
    bCaldero2 = new Baraja('V', 15);
    bCaldero3 = new Baraja('V', 15);
    rondas = new DLinkedListR();
    crearBOriginal();
    bEnJuego = bOrdenada;
    numJugadoresActual = numJugadores;

}

//Destructor de la clase
Controladora::~Controladora()
{
    delete jugadores;
    delete jugadoresActual;
    delete bOrdenada;
    delete barajaOriginal;
    delete bCaldero1;
    delete bCaldero2;
    delete bCaldero3;
}

//Crea cada jugador y lo añade en la lista de jugadores
void Controladora::crearJugadores(string nombre)
{
    jugadores->append(new Jugador(nombre, jugadores->getSize()));
}

//Borra el jugador de la lista de jugadores actuales
void Controladora::borrarJugadores(Jugador* jugador)
{
    for(int i = 0; i<jugadoresActual->getSize(); i++){
        jugadoresActual->goToPos(i);
        if(jugador->getId() == jugadoresActual->getCurrValue()->getId()){
            if(i == 0)
                jugadoresActual->goToStart();
            else
                jugadoresActual->goToPos(i-1);
            jugadoresActual->remove();
        }
    }
    numJugadoresActual--;
}

//Setters
void Controladora::setBEnJuego(ArrayList* bEnJuego)
{
    this->bEnJuego = bEnJuego;
}

void Controladora::setJugadores(DLinkedListJ* jugadores)
{
    this->jugadores = jugadores;
}

void Controladora::setJugadoresActual(DLinkedListJ* jugadoresActual)
{
    this->jugadoresActual = jugadoresActual;
}

void Controladora::setNumJugadores(int numJugadores)
{
    this->numJugadores = numJugadores;
}

void Controladora::setNumJugadoresActual(int numJugadoresActual)
{
    this->numJugadoresActual = numJugadoresActual;
}

void Controladora::setRondas(DLinkedListR* rondas)
{
    this->rondas = rondas;
}
//Getters
DLinkedListJ* Controladora::getJugadores()
{
    return jugadores;
}

DLinkedListJ* Controladora::getJugadoresActual()
{
    return jugadoresActual;
}

int Controladora::getNumJugadores()
{
    return numJugadores;
}

int Controladora::getNumJugadoresActual()
{
    return numJugadoresActual;
}

ArrayList* Controladora::getBEnJuego()
{
    return bEnJuego;
}

ArrayList* Controladora::getBOrdenada()
{
    return bOrdenada;
}

Baraja* Controladora::getBarajaOriginal()
{
    return barajaOriginal;
}

Baraja* Controladora::getCaldero1()
{
    return bCaldero1;
}

Baraja* Controladora::getCaldero2()
{
    return bCaldero2;
}

Baraja* Controladora::getCaldero3()
{
    return bCaldero3;
}

DLinkedListR* Controladora::getRondas()
{
    return rondas;
}
//Añade naipes al caldero
bool Controladora::addCaldero1(Naipe* naipe, Jugador* jugador)
{
    if(naipe->getNomenclatura() != 'C'){
        if(bCaldero1->getTipo() == 'V'){
            if(bCaldero2->getTipo() != naipe->getNomenclatura() && bCaldero3->getTipo() != naipe->getNomenclatura()){
                bCaldero1->getBaraja()->append(naipe);
                bCaldero1->setTipo(naipe->getNomenclatura());
                jugador->getBActual()->removeElement(naipe);
                validarTotal(bCaldero1, jugador);
                return true;
            }
        }
        else{
            if(bCaldero1->getTipo() == naipe->getNomenclatura()){
                bCaldero1->getBaraja()->append(naipe);
                bCaldero1->setTipo(naipe->getNomenclatura());
                jugador->getBActual()->removeElement(naipe);
                validarTotal(bCaldero1, jugador);
                return true;
            }
        }
        return false;
    }
    else{
        if(bCaldero1->getTipo() != 'V'){
            bCaldero1->getBaraja()->append(naipe);
            jugador->getBActual()->removeElement(naipe);
            validarTotal(bCaldero1, jugador);
            return true;
        }
    }
}

//Añade naipes al caldero
bool Controladora::addCaldero2(Naipe* naipe, Jugador* jugador)
{
    if(naipe->getNomenclatura() != 'C'){
        if(bCaldero2->getTipo() == 'V'){
            if(bCaldero1->getTipo() != naipe->getNomenclatura() && bCaldero3->getTipo() != naipe->getNomenclatura()){
                bCaldero2->getBaraja()->append(naipe);
                bCaldero2->setTipo(naipe->getNomenclatura());
                jugador->getBActual()->removeElement(naipe);
                validarTotal(bCaldero2, jugador);
                return true;
            }
        }
        else{
            if(bCaldero2->getTipo() == naipe->getNomenclatura()){
                bCaldero2->getBaraja()->append(naipe);
                bCaldero2->setTipo(naipe->getNomenclatura());
                jugador->getBActual()->removeElement(naipe);
                validarTotal(bCaldero2, jugador);
                return true;
            }
        }
        return false;
    }
    else{
        if(bCaldero2->getTipo() != 'V'){
            bCaldero2->getBaraja()->append(naipe);
            jugador->getBActual()->removeElement(naipe);
            validarTotal(bCaldero2, jugador);
            return true;
        }
    }
}

//Añade naipes al caldero
bool Controladora::addCaldero3(Naipe* naipe, Jugador* jugador)
{
    if(naipe->getNomenclatura() != 'C'){
        if(bCaldero3->getTipo() == 'V'){
            if(bCaldero2->getTipo() != naipe->getNomenclatura() && bCaldero1->getTipo() != naipe->getNomenclatura()){
                bCaldero3->getBaraja()->append(naipe);
                bCaldero3->setTipo(naipe->getNomenclatura());
                jugador->getBActual()->removeElement(naipe);
                validarTotal(bCaldero3, jugador);
                return true;
            }
        }
        else{
            if(bCaldero3->getTipo() == naipe->getNomenclatura()){
                bCaldero3->getBaraja()->append(naipe);
                bCaldero3->setTipo(naipe->getNomenclatura());
                jugador->getBActual()->removeElement(naipe);
                validarTotal(bCaldero3, jugador);
                return true;
            }
        }
        return false;
    }
    else{
        if(bCaldero3->getTipo() != 'V'){
            bCaldero3->getBaraja()->append(naipe);
            jugador->getBActual()->removeElement(naipe);
            validarTotal(bCaldero3, jugador);
            return true;
        }
    }
}

//Verifica si el valor total del caldero es menor que 13, si es así retorna true, sino el jugador se come las cartas
bool Controladora::validarTotal(Baraja* bCaldero, Jugador* jugador)
{
    cout<<"BARAJA TOTAL: "<<bCaldero->totalBaraja();
    if(bCaldero->totalBaraja() >= 13)
    {
        for(int i=0; i<bCaldero->getBaraja()->getSize(); i++){
            bCaldero->getBaraja()->goToPos(i);
            jugador->getBComidas()->append(bCaldero->getBaraja()->getValue());
            if(bCaldero->getBaraja()->getValue()->getNomenclatura() == 'C')
                jugador->getBVenenos()->append(bCaldero->getBaraja()->getValue());
        }
        bCaldero1 = new Baraja('V', 15);
        return false;
    }
    return true;
}

//Reparte las cartas a cada jugador
void Controladora::repartirCartas()
{
    switch(numJugadoresActual){
        case 2:
            barajar(7);
            break;
        case 3:
              barajar(6);
              break;
        case 4:
            barajar(5);
              break;
        case 5:
              barajar(4);
              break;
        case 6:
              barajar(3);
              break;
    }
}

//Baraja el mazo con la cantidad de cartas indicadas
void Controladora::barajar(int cantidad)
{
    int max = cantidad * numJugadoresActual;
    ArrayListN* posiciones = new ArrayListN(max);

    srand(time(NULL));

    //Crea posiciones aleatorias y verifica que no existan en el arreglo
    for (int i=0;i<max;i++)
    {
        bool check;
        int n;
        do
        {
            n = rand()%(bEnJuego->getSize()-1);
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
    for(int i=0;i<numJugadoresActual;i++){
        ArrayList* temp = new ArrayList(52);
        jugadoresActual->goToPos(i);
        for(int j=sumInicio;j<sumCantidad;j++){
            posiciones->goToPos(j);
            bEnJuego->goToPos(posiciones->getValue());
            temp->append(bEnJuego->getValue());

        }
        sumCantidad = sumCantidad + cantidad;
        sumInicio = sumInicio + cantidad;
        jugadoresActual->getCurrValue()->setBActual(temp);
    }

    //Elimmina los naipes repartidos del mazo en juego
    for(int i=0;i<numJugadoresActual;i++){
        jugadoresActual->goToPos(i);
        for(int j=0;j<cantidad;j++){
            jugadoresActual->getCurrValue()->getBActual()->goToPos(j);
            bEnJuego->removeElement(jugadoresActual->getCurrValue()->getBActual()->getValue());
        }
    }
}

//Asigna los nuevos valores de los jugadores actuales, en la lista de jugadores
void Controladora::unirJugadores()
{
    for(int i = 0; i<jugadoresActual->getSize(); i++){
        jugadoresActual->goToPos(i);
        for(int j = 0; j<jugadores->getSize(); j++){
            jugadores->goToPos(j);
            if(jugadores->getCurrValue()->getId() == jugadoresActual->getCurrValue()->getId())
                jugadores->getCurr()->setValue(jugadoresActual->getCurrValue());

        }
    }
}

//Crea la baraja original ordenada
void Controladora::crearBOriginal()
{
    float f;

    for(int i=0; i<4;i++)
    {
        for(int j=1; j<=13;j++)
        {
            f = (float)j;
            if(i==0){
                if(j==1){
                    bOrdenada->append(new Naipe('D',"A",f,barajaOriginal));
                }
                else{
                    if(j<=10 && j>0){
                        //Convierte el de int a string j
                        string str;
                        ostringstream temp;
                        temp<<j;
                        str=temp.str();
                        bOrdenada->append(new Naipe('D',str,f,barajaOriginal));
                    }
                    else
                    {
                        if(j==11)
                            bOrdenada->append(new Naipe('D',"J",0.5,barajaOriginal));
                        else
                        {
                            if(j==12)
                                bOrdenada->append(new Naipe('D',"Q",0.5,barajaOriginal));
                            else
                                bOrdenada->append(new Naipe('D',"K",0.5,barajaOriginal));
                        }
                    }
                }
            }
            if(i==1){
                if(j==1){
                    bOrdenada->append(new Naipe('P',"A",f,barajaOriginal));
                }
                else{
                    if(j<=10 && j>0){
                        //Convierte el de int a string j
                        string str;
                        ostringstream temp;
                        temp<<j;
                        str=temp.str();
                        bOrdenada->append(new Naipe('P',str,f,barajaOriginal));
                    }
                    else
                    {
                        if(j==11)
                            bOrdenada->append(new Naipe('P',"J",0.5,barajaOriginal));
                        else
                        {
                            if(j==12)
                                bOrdenada->append(new Naipe('P',"Q",0.5,barajaOriginal));
                            else
                                bOrdenada->append(new Naipe('P',"K",0.5,barajaOriginal));
                        }
                    }
                }
            }
            if(i==2){
                if(j==1){
                    bOrdenada->append(new Naipe('T',"A",f,barajaOriginal));
                }
                else{
                    if(j<=10 && j>0){
                        //Convierte el de int a string j
                        string str;
                        ostringstream temp;
                        temp<<j;
                        str=temp.str();
                        bOrdenada->append(new Naipe('T',str,f,barajaOriginal));
                    }
                    else
                    {
                        if(j==11)
                            bOrdenada->append(new Naipe('T',"J",0.5,barajaOriginal));
                        else
                        {
                            if(j==12)
                                bOrdenada->append(new Naipe('T',"Q",0.5,barajaOriginal));
                            else
                                bOrdenada->append(new Naipe('T',"K",0.5,barajaOriginal));
                        }
                    }
                }
            }
            if(i==3){
                if(j==1){
                    bOrdenada->append(new Naipe('C',"A",f,barajaOriginal));
                }
                else{
                    if(j<=10 && j>0){
                        //Convierte el de int a string j
                        string str;
                        ostringstream temp;
                        temp<<j;
                        str=temp.str();
                        bOrdenada->append(new Naipe('C',str,f,barajaOriginal));
                    }
                    else
                    {
                        if(j==11)
                            bOrdenada->append(new Naipe('C',"J",0.5,barajaOriginal));
                        else
                        {
                            if(j==12)
                                bOrdenada->append(new Naipe('C',"Q",0.5,barajaOriginal));
                            else
                                bOrdenada->append(new Naipe('C',"K",0.5,barajaOriginal));
                        }
                    }
                }
            }
        }
    }
    barajaOriginal->setBaraja(bOrdenada);
}
