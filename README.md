# Task Manager Web Application

## Overview

This is a simple web application built with Laravel for task management. It allows users to create, edit, delete, and reorder tasks. The application also supports real-time updates using WebSockets for seamless task prioritization.

## Introduction

Welcome to the Task Manager web application, a powerful tool designed to streamline your task management process. This application is built on the Laravel framework, providing a seamless and intuitive user experience for organizing, prioritizing, and tracking your tasks.

### Key Features:

-   **Effortless Task Creation**: Quickly add tasks with essential details like task name, priority, and timestamps.

-   **Dynamic Task Editing**: Easily modify task information to keep it up-to-date and reflective of your evolving priorities.

-   **Intuitive Task Deletion**: Remove tasks that are no longer relevant or necessary with a simple click.

-   **Drag-and-Drop Reordering**: Arrange tasks effortlessly by dragging and dropping, allowing you to adjust priorities on the fly.

-   **Project Functionality**: Organize tasks by associating them with specific projects, providing a structured view of your work.

### Real-Time Updates:

Experience the power of real-time updates for task prioritization. When you adjust the priority of a task, the change is instantly reflected for all users connected to the application, ensuring seamless collaboration.

Whether you're managing personal projects or working in a team, the Task Manager application provides a robust platform to enhance productivity and stay organized.

Get started today and take control of your tasks like never before!

## Features

-   Create tasks with details like task name, priority, and timestamps.
-   Edit existing tasks.
-   Delete tasks.
-   Reorder tasks with drag-and-drop functionality.
-   View tasks associated with specific projects.

## Setup and Deployment

Follow the steps below to set up and deploy the Task Manager web application:

### Prerequisites

-   PHP >= 7.3
-   Composer (https://getcomposer.org/)
-   MySQL database

### Installation

1. Clone the repository:

```bash
git clone https://github.com/your-username/task-manager.git
```

2. Install dependencies:

```
cd task-manager
composer install
```

3.  Create a .env file by copying the example:

```
cp .env.example .env
```

4. Configure your .env file with your database connection details.

Generate application key:

```
php artisan key:generate
```

5. Run migrations to create the necessary database tables:

```
php artisan migrate
```

6. Start the development server:

```
php artisan serve
```

### Usage

-   Open your web browser and go to http://localhost:8000 (or the URL of your development server).
-   Register a new user or log in with an existing account.
-   Start managing your tasks!

### Real-time Updates

The application supports real-time updates for task prioritization. When you drag and drop a task to change its priority, the change will be reflected in real-time for all connected users.

### Project Management

Tasks can be associated with specific projects. You can create projects from the dashboard and then select a project when creating or editing a task.

### Contributing

If you'd like to contribute to this project, please follow these steps:

-   Fork the repository.
-   Create a new branch for your feature or bug fix.
-   Make your changes and commit them with descriptive messages.
-   Push your branch to your fork.
-   Create a pull request to merge your changes into the main repository.

### License

This project is licensed under the MIT License.
