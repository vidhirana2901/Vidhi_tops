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

class Podcaster : public SocialMediaUser {
private:
    string podcastName;

public:
    Podcaster(string u, int f, string p) : SocialMediaUser(u, f) {
        podcastName = p;
    }

    void publishEpisode(string episodeTitle) {
        cout << "Episode " << episodeTitle
             << " published on " << podcastName << endl;
    }
};

int main() {
    Podcaster p("vidhi", 3000, "Tech Talks");
    p.displayProfile();
    p.publishEpisode("Episode 1: OOP Basics");
    return 0;
}
