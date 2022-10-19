--
-- PostgreSQL database dump
--

-- Dumped from database version 14.5 (Homebrew)
-- Dumped by pg_dump version 14.5 (Homebrew)

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: akademik; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.akademik OWNER TO rookiextreme;

--
-- Name: akademik_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.akademik_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.akademik_id_seq OWNER TO rookiextreme;

--
-- Name: akademik_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.akademik_id_seq OWNED BY public.akademik.id;


--
-- Name: calon; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.calon OWNER TO rookiextreme;

--
-- Name: calon_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.calon_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.calon_id_seq OWNER TO rookiextreme;

--
-- Name: calon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.calon_id_seq OWNED BY public.calon.id;


--
-- Name: cuti; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.cuti OWNER TO rookiextreme;

--
-- Name: cuti_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.cuti_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cuti_id_seq OWNER TO rookiextreme;

--
-- Name: cuti_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.cuti_id_seq OWNED BY public.cuti.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.failed_jobs OWNER TO rookiextreme;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO rookiextreme;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: files; Type: TABLE; Schema: public; Owner: rookiextreme
--

CREATE TABLE public.files (
    id bigint NOT NULL,
    content_bytes text,
    ext character varying,
    updated_at timestamp without time zone,
    created_at timestamp without time zone,
    filename character varying
);


ALTER TABLE public.files OWNER TO rookiextreme;

--
-- Name: files_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.files_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.files_id_seq OWNER TO rookiextreme;

--
-- Name: files_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.files_id_seq OWNED BY public.files.id;


--
-- Name: harta; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.harta OWNER TO rookiextreme;

--
-- Name: harta_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.harta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.harta_id_seq OWNER TO rookiextreme;

--
-- Name: harta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.harta_id_seq OWNED BY public.harta.id;


--
-- Name: jawapan_lnpk; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.jawapan_lnpk OWNER TO rookiextreme;

--
-- Name: kumpulan; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.kumpulan OWNER TO rookiextreme;

--
-- Name: kumpulan_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.kumpulan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kumpulan_id_seq OWNER TO rookiextreme;

--
-- Name: kumpulan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.kumpulan_id_seq OWNED BY public.kumpulan.id;


--
-- Name: lnpk; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.lnpk OWNER TO rookiextreme;

--
-- Name: lnpt_ukp12; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.lnpt_ukp12 OWNER TO rookiextreme;

--
-- Name: lnpt_ukp12_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.lnpt_ukp12_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lnpt_ukp12_id_seq OWNER TO rookiextreme;

--
-- Name: lnpt_ukp12_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.lnpt_ukp12_id_seq OWNED BY public.lnpt_ukp12.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: rookiextreme
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO rookiextreme;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO rookiextreme;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: pasangan; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.pasangan OWNER TO rookiextreme;

--
-- Name: pasangan_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.pasangan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pasangan_id_seq OWNER TO rookiextreme;

--
-- Name: pasangan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.pasangan_id_seq OWNED BY public.pasangan.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: rookiextreme
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO rookiextreme;

--
-- Name: pemohon; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.pemohon OWNER TO rookiextreme;

--
-- Name: pemohon_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.pemohon_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pemohon_id_seq OWNER TO rookiextreme;

--
-- Name: pemohon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.pemohon_id_seq OWNED BY public.pemohon.id;


--
-- Name: penempatan; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.penempatan OWNER TO rookiextreme;

--
-- Name: penempatan_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.penempatan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.penempatan_id_seq OWNER TO rookiextreme;

--
-- Name: penempatan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.penempatan_id_seq OWNED BY public.penempatan.id;


--
-- Name: penerimaan_ukp11; Type: TABLE; Schema: public; Owner: rookiextreme
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
    updated_by character varying(100),
    nokp_kerani character varying(255)
);


ALTER TABLE public.penerimaan_ukp11 OWNER TO rookiextreme;

--
-- Name: penerimaan_ukp11_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.penerimaan_ukp11_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.penerimaan_ukp11_id_seq OWNER TO rookiextreme;

--
-- Name: penerimaan_ukp11_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.penerimaan_ukp11_id_seq OWNED BY public.penerimaan_ukp11.id;


--
-- Name: perakuan_pemohon; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.perakuan_pemohon OWNER TO rookiextreme;

--
-- Name: perakuan_pemohon_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.perakuan_pemohon_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perakuan_pemohon_id_seq OWNER TO rookiextreme;

--
-- Name: perakuan_pemohon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.perakuan_pemohon_id_seq OWNED BY public.perakuan_pemohon.id;


--
-- Name: peribadi_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.peribadi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.peribadi_id_seq OWNER TO rookiextreme;

--
-- Name: peribadi; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.peribadi OWNER TO rookiextreme;

--
-- Name: perkhidmatan; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.perkhidmatan OWNER TO rookiextreme;

--
-- Name: perkhidmatan_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.perkhidmatan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perkhidmatan_id_seq OWNER TO rookiextreme;

--
-- Name: perkhidmatan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.perkhidmatan_id_seq OWNED BY public.perkhidmatan.id;


--
-- Name: permission_role; Type: TABLE; Schema: public; Owner: rookiextreme
--

CREATE TABLE public.permission_role (
    permission_id bigint NOT NULL,
    role_id bigint NOT NULL
);


ALTER TABLE public.permission_role OWNER TO rookiextreme;

--
-- Name: permission_user; Type: TABLE; Schema: public; Owner: rookiextreme
--

CREATE TABLE public.permission_user (
    permission_id bigint NOT NULL,
    user_id bigint NOT NULL,
    user_type character varying(255) NOT NULL
);


ALTER TABLE public.permission_user OWNER TO rookiextreme;

--
-- Name: permissions; Type: TABLE; Schema: public; Owner: rookiextreme
--

