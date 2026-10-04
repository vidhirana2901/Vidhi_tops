#include <iostream>
#include <fstream>
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

    ~Playlist() {
        ofstream file("autosave.txt");
        file << playlistName;
        file.close();
        cout << "Playlist saved automatically to autosave.txt" << endl;
    }

    void display() {
        cout << "Playlist Name: " << playlistName << endl;
    }
};

int main() {
    Playlist p;
    p.display();

    cout << "Program is ending..." << endl;
    return 0; // Destructor is called automatically.
}
