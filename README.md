<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# 🚀 Laravel Project Setup Guide

Follow the instructions below to set up and run this Laravel project locally.

## 📋 Requirements

- PHP >= 8.1
- Composer
- Node.js and NPM
- A database (e.g., MySQL)

---

## ⚙️ Installation Steps

1. **📥 Download the Project**  
   Download the project as a ZIP file and extract it to your computer.

2. **🧭 Open in VS Code**  
   Open the extracted folder using **Visual Studio Code**.

3. **💻 Open the Terminal**  
   In VS Code, open the terminal (`Terminal > New Terminal` or `Ctrl + ``).

4. **📦 Install PHP Dependencies**  
   Run the following command:

   ```bash
   composer install
   ```

5. **📄 Environment Setup**  
   Create your `.env` file and generate the app key:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

6. **🗄️ Configure Database**  
   - Set your database credentials in the `.env` file.
   - Run migrations if required:

   ```bash
   php artisan migrate
   ```

7. **🛠️ Install Frontend Dependencies**

   ```bash
   npm install
   npm run build
   npm run dev
   ```

8. **🚀 Start the Development Server**

   ```bash
   php artisan serve
   ```

---

## 🌐 Access Your Application

Open your browser and go to:

```
http://127.0.0.1:8000
```

Your Laravel project should now be running!

---

## 📚 Learn More About Laravel

Laravel is a web application framework with expressive, elegant syntax. Learn more at the [Laravel Documentation](https://laravel.com/docs).

---

## 🛡 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