CREATE TABLE public.permissions (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    display_name character varying(255),
    description character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.permissions OWNER TO rookiextreme;

--
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permissions_id_seq OWNER TO rookiextreme;

--
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;


--
-- Name: permohonan_ukp12; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.permohonan_ukp12 OWNER TO rookiextreme;

--
-- Name: permohonan_ukp12_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.permohonan_ukp12_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permohonan_ukp12_id_seq OWNER TO rookiextreme;

--
-- Name: permohonan_ukp12_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.permohonan_ukp12_id_seq OWNED BY public.permohonan_ukp12.id;


--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.personal_access_tokens OWNER TO rookiextreme;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO rookiextreme;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: pertubuhan; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.pertubuhan OWNER TO rookiextreme;

--
-- Name: pertubuhan_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.pertubuhan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pertubuhan_id_seq OWNER TO rookiextreme;

--
-- Name: pertubuhan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.pertubuhan_id_seq OWNED BY public.pertubuhan.id;


--
-- Name: pinjaman_pendidikan; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.pinjaman_pendidikan OWNER TO rookiextreme;

--
-- Name: pinjaman_pendidikan_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.pinjaman_pendidikan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pinjaman_pendidikan_id_seq OWNER TO rookiextreme;

--
-- Name: pinjaman_pendidikan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.pinjaman_pendidikan_id_seq OWNED BY public.pinjaman_pendidikan.id;


--
-- Name: professional; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.professional OWNER TO rookiextreme;

--
-- Name: professional_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.professional_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.professional_id_seq OWNER TO rookiextreme;

--
-- Name: professional_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.professional_id_seq OWNED BY public.professional.id;


--
-- Name: role_user; Type: TABLE; Schema: public; Owner: rookiextreme
--

CREATE TABLE public.role_user (
    role_id bigint NOT NULL,
    user_id bigint NOT NULL,
    user_type character varying(255) NOT NULL
);


ALTER TABLE public.role_user OWNER TO rookiextreme;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: rookiextreme
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    display_name character varying(255),
    description character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO rookiextreme;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO rookiextreme;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- Name: sijil_kompeten; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.sijil_kompeten OWNER TO rookiextreme;

--
-- Name: sijil_kompeten_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.sijil_kompeten_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sijil_kompeten_id_seq OWNER TO rookiextreme;

--
-- Name: sijil_kompeten_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.sijil_kompeten_id_seq OWNED BY public.sijil_kompeten.id;


--
-- Name: soalan_lnpk; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.soalan_lnpk OWNER TO rookiextreme;

--
-- Name: surat_pink; Type: TABLE; Schema: public; Owner: rookiextreme
--

CREATE TABLE public.surat_pink (
    id bigint NOT NULL,
    no_bil character varying(100),
    no_ruj character varying(100),
    no_fail character varying(100),
    no_jilid character varying(100),
    id_pemohon integer,
    flag integer,
    delete_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    created_by character varying(100),
    updated_by character varying(100),
    no_surat character varying,
    tkh_lapor_diri date,
    fail_id integer,
    alamat text
);


ALTER TABLE public.surat_pink OWNER TO rookiextreme;

--
-- Name: surat_pink_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.surat_pink_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.surat_pink_id_seq OWNER TO rookiextreme;

--
-- Name: surat_pink_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.surat_pink_id_seq OWNED BY public.surat_pink.id;


--
-- Name: tatatertib_ukp12; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.tatatertib_ukp12 OWNER TO rookiextreme;

--
-- Name: tatatertib_ukp12_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.tatatertib_ukp12_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tatatertib_ukp12_id_seq OWNER TO rookiextreme;

--
-- Name: tatatertib_ukp12_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.tatatertib_ukp12_id_seq OWNED BY public.tatatertib_ukp12.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: rookiextreme
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


ALTER TABLE public.users OWNER TO rookiextreme;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: rookiextreme
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO rookiextreme;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rookiextreme
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: akademik id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.akademik ALTER COLUMN id SET DEFAULT nextval('public.akademik_id_seq'::regclass);


--
-- Name: calon id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.calon ALTER COLUMN id SET DEFAULT nextval('public.calon_id_seq'::regclass);


--
-- Name: cuti id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.cuti ALTER COLUMN id SET DEFAULT nextval('public.cuti_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: files id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.files ALTER COLUMN id SET DEFAULT nextval('public.files_id_seq'::regclass);


--
-- Name: harta id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.harta ALTER COLUMN id SET DEFAULT nextval('public.harta_id_seq'::regclass);


--
-- Name: kumpulan id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.kumpulan ALTER COLUMN id SET DEFAULT nextval('public.kumpulan_id_seq'::regclass);


--
-- Name: lnpt_ukp12 id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.lnpt_ukp12 ALTER COLUMN id SET DEFAULT nextval('public.lnpt_ukp12_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: pasangan id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pasangan ALTER COLUMN id SET DEFAULT nextval('public.pasangan_id_seq'::regclass);


--
-- Name: pemohon id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pemohon ALTER COLUMN id SET DEFAULT nextval('public.pemohon_id_seq'::regclass);


--
-- Name: penempatan id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.penempatan ALTER COLUMN id SET DEFAULT nextval('public.penempatan_id_seq'::regclass);


--
-- Name: penerimaan_ukp11 id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.penerimaan_ukp11 ALTER COLUMN id SET DEFAULT nextval('public.penerimaan_ukp11_id_seq'::regclass);


--
-- Name: perakuan_pemohon id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.perakuan_pemohon ALTER COLUMN id SET DEFAULT nextval('public.perakuan_pemohon_id_seq'::regclass);


--
-- Name: perkhidmatan id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.perkhidmatan ALTER COLUMN id SET DEFAULT nextval('public.perkhidmatan_id_seq'::regclass);


--
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- Name: permohonan_ukp12 id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.permohonan_ukp12 ALTER COLUMN id SET DEFAULT nextval('public.permohonan_ukp12_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: pertubuhan id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pertubuhan ALTER COLUMN id SET DEFAULT nextval('public.pertubuhan_id_seq'::regclass);


--
-- Name: pinjaman_pendidikan id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pinjaman_pendidikan ALTER COLUMN id SET DEFAULT nextval('public.pinjaman_pendidikan_id_seq'::regclass);


--
-- Name: professional id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.professional ALTER COLUMN id SET DEFAULT nextval('public.professional_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Name: sijil_kompeten id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.sijil_kompeten ALTER COLUMN id SET DEFAULT nextval('public.sijil_kompeten_id_seq'::regclass);


--
-- Name: surat_pink id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.surat_pink ALTER COLUMN id SET DEFAULT nextval('public.surat_pink_id_seq'::regclass);


--
-- Name: tatatertib_ukp12 id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.tatatertib_ukp12 ALTER COLUMN id SET DEFAULT nextval('public.tatatertib_ukp12_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: akademik; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.akademik (id, nama_sijil, nama_insititusi, tahun, id_peribadi, flag, delete_id, created_at, updated_at, created_by, updated_by, kod_sijil, jenis_sijil) FROM stdin;
\.


--
-- Data for Name: calon; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.calon (id, kumpulan_id, nokp, created_at, updated_at, created_by, updated_by, flag, delete_id, email) FROM stdin;
2	1	800120035909	2022-07-27 02:25:49	2022-07-27 02:25:49	900919099999	900919099999	1	0	\N
3	1	810424095192	2022-07-27 02:25:49	2022-07-27 02:25:49	900919099999	900919099999	1	0	\N
1	1	830910135346	2022-07-27 02:25:49	2022-07-27 08:04:41	900919099999	900919099999	1	0	\N
4	2	821031135521	2022-09-12 11:12:40	2022-09-12 11:12:40	900919099999	900919099999	1	0	\N
5	2	820314145821	2022-09-12 11:12:40	2022-09-12 11:12:40	900919099999	900919099999	1	0	\N
6	2	870104145757	2022-09-12 11:12:40	2022-09-12 11:12:40	900919099999	900919099999	1	0	\N
7	3	840623025821	2022-09-14 10:41:40	2022-09-14 10:41:40	900919099999	900919099999	1	0	\N
8	3	830416145901	2022-09-14 10:41:40	2022-09-14 10:41:40	900919099999	900919099999	1	0	\N
9	3	850525086451	2022-09-14 10:41:40	2022-09-14 10:41:40	900919099999	900919099999	1	0	\N
10	3	810912025505	2022-09-14 10:41:40	2022-09-14 10:41:40	900919099999	900919099999	1	0	\N
11	3	851018025077	2022-09-14 10:41:40	2022-09-14 10:41:40	900919099999	900919099999	1	0	\N
12	4	790418145821	2022-10-05 11:34:16	2022-10-05 11:34:16	900919099999	900919099999	1	0	\N
13	4	770907145621	2022-10-05 11:34:16	2022-10-05 11:34:16	900919099999	900919099999	1	0	\N
14	4	771222025701	2022-10-05 11:34:16	2022-10-05 11:34:16	900919099999	900919099999	1	0	\N
15	5	830801025623	2022-10-13 11:12:13	2022-10-13 11:12:13	900919099999	900919099999	1	0	\N
16	5	820620145264	2022-10-13 11:12:13	2022-10-13 11:12:13	900919099999	900919099999	1	0	\N
\.


--
-- Data for Name: cuti; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.cuti (id, status, jenis, tkh_mula, tkh_akhir, surat_kelulusan, id_pemohon, flag, delete_id, created_at, updated_at, created_by, updated_by) FROM stdin;
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: files; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.files (id, content_bytes, ext, updated_at, created_at, filename) FROM stdin;
4	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LmNvbS9leGlmLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOnRpZmY9Imh0dHA6Ly9ucy5hZG9iZS5jb20vdGlmZi8xLjAvIj4KICAgICAgICAgPGV4aWY6VXNlckNvbW1lbnQ+U2NyZWVuc2hvdDwvZXhpZjpVc2VyQ29tbWVudD4KICAgICAgICAgPGV4aWY6UGl4ZWxYRGltZW5zaW9uPjEwOTI8L2V4aWY6UGl4ZWxYRGltZW5zaW9uPgogICAgICAgICA8ZXhpZjpQaXhlbFlEaW1lbnNpb24+OTQ0PC9leGlmOlBpeGVsWURpbWVuc2lvbj4KICAgICAgICAgPHRpZmY6UmVzb2x1dGlvblVuaXQ+MjwvdGlmZjpSZXNvbHV0aW9uVW5pdD4KICAgICAgICAgPHRpZmY6WFJlc29sdXRpb24+MTQ0LzE8L3RpZmY6WFJlc29sdXRpb24+CiAgICAgICAgIDx0aWZmOllSZXNvbHV0aW9uPjE0NC8xPC90aWZmOllSZXNvbHV0aW9uPgogICAgICAgICA8dGlmZjpPcmllbnRhdGlvbj4xPC90aWZmOk9yaWVudGF0aW9uPgogICAgICA8L3JkZjpEZXNjcmlwdGlvbj4KICAgPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KeGHiigAAQABJREFUeAHsnQncBdX8/0/ZylrIkiJEWSpFKVqFolDKnhapaKENbVqUFkKLIqJIiRb7khYttooQJUubCGUJkS3z/77P35nfmXNn5s7cO3ee+9znc16v57mznPU9M2f5nu/5nkUyc05OBERABERABERABERABERABERABERABBYQgUUXUFlVVBEQAREQAREQAREQAREQAREQAREQARHwBCQQ0YsgAiIgAiIgAiIgAiIgAiIgAiIgAiKw4AhIILLgHrkKLAIiIAIiIAIiIAIiIAIiIAIiIAIiIIGI3gEREAEREAEREAEREAEREAEREAEREIEFR0ACkQX3yFVgERABERABERABERABERABERABERABCUT0DoiACIiACIiACIiACIiACIiACIiACCw4AhKILLhHrgKLgAiIgAiIgAiIgAiIgAiIgAiIgAhIIKJ3QAREQAREQAREQAREQAREQAREQAREYMERkEBkwT1yFVgEREAEREAEREAEREAEREAEREAEREACEb0DIiACIiACIiACIiACIiACIiACIiACC46ABCIL7pGrwCIgAiIgAiIgAiIgAiIgAiIgAiIgAhKI6B0QAREQAREQAREQAREQAREQAREQARFYcAQkEFlwj1wFFgEREAEREAEREAEREAEREAEREAERkEBE74AIiIAIiIAIiIAIiIAIiIAIiIAIiMCCIyCByIJ75CqwCIiACIiACIiACIiACIiACIiACIiABCJ6B0RABERABERABERABERABERABERABBYcAQlEFtwjV4FFQAREQAREQAREQAREQAREQAREQAQkENE7IAIiIAIiIAIiIAIiIAIiIAIiIAIisOAISCCy4B65CiwCIiACIiACIiACIiACIiACIiACIiCBiN4BERABERABERABERABERABERABERCBBUdAApEF98hVYBEQAREQAREQAREQAREQAREQAREQAQlE9A6IgAiIgAiIgAiIgAiIgAiIgAiIgAgsOAISiCy4R64Ci4AIiIAIzAqBb37zm+6///1vaXFuuOEGd+utt5be00UREAEREAEREAEREAHnJBCpeAs+9alPuUUWWST/u8c97lHhU5f7IvCCF7wgfx48m+23376vpGvTafuutPVfm7huioAILFgCJ598sltnnXXcuuuu637xi18UONx8881u/fXXd0996lPd6aefXrink9kl0LZ9aet/dsmpZCIgAlUE0nriQQ96UO715z//eaFvTv/8+uuvz+/rQATmA4F7zodM1uXxL3/5i7vuuuvcTTfd5G688Ub3u9/9zi277LJuxRVXdCussIJbbrnl3KKLSu5Tx1D3ygnwLn3iE59wj3zkI93mm2/uFl988XKPPVydprz0UFwlIQIiMITAhRde6HbaaSeXZZlDS+QVr3iF+973vudD/fOf/3Qbb7yxu+WWW/z5Vltt5QUjq6yySh4r4RCapO4+97mPr/PS612c//KXvxzQZmGygTZ72l0Vr6p83//+93cPfehDq263uj5N9f805aUVxCn3/Pe//93ddttteS67fH/ySHUgAiIgAiJQSmDeCkR+9KMfueOOO87PfN11112lhePiYost5tZcc0139NFHu6c//emV/nRDBGICV199tX9f/vOf//jLj370ox3q53OhKTRNeYkZ6VgERGBuCPzrX/9yO++8c0G4sN9+++WZOeqoo/xEQbjwwhe+0MXCEK7/4x//cI997GODl/z3vve9r/v1r3/tllhiifxaFwfXXnute8pTnjIQFUKD22+/feD6tF2o4lWXT1jSdoS/zTbbzG2yySZ1QQbuTVP9P015GQA1zy+8/e1vd+9973vzUjz+8Y93YeY9v6gDERABERCBiRCYd6oTv/3tb91GG23kVl55ZYe6cJ0wBGJ0Yi6++GK3xhpruDe84Q3uD3/4w0RAKtLZIoBmSBCGUDJmNs8///w5KeQ05WVOAChRERCBAoETTjjB/exnP8uvrb766m6LLbbw58zgH3HEEfk91JcPP/zw/HzYATPV1Dlduw996ENdRzn18cESDdavfe1rvr+y6aabumc84xnu85//fOO8T1P9P015aQxwHnj897//PfDNseTgkksumQe5VxYXAgHqstjFS2bSe/iL78fhdCwC00pgXmmIoBVCh4LBaVuH0bmTTjrJnXXWWe7Tn/6023DDDdtGIf8LiEBZZb7kkkvOCYFpysucAFCiIjAPCKDufuKJJxZyussuu7illlqqcK2Lk49+9KOFaPbee+/8/IwzzvATAeHC85///AHtkHCv6hfhxa677lp1u/V1JiY+/vGPtw43iwFY1vSSl7zE/33mM5/xa+/ryjlN9f805aWO2Xy796UvfamwXCbk/5RTTvF2gMK5fkVgHALjtFHXXHNNIWnMEQSX3tNyr0BGv/OJwLwRiFx00UUOddO//vWvBb73u9/9/JIYZsj4QyX3N7/5jVc1RIBCx/Fvf/tbHuaPf/yje/WrX+1Q/Xz4wx+eX9eBCMQEXvva17qPfOQj3i4N19FKeuYznxl76e14mvLSW6GVkAjMMwIs+zjkkEMKucauR9cCEdq1H//4x4V04uWgCERiF9+Lr9cdk8a3v/1tt9Zaa9V5a3yPiYg//elPjf3PF4/Petaz3GqrrVaaXfodv/rVr/wfSx9ijUMCfO5zn/NLJPbaa6/S8OHiNNX/05SXwGcWflMBZyjT2Wef7Y4//nj3wAc+MFzSrwiMTGCcNooxU+xWWmml/DS9hyFvORGYbwTmhUCEjhRCjFQYwgdJpyJdB40xVazr4972tre5t771rS7uJCIl3W677RxSedSJ5UQgJcCab1RWMVb4iEc8wi2//PKpl97OpykvvRVaCYmACJQS+P73v1+4zmzc4x73OH8NTcgf/vCHhfssLx3FoVHZlUCE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QQtr/MPfeuutpzX/BWo6EQERSAn861//cksuuaT7+9//nt9aZpllvEYatojuda975dd1IAIpAbVFKRGdi4AIiIAIVBGQQKSKjK6LgAiIgAiIgAjMGQGW4V1//fXuz3/+s9+We4kllpizvChhERABERABERCB2SQggchsPleVSgREQAREQAREQAREQAREQAREQAREoIaAbIjUwNEtERABERABERABERABERABERABERCB2SQggchsPleVSgREQAREQAREQAREQAREQAREQAREoIaABCI1cHRLBERABERABERABERABERABERABERgNglIIDKbz1WlEgEREAEREAEREAEREAEREAEREAERqCEggUgNHN0SAREQAREQAREQAREQAREQAREQARGYTQISiMzmc1WpREAEREAEREAEREAEREAEREAEREAEaghIIFIDR7dEQAREQAREQAREQAREQAREQAREQARmk4AEIrP5XFUqERABERABERABERABERABERABERCBGgISiNTA0S0REAEREAEREAEREAEREAEREAEREIHZJCCByGw+V5VKBERABERABERABERABERABERABESghoAEIjVwdEsEREAEREAEREAEREAEREAEREAERGA2CUggMpvPVaUSAREQAREQAREQAREQAREQAREQARGoISCBSA0c3RIBERABERABERABERABERABERABEZhNAhKIzOZzValEQAREQAREQAREQAREQAREQAREQARqCEggUgNHt0RABERABERABERABERABERABERABGaTgAQis/lcVSoREAEREAEREAEREAEREAEREAEREIEaAhKI1MDRLREQAREQAREQAREQAREQAREQAREQgdkkIIHIbD5XlUoEREAEREAEREAEREAEREAEREAERKCGgAQiNXB0SwREQAREQAREQAREQAREQAREQAREYDYJSCAym89VpRIBERABERABERABERABERABERABEaghIIFIDRzdEgEREAEREAEREAEREAEREAEREAERmE0CEojM5nNVqURABERABERABERABERABERABERABGoISCBSA0e3REAEREAEREAEREAEREAEREAEREAEZpOABCKz+VxVKhEQAREQAREQAREQAREQAREQAREQgRoCEojUwNEtERABERABERABERABERABERABERCB2SQggchsPleVSgREQAREQAREQAREQAREQAREQAREoIaABCI1cHRLBERABERABERABERABERABERABERgNglIIDKbz1WlEgEREAEREAEREAEREAEREAEREAERqCEggUgNHN0SAREQAREQAREQAREQAREQAREQARGYTQISiMzmc1WpREAEREAEREAEREAEREAEREAEREAEaghIIFIDR7dEQAREQAREQAREQAREQAREQAREQARmk4AEIrP5XFUqERABERABERABERABERABERABERCBGgISiNTA0S0REAEREAEREAEREAEREAEREAEREIHZJCCByGw+V5VKBERABERABERABERABERABERABESghoAEIjVwdEsEREAEREAEREAEREAEREAEREAERGA2CUggMpvPVaUSAREQAREQAREQAREQAREQAREQARGoISCBSA0c3RIBERABERABERABERABERABERABEZhNAhKIzOZzValEQAREQAREQAREQAREQAREQAREQARqCEggUgNHt0RABERABERABERABERABERABERABGaTgAQis/lcVSoREAEREAEREAEREAEREAEREAEREIEaAhKI1MDRLREQAREQAREQAREQAREQAREQAREQgdkkIIHIbD5XlUoEREAEREAEREAEREAEREAEREAERKCGgAQiNXB0SwREQAREQAREQAREQAREQAREQAREYDYJSCAym89VpRIBERABERABERABERABERABERABEaghIIFIDRzdEgEREAEREAEREAEREAEREAEREAERmE0CEojM5nNVqURABERABERABERABERABERABERABGoISCBSA0e3REAEREAEREAEREAEREAEREAEREAEZpOABCKz+VxVKhEQAREQAREQAREQAREQAREQAREQgRoCEojUwNEtERABERABERABERABERABERABERCB2SQggchsPleVSgREQAREQAREQAREQAREQAREQAREoIaABCI1cHRLBERABERABERABERABERABERABERgNglIIDKbz1WlEgEREAEREAEREAEREAEREAEREAERqCEggUgNHN0SAREQAREQAREQAREQAREQAREQARGYTQISiMzmc1WpREAEREAEREAEREAEREAEREAEREAEaghIIFIDR7dEQAREQAREQAREQAREQAREQAREQARmk4AEIrP5XFUqERABERABERABERABERABERABERCBGgISiNTA0S0REAEREAEREAEREAEREAEREAEREIHZJCCByGw+V5VKBERABERABERABERABERABERABESghoAEIjVwdEsEREAEREAEREAEREAEREAEREAERGA2CUggMpvPVaUSAREQAREQAREQAREQAREQAREQARGoISCBSA0c3RIBERABERABERABERABERABERABEZhNAhKIzOZzValEQAREQAREQAREQAREQAREQAREQARqCEggUgNHt0RABERABERABERABERABERABERABGaTwD1ns1iTK9Vf/vIXd9JJJ7kf//jH7vrrr3cPechD3BZbbOG23nrrySWqmKeKwLe//W133nnn5Xnac8893QMf+MD8fKEcvOMd73APfvCD3c477+wWXfT/y1b33ntvt9JKK7ltttlmoWDotJxHHHGE++c//+njXG211dyLX/ziPH69dzkKHUwpgU9+8pPupz/9qc/dJpts4lZffXXfXv7mN7/x1175yle6FVdccazcn3XWWe6aa67xcVDvUv/KdUvgtNNO8/0bYn3Ywx7m6/huU1BsIiACIiACIjA9BKZWIHL++ee7P//5z6Wk7nnPe7qll17aLbvssu4Rj3iEW2SRRUr9dX2RQfB2223nQucuxP/whz9cApEAYwH8MjA95JBD8pK+/vWvX3ACkc985jPuoIMO8gzue9/7ute97nXu5JNPdu95z3v8tSWXXDIfzKffMt/rZptt5u5xj3vkDIcdXHjhhe5Pf/pTwRtxUBdM2v361792PPMyR1ke9KAH+bqI+ggWde5zn/ucO/74492jHvUot//++7snPvGJBe8IRP7617/6a9tvv33OkAvD3rthcRcSmmcnl156qbvtttt8rh/5yEe6Zz/72fOsBAsju2eccYb74he/6Au71FJL5QKR73//+/7aqquuOrZA5NOf/rQ7++yzfXzLLLOMBCITeLUQiFBv457ylKeMJBD54x//6BCaX3nlle7Vr36122WXXSaQU0UpAiIgAiIgAuMTmPxoYsQ87rHHHvksUF0U97vf/fxgbK+99nKPecxj6ryOde/222/3jTqNfOoWX3zx9JLORWBmCdx6661u22239eVDIPmqV73Kzwrvuuuu/hqDfGaHgyv7lr/yla+4jTfeOHip/f3DH/7gXvjCF7p/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GemOw+hYBERABERABERABCZBoF8dyUmUQHFOlACDSnZXCI4dDSQMCTT0O40EeF+DMARNny222GIaszkv88ROM+xiZIYfHZp2sWP5FkuGgmO5iNnfCKf6FYGcAMuAEIbgzN6OhCE5GR2IgAiIgAiIgAj0TUAaIn0Tnwfpofa+2267efXV733ve35WmGyb8UCvsp2uPZ4HRVIWZ5zA2Wef7T796U+7yy67zJmx4ry0e+65pzNjpPm5DkYnwNaYLCcLDmETNplQt0f13gxW5ktl8IMtj21tm3E5EYgJsJyK5Zws/8EOGO/NJJZBxmnqWAREQAREQAREQASqCEggUkVmAV9nnXzZunAMnIWlMwsYj4o+hQT23nvvAcGHbUHtvv3tb2uNeYfPy3ZTcRjADfaEyqLGOOLuu+/ujj766LLbuiYC3n7XwQcf7Pbaay8vUBMSERABERABERABEZgrAloyM1fk51G67LJyzDHHSBgyj57ZQs8qBhrZVUoG97p9E9jVi6Uxtk2qY5eHeGcIdpdhJwy0yiQM6Zb7rMWG4dH3v//9EobM2oNVeURABERABERgHhKQhsg8fGiTzjK7GVx++eXu+uuv91vzsa3dkksuOelkFb8IjEyAHR4YiKPdhEHVlVdeeeS4FLA5AexAsLMGO55oKV1zbvIpAiIgAiIgAiIgAiIwHQQkEJmO56BciIAIiIAIiIAIiIAIiIAIiIAIiIAI9EhAS2Z6hK2kREAEREAEREAEREAEREAEREAEREAEpoOABCLT8RyUCxEQAREQAREQAREQAREQAREQAREQgR4JSCDSI2wlJQIiIAIiIAIiIAIiIAIiIAIiIAIiMB0EJBCZjuegXIiACIiACIiACIiACIiACIiACIiACPRIQAKRHmErKREQAREQAREQAREQAREQAREQAREQgekgIIHIdDwH5UIEREAEREAEREAEREAEREAEREAERKBHAhKI9AhbSYmACIiACIiACIiACIiACIiACIiACEwHAQlEpuM5KBciIAIiIAIiIAIiIAIiIAIiIAIiIAI9EpBApEfYSkoEREAEREAEREAEREAEREAEREAERGA6CEggMh3PQbkQAREQAREQAREQAREQAREQAREQARHokYAEIj3CVlIiIAIiIAIiIAIiIAIiIAIiIAIiIALTQUACkel4DsqFCIiACIiACIiACIiACIiACIiACIhAjwQkEOkRtpISAREQAREQAREQAREQAREQAREQARGYDgISiEzHc1AuREAEREAEREAEREAEREAEREAEREAEeiQggUiPsJWUCIiACIiACIiACIiACIiACIiACIjAdBCQQGQ6noNyIQIiIAIiIAIiIAIiIAIiIAIiIAIi0CMBCUR6hK2kREAEREAEREAEREAEREAEREAEREAEpoOABCLT8RyUCxEQAREQAREQAREQAREQAREQAREQgR4JSCDSI2wlJQIiIAIiIAIiIAIiIAIiIAIiIAIiMB0EJBCZjuegXIiACIiACIiACIiACIiACIiACIiACPRIQAKRHmErKREQAREQAREQAREQAREQAREQAREQgekgIIHIdDwH5UIEREAEREAEREAEREAEREAEREAERKBHAhKI9AhbSYmACIiACIiACIiACIiACIiACIiACEwHAQlEpuM5KBciIAIiIAIiIAIiIAIiIAIiIAIiIAI9EpBApEfYSkoEREAEREAEREAEREAEREAEREAERGA6CEggMh3PQbkQAREQAREQAREQAREQAREQAREQARHokcA9e0xLSTUk8IlPfML94he/cE972tPcZptt1jBUf94mkb+LLrrIXXrppe5hD3uY23nnnfPC/Pe//3XveMc7/PnLX/5y9+QnPzm/pwMREAERmBUCVXXgrJRvFsvxq1/9yp188sm+aLvvvrtbYoklZrGY7mtf+5r71re+5ZZeemm34447TlUZ+/xuzjjjDPezn/3MrbLKKm7zzTefUw7T/EzmFIwSX1AEwniEQr/0pS91K6+88oIqvwrbHYFFMnPdRaeYrr76avf5z3++NYj73e9+bo899vDhNt54Y3feeee5bbbZxp166qmN47rmmmvcu971Lvfc5z7Xvfa1r20crq3HUfNHOlV5POCAA9w73/lO95SnPMX9+Mc/zrP0n//8x93rXvfy52eddZbbcsst83tVceUedCACItCKwAknnOD+9Kc/DYS5733v65Zbbjn/R4fjnvcsl6V/4AMfcH/4wx98+E033dQLdQciq7hw5plnekEwt9daay234YYbDvikufryl7/svve97znq2iWXXNIPTp73vOe5FVZYYcB/0ws333yzr3N/8IMfuN/+9re+HkIg/ZKXvKSyrMTdZX6q6sCmZZC//gl85zvf8e8qKd94443+++g/F5NPca+99nLvfe973TOe8Qx35ZVXNkrw3e9+t/v5z3/uDj74YC9IaRRoBE9V380k+gebbLKJr3+22mord9ppp42Q2+6CjPJMukt9/Jguu+wyd+2117qddtpp/MgUw0wQQNj4qU99yl1//fW+H/HYxz7Wt+uMOR7/+MeXljGMR7jJN8m3OVeOsd/+++/vHv3oR7sPfehD7lGPetRcZUXpjkIAgYhcdwROOeUUBEyt/5Zaaqk8ExtttJEPbwKR/FqTg9e97nU+nA1eMhMkNAkykp9R80diVXm0SsTn3QQihTz9+9//zlmaQKRwryqugiedzCSBf/7zn5kN3LM77rhjJss3TqHGYfO4xz0u/96q6rHll18+O/300zPT3hrI5hOe8IQ8vAkTBu5XXfjzn/+cUW+FNN/ylrcMeL3zzjszm5XN/QS//C622GLZxz72sYEwTS6YgCV70IMeVBrv+uuvn912222l0XSdn6o6sDTxCV/kefB9/eMf/5hwStMffR2Lb3/72/l7YwKR6S/MiDncc889fTlNINIohl/+8pc5lyOOOKJRmFE9VX03k+gfvPCFL/TlskHXqNntLFzbZ0LC47QNXWT8pptuykzjN7PBree47rrrdhGt4pjnBGhraNsXWWSRvN6I2/d73/ve2d5775395S9/GShpGI/g3wQiA/f7vLDaaqvl+T/yyCP7TFppdUCgfJrP3iy50Qgwe7rffvsNBL788svdhRde6O5xj3u4t73tbQP30RAZ122xxRbuG9/4hnvBC17g0xk3vkmE7zKPXcY1ibIqzskRQE1y++23d4svvrj7+9//PrmE5mHMXbB5+tOf7qyjkZfeBsbuhhtucKins5zvNa95jWO5wFvf+tbcT3rwpS99yd16662NZofJ87DniHbYV7/6VWfCD1/HPutZz3K33367M+GM++IXv+g16kyw4bU60rxUnbMMAE0WluaZ8MO/U8zqMAuOxtrFF1/snv/857vvf//7A1FMIj8DiczRhac+9anulltucUcddVTtM56j7PWarFi0x73MMsv4JSXUFXE90j6m0UOofzDIrou2YTDW+it33XWXO+ecc7y2M+2HjVvqA+jugiJAHwFt0Ouuuy4vtwlG3MMf/nBnkxG+bf7Xv/7ljj76aPfDH/7Qa3JyfxodfZKrrrrKj7+e+cxnTmMWlacaAhKI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PAIyqrrwdaAcCAEhIASEgBAQAkJACAgBISAEhIAQEAIzRkACkRkDruSEgBAQAkJACAgBISAEhIAQEAJCQAgIgYVHQAKRha8D5UAICAEhIASEgBAQAkJACAgBISAEhIAQmDECEojMGHAlJwSEgBAQAkJACAgBISAEhIAQEAJCQAgsPAISiCx8HSgHQkAICAEhIASEgBAQAkJACAgBISAEhMCMEZBAZMaAKzkhIASEgBAQAkJACAgBISAEhIAQEAJCYOERkEBk4etAORACQkAICAEhIASEgBAQAkJACAgBISAEZoyABCIzBlzJCQEhIASEgBAQAkJACAgBISAEhIAQEAILj4AEIgtfB8qBEBACQkAICAEhIASEgBAQAkJACAgBITBjBCQQmTHgSk4ICAEhIASEgBAQAkJACAgBISAEhIAQWHgEJBBZ+DpQDoSAEBACQkAICAEhIASEgBAQAkJACAiBGSMggciMAVdyQkAICAEhIASEgBAQAkJACAgBISAEhMDCIyCByMLXgXIgBISAEBACQkAICAEhIASEgBAQAkJACMwYgRVnnJ6Suw6Bl770peGf//xn/LX//vuHW9ziFnOHzfHHHx/+8pe/xHztvffe4Ta3uU3nPJ5xxhnhyiuvjPE85SlPCfe5z31SnKP80kd6EQJCYEERqOunV199dTj55JNj3m51q1uFffbZZ2w+L7nkkvDRj340fneve90rbLPNNmPDTPJBn3kcl16XMtTlc1ya8hcCQkAIzAsCbXh/l7x/+ctfDuecc06MYt111w3bbrttl+g6hf3HP/4RjjnmmBTHi170orDiiot3abUY1iYJbL0IgT4RKEQLgsCNb3zjwuox/v3oRz+aOA9/+9vfiu222664293uVrzhDW+YOFybD29961unPH7729+eOIpRedxiiy1SnG9/+9sH4qzzGxXfQAT6IQSEwNQRqOunX/jCF1Lfvutd7zpRPl73utelME972tMmCuMfjeILfebR06t7dilDXT7r0lru7qPqfDFjs1TLtZjrpE3e3/SmNxXrrLNOAS+zzaQ2USzKMKN4/zTa9oknnpjGDROiLyhm1157bcoLc/rFXu+LYW2yoBWuxJcsAjoy06d0KYvLmGT47W9/G/9sQMh8ur2ed9554cwzzwzf+973wsEHHxz+9a9/dYtwCqH7zmPf8U2hyIpyighM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CAgBISAEhIAQEAJCQAgIgSWOgAQiS7yCVTwhIASEgBAQAkJACAgBISAEhIAQEAJCYBgBCUSGMZGLEBACQkAICAEhIASEgBAQAkJACAgBIbDEEZBAZIlXsIonBISAEBACQkAICAEhIASEgBAQAkJACAwjIIHIMCZyEQJCQAgIASEgBISAEBACQkAICAEhIASWOAISiCzxClbxhIAQEAJCQAgIASEgBISAEBACQkAICIFhBCQQGcZELkJACAgBISAEhIAQEAJCQAgIASEgBITAEkdAApElXsEqnhAQAkJACAgBISAEhIAQEAJCQAgIASEwjMCKw05yWQ4IXH311eHkk0+ORd1vv/3CKqusshyKrTIKASEgBITAEkNgMY1n73znO8MVV1wR1l9//fDkJz95idWEiiMEhhH4z3/+E4466qjose2224Z11103ffTpT386XHDBBWHVVVcNe+21V3LXy+wRmGVdzBMfPO+888JFF10UVl999bD77rvPHvieUlxM42BPRe41mhUKo15jVGSLAoGLL744POhBD4p5veqqq8Kaa665KPK9HDN5+eWXh+OPPz5sttlmYccdd5w7CP7+97+HV7ziFQFWsvHGG4fHPvaxY/P4z3/+M5aJMCwMnvCEJ8Qwb3zjG8Nvf/vb+P74xz8+bLDBBmPj8g/e9a53hSuvvDL+pG0/6lGPcq+Rz5e//OXhe9/7XjjyyCPjgDjyY3kKASEwdwgspvHscY97XPjoRz8anvGMZ4S3v/3tc4fltDLEOPb+97+/Mvob3OAGcQ5yt7vdLay33nqB37Okv/3tb+FFL3pRWGGFFcLRRx8dbnjDG84y+SWTVt1c5V//+ldYaaWVYjnf8573hG222SaVGdxf+tKXxnq/7LLLkrte/otAHabTwKeuLqaRh3nigwceeGB41ateFe573/uGL33pS9OAdiZxLqZxcCaANExEGiINAdPnQmDWCMCoTz/99PDe9743bL/99uH617/+rLMwMj0mj+ecc06AGd/97nefSCCCRJ7BFzrzzDNT/K9+9aujcAKHL3/5y+EDH/hA8hv18sc//jHstttu4S9/+Uv87HnPe95EApGf/OQn4fnPf34Ms9Zaa4VDDjlkVDJT9fvHP/4R88+k/Ba3uMVU01Lk84eA6n/+6mQp5AjeyA79jW984wVd6H/9618Phx122FhI11hj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KoMQEAJCQAhMiMDk2/YTRqjPhIAQmH8EMJDJLhgGVTGSlhN+piIZnfDnxhiREBACQqCMgPhIGRH9XowImKp5yjbaViIhIASEgBBYXghIQ2R51bdKKwQiAhwRMsOe8aiQGeuNV+iZ/Y7Abu+5554b1cw53oFqIf4iISAEhEAZAfGRMiL6vZgQ4Np5jlWdeeaZgaMnaExyfEYkBISAEBACywsBCUSWV32rtEIgIcAVw1xd+6EPfSheP5o87GWHHXaI13iaEdDcWe9CQAgIgQEExEcG4NCPRYSAGaQOZoA65hi7Ne9973uD3US0iEqgrAoBISAEhEAfCEgg0geKikMILGIE7NaAgOo7E0MMf9p1z7VG9xZxMZV1ISAEpoiA+MgUwVXUU0HAbomIRsPtqtnw2Mc+NixXo+pTAVeRCgEhIAQWEQISiCyiylJWhYAQEAJCQAgIASEgBISAEBACQkAICIF+EJBR1X5wVCxCQAgIASEgBISAEBACQkAICAEhIASEwCJCQAKRRVRZyqoQEAJCQAgIASEgBISAEBACQkAICAEh0A8CEoj0g6NiEQJCQAgIASEgBISAEBACQkAICAEhIAQWEQISiCyiylJWhYAQEAJCQAgIASEgBISAEBACQkAICIF+EJBApB8cFYsQEAJCQAgIASEgBISAEBACQkAICAEhsIgQkEBkEVWWsioEhIAQEAJCQAgIASEgBISAEBACQkAI9IOABCL94KhYhIAQEAJCQAgIASEgBISAEBACQkAICIFFhIAEIouospRVISAEhIAQEAJCQAgIASEgBISAEBACQqAfBCQQ6QdHxSIEhIAQEAJCQAgIASEgBISAEBACQkAILCIEJBBZRJWlrAoBISAEhIAQEAJCQAgIASEgBISAEBAC/SAggUg/OCoWISAEhIAQEAJCQAgIASEgBISAEBACQmARISCByCKqLGVVCAgBISAEhIAQEAJCQAgIASEgBISAEOgHAQlE+sFRsQgBISAEhIAQEAJCQAgIASEgBISAEBACiwiBFRdRXhdNVq+++upw8sknx/zut99+YZVVVumc909/+tPhggsuCKuuumrYa6+9Unz/+c9/wlFHHRV/b7vttmHddddNfnoRAkJACAgBISAEhIAQEAJCQAgIASEgBKoRWKEwqvaSa1sELr744vCgBz0oBr/qqqvCmmuuOXFUl19+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QAgIgUWEgI7MLKLKmpesfuhDHwoHHHBAwCZKThhWfc1rXhMNjObuehcCQkAICAEhIASEgBAQAkJACAgBITBvCEggMm81sojyw60lX/ziFwOGSbke9253u1tYaaWVFlEJlFUhIASEgBAQAkJACAgBISAEhIAQWK4ISCCyXGte5RYCQkAICAEhIASEgBAQAkJACAgBIbCMEZBR1WVc+Sq6EBACQkAICAEhIASEgBAQAkJACAiB5YqABCLLteZVbiEgBISAEBACQkAICAEhIASEgBAQAssYAQlElnHlq+hCQAgIASEgBISAEBACQkAICAEhIASWKwISiCzXmle5hYAQEAJCQAgIASEgBISAEBACQkAILGMEJBBZxpWvogsBISAEhIAQEAJCQAgIASEgBISAEFiuCEggslxrXuUWAkJACAgBISAEhIAQEAJCQAgIASGwjBGQQGQZV76KLgSEgBAQAkJACAgBISAEhIAQEAJCYLkiIIHIcq15lVsICAEhIASEgBAQAkJACAgBISAEhMAyRkACkWVc+Sq6EBACQkAICAEhIASEgBAQAkJACAiB5YqABCLLteZVbiEgBISAEBACQkAICAEhIASEgBAQAssYAQlElnHlq+hCQAgIASEgBISAEBACQkAICAEhIASWKwISiCzXmle5hYAQEAJCQAgIASEgBISAEBACQkAILGMEJBBZxpWvogsBISAEhIAQEAJCQAgIASEgBISAEFiuCEggslxrXuUWAkJACAgBISAEhIAQEAJCQAgIASGwjBGQQGQZV76KLgSEgBAQAkJACAgBISAEhIAQEAJCYLkiIIHIcq15lVsICAEhIASEgBAQAkJACAgBISAEhMAyRkACkWVc+Sq6EBACQkAICAEhIASEgBAQAkJACAiB5YqABCLLteZVbiEgBISAEBACQkAICAEhIASEgBAQAssYAQlElnHlq+hCQAgIASEgBISAEBACQkAICAEhIASWKwISiCzXmle5hYAQEAJCQAgIASEgBISAEBACQkAILGMEJBBZxpWvogsBISAEhIAQEAJCQAgIASEgBISAEFiuCKy4XAuucgsBITCfCJxxxhnhyiuvDBtssEHYaqut5jOTPebqH//4RzjmmGNijNtvv31YZ511eoxdUc0KgfPOOy9cdNFFYfXVVw+77777rJJVOkJACMwpAsttLKurhra8UWNjHaIhfPrTnw4XXHBBWHXVVcNee+1V/2FHn6uvvjqcfPLJMZb99tsvrLLKKh1jVHAhMJ8IrFAYzWfWFmeuzj777PDtb387rLDCCmGfffYJK6+88siCnH/++eHCCy+M3+z8/+ydCdx91fT/NxIyphJCREWpTI2UIZlS1DcZIoqUlEZjo5ShDJk1qCSUoahkKCJTIUJSmsxDRKZEOP/1Xv/W/u177jnnnrPPuc99nue71ut17zlnz/uz57XXXvuFLwz3ve99G927pSOw2BF4ylOeEr7whS8E2sNJJ5202LMb/va3v4W73OUums+zzz47bLnllos+z4sxg/vtt194+9vfHh71qEeF73znO62yeNRRR4Urr7wyHHroocpIaeUpw9GPfvSj8JnPfGbM561vfeuw8sorhwc84AHhIQ95SLjXve415gaDH//4x+GMM85QO+oqY1tb+s1vfhNOOOGE6PzVr351uO1tbxu/7eWSSy4JLJwYP//85z+HBz7wgeERj3hEeM5znhNuc5vbmLPWz4svvjicc845Gt7NN9+sjMZHP/rR4WlPe1rrMHD4ta99LVx22WVh11137eQPx7/97W/DBz/4QfW3xRZbhA033LBzGHg488wzwze+8Y3w05/+VPuKBz/4weHZz352WG211RrDI34W5Zdffnn44x//GB70oAeFDTbYIDzrWc8KlP1Q9P73vz9cf/31YdVVVw0veMELGoP95z//Gd72trepm2222Sasvfbaje4XsuXSNpbVlVVO30hYTWMjfdKRRx4ZnvjEJ06sc+V0zVW/W453yO8DDzwwHHHEEdp+Lr300iGDHgnrwgsvDBtvvLGaXXvtteH+97//iL1/OAKLBgEYIk7DIXDuuefCYNLf61//+saA//WvfxX3u9/91O0666xT/Pe//21075YLG4G//OUvhUz0i5tuumlhZ6Rn6qn34HDDDTdUhvTkJz9Z24QwRCrtcw0nxZsbbl9/f/3rX2OfIQyRvsFF/17fIhRz8rLvvvtqOQpDpFV8v/jFL2K5v+lNb2rlJ9fRySefHOOy8an8FKZDsfPOOxc///nPx6L5yEc+MuL/+9///pibOgOZuI/4/cc//jHiVBY9xctf/vJCFugj7ix9smAuvve97434afog/F122aWQTYnK8GQBVQiTpimI4mc/+1lx2GGHFcKU0TA222yz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hWVV/PvlL3/ZuP+j7uGf//znlP7LLrts1KOr+InAWBA499xz03fl9YsJQ4qHH354QvyfeOKJ4tWvfvUE+7izlSKFDbInuNGD0SRw0EEHxXxcfvnlpySCn/nMZ4rDDjus5z8bzKX4zjXXXKksPvDAA+l5p5unnnqqeMc73lFQzj/3uc91sj7Q+wUWWCDF8e677+7ar3Zx3GSTTZKfZ511VsnPdu9KFof04xvf+EZhAorijW98Y2Gd61IoreKW922WWWaZkptWP0488cTE4G1ve1srayPz/NOf/nSK77vf/e4pjVerfJjSSPUY+CD536qMtiuH7d71GHVZnwICrfJ8CqIy0kGqnDefPbMNQcYiL0VABERgpiFgAr7w7LPPBhvUhec+97lTlq4tttgixuHvf/97jEN1ZUgeMWbgr7zyytrtM8yC45cJK8P666+fOxvre1amkbZZZpllJFcgjCtcVvv98Y9/7Dn6G220Udh+++17dpc7oAybIDA+2n///cNuu+0WZptttLot4xDHnKnff+ITnwh33HFH/GMlAnyng2H74dNPPx2T+rznPS/MOeec0yHZA6dxKrhN1zI6cGaNsQfK8zHOvDGPupSqjnkGKvoiIALDJcAy7/nmmy8cf/zxww2og+/5aTPthCHuDVv1GKzZShF/lK4uFJkxY0Z6Nu43DOrIp0UXXXTck6L4/4cAWxZ8wLrGGmuMnDCEaI5DHOsK1FprrRUfzzrrrAG208XssccecTsUW6I+//nPT5dkD5zOqeA2XcvowJk1xh4oz8c488Y86qM11TLmMBV9ERABERgmAU6buf3228N3v/vd4DpD2oWHUIT98HU6RVwoMrOtFGnHQ+96J8AqAlucWnJ46623xuOceTjHHHME2xpaes+PJlZTLbbYYuH3v/99uOuuu8JrXvOaCWGMwoNxiGMdJ9vKEN7znvdEAeIiiyxSZ0XPRGBKCaiMTin+KQlceT4l2BWoEZBARMVABERABMaEAFtdXve613UlDPEksX1GQhGnoWuvBOpW3Dz44IPJG7YodSOcSw56vJl33nnDmmuu2aOrybU+DnGsI8LqFhkRGGUCKqOjnDvDiZvyfDhc5Wt7Atoy055PI2+/+c1vhq222iosscQSgdkktM1//etfb+s3s8Bo41933XXjKTVLL710MOVnSft5K8eXXnppMEVcMSw6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AREQgZElcMUVVwT0fqGklz4feuNkREAEphcBCUSmV34rtSIgAiLQCIFOilZndqFIIxDliQiIgAiIgAiIgAiIwJQSkFLVKcWvwEVABERgPAmgaJXtM3WK59g+s+WWW4ZrrrlmPBOnWIuACIiACIiACIiACEwLAhKITItsViJFQAREoHkCnU6fkVCkeebyUQREQAREQAREQAREoDkCEog0x1I+iYAIiMC0I+CKVrVSZNplvRIsAiIgAiIgAiIgAmNPQAKRsc9CJUAEREAEppaAts9MLX+FLgIiIAIiIAIiIAIi0B8BCUT64yZXIiACIiACGQEJRTIYuhUBERABERABERABERgLAhKIjEU2KZIiIAIiMPoEJBQZ/TxSDEVABERABERABERABP5LQAKR/7LQnQiIgAiIwIAEulG0OmPGjAFDkXMREAEREAEREAEREAERGJyABCKDM5QPIiACIiACGYFOila32GKLIKFIBky3IiACIiACIiACIiACU0JAApEpwa5ARUAERGDmJtBppYiEIjN3/it1IiACIiACIiACIjAOBCQQGYdcUhxFQAREYAwJaKXIGGaaoiwCIiACIiACIiAC04iABCLTKLOVVBEQARGYbAKdFK1qpchk54jCEwEREAEREAEREAERcAISiDgJXUVABERABIZCQEKRoWCVpyIgAiIgAiIgAiIgAgMSkEBkQIByLgIiIAIi0JmAhCKdGcmGCIiACIiACIiACIjA5BKQQGRyeSs0ERABEZi2BCQUmbZZr4SLgAiIgAiIgAiIwEgSkEBkJLNFkZosAk8//XR45zvfGV7+8peHz3/+85MVrMJpiIDyryGQk+iNhCKTCFtBiYAIiIAIiIAIiIAItCUwS2GmrQ29FIExJvDss8+Gxx9/PKZglllmCfPPP38pNZdeeml405veFJ89//nPj3Znm222kp3J+NEpnpMRh3EMY1TybxzZTXWc//SnP4WNN9443HzzzROiMvfcc4fLLrssrL/++hPe6YEIiIAIiIAIiIAIiIAINEVAK0SaIil/RpLAL3/5y7DgggvGvyWXXHJCHFddddUw55xzxudrrLFGmAphCIF3iueEiOtBJDAq+afs6J0AK0WuvPLK8OpXv3qC4yeffDLo9JkJWPRABERABERABERABESgYQISiDQMVN6NF4HFFlss/P73vw833HBDHJyNV+wVW+XfeJeBF77wheGqq65qKxS55pprxjuRir0IiIAIiIAIiIAIiMDIEpBAZGSzRhGbLALzzjtvWHPNNcNznqPPYbKYNxmO8q9JmpPvVyedIltuuWWQUGTy80UhioAIiIAIiIAIiMB0IKARYMO5fOCBB4aNNtoo/h133HG1vm+11VbJzve+972SnW984xtxqfgSSywRGOi95jWvCbvssku46667Svb8x9lnn538qgvvvvvuS+9RHtqN+frXv57cnHrqqeG2224LxHmhhRaK16ofLHtHD8fiiy8e5ptvvrD22muHD3zgA+F3v/td1Wr6/be//S0ceeSRYeuttw5LLbVU1O3B0vmPfOQj4Q9/+EOyV3dz5plnhre+9a1RESozzDDaa6+9wmOPPZasf/Ob34xp2HHHHdMzluF73jArjbn77rvTs9zu8ccfn55zX2c++MEPJjvf+ta3Sla++93vhj333DOstdZagQHfMsssE974xjeGqr1u45l73g/v3H1+j+4SeG6wwQbhJS95SYzrKqusEt7znveEe++9N7c64b6XeHQqU+h58bzh6npf8kB/9KMfJTvveMc74qtW+Ze7476bMlN1Q3k69NBDw8orrxy/xZe+9KVhm222Ceeee27Vqn4PSEBCkQEByrkIiIAIiIAIiIAIiEB/BFCqKtMcATupBCW18W/ppZee4PGtt96a3s8xxxyFDfySnYMPPji9cz/8+tznPrc46qijkl2/+eQnP5nc7L777v44XW+55Zb03ga86Xm7mxNPPDG5MaWGxQILLJB+20qKktOjjz46vfO4+vV//ud/ChM8lOzz44477iiWXXbZlu5scFSYEGaCOxOUFG9+85tbujOFqSm8U045paU94mcD5Oi/bZVJ9kxokcK8/PLL03M7gSY99xtTCFnMPvvs0Y6tLCl+85vfxFf/+te/ikMOOaTgmXOoXnfeeWf3pug2nu6gH97utno1oVRBflbj579nnXXW4qSTTqo6i797jUc3ZcoEWyku55xzzoRw99tvv/R+jz32iO9b5Z877qXMuBuujzzySEF5cBbV6/bbb1+YgC13ovsGCDzxxBOFCUZruZui1eLqq69uIBR5IQIiIAIiIAIiIAIiIAL/JhAEolkCjz76aGGKOVOH/qc//WkpgFyAYasq0rvPfe5zyQ0DbVs5Uey7777F6173uvScQdlXv/rV5Iab3L9hCESqA8HXvva1KXziYie3xPghsHnXu95V7LbbbgUCDXeHMAXhgRs7JrUkYFlttdViGmyFR7HIIoskd694xSuKf/zjH+4sXm1VSHpPGIT33ve+t5hnnnnS84UXXrgwnSDFjTfeWOyzzz7xvccFARTP+LOTLaKfrQbU//znPwtTxpr8/dnPflaKywUXXJDe2eqK9C4XFBCvHXbYoTjmmGMK7ORCki9/+cvRTbfxxHI/vFPEam5sFUhKg63SKT760Y8WthqmVOYoyzfddFPJdT/xyAUinh9+9TJ17LHHpvjYCpBSmPxYfvnl0/trr702vm+Vf+64lzLjbhAU5cIZWyFS7L333hOER4cffrg70bVBAgiJ2wlFbPtMg6HJKxEQAREQAREQAREQgelMQAKRIeT+5ptvngZuCCxyk3f0fRb8xz/+cRosI1iodvj/7//+L/nHgP+Pf/xj8nIyBCIMKn/4wx8WCDMYLGLuv//+grj6oPYHP/hBihMz53ZCRHr3sY99LL2zrRPpOStoEDy4YZVFLjRgNY0bBsAeFoKKXEDx17/+tbBtOun9xz/+cXdW/PznP0/PEVBUTbsBNasQPEwEHbnZaaed0jtWebix7Sbp+WmnneaP4/V973tfepcLw3jZKZ798i5FIPthW2UK296U4mPbUbK3RYknghI3/cajKhCpK1N5/hO3vGzYKTwprqZItSD+mHb512+ZsS1qKSzb5lSKR+4nQjlWoMg0T6DTSpFqHdl8DOSjCIiACIiACIiACIjAdCAgHSI24m3a5Lo60AniBp0a6EHA2PLvqHeDexQGossBY0vxg21Tiff+D70aK620UvzJiSjf/va3/dXQr6961avCV77ylainw1ZYxHgTKDoyTEASw1933XWjrgyPzFxzzRVspYj/DBdffHG655jU66+/Pv595zvfKR1zu+iii4Z11lkn2UV3iRsTOvhteP/73x/1h/iD5z3veVGHiP824Y3fDnR1PRV4cumllya/yCvbUhN/22qeqFeCH1ZhBNsyldKX6yTh/Xbbbcclmjxt/qzdtV/erfw0YUOwFTjxtQmhggm3Sla/8IUvhC9+8Yvxb8MNN0zvmohHqzJF/q+33noxLHSImJAthXvZZZel+7e97W3BVial361u+i0zV1xxRfLSVhOVyihl3VY1xfe28knKPhOp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gAiIgAiIgAiIwLQiIIHIkLN7s802i0eZEoxtkQh1JyQMOQryXgREQARmagISiszU2avEiYAIiIAIiIAIiMDQCHRedjC0oGdejzmdgiNYTX9IEoaYrg0JQ2beLFfKREAEppBAp9Nnttxyy3ic9BRGUUGLgAiIgAiIgAiIgAiMIAGtEBlCprA8e8aMGclnth7YqRkTjmlNFnQjAiIgAiIwMAGOvrYTuwJHlVcN22eoh/Mjpat29FsEREAEREAEREAERGB6EdAKkSHnN3o80Btip04MOSR5LwIiIALTm4AptA12XHntarwnn3wy2JHRJWH19Kal1IuACIiACIiACIiACGiFyBDKwBVXXBFuvPHGqFgUHSIve9nLhhCKvBQBERABEagjoJUidVT0TAREQAREQAREQAREoEpAApEqEf0WAREQAREYewKdFK1q+8zYZ7ESIAIiIAIiIAIiIAIDE9CWmYERygMREAEREIFRI4Ci1SuvvFLbZ0YtYxQfERABERABERABERghAhKIjFBmKCoiIAIiIALNEUCniIQizfGUTyIgAiIgAiIgAiIwsxGQQGRmy1GlRwREQAREIBGQotWEQjciIAIiIAIiIAIiIAIVAhKIVIDopwiIgAiIwMxFgO0zOn1m5spTpUYEREAEREAEREAEmiAggUgTFOWHCIiACIjASBOQUGSks0eREwEREAEREAEREIEpISCByJRgV6AiIAIiIAKTTUBCkckmrvBEQAREQAREQAREYLQJSCAy2vmj2ImACIiACDRIQKfPNAhTXomACIiACIiACIjAmBOQQGTMM1DRFwEREAER6I1AN4pWr7nmmt48lW0REAEREAEREAEREIGxIyCByNhlmSIsAiIgAiIwKIFO22e23HLLIKHIoJTlXgREQAREQAREQARGm4AEIqOdP4qdCIiACIjAkAhIKDIksPJWBERABERABERABMaEgAQiY5JRiqYIiIAIiEDzBCQUaZ6pfBQBERABERABERCBcSEggci45JTiKQIiIAIiMBQCnRStsn1mxowZQwlbnoqACIiACIiACIiACEwdAQlEpo69QhYBERABERgRAu0UrT777LPhmWeeGZGYKhoiIAIiIAIiIAIiIAJNEZBApCmS8kcEREAERGCsCdStFJlzzjnDJZdcEjbeeOOxTpsiLwIiIAIiIAIiIAIiMJHALIWZiY/1RAREQAREQASmJ4E//elPUQBy++23SxgyPYuAUi0CIiACIiACIjBNCEggMk0yWskUAREQARHongBCEQQi66yzTveOZFMEREAEREAEREAERGCsCEggMlbZpciKgAiIgAiIgAiIgAiIgAiIgAiIgAg0QUA6RJqgKD9EQAREQAREQAREQAREQAREQAREQATGioAEImOVXYqsCIiACIiACIiACIiACIiACIiACIhAEwQkEGmCovwQAREQAREQAREQAREQAREQAREQAREYKwISiIxVdimyIiACIiACIiACIiACIiACIiACIiACTRCQQKQJivJDBERABERABERABERABERABERABERgrAhIIDJW2aXIioAIiIAIiIAIiIAIiIAIiIAIiIAINEFAApEmKMoPERABERABERABERABERABERABERCBsSIggchYZZciKwIiIAIiIAIiIAIiIAIiIAIiIAIi0AQBCUSaoCg/REAEREAEREAEREAEREAEREAEREAExoqABCJjlV2KrAiIgAiIgAiIgAiIgAiIgAiIgAiIQBMEJBBpgqL8EAEREAEREAEREAEREAEREAEREAERGCsCEoiMVXYpsiIgAiIgAiIgAiIgAiIgAiIgAiIgAk0QkECkCYryQwREQAREQAREQAREQAREQAREQAREYKwISCAyVtmlyIqACIiACIiACIiACIiACIiACIiACDRBQAKRJijKDxEQAREQAREQAREQAREQAREQAREQgbEiIIHIWGWXIisCIiACIiACIiACIiACIiACIiACItAEAQlEmqAoP0RABERABERABERABERABERABERABMaKgAQiY5VdiqwIiIAIiIAIiIAIiIAIiIAIiIAIiEATBCQQaYKi/BABERABERABERABERABERABERABERgrAhKIjFV2KbIiIAIiIAIiIAIiIAIiIAIiIAIiIAJNEJBApAmK8kMEREAEREAEREAEREAEREAEREAERGCsCEggMlbZpciKgAiIgAiIgAiIgAiIgAiIgAiIgAg0QUACkSYoyg8REAEREAEREAEREAEREAEREAEREIGxIiCByFhllyIrAiIgAiIgAiIgAiIgAiIgAiIgAiLQBAEJRJqgKD9EQAREQAREQAREQAREQAREQAREQATGioAEImOVXYqsCIiACIiACIiACIiACIiACIiACIhAEwQk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v/71r9dZa/usKX79prNV5FhtSpqq7fouu+yS0pz3Par+UI9xCsniiy8e+xlsL6Yu/vznP9/xOx+0nqnGhXaKtFD/58YVgvKOI3irpql2v+pvL7/7yddhtkusdIaX/yHgyA3lxd/5STocyUyc6JstuuiisY6gXezUd6A/uvnmm8fyQ58D96973evCd77znfDEE0+kcAivuvqH9hg39E+PO+64PIq6FwEREIHxImCD5ZE0yy+/PMcBxz8TJLSMo+1VLWzwnOza6TQT7NrgrjjkkEOSHfc3v1qHvTjrrLNKbu3IuLZucG/KXEtuiM//+3//r6275zznOcWHPvSh4u9//3vJLT+22mqr5HbllVcuTHlr+k14O+64Y8mNNXYxDnlaqvebbLJJYZL/krtOP/J42EC7sMFUKR55GDYwLmy/a8nL2267rWTfOvOF6V4pPfvFL36R3Nx0002FDdxK7/MwuIf197///eSmemOd3sI6Cm39sMFWYUfzVZ3G34OyHNS9DW4KykY13fy2jm5hgqHSO1ulU0oHZdjd2hGEpXc/+MEP0jvs2EC1sE5M6Zm75frWt7615N5/2GqDYs0112zpju82f2+DHHfa99U6/Cm81772tRP8uf/++9N74m7KjifYsaNIkx0T+kx4P2jeTfDwPw/y76jT99xvPZWHbR37jt8RDE1okjuL903XXdYZT8zzssU9eWCDueJzn/tcMeuss7a099GPfnRCPKtMhxWOB9xv2Wjqm/vlL39ZmICoJaP111+/9I6y3o0555xzSu5sQFPrjHLr+WeDn8JW4SR7g5YZG3glv2ln6owJlpId4nHmmWfWWWv5rAl+g6azVeRMkFFKm3POr7ayKjqvlif6GSZkbOneBLC1wTZRz9R5bMLolnHx9FTr5kHb/XZtHm2ch8vVJssmRHuQfB1mu9Qp7htvvHFK24YbbliQ13la83s71acwXSQT0s6Dk08+uZh99tlr3dIXscm40jvT25f8sdU8hQlm03ub+CsoWzIiIAIiMI4EmEUYSdONQMRmxgo6zHnlf/XVV09Iz6GHHlqygwDFVioUpqiqsO02pXemCT25Z3DBIJS/3J6tOkjPt9lmm2SfG9NpUvKPRoXOLGFVB7s2u1lyy4+8s5+ny+932mmn5MaWuU7oEL3kJS8pbJagoHFyN1xNKW1y181Nq3iYws6irhO3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G06EYOuWG5bRmlJc/xlPl/FTl3baaScJQxIZ3YjA1BPgZCIXhrBqktOvZERABGZOAqzG4rQZU84ctyvnqWSl53777ZeEIbxj+7WMCIiACMysBLRCZGbN2QHTpRUiAwKcCZ3/5Cc/iVsvPGkMmuhMscSW7T2m9C9tlcEOe5B3tmOmMcw2sYWLThh7+rGrJbYRjf6JwJQRMGXD4fzzzw+m7DawTc8Nx2iaYkf/qasIiMBMRgBdal//+tdTqtimZsqsg50+Fre1PvTQQ+mdndgXmPBQm52Q6EYERGAmIzDbTJYeJUcERGBIBNC3Y6d1REWOdkpJ3E+MElv+coMS0w996ENJGMI79hjffPPN4dBDDw377LOPOlY5MN2LwBQRQCEr29pywxJ6VoDJiIAIzLwE7BjeOFFxySWXxEQyqcFf1VAfnHfeeWqzq2D0WwREYKYioC0zM1V2KjEiMFwCrBxipsiOzA0rr7xyQPjhhtNlNt1002DHXIbPfOYz/jhdUZDLKTqsKJERAREYPQIoOeZEq1FV5Dx6xBQjERhPAvPNN1/4xje+EU9p5IQ42mc3tOusGDnyyCPjdhraehkREAERmJkJaMvMzJy7A6QNhZfsI8XQOOaN5QDeyulMRgCdIJyIwIkQHG0sIwIiMD4EONUDASYncqFQdaWVVhqfyCumIiACjRL4xS9+Eft9bG+tnibTaEDyTAREQARGjIAEIiOWIYqOCIiACIiACIiACIiACIiACIiACIjA8Aloy8zwGSsEERABERABERABERABERABERABERCBESMggciIZYiiIwIiIAIiIAIiIAIiIAIiIAIiIAIiMHwCEogMn7FCEAEREAEREAEREAEREAEREAEREAERGDECEoiMWIYoOiIgAiIgAiIgAiIgAiIgAiIgAiIgAsMnIIHI8BkrBBEQAREQAREQAREQAREQAREQAREQgREjIIHIiGWIoiMCIiACIiACIiACIiACIiACIiACIjB8AhKIDJ+xQhABERABERABERABERABERABERABERgxAhKIjFiGKDoiIAIiIAIiIAIiIAIiIAIiIAIiIALDJyCByPAZKwQREAEREAEREAEREAEREAEREAEREIERIyCByIhliKIjAiIgAiIgAiIgAiIgAiIgAiIgAiIwfAISiAyfsUIQAREQAREQAREQAREQAREQAREQAREYMQISiIxYhig6IiACIiACIiACIiACIiACIiACIiACwycggcjwGSsEERABERABERABERABERABERABERCBESMggciIZYiiIwIiIAIiIAIiIAIiIAIiIAIiIAIiMHwCEogMn7FCEAEREAEREAEREAEREAEREAEREAERGDECEoiMWIYoOiIgAiIgAiIgAiIgAiIgAiIgAiIgAsMnIIHI8BkrBBEQAREQAREQAREQAREQAREQAREQgREjIIHIiGWIoiMCIiACIiACIiACIiACIiACIiACIjB8AhKIDJ+xQhABERABERABERABERABERABERABERgxAhKIjFiGKDoiIAIiIAIiIAIiIAIiIAIiIAIiIALDJyCByPAZKwQREAEREAEREAEREAEREAEREAEREIERIyCByIhliKIjAiIgAiIgAiIgAiIgAiIgAiIgAiIwfAISiAyfsUIQAREQAREQAREQAREQAREQAREQAREYMQISiIxYhig6IiACIiACIiACIiACIiACIiACIiACwycggcjwGSsEERABERABERABERABERABERABERCBESMggciIZYiiIwIiIAIiIAIiIAIiIAIiIAIiIAIiMHwCsw0/CIXQisC//vWvcMYZZ4Trr78+PPjgg+FFL3pROOWUU8Icc8zRyslYP3/ooYfCF7/4xZiGD33oQ+GFL3zhWKdHkRcBEeiewLNFCGd+83fRwfqvemFYctE5u3fco83H/vTPcOl1f4iutt1goTDP3LP26ENz1v/5TBHO/vbvo4cbvXq+8JKFn9uc5/JpJAiobRuJbFAkhkTgnHPOCffee29YeeWVw1ZbbTWkUOTtuBG48sor4/iFsctuu+02btFXfEWgRGCWwkzpiX40QuDCCy8Md999d1h88cXDjjvuOMHPJ598Mqy//vrhpptuSu+e85znhGeeeSbMMsss6dnMdHPjjTeG1772tTFJv/zlL8OSSy45MyVPaRGBsSRw1FFHhfvuuy8ceuihUSg7rET8yyQiG+x5W/T+E7suGdZb7b8C0XOveiQ89MjT4d1bLBIWfMHsA0fhngeeDLsfeW/059xPLhtetNDUCSGefOrZsNmHfxrjcuSeS4fXrjDvwOmbKg9u/dlfw+XX/yFsvvYCYdWXP3+qojFy4aptG7ksUYQaJLD55puHyy+/POywww7hrLPOatBneTXOBPbZZ59wzDHHhNVXXz3cfPPN45yUvuM+Wf2nviMoh10T0AqRrlH1ZhGJ+kUXXRTWXXfdWoHIYYcdFoUhs846a3jTm94U3vnOd4a55pprphWG9EZPtkVABCaDACvT9ttvvxjU0ksvHQ444IDJCLYUxiOP/zOcdNFv4rMXLThH2H6ThUvv9WN0CJx88W8CwqaHH306fGG/l09ZxFh18/Q/nw1MHTxvrslZ/fPnP/85PPvss7Gdfu5zp07AlkMfxTjl8dN9PYF//OMfgUkxJr9e8IIX1Ftq8XQQty281GMREIE+CIxC/6mPaMtJCwLSIdICzLAfn3/++TGITTbZJApOtt1224AUXkYEREAEJovAYostFpdAr7jiioG6aCrMQi+cPay7ygvC0i+eM7xmufFdPTEV7CY7zDesMV9cbbPpmvNPdtCl8K666fGw+d63h632v7P0fJg/VlhhhTDffPOF448/fpjB9OT3KMappwRMU8tnn312LEuLLrpozwQGcdtzYHIgAiLQksAo9J9aRk4veiagFSI9IxvcARL+Bx54IHq09dZbD+6hfBABERCBPggwQ8lKtqk0FoVw+O5LTWUUFHaXBLZZf6HAn4wIiIAIiIAITGcCo9B/ms78m067Vog0TbQL//72t78FFKpikDDKiIAIiIAIiIAIiIAIiIAIiIAIiIAITC4BCUQmkfcdd9wRNtpoo/CWt7wlhcqefZ7xd88996Tn1ZvHH388bLzxxtHeeeedV30dfz/88MPJr2uuuaZkB/ef+tSnwmqrrRZPd1lqqaUCq1NOPvnkUKdX95Zbbkl+sU+5zuyxxx7RDifj9GN+9KMfRf0qr3zlK8P8888fFa6edNJJtfFx/2+//fbw4Q9/OOpm4ZQa9B688Y1vDFdddZVbiVf2esMZrii4bWW22267aAedL7n505/+FI444oioVX3eeecNyy23XHjHO94Rrrvuutxa1/cIwD73uc+Ft73tbWGZZZaJy2VRRLX//vuHJ554YoI/KOT1ckFaYLXzzjuHZZddtiWrQctINRJ5HP7yl7+E4447Lqy11lqx/DTF69JLL41bNZZYYokA51VWWSVQrji1oZ2ZMWNGLL8o5mUPNsp699xzz3D//ffXOttrr70iz89+9rO172+44YbE+6mnnkp2emHw61//Ouy7775h+eWXj2nhG9tiiy3CFVdckfyr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yohv7otA2ecKrSEI/lKRuv/++/uyT73a6C9/+cu46re85S3xMf9/2i4BgK233nq0hdbrX//62JKELiM036cLCe+l8vnvf/870EJrkBItPEivetWr4uM//vGP+PjqV786Prb69ba3vS22wMGtjGAI2+tXuSz7/Gpl183rp546/wYYrUevuOKKMHGil+bdePpeBRRQoF0BP3XbFevx8jOn3BUe/cP36m7loctPCos//zVhZNKidV8f5Cdf9KIXBX7yiTtaKSBy2GGH5V/2fwVKFeDuO03Qy0hlrquM/LgOBaooQHeXW265JWaNZv75/7N5/vznPx+DIZMmTQrHHHNM2HnnnbMvh9122y189atfDYceemg488wzAxX/ssYQWmBDffjngQceiGOssGm6Jt58883Rjco13Y2KpDe84Q2BH9PYCtx0001xg5RFgyFja+/WFFBAAQScZaZi5eChy74a5s2ZVTdXsx97IDz8m3PqvuaTCiiggAIKDJpAtrULrV/+85//jO4i/6d09913h5NOOin+y9gZ+WBIWm6fffaJA1Xy/ymnnJKeHvePJ5xwQuwy9ZGPfCTePGA8I7ov0tWU1mim6gqkMs4g3yYFFFBAgbEXMCAy9uYNt/j4bb8L02/5bcPXeeHhq88Lsx996oKw6cK++DQB+uq+733vC+uvv368SORO2sc//vHYH/1pCxd8gi4ihxxySNhkk03CiiuuGOjeQ/9rBu3sJHWaxwcffDAcdNBBgebRXADT157uHd/73vdCs7GTGbCQi+dXvvKVMf8bb7xx2GmnneKMKUXyTxNfmqnzQx5IZ5111uhzs2bVD/Bde+218Y4t/aMZYJVjccYZZ/Q0r/X2h77mDJD6ute9Lg7WyICCOD7yyCNPW5wxCdK+/va3zc/Vp70590SzdX3605+O2zn33HMDg7J+6UtfCjRnx4mWUswgQQWwUUrv4Y4j7+HY0p2C9zAYHvuw7777Nnp73efJL027d9xxx/DCF74wrLLKKuH//u//Ai2zHn300brv4UnK3sUXXxzzv84668Syudlmm8W79M3e1+l51e75c911140eU8pCvUR3PMxoVZBN7R6nTs+V7Dbzf3OukjdaPpBmzJgxuj8M3Ew5puywDJ8F9dJ99903+p40WGLaN8aTeOihh2KXRY4bA5pyrjDAYiOvtA3Okfe85z1xNq1VV1010OWFVhyM81E08Vn29a9/Pf485znPidvP/p/WQxmjjDIuyN57752eftojLbOwIDFjBl7tpHbLV1r3T3/609ExUPieoFsL5YquPM1SUUPGM+KYfOYzn4mro9sifzOjV9HE5w02eb9UFtr5PGpVLvN56tQ1u55Oz69+fBdxTmHNTxr7hQBdei51fzr//PPjcx/+8Iezu7rA30XLyAJvavAP59Bxxx0XW07x3fGKV7wiliE+j7tNP/vZz+JA5lybMMMe12I//vGPm6622+uTeitvp6wRXOWYfPe73623qniu8Drdt/OJax8Gzud1BoM2KaBAdQXsMlORYzNvzuww5WdfaZmbebOeCFNqXWdWeOfnWi7rAgsKUDnIXujRNJVR0PlhIDlG199uu+0WfFOL/+65555YOUh3eFgnlU5++PJ///vfH772ta+1WMtTL3eaRyp1b37zm8O0adPiyuj/TWWFixgqOOecc06czi/fHJcLMd7HFJYkXqepNT9UMGhaTsCoWaIvPt2WsokpbfkhcZcyn7jIY9T8bMUoHQsuBI899tj8W+JFY7d5za+UgRqp1DMTRUoMYsfPZZddFi+C1lhjjfRSrNynfeWCv5tEoKDRujgevMYsNpTNX//616ObooJLvilfXGRR0cwmggwf+MAH4lgJ6Xnew8w+XHxSmWXdBAWLJso3+5vyQTkh/5Q7fqgoUc4IkuTT4YcfvsAMCbz3L3/5S/xh37jQZCDBbOr0vOrk/Hn44YejB9tvFLzjYpcBDvPd9to9Tp2cK1mXen8zFW22ssL5xvEl4br00kvHc+cPf/hD3L96068ytgbvoavJN7/5zfjetG+0wqCind0GHvxcfvnlgdlLVl999fie7K9vf/vbMeCZnuO4U374oRzyGVDvfWn59Ej+qThlU/5/XiMvJMaOYFrQZukd73hHHHyWZficLDq4aifli20wS0h2lhc+n//+97/HH7rgcR6kGbhYPqV2DJdZZpkYyE3vJejS7qDPfK5QDuialE2pLLTzedSqXGbX36lrdh383cn51a/vIgJxWGfTbbfdFvghpWBxOibZ76Hse9opI9n31fubc+GDH/xgHMckvc53xw033BDH31lzzTXT020/fuELX4jnfPbmDIFYPgu4AcFNiXwq4/okv852yxqfDRynhRdeON7oyq6P8sa1FftEkIcpkrOJ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	png	2022-10-17 12:16:05	2022-10-17 12:16:05	9.png
\.


--
-- Data for Name: harta; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.harta (id, tkh_akhir_pengisytiharan, surat_kelulusan, id_pemohon, flag, delete_id, created_at, updated_at, created_by, updated_by) FROM stdin;
\.


--
-- Data for Name: jawapan_lnpk; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.jawapan_lnpk (id_lnpk, id_soalan, jawapan, created_at, updated_at, created_by, updated_by) FROM stdin;
\.


--
-- Data for Name: kumpulan; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.kumpulan (id, name, flag, delete_id, created_at, updated_at, created_by, updated_by, status, permohonan_id) FROM stdin;
1	kumpulan 1	1	0	2022-07-27 02:25:49	2022-07-27 07:55:42	900919099999	900919099999	NEW	\N
2	yuiortyuio	1	0	2022-09-12 11:12:40	2022-09-12 11:43:20	900919099999	900919099999	PROCESSED	\N
3	kumpulan cubaan 1	1	0	2022-09-14 10:41:40	2022-09-14 10:53:30	900919099999	900919099999	PROCESSED	\N
4	MEKANIKAL 48	1	0	2022-10-05 11:34:16	2022-10-07 16:24:06	900919099999	900919099999	PROCESSED	7
5	ELETRIK J44	1	0	2022-10-13 11:12:13	2022-10-13 11:12:46	900919099999	900919099999	PROCESSED	8
\.


--
-- Data for Name: lnpk; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.lnpk (id, id_permohonan, tahun, nama, nokp, skim, gred, nama_gred_jawatan, tempat_bertugas, tkh_memangku_jawatan_sekarang, jumlah_markah, tempoh_pengawasan, nokp_penilai, nama_penilai, jawatan_penilai, jabatan_penilai, tkh_penilaian, fail_skt, flag, delete_id, created_at, updated_at, created_by, updated_by, penempatan_id) FROM stdin;
\.


--
-- Data for Name: lnpt_ukp12; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.lnpt_ukp12 (id, tahun, markah, id_pemohon, flag, delete_id, created_at, updated_at, created_by, updated_by) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2019_12_14_000001_create_personal_access_tokens_table	1
5	2022_06_24_014613_laratrust_setup_tables	2
\.


--
-- Data for Name: pasangan; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.pasangan (id, id_peribadi, hubungan, nama, pekerjaan, alamat_pejabat, sijil_perkahwinan, flag, delete_id, created_at, updated_at, created_by, updated_by) FROM stdin;
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: pemohon; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.pemohon (id, id_peribadi, id_permohonan, gaji_hakiki, nokp_ketua_jabatan, perakuan_ketua_jabatan, perakuan_ketua_jabatan_ulasan, perakuan_ketua_jabatan_jawatan, perakuan_ketua_jabatan_tkh, perakuan_ketua_jabatan_alamat_pejabat, pengesahan_perkhidmatan, pengesahan_perkhidmatan_nokp, pengesahan_perkhidmatan_jawatan, pengesahan_perkhidmatan_cawangan, pengesahan_perkhidmatan_tkh, status, alasan, flag, delete_id, created_at, updated_at, created_by, updated_by, jawatan, kod_jawatan, gred, tkh_lantikan, tkh_sah_perkhidmatan, alamat_pejabat, user_id) FROM stdin;
2	16	7	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-12 11:46:39	2022-10-12 11:46:39	790418145821	790418145821	\N	\N	\N	\N	\N	\N	\N
3	17	7	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 09:23:14	2022-10-13 09:23:14	771222025701	771222025701	\N	\N	\N	\N	\N	\N	\N
4	18	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 10:55:52	2022-10-13 10:55:52	860211335522	860211335522	\N	\N	\N	\N	\N	\N	\N
5	19	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 10:56:11	2022-10-13 10:56:11	860211335522	860211335522	\N	\N	\N	\N	\N	\N	\N
6	20	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 10:56:19	2022-10-13 10:56:19	860211335522	860211335522	\N	\N	\N	\N	\N	\N	\N
7	21	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 10:57:10	2022-10-13 10:57:10	860211335522	860211335522	\N	\N	\N	\N	\N	\N	\N
9	23	6	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 10:57:28	2022-10-13 10:57:28	860211335522	860211335522	\N	\N	\N	\N	\N	\N	\N
12	26	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 11:00:09	2022-10-13 11:00:09	860211335522	860211335522	\N	\N	\N	\N	\N	\N	\N
13	27	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 11:03:07	2022-10-13 11:03:07	860211335522	860211335522	\N	\N	\N	\N	\N	\N	\N
14	28	4	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 11:03:14	2022-10-13 11:03:14	860211335522	860211335522	\N	\N	\N	\N	\N	\N	\N
15	29	5	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 11:03:21	2022-10-13 11:03:21	860211335522	860211335522	\N	\N	\N	\N	\N	\N	\N
17	31	8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 11:15:08	2022-10-13 11:15:08	830801025623	830801025623	\N	\N	\N	\N	\N	\N	\N
18	32	8	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 11:16:04	2022-10-13 11:16:04	820620145264	820620145264	\N	\N	\N	\N	\N	\N	\N
19	33	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	BH	\N	1	0	2022-10-13 11:31:16	2022-10-13 11:31:16	860211335522	860211335522	\N	\N	\N	\N	\N	\N	\N
1	5	4	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	TL	\N	1	0	\N	2022-10-19 16:35:51	\N	\N	Senior Dev	A1001	J44	2022-10-18	2022-10-27	Desa Pandan	\N
\.


--
-- Data for Name: penempatan; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.penempatan (id, jawatan, gred, penempatan, kod_jawatan, kod_gred, kod_waran, id_peribadi, created_at, updated_at, created_by, updated_by, unit, bahagian, cawangan, pejabat, flag, delete_id) FROM stdin;
1	PEN. PEGAWAI TEKNOLOGI MAKLUMAT	FA29	\N	BF001	FA29	020307080000	3	2022-07-13 04:05:28	2022-07-13 04:05:28	MYKJ	MYKJ	Unit Sistem Aplikasi	Bahagian Teknologi Maklumat	Cawangan Dasar dan Pengurusan Korporat	Ibu Pejabat JKR Malaysia	1	0
2	JURUTERA AWAM	J44	\N	AJ005	J44	020307020300	\N	2022-09-14 09:52:46	2022-09-14 09:52:46	MYKJ	MYKJ	Unit Pengurusan Aset	Bahagian Teknologi Maklumat	Cawangan Dasar dan Pengurusan Korporat	Ibu Pejabat JKR Malaysia	1	0
3	JURUTERA AWAM	J44	\N	AJ005	J44	020307020300	\N	2022-09-14 09:54:31	2022-09-14 09:54:31	MYKJ	MYKJ	Unit Pengurusan Aset	Bahagian Teknologi Maklumat	Cawangan Dasar dan Pengurusan Korporat	Ibu Pejabat JKR Malaysia	1	0
4	JURUTERA AWAM	J44	\N	AJ005	J44	020307020300	\N	2022-09-14 09:58:41	2022-09-14 09:58:41	MYKJ	MYKJ	Unit Pengurusan Aset	Bahagian Teknologi Maklumat	Cawangan Dasar dan Pengurusan Korporat	Ibu Pejabat JKR Malaysia	1	0
5	JURUTERA AWAM	J44	\N	AJ005	J44	020307020300	4	2022-09-14 10:00:09	2022-09-14 10:00:09	MYKJ	MYKJ	Unit Pengurusan Aset	Bahagian Teknologi Maklumat	Cawangan Dasar dan Pengurusan Korporat	Ibu Pejabat JKR Malaysia	1	0
6	JURUTERA AWAM	J44	\N	AJ005	J44	010302000000	5	2022-09-14 10:58:16	2022-09-14 10:58:16	MYKJ	MYKJ	Bahagian Perancang Jalan	Bahagian Perancang Jalan	Kementerian Kerja Raya (Dasar dan Pembangunan)	Kementerian Kerja Raya Malaysia	1	0
7	JURUTERA MEKANIKAL	J52	\N	AJ006	J52	020400000000	6	2022-09-30 10:07:49	2022-09-30 10:07:49	MYKJ	MYKJ	Pusat Kecemerlangan Kejuruteraan dan Teknologi JKR	Pusat Kecemerlangan Kejuruteraan dan Teknologi JKR	Pusat Kecemerlangan Kejuruteraan dan Teknologi JKR	Lot PT 3287, Mukim Taboh Naning,	1	0
8	JURUTERA AWAM	J48	\N	AJ005	J48	050618000000	7	2022-09-30 11:23:08	2022-09-30 11:23:08	MYKJ	MYKJ	Bahagian Kejuruteraan Awam Kesihatan/Pendidikan (Khidmat Rekabentuk)	Bahagian Kejuruteraan Awam Kesihatan/Pendidikan (Khidmat Rekabentuk)	Cawangan Kejuruteraan Awam dan Struktur	Tingkat 4 - 10, Blok G	1	0
9	PEMBANTU TADBIR	N19	\N	CN001	N19	080104000000	8	2022-09-30 11:25:37	2022-09-30 11:25:37	MYKJ	MYKJ	JKR Daerah Kota Tinggi	JKR Daerah Kota Tinggi	Jabatan Kerja Raya Negeri Johor	Aras 4, Bangunan Dato Abdul Rahman Andak	1	0
10	JURUTEKNIK AWAM	J22	\N	CJ001	J22	040502000000	9	2022-10-03 10:52:44	2022-10-03 10:52:44	MYKJ	MYKJ	Bahagian Pengurusan Portfolio (PMO)	Bahagian Pengurusan Portfolio (PMO)	Cawangan Kerja Pendidikan	Ibu Pejabat JKR Malaysia	1	0
11	JURUTERA AWAM	VU7	\N	AJ005	VU7	020202000000	10	2022-10-03 10:53:09	2022-10-03 10:53:09	MYKJ	MYKJ	Bahagian Pengurusan Projek Kompleks (BPPK)	Bahagian Pengurusan Projek Kompleks (BPPK)	Cawangan Perancangan Aset Bersepadu	Ibu Pejabat JKR Malaysia	1	0
12	JURUTERA AWAM	J44	\N	AJ005	J44	072101010100	11	2022-10-05 10:48:21	2022-10-05 10:48:21	MYKJ	MYKJ	Unit Audit Dalam	Pengurusan Am	Kementerian Perumahan dan Kerajaan Tempatan	Bahagian Pengurusan Sumber Manusia	1	0
13	JURUTERA MEKANIKAL	J44	\N	AJ006	J44	070201010200	12	2022-10-05 11:08:14	2022-10-05 11:08:14	MYKJ	MYKJ	Pengurusan	Pengurusan Dasar Keselamatan Dalam Negeri	Kementerian Dalam Negeri	Bahagian Pembangunan Sumber Manusia	1	0
14	JURUUKUR BAHAN	J54	\N	AJ003	J54	020500000000	13	2022-10-05 11:20:21	2022-10-05 11:20:21	MYKJ	MYKJ	JKR Wilayah Persekutuan Putrajaya	JKR Wilayah Persekutuan Putrajaya	JKR Wilayah Persekutuan Putrajaya	Kompleks F, Blok F7,	1	0
15	JURUTERA MEKANIKAL	J48	\N	AJ006	J48	020305060000	14	2022-10-05 11:44:22	2022-10-05 11:44:22	MYKJ	MYKJ	Unit Prestasi	Bahagian Pengurusan Sumber Manusia	Cawangan Dasar dan Pengurusan Korporat	Ibu Pejabat JKR Malaysia	1	0
16	JURUTERA MEKANIKAL	J48	\N	AJ006	J48	020203040000	15	2022-10-11 12:03:59	2022-10-11 12:03:59	MYKJ	MYKJ	Unit Pembangunan Kapasiti & Transformasi (UPKT)	Bahagian Perundingan Pengurusan Aset (BPPA)	Cawangan Perancangan Aset Bersepadu	Ibu Pejabat JKR Malaysia	1	0
17	JURUTERA ELEKTRIK	J44	\N	AJ007	J44	050304010000	31	2022-10-13 11:15:08	2022-10-13 11:15:08	MYKJ	MYKJ	Unit Perunding Reka Bentuk Kesihatan 1	Bahagian Perunding Reka Bentuk	Cawangan Kejuruteraan Elektrik	Tingkat 11, Blok G	1	0
18	JURUTERA ELEKTRIK	J44	\N	AJ007	J44	040202000000	32	2022-10-13 11:16:04	2022-10-13 11:16:04	MYKJ	MYKJ	Bahagian Pengurusan Portfolio	Bahagian Pengurusan Portfolio	Cawangan Kerja Bangunan Am 1	Ibu Pejabat JKR Malaysia	1	0
19	ARKITEK	J41	\N	AJ002	J41	081200000000	34	2022-10-19 16:35:51	2022-10-19 16:35:51	MYKJ	MYKJ	Jabatan Kerja Raya Negeri Sabah	Jabatan Kerja Raya Negeri Sabah	Jabatan Kerja Raya Negeri Sabah	Beg Berkunci No 2032	1	0
20	PENOLONG JURUTERA (AWAM)	JA29	\N	BJ001	JA29	010305000000	35	2022-10-19 16:35:51	2022-10-19 16:35:51	MYKJ	MYKJ	Bahagian Pembangunan Kontraktor dan Usahawan	Bahagian Pembangunan Kontraktor dan Usahawan	Kementerian Kerja Raya (Dasar dan Pembangunan)	Kementerian Kerja Raya Malaysia	1	0
\.


--
-- Data for Name: penerimaan_ukp11; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.penerimaan_ukp11 (id, id_pemohon, status_terima_pemangkuan, tkh_status_terima_pemangkuan, tkh_kuatkuasa_pemangkuan_pinkform, tkh_lapor_diri, tkh_kuatkuasa_pemangkuan, nama_kerani, jawatan, cawangan, kerani_tkh, nama_ketua_jabatan, nokp_ketua_jabatan, jawatan_ketua_jabatan, cawangan_ketua_jabatan, ketua_jabatan_tkh, perakuan_ketua_jabatan, id_surat_pink, flag, delete_id, created_at, updated_at, created_by, updated_by, nokp_kerani) FROM stdin;
4	1	1	2022-10-19	2022-01-10	2022-05-10	2022-03-10	 DAYANGKU NORLEENABT PENGIRAN HASSANEL	ARKITEK	Jabatan Kerja Raya Negeri Sabah	\N	ABDUL HADI BIN CHE BUSU	910504065899	PENOLONG JURUTERA (AWAM)	Kementerian Kerja Raya (Dasar dan Pembangunan)	\N	\N	9	1	0	2022-10-17 12:16:05	2022-10-19 16:35:51	\N	\N	830520135762
\.


--
-- Data for Name: perakuan_pemohon; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.perakuan_pemohon (id, tatatertib, tatatertib_tahun_hukuman, tatatertib_jenis_hukuman, isytihar_harta, tempoh_percubaan_denda, tempoh_percubaan_denda_tkh, cuti_tanpa_gaji, cuti_tanpa_gaji_tkh, perakuan, perakuan_tkh, id_pemohon, flag, delete_id, created_at, updated_at, created_by, updated_by) FROM stdin;
\.


--
-- Data for Name: peribadi; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.peribadi (id, users_id, nokp, nokp_lama, nama, jantina, kod_bangsa, kod_agama, kod_taraf_perkahwinan, kod_warganegara, kod_negeri_lahir, polis_tentera, pinjaman_rumah, gelaran, tel_bimbit, email, gambar, program_dasar, no_gaji, no_fail_kementerian, kwsp_pencen, no_cukai, no_kwsp, pilihan_bersara_wajib, tahun_bersara_wajib, kategori_skim, kod_status_aktif, poskod, alamat, bandar, anugerah, jenis_perumahan, negeri, tkh_lahir, tahun_bersara_opsyen, pilihan_bersara_opsyen, tkh_bersara, tkh_skim_pencen, tkh_status_aktif, level, alamat_pejabat, tel_pejabat, fax_pejabat, blok, tkh_katalalu, data_sah_oleh, data_tkh_sah, tkh_bersara_opsyen, fail_meja, email_peribadi, flag, delete_id, created_at, updated_at, created_by, updated_by, bangsa, agama, taraf_perkahwinan, negeri_lahir) FROM stdin;
4	13	840924035329	\N	MOHD AFNAN BIN ABDULLAH	L	M	I	KA	Y	03	B	B	Ir.	0139226654	afnan@jkr.gov.my	foto/840924035329.jpg	SSM	20203354	KPKR/PP/JA 2489	K			60	2044	JABATAN	1	50400	BLOK A2-23A-3, TITIWANGSA SENTRAL, JALAN PANGKOR OFF JALAN PEKELILING,	KUALA LUMPUR		N	14	1984-09-24 00:00:00	 	40	2044-09-24 00:00:00	\N	2009-02-26 00:00:00	51	unit pengurusan aset,\nbahagian teknologi maklumat,\nCAW DASAR DAN PENGURUSAN KORPORAT,IBU PEJABAT JKR Malaysia,\nTingkat 14, Blok F\nJalan Sultan Salahuddin\n50480 KUALA LUMPUR  	03-26108502		F	\N	591224105504	2011-04-05 00:00:00	0001-01-01 00:00:00	\N	\N	1	0	2022-09-14 10:00:09	2022-09-14 10:00:09	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Kelantan
5	14	850525086451	\N	AHMAD FAIZ BIN A. RAUP	L	M	I	KA	Y	08	B	B	Ir.	012-775 2864	faiz@kkr.gov.my	foto/850525086451.jpg	SSM	20195080	KPKR/PP/JA 2684	P		16196678	60	2045	JABATAN	1	43000	NO. 20 Jalan bangi avenue 6/3\ntaman bangi avenue\n	kajang		N	10	1985-05-25 00:00:00	 	40	2045-05-25 00:00:00	\N	2009-01-28 00:00:00	1	cawangan pengangkutan bandar & data trafik\nbahagian perancang jalan\nkementerian kerja raya	03-27714216		A	\N	850525086451	2010-12-14 00:00:00	0001-01-01 00:00:00	\N	\N	1	0	2022-09-14 10:58:16	2022-09-14 10:58:16	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Perak
6	15	741029055039	A2870195	AZAHAR B MOHD	L	M	I	KA	Y	05	B	B	Ir.	013-6074640	azaharm@jkr.gov.my	foto/741029055039.jpg	SSM	14380026	JKR/PP/JM/273	P			58	2032	JABATAN	1	50480	D-5-1 KUATERS KERAJAAN,NO.1 JALAN DUTAMAS 3	KUALA LUMPUR		K	14	1974-10-29 00:00:00	2014 	40	2032-10-29 00:00:00	\N	2007-05-15 00:00:00	1	CAWANGAN KEJURUTERAAN MEKANIKAL, ip jkR,\nUNIT PAKAR PEMBANGUNAN LOJI & KUARI,\nTINGKAT 24-28, MENARA KKR2, BLOK G,\nNO.6 JALAN SULTAN SALAHUDDIN,\n50480 KUALA LUMPUR	03-26189511	03-26189510	G	\N	600610025248	2017-05-23 16:23:36.895303	0001-01-01 00:00:00	\N	\N	1	0	2022-09-30 10:07:49	2022-09-30 10:07:49	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Negeri Sembilan
7	16	790829016522	\N	ROZIANA BT MAHMOOD	P	M	I	KA	Y	01	B	B	Ir.	0122661826	mroziana@jkr.gov.my	foto/790829016522.jpg	SSM	20191827	KPKR/PP/JA 2712	K		14386147	58	2037	JABATAN	1	62050	No. 13, JALAN P15 H4/3, PRESINT 15	WILAYAH PERSEKUTUAN		K	16	1979-08-29 00:00:00	2019 	40	2037-08-29 00:00:00	\N	2009-02-24 00:00:00	1	Bahagian Kejuruteraan Awam (Kesihatan dan Pendidikan)\nJabatan Kerja Raya Malaysia,\nAras 6, Menara Kerja Raya (Blok G)\nIbu Pejabat JKR Malaysia\nJalan Sultan Salahuddin\n50480 Kuala Lumpur	03-26189063	03-8891 3491	0	2010-10-26 00:00:00	840721146483	2013-04-18 12:06:02.389571	0001-01-01 00:00:00	\N	\N	1	0	2022-09-30 11:23:08	2022-09-30 11:23:08	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Johor
8	17	720213015384	A2089420	SAADIAH BT ABDUL WAHAB	P	M	I	KA	Y	01	B	T		019-7619196	saadiah_mimi@yahoo.com	foto/720213015384.jpg	SSM	11090230	Per.3/371	P	SG04075807-09(0)	12031019	60	2032	GUNASAMA	1	81800	NO. 76, JALAN PULAI 10,\nTAMAN BUKIT TIRAM,	ULU TIRAM		K	01	1972-02-13 00:00:00	 	40	2032-02-13 00:00:00	2000-12-01 00:00:00	1998-03-01 00:00:00	1	JABATAN KERJA RAYA DAERAH KOTA TINGGI,\nJALAN ABDUL AZIZ,\n81900 kota tinggi, johor	07-8831040	07-8831011	0	2012-12-05 00:00:00	720213015384	2011-07-14 00:00:00	0001-01-01 00:00:00	\N	\N	1	0	2022-09-30 11:25:37	2022-09-30 11:25:37	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Johor
9	18	560822085628	5053100	SAROJINI A/P KANDIAH	P	L	H	JA	Y	08	B	O			Sarojini@jkr.gov.my	foto/560822085628.jpg	SSM	970640	P1/13432	P	SG-3123852-01	2047573	55	2011	JABATAN	4	47400	47, JLN.SS23/31,TAMAN SEA 	PETALING JAYA		O	10	1956-08-22 00:00:00	1996 	40	2011-08-22 00:00:00	1990-06-01 00:00:00	2011-08-22 00:00:00	1	CAW.KEJ.AWAM STRUKTUR DAN JAMBATAN IBU PEJABAT JKR MALAYSIA TING.15, CENTRE POINT NORTH, MIDVALLEY CITY LINGKARAN SYED PUTRA  59200 KUALA LAUMPUR			mdcpn	\N	\N	\N	\N	\N	\N	1	0	2022-10-03 10:52:44	2022-10-03 10:52:44	MYKJ	MYKJ	LAIN	HINDU	JANDA	Perak
10	19	730909035112	A2473218	ATIKAH BT ZAKARIA @ YA	P	M	I	KA	Y	03	B	T	Ir. Hajjah	012-2803216	atikahz@jkr.gov.my	foto/730909035112.jpg	SSM	3869898	PER.1/23662	P	SG-05486078-04(1)	14430811	60	2033	JABATAN	1	43650	NO 43, JALAN 7/3D, SEKSYEN 7, BANDAR BARU BANGI	KAJANG		N	10	1973-09-09 00:00:00	 	40	2033-09-09 00:00:00	2009-08-01 00:00:00	2007-05-15 00:00:00	1	BAHAGIAN JAMBATAN, CAW JALAN, MENARA PJD TINGKAT 21	03-40518137	03-2691 2835	F	2015-03-17 15:59:24.398167	570128065204	2011-01-14 00:00:00	0001-01-01 00:00:00	\N	\N	1	0	2022-10-03 10:53:09	2022-10-03 10:53:09	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Kelantan
11	20	830416145901	\N	AHMAD FIRDAUS BIN MD NOR	L	M	I	KA	Y	14	B	B		0133949040	ahmad_firdaus@kpkt.gov.my	foto/830416145901.jpg	SSM	20195200	KPKR/PP/JA 2515	K	SG20202004050	17934866	58	2041	JABATAN	1	47820	E- 05 - 01, FLORA DAMANSARABANDAR DAMANSARA PERDANA47820 PETALING JAYASELANGOR DARUL EHSAN	PETALING JAYA		N	10	1983-04-16 00:00:00	2023 	40	2041-04-16 00:00:00	\N	2009-01-23 00:00:00	1	unit portfolio office\nbahagian korporat jkr negeri selangor\nseksyen 17, shah alam\nselangor darul ehsan	03-88915123\t		0	\N	840827065358	2015-03-12 07:35:09.08289	0001-01-01 00:00:00	\N	\N	1	0	2022-10-05 10:48:21	2022-10-05 10:48:21	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	WP Kuala Lumpur
12	21	820823105625	\N	ISMAIL BIN HUSAINI	L	M	I	KA	Y	10	B	B		012-3324719	ismail_husaini@Jkr.gov.my	\N		\N		O			60	2042	\N	1	42700	No 24, Taman mawar 21, jalan sg lang 	banting		N	10	1982-08-23 00:00:00	1982 	\N	2042-08-23 00:00:00	\N	0001-01-01 00:00:00	1	JKr wp putrajaya\naras3, blok c7, kompleks ,\npusat pentadbiran kerajaan persekutuan\n62582 putrajaya	03-88856963	0388856998 	0	\N	600610025248	2017-11-01 10:19:51.355232	0001-01-01 00:00:00	\N	@yahoo.com	1	0	2022-10-05 11:08:14	2022-10-05 11:08:14	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Selangor
13	22	640911065514	7468387	FADZIAH BT JHAYA	P	M	I	KA	Y	06	B	T		012-2271109	fadziah@jkr.gov.my	foto/640911065514.jpg	SSM	03858883	KPKR/PP JUB	P	SG0337622807(1)	10849506	60	2024	JABATAN	1	50480	2580/1 JALAN SELANGOR, BUKIT PERSEKUTUAN,50480 	kuala lumpur		K	14	1964-09-11 00:00:00	 	40	2024-09-11 00:00:00	2009-08-01 00:00:00	0001-01-01 00:00:00	1	Cawangan kerja pendidikan,\ntingkat 9 maju tower,\n1001 janal sultan ismail,\n50250 kuala lumpur.	03-26165484	0326916410	MJUNC	\N	830228045268	2011-01-26 00:00:00	0001-01-01 00:00:00	\N	\N	1	0	2022-10-05 11:20:21	2022-10-05 11:20:21	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
14	23	790418145821	\N	IZZAT ZUMAIRI BIN CHE HARUN	L	M	I	KA	Y	14	B	T	Ir.	0163764000	izzat@jkr.gov.my	foto/790418145821.jpg	SSM	14387443	KPKR/PP/JM 328	P		16349072	60	2039	JABATAN	1	40170	No 58 Jalan Pulau lumut u10/76h, alam budiman, seksyen u10	shah alam		N	10	1979-04-18 00:00:00	 	40	2039-04-18 00:00:00	2008-08-01 00:00:00	2006-12-16 00:00:00	80	Bahagian Pengurusan Sumber Manusia\nAras 29, Menara Kerja Raya (Blok G)\nIbu Pejabat JKR Malaysia\nKuala Lumpur	03-26188640	03-26189510	G	\N	600610025248	2017-11-01 10:20:33.389184	0001-01-01 00:00:00	\N	\N	0	1	2022-10-05 11:44:22	2022-10-05 11:44:22	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	WP Kuala Lumpur
3	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-07-13 04:05:28	2022-07-13 04:05:28	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
16	23	790418145821	\N	IZZAT ZUMAIRI BIN CHE HARUN	L	M	I	KA	Y	14	B	T	Ir.	0163764000	izzat@jkr.gov.my	foto/790418145821.jpg	SSM	14387443	KPKR/PP/JM 328	P		16349072	60	2039	JABATAN	1	40170	No 58 Jalan Pulau lumut u10/76h, alam budiman, seksyen u10	shah alam		N	10	1979-04-18 00:00:00	 	40	2039-04-18 00:00:00	2008-08-01 00:00:00	2006-12-16 00:00:00	80	Bahagian Pengurusan Sumber Manusia\nAras 29, Menara Kerja Raya (Blok G)\nIbu Pejabat JKR Malaysia\nKuala Lumpur	03-26188640	03-26189510	G	\N	600610025248	2017-11-01 10:20:33.389184	0001-01-01 00:00:00	\N	\N	1	0	2022-10-12 11:46:39	2022-10-12 11:46:39	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	WP Kuala Lumpur
15	24	771222025701	A 3808823	MOHD SUHARIZAL BIN MAHAMAD SUBRI	L	M	I	KA	Y	02	B	T	\N	017-3237172	msuharizal@jkr.gov.my	foto/771222025701.jpg	SSM	14391775	KPKR/PP/JM 344	P	\N	\N	58	2033	JABATAN	1	71700	no.373, jalan pch 11/1, perdana college height, mantin, 71700 negeri sembilan	mantin	\N	N	05	1977-12-22 00:00:00	2017	40	2033-12-22 00:00:00	2007-06-01 00:00:00	2006-02-15 00:00:00	1	Bahagian Pembangunan Kuari & Pengurusan Aset,\nCawangan Kejuruteraan Mekanikal, \nTingkat 28, Menara Kerja Raya\nIbu Pejabat JKR Malaysia\nBlok G, No. 6, Jalan Sultan Salahuddin, 50480 Kuala Lumpur.	03-92064000	03-92831285	0	2010-11-25 00:00:00	840721146483	2013-04-18 11:57:31.589508	\N	\N	\N	0	1	2022-10-11 12:03:59	2022-10-11 12:03:59	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Kedah
17	24	771222025701	A 3808823	MOHD SUHARIZAL BIN MAHAMAD SUBRI	L	M	I	KA	Y	02	B	T	\N	017-3237172	msuharizal@jkr.gov.my	foto/771222025701.jpg	SSM	14391775	KPKR/PP/JM 344	P	\N	\N	58	2033	JABATAN	1	71700	no.373, jalan pch 11/1, perdana college height, mantin, 71700 negeri sembilan	mantin	\N	N	05	1977-12-22 00:00:00	2017	40	2033-12-22 00:00:00	2007-06-01 00:00:00	2006-02-15 00:00:00	1	Bahagian Pembangunan Kuari & Pengurusan Aset,\nCawangan Kejuruteraan Mekanikal, \nTingkat 28, Menara Kerja Raya\nIbu Pejabat JKR Malaysia\nBlok G, No. 6, Jalan Sultan Salahuddin, 50480 Kuala Lumpur.	03-92064000	03-92831285	0	2010-11-25 00:00:00	840721146483	2013-04-18 11:57:31.589508	\N	\N	\N	1	0	2022-10-13 09:23:14	2022-10-13 09:23:14	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Kedah
18	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 10:55:52	2022-10-13 10:55:52	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
19	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 10:56:11	2022-10-13 10:56:11	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
20	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 10:56:19	2022-10-13 10:56:19	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
21	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 10:57:10	2022-10-13 10:57:10	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
22	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 10:57:11	2022-10-13 10:57:11	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
23	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 10:57:28	2022-10-13 10:57:28	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
24	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 10:57:39	2022-10-13 10:57:39	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
25	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 10:59:51	2022-10-13 10:59:51	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
26	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 11:00:09	2022-10-13 11:00:09	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
31	25	830801025623	\N	MUHAMMAD BRUNSON BIN ARMY	L	L	I	KA	Y	02	B	T		016-7908584	brunson@jkr.gov.my	foto/830801025623.jpg	SSM	28215147	KPKR/PP/JE 446	P		17592467	58	2041	JABATAN	1	43500	no.77 Jalan tps 2/13, taman pelangi semenyih 2, 43500 semenyih kajang selangor	KAJANG		N	10	1983-08-01 00:00:00	 	40	2041-08-01 00:00:00	\N	2009-05-18 00:00:00	1	jabatan kerja raya,\ncawangan KEJURUTERAAN ELEKTRIK,\nTINGKAT 11, BLOK G,MENARA KERJA RAYA 50480 JALAN SULTAN SALAHUDDIN, KUALA LUMPUR	03-26107071		G	\N	840721146483	2013-04-18 12:00:40.699143	0001-01-01 00:00:00	\N	\N	1	0	2022-10-13 11:15:07	2022-10-13 11:15:07	MYKJ	MYKJ	LAIN	ISLAM	KAHWIN	Kedah
32	26	820620145264	\N	PUTERI NURPARINA BINTI BAHRUN	P	M	I	KA	Y	14	B	T		0192729130	PuteriB@jkr.gov.my	foto/820620145264.jpg	SSM	20212668	KPKP/PP/JE 452	P		17204915	58	2040	JABATAN	1	47100	51, JALAN 10,\nTAMAN BUKIT KUCHAI	PUCHONG		N	10	1982-06-20 00:00:00	 	55	2040-06-20 00:00:00	\N	2009-03-31 00:00:00	1	CAWANGAN KERJA BANGUNAN AM 1\nIBU PEJABAT JKR MALAYSIA\nTINGKAT 13,13A & 17, MENARA PJD\nNO.50, JALAN TUN RAZAK\n50400 KUALA LUMPUR	0340518305		PJD	2011-04-06 00:00:00	790911065550	2010-12-24 00:00:00	0001-01-01 00:00:00	\N	\N	1	0	2022-10-13 11:16:04	2022-10-13 11:16:04	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	WP Kuala Lumpur
27	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 11:03:07	2022-10-13 11:03:07	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
28	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 11:03:14	2022-10-13 11:03:14	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
29	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 11:03:21	2022-10-13 11:03:21	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
30	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	0	1	2022-10-13 11:03:49	2022-10-13 11:03:49	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
33	3	860211335522	\N	NORLINDA IRDAYU BINTI YAACOB	P	M	I	KA	Y	06	B	B		0173944945	norlindairdayu@jkr.gov.my	foto/860211335522.jpg		\N		O			0	1986	\N	1	55100	blok c-12-7 kkka jalan cochrane	Kuala Lumpur		K	14	1986-02-11 00:00:00	1986 	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	BAHAGIAN TEKNOLOGI MAKLUMAT\nTINGKAT 14, BLOK F\nIBU PEJABAT JKR MALAYSIA	0326108511		F	\N	\N	\N	0001-01-01 00:00:00	\N	@yahoo.com	1	0	2022-10-13 11:31:16	2022-10-13 11:31:16	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
34	27	830520135762	\N	 DAYANGKU NORLEENABT PENGIRAN HASSANEL	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	DKNorleena.Hassanel@sabah.gov.my	\N	\N	\N		\N	\N	\N	\N	\N	\N	1		\N	\N	\N	\N	\N	1983-05-20 00:00:00	\N	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	1	0	2022-10-19 16:35:51	2022-10-19 16:35:51	MYKJ	MYKJ	\N	\N	\N	\N
35	28	910504065899	\N	ABDUL HADI BIN CHE BUSU	L	M	I	KA	Y	06	B	B	\N	0179222790	abdulhadi@medac.gov.my	\N	\N	\N		\N	\N	\N	\N	\N	\N	1				\N	N	06	1991-05-04 00:00:00	\N	\N	0001-01-01 00:00:00	\N	0001-01-01 00:00:00	1	PUSAT KHIDMAT KONTRAKTOR NEGERI PAHANG\nTINGKAT 9, WISMA PERSEKUTUAN KUANTAN,\n25000 KUANTAN, PAHANG	095164081		0	\N	\N	\N	\N	\N	@YAHOO.COM	1	0	2022-10-19 16:35:51	2022-10-19 16:35:51	MYKJ	MYKJ	MELAYU	ISLAM	KAHWIN	Pahang
\.


--
-- Data for Name: perkhidmatan; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.perkhidmatan (id, jawatan, gred, penempatan, tkh_mula_berkhidmat, tkh_akhir_berkhidmat, kod_waran, kod_jawatan, flag, delete_id, created_at, updated_at, created_by, updated_by, id_peribadi) FROM stdin;
\.


--
-- Data for Name: permission_role; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.permission_role (permission_id, role_id) FROM stdin;
\.


--
-- Data for Name: permission_user; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.permission_user (permission_id, user_id, user_type) FROM stdin;
\.


--
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.permissions (id, name, display_name, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: permohonan_ukp12; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.permohonan_ukp12 (id, nokp_urusetia, is_bin, jenis, flag, delete_id, created_at, updated_at, created_by, updated_by, jawatan, kod_jawatan, gred, kod_disiplin, disiplin, tajuk) FROM stdin;
1	\N	\N	UKP12	0	1	2022-09-12 10:35:36	2022-09-12 10:32:22	\N		\N	\N	J44	E	ELEKTRIK	\N
3	900919099999	\N	UKP12	0	1	2022-09-14 10:51:44	2022-09-14 10:51:44	\N	\N	JURUTERA AWAM	AJ005	J48	A	AWAM	\N
4	900919099999	\N	UKP12	0	1	2022-09-14 10:53:19	2022-09-14 10:53:19	\N	\N	JURUUKUR TANAH	AJ004	J48	A	AWAM	\N
2	900919099999	\N	UKP12	0	1	2022-09-12 11:43:11	2022-09-12 11:43:11	\N	\N	PEGAWAI TEKNOLOGI MAKLUMAT	\N	A21	JU	JURUUKUR	\N
5	900919099999	\N	UKP12	1	0	2022-10-05 11:35:53	2022-10-05 11:35:53	\N	\N	\N	\N	J52	M	MEKANIKAL	MEKANIKAL 48
6	900919099999	\N	UKP12	1	0	2022-10-05 11:40:45	2022-10-05 11:40:45	\N	\N	\N	\N	J54	M	MEKANIKAL	MEKANIKAL 48
7	900919099999	\N	UKP12	1	0	2022-10-07 16:23:56	2022-10-07 16:23:56	\N	\N	\N	\N	J54	M	MEKANIKAL	MEKANIKAL 48
8	900919099999	\N	UKP12	1	0	2022-10-13 11:12:39	2022-10-13 11:12:39	\N	\N	\N	\N	J48	E	ELEKTRIK	ELETRIK J44
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: pertubuhan; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.pertubuhan (id, nama, jawatan, tahun, created_at, updated_at, pemohon_id, created_by, updated_by, flag, delete_id) FROM stdin;
1	Surau Al-Ikhlas	AJK Fasiliti	2021	2022-10-12 16:04:55	2022-10-12 16:04:55	2	790418145821	790418145821	1	0
2	Persatuan Komuniiti Pandan	AJK Sukan	2021	2022-10-12 16:07:58	2022-10-12 16:07:58	2	790418145821	790418145821	1	0
\.


--
-- Data for Name: pinjaman_pendidikan; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.pinjaman_pendidikan (id, status, nama_institusi, tkh_mula_pinjaman, tkh_akhir_pinjaman, tkh_mula_bayaran, tkh_awal, tkh_akhir, jumlah_pinjaman, tahun_pinjaman, tahun_mula_bayaran, tahun_selesai_bayaran, surat_perakuan, id_pemohon, flag, delete_id, created_at, updated_at, created_by, updated_by) FROM stdin;
\.


--
-- Data for Name: professional; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.professional (id, nama_sijil, badan_professional, no_pendaftaran, tahun, id_peribadi, created_at, updated_at, created_by, updated_by, flag, delete_id, kod_sijil, jenis_sijil) FROM stdin;
\.


--
-- Data for Name: role_user; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.role_user (role_id, user_id, user_type) FROM stdin;
1	2	vendor
2	9	jkr
2	10	jkr
1	3	jkr
5	27	jkr
6	28	jkr
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.roles (id, name, display_name, description, created_at, updated_at) FROM stdin;
1	superadmin	Pentadbir Sistem	Super Administrator	\N	\N
3	secretariat	BPSM	Urus setia Proses	\N	\N
4	coordinator	BPSK	Penyelaras Lantikan	\N	\N
5	clerk	Kerani Perkhidmatan	Kerani Pengesahan Maklumat	\N	\N
6	hod	Ketua Bahagian / Jabatan	Ketua Memberi Perakuan	\N	\N
7	supervisor	Pegawai Penyelia	Pegawai Menyelia Pemohom	\N	\N
2	user	Pengguna	Pengguna Biasa (Normal User)	\N	\N
\.


--
-- Data for Name: sijil_kompeten; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.sijil_kompeten (id, nama_sijil, tahap, id_peribadi, flag, delete_id, created_at, updated_at, created_by, updated_by, kod_sijil, jenis_sijil) FROM stdin;
\.


--
-- Data for Name: soalan_lnpk; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.soalan_lnpk (id, soalan, susunan, flag, delete_id, created_at, updated_at, created_by, updated_by) FROM stdin;
\.


--
-- Data for Name: surat_pink; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.surat_pink (id, no_bil, no_ruj, no_fail, no_jilid, id_pemohon, flag, delete_id, created_at, updated_at, created_by, updated_by, no_surat, tkh_lapor_diri, fail_id, alamat) FROM stdin;
9	\N	\N	\N	\N	1	1	0	2022-10-17 12:16:05	2022-10-17 12:16:05	\N	\N	Bil. 58/2022 ruj:(93) JKR/KPKR/010. 030 104 JLD. 25	2022-01-10	4	Surat Pink Condo
\.


--
-- Data for Name: tatatertib_ukp12; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.tatatertib_ukp12 (id, pengesahan_tindakan, jenis_hukuman, tkh_hukuman, id_pemohon, flag, delete_id, created_at, updated_at, created_by, updated_by) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: rookiextreme
--

COPY public.users (id, name, nokp, email, email_verified_at, password, remember_token, created_at, updated_at, type, created_by, updated_by, flag, delete_id) FROM stdin;
2	superadmin	900919099999	rubmin@gmail.com	\N	$2y$10$1wXnNa1sZGCdgg8/0qaov.PE3p2vXX/ecXLtOEWplB2rJ2tja7AEa	\N	2022-06-27 04:07:23	2022-06-27 04:07:23	0	\N	\N	\N	\N
13	MOHD AFNAN BIN ABDULLAH	840924035329	afnan@jkr.gov.my	\N	$2y$10$sBPCmND3AQmlPFm8s57YDOwdt0Gv37TDujwZUUSfLRpdBFbvJOOxC	\N	2022-09-14 10:00:09	2022-09-14 10:00:09	1	900919099999	\N	1	0
14	AHMAD FAIZ BIN A. RAUP	850525086451	faiz@kkr.gov.my	\N	$2y$10$zgYSyJtC0DPHizHHdbrR6eNv/GDYE58nJwVNoAIXmsoVBebSbQYca	\N	2022-09-14 10:58:16	2022-09-14 10:58:16	1		\N	1	0
15	AZAHAR B MOHD	741029055039	azaharm@jkr.gov.my	\N	$2y$10$DTm2p7rngHkx53qVB5k8Sujiu0ZO2pPUU1zYtEjm6SN/WnQsxO.12	\N	2022-09-30 10:07:49	2022-09-30 10:07:49	1		\N	1	0
16	ROZIANA BT MAHMOOD	790829016522	mroziana@jkr.gov.my	\N	$2y$10$r2NoZ/oQOrO.HuTdkb9lxOcYelmfFd/oAxJjTOAqkEr9be2dWf.IC	\N	2022-09-30 11:23:08	2022-09-30 11:23:08	1		\N	1	0
17	SAADIAH BT ABDUL WAHAB	720213015384	saadiah_mimi@yahoo.com	\N	$2y$10$N7CAg02CZLNHBbgD7HKe.Oa3nu3z7O25hX25JBZESnJNPb.ZR9zpq	\N	2022-09-30 11:25:37	2022-09-30 11:25:37	1		\N	1	0
18	SAROJINI A/P KANDIAH	560822085628	Sarojini@jkr.gov.my	\N	$2y$10$F8e6xAMn0u98EcbyGlu7ku5IzQw9rBh4D/5VdI3BGoSAAvfMLO6.m	\N	2022-10-03 10:52:44	2022-10-03 10:52:44	1		\N	1	0
19	ATIKAH BT ZAKARIA @ YA	730909035112	atikahz@jkr.gov.my	\N	$2y$10$pL/8R1rfWpdo9yFaRsyZD.4nBoNol55gBbDZCSvVZjnsHuBne5SGu	\N	2022-10-03 10:53:09	2022-10-03 10:53:09	1		\N	1	0
20	AHMAD FIRDAUS BIN MD NOR	830416145901	ahmad_firdaus@kpkt.gov.my	\N	$2y$10$lpxaAvvsJGp60o7wseXBI.GfqZHneYytkc.OKaeOpSy5GfDViRO8y	\N	2022-10-05 10:48:21	2022-10-05 10:48:21	1		\N	1	0
21	ISMAIL BIN HUSAINI	820823105625	ismail_husaini@Jkr.gov.my	\N	$2y$10$UJpKTjkvGiITuDp0FWQ6I.U14AWPEileFGqk7OU.e6RzFmx/gXmkm	\N	2022-10-05 11:08:14	2022-10-05 11:08:14	1		\N	1	0
22	FADZIAH BT JHAYA	640911065514	fadziah@jkr.gov.my	\N	$2y$10$yqQNuwCbfzWI0902Mc6u1.BciLXzgJAkNl.Qpot.veGVLRFAvuVkG	\N	2022-10-05 11:20:21	2022-10-05 11:20:21	1		\N	1	0
23	IZZAT ZUMAIRI BIN CHE HARUN	790418145821	izzat@jkr.gov.my	\N	$2y$10$JXfIKCvBDXxWOvbqIgdyl.ahOWP6GZ8D79h4rhIRB1PEpha7CAzni	\N	2022-10-05 11:44:22	2022-10-05 11:44:22	1		\N	1	0
3	NORLINDA IRDAYU BINTI YAACOB	860211335522	norlindairdayu@jkr.gov.my	\N	$2y$10$g1UKi.rMfC/HSRif0cgjKu2uxUE9/YE/uYanELfAVj.jGFkBeZPfS	\N	2022-07-13 03:25:16	2022-10-05 15:41:59	1	MYKJ	MYKJ	1	0
24	MOHD SUHARIZAL BIN MAHAMAD SUBRI	771222025701	msuharizal@jkr.gov.my	\N	$2y$10$HMsz80n38qUS/0oZdCdQ9uqtusd.HOVSv6JnN5Ngorv4dV03EV3Fu	\N	2022-10-11 12:03:59	2022-10-11 12:03:59	1		\N	1	0
25	MUHAMMAD BRUNSON BIN ARMY	830801025623	brunson@jkr.gov.my	\N	$2y$10$uxsb/SVCr5jtcv0TVxvOh.qSgMz4KbzkRyX9mfecH8/m75rl5frb6	\N	2022-10-13 11:15:07	2022-10-13 11:15:07	1		\N	1	0
26	PUTERI NURPARINA BINTI BAHRUN	820620145264	PuteriB@jkr.gov.my	\N	$2y$10$r2yquNIv2qCkWnCvC8oazO0FgwSQCLOij0JmkFDrkXyGCiQYlYSmu	\N	2022-10-13 11:16:04	2022-10-13 11:16:04	1		\N	1	0
27	 DAYANGKU NORLEENABT PENGIRAN HASSANEL	830520135762	DKNorleena.Hassanel@sabah.gov.my	\N	$2y$10$gvIPwsabd5xS2b5elBEzqeT5mGAXfHBgcYcRQ4NPr70MVRrTUlKru	\N	2022-10-19 16:35:51	2022-10-19 16:35:51	1		\N	1	0
28	ABDUL HADI BIN CHE BUSU	910504065899	abdulhadi@medac.gov.my	\N	$2y$10$u8brWeQLE1ft039WYko5/OCG/GzlhPgPwyPEvBPyFJxr.EhTc9Zfu	\N	2022-10-19 16:35:51	2022-10-19 16:35:51	1		\N	1	0
\.


--
-- Name: akademik_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.akademik_id_seq', 1, false);


--
-- Name: calon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.calon_id_seq', 16, true);


--
-- Name: cuti_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.cuti_id_seq', 1, false);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: files_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.files_id_seq', 4, true);


--
-- Name: harta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.harta_id_seq', 1, false);


--
-- Name: kumpulan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.kumpulan_id_seq', 5, true);


--
-- Name: lnpt_ukp12_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.lnpt_ukp12_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.migrations_id_seq', 5, true);


--
-- Name: pasangan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.pasangan_id_seq', 1, false);


--
-- Name: pemohon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.pemohon_id_seq', 19, true);


--
-- Name: penempatan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.penempatan_id_seq', 20, true);


--
-- Name: penerimaan_ukp11_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.penerimaan_ukp11_id_seq', 4, true);


--
-- Name: perakuan_pemohon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.perakuan_pemohon_id_seq', 1, false);


--
-- Name: peribadi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.peribadi_id_seq', 35, true);


--
-- Name: perkhidmatan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.perkhidmatan_id_seq', 1, false);


--
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.permissions_id_seq', 1, false);


--
-- Name: permohonan_ukp12_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.permohonan_ukp12_id_seq', 8, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: pertubuhan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.pertubuhan_id_seq', 3, true);


--
-- Name: pinjaman_pendidikan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.pinjaman_pendidikan_id_seq', 1, false);


--
-- Name: professional_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.professional_id_seq', 1, false);


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.roles_id_seq', 7, true);


--
-- Name: sijil_kompeten_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.sijil_kompeten_id_seq', 1, false);


--
-- Name: surat_pink_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.surat_pink_id_seq', 9, true);


--
-- Name: tatatertib_ukp12_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.tatatertib_ukp12_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rookiextreme
--

SELECT pg_catalog.setval('public.users_id_seq', 28, true);


--
-- Name: akademik akademik_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.akademik
    ADD CONSTRAINT akademik_pkey PRIMARY KEY (id);


--
-- Name: cuti cuti_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.cuti
    ADD CONSTRAINT cuti_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: harta harta_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.harta
    ADD CONSTRAINT harta_pkey PRIMARY KEY (id);


--
-- Name: kumpulan kumpulan_pk; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.kumpulan
    ADD CONSTRAINT kumpulan_pk PRIMARY KEY (id);


--
-- Name: lnpk lnpk_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.lnpk
    ADD CONSTRAINT lnpk_pkey PRIMARY KEY (id);


--
-- Name: lnpt_ukp12 lnpt_ukp12_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.lnpt_ukp12
    ADD CONSTRAINT lnpt_ukp12_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: calon newtable_pk; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.calon
    ADD CONSTRAINT newtable_pk PRIMARY KEY (id);


--
-- Name: pasangan pasangan_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pasangan
    ADD CONSTRAINT pasangan_pkey PRIMARY KEY (id);


--
-- Name: pemohon pemohon_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pemohon
    ADD CONSTRAINT pemohon_pkey PRIMARY KEY (id);


--
-- Name: penempatan penempatan_pk; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.penempatan
    ADD CONSTRAINT penempatan_pk PRIMARY KEY (id);


--
-- Name: penerimaan_ukp11 penerimaan_ukp_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.penerimaan_ukp11
    ADD CONSTRAINT penerimaan_ukp_pkey PRIMARY KEY (id);


--
-- Name: perakuan_pemohon perakuan_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.perakuan_pemohon
    ADD CONSTRAINT perakuan_pkey PRIMARY KEY (id);


--
-- Name: peribadi peribadi_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.peribadi
    ADD CONSTRAINT peribadi_pkey PRIMARY KEY (id);


--
-- Name: perkhidmatan perkhidmatan_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.perkhidmatan
    ADD CONSTRAINT perkhidmatan_pkey PRIMARY KEY (id);


--
-- Name: permission_role permission_role_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.permission_role
    ADD CONSTRAINT permission_role_pkey PRIMARY KEY (permission_id, role_id);


--
-- Name: permission_user permission_user_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.permission_user
    ADD CONSTRAINT permission_user_pkey PRIMARY KEY (user_id, permission_id, user_type);


--
-- Name: permissions permissions_name_unique; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_name_unique UNIQUE (name);


--
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- Name: permohonan_ukp12 permohonan_ukp12_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.permohonan_ukp12
    ADD CONSTRAINT permohonan_ukp12_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: pertubuhan pertubuhan_pk; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pertubuhan
    ADD CONSTRAINT pertubuhan_pk PRIMARY KEY (id);


--
-- Name: pinjaman_pendidikan pinjaman_pendidikan_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pinjaman_pendidikan
    ADD CONSTRAINT pinjaman_pendidikan_pkey PRIMARY KEY (id);


--
-- Name: professional professional_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.professional
    ADD CONSTRAINT professional_pkey PRIMARY KEY (id);


--
-- Name: role_user role_user_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.role_user
    ADD CONSTRAINT role_user_pkey PRIMARY KEY (user_id, role_id, user_type);


--
-- Name: roles roles_name_unique; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_name_unique UNIQUE (name);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: sijil_kompeten sijil_kompeten_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.sijil_kompeten
    ADD CONSTRAINT sijil_kompeten_pkey PRIMARY KEY (id);


--
-- Name: soalan_lnpk soalan_lnpk_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.soalan_lnpk
    ADD CONSTRAINT soalan_lnpk_pkey PRIMARY KEY (id);


--
-- Name: surat_pink surat_pink_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.surat_pink
    ADD CONSTRAINT surat_pink_pkey PRIMARY KEY (id);


--
-- Name: tatatertib_ukp12 tatatertib_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.tatatertib_ukp12
    ADD CONSTRAINT tatatertib_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_nokp_unique; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_nokp_unique UNIQUE (nokp);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: rookiextreme
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: rookiextreme
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: akademik akademik_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.akademik
    ADD CONSTRAINT akademik_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- Name: calon calon_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.calon
    ADD CONSTRAINT calon_fk FOREIGN KEY (kumpulan_id) REFERENCES public.kumpulan(id);


--
-- Name: cuti cuti_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.cuti
    ADD CONSTRAINT cuti_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- Name: harta harta_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.harta
    ADD CONSTRAINT harta_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- Name: jawapan_lnpk jawapan_lnpk_id_lnpk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.jawapan_lnpk
    ADD CONSTRAINT jawapan_lnpk_id_lnpk FOREIGN KEY (id_lnpk) REFERENCES public.lnpk(id);


--
-- Name: jawapan_lnpk jawapan_lnpk_id_soalan; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.jawapan_lnpk
    ADD CONSTRAINT jawapan_lnpk_id_soalan FOREIGN KEY (id_soalan) REFERENCES public.soalan_lnpk(id);


--
-- Name: kumpulan kumpulan_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.kumpulan
    ADD CONSTRAINT kumpulan_fk FOREIGN KEY (permohonan_id) REFERENCES public.permohonan_ukp12(id);


--
-- Name: lnpt_ukp12 lnpt_ukp12_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.lnpt_ukp12
    ADD CONSTRAINT lnpt_ukp12_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- Name: pasangan pasangan_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pasangan
    ADD CONSTRAINT pasangan_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- Name: pemohon pemohon_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pemohon
    ADD CONSTRAINT pemohon_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- Name: pemohon pemohon_id_permohonan; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pemohon
    ADD CONSTRAINT pemohon_id_permohonan FOREIGN KEY (id_permohonan) REFERENCES public.permohonan_ukp12(id);


--
-- Name: penempatan penempatan_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.penempatan
    ADD CONSTRAINT penempatan_fk FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- Name: penerimaan_ukp11 penerimaa_ukp_id_pemohon; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.penerimaan_ukp11
    ADD CONSTRAINT penerimaa_ukp_id_pemohon FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- Name: penerimaan_ukp11 penerimaan_ukp_id_surat_pink; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.penerimaan_ukp11
    ADD CONSTRAINT penerimaan_ukp_id_surat_pink FOREIGN KEY (id_surat_pink) REFERENCES public.surat_pink(id);


--
-- Name: perakuan_pemohon perakuan_pemohon_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.perakuan_pemohon
    ADD CONSTRAINT perakuan_pemohon_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- Name: peribadi peribadi_users_id; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.peribadi
    ADD CONSTRAINT peribadi_users_id FOREIGN KEY (users_id) REFERENCES public.users(id);


--
-- Name: perkhidmatan perkhidmatan_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.perkhidmatan
    ADD CONSTRAINT perkhidmatan_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- Name: permission_role permission_role_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.permission_role
    ADD CONSTRAINT permission_role_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: permission_role permission_role_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.permission_role
    ADD CONSTRAINT permission_role_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: permission_user permission_user_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.permission_user
    ADD CONSTRAINT permission_user_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pertubuhan pertubuhan_pemohon_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pertubuhan
    ADD CONSTRAINT pertubuhan_pemohon_fk FOREIGN KEY (id) REFERENCES public.pemohon(id);


--
-- Name: pinjaman_pendidikan pinjaman_pendidikan_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.pinjaman_pendidikan
    ADD CONSTRAINT pinjaman_pendidikan_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- Name: professional professional_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.professional
    ADD CONSTRAINT professional_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- Name: role_user role_user_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.role_user
    ADD CONSTRAINT role_user_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: sijil_kompeten sijil_kompeten_id_peribadi; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.sijil_kompeten
    ADD CONSTRAINT sijil_kompeten_id_peribadi FOREIGN KEY (id_peribadi) REFERENCES public.peribadi(id);


--
-- Name: surat_pink surat_pink_permohon_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.surat_pink
    ADD CONSTRAINT surat_pink_permohon_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- Name: tatatertib_ukp12 tatatertib_ukp12_fk; Type: FK CONSTRAINT; Schema: public; Owner: rookiextreme
--

ALTER TABLE ONLY public.tatatertib_ukp12
    ADD CONSTRAINT tatatertib_ukp12_fk FOREIGN KEY (id_pemohon) REFERENCES public.pemohon(id);


--
-- PostgreSQL database dump complete
--

