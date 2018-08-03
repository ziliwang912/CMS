-- Create database
DROP DATABASE IF EXISTS produce;
CREATE DATABASE produce;
\c produce

-- Create tables
CREATE TABLE prices (
    name TEXT NOT NULL,
    price MONEY NOT NULL,
    unit TEXT NOT NULL,
    organic TEXT NOT NULL
);

-- Import data
\COPY prices FROM './prices.csv' WITH (FORMAT csv);

ALTER TABLE prices ADD COLUMN produce_id SERIAL PRIMARY KEY;

-- Check data
SELECT * FROM prices LIMIT 10;
