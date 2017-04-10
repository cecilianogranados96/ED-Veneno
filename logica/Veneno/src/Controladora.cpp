#include "Controladora.h"
#include "ArrayListN.h"
#include "ArrayList.h"
#include <string>
#include <sstream>
#include <cstdlib>
#include <time.h>

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
    switch(numJugadores){
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
    int max = cantidad * numJugadores;
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
    for(int i=0;i<numJugadores;i++){
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

    for(int i=0;i<max-1;i++){
        posiciones->goToPos(i);
        bEnJuego->goToPos(posiciones->getValue());
        bEnJuego->remove();
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
