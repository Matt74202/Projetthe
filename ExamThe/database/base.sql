create table t_admin(
    id INT primary key auto_increment,
    nom VARCHAR(20),
    mdp VARCHAR(20)
);
create table t_the(
    id INT primary key auto_increment,
    nom VARCHAR(20),
    occupation DECIMAL,
    rendement DECIMAL
);
create table t_parcelle(
    numero INT primary key auto_increment,
    surface decimal,
    idThe INT references t_the(id)
);
create table t_cueilleurs(
    id INT primary key auto_increment,
    nom VARCHAR(20),
    genre VARCHAR(1),
    dtn DATE
);
create table t_depense(
    id INT primary key auto_increment,
    categ VARCHAR(20)
);
create table t_salaire(
    salaire decimal
);
create table t_user(
    id  INT primary key auto_increment,
    nom VARCHAR(20),
    mdp VARCHAR(20)
);
create table t_cueillette(
    id INT primary key auto_increment,
    date DATE,
    idCueilleur INT references t_cueilleurs(id), 
    idParcelle INT references t_parcelle(numero),
    poids decimal 
);
create table t_saisieDepense(
    id INT primary key auto_increment,
    date DATE,
    idDepense INT references t_depense(id)
);
create or replace  view view_parcelle_the p.id parcelle,t.rendement rendement as select 
from t_parcelle p 
join t_the t 
on p.idThe = t.id;  

insert into t_saisieDepense values(null,'2023-02-03',1,2);
insert into t_saisieDepense values(null,'2023-02-04',2,3);

SELECT * 
FROM t_saisieDepense
WHERE MONTH(date) = MONTH('2023-02-04')
AND DATE(date) != CURDATE()  
ORDER BY date ASC;

create table t_poids (
    minimal float, 
    bonus float,
    malus float
);

create table t_prix (
    prix decimal,
    idThe int references t_the(id)
);

create table t_paiement(
    id INT primary key auto_increment,
    date DATE,
    idCueilleur INT references t_cueilleurs(id),
    poids float,
    bonus float, 
    malus float,
    montant float
);

create table t_saison(
    id INT primary key auto_increment,
    idMois int
);
