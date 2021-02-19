--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.26
-- Dumped by pg_dump version 13.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: mercado; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA mercado;


ALTER SCHEMA mercado OWNER TO postgres;

SET default_tablespace = '';

--
-- Name: produtos; Type: TABLE; Schema: mercado; Owner: postgres
--

CREATE TABLE mercado.produtos (
    produto character varying(64) NOT NULL,
    valor double precision NOT NULL,
    tipo_id integer NOT NULL,
    id_produto integer NOT NULL
);


ALTER TABLE mercado.produtos OWNER TO postgres;

--
-- Name: produtos_id_produto_seq; Type: SEQUENCE; Schema: mercado; Owner: postgres
--

CREATE SEQUENCE mercado.produtos_id_produto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mercado.produtos_id_produto_seq OWNER TO postgres;

--
-- Name: produtos_id_produto_seq; Type: SEQUENCE OWNED BY; Schema: mercado; Owner: postgres
--

ALTER SEQUENCE mercado.produtos_id_produto_seq OWNED BY mercado.produtos.id_produto;


--
-- Name: produtos_vendas; Type: TABLE; Schema: mercado; Owner: postgres
--

CREATE TABLE mercado.produtos_vendas (
    id_produto_venda integer NOT NULL,
    produto_id integer NOT NULL,
    venda_id integer NOT NULL
);


ALTER TABLE mercado.produtos_vendas OWNER TO postgres;

--
-- Name: produtos_vendas_id_produto_venda_seq; Type: SEQUENCE; Schema: mercado; Owner: postgres
--

CREATE SEQUENCE mercado.produtos_vendas_id_produto_venda_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mercado.produtos_vendas_id_produto_venda_seq OWNER TO postgres;

--
-- Name: produtos_vendas_id_produto_venda_seq; Type: SEQUENCE OWNED BY; Schema: mercado; Owner: postgres
--

ALTER SEQUENCE mercado.produtos_vendas_id_produto_venda_seq OWNED BY mercado.produtos_vendas.id_produto_venda;


--
-- Name: tipos; Type: TABLE; Schema: mercado; Owner: postgres
--

CREATE TABLE mercado.tipos (
    id_tipo integer NOT NULL,
    tipo character varying(32) NOT NULL,
    imposto double precision NOT NULL,
    data_cadastro timestamp without time zone NOT NULL
);


ALTER TABLE mercado.tipos OWNER TO postgres;

--
-- Name: tipo_id_tipo_seq; Type: SEQUENCE; Schema: mercado; Owner: postgres
--

CREATE SEQUENCE mercado.tipo_id_tipo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mercado.tipo_id_tipo_seq OWNER TO postgres;

--
-- Name: tipo_id_tipo_seq; Type: SEQUENCE OWNED BY; Schema: mercado; Owner: postgres
--

ALTER SEQUENCE mercado.tipo_id_tipo_seq OWNED BY mercado.tipos.id_tipo;


--
-- Name: vendas; Type: TABLE; Schema: mercado; Owner: postgres
--

CREATE TABLE mercado.vendas (
    id_venda integer NOT NULL,
    valor_quantidade double precision NOT NULL,
    valor_imposto double precision NOT NULL,
    quantidade integer
);


ALTER TABLE mercado.vendas OWNER TO postgres;

--
-- Name: vendas_id_venda_seq; Type: SEQUENCE; Schema: mercado; Owner: postgres
--

CREATE SEQUENCE mercado.vendas_id_venda_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mercado.vendas_id_venda_seq OWNER TO postgres;

--
-- Name: vendas_id_venda_seq; Type: SEQUENCE OWNED BY; Schema: mercado; Owner: postgres
--

ALTER SEQUENCE mercado.vendas_id_venda_seq OWNED BY mercado.vendas.id_venda;


--
-- Name: produtos id_produto; Type: DEFAULT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.produtos ALTER COLUMN id_produto SET DEFAULT nextval('mercado.produtos_id_produto_seq'::regclass);


--
-- Name: produtos_vendas id_produto_venda; Type: DEFAULT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.produtos_vendas ALTER COLUMN id_produto_venda SET DEFAULT nextval('mercado.produtos_vendas_id_produto_venda_seq'::regclass);


--
-- Name: tipos id_tipo; Type: DEFAULT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.tipos ALTER COLUMN id_tipo SET DEFAULT nextval('mercado.tipo_id_tipo_seq'::regclass);


--
-- Name: vendas id_venda; Type: DEFAULT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.vendas ALTER COLUMN id_venda SET DEFAULT nextval('mercado.vendas_id_venda_seq'::regclass);


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: mercado; Owner: postgres
--

