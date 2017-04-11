#ifndef RONDA_H
#define RONDA_H

class DLinkedListJ;
class DLinkedListM;
class Jugador;

class Ronda
{
    public:
        Ronda(Jugador* jugadores);
        virtual ~Ronda();
        void setPosMovimiento(int posMovimiento);
        void setMovimientos(DLinkedListM* movimientos);
        void setJugadores(DLinkedListJ* jugadores);
        int getPosMovimiento();
        DLinkedListM* getMovimientos();
        DLinkedListJ* getJugadores();
        void redoMovimiento();
        void undoMovimiento();
        int totalNaipes();

    protected:

    private:
        int posMovimiento;
        DLinkedListM* movimientos;
        DLinkedListJ* jugadores;
        bool state;
};

#endif // RONDA_H
