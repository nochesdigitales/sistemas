CREATE TABLE bitacora (
id int not null auto_increment,
clave varchar(100),
nombre varchar(10),
usuario varchar(40),
modificado datetime,
accion varchar(100),
modulo varchar(100), 
primary key(id)
) ENGINE = InnoDB;

CREATE TRIGGER trigger_alumno_del AFTER DELETE ON alumno FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.clave, OLD.nombre, CURRENT_USER(), NOW(), 'Borrado' , 'alumno');

CREATE TRIGGER trigger_alumno_ins AFTER INSERT ON alumno FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.clave, NEW.nombre, CURRENT_USER(), NOW(), 'Guardado' , 'alumno');

CREATE TRIGGER trigger_alumno_upd AFTER UPDATE ON alumno FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.clave, OLD.nombre, CURRENT_USER(), NOW(), 'Editado' , 'alumno');

CREATE TRIGGER trigger_cursos_del AFTER DELETE ON cursos FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idcurso, OLD.periodo, CURRENT_USER(), NOW(), 'Borrado' , 'cursos');

CREATE TRIGGER trigger_cursos_ins AFTER INSERT ON cursos FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.idcurso, NEW.periodo, CURRENT_USER(), NOW(), 'Guardado' , 'cursos');

CREATE TRIGGER trigger_cursos_upd AFTER UPDATE ON cursos FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idcurso, OLD.periodo, CURRENT_USER(), NOW(), 'Editado' , 'cursos');

CREATE TRIGGER trigger_empresa_del AFTER DELETE ON empresa FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.id, OLD.empresa, CURRENT_USER(), NOW(), 'Borrado' , 'empresa');

CREATE TRIGGER trigger_empresa_ins AFTER INSERT ON empresa FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.id, NEW.empresa, CURRENT_USER(), NOW(), 'Guardado' , 'empresa');

CREATE TRIGGER trigger_empresa_upd AFTER UPDATE ON empresa FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.id, OLD.empresa, CURRENT_USER(), NOW(), 'Editado' , 'empresa');

CREATE TRIGGER trigger_facilitador_del AFTER DELETE ON facilitador FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idfacilitador, OLD.nombrefac, CURRENT_USER(), NOW(), 'Borrado' , 'facilitador');

CREATE TRIGGER trigger_facilitador_ins AFTER INSERT ON facilitador FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.idfacilitador, NEW.nombrefac, CURRENT_USER(), NOW(), 'Guardado' , 'facilitador');

CREATE TRIGGER trigger_facilitador_upd AFTER UPDATE ON facilitador FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idfacilitador, OLD.nombrefac, CURRENT_USER(), NOW(), 'Editado' , 'facilitador');

CREATE TRIGGER trigger_inscripciones_del AFTER DELETE ON inscripciones FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idinsc, OLD.idcurso, CURRENT_USER(), NOW(), 'Borrado' , 'inscripciones');

CREATE TRIGGER trigger_inscripciones_ins AFTER INSERT ON inscripciones FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.idinsc, NEW.idcurso, CURRENT_USER(), NOW(), 'Guardado' , 'inscripciones');

CREATE TRIGGER trigger_inscripciones_upd AFTER UPDATE ON inscripciones FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idinsc, OLD.idcurso, CURRENT_USER(), NOW(), 'Editado' , 'inscripciones');

CREATE TRIGGER trigger_nota_del AFTER DELETE ON nota FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idnota, OLD.idcurso, CURRENT_USER(), NOW(), 'Borrado' , 'nota');

CREATE TRIGGER trigger_nota_ins AFTER INSERT ON nota FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.idnota, NEW.idcurso, CURRENT_USER(), NOW(), 'Guardado' , 'nota');

CREATE TRIGGER trigger_nota_upd AFTER UPDATE ON nota FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idnota, OLD.idcurso, CURRENT_USER(), NOW(), 'Editado' , 'nota');

CREATE TRIGGER trigger_operation_del AFTER DELETE ON operation FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.id, OLD.concept, CURRENT_USER(), NOW(), 'Borrado' , 'E/S');

CREATE TRIGGER trigger_operation_ins AFTER INSERT ON operation FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.id, NEW.concept, CURRENT_USER(), NOW(), 'Guardado' , 'E/S');

CREATE TRIGGER trigger_operation_upd AFTER UPDATE ON operation FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.id, OLD.concept, CURRENT_USER(), NOW(), 'Editado' , 'E/S');

CREATE TRIGGER trigger_usuarios_del AFTER DELETE ON usuarios FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.login_usuario, OLD.clave_usuario, CURRENT_USER(), NOW(), 'Borrado' , 'usuarios');

CREATE TRIGGER trigger_usuarios_ins AFTER INSERT ON usuarios FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.login_usuario, NEW.clave_usuario, CURRENT_USER(), NOW(), 'Guardado' , 'usuarios');

CREATE TRIGGER trigger_usuarios_upd AFTER UPDATE ON usuarios FOR EACH ROW
INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.login_usuario, OLD.clave_usuario, CURRENT_USER(), NOW(), 'Editado' , 'usuarios');