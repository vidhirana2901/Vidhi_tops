#include <iostream>
#include <string>
using namespace std;

class ProductSearch {
public:
    void searchProduct(string productName) {
        cout << "Searching for product: " << productName << endl;
    }

    void searchProduct(string productName, string category) {
        cout << "Searching for product: " << productName
             << " in category: " << category << endl;
    }
};

int main() {
    ProductSearch search;

    search.searchProduct("iPhone 15");
    search.searchProduct("Laptop", "Electronics");

    return 0;
}
