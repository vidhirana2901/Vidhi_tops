class Playlist {
    constructor(name, createdOn, isPublic) {
        this.name = name;
        this.createdOn = createdOn;
        this.isPublic = isPublic;
    }
}

let playlist = new Playlist(
    "My Favorite Songs",
    "2026-10-01",
    true
);

console.log("Playlist Name:", playlist.name);
console.log("Created On:", playlist.createdOn);
console.log("Is Public:", playlist.isPublic);
