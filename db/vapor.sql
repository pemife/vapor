------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE usuarios
(
    id          BIGSERIAL     PRIMARY KEY
  , nombre      VARCHAR(32)   NOT NULL UNIQUE
  , password    VARCHAR(60)   NOT NULL
);

DROP TABLE IF EXISTS juegos CASCADE;

CREATE TABLE juegos
(
    id              BIGSERIAL     PRIMARY KEY
  , titulo          VARCHAR(255)  NOT NULL UNIQUE
  , descripcion     TEXT
  , precio          NUMERIC(5,2)  CONSTRAINT ck_juego_precio_positivo
                                  CHECK (coalesce(precio, 0) >= 0)
  , imagen          TEXT
  , dev             VARCHAR(32)
  , publisher       VARCHAR(32)
  , fecha_salida    DATE          DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS comentarios CASCADE;

CREATE TABLE comentarios
(
    id              BIGSERIAL       PRIMARY KEY
  , voto            BOOLEAN         NOT NULL
  , opinion         TEXT
  , usuario_id      BIGINT          NOT NULL
                                    REFERENCES usuarios (id)
                                    ON DELETE CASCADE
                                    ON UPDATE CASCADE
  , juego_id        BIGINT          NOT NULL
                                    REFERENCES juegos (id)
                                    ON DELETE CASCADE
                                    ON UPDATE CASCADE
);

DROP TABLE IF EXISTS galerias CASCADE;

CREATE TABLE galerias
(
    id              BIGSERIAL        PRIMARY KEY
  , portada         TEXT             NOT NULL
);

-- INSERTS --

INSERT INTO usuarios (nombre, password)
VALUES ('PepeMzero', crypt('pepe', gen_salt('bf', 10)))
      ,('admin', crypt('admin', gen_salt('bf', 10)));

INSERT INTO juegos (titulo, descripcion, precio, imagen)
VALUES ('Rocket League', 'Futbol con coches', 19.99, 'https://steamcdn-a.akamaihd.net/steam/apps/252950/header_alt_assets_5.jpg?t=1549059561')
      ,('Counter Strike: Global Offensive', 'Entrega de shooter de Valve', 0, 'https://steamcdn-a.akamaihd.net/steam/apps/730/header.jpg?t=1544148568');

INSERT INTO comentarios (voto, opinion, usuario_id, juego_id)
VALUES (true, 'No esta mal', 1, 1)
      ,(false, 'Vaya porqueria', 1, 2);
