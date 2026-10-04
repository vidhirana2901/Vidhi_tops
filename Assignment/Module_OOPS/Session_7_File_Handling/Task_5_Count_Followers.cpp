#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main() {
    ifstream file("insta_followers.txt");
    string username;
    int count = 0;

    if (!file) {
        cout << "insta_followers.txt not found." << endl;
        return 0;
    }

    while (getline(file, username)) {
        if (!username.empty()) {
            count++;
        }
    }

    file.close();

    cout << "Total followers listed: " << count << endl;

    return 0;
}
