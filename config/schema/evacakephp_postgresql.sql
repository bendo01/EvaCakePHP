--
-- PostgreSQL database dump
--

-- Dumped from database version 9.0.4
-- Dumped by pg_dump version 9.0.4
-- Started on 2011-06-27 14:24:14 CIT

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

--
-- TOC entry 6 (class 2615 OID 16659)
-- Name: evacakephp; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA evacakephp;


--
-- TOC entry 399 (class 2612 OID 11574)
-- Name: plpgsql; Type: PROCEDURAL LANGUAGE; Schema: -; Owner: -
--

CREATE OR REPLACE PROCEDURAL LANGUAGE plpgsql;


SET search_path = public, pg_catalog;

--
-- TOC entry 346 (class 1247 OID 16665)
-- Dependencies: 7 1591
-- Name: dblink_pkey_results; Type: TYPE; Schema: public; Owner: -
--

CREATE TYPE dblink_pkey_results AS (
	"position" integer,
	colname text
);


--
-- TOC entry 19 (class 1255 OID 16666)
-- Dependencies: 7
-- Name: dblink(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink(text) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_record';


--
-- TOC entry 20 (class 1255 OID 16667)
-- Dependencies: 7
-- Name: dblink(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink(text, text) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_record';


--
-- TOC entry 21 (class 1255 OID 16668)
-- Dependencies: 7
-- Name: dblink(text, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink(text, boolean) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_record';


--
-- TOC entry 22 (class 1255 OID 16669)
-- Dependencies: 7
-- Name: dblink(text, text, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink(text, text, boolean) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_record';


--
-- TOC entry 23 (class 1255 OID 16670)
-- Dependencies: 7
-- Name: dblink_build_sql_delete(text, int2vector, integer, text[]); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_build_sql_delete(text, int2vector, integer, text[]) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_build_sql_delete';


--
-- TOC entry 24 (class 1255 OID 16671)
-- Dependencies: 7
-- Name: dblink_build_sql_insert(text, int2vector, integer, text[], text[]); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_build_sql_insert(text, int2vector, integer, text[], text[]) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_build_sql_insert';


--
-- TOC entry 25 (class 1255 OID 16672)
-- Dependencies: 7
-- Name: dblink_build_sql_update(text, int2vector, integer, text[], text[]); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_build_sql_update(text, int2vector, integer, text[], text[]) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_build_sql_update';


--
-- TOC entry 26 (class 1255 OID 16673)
-- Dependencies: 7
-- Name: dblink_cancel_query(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_cancel_query(text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_cancel_query';


--
-- TOC entry 27 (class 1255 OID 16674)
-- Dependencies: 7
-- Name: dblink_close(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_close(text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_close';


--
-- TOC entry 28 (class 1255 OID 16675)
-- Dependencies: 7
-- Name: dblink_close(text, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_close(text, boolean) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_close';


--
-- TOC entry 29 (class 1255 OID 16676)
-- Dependencies: 7
-- Name: dblink_close(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_close(text, text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_close';


--
-- TOC entry 30 (class 1255 OID 16677)
-- Dependencies: 7
-- Name: dblink_close(text, text, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_close(text, text, boolean) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_close';


--
-- TOC entry 31 (class 1255 OID 16678)
-- Dependencies: 7
-- Name: dblink_connect(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_connect(text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_connect';


--
-- TOC entry 32 (class 1255 OID 16679)
-- Dependencies: 7
-- Name: dblink_connect(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_connect(text, text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_connect';


--
-- TOC entry 46 (class 1255 OID 16680)
-- Dependencies: 7
-- Name: dblink_connect_u(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_connect_u(text) RETURNS text
    LANGUAGE c STRICT SECURITY DEFINER
    AS '$libdir/dblink', 'dblink_connect';


--
-- TOC entry 33 (class 1255 OID 16681)
-- Dependencies: 7
-- Name: dblink_connect_u(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_connect_u(text, text) RETURNS text
    LANGUAGE c STRICT SECURITY DEFINER
    AS '$libdir/dblink', 'dblink_connect';


--
-- TOC entry 34 (class 1255 OID 16682)
-- Dependencies: 7
-- Name: dblink_current_query(); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_current_query() RETURNS text
    LANGUAGE c
    AS '$libdir/dblink', 'dblink_current_query';


--
-- TOC entry 35 (class 1255 OID 16683)
-- Dependencies: 7
-- Name: dblink_disconnect(); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_disconnect() RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_disconnect';


--
-- TOC entry 36 (class 1255 OID 16684)
-- Dependencies: 7
-- Name: dblink_disconnect(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_disconnect(text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_disconnect';


--
-- TOC entry 37 (class 1255 OID 16685)
-- Dependencies: 7
-- Name: dblink_error_message(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_error_message(text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_error_message';


--
-- TOC entry 38 (class 1255 OID 16686)
-- Dependencies: 7
-- Name: dblink_exec(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_exec(text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_exec';


--
-- TOC entry 39 (class 1255 OID 16687)
-- Dependencies: 7
-- Name: dblink_exec(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_exec(text, text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_exec';


--
-- TOC entry 40 (class 1255 OID 16688)
-- Dependencies: 7
-- Name: dblink_exec(text, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_exec(text, boolean) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_exec';


--
-- TOC entry 41 (class 1255 OID 16689)
-- Dependencies: 7
-- Name: dblink_exec(text, text, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_exec(text, text, boolean) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_exec';


--
-- TOC entry 42 (class 1255 OID 16690)
-- Dependencies: 7
-- Name: dblink_fetch(text, integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_fetch(text, integer) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_fetch';


--
-- TOC entry 43 (class 1255 OID 16691)
-- Dependencies: 7
-- Name: dblink_fetch(text, integer, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_fetch(text, integer, boolean) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_fetch';


--
-- TOC entry 44 (class 1255 OID 16692)
-- Dependencies: 7
-- Name: dblink_fetch(text, text, integer); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_fetch(text, text, integer) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_fetch';


--
-- TOC entry 45 (class 1255 OID 16693)
-- Dependencies: 7
-- Name: dblink_fetch(text, text, integer, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_fetch(text, text, integer, boolean) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_fetch';


--
-- TOC entry 47 (class 1255 OID 16694)
-- Dependencies: 7
-- Name: dblink_get_connections(); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_get_connections() RETURNS text[]
    LANGUAGE c
    AS '$libdir/dblink', 'dblink_get_connections';


--
-- TOC entry 48 (class 1255 OID 16695)
-- Dependencies: 7
-- Name: dblink_get_notify(); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_get_notify(OUT notify_name text, OUT be_pid integer, OUT extra text) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_get_notify';


--
-- TOC entry 49 (class 1255 OID 16696)
-- Dependencies: 7
-- Name: dblink_get_notify(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_get_notify(conname text, OUT notify_name text, OUT be_pid integer, OUT extra text) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_get_notify';


--
-- TOC entry 50 (class 1255 OID 16697)
-- Dependencies: 346 7
-- Name: dblink_get_pkey(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_get_pkey(text) RETURNS SETOF dblink_pkey_results
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_get_pkey';


--
-- TOC entry 51 (class 1255 OID 16698)
-- Dependencies: 7
-- Name: dblink_get_result(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_get_result(text) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_get_result';


--
-- TOC entry 52 (class 1255 OID 16699)
-- Dependencies: 7
-- Name: dblink_get_result(text, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_get_result(text, boolean) RETURNS SETOF record
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_get_result';


--
-- TOC entry 53 (class 1255 OID 16700)
-- Dependencies: 7
-- Name: dblink_is_busy(text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_is_busy(text) RETURNS integer
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_is_busy';


--
-- TOC entry 54 (class 1255 OID 16701)
-- Dependencies: 7
-- Name: dblink_open(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_open(text, text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_open';


--
-- TOC entry 55 (class 1255 OID 16702)
-- Dependencies: 7
-- Name: dblink_open(text, text, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_open(text, text, boolean) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_open';


--
-- TOC entry 56 (class 1255 OID 16703)
-- Dependencies: 7
-- Name: dblink_open(text, text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_open(text, text, text) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_open';


--
-- TOC entry 57 (class 1255 OID 16704)
-- Dependencies: 7
-- Name: dblink_open(text, text, text, boolean); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_open(text, text, text, boolean) RETURNS text
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_open';


--
-- TOC entry 58 (class 1255 OID 16705)
-- Dependencies: 7
-- Name: dblink_send_query(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION dblink_send_query(text, text) RETURNS integer
    LANGUAGE c STRICT
    AS '$libdir/dblink', 'dblink_send_query';


SET search_path = evacakephp, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 1592 (class 1259 OID 16706)
-- Dependencies: 6
-- Name: eva_applications; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_applications (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    title character varying(255),
    description text,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1593 (class 1259 OID 16712)
-- Dependencies: 6
-- Name: eva_basic_rules; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_basic_rules (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    description text,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1594 (class 1259 OID 16718)
-- Dependencies: 6
-- Name: eva_belong_to_association_details; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_belong_to_association_details (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    "className" character varying(255) NOT NULL,
    "foreignKey" character varying(255) NOT NULL,
    conditions character varying(255),
    eva_belong_to_association_id character varying(36) NOT NULL,
    type character varying(255),
    fields character varying(255),
    "order" character varying(255),
    "counterCache" character varying(255),
    "counterScope" character varying(255),
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone NOT NULL,
    modified timestamp without time zone NOT NULL
);


--
-- TOC entry 1595 (class 1259 OID 16724)
-- Dependencies: 6
-- Name: eva_belong_to_associations; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_belong_to_associations (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    eva_model_id character varying(36) NOT NULL,
    associated_model_id character varying(36) NOT NULL,
    description text,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1596 (class 1259 OID 16730)
-- Dependencies: 6
-- Name: eva_column_rules; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_column_rules (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    eva_model_column_id character varying(36) NOT NULL,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1597 (class 1259 OID 16733)
-- Dependencies: 6
-- Name: eva_db_connections; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_db_connections (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    driver character varying(255) NOT NULL,
    host character varying(255) NOT NULL,
    login character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    database character varying(255) NOT NULL,
    schema character varying(255),
    port character varying(255),
    persistent boolean NOT NULL,
    prefix character varying(255),
    eva_application_id character varying(36),
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1598 (class 1259 OID 16739)
-- Dependencies: 6
-- Name: eva_has_and_belong_to_many_association_details; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_has_and_belong_to_many_association_details (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    eva_has_and_belong_to_many_association_id character varying(36) NOT NULL,
    "className" character varying(255) NOT NULL,
    "joinTable" character varying(255) NOT NULL,
    "with" character varying(255),
    "foreignKey" character varying(255) NOT NULL,
    "associationForeignKey" character varying(255) NOT NULL,
    "unique" boolean NOT NULL,
    conditions text,
    fields text,
    "order" character varying(255),
    "limit" integer,
    "offset" text,
    "finderQuery" text,
    "deleteQuery" text,
    "insertQuery" text,
    deleted boolean,
    deleted_date timestamp without time zone NOT NULL,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone NOT NULL,
    modified timestamp without time zone NOT NULL
);


--
-- TOC entry 1599 (class 1259 OID 16745)
-- Dependencies: 6
-- Name: eva_has_and_belong_to_many_associations; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_has_and_belong_to_many_associations (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    eva_model_id character varying(36) NOT NULL,
    associated_model_id character varying(36) NOT NULL,
    description text,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1600 (class 1259 OID 16751)
-- Dependencies: 6
-- Name: eva_has_many_association_details; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_has_many_association_details (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    "className" character varying(255) NOT NULL,
    "foreignKey" character varying(255) NOT NULL,
    conditions character varying(255),
    fields character varying(255),
    "order" character varying(255),
    eva_has_many_association_id character varying(36) NOT NULL,
    "offset" integer,
    exclusive boolean,
    "finderQuery" text,
    "limit" integer,
    dependent boolean,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone NOT NULL,
    modified timestamp without time zone NOT NULL
);


--
-- TOC entry 1601 (class 1259 OID 16757)
-- Dependencies: 6
-- Name: eva_has_many_associations; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_has_many_associations (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    description text,
    eva_model_id character varying(36) NOT NULL,
    associated_model_id character varying(36) NOT NULL,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1602 (class 1259 OID 16763)
-- Dependencies: 6
-- Name: eva_has_one_association_details; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_has_one_association_details (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    "className" character varying(255) NOT NULL,
    "foreignKey" character varying(255) NOT NULL,
    conditions character varying(255),
    fields character varying(255),
    "order" character varying(255),
    eva_has_one_association_id character varying(36) NOT NULL,
    dependent boolean NOT NULL,
    deleted boolean,
    deleted_date timestamp without time zone NOT NULL,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1603 (class 1259 OID 16769)
-- Dependencies: 6
-- Name: eva_has_one_associations; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_has_one_associations (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    description text,
    eva_model_id character varying(36) NOT NULL,
    associated_model_id character varying(36) NOT NULL,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1608 (class 1259 OID 16945)
-- Dependencies: 1888 1889 1890 6
-- Name: eva_menus; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_menus (
    id integer NOT NULL,
    title character varying(255),
    name character varying(255) NOT NULL,
    enable boolean NOT NULL,
    parent_id integer DEFAULT 11,
    url character varying(255) NOT NULL,
    lft integer DEFAULT 11,
    rght integer DEFAULT 11,
    created_by character varying(36),
    modified_by character varying(36),
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1607 (class 1259 OID 16943)
-- Dependencies: 1608 6
-- Name: eva_menus_id_seq; Type: SEQUENCE; Schema: evacakephp; Owner: -
--

CREATE SEQUENCE eva_menus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 1950 (class 0 OID 0)
-- Dependencies: 1607
-- Name: eva_menus_id_seq; Type: SEQUENCE OWNED BY; Schema: evacakephp; Owner: -
--

ALTER SEQUENCE eva_menus_id_seq OWNED BY eva_menus.id;


--
-- TOC entry 1951 (class 0 OID 0)
-- Dependencies: 1607
-- Name: eva_menus_id_seq; Type: SEQUENCE SET; Schema: evacakephp; Owner: -
--

SELECT pg_catalog.setval('eva_menus_id_seq', 13, true);


--
-- TOC entry 1604 (class 1259 OID 16775)
-- Dependencies: 6
-- Name: eva_model_column_rule_details; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_model_column_rule_details (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    message character varying(255),
    "allowEmpty" boolean,
    required boolean,
    last boolean,
    "on" character varying(255),
    eva_column_rule_id character varying(36) NOT NULL,
    eva_basic_rule_id character varying(36) NOT NULL,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36) NOT NULL,
    modified_by character varying(36) NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1605 (class 1259 OID 16781)
-- Dependencies: 6
-- Name: eva_model_columns; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_model_columns (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    alias character varying(255) NOT NULL,
    type character varying(255) NOT NULL,
    length character varying(255),
    eva_model_id character varying(36) NOT NULL,
    "allowNull" boolean,
    primarykey boolean,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36) NOT NULL,
    modified_by character varying(36) NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone
);


--
-- TOC entry 1606 (class 1259 OID 16787)
-- Dependencies: 6
-- Name: eva_models; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE eva_models (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    alias character varying(255),
    "cacheQueries" boolean,
    "cacheSources" boolean,
    "displayField" character varying(255),
    "findQueryType" character varying(255),
    "logTransactions" boolean,
    "order" character varying(255),
    "primaryKey" character varying(255),
    recursive integer,
    "table" character varying(255),
    "tablePrefix" character varying(255),
    "useDbConfig" character varying(255),
    "useTable" character varying(255),
    eva_db_connection_id character varying(36) NOT NULL,
    deleted boolean,
    deleted_date timestamp without time zone,
    created_by character varying(36) NOT NULL,
    modified_by character varying(36) NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone,
    admin_section boolean
);


--
-- TOC entry 1609 (class 1259 OID 16966)
-- Dependencies: 6
-- Name: wwwsqldesigners; Type: TABLE; Schema: evacakephp; Owner: -; Tablespace: 
--

CREATE TABLE wwwsqldesigners (
    id character varying(36) NOT NULL,
    name character varying(255) NOT NULL,
    keyword character varying(255) NOT NULL,
    xmldata text,
    deleted boolean,
    created_by character varying(255) NOT NULL,
    modified_by character varying(255) NOT NULL,
    sqldata text,
    created timestamp without time zone,
    modified timestamp without time zone,
    deleted_date timestamp without time zone
);


--
-- TOC entry 1887 (class 2604 OID 16948)
-- Dependencies: 1608 1607 1608
-- Name: id; Type: DEFAULT; Schema: evacakephp; Owner: -
--

ALTER TABLE eva_menus ALTER COLUMN id SET DEFAULT nextval('eva_menus_id_seq'::regclass);


--
-- TOC entry 1925 (class 0 OID 16706)
-- Dependencies: 1592
-- Data for Name: eva_applications; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_applications (id, name, title, description, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
4dfb3c3a-ebf4-4a77-9dda-10367445297b	Blog	Test Blog Applications	Lorem ipsum dolor sit amet, consectetur adipiscing elit. xxx xxx	f	\N			2011-06-17 20:36:26	2011-06-27 15:13:19
\.


--
-- TOC entry 1926 (class 0 OID 16712)
-- Dependencies: 1593
-- Data for Name: eva_basic_rules; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_basic_rules (id, name, description, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
4dd899da-a70c-4078-a403-00a4c0a80102	alphaNumeric	The data for the field must only contain letters and numbers.	f	\N	1	1	2011-05-22 13:06:34	2011-05-22 13:06:34
4dd89b3f-0d8c-47fd-9e07-00a4c0a80102	numeric	Checks if the data passed is a valid number.	f	\N	1	1	2011-05-22 13:12:31	2011-05-22 13:12:31
4dd89b89-2968-49d9-81b7-01aec0a80102	isUnique	The data for the field must be unique, it cannot be used by any other rows.	f	\N	1	1	2011-05-22 13:13:45	2011-05-22 13:13:45
4dd89bf1-8f6c-43ee-bee0-00a2c0a80102	notEmpty	The basic rule to ensure that a field is not empty.	f	\N	1	1	2011-05-22 13:15:29	2011-05-22 13:15:29
\.


--
-- TOC entry 1927 (class 0 OID 16718)
-- Dependencies: 1594
-- Data for Name: eva_belong_to_association_details; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_belong_to_association_details (id, name, "className", "foreignKey", conditions, eva_belong_to_association_id, type, fields, "order", "counterCache", "counterScope", deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
4dfb440f-22bc-4ebe-8b65-13737445297b	posts	Post	post_id		4dfb440f-ef48-43a9-ad23-13737445297b	\N			\N	\N	f	\N			2011-06-17 21:09:51	2011-06-17 21:09:51
\.


--
-- TOC entry 1928 (class 0 OID 16724)
-- Dependencies: 1595
-- Data for Name: eva_belong_to_associations; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_belong_to_associations (id, name, eva_model_id, associated_model_id, description, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
4dfb440f-ef48-43a9-ad23-13737445297b	Comments BelongTo Posts	4dfb3cc0-7da8-4df1-8f06-109b7445297b	4dfb3cb7-177c-40f4-b81c-10107445297b	xxx	f	\N			2011-06-17 21:09:51	2011-06-17 21:09:51
\.


--
-- TOC entry 1929 (class 0 OID 16730)
-- Dependencies: 1596
-- Data for Name: eva_column_rules; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_column_rules (id, name, eva_model_column_id, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
4dfb45ff-6a78-4992-b025-14927445297b	PostNameNotNull	4dfb4336-02b0-4e1a-86bf-14927445297b	f	\N			2011-06-17 21:18:07	2011-06-17 21:18:07
4dfb460b-6b38-4429-80f8-15a37445297b	PostBodyNotNull	4dfb4351-4a64-4f36-906f-13337445297b	f	\N			2011-06-17 21:18:19	2011-06-17 21:18:19
4dfb4615-59a4-4b08-a37e-13397445297b	CommentsNameNotNull	4dfb4399-2dc4-43c3-863a-13737445297b	f	\N			2011-06-17 21:18:29	2011-06-17 21:18:29
4dfb4620-b188-4bed-9dec-13337445297b	CommentsBodyNotNull	4dfb43b2-91e8-4088-808b-152d7445297b	f	\N			2011-06-17 21:18:40	2011-06-17 21:18:40
\.


--
-- TOC entry 1930 (class 0 OID 16733)
-- Dependencies: 1597
-- Data for Name: eva_db_connections; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_db_connections (id, name, driver, host, login, password, database, schema, port, persistent, prefix, eva_application_id, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
4dfb3c95-52a4-476b-bd55-13337445297b	default	postgres	localhost	admin	admin	EvaCakePhpPlugin	public	5432	f	\N	4dfb3c3a-ebf4-4a77-9dda-10367445297b	f	\N			2011-06-17 20:37:57	2011-06-18 00:34:50
\.


--
-- TOC entry 1931 (class 0 OID 16739)
-- Dependencies: 1598
-- Data for Name: eva_has_and_belong_to_many_association_details; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_has_and_belong_to_many_association_details (id, name, eva_has_and_belong_to_many_association_id, "className", "joinTable", "with", "foreignKey", "associationForeignKey", "unique", conditions, fields, "order", "limit", "offset", "finderQuery", "deleteQuery", "insertQuery", deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
\.


--
-- TOC entry 1932 (class 0 OID 16745)
-- Dependencies: 1599
-- Data for Name: eva_has_and_belong_to_many_associations; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_has_and_belong_to_many_associations (id, name, eva_model_id, associated_model_id, description, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
\.


--
-- TOC entry 1933 (class 0 OID 16751)
-- Dependencies: 1600
-- Data for Name: eva_has_many_association_details; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_has_many_association_details (id, name, "className", "foreignKey", conditions, fields, "order", eva_has_many_association_id, "offset", exclusive, "finderQuery", "limit", dependent, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
4dfb4232-8cfc-4fbe-94b3-14e67445297b	comments	Comment	post_id				4dfb3d4e-060c-4191-b203-105e7445297b	\N	\N	\N	\N	\N	f	\N			2011-06-17 21:01:54	2011-06-17 21:01:54
\.


--
-- TOC entry 1934 (class 0 OID 16757)
-- Dependencies: 1601
-- Data for Name: eva_has_many_associations; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_has_many_associations (id, name, description, eva_model_id, associated_model_id, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
4dfb3d4e-060c-4191-b203-105e7445297b	Post HasMany Comments	Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at nunc a magna porttitor porttitor a sit amet ante. Vivamus massa erat, feugiat convallis consectetur nec, auctor eget massa. Morbi faucibus velit ut magna sollicitudin congue. Suspendisse eu justo eros, dapibus elementum tortor.	4dfb3cb7-177c-40f4-b81c-10107445297b	4dfb3cc0-7da8-4df1-8f06-109b7445297b	f	\N			2011-06-17 20:41:02	2011-06-17 21:01:54
\.


--
-- TOC entry 1935 (class 0 OID 16763)
-- Dependencies: 1602
-- Data for Name: eva_has_one_association_details; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_has_one_association_details (id, name, "className", "foreignKey", conditions, fields, "order", eva_has_one_association_id, dependent, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
\.


--
-- TOC entry 1936 (class 0 OID 16769)
-- Dependencies: 1603
-- Data for Name: eva_has_one_associations; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_has_one_associations (id, name, description, eva_model_id, associated_model_id, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
\.


--
-- TOC entry 1940 (class 0 OID 16945)
-- Dependencies: 1608
-- Data for Name: eva_menus; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_menus (id, title, name, enable, parent_id, url, lft, rght, created_by, modified_by, created, modified) FROM stdin;
4	List Of Model Operations	Eva Model Menu	t	1	#	6	25			2011-06-17 22:22:21	2011-06-17 23:25:59
11	List Of Model Rules	Eva Model Rules	t	4	#	19	24			2011-06-17 22:34:41	2011-06-17 23:25:59
6	List Of Models Relations	Eva Model Relations	t	4	#	9	18			2011-06-17 22:25:22	2011-06-17 23:25:59
5	List Of Created Models	Eva Models	t	4	/evacakephp/eva_models/	7	8			2011-06-17 22:24:09	2011-06-17 23:25:59
7	List Of Model Has One Association	Eva Has One Association	t	6	/evacakephp/eva_has_one_associations/	10	11			2011-06-17 22:27:41	2011-06-17 23:25:59
9	List Of Model Has Many Association	Eva Has Many Association	t	6	/evacakephp/eva_has_many_associations/	14	15			2011-06-17 22:31:15	2011-06-17 23:25:59
1	List Of Menu Of EvaCakePHP Plugin	Eva Plugin Menu	t	\N	#	1	26			2011-06-17 22:01:45	2011-06-17 23:25:59
8	List Of Model belong To Association	Eva Belongs To Association	t	6	/evacakephp/eva_belong_to_associations/	12	13			2011-06-17 22:29:16	2011-06-17 23:25:59
2	List Of Created Eva Applications	Eva Applications	t	1	/evacakephp/eva_applications/	2	3			2011-06-17 22:03:27	2011-06-17 23:25:59
3	List Of Created Connections	Eva Db Connections	t	1	/evacakephp/eva_db_connections/	4	5			2011-06-17 22:20:45	2011-06-17 23:25:59
10	List Of Model Has And Belongs To Many Association	Eva HABTM Association	t	6	/evacakephp/eva_has_and_belong_to_many_associations/	16	17			2011-06-17 22:33:40	2011-06-17 23:25:59
12	List Of Models Basic Rules	Eva Basic Rules	t	11	/evacakephp/eva_basic_rules/	20	21			2011-06-17 22:36:05	2011-06-17 23:25:59
13	List Of Model Column Rules	Eva Column Rules	t	11	/evacakephp/eva_column_rules/	22	23			2011-06-17 22:38:47	2011-06-17 23:25:59
\.


--
-- TOC entry 1937 (class 0 OID 16775)
-- Dependencies: 1604
-- Data for Name: eva_model_column_rule_details; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_model_column_rule_details (id, name, message, "allowEmpty", required, last, "on", eva_column_rule_id, eva_basic_rule_id, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
4dfb46c0-0e80-4acb-b1af-152d7445297b	PostNameNotNull	Please Fill your name	f	f	f		4dfb45ff-6a78-4992-b025-14927445297b	4dd89bf1-8f6c-43ee-bee0-00a2c0a80102	f	\N			2011-06-17 21:21:20	2011-06-17 21:21:20
4dfb46d0-4924-4598-b853-15a17445297b	PostBodyNotNull	plase fill your text	f	f	f		4dfb460b-6b38-4429-80f8-15a37445297b	4dd89bf1-8f6c-43ee-bee0-00a2c0a80102	f	\N			2011-06-17 21:21:36	2011-06-17 21:21:36
4dfb46eb-4fd8-4d9d-af28-148b7445297b	CommentNameNotNull	Please Fill your name	f	f	f		4dfb4615-59a4-4b08-a37e-13397445297b	4dd89bf1-8f6c-43ee-bee0-00a2c0a80102	f	\N			2011-06-17 21:22:03	2011-06-17 21:22:03
4dfb46fe-3b30-436d-9b8a-10367445297b	CommentTextNotNull	plase fill your text	f	f	f		4dfb4620-b188-4bed-9dec-13337445297b	4dd89bf1-8f6c-43ee-bee0-00a2c0a80102	f	\N			2011-06-17 21:22:22	2011-06-17 21:22:22
\.


--
-- TOC entry 1938 (class 0 OID 16781)
-- Dependencies: 1605
-- Data for Name: eva_model_columns; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_model_columns (id, name, alias, type, length, eva_model_id, "allowNull", primarykey, deleted, deleted_date, created_by, modified_by, created, modified) FROM stdin;
4dfb4324-cfc0-4a39-804d-152d7445297b	id		integer	11	4dfb3cb7-177c-40f4-b81c-10107445297b	f	t	f	\N			2011-06-17 21:05:56	2011-06-17 21:05:56
4dfb4336-02b0-4e1a-86bf-14927445297b	name		string	255	4dfb3cb7-177c-40f4-b81c-10107445297b	f	f	f	\N			2011-06-17 21:06:14	2011-06-17 21:06:14
4dfb4351-4a64-4f36-906f-13337445297b	body		text		4dfb3cb7-177c-40f4-b81c-10107445297b	f	f	f	\N			2011-06-17 21:06:41	2011-06-17 21:06:41
4dfb435d-ac88-40c4-83e3-13397445297b	created		datetime		4dfb3cb7-177c-40f4-b81c-10107445297b	t	f	f	\N			2011-06-17 21:06:53	2011-06-17 21:06:53
4dfb436d-0c2c-4eb7-8c3f-149b7445297b	modified		datetime		4dfb3cb7-177c-40f4-b81c-10107445297b	t	f	f	\N			2011-06-17 21:07:09	2011-06-17 21:07:09
4dfb438a-c128-497f-9735-14f07445297b	id		integer	11	4dfb3cc0-7da8-4df1-8f06-109b7445297b	f	t	f	\N			2011-06-17 21:07:38	2011-06-17 21:07:38
4dfb4399-2dc4-43c3-863a-13737445297b	name		string	255	4dfb3cc0-7da8-4df1-8f06-109b7445297b	f	f	f	\N			2011-06-17 21:07:53	2011-06-17 21:07:53
4dfb43b2-91e8-4088-808b-152d7445297b	body		text		4dfb3cc0-7da8-4df1-8f06-109b7445297b	f	f	f	\N			2011-06-17 21:08:18	2011-06-17 21:08:18
4dfb43c1-41ac-4097-a0d0-10367445297b	post_id		integer	11	4dfb3cc0-7da8-4df1-8f06-109b7445297b	f	f	f	\N			2011-06-17 21:08:33	2011-06-17 21:08:33
4dfb43cf-0554-4c7a-8e66-14927445297b	created		datetime		4dfb3cc0-7da8-4df1-8f06-109b7445297b	f	f	f	\N			2011-06-17 21:08:47	2011-06-17 21:08:47
4dfb43e4-3fd8-418b-bf87-13397445297b	modified		datetime		4dfb3cc0-7da8-4df1-8f06-109b7445297b	f	f	f	\N			2011-06-17 21:09:08	2011-06-17 21:09:08
\.


--
-- TOC entry 1939 (class 0 OID 16787)
-- Dependencies: 1606
-- Data for Name: eva_models; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY eva_models (id, name, alias, "cacheQueries", "cacheSources", "displayField", "findQueryType", "logTransactions", "order", "primaryKey", recursive, "table", "tablePrefix", "useDbConfig", "useTable", eva_db_connection_id, deleted, deleted_date, created_by, modified_by, created, modified, admin_section) FROM stdin;
4dfb3cb7-177c-40f4-b81c-10107445297b	posts	post	f	f			f			\N					4dfb3c95-52a4-476b-bd55-13337445297b	f	\N			2011-06-17 20:38:31	2011-06-27 14:56:07	t
4dfb3cc0-7da8-4df1-8f06-109b7445297b	comments	comment	f	f			f			\N					4dfb3c95-52a4-476b-bd55-13337445297b	f	\N			2011-06-17 20:38:40	2011-06-27 15:14:15	t
\.


--
-- TOC entry 1941 (class 0 OID 16966)
-- Dependencies: 1609
-- Data for Name: wwwsqldesigners; Type: TABLE DATA; Schema: evacakephp; Owner: -
--

COPY wwwsqldesigners (id, name, keyword, xmldata, deleted, created_by, modified_by, sqldata, created, modified, deleted_date) FROM stdin;
\.


--
-- TOC entry 1892 (class 2606 OID 16876)
-- Dependencies: 1592 1592
-- Name: eva_applications_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_applications
    ADD CONSTRAINT eva_applications_pk PRIMARY KEY (id);


--
-- TOC entry 1894 (class 2606 OID 16878)
-- Dependencies: 1593 1593
-- Name: eva_basic_rules_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_basic_rules
    ADD CONSTRAINT eva_basic_rules_pk PRIMARY KEY (id);


--
-- TOC entry 1896 (class 2606 OID 16880)
-- Dependencies: 1594 1594
-- Name: eva_belong_to_association_details_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_belong_to_association_details
    ADD CONSTRAINT eva_belong_to_association_details_pk PRIMARY KEY (id);


--
-- TOC entry 1898 (class 2606 OID 16882)
-- Dependencies: 1595 1595
-- Name: eva_belong_to_associations_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_belong_to_associations
    ADD CONSTRAINT eva_belong_to_associations_pk PRIMARY KEY (id);


--
-- TOC entry 1900 (class 2606 OID 16884)
-- Dependencies: 1596 1596
-- Name: eva_column_rules_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_column_rules
    ADD CONSTRAINT eva_column_rules_pk PRIMARY KEY (id);


--
-- TOC entry 1902 (class 2606 OID 16886)
-- Dependencies: 1597 1597
-- Name: eva_dbconnections_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_db_connections
    ADD CONSTRAINT eva_dbconnections_pk PRIMARY KEY (id);


--
-- TOC entry 1904 (class 2606 OID 16888)
-- Dependencies: 1598 1598
-- Name: eva_has_and_belong_to_many_association_details_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_has_and_belong_to_many_association_details
    ADD CONSTRAINT eva_has_and_belong_to_many_association_details_pk PRIMARY KEY (id);


--
-- TOC entry 1906 (class 2606 OID 16890)
-- Dependencies: 1599 1599
-- Name: eva_has_and_belong_to_many_associations_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_has_and_belong_to_many_associations
    ADD CONSTRAINT eva_has_and_belong_to_many_associations_pk PRIMARY KEY (id);


--
-- TOC entry 1908 (class 2606 OID 16892)
-- Dependencies: 1600 1600
-- Name: eva_has_many_association_details_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_has_many_association_details
    ADD CONSTRAINT eva_has_many_association_details_pk PRIMARY KEY (id);


--
-- TOC entry 1910 (class 2606 OID 16894)
-- Dependencies: 1601 1601
-- Name: eva_has_many_associations_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_has_many_associations
    ADD CONSTRAINT eva_has_many_associations_pk PRIMARY KEY (id);


--
-- TOC entry 1912 (class 2606 OID 16896)
-- Dependencies: 1602 1602
-- Name: eva_has_one_association_details_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_has_one_association_details
    ADD CONSTRAINT eva_has_one_association_details_pk PRIMARY KEY (id);


--
-- TOC entry 1914 (class 2606 OID 16898)
-- Dependencies: 1603 1603
-- Name: eva_has_one_associations_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_has_one_associations
    ADD CONSTRAINT eva_has_one_associations_pk PRIMARY KEY (id);


--
-- TOC entry 1922 (class 2606 OID 16956)
-- Dependencies: 1608 1608
-- Name: eva_menus_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_menus
    ADD CONSTRAINT eva_menus_pk PRIMARY KEY (id);


--
-- TOC entry 1916 (class 2606 OID 16900)
-- Dependencies: 1604 1604
-- Name: eva_model_column_rule_details_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_model_column_rule_details
    ADD CONSTRAINT eva_model_column_rule_details_pk PRIMARY KEY (id);


--
-- TOC entry 1918 (class 2606 OID 16902)
-- Dependencies: 1605 1605
-- Name: eva_model_columns_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_model_columns
    ADD CONSTRAINT eva_model_columns_pk PRIMARY KEY (id);


--
-- TOC entry 1920 (class 2606 OID 16904)
-- Dependencies: 1606 1606
-- Name: eva_models_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY eva_models
    ADD CONSTRAINT eva_models_pk PRIMARY KEY (id);


--
-- TOC entry 1924 (class 2606 OID 16973)
-- Dependencies: 1609 1609
-- Name: wwwsqldesaigners_pk; Type: CONSTRAINT; Schema: evacakephp; Owner: -; Tablespace: 
--

ALTER TABLE ONLY wwwsqldesigners
    ADD CONSTRAINT wwwsqldesaigners_pk PRIMARY KEY (id);


--
-- TOC entry 1945 (class 0 OID 0)
-- Dependencies: 6
-- Name: evacakephp; Type: ACL; Schema: -; Owner: -
--

REVOKE ALL ON SCHEMA evacakephp FROM PUBLIC;
REVOKE ALL ON SCHEMA evacakephp FROM admin;
GRANT ALL ON SCHEMA evacakephp TO admin;
GRANT ALL ON SCHEMA evacakephp TO PUBLIC;


--
-- TOC entry 1947 (class 0 OID 0)
-- Dependencies: 7
-- Name: public; Type: ACL; Schema: -; Owner: -
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


SET search_path = public, pg_catalog;

--
-- TOC entry 1948 (class 0 OID 0)
-- Dependencies: 46
-- Name: dblink_connect_u(text); Type: ACL; Schema: public; Owner: -
--

REVOKE ALL ON FUNCTION dblink_connect_u(text) FROM PUBLIC;
REVOKE ALL ON FUNCTION dblink_connect_u(text) FROM postgres;
GRANT ALL ON FUNCTION dblink_connect_u(text) TO postgres;


--
-- TOC entry 1949 (class 0 OID 0)
-- Dependencies: 33
-- Name: dblink_connect_u(text, text); Type: ACL; Schema: public; Owner: -
--

REVOKE ALL ON FUNCTION dblink_connect_u(text, text) FROM PUBLIC;
REVOKE ALL ON FUNCTION dblink_connect_u(text, text) FROM postgres;
GRANT ALL ON FUNCTION dblink_connect_u(text, text) TO postgres;


-- Completed on 2011-06-27 14:24:14 CIT

--
-- PostgreSQL database dump complete
--

