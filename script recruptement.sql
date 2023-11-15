create database recrutement;
\c recrutement;
create table entreprise (
    id varchar(50) primary key,
    nom  varchar(50) not null,
    siege varchar(50) not null,
    email varchar(50) not null,
    contact int not null
);

insert into entreprise values ('ENT001','huhu agency','andoharanofotsy','huhu@gmail.com',123456);

create table poste (
    id serial primary key,
    nom varchar(50) not null,
    minsalaire float default 0,
    maxsalaire float default 0
);

create table contrat(
    id serial primary key,
    nom varchar(50) not null
);

insert into contrat values(default,'CDI');
insert into contrat values(default,'CDD');

create table service (
    id serial primary key,
    identreprise varchar(50) references entreprise(id),
    idposte int references poste(id),
    idcontrat int references contrat(id),
    jourhomme float not null,
    volumehoraire float not null,
    description varchar(200),
    date timestamp
);

create table sexe(
    id serial primary key,
    nom varchar(50) not null
);

create table candidat (
    id serial primary key,
    idservice int references service(id),
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(50) not null,
    genre int references sexe(id),
    date_naissance timestamp not null,
    contact int not null,
    situation_matrimoniale varchar(50) not null
);

create table challenge (
    idservice int references service(id),
    description varchar(100) not null
);

create table criteres (
    id serial primary key,
    idservice int references service(id),
    nom varchar(100)
);

create table detail_critere (
    idcritere int references criteres(id),
    detail  varchar (100) not null,
    coefficient int
);

create table comptences_candidat(
    id serial primary key,
    idcandidat  int references candidat(id),
    nom varchar(100) not null,
    detail varchar(100)
);

create table photo (
    idcandidat  int references candidat(id),
    nom varchar(50)
);

create table question (
    id serial primary key,
    idservice int references service(id),
    fanontaniana varchar(100) not null,
    coefficient int not null
);

create table reponse (
    id serial primary key,
    idquestion int references question(id),
    valiny varchar(100) not null,
    vrai int default 0 not null
);

create table reponse_candidat (
    idcandidat int references candidat(id),
    idquestion int references question(id),
    idreponse int references reponse(id)

);

create table resultat_test (
    idservice int references service(id),
    idcandidat int references candidat(id),
    note float not null
);

create table calendrier (
    idservice int references service(id),
    idcandidat int references candidat(id),
    date timestamp not null
);

create table final_service(
    idservice int references service(id),
    date timestamp
);


create view annonce as
select s.id as idservice,p.id as idposte,p.nom as poste, s.description,
s.date as datelimite,e.nom,s.idcontrat
from service as s join poste as p on s.idposte = p.id
join entreprise as e on s.identreprise = e.id;

create view detail_annonce as
select a.idservice,a.idposte,a.poste,a.description,a.datelimite,a.nom,a.idcontrat,c.nom as contrat
from annonce as a join contrat as c on a.idcontrat=c.id;

INSERT INTO sexe (id,nom )
VALUES
  (1,'Homme'),
  (2,'Femme');

--   //new scripte

create table employe(
    matricule_id varchar(20) primary key,
    nom varchar(100) not null,
    prenom varchar(100) not null,
    date_naissance date not null,
    email varchar(100) not null,
    contact varchar(100) not null,
    adresse varchar(100) not null
);

create table categories(
    id serial primary key,
    categorie varchar(100) not null,
    salary_min double precision not null,
    indice integer not null
);

insert into categories(categorie, salary_min, indice) values('M1 - 1A', 168019, 1340);
insert into categories(categorie, salary_min, indice) values('M2 - 1B', 168645, 1345);
insert into categories(categorie, salary_min, indice) values('OS1 - 2A', 169900, 1355);
insert into categories(categorie, salary_min, indice) values('OS2 - 2B', 174914, 1395);
insert into categories(categorie, salary_min, indice) values('OS3 - 3A', 185572, 1480);
insert into categories(categorie, salary_min, indice) values('OP1A - 3B', 198111, 1580);
insert into categories(categorie, salary_min, indice) values('OP1B - 4A', 210650, 1680);
insert into categories(categorie, salary_min, indice) values('OP2A - 4B', 230713, 1840);
insert into categories(categorie, salary_min, indice) values('OP2B - 5A', 265821, 2120);
insert into categories(categorie, salary_min, indice) values('OP3 - 5B', 310333, 2475);



