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
create table if not exists `homers_confeitaria`.`Compra` (
    `idCompra` int not null auto_increment,
    `idProduto` int not null,
    `idUsuario` int not null,
    primary key(`idCompra`),
    foreign key(`idProduto`)
    references `homers_confeitaria`.`Produto` (`idProduto`),
    foreign key(`idUsuario`)
    references `homers_confeitaria`.`Usuario` (`idUsuario`)
);
