#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main() {
    ifstream file("my_fav_songs.txt");
    string song;

    if (!file) {
        cout << "File not found." << endl;
        return 0;
    }

    cout << "Favorite Songs:" << endl;

    while (getline(file, song)) {
        cout << song << endl;
    }

    file.close();
    return 0;
}
