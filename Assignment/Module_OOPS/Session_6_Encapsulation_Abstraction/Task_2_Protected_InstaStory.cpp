#include <iostream>
using namespace std;

class InstaStory {
protected:
    int storyViews;

public:
    InstaStory(int views) {
        storyViews = views;
    }
};

class SponsoredStory : public InstaStory {
public:
    SponsoredStory(int views) : InstaStory(views) {}

    void displayViews() {
        cout << "Story Views: " << storyViews << endl;
    }
};

int main() {
    SponsoredStory story(2500);
    story.displayViews();

    return 0;
}
