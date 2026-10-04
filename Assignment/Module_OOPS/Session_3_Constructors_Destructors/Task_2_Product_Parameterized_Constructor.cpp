#include <iostream>
#include <string>
using namespace std;

class Product {
private:
    string productName;
    double price;
    double rating;

public:
    Product(string name, double p, double r) {
        productName = name;
        price = p;
        rating = r;
    }

    void displayInfo() {
        cout << "Product Name: " << productName << endl;
        cout << "Price: Rs. " << price << endl;
        cout << "Rating: " << rating << "/5" << endl;
    }
};

int main() {
    Product p("Wireless Headphones", 1499, 4.5);
    p.displayInfo();
    return 0;
}
