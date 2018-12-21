--
-- PostgreSQL database dump
--

-- Dumped from database version 10.6 (Debian 10.6-1.pgdg90+1)
-- Dumped by pg_dump version 10.6 (Debian 10.6-1.pgdg90+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: customers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customers (
    cust_name text NOT NULL
);


ALTER TABLE public.customers OWNER TO postgres;

--
-- Name: products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products (
    prod_name text NOT NULL,
    prod_category text NOT NULL,
    prod_cost numeric(5,2) NOT NULL,
    prod_price numeric(5,2) NOT NULL
);


ALTER TABLE public.products OWNER TO postgres;

--
-- Name: transactions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transactions (
    trans_date date NOT NULL,
    cust_name text NOT NULL,
    prod_name text NOT NULL,
    prod_qty numeric(5,2) NOT NULL,
    prod_value numeric(5,2) NOT NULL
);


ALTER TABLE public.transactions OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    user_name text NOT NULL,
    user_pwd text NOT NULL,
    user_group text NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Data for Name: customers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customers (cust_name) FROM stdin;
James
Mary
David
Emma
Mike
Chan
Bing
Zili
Steve
Larry
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (prod_name, prod_category, prod_cost, prod_price) FROM stdin;
apple	fruit	1.23	1.78
banana	fruit	0.56	0.98
flour	grain	1.36	1.85
grape	fruit	2.02	2.77
kale	vegetable	2.29	2.81
lentil	grain	2.24	3.12
onion	vegetable	0.72	1.26
pear	fruit	1.78	2.65
potato	vegetable	0.63	1.01
rice	grain	1.11	1.66
tomato	vegetable	1.74	2.25
orange	fruit	0.97	1.62
okra	vegetable	2.00	3.12
\.


--
-- Data for Name: transactions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.transactions (trans_date, cust_name, prod_name, prod_qty, prod_value) FROM stdin;
2018-11-01	James	apple	1.50	2.67
2018-11-01	James	rice	3.12	5.18
2018-11-01	Marry	grape	0.87	2.41
2018-11-02	Emma	kale	1.29	3.62
2018-11-03	Emma	lentil	2.50	7.80
2018-11-03	David	onion	1.08	1.36
2018-11-03	Marry	flour	5.00	9.25
2018-11-04	James	banana	1.60	1.57
2018-11-04	David	potato	3.16	3.19
2018-11-04	Zili	apple	1.50	2.67
2018-11-05	James	grape	2.34	6.48
2018-11-05	David	kale	1.01	2.84
2018-11-06	Mike	rice	10.00	16.60
2018-11-06	David	potato	1.80	1.82
2018-11-06	Emma	onion	3.00	3.78
2018-11-06	James	rice	1.55	2.57
2018-11-07	David	pear	1.55	4.11
2018-11-07	Mike	banana	3.60	3.53
2018-11-08	Chan	potato	5.80	5.86
2018-11-08	Chan	lentil	2.30	7.18
2018-11-08	Chan	flour	2.30	4.25
2018-11-09	Mary	banana	2.50	2.45
2018-11-10	Mary	banana	2.50	2.45
2018-11-10	Mary	banana	2.50	2.45
2018-11-11	Mary	banana	2.50	2.45
2018-11-11	Mary	banana	2.50	2.45
2018-11-12	Bing	apple	3.00	5.34
2018-11-12	James	grape	4.50	12.46
2018-11-12	Emma	kale	0.50	1.40
2018-11-12	James	tomato	5.40	12.15
2018-11-12	James	tomato	5.40	12.15
2018-11-13	David	banana	5.60	5.49
2018-11-13	Emma	rice	10.50	17.43
2018-11-13	Emma	grape	3.00	8.31
2018-11-13	Emma	kale	3.50	9.84
2018-11-13	Mike	kale	3.30	9.27
2018-11-14	Mike	kale	3.30	9.27
2018-11-14	Mary	onion	2.20	2.77
2018-11-15	Mary	tomato	1.10	2.48
2018-11-15	Mike	banana	3.30	3.23
2018-11-15	Zili	grape	4.78	13.24
2018-11-15	Zili	tomato	1.30	2.93
2018-11-15	Steve	orange	3.00	4.86
2018-11-15	Steve	flour	10.00	18.50
2018-11-15	Steve	apple	2.00	3.56
2018-11-16	James	apple	1.00	1.78
2018-11-16	Larry	kale	2.00	5.62
2018-11-16	Chan	onion	3.60	4.54
2018-11-17	Bing	tomato	3.20	7.20
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (user_name, user_pwd, user_group) FROM stdin;
admin	admin123	administrator
lucy	lucy123	cashier
tom	tom123	cashier
mary	mary123	cashier
\.


--
-- PostgreSQL database dump complete
--

