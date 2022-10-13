--
-- PostgreSQL database dump
--

-- Dumped from database version 14.1
-- Dumped by pg_dump version 14.1

-- Started on 2022-10-13 14:44:54

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
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- TOC entry 3660 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 240 (class 1259 OID 54146)
-- Name: akademik; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.akademik (
    id bigint NOT NULL,
    nama_sijil character varying(200),
    nama_insititusi character varying(200),
    tahun integer,
    id_peribadi integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    kod_sijil character varying(10),
    jenis_sijil character varying(100)
);


--
-- TOC entry 239 (class 1259 OID 54145)
-- Name: akademik_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.akademik_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3661 (class 0 OID 0)
-- Dependencies: 239
-- Name: akademik_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.akademik_id_seq OWNED BY public.akademik.id;


--
-- TOC entry 265 (class 1259 OID 54406)
-- Name: calon; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.calon (
    id bigint NOT NULL,
    kumpulan_id integer,
    nokp character varying,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    flag integer,
    delete_id integer,
    email character varying(100)
);


--
-- TOC entry 264 (class 1259 OID 54405)
-- Name: calon_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.calon_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3662 (class 0 OID 0)
-- Dependencies: 264
-- Name: calon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.calon_id_seq OWNED BY public.calon.id;


--
-- TOC entry 234 (class 1259 OID 54090)
-- Name: cuti; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cuti (
    id bigint NOT NULL,
    status character varying(10),
    jenis character varying(100),
    tkh_mula date,
    tkh_akhir date,
    surat_kelulusan character varying(200),
    id_pemohon integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
);


--
-- TOC entry 233 (class 1259 OID 54089)
-- Name: cuti_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.cuti_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3663 (class 0 OID 0)
-- Dependencies: 233
-- Name: cuti_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.cuti_id_seq OWNED BY public.cuti.id;


--
-- TOC entry 215 (class 1259 OID 53947)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- TOC entry 214 (class 1259 OID 53946)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3664 (class 0 OID 0)
-- Dependencies: 214
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 267 (class 1259 OID 54427)
-- Name: files; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.files (
    id bigint NOT NULL,
    content_bytes text,
    ext character varying,
    updated_at timestamp without time zone,
    created_at timestamp without time zone,
    filename character varying
);


--
-- TOC entry 266 (class 1259 OID 54426)
-- Name: files_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.files_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3665 (class 0 OID 0)
-- Dependencies: 266
-- Name: files_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.files_id_seq OWNED BY public.files.id;


--
-- TOC entry 236 (class 1259 OID 54111)
-- Name: harta; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.harta (
    id bigint NOT NULL,
    tkh_akhir_pengisytiharan date,
    surat_kelulusan character varying(200),
    id_pemohon integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
);


--
-- TOC entry 235 (class 1259 OID 54110)
-- Name: harta_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.harta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3666 (class 0 OID 0)
-- Dependencies: 235
-- Name: harta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.harta_id_seq OWNED BY public.harta.id;


--
-- TOC entry 227 (class 1259 OID 54041)
-- Name: jawapan_lnpk; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.jawapan_lnpk (
    id_lnpk integer,
    id_soalan integer,
    jawapan integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
);


--
-- TOC entry 263 (class 1259 OID 54399)
-- Name: kumpulan; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.kumpulan (
    id bigint NOT NULL,
    name character varying(100),
    flag integer,
    delete_id integer,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    status character varying,
    permohonan_id integer
);


--
-- TOC entry 262 (class 1259 OID 54398)
-- Name: kumpulan_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.kumpulan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3667 (class 0 OID 0)
-- Dependencies: 262
-- Name: kumpulan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.kumpulan_id_seq OWNED BY public.kumpulan.id;


--
-- TOC entry 226 (class 1259 OID 54034)
-- Name: lnpk; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.lnpk (
    id integer NOT NULL,
    id_permohonan integer,
    tahun integer,
    nama character varying(200),
    nokp character varying(12),
    skim character varying(100),
    gred character varying(100),
    nama_gred_jawatan character varying(100),
    tempat_bertugas character varying(100),
    tkh_memangku_jawatan_sekarang date,
    jumlah_markah integer,
    tempoh_pengawasan integer,
    nokp_penilai character varying(12),
    nama_penilai character varying(100),
    jawatan_penilai character varying(100),
    jabatan_penilai character varying(100),
    tkh_penilaian date,
    fail_skt character varying(100),
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    penempatan_id integer
);


--
-- TOC entry 248 (class 1259 OID 54209)
-- Name: lnpt_ukp12; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.lnpt_ukp12 (
    id bigint NOT NULL,
    tahun integer,
    markah numeric,
    id_pemohon integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
);


--
-- TOC entry 247 (class 1259 OID 54208)
-- Name: lnpt_ukp12_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.lnpt_ukp12_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3668 (class 0 OID 0)
-- Dependencies: 247
-- Name: lnpt_ukp12_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.lnpt_ukp12_id_seq OWNED BY public.lnpt_ukp12.id;


--
-- TOC entry 210 (class 1259 OID 53921)
-- Name: migrations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- TOC entry 209 (class 1259 OID 53920)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3669 (class 0 OID 0)
-- Dependencies: 209
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 252 (class 1259 OID 54236)
-- Name: pasangan; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pasangan (
    id bigint NOT NULL,
    id_peribadi integer,
    hubungan character varying(10),
    nama character varying(200),
    pekerjaan character varying(100),
    alamat_pejabat character varying(500),
    sijil_perkahwinan character varying(200),
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
);


--
-- TOC entry 251 (class 1259 OID 54235)
-- Name: pasangan_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.pasangan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3670 (class 0 OID 0)
-- Dependencies: 251
-- Name: pasangan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pasangan_id_seq OWNED BY public.pasangan.id;


--
-- TOC entry 213 (class 1259 OID 53940)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


--
-- TOC entry 254 (class 1259 OID 54250)
-- Name: pemohon; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pemohon (
    id bigint NOT NULL,
    id_peribadi integer,
    id_permohonan integer,
    gaji_hakiki numeric,
    nokp_ketua_jabatan character varying(12),
    perakuan_ketua_jabatan integer,
    perakuan_ketua_jabatan_ulasan character varying(255),
    perakuan_ketua_jabatan_jawatan character varying(100),
    perakuan_ketua_jabatan_tkh date,
    perakuan_ketua_jabatan_alamat_pejabat character varying(255),
    pengesahan_perkhidmatan integer,
    pengesahan_perkhidmatan_nokp character varying(12),
    pengesahan_perkhidmatan_jawatan character varying(50),
    pengesahan_perkhidmatan_cawangan character varying(100),
    pengesahan_perkhidmatan_tkh date,
    status character varying(50),
    alasan character varying(300),
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    jawatan character varying,
    kod_jawatan character varying,
    gred character varying,
    tkh_lantikan date,
    tkh_sah_perkhidmatan date,
    alamat_pejabat character varying(500),
    user_id integer
);


--
-- TOC entry 253 (class 1259 OID 54249)
-- Name: pemohon_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.pemohon_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3671 (class 0 OID 0)
-- Dependencies: 253
-- Name: pemohon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pemohon_id_seq OWNED BY public.pemohon.id;


--
-- TOC entry 260 (class 1259 OID 54343)
-- Name: penempatan; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.penempatan (
    id bigint NOT NULL,
    jawatan character varying(100),
    gred character varying(10),
    penempatan character varying(200),
    kod_jawatan character varying(10),
    kod_gred character varying(10),
    kod_waran character varying(20),
    id_peribadi integer,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    created_by character varying,
    updated_by character varying,
    unit character varying(100),
    bahagian character varying(100),
    cawangan character varying(100),
    pejabat character varying(100),
    flag integer DEFAULT 1,
    delete_id integer
);


--
-- TOC entry 259 (class 1259 OID 54342)
-- Name: penempatan_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.penempatan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3672 (class 0 OID 0)
-- Dependencies: 259
-- Name: penempatan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.penempatan_id_seq OWNED BY public.penempatan.id;


--
-- TOC entry 258 (class 1259 OID 54292)
-- Name: penerimaan_ukp11; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.penerimaan_ukp11 (
    id bigint NOT NULL,
    id_pemohon integer,
    status_terima_pemangkuan integer,
    tkh_status_terima_pemangkuan date,
    tkh_kuatkuasa_pemangkuan_pinkform date,
    tkh_lapor_diri date,
    tkh_kuatkuasa_pemangkuan date,
    nama_kerani character varying(100),
    jawatan character varying(100),
    cawangan character varying(100),
    kerani_tkh date,
    nama_ketua_jabatan character varying(100),
    nokp_ketua_jabatan character varying(12),
    jawatan_ketua_jabatan character varying(100),
    cawangan_ketua_jabatan character varying(100),
    ketua_jabatan_tkh date,
    perakuan_ketua_jabatan integer,
    id_surat_pink integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
);


--
-- TOC entry 257 (class 1259 OID 54291)
-- Name: penerimaan_ukp11_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.penerimaan_ukp11_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3673 (class 0 OID 0)
-- Dependencies: 257
-- Name: penerimaan_ukp11_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.penerimaan_ukp11_id_seq OWNED BY public.penerimaan_ukp11.id;


--
-- TOC entry 232 (class 1259 OID 54078)
-- Name: perakuan_pemohon; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.perakuan_pemohon (
    id bigint NOT NULL,
    tatatertib integer,
    tatatertib_tahun_hukuman date,
    tatatertib_jenis_hukuman character varying(200),
    isytihar_harta integer,
    tempoh_percubaan_denda integer,
    tempoh_percubaan_denda_tkh date,
    cuti_tanpa_gaji integer,
    cuti_tanpa_gaji_tkh date,
    perakuan integer,
    perakuan_tkh date,
    id_pemohon integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
);


--
-- TOC entry 231 (class 1259 OID 54077)
-- Name: perakuan_pemohon_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.perakuan_pemohon_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3674 (class 0 OID 0)
-- Dependencies: 231
-- Name: perakuan_pemohon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.perakuan_pemohon_id_seq OWNED BY public.perakuan_pemohon.id;


