#ifndef RONDA_H
#define RONDA_H


class Ronda
{
    public:
        Ronda(Jugador* jugadores);
        virtual ~Ronda();
        void setPosMovimiento(int posMovimiento);
        void setMovimientos(DLinkedListM* movimientos);
        void setJugadoresRonda(DLinkedListJ* jugadoresRonda);
        int getPosMovimiento();
        DLinkedListM* getMovimientos();
        DLinkedListJ* getJugadores();
        void redoMovimiento();
        void undoMovimiento();

    protected:

    private:
        int posMovimiento;
        DLinkedListM* movimientos;
        DLinkedListJ* jugadoresRonda;
};

#endif // RONDA_H
