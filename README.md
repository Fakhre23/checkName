# Laravel Admin Panel + WordCheker WebApp

This project is a full-featured Laravel-based web application that provides a secure admin dashboard with AI-powered name classification using DeepSeek. The project is protected by JWT authentication and includes FAQ management restricted to admin users.

---

## ✨ Features

* Admin dashboard with sidebar navigation
* FAQ management (CRUD) restricted to authenticated admin users
* JWT authentication for secure API access
* DeepSeek AI API integration to classify user-entered names
* Middleware-protected routes for role-based access
* Modern UI using Blade templates and Tailwind CSS
* Dynamic content loading with JavaScript (AJAX fetch)

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/project-name.git
cd project-name
```

### 2. Install Dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` file with:

```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
JWT_SECRET=your_jwt_secret
DEEPSEEK_API_KEY=your_deepseek_api_key
```

Generate JWT secret:

```bash
php artisan jwt:secret
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Serve the Application

```bash
php artisan serve
```

---

## 🔐 JWT Authentication

**Login**

```http
POST /api/login
```

Payload:

```json
{
  "email": "admin@example.com",
  "password": "password"
}
```

Returns:

```json
{
  "token": "your_jwt_token"
}
```

Use this token for protected API routes.

---

## 🧑‍💻 Admin Access

### Middleware

Only users with `is_admin = true` can access admin routes.

### Routes

Defined in `routes/web.php`:

```php
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('faq', FaqController::class);
});
```

### Middleware Logic

Located in `app/Http/Middleware/AdminMiddleware.php`:

```php
if (auth()->check() && auth()->user()->is_admin) {
    return $next($request);
}
abort(403);
```

---

## 🕹️ DeepSeek API Integration

**Route**: `/api/deepseek`

Payload:

```json
{
  "question": "What is the category of the name Fakhri?"
}
```

Returns:

```json
{
  "response": {
    "choices": [
      {
        "message": {
          "content": "The name Fakhri is an Arabic name meaning proud."
        }
      }
    ]
  }
}
```

**Controller**: `DeepSeekController.php`

```php
$response = Http::withToken(env('DEEPSEEK_API_KEY'))
    ->post('https://api.deepseek.com/chat/completions', [
        'model' => 'deepseek-chat',
        'messages' => [['role' => 'user', 'content' => $question]]
    ]);
```

---

## 📃 FAQ Management

**Views**:

* `resources/views/admin/faq/index.blade.php`
* `create.blade.php`, `edit.blade.php`

**Controller**: `FaqController.php`

* Index, create, store, edit, update, destroy methods

**Model**: `Faq.php`

```php
protected $fillable = ['question', 'answer'];
```

---

## 📅 Project Structure

```
app/
├── Http/Controllers/
│   ├── AuthController.php
│   ├── FaqController.php
│   └── DeepSeekController.php
├── Models/Faq.php
├── Middleware/AdminMiddleware.php
resources/views/admin/faq/
├── index.blade.php
├── create.blade.php
└── edit.blade.php
routes/
├── api.php (for login + deepseek)
└── web.php (admin panel)
```

---

## 📫 Connect with Me

* [LinkedIn: Fakhre Tamimie](https://www.linkedin.com/in/fakhre-tamimie-6225b3282/)

---

## ⚖️ License

MIT License. Made with ❤️ by Fakhre Tamimie.
