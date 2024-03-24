CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    login VARCHAR(50) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    permissions INTEGER NOT NULL
);

CREATE TABLE rooms (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);