create table tb_usuarios(
    id int PRIMARY KEY AUTO_INCREMENT,
    login varchar(32) not null,
    senha varchar(32) not null
);

create table tb_foto (
    id int PRIMARY KEY not null AUTO_INCREMENT,
    nome varchar(200) not null,
    diretorio varchar(200) not null,
    categoria varchar(50) not null
    destaque int not null default 0;
    );

insert into tb_usuarios(login,senha)values('admin',md5('123456'));