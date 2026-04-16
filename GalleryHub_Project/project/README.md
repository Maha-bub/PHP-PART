# GalleryHub — PHP Project Setup Guide

## 📁 Project Files
```
project/
├── config.php       ← Database connection & auto-setup
├── register.php     ← Registration form
├── login.php        ← Login form
├── dashboard.php    ← Admin panel (upload + table + delete)
├── logout.php       ← Session destroy
└── uploads/         ← Auto-created when first image is uploaded
```

## ⚙️ How to Run (XAMPP / WAMP)

1. **Install XAMPP** from https://www.apachefriends.org
2. Copy the entire `project/` folder into:
   - XAMPP: `C:/xampp/htdocs/project/`
   - WAMP: `C:/wamp64/www/project/`
3. Start **Apache** and **MySQL** from XAMPP/WAMP control panel
4. Open browser and visit: `http://localhost/project/register.php`

## 🗄️ Database
- The database `bird_gallery` and all tables are **created automatically**
- No need to import any SQL file manually!

## 🔐 Password Rules
Password must have:
- Minimum 8 characters
- At least 1 uppercase letter (A-Z)
- At least 1 number (0-9)
- At least 1 special character (!@#$%...)

## 📌 Features
- ✅ Registration with regex validation (email + password)
- ✅ Login with session management
- ✅ Dashboard with image upload form
- ✅ Gallery table showing ID, Name, Image thumbnail, Date
- ✅ Delete button per row with confirmation dialog
- ✅ Auto logout

## 🚀 First Time Use
1. Go to `register.php` → create an account
2. Go to `login.php` → sign in
3. You'll be redirected to `dashboard.php`
4. Upload images and manage them!
