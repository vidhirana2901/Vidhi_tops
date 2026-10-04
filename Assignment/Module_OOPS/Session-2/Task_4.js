class Playlist {
    constructor(name, createdOn, isPublic) {
        this.name = name;
        this.createdOn = createdOn;
        this.isPublic = isPublic;
        this.songs = [];
    }

    addSong(songTitle) {
        this.songs.push(songTitle);
    }
}

let playlist = new Playlist(
    "My Favorite Songs",
    "2026-10-01",
    true
);

playlist.addSong("Perfect");
playlist.addSong("Believer");
playlist.addSong("Shape of You");

console.log("Playlist:", playlist.name);
console.log("Songs:");

playlist.songs.forEach((song, index) => {
    console.log((index + 1) + ". " + song);
});
