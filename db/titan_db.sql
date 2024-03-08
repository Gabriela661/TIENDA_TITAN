/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : titan_db

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 08/03/2024 11:49:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for carrito
-- ----------------------------
DROP TABLE IF EXISTS `carrito`;
CREATE TABLE `carrito`  (
  `id_carrito` int NOT NULL AUTO_INCREMENT,
  `cantidad_carrito` int NOT NULL,
  `id_producto` int NOT NULL,
  `id_usuario` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_carrito`) USING BTREE,
  INDEX `id_producto`(`id_producto` ASC) USING BTREE,
  INDEX `carrito_ibfk_2`(`id_usuario` ASC) USING BTREE,
  CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carrito
-- ----------------------------

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES (1, 'Tubos', '2024-03-08 09:26:39', '2024-03-08 09:26:39');
INSERT INTO `categoria` VALUES (2, 'Fierros', '2024-03-08 09:26:39', '2024-03-08 09:26:39');
INSERT INTO `categoria` VALUES (3, 'Drywall', '2024-03-08 09:26:39', '2024-03-08 09:27:50');

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contacto_cliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `correo_cliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `apellido_cliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cliente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (3, 'Juan', '+1 555-1234', 'juanperez@example.com', 'Pérez', '2024-03-08 09:24:50', '2024-03-08 09:24:50');

-- ----------------------------
-- Table structure for detalle_venta
-- ----------------------------
DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE `detalle_venta`  (
  `id_detalle_venta` int NOT NULL AUTO_INCREMENT,
  `id_venta` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` float NOT NULL,
  `precio_unidad` float NOT NULL,
  `sub_total` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detalle_venta`) USING BTREE,
  INDEX `id_factura`(`id_venta` ASC) USING BTREE,
  INDEX `id_producto`(`id_producto` ASC) USING BTREE,
  CONSTRAINT `fk_detalle_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_detalles_venta` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle_venta
-- ----------------------------

-- ----------------------------
-- Table structure for favorito_producto
-- ----------------------------
DROP TABLE IF EXISTS `favorito_producto`;
CREATE TABLE `favorito_producto`  (
  `id_favorito_producto` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `id_usuario` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_favorito_producto`) USING BTREE,
  INDEX `id_producto`(`id_producto` ASC) USING BTREE,
  INDEX `favorito_ibfk_2`(`id_usuario` ASC) USING BTREE,
  CONSTRAINT `favorito_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `favorito_producto_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of favorito_producto
-- ----------------------------

