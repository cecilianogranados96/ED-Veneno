#include <iostream>
#include "Server.h"
using namespace std;
#define REQ_WINSOCK_VER 2
int main()
{
    WSockServer MyServer(REQ_WINSOCK_VER);
    MyServer.RunServer(1500,"respuesta");
	while(true){
        WSockServer MyServer(REQ_WINSOCK_VER);
        //recibe datos y retorna lo que se le envia
       // MyServer.RunServer(1500,"respuesta");
        cout<<"RES MAIN:"<<MyServer.RunServer(1500,"respuesta");
        //envia
	}
	return 0;
}