--
-- TOC entry 261 (class 1259 OID 54354)
-- Name: peribadi_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.peribadi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 228 (class 1259 OID 54054)
-- Name: peribadi; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.peribadi (
    id integer DEFAULT nextval('public.peribadi_id_seq'::regclass) NOT NULL,
    users_id integer,
    nokp character varying(12) NOT NULL,
    nokp_lama character varying(14),
    nama character varying(255),
    jantina character varying(50),
    kod_bangsa character varying(5),
    kod_agama character varying(5),
    kod_taraf_perkahwinan character varying(5),
    kod_warganegara character varying(3),
    kod_negeri_lahir character varying(50),
    polis_tentera character varying(1),
    pinjaman_rumah character varying(1),
    gelaran character varying(50),
    tel_bimbit character varying(15),
    email character varying(200),
    gambar character varying(255),
    program_dasar character varying(50),
    no_gaji character varying(50),
    no_fail_kementerian character varying(50),
    kwsp_pencen character varying(50),
    no_cukai character varying(50),
    no_kwsp character varying(50),
    pilihan_bersara_wajib character varying(50),
    tahun_bersara_wajib character varying(50),
    kategori_skim character varying(50),
    kod_status_aktif character varying(50),
    poskod character varying(10),
    alamat character varying(255),
    bandar character varying(50),
    anugerah character varying(50),
    jenis_perumahan character varying(5),
    negeri character varying(5),
    tkh_lahir timestamp(6) without time zone,
    tahun_bersara_opsyen character varying(10),
    pilihan_bersara_opsyen character varying(10),
    tkh_bersara timestamp(6) without time zone,
    tkh_skim_pencen timestamp(6) without time zone,
    tkh_status_aktif timestamp(6) without time zone,
    level smallint DEFAULT 1,
    alamat_pejabat character varying(255),
    tel_pejabat character varying(15),
    fax_pejabat character varying(15),
    blok character varying(200),
    tkh_katalalu timestamp(6) without time zone,
    data_sah_oleh character varying(12),
    data_tkh_sah timestamp(6) without time zone,
    tkh_bersara_opsyen timestamp(6) without time zone,
    fail_meja character varying(50),
    email_peribadi character varying(200),
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    bangsa character varying(100),
    agama character varying(100),
    taraf_perkahwinan character varying(100),
    negeri_lahir character varying
);


--
-- TOC entry 246 (class 1259 OID 54195)
-- Name: perkhidmatan; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.perkhidmatan (
    id bigint NOT NULL,
    jawatan character varying(100),
    gred character varying(10),
    penempatan character varying(200),
    tkh_mula_berkhidmat date,
    tkh_akhir_berkhidmat date,
    kod_waran character varying(20),
    kod_jawatan character varying(20),
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    id_peribadi integer
);


--
-- TOC entry 245 (class 1259 OID 54194)
-- Name: perkhidmatan_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.perkhidmatan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3675 (class 0 OID 0)
-- Dependencies: 245
-- Name: perkhidmatan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.perkhidmatan_id_seq OWNED BY public.perkhidmatan.id;


--
-- TOC entry 224 (class 1259 OID 54012)
-- Name: permission_role; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.permission_role (
    permission_id bigint NOT NULL,
    role_id bigint NOT NULL
);


--
-- TOC entry 223 (class 1259 OID 54002)
-- Name: permission_user; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.permission_user (
    permission_id bigint NOT NULL,
    user_id bigint NOT NULL,
    user_type character varying(255) NOT NULL
);


--
-- TOC entry 221 (class 1259 OID 53982)
-- Name: permissions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.permissions (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    display_name character varying(255),
    description character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- TOC entry 220 (class 1259 OID 53981)
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3676 (class 0 OID 0)
-- Dependencies: 220
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;


--
-- TOC entry 230 (class 1259 OID 54069)
-- Name: permohonan_ukp12; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.permohonan_ukp12 (
    id bigint NOT NULL,
    nokp_urusetia character varying(12),
    is_bin integer,
    jenis character varying(10),
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    jawatan character varying(100),
    kod_jawatan character varying(50),
    gred character varying(10),
    kod_disiplin character varying(50),
    disiplin character varying(100),
    tajuk character varying
);


--
-- TOC entry 229 (class 1259 OID 54068)
-- Name: permohonan_ukp12_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.permohonan_ukp12_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3677 (class 0 OID 0)
-- Dependencies: 229
-- Name: permohonan_ukp12_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.permohonan_ukp12_id_seq OWNED BY public.permohonan_ukp12.id;


--
-- TOC entry 217 (class 1259 OID 53959)
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- TOC entry 216 (class 1259 OID 53958)
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3678 (class 0 OID 0)
-- Dependencies: 216
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- TOC entry 269 (class 1259 OID 78405)
-- Name: pertubuhan; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pertubuhan (
    id bigint NOT NULL,
    nama character varying,
    jawatan character varying,
    tahun integer,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    pemohon_id integer,
    created_by character varying,
    updated_by character varying,
    flag integer,
    delete_id integer
);


--
-- TOC entry 268 (class 1259 OID 78404)
-- Name: pertubuhan_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.pertubuhan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3679 (class 0 OID 0)
-- Dependencies: 268
-- Name: pertubuhan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pertubuhan_id_seq OWNED BY public.pertubuhan.id;


--
-- TOC entry 238 (class 1259 OID 54123)
-- Name: pinjaman_pendidikan; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.pinjaman_pendidikan (
    id bigint NOT NULL,
    status smallint,
    nama_institusi character varying(100),
    tkh_mula_pinjaman date,
    tkh_akhir_pinjaman date,
    tkh_mula_bayaran date,
    tkh_awal date,
    tkh_akhir date,
    jumlah_pinjaman numeric,
    tahun_pinjaman integer,
    tahun_mula_bayaran smallint,
    tahun_selesai_bayaran smallint,
    surat_perakuan character varying(200),
    id_pemohon integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
);


--
-- TOC entry 237 (class 1259 OID 54122)
-- Name: pinjaman_pendidikan_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.pinjaman_pendidikan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3680 (class 0 OID 0)
-- Dependencies: 237
-- Name: pinjaman_pendidikan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pinjaman_pendidikan_id_seq OWNED BY public.pinjaman_pendidikan.id;


--
-- TOC entry 242 (class 1259 OID 54160)
-- Name: professional; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.professional (
    id bigint NOT NULL,
    nama_sijil character varying(200),
    badan_professional character varying(200),
    no_pendaftaran character varying(100),
    tahun integer,
    id_peribadi integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    flag integer,
    delete_id integer,
    kod_sijil character varying(10),
    jenis_sijil character varying(100)
);


--
-- TOC entry 241 (class 1259 OID 54159)
-- Name: professional_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.professional_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3681 (class 0 OID 0)
-- Dependencies: 241
-- Name: professional_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.professional_id_seq OWNED BY public.professional.id;


--
-- TOC entry 222 (class 1259 OID 53992)
-- Name: role_user; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.role_user (
    role_id bigint NOT NULL,
    user_id bigint NOT NULL,
    user_type character varying(255) NOT NULL
);


--
-- TOC entry 219 (class 1259 OID 53971)
-- Name: roles; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    display_name character varying(255),
    description character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- TOC entry 218 (class 1259 OID 53970)
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3682 (class 0 OID 0)
-- Dependencies: 218
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- TOC entry 244 (class 1259 OID 54174)
-- Name: sijil_kompeten; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.sijil_kompeten (
    id bigint NOT NULL,
    nama_sijil character varying(200),
    tahap integer,
    id_peribadi integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    kod_sijil character varying(10),
    jenis_sijil character varying(100)
);


--
-- TOC entry 243 (class 1259 OID 54173)
-- Name: sijil_kompeten_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.sijil_kompeten_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3683 (class 0 OID 0)
-- Dependencies: 243
-- Name: sijil_kompeten_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.sijil_kompeten_id_seq OWNED BY public.sijil_kompeten.id;


--
-- TOC entry 225 (class 1259 OID 54027)
-- Name: soalan_lnpk; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.soalan_lnpk (
    id integer NOT NULL,
    soalan character varying(300),
    susunan integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
);


--
-- TOC entry 256 (class 1259 OID 54269)
-- Name: surat_pink; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.surat_pink (
    id bigint NOT NULL,
    no_bil character varying(100),
    no_ruj character varying(100),
    no_fail character varying(100),
    no_jilid character varying(100),
    id_permohon integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    no_surat character varying,
    tkh_lapor_diri date,
    fail_id integer
);


--
-- TOC entry 255 (class 1259 OID 54268)
-- Name: surat_pink_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.surat_pink_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3684 (class 0 OID 0)
-- Dependencies: 255
-- Name: surat_pink_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.surat_pink_id_seq OWNED BY public.surat_pink.id;


--
-- TOC entry 250 (class 1259 OID 54224)
-- Name: tatatertib_ukp12; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.tatatertib_ukp12 (
    id bigint NOT NULL,
    pengesahan_tindakan character varying(10),
    jenis_hukuman character varying(100),
    tkh_hukuman date,
    id_pemohon integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
);


--
-- TOC entry 249 (class 1259 OID 54223)
-- Name: tatatertib_ukp12_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.tatatertib_ukp12_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3685 (class 0 OID 0)
-- Dependencies: 249
-- Name: tatatertib_ukp12_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.tatatertib_ukp12_id_seq OWNED BY public.tatatertib_ukp12.id;


--
-- TOC entry 212 (class 1259 OID 53928)
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    nokp character varying(255),
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    type integer,
    created_by character varying(100),
    updated_by character varying(100),
    flag integer,
    delete_id integer
);


--
-- TOC entry 211 (class 1259 OID 53927)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3686 (class 0 OID 0)
-- Dependencies: 211
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 3336 (class 2604 OID 54149)
-- Name: akademik id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.akademik ALTER COLUMN id SET DEFAULT nextval('public.akademik_id_seq'::regclass);


--
-- TOC entry 3349 (class 2604 OID 54409)
-- Name: calon id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.calon ALTER COLUMN id SET DEFAULT nextval('public.calon_id_seq'::regclass);


--
-- TOC entry 3333 (class 2604 OID 54093)
-- Name: cuti id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cuti ALTER COLUMN id SET DEFAULT nextval('public.cuti_id_seq'::regclass);


--
-- TOC entry 3324 (class 2604 OID 53950)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 3350 (class 2604 OID 54430)
-- Name: files id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.files ALTER COLUMN id SET DEFAULT nextval('public.files_id_seq'::regclass);


--
-- TOC entry 3334 (class 2604 OID 54114)
-- Name: harta id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.harta ALTER COLUMN id SET DEFAULT nextval('public.harta_id_seq'::regclass);


--
-- TOC entry 3348 (class 2604 OID 54402)
-- Name: kumpulan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.kumpulan ALTER COLUMN id SET DEFAULT nextval('public.kumpulan_id_seq'::regclass);


--
-- TOC entry 3340 (class 2604 OID 54212)
-- Name: lnpt_ukp12 id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.lnpt_ukp12 ALTER COLUMN id SET DEFAULT nextval('public.lnpt_ukp12_id_seq'::regclass);


--
-- TOC entry 3322 (class 2604 OID 53924)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 3342 (class 2604 OID 54239)
-- Name: pasangan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pasangan ALTER COLUMN id SET DEFAULT nextval('public.pasangan_id_seq'::regclass);


--
-- TOC entry 3343 (class 2604 OID 54253)
-- Name: pemohon id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pemohon ALTER COLUMN id SET DEFAULT nextval('public.pemohon_id_seq'::regclass);


--
-- TOC entry 3346 (class 2604 OID 54346)
-- Name: penempatan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penempatan ALTER COLUMN id SET DEFAULT nextval('public.penempatan_id_seq'::regclass);


--
-- TOC entry 3345 (class 2604 OID 54295)
-- Name: penerimaan_ukp11 id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penerimaan_ukp11 ALTER COLUMN id SET DEFAULT nextval('public.penerimaan_ukp11_id_seq'::regclass);


