-- Création de la table professeur
Create table Professeur (
	Id_professeur serial PRIMARY KEY NOT NULL,
	Nom varchar(50) NOT NULL,
	Prenom varchar(50) NOT NULL,
	Adresse_mail varchar(255) UNIQUE NOT NULL,
	Mot_de_passe varchar(256) NOT NULL,
    Etablissement varchar(50),
    Nb_eleve_total int,
    Niveau varchar(50),
    Ville varchar(100)
);

-- Création de la table superviseur
Create table Superviseur (
	Id_superviseur serial PRIMARY KEY NOT NULL,
	Nom varchar(50) NOT NULL,
	Prenom varchar(50) NOT NULL,
	Adresse_mail varchar(255) UNIQUE NOT NULL,
	Mot_de_passe varchar(256) NOT NULL
);

-- Création de la table planning
Create table Planning (
	Nom varchar(100) PRIMARY KEY NOT NULL,
	Duree int NOT NULL,
	Temps_intersession int NOT NULL,
	Horaire varchar(10) NOT NULL,
	Pause_debut time NOT NULL,
	Pause_fin time NOT NULL
);

-- Création de la table exposant
Create table Exposant (
    Id_exposant serial PRIMARY KEY NOT NULL,
    Nom varchar(100) NOT NULL references Planning,
    Capacite int NOT NULL,
    Description varchar(500) NOT NULL,
    Niveau varchar(100) NOT NULL,
    Presence_jeudi varchar(20) NOT NULL,
    Presence_vendredi varchar(20) NOT NULL,
    Nb_stand int NOT NULL
);

-- Création de la table créneau
Create table Creneau (
    Id_creneau serial PRIMARY KEY NOT NULL,
    Nom varchar(100) NOT NULL references Planning,
    Heure_d time NOT NULL,
    Heure_f time NOT NULL,
    Jour varchar(10) NOT NULL
);

-- Création de la table réservation
Create table Reservation (
	Id_reservation serial PRIMARY KEY NOT NULL,
	Nom varchar(100) NOT NULL references Planning,
	Id_professeur int NOT NULL references Professeur,
	Id_creneau int NOT NULL references Creneau,
	Nb_eleve int NOT NULL
);

-- Création du type event
Create type event as enum('INSERT', 'DELETE', 'UPDATE');

-- Création de la table du journal des modifications appliquées par les superviseurs
Create table Journal_modification (
	Id_modification_a serial PRIMARY KEY NOT NULL,
	Id_superviseur int NOT NULL references Superviseur,
	action event,
	estampille timestamp default current_timestamp,
	old_tuple varchar(100) NOT NULL,
	new_tuple varchar(100) NOT NULL
);

-- Création de la table journal des modifications demandées
Create table Journal_modification_demandé (
	Id_modification_d serial PRIMARY KEY NOT NULL,
	Id_professeur int references Professeur,
	requete varchar(300) NOT NULL
);