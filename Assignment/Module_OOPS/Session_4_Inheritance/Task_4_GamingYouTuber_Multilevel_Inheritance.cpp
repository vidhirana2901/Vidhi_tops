#include <iostream>
#include <string>
using namespace std;

class SocialMediaUser {
protected:
    string username;
    int followers;

public:
    SocialMediaUser(string u, int f) {
        username = u;
        followers = f;
    }

    void displayProfile() {
        cout << "Username: " << username << endl;
        cout << "Followers: " << followers << endl;
    }
};

class YouTuber : public SocialMediaUser {
protected:
    string channelName;

public:
    YouTuber(string u, int f, string c) : SocialMediaUser(u, f) {
        channelName = c;
    }

    void uploadVideo(string title) {
        cout << "Video " << title << " uploaded to " << channelName << endl;
    }
};

class GamingYouTuber : public YouTuber {
public:
    GamingYouTuber(string u, int f, string c) : YouTuber(u, f, c) {}

    void streamGame(string gameName) {
        cout << username << " is now streaming "
             << gameName << " on " << channelName << endl;
    }
};

int main() {
    GamingYouTuber g("vidhi", 8000, "Vidhi Gaming");
    g.displayProfile();
    g.uploadVideo("Minecraft Tips");
    g.streamGame("Minecraft");
    return 0;
}
