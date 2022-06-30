--
-- PostgreSQL database dump
--

-- Dumped from database version 14.1
-- Dumped by pg_dump version 14.1

-- Started on 2022-06-30 16:33:03

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
-- TOC entry 3604 (class 0 OID 0)
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
    updated_by character varying(100)
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
-- TOC entry 3605 (class 0 OID 0)
-- Dependencies: 239
-- Name: akademik_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.akademik_id_seq OWNED BY public.akademik.id;


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
-- TOC entry 3606 (class 0 OID 0)
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
-- TOC entry 3607 (class 0 OID 0)
-- Dependencies: 214
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 236 (class 1259 OID 54111)
-- Name: harta; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.harta (
    id bigint NOT NULL,
    tkh_akhir_pengisytiharan date,
    surat_kelulusan character varying(200),
    id_peribadi integer,
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
-- TOC entry 3608 (class 0 OID 0)
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
    updated_by character varying(100)
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
-- TOC entry 3609 (class 0 OID 0)
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
-- TOC entry 3610 (class 0 OID 0)
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
-- TOC entry 3611 (class 0 OID 0)
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
    status character varying(10),
    alasan character varying(300),
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
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
-- TOC entry 3612 (class 0 OID 0)
-- Dependencies: 253
-- Name: pemohon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.pemohon_id_seq OWNED BY public.pemohon.id;


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
-- TOC entry 3613 (class 0 OID 0)
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
-- TOC entry 3614 (class 0 OID 0)
-- Dependencies: 231
-- Name: perakuan_pemohon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.perakuan_pemohon_id_seq OWNED BY public.perakuan_pemohon.id;


--
-- TOC entry 228 (class 1259 OID 54054)
-- Name: peribadi; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.peribadi (
    id integer NOT NULL,
    users_id integer,
    nokp character varying(12) NOT NULL,
    nokp_lama character varying(14),
    nama character varying(255) NOT NULL,
    jantina character varying(50) NOT NULL,
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
    updated_by character varying(100)
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
-- TOC entry 3615 (class 0 OID 0)
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
-- TOC entry 3616 (class 0 OID 0)
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
	jawatan character varying(100),
    kod_jawatan character varying(50),
    gred character varying(10),
    kod_disiplin character varying(50),
    disiplin character varying(100),
    is_bin integer,
    jenis character varying(10),
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
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
-- TOC entry 3617 (class 0 OID 0)
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
-- TOC entry 3618 (class 0 OID 0)
-- Dependencies: 216
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


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
-- TOC entry 3619 (class 0 OID 0)
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
    delete_id integer
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
-- TOC entry 3620 (class 0 OID 0)
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
-- TOC entry 3621 (class 0 OID 0)
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
    updated_by character varying(100)
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
-- TOC entry 3622 (class 0 OID 0)
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
    id_permohonan integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100)
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
-- TOC entry 3623 (class 0 OID 0)
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
-- TOC entry 3624 (class 0 OID 0)
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
    updated_at timestamp(0) without time zone
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
-- TOC entry 3625 (class 0 OID 0)
-- Dependencies: 211
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 3309 (class 2604 OID 54149)
-- Name: akademik id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.akademik ALTER COLUMN id SET DEFAULT nextval('public.akademik_id_seq'::regclass);


--
-- TOC entry 3306 (class 2604 OID 54093)
-- Name: cuti id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cuti ALTER COLUMN id SET DEFAULT nextval('public.cuti_id_seq'::regclass);


--
-- TOC entry 3298 (class 2604 OID 53950)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 3307 (class 2604 OID 54114)
-- Name: harta id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.harta ALTER COLUMN id SET DEFAULT nextval('public.harta_id_seq'::regclass);


--
-- TOC entry 3313 (class 2604 OID 54212)
-- Name: lnpt_ukp12 id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.lnpt_ukp12 ALTER COLUMN id SET DEFAULT nextval('public.lnpt_ukp12_id_seq'::regclass);


--
-- TOC entry 3296 (class 2604 OID 53924)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 3315 (class 2604 OID 54239)
-- Name: pasangan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pasangan ALTER COLUMN id SET DEFAULT nextval('public.pasangan_id_seq'::regclass);


--
-- TOC entry 3316 (class 2604 OID 54253)
-- Name: pemohon id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pemohon ALTER COLUMN id SET DEFAULT nextval('public.pemohon_id_seq'::regclass);


--
-- TOC entry 3318 (class 2604 OID 54295)
-- Name: penerimaan_ukp11 id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penerimaan_ukp11 ALTER COLUMN id SET DEFAULT nextval('public.penerimaan_ukp11_id_seq'::regclass);


--
-- TOC entry 3305 (class 2604 OID 54081)
-- Name: perakuan_pemohon id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perakuan_pemohon ALTER COLUMN id SET DEFAULT nextval('public.perakuan_pemohon_id_seq'::regclass);


--
-- TOC entry 3312 (class 2604 OID 54198)
-- Name: perkhidmatan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perkhidmatan ALTER COLUMN id SET DEFAULT nextval('public.perkhidmatan_id_seq'::regclass);


--
-- TOC entry 3302 (class 2604 OID 53985)
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- TOC entry 3304 (class 2604 OID 54072)
-- Name: permohonan_ukp12 id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permohonan_ukp12 ALTER COLUMN id SET DEFAULT nextval('public.permohonan_ukp12_id_seq'::regclass);


--
-- TOC entry 3300 (class 2604 OID 53962)
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- TOC entry 3308 (class 2604 OID 54126)
-- Name: pinjaman_pendidikan id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pinjaman_pendidikan ALTER COLUMN id SET DEFAULT nextval('public.pinjaman_pendidikan_id_seq'::regclass);


--
-- TOC entry 3310 (class 2604 OID 54163)
-- Name: professional id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.professional ALTER COLUMN id SET DEFAULT nextval('public.professional_id_seq'::regclass);


--
-- TOC entry 3301 (class 2604 OID 53974)
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- TOC entry 3311 (class 2604 OID 54177)
-- Name: sijil_kompeten id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sijil_kompeten ALTER COLUMN id SET DEFAULT nextval('public.sijil_kompeten_id_seq'::regclass);


--
-- TOC entry 3317 (class 2604 OID 54272)
-- Name: surat_pink id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.surat_pink ALTER COLUMN id SET DEFAULT nextval('public.surat_pink_id_seq'::regclass);


--
-- TOC entry 3314 (class 2604 OID 54227)
-- Name: tatatertib_ukp12 id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tatatertib_ukp12 ALTER COLUMN id SET DEFAULT nextval('public.tatatertib_ukp12_id_seq'::regclass);


--
-- TOC entry 3297 (class 2604 OID 53931)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3580 (class 0 OID 54146)
-- Dependencies: 240
-- Data for Name: akademik; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3574 (class 0 OID 54090)
-- Dependencies: 234
-- Data for Name: cuti; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3555 (class 0 OID 53947)
-- Dependencies: 215
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3576 (class 0 OID 54111)
-- Dependencies: 236
-- Data for Name: harta; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3567 (class 0 OID 54041)
-- Dependencies: 227
-- Data for Name: jawapan_lnpk; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3566 (class 0 OID 54034)
-- Dependencies: 226
-- Data for Name: lnpk; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3588 (class 0 OID 54209)
-- Dependencies: 248
-- Data for Name: lnpt_ukp12; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3550 (class 0 OID 53921)
-- Dependencies: 210
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.migrations VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO public.migrations VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO public.migrations VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO public.migrations VALUES (5, '2022_06_24_014613_laratrust_setup_tables', 2);


--
-- TOC entry 3592 (class 0 OID 54236)
-- Dependencies: 252
-- Data for Name: pasangan; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3553 (class 0 OID 53940)
-- Dependencies: 213
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3594 (class 0 OID 54250)
-- Dependencies: 254
-- Data for Name: pemohon; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3598 (class 0 OID 54292)
-- Dependencies: 258
-- Data for Name: penerimaan_ukp11; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3572 (class 0 OID 54078)
-- Dependencies: 232
-- Data for Name: perakuan_pemohon; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3568 (class 0 OID 54054)
-- Dependencies: 228
-- Data for Name: peribadi; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3586 (class 0 OID 54195)
-- Dependencies: 246
-- Data for Name: perkhidmatan; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3564 (class 0 OID 54012)
-- Dependencies: 224
-- Data for Name: permission_role; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3563 (class 0 OID 54002)
-- Dependencies: 223
-- Data for Name: permission_user; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3561 (class 0 OID 53982)
-- Dependencies: 221
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3570 (class 0 OID 54069)
-- Dependencies: 230
-- Data for Name: permohonan_ukp12; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3557 (class 0 OID 53959)
-- Dependencies: 217
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3578 (class 0 OID 54123)
-- Dependencies: 238
-- Data for Name: pinjaman_pendidikan; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3582 (class 0 OID 54160)
-- Dependencies: 242
-- Data for Name: professional; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3562 (class 0 OID 53992)
-- Dependencies: 222
-- Data for Name: role_user; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3559 (class 0 OID 53971)
-- Dependencies: 219
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3584 (class 0 OID 54174)
-- Dependencies: 244
-- Data for Name: sijil_kompeten; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3565 (class 0 OID 54027)
-- Dependencies: 225
-- Data for Name: soalan_lnpk; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3596 (class 0 OID 54269)
-- Dependencies: 256
-- Data for Name: surat_pink; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3590 (class 0 OID 54224)
-- Dependencies: 250
-- Data for Name: tatatertib_ukp12; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3552 (class 0 OID 53928)
-- Dependencies: 212
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.users VALUES (2, 'superadmin', '900919099999', 'rubmin@gmail.com', NULL, '$2y$10$1wXnNa1sZGCdgg8/0qaov.PE3p2vXX/ecXLtOEWplB2rJ2tja7AEa', NULL, '2022-06-27 04:07:23', '2022-06-27 04:07:23');


--
-- TOC entry 3626 (class 0 OID 0)
-- Dependencies: 239
-- Name: akademik_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.akademik_id_seq', 1, false);


--
-- TOC entry 3627 (class 0 OID 0)
-- Dependencies: 233
-- Name: cuti_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.cuti_id_seq', 1, false);


--
-- TOC entry 3628 (class 0 OID 0)
-- Dependencies: 214
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 3629 (class 0 OID 0)
-- Dependencies: 235
-- Name: harta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.harta_id_seq', 1, false);


--
-- TOC entry 3630 (class 0 OID 0)
-- Dependencies: 247
-- Name: lnpt_ukp12_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.lnpt_ukp12_id_seq', 1, false);


--
-- TOC entry 3631 (class 0 OID 0)
-- Dependencies: 209
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.migrations_id_seq', 5, true);


--
-- TOC entry 3632 (class 0 OID 0)
-- Dependencies: 251
-- Name: pasangan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pasangan_id_seq', 1, false);


--
-- TOC entry 3633 (class 0 OID 0)
-- Dependencies: 253
-- Name: pemohon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pemohon_id_seq', 1, false);


--
-- TOC entry 3634 (class 0 OID 0)
-- Dependencies: 257
-- Name: penerimaan_ukp11_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.penerimaan_ukp11_id_seq', 1, false);


--
-- TOC entry 3635 (class 0 OID 0)
-- Dependencies: 231
-- Name: perakuan_pemohon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.perakuan_pemohon_id_seq', 1, false);


--
-- TOC entry 3636 (class 0 OID 0)
-- Dependencies: 245
-- Name: perkhidmatan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.perkhidmatan_id_seq', 1, false);


--
-- TOC entry 3637 (class 0 OID 0)
-- Dependencies: 220
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.permissions_id_seq', 1, false);


--
-- TOC entry 3638 (class 0 OID 0)
-- Dependencies: 229
-- Name: permohonan_ukp12_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.permohonan_ukp12_id_seq', 1, false);


--
-- TOC entry 3639 (class 0 OID 0)
-- Dependencies: 216
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 3640 (class 0 OID 0)
-- Dependencies: 237
-- Name: pinjaman_pendidikan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.pinjaman_pendidikan_id_seq', 1, false);


--
-- TOC entry 3641 (class 0 OID 0)
-- Dependencies: 241
-- Name: professional_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.professional_id_seq', 1, false);


--
-- TOC entry 3642 (class 0 OID 0)
-- Dependencies: 218
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.roles_id_seq', 1, false);


--
-- TOC entry 3643 (class 0 OID 0)
-- Dependencies: 243
-- Name: sijil_kompeten_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.sijil_kompeten_id_seq', 1, false);


--
-- TOC entry 3644 (class 0 OID 0)
-- Dependencies: 255
-- Name: surat_pink_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.surat_pink_id_seq', 1, false);


--
-- TOC entry 3645 (class 0 OID 0)
-- Dependencies: 249
-- Name: tatatertib_ukp12_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tatatertib_ukp12_id_seq', 1, false);


--
-- TOC entry 3646 (class 0 OID 0)
-- Dependencies: 211
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_id_seq', 2, true);


--
-- TOC entry 3368 (class 2606 OID 54153)
-- Name: akademik akademik_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.akademik
    ADD CONSTRAINT akademik_pkey PRIMARY KEY (id);


--
-- TOC entry 3362 (class 2606 OID 54097)
-- Name: cuti cuti_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cuti
    ADD CONSTRAINT cuti_pkey PRIMARY KEY (id);


--
-- TOC entry 3329 (class 2606 OID 53955)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 3331 (class 2606 OID 53957)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 3364 (class 2606 OID 54116)
-- Name: harta harta_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.harta
    ADD CONSTRAINT harta_pkey PRIMARY KEY (id);


--
-- TOC entry 3354 (class 2606 OID 54040)
-- Name: lnpk lnpk_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.lnpk
    ADD CONSTRAINT lnpk_pkey PRIMARY KEY (id);


--
-- TOC entry 3376 (class 2606 OID 54216)
-- Name: lnpt_ukp12 lnpt_ukp12_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.lnpt_ukp12
    ADD CONSTRAINT lnpt_ukp12_pkey PRIMARY KEY (id);


--
-- TOC entry 3320 (class 2606 OID 53926)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 3380 (class 2606 OID 54243)
-- Name: pasangan pasangan_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pasangan
    ADD CONSTRAINT pasangan_pkey PRIMARY KEY (id);


--
-- TOC entry 3382 (class 2606 OID 54257)
-- Name: pemohon pemohon_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pemohon
    ADD CONSTRAINT pemohon_pkey PRIMARY KEY (id);


--
-- TOC entry 3386 (class 2606 OID 54299)
-- Name: penerimaan_ukp11 penerimaan_ukp_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penerimaan_ukp11
    ADD CONSTRAINT penerimaan_ukp_pkey PRIMARY KEY (id);


--
-- TOC entry 3360 (class 2606 OID 54083)
-- Name: perakuan_pemohon perakuan_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perakuan_pemohon
    ADD CONSTRAINT perakuan_pkey PRIMARY KEY (id);


--
-- TOC entry 3356 (class 2606 OID 54061)
-- Name: peribadi peribadi_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.peribadi
    ADD CONSTRAINT peribadi_pkey PRIMARY KEY (id);


--
-- TOC entry 3374 (class 2606 OID 54202)
-- Name: perkhidmatan perkhidmatan_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perkhidmatan
    ADD CONSTRAINT perkhidmatan_pkey PRIMARY KEY (id);


--
-- TOC entry 3350 (class 2606 OID 54026)
-- Name: permission_role permission_role_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permission_role
    ADD CONSTRAINT permission_role_pkey PRIMARY KEY (permission_id, role_id);


--
-- TOC entry 3348 (class 2606 OID 54011)
-- Name: permission_user permission_user_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permission_user
    ADD CONSTRAINT permission_user_pkey PRIMARY KEY (user_id, permission_id, user_type);


--
-- TOC entry 3342 (class 2606 OID 53991)
-- Name: permissions permissions_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_name_unique UNIQUE (name);


--
-- TOC entry 3344 (class 2606 OID 53989)
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- TOC entry 3358 (class 2606 OID 54076)
-- Name: permohonan_ukp12 permohonan_ukp12_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permohonan_ukp12
    ADD CONSTRAINT permohonan_ukp12_pkey PRIMARY KEY (id);


--
-- TOC entry 3333 (class 2606 OID 53966)
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- TOC entry 3335 (class 2606 OID 53969)
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- TOC entry 3366 (class 2606 OID 54130)
-- Name: pinjaman_pendidikan pinjaman_pendidikan_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pinjaman_pendidikan
    ADD CONSTRAINT pinjaman_pendidikan_pkey PRIMARY KEY (id);


--
-- TOC entry 3370 (class 2606 OID 54167)
-- Name: professional professional_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.professional
    ADD CONSTRAINT professional_pkey PRIMARY KEY (id);


--
-- TOC entry 3346 (class 2606 OID 54001)
-- Name: role_user role_user_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.role_user
    ADD CONSTRAINT role_user_pkey PRIMARY KEY (user_id, role_id, user_type);


--
-- TOC entry 3338 (class 2606 OID 53980)
-- Name: roles roles_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_name_unique UNIQUE (name);


--
-- TOC entry 3340 (class 2606 OID 53978)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- TOC entry 3372 (class 2606 OID 54179)
-- Name: sijil_kompeten sijil_kompeten_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sijil_kompeten
    ADD CONSTRAINT sijil_kompeten_pkey PRIMARY KEY (id);


--
-- TOC entry 3352 (class 2606 OID 54033)
-- Name: soalan_lnpk soalan_lnpk_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.soalan_lnpk
    ADD CONSTRAINT soalan_lnpk_pkey PRIMARY KEY (id);


--
-- TOC entry 3384 (class 2606 OID 54276)
-- Name: surat_pink surat_pink_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.surat_pink
    ADD CONSTRAINT surat_pink_pkey PRIMARY KEY (id);


--
-- TOC entry 3378 (class 2606 OID 54229)
-- Name: tatatertib_ukp12 tatatertib_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tatatertib_ukp12
    ADD CONSTRAINT tatatertib_pkey PRIMARY KEY (id);


--
-- TOC entry 3322 (class 2606 OID 53939)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 3324 (class 2606 OID 53937)
-- Name: users users_nokp_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_nokp_unique UNIQUE (nokp);


--
-- TOC entry 3326 (class 2606 OID 53935)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3327 (class 1259 OID 53945)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- TOC entry 3336 (class 1259 OID 53967)
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- TOC entry 3398 (class 2606 OID 54154)
-- Name: akademik akademik_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.akademik
    ADD CONSTRAINT akademik_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3395 (class 2606 OID 54310)
-- Name: cuti cuti_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cuti
    ADD CONSTRAINT cuti_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3396 (class 2606 OID 54117)
-- Name: harta harta_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.harta
    ADD CONSTRAINT harta_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3391 (class 2606 OID 54044)
-- Name: jawapan_lnpk jawapan_lnpk_id_lnpk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.jawapan_lnpk
    ADD CONSTRAINT jawapan_lnpk_id_lnpk FOREIGN KEY (id_lnpk) REFERENCES public.lnpk(id);


--
-- TOC entry 3392 (class 2606 OID 54049)
-- Name: jawapan_lnpk jawapan_lnpk_id_soalan; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.jawapan_lnpk
    ADD CONSTRAINT jawapan_lnpk_id_soalan FOREIGN KEY (id_soalan) REFERENCES public.soalan_lnpk(id);


--
-- TOC entry 3402 (class 2606 OID 54330)
-- Name: lnpt_ukp12 lnpt_ukp12_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.lnpt_ukp12
    ADD CONSTRAINT lnpt_ukp12_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3404 (class 2606 OID 54244)
-- Name: pasangan pasangan_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pasangan
    ADD CONSTRAINT pasangan_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3406 (class 2606 OID 54263)
-- Name: pemohon pemohon_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pemohon
    ADD CONSTRAINT pemohon_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3405 (class 2606 OID 54258)
-- Name: pemohon pemohon_id_permohonan; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pemohon
    ADD CONSTRAINT pemohon_id_permohonan FOREIGN KEY (id_permohonan) REFERENCES public.permohonan_ukp12(id);


--
-- TOC entry 3408 (class 2606 OID 54300)
-- Name: penerimaan_ukp11 penerimaa_ukp_id_pemohon; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penerimaan_ukp11
    ADD CONSTRAINT penerimaa_ukp_id_pemohon FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3409 (class 2606 OID 54305)
-- Name: penerimaan_ukp11 penerimaan_ukp_id_surat_pink; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.penerimaan_ukp11
    ADD CONSTRAINT penerimaan_ukp_id_surat_pink FOREIGN KEY (id_surat_pink) REFERENCES public.surat_pink(id);


--
-- TOC entry 3394 (class 2606 OID 54315)
-- Name: perakuan_pemohon perakuan_pemohon_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perakuan_pemohon
    ADD CONSTRAINT perakuan_pemohon_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3393 (class 2606 OID 54062)
-- Name: peribadi peribadi_users_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.peribadi
    ADD CONSTRAINT peribadi_users_id FOREIGN KEY (users_id) REFERENCES public.users(id);


--
-- TOC entry 3401 (class 2606 OID 54203)
-- Name: perkhidmatan perkhidmatan_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.perkhidmatan
    ADD CONSTRAINT perkhidmatan_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3389 (class 2606 OID 54015)
-- Name: permission_role permission_role_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permission_role
    ADD CONSTRAINT permission_role_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3390 (class 2606 OID 54020)
-- Name: permission_role permission_role_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permission_role
    ADD CONSTRAINT permission_role_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3388 (class 2606 OID 54005)
-- Name: permission_user permission_user_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.permission_user
    ADD CONSTRAINT permission_user_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3397 (class 2606 OID 54320)
-- Name: pinjaman_pendidikan pinjaman_pendidikan_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.pinjaman_pendidikan
    ADD CONSTRAINT pinjaman_pendidikan_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- TOC entry 3399 (class 2606 OID 54168)
-- Name: professional professional_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.professional
    ADD CONSTRAINT professional_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3387 (class 2606 OID 53995)
-- Name: role_user role_user_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.role_user
    ADD CONSTRAINT role_user_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3400 (class 2606 OID 54180)
-- Name: sijil_kompeten sijil_kompeten_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sijil_kompeten
    ADD CONSTRAINT sijil_kompeten_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- TOC entry 3407 (class 2606 OID 54277)
-- Name: surat_pink suratpink_id_permohonan; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.surat_pink
    ADD CONSTRAINT suratpink_id_permohonan FOREIGN KEY (id_permohonan) REFERENCES public.permohonan_ukp12(id);


--
-- TOC entry 3403 (class 2606 OID 54325)
-- Name: tatatertib_ukp12 tatatertib_ukp12_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tatatertib_ukp12
    ADD CONSTRAINT tatatertib_ukp12_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


-- Completed on 2022-06-30 16:33:06

--
-- PostgreSQL database dump complete
--

