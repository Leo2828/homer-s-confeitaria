create database if not exists `homers_confeitaria`;
use `homers_confeitaria`;
create table if not exists `homers_confeitaria`.`Usuario` (
    `idUsuario` int not null auto_increment,
    `nomeUsuario` varchar(50) not null,
    `senhaUsuario` varchar(50) not null,
    `emailUsuario` varchar(100) not null,
    `Chef` bool not null,
    primary key(`idUsuario`)
);
create table if not exists `homers_confeitaria`.`Produto` (
    `idProduto` int not null auto_increment,
    `nomeProd` varchar(50) not null,
    `descricaoProd` varchar(200) not null,
    `preco` decimal(8,2) not null,
    `idUsuario` int not null,
    `estoque` int not null,
    primary key(`idProduto`),
	foreign key(`idUsuario`)
	references `homers_confeitaria`.`Usuario` (`idUsuario`)
);
create table if not exists `homers_confeitaria`.`Imagem` (
    `idImg` int not null auto_increment,
    `nomeImg` varchar(50) not null,
    `link` varchar(200) not null,
    `idProduto` int not null,
    primary key(`idImg`),
    foreign key(`idProduto`)
    references `homers_confeitaria`.`Produto` (`idProduto`)
);
create table if not exists `homers_confeitaria`.`Avaliacao` (
    `idAvaliacao` int not null auto_increment,
    `comentario` varchar(200) not null,
    `idUsuario` int not null,
    `idProduto` int not null,
    primary key(`idAvaliacao`),   
    foreign key(`idUsuario`)
    references `homers_confeitaria`.`Usuario` (`idUsuario`),
    foreign key(`idProduto`)
    references `homers_confeitaria`.`Produto` (`idProduto`)
);
create table if not exists `homers_confeitaria`.`Resposta` (
    `idResposta` int not null auto_increment,
    `resposta` varchar(200) not null,
    `idAvaliacao` int not null,
    `idUsuario` int not null,
    primary key(`idResposta`),
    foreign key(`idUsuario`)
    references `homers_confeitaria`.`Usuario` (`idUsuario`),
    foreign key(`idAvaliacao`)
    references `homers_confeitaria`.`Avaliacao` (`idAvaliacao`)
);
create table if not exists `homers_confeitaria`.`Carrinho` (
    `idCompra` int not null auto_increment,
    `idProduto` int not null,
    `idUsuario` int not null,
    primary key(`idCompra`),
    foreign key(`idProduto`)
    references `homers_confeitaria`.`Produto` (`idProduto`),
    foreign key(`idUsuario`)
    references `homers_confeitaria`.`Usuario` (`idUsuario`)
);
 
insert into Usuario  (`nomeUsuario`,`senhaUsuario`,`emailUsuario`,`chef`) values ('Admin','12345678910','admin1@gmail.com','1');


insert into Produto(`nomeProd`,`descricaoProd`,`preco`, `idUsuario`)  values ('Bolo de Morango', 'Bolo de Leite Ninho e Morango', '23.99', '1');
insert into Produto(`nomeProd`,`descricaoProd`,`preco`, `idUsuario`)  values ('Croissant', 'Croissant doce', '6.99', '1');
insert into Produto(`nomeProd`,`descricaoProd`,`preco`, `idUsuario`)  values ('Cupcake', 'Cupcake de chocolate e âvela', '5.50', '1');
insert into Produto(`nomeProd`,`descricaoProd`,`preco`, `idUsuario`)  values ('Rosquinhas', 'Rosquinha com cobertura de morango e recheio de creme', '7.50', '1');
insert into Produto(`nomeProd`,`descricaoProd`,`preco`, `idUsuario`)  values ('Carolina', 'Carolina de nutela', '1.50', '1');
insert into Produto(`nomeProd`,`descricaoProd`,`preco`, `idUsuario`)  values ('Torta de Morango', 'Torta de Morango e Creme', '8.50', '1');
insert into Produto(`nomeProd`,`descricaoProd`,`preco`, `idUsuario`)  values ('Torta de Limão', 'Torta de limão e creme', '8.50', '1');
insert into Produto(`nomeProd`,`descricaoProd`,`preco`, `idUsuario`)  values ('Bolo de Cenoura', 'Bolo de Cenoura com Cobertura de Chocolate', '23.99', '1');
