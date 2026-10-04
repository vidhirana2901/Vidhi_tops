#include <iostream>
#include <string>
using namespace std;

class Playlist {
private:
    string playlistName;

public:
    Playlist() {
        playlistName = "My Favourites";
        cout << "Welcome to your playlist!" << endl;
    }

    void display() {
        cout << "Playlist Name: " << playlistName << endl;
    }
};

int main() {
    Playlist p;
    p.display();
    return 0;
}
