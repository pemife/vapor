------------------------------
-- Archivo de base de datos --
------------------------------

CREATE TABLE usuarios
(
    id          BIGSERIAL     PRIMARY KEY
  , nombre      VARCHAR(32)   NOT NULL UNIQUE
  , password    VARCHAR(60)   NOT NULL UNIQUE
);

CREATE TABLE juegos
(
    id          BIGSERIAL     PRIMARY KEY
  , titulo      VARCHAR(255)  NOT NULL UNIQUE
  , descripcion TEXT
  , precio      NUMERIC(5,2)  CONSTRAINT ck_juego_precio_positivo
                              CHECK (coalesce(precio, 0) >= 0)
  , 
);
