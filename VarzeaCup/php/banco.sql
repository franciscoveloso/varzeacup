create table time(id integer primary key auto_increment, nome varchar(20) unique not null, vitorias integer not null, empates integer not null, derrotas
integer not null);
create view pontos as select 3*(vitorias)+empates+derrotas, id, nome, vitorias, empates, derrotas from time order by 3*(vitorias)+empates+derrotas desc;