--
-- TOC entry 3332 (class 2604 OID 54081)
-- Name: perakuan_pemohon id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perakuan_pemohon ALTER COLUMN id SET DEFAULT nextval('public.perakuan_pemohon_id_seq'::regclass);


--
-- TOC entry 3339 (class 2604 OID 54198)
-- Name: perkhidmatan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perkhidmatan ALTER COLUMN id SET DEFAULT nextval('public.perkhidmatan_id_seq'::regclass);


--
-- TOC entry 3328 (class 2604 OID 53985)
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- TOC entry 3331 (class 2604 OID 54072)
-- Name: permohonan_ukp12 id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permohonan_ukp12 ALTER COLUMN id SET DEFAULT nextval('public.permohonan_ukp12_id_seq'::regclass);


--
-- TOC entry 3326 (class 2604 OID 53962)
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- TOC entry 3351 (class 2604 OID 78408)
-- Name: pertubuhan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pertubuhan ALTER COLUMN id SET DEFAULT nextval('public.pertubuhan_id_seq'::regclass);


--
-- TOC entry 3335 (class 2604 OID 54126)
-- Name: pinjaman_pendidikan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pinjaman_pendidikan ALTER COLUMN id SET DEFAULT nextval('public.pinjaman_pendidikan_id_seq'::regclass);


--
-- TOC entry 3337 (class 2604 OID 54163)
-- Name: professional id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.professional ALTER COLUMN id SET DEFAULT nextval('public.professional_id_seq'::regclass);


--
-- TOC entry 3327 (class 2604 OID 53974)
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- TOC entry 3338 (class 2604 OID 54177)
-- Name: sijil_kompeten id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sijil_kompeten ALTER COLUMN id SET DEFAULT nextval('public.sijil_kompeten_id_seq'::regclass);


--
-- TOC entry 3344 (class 2604 OID 54272)
-- Name: surat_pink id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.surat_pink ALTER COLUMN id SET DEFAULT nextval('public.surat_pink_id_seq'::regclass);


--
-- TOC entry 3341 (class 2604 OID 54227)
-- Name: tatatertib_ukp12 id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tatatertib_ukp12 ALTER COLUMN id SET DEFAULT nextval('public.tatatertib_ukp12_id_seq'::regclass);


