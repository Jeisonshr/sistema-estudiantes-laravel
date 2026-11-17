# Registro de pruebas

**Proyecto:** Sistema de Gestión de Estudiantes  
**Framework:** Laravel 10.50.4  
**Base de datos:** MySQL

## 1. Objetivo

Registrar las pruebas realizadas al sistema para comprobar que sus funcionalidades principales trabajan correctamente, incluyendo el registro, consulta, edición, eliminación y control de acceso.

## 2. Casos de prueba

| Caso | Resultado esperado | Resultado obtenido | Estado |
|---|---|---|---|
| Registro válido | Se guarda el estudiante en la base de datos. | Pendiente de documentar. | Pendiente |
| Correo duplicado | El sistema rechaza el registro y evita duplicados. | Pendiente de documentar. | Pendiente |
| Edad de 15 años | El sistema rechaza el registro por no cumplir la edad mínima. | Se mostró el mensaje de validación y no permitió continuar. | Correcto |
| Programa inventado | El sistema rechaza un programa que no pertenece al catálogo. | Pendiente de documentar. | Pendiente |
| Edición conservando el propio correo | Actualiza los datos sin generar un conflicto con el correo del mismo estudiante. | Pendiente de documentar. | Pendiente |
| ID inexistente | El sistema no modifica otros registros ni crea uno nuevo. | Pendiente de documentar. | Pendiente |
| Búsqueda sin coincidencias | Muestra un resultado vacío de manera comprensible. | Pendiente de documentar. | Pendiente |
| Cancelar eliminación | El estudiante permanece registrado. | Se canceló la eliminación y el registro permaneció. | Correcto |
| Confirmar eliminación | Elimina únicamente el estudiante seleccionado. | Se confirmó la eliminación y se mostró el mensaje correspondiente. | Correcto |
| Acceso sin sesión | Redirige al usuario al inicio de sesión. | Al ingresar directamente a la ruta protegida, el sistema redirigió al login. | Correcto |
| Persistencia en MySQL | Los registros permanecen almacenados al volver a abrir la aplicación. | Pendiente de documentar. | Pendiente |

## 3. Observaciones

Durante las comprobaciones se verificó el funcionamiento de la protección de rutas, la validación de edad y el proceso de eliminación de estudiantes.

También se identificó que Laravel conserva los datos ingresados en el formulario cuando ocurre un error de validación, facilitando la corrección de la información.

Los casos que aparecen como pendientes deberán comprobarse antes de marcarse como satisfactorios.

## 4. Conclusión

Las pruebas realizadas permitieron comprobar algunas de las funcionalidades principales del sistema de gestión de estudiantes. Se verificó el control de acceso, la validación de edad y el proceso de eliminación con confirmación.

Se deben completar los casos pendientes para contar con un registro de pruebas integral y respaldar el funcionamiento de la aplicación durante la presentación del proyecto.