-- ----------------------------
-- Table structure for imagen
-- ----------------------------
DROP TABLE IF EXISTS `imagen`;
CREATE TABLE `imagen`  (
  `id_imagen` int NOT NULL AUTO_INCREMENT,
  `url_imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_producto` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_imagen` DESC) USING BTREE,
  INDEX `fk_imagen_producto`(`id_producto` ASC) USING BTREE,
  CONSTRAINT `fk_imagen_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of imagen
-- ----------------------------
INSERT INTO `imagen` VALUES (6, 'fimg1_2.jpg', 1, '2024-03-08 10:05:11', '2024-03-08 10:05:11');
INSERT INTO `imagen` VALUES (5, 'fimg1_3.jpg', 1, '2024-03-08 10:05:11', '2024-03-08 10:05:11');
INSERT INTO `imagen` VALUES (4, 'timg2_1.jpg', 2, '2024-03-08 10:05:11', '2024-03-08 10:05:11');
INSERT INTO `imagen` VALUES (3, 'timg3_1.jpg', 3, '2024-03-08 10:05:11', '2024-03-08 10:05:11');
INSERT INTO `imagen` VALUES (2, 'dwimg4_1.jpg', 4, '2024-03-08 10:05:11', '2024-03-08 10:05:11');
INSERT INTO `imagen` VALUES (1, 'fimg1.jpg', 1, '2024-03-08 10:05:11', '2024-03-08 10:05:41');

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `codigo_producto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre_producto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descripcion_producto` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `marca_producto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stock_producto` int NOT NULL,
  `precio_producto` float NOT NULL,
  `id_unidad_medida` int NOT NULL,
  `id_categoria` int NOT NULL,
  `descuento` float NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_producto` DESC) USING BTREE,
  INDEX `id_unidad`(`id_unidad_medida` ASC) USING BTREE,
  INDEX `id_categoria`(`id_categoria` ASC) USING BTREE,
  INDEX `id_descuento`(`descuento` ASC) USING BTREE,
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_producto_unidad` FOREIGN KEY (`id_unidad_medida`) REFERENCES `unidad_medida` (`id_unidad_medida`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES (4, 'T00001', 'Tubo Liviano PVC 4p SP | Desague', 'Ideal para conexiones de agua o desagüe', 'Matusita', 100, 28.69, 1, 1, 0, '2024-03-08 10:00:40', '2024-03-08 11:41:53');
INSERT INTO `producto` VALUES (3, 'DWALL1', 'Multiplaca 1.22 m x 2.44 m x 4 mm', 'Fibrocemento. Garantía 1 año. Ideal para interiores', 'Eternit', 2, 32, 1, 3, 0, '2024-03-08 10:01:53', '2024-03-08 11:41:55');
INSERT INTO `producto` VALUES (2, 'F00002', 'Barras de Acero 6 mm', 'Barra de construcción ASTM A615 Grado 60. Barras de acero rectas de sección circular, con resaltes Hi-bond de alta adherencia con el concreto. Norma NTP 341.031 Grado 60', 'Aceros Arequipa', 5, 9.32, 1, 2, 0, '2024-03-08 10:01:53', '2024-03-08 11:41:56');
INSERT INTO `producto` VALUES (1, 'F00001', 'Barras de Acero 1/2', 'Estas son barras de construcción ASTM A615 con Grado 60, rectas de sección circular, con resaltes Hi-bond de alta adherencia con el concreto. Cumplen con la Norma NTP 341.031 Grado 60.\r\n\r\nEs ideal para la construcción de edificaciones de concreto armado de todo tipo: Viviendas, edificios, puentes, obras industriales, etc.\r\n\r\nSon barras de acero con una excelente calidad, por lo que tus construcciones serán más fijas y resistentes. No lo pienses más y compra aquí en Sodimac.', 'Aceros Arequipa', 20, 41.39, 1, 2, 0, '2024-03-08 10:01:53', '2024-03-08 11:42:00');

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'administrador', '2024-03-08 10:09:28', '2024-03-08 10:09:28');
INSERT INTO `rol` VALUES (2, 'vendedor', '2024-03-08 10:09:28', '2024-03-08 10:09:28');
INSERT INTO `rol` VALUES (3, 'cliente', '2024-03-08 10:09:28', '2024-03-08 10:09:28');

-- ----------------------------
-- Table structure for tipo_pago
-- ----------------------------
DROP TABLE IF EXISTS `tipo_pago`;
CREATE TABLE `tipo_pago`  (
  `id_tipo_pago` int NOT NULL AUTO_INCREMENT,
  `nombre_tipo_pago` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipo_pago`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_pago
-- ----------------------------
INSERT INTO `tipo_pago` VALUES (1, 'efectivo', '2024-03-08 10:17:50', '2024-03-08 10:17:50');
INSERT INTO `tipo_pago` VALUES (2, 'yape', '2024-03-08 10:17:59', '2024-03-08 10:17:59');

-- ----------------------------
-- Table structure for unidad_medida
-- ----------------------------
DROP TABLE IF EXISTS `unidad_medida`;
CREATE TABLE `unidad_medida`  (
  `id_unidad_medida` int NOT NULL AUTO_INCREMENT,
  `nombre_unidad_medida` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_unidad_medida`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unidad_medida
-- ----------------------------
INSERT INTO `unidad_medida` VALUES (1, 'unidad', '2024-03-08 10:10:25', '2024-03-08 10:10:25');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellido_usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `correo_usuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_rol` int NOT NULL,
  `foto_usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.png',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  INDEX `id_rol`(`id_rol` ASC) USING BTREE,
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'online', 'cliente', 'sistema_online_titan@gmail.com', 'online', 2, 'default.png', '2024-03-08 09:18:52', '2024-03-08 09:45:18');
INSERT INTO `usuario` VALUES (2, 'admin', 'sistema', 'adminTitan4212@gmail.com', 'adminpass', 1, 'default.png', '2024-03-08 09:18:52', '2024-03-08 09:45:22');
INSERT INTO `usuario` VALUES (3, 'Juan', 'Perez', '0000001@gmail.com', '0000001', 3, 'default.png', '2024-03-08 09:18:52', '2024-03-08 09:48:15');

-- ----------------------------
-- Table structure for venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta`  (
  `id_venta` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `id_tipo_pago` int NOT NULL,
  `total_venta` float NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url_factura` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_venta`) USING BTREE,
  INDEX `id_cliente`(`id_cliente` ASC) USING BTREE,
  INDEX `id_usuario`(`id_usuario` ASC) USING BTREE,
  INDEX `id_tipo_pago`(`id_tipo_pago` ASC) USING BTREE,
  CONSTRAINT `fk_factura_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_factura_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_tipo_pago`) REFERENCES `tipo_pago` (`id_tipo_pago`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of venta
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
