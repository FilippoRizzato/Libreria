-- create database libri;
use libri;
CREATE TABLE IF NOT EXISTS libri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(255) NOT NULL,
    autore VARCHAR(255) NOT NULL,
    genere VARCHAR(100) NOT NULL,
    prezzo DECIMAL(10, 2) NOT NULL,
    anno YEAR NOT NULL
);

INSERT INTO libri (titolo, autore, genere, prezzo, anno) VALUES
('Il Nome della Rosa', 'Umberto Eco', 'Storico', 10.50, 1980),
('Harry Potter e la Pietra Filosofale', 'J.K. Rowling', 'Fantasy', 15.99, 1997),
('1984', 'George Orwell', 'Distopico', 9.99, 1949),
('Il Signore degli Anelli', 'J.R.R. Tolkien', 'Fantasy', 20.00, 1954);