--
-- TOC entry 3323 (class 2604 OID 53931)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3625 (class 0 OID 54146)
-- Dependencies: 240
-- Data for Name: akademik; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3650 (class 0 OID 54406)
-- Dependencies: 265
-- Data for Name: calon; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.calon VALUES (2, 1, '800120035909', '2022-07-27 02:25:49', '2022-07-27 02:25:49', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (3, 1, '810424095192', '2022-07-27 02:25:49', '2022-07-27 02:25:49', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (1, 1, '830910135346', '2022-07-27 02:25:49', '2022-07-27 08:04:41', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (4, 2, '821031135521', '2022-09-12 11:12:40', '2022-09-12 11:12:40', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (5, 2, '820314145821', '2022-09-12 11:12:40', '2022-09-12 11:12:40', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (6, 2, '870104145757', '2022-09-12 11:12:40', '2022-09-12 11:12:40', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (7, 3, '840623025821', '2022-09-14 10:41:40', '2022-09-14 10:41:40', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (8, 3, '830416145901', '2022-09-14 10:41:40', '2022-09-14 10:41:40', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (9, 3, '850525086451', '2022-09-14 10:41:40', '2022-09-14 10:41:40', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (10, 3, '810912025505', '2022-09-14 10:41:40', '2022-09-14 10:41:40', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (11, 3, '851018025077', '2022-09-14 10:41:40', '2022-09-14 10:41:40', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (12, 4, '790418145821', '2022-10-05 11:34:16', '2022-10-05 11:34:16', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (13, 4, '770907145621', '2022-10-05 11:34:16', '2022-10-05 11:34:16', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (14, 4, '771222025701', '2022-10-05 11:34:16', '2022-10-05 11:34:16', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (15, 5, '830801025623', '2022-10-13 11:12:13', '2022-10-13 11:12:13', '900919099999', '900919099999', 1, 0, NULL);
INSERT INTO public.calon VALUES (16, 5, '820620145264', '2022-10-13 11:12:13', '2022-10-13 11:12:13', '900919099999', '900919099999', 1, 0, NULL);


--
-- TOC entry 3619 (class 0 OID 54090)
-- Dependencies: 234
-- Data for Name: cuti; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3600 (class 0 OID 53947)
-- Dependencies: 215
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3652 (class 0 OID 54427)
-- Dependencies: 267
-- Data for Name: files; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3621 (class 0 OID 54111)
-- Dependencies: 236
-- Data for Name: harta; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3612 (class 0 OID 54041)
-- Dependencies: 227
-- Data for Name: jawapan_lnpk; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3648 (class 0 OID 54399)
-- Dependencies: 263
-- Data for Name: kumpulan; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.kumpulan VALUES (1, 'kumpulan 1', 1, 0, '2022-07-27 02:25:49', '2022-07-27 07:55:42', '900919099999', '900919099999', 'NEW', NULL);
INSERT INTO public.kumpulan VALUES (2, 'yuiortyuio', 1, 0, '2022-09-12 11:12:40', '2022-09-12 11:43:20', '900919099999', '900919099999', 'PROCESSED', NULL);
INSERT INTO public.kumpulan VALUES (3, 'kumpulan cubaan 1', 1, 0, '2022-09-14 10:41:40', '2022-09-14 10:53:30', '900919099999', '900919099999', 'PROCESSED', NULL);
INSERT INTO public.kumpulan VALUES (4, 'MEKANIKAL 48', 1, 0, '2022-10-05 11:34:16', '2022-10-07 16:24:06', '900919099999', '900919099999', 'PROCESSED', 7);
INSERT INTO public.kumpulan VALUES (5, 'ELETRIK J44', 1, 0, '2022-10-13 11:12:13', '2022-10-13 11:12:46', '900919099999', '900919099999', 'PROCESSED', 8);


--
-- TOC entry 3611 (class 0 OID 54034)
-- Dependencies: 226
-- Data for Name: lnpk; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3633 (class 0 OID 54209)
-- Dependencies: 248
-- Data for Name: lnpt_ukp12; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3595 (class 0 OID 53921)
-- Dependencies: 210
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.migrations VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO public.migrations VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO public.migrations VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO public.migrations VALUES (5, '2022_06_24_014613_laratrust_setup_tables', 2);


--
-- TOC entry 3637 (class 0 OID 54236)
-- Dependencies: 252
-- Data for Name: pasangan; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3598 (class 0 OID 53940)
-- Dependencies: 213
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3639 (class 0 OID 54250)
-- Dependencies: 254
-- Data for Name: pemohon; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pemohon VALUES (1, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LL', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (2, 16, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-12 11:46:39', '2022-10-12 11:46:39', '790418145821', '790418145821', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (3, 17, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 09:23:14', '2022-10-13 09:23:14', '771222025701', '771222025701', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (4, 18, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 10:55:52', '2022-10-13 10:55:52', '860211335522', '860211335522', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (5, 19, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 10:56:11', '2022-10-13 10:56:11', '860211335522', '860211335522', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (6, 20, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 10:56:19', '2022-10-13 10:56:19', '860211335522', '860211335522', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (7, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 10:57:10', '2022-10-13 10:57:10', '860211335522', '860211335522', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (9, 23, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 10:57:28', '2022-10-13 10:57:28', '860211335522', '860211335522', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (12, 26, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 11:00:09', '2022-10-13 11:00:09', '860211335522', '860211335522', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (13, 27, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 11:03:07', '2022-10-13 11:03:07', '860211335522', '860211335522', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (14, 28, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 11:03:14', '2022-10-13 11:03:14', '860211335522', '860211335522', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (15, 29, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 11:03:21', '2022-10-13 11:03:21', '860211335522', '860211335522', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (17, 31, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 11:15:08', '2022-10-13 11:15:08', '830801025623', '830801025623', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (18, 32, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 11:16:04', '2022-10-13 11:16:04', '820620145264', '820620145264', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.pemohon VALUES (19, 33, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BH', NULL, 1, 0, '2022-10-13 11:31:16', '2022-10-13 11:31:16', '860211335522', '860211335522', NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3645 (class 0 OID 54343)
-- Dependencies: 260
-- Data for Name: penempatan; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.penempatan VALUES (1, 'PEN. PEGAWAI TEKNOLOGI MAKLUMAT', 'FA29', NULL, 'BF001', 'FA29', '020307080000', 3, '2022-07-13 04:05:28', '2022-07-13 04:05:28', 'MYKJ', 'MYKJ', 'Unit Sistem Aplikasi', 'Bahagian Teknologi Maklumat', 'Cawangan Dasar dan Pengurusan Korporat', 'Ibu Pejabat JKR Malaysia', 1, 0);
INSERT INTO public.penempatan VALUES (2, 'JURUTERA AWAM', 'J44', NULL, 'AJ005', 'J44', '020307020300', NULL, '2022-09-14 09:52:46', '2022-09-14 09:52:46', 'MYKJ', 'MYKJ', 'Unit Pengurusan Aset', 'Bahagian Teknologi Maklumat', 'Cawangan Dasar dan Pengurusan Korporat', 'Ibu Pejabat JKR Malaysia', 1, 0);
INSERT INTO public.penempatan VALUES (3, 'JURUTERA AWAM', 'J44', NULL, 'AJ005', 'J44', '020307020300', NULL, '2022-09-14 09:54:31', '2022-09-14 09:54:31', 'MYKJ', 'MYKJ', 'Unit Pengurusan Aset', 'Bahagian Teknologi Maklumat', 'Cawangan Dasar dan Pengurusan Korporat', 'Ibu Pejabat JKR Malaysia', 1, 0);
INSERT INTO public.penempatan VALUES (4, 'JURUTERA AWAM', 'J44', NULL, 'AJ005', 'J44', '020307020300', NULL, '2022-09-14 09:58:41', '2022-09-14 09:58:41', 'MYKJ', 'MYKJ', 'Unit Pengurusan Aset', 'Bahagian Teknologi Maklumat', 'Cawangan Dasar dan Pengurusan Korporat', 'Ibu Pejabat JKR Malaysia', 1, 0);
INSERT INTO public.penempatan VALUES (5, 'JURUTERA AWAM', 'J44', NULL, 'AJ005', 'J44', '020307020300', 4, '2022-09-14 10:00:09', '2022-09-14 10:00:09', 'MYKJ', 'MYKJ', 'Unit Pengurusan Aset', 'Bahagian Teknologi Maklumat', 'Cawangan Dasar dan Pengurusan Korporat', 'Ibu Pejabat JKR Malaysia', 1, 0);
INSERT INTO public.penempatan VALUES (6, 'JURUTERA AWAM', 'J44', NULL, 'AJ005', 'J44', '010302000000', 5, '2022-09-14 10:58:16', '2022-09-14 10:58:16', 'MYKJ', 'MYKJ', 'Bahagian Perancang Jalan', 'Bahagian Perancang Jalan', 'Kementerian Kerja Raya (Dasar dan Pembangunan)', 'Kementerian Kerja Raya Malaysia', 1, 0);
INSERT INTO public.penempatan VALUES (7, 'JURUTERA MEKANIKAL', 'J52', NULL, 'AJ006', 'J52', '020400000000', 6, '2022-09-30 10:07:49', '2022-09-30 10:07:49', 'MYKJ', 'MYKJ', 'Pusat Kecemerlangan Kejuruteraan dan Teknologi JKR', 'Pusat Kecemerlangan Kejuruteraan dan Teknologi JKR', 'Pusat Kecemerlangan Kejuruteraan dan Teknologi JKR', 'Lot PT 3287, Mukim Taboh Naning,', 1, 0);
INSERT INTO public.penempatan VALUES (8, 'JURUTERA AWAM', 'J48', NULL, 'AJ005', 'J48', '050618000000', 7, '2022-09-30 11:23:08', '2022-09-30 11:23:08', 'MYKJ', 'MYKJ', 'Bahagian Kejuruteraan Awam Kesihatan/Pendidikan (Khidmat Rekabentuk)', 'Bahagian Kejuruteraan Awam Kesihatan/Pendidikan (Khidmat Rekabentuk)', 'Cawangan Kejuruteraan Awam dan Struktur', 'Tingkat 4 - 10, Blok G', 1, 0);
INSERT INTO public.penempatan VALUES (9, 'PEMBANTU TADBIR', 'N19', NULL, 'CN001', 'N19', '080104000000', 8, '2022-09-30 11:25:37', '2022-09-30 11:25:37', 'MYKJ', 'MYKJ', 'JKR Daerah Kota Tinggi', 'JKR Daerah Kota Tinggi', 'Jabatan Kerja Raya Negeri Johor', 'Aras 4, Bangunan Dato Abdul Rahman Andak', 1, 0);
INSERT INTO public.penempatan VALUES (10, 'JURUTEKNIK AWAM', 'J22', NULL, 'CJ001', 'J22', '040502000000', 9, '2022-10-03 10:52:44', '2022-10-03 10:52:44', 'MYKJ', 'MYKJ', 'Bahagian Pengurusan Portfolio (PMO)', 'Bahagian Pengurusan Portfolio (PMO)', 'Cawangan Kerja Pendidikan', 'Ibu Pejabat JKR Malaysia', 1, 0);
INSERT INTO public.penempatan VALUES (11, 'JURUTERA AWAM', 'VU7', NULL, 'AJ005', 'VU7', '020202000000', 10, '2022-10-03 10:53:09', '2022-10-03 10:53:09', 'MYKJ', 'MYKJ', 'Bahagian Pengurusan Projek Kompleks (BPPK)', 'Bahagian Pengurusan Projek Kompleks (BPPK)', 'Cawangan Perancangan Aset Bersepadu', 'Ibu Pejabat JKR Malaysia', 1, 0);
INSERT INTO public.penempatan VALUES (12, 'JURUTERA AWAM', 'J44', NULL, 'AJ005', 'J44', '072101010100', 11, '2022-10-05 10:48:21', '2022-10-05 10:48:21', 'MYKJ', 'MYKJ', 'Unit Audit Dalam', 'Pengurusan Am', 'Kementerian Perumahan dan Kerajaan Tempatan', 'Bahagian Pengurusan Sumber Manusia', 1, 0);
INSERT INTO public.penempatan VALUES (13, 'JURUTERA MEKANIKAL', 'J44', NULL, 'AJ006', 'J44', '070201010200', 12, '2022-10-05 11:08:14', '2022-10-05 11:08:14', 'MYKJ', 'MYKJ', 'Pengurusan', 'Pengurusan Dasar Keselamatan Dalam Negeri', 'Kementerian Dalam Negeri', 'Bahagian Pembangunan Sumber Manusia', 1, 0);
INSERT INTO public.penempatan VALUES (14, 'JURUUKUR BAHAN', 'J54', NULL, 'AJ003', 'J54', '020500000000', 13, '2022-10-05 11:20:21', '2022-10-05 11:20:21', 'MYKJ', 'MYKJ', 'JKR Wilayah Persekutuan Putrajaya', 'JKR Wilayah Persekutuan Putrajaya', 'JKR Wilayah Persekutuan Putrajaya', 'Kompleks F, Blok F7,', 1, 0);
INSERT INTO public.penempatan VALUES (15, 'JURUTERA MEKANIKAL', 'J48', NULL, 'AJ006', 'J48', '020305060000', 14, '2022-10-05 11:44:22', '2022-10-05 11:44:22', 'MYKJ', 'MYKJ', 'Unit Prestasi', 'Bahagian Pengurusan Sumber Manusia', 'Cawangan Dasar dan Pengurusan Korporat', 'Ibu Pejabat JKR Malaysia', 1, 0);
INSERT INTO public.penempatan VALUES (16, 'JURUTERA MEKANIKAL', 'J48', NULL, 'AJ006', 'J48', '020203040000', 15, '2022-10-11 12:03:59', '2022-10-11 12:03:59', 'MYKJ', 'MYKJ', 'Unit Pembangunan Kapasiti & Transformasi (UPKT)', 'Bahagian Perundingan Pengurusan Aset (BPPA)', 'Cawangan Perancangan Aset Bersepadu', 'Ibu Pejabat JKR Malaysia', 1, 0);
INSERT INTO public.penempatan VALUES (17, 'JURUTERA ELEKTRIK', 'J44', NULL, 'AJ007', 'J44', '050304010000', 31, '2022-10-13 11:15:08', '2022-10-13 11:15:08', 'MYKJ', 'MYKJ', 'Unit Perunding Reka Bentuk Kesihatan 1', 'Bahagian Perunding Reka Bentuk', 'Cawangan Kejuruteraan Elektrik', 'Tingkat 11, Blok G', 1, 0);
INSERT INTO public.penempatan VALUES (18, 'JURUTERA ELEKTRIK', 'J44', NULL, 'AJ007', 'J44', '040202000000', 32, '2022-10-13 11:16:04', '2022-10-13 11:16:04', 'MYKJ', 'MYKJ', 'Bahagian Pengurusan Portfolio', 'Bahagian Pengurusan Portfolio', 'Cawangan Kerja Bangunan Am 1', 'Ibu Pejabat JKR Malaysia', 1, 0);


--
-- TOC entry 3643 (class 0 OID 54292)
-- Dependencies: 258
-- Data for Name: penerimaan_ukp11; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3617 (class 0 OID 54078)
-- Dependencies: 232
-- Data for Name: perakuan_pemohon; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3613 (class 0 OID 54054)
-- Dependencies: 228
-- Data for Name: peribadi; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.peribadi VALUES (4, 13, '840924035329', NULL, 'MOHD AFNAN BIN ABDULLAH', 'L', 'M', 'I', 'KA', 'Y', '03', 'B', 'B', 'Ir.', '0139226654', 'afnan@jkr.gov.my', 'foto/840924035329.jpg', 'SSM', '20203354', 'KPKR/PP/JA 2489', 'K', '', '', '60', '2044', 'JABATAN', '1', '50400', 'BLOK A2-23A-3, TITIWANGSA SENTRAL, JALAN PANGKOR OFF JALAN PEKELILING,', 'KUALA LUMPUR', '', 'N', '14', '1984-09-24 00:00:00', ' ', '40', '2044-09-24 00:00:00', NULL, '2009-02-26 00:00:00', 51, 'unit pengurusan aset,
bahagian teknologi maklumat,
CAW DASAR DAN PENGURUSAN KORPORAT,IBU PEJABAT JKR Malaysia,
Tingkat 14, Blok F
Jalan Sultan Salahuddin
50480 KUALA LUMPUR  ', '03-26108502', '', 'F', NULL, '591224105504', '2011-04-05 00:00:00', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-09-14 10:00:09', '2022-09-14 10:00:09', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Kelantan');
INSERT INTO public.peribadi VALUES (5, 14, '850525086451', NULL, 'AHMAD FAIZ BIN A. RAUP', 'L', 'M', 'I', 'KA', 'Y', '08', 'B', 'B', 'Ir.', '012-775 2864', 'faiz@kkr.gov.my', 'foto/850525086451.jpg', 'SSM', '20195080', 'KPKR/PP/JA 2684', 'P', '', '16196678', '60', '2045', 'JABATAN', '1', '43000', 'NO. 20 Jalan bangi avenue 6/3
taman bangi avenue
', 'kajang', '', 'N', '10', '1985-05-25 00:00:00', ' ', '40', '2045-05-25 00:00:00', NULL, '2009-01-28 00:00:00', 1, 'cawangan pengangkutan bandar & data trafik
bahagian perancang jalan
kementerian kerja raya', '03-27714216', '', 'A', NULL, '850525086451', '2010-12-14 00:00:00', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-09-14 10:58:16', '2022-09-14 10:58:16', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Perak');
INSERT INTO public.peribadi VALUES (6, 15, '741029055039', 'A2870195', 'AZAHAR B MOHD', 'L', 'M', 'I', 'KA', 'Y', '05', 'B', 'B', 'Ir.', '013-6074640', 'azaharm@jkr.gov.my', 'foto/741029055039.jpg', 'SSM', '14380026', 'JKR/PP/JM/273', 'P', '', '', '58', '2032', 'JABATAN', '1', '50480', 'D-5-1 KUATERS KERAJAAN,NO.1 JALAN DUTAMAS 3', 'KUALA LUMPUR', '', 'K', '14', '1974-10-29 00:00:00', '2014 ', '40', '2032-10-29 00:00:00', NULL, '2007-05-15 00:00:00', 1, 'CAWANGAN KEJURUTERAAN MEKANIKAL, ip jkR,
UNIT PAKAR PEMBANGUNAN LOJI & KUARI,
TINGKAT 24-28, MENARA KKR2, BLOK G,
NO.6 JALAN SULTAN SALAHUDDIN,
50480 KUALA LUMPUR', '03-26189511', '03-26189510', 'G', NULL, '600610025248', '2017-05-23 16:23:36.895303', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-09-30 10:07:49', '2022-09-30 10:07:49', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Negeri Sembilan');
INSERT INTO public.peribadi VALUES (7, 16, '790829016522', NULL, 'ROZIANA BT MAHMOOD', 'P', 'M', 'I', 'KA', 'Y', '01', 'B', 'B', 'Ir.', '0122661826', 'mroziana@jkr.gov.my', 'foto/790829016522.jpg', 'SSM', '20191827', 'KPKR/PP/JA 2712', 'K', '', '14386147', '58', '2037', 'JABATAN', '1', '62050', 'No. 13, JALAN P15 H4/3, PRESINT 15', 'WILAYAH PERSEKUTUAN', '', 'K', '16', '1979-08-29 00:00:00', '2019 ', '40', '2037-08-29 00:00:00', NULL, '2009-02-24 00:00:00', 1, 'Bahagian Kejuruteraan Awam (Kesihatan dan Pendidikan)
Jabatan Kerja Raya Malaysia,
Aras 6, Menara Kerja Raya (Blok G)
Ibu Pejabat JKR Malaysia
Jalan Sultan Salahuddin
50480 Kuala Lumpur', '03-26189063', '03-8891 3491', '0', '2010-10-26 00:00:00', '840721146483', '2013-04-18 12:06:02.389571', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-09-30 11:23:08', '2022-09-30 11:23:08', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Johor');
INSERT INTO public.peribadi VALUES (8, 17, '720213015384', 'A2089420', 'SAADIAH BT ABDUL WAHAB', 'P', 'M', 'I', 'KA', 'Y', '01', 'B', 'T', '', '019-7619196', 'saadiah_mimi@yahoo.com', 'foto/720213015384.jpg', 'SSM', '11090230', 'Per.3/371', 'P', 'SG04075807-09(0)', '12031019', '60', '2032', 'GUNASAMA', '1', '81800', 'NO. 76, JALAN PULAI 10,
TAMAN BUKIT TIRAM,', 'ULU TIRAM', '', 'K', '01', '1972-02-13 00:00:00', ' ', '40', '2032-02-13 00:00:00', '2000-12-01 00:00:00', '1998-03-01 00:00:00', 1, 'JABATAN KERJA RAYA DAERAH KOTA TINGGI,
JALAN ABDUL AZIZ,
81900 kota tinggi, johor', '07-8831040', '07-8831011', '0', '2012-12-05 00:00:00', '720213015384', '2011-07-14 00:00:00', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-09-30 11:25:37', '2022-09-30 11:25:37', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Johor');
INSERT INTO public.peribadi VALUES (9, 18, '560822085628', '5053100', 'SAROJINI A/P KANDIAH', 'P', 'L', 'H', 'JA', 'Y', '08', 'B', 'O', '', '', 'Sarojini@jkr.gov.my', 'foto/560822085628.jpg', 'SSM', '970640', 'P1/13432', 'P', 'SG-3123852-01', '2047573', '55', '2011', 'JABATAN', '4', '47400', '47, JLN.SS23/31,TAMAN SEA ', 'PETALING JAYA', '', 'O', '10', '1956-08-22 00:00:00', '1996 ', '40', '2011-08-22 00:00:00', '1990-06-01 00:00:00', '2011-08-22 00:00:00', 1, 'CAW.KEJ.AWAM STRUKTUR DAN JAMBATAN IBU PEJABAT JKR MALAYSIA TING.15, CENTRE POINT NORTH, MIDVALLEY CITY LINGKARAN SYED PUTRA  59200 KUALA LAUMPUR', '', '', 'mdcpn', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-03 10:52:44', '2022-10-03 10:52:44', 'MYKJ', 'MYKJ', 'LAIN', 'HINDU', 'JANDA', 'Perak');
INSERT INTO public.peribadi VALUES (10, 19, '730909035112', 'A2473218', 'ATIKAH BT ZAKARIA @ YA', 'P', 'M', 'I', 'KA', 'Y', '03', 'B', 'T', 'Ir. Hajjah', '012-2803216', 'atikahz@jkr.gov.my', 'foto/730909035112.jpg', 'SSM', '3869898', 'PER.1/23662', 'P', 'SG-05486078-04(1)', '14430811', '60', '2033', 'JABATAN', '1', '43650', 'NO 43, JALAN 7/3D, SEKSYEN 7, BANDAR BARU BANGI', 'KAJANG', '', 'N', '10', '1973-09-09 00:00:00', ' ', '40', '2033-09-09 00:00:00', '2009-08-01 00:00:00', '2007-05-15 00:00:00', 1, 'BAHAGIAN JAMBATAN, CAW JALAN, MENARA PJD TINGKAT 21', '03-40518137', '03-2691 2835', 'F', '2015-03-17 15:59:24.398167', '570128065204', '2011-01-14 00:00:00', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-10-03 10:53:09', '2022-10-03 10:53:09', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Kelantan');
INSERT INTO public.peribadi VALUES (11, 20, '830416145901', NULL, 'AHMAD FIRDAUS BIN MD NOR', 'L', 'M', 'I', 'KA', 'Y', '14', 'B', 'B', '', '0133949040', 'ahmad_firdaus@kpkt.gov.my', 'foto/830416145901.jpg', 'SSM', '20195200', 'KPKR/PP/JA 2515', 'K', 'SG20202004050', '17934866', '58', '2041', 'JABATAN', '1', '47820', 'E- 05 - 01, FLORA DAMANSARABANDAR DAMANSARA PERDANA47820 PETALING JAYASELANGOR DARUL EHSAN', 'PETALING JAYA', '', 'N', '10', '1983-04-16 00:00:00', '2023 ', '40', '2041-04-16 00:00:00', NULL, '2009-01-23 00:00:00', 1, 'unit portfolio office
bahagian korporat jkr negeri selangor
seksyen 17, shah alam
selangor darul ehsan', '03-88915123	', '', '0', NULL, '840827065358', '2015-03-12 07:35:09.08289', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-10-05 10:48:21', '2022-10-05 10:48:21', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'WP Kuala Lumpur');
INSERT INTO public.peribadi VALUES (12, 21, '820823105625', NULL, 'ISMAIL BIN HUSAINI', 'L', 'M', 'I', 'KA', 'Y', '10', 'B', 'B', '', '012-3324719', 'ismail_husaini@Jkr.gov.my', NULL, '', NULL, '', 'O', '', '', '60', '2042', NULL, '1', '42700', 'No 24, Taman mawar 21, jalan sg lang ', 'banting', '', 'N', '10', '1982-08-23 00:00:00', '1982 ', NULL, '2042-08-23 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'JKr wp putrajaya
aras3, blok c7, kompleks ,
pusat pentadbiran kerajaan persekutuan
62582 putrajaya', '03-88856963', '0388856998 ', '0', NULL, '600610025248', '2017-11-01 10:19:51.355232', '0001-01-01 00:00:00', NULL, '@yahoo.com', 1, 0, '2022-10-05 11:08:14', '2022-10-05 11:08:14', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Selangor');
INSERT INTO public.peribadi VALUES (13, 22, '640911065514', '7468387', 'FADZIAH BT JHAYA', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'T', '', '012-2271109', 'fadziah@jkr.gov.my', 'foto/640911065514.jpg', 'SSM', '03858883', 'KPKR/PP JUB', 'P', 'SG0337622807(1)', '10849506', '60', '2024', 'JABATAN', '1', '50480', '2580/1 JALAN SELANGOR, BUKIT PERSEKUTUAN,50480 ', 'kuala lumpur', '', 'K', '14', '1964-09-11 00:00:00', ' ', '40', '2024-09-11 00:00:00', '2009-08-01 00:00:00', '0001-01-01 00:00:00', 1, 'Cawangan kerja pendidikan,
tingkat 9 maju tower,
1001 janal sultan ismail,
50250 kuala lumpur.', '03-26165484', '0326916410', 'MJUNC', NULL, '830228045268', '2011-01-26 00:00:00', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-10-05 11:20:21', '2022-10-05 11:20:21', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (14, 23, '790418145821', NULL, 'IZZAT ZUMAIRI BIN CHE HARUN', 'L', 'M', 'I', 'KA', 'Y', '14', 'B', 'T', 'Ir.', '0163764000', 'izzat@jkr.gov.my', 'foto/790418145821.jpg', 'SSM', '14387443', 'KPKR/PP/JM 328', 'P', '', '16349072', '60', '2039', 'JABATAN', '1', '40170', 'No 58 Jalan Pulau lumut u10/76h, alam budiman, seksyen u10', 'shah alam', '', 'N', '10', '1979-04-18 00:00:00', ' ', '40', '2039-04-18 00:00:00', '2008-08-01 00:00:00', '2006-12-16 00:00:00', 80, 'Bahagian Pengurusan Sumber Manusia
Aras 29, Menara Kerja Raya (Blok G)
Ibu Pejabat JKR Malaysia
Kuala Lumpur', '03-26188640', '03-26189510', 'G', NULL, '600610025248', '2017-11-01 10:20:33.389184', '0001-01-01 00:00:00', NULL, NULL, 0, 1, '2022-10-05 11:44:22', '2022-10-05 11:44:22', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'WP Kuala Lumpur');
INSERT INTO public.peribadi VALUES (3, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-07-13 04:05:28', '2022-07-13 04:05:28', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (16, 23, '790418145821', NULL, 'IZZAT ZUMAIRI BIN CHE HARUN', 'L', 'M', 'I', 'KA', 'Y', '14', 'B', 'T', 'Ir.', '0163764000', 'izzat@jkr.gov.my', 'foto/790418145821.jpg', 'SSM', '14387443', 'KPKR/PP/JM 328', 'P', '', '16349072', '60', '2039', 'JABATAN', '1', '40170', 'No 58 Jalan Pulau lumut u10/76h, alam budiman, seksyen u10', 'shah alam', '', 'N', '10', '1979-04-18 00:00:00', ' ', '40', '2039-04-18 00:00:00', '2008-08-01 00:00:00', '2006-12-16 00:00:00', 80, 'Bahagian Pengurusan Sumber Manusia
Aras 29, Menara Kerja Raya (Blok G)
Ibu Pejabat JKR Malaysia
Kuala Lumpur', '03-26188640', '03-26189510', 'G', NULL, '600610025248', '2017-11-01 10:20:33.389184', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-10-12 11:46:39', '2022-10-12 11:46:39', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'WP Kuala Lumpur');
INSERT INTO public.peribadi VALUES (15, 24, '771222025701', 'A 3808823', 'MOHD SUHARIZAL BIN MAHAMAD SUBRI', 'L', 'M', 'I', 'KA', 'Y', '02', 'B', 'T', NULL, '017-3237172', 'msuharizal@jkr.gov.my', 'foto/771222025701.jpg', 'SSM', '14391775', 'KPKR/PP/JM 344', 'P', NULL, NULL, '58', '2033', 'JABATAN', '1', '71700', 'no.373, jalan pch 11/1, perdana college height, mantin, 71700 negeri sembilan', 'mantin', NULL, 'N', '05', '1977-12-22 00:00:00', '2017', '40', '2033-12-22 00:00:00', '2007-06-01 00:00:00', '2006-02-15 00:00:00', 1, 'Bahagian Pembangunan Kuari & Pengurusan Aset,
Cawangan Kejuruteraan Mekanikal, 
Tingkat 28, Menara Kerja Raya
Ibu Pejabat JKR Malaysia
Blok G, No. 6, Jalan Sultan Salahuddin, 50480 Kuala Lumpur.', '03-92064000', '03-92831285', '0', '2010-11-25 00:00:00', '840721146483', '2013-04-18 11:57:31.589508', NULL, NULL, NULL, 0, 1, '2022-10-11 12:03:59', '2022-10-11 12:03:59', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Kedah');
INSERT INTO public.peribadi VALUES (17, 24, '771222025701', 'A 3808823', 'MOHD SUHARIZAL BIN MAHAMAD SUBRI', 'L', 'M', 'I', 'KA', 'Y', '02', 'B', 'T', NULL, '017-3237172', 'msuharizal@jkr.gov.my', 'foto/771222025701.jpg', 'SSM', '14391775', 'KPKR/PP/JM 344', 'P', NULL, NULL, '58', '2033', 'JABATAN', '1', '71700', 'no.373, jalan pch 11/1, perdana college height, mantin, 71700 negeri sembilan', 'mantin', NULL, 'N', '05', '1977-12-22 00:00:00', '2017', '40', '2033-12-22 00:00:00', '2007-06-01 00:00:00', '2006-02-15 00:00:00', 1, 'Bahagian Pembangunan Kuari & Pengurusan Aset,
Cawangan Kejuruteraan Mekanikal, 
Tingkat 28, Menara Kerja Raya
Ibu Pejabat JKR Malaysia
Blok G, No. 6, Jalan Sultan Salahuddin, 50480 Kuala Lumpur.', '03-92064000', '03-92831285', '0', '2010-11-25 00:00:00', '840721146483', '2013-04-18 11:57:31.589508', NULL, NULL, NULL, 1, 0, '2022-10-13 09:23:14', '2022-10-13 09:23:14', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Kedah');
INSERT INTO public.peribadi VALUES (18, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 10:55:52', '2022-10-13 10:55:52', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (19, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 10:56:11', '2022-10-13 10:56:11', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (20, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 10:56:19', '2022-10-13 10:56:19', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (21, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 10:57:10', '2022-10-13 10:57:10', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (22, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 10:57:11', '2022-10-13 10:57:11', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (23, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 10:57:28', '2022-10-13 10:57:28', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (24, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 10:57:39', '2022-10-13 10:57:39', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (25, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 10:59:51', '2022-10-13 10:59:51', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (26, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 11:00:09', '2022-10-13 11:00:09', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (31, 25, '830801025623', NULL, 'MUHAMMAD BRUNSON BIN ARMY', 'L', 'L', 'I', 'KA', 'Y', '02', 'B', 'T', '', '016-7908584', 'brunson@jkr.gov.my', 'foto/830801025623.jpg', 'SSM', '28215147', 'KPKR/PP/JE 446', 'P', '', '17592467', '58', '2041', 'JABATAN', '1', '43500', 'no.77 Jalan tps 2/13, taman pelangi semenyih 2, 43500 semenyih kajang selangor', 'KAJANG', '', 'N', '10', '1983-08-01 00:00:00', ' ', '40', '2041-08-01 00:00:00', NULL, '2009-05-18 00:00:00', 1, 'jabatan kerja raya,
cawangan KEJURUTERAAN ELEKTRIK,
TINGKAT 11, BLOK G,MENARA KERJA RAYA 50480 JALAN SULTAN SALAHUDDIN, KUALA LUMPUR', '03-26107071', '', 'G', NULL, '840721146483', '2013-04-18 12:00:40.699143', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-10-13 11:15:07', '2022-10-13 11:15:07', 'MYKJ', 'MYKJ', 'LAIN', 'ISLAM', 'KAHWIN', 'Kedah');
INSERT INTO public.peribadi VALUES (32, 26, '820620145264', NULL, 'PUTERI NURPARINA BINTI BAHRUN', 'P', 'M', 'I', 'KA', 'Y', '14', 'B', 'T', '', '0192729130', 'PuteriB@jkr.gov.my', 'foto/820620145264.jpg', 'SSM', '20212668', 'KPKP/PP/JE 452', 'P', '', '17204915', '58', '2040', 'JABATAN', '1', '47100', '51, JALAN 10,
TAMAN BUKIT KUCHAI', 'PUCHONG', '', 'N', '10', '1982-06-20 00:00:00', ' ', '55', '2040-06-20 00:00:00', NULL, '2009-03-31 00:00:00', 1, 'CAWANGAN KERJA BANGUNAN AM 1
IBU PEJABAT JKR MALAYSIA
TINGKAT 13,13A & 17, MENARA PJD
NO.50, JALAN TUN RAZAK
50400 KUALA LUMPUR', '0340518305', '', 'PJD', '2011-04-06 00:00:00', '790911065550', '2010-12-24 00:00:00', '0001-01-01 00:00:00', NULL, NULL, 1, 0, '2022-10-13 11:16:04', '2022-10-13 11:16:04', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'WP Kuala Lumpur');
INSERT INTO public.peribadi VALUES (27, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 11:03:07', '2022-10-13 11:03:07', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (28, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 11:03:14', '2022-10-13 11:03:14', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (29, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 11:03:21', '2022-10-13 11:03:21', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (30, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 0, 1, '2022-10-13 11:03:49', '2022-10-13 11:03:49', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');
INSERT INTO public.peribadi VALUES (33, 3, '860211335522', NULL, 'NORLINDA IRDAYU BINTI YAACOB', 'P', 'M', 'I', 'KA', 'Y', '06', 'B', 'B', '', '0173944945', 'norlindairdayu@jkr.gov.my', 'foto/860211335522.jpg', '', NULL, '', 'O', '', '', '0', '1986', NULL, '1', '55100', 'blok c-12-7 kkka jalan cochrane', 'Kuala Lumpur', '', 'K', '14', '1986-02-11 00:00:00', '1986 ', NULL, '0001-01-01 00:00:00', NULL, '0001-01-01 00:00:00', 1, 'BAHAGIAN TEKNOLOGI MAKLUMAT
TINGKAT 14, BLOK F
IBU PEJABAT JKR MALAYSIA', '0326108511', '', 'F', NULL, NULL, NULL, '0001-01-01 00:00:00', NULL, '@yahoo.com', 1, 0, '2022-10-13 11:31:16', '2022-10-13 11:31:16', 'MYKJ', 'MYKJ', 'MELAYU', 'ISLAM', 'KAHWIN', 'Pahang');


--
-- TOC entry 3631 (class 0 OID 54195)
-- Dependencies: 246
-- Data for Name: perkhidmatan; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3609 (class 0 OID 54012)
-- Dependencies: 224
-- Data for Name: permission_role; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3608 (class 0 OID 54002)
-- Dependencies: 223
-- Data for Name: permission_user; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3606 (class 0 OID 53982)
-- Dependencies: 221
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3615 (class 0 OID 54069)
-- Dependencies: 230
-- Data for Name: permohonan_ukp12; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.permohonan_ukp12 VALUES (1, NULL, NULL, 'UKP12', 0, 1, '2022-09-12 10:35:36', '2022-09-12 10:32:22', NULL, '', NULL, NULL, 'J44', 'E', 'ELEKTRIK', NULL);
INSERT INTO public.permohonan_ukp12 VALUES (3, '900919099999', NULL, 'UKP12', 0, 1, '2022-09-14 10:51:44', '2022-09-14 10:51:44', NULL, NULL, 'JURUTERA AWAM', 'AJ005', 'J48', 'A', 'AWAM', NULL);
INSERT INTO public.permohonan_ukp12 VALUES (4, '900919099999', NULL, 'UKP12', 0, 1, '2022-09-14 10:53:19', '2022-09-14 10:53:19', NULL, NULL, 'JURUUKUR TANAH', 'AJ004', 'J48', 'A', 'AWAM', NULL);
INSERT INTO public.permohonan_ukp12 VALUES (2, '900919099999', NULL, 'UKP12', 0, 1, '2022-09-12 11:43:11', '2022-09-12 11:43:11', NULL, NULL, 'PEGAWAI TEKNOLOGI MAKLUMAT', NULL, 'A21', 'JU', 'JURUUKUR', NULL);
INSERT INTO public.permohonan_ukp12 VALUES (5, '900919099999', NULL, 'UKP12', 1, 0, '2022-10-05 11:35:53', '2022-10-05 11:35:53', NULL, NULL, NULL, NULL, 'J52', 'M', 'MEKANIKAL', 'MEKANIKAL 48');
INSERT INTO public.permohonan_ukp12 VALUES (6, '900919099999', NULL, 'UKP12', 1, 0, '2022-10-05 11:40:45', '2022-10-05 11:40:45', NULL, NULL, NULL, NULL, 'J54', 'M', 'MEKANIKAL', 'MEKANIKAL 48');
INSERT INTO public.permohonan_ukp12 VALUES (7, '900919099999', NULL, 'UKP12', 1, 0, '2022-10-07 16:23:56', '2022-10-07 16:23:56', NULL, NULL, NULL, NULL, 'J54', 'M', 'MEKANIKAL', 'MEKANIKAL 48');
INSERT INTO public.permohonan_ukp12 VALUES (8, '900919099999', NULL, 'UKP12', 1, 0, '2022-10-13 11:12:39', '2022-10-13 11:12:39', NULL, NULL, NULL, NULL, 'J48', 'E', 'ELEKTRIK', 'ELETRIK J44');


--
-- TOC entry 3602 (class 0 OID 53959)
-- Dependencies: 217
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3654 (class 0 OID 78405)
-- Dependencies: 269
-- Data for Name: pertubuhan; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.pertubuhan VALUES (1, 'Surau Al-Ikhlas', 'AJK Fasiliti', 2021, '2022-10-12 16:04:55', '2022-10-12 16:04:55', 2, '790418145821', '790418145821', 1, 0);
INSERT INTO public.pertubuhan VALUES (2, 'Persatuan Komuniiti Pandan', 'AJK Sukan', 2021, '2022-10-12 16:07:58', '2022-10-12 16:07:58', 2, '790418145821', '790418145821', 1, 0);


--
-- TOC entry 3623 (class 0 OID 54123)
-- Dependencies: 238
-- Data for Name: pinjaman_pendidikan; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3627 (class 0 OID 54160)
-- Dependencies: 242
-- Data for Name: professional; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3607 (class 0 OID 53992)
-- Dependencies: 222
-- Data for Name: role_user; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.role_user VALUES (1, 2, 'vendor');
INSERT INTO public.role_user VALUES (2, 9, 'jkr');
INSERT INTO public.role_user VALUES (2, 10, 'jkr');
INSERT INTO public.role_user VALUES (1, 3, 'jkr');


--
-- TOC entry 3604 (class 0 OID 53971)
-- Dependencies: 219
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.roles VALUES (1, 'superadmin', 'Pentadbir Sistem', 'Super Administrator', NULL, NULL);
INSERT INTO public.roles VALUES (3, 'secretariat', 'BPSM', 'Urus setia Proses', NULL, NULL);
INSERT INTO public.roles VALUES (4, 'coordinator', 'BPSK', 'Penyelaras Lantikan', NULL, NULL);
INSERT INTO public.roles VALUES (5, 'clerk', 'Kerani Perkhidmatan', 'Kerani Pengesahan Maklumat', NULL, NULL);
INSERT INTO public.roles VALUES (6, 'hod', 'Ketua Bahagian / Jabatan', 'Ketua Memberi Perakuan', NULL, NULL);
INSERT INTO public.roles VALUES (7, 'supervisor', 'Pegawai Penyelia', 'Pegawai Menyelia Pemohom', NULL, NULL);
INSERT INTO public.roles VALUES (2, 'user', 'Pengguna', 'Pengguna Biasa (Normal User)', NULL, NULL);


--
-- TOC entry 3629 (class 0 OID 54174)
-- Dependencies: 244
-- Data for Name: sijil_kompeten; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3610 (class 0 OID 54027)
-- Dependencies: 225
-- Data for Name: soalan_lnpk; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3641 (class 0 OID 54269)
-- Dependencies: 256
-- Data for Name: surat_pink; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3635 (class 0 OID 54224)
-- Dependencies: 250
-- Data for Name: tatatertib_ukp12; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3597 (class 0 OID 53928)
-- Dependencies: 212
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.users VALUES (2, 'superadmin', '900919099999', 'rubmin@gmail.com', NULL, '$2y$10$1wXnNa1sZGCdgg8/0qaov.PE3p2vXX/ecXLtOEWplB2rJ2tja7AEa', NULL, '2022-06-27 04:07:23', '2022-06-27 04:07:23', 0, NULL, NULL, NULL, NULL);
INSERT INTO public.users VALUES (13, 'MOHD AFNAN BIN ABDULLAH', '840924035329', 'afnan@jkr.gov.my', NULL, '$2y$10$sBPCmND3AQmlPFm8s57YDOwdt0Gv37TDujwZUUSfLRpdBFbvJOOxC', NULL, '2022-09-14 10:00:09', '2022-09-14 10:00:09', 1, '900919099999', NULL, 1, 0);
INSERT INTO public.users VALUES (14, 'AHMAD FAIZ BIN A. RAUP', '850525086451', 'faiz@kkr.gov.my', NULL, '$2y$10$zgYSyJtC0DPHizHHdbrR6eNv/GDYE58nJwVNoAIXmsoVBebSbQYca', NULL, '2022-09-14 10:58:16', '2022-09-14 10:58:16', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (15, 'AZAHAR B MOHD', '741029055039', 'azaharm@jkr.gov.my', NULL, '$2y$10$DTm2p7rngHkx53qVB5k8Sujiu0ZO2pPUU1zYtEjm6SN/WnQsxO.12', NULL, '2022-09-30 10:07:49', '2022-09-30 10:07:49', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (16, 'ROZIANA BT MAHMOOD', '790829016522', 'mroziana@jkr.gov.my', NULL, '$2y$10$r2NoZ/oQOrO.HuTdkb9lxOcYelmfFd/oAxJjTOAqkEr9be2dWf.IC', NULL, '2022-09-30 11:23:08', '2022-09-30 11:23:08', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (17, 'SAADIAH BT ABDUL WAHAB', '720213015384', 'saadiah_mimi@yahoo.com', NULL, '$2y$10$N7CAg02CZLNHBbgD7HKe.Oa3nu3z7O25hX25JBZESnJNPb.ZR9zpq', NULL, '2022-09-30 11:25:37', '2022-09-30 11:25:37', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (18, 'SAROJINI A/P KANDIAH', '560822085628', 'Sarojini@jkr.gov.my', NULL, '$2y$10$F8e6xAMn0u98EcbyGlu7ku5IzQw9rBh4D/5VdI3BGoSAAvfMLO6.m', NULL, '2022-10-03 10:52:44', '2022-10-03 10:52:44', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (19, 'ATIKAH BT ZAKARIA @ YA', '730909035112', 'atikahz@jkr.gov.my', NULL, '$2y$10$pL/8R1rfWpdo9yFaRsyZD.4nBoNol55gBbDZCSvVZjnsHuBne5SGu', NULL, '2022-10-03 10:53:09', '2022-10-03 10:53:09', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (20, 'AHMAD FIRDAUS BIN MD NOR', '830416145901', 'ahmad_firdaus@kpkt.gov.my', NULL, '$2y$10$lpxaAvvsJGp60o7wseXBI.GfqZHneYytkc.OKaeOpSy5GfDViRO8y', NULL, '2022-10-05 10:48:21', '2022-10-05 10:48:21', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (21, 'ISMAIL BIN HUSAINI', '820823105625', 'ismail_husaini@Jkr.gov.my', NULL, '$2y$10$UJpKTjkvGiITuDp0FWQ6I.U14AWPEileFGqk7OU.e6RzFmx/gXmkm', NULL, '2022-10-05 11:08:14', '2022-10-05 11:08:14', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (22, 'FADZIAH BT JHAYA', '640911065514', 'fadziah@jkr.gov.my', NULL, '$2y$10$yqQNuwCbfzWI0902Mc6u1.BciLXzgJAkNl.Qpot.veGVLRFAvuVkG', NULL, '2022-10-05 11:20:21', '2022-10-05 11:20:21', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (23, 'IZZAT ZUMAIRI BIN CHE HARUN', '790418145821', 'izzat@jkr.gov.my', NULL, '$2y$10$JXfIKCvBDXxWOvbqIgdyl.ahOWP6GZ8D79h4rhIRB1PEpha7CAzni', NULL, '2022-10-05 11:44:22', '2022-10-05 11:44:22', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (3, 'NORLINDA IRDAYU BINTI YAACOB', '860211335522', 'norlindairdayu@jkr.gov.my', NULL, '$2y$10$g1UKi.rMfC/HSRif0cgjKu2uxUE9/YE/uYanELfAVj.jGFkBeZPfS', NULL, '2022-07-13 03:25:16', '2022-10-05 15:41:59', 1, 'MYKJ', 'MYKJ', 1, 0);
INSERT INTO public.users VALUES (24, 'MOHD SUHARIZAL BIN MAHAMAD SUBRI', '771222025701', 'msuharizal@jkr.gov.my', NULL, '$2y$10$HMsz80n38qUS/0oZdCdQ9uqtusd.HOVSv6JnN5Ngorv4dV03EV3Fu', NULL, '2022-10-11 12:03:59', '2022-10-11 12:03:59', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (25, 'MUHAMMAD BRUNSON BIN ARMY', '830801025623', 'brunson@jkr.gov.my', NULL, '$2y$10$uxsb/SVCr5jtcv0TVxvOh.qSgMz4KbzkRyX9mfecH8/m75rl5frb6', NULL, '2022-10-13 11:15:07', '2022-10-13 11:15:07', 1, '', NULL, 1, 0);
INSERT INTO public.users VALUES (26, 'PUTERI NURPARINA BINTI BAHRUN', '820620145264', 'PuteriB@jkr.gov.my', NULL, '$2y$10$r2yquNIv2qCkWnCvC8oazO0FgwSQCLOij0JmkFDrkXyGCiQYlYSmu', NULL, '2022-10-13 11:16:04', '2022-10-13 11:16:04', 1, '', NULL, 1, 0);


--
-- TOC entry 3687 (class 0 OID 0)
-- Dependencies: 239
-- Name: akademik_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.akademik_id_seq', 1, false);


--
-- TOC entry 3688 (class 0 OID 0)
-- Dependencies: 264
-- Name: calon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.calon_id_seq', 16, true);


--
-- TOC entry 3689 (class 0 OID 0)
-- Dependencies: 233
-- Name: cuti_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.cuti_id_seq', 1, false);


--
-- TOC entry 3690 (class 0 OID 0)
-- Dependencies: 214
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 3691 (class 0 OID 0)
-- Dependencies: 266
-- Name: files_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.files_id_seq', 1, false);


--
-- TOC entry 3692 (class 0 OID 0)
-- Dependencies: 235
-- Name: harta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.harta_id_seq', 1, false);


--
-- TOC entry 3693 (class 0 OID 0)
-- Dependencies: 262
-- Name: kumpulan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.kumpulan_id_seq', 5, true);


--
-- TOC entry 3694 (class 0 OID 0)
-- Dependencies: 247
-- Name: lnpt_ukp12_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.lnpt_ukp12_id_seq', 1, false);


--
-- TOC entry 3695 (class 0 OID 0)
-- Dependencies: 209
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.migrations_id_seq', 5, true);


--
-- TOC entry 3696 (class 0 OID 0)
-- Dependencies: 251
-- Name: pasangan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pasangan_id_seq', 1, false);


--
-- TOC entry 3697 (class 0 OID 0)
-- Dependencies: 253
-- Name: pemohon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pemohon_id_seq', 19, true);


--
-- TOC entry 3698 (class 0 OID 0)
-- Dependencies: 259
-- Name: penempatan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.penempatan_id_seq', 18, true);


--
-- TOC entry 3699 (class 0 OID 0)
-- Dependencies: 257
-- Name: penerimaan_ukp11_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.penerimaan_ukp11_id_seq', 1, false);


--
-- TOC entry 3700 (class 0 OID 0)
-- Dependencies: 231
-- Name: perakuan_pemohon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.perakuan_pemohon_id_seq', 1, false);


--
-- TOC entry 3701 (class 0 OID 0)
-- Dependencies: 261
-- Name: peribadi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.peribadi_id_seq', 33, true);


--
-- TOC entry 3702 (class 0 OID 0)
-- Dependencies: 245
-- Name: perkhidmatan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.perkhidmatan_id_seq', 1, false);


--
-- TOC entry 3703 (class 0 OID 0)
-- Dependencies: 220
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.permissions_id_seq', 1, false);


--
-- TOC entry 3704 (class 0 OID 0)
-- Dependencies: 229
-- Name: permohonan_ukp12_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.permohonan_ukp12_id_seq', 8, true);


--
-- TOC entry 3705 (class 0 OID 0)
-- Dependencies: 216
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 3706 (class 0 OID 0)
-- Dependencies: 268
-- Name: pertubuhan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pertubuhan_id_seq', 3, true);


--
-- TOC entry 3707 (class 0 OID 0)
-- Dependencies: 237
-- Name: pinjaman_pendidikan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pinjaman_pendidikan_id_seq', 1, false);


--
-- TOC entry 3708 (class 0 OID 0)
-- Dependencies: 241
-- Name: professional_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.professional_id_seq', 1, false);


--
-- TOC entry 3709 (class 0 OID 0)
-- Dependencies: 218
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.roles_id_seq', 7, true);


--
-- TOC entry 3710 (class 0 OID 0)
-- Dependencies: 243
-- Name: sijil_kompeten_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.sijil_kompeten_id_seq', 1, false);


--
-- TOC entry 3711 (class 0 OID 0)
-- Dependencies: 255
-- Name: surat_pink_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.surat_pink_id_seq', 1, false);


--
-- TOC entry 3712 (class 0 OID 0)
-- Dependencies: 249
-- Name: tatatertib_ukp12_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tatatertib_ukp12_id_seq', 1, false);


--
-- TOC entry 3713 (class 0 OID 0)
-- Dependencies: 211
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_id_seq', 26, true);


--
-- TOC entry 3401 (class 2606 OID 54153)
-- Name: akademik akademik_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.akademik
    ADD CONSTRAINT akademik_pkey PRIMARY KEY (id);


--
-- TOC entry 3395 (class 2606 OID 54097)
-- Name: cuti cuti_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cuti
    ADD CONSTRAINT cuti_pkey PRIMARY KEY (id);


--
-- TOC entry 3362 (class 2606 OID 53955)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 3364 (class 2606 OID 53957)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 3397 (class 2606 OID 54116)
-- Name: harta harta_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.harta
    ADD CONSTRAINT harta_pkey PRIMARY KEY (id);


--
-- TOC entry 3423 (class 2606 OID 54404)
-- Name: kumpulan kumpulan_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.kumpulan
    ADD CONSTRAINT kumpulan_pk PRIMARY KEY (id);


--
-- TOC entry 3387 (class 2606 OID 54040)
-- Name: lnpk lnpk_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.lnpk
    ADD CONSTRAINT lnpk_pkey PRIMARY KEY (id);


--
-- TOC entry 3409 (class 2606 OID 54216)
-- Name: lnpt_ukp12 lnpt_ukp12_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.lnpt_ukp12
    ADD CONSTRAINT lnpt_ukp12_pkey PRIMARY KEY (id);


--
-- TOC entry 3353 (class 2606 OID 53926)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 3425 (class 2606 OID 54413)
-- Name: calon newtable_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.calon
    ADD CONSTRAINT newtable_pk PRIMARY KEY (id);


--
-- TOC entry 3413 (class 2606 OID 54243)
-- Name: pasangan pasangan_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pasangan
    ADD CONSTRAINT pasangan_pkey PRIMARY KEY (id);


--
-- TOC entry 3415 (class 2606 OID 54257)
-- Name: pemohon pemohon_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pemohon
    ADD CONSTRAINT pemohon_pkey PRIMARY KEY (id);


--
-- TOC entry 3421 (class 2606 OID 54436)
-- Name: penempatan penempatan_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penempatan
    ADD CONSTRAINT penempatan_pk PRIMARY KEY (id);


--
-- TOC entry 3419 (class 2606 OID 54299)
-- Name: penerimaan_ukp11 penerimaan_ukp_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penerimaan_ukp11
    ADD CONSTRAINT penerimaan_ukp_pkey PRIMARY KEY (id);


--
-- TOC entry 3393 (class 2606 OID 54083)
-- Name: perakuan_pemohon perakuan_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perakuan_pemohon
    ADD CONSTRAINT perakuan_pkey PRIMARY KEY (id);


--
-- TOC entry 3389 (class 2606 OID 54356)
-- Name: peribadi peribadi_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.peribadi
    ADD CONSTRAINT peribadi_pkey PRIMARY KEY (id);


--
-- TOC entry 3407 (class 2606 OID 54202)
-- Name: perkhidmatan perkhidmatan_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perkhidmatan
    ADD CONSTRAINT perkhidmatan_pkey PRIMARY KEY (id);


--
-- TOC entry 3383 (class 2606 OID 54026)
-- Name: permission_role permission_role_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permission_role
    ADD CONSTRAINT permission_role_pkey PRIMARY KEY (permission_id, role_id);


--
-- TOC entry 3381 (class 2606 OID 54011)
-- Name: permission_user permission_user_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permission_user
    ADD CONSTRAINT permission_user_pkey PRIMARY KEY (user_id, permission_id, user_type);


--
-- TOC entry 3375 (class 2606 OID 53991)
-- Name: permissions permissions_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_name_unique UNIQUE (name);


--
-- TOC entry 3377 (class 2606 OID 53989)
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- TOC entry 3391 (class 2606 OID 54076)
-- Name: permohonan_ukp12 permohonan_ukp12_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permohonan_ukp12
    ADD CONSTRAINT permohonan_ukp12_pkey PRIMARY KEY (id);


--
-- TOC entry 3366 (class 2606 OID 53966)
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- TOC entry 3368 (class 2606 OID 53969)
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- TOC entry 3427 (class 2606 OID 78412)
-- Name: pertubuhan pertubuhan_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pertubuhan
    ADD CONSTRAINT pertubuhan_pk PRIMARY KEY (id);


--
-- TOC entry 3399 (class 2606 OID 54130)
-- Name: pinjaman_pendidikan pinjaman_pendidikan_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pinjaman_pendidikan
    ADD CONSTRAINT pinjaman_pendidikan_pkey PRIMARY KEY (id);


--
-- TOC entry 3403 (class 2606 OID 54167)
-- Name: professional professional_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.professional
    ADD CONSTRAINT professional_pkey PRIMARY KEY (id);


--
-- TOC entry 3379 (class 2606 OID 54001)
-- Name: role_user role_user_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.role_user
    ADD CONSTRAINT role_user_pkey PRIMARY KEY (user_id, role_id, user_type);


--
-- TOC entry 3371 (class 2606 OID 53980)
-- Name: roles roles_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_name_unique UNIQUE (name);


--
-- TOC entry 3373 (class 2606 OID 53978)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- TOC entry 3405 (class 2606 OID 54179)
-- Name: sijil_kompeten sijil_kompeten_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sijil_kompeten
    ADD CONSTRAINT sijil_kompeten_pkey PRIMARY KEY (id);


--
-- TOC entry 3385 (class 2606 OID 54033)
-- Name: soalan_lnpk soalan_lnpk_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.soalan_lnpk
    ADD CONSTRAINT soalan_lnpk_pkey PRIMARY KEY (id);


--
-- TOC entry 3417 (class 2606 OID 54276)
-- Name: surat_pink surat_pink_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.surat_pink
    ADD CONSTRAINT surat_pink_pkey PRIMARY KEY (id);


--
-- TOC entry 3411 (class 2606 OID 54229)
-- Name: tatatertib_ukp12 tatatertib_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tatatertib_ukp12
    ADD CONSTRAINT tatatertib_pkey PRIMARY KEY (id);


--
-- TOC entry 3355 (class 2606 OID 53939)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 3357 (class 2606 OID 53937)
-- Name: users users_nokp_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_nokp_unique UNIQUE (nokp);


--
-- TOC entry 3359 (class 2606 OID 53935)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3360 (class 1259 OID 53945)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- TOC entry 3369 (class 1259 OID 53967)
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- TOC entry 3439 (class 2606 OID 54362)
-- Name: akademik akademik_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.akademik
    ADD CONSTRAINT akademik_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3453 (class 2606 OID 54414)
-- Name: calon calon_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.calon
    ADD CONSTRAINT calon_fk FOREIGN KEY (kumpulan_id) REFERENCES public.kumpulan(id);


--
-- TOC entry 3436 (class 2606 OID 54310)
-- Name: cuti cuti_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cuti
    ADD CONSTRAINT cuti_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3437 (class 2606 OID 54421)
-- Name: harta harta_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.harta
    ADD CONSTRAINT harta_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3432 (class 2606 OID 54044)
-- Name: jawapan_lnpk jawapan_lnpk_id_lnpk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.jawapan_lnpk
    ADD CONSTRAINT jawapan_lnpk_id_lnpk FOREIGN KEY (id_lnpk) REFERENCES public.lnpk(id);


--
-- TOC entry 3433 (class 2606 OID 54049)
-- Name: jawapan_lnpk jawapan_lnpk_id_soalan; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.jawapan_lnpk
    ADD CONSTRAINT jawapan_lnpk_id_soalan FOREIGN KEY (id_soalan) REFERENCES public.soalan_lnpk(id);


--
-- TOC entry 3452 (class 2606 OID 62626)
-- Name: kumpulan kumpulan_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.kumpulan
    ADD CONSTRAINT kumpulan_fk FOREIGN KEY (permohonan_id) REFERENCES public.permohonan_ukp12(id);


--
-- TOC entry 3443 (class 2606 OID 54330)
-- Name: lnpt_ukp12 lnpt_ukp12_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.lnpt_ukp12
    ADD CONSTRAINT lnpt_ukp12_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3445 (class 2606 OID 54382)
-- Name: pasangan pasangan_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pasangan
    ADD CONSTRAINT pasangan_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3447 (class 2606 OID 54387)
-- Name: pemohon pemohon_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pemohon
    ADD CONSTRAINT pemohon_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3446 (class 2606 OID 54258)
-- Name: pemohon pemohon_id_permohonan; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pemohon
    ADD CONSTRAINT pemohon_id_permohonan FOREIGN KEY (id_permohonan) REFERENCES public.permohonan_ukp12(id);


--
-- TOC entry 3451 (class 2606 OID 54392)
-- Name: penempatan penempatan_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penempatan
    ADD CONSTRAINT penempatan_fk FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3449 (class 2606 OID 54300)
-- Name: penerimaan_ukp11 penerimaa_ukp_id_pemohon; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penerimaan_ukp11
    ADD CONSTRAINT penerimaa_ukp_id_pemohon FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3450 (class 2606 OID 54305)
-- Name: penerimaan_ukp11 penerimaan_ukp_id_surat_pink; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penerimaan_ukp11
    ADD CONSTRAINT penerimaan_ukp_id_surat_pink FOREIGN KEY (id_surat_pink) REFERENCES public.surat_pink(id);


--
-- TOC entry 3435 (class 2606 OID 54315)
-- Name: perakuan_pemohon perakuan_pemohon_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perakuan_pemohon
    ADD CONSTRAINT perakuan_pemohon_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3434 (class 2606 OID 54062)
-- Name: peribadi peribadi_users_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.peribadi
    ADD CONSTRAINT peribadi_users_id FOREIGN KEY (users_id) REFERENCES public.users(id);


--
-- TOC entry 3442 (class 2606 OID 54377)
-- Name: perkhidmatan perkhidmatan_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perkhidmatan
    ADD CONSTRAINT perkhidmatan_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3430 (class 2606 OID 54015)
-- Name: permission_role permission_role_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permission_role
    ADD CONSTRAINT permission_role_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3431 (class 2606 OID 54020)
-- Name: permission_role permission_role_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permission_role
    ADD CONSTRAINT permission_role_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3429 (class 2606 OID 54005)
-- Name: permission_user permission_user_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permission_user
    ADD CONSTRAINT permission_user_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3454 (class 2606 OID 78413)
-- Name: pertubuhan pertubuhan_pemohon_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pertubuhan
    ADD CONSTRAINT pertubuhan_pemohon_fk FOREIGN KEY (id) REFERENCES public.pemohon(id);


--
-- TOC entry 3438 (class 2606 OID 54320)
-- Name: pinjaman_pendidikan pinjaman_pendidikan_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pinjaman_pendidikan
    ADD CONSTRAINT pinjaman_pendidikan_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3440 (class 2606 OID 54367)
-- Name: professional professional_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.professional
    ADD CONSTRAINT professional_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3428 (class 2606 OID 53995)
-- Name: role_user role_user_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.role_user
    ADD CONSTRAINT role_user_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3441 (class 2606 OID 54372)
-- Name: sijil_kompeten sijil_kompeten_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sijil_kompeten
    ADD CONSTRAINT sijil_kompeten_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3448 (class 2606 OID 62637)
-- Name: surat_pink surat_pink_permohon_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.surat_pink
    ADD CONSTRAINT surat_pink_permohon_fk FOREIGN KEY (id_permohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3444 (class 2606 OID 54325)
-- Name: tatatertib_ukp12 tatatertib_ukp12_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tatatertib_ukp12
    ADD CONSTRAINT tatatertib_ukp12_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


-- Completed on 2022-10-13 14:44:56

--
-- PostgreSQL database dump complete
--

