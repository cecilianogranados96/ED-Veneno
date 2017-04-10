#ifndef NAIPE_H
#define NAIPE_H
#include <iostream>

using namespace std;

class Baraja;

class Naipe
{
    public:
        Naipe(char nomenclatura, string numero, float valor, Baraja* mazo);
        virtual ~Naipe();
        char getNomenclatura();
        string getNumero();
        float getValor();
        Baraja* getMazo();
        void setNomenclatura(char nomenclatura);
        void setNumero(string numero);
        void setValor(float valor);
        void setMazo(Baraja* mazo);
        void print();

    private:
        char nomenclatura;
        string numero;
        float valor;
        Baraja* mazo;
};

#endif // NAIPE_H
