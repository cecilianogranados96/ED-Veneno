#include "Naipe.h"
#include <iostream>

using namespace std;

//Constructor clase Naipe, asigna los valores iniciales de naipe
Naipe::Naipe(char nomenclatura, string numero, float valor, Baraja* mazo)
{
    this->nomenclatura = nomenclatura;
    this->numero = numero;
    this->valor = valor;
    this->mazo = mazo;
}

//Destructor de la clase
Naipe::~Naipe()
{
    delete mazo;
}

//Getters
char Naipe::getNomenclatura()
{
    return nomenclatura;
}

string Naipe::getNumero()
{
    return numero;
}

float Naipe::getValor()
{
    return valor;
}

Baraja* Naipe::getMazo()
{
    return mazo;
}

//Setters
void Naipe::setNomenclatura(char nomenclatura)
{
    this->nomenclatura = nomenclatura;
}

void Naipe::setNumero(string numero)
{
    this->numero = numero;
}

void Naipe::setValor(float valor)
{
    this->valor = valor;
}

void Naipe::setMazo(Baraja* mazo)
{
    this->mazo = mazo;
}

void Naipe::print()
{
    cout<<"\nNomenclatura: "<<nomenclatura<<", Numero: "<<numero<<", Valor: "<<valor;//<<", Tipo de mazo: "<<mazo->getTipo();
}

