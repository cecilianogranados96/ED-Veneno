#include "Ronda.h"
#include "Baraja.h"
#include "ArrayListN.h"
#include <string>
#include <sstream>
#include <cstdlib>
#include <time.h>
#include <iostream>

//Constructor de la clase
Ronda::Ronda(DLinkedListJ* jugadores, ArrayList* bOrdenada)
{
    this->jugadores = jugadores;
    bCaldero1 = new Baraja('V', 15);
    bCaldero2 = new Baraja('V', 15);
    bCaldero3 = new Baraja('V', 15);
    bEnJuego = bOrdenada;
    state = true;
    setCantidad();
}

//Destructor de la clase
Ronda::~Ronda()
{
    delete jugadores;
    delete bCaldero1;
    delete bCaldero2;
    delete bCaldero3;
    delete bEnJuego;
}

//Setters
void Ronda::setPosMovimiento(int posMovimiento)
{
    this->posMovimiento = posMovimiento;
}

void Ronda::setMovimientos(DLinkedListM* movimientos)
{
    this->movimientos = movimientos;
}

void Ronda::setJugadores(DLinkedListJ* jugadores)
{
    this->jugadores = jugadores;
}

void Ronda::setState(bool state)
{
    this->state = state;
}

void Ronda::setCantidad()
{
    switch(jugadores->getSize()){
        case 2:
            cantidad = 7;
            break;
        case 3:
            cantidad = 6;
            break;
        case 4:
            cantidad = 5;
            break;
        case 5:
            cantidad = 4;
            break;
        case 6:
            cantidad = 3;
            break;
    }
}

void Ronda::setBEnJuego(ArrayList* bEnJuego)
{
    this->bEnJuego = bEnJuego;
}

//Getters
int Ronda::getPosMovimiento()
{
    return posMovimiento;
}

int Ronda::getCantidad()
{
    return cantidad;
}

DLinkedListM* Ronda::getMovimientos()
{
    return movimientos;
}

DLinkedListJ* Ronda::getJugadores()
{
    return jugadores;
}

bool Ronda::getState()
{
    return state;
}

ArrayList* Ronda::getBEnJuego()
{
    return bEnJuego;
}

Baraja* Ronda::getCaldero1()
{
    return bCaldero1;
}

Baraja* Ronda::getCaldero2()
{
    return bCaldero2;
}

Baraja* Ronda::getCaldero3()
{
    return bCaldero3;
}

//Añade naipes al caldero
bool Ronda::addCaldero1(Naipe* naipe, Jugador* jugador)
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
bool Ronda::addCaldero2(Naipe* naipe, Jugador* jugador)
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
bool Ronda::addCaldero3(Naipe* naipe, Jugador* jugador)
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
bool Ronda::validarTotal(Baraja* bCaldero, Jugador* jugador)
{
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

//Baraja el mazo con la cantidad de cartas indicadas
void Ronda::barajar()
{
    int max = cantidad * jugadores->getSize();
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
    for(int i=0;i<jugadores->getSize();i++){
        ArrayList* temp = new ArrayList(52);
        jugadores->goToPos(i);
        for(int j=sumInicio;j<sumCantidad;j++){
            posiciones->goToPos(j);
            bEnJuego->goToPos(posiciones->getValue());
            temp->append(bEnJuego->getValue());

        }
        sumCantidad = sumCantidad + cantidad;
        sumInicio = sumInicio + cantidad;
        jugadores->getCurrValue()->setBActual(temp);
    }

    //Elimmina los naipes repartidos del mazo en juego
    for(int i=0;i<jugadores->getSize();i++){
        jugadores->goToPos(i);
        for(int j=0;j<cantidad;j++){
            jugadores->getCurrValue()->getBActual()->goToPos(j);
            bEnJuego->removeElement(jugadores->getCurrValue()->getBActual()->getValue());
        }
    }
}

//Devuelve el total de cartas en las manos de los jugadores
int Ronda::totalNaipes()
{
    int total;
    for(int i=0; i<jugadores->getSize(); i++){
        jugadores->goToPos(i);
        total = total + jugadores->getCurrValue()->getBActual()->getSize();
    }
}

//Devuelve al movimiento anterior
void Ronda::redoMovimiento()
{

}

//Vuelve al movimiento siguiente
void Ronda::undoMovimiento()
{

}

