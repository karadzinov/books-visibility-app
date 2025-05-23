# 📚 books-visibility-app

A full-stack application for the Aglargond School of Magic to calculate visible book stacks from the edges of a library storage grid.

## ✨ Overview

This app helps determine the number of visible book stacks when viewed from the edge of a marked square area. A stack is visible from a direction if no taller or equally tall stack blocks it.

## 🔧 Tech Stack

- **Frontend**: ReactJS with Tailwind CSS
- **Backend**: Laravel 10.x (API-only)
- **Database**: SQLite
- **Dev Environment**: Docker, Composer, Vite, Axios

## ⚙️ Features

- Input grid UI with form validation
- Visibility algorithm executed server-side
- Stores each submission in the database
- Displays history with sort (oldest → newest)
- Docker-ready for development and deployment

## 🚀 Setup Instructions

```bash
git clone git@github.com:karadzinov/books-visibility-app.git
cd books-visibility-app
```

### Backend
```bash
cd backend
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

### Frontend
```bash
cd frontend
npm install
npm run dev
```

### Or use Docker
```bash
docker-compose up --build
```

### Algorithm Description
The backend processes a 2D array of stack heights and walks along each edge of the grid to count visible stacks in each direction (left-to-right, right-to-left, top-to-bottom, bottom-to-top).

### Example
#### Input
```bash
4
3 3 2 1
4 1 0 2
3 2 0 0
3 1 2 1
```

#### Output
```bash
12
```

## 🗃️ Database Fields
Each record includes:

* Grid input (as JSON)
* Output result
* Timestamp of submission

Accessible through the UI with sorting options.

## ✍️ Author
Martin Karadzinov
https://github.com/karadzinov