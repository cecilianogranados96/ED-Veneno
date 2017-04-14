#include "Server.h"
#include <iostream>
using namespace std;
WSockServer::WSockServer(int RequestVersion)
{
	hSocket = INVALID_SOCKET;
	ClientSocket = INVALID_SOCKET;
	if(WSAStartup(MAKEWORD(RequestVersion, 0), &wsaData) == 0)		// Check required version
	{
		if(LOBYTE(wsaData.wVersion < RequestVersion))
		{
			throw "Requested version not available.";
		}
	}
	else
		throw "Startup failed.";
}

void WSockServer::SetServerSockAddr(sockaddr_in *sockAddr, int PortNumber)
{
	sockAddr->sin_family = AF_INET;
	sockAddr->sin_port = htons(PortNumber);
	sockAddr->sin_addr.S_un.S_addr = INADDR_ANY;			// Listen on all available ip's
}


string WSockServer::RunServer(int PortNumber,string text)
{
	if((hSocket = socket(AF_INET, SOCK_STREAM, IPPROTO_TCP)) == INVALID_SOCKET)		// Create socket
		throw "Could not create socket.";
	SetServerSockAddr(&sockAddr, PortNumber);										// Fill sockAddr
	if(bind(hSocket, (sockaddr*)(&sockAddr), sizeof(sockAddr)) != 0)
		throw "Could not bind socket.";
	if(listen(hSocket, SOMAXCONN) != 0)
		throw "Could not put the socket in listening mode.";
	cout << "Server settings: " << endl;
	cout << "IP: " << inet_ntoa(sockAddr.sin_addr) << endl;
	cout << "PORT: " << ntohs(sockAddr.sin_port) << endl << endl;
	int SizeAddr = sizeof(ClientAddr);
	cout << "Waiting for clients... ";
	ClientSocket = accept(hSocket, (sockaddr*)(&ClientAddr), &SizeAddr);
	cout << "client found!" << endl;

    int BytesRec = recv(ClientSocket, Buffer, sizeof(Buffer), 0);
	cout << "Client: " << Buffer << endl;
    closesocket(hSocket);

    send2(text);

	return Buffer;
}

void WSockServer::send2(string str)
{
    char * writable = new char[str.size() + 1];
    copy(str.begin(), str.end(), writable);
    writable[str.size()] = '\0'; // don't forget the terminating 0
    send(ClientSocket, writable, str.size()+1, 1);
    cout << "ENVIADO: "<< writable  <<endl;
    delete[] writable;
}

WSockServer::~WSockServer()
{
	if(WSACleanup() != 0)
		throw "Cleanup failed.";
	if(hSocket != INVALID_SOCKET)
		closesocket(hSocket);
	if(ClientSocket != INVALID_SOCKET)
		closesocket(hSocket);
}
