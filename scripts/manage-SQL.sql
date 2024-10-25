-- DROP database

DROP DATABASE IF EXISTS full_symfony_template;
DROP SCHEMA full_symfony_template CASCADE;

CREATE DATABASE full_symfony_template;
CREATE DATABASE full_symfony_template WITH OWNER root;

SELECT current_database();


-- list database
SELECT datname FROM pg_database;

-- list tables
SELECT * FROM pg_tables;
SELECT * FROM pg_tables WHERE schemaname = 'public';
SELECT * FROM pg_tables WHERE schemaname = 'full_symfony_template';

SELECT * FROM pg_catalog.pg_tables WHERE schemaname != 'pg_catalog' AND schemaname != 'information_schema';


-- list relations
SELECT * FROM pg_class;
SELECT * FROM pg_class WHERE relname like '%user%';




SELECT conname, contype, connamespace::regnamespace, conrelid::regclass, conkey, confrelid::regclass, confkey
FROM pg_constraint;

SELECT conname, contype, connamespace::regnamespace, conrelid::regclass, conkey, confrelid::regclass, confkey
FROM pg_constraint
WHERE conname like '%emai%';


SELECT tc.table_name, kcu.column_name
FROM information_schema.table_constraints tc
INNER JOIN information_schema.key_column_usage kcu ON tc.constraint_name = kcu.constraint_name
WHERE tc.constraint_name = 'uniq_identifier_email' AND tc.constraint_type = 'UNIQUE';



SHOW SERVER_VERSION;

\l;
\h;

\dt;

SELECT table_name
FROM information_schema.tables
WHERE table_schema NOT IN ('pg_catalog', 'information_schema');



SELECT * FROM users;
SELECT * FROM subscription;
