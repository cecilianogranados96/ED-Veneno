#ifndef PLAYER_H
#define PLAYER_H
#include <iostream>
using namespace std;

class player
{
    public:
        player();
        player(int num,string name);
        virtual ~player();
        int getNum();
        string getName();
        void SetNum(int number);
        void SetName(string name1);
    private:
        int num;
        string name;
};

#endif // PLAYER_H
