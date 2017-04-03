#include <iostream>
#include <string>
#include <cstdlib>
#include <sstream>
#include <player.h>
#include <fstream>

using namespace std;
int toint(string val){
    stringstream geek(val);
    int x = 0;
    geek >> x;
    return x;
}
int main(int argc, char** argv) {
    string op;
    bool bandera;
    while(bandera != true)
    {
        //system("cls");
        ///////////////////////////////////////////////////////////////////////////
        if(argv[1] == 0){
            cout << "Veneno Game" <<endl;
            cout << "-----------" << endl << endl;
            cout << "\t1 Nuevo Jugador" << endl;
            cout << "\t1 Ver Jugador" << endl;
            cout << "\t2 Jugar" << endl;
            cout << "\t8 Salir" << endl << endl;
            cout << "Elije una opcion: ";
            cin>> op;
        }else{
            op = argv[1];
        }
        ///////////////////////////////////////////////////////////////////////////


        //La opcion de swich no esta para STRING'S entonces no la podemos usar
        if (op == "1"){
            string nombre;
            int numero = 0;
            //Opcion uno se reciben los argumentos puede estar contenido en el argv o por teclado validar ambos
            if(argv[1] == 0){
                //Optencion de datos por teclado
                cout << "Digite el numero de jugador: \n";
                cin>>numero;
                cout << "Digite el psudonimo del jugador: \n";
                cin>>nombre;
            }else{
                //Optencion de datos por argumentos
                numero = toint(argv[2]);
                nombre = argv[3];
            }
            cout <<numero<<endl;
            cout <<nombre<<endl;
            //Llamamos al proceso Guardar jugador
            /*player ar[6];
            ar[0].SetName("Jose");
            ar[0].SetNum(1);
            cout <<"PRIIMER JUGADOR:"<<ar[0].getName()<<endl;
            */
        }


        if (op == "2"){
				cout << "Has elejido Sumar.\n";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////
        if (op == "8" || argc != 1){
				bandera = true;
        }
        ////////////////////////////////////////////////////////////////////////////////////////////
    };
	return 0;
}
