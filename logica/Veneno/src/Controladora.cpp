#include "Controladora.h"
#include <string>
#include <sstream>

//Constructor de la clase
Controladora::Controladora(int numJugadores)
{
    this->numJugadores = numJugadores;
    barajaOriginal = new Baraja('O');
    jugadores = new DLinkedListJ();
    bOrdenada = new ArrayList(52);
    crearBOriginal();
    bEnJuego = bOrdenada;
}

//Destructor de la clase
Controladora::~Controladora()
{

}

//Crea cada jugador y lo añade en la lista de jugadores
void Controladora::crearJugadores(string nombre)
{
    jugadores->append(new Jugador(nombre, jugadores->getSize()));
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

void Controladora::setNumJugadores(int numJugadores)
{
    this->numJugadores = numJugadores;
}

//Getters
DLinkedListJ* Controladora::getJugadores()
{
    return jugadores;
}

int Controladora::getNumJugadores()
{
    return numJugadores;
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

//Reparte las cartas a cada jugador
void Controladora::repartirCartas()
{

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
                    bOrdenada->append(new Naipe('P',"A",f,barajaOriginal));
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
                    bOrdenada->append(new Naipe('P',"A",f,barajaOriginal));
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
