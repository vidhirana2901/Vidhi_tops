#include <iostream>
using namespace std;

class SocialMediaUploader {
public:
    virtual void uploadContent() {
        cout << "Uploading content to social media." << endl;
    }

    virtual ~SocialMediaUploader() {}
};

class InstagramUploader : public SocialMediaUploader {
public:
    void uploadContent() override {
        cout << "Uploading photo/reel to Instagram." << endl;
    }
};

class YouTubeUploader : public SocialMediaUploader {
public:
    void uploadContent() override {
        cout << "Uploading video to YouTube." << endl;
    }
};

int main() {
    SocialMediaUploader *uploader;

    InstagramUploader instagram;
    YouTubeUploader youtube;

    uploader = &instagram;
    uploader->uploadContent();

    uploader = &youtube;
    uploader->uploadContent();

    return 0;
}
