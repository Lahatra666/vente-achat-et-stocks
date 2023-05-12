CREATE DATABASE achat_vente;

\c achat_vente

---Table
CREATE TABLE Admin 
(
    idAdmin         SERIAL PRIMARY KEY NOT NULL,
    email           VARCHAR(50) NOT NULL,
    password        VARCHAR(50) NOT NULL
);


CREATE TABLE Departement
    (
        idDept serial primary key,
        nomDept varchar(50),
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL
    );

CREATE TABLE Typefournisseur
(
    idtypefournisseur serial primary key not null,
    nomtypefournisseur varchar(50)
);

CREATE TABLE Fournisseur
    (
        idFournisseur serial primary key,
        nomFournisseur varchar(75),
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        idtypefournisseur int,
        foreign key (idtypefournisseur) references Typefournisseur(idtypefournisseur)
    );

CREATE TABLE DemandeDept
    (
        idDemandeDept serial primary key,
        idDept int,
        Designation varchar(50),
        nombre int,
        DatedeDemande date NOT NULL default current_date,
        idtypefournisseur int,
        Etat int default 0,
        foreign key (idtypefournisseur) references Typefournisseur(idtypefournisseur),
        foreign key (idDept) references Departement(idDept)  
    );

    CREATE TABLE DemandeEntreprise 
(
    idDemandeEntreprise   SERIAL PRIMARY KEY NOT NULL,
    idAdmin INT,
    Designation           VARCHAR(50) NOT NULL,
    Dates date NOT NULL default current_date,
    Nombre       INT,
    Etat         INT default 0,
    idtypefournisseur int,
    foreign key (idtypefournisseur) references Typefournisseur(idtypefournisseur),
    FOREIGN KEY(idAdmin) REFERENCES Admin(idAdmin)
);

CREATE TABLE EntreeEntreprise
    (
        idEntreeEntreprise serial primary key,
        idDemandeEntreprise int,
        idFournisseur int,
        Designation varchar(50),
        nombre int,
        Daterecu date NOT NULL default current_date,
        foreign key (idDemandeEntreprise) references DemandeEntreprise(idDemandeEntreprise),  
        foreign key (idFournisseur) references Fournisseur(idFournisseur)  
    );

CREATE TABLE Proforma(
    idProforma int not null,
    designation varchar(50),
    nombre int,
    montant int
);

CREATE TABLE nombreProforma(
    id int not null,
    valeurs int
);

CREATE TABLE idProforma(
    id int not null
);

INSERT INTO idProforma VALUES(1);

CREATE TABLE ProformaFournisseur(
    idProforma int,
    idFournisseur int references Fournisseur(idFournisseur)
);


CREATE TABLE StockEntreprise
    (
        idStock serial primary key,
        designation varchar(50),
        nombre int
    );

CREATE TABLE StockDept
    (
        idStockDept serial primary key,
        idDept int,
        designation varchar(50),
        nombre int,
        dateRecu Date,
        foreign key (idDept) references Departement(idDept)  
    );

--ETAT 
--0 : mbola tsy lasa any @fournisseur le Commande
--1 : efa lasa fa mbola tsy livre
--2 : livre et payer
CREATE TABLE Commande(
    idCommande serial primary key,
    designation varchar(50),
    nombre int,
    etat int default 0,
    idFournisseur int references Fournisseur(idFournisseur),
    montant int
);


--ETAT 
--0 : non recu
--1 : recu
CREATE TABLE livraison(
    idlivraison serial primary key,
    designation varchar(50),
    nombre int,
    etat int default 0,
    idFournisseur int references Fournisseur(idFournisseur),
    datelivraison date default current_date,
    montant int
);

---Vente
CREATE TABLE Entana 
(
    idEntana SERIAL PRIMARY KEY NOT NULL,
    Designation VARCHAR(255) 
);

CREATE TABLE Entree 
(
    idEntree  SERIAL PRIMARY KEY NOT NULL,
    idEntana       INT,
    idFournisseur       INT,
    DateEntree timestamp default now(),
    prixE       INT,
    Quantite INT,
    foreign key (idFournisseur) references Fournisseur(idFournisseur),
    foreign key (idEntana) references Entana(idEntana) 
);

CREATE TABLE Sortie 
(
    idSortie  SERIAL PRIMARY KEY NOT NULL,
    idEntana       INT,
    idFournisseur       INT,
    DateSortie timestamp default now(),
    prixS       INT,
    Quantite INT,
    foreign key (idFournisseur) references Fournisseur(idFournisseur),
    foreign key (idEntana) references Entana(idEntana) 
);

CREATE TABLE StockFournisseur 
(
    idStockFournisseur        SERIAL PRIMARY KEY NOT NULL,
    idFournisseur       INT,
    idEntana INT,
    idEntree INT,
    Nombre       INT check(Nombre>=0),
    methode varchar(500),
    foreign key (idFournisseur) references Fournisseur(idFournisseur),
    foreign key (idEntana) references Entana(idEntana),
    foreign key (idEntree) references Entree(idEntree) 
);

-- INSERT INTO StockFournisseur VALUES(default,1,3,50,500);
-- INSERT INTO StockFournisseur VALUES(default,1,4,100,200);

---Donnee de test   
INSERT INTO Admin
(email, password)
VALUES
('admin@gmail.com', 'admin');

