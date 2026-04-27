# Medical Appointment Management System 🏥

A complete, premium web application built with Laravel 11/12 for managing medical appointments in a professional cabinet.

## ✨ Features

- **Authentication**: Secure login/register system.
- **Relational Database**: Managed users (patients/doctors), appointments, and services.
- **Appointment CRUD**: Full management interface with real-time feedback.
- **Premium Design**: Modern, responsive UI with glassmorphism and smooth transitions.
- **Modals**: Critical actions (delete, quick add) handled via interactive modals.
- **Real-time Search**: Asynchronous filtering using Axios.
- **Internationalization (i18n)**: Interface available in French 🇫🇷 and English 🇺🇸.
- **Email Notifications**: Automatic confirmation emails sent to patients.
- **REST API**: JSON endpoints for integration with external systems.

## 🚀 Installation

Follow these steps to set up the project locally:

1. **Clone the repository**:
   ```bash
   git clone [your-repo-url]
   cd cabinet
   ```

2. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database & Seeding**:
   *The project uses SQLite by default for easy setup.*
   ```bash
   touch database/database.sqlite
   php artisan migrate --seed
   ```

5. **Build Assets**:
   ```bash
   npm run build
   ```

6. **Start the Server**:
   ```bash
   php artisan serve
   ```

## 🔐 Default Credentials

After seeding, you can log in with:

| Role  | Email | Password |
| ------------- | ------------- | ------------- |
| **Admin**  | `admin@cabinet.com`  | `password` |
| **Patient/Doctor** | *Randomly generated (check database)* | `password` |

## 📡 API Documentation

### 1. List All Appointments
- **Endpoint**: `GET /api/appointments`
- **Description**: Returns a JSON list of all appointments with patient, doctor, and service details.

### 2. Create Appointment
- **Endpoint**: `POST /api/appointments`
- **Description**: Creates a new appointment.
- **Payload Example**:
  ```json
  {
      "patient_id": 2,
      "doctor_id": 3,
      "service_id": 1,
      "appointment_date": "2026-05-25 10:00:00",
      "notes": "Urgent consultation"
  }
  ```

## 🛠️ Tech Stack

- **Backend**: Laravel 11/12
- **Frontend**: Blade, Alpine.js, Tailwind CSS
- **Interactions**: Axios
- **Database**: SQLite / MySQL
- **Email**: Laravel Mail (Log driver by default)

---
Developed for the Medical Cabinet Assignment.
