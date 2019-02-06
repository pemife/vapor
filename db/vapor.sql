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
  , dev             VARCHAR(32)
  , publisher       VARCHAR(32)
  , fecha_salida    DATE          DEFAULT CURRENT_TIMESTAMP
  , portada         BIGINT        REFERENCES galerias (id)
                                  ON DELETE NO ACTION
                                  ON UPDATE CASCADE
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
  , imagen          TEXT             NOT NULL
  , juego_id        BIGINT           REFERENCES juegos (id)
                                     ON DELETE NO ACTION
                                     ON UPDATE CASCADE
);

-- INSERTS --

INSERT INTO usuarios (nombre, password)
VALUES ('PepeMzero', crypt('pepe', gen_salt('bf', 10)))
      ,('admin', crypt('admin', gen_salt('bf', 10)));

INSERT INTO juegos (titulo, descripcion, precio)
VALUES ('Rocket League', 'Futbol con coches', 19.99)
      ,('Counter Strike: Global Offensive', 'Entrega de shooter de Valve', 0);

INSERT INTO comentarios (voto, opinion, usuario_id, juego_id)
VALUES (true, 'No esta mal', 1, 1)
      ,(false, 'Vaya porqueria', 1, 2);

INSERT INTO galerias (imagen, juego_id)
VALUES ('https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjDmb3K56fgAhWszYUKHRYqBLgQjRx6BAgBEAU&url=https%3A%2F%2Fgiphy.com%2Fgifs%2Frickroll-rick-astley-never-gonna-give-you-up-Vuw9m5wXviFIQ&psig=AOvVaw3F27MWrW5cNAExmUyJQn8K&ust=1549566603955471', 1)
      ,('https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjDmb3K56fgAhWszYUKHRYqBLgQjRx6BAgBEAU&url=https%3A%2F%2Fgiphy.com%2Fgifs%2Frickroll-rick-astley-never-gonna-give-you-up-Vuw9m5wXviFIQ&psig=AOvVaw3F27MWrW5cNAExmUyJQn8K&ust=1549566603955471', 2);
