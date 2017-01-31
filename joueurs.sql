

DROP TABLE IF EXISTS joueurs;
CREATE TABLE  IF NOT EXISTS joueurs (
    joueur_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50),
    motpasse VARCHAR(255),
    nbrpartie_jeu1 mediumint(11) unsigned DEFAULT 0,
	nbrpoint_jeu1 mediumint(11) unsigned DEFAULT 0,
    nbrpartie_jeu2 mediumint(11) unsigned DEFAULT 0,
	nbrpoint_jeu2 mediumint(11) unsigned DEFAULT 0,
    creation DATETIME									
);



