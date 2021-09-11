create table tb_usuarios(
    id int PRIMARY KEY AUTO_INCREMENT,
    login varchar(32) not null,
    senha varchar(32) not null
);

insert into tb_usuarios(login,senha)values('admin',md5('123456'));