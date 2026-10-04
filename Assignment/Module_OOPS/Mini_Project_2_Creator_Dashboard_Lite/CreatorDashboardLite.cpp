#include <iostream>
#include <fstream>
#include <sstream>
#include <vector>
#include <string>
using namespace std;

class Content {
public:
    string title;
    string platform;
    int views;
    string status;

    Content() {}

    Content(string t, string p, int v, string s) {
        title = t;
        platform = p;
        views = v;
        status = s;
    }

    void display() {
        cout << "Title: " << title << endl;
        cout << "Platform: " << platform << endl;
        cout << "Views: " << views << endl;
        cout << "Status: " << status << endl;
    }
};

const string FILE_NAME = "content_list.txt";

void saveAll(const vector<Content>& items) {
    ofstream file(FILE_NAME);

    for (const Content& c : items) {
        file << c.title << "|" << c.platform << "|"
             << c.views << "|" << c.status << endl;
    }

    file.close();
}

vector<Content> loadAll() {
    vector<Content> items;
    ifstream file(FILE_NAME);
    string line;

    while (getline(file, line)) {
        string title, platform, viewsText, status;
        stringstream ss(line);

        getline(ss, title, '|');
        getline(ss, platform, '|');
        getline(ss, viewsText, '|');
        getline(ss, status);

        if (!title.empty()) {
            items.push_back(Content(title, platform, stoi(viewsText), status));
        }
    }

    file.close();
    return items;
}

void displayList(const vector<Content>& items) {
    if (items.empty()) {
        cout << "No content ideas found." << endl;
        return;
    }

    for (int i = 0; i < (int)items.size(); i++) {
        cout << "\n" << i + 1 << ". "
             << items[i].title << " - "
             << items[i].platform << endl;
    }
}

void addContent() {
    string title, platform, status;
    int views;

    cout << "Enter content title: ";
    getline(cin >> ws, title);

    cout << "Enter platform: ";
    getline(cin, platform);

    cout << "Enter views: ";
    cin >> views;

    cout << "Enter status: ";
    getline(cin >> ws, status);

    ofstream file(FILE_NAME, ios::app);
    file << title << "|" << platform << "|"
         << views << "|" << status << endl;
    file.close();

    cout << "Content added successfully." << endl;
}

void updateStatus() {
    vector<Content> items = loadAll();

    displayList(items);

    if (items.empty()) return;

    int number;
    string newStatus;

    cout << "\nEnter content number to update: ";
    cin >> number;

    if (number < 1 || number > (int)items.size()) {
        cout << "Invalid number." << endl;
        return;
    }

    cout << "Enter new status: ";
    getline(cin >> ws, newStatus);

    items[number - 1].status = newStatus;
    saveAll(items);

    cout << "Status updated successfully." << endl;
}

void deleteContent() {
    vector<Content> items = loadAll();

    displayList(items);

    if (items.empty()) return;

    int number;

    cout << "\nEnter content number to delete: ";
    cin >> number;

    if (number < 1 || number > (int)items.size()) {
        cout << "Invalid number." << endl;
        return;
    }

    items.erase(items.begin() + number - 1);
    saveAll(items);

    cout << "Content deleted successfully." << endl;
    cout << "\nUpdated List:" << endl;
    displayList(items);
}

int main() {
    int choice;

    do {
        cout << "\n===== Creator Dashboard Lite =====" << endl;
        cout << "1. Add Content" << endl;
        cout << "2. View Content" << endl;
        cout << "3. Update Status" << endl;
        cout << "4. Delete Content" << endl;
        cout << "5. Exit" << endl;
        cout << "Enter your choice: ";
        cin >> choice;

        switch (choice) {
        case 1:
            addContent();
            break;

        case 2: {
            vector<Content> items = loadAll();
            displayList(items);
            break;
        }

        case 3:
            updateStatus();
            break;

        case 4:
            deleteContent();
            break;

        case 5:
            cout << "Thank you for using Creator Dashboard Lite." << endl;
            break;

        default:
            cout << "Invalid choice." << endl;
        }

    } while (choice != 5);

    return 0;
}
