#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main() {
    ofstream outFile("wishlist.txt");

    string product;
    double price;

    for (int i = 1; i <= 3; i++) {
        cout << "Enter product " << i << " name: ";
        getline(cin, product);

        cout << "Enter price: ";
        cin >> price;
        cin.ignore();

        outFile << product << "|" << price << endl;
    }

    outFile.close();

    ifstream inFile("wishlist.txt");

    cout << "\nWishlist:" << endl;

    while (getline(inFile, product, '|')) {
        inFile >> price;
        inFile.ignore();

        cout << "Product: " << product
             << " | Price: Rs. " << price << endl;
    }

    inFile.close();
    return 0;
}
