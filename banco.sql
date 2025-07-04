-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tb_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_usuarios` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `administrador` TINYINT(4) NOT NULL DEFAULT 0,
  `controlelogin` INT(11) NULL DEFAULT NULL,
  `gerenciapromo` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tb_pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_pedidos` (
  `idpedido` INT(11) NOT NULL AUTO_INCREMENT,
  `valor` DECIMAL(10,2) NOT NULL,
  `data` DATE NOT NULL,
  `avaliacao` INT(11) NOT NULL,
  `pagamento` VARCHAR(22) NOT NULL,
  `entrega` VARCHAR(20) NOT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT 0,
  `tb_cliente_idcliente` INT(11) NOT NULL,
  PRIMARY KEY (`idpedido`, `entrega`),
  INDEX `fk_tb_pedido_tb_cliente1_idx` (`tb_cliente_idcliente` ASC) VISIBLE,
  CONSTRAINT `fk_tb_pedido_tb_cliente1`
    FOREIGN KEY (`tb_cliente_idcliente`)
    REFERENCES `mydb`.`tb_usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tb_promocaos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_promocaos` (
  `idpromocao` INT(11) NOT NULL AUTO_INCREMENT,
  `produto` VARCHAR(20) NOT NULL,
  `datainicio` DATE NOT NULL,
  `datafinal` DATE NOT NULL,
  `valor` INT(11) NOT NULL,
  PRIMARY KEY (`idpromocao`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tb_categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_categorias` (
  `idcategoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tb_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_produtos` (
  `idprodutos` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(20) NOT NULL,
  `preco_venda` VARCHAR(45) NOT NULL,
  `lucro` VARCHAR(45) NOT NULL,
  `tb_promocao_idpromocao` INT(11) NOT NULL,
  `tbcategoria_idcategoria` INT(11) NOT NULL,
  PRIMARY KEY (`idprodutos`),
  INDEX `fk_tb_produtos_tb_promocao1_idx` (`tb_promocao_idpromocao` ASC) VISIBLE,
  INDEX `fk_tb_produtos_tbcategoria1_idx` (`tbcategoria_idcategoria` ASC) VISIBLE,
  CONSTRAINT `fk_tb_produtos_tb_promocao1`
    FOREIGN KEY (`tb_promocao_idpromocao`)
    REFERENCES `mydb`.`tb_promocaos` (`idpromocao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_produtos_tbcategoria1`
    FOREIGN KEY (`tbcategoria_idcategoria`)
    REFERENCES `mydb`.`tb_categorias` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tb_item_pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_item_pedidos` (
  `iditem_pedido` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(20) NOT NULL,
  `quantidade` DECIMAL(10,2) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `tb_pedido_idpedido` INT(11) NOT NULL,
  `tb_produtos_idtb_produtos` INT(11) NOT NULL,
  PRIMARY KEY (`iditem_pedido`, `quantidade`, `preco`),
  INDEX `fk_item_pedido_tb_pedido_idx` (`tb_pedido_idpedido` ASC) VISIBLE,
  INDEX `fk_item_pedido_tb_produtos1_idx` (`tb_produtos_idtb_produtos` ASC) VISIBLE,
  CONSTRAINT `fk_item_pedido_tb_pedido`
    FOREIGN KEY (`tb_pedido_idpedido`)
    REFERENCES `mydb`.`tb_pedidos` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_pedido_tb_produtos1`
    FOREIGN KEY (`tb_produtos_idtb_produtos`)
    REFERENCES `mydb`.`tb_produtos` (`idprodutos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tb_comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_comentarios` (
  `idcomentario` INT(11) NOT NULL AUTO_INCREMENT,
  `comentario` VARCHAR(45) NOT NULL,
  `tb_usuario_idusuario` INT(11) NOT NULL,
  PRIMARY KEY (`idcomentario`),
  INDEX `fk_tb_comentario_tb_usuario1_idx` (`tb_usuario_idusuario` ASC) VISIBLE,
  CONSTRAINT `fk_tb_comentario_tb_usuario1`
    FOREIGN KEY (`tb_usuario_idusuario`)
    REFERENCES `mydb`.`tb_usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tb_estoques`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tb_estoques` (
  `idestoque` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(20) NOT NULL,
  `data` DATE NOT NULL,
  `quantidade` DECIMAL(10,2) NOT NULL,
  `tb_produtos_idprodutos` INT(11) NOT NULL,
  PRIMARY KEY (`idestoque`),
  INDEX `fk_tb_estoque_tb_produtos1_idx` (`tb_produtos_idprodutos` ASC) VISIBLE,
  CONSTRAINT `fk_tb_estoque_tb_produtos1`
    FOREIGN KEY (`tb_produtos_idprodutos`)
    REFERENCES `mydb`.`tb_produtos` (`idprodutos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
