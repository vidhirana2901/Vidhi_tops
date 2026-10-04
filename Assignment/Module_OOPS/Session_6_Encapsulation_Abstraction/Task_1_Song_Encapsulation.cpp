#include <iostream>
#include <string>
using namespace std;

class Song {
private:
    string title;
    string artist;

public:
    void setTitle(string t) {
        title = t;
    }

    void setArtist(string a) {
        artist = a;
    }

    string getTitle() {
        return title;
    }

    string getArtist() {
        return artist;
    }
};

int main() {
    Song s;

    s.setTitle("Perfect");
    s.setArtist("Ed Sheeran");

    cout << "Title: " << s.getTitle() << endl;
    cout << "Artist: " << s.getArtist() << endl;

    s.setTitle("Shape of You");
    cout << "Updated Title: " << s.getTitle() << endl;

    return 0;
}