COPY mercado.produtos (produto, valor, tipo_id, id_produto) FROM stdin;
Coca-cola	4.5	12	3
Mussarela	6.79999999999999982	11	4
Presunto	5.5	11	5
Sonho	5	13	6
Pão francês	2.29999999999999982	13	7
Maçã	6.70000000000000018	18	9
Guaraná Antarctica	5.40000000000000036	12	10
Cerveja Heinekein	4.5	12	11
Cerveja Stella	3.5	12	12
Banana	2.79999999999999982	18	8
\.


--
-- Data for Name: produtos_vendas; Type: TABLE DATA; Schema: mercado; Owner: postgres
--

COPY mercado.produtos_vendas (id_produto_venda, produto_id, venda_id) FROM stdin;
8	8	12
9	3	13
10	9	14
11	7	15
12	6	16
13	10	17
\.


--
-- Data for Name: tipos; Type: TABLE DATA; Schema: mercado; Owner: postgres
--

COPY mercado.tipos (id_tipo, tipo, imposto, data_cadastro) FROM stdin;
11	Frios	4.70000000000000018	2021-02-17 10:42:13
12	Bebidas	4.5	2021-02-17 10:42:28
13	Padaria	7.5	2021-02-17 10:42:39
15	Produtos de limpeza	3.89999999999999991	2021-02-17 10:55:19
17	Alimentos	6.70000000000000018	2021-02-17 12:21:51
18	Hortifrúti	8.69999999999999929	2021-02-17 12:22:00
\.


--
-- Data for Name: vendas; Type: TABLE DATA; Schema: mercado; Owner: postgres
--

COPY mercado.vendas (id_venda, valor_quantidade, valor_imposto, quantidade) FROM stdin;
12	2.79999999999999982	0.243600000000000011	1
13	18	0.810000000000000053	4
14	67	5.82899999999999974	10
15	11.5	0.862500000000000044	5
16	10	0.75	2
17	27	1.21500000000000008	5
\.


--
-- Name: produtos_id_produto_seq; Type: SEQUENCE SET; Schema: mercado; Owner: postgres
--

SELECT pg_catalog.setval('mercado.produtos_id_produto_seq', 15, true);


--
-- Name: produtos_vendas_id_produto_venda_seq; Type: SEQUENCE SET; Schema: mercado; Owner: postgres
--

SELECT pg_catalog.setval('mercado.produtos_vendas_id_produto_venda_seq', 14, true);


--
-- Name: tipo_id_tipo_seq; Type: SEQUENCE SET; Schema: mercado; Owner: postgres
--

SELECT pg_catalog.setval('mercado.tipo_id_tipo_seq', 19, true);


--
-- Name: vendas_id_venda_seq; Type: SEQUENCE SET; Schema: mercado; Owner: postgres
--

SELECT pg_catalog.setval('mercado.vendas_id_venda_seq', 18, true);


--
-- Name: produtos produtos_pkey; Type: CONSTRAINT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id_produto);


--
-- Name: produtos_vendas produtos_vendas_pkey; Type: CONSTRAINT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.produtos_vendas
    ADD CONSTRAINT produtos_vendas_pkey PRIMARY KEY (id_produto_venda);


--
-- Name: tipos tipos_pkey; Type: CONSTRAINT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.tipos
    ADD CONSTRAINT tipos_pkey PRIMARY KEY (id_tipo);


--
-- Name: vendas vendas_pkey; Type: CONSTRAINT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.vendas
    ADD CONSTRAINT vendas_pkey PRIMARY KEY (id_venda);


--
-- Name: produtos produtos_tipo_id_fkey; Type: FK CONSTRAINT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.produtos
    ADD CONSTRAINT produtos_tipo_id_fkey FOREIGN KEY (tipo_id) REFERENCES mercado.tipos(id_tipo);


--
-- Name: produtos_vendas produtos_vendas_produto_id_fkey; Type: FK CONSTRAINT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.produtos_vendas
    ADD CONSTRAINT produtos_vendas_produto_id_fkey FOREIGN KEY (produto_id) REFERENCES mercado.produtos(id_produto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: produtos_vendas produtos_vendas_venda_id_fkey; Type: FK CONSTRAINT; Schema: mercado; Owner: postgres
--

ALTER TABLE ONLY mercado.produtos_vendas
    ADD CONSTRAINT produtos_vendas_venda_id_fkey FOREIGN KEY (venda_id) REFERENCES mercado.vendas(id_venda) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

