# EcoBoard

## Descripción do repositorio
Este repositorio contén o código do aplicativo web que se desenvolverá como parte do Módulo de Proxecto do ciclo superior de **Desenvolvemento de Aplicacións Multiplataforma** do alumno *Adrián González Gómez*.

## Licenza e uso agardado

Na súa forma actual, este repositorio debe entenderse como un proxecto académico. Non se agarda un uso comercial no seu estado e non se garante nin soporte nin un correcto funcionamento a ninguén que non sexan os profesores do mencionado ciclo superior.

## Dependencias previas

Será preciso descargar as dependencias do proxecto para executalo no entorno de desenvolvemento local. Será preciso:

- NodeJS e NPM
- PHP >= 8.3
- Composer

## Instalación do proxecto

### Linux e outros sistemas Unix 

Tras clonar o proxecto, executaranse os seguintes comandos antes de executar o entorno de desenvolvemento (alternativamente, pódese usar o ficheiro *setup.sh*)

```bash
# Instálanse as dependencias para o backend en PHP
composer install

# Usar o ficheiro de entorno de exemplo como base para o entorno de desenvolvemento
cp .env.example .env

# Xerar unha nova clave de encriptación
php artisan key:generate

# Crear unha base de datos para desenvolvemento e aplicar migracións
touch database/database.sqlite
php artisan migrate

# Instálanse as dependencias para o frontend en JavaScript 
npm install
```

## Executar o entorno de desenvolvemento

Deben executarse, en paralelo, os seguintes procesos:

```bash
# Execútase o servidor de desenvolvemento de Laravel
php artisan serve

# Execútase o servidor de desenvolvemento de ViteJS
npm run dev
```

Alternativamente, pódense executar en secuencia os seguintes comandos:

```bash
# Compílanse os assets do frontend (nesta modalidade, deben recompilarse cando se fagan cambios no front)
npm run build

# Execútase o servidor de desenvolvemento de Laravel
php artisan serve
```
