#include <iostream>
using namespace std;

class Ticket {
public:
    Ticket() {
        cout << "Ticket booked successfully." << endl;
    }

    ~Ticket() {
        cout << "Saving your ticket..." << endl;
    }
};

int main() {
    Ticket *t = new Ticket();

    cout << "Ticket is active." << endl;

    delete t;  // Destructor is called here.

    cout << "Ticket object deleted." << endl;
    return 0;
}
