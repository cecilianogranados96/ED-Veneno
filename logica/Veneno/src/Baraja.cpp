#include "Baraja.h"
#include <string>
#include <sstream>

using namespace std;

//Constructor de la clase
Baraja::Baraja(char tipo)
{
    this->tipo = tipo;
    bOrdenada = new ArrayList(52);
    barajarOrdenada();
}

//Destructor de la clase
Baraja::~Baraja()
{
    delete baraja;
}

//Getters
char Baraja::getTipo()
{
    return tipo;
}

ArrayList* Baraja::getBaraja()
{
    return baraja;
}

ArrayList* Baraja::getBOrdenada()
{
    return bOrdenada;
}

//Setters
void Baraja::setTipo(char tipo)
{
    this->tipo = tipo;
}

void Baraja::setBaraja(ArrayList* baraja)
{
    this->baraja = baraja;
}

//Remueve el naipe en la posición que entra como parámetro
bool Baraja::removeNaipe(int pos)
{
    return false;
}

//Añade un naipe al final de la baraja
void Baraja::insertNaipe(Naipe* naipe)
{
    baraja->append(naipe);
}

//Baraja el mazo con la cantidad de cartas indicadas
void Baraja::barajar(int cantidad)
{

}

//Baraja el mazo ordenado
void Baraja::barajarOrdenada()
{
    for(int i=0; i<4;i++)
    {
        for(int j=0; j<=13;j++)
        {
            if(i==0){
                if(j==0){
                    bOrdenada->append(new Naipe('D',"A",1,this));
                }
                else{
                    if(j<=10 && j>0){
                        //Convierte el de int a string j
                        string str;
                        ostringstream temp;
                        temp<<j;
                        str=temp.str();
                        bOrdenada->append(new Naipe('D',str,j,this));
                    }
                    else
                    {
                        if(j==11)
                            bOrdenada->append(new Naipe('D',"J",j,this));
                        else
                        {
                            if(j==12)
                                bOrdenada->append(new Naipe('D',"Q",j,this));
                            else
                                bOrdenada->append(new Naipe('D',"K",j,this));
                        }
                    }
                }

            }
            if(i==1){
                if(j==0){
                    bOrdenada->append(new Naipe('P',"A",1,this));
                }
                else{
                    if(j<=10 && j>0){
                        //Convierte el de int a string j
                        string str;
                        ostringstream temp;
                        temp<<j;
                        str=temp.str();
                        bOrdenada->append(new Naipe('P',str,j,this));
                        cout<<"here2";
                    }
                    else
                    {
                        if(j==11)
                            bOrdenada->append(new Naipe('P',"J",j,this));
                        else
                        {
                            if(j==12)
                                bOrdenada->append(new Naipe('P',"Q",j,this));
                            else
                                bOrdenada->append(new Naipe('P',"K",j,this));
                        }
                    }
                }
            }
            if(i==2){
                if(j==0){
                    bOrdenada->append(new Naipe('P',"A",1,this));
                }
                else{
                    if(j<=10 && j>0){
                        //Convierte el de int a string j
                        string str;
                        ostringstream temp;
                        temp<<j;
                        str=temp.str();
                        bOrdenada->append(new Naipe('T',str,j,this));
                    }
                    else
                    {
                        if(j==11)
                            bOrdenada->append(new Naipe('T',"J",j,this));
                        else
                        {
                            if(j==12)
                                bOrdenada->append(new Naipe('T',"Q",j,this));
                            else
                                bOrdenada->append(new Naipe('T',"K",j,this));
                        }
                    }
                }
            }
            if(i==3){
                if(j==0){
                    bOrdenada->append(new Naipe('P',"A",1,this));
                }
                else{
                    if(j<=10 && j>0){
                        //Convierte el de int a string j
                        string str;
                        ostringstream temp;
                        temp<<j;
                        str=temp.str();
                        bOrdenada->append(new Naipe('C',str,j,this));
                    }
                    else
                    {
                        if(j==11)
                            bOrdenada->append(new Naipe('C',"J",j,this));
                        else
                        {
                            if(j==12)
                                bOrdenada->append(new Naipe('C',"Q",j,this));
                            else
                                bOrdenada->append(new Naipe('C',"K",j,this));
                        }
                    }
                }
            }
        }
    }
}