create table info_employe(
    id serial primary key,
    employe_id varchar(20) references employe(matricule_id),
    date_embauche date not null,
    date_fin date,
    idposte int references poste(id),
    salaire integer not null,
    categorie_id integer references categories(id)
);


create view employes as
select employe.matricule_id as id, nom, prenom, date_naissance, ie.date_embauche, ie.date_fin, ie.salaire , email, contact, adresse
from employe join info_employe ie on employe.matricule_id = ie.employe_id;


create table profil_employe(
    idposte int references poste(id),
    profil varchar(50) not null
);

create table user_employe(
    id serial primary key,
    employe_id varchar(20) references employe(matricule_id),
    email varchar(100) not null,
    mdp varchar(50) not null
);

create table motif(
    id serial primary key,
    motif varchar(255) not null,
    duree double precision not null
);

insert into motif(motif, duree) values('Maternite', 90);
insert into motif(motif, duree) values('Paternite', 30);
insert into motif(motif, duree) values('Repos medical', 3);
insert into motif(motif, duree) values('Evenement specifique', 10);
insert into motif(motif, duree) values('Non defini', 1);

create table conge(
    id serial primary key,
    employe_id varchar(20) references employe(matricule_id),
    date_debut timestamp not null,
    motif_id integer not null references motif(id)
);

create table fin_conge(
                          id serial primary key,
                          conge_id integer references conge(id),
                          date_fin timestamp not null,
                          reste_conge double precision not null,
                          reste double precision not null
);

create table conge_specifique(
    id serial primary key,
    employe_id varchar(20) references employe(matricule_id),
    motif_id integer not null references motif(id),
    reste_conge double precision not null
);

create table demande_conge(
                              id serial primary key,
                              employe_id varchar(20) references employe(matricule_id),
                              motif_id integer not null references motif(id),
                              date_debut timestamp not null,
                              date_fin timestamp not null
);

create table resultat_demande_conge(
                                       id serial primary key,
                                       demande_id integer references demande_conge(id),
                                       resultat smallint default 0 not null
);

create view employe_conge as
select employe.matricule_id as id,
       employe.nom as nom,
       employe.prenom as prenom,
       employe.date_naissance as date_naissance,
       info_employe.date_embauche as date_embauche,
       info_employe.date_fin as date_fin_employe,
       info_employe.idposte as poste,
       info_employe.salaire as salaire,
       conge.date_debut as date_debut,
       motif.motif as motif,
       fin_conge.date_fin as date_fin_conge,
       fin_conge.reste_conge as reste_conge,
       fin_conge.reste as reste
from employe
         inner join info_employe on employe.matricule_id = info_employe.employe_id
         inner join conge on employe.matricule_id = conge.employe_id
         inner join motif on conge.motif_id = motif.id
         inner join fin_conge on conge.id = fin_conge.conge_id
where info_employe.date_fin is null group by employe.matricule_id, info_employe.date_embauche, info_employe.date_fin, info_employe.idposte, salaire, date_debut,fin_conge.date_fin, motif, reste_conge, reste, conge.id;





-- //maj tafitasoa //

create table contrat_essaie(
    id serial primary key,
    idcandidat int references candidat(id),
    idservice int references service(id),
    date timestamp,
    dateDebut timestamp,
    dateFin timestamp,
    endmnite int
);

create table fiche_evaluation(
    id serial primary key,
    description varchar(500),
    primes float,
    remarque_sup varchar(300)
);

create table contrat_embauche(
    id serial primary key,
    idcandidat int references candidat(id),
    idservice int references service(id),
    salaire_base double precision,
    date timestamp,
    idevaluation int references fiche_evaluation(id)
);


create table avantage(
    idembauche int references contrat_embauche(id),
    description varchar(300),
    detail varchar(100)
);

create table cnaps(
    matricule varchar(50) primary key,
    employe_id varchar(20) references employe(matricule_id),
    argent float
);

create table heure_sup(
    employe_id varchar(20) references employe(matricule_id),
    nbrHeure float,
    date timestamp not null,
    etat int default 0
);

-- 0 de heure ampina de 1 absence

//formation

create table formation(
    id serial primary key,
    theme varchar(100) not null,
    date_debut date,
    date_fin date,
    intervenant varchar (50),
    lieu varchar(50),
    heure_debut time,
    heure_fin time
);

create table formation_employe(
    id serial primary key,
    id_formation int references formation(id),
    matricule_id varchar(50) references employe(matricule_id)
);

