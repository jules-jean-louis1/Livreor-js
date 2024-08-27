DROP TABLE IF EXISTS commentaires;
CREATE TABLE IF NOT EXISTS commentaires (
  id SERIAL PRIMARY KEY,
  commentaire TEXT NOT NULL,
  id_utilisateur INT NOT NULL,
  date TIMESTAMP NOT NULL
);

DROP TABLE IF EXISTS utilisateurs;
CREATE TABLE IF NOT EXISTS utilisateurs (
  id SERIAL PRIMARY KEY,
  login VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
);


INSERT INTO utilisateurs (login, password) VALUES ('admin', 'admin');
INSERT INTO utilisateurs (login, password) VALUES ('user', 'user');
INSERT INTO utilisateurs (login, password) VALUES ('citron', 'password');

INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('Ceci est un commentaire', 1, NOW());
INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('Ceci est un autre commentaire', 2, NOW());