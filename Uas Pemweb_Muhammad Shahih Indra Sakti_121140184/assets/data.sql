CREATE TABLE Lagu (
    id_lagu INT PRIMARY KEY AUTO_INCREMENT,
    nama_lagu VARCHAR(255),
    penyanyi VARCHAR(255),
    jumlah_terjual INT,
    tanggal_rilis DATE,
    genre VARCHAR(255)
);

INSERT INTO Lagu (nama_lagu, penyanyi, jumlah_terjual, tanggal_rilis, genre) VALUES
    ('Love Story', 'Taylor Swift', 500000, '2020-01-15', 'pop'),
    ('Bohemian Rhapsody', 'Queen', 750000, '1975-10-31', 'rock'),
    ('Whats Going On', 'Marvin Gaye', 300000, '1971-05-21', 'jazz'),
    ('Shape of You', 'Ed Sheeran', 900000, '2017-01-06', 'pop'),
    ('Stairway to Heaven', 'Led Zeppelin', 700000, '1971-11-08', 'rock'),
    ('Fly Me to the Moon', 'Frank Sinatra', 400000, '1964-06-29', 'jazz'),
    ('Someone Like You', 'Adele', 600000, '2011-01-24', 'pop'),
    ('Hotel California', 'Eagles', 800000, '1976-12-08', 'rock'),
    ('Take Five', 'Dave Brubeck', 250000, '1959-09-21', 'jazz'),
    ('Dancing Queen', 'ABBA', 550000, '1976-08-15', 'pop');
