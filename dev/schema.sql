CREATE TABLE
    users (
        id SERIAL PRIMARY KEY,
        login VARCHAR(50) NOT NULL,
        password_hash VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL,
        name VARCHAR(100) NOT NULL,
        surname VARCHAR(100) NOT NULL,
        permissions VARCHAR(11) NOT NULL
    );

CREATE TABLE
    rooms (id SERIAL PRIMARY KEY, name VARCHAR(50) NOT NULL);

INSERT INTO
    users (
        login,
        password_hash,
        email,
        name,
        surname,
        permissions
    )
VALUES
    (
        'admin',
        '$2y$10$178u1dSikv0KDZhjlcGNAuQe9M7cOyk7SEGlgwSziWwYmdZwjeMm6',
        'admin@admins.com',
        'Johnald',
        'Regump',
        'ADMIN'
    );