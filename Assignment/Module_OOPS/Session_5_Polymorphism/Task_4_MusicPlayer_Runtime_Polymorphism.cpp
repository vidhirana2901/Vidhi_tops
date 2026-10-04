#include <iostream>
#include <string>
using namespace std;

class MusicPlayer {
public:
    virtual void play(string song) {
        cout << "Playing: " << song << endl;
    }

    virtual ~MusicPlayer() {}
};

class SpotifyPlayer : public MusicPlayer {
public:
    void play(string song) override {
        cout << "Streaming on Spotify: " << song << endl;
    }
};

int main() {
    MusicPlayer *player = new SpotifyPlayer();

    player->play("Perfect");

    delete player;
    return 0;
}