INSERT INTO Departement
(nomDept,email, password)
VALUES
('departement1','departement1@gmail.com', 'departement1'),
('departement2','departement2@gmail.com', 'departement2'),
('departement3','departement3@gmail.com', 'departement3');

INSERT INTO Typefournisseur(nomtypefournisseur) 
VALUES
('Informatique'),
('Sante'),
('Bureautique'),
('Vetement et chaussure');

INSERT INTO Fournisseur
(nomFournisseur,email, password,idtypefournisseur)
VALUES
('fournisseur1','fournisseur1@gmail.com', 'fournisseur1',1),
('fournisseur2','fournisseur2@gmail.com', 'fournisseur2',2),
('fournisseur3','fournisseur3@gmail.com', 'fournisseur3',1),
('fournisseur4','fournisseur4@gmail.com', 'fournisseur4',1),
('fournisseur5','fournisseur5@gmail.com', 'fournisseur5',3),
('fournisseur6','fournisseur6@gmail.com', 'fournisseur6',4),
('fournisseur7','fournisseur7@gmail.com', 'fournisseur7',2);

INSERT INTO Entana
(Designation)
VALUES
('Ordinateur Portable'),
('Gel'),
('Stylo'),
('Cache Bouche');

select distinct(v_manana.idDemandeEntreprise),v_manana.*,typefournisseur.* from proforma inner join v_manana on proforma.idfournisseur=v_manana.idfournisseur inner join typefournisseur on typefournisseur.idtypefournisseur=v_manana.idtypefournisseur;
---VIEW 
create or replace view v_manana as select demandeentreprise.*,fournisseur.idFournisseur,Fournisseur.nomFournisseur from fournisseur inner join demandeentreprise on fournisseur.idtypefournisseur=demandeentreprise.idtypefournisseur;
 CREATE OR REPLACE VIEW v_liststock as SELECT designation, nombre, prixe,stockfournisseur.idfournisseur,entree.DateEntree,stockfournisseur.methode,stockfournisseur.idStockFournisseur FROM StockFournisseur
        INNER JOIN Entana ON StockFournisseur.idEntana = Entana.idEntana
        INNER JOIN Entree ON StockFournisseur.idEntree = Entree.idEntree;
---obligatoire
--INSERT INTO Fournisseur (nomFournisseur,email, password) VALUES('fournisseur1','fournisseur1@gmail.com', 'fournisseur1');
    
INSERT INTO DemandeDept
(idDept, Designation, DatedeDemande, nombre,idtypefournisseur)
VALUES
(1,'Cache bouche','2022-10-11',30,2),
(2,'Cache bouche','2022-10-12',20,2),
(3,'Ram de Papier A4','2022-10-10',2,3),
(1,'Ram de Papier A4','2022-10-14',3,3);

INSERT INTO DemandeEntreprise
(idAdmin,Designation, Dates,idtypefournisseur ,Nombre,Etat)
VALUES
(1,'Cache Bouche', '12/11/2022',1,10,0);
INSERT INTO DemandeEntreprise
(idAdmin,Designation, Dates ,Nombre,Etat)
VALUES
(1,'Stylo', '12/11/2022',10,1,0);



INSERT INTO EntreeEntreprise
(idDemandeEntreprise,idFournisseur,Designation,nombre,Daterecu)
VALUES
(1,1,'Cache bouche',50,'2022-11-14'),
(2,1,'Ram de Papier A4',5,'2022-11-14');


INSERT INTO Commande(designation, nombre, idFournisseur, montant ) values
('Stylo',50,1,4000),
('Cache Bouche',50,1,50);




--INSERT INTO StockFournisseur
--(idFournisseur,Designation, Qualite,Prix,Nombre)
--VALUES
--(1,'Cache Bouche', 1,500,50),
--(1,'Cahier 100page GF', 1,50,50),
--(1,'Stylo', 1,300,50),
--(1,'Ram de Papier A4', 1,300,50),
--(2,'Cache Bouche', 1,700,50),
--(2,'Cahier 100page GF', 1,70,50),
--(2,'Stylo', 1,200,50),
--(2,'Ram de Papier A4', 1,400,50),
--(3,'Cache Bouche', 1,700,50),
--(3,'Cahier 100page GF', 1,70,50),
--(3,'Stylo', 1,200,50),
--(3,'Ram de Papier A4', 1,250,50),
--(3,'Clavier', 2,250,50)
--;
select*from ProformaFournisseur join proforma on proformafournisseur.idproforma=proforma.idproforma;

---view


insert into stockfournisseur(idfournisseur, identana, identree, nombre) VALUES
(1, 1, 1, 50);


-- create database hibernate;
-- \c hibernate
-- CREATE TABLE Emp 
-- (
--     idEmp SERIAL PRIMARY KEY NOT NULL,
--     nom VARCHAR(255) 
-- );

insert into StockDept(designation, nombre, dateRecu) VALUES
('Ordinateur Portable', 10,'2022-12-28'),
('Gel', 100,'2023-01-01'),
('Stylo', 10,'2022-12-28');

insert into livraison(designation, nombre, etat, idFournisseur,datelivraison,montant) VALUES
('Ordinateur Portable', 10, 1, 1,'2023-01-01',65000),
('Gel', 100, 1, 1,'2023-01-01',585),
('Stylo', 10, 1, 1,'2023-01-01',130);