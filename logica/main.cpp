
#include <iostream>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char** argv) {
	for(int i=1;i<argc;i++){
		cout<<"<div>"<<argv[i]<<"</div>"<<endl;
	}
	return 0;
}
