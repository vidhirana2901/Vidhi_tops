#include <iostream>
#include <fstream>
using namespace std;

int main() {
    ofstream file("my_fav_songs.txt");

    file << "Perfect" << endl;
    file << "Shape of You" << endl;
    file << "Believer" << endl;
    file << "Until I Found You" << endl;
    file << "Faded" << endl;

    file.close();

    cout << "5 favorite songs saved successfully." << endl;
    return 0;
}
