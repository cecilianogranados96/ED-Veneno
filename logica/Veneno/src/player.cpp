#include <iostream>
using namespace std;
#include "player.h"

player::player(int number,string name1)
{
    num = number;
    name = name1;
}
int player::getNum(){
    return num;
}
string player::getName(){
    return name;
}

void player::SetNum(int number){
    num = number;
}
void player::SetName(string name1){
    name = name1;
}


player::~player()
{

}
