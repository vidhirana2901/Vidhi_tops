#include <iostream>
#include <string>
using namespace std;

class Movie {
private:
    string title;
    string director;
    double rating;

public:
    Movie(string t, string d, double r) {
        title = t;
        director = d;
        rating = r;
    }

    // Copy constructor
    Movie(const Movie &m) {
        title = m.title;
        director = m.director;
        rating = m.rating;
    }

    void display() {
        cout << "Movie: " << title << endl;
        cout << "Director: " << director << endl;
        cout << "Rating: " << rating << "/5" << endl;
    }
};

int main() {
    Movie original("3 Idiots", "Rajkumar Hirani", 4.8);
    Movie copied(original);

    cout << "Original Movie:" << endl;
    original.display();

    cout << "\nCopied Movie:" << endl;
    copied.display();

    return 0;
}
