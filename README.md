# Proyecto de Gestión de Criaturas - Roleplay

Se distingue de dos tipos de usuarios, un usuario invitado que podra ver una lista con todas las criaturas, y de un usuario identificado, que ademas de poder ver las criaturas, podra añadir, editar o borrar a través de formularios


## Arquitectura
### 1. **Modelo-Vista-Controlador (MVC)**
La aplicación está estructurada siguiendo el patrón arquitectónico **Modelo-Vista-Controlador (MVC)**. Este patrón ayuda a separar las tareas de la aplicación web y facilita la escalabilidad y el mantenimiento de la aplicación.
- **Modelo (Model):** Define las clases y objetos que representan los datos, como la clase `Criatura`, que encapsula los atributos de las criaturas (nombre, descripción, poder de ataque, vida, etc.).
- **Vista (View):** Contiene las plantillas HTML que se presentan al usuario, como los formularios y las páginas de visualización de criaturas.
- **Controlador (Controller):** Gestiona las interacciones entre el modelo y la vista. Por ejemplo, el `CriaturaController` se encarga de manejar las peticiones HTTP relacionadas con las criaturas (crear, editar, eliminar, etc.) realizar la conexión con la capa de persistance.

### 2. **Capa de Persistencia (DAO)**

La capa de persistencia está basada en el patrón **DAO (Data Access Object)**, que abstrae la interacción con la base de datos. Los objetos `DAO` (como `CriaturaDAO`) se encargan de realizar las operaciones sobre la base de datos.

### 3. **Sesiones y Seguridad**

La gestión de sesiones es manejada por la clase `SessionUtils`, que asegura que solo los usuarios autenticados puedan acceder a las funcionalidades privadas, como la creación, edición y eliminación de criaturas. El login es validado con un conjunto de credenciales básicas (`test` / `1234`).

## Estructura del Proyecto

- `index.html`               
- `app/` 
	- `controllers/`
		- `CriaturaController.php`
		- `loginController.php`
	- `models/`
		- `Criatura.php`
	- `views/`
		- `private/`
			- `crearCriatura.php`
			- `detalles.php`
			- `editar.php`
			- `index.php`
		- `public/`
			- `index.php`
			- `login.php`
		- `templates/`
			- `formularioDatos.php`
			- `header.php`
-  `persistance/`
	- `CONF/`
		- `PersistentManager.php`
		- `credentials.json`
	- `DAO/`
		- `CriaturaDao.php`
-  `utils/`
	-   `SessionUtils.php`
-  `assets/`

### 4. **Base de Datos**
La base de datos almacena información sobre las criaturas, y se usa una tabla `criaturas` con las siguientes columnas:
- `idCreature` 
- `name` 
- `description` 
- `avatar`
- `attackPower` 
- `lifeLevel`
- `weapon`
