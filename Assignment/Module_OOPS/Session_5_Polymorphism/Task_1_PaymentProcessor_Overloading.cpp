#include <iostream>
#include <string>
using namespace std;

class PaymentProcessor {
public:
    void processPayment(double amount) {
        cout << "processPayment(amount) called." << endl;
        cout << "Final Amount: Rs. " << amount << endl;
    }

    void processPayment(double amount, string coupon) {
        double discount = 100;
        double finalAmount = amount - discount;

        cout << "processPayment(amount, coupon) called." << endl;
        cout << "Coupon: " << coupon << endl;
        cout << "Final Amount: Rs. " << finalAmount << endl;
    }
};

int main() {
    PaymentProcessor p;

    p.processPayment(1500);
    cout << endl;
    p.processPayment(1500, "SAVE100");

    return 0;
}
