<br/>
<p align="center">
  <a href="https://www.macamedia.com.ar/">
    <img src="https://www.macamedia.com.ar/assets/isologo_blanco-21b619e1.png" alt="Logo Macamedia" width="200" )/>
  </a>

  <h3 align="center">Macamedia Challenge</h3>
  <h4 align="center">Sistema para administrar la información de los estudiantes en una universidad.</h4>

  <p align="center">
    <a href="https://macachallenge-production.up.railway.app/admin">View Demo</a>
  </p>
</p>


## Tabla de contenidos

* [Sobre el Proyecto](#sobre-el-proyecto)
  - [Desafío](#desafío)
  - [Diagramas MER-MR](#diagramas-mer.mr)
  - [Screenshots](#screenshots)  
* [Stack](#stack)
* [Empezando](#empezando)
  * [Probar localmente](#probar-localmente)
* [Autores](#autores)

## Sobre el Proyecto

Proyecto realizado como resolucion del *challange* propuesto por **Macamedia**, utilizando _laravel y FilamentPhp_
El proyecto se trata de un panel administrativo de una universidad el cual puede gestionar carreras, materias, alumnos y las inscripciones tanto a carreras como a materias.

<br/>
<br/>

### Desafío

"Desarrollar un sistema para administrar la información de los estudiantes en una universidad. Dado que la universidad no dispone actualmente de un sistema de gestión, se busca crear uno que posibilite registrar estudiantes, carreras, materias y usuarios. Este sistema permitirá vincular a los estudiantes con una carrera específica y llevar un registro histórico de su progreso académico."
<br/>
<br/>
El sistema deberá permitir:
<br/>

1. Realizar ABM (alta,baja y modificación) de :
   1. Alumnos con los siguientes datos: nombre , apellido , DNI, carrera ,teléfono, número de legajo y estado(activo/inactivo).
   2. Usuarios con los siguientes datos: nombre, correo y contraseña.
   3. Carreras con los siguientes datos: nombre, duración(años).
   4. Materias con los siguientes datos: nombre, carrera a la que pertenece, duración (cuatrimestral o anual), horas de cursado.
      
2.  Realizar la búsqueda de alumnos por nombre, DNI y número de legajo.
3.  Realizar el filtrado de alumnos según su estado. Estos son: activo o inactivo.
4.  Realizar un ordenamiento por nombre alfabéticamente y número de legajo en orden ascendente o descendente de los alumnos.
5.  Realizar el registro del estado de los alumnos según la materia. Para esto el usuario deberá ingresar el alumno, la materia, el estado (aprobado,desaprobado,regular o libre) y la fecha.
6.  Visualizar a cada alumno y ver sus registros históricos. Además deberá permitir filtrar estos registros por materias y estados.
7.  Descargar un listado de todos los alumnos.

<br/>
<br/>

### Diagramas MER-MR

<p>MER</p>

![image](https://github.com/niicodeer/macachallenge/assets/97641886/6e9fcb86-9ace-48d8-a71a-171bc0c0e861)


<p>MR</p>

![image](https://github.com/niicodeer/macachallenge/assets/97641886/d980906b-537a-4f6e-a631-251f0f83752a)

<br/>
<br/>

### Screenshots

![image](https://github.com/niicodeer/macachallenge/assets/97641886/2fe353e9-f6b4-4ec9-8686-4f5d83706711)

![image](https://github.com/niicodeer/macachallenge/assets/97641886/552a8758-ee0a-40c7-9368-e4498ae92c93)

![image](https://github.com/niicodeer/macachallenge/assets/97641886/a124add5-fa47-44d2-bb3a-b91eefd1b622)

![image](https://github.com/niicodeer/macachallenge/assets/97641886/73e02710-ad65-4686-a5cc-354e0935dcce)



<br/>

## Stack

<br/>

![Shields](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) ![Shields](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white) ![Shields](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)  


<br/>

## Empezando

### Probar localmente

Requisitos previos:
- Tener Xampp o Laragon installado, junto con PHP 8, Laravel y PhpMyAdmin / HeidiSql / Sql Workbench.

<br/>

Puedes correr el repositorio localmente siguiendo los siguientes pasos

1. Clone the repo

```sh
git clone https://github.com/niicodeer/macachallenge.git
```
2. Access to project's folder

```sh
cd macachallenge
```

3. Generate the .env file

```sh
cp .env.example .env
```

4. Configure your APP_KEY in the new .env file
```sh
php artisan key:generate
```

5. Configure the .env file

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 //Here put your PORT
DB_DATABASE=laravel  //Here put your database name
DB_USERNAME=root  //Here put your database username
DB_PASSWORD=  //Here put your database password
```

6. Install packages

```sh
composer install
```

7. Run the migrations and seeders

```sh
php artisan migrate --seed
```

8. Run the project

```sh
php artisan serve
```

9. Use the credentials to login

```sh
Email:   admin@demo.com
Password:  123456
```

<br/>
<br/>

## Autores

* **Nico Radin** - *Desarrollador Full stack* - [Nico Radin](https://github.com/niicodeer) - 

