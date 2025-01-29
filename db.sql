CREATE DATABASE library_db;

-- Selezione del database
USE library_db;

-- Creazione della tabella books
CREATE TABLE books (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       title VARCHAR(255) NOT NULL,
                       author VARCHAR(255) NOT NULL,
                       genre VARCHAR(100),
                       price DECIMAL(10, 2) NOT NULL,
                       year INT NOT NULL
);

-- Inserimento di record di esempio
INSERT INTO books (title, author, genre, price, year) VALUES
                                                          ('Il Nome della Rosa', 'Umberto Eco', 'Mistero', 15.99, 1980),
                                                          ('Cent\'Anni di Solitudine', 'Gabriel García Márquez', 'Romanzo', 12.50, 1967),
                                                          ('Orgoglio e Pregiudizio', 'Jane Austen', 'Romanzo', 9.99, 1813),
                                                          ('1984', 'George Orwell', 'Distopia', 14.00, 1949),
                                                          ('Il Signore degli Anelli', 'J.R.R. Tolkien', 'Fantasy', 25.00, 1954);
