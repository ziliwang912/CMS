-- Create database
DROP DATABASE IF EXISTS farm;
CREATE DATABASE farm;
\c farm

-- Create tables
CREATE TABLE users (
    user_name TEXT NOT NULL,
    user_pwd TEXT NOT NULL,
    user_group TEXT NOT NULL
);

CREATE TABLE customers (
    cust_name TEXT NOT NULL
);

CREATE TABLE products (
    prod_name TEXT NOT NULL,
    prod_category TEXT NOT NULL,
    prod_cost MONEY NOT NULL,
	prod_price MONEY NOT NULL
);

CREATE TABLE transactions (
    trans_date DATE NOT NULL,
    cust_name TEXT NOT NULL,
    prod_name TEXT NOT NULL,
	prod_qty NUMERIC NOT NULL,
	prod_value MONEY NOT NULL
);

-- Import data
\COPY users FROM 'data/users.csv' WITH (FORMAT csv);
\COPY customers FROM 'data/customers.csv' WITH (FORMAT csv);
\COPY products FROM 'data/products.csv' WITH (FORMAT csv);
\COPY transactions FROM 'data/transactions.csv' WITH (FORMAT csv);

-- Check data
SELECT * FROM users;
SELECT * FROM customers;
SELECT * FROM products;
SELECT * FROM transactions